<?php

class Controller_MailQueue extends Controller {

	public $template = 'mailqueue/template';

	/**
	 * Prevent direct viewing of the mail queue in production environments.
	 *
	 * @throws HTTP_Exception_403
	 */
	public function before()
	{
		parent::before();
		$is_prod = Kohana::$environment == Kohana::PRODUCTION;
		if ($is_prod AND $this->request->is_initial())
		{
			throw new HTTP_Exception_403('MailQueue should only accessed directly in development environments.');
		}
	}

	public function action_index()
	{
		$mailqueue = new MailQueue;
		$table = View::factory('mailqueue/table');
		$table->mails = $mailqueue->get();
		$this->response->body($table);
	}

	public function action_demo()
	{
		$template = View::factory('mailqueue/template');
		$template->queue = Request::factory('mailqueue')->execute();
		$this->response->body($template);
	}

	/**
	 * This is just for the demo sending.
	 */
	public function action_send()
	{
		$message = new Swift_Message;
		$message->addTo($this->request->post('to'));
		$message->addFrom($this->request->post('from'));
		$message->setSubject($this->request->post('subject'));
		$message->setBody($this->request->post('message'));
		$mq = new MailQueue;
		$mq->add($message);
		$this->redirect('mailqueue/demo');
	}

}
