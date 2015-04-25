<?php namespace FlightDeck\Widgets\Blueprints;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Counter {

	private $meta;

	public function __construct($meta)
	{
		$ret =[];
		//strip the meta key value pairs from the widget object
		//and assign them to an array
		foreach($meta as $key => $value)
		{
			$ret[$value->meta_key] = $value->meta_value;
		}

		$this->meta = $ret;
	}

	public function render()
	{
		$method = $this->meta['constraint'];
		return $this->$method();
	}

	public function today()
	{
		return DB::table($this->meta['table'])
		         ->where( 'created_at', '>=', Carbon::today()->startOfDay() )
		         ->sum($this->meta['row']);
	}

	public function yesterday()
	{
		return DB::table($this->meta['table'])
		         ->where( 'created_at', '<', Carbon::today()->startOfDay() )
		         ->where( 'created_at', '>=', Carbon::yesterday()->startOfDay() )
		         ->sum($this->meta['row']);
	}

	public function week()
	{
		return DB::table($this->meta['table'])
		         ->where( 'created_at', '<', Carbon::today()->startOfDay() )
		         ->where( 'created_at', '>=', Carbon::today()->subWeek() )
		         ->sum($this->meta['row']);
	}

	public function count()
	{
		return DB::table($this->meta['table'])->count();
	}
}