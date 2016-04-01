<?php

namespace Mom\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use Mom\Http\Requests;
use Mom\Http\Requests\EditProfileRequest;
use Mom\Http\Controllers\Controller;

use Mom\Models\Profile;
use Mom\Models\ProfileSkill;
use Mom\Models\ProfileExperience;
use Mom\Models\Image;
use Mom\Models\LinkProfile;
use Mom\Models\Skill;
use Mom\Models\FrescoExpertise;

use Mom\Exceptions\PermissionDeniedException;

class ProfileController extends Controller
{

    public function __construct(){
        // apply middleware as needed
        // use 'except' instead of 'only' if it's a short array
        $this->middleware('auth', ['except' => [
            'getShowProfile',
        ]]);
    }

	// Updates the user's url
	private function updateURL($id, $request, $link_id, $input)
	{
		$link = LinkProfile::where('individuals_id', $id)
    		->where('link_id', $link_id)
    		->first();
        // If link does not return null/empty then update, else create new link.    
        if(!empty($link))
            $link->update(['link_url' => $request->input($input)]);
        else {
            LinkProfile::create([
                'individuals_id'    => $id,
                'link_id'           => $link_id,
                'link_url'          => $request->input($input)
            ]);
        }
	}

	// Get user profile based off individuals id passed through
    public function getUserProfile($id)
    {

        // Find the user profile
        $profile        = Profile::with('skills', 'links', 'image')->findOrFail($id);

        if(!Auth::user()->canEdit($profile->individuals_id)){
            throw new PermissionDeniedException();
        }
        // Get the user's skills if he's updated any
        $profile_skills = $profile->skills->lists('research_id')->toArray();
        //return $profile_skills;

        // Get the entire collection of skills from research view
        $skills         = Skill::all()->lists('title', 'research_id')->toArray();

        // Get profile's linkedin, github, or portfolium link
        $linkedin_url = NULL;
        $portfolium_url = NULL;
        $github_url = NULL;
        foreach($profile->links as $link){
            switch($link->type){
                case "linkedin":    $linkedin_url   = $link->pivot->link_url; break;
                case "portfolium":  $portfolium_url = $link->pivot->link_url; break;
                case "github":      $github_url     = $link->pivot->link_url; break;
            }
        }

    	// Return corresponding indiviudals profile edit page
    	return view('pages.profiles.edit-student', compact('skills', 'profile', 'profile_skills', 'linkedin_url', 'portfolium_url', 'github_url'));
    }

    // Update the user's profile
    public function postEdit(EditProfileRequest $request, $id)
    {

        $profile = Profile::findOrFail($id);
        // handle unauthorized POST requests
        if(!Auth::user()->canEdit($profile->individuals_id)){
            throw new PermissionDeniedException();
        }
    	// If user has uploaded an image for their profile
    	if($request->hasFile('profile_image'))
    	{
    		// Move the file to public/profile/image 
    		$file = $request->file('profile_image');
			$file->move('user-profile/image', $file->getClientOriginalName());

			// Save file name to images table
			Image::where('imageable_id', $id)->update([
				'src' => $file->getClientOriginalName()
			]);
    	}

    	// If user has included linkedin in url
    	if($request->has('linkedin_url'))
    	{
    		// Update link_profile table - updateURL function located on line 18
    		$this->updateURL($id, $request, '1', 'linkedin_url');
    	}

    	// If user has included portfolium url
    	if($request->has('portfolium_url'))
    	{
    		
    		$this->updateURL($id, $request, '2', 'portfolium_url');
    	}

    	// If user has included github url
    	if($request->has('github_url'))
    	{
    		
    		$this->updateURL($id, $request, '3', 'github_url');
    	}

        // If user has included something in the skills textbox
        if($request->has('skills')) 
        {
            
            if(count($profile->skills) > 0)
            {

                FrescoExpertise::where('entities_id', $id)->delete();

                foreach ($request->skills as $val) 
                {
                    FrescoExpertise::create([
                        'entities_id'  => $id,
                        'expertise_id' => $val
                    ]);
                }
            }   

            else 
            {
                foreach ($request->skills as $value)
                {
                    FrescoExpertise::create([
                        'entities_id'  => $id,
                        'expertise_id' => $value
                    ]);
                }
            }
            
        }

        // profile experiences section
        if($request->has('experiences')) 
        {
            // Remove blank values from array 
            $exp_arr = array_filter(array_map('trim', $request->input('experiences')));;

            if(count($profile->experience) > 0)
            {
                $profile->experience()->delete();

                foreach ($exp_arr as $exp) 
                {
                    ProfileExperience::create([
                        'experience'     => $exp,
                        'individuals_id' => $id
                    ]);
                }

            }

            else
            {
                foreach ($exp_arr as $exp) 
                {
                    ProfileExperience::create([
                        'experience'     => $exp,
                        'individuals_id' => $id
                    ]);
                }
            }
        
        }

        // profile background section
        if($request->has('background'))
        {
            Profile::where('individuals_id', $id)->update([
                'background' => $request->input('background')
            ]);
        }

    	return redirect()->back();
    }

}
