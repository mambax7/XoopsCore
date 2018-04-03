<?php declare(strict_types=1);

namespace Xoops\Core\Kernel\Dtype;

require_once __DIR__.'/../../../../../init_new.php';

class DtypeEnumerationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var DtypeDecimal
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new DtypeEnumeration();
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
        $this->assertInstanceOf('\Xoops\Core\Kernel\Dtype\DtypeAbstract', $this->object);
        $this->assertInstanceOf('\Xoops\Core\Kernel\Dtype\DtypeEnumeration', $this->object);
    }

    public function testCleanVar(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
