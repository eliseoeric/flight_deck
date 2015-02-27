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
//		dd($command->password); step 2
		$user = User::register_fake(
			$command->username, $command->email, $command->password
		);
//		dd($user->password); step 3 -- the password is now hashed

		$test['before_save'] = $user->password;
//		$this->repository->save($user);
		$test['after_save'] = $user->password;
		dd($test);
		$this->dispatchEventsFor($user);

		return $user;

	}}