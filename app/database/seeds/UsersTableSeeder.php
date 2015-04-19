<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use FlightDeck\Users\User;
class UsersTableSeeder extends Seeder {

	public function run()
	{
		$user = User::create([
			'email'         =>  'eric@thinkgeneric.com',
			'username'      =>  'eliseoeric',
			'password'      =>  'eat@joes1',
			'first_name'    =>  'eric',
			'last_name'     =>  'eliseo',
			'activated'     =>  true,
		]);

		$adminGroup = Sentry::findGroupById(1);

		$user->addGroup($adminGroup);

		$user2 = User::create([
			'email'         =>  'geeque75@gmail.com',
			'username'      =>  'geeque75',
			'password'      =>  'geeque75',
			'first_name'    =>  'gene',
			'last_name'     =>  'downing',
			'activated'     =>  true,
		]);

		$user2->addGroup($adminGroup);
	}

}