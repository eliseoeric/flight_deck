<?php namespace FlightDeck\Dashboards\Widgets;

use Carbon\Carbon;
use FlightDeck\Repos\DbRepository;
use FlightDeck\Dashboards\Widgets\Widget;
use Illuminate\Support\Facades\DB;

class WidgetRepository extends DbRepository{

	protected $model;

	function __construct(Widget $model)
	{
		$this->model = $model;
	}

	function widgetWMeta($id)
	{
		return Widget::with('meta')->where('id', $id)->get();
	}

	public function getAllWithMeta()
	{
		return $this->model->with('meta')->get();
	}
}