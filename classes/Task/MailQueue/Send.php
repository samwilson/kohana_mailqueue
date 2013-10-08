<?php

/**
 * @file
 */
defined('SYSPATH') OR die('No direct script access.');

/**
 * Process the mail queue.
 *
 * @package    Kohana
 * @category   Mail
 * @author     Sam Wilson
 * @copyright  2013 Sam Wilson
 * @license    MIT
 */
class Task_MailQueue_Send extends Minion_Task {

	/**
	 * Send a message.
	 *
	 * @return void
	 */
	protected function _execute(array $params)
	{
		$mq = new MailQueue;
		$mq->send(1);
	}

}
