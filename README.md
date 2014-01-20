A Mail Queue and Log for Kohana
===============================

* Add mail to a queue for subequent sending
* Send mail from the queue at a specified rate
* View queue status, and all past mail history

This module uses the Swiftmailer library.

Version 0.1.1 2014-01-20.

Installation
------------

Add `"samwilson/kohana_mailqueue": "0.1.1"` to your `composer.json`

Run `composer update`

Create the database table (this is an idempotent command):

	php index.php mailqueue:upgrade

Usage
-----

1. Add to the queue:

	MailQueue::add($message);

For documentation about how to create messages,
see http://swiftmailer.org/docs/messages.html

2. View the queue:

	Request::factory('mailqueue');

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
