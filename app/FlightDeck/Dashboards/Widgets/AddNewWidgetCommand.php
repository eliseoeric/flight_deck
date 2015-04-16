<?php namespace FlightDeck\Dashboards\Widgets;


class AddNewWidgetCommand {

	public $heading;
	public $size;
	public $class;
	public $type;
	public  $dashboard_id;

	public function __construct($dashboard_id, $heading, $size, $class, $type)
	{
		$this->heading = $heading;
		$this->size = $size;
		$this->class = $class;
		$this->type = $type;
		$this->dashboard_id = $dashboard_id;
	}
}