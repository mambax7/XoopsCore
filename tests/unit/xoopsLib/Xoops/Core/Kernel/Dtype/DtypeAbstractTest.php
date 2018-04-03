<?php declare(strict_types=1);

namespace Xoops\Core\Kernel\Dtype;

require_once __DIR__.'/../../../../../init_new.php';

class DtypeAbstractTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var DtypeAbstract
     */
    protected $object;

    /**
     * @var \ReflectionClass
     */
    protected $reflectedObject;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = $this->getMockForAbstractClass('\Xoops\Core\Kernel\Dtype\DtypeAbstract');
        $this->reflectedObject = new \ReflectionClass('\Xoops\Core\Kernel\Dtype\DtypeAbstract');
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
        $this->assertTrue($this->reflectedObject->isAbstract());
        $this->assertTrue($this->reflectedObject->hasMethod('cleanVar'));
        $this->assertTrue($this->reflectedObject->hasMethod('getVar'));
        $this->assertInstanceOf('\Xoops\Core\Text\Sanitizer', \PHPUnit\Framework\Assert::readAttribute($this->object, 'ts'));
    }

    public function testCleanVar(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testGetVar(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
