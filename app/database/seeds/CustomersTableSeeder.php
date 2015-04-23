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
			$zip = Zipcode::with('city.county.representative', 'city.county.region')->find($faker->numberBetween(1,1200));

			$customer = new Customer([
				'name'      =>  $faker->word,
				'address'   =>  $faker->streetAddress,
				'state'     =>  'fl',
				'phone'     =>  $faker->phoneNumber,
				'representative_id'    => $zip->city->county->representative->id,
				'zipcode'   => $zip->zipcode,
				'city'      => $zip->city->city,
				'region_id' => $zip->city->county->region->id
			]);

			$customer->save();

		}

	}

}