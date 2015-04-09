<?php namespace FlightDeck\Representatives;

use FlightDeck\Representatives\Events\RepOnBoarded;
use Laracasts\Commander\Events\EventGenerator;

class Representative extends \Eloquent{

    use EventGenerator;

	// Add your validation rules here
	public static $rules = [

	];

	// Don't forget to fill this array
	protected $fillable = ['first_name', 'last_name', 'phone', 'email', 'net_sales', 'region'];

	/**
	 * @return mixed
	 */
	public function counties()
	{
		return $this->hasMany('FlightDeck\Counties\County');
	}

	public function customers()
	{
		return $this->hasMany('FlightDeck\Customers\Customer');
	}

	public function regions()
	{
		return $this->belongsToMany('FlightDeck\Regions\Region', 'counties', 'representative_id', 'region_id')->distinct();
	}

	public function purchaseOrders()
	{
		return $this->hasManyThrough('FlightDeck\PurchaseOrders\PurchaseOrder', 'FlightDeck\Customers\Customer');
	}

	public static function onboard( $command )
	{
		$rep = new static( get_object_vars($command) );
		$rep->raise( new RepOnBoarded( $rep ) );
		return $rep;
	}

	public static function updated( $command )
	{
		$rep = Representative::findOrFail($command->id);
		$rep->fill(get_object_vars($command));
		$rep->raise( new RepOnBoarded( $rep ) );
		return $rep;
	}

}
