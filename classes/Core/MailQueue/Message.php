<?php

class Core_MailQueue_Message {

	protected $message;

	public function __construct()
	{
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
