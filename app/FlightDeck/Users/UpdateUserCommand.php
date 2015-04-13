<?php namespace FlightDeck\Users;


class UpdateUserCommand {
	public $username;
	public $email;
	public $first_name;
	public $last_name;
	public $password;
	public $id;

	public function __construct($username, $email, $first_name, $last_name, $password=null, $id)
	{
		$this->username = $username;
		$this->email = $email;
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->password = $password;
		$this->id = $id;
	}

}