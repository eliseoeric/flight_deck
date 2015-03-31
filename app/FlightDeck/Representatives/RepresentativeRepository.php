<?php namespace FlightDeck\Representatives;

use FlightDeck\Repos\DbRepository;
use FlightDeck\Representatives\Representative;
class RepresentativeRepository extends DbRepository{

	protected $model;

	function __construct(Representative $model)
	{
		$this->model = $model;
	}

	function getRepsWithRegions()
	{
		return Representative::with('regions')->get();
	}
}