<?php namespace FlightDeck\PurchaseOrders;


use Laracasts\Commander\Events\DispatchableTrait;

class NewOrderPlacedCommandHandler {

	use DispatchableTrait;

	/**
	 * @var PurchseOrdersRepository
	 */
	private $ordersRepo;

	public function __construct(PurchseOrdersRepository $ordersRepo)
	{

		$this->ordersRepo = $ordersRepo;
	}

	public function handle( $command )
	{
		$order = PurchaseOrder::placeOrder($command);
		if( $this->ordersRepo->save($order))
		{
			$this->dispatchEventsFor($order);
			return $order;
		}
		else
		{
			return false;
		}
	}
}