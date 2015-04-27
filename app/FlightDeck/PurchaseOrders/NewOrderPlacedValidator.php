<?php namespace FlightDeck\PurchaseOrders;


use FlightDeck\Forms\NewOrderPlacedForm;

class NewOrderPlacedValidator {
	/**
	 * @var NewOrderPlaced
	 */
	private $newOrderPlacedForm;

	public function __construct(NewOrderPlacedForm $newOrderPlacedForm)
	{
		$this->newOrderPlacedForm = $newOrderPlacedForm;
	}

	public function validate($command)
	{
		$this->newOrderPlacedForm->validate(get_object_vars($command));
	}
}