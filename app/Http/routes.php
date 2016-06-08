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
    
	Route::get('/', 'ProjectController@work');
    Route::get('work', 'ProjectController@work');

	Route::resource('projects', 'ProjectController');
    // profiles
    Route::get('profiles/{email}', 'ProfileController@getUserProfile');
    Route::controller('profiles', 'ProfileController');
    // authentication stuff
    Route::get('login', 'AuthController@getLogin');
    Route::post('login', 'AuthController@postLogin');
    Route::get('logout', 'AuthController@getLogout');
    // admin stuff
    Route::get('admin', 'ProjectController@index');
    Route::get('admin/manage-students', 'AdminController@studentsIndex');
    Route::get('admin/manage-students/add', 'AdminController@studentsAddMembership');
    Route::post('admin/manage-students/add', 'AdminController@postStudentsAddMembership');
    Route::get('admin/manage-students/remove', 'AdminController@studentsRemoveMembership');
    Route::post('admin/manage-students/remove', 'AdminController@postStudentsRemoveMembership');
});

Route::get('image-reducer', 'ImageReduce@index');
