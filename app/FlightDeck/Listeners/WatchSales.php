<?php


namespace FlightDeck\Listeners;


use Exception;
use FlightDeck\Customers\CustomersRepository;
use FlightDeck\PurchaseOrders\Events\NewOrderPlaced;
use FlightDeck\Representatives\RepresentativeRepository;
use Laracasts\Commander\Events\EventListener;

class WatchSales extends EventListener{

	/**
	 * @var CustomersRepository
	 */
	private $customersRepo;
	/**
	 * @var RepresentativeRepository
	 */
	private $repRepo;

	public function __construct(CustomersRepository $customersRepo, RepresentativeRepository $repRepo)
	{
		$this->customersRepo = $customersRepo;
		$this->repRepo = $repRepo;
	}
	public function whenNewOrderPlaced(NewOrderPlaced $event)
	{

		$customer = $this->customersRepo->getById($event->order->customer_id);
		try
		{
			$this->repRepo->updateSales($customer->representative_id, $event->order->amount);
		}
		catch(Exception $e)
		{
			dd($e);
		}

	}

}