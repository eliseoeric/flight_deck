<?php
use FlightDeck\Forms\SignInForm;

class SessionsController extends \BaseController {

	/**
	 * @var SignInForm
	 */
	private $signInForm;

	public function __construct(SignInForm $signInForm)
	{
	    $this->beforeFilter('guest');

		$this->signInForm = $signInForm;
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
	 * Show the form for signing in.
	 * This is returned for the Get route
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// fetch the form input
		// validate the form
		// if invalid, then go back
		$formData = Input::only( 'email', 'password' );


		$this->signInForm->validate( $formData );
		// if is valid, tehn try to sign in
		Sentry::authenticate($formData, false);
//		if()
//		{
//			Flash::success('<p>Welcome back </p>');
//			return Redirect::intended('dashboard');
//		}
		// redirect to dashboard
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
