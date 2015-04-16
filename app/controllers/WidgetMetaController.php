<?php
use FlightDeck\Dashboards\Widgets\WidgetMeta;
use FlightDeck\Dashboards\Widgets\WidgetMetaRepository;

class WidgetMetaController extends \BaseController {

	/**
	 * @var WidgetMetaRepository
	 */
	private $metaRepository;

	public function __construct(WidgetMetaRepository $metaRepository)
	{
		$this->metaRepository = $metaRepository;
	}
	/**
	 * Display a listing of the resource.
	 * GET /rependofdays
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json($this->metaRepository->getAll());
	}


	/**
	 * Show the form for creating a new resource.
	 * GET /rependofdays/create
	 *
	 * @return Response
	 *
	public function create()
	{
	//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /rependofdays
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /rependofdays/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /rependofdays/{id}/edit
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
	 * PUT /rependofdays/{id}
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
	 * DELETE /rependofdays/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}