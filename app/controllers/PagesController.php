<?php

class PagesController extends \BaseController {

	public function home()
	{
		return View::make('pages.index');
	}

	public function portal()
	{
		return View::make('pages.portal');
	}

}
