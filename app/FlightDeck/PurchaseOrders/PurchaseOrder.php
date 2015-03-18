<?php namespace FlightDeck\PurchaseOrders;

use FlightDeck\Representatives\Representative;

class PurchaseOrder extends \Eloquent {
	// Add your validation rules here
	public static $rules = [

	];

	// Don't forget to fill this array
	protected $fillable = ['customer_id', 'amount', 'manufacturer_id'];

	/**
	 * @return mixed
	 */
	public function customer()
	{
		return $this->belongsTo('FlightDeck\Customers\Customer');
	}

	/**
	 * @return mixed
	 */
	public function dealer()
	{
		return $this->belongsTo('FlightDeck\Dealers\Dealer');
	}

	/**
	 * @return mixed
	 */
	public function manufacturer()
	{
		return $this->belongsTo('FlightDeck\Manufacturers\Manufacturer');
	}

}