<?php declare(strict_types=1);

namespace Xmf\Database;

require_once __DIR__.'/../../../init_new.php';

class TableLoadTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var TableLoad
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new TableLoad();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testLoadTableFromArray(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testLoadTableFromYamlFile(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testTruncateTable(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testRowCount(): void
    {
        $actual = $this->object->countRows('system_user');
        $this->assertInternalType('int', $actual);
        $this->assertTrue($actual >= 1);
    }
}
