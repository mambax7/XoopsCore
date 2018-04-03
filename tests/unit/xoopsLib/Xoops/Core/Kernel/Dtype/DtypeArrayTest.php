<?php declare(strict_types=1);

namespace Xoops\Core\Kernel\Dtype;

require_once __DIR__.'/../../../../../init_new.php';

use Xoops\Core\Kernel\Dtype;
use Xoops\Core\Kernel\XoopsObject;

/**
 * Test XoopsObject with a Dtype::TYPE_ARRAY var.
 */
class DtypeArrayObject extends XoopsObject
{
    public function __construct()
    {
        $this->initVar('arraytest', Dtype::TYPE_ARRAY);
    }
}

class DtypeArrayTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var DtypeArray
     */
    protected $object;

    /**
     * @var DtypeArrayObject
     */
    protected $xObject;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new DtypeArray();
        $this->xObject = new DtypeArrayObject();
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
        $this->assertInstanceOf('\Xoops\Core\Kernel\Dtype\DtypeArray', $this->object);
    }

    public function testGetVarCleanVar(): void
    {
        $testArray = [
            'dog' => 'Spot',
            'girl' => 'Jane',
            'Boy' => 'Dick',
            'see' => 'run',
            "I'm a problem" => 'Not "really.',
        ];
        $key = 'arraytest';

        $this->xObject[$key] = $testArray;
        $this->xObject[$key] = $this->object->cleanVar($this->xObject, $key);
        //var_dump($this->xObject->vars[$key]['value']);
        $value = $this->xObject[$key];
        $this->assertInternalType('array', $value);
        $this->assertSame('Spot', $value['dog']);
        $this->assertSame('run', $value['see']);

        $value = $this->xObject->getVar($key, Dtype::FORMAT_SHOW);
        $this->assertInternalType('array', $value);
        //var_dump($value);

        $value = $this->xObject->getVar($key, Dtype::FORMAT_NONE);
        $this->assertInternalType('string', $value);
        //var_dump($value);
        $this->assertSame('a:5:{s:', substr($value, 0, 7));
    }
}
