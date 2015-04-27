<?php namespace FlightDeck\PurchaseOrders;



use Carbon\Carbon;
use FlightDeck\Repos\DbRepository;
use Illuminate\Support\Facades\DB;

class PurchseOrdersRepository extends DbRepository{

	/**
	 * @var
	 */
	private $order;

	public function __construct(PurchaseOrder $order)
	{
		$this->order = $order;
	}

	public function totalOrdersThisMonth()
	{
		return PurchaseOrder::where( 'created_at', '<', Carbon::now()->endOfDay() )
			->where( 'created_at', '>=', Carbon::now()->subMonth() )
			->get();
	}

	function getOrdersWithDetails()
	{
		return DB::table('purchase_orders')
			->join('customers', 'purchase_orders.customer_id', '=', 'customers.id')
			->join('manufacturers', 'purchase_orders.manufacturer_id', '=', 'manufacturers.id')
			->join('dealers', 'purchase_orders.dealer_id', '=', 'dealers.id')
			->select(
				'purchase_orders.id',
				'purchase_orders.amount AS amount',
				'customers.name AS customer',
				'purchase_orders.customer_id',
				'manufacturers.name AS manufacturer',
				'manufacturers.id AS manufacturer_id',
				'purchase_orders.amount',
				'dealers.id AS dealer_id',
				'dealers.name AS dealer'
			)->get();

	}
}