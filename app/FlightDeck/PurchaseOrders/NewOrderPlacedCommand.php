<?php namespace FlightDeck\PurchaseOrders;

class NewOrderPlacedCommand {

	public $order_number;
	public $customer_id;
	public $manufacturer_id;
	public $dealer_id;
	public $amount;
	/**
	 * @var null
	 */
	public $created_at;

	public function __construct($order_number, $customer_id, $manufacturer_id, $dealer_id, $amount, $created_at = null)
	{
		$this->order_number = $order_number;
		$this->customer_id = $customer_id;
		$this->manufacturer_id = $manufacturer_id;
		$this->dealer_id = $dealer_id;
		$this->amount = $amount;
		$this->created_at = $created_at;
	}
}
