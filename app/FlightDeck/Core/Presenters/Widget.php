<?php namespace FlightDeck\Core\Presenters;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Widget extends Presenter{

	public function stripMetaKeys($keys)
	{
		$meta =[];
		//strip the meta key value pairs from the widget object
		//and assign them to an array
		foreach($keys as $key => $value)
		{
			$meta[$value->meta_key] = $value->meta_value;
		}

		return $meta;
	}

	public function sumToday()
	{
		//get the meta values from the entity
		$keys = $this->entity->meta;
		$meta = $this->stripMetaKeys($keys);

		//query the database using the key value pairs pulled from widget
		return DB::table($meta['table'])
					->where( 'created_at', '>=', Carbon::today() )
					->sum($meta['row']);

	}

	public function sumYesterday()
	{
		$keys = $this->entity->meta;
		$meta = $this->stripMetaKeys($keys);

		return DB::table($meta['table'])
				->where( 'created_at', '<', Carbon::today() )
				->where( 'created_at', '>=', Carbon::yesterday() )
				->sum($meta['row']);
	}
}