<?php namespace FlightDeck\Widgets;

use FlightDeck\Repos\DbRepository;
use FlightDeck\Widgets\Widget;
use Illuminate\Support\Facades\DB;

class WidgetRepository extends DbRepository{

	protected $model;

	function __construct(Widget $model)
	{
		$this->model = $model;
	}

	function getSumOfRowInTable($table, $row)
	{
		return DB::table($table)->sum($row);
	}

	function getMaxOfRowInTable($table, $row)
	{
		return DB::table($table)->max($row);
	}

	function calcWidgetValue($id)
	{
		$widget = Widget::find($id);
		$method = $widget->query;
		$widget_array = array('title' => $widget->title, 'value' => $this->$method($widget->table, $widget->row) );
		return $widget_array;
	}

	function calcAllWidgets()
	{
		$widgets = Widget::all();
		$ret_widgets = [];
		foreach($widgets as $widget)
		{
			$method = $widget->query;
			$ret_widgets[] = array('title' => $widget->title, 'value' => $this->$method($widget->table, $widget->row) );
		}

		return $ret_widgets;
	}
}