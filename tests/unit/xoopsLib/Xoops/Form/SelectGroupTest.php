<?php

namespace Xoops\Form;

require_once(__DIR__ . '/../../../init_new.php');

class SelectGroupTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var SelectGroup
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new SelectGroup('Caption', 'name');
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
        $this->assertTrue(strpos($value, 'value="1"') !== false);
        $this->assertTrue(strpos($value, '</option>') !== false);
    }

    public function test__construct()
    {
        $oldWay = new SelectGroup('mycaption', 'myname', true, 2);
        $newWay = new SelectGroup([
            'caption' => 'mycaption',
            'name' => 'myname',
            ':include_anon' => true,
            'value' => 2,
        ]);
        $this->assertSame($oldWay->render(), $newWay->render());
    }
}
