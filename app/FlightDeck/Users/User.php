<?php namespace FlightDeck\Users;


use FlightDeck\Registration\Events\UserRegistered;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Hash;
use Laracasts\Commander\Events\EventGenerator;
use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;

class User extends SentryUserModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator;
	/*
	 * Which fields may be mass assigned ?
	 *
	 * @var array
	 * */
	protected $fillable = [ 'username', 'email', 'password' ];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array( 'password', 'remember_token' );

	/**
	 *
	 * Register a new user
	 * @param $username
	 * @param $email
	 * @param $password
	 * @return static
	 */
	public static function register_fake( $username, $email, $password )
	{
		// what is a static object?? what does compact do??
//		dd($password); step 4 -- not yet hashed
		$user = new static(compact('username', 'email', 'password'));

//		dd($user); //step 5 -- password is now hashed

		$user->raise(new UserRegistered($user));

		return $user;
	}

}
