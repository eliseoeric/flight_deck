<?php namespace FlightDeck\Dashboards\Widgets\Events;

use FlightDeck\Dashboards\Widgets\Widget;

class WidgetAddedToDash {
	public $widget;
	
	public function __construct(Widget $widget)
	{
		$this->widget = $widget;
	}
}