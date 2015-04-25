<?php namespace FlightDeck\PurchaseOrders;


use FlightDeck\Customers\CustomersRepository;
use Laracasts\Commander\Events\DispatchableTrait;

class NewOrderPlacedCommandHandler {

	use DispatchableTrait;

	/**
	 * @var PurchseOrdersRepository
	 */
	private $ordersRepo;
	/**
	 * @var CustomersRepository
	 */
	private $customersRepo;

	public function __construct(PurchseOrdersRepository $ordersRepo, CustomersRepository $customersRepo)
	{

		$this->ordersRepo = $ordersRepo;
		$this->customersRepo = $customersRepo;
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