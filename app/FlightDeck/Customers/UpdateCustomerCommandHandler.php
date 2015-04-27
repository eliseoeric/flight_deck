<?php namespace FlightDeck\Customers;


use FlightDeck\Zipcodes\ZipcodesRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class UpdateCustomerCommandHandler implements CommandHandler{

	use DispatchableTrait;

	/**
	 * @var CustomersRepository
	 */
	private $customersRepo;
	/**
	 * @var ZipcodesRepository
	 */
	private $zipRepo;

	public function __construct(CustomersRepository $customersRepo, ZipcodesRepository $zipRepo)
	{

		$this->customersRepo = $customersRepo;
		$this->zipRepo = $zipRepo;
	}

	public function handle($command)
	{
		$zip = $this->zipRepo->getZip($command->zipcode);
		$command->zipcode = $zip->zipcode;
		$command->city = $zip->city->city;

		$region = $this->zipRepo->getRegionAndRep($zip->id);
		$command->region_id = $region->region_id;
		$command->representative_id = $region->representative_id;

		$customer = Customer::updateInfo($command);
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