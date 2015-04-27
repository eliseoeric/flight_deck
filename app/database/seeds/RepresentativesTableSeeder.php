<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use FlightDeck\Representatives\Representative;

class RepresentativesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 5) as $index)
		{

			$rep = new Representative([
				'first_name'    =>  $faker->firstName,
				'last_name'     =>  $faker->lastName,
				'phone'         =>  $faker->phoneNumber,
				'email'         =>  $faker->email,
				'net_sales'     =>  0,
				'sales_goal'    =>  $faker->numberBetween(1000, 50000)
			]);
			$rep->save();

		}
	}

}