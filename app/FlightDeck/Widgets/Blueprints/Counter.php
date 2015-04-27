<?php namespace FlightDeck\Widgets\Blueprints;


use Carbon\Carbon;
use FlightDeck\Widgets\WidgetBlueprint;
use Illuminate\Support\Facades\DB;

class Counter extends WidgetBlueprint{

	public function render()
	{
		$method = $this->meta['constraint'];
		return round($this->$method(), 2);
	}

	public function today()
	{
		return DB::table($this->meta['table'])
		         ->where( 'created_at', '>', Carbon::today()->startOfDay() )
			     ->where( 'created_at', '<', Carbon::today()->endOfDay() )
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
		         ->where( 'created_at', '<', Carbon::today()->endOfDay() )
		         ->where( 'created_at', '>=', Carbon::today()->subWeek() )
		         ->sum($this->meta['row']);
	}

	public function count()
	{
		return DB::table($this->meta['table'])->count();
	}
}