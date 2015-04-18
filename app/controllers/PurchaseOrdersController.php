<?php
use FlightDeck\PurchaseOrders\PurchaseOrder;
use FlightDeck\PurchaseOrders\PurchseOrdersRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class PurchaseOrdersController extends \BaseController {

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
		$chart_values = $this->ordersRepository->totalOrdersThisMonth()->toJson();

		$orders = PurchaseOrder::with('customer', 'dealer', 'manufacturer')->get();
		return View::make('purchaseOrders.index', compact('orders', 'chart_values'));
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
		//
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