<?php namespace FlightDeck\Zipcodes;


use FlightDeck\Repos\DbRepository;
use Illuminate\Support\Facades\DB;

class ZipcodesRepository extends DbRepository{

	protected $model;

	/**
	 * @param Zipcode $model
	 */public function __construct(Zipcode $model)
	{
		$this->model = $model;
	}

	public function getCities($id)
	{
		return $this->model->with('city');
	}

	public function getByZip($zip)
	{
		return $this->model->with('city')->where('zipcode', '=', $zip)->first();
	}

	public function getZip($id)
	{
		return $this->model->with('city')->find($id)->first();
	}

	public function getRegionAndRep($id)
	{
		return DB::table('zipcodes')
			->where('zipcodes.id', '=', $id)
			->join('cities', 'zipcodes.city_id', '=', 'cities.id')
			->join('counties', 'cities.county_id', '=', 'counties.id')
			->join('regions', 'counties.region_id', '=', 'regions.id')
			->join('representatives', 'counties.representative_id', '=', 'representatives.id')
			->select('*')->first();
	}
}