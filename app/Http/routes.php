<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//TODO: find a way to add a universal auth check so that user is ALWAYS kicked to login 

Route::get('/', function () {
	
	//kick the user to the login page if they aren't logged in. Otherwise, send them directly to /profiles
	if (!Auth::check()){
		return Redirect::guest('login');
	 }else{
		 return Redirect::guest('profiles');
	}
});

//add a nicer route for login instead of index.php?login
Route::get('/login', function(){
	 return Redirect::guest('login');
});


Route::auth(); 

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    // All routes that needs a logged in user
	Route::get('/profiles', 'ProfilesController@index');
});
