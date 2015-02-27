<?php namespace FlightDeck\Users;


use FlightDeck\Registration\Events\UserRegistered;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Hash;
use Laracasts\Commander\Events\EventGenerator;

class User extends \Eloquent implements UserInterface, RemindableInterface {

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
	 * Passwords must always be hashed
	 * @param $password
	 */
	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	/**
	 *
	 * Register a new user
	 * @param $username
	 * @param $email
	 * @param $password
	 * @return static
	 */
	public static function register( $username, $email, $password )
	{
		// what is a static object?? what does compact do??
//		dd($password); // returns un hashed
		$user = new static(compact('username', 'email', 'password'));
//		dd($user->password); // returns hashed
		$user->raise(new UserRegistered($user));

		return $user;
	}

}
