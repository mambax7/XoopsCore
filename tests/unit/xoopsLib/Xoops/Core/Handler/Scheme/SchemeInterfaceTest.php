<?php declare(strict_types=1);

namespace Xoops\Core\Handler\Scheme;

use Xoops\Core\Handler\Factory;

require_once __DIR__.'/../../../../../init_new.php';

class SchemeInterfaceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Kernel
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        if (version_compare(PHP_VERSION, '7.1.0beta3', '=')) {
            //var_dump(phpversion());
            $this->markTestSkipped('segfault on mock access?');
        }

        if (method_exists($this, 'createMock')) {
            $this->object = $this->createMock('\Xoops\Core\Handler\Scheme\SchemeInterface');
            $this->object->method('build')
                ->willReturn(null);
        } else { // need phpunit 4.8 for PHP 5.5
            $this->object = $this->getMock('\Xoops\Core\Handler\Scheme\SchemeInterface');
        }
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
        $this->assertInstanceOf('\Xoops\Core\Handler\Scheme\SchemeInterface', $this->object);
    }

    public function testBuild(): void
    {
        $spec = Factory::getInstance()->newSpec();
        $this->assertNull($this->object->build($spec));
    }
}
