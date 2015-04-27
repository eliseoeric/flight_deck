<?php namespace FlightDeck\Widgets\Blueprints;

use Carbon\Carbon;
use FlightDeck\PurchaseOrders\PurchaseOrder;
use FlightDeck\PurchaseOrders\PurchseOrdersRepository;
use FlightDeck\Regions\Region;
use FlightDeck\Widgets\WidgetBlueprint;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PerformanceFeed extends WidgetBlueprint{

	public function render()
	{
		return $this->highchartConstruction();
	}

	public function highchartConstruction()
	{
		$monthOfOrders = $this->fetchResource();

		$monthOfOrders = $monthOfOrders->sortBy( function($order) {
			return $order->created_at;
		});

		$start = Carbon::now()->endOfDay();
		$current = $start;
		$end = Carbon::now()->subMonth();

		$chartData = array();
		while( ! $current->isSameDay( $end ) )
		{
			$ordersToday = $monthOfOrders->filter( function( $item ) use ( $current ) {
				return $item->created_at->isSameDay( $current );
			})->sum('amount');

			$chartData[] = array( $current->timestamp*1000, $ordersToday );

			$current->subDay();
		}

		$performance = $this->calcRegionPerformance();
		$chartConfig = $this->chartConfig($chartData);
		return array('chartConfig' => $chartConfig, 'performance' => $performance);

	}

	public function fetchResource()
	{
		//this needs some serious refactoring.  we need a way to access the repo,
		//or any repo for that matter, based merely on the content->resource
		return PurchaseOrder::where( 'created_at', '<', Carbon::now()->endOfDay() )
		                    ->where( 'created_at', '>=', Carbon::now()->subMonth() )
		                    ->get();
	}

	public function calcRegionPerformance()
	{
		$regionOrders = Region::with('customers.purchase_orders', 'representatives')->get();
		$data = array();
		$total = 0;
		foreach($regionOrders as $region)
		{
			$customers = $region->customers;
			$sales = 0;
			foreach($customers as $customer)
			{
				$sales += $customer->purchase_orders->sum('amount');

			}
			$total += $sales;
			$data[$region->id] = array( 'name' => $region->region, 'sales' => $sales );
		}
		$c = new Collection($data);
		$c->sortByDesc('sales');
		$result = array(
			'total' => $total,
			'regions' => $c->take(5)->toArray()
		);
		return $result;
	}

	public function chartConfig($chartData){
		$chart = array(
			'chart' => array(
				'type' => 'spline'
			),
			'title' => array(
				'text' => 'DMG Performance This Month'
			),
			'legend' => array(
				'layout' => 'vertical',
				'align' => 'left',
				'floating' => true,
				'borderWidth' => 1
			),
			'xAxis' => array(
				'type' => 'datetime',
				'dateTimeLabelFormats' => array(
					'month' => '%e. %b',
					'year' => '%b'
				),
				'title' => array(
					'text' => 'Date'
				)
			),
			'yAxis' => array(
				'title' => array(
					'text' => 'Net Sales'
				),
				'min' => 0
			),
			'tooltip' => array(
				'crosshairs' => true,
                'shared' => true,
				'headerFormat' => '<b>{series.name} on {point.x:%e. %b}</b><br>',
				'pointFormat' => '${point.y:,.2f}'
			),
			'plotOptions' => array(
				'areaspline' => array(
					'fillOpacity' => 1
				)
			),
			'series' => array(
				array(
					'name' => 'Sales',
					'data' => $chartData
				)
			)
		);

		return $chart;
	}

}