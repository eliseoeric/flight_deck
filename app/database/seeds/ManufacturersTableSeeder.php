<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use FlightDeck\Manufacturers\Manufacturer;

class ManufacturersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		Manufacturer::create([
			'name' => 'Front of the House',
			'address' => '9315 Park Dr',
			'city' => 'Miami Shores',
			'zip' => '33138',
			'state' => 'FL',
			'phone' => '305-757-7940',
			'email' => $faker->companyEmail
		]);
		Manufacturer::create([
			'name' => 'Myco Tableware',
			'address' => '14080 Old School Road',
			'city' => 'Mettawa',
			'zip' => '60048',
			'state' => 'IL',
			'phone' => '800-977-6926',
			'email' => 'info@mycotw.com'
		]);
		Manufacturer::create([
			'name' => 'Bertolini HD',
			'address' => '13941 Norton Ave',
			'city' => 'Chino',
			'zip' => '91710',
			'state' => 'CA',
			'phone' => '800-647-7755',
			'email' => $faker->companyEmail
		]);
		Manufacturer::create([
			'name' => 'Holsag Canada',
			'address' => '164 Needham Street',
			'city' => 'Lindsay',
			'zip' => 'k9v5r7',
			'state' => 'ON',
			'phone' => '888-475-0721',
			'email' => 'sales@holsag.com'
		]);
		Manufacturer::create([
			'name' => "Lion's Wood Banquet Furniture, LLC",
			'address' => '151 8th Ave N.W.',
			'city' => 'Glen Burnie',
			'zip' => '21061',
			'state' => 'MD',
			'phone' => '866-822-5374',
			'email' => $faker->companyEmail
		]);
		Manufacturer::create([
			'name' => "Seura",
			'address' => '1230 Ontario RD',
			'city' => 'Green Bay',
			'zip' => '54311',
			'state' => 'WI',
			'phone' => '920-857-9069',
			'email' => $faker->companyEmail
		]);
	}

}