<?php namespace FlightDeck\Counties;

use FlightDeck\Counties\County;
use FlightDeck\Repos\DbRepository;

class CountyRepository extends DbRepository{

	public function __construct(County $model)
	{
		$this->model = $model;
	}

	public function assignRep($id, $repId)
	{
		$county = $this->model->findOrFail($id);
		$county->representative_id = $repId;
		return $county->save();
	}
}