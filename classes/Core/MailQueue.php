<?php

class Core_MailQueue {

	protected $table_name = 'mailqueue_messages';

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

	public function get()
	{
		$message_class = 'MailQueue_Message';
		$mailqueue = DB::select()
				->from($this->table_name)
				->as_object($message_class)
				->execute();
		return $mailqueue;
	}

}
