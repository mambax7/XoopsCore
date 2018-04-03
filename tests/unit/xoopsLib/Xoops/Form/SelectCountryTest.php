<?php

namespace Xoops\Form;

require_once(__DIR__ . '/../../../init_new.php');

class SelectCountryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var SelectCountry
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new SelectCountry('Caption', 'name');
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
        $this->assertTrue(strpos($value, 'value="US"') !== false);
        $this->assertTrue(strpos($value, '</option>') !== false);

        $this->assertTrue(strpos($value, '</select>') !== false);
    }

    public function test__construct()
    {
        $oldWay = new SelectCountry('mycaption', 'myname', 'FR');
        $newWay = new SelectCountry([
            'caption' => 'mycaption',
            'name' => 'myname',
            'value' => 'FR',
        ]);
        $this->assertSame($oldWay->render(), $newWay->render());
    }
}
