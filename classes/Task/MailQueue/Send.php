<?php

/**
 * @file
 */
defined('SYSPATH') OR die('No direct script access.');

/**
 * Process the mail queue.
 *
 * Options:
 *  - count: how many messages to send (default 1)
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
	 * Validate the CLI options.
	 *
	 * @param Validation The validation object to add rules to
	 *
	 * @return Validation
	 */
	public function build_validation(Validation $validation)
	{
		$val = parent::build_validation($validation);
		$val->rule('count', 'numeric');
		return $val;
	}

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
