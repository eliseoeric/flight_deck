<?php namespace FlightDeck\PurchaseOrders;

use FlightDeck\PurchaseOrders\Events\NewOrderPlaced;
use FlightDeck\Representatives\Representative;
use Laracasts\Commander\Events\EventGenerator;

class PurchaseOrder extends \Eloquent {
	use EventGenerator;

	// Add your validation rules here
	public static $rules = [

	];


	// Don't forget to fill this array
	protected $fillable = ['order_number', 'customer_id', 'amount', 'dealer_id','manufacturer_id'];

	/**
	 * @return mixed
	 */
	public function customer()
	{
		return $this->belongsTo('FlightDeck\Customers\Customer');
	}

	/**
	 * @return mixed
	 */
	public function dealer()
	{
		return $this->belongsTo('FlightDeck\Dealers\Dealer');
	}

	/**
	 * @return mixed
	 */
	public function manufacturer()
	{
		return $this->belongsTo('FlightDeck\Manufacturers\Manufacturer');
	}

	//ensures that whatever is returned by these fields is a Carbon instance
	public function getDates()
	{
		return ['created_at', 'updated_at'];
	}

	public static function placeOrder($command)
	{
		$order = new static( get_object_vars( $command ) );
//		dd($order);
		$order->raise( new NewOrderPlaced( $order ) );
		return $order;
	}
}