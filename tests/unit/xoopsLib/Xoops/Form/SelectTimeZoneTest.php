<?php

namespace Xoops\Form;

require_once(__DIR__ . '/../../../init_new.php');

class SelectTimeZoneTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var SelectTimeZone
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new SelectTimeZone('Caption', 'name');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testRender()
    {
        $value = $this->object->render();
        $this->assertTrue(is_string($value));
        $this->assertTrue(strpos($value, '<select') !== false);
        $this->assertTrue(strpos($value, 'name="name"') !== false);
        $this->assertTrue(strpos($value, 'size="1"') !== false);
        $this->assertTrue(strpos($value, 'title="Caption"') !== false);
        $this->assertTrue(strpos($value, 'id="name"') !== false);

        $this->assertTrue(strpos($value, '<option') !== false);
        $this->assertTrue(strpos($value, 'value="UTC"') !== false);
        $this->assertTrue(strpos($value, 'value="America/Chicago"') !== false);
        $this->assertTrue(strpos($value, 'value="Europe/Paris"') !== false);
        $this->assertTrue(strpos($value, '</option>') !== false);
    }

    public function testValue()
    {
        $testValue = 'Europe/Paris';
        $element = new SelectTimeZone('Caption', 'name', $testValue);
        $actual = $element->getValue(false);
        $this->assertSame($testValue, $actual);

        $testValue = 'Europe/Paris';
        $element = new SelectTimeZone('Caption', 'name', new \DateTimeZone($testValue));
        $actual = $element->getValue(false);
        $this->assertSame($testValue, $actual);
    }

    public function test__construct()
    {
        $value = new \DateTimeZone('Europe/Paris');
        $oldWay = new SelectTimeZone('mycaption', 'myname', $value);
        $newWay = new SelectTimeZone([
            'caption' => 'mycaption',
            'name' => 'myname',
            'value' => $value,
        ]);
        $this->assertSame($oldWay->render(), $newWay->render());
    }
}
