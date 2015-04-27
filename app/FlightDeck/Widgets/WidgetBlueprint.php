<?php
namespace FlightDeck\Widgets;


abstract class WidgetBlueprint {
	protected $meta;

	public function __construct($meta)
	{
		$ret =[];
		//strip the meta key value pairs from the widget object
		//and assign them to an array
		foreach($meta as $key => $value)
		{
			$ret[$value->meta_key] = $value->meta_value;
		}

		$this->meta = $ret;
	}
}