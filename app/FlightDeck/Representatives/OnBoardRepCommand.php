<?php namespace FlightDeck\Representatives;


class OnBoardRepCommand {

	public $first_name;
	public $last_name;
	public $email;
	public $phone;

	public function __construct($first_name, $last_name, $email, $phone)
	{
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->email = $email;
		$this->phone = $phone;
	}
}