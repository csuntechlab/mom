<?php

namespace Mom\Http\Controllers;

use Illuminate\Http\Request;

use Mom\Http\Requests;
use Mom\Http\Requests\EditProfileRequest;
use Mom\Http\Controllers\Controller;

use Mom\Models\Profile;
use Mom\Models\Image;
use Mom\Models\LinkProfile;

class ProfileController extends Controller
{
	// Updates the user's url
	private function updateURL($id, $request, $link_id, $input)
	{
		LinkProfile::where('individuals_id', $id)
    		->where('link_id', $link_id)
    		->update([
    			'link_url' => $request->input($input)
    		]);
	}

	// Get user profile based off individuals id passed through
    public function getUserProfile($id)
    {
    	$profile = Profile::where('individuals_id', $id)->first();

    	// Return corresponding indiviudals profile edit page
    	return view('edit-student', compact('profile'));
    }

    // Update the user's profile
    public function postEdit(EditProfileRequest $request, $id)
    {
    	// If user has uploaded an image for their profile
    	if($request->hasFile('profile_image'))
    	{
    		// Move the file to public/profile/image 
    		$file = $request->file('profile_image');
			$file->move('profile/image', $file->getClientOriginalName());

			// Save file name to images table
			Image::where('imageable_id', $id)->update([
				'src' => $file->getClientOriginalName()
			]);
    	}

    	// If user has included linked in url
    	if($request->has('linkedin_url'))
    	{
    		// Update link_profile table - updateURL function located on line 18
    		$this->updateURL($id, $request, '1', 'linkedin_url');
    	}

    	// If user has included portfolium url
    	if($request->has('portfolium_url'))
    	{
    		// Update link_profile table - updateURL function located on line 18
    		$this->updateURL($id, $request, '2', 'portfolium_url');
    	}

    	// If user has included github url
    	if($request->has('github_url'))
    	{
    		// Update link_profile table - updateURL function located on line 18
    		$this->updateURL($id, $request, '3', 'github_url');
    	}

    	return redirect()->back();
    }
}
