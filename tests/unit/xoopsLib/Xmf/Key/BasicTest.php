<?php declare(strict_types=1);

namespace Xmf\Test\Key;

use Xmf\Key\ArrayStorage;
use Xmf\Key\Basic;
use Xmf\Key\StorageInterface;

class BasicTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var StorageInterface
     */
    protected $storage;

    /**
     * @var Basic
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->storage = new ArrayStorage();
        $this->object = new Basic($this->storage, 'test');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testGetSigning(): void
    {
        $actual = $this->object->getSigning();
        $this->assertEmpty($actual);
        $actual = $this->object->create();
        $this->assertTrue($actual);
        $actual = $this->object->getSigning();
        $this->assertInternalType('string', $actual);
        $this->assertRegExp('/^[0-9a-f]{128}$/', $actual);
    }

    public function testGetVerifying(): void
    {
        $actual = $this->object->getVerifying();
        $this->assertEmpty($actual);
        $actual = $this->object->create();
        $this->assertTrue($actual);
        $actual = $this->object->getVerifying();
        $this->assertInternalType('string', $actual);
        $this->assertRegExp('/^[0-9a-f]{128}$/', $actual);
    }

    public function testCreate(): void
    {
        $actual = $this->object->create();
        $this->assertTrue($actual);

        $actual = $this->object->create();
        $this->assertFalse($actual);
    }

    public function testKill(): void
    {
        $actual = $this->object->create();
        $this->assertTrue($actual);

        $this->assertTrue($this->storage->exists('test'));

        $actual = $this->object->kill();
        $this->assertTrue($actual);

        $this->assertFalse($this->storage->exists('test'));
    }
}
