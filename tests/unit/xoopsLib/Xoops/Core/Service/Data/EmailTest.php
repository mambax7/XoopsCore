<?php declare(strict_types=1);

namespace Xoops\Test\Core\Service\Data;

use Xoops\Core\Service\Data\Email;
use Xoops\Core\Service\Data\EmailAddress;
use Xoops\Core\Service\Data\EmailAddressList;
use Xoops\Core\Service\Data\EmailAttachment;
use Xoops\Core\Service\Data\EmailAttachmentSet;

class EmailTest extends \PHPUnit\Framework\TestCase
{
    protected const TEST_FILE = __DIR__.'/test.png';

    /**
     * @var Email
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new Email();
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
        $this->assertInstanceOf(Email::class, $this->object);
    }

    public function testNewEmailWithArguments(): void
    {
        $subject = 'subject';
        $body = 'body';
        $to = new EmailAddress('test@example.com', 'Tester Fred');
        $from = new EmailAddress('admin@example.com');
        $message = new Email($subject, $body, $from, $to);
        $this->assertInstanceOf(Email::class, $message);
        $this->assertSame($from, $message->getFromAddress());

        $toAddresses = $message->getToAddresses()->getAddresses();
        $this->assertCount(1, $toAddresses);
        $this->assertSame($to, $toAddresses[0]);
        $this->assertSame($subject, $message->getSubject());
        $this->assertSame($body, $message->getBody());
    }

    public function testNewEmailWithUntrimmedArguments(): void
    {
        $message = new Email('subject  ', ' body ');
        $this->assertSame('subject', $message->getSubject());
        $this->assertSame('body', $message->getBody());
    }

    public function testNewMessageBadBody(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $message = new Email(null, '');
    }

    public function testNewEmailBadSubject(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $message = new Email('');
    }

    public function testNewEmailBadFrom(): void
    {
        $emptyAddress = new EmailAddress();
        $this->expectException(\InvalidArgumentException::class);
        $message = new Email(null, null, $emptyAddress);
    }

    public function testNewEmailBadToAddress(): void
    {
        $emptyAddress = new EmailAddress();
        $this->expectException(\InvalidArgumentException::class);
        $message = new Email(null, null, null, $emptyAddress);
    }

    public function testForcedBadFromAddress(): void
    {
        $message = new class() extends Email {
            public function __construct()
            {
                parent::__construct();
                $this->fromAddress = new EmailAddress();
            }
        };
        $this->expectException(\LogicException::class);
        $message->getFromAddress();
    }

    public function testNoBody(): void
    {
        $this->expectException(\LogicException::class);
        $this->object->getBody();
    }

    public function testNoSubject(): void
    {
        $this->expectException(\LogicException::class);
        $this->object->getSubject();
    }

    public function testNoToAddress(): void
    {
        $this->expectException(\LogicException::class);
        $this->object->getToAddresses();
    }

    public function testForcedBadToAddresses(): void
    {
        $message = new class() extends Email {
            public function __construct()
            {
                parent::__construct();
                $this->toAddresses = new EmailAddressList();
            }
        };
        $this->expectException(\LogicException::class);
        $message->getToAddresses();
    }

    public function testWithBody(): void
    {
        $message = $this->object->withBody('body');
        $this->assertNotSame($this->object, $message);
        $this->assertSame('body', $message->getBody());

        $this->expectException(\InvalidArgumentException::class);
        $this->object->withBody('');
    }

    public function testWithSubject(): void
    {
        $message = $this->object->withSubject('subject');
        $this->assertNotSame($this->object, $message);
        $this->assertSame('subject', $message->getSubject());

        $this->expectException(\InvalidArgumentException::class);
        $this->object->withSubject('');
    }

    public function testWithFromAddress(): void
    {
        $message = $this->object->withFromAddress(new EmailAddress('test@example.com'));
        $this->assertNotSame($this->object, $message);
        $from = $message->getFromAddress();
        $this->assertSame('test@example.com', $from->getEmail());

        $this->expectException(\InvalidArgumentException::class);
        $this->object->withFromAddress(new EmailAddress());
    }

    public function testWithBccAddresses(): void
    {
        $this->assertNull($this->object->getBccAddresses());

        $list = new EmailAddressList([new EmailAddress('test@example.com')]);
        $message = $this->object->withBccAddresses($list);
        $this->assertNotSame($this->object, $message);
        $bcc = $message->getBccAddresses();
        $this->assertSame($list, $bcc);

        $this->expectException(\InvalidArgumentException::class);
        $this->object->withBccAddresses(new EmailAddressList());
    }

    public function testWithCcAddresses(): void
    {
        $this->assertNull($this->object->getCcAddresses());

        $list = new EmailAddressList([new EmailAddress('test@example.com')]);
        $message = $this->object->withCcAddresses($list);
        $this->assertNotSame($this->object, $message);
        $cc = $message->getCcAddresses();
        $this->assertSame($list, $cc);

        $this->expectException(\InvalidArgumentException::class);
        $this->object->withCcAddresses(new EmailAddressList());
    }

    public function testWithReplyToAddresses(): void
    {
        $this->assertNull($this->object->getReplyToAddresses());

        $list = new EmailAddressList([new EmailAddress('test@example.com')]);
        $message = $this->object->withReplyToAddresses($list);
        $this->assertNotSame($this->object, $message);
        $reply = $message->getReplyToAddresses();
        $this->assertSame($list, $reply);

        $this->expectException(\InvalidArgumentException::class);
        $this->object->withReplyToAddresses(new EmailAddressList());
    }

    public function testWithToAddresses(): void
    {
        $list = new EmailAddressList([new EmailAddress('test@example.com')]);
        $message = $this->object->withToAddresses($list);
        $this->assertNotSame($this->object, $message);
        $to = $message->getToAddresses();
        $this->assertSame($list, $to);

        $this->expectException(\InvalidArgumentException::class);
        $this->object->withToAddresses(new EmailAddressList());
    }

    public function testWithReadReceiptAddress(): void
    {
        $message = $this->object->withReadReceiptAddress(new EmailAddress('test@example.com'));
        $this->assertNotSame($this->object, $message);
        $rr = $message->getReadReceiptAddress();
        $this->assertSame('test@example.com', $rr->getEmail());

        $this->expectException(\InvalidArgumentException::class);
        $this->object->withReadReceiptAddress(new EmailAddress());
    }

    public function testForcedBadReadReceiptAddress(): void
    {
        $message = new class() extends Email {
            public function __construct()
            {
                parent::__construct();
                $this->readReceiptAddress = new EmailAddress();
            }
        };
        $this->expectException(\LogicException::class);
        $message->getReadReceiptAddress();
    }

    public function testNullGetToAddressesException(): void
    {
        $this->expectException(\LogicException::class);
        $this->object->getToAddresses();
    }

    public function testNullGetFromAddressException(): void
    {
        $this->expectException(\LogicException::class);
        $this->object->getFromAddress();
    }

    public function testWithAttachments(): void
    {
        $attachments = new EmailAttachmentSet([new EmailAttachment(static::TEST_FILE)]);
        $message = $this->object->withAttachments($attachments);
        $this->assertSame($attachments, $message->getAttachments());
        $this->assertNull($this->object->getAttachments());

        $attachments = new EmailAttachmentSet();
        $this->expectException(\InvalidArgumentException::class);
        $this->object->withAttachments($attachments);
    }

    public function testWithForcedBadAttachments(): void
    {
        $message = new class() extends Email {
            public function __construct()
            {
                parent::__construct();
                $this->attachmentSet = new EmailAttachmentSet();
            }
        };
        $this->expectException(\LogicException::class);
        $message->getAttachments();
    }

    public function testWithHtmlBody(): void
    {
        $message = $this->object->withHtmlBody('<p>body</p>');
        $this->assertNotSame($this->object, $message);
        $this->assertSame('<p>body</p>', $message->getHtmlBody());

        $this->assertNull($this->object->getHtmlBody());

        $this->expectException(\InvalidArgumentException::class);
        $this->object->withBody('');
    }

    public function testForcedBadHtmlBody(): void
    {
        $message = new class() extends Email {
            public function __construct()
            {
                parent::__construct();
                $this->htmlBody = '';
            }
        };
        $this->expectException(\LogicException::class);
        $message->getHtmlBody();
    }
}
