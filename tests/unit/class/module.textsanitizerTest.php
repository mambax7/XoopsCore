<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

class ModuleMyTextSanitizerTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'MyTextSanitizer';

    public function test_getInstance(): void
    {
        $class = $this->myClass;
        $sanitizer = $class::getInstance();
        $this->assertInstanceOf($this->myClass, $sanitizer);
    }

    public function test_getinstance100(): void
    {
        $class = $this->myClass;
        $sanitizer = $class::getInstance();
        $this->assertInstanceOf($this->myClass, $sanitizer);
        $sanitizer2 = $class::getInstance();
        $this->assertSame($sanitizer2, $sanitizer);
    }

    public function test_smiley(): void
    {
        $class = $this->myClass;
        $sanitizer = $class::getInstance();
        $message = $sanitizer->smiley('happy :-) happy');
        $this->assertInternalType('string', $message);
    }

    public function test_makeClickable(): void
    {
        $class = $this->myClass;
        $sanitizer = $class::getInstance();
        $text = 'toto';
        $message = $sanitizer->makeClickable($text);
        $this->assertInternalType('string', $text);
    }

    /**
     * callback for test.
     */
    public function decode_check_level($sanitizer, $text)
    {
        $level = ob_get_level();
        $message = $sanitizer->xoopsCodeDecode($text);
        while (ob_get_level() > $level) {
            @ob_end_flush();
        }

        return $message;
    }

    public function test_xoopsCodeDecode(): void
    {
        $this->markTestSkipped('now protected - move to extension test');
        $path = \XoopsBaseConfig::get('root-path');
        if (!class_exists('Comments', false)) {
            \XoopsLoad::addMap([
                'comments' => $path.'/modules/comments/class/helper.php',
            ]);
        }
        if (!class_exists('MenusDecorator', false)) {
            \XoopsLoad::addMap([
                'menusdecorator' => $path.'/modules/menus/class/decorator.php',
            ]);
        }
        if (!class_exists('MenusBuilder', false)) {
            \XoopsLoad::addMap([
                'menusbuilder' => $path.'/modules/menus/class/builder.php',
            ]);
        }

        $class = $this->myClass;
        $sanitizer = $class::getInstance();
        $host = 'monhost.fr';
        $site = 'MonSite';

        $text = '[siteurl="'.$host.'"]'.$site.'[/siteurl]';
        $message = $this->decode_check_level($sanitizer, $text);
        $xoops_url = \XoopsBaseConfig::get('url');
        $this->assertSame('<a href="'.$xoops_url.'/'.$host.'" title="">'.$site.'</a>', $message);
        $text = '[siteurl=\''.$host.'\']'.$site.'[/siteurl]';
        $message = $this->decode_check_level($sanitizer, $text);
        $this->assertSame('<a href="'.$xoops_url.'/'.$host.'" title="">'.$site.'</a>', $message);

        $text = '[url="http://'.$host.'"]'.$site.'[/url]';
        $message = $this->decode_check_level($sanitizer, $text);
        $this->assertSame('<a href="http://'.$host.'" rel="external" title="">'.$site.'</a>', $message);
        $text = '[url=\'http://'.$host.'\']'.$site.'[/url]';
        $message = $this->decode_check_level($sanitizer, $text);
        $this->assertSame('<a href="http://'.$host.'" rel="external" title="">'.$site.'</a>', $message);
        $text = '[url="https://'.$host.'"]'.$site.'[/url]';
        $message = $this->decode_check_level($sanitizer, $text);
        $this->assertSame('<a href="https://'.$host.'" rel="external" title="">'.$site.'</a>', $message);
        $text = '[url=\'https://'.$host.'\']'.$site.'[/url]';
        $message = $this->decode_check_level($sanitizer, $text);
        $this->assertSame('<a href="https://'.$host.'" rel="external" title="">'.$site.'</a>', $message);
        $text = '[url="ftp://'.$host.'"]'.$site.'[/url]';
        $message = $this->decode_check_level($sanitizer, $text);
        $this->assertSame('<a href="ftp://'.$host.'" rel="external" title="">'.$site.'</a>', $message);
        $text = '[url=\'ftp://'.$host.'\']'.$site.'[/url]';
        $message = $this->decode_check_level($sanitizer, $text);
        $this->assertSame('<a href="ftp://'.$host.'" rel="external" title="">'.$site.'</a>', $message);
        $text = '[url="ftps://'.$host.'"]'.$site.'[/url]';
        $message = $this->decode_check_level($sanitizer, $text);
        $this->assertSame('<a href="ftps://'.$host.'" rel="external" title="">'.$site.'</a>', $message);
        $text = '[url=\'ftps://'.$host.'\']'.$site.'[/url]';
        $message = $this->decode_check_level($sanitizer, $text);
        $this->assertSame('<a href="ftps://'.$host.'" rel="external" title="">'.$site.'</a>', $message);
        $text = '[url="'.$host.'"]'.$site.'[/url]';
        $message = $this->decode_check_level($sanitizer, $text);
        $this->assertSame('<a href="http://'.$host.'" rel="external" title="">'.$site.'</a>', $message);
        $text = '[url=\''.$host.'\']'.$site.'[/url]';
        $message = $this->decode_check_level($sanitizer, $text);
        $this->assertSame('<a href="http://'.$host.'" rel="external" title="">'.$site.'</a>', $message);
    }

    public function test_xoopsCodeDecode100(): void
    {
        $this->markTestSkipped('now protected - move to extension test');
        $class = $this->myClass;
        $sanitizer = $class::getInstance();
        $string = 'string';

        $color = 'color';
        $text = '[color="'.$color.'"]'.$string.'[/color]';
        $message = $sanitizer->xoopsCodeDecode($text);
        $this->assertSame('<span style="color: #'.$color.';">'.$string.'</span>', $message);
        $text = '[color=\''.$color.'\']'.$string.'[/color]';
        $message = $sanitizer->xoopsCodeDecode($text);
        $this->assertSame('<span style="color: #'.$color.';">'.$string.'</span>', $message);

        $size = 'size-size';
        $text = '[size="'.$size.'"]'.$string.'[/size]';
        $message = $sanitizer->xoopsCodeDecode($text);
        $this->assertSame('<span style="font-size: '.$size.';">'.$string.'</span>', $message);
        $text = '[size=\''.$size.'\']'.$string.'[/size]';
        $message = $sanitizer->xoopsCodeDecode($text);
        $this->assertSame('<span style="font-size: '.$size.';">'.$string.'</span>', $message);

        $font = 'font-font';
        $text = '[font="'.$font.'"]'.$string.'[/font]';
        $message = $sanitizer->xoopsCodeDecode($text);
        $this->assertSame('<span style="font-family: '.$font.';">'.$string.'</span>', $message);
        $text = '[font=\''.$font.'\']'.$string.'[/font]';
        $message = $sanitizer->xoopsCodeDecode($text);
        $this->assertSame('<span style="font-family: '.$font.';">'.$string.'</span>', $message);
    }

    public function test_xoopsCodeDecode200(): void
    {
        $this->markTestSkipped('now protected - move to extension test');
        $class = $this->myClass;
        $sanitizer = $class::getInstance();
        $string = 'string';

        $text = '[b]'.$string.'[/b]';
        $message = $sanitizer->xoopsCodeDecode($text);
        $this->assertSame('<strong>'.$string.'</strong>', $message);
        $text = '[i]'.$string.'[/i]';
        $message = $sanitizer->xoopsCodeDecode($text);
        $this->assertSame('<em>'.$string.'</em>', $message);
        $text = '[u]'.$string.'[/u]';
        $message = $sanitizer->xoopsCodeDecode($text);
        $this->assertSame('<u>'.$string.'</u>', $message);
        $text = '[d]'.$string.'[/d]';
        $message = $sanitizer->xoopsCodeDecode($text);
        $this->assertSame('<del>'.$string.'</del>', $message);
        $text = '[center]'.$string.'[/center]';
        $message = $sanitizer->xoopsCodeDecode($text);
        $this->assertSame('<div style="text-align: center;">'.$string.'</div>', $message);
        $text = '[left]'.$string.'[/left]';
        $message = $sanitizer->xoopsCodeDecode($text);
        $this->assertSame('<div style="text-align: left;">'.$string.'</div>', $message);
        $text = '[right]'.$string.'[/right]';
        $message = $sanitizer->xoopsCodeDecode($text);
        $this->assertSame('<div style="text-align: right;">'.$string.'</div>', $message);
    }

    public function test_quoteConv(): void
    {
        $this->markTestSkipped('now protected - move to extension test');
        $class = $this->myClass;
        $sanitizer = $class::getInstance();
        $string = 'string';
        $text = '[quote]'.$string.'[/quote]';
        $message = $sanitizer->quoteConv($text);
        $this->assertSame(XoopsLocale::C_QUOTE.'<div class="xoopsQuote"><blockquote>'.$string.'</blockquote></div>', $message);

        $string = 'string';
        $text = '[quote]toto'.'[quote]'.$string.'[/quote]'.'titi[/quote]';
        $message = $sanitizer->quoteConv($text);
        $this->assertSame(XoopsLocale::C_QUOTE.'<div class="xoopsQuote"><blockquote>totoQuote:<div class="xoopsQuote"><blockquote>'.$string.'</blockquote></div>titi</blockquote></div>', $message);
    }

    public function test_filterxss(): void
    {
        $class = $this->myClass;
        $sanitizer = $class::getInstance();
        $text = "\x00";
        $message = $sanitizer->filterxss($text);
        $this->assertSame('', $message);
    }

    public function test_nl2br(): void
    {
        $class = $this->myClass;
        $sanitizer = $class::getInstance();
        $text = "\n";
        $message = $sanitizer->nl2br($text);
        $this->assertSame("\n<br />\n", $message);
        $text = "\r\n";
        $message = $sanitizer->nl2br($text);
        $this->assertSame("\n<br />\n", $message);
        $text = "\r";
        $message = $sanitizer->nl2br($text);
        $this->assertSame("\n<br />\n", $message);
    }

    /**
     * @expectedException \LogicException
     */
    public function test_addSlashes(): void
    {
        $class = $this->myClass;
        $sanitizer = $class::getInstance();
        $text = 'toto titi \'tutu tata';
        $message = $sanitizer->addSlashes($text);
    }

    /**
     * @expectedException \LogicException
     */
    public function test_stripSlashesGPC(): void
    {
        $class = $this->myClass;
        $sanitizer = $class::getInstance();
        $text = 'toto titi \\\'tutu tata';
        $message = $sanitizer->stripSlashesGPC($text);
    }

    public function test_htmlSpecialChars(): void
    {
        $class = $this->myClass;
        $sanitizer = $class::getInstance();
        $text = "\"'<>&";
        $message = $sanitizer->htmlSpecialChars($text);
        $this->assertSame('&quot;&#039;&lt;&gt;&amp;', $message);

        $text = 'toto&titi';
        $message = $sanitizer->htmlSpecialChars($text);
        $this->assertSame('toto&amp;titi', $message);

        $text = 'toto&nbsp;titi';
        $message = $sanitizer->htmlSpecialChars($text);
        $this->assertSame('toto&nbsp;titi', $message);
    }

    public function test_undohtmlSpecialChars(): void
    {
        $class = $this->myClass;
        $sanitizer = $class::getInstance();
        $text = '&gt;&lt;&quot;&#039;&amp;nbsp;';
        $message = $sanitizer->undohtmlSpecialChars($text);
        $this->assertSame('><"\'&nbsp;', $message);
    }

    public function test_displayTarea(): void
    {
        $class = $this->myClass;
        $sanitizer = $class::getInstance();
        $text = 'éeidoà';
        $message = $sanitizer->displayTarea($text, 1);
        $this->assertSame($text, $message);
    }

    public function test_previewTarea(): void
    {
        $class = $this->myClass;
        $sanitizer = $class::getInstance();

        $text = '<h1>title</h1>&amp;   &nbsp;';
        $result = $sanitizer->previewTarea($text);
        $expected = $sanitizer->htmlSpecialChars($text);
        $this->assertSame($expected, $result);

        $text = 'smiley :-)';
        $result = $sanitizer->previewTarea($text, 1, 1);
        $expected = $sanitizer->smiley($text);
        $this->assertSame($expected, $result);

        $string = 'string';
        $text = '[b]'.$string.'[/b]';
        $message = $sanitizer->previewTarea($text, 0, 0, 1, 0, 0);
        $this->assertSame('<strong>'.$string.'</strong>', $message);

        $text = "line\015\012line\015line\012line";
        $message = $sanitizer->previewTarea($text, 0, 0, 0, 0, 1);
        $expected = "line\n<br />\nline\n<br />\nline\n<br />\nline";
        $this->assertSame($expected, $message);
    }

    public function test_censorString(): void
    {
        $class = $this->myClass;
        $sanitizer = $class::getInstance();

        $xoops = \Xoops::getInstance();
        $xoops->setConfig('censor_enable', true);
        $xoops->setConfig('censor_words', ['naughty', 'bits']);
        $xoops->setConfig('censor_replace', '%#$@!');

        $text = 'Xoops is cool!';
        $expected = $text;
        $text = $sanitizer->censorString($text);
        $this->assertSame($expected, $text);

        $text = 'naughty it!';
        $expected = '%#$@! it!';
        $text = $sanitizer->censorString($text);
        $this->assertSame($expected, $text);
    }

    public function test_textFilter(): void
    {
        $class = $this->myClass;
        $sanitizer = $class::getInstance();
        $text = 'toto titi tutu tata';
        PHPUnit\Framework\Error\Warning::$enabled = false;
        $value = $sanitizer->textFilter($text);
        $this->assertSame($text, $value);
    }
}
