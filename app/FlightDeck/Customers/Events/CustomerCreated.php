<?php namespace FlightDeck\Customers\Events;


use FlightDeck\Customers\Customer;

class CustomerCreated {

	/**
	 * @var Customer
	 */
	public $customer;

	public function __construct(Customer $customer)
	{
		// This is an event handler, from here we have access to the
		// user model, and can perform actions on it
		// such as sending emails, or adding to groups.

		$this->customer = $customer;
	}
}