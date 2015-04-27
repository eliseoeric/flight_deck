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
				'heading' =>    "Sales Today",
				'size'  =>  'large-3',
				'class' => '',
				'type'  => 'Counter'
			),
			'pos2' => array(
				'dashboard_id' => $dashboard->id,
				'heading' => "Sales Yesterday",
				'size' => 'large-3',
				'class' => '',
				'type' => 'Counter'
			),
			'pos3' => array(
				'dashboard_id' => $dashboard->id,
				'heading' => "Sales This Week",
				'size' => 'large-3',
				'class' => '',
				'type' => 'Counter'
			),
			'pos4' => array(
				'dashboard_id' => $dashboard->id,
				'heading' => "Orders to Date",
				'size' => 'large-3',
				'class' => '',
				'type' => 'Counter'
			),
			'pos5' => array(
				'dashboard_id' => $dashboard->id,
				'heading' => "Sales Performance Feed",
				'size' => 'large-12',
				'class' => '',
				'type' => 'PerformanceFeed'
			),
			'pos6' => array(
				'dashboard_id' => $dashboard->id,
				'heading' => "Tabletop Journal",
				'size' => 'large-5',
				'class' => '',
				'type' => 'Newsfeed'
			),
			'pos7' => array(
				'dashboard_id' => $dashboard->id,
				'heading' => "Purchase Orders List",
				'size' => 'large-4',
				'class' => '',
				'type' => 'Backgrid'
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
				'widget_id' => 1,
				'meta_key' => 'constraint',
				'meta_value' => 'today'
			),
			'meta4' => array(
				'widget_id' => 2,
				'meta_key' => 'table',
				'meta_value' => 'purchase_orders'
			),
			'meta5' => array(
				'widget_id' => 2,
				'meta_key' => 'row',
				'meta_value' => 'amount'
			),
			'meta6' => array(
				'widget_id' => 2,
				'meta_key' => 'constraint',
				'meta_value' => 'yesterday'
			),
			'meta7' => array(
				'widget_id' => 3,
				'meta_key' => 'table',
				'meta_value' => 'purchase_orders'
			),
			'meta8' => array(
				'widget_id' => 3,
				'meta_key' => 'row',
				'meta_value' => 'amount'
			),
			'meta9' => array(
				'widget_id' => 3,
				'meta_key' => 'constraint',
				'meta_value' => 'week'
			),
			'meta10' => array(
				'widget_id' => 4,
				'meta_key' => 'table',
				'meta_value' => 'purchase_orders'
			),
			'meta11' => array(
				'widget_id' => 4,
				'meta_key' => 'constraint',
				'meta_value' => 'count'
			),
			'meta12' => array(
				'widget_id' => 5,
				'meta_key' => 'resource',
				'meta_value' => 'purchaseOrders'
			),
			'meta13' => array(
				'widget_id' => 6,
				'meta_key' => 'url',
				'meta_value' => 'http://www.tabletopjournal.com/1/feed'
			),
			'meta14' => array(
				'widget_id' => 7,
				'meta_key' => 'resource',
				'meta_value' => 'purchaseOrders'
			),
			'meta15' => array(
				'widget_id' => 7,
				'meta_key' => 'num_columns',
				'meta_value' => '3'
			),
			'meta16' => array(
				'widget_id' => 7,
				'meta_key' => 'column_1_name',
				'meta_value' => 'order_number'
			),
			'meta17a' => array(
				'widget_id' => 7,
				'meta_key' => 'column_1_label',
				'meta_value' => 'Order #'
			),
			'meta17' => array(
				'widget_id' => 7,
				'meta_key' => 'column_1_type',
				'meta_value' => 'uri-id'
			),
			'meta18' => array(
				'widget_id' => 7,
				'meta_key' => 'column_2_name',
				'meta_value' => 'customer'
			),
			'meta19a' => array(
				'widget_id' => 7,
				'meta_key' => 'column_2_label',
				'meta_value' => 'Customer'
			),
			'meta20a' => array(
				'widget_id' => 7,
				'meta_key' => 'column_2_type',
				'meta_value' => 'uri-id'
			),
			'meta21' => array(
				'widget_id' => 7,
				'meta_key' => 'column_3_name',
				'meta_value' => 'amount'
			),
			'meta19' => array(
				'widget_id' => 7,
				'meta_key' => 'column_3_label',
				'meta_value' => 'Sales'
			),
			'meta20' => array(
				'widget_id' => 7,
				'meta_key' => 'column_3_type',
				'meta_value' => 'Number'
			),
		);

		foreach($widgetMetas as $widgetMeta)
		{
			WidgetMeta::create($widgetMeta);
		}

	}

}