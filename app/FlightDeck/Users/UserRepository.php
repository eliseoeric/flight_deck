<?php namespace FlightDeck\Users;


use Cartalyst\Sentry\Sentry;

class UserRepository {
	public $sentry;
	public function __construct(Sentry $sentry)
	{
		$this->sentry = $sentry;
	}
	/**
	 * Persist a user
	 * @param User $user
	 *
	 * @return mixed
	 */
	public function save(User $user)
	{
		return $user->save();
	}
}