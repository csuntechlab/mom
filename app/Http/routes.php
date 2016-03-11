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
    return view('layouts.master');
});
Route::get('projects', function () {
    return view('projects');
});

Route::get('edit-student', function () {
    return view('edit-student');
});

Route::get('profile', function() {
   return Mom\Models\Profile::all();
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
    Route::controller('admin', 'AdminController');
    Route::controller('profile', 'ProfileController');
});
