<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use FlightDeck\Dashboards\Dashboard;
use FlightDeck\Dashboards\Widgets\Widget;
use FlightDeck\Dashboards\Widgets\WidgetMeta;
class WidgetsDashboardSeeder extends Seeder {

	public function run()
	{
		$dashboard = Dashboard::create([
			'heading' => 'Downing Management Sales Overview',
			'owner' => 2
		]);


		$widgets = array(
			'pos1' => array(
				'dashboard_id' => $dashboard->id,
				'heading' =>    "Today's Sales",
				'size'  =>  'large-3',
				'class' => '',
				'type'  => 'sumToday'
			),
			'pos2' => array(
				'dashboard_id' => $dashboard->id,
				'heading' => "Yesterday's Sales",
				'size' => 'large-3',
				'class' => '',
				'type' => 'sumYesterday'
			)
		);

		foreach($widgets as $widget)
		{
			Widget::create($widget);
		}

		$widgetMetas = array(
			'meta1' => array(
				'widget_id' => 1,
				'meta_key' => 'table',
				'meta_value' => 'purchase_orders'
			),
			'meta2' => array(
				'widget_id' => 1,
				'meta_key' => 'row',
				'meta_value' => 'amount'
			),
			'meta3' => array(
				'widget_id' => 2,
				'meta_key' => 'table',
				'meta_value' => 'purchase_orders'
			),
			'meta4' => array(
				'widget_id' => 2,
				'meta_key' => 'row',
				'meta_value' => 'amount'
			)
		);

		foreach($widgetMetas as $widgetMeta)
		{
			WidgetMeta::create($widgetMeta);
		}

	}

}