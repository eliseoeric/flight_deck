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
		return $this->hasMany('FlightDeck\Counties\County');
	}

	public function customers()
	{
		return $this->hasMany('FlightDeck\Customers\Customer');
	}

	public function regions()
	{
		return $this->belongsToMany('FlightDeck\Regions\Region', 'counties', 'representative_id', 'region_id')->distinct();
	}

}
