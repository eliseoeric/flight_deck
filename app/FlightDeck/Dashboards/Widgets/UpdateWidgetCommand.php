<?php namespace FlightDeck\Dashboards\Widgets;


class UpdateWidgetCommand {

	public $id;
	public $heading;
	public $size;
	public $class;
	public $type;

	public function __construct( $id, $heading, $size, $class, $type ) {
		$this->id      = $id;
		$this->heading = $heading;
		$this->size    = $size;
		$this->class   = $class;
		$this->type    = $type;
	}
}