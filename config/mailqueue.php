<?php

return array(
	'transport' => array(
		'class' => 'mail', // One of: mail, smtp, or sendmail.

		// For Mail:
		'mail_params' => '-f%s',

		// For SMTP:
		'host' => 'localhost',
		'port' => 25,
		'username' => '',
		'password' => '',
		'authmode' => '',

		// For Sendmail:
		'sendmail_command' => '',

	),
);
