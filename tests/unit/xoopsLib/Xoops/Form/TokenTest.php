<?php declare(strict_types=1);

namespace Xoops\Form;

require_once __DIR__.'/../../../init_new.php';

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
    protected function setUp(): void
    {
        $this->object = new Token();
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
        $this->assertTrue(false !== strpos($value, '<input'));
        $this->assertTrue(false !== strpos($value, 'type="hidden"'));
        $this->assertTrue(false !== strpos($value, 'name="XOOPS_TOKEN_REQUEST"'));
    }

    public function test__construct(): void
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
