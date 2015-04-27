<?php namespace FlightDeck\Users;


use Cartalyst\Sentry\Facades\Native\Sentry;
use FlightDeck\Registration\Events\UserRegistered;
use FlightDeck\Registration\Events\UserDetailsUpdated;
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
	protected $fillable = [
		'username',
		'email',
		'password',
		'first_name',
		'last_name'
	];

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
	public static function registration( $username, $email, $password, $first_name, $last_name )
	{

		$user = new static(compact('username', 'email', 'password', 'first_name', 'last_name'));
//		dd($user->password); // returns hashed
		$user->raise(new UserRegistered($user));

		return $user;
	}



	public static function updateUserDetails($command)
	{
		$user = User::findOrFail($command->id);
		foreach($command as $detail => $key)
		{
			if($key != null)
			{
				$user->{$detail} = $key;
			}
		}
		$user->raise(new UserDetailsUpdated( $user ) );
		return $user;

	}

	public function regions(){
		return $this->belongsToMany('Region');
	}

}
