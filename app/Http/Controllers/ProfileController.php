<?php

namespace Mom\Http\Controllers;

use Illuminate\Http\Request;

use Mom\Http\Requests;
use Mom\Http\Controllers\Controller;

use Mom\Models\Profile;

class ProfileController extends Controller
{
	// return the user's profile, based off login credentials passed
    public function getUserProfile($id)
    {
    	// Find the user in mom.profiles based off id
    	$user = Profile::where('individuals_id', $id)->first();

    	return view('edit-student', compact('user'));
    }
}
