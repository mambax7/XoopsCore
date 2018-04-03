<?php

namespace Xoops\Form;

require_once(__DIR__ . '/../../../init_new.php');

class TokenTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Token
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Token();
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
        $this->assertTrue(strpos($value, 'type="hidden"') !== false);
        $this->assertTrue(strpos($value, 'name="XOOPS_TOKEN_REQUEST"') !== false);
    }

    public function test__construct()
    {
        // '<input hidden type="hidden" name="XOOPS_TOKEN_REQUEST" value="'
        $oldWay = new Token();
        $newWay = new Token([]);
        $this->assertSame(
            substr($oldWay->render(), 0, 62),
            substr($newWay->render(), 0, 62)
        );
    }
}
