<?php
use FlightDeck\Dashboards\DashboardRepository;
class DashboardController extends \BaseController {

	private $dashRepo;

	function __construct(DashboardRepository $dashboardRepository)
	{
		$this->dashRepo = $dashboardRepository;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Always default to primary dashboard
		$pageTitle = "Core Dashboard";
		$dashboard = $this->dashRepo->getDashboard(1);
		//evaluate each widget
//		dd($dashboard->widgets[0]);
		return View::make('dashboard.index', compact('dashboard','pageTitle'));
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
		//
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
