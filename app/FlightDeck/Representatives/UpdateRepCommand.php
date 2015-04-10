<?php namespace FlightDeck\Representatives;


class UpdateRepCommand {
	public $id;
	public $first_name;
	public $last_name;
	public $email;
	public $phone;
	public $sales_goal;

	/**
	 * @param $id
	 * @param $first_name
	 * @param $last_name
	 * @param $email
	 * @param $phone
	 * @param $sales_goal
	 */
	public function __construct($id, $first_name, $last_name, $email, $phone, $sales_goal)
	{
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->email = $email;
		$this->phone = $phone;
		$this->id = $id;
		$this->sales_goal = floatval($sales_goal);
	}
}