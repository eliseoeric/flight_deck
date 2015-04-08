<?php namespace FlightDeck\Representatives\Events;


use FlightDeck\Representatives\Representative;

class RepOnBoarded {
	public $rep;

	/**
	 * @param Representative $rep
	 *
	 */
	public function __construct(Representative $rep)
	{
		// This is an event handler, from here we have access to the
		// user model, and can perform actions on it
		// such as sending emails, or adding to groups.
		$this->rep = $rep;

	}
}