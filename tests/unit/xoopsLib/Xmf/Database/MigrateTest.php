<?php declare(strict_types=1);

namespace Xmf\Database;

require_once __DIR__.'/../../../init_new.php';

class MigrateTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Migrate
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new Migrate('page');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testContracts(): void
    {
        $this->assertInstanceOf('\Xmf\Database\Migrate', $this->object);
    }

    public function testSaveCurrentSchema(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testGetCurrentSchema(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testGetTargetDefinitions(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testSynchronizeSchema(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testGetSynchronizeDDL(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testGetLastError(): void
    {
        $actual = $this->object->getLastError();
        $this->assertNull($actual);
    }

    public function testGetLastErrNo(): void
    {
        $actual = $this->object->getLastErrNo();
        $this->assertNull($actual);
    }
}
