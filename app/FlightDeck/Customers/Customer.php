<?php namespace FlightDeck\Customers;


use FlightDeck\Customers\Events\CustomerCreated;
use Laracasts\Commander\Events\EventGenerator;
class Customer extends \Eloquent {

	use EventGenerator;

	// Add your validation rules here
	public static $rules = [

	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'address', 'city', 'zip', 'state', 'phone', 'representative_id', 'region_id'];

	public function purchase_orders()
	{
		return $this->hasMany('FlightDeck\PurchaseOrders\PurchaseOrder');
	}

	public function representative()
	{
		return $this->belongsTo('FlightDeck\Representatives\Representative');
	}

	public function region()
	{
		return $this->belongsTo('FlightDeck\Regions\Region');
	}

	public static function createCustomer($command)
	{
		$customer = new static (get_object_vars($command));
		$customer->raise( new CustomerCreated($customer));
		return $customer;
	}

}