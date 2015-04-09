<?php namespace FlightDeck\Notifications;


class FlashNotifier {

	private $session;

	public function __construct(SessionStore $session)
	{
	    $this->session  = $session;
	}

	public function info($message, $fa_icon='fa-cogs')
	{
		$this->message($message, 'info', $fa_icon);
		return $this;
	}

	public function success($message, $fa_icon='fa-cogs')
	{
		$this->message($message, 'success', $fa_icon);
		return $this;
	}

	public function error($message, $fa_icon='fa-cogs')
	{
		$this->message($message, 'alert', $fa_icon);
		return $this;
	}

	public function warning($message, $fa_icon='fa-cogs')
	{
		$this->message($message, 'warning', $fa_icon);
		return $this;
	}

	public function secondary($message, $fa_icon='fa-cogs')
	{
		$this->message($message, 'secondary', $fa_icon);
		return $this;
	}

	public function overlay($message, $title = 'Notice')
	{
		$this->message($message, 'info', $title);

		$this->session->flash('flash_notification.overlay', true);
		$this->session->flash('flash_notification.title', $title);

		return $this;
	}

	public function message($message, $level = '', $fa_icon = 'fa-cogs')
	{
		$this->session->flash('flash_notification.message', $message);
		$this->session->flash('flash_notification.level', $level);
		$this->session->flash('flash_notification.fa_icon', $fa_icon);

		return $this;
	}

	public function important()
	{
		$this->session->flash('flash_notification.important', true);

		return $this;
	}
}