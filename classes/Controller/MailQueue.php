<?php

class Controller_MailQueue extends Controller_Template {

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
			throw new HTTP_Exception_403;
		}
	}

	/**
	 * 
	 */
	public function action_index()
	{
		$mailqueue = new MailQueue();
		$this->template->content = '';
		$this->template->mailqueue = $mailqueue->get();
	}

}
