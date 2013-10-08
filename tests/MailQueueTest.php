<?php

/**
 * @group mailqueue
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
		$body = 'Lorem ipsum etc.';
		$message = Swift_Message::newInstance()
				->setSubject($subject)
				->setFrom(array('john@doe.com' => 'John Doe'))
				->setTo(array('receiver@domain.org', 'other@domain.org' => 'A name'))
				->setBody($body)
				->addPart('<q>Here is the message itself</q>', 'text/html');
		$mq = new MailQueue;
		$mq->add($message);
		$messages = $mq->get();
		// There's only one message queued
		$this->assertEquals(1, count($messages));
		$firstMessage = $messages[0];
		// The bits of the message are correct
		$this->assertEquals($subject, $firstMessage->getMessage()->getSubject());
		$this->assertEquals($body, $firstMessage->getMessage()->getBody());
		// It hasn't been sent yet
		$this->assertEmpty($firstMessage->getDatetimeSent());
	}

	/**
	 * Sending from an empty queue shouldn't do anything.
	 * 
	 */
	public function test_send_empty_queue()
	{
		$mq = new MailQueue;
		$this->assertCount(0, $mq->getPending());
		$mq->send(1);
		$this->assertCount(0, $mq->getPending());
	}

	/**
	 * Add a message to the queue, and 'send' it.
	 * The queue length should decrease.
	 */
	public function test_send()
	{
		$message1 = Swift_Message::newInstance()->setSubject('First Message');
		$message2 = Swift_Message::newInstance()->setSubject('Second Message');
		$mq = new MailQueue;
		$mq->add($message1);
		$mq->add($message2);
		$this->assertCount(2, $mq->getPending());
		$mq->send(1);
		$this->assertCount(1, $mq->getPending());
	}

}
