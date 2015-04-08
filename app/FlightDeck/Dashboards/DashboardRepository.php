<?php namespace FlightDeck\Dashboards;

use FlightDeck\Repos\DbRepository;
use FlightDeck\Dashboards\Dashboard;
class DashboardRepository extends DbRepository{

	protected $model;

	function __construct(Dashboard $model)
	{
		$this->model = $model;
	}

	function getDashboard($id)
	{
		// return the dashboard and all the widgets
		return Dashboard::with('widgets', 'widgetMeta')->find($id);
	}

}