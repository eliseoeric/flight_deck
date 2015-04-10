<?php namespace FlightDeck\Core\Presenters;


class Representative extends Presenter{
	

	public function net_sales()
	{
		setlocale(LC_MONETARY, 'en_US.UTF-8');
		return money_format('%(#10n', $this->entity->net_sales);
	}

	public function until_goal()
	{
		$goal = $this->entity->sales_goal;
		$sales = $this->entity->net_sales;
		$value = $goal - $sales;
		setlocale(LC_MONETARY, 'en_US.UTF-8');
		return money_format('%(#10n', $value);
	}

	public function goal()
	{

	}

}