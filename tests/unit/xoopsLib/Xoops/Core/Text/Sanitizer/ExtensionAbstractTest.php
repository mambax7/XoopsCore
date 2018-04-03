<?php declare(strict_types=1);

namespace Xoops\Core\Text\Sanitizer;

use Xoops\Core\Text\Sanitizer;

require_once __DIR__.'/../../../../../init_new.php';

class ExtensionAbstractTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ExtensionAbstract
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
        $ts = Sanitizer::getInstance();
        $this->object = $this->getMockForAbstractClass('\Xoops\Core\Text\Sanitizer\ExtensionAbstract', [$ts]);
        $this->reflectedObject = new \ReflectionClass('\Xoops\Core\Text\Sanitizer\ExtensionAbstract');
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
        $this->assertTrue($this->reflectedObject->hasMethod('getDhtmlEditorSupport'));
        $this->assertTrue($this->reflectedObject->hasMethod('registerExtensionProcessing'));
        $this->assertTrue($this->reflectedObject->hasMethod('getEditorButtonHtml'));
    }

    public function testGetDhtmlEditorSupport(): void
    {
        $support = $this->object->getDhtmlEditorSupport('testeditorarea');
        $this->assertTrue(2 === count($support));
        $this->assertSame('', $support[0]);
        $this->assertSame('', $support[1]);
    }
}
