<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use FlightDeck\Manufacturers\Manufacturer;

class ManufacturersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Manufacturer::create([
				'name' => $faker->word,
				'address' => $faker->streetAddress,
				'city' => $faker->city,
				'zip' => $faker->postcode,
				'state' => $faker->state,
				'phone' => $faker->phoneNumber,
				'email' => $faker->companyEmail
			]);
		}
	}

}