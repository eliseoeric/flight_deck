<?php
use FlightDeck\PurchaseOrders\PurchaseOrder;
class PurchaseOrdersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /purchaseorders
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = PurchaseOrder::with('customer', 'dealer', 'manufacturer')->get();
		return View::make('purchaseOrders.index', compact('orders'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /purchaseorders/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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