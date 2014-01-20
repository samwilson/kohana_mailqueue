<?php

class Core_MailQueue_Message {

	protected $message;

	public function __construct()
	{
		// Required, so can be used for DB result type.
	}

	/**
	 * Get the message ID.
	 *
	 * @return int The message ID.
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the message object
	 *
	 * @return Swift_Message
	 */
	public function getMessage()
	{
		return unserialize($this->message);
	}

	public function getDatetimeQueued()
	{
		return $this->datetime_queued;
	}

	/**
	 * Get the date this was sent. Null if not yet sent.
	 *
	 * @return datetime 
	 */
	public function getDatetimeSent()
	{
		return $this->datetime_sent;
	}

}
