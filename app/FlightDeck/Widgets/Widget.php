<?php namespace FlightDeck\Widgets;

class Widget extends \Eloquent{
	// Add your validation rules here
	public static $rules = [

	];

	// Don't forget to fill this array
	protected $fillable = [];

	public function dashboard()
	{
		return $this->belongsTo('FlightDeck\Dashboards\Dashboard');
	}

}
