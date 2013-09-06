<?php

/**
 * @group mail-queue
 */
class MailQueueTest extends Unittest_TestCase {

	public function setUp()
	{
		parent::setUp();
		Database::instance()->begin();
	}

	public function tearDown()
	{
		parent::tearDown();
		Database::instance()->rollback();
	}

	/**
	 * Create a message, store it, and check that it's retrieved okay.
	 */
	public function test_create()
	{
		$subject = 'Your subject';
		$message = Swift_Message::newInstance()
				->setSubject($subject)
				->setFrom(array('john@doe.com' => 'John Doe'))
				->setTo(array('receiver@domain.org', 'other@domain.org' => 'A name'))
				->setBody('Here is the message itself')
				->addPart('<q>Here is the message itself</q>', 'text/html');
		$mq = new MailQueue;
		$mq->add($message);
		$messages = $mq->get();
		$this->assertEquals(1, count($messages));
		$firstMessage = $messages[0];
		$this->assertEquals($subject, $firstMessage->getMessage()->getSubject());
	}

}
