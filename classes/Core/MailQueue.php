<?php

class Core_MailQueue {

	protected $table_name = 'mailqueue_messages';

	/** @var Swift_Transport The transport to use to send mail. */
	protected $transport;

	public function add(Swift_Message $message)
	{
		$values = array(
			'datetime_queued' => DB::expr('NOW()'),
			'message' => serialize($message),
		);
		return DB::insert($this->table_name)
			->columns(array_keys($values))
			->values($values)
			->execute();
	}

	public function get($pending_only = FALSE)
	{
		$message_class = 'MailQueue_Message';
		$mailqueue = DB::select()
				->from($this->table_name)
				->as_object($message_class);
		if ($pending_only)
		{
			$mailqueue->where('datetime_sent', 'IS', NULL);
		}
		return $mailqueue->execute();
	}

	public function getPending()
	{
		return $this->get(TRUE);
	}

	/**
	 * Send some number of messages from the queue.
	 *
	 * Call MailQueue::setTransport() with a valid SwiftTransport object before
	 * this or the NullTransport will be used and nothing will actually be sent.
	 *
	 * @param int $count The number of messages to send from the queue.
	 * @return void
	 * @throws Exception If the mailer is unable to send a message.
	 */
	public function send($count)
	{
		while ($count > 0)
		{
			$message = Arr::get($this->getPending(), 0);
			if ( ! $message)
			{
				return;
			}
			$mailer = Swift_Mailer::newInstance($this->getTransport());
			$mailer->send($message->getMessage(), $failures);
			if (count($failures) > 0)
			{
				throw new Exception(print_r($failures, true));
			}
			$count--;
			DB::update($this->table_name)
				->set(array('datetime_sent' => DB::expr('NOW()')))
				->where('id', '=', $message->getId())
				->execute();
		}
	}

	public function setTransport(Swift_Transport $transport)
	{
		$this->transport = $transport;
	}

	public function getTransport()
	{
		if ( ! $this->transport)
		{
			$this->transport = new Swift_NullTransport();
		}
		return $this->transport;
	}

}
