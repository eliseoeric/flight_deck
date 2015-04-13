<?php
use FlightDeck\Users\UpdateUserCommand;
use FlightDeck\Registration\RegisterUserCommand;
use FlightDeck\Forms\UserUpdateForm;
use FlightDeck\Forms\RegistrationForm;
use FlightDeck\Users\UserRepository;
use Laracasts\Commander\CommanderTrait;
use FlightDeck\Users\User;

class UsersController extends \BaseController {

	use CommanderTrait;

	/**
	 * @var UserUpdateForm
	 */
	private $userUpdateForm;
	private $registrationForm;
	/**
	 * @var UserRepository
	 */
	private $userRepo;


	/**
	 * @param UserUpdateForm $userUpdateForm
	 * @param RegistrationForm $registrationForm
	 * @param UserRepository $userRepository
	 */
	public function __construct(UserUpdateForm $userUpdateForm, RegistrationForm $registrationForm, UserRepository $userRepository)
	{
		$this->userUpdateForm = $userUpdateForm;

		//Redirect to '/' if you are logged in
		$this->beforeFilter('admin');

		$this->registrationForm = $registrationForm;
		$this->userRepo = $userRepository;
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
		$users = $this->userRepo->getAll();
		//send that to view
		return View::make('users.index', compact('users'));
	}

	public function jsonAll()
	{
		$users = $this->userRepo->getAll();
		return Response::json($users);
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
		$user = $this->userRepo->getById($id);

		return View::make( 'users.edit', compact('user') );
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
		$input = Input::all();
		$input['id'] = $id;

		try
		{
			if( Input::has('password') )
			{
				$user = $this->execute(UpdateUserCommand::class, $input);
			} else {
				$input['password'] = null;
				$user = $this->execute(UpdateUserCommand::class, $input);
			}
			Flash::success($user->username . ' was updated successfully');
		}
		catch(Exception $e){
			Flash::error($e->getMessage());
		}

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