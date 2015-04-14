<?php namespace FlightDeck\Dashboards;


class Dashboard extends \Eloquent{

	protected $fillable = ['heading', 'owner'];

	public function widgets()
	{
		return $this->hasMany('FlightDeck\Dashboards\Widgets\Widget');
	}

	public function widgetMeta()
	{
		return $this->hasManyThrough('FlightDeck\Dashboards\Widgets\WidgetMeta', 'FlightDeck\Dashboards\Widgets\Widget');
	}
}