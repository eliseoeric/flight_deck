<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use FlightDeck\Regions\Region;

class RegionsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$regions = [
			'Northwest',
			'North Central',
			'Northeast',
			'East Central',
			'West Central',
			'Southeast',
			'Southwest',
			'South'
		];
		foreach($regions as $region)
		{
			Region::create([
				'region' => $region,
				'created_at' => $faker->dateTime(),
				'updated_at' => $faker->dateTime()
			]);
		}
	}

}