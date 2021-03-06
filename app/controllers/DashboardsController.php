<?php
use FlightDeck\Dashboards\DashboardRepository;
use FlightDeck\Dashboards\Widgets\WidgetRepository;
class DashboardsController extends \BaseController {

	private $dashRepo;
	private $widgetRepo;

	function __construct(DashboardRepository $dashboardRepository, WidgetRepository $widgetRepository)
	{
		$this->dashRepo = $dashboardRepository;

		$this->widgetRepo = $widgetRepository;

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//get dashboard by id with widgets
		//each widget has a type.
		//for each widget->create_widget($id, $type);
			//add each widget to widgets array
		//send widgets array to view

		//NOTES:
		//widgets is an abstract class. every stat_widget extends widgets.
		//stat_widgets or chart_widgets have special details that are saved via widget_meta
		//these are used to render the widgets

		// url: /admin/widgets/{type}/{query}
		// url: /admin/widgets/stat/{query}/{table}/{row}
		// url: /admin/widgets/graph/{graphtype}/{xaxis}/{yaxis}


	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$dashboard = $this->dashRepo->getDashboard($id);
		$built = [];
		foreach($dashboard->widgets as $widget)
		{
			$method = $widget->type;
			$value = $widget->present()->$method();
			$render = array(
				'id' => $widget->id,
				'heading' => $widget->heading,
				'size' => $widget->size,
				'class' => $widget->class,
				'type' => $widget->type,
				'value' => $value
			);
			$built[] = $render;
		}

		return Response::json($built);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$dashboard = $this->dashRepo->getDashboard($id);
		$built = [];
		foreach($dashboard->widgets as $widget)
		{
			$method = $widget->type;
			$value = $widget->present()->$method();
			$render = array(
				'id' => $widget->id,
				'heading' => $widget->heading,
				'size' => $widget->size,
				'class' => $widget->class,
				'type' => $widget->type,
				'value' => $value
			);
			$built[] = $render;
		}

		$widgetTypes = array(
			'sumThisMonth' => 'Total number this month',
			'sumToDate' => 'Total number to date',
			'sumYesterday' => 'Total number yesterday',
			'sumToday' => 'Total number today',
		);

		$widgetSize = array(
			'large-2' => 'One Sixth',
			'large-3' => 'One Fourth',
			'large-4' => 'One Third',
			'large-6' => 'One Half',
			'large-8' => 'Two Thirds',
			'large-9' => 'Three Fourths',
		);
		return View::make('dashboard.edit', compact('built', 'dashboard', 'widgetTypes', 'widgetSize'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
