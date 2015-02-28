<?php namespace FlightDeck\Registration;


class RegisterUserCommand {
	public $username;
	public $email;
	public $password;
	public $first_name;
	public $last_name;

	public function __construct($username, $email, $password, $first_name="", $last_name="")
	{
	    $this->email = $email;
		//dd($password); step 1
		$this->password = $password;
		$this->username = $username;
		$this->first_name = $first_name;
		$this->last_name = $last_name;
	}

}