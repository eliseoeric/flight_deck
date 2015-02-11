<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Event listening like this is a great example of a Pub Sub design
//Event::listen('FlightDeck.Registration.Events.UserRegistered', function($event)
//{
//	dd('send a notification email');
//});

Route::get('/', [
	'as' => 'home',
	'uses' => 'PagesController@home'
]);

/*
 * Registration
 *
 */

Route::get('register', [
	'as' => 'register_path',
	'uses' => 'RegistrationController@create'
]);

Route::post('register', [
	'as' => 'register_path',
	'uses' => 'RegistrationController@store'
]);

//Couple of things going on here:
// prefix is a prefix to the route url..therefore Route::get('login'..) is obsfucated behind admin/login
Route::group(array('prefix' => 'admin'), function(){
	Route::get('login', [
		'as' => 'admin_login',
		'uses' => 'AdminAuthController@getLogin'
	]);
	Route::post('login', array('as' => 'admin.login.post', 'uses' => 'AdminAuthController@postLogin'));
	Route::get('logout', array('as' => 'admin.logout', 'uses' => 'AdminAuthController@getLogout'));
});

// Here, the 'before' is a filter, being ran before the route can be completed.
// We are checking it agains the auth and admin fitlers, located/defined in filters.php
Route::group(array('prefix' => 'admin', 'before' => 'auth|admin'), function(){
	Route::get('/', array('as' => 'admin.dashboard', 'uses' => 'AdminDashboardController@index'));
	Route::resource('pages', 'AdminPagesController'); // For the record, this controller should be singular (i think?)
	Route::resource('users', 'AdminUsersController');
	Route::resource('tasks', 'AdminTasksController');
});

//Route::resource('users', 'UsersController');