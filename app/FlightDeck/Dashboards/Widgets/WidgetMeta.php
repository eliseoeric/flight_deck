<?php namespace FlightDeck\Dashboards\Widgets;


class WidgetMeta extends \Eloquent{

	public function widget()
	{
		return $this->belongsTo('FlightDeck\Dashboards\Widgets\Widget');
	}
}