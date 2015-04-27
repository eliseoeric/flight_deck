<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use FlightDeck\Representatives\Representative;

class RepresentativesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		Representative::create([
			'first_name'    =>  'Frank',
			'last_name'     =>  'Bailey',
			'phone'         =>  $faker->phoneNumber,
			'email'         =>  $faker->email,
			'net_sales'     =>  0,
			'sales_goal'    =>  $faker->numberBetween(1000, 50000)
		]);
		Representative::create([
			'first_name'    =>  'Gene',
			'last_name'     =>  'Downing',
			'phone'         =>  $faker->phoneNumber,
			'email'         =>  $faker->email,
			'net_sales'     =>  0,
			'sales_goal'    =>  $faker->numberBetween(1000, 50000)
		]);
		Representative::create([
			'first_name'    =>  'Shana',
			'last_name'     =>  'Downing',
			'phone'         =>  $faker->phoneNumber,
			'email'         =>  $faker->email,
			'net_sales'     =>  0,
			'sales_goal'    =>  $faker->numberBetween(1000, 50000)
		]);
		Representative::create([
		'first_name'    =>  'Jennifer',
		'last_name'     =>  'Gomez',
		'phone'         =>  $faker->phoneNumber,
		'email'         =>  $faker->email,
		'net_sales'     =>  0,
		'sales_goal'    =>  $faker->numberBetween(1000, 50000)
	]);
	}

}