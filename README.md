===============================
A Mail Queue and Log for Kohana
===============================

* Add mail to a queue for subequent sending
* Send mail from the queue at a specified rate
* View queue status, and all past mail history

This module uses the Swiftmailer library.

Installation
------------

Create the database table (idempotent task):

	php index.php mailqueue:upgrade

Usage
-----

Add to the queue:

	MailQueue::add($message);

View the queue:

	Request::factory('mailqueue');

Send pending mail:

	php index.php mailqueue:send