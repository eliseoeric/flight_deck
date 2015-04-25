<?php namespace FlightDeck\Customers;


use FlightDeck\Zipcodes\ZipcodesRepository;
use Laracasts\Commander\Events\DispatchableTrait;

class NewCustomerCommandHandler {

	use DispatchableTrait;

	/**
	 * @var CustomersRepository
	 */
	private $customersRepo;
	/**
	 * @var ZipcodeRepository
	 */
	private $zipRepo;

	public function __construct(CustomersRepository $customersRepo, ZipcodesRepository $zipRepo)
	{
		$this->customersRepo = $customersRepo;
		$this->zipRepo = $zipRepo;
	}

	public function handle( $command )
	{
		$zip = $this->zipRepo->getZip($command->zipcode);
		$command->zipcode = $zip->zipcode;
		$command->city = $zip->city->city;

		$region = $this->zipRepo->getRegionAndRep($zip->id);
		$command->region_id = $region->region_id;
		$command->representative_id = $region->representative_id;

		$customer = Customer::createCustomer($command);
		if($this->customersRepo->save($customer))
		{
			$this->dispatchEventsFor($customer);
			return $customer;
		}
		else
		{
			return false;
		}

	}
}