<?php declare(strict_types=1);

namespace Xoops\Form;

require_once __DIR__.'/../../../init_new.php';

class RadioTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Radio
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new Radio('Caption', 'name');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testGetValue(): void
    {
        $object = new Radio('Caption', 'name', 'value');
        $value = $object->getValue();
        $this->assertSame('value', $value);
    }

    public function testAddOption(): void
    {
        $this->object->addOption('key', 'value');
        $this->object->addOption('just_key');
        $value = $this->object->getOptions();
        $this->assertInternalType('array', $value);
        $this->assertSame('value', $value['key']);
        $this->assertSame('just_key', $value['just_key']);
    }

    public function testAddOptionArray(): void
    {
        $this->object->addOptionArray(['key' => 'value', 'just_key' => null]);
        $value = $this->object->getOptions();
        $this->assertInternalType('array', $value);
        $this->assertSame('value', $value['key']);
        $this->assertSame('just_key', $value['just_key']);
    }

    public function testRender(): void
    {
        $this->object->addOption('key', 'value');
        $value = $this->object->render();
        $this->assertInternalType('string', $value);
        $this->assertTrue(false !== strpos($value, '<label class="radio'));
        $this->assertTrue(false !== strpos($value, ' type="radio"'));
    }

    public function test__construct(): void
    {
        $oldWay = new Radio('mycaption', 'myname', 'myvalue');
        $newWay = new Radio(['caption' => 'mycaption', 'type' => 'button', 'name' => 'myname', ':inline' => null]);
        $this->assertSame($oldWay->render(), $newWay->render());
    }
}
