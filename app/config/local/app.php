<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Application Debug Mode
	|--------------------------------------------------------------------------
	|
	| When your application is in debug mode, detailed error messages with
	| stack traces will be shown on every error that occurs within your
	| application. If disabled, a simple generic error page is shown.
	|
	*/

	'debug' => true,

	'aliases' => append_config([
		'User' => 'FlightDeck\Users\User',
		'City' => 'FlightDeck\Cities\City',
		'County' => 'FlightDeck\Counties\County',
		'Customer' => 'FlightDeck\Customers\Customer',
		'Dealer' => 'FlightDeck\Dealers\Dealer',
		'Manufacturer' => 'FlightDeck\Manufacturers\Manufacturer',
		'PurchaseOrder' => 'FlightDeck\PurchaseOrders\PurchaseOrder',
		'Region' => 'FlightDeck\Regions\Region',
		'Rep' => 'FlightDeck\Representatives\Representative',
		'Zipcode' => 'FlightDeck\Zipcodes\Zipcode'
	]),

);
