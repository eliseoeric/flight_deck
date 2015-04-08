<?php

class AdminController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pageTitle = 'Primary Dashboard';
		return View::make('dashboard.index', compact('pageTitle'));
	}



}