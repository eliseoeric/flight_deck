<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use FlightDeck\Customers\Customer;
use FlightDeck\Zipcodes\Zipcode;
use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			$zip = Zipcode::find($faker->numberBetween(1,1200))->with('city')->get();

			$customer = new Customer([
				'name'      =>  $faker->word,
				'address'   =>  $faker->streetAddress,
				'state'     =>  'fl',
				'phone'     =>  $faker->phoneNumber,
				'rep_id'    => $faker->numberBetween(1,10),
				'zipcode'   => $zip[0]->zipcode,
				'city'      => $zip[0]->city->city
			]);

			$customer->save();

		}

	}

}