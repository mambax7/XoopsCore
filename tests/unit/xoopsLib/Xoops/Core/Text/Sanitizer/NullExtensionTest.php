<?php declare(strict_types=1);

namespace Xoops\Core\Text\Sanitizer;

use Xoops\Core\Text\Sanitizer;

require_once __DIR__.'/../../../../../init_new.php';

class NullExtensionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var NullExtension
     */
    protected $object;

    /**
     * @var Sanitizer
     */
    protected $sanitizer;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->sanitizer = Sanitizer::getInstance();
        $this->object = new NullExtension($this->sanitizer);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testRegisterExtensionProcessing(): void
    {
        $actual = $this->sanitizer->getDhtmlEditorSupport('nosuchextension', '');
        $this->assertSame(['', ''], $actual);
        $expected = $this->object->registerExtensionProcessing('muck');
        $actual = call_user_func_array([$this->object, 'registerExtensionProcessing'], $args);
        $this->assertSame($expected, $actual);
    }
}
