<?php declare(strict_types=1);

namespace Xoops\Test\Core\Service\Data;

use Xoops\Core\Service\Data\EmailAddress;

class EmailAddressTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var EmailAddress
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new EmailAddress();
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
        $this->assertInstanceOf(EmailAddress::class, $this->object);
    }

    public function testNewEmailAddressWithArguments(): void
    {
        $address = new EmailAddress('user@example.com', 'name');
        $this->assertInstanceOf('\Xoops\Core\Service\Data\EmailAddress', $address);
        $this->assertSame('user@example.com', $address->getEmail());
        $this->assertSame('name', $address->getDisplayName());
    }

    public function testNewEmailAddressWithFluent(): void
    {
        $actual = $this->object->withEmail('user@example.com')->withDisplayName('name');
        $this->assertNotSame($this->object, $actual);
        $this->assertSame('user@example.com', $actual->getEmail());
        $this->assertSame('name', $actual->getDisplayName());
        $this->expectException(\LogicException::class);
        $this->object->getEmail();
    }

    public function testNewEmailAddressBadArguments(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $address = new EmailAddress('fred');
    }

    public function testGetEmailNotSet(): void
    {
        try {
            $this->object->getEmail();
        } catch (\LogicException $e) {
            $this->assertContains('Email', $e->getMessage());
        }
        $this->assertInstanceOf(\LogicException::class, $e);
    }

    public function testGetDisplayNameNotSet(): void
    {
        $actual = $this->object->getDisplayName();
        $this->assertNull($actual);
    }

    public function testGetDisplayNameInvalid(): void
    {
        $address = new class() extends EmailAddress {
            public function __construct()
            {
                parent::__construct();
                $this->displayName = 12;
            }
        };

        try {
            $address->getDisplayName();
        } catch (\LogicException $e) {
            $this->assertContains('Display', $e->getMessage());
        }
        $this->assertInstanceOf(\LogicException::class, $e);
    }
}
