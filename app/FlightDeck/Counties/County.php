<?php namespace FlightDeck\Counties;

class County extends \Eloquent {
	// Add your validation rules here
	public static $rules = [

	];

	// Don't forget to fill this array
	protected $fillable = ['county', 'region_id'];

	public function cities()
	{
		return $this->hasMany('FlightDeck\Cities\City');
	}

	public function representative()
	{
		return $this->belongsTo('FlightDeck\Representatives\Representative');
	}

	public function region()
	{
		return $this->belongsTo('FlightDeck\Regions\Region');
	}

	public function customers()
	{
		return $this->hasManyThrough('FlightDeck\Customers\Customer', 'FligthDeck\Cities\City');
	}

}