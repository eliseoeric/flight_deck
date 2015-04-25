<?php
use Carbon\Carbon;
use FlightDeck\Counties\CountyRepository;
use FlightDeck\Representatives\Representative;
use FlightDeck\Representatives\RepresentativeRepository;
use Laracasts\Commander\CommanderTrait;
use FlightDeck\Representatives\OnBoardRepCommand;
use FlightDeck\Representatives\UpdateRepCommand;

class RepresentativesController extends \BaseController {

	use CommanderTrait;

	private $repRepo;
	/**
	 * @var CountyRepository
	 */
	private $countyRepository;

	function __construct(RepresentativeRepository $representativeRepository, CountyRepository $countyRepository)
	{
	    $this->repRepo = $representativeRepository;
		$this->countyRepository = $countyRepository;
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
		$repsWithOrders = $this->repRepo->getRepsSalesThisWeek();

		$end = Carbon::now()->subWeek();
		$chartData = array();

		foreach($repsWithOrders as $rep )
		{
			$current = Carbon::now()->today();
			while( !$current->isSameDay( $end ) )
			{
				$ordersToday = $rep->purchaseOrders->filter( function( $order ) use($current) {
					return $order->created_at->isSameDay( $current );
				})->sum('amount');
				$chartData[$rep->id][] = array($current->timestamp*1000, $ordersToday);
				$current->subDay();
			}

		}

		$topEarners = $reps->sortByDesc('net_sales')->take(3);

		return View::make('representatives.index', compact('reps', 'topEarners', 'chartData'));
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
		$rep = $this->repRepo->getRepWithOrdersThisMonth($id);
		$countiesAll = $this->countyRepository->getAll()->lists('county', 'id');
		$counties = $rep->counties->lists('id');

		$end = Carbon::now()->subWeek();
		$chartData = array();

		$current = Carbon::now()->today();
		while( !$current->isSameDay( $end ) )
		{
			$ordersToday = $rep->purchaseOrders->filter( function( $order ) use($current) {
				return $order->created_at->isSameDay( $current );
			})->sum('amount');
			$chartData[] = array($current->timestamp*1000, $ordersToday);
			$current->subDay();
		}

		return View::make('representatives.edit', compact('rep', 'chartData', 'counties', 'countiesAll') );
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