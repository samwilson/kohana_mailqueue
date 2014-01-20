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

	protected $_options = array(
		'count' => 1,
	);

	/**
	 * Send a message.
	 *
	 * @return void
	 */
	protected function _execute(array $params)
	{
		$config = Kohana::$config->load('mailqueue');
		$transport_class = $config->get('transport.class', 'mail');
		$transport_classname = 'Swift_'.ucfirst($transport_class).'Transport';
		$transport = $transport_classname::newInstance();
		$mq = new MailQueue;
		$mq->setTransport($transport);
		$mq->send($params['count']);
	}

}
