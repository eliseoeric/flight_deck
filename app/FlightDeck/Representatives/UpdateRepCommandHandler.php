<?php namespace FlightDeck\Representatives;



use FlightDeck\Counties\CountyRepository;
use Laracasts\Commander\CommandHandler;
use FlightDeck\Representatives\RepresentativeRepository;
use FlightDeck\Representatives\Representative;
use Laracasts\Commander\Events\DispatchableTrait;

class UpdateRepCommandHandler implements CommandHandler{
	use DispatchableTrait;
	/**
	 * @var RepresentativeRepository
	 */
	private $repRepo;
	/**
	 * @var CountyRepository
	 */
	private $countyRepo;

	public function __construct(RepresentativeRepository $representativeRepository, CountyRepository $countyRepo)
	{
		$this->repRepo = $representativeRepository;
		$this->countyRepo = $countyRepo;
	}

	/**
	 * Handle the command
	 *
	 * @param $command
	 *
	 * @return mixed
	 */
	public function handle( $command )
	{
		$repCounties = $this->repRepo->getRepCounties($command->id);

		foreach($repCounties->counties as $county)
		{
			$this->countyRepo->assignRep($county->id, 0);
		}

		foreach($command->counties as $county)
		{
			$this->countyRepo->assignRep($county, $command->id);
		}
		$rep = Representative::updated($command);
		if( $this->repRepo->save($rep) )
		{
			$this->dispatchEventsFor($rep);
			return $rep;
		}
		else
		{
			return false;
		}
	}
}