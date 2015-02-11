<?php namespace FlightDeck\Notifications;


class FlashNotifier {

	private $session;

	public function __construct(SessionStore $session)
	{
	    $this->session  = $session;
	}

	public function info($message)
	{
		$this->message($message, 'info');
		return $this;
	}

	public function success($message)
	{
		$this->message($message, 'success');
		return $this;
	}

	public function error($message)
	{
		$this->message($message, 'alert');
		return $this;
	}

	public function warning($message)
	{
		$this->message($message, 'warning');
		return $this;
	}

	public function secondary($message)
	{
		$this->message($message, 'secondary');
		return $this;
	}

	public function overlay($message, $title = 'Notice')
	{
		$this->message($message, 'info', $title);

		$this->session->flash('flash_notification.overlay', true);
		$this->session->flash('flash_notification.title', $title);

		return $this;
	}

	public function message($message, $level = '')
	{
		$this->session->flash('flash_notification.message', $message);
		$this->session->flash('flash_notification.level', $level);

		return $this;
	}

	public function important()
	{
		$this->session->flash('flash_notification.important', true);

		return $this;
	}
}