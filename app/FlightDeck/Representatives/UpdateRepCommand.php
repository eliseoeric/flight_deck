<?php namespace FlightDeck\Representatives;


class UpdateRepCommand {
	public $id;
	public $first_name;
	public $last_name;
	public $email;
	public $phone;

	public function __construct($id, $first_name, $last_name, $email, $phone)
	{
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->email = $email;
		$this->phone = $phone;
		$this->id = $id;
	}
}