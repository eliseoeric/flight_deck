<?php
use FlightDeck\Customers\CustomersRepository;
use FlightDeck\Customers\NewCustomerCommand;
use FlightDeck\Customers\UpdateCustomerCommand;
use FlightDeck\Zipcodes\ZipcodesRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Laracasts\Commander\CommanderTrait;

class CustomersController extends \BaseController {

	use CommanderTrait;

	/**
	 * @var CustomersRepository
	 */
	private $customersRepo;
	/**
	 * @var ZipcodesRepository
	 */
	private $zipRepo;

	public function __construct(CustomersRepository $customersRepo, ZipcodesRepository $zipRepo)
	{

		$this->customersRepo = $customersRepo;


		$this->zipRepo = $zipRepo;
	}

	/**
	 * Display a listing of the resource.
	 * GET /rependofdays
	 *
	 * @return Response
	 */
	public function index()
	{
		$customers = $this->customersRepo->getCustomersWithPurchases();
		$customers = $customers->sortBy(function($customer){
			return $customer->purchase_orders->sum('amount');
		})->reverse()->take(5);

		$data = array();
		$names = array();
		foreach ($customers as $customer)
		{
			$data[] = round($customer->purchase_orders->sum('amount'),2);
			$names[] = $customer->name;
		}

		$chartData = array(
			'name' => 'Sales',
			'data' => $data
		);

		return View::make('customers.index', compact('customers', 'chartData', 'names'));
	}

	public function jsonAll()
	{
		$customers = $this->customersRepo->getWithRegionOrdersReps();

		$data = array();
		foreach($customers as $customer)
		{
			$data[] = array(
				'id' => $customer->id,
				'name' => $customer->name,
				'city' => $customer->city,
				'phone' => $customer->phone,
				'representative' => $customer->representative,
				'region' => $customer->region,
				'purchases' => round($customer->purchase_orders->sum('amount'),2)
			);
		}

		return Response::json($data);

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /rependofdays/create
	 *
	 * @return Response
	 *
	 * */
	public function create()
	{
		$zips = DB::table('zipcodes')->lists('zipcode', 'id');
		return View::make('customers.create', compact('zips'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /rependofdays
	 *
	 * @return Response
	 */
	public function store()
	{
		$customer = $this->execute( NewCustomerCommand::class );

		if( $customer )
		{
			Flash::success($customer->name . " was succesfully added.");
		}
		else
		{
			Flash::warning('Something went wrong. Customer not created.');
		}

		return Redirect::back();
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
		$customer = $this->customersRepo->getById($id);
		$zips = DB::table('zipcodes')->lists('zipcode', 'id');
		return View::make('customers.edit', compact('customer', 'zips'));
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
		$input = Input::all();
		$input['id'] = $id;

		$customer = $this->execute(UpdateCustomerCommand::class, $input);
		if($customer)
		{
			Flash::success($customer->name . ' was updated successfully');
		}
		else
		{
			Flash::warning('Something went wrong! Rep not saved.');
		}
		return Redirect::route('admin.customers.index');
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