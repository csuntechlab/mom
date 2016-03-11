<?php 
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	Route::get('/', function () {
    	return view('layouts.master');
	});
	Route::get('projects', function () {
	    return view('projects');
	});

	Route::get('profile', function() {
	   return Mom\Models\Profile::all();
	});

	Route::resource('project', 'ProjectController');

	// authentication stuff
	Route::get('login', 'AuthController@getLogin');
	Route::post('login', 'AuthController@postLogin');
	Route::get('logout', 'AuthController@getLogout');

    Route::resource('project', 'ProjectController');
    Route::controller('admin', 'AdminController');
    
    // remove after code reviewing
    Route::get('individuals', function() {
    	return Mom\Models\NemoIndividual::findOrFail('members:106417582');
    });
});
