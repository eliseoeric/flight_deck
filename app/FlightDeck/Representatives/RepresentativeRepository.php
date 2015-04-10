<?php namespace FlightDeck\Representatives;

use FlightDeck\Repos\DbRepository;
use FlightDeck\Representatives\Representative;
use Illuminate\Support\Facades\DB;

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

	function getRepsWithOrders()
	{
		return Representative::with('purchaseOrders')->get();
	}

	function getRepOrders($id)
	{
//		return Representative::find($id)->purchaseOrders()->get();
		return DB::table('representatives')
			->where('representatives.id', '=', $id)
			->join('customers', 'representatives.id', '=', 'customers.representative_id' )
			->join('purchase_orders', 'customers.id', '=', 'purchase_orders.customer_id')
			->join('manufacturers', 'purchase_orders.manufacturer_id', '=', 'manufacturers.id')
			->join('dealers', 'purchase_orders.dealer_id', '=', 'dealers.id')
			->select(
				'purchase_orders.id AS order_id',
				'purchase_orders.amount',
				'manufacturers.name AS manufacturer',
				'manufacturers.id AS manufacturer_id',
				'representatives.id AS rep_id',
				'representatives.first_name',
				'representatives.last_name',
				'dealers.id AS dealer_id',
				'dealers.name AS dealer',
				'customers.name AS customer',
				'customers.id AS customer_id'
			)
			->get();
	}

}