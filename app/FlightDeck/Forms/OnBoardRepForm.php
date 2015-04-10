<?php namespace FlightDeck\Forms;


use Laracasts\Validation\FormValidator;

class OnBoardRepForm extends FormValidator{

	/*
	 *
	 * Validation rules for the use update form
	 * @var array
	 */
	protected $rules = [
		"first_name" => 'required',
		"last_name" => 'required',
		'email' => 'required | email',
		'phone' => 'required',
		'sales_goal' => 'alpha_num'
	];

}