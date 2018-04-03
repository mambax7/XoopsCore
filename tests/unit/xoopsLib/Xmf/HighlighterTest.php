<?php declare(strict_types=1);

namespace Xmf\Test;

use Xmf\Highlighter;

class HighlighterTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Highlighter
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new Highlighter();
        $this->assertInstanceOf('Xmf\Highlighter', $this->object);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testApply(): void
    {
        $output = Highlighter::apply('test', 'This test is OK.');
        $this->assertSame('This <mark>test</mark> is OK.', $output);

        $output = Highlighter::apply(['test', 'ok'], 'This test is OK.', '<i>', '</i>');
        $this->assertSame('This <i>test</i> is <i>OK</i>.', $output);

        $output = Highlighter::apply('test    ok', 'This test is OK.', '<i>', '</i>');
        $this->assertSame('This <i>test</i> is <i>OK</i>.', $output);

        $output = Highlighter::apply(['test', 'ok'], 'This test <test>is</test> OK.', '<i>', '</i>');
        $this->assertSame('This <i>test</i> <test>is</test> <i>OK</i>.', $output);
    }
}
