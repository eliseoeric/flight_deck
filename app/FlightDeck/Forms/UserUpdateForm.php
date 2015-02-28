<?php namespace FlightDeck\Forms;


use Laracasts\Validation\FormValidator;

class UserUpdateForm extends FormValidator{

	/*
	 *
	 * Validation rules for the use update form
	 * @var array
	 */
	protected $rules = [
		"username" => '',
		'email' => 'email',
		'password' => 'confirmed'
	];

}