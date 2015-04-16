<?php namespace FlightDeck\Dashboards\Widgets;


use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class AddNewWidgetCommandHandler implements CommandHandler{
	use DispatchableTrait;
	/**
	 * @var WidgetRepository
	 */
	private $widgetRepo;

	/**
	 * @param WidgetRepository $widgetRepo
	 */
	public function __construct(WidgetRepository $widgetRepo)
	{

		$this->widgetRepo = $widgetRepo;
	}
	/**
	 * Handle the command
	 *
	 * @param $command
	 *
	 * @return mixed
	 */
	public function handle( $command ) {
		$widget = Widget::addToDash($command);
		if($this->widgetRepo->save($widget))
		{
			$this->dispatchEventsFor($widget);
			return $widget;
		}
		else
		{
			return false;
		}
	}
}