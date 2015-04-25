<?php namespace FlightDeck\Forms;


use Laracasts\Validation\FormValidator;

class NewCustomerForm extends FormValidator{

	protected $rules = [
		'name' => 'required',
		'email' => 'required | email',
		'phone' => 'required',
		'zipcode' => 'alpha_num | required',
		'address' => 'required',
		'city' => 'required'
	];
}