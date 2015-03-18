<?php namespace FlightDeck\Manufacturers;

class Manufacturer extends \Eloquent{
	// Add your validation rules here
	public static $rules = [

	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'address', 'city', 'zip', 'state', 'phone', 'email'];

	/**
	 * @return mixed
	 */
	public function purchase_orders()
	{
		return $this->hasMany('FlightDeck\PurchaseOrders\PurchaseOrder');
	}
}
