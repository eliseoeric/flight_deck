<?php namespace FlightDeck\Customers;

use FlightDeck\Forms\NewCustomerForm;

class NewCustomerValidator {

	/**
	 * @var NewCustomerForm
	 */
	private $newCustomerForm;

	public function __construct(NewCustomerForm $newCustomerForm)
	{

		$this->newCustomerForm = $newCustomerForm;
	}

	public function validate($command)
	{
		$this->newCustomerForm->validate(get_object_vars($command));
	}
}