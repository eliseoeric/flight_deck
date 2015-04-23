<?php namespace FlightDeck\Regions;

use Carbon\Carbon;
use FlightDeck\Regions\Region;
use FlightDeck\Repos\DbRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class RegionsRepository extends DbRepository{
	protected $model;

	public function __construct(Region $model)
	{
		$this->model = $model;
	}

	public function getRegionsWithReps()
	{
		return Region::with('Representatives')->get();
	}

	public function getRegionsOrders()
	{
		return Region::with('customers.purchase_orders', 'representatives')->get();

	}

//	public function getRegionsRepsOrders()
//	{
//		return Collection::make(
//			DB::table('regions')
//			  ->join('counties', 'regions.id', '=', 'counties.region_id')
//			  ->join('representatives', 'counties.representative_id', '=', 'representatives.id')
//			  ->join('customers', 'representatives.id', '=', 'customers.representative_id')
//			  ->join('purchase_orders', 'customers.id', '=', 'purchase_orders.customer_id')
//			  ->where('purchase_orders.created_at', '<', Carbon::now()->endOfDay() )
//			  ->where('purchase_orders.created_at', '>=', Carbon::now()->subMonths(3))
//			  ->select(
//				  'purchase_orders.id AS order_id',
//				  'purchase_orders.amount AS order_amount',
//				  'representatives.id AS rep_id',
//				  'representatives.first_name AS rep_first_name',
//				  'representatives.last_name AS rep_last_name',
//				  'regions.id AS region_id',
//				  'regions.region AS region_name'
//			  )
//			  ->get()
//		);
//
//	}

}