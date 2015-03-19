<?php namespace FlightDeck\Regions;

use FlightDeck\Representatives\Representative;

class Region extends \Eloquent {
	// Add your validation rules here
	public static $rules = [

	];

	// Don't forget to fill this array
	protected $fillable = ['region'];

	/**
	 * @return mixed
	 */
	public function counties()
	{
		return $this->hasMany('FlightDeck\Counties\County');
	}

	public function reps()
	{
		return $this->belongsToMany('FlightDeck\Representatives\Representative', 'counties', 'region_id', 'representative_id')->distinct();
	}

}