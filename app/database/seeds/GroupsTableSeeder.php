<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GroupsTableSeeder extends Seeder {

	public function run()
	{
		$group = Sentry::createGroup(array(
			'name' => 'Admins',
			'permissions' => array(
				'admin' => 1,
				'users' => 1,
			),
		));

	}

}