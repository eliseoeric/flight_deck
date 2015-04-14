<?php namespace FlightDeck\Dashboards\Widgets;


class WidgetMeta extends \Eloquent{

	protected $fillable =['widget_id', 'meta_key', 'meta_value'];

	public function widget()
	{
		return $this->belongsTo('FlightDeck\Dashboards\Widgets\Widget');
	}
}