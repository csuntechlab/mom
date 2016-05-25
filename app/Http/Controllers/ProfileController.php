<?php

namespace Mom\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Mom\Traits\ImageHandler;

use Mom\Http\Requests;
use Mom\Http\Requests\EditProfileRequest;
use Mom\Http\Controllers\Controller;

use Mom\Models\User;
use Mom\Models\Skill;
use Mom\Models\Image;
use Mom\Models\Profile;
use Mom\Models\ProfileSkill;
use Mom\Models\ProfileExperience;
use Mom\Models\LinkEntity;
use Mom\Models\FrescoExpertiseEntity;

use Mom\Exceptions\PermissionDeniedException;

class ProfileController extends Controller
{

    // Trait used to resize image - found in Mom\Traits\ImageHandler.php
    use ImageHandler;

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
		$link = LinkEntity::where('entities_id', $id)
    		->where('link_id', $link_id)
    		->first();
        // If link does not return null/empty then update, else create new link.    
        if(!empty($link))
            $link->update(['link_url' => $request->input($input)]);
        else {
            LinkEntity::create([
                'entities_id'       => $id,
                'link_id'           => $link_id,
                'link_url'          => $request->input($input)
            ]);
        }
	}

	// Get user profile based off individuals id passed through
    public function getUserProfile($email)
    {   
        //This takes care the staging vs production email structure
        if(env('APP_DEBUG') == true) {
            $id = User::where('email', 'nr_'.$email.'@my.csun.edu')
            ->orWhere('email', 'nr_'.$email.'@csun.edu')
            ->firstOrFail()
            ->user_id;
        } else {
            $id = User::where('email', $email.'@my.csun.edu')
            ->orWhere('email', $email.'@csun.edu')
            ->firstOrFail()
            ->user_id;
        }
        
        // Find the user profile
        $profile = Profile::with('skills', 'links', 'image')->find($id);
        // here let's handle the case were the user has not logged in ever
        // and maybe he won't log in ever but people whould still be able to
        // view the profile
        if(is_null($profile)) {
            try{
              $profile = Profile::create([
                'individuals_id'  => $id,
                'background'      => "",
                'position'        => "",
                'grad_date'       => NULL
              ]);
            } catch (\PDOException $e){
              // add some sort of notification of error
              return redirect()->back();
            }
        }


        // if(!Auth::user()->canEdit($profile->individuals_id)){
        //     throw new PermissionDeniedException();
        // }
        // Get the user's skills if he's updated any
        $profile_skills = $profile->skills->lists('research_id')->toArray();
        //return $profile_skills;

        // Get the entire collection of skills from research view
        $skills = Skill::all()->lists('title', 'research_id')->toArray();

        // Create a years range for graduation year
        $range = range(date("Y"), date("Y") + 4);
        $years = array_combine($range, $range);

        // Get profile's linkedin, github, or portfolium link
        $linkedin_url   = NULL;
        $portfolium_url = NULL;
        $github_url     = NULL;
        foreach($profile->links as $link){
            switch($link->type){
                case "linkedin":    $linkedin_url   = $link->pivot->link_url; break;
                case "portfolium":  $portfolium_url = $link->pivot->link_url; break;
                case "github":      $github_url     = $link->pivot->link_url; break;
            }
        }

    	// Return corresponding indiviudals profile edit page
        // if($profile->isConfidential())
        // {
        //     if(Auth::user()->isOwner($profile->individuals_id))
        //     {
        //         return view('pages.profiles.edit-student', compact('skills', 'profile', 'profile_skills', 'linkedin_url', 'portfolium_url', 'github_url', 'years'));
        //     }

        //     else
        //     {
        //         abort(404);
        //     }
    
        // }

        return view('pages.profiles.edit-student', compact('skills', 'profile', 'profile_skills', 'linkedin_url', 'portfolium_url', 'github_url', 'years'));


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
            // Resize image using Intervention
            $file = $request->file('profile_image');
            $time = time();
            $smImage = 'sm_' . $time . $file->getClientOriginalName();
            $lgImage = 'lg_' . $time . $file->getClientOriginalName();

            // Small image
            $this->resizeImage($file, 50, 50, '/user-profile/image/' . $smImage);
            
            // Large image
            $this->resizeImage($file, 200, 200, '/user-profile/image/' . $lgImage);

            // Has the profile uploaded an image before?
            if(!is_null($profile->image))
            {   
                // Yes so delete all instances of that one to make room for the new one
                $files = [
                    'user-profile/image/sm_' . $profile->image->src,
                    'user-profile/image/lg_' . $profile->image->src
                ];

                \File::delete($files);
            }

			// Save file name to images table
			Image::where('imageable_id', $id)->firstOrCreate([
                'imageable_id'   => $id,
                'imageable_type' => 'Mom\Models\Profile'
			])->update([
                'src' => $time . $file->getClientOriginalName()
            ]);
    	}

        // If user has included graduation year 
        if($request->has('graduation_year'))
        {
            Profile::where('individuals_id', $id)->update([
                'grad_date' => $request->input('graduation_year')
            ]);
        }
        // this is needed to allow null links.. I think
    	$this->updateURL($id, $request, '1', 'linkedin_url');
    		
    	$this->updateURL($id, $request, '2', 'portfolium_url');
    	
    	$this->updateURL($id, $request, '3', 'github_url');
    

        // If user has included something in the skills textbox
        if($request->has('skills')) 
        {
            
            if(count($profile->skills) > 0)
            {

                FrescoExpertiseEntity::where('entities_id', $id)->delete();

                foreach ($request->skills as $val) 
                {
                    FrescoExpertiseEntity::create([
                        'entities_id'  => $id,
                        'expertise_id' => $val
                    ]);
                }
            }   

            else 
            {
                foreach ($request->skills as $value)
                {
                    FrescoExpertiseEntity::create([
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

        if($request->has('position'))
        {
            Profile::where('individuals_id', Auth::user()->user_id)->update([
                'position' => $request->input('position')
            ]);
        }

    	return redirect()->back();
    }

}
