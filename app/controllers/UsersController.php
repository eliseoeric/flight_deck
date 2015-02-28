<?php
use FlightDeck\Users\UpdateUserCommand;
use FlightDeck\Registration\RegisterUserCommand;
use FlightDeck\Forms\UserUpdateForm;
use FlightDeck\Forms\RegistrationForm;
use FlightDeck\Core\CommandBus;
use FlightDeck\Users\User;

class UsersController extends \BaseController {
	Use CommandBus;
	/**
	 * @var UserUpdateForm
	 */
	private $userUpdateForm;
	private $registrationForm;


	/**
	 * @param UserUpdateForm $userUpdateForm
	 * @param RegistrationForm $registrationForm
	 */
	public function __construct(UserUpdateForm $userUpdateForm, RegistrationForm $registrationForm)
	{
		$this->userUpdateForm = $userUpdateForm;

		//Redirect to '/' if you are logged in
		$this->beforeFilter('admin');

		$this->registrationForm = $registrationForm;
	}
	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		//get all users from database
		$users = User::all();
		//send that to view
		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		// Validate the form input
		$this->userUpdateForm->validate(Input::all());

		extract(Input::only('username', 'email', 'password', 'first_name', 'last_name'));

		$user  = $this->execute(
			new RegisterUserCommand($username, $email, $password, $first_name, $last_name)
		);

		Flash::success($user->username . ' was successfully created');
		return  Redirect::back();
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
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
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = Sentry::findUserById($id);

		return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//Validate the user input -- this could be updated to have more advanced
		//validation and feedback
		$this->userUpdateForm->validate(Input::all());
		//get the user by the id
		$user_wid = Sentry::findUserById($id);
		//get the form input
		$user_details = Input::only('username', 'email', 'first_name', 'last_name');
		//don't overwrite the password with an empty string
		if(Input::has('password'))
		{
			$user_details['password'] = Input::get('password');
		}
		//run update user command
		$user  = $this->execute(
			new UpdateUserCommand($user_wid, $user_details)
		);

		Flash::success($user->username . ' was updated successfully');
		return Redirect::route('admin.users.edit', ['id' => $id]);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}