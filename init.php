<?php defined('SYSPATH') OR die('No direct script access.');

Route::set('mailqueue', 'mailqueue(/<action>)')
	->defaults(array(
		'controller' => 'MailQueue',
		'action'     => 'index',
	));
