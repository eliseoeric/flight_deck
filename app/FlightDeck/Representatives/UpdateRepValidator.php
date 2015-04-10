<?php namespace FlightDeck\Representatives;
use FlightDeck\Forms\OnBoardRepForm;

class UpdateRepValidator {

	/**
	 * @var OnBoardRepForm
	 */
	private $onBoardRepForm;

	/**
	 * @param OnBoardRepForm $onBoardRepForm
	 */
	public function __construct(OnBoardRepForm $onBoardRepForm)
	{
		$this->onBoardRepForm = $onBoardRepForm;
	}
	public function validate($command)
	{
		$this->onBoardRepForm->validate(get_object_vars($command));
	}

}