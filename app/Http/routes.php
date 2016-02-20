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

Route::get('/', function () {
    return view('welcome');
});

Route::get('profile', function() {
   // returns profile for that user -> This WORKS!
   // $user = Mom\Models\User::find('members:104733445');
   // $profile = $user->profile()->get();
   // return $profile;

   // returns links for that profile -> This WORKS!
   // $links = Mom\Models\Profile::where('individuals_id', 'members:104733445')->with('links')->get();
   // return $links;
      // OR
   // $user = Mom\Models\Profile::find('members:104733445');
   // $links = $user->links()->get();
   // return $links;

   // returns the full name of the user.
   // $user = Mom\Models\Profile::find('members:104733445');
   // $name = $user->fullName();
   // return $name;

   // $user = Mom\Models\User::all();
   // $user->load('profile.links', 'profile.skills');
   // return $user;
});

Route::get('projects', function(){
   return Mom\Models\Project::all();
});

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
	Route::resource('project', 'ProjectController');
});
