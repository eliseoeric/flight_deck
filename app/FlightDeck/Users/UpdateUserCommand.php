<?php namespace FlightDeck\Users;


class UpdateUserCommand {
	public $user_details;
	public $user_wid;

	public function __construct($user_wid, $user_details)
	{
		$this->user_wid = $user_wid;
		$this->user_details = $user_details;
	}

}