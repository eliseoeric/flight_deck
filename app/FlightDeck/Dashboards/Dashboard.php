<?php namespace FlightDeck\Dashboards;


class Dashboard extends \Eloquent{


	public function widgets()
	{
		return $this->hasMany('FlightDeck\Widgets\Widget');
	}
}