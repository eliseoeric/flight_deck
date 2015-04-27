<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use FlightDeck\Core\CSVExtractor;
use FlightDeck\Dealers\Dealer;

class DealersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$csvBuilder = new CSVExtractor();
		$filepath = $filename = app_path() . '/uploads/dmg_dealers.csv';
		$data = $csvBuilder->extractInfo($filepath);

		$dealers = $this->getDealerList($data);

		foreach($dealers as $dealer)
		{
			if($dealer){
				Dealer::create([
					'name' => $dealer
				]);
			}

		}

	}

	public function getDealerList( $data )
	{
		$dealers = [];

		foreach($data as $entry)
		{
			if(!$this->in_array_r($entry['dealers'], $dealers))
			{
				$dealers[] = $entry['dealers'];
			}
		}

		return $dealers;
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

}