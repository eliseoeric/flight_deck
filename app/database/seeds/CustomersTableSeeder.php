<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use FlightDeck\Customers\Customer;
use FlightDeck\Zipcodes\Zipcode;
use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$filename = app_path() . '/uploads/dmg_customers.csv';

		$data = $this->buildCsvObject( $filename );
//		dd($data);
		$customers = $this->getCustomerList( $data );
//		dd($customers);
//		dd($customers[0]['zip']);
		foreach($customers as $customer)
		{
			$zip = Zipcode::with('city.county.representative', 'city.county.region')->where('zipcode', '=', $customer['zip'])->first();
//			var_dump($customer);
//			var_dump($zip->city->county->representative->id);
//			var_dump($zip->zipcode);
//			var_dump($zip->city->city);
//			var_dump($zip->city->county->region->id);
//			var_dump( $customer['name'] );
//			die();
			$customer = new Customer([
				'name'      =>  $customer['name'],
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

	public function getCustomerList( $data )
	{
		$customers = [];

		foreach($data as $entry)
		{
			if(!$this->in_array_r($entry['Customers'], $customers))
			{
				$customers[] = array('name' => $entry['Customers'], 'zip' => $entry['zip']);
			}
		}

		return $customers;
	}

	public function in_array_r($needle, $haystack, $strict = false)
	{
		foreach ($haystack as $item) {
			if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_r($needle, $item, $strict))) {
				return true;
			}
		}

		return false;
	}

	public function buildCsvObject( $filename )
	{
		if( !file_exists( $filename ) || !is_readable( $filename ) )
		{
			return "file was not readable or does not exist.";
		}

		$header = NULL;
		$data = [];

		if( ( $handle = fopen( $filename, 'r' ) ) !== FALSE )
		{
			while( ( $row = fgetcsv( $handle, 1000, ',' ) ) !== FALSE )
			{
				if( !$header )
				{
					$header = $row;
				}
				else
				{
					$data[] = array_combine( $header, $row );
				}
			}
			fclose( $handle );
		}

		return $data;
	}

}