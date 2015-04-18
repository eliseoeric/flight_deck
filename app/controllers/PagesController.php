<?php

class PagesController extends \BaseController {

	public function home()
	{
		return View::make('pages.home');
	}

	public function portal()
	{
		return View::make('pages.portal');
	}

	public function index()
	{
		return View::make('pages.index');
	}
}
