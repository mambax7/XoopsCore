<?php declare(strict_types=1);

namespace Xoops\Form;

require_once __DIR__.'/../../../init_new.php';

class RawTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Raw
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new Raw('value');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testRender(): void
    {
        $value = $this->object->render();
        $this->assertInternalType('string', $value);
        $this->assertSame('value', $value);
    }

    public function test__construct(): void
    {
        $oldWay = new Raw('myvalue');
        $newWay = new Raw(['value' => 'myvalue']);
        $this->assertSame($oldWay->render(), $newWay->render());
    }
}
