<?php namespace FlightDeck\Registration;


use FlightDeck\Users\UserRepository;
use FlightDeck\Users\User;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class RegisterUserCommandHandler implements CommandHandler{

	use DispatchableTrait;

	protected $repository;

	/**
	 * @param UserRepository $repository
	 */
	public function __construct(UserRepository $repository)
	{
	    $this->repository = $repository;
	}

	/**
	 * Handle the command
	 *
	 * @param $command
	 *
	 * @return mixed
	 */
	public function handle( $command ) {
		$user = User::registration(
			$command->username, $command->email, $command->password, $command->first_name, $command->last_name
		);
		//user is returned from User.php
		$this->repository->save($user);
		$this->dispatchEventsFor($user);

		return $user;
	}
}
