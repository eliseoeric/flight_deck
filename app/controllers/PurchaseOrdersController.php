<?php
use Carbon\Carbon;
use FlightDeck\PurchaseOrders\NewOrderPlacedCommand;
use FlightDeck\PurchaseOrders\PurchaseOrder;
use FlightDeck\PurchaseOrders\PurchseOrdersRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Laracasts\Commander\CommanderTrait;

class PurchaseOrdersController extends \BaseController {

	use CommanderTrait;
	/**
	 * @var PurchseOrdersRepository
	 */
	private $ordersRepository;

	public function __construct(PurchseOrdersRepository $ordersRepository)
	{

		$this->ordersRepository = $ordersRepository;
	}
	/**
	 * Display a listing of the resource.
	 * GET /purchaseorders
	 *
	 * @return Response
	 */
	public function index()
	{
		$monthOfOrders = $this->ordersRepository->totalOrdersThisMonth();
		$monthOfOrders = $monthOfOrders->sortBy(function($order) {
				return $order->created_at;
		});

		$start = Carbon::now()->endOfDay();
		$current = $start;


		$end = Carbon::now()->subMonth();

		$chartData = array();
		while( ! $current->isSameDay( $end ) )
		{
			$ordersToday = $monthOfOrders->filter( function( $item ) use ($current) {
				return $item->created_at->isSameDay( $current );
			})->sum('amount');
//			JavaScript works in milliseconds, so you'll first have to convert the UNIX timestamp from seconds to milliseconds
			$chartData[] =  array($current->timestamp*1000,  $ordersToday);
//
			$current->subDay();
		}
//		dd($chartData);

		$orders = PurchaseOrder::with('customer', 'dealer', 'manufacturer')->get();
		return View::make('purchaseOrders.index', compact('orders', 'chartData'));
	}

	public function jsonAll()
	{
		$orders = $this->ordersRepository->getOrdersWithDetails();
		return Response::json($orders);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /purchaseorders/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$customers = DB::table('customers')->lists('name', 'id');
		$manufacturers = DB::table('manufacturers')->lists('name', 'id');
		$dealers = DB::table('dealers')->lists('name', 'id');
		return View::make('purchaseOrders.create', compact('customers', 'dealers', 'manufacturers'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /purchaseorders
	 *
	 * @return Response
	 */
	public function store()
	{
//		dd(Input::all());
		$order = $this->execute( NewOrderPlacedCommand::class );

		if( $order )
		{
			Flash::success($order->order_number . ' was placed succesfully.');
		}
		else
		{
			Flash::warning('Something went wrong, your order was not placed.');
		}

		return Redirect::back();
	}

	/**
	 * Display the specified resource.
	 * GET /purchaseorders/{id}
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
	 * GET /purchaseorders/{id}/edit
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
	 * PUT /purchaseorders/{id}
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
	 * DELETE /purchaseorders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}