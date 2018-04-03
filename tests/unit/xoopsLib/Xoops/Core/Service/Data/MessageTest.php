<?php declare(strict_types=1);

namespace Xoops\Test\Core\Service\Data;

use Xoops\Core\Service\Data\Message;

class MessageTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Message
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new Message();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testContract(): void
    {
        $this->assertInstanceOf(Message::class, $this->object);
    }

    public function testNewMessageWithArguments(): void
    {
        $message = new Message('subject', 'body', 2, 1);
        $this->assertInstanceOf(Message::class, $message);
        $this->assertSame(1, $message->getToId());
        $this->assertSame(2, $message->getFromId());
        $this->assertSame('subject', $message->getSubject());
        $this->assertSame('body', $message->getBody());
    }

    public function testWithToId(): void
    {
        $actual = $this->object->withToId(1);
        $this->assertInstanceOf(Message::class, $actual);
        $this->assertNotSame($this->object, $actual);
        $this->assertSame(1, $actual->getToId());
    }

    public function testWithFromId(): void
    {
        $actual = $this->object->withFromId(2);
        $this->assertInstanceOf(Message::class, $actual);
        $this->assertNotSame($this->object, $actual);
        $this->assertSame(2, $actual->getFromId());
    }

    public function testWithSubject(): void
    {
        $actual = $this->object->withSubject('subject');
        $this->assertInstanceOf(Message::class, $actual);
        $this->assertNotSame($this->object, $actual);
        $this->assertSame('subject', $actual->getSubject());
    }

    public function testWithBody(): void
    {
        $actual = $this->object->withBody('body');
        $this->assertInstanceOf(Message::class, $actual);
        $this->assertNotSame($this->object, $actual);
        $this->assertSame('body', $actual->getBody());
    }

    public function testNewMessageWithFluent(): void
    {
        $actual = $this->object->withToId(1)->withFromId(2)->withSubject('subject')->withBody('body');
        $this->assertNotSame($this->object, $actual);
        $this->assertSame(1, $actual->getToId());
        $this->assertSame(2, $actual->getFromId());
        $this->assertSame('subject', $actual->getSubject());
        $this->assertSame('body', $actual->getBody());
        $this->expectException(\LogicException::class);
        $this->object->getToId();
    }

    public function testNewMessageMissingArguments(): void
    {
        $message = new Message(null, null, 2);
        $this->assertSame(2, $message->getFromId());
        $this->expectException(\LogicException::class);
        $message->getToId();
    }

    public function testNewMessageBadArguments(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $message = new Message(null, null, -1);
    }

    public function testWithToIdException(): void
    {
        try {
            $this->object->withToId('0');
        } catch (\InvalidArgumentException $e) {
            $this->assertContains('To', $e->getMessage());
        }
        $this->assertInstanceOf(\InvalidArgumentException::class, $e);
    }

    public function testWithFromIdException(): void
    {
        try {
            $this->object->withFromId(-88);
        } catch (\InvalidArgumentException $e) {
            $this->assertContains('From', $e->getMessage());
        }
        $this->assertInstanceOf(\InvalidArgumentException::class, $e);
    }

    public function testWithSubjectException(): void
    {
        try {
            $this->object->withSubject(' ');
        } catch (\InvalidArgumentException $e) {
            $this->assertContains('Subject', $e->getMessage());
        }
        $this->assertInstanceOf(\InvalidArgumentException::class, $e);
    }

    public function testWithBodyException(): void
    {
        try {
            $this->object->withBody("\n");
        } catch (\InvalidArgumentException $e) {
            $this->assertContains('Body', $e->getMessage());
        }
        $this->assertInstanceOf(\InvalidArgumentException::class, $e);
    }

    public function testGetToIdException(): void
    {
        try {
            $this->object->getToId();
        } catch (\LogicException $e) {
            $this->assertContains('To', $e->getMessage());
        }
        $this->assertInstanceOf(\LogicException::class, $e);
    }

    public function testGetFromIdException(): void
    {
        try {
            $this->object->getFromId();
        } catch (\LogicException $e) {
            $this->assertContains('From', $e->getMessage());
        }
        $this->assertInstanceOf(\LogicException::class, $e);
    }

    public function testGetSubjectException(): void
    {
        try {
            $this->object->getSubject();
        } catch (\LogicException $e) {
            $this->assertContains('Subject', $e->getMessage());
        }
        $this->assertInstanceOf(\LogicException::class, $e);
    }

    public function testGetBodyException(): void
    {
        try {
            $this->object->getBody();
        } catch (\LogicException $e) {
            $this->assertContains('Body', $e->getMessage());
        }
        $this->assertInstanceOf(\LogicException::class, $e);
    }
}
