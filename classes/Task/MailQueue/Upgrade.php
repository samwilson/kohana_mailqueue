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

	protected function _execute(array $params)
	{
		$this->install();
	}

	/**
	 * Create database table.
	 */
	protected function install()
	{
		$db = Database::instance();
		$tables = $db->list_tables();
		$table_name = $db->table_prefix().'mailqueue_messages';
		if ( !in_array($table_name, $tables))
		{
			Minion_CLI::write("Creating table $table_name");
			$sql = 'CREATE TABLE '.$db->quote_table($table_name).' ('
				.$db->quote_column('id').' INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,'
				.$db->quote_column('message').' TEXT NOT NULL,'
				.$db->quote_column('datetime_queued').' DATETIME NOT NULL,'
				.$db->quote_column('datetime_sent').' DATETIME NULL DEFAULT NULL'
				.')';
			$db->query(NULL, $sql);
		}

	}

}
