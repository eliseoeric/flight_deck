<?php namespace FlightDeck\Dashboards\Widgets;

use Carbon\Carbon;
use FlightDeck\Repos\DbRepository;
use FlightDeck\Dashboards\Widgets\Widget;
use Illuminate\Support\Facades\DB;

class WidgetMetaRepository extends DbRepository{

	protected $model;

	function __construct(WidgetMeta $model)
	{
		$this->model = $model;
	}
}