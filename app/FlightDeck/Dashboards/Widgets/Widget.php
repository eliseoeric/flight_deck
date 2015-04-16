<?php namespace FlightDeck\Dashboards\Widgets;

use FlightDeck\Core\Presenters\Contracts\PresentableInterface;
use FlightDeck\Core\Presenters\PresentableTrait;
use FlightDeck\Dashboards\Widgets\Events\WidgetAddedToDash;
use FlightDeck\Dashboards\Widgets\Events\WidgetUpdated;
use Laracasts\Commander\Events\EventGenerator;

class Widget extends \Eloquent implements PresentableInterface {

	use EventGenerator;

	use PresentableTrait;
	protected $presenter = "FlightDeck\Core\Presenters\Widget";

	// Add your validation rules here
	public static $rules = [

	];

	// Don't forget to fill this array
	protected $fillable = [ 'dashboard_id', 'heading', 'size', 'class', 'type' ];

	public function dashboard() {
		return $this->belongsTo( 'FlightDeck\Dashboards\Dashboard' );
	}

	public function meta() {
		return $this->hasMany( 'FlightDeck\Dashboards\Widgets\WidgetMeta' );
	}

	//ensures that whatever is returned by these fields is a Carbon instance
	public function getDates() {
		return [ 'created_at', 'updated_at' ];
	}

	public static function addToDash( $command ) {
		$widget = new static( get_object_vars( $command ) );
		$widget->raise( new WidgetAddedToDash( $widget ) );

		return $widget;
	}

	public static function updated( $command ) {
		$widget = Widget::findOrFail( $command->id );
		$widget->fill( get_object_vars( $command ) );
		$widget->raise( new WidgetUpdated( $widget ) );
		return $widget;
	}

}
