<?php
namespace Xoops\Core\Kernel\Dtype;

require_once __DIR__ . '/../../../../../init_new.php';

use Xoops\Core\Kernel\Dtype;
use Xoops\Core\Kernel\XoopsObject;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-10-05 at 09:50:10.
 */
class DtypeAbstractTest extends \PHPUnit_Framework_TestCase
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
    protected function setUp()
    {
        $this->object = $this->getMockForAbstractClass('\Xoops\Core\Kernel\Dtype\DtypeAbstract');
        $this->reflectedObject = new \ReflectionClass('\Xoops\Core\Kernel\Dtype\DtypeAbstract');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testContracts()
    {
        $this->assertTrue($this->reflectedObject->isAbstract());
        $this->assertTrue($this->reflectedObject->hasMethod('cleanVar'));
        $this->assertTrue($this->reflectedObject->hasMethod('getVar'));
        $this->assertInstanceOf('\MyTextSanitizer', \PHPUnit_Framework_Assert::readAttribute($this->object, 'ts'));
    }

    /**
     * @covers Xoops\Core\Kernel\Dtype\DtypeAbstract::cleanVar
     * @todo   Implement testCleanVar().
     */
    public function testCleanVar()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xoops\Core\Kernel\Dtype\DtypeAbstract::getVar
     * @todo   Implement testGetVar().
     */
    public function testGetVar()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
