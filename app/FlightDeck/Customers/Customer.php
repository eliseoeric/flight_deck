<?php namespace FlightDeck\Customers;

use FlightDeck\Representatives\Representative;

class Customer extends \Eloquent {
	// Add your validation rules here
	public static $rules = [

	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'address', 'city', 'zip', 'state', 'phone', 'rep_id', 'county', 'region_id'];

	public function purchase_orders()
	{
		return $this->hasMany('FlightDeck\PurchaseOrders\PurchaseOrder');
	}

	public function representative()
	{
		return $this->belongsTo('FlightDeck\Representatives\Representative');
	}

	public function region()
	{
		return $this->belongsTo('FlightDeck\Regions\Region');
	}

	public function totalSales()
	{
		return $this->purchase_orders()->sum('amount');
	}

}