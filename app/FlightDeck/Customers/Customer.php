<?php namespace FlightDeck\Customers;

use FlightDeck\Representatives\Representative;

class Customer extends \Eloquent {
	// Add your validation rules here
	public static $rules = [

	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'address', 'city', 'zip', 'state', 'phone', 'rep_id', 'county'];

	public function purchase_orders()
	{
		return $this->hasMany('FlightDeck\PurchaseOrders\PurchaseOrder');
	}

}