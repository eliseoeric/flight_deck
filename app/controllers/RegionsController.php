<?php
use FlightDeck\Cities\City;
use FlightDeck\PurchaseOrders\PurchaseOrder;
use FlightDeck\Regions\Region;
use FlightDeck\Regions\RegionsRepository;
use FlightDeck\Representatives\RepresentativeRepository;
use Illuminate\Support\Facades\Response;
use Laracasts\Commander\CommanderTrait;

class RegionsController extends \BaseController {

	use CommanderTrait;

	/**
	 * @var RegionsRepository
	 */
	private $regionsRepo;
	/**
	 * @var RepresentativeRepository
	 */
	private $representativeRepo;

	public function __construct(RegionsRepository $regionsRepo, RepresentativeRepository $representativeRepo)
	{

		$this->regionsRepo = $regionsRepo;
		$this->representativeRepo = $representativeRepo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$regions = $this->regionsRepo->getRegionsOrders();
		$allReps = $this->representativeRepo->getRepsWithRegions();
		$chartData = [];



		foreach($allReps as $rep)
		{
			$empty = [];
			for( $i=0; $i < $regions->count(); $i++ )
			{
				$empty[] = 0;
			}
			$chartData[$rep->id] = array('name' => $rep->first_name, 'data' => $empty);

			foreach($regions as $region)
			{
				$regionCustomers = $region->customers;
				$repCustomers = $regionCustomers->filter(function($customer) use($rep){
					return $rep->id == $customer->representative_id;
				});
				$customerSales = 0;

				foreach($repCustomers as $customer)
				{
					$customerSales = $customerSales + $customer->purchase_orders->sum('amount');
					$chartData[$rep->id]['data'][$region->id] = $customerSales;
				}
			}
		}


		return View::make('regions.index', compact('regions', 'chartData'));
//		return View::make('regions.index')
//			->with('regions', Region::with('representatives'));
	}


	public function jsonAll()
	{
		$regions = $this->regionsRepo->getRegionsWithReps();

		$regionsArray = $regions->toArray();
//		dd($regionsArray);

		foreach($regions as $region)
		{
			$totalSales = $region->representatives->sum('net_sales');
			$regionsArray[$region->id - 1]['net_sales'] = $totalSales;
		}

		return Response::json($regionsArray);
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
