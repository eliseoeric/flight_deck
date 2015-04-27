<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use FlightDeck\Cities\City;
use FlightDeck\Counties\County;
use FlightDeck\Zipcodes\Zipcode;
use FlightDeck\Regions\Region;
use FlightDeck\Representatives\Representative;

class CitiesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$filename = app_path() . '/uploads/dmg_seed_031415.csv';

		$data = $this->buildCsvObject( $filename );

		$cities = $this->getCitiesList($data);

		$counties = $this->getCountiesList( $data );

		$regions = $this->getRegionsList($data);

		//build regionse
		foreach( $regions as $region )
		{
			Region::create([
				'region' => $region,
			]);
		}

		foreach( $counties as $county )
		{

			$query = DB::table('regions')->where('region', $county['region'])->first();
			$region = Region::find($query->id);
			$new = new County;
			$new->county = $county['name'];
			$new->representative_id = $faker->numberBetween(1,4);
			$new->region()->associate($region);

			$new->save();
		}

		foreach ( $cities as $city )
		{
			$query = DB::table('counties')->where('county', $city['county'])->first();
			$county = County::find($query->id);
			$new = new City;
			$new->city = $city['name'];
			$new->county()->associate($county);

			$new->save();
		}
		foreach($data as $entry)
		{
			$query = DB::table('cities')->where('city', $entry['primary_city'])->first();
			$city = City::find($query->id);
			$new = new Zipcode;
			$new->zipcode = $entry['zip'];
			$new->city()->associate($city);
			$new->save();

		}

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

	public function getCitiesList( $data )
	{
		$return = [];
		$cities = [];
		foreach( $data as $entry )
		{

			if( !$this->in_array_r( $entry['primary_city'], $cities ) )
			{
				$cities[] = $entry['primary_city'];
				$return[] = ['name' => $entry['primary_city'], 'county' => $entry['county']];
			}

		}

		return $return;
	}

	public function getCountiesList( $data )
	{
		$counties = [];
		foreach( $data as $entry )
		{
			if( !$this->in_array_r( $entry['county'], $counties ) )
			{
				$counties[] = ['name' => $entry['county'], 'region' => $entry['region']];
			}
		}
		return $counties;
	}

	public function getRegionsList( $data )
	{
		$regions = [];
		foreach( $data as $entry )
		{
			if( !$this->in_array_r( $entry['region'], $regions ) )
			{
				$regions[] = $entry['region'];
			}
		}

		return $regions;
	}

	public function in_array_r($needle, $haystack, $strict = false) {
		foreach ($haystack as $item) {
			if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_r($needle, $item, $strict))) {
				return true;
			}
		}

		return false;
	}
}