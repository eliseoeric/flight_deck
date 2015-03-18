<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use FlightDeck\Dealers\Dealer;

class DealersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Dealer::create([
				'name' => $faker->domainWord
			]);
		}
	}

}