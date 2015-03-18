<?php namespace FlightDeck\Dealers;

class Dealer extends \Eloquent{
	// Add your validation rules here
	public static $rules = [

	];

	// Don't forget to fill this array
	protected $fillable = ['name'];

	/**
	 * @return mixed
	 */
	public function purchase_orders()
	{
		return $this->hasMany('FlightDeck\PurcahseOrders\PurcahseOrder');
	}

}
