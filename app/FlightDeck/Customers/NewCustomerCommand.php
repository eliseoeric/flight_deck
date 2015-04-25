<?php namespace FlightDeck\Customers;


class NewCustomerCommand {

	public $name;
	public $city;
	public $zipcode;
	public $phone;
	public $email;
	public $address;

	public function __construct($name, $address, $city, $zipcode, $phone, $email)
	{
		$this->name = $name;
		$this->city = $city;
		$this->zipcode = $zipcode;
		$this->phone = $phone;
		$this->email = $email;
		$this->address = $address;
	}
}