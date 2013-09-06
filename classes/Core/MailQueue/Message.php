<?php

class Core_MailQueue_Message {

	protected $message;

	public function __construct()
	{
		;
	}
	/**
	 * Get the message object
	 *
	 * @return Swift_Message
	 */
	public function getMessage()
	{
		return $this->message;
	}

}