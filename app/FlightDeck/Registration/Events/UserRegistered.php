<?php namespace FlightDeck\Registration\Events;


use FlightDeck\Users\User;

class UserRegistered {
	public $user;

	/**
	 * @param User $user
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}
}