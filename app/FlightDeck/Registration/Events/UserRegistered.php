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
		$this->attemptActivation($this->user);
	}

	public function attemptActivation( $user )
	{
		try{
			if($user->attemptActivation($user->getActivationCode()))
			{
				//send a welcome email
				return;
			}
			else
			{
				// This needs to be an error
				dd("user activation failed");
			}
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			echo "The user was not found";
		}
		catch (Cartalyst\Sentry\Users\UserAlreadyActivatedException $e)
		{
			echo "The user is already activated";
		}
	}
}