A Mail Queue and Log for Kohana
===============================

* Add mail to a queue for subequent sending
* Send mail from the queue at a specified rate
* View queue status, and all past mail history

This module uses the Swiftmailer library.

Version 0.2.0 2014-01-20

Installation
------------

1. Add `"samwilson/kohana_mailqueue": "0.2.0"` to your `composer.json`
2. Run `composer update`
3. Create the database table (this is an idempotent command):
	`php index.php mailqueue:upgrade`

Configuration
-------------

Copy `MODPATH/kohana_mailqueue/config/mailqueue.php` to `APPPATH/config/mailqueue.php` and edit the values therein.

Usage
-----

1. Add to the queue:

		$mq = new MailQueue;
		$mq->add($message);
	Messages are explained in [the Swiftmailer documentation](http://swiftmailer.org/docs/messages.html).

2. View the queue:

		Request::factory('mailqueue')->execute();

3. Send pending mail:

		php index.php mailqueue:send --count=n
	Where *n* is an integer number of messages to send in this run.

Testing
-------

Integration tests can be run in the usual Kohana fashion. From the base
application directory, run

	./vendor/bin/phpunit --group=mailqueue

These tests require a database connection to be set up in `config/database.php`
and MailQueue to be installed ([see above](#installation)).
