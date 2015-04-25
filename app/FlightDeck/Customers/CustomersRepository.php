<?php namespace FlightDeck\Customers;


use FlightDeck\Repos\DbRepository;
use Illuminate\Support\Facades\DB;

class CustomersRepository extends DbRepository {

	protected $model;

	public function __construct(Customer $model)
	{
		$this->model = $model;
	}

	public function  getCustomersWithPurchases()
	{
		return $this->model->with('purchase_orders')->get();
	}

	public function getWithRegionOrdersReps()
	{
		return $this->model->with('region', 'representative', 'purchase_orders')
			->get();

	}

}