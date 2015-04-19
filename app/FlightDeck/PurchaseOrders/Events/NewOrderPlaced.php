<?php namespace FlightDeck\PurchaseOrders\Events;

use FlightDeck\PurchaseOrders\PurchaseOrder;

class NewOrderPlaced {

	/**
	 * @var PurchaseOrder
	 */
	public $order;

	public function __construct(PurchaseOrder $order)
	{

		$this->order = $order;
	}
}