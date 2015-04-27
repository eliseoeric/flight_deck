<?php

use Carbon\Carbon;
use FlightDeck\Core\CSVExtractor;
use FlightDeck\PurchaseOrders\NewOrderPlacedCommand;
use Laracasts\Commander\CommanderTrait;

class OrderFormController extends \BaseController {
	use CommanderTrait;
	/**
	 * Display a listing of the resource.
	 * GET /orderform
	 *
	 * @return Response
	 */
	public function index()
	{
		$customers = DB::table('customers')->lists('name', 'id');
		$manufacturers = DB::table('manufacturers')->lists('name', 'id');
		$dealers = DB::table('dealers')->lists('name', 'id');
		return View::make('pages.orderform', compact('customers', 'dealers', 'manufacturers'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /orderform/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /orderform
	 *
	 * @return Response
	 */
	public function store()
	{

		if(Input::file('file') && Input::file('file')->getClientMimeType() == 'application/vnd.ms-excel' )
		{
			$customers = DB::table('customers')->lists('id', 'name');

			$manufacturers = DB::table('manufacturers')->lists('id', 'name');
			$dealers = DB::table('dealers')->lists('id', 'name');


			$filepath = Input::file('file')->move(__DIR__.'/storage/',Input::file('file')->getClientOriginalName());

			$csvBuilder = new CSVExtractor();
			$data = $csvBuilder->extractInfo($filepath->getRealPath());

			foreach ($data as $entry)
			{
				try
				{
					$date = explode('/', $entry['date']);
//				dd($entry);
					$input = array(
						'order_number' => $entry['order_number'],
						'created_at' => Carbon::createFromDate($date[2], $date[0], $date[1], 'EST'),
						'customer_id' => $customers[$entry['customer']],
						'manufacturer_id' => $manufacturers[$entry['manufacturer']],
						'dealer_id' => $dealers[$entry['dealer']],
						'amount' => intval($entry['amount'])
					);
					$order = $this->execute( NewOrderPlacedCommand::class, $input );
				}
				catch(\Exception $e)
				{
					Flash::warning($e->getMessage(), 'fa-user-times');
					return Redirect::back();
				}

			}
			Flash::success('File was uploaded successfully was placed succesfully.');
			return Redirect::back();
		}
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
	 * GET /orderform/{id}
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
	 * GET /orderform/{id}/edit
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
	 * PUT /orderform/{id}
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
	 * DELETE /orderform/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}