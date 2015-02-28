<?php namespace FlightDeck\Registration\Events;

use FlightDeck\Users\User;
class UserDetailsUpdated {
	public $user;

	/**
	 * @param User $user
	 */
	public function __construct(User $user)
	{
		// This is an event handler, from here we have access to the
		// user model, and can perform actions on it
		// such as sending emails, or adding to groups.
		$this->user = $user;

	}
}