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
class Task_Help extends Minion_Task {

	/**
	 * Create require database tables.
	 *
	 * @return null
	 */
	protected function _execute(array $params)
	{
		$this->install();
	}

	/**
	 * 
	 */
	protected function install()
	{
		$db = Database::instance();
		$tables = $this->db->list_tables();
		$table_name = $db->quote_table('mailqueue');
		if ( !in_array($table_name, $tables))
		{
			Minion_CLI::write("Creating table $table_name");
			$sql = 'CREATE TABLE '.$db->quote_identifier($table_name).' ('
				.$db->quote_column('id').' INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,'
				.$db->quote_column('id').' INT(4) NOT NULL,
				datetime_queued
				datetime_sent
				format
				to
				from
				
				) ENGINE=InnoDB';
			$this->db->query(NULL, $sql);
		}

	}

}
