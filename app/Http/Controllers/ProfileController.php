<?php

namespace Mom\Http\Controllers;

use Illuminate\Http\Request;

use Mom\Http\Requests;
use Mom\Http\Requests\EditProfileRequest;
use Mom\Http\Controllers\Controller;

use Mom\Models\Profile;

class ProfileController extends Controller
{
    public function getUserProfile($id)
    {
    	$profile = Profile::where('individuals_id', $id)->first();

    	return view('edit-student', compact('profile'));
    }

    public function postEdit(EditProfileRequest $request)
    {
    	
    }
}
