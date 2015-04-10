<?php namespace FlightDeck\Representatives;

use FlightDeck\Core\Presenters\Contracts\PresentableInterface;
use FlightDeck\Core\Presenters\PresentableTrait;
use FlightDeck\Representatives\Events\RepOnBoarded;
use FlightDeck\Representatives\Events\RepUpdated;
use Laracasts\Commander\Events\EventGenerator;

class Representative extends \Eloquent implements PresentableInterface{

    use EventGenerator;

	use PresentableTrait;
	protected $presenter = 'FlightDeck\Core\Presenters\Representative';

	// Add your validation rules here
	public static $rules = [

	];

	// Don't forget to fill this array
	protected $fillable = ['first_name', 'last_name', 'phone', 'email', 'net_sales', 'region', 'sales_goal'];

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
		$rep->raise( new RepUpdated( $rep ) );
		return $rep;
	}

	//ensures that whatever is returned by these fields is a Carbon instance
	public function getDates()
	{
		return ['created_at', 'updated_at'];
	}



}
