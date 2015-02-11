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
		$user = User::register(
			$command->username, $command->email, $command->password
		);

		$this->repository->save($user);

		$this->dispatchEventsFor($user);

		return $user;

	}}