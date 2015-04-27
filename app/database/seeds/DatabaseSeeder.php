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
//		$this->call('RegionsTableSeeder');  no
//		$this->call('CountiesTableSeeder'); no
		$this->call('RepresentativesTableSeeder');
		$this->call('DealersTableSeeder');
		$this->call('ManufacturersTableSeeder');
		$this->call('CitiesTableSeeder');
		$this->call('CustomersTableSeeder');
//		$this->call('PurchaseOrdersTableSeeder');
		$this->call('WidgetsDashboardSeeder');
	}

}
