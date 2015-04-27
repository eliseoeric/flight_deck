<?php namespace FlightDeck\Forms;

use Laracasts\Validation\FormValidator;

class NewOrderPlacedForm extends FormValidator{
	protected $rules = [
		'order_number' => 'required',
		'amount' => 'required',
		'customer' => '',
		'manufacturer' => '',
		'dealer' => '',
		'created_at' => ''
	];
}