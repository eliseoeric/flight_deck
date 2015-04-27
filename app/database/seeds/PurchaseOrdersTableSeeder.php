<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use FlightDeck\PurchaseOrders\PurchaseOrder;
class PurchaseOrdersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 2031) as $index)
		{
			PurchaseOrder::create([
				'customer_id' => $faker->numberBetween(1,10),
				'amount'    =>  $faker->numberBetween(120, 3000),
				'manufacturer_id' => $faker->numberBetween(1,10),
				'dealer_id' => $faker->numberBetween(1,10),
				'created_at' => $faker->dateTimeBetween($startDate = '-120 days', $endDate = 'now')
			]);
		}
	}

}