<?php

namespace Mom\Http\Controllers;

use Illuminate\Http\Request;

use Mom\Http\Requests;
use Mom\Http\Controllers\Controller;

use Mom\Models\Profile;

class ProfileController extends Controller
{
	public function __construct(){
		// apply middleware as needed
		// use 'except' instead of 'only' if it's a short array
		$this->middleware('auth', ['only' => [
			'show',
		]]);
		// authenticated users can edit and update their profiles 
        $this->middleware('admin', ['only' => [
            'index', 'create', 'store', 'destroy',
        ]]);
	}

	// return the user's profile, based off login credentials passed
    public function getUserProfile($id)
    {
    	// Find the user in mom.profiles based off id
    	$user = Profile::where('profile_id', $id)->first();

    	return view('pages.profiles.edit-student', compact('user'));
    }
}
