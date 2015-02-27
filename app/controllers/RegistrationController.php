<?php

use FlightDeck\Registration\RegisterUserCommand;
use FlightDeck\Forms\RegistrationForm;
use FlightDeck\Core\CommandBus;

class RegistrationController extends \BaseController {
	Use CommandBus;
	/**
	 * @var RegistrationForm
	 */
	private $registrationForm;


	/**
	 * @param RegistrationForm $registrationForm
	 */
	public function __construct(RegistrationForm $registrationForm)
	{
	    $this->registrationForm = $registrationForm;

		//Redirect to '/' if you are logged in
		$this->beforeFilter('guest');

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form to register the user.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Validate the form input
//		$this->registrationForm->validate(Input::all());

		// extract needed fields from the input object
		extract(Input::only('username', 'email', 'password'));

		// pass the input to the RegisterUserCommand DTO and pass that to the CommandBus
		$user  = $this->execute(
			new RegisterUserCommand($username, $email, $password)
		);


		//Authorize the user -- this will need to be changed to use Sentry
//		Auth::login($user);

		Sentry::authenticate([
			'email'    => 'eric@thinkgeneric.com',
			'password' => 'eat'
		]);
		// Redirect back to the home screen with a flash message
		// Note: because alot of this stuff is very browser specific, the controller is the
		// perfect place for it.

		Flash::overlay('<h1>Welcome to ' . $user->username . '</h1><p>Flight Deck is now in your control.</p>');
		return  Redirect::home();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
