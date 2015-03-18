<?php namespace FlightDeck\Representatives;

class Representative extends \Eloquent{
	// Add your validation rules here
	public static $rules = [

	];

	// Don't forget to fill this array
	protected $fillable = ['first_name', 'last_name', 'phone', 'email', 'net_sales', 'region'];

	/**
	 * @return mixed
	 */
	public function counties()
	{
		return $this->belongsToMany('FlightDeck\Counties\County');
	}

	public function customers()
	{
		return $this->belongsToMany('FlightDeck\Customers\Customer');
	}

}
