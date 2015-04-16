<?php

use FlightDeck\Dashboards\Widgets\Widget;
use FlightDeck\Dashboards\Widgets\WidgetRepository;
use Laracasts\Commander\CommanderTrait;
use FlightDeck\Dashboards\Widgets\AddNewWidgetCommand;
use FlightDeck\Dashboards\Widgets\UpdateWidgetCommand;

class WidgetsController extends \BaseController {

	use CommanderTrait;

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
//		return Response::json($this->widgetRepo->calcAllWidgets());
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
		$widget = $this->execute( AddNewWidgetCommand::class );

		if($widget)
		{
			return Response::json($widget->heading . 'was created successfully.', 200);
		}
		else
		{
			return Response::json('Error from Widgets Controller.');
		}

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Response::json( $this->widgetRepo->widgetWMeta( $id ) );
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
		$input = Input::all();
		$input['id'] = $id;
		$widget = $this->execute(UpdateWidgetCommand::class, $input);
		if( $widget )
		{
			return Response::json($widget->heading . ' was successfully updated.', 200);
		}
		else
		{
			return Response::json('Error from the Widget Controller.');
		}

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Widget::destroy($id);
	}


}