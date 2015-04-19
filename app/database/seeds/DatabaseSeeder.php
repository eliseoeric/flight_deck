<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('GroupsTableSeeder');
		$this->call('UsersTableSeeder');
//		$this->call('RegionsTableSeeder');
//		$this->call('CountiesTableSeeder');
		$this->call('RepresentativesTableSeeder');
		$this->call('DealersTableSeeder');
		$this->call('ManufacturersTableSeeder');
		$this->call('CitiesTableSeeder');
		$this->call('CustomersTableSeeder');
		$this->call('PurchaseOrdersTableSeeder');
		$this->call('WidgetsDashboardSeeder');
	}

}
