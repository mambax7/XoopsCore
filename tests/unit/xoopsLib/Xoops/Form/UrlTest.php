<?php

namespace Xoops\Form;

require_once(__DIR__ . '/../../../init_new.php');

class UrlTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Url
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Url('Caption', 'name', 80, 200);
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
        $this->assertTrue(strpos($value, '<input') !== false);
        $this->assertTrue(strpos($value, 'type="url"') !== false);
        $this->assertTrue(strpos($value, 'name="name"') !== false);
        $this->assertTrue(strpos($value, 'size="80"') !== false);
        $this->assertTrue(strpos($value, 'maxlength="200"') !== false);
    }
}
