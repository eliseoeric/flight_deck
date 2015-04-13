<?php namespace FlightDeck\Users;

use FlightDeck\Repos\DbRepository;

use Cartalyst\Sentry\Sentry;

class UserRepository  extends DbRepository{

	protected $model;
	/**
	 * @var Sentry
	 */
	private $sentry;

	public function __construct(User $model, Sentry $sentry)
	{
		$this->model = $model;
		$this->sentry = $sentry;
	}

	public function getById($id)
	{
		$user = $this->sentry->findUserById($id);
		return $user;
	}
}