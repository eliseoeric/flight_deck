<?php namespace FlightDeck\Widgets\Blueprints;


use FlightDeck\Widgets\WidgetBlueprint;

class Backgrid extends WidgetBlueprint{
	public function render()
	{
		return $this->drawTable();
	}

	public function drawTable()
	{
		$meta = $this->meta;
		$resource = $meta['resource'];
		$count = intval($meta['num_columns']);
		$columns = array();
		for($i = 1; $i <= $count; $i++)
		{
			$thisColumn = 'column_' . $i;
			$columns[] = array(
				'name' => $meta[$thisColumn . '_name'],
				'label' => $meta[$thisColumn . '_label'],
				'type' => $meta[$thisColumn . '_type']
			);
		}

		return array( 'resource' => $resource, 'columns' => $columns );
	}
}