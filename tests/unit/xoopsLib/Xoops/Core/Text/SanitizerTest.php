<?php declare(strict_types=1);

namespace Xoops\Core\Text;

require_once __DIR__.'/../../../../init_new.php';

class SanitizerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Sanitizer
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = Sanitizer::getInstance();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testGetInstance(): void
    {
        $actual = Sanitizer::getInstance();
        $this->assertInstanceOf('\Xoops\Core\Text\Sanitizer', $actual);
        $this->assertSame($this->object, $actual);
    }

    public function testGetShortCodesInstance(): void
    {
        $actual = $this->object->getShortCodesInstance();
        $this->assertInstanceOf('\Xoops\Core\Text\ShortCodes', $actual);
        $this->assertSame($this->object->getShortCodesInstance(), $actual);
    }

    public function testGetShortCodes(): void
    {
        $actual = $this->object->getShortCodesInstance();
        $this->assertInstanceOf('\Xoops\Core\Text\ShortCodes', $actual);
        $this->assertSame($this->object->getShortCodes(), $actual);
    }

    public function testAddPatternCallback(): void
    {
        $this->object->addPatternCallback(
            '~(\d{4})-(\d{2})-(\d{2})~',
            function ($matches) {
                return $matches[2].'/'.$matches[3].'/'.$matches[1];
            }
        );
        $text = '2015-12-14';
        $expected = '12/14/2015';
        $actual = $this->object->filterForDisplay($text);
        // Remove the following lines when you implement this test.
        $this->assertSame($expected, $actual);
    }

    public function testSmiley(): void
    {
        if (\Xoops::getInstance()->isActiveModule('smilies')) {
            $message = $this->object->smiley('happy :-) happy');
            $this->assertRegExp('/^happy .*<img.* happy$/', $message);
        } else {
            $this->markTestSkipped('Smilies module not installed');
        }
    }

    public function testMakeClickable(): void
    {
        $this->object->enableComponentForTesting('clickable');

        $in = 'http://xoops.org';
        $expected = '<a href="http://xoops.org" title="http://xoops.org"rel="external">http://xoops.org</a>';
        $actual = $this->object->makeClickable($in);
        $this->assertSame($expected, $actual);
    }

    public function testNl2Br(): void
    {
        $text = "\n";
        $message = $this->object->nl2br($text);
        $this->assertSame("\n<br />\n", $message);
        $text = "\r\n";
        $message = $this->object->nl2br($text);
        $this->assertSame("\n<br />\n", $message);
        $text = "\r";
        $message = $this->object->nl2br($text);
        $this->assertSame("\n<br />\n", $message);
    }

    public function testHtmlSpecialChars(): void
    {
        $text = "\"'<>&";
        $message = $this->object->htmlSpecialChars($text);
        $this->assertSame('&quot;&#039;&lt;&gt;&amp;', $message);

        $text = 'toto&titi';
        $message = $this->object->htmlSpecialChars($text);
        $this->assertSame('toto&amp;titi', $message);

        $text = 'toto&nbsp;titi';
        $message = $this->object->htmlSpecialChars($text);
        $this->assertSame('toto&nbsp;titi', $message);
    }

    public function testEscapeForJavascript(): void
    {
        $text = 'enter an "T" for testing';
        $expected = 'enter an \x22T\x22 for testing';
        $actual = $this->object->escapeForJavascript($text);
        $this->assertSame($actual, $expected);
    }

    public function testEscapeShortCodes(): void
    {
        $text = '[Random] [brackets]][';
        $expected = '&#91;Random&#93; &#91;brackets&#93;&#93;&#91;';
        $actual = $this->object->escapeShortCodes($text);
        $this->assertSame($actual, $expected);
    }

    public function testUndoHtmlSpecialChars(): void
    {
        $text = '&gt;&lt;&quot;&#039;&amp;nbsp;';
        $message = $this->object->undohtmlSpecialChars($text);
        $this->assertSame('><"\'&nbsp;', $message);
    }

    /**
     * @todo   Implement testFilterForDisplay().
     *
     * This needs to be extended to do more than just touch the code :)
     */
    public function testFilterForDisplay(): void
    {
        $text = 'testing';
        $actual = $this->object->filterForDisplay($text);
        $this->assertSame($text, $actual);

        $text = '[code]testing[/code]';
        $actual = $this->object->filterForDisplay($text);
        $this->assertNotEmpty($actual);
    }

    public function testDisplayTarea(): void
    {
        $text = 'testing';
        $actual = $this->object->displayTarea($text);
        $this->assertSame($text, $actual);
    }

    public function testPreviewTarea(): void
    {
        $text = 'testing';
        $actual = $this->object->previewTarea($text);
        $this->assertSame($text, $actual);
    }

    public function testCensorString(): void
    {
        $xoops = \Xoops::getInstance();
        $xoops->setConfig('censor_enable', true);
        $xoops->setConfig('censor_words', ['naughty', 'bits']);
        $xoops->setConfig('censor_replace', '%#$@!');

        $text = 'Xoops is cool!';
        $expected = $text;
        $text = $this->object->censorString($text);
        $this->assertSame($expected, $text);

        $text = 'naughty it!';
        $expected = '%#$@! it!';
        $text = $this->object->censorString($text);
        $this->assertSame($expected, $text);
    }

    public function testListExtensions(): void
    {
        $actual = $this->object->listExtensions();
        $this->assertInternalType('array', $actual);
    }

    public function testGetDhtmlEditorSupport(): void
    {
        $this->object->enableComponentForTesting('soundcloud');
        $support = $this->object->getDhtmlEditorSupport('soundcloud', 'testeditorarea');
        $this->assertTrue(2 === count($support));
        $this->assertInternalType('string', $support[0]);
        $this->assertInternalType('string', $support[1]);

        $support = $this->object->getDhtmlEditorSupport('thisisnotarealextension', 'testeditorarea');
        $this->assertTrue(2 === count($support));
        $this->assertSame('', $support[0]);
        $this->assertSame('', $support[1]);
    }

    public function testGetConfig(): void
    {
        $actual = $this->object->getConfig();
        $this->assertInternalType('array', $actual);

        $actual = $this->object->getConfig('xoopscode');
        $this->assertInternalType('array', $actual);
    }

    public function testExecuteFilter(): void
    {
        $text = 'testing';
        $expected = $text;
        $actual = $this->object->executeFilter('nosuchfilter', $text);
        $this->object->executeFilter('nosuchfilter', $text);
        $this->assertSame($expected, $text);
        $this->assertSame($expected, $actual);
    }

    public function testTextFilter(): void
    {
        $text = 'toto titi tutu tata';
        $value = $this->object->textFilter($text);
        $this->assertSame($text, $value);
    }

    public function testFilterXss(): void
    {
        $text = "\x00";
        $message = $this->object->filterxss($text);
        $this->assertSame('', $message);
    }

    public function testCleanEnum(): void
    {
        $text = 'alpha';
        $actual = $this->object->cleanEnum($text, ['alpha', 'baker', 'charlie'], '');
        $this->assertSame($text, $actual);

        $text = 'fred';
        $actual = $this->object->cleanEnum($text, ['alpha', 'baker', 'charlie'], '');
        $this->assertSame('', $actual);

        $text = 'b';
        $actual = $this->object->cleanEnum($text, ['alpha', 'baker', 'charlie'], '', true);
        $this->assertSame('baker', $actual);
    }
}
