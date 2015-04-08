<?php namespace FlightDeck\Representatives;


use Laracasts\Commander\CommandHandler;
use FlightDeck\Representatives\RepresentativeRepository;
use FlightDeck\Representatives\Representative;
use Laracasts\Commander\Events\DispatchableTrait;

class OnBoardRepCommandHandler implements CommandHandler{
	use DispatchableTrait;
	/**
	 * @var RepresentativeRepository
	 */
	private $repRepo;

	public function __construct(RepresentativeRepository $representativeRepository)
	{

		$this->repRepo = $representativeRepository;
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
		$rep = Representative::onboard($command);

		$this->repRepo->save($rep);
		$this->dispatchEventsFor($rep);

		return $rep;

	}
}