<?php
use FlightDeck\Representatives\Representative;
use FlightDeck\Representatives\RepresentativeRepository;
class RepresentativesController extends \BaseController {

	private $repRepo;

	function __construct(RepresentativeRepository $representativeRepository)
	{
	    $this->repRepo = $representativeRepository;
	}
	/**
	 * Display a listing of the resource.
	 * GET /representatives
	 *
	 * @return Response
	 */
	public function index()
	{
		$reps = $this->repRepo->getRepsWithRegions();
		$pageTitle = 'Representatives';
		return View::make('representatives.index', compact('reps','pageTitle'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /representatives/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /representatives
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /representatives/{id}
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
	 * GET /representatives/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$rep = $this->repRepo->getById($id);
		View::make('representatives.edit', compact('rep') );
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /representatives/{id}
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
	 * DELETE /representatives/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}