<?php namespace FlightDeck\Customers;


class UpdateCustomerCommand {
	public $name;
	public $city;
	public $zipcode;
	public $phone;
	public $email;
	public $address;
	public $id;

	public function __construct($name, $address, $city, $zipcode, $phone, $email, $id)
	{
		$this->name = $name;
		$this->city = $city;
		$this->zipcode = $zipcode;
		$this->phone = $phone;
		$this->email = $email;
		$this->address = $address;
		$this->id = intval($id);
	}
}