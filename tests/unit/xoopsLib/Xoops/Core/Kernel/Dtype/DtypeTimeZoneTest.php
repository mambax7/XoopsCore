<?php

namespace Xoops\Core\Kernel\Dtype;

require_once __DIR__ . '/../../../../../init_new.php';

use Xoops\Core\Kernel\Dtype;
use Xoops\Core\Kernel\XoopsObject;

/**
 * Test XoopsObject with a Dtype::TYPE_TIMEZONE var
 */
class DtypeTimeZoneObject extends XoopsObject
{
    public function __construct()
    {
        $this->initVar('timezone_test', Dtype::TYPE_TIMEZONE);
    }
}

class DtypeTimeZoneTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var DtypeTimeZone
     */
    protected $object;

    /**
     * @var DtypeTimeZoneObject
     */
    protected $xObject;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new DtypeTimeZone();
        $this->xObject = new DtypeTimeZoneObject();
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
        $this->assertInstanceOf('\Xoops\Core\Kernel\Dtype\DtypeAbstract', $this->object);
        $this->assertInstanceOf('\Xoops\Core\Kernel\Dtype\DtypeTimeZone', $this->object);
    }

    public function testGetVarCleanVar()
    {
        $testValue = 'America/New_York';
        $key = 'timezone_test';

        $this->xObject[$key] = $testValue;
        $this->xObject[$key] = $this->object->cleanVar($this->xObject, $key);
        $value = $this->xObject->getVar($key, Dtype::FORMAT_NONE);
        $this->assertSame($testValue, $value);

        $value1 = $this->xObject->getVar($key, Dtype::FORMAT_SHOW);
        $this->assertInstanceOf('\DateTimeZone', $value1);
        $this->assertSame($testValue, $value1->getName());
        $value2 = $this->xObject[$key];
        $this->assertInstanceOf('\DateTimeZone', $value2);
        $this->assertSame($testValue, $value2->getName());
        $this->assertNotSame($value1, $value2);

        $this->xObject[$key] = new \DateTimeZone($testValue);
        $this->xObject[$key] = $this->object->cleanVar($this->xObject, $key);
        $value = $this->xObject->getVar($key, Dtype::FORMAT_NONE);
        $this->assertSame($testValue, $value);

        $this->xObject[$key] = new \DateTime('now', new \DateTimeZone($testValue));
        $this->xObject[$key] = $this->object->cleanVar($this->xObject, $key);
        $value = $this->xObject->getVar($key, Dtype::FORMAT_NONE);
        $this->assertSame($testValue, $value);
    }

    public function testGetVarCleanVar_error()
    {
        $testValue = 'GarbageTimeZone';
        $key = 'timezone_test';

        $this->xObject[$key] = $testValue;
        $this->xObject[$key] = $this->object->cleanVar($this->xObject, $key);
        $value = $this->xObject->getVar($key, Dtype::FORMAT_NONE);
        $this->assertSame('UTC', $value);

        $value1 = $this->xObject->getVar($key, Dtype::FORMAT_SHOW);
        $this->assertInstanceOf('\DateTimeZone', $value1);
        $this->assertSame('UTC', $value1->getName());
    }
}
