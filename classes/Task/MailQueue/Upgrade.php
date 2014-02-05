<?php

/**
 * @file
 */
defined('SYSPATH') OR die('No direct script access.');

/**
 * Install or upgrade the MailQueue module.
 *
 * @package    Kohana
 * @category   Mail
 * @author     Sam Wilson
 * @copyright  2013 Sam Wilson
 * @license    MIT
 */
class Task_MailQueue_Upgrade extends Minion_Task {

	/** @var string */
	private $tbl = 'mailqueue_messages';

	protected function _execute(array $params)
	{
		$this->install();
		$this->increase_message_field_size();
	}

	/**
	 * Create database table.
	 */
	protected function install()
	{
		$db = Database::instance();
		$tables = $db->list_tables();
		$table_name = $db->table_prefix().$this->tbl;
		if ( !in_array($table_name, $tables))
		{
			Minion_CLI::write("Creating table $table_name");
			$sql = 'CREATE TABLE '.$db->quote_table($this->tbl).' ('
				.$db->quote_column('id').' INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,'
				.$db->quote_column('message').' TEXT NOT NULL,'
				.$db->quote_column('datetime_queued').' DATETIME NOT NULL,'
				.$db->quote_column('datetime_sent').' DATETIME NULL DEFAULT NULL'
				.')';
			$db->query(NULL, $sql);
		}
	}

	public function increase_message_field_size()
	{
		$db = Database::instance();
		$cols = $db->list_columns($this->tbl);
		if ($cols['message']['data_type'] != 'longtext')
		{
			Minion_CLI::write("Increasing length of message field to LONGTEXT");
			$msgcol = $db->quote_column('message');
			$sql = "ALTER TABLE ".$db->quote_table($this->tbl)
				." CHANGE $msgcol $msgcol LONGTEXT NOT NULL";
			$db->query(NULL, $sql);
		}
	}

}
