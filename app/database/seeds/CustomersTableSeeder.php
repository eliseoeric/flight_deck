<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use FlightDeck\Customers\Customer;
use FlightDeck\Zipcodes\Zipcode;
use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');



		foreach(range(1, 10) as $index)
		{

			$customer = new Customer([
				'name'      =>  $faker->word,
				'address'   =>  $faker->streetAddress,
				'state'     =>  'fl',
				'phone'     =>  $faker->phoneNumber,
				'rep_id'    => $faker->numberBetween(1,10),
				'zipcode_id' => 4
			]);

			$customer->save();

		}

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}