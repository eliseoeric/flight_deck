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

Route::get('ziptest',function(){

});


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

/*
 * Sessions
 */

Route::get('login', [
	'as' => 'login_path',
	'uses' => 'SessionsController@create'
]);

Route::post('login', [
	'as' => 'login_path',
	'uses' => 'SessionsController@store'
]);
Route::get('logout', [
	'as' => 'logout_path',
	'uses' => 'SessionsController@destroy'
]);
/**
 * Dashboard
 */

// Here, the 'before' is a filter, being ran before the route can be completed.
// We are checking it agains the auth and admin fitlers, located/defined in filters.php
Route::group(array('prefix' => 'admin', 'before' => 'auth|admin'), function(){
	Route::get('/', array('as' => 'admin.dashboard', 'uses' => 'DashboardController@index'));
	Route::get('dashboard', 'DashboardController@index');
	Route::resource('users', 'UsersController');
	Route::resource('regions', 'RegionsController');
	Route::resource('representatives', 'RepresentativesController');
	Route::resource('purchaseOrders', 'PurchaseOrdersController');
});