<?php namespace FlightDeck\Cities;


class City extends \Eloquent {
	// Add your validation rules here
	public static $rules = [

	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'county_id', 'zipcode'];

	public function zipcodes()
	{
		return $this->hasMany('FlightDeck\Zipcodes\Zipcode');
	}

	public function county()
	{
		return $this->belongsTo('FlightDeck\Counties\County');
	}
}