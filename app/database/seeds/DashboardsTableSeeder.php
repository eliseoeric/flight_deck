<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use FlightDeck\Dashboards\Dashboard;
use FlightDeck\Dashboards\Widgets\Widget;
use FlightDeck\Dashboards\Widgets\WidgetMeta;
use Faker\Factory as Faker;

class DashboardsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		Dashboard::create([
			'heading'   =>  'Primary Dashboard',
			'owner'     =>  1
		]);
		foreach(range(1, 4) as $index)
		{
			$widget = new Widget([
				'heading'   =>  'Number of Orders',
				'size'      =>  'large-4',
				'class'     =>  '',
				'type'      =>  'counter'
			]);

			$widget->save();
		}

	}

}