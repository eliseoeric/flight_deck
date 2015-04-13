<?php namespace FlightDeck\Users;

use FlightDeck\Users\UserRepository;
use FlightDeck\Users\User;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class UpdateUserCommandHandler implements CommandHandler{
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
		$user = User::updateUserDetails( $command );
		$this->repository->save($user);
		$this->dispatchEventsFor($user);

		return $user;
	}
}