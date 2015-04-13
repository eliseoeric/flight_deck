<?php
use Carbon\Carbon;
use FlightDeck\Representatives\Representative;
use FlightDeck\Representatives\RepresentativeRepository;
use Laracasts\Commander\CommanderTrait;
use FlightDeck\Representatives\OnBoardRepCommand;
use FlightDeck\Representatives\UpdateRepCommand;

class RepresentativesController extends \BaseController {

	use CommanderTrait;

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
		//This should all probably be pulled out of
		// the controller and put in a widget repo or something
		$reps = $this->repRepo->getRepsWithRegions();

		$reps_list = [];
		$data = [];
		foreach($reps as $rep)
		{
			$reps_list[] = $rep->first_name;
			$data[] = $rep->net_sales;
		}
		JavaScript::put([
			'chart' => [
			'type' => 'bar'
				],
				'title' => [
			'text' => 'Representative Sales'
		],
				'xAxis' => [
					'categories' => $reps_list
		],
				'yAxis' => [
			'title' => [
				'text' => 'Sales'
			]
		],
				'series' => [
					'name' => 'Sales',
					'data' => $data
				]
		]);


		return View::make('representatives.index', compact('reps'));
	}

	public function jsonAll()
	{
		$reps = $this->repRepo->getRepsWithRegions();

		return Response::json($reps);
//		return View::make('representatives.index', compact('reps','pageTitle'));
	}

	/**
	 * @param $id
	 *
	 * Returns all purchase orders associated with the rep in json
	 * @return mixed
	 */
	public function jsonRepOrders($id)
	{
		$rep = $this->repRepo->getRepOrders($id);

		return Response::json($rep);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /representatives/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('representatives.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /representatives
	 *
	 * @return Response
	 */
	public function store()
	{

		$rep = $this->execute( OnBoardRepCommand::class );

		if( $rep )
		{
			Flash::success($rep->first_name . ' ' .$rep->last_name . ' was created successfully.');
		}
		else
		{
			Flash::warning('Something went wrong! Rep was not created!');
		}
		return  Redirect::back();
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

		return View::make('representatives.edit', compact('rep') );
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
		$input = Input::all();
		$input['id'] = $id;
		$rep = $this->execute(UpdateRepCommand::class, $input );
		//validate this
		//check for this
		if( $rep )
		{
			Flash::success($rep->first_name . ' ' .$rep->last_name . ' was updated successfully');
		}
		else
		{
			Flash::warning('Something went wrong! Rep not saved.');
		}

		return Redirect::route('admin.representatives.edit', ['id' => $id]);
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
		if( $this->repRepo->delete($id) )
		{
			Flash::success('Representative was deleted successfully.');
		}
		else
		{
			Flash::warning('Something went wrong!');
		}

		return Redirect::route('admin.representatives.index');

	}

}