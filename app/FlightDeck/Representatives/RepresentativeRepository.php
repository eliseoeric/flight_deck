<?php namespace FlightDeck\Representatives;

use Carbon\Carbon;
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
//		return Representative::with('regions')->get();
		return $this->model->with('regions')->get();
	}

	function getRepsWithOrders()
	{
//		return Representative::with('purchaseOrders')->get();
		return $this->model->with('purchaseOrders')->get();
	}

	function getRepWithOrdersThisMonth($id)
	{
//		return Representative::with('purchaseOrdersThisMonth')->where('id', '=', $id)->first();
		return $this->model->with('purchaseOrdersThisMonth')->where('id', '=', $id)->first();
	}

	function getRepCounties($id)
	{
		return $this->model->with('counties')->where('id', '=', $id)->first();
	}

	function getRepsSalesThisMonth()
	{
//		return Representative::with('purchaseOrdersThisMonth')->get();
		return $this->model->with('purchaseOrdersThisMonth', 'counties')->get();
	}

	function getRepsSalesThisWeek()
	{
//		return Representative::with('purchaseOrdersThisWeek')->get();
		return $this->model->with('purchaseOrdersThisWeek')->get();
	}

	function updateSales($id, $amount)
	{
		$rep = $this->model->findOrFail($id);
		$rep->net_sales += $amount;
		return $rep->save();
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