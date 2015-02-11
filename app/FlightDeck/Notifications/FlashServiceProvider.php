<?php namespace FlightDeck\Notifications;


use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'FlightDeck\Notifications\SessionStore',
			'FlightDeck\Notifications\LaravelSessionStore'
		);
		$this->app->bindShared('flash', function () {
			return $this->app->make('FlightDeck\Notifications\FlashNotifier');
		});
	}


}