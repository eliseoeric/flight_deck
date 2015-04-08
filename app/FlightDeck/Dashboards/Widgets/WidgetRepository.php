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

	function getWidgetMeta($id, $key)
	{
		return Widget::find($id)->meta()->where('meta_key', '=', $key)->first()->meta_value;
	}

	function getSumOfRowInTable($table, $row)
	{
		return DB::table($table)->sum($row);
	}

	function getMaxOfRowInTable($table, $row)
	{
		return DB::table($table)->max($row);
	}

	function count($widget)
	{
		$table = $this->getWidgetMeta($widget->id, 'table');
		return DB::table($table)->count();
	}

	function sum($widget)
	{
		$table = $this->getWidgetMeta($widget->id, 'table');
		$row = $this->getWidgetMeta($widget->id, 'row');
		return DB::table($table)->sum($row);
	}

	function sumToday($widget)
	{
		$table = $this->getWidgetMeta($widget->id, 'table');
		$row = $this->getWidgetMeta($widget->id, 'row');

		return DB::table($table)->where('created_at', '>=', Carbon::now()->today())->sum($row);
	}

	public function constructWidget( $widget )
	{
		$method = $this->getWidgetMeta($widget->id, 'query');
		$ret = array(
			'id'    =>  $widget->id,
			'heading' =>    $widget->heading,
			'value'     =>  $this->$method($widget),
			'size'      =>  $widget->size,
			'type'      =>  $widget->type,
			'class'     =>  $widget->class
		);
		return $ret;
	}
}