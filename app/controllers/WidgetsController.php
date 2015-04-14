<?php

use FlightDeck\Dashboards\Widgets\Widget;
use FlightDeck\Dashboards\Widgets\WidgetRepository;

class WidgetsController extends \BaseController {

	private $widgetRepo;

	public function __construct(WidgetRepository $widgetRepository)
	{
	    $this->widgetRepo = $widgetRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json($this->widgetRepo->calcAllWidgets());
	}


	public function getQuerySum($table, $row)
	{
		return Response::json(array(
			'table' => $table,
			'row' => $row,
			'sum' => $this->widgetRepo->getMaxOfRowInTable($table, $row)
		), 200);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('widgets.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Need to put in some repository crap here
		$widget = Widget::create(Input::all());
		return $widget;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Response::json( $this->widgetRepo->calcWidgetValue( $id ) );
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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