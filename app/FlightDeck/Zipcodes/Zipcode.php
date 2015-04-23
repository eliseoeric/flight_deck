<?php namespace FlightDeck\Zipcodes;


class Zipcode extends \Eloquent {

	// Add your validation rules here
	public static $rules = [

	];

	// Don't forget to fill this array
	protected $fillable = [ 'zipcode', 'city_id' ];

	/**
	 * @return mixed
	 */
	public function city() {
		return $this->belongsTo( 'FlightDeck\Cities\City' );
	}

}
