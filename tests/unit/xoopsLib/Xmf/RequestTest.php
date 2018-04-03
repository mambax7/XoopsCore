<?php

namespace Xmf\Test;

use Xmf\Request;

class RequestTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Request
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Request();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testGetMethod()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $method = Request::getMethod();
        $this->assertTrue(in_array($method, ['GET', 'HEAD', 'POST', 'PUT'], true));
    }

    public function testGetVar()
    {
        $varname = 'RequestTest';
        $value = 'testing';
        $_REQUEST[$varname] = $value;

        $this->assertSame($value, Request::getVar($varname));
        $this->assertNull(Request::getVar($varname . 'no-such-key'));
    }

    public function testGetInt()
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = '9';
        $this->assertSame(9, Request::getInt($varname));

        $_REQUEST[$varname] = '123fred5';
        $this->assertSame(123, Request::getInt($varname));

        $_REQUEST[$varname] = '-123.45';
        $this->assertSame(-123, Request::getInt($varname));

        $_REQUEST[$varname] = 'notanumber';
        $this->assertSame(0, Request::getInt($varname));

        $this->assertSame(0, Request::getInt($varname . 'no-such-key'));

    }

    public function testGetFloat()
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = '1.23';
        $this->assertSame(1.23, Request::getFloat($varname));

        $_REQUEST[$varname] = '-1.23';
        $this->assertSame(-1.23, Request::getFloat($varname));

        $_REQUEST[$varname] = '5.68 blah blah';
        $this->assertSame(5.68, Request::getFloat($varname));

        $_REQUEST[$varname] = '1';
        $this->assertTrue(Request::getFloat($varname) === 1.0);
    }

    public function testGetBool()
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = '9';
        $this->assertTrue(Request::getBool($varname));

        $_REQUEST[$varname] = 'a string';
        $this->assertTrue(Request::getBool($varname));

        $_REQUEST[$varname] = true;
        $this->assertTrue(Request::getBool($varname));

        $_REQUEST[$varname] = '';
        $this->assertFalse(Request::getBool($varname));

        $_REQUEST[$varname] = false;
        $this->assertFalse(Request::getBool($varname));

        $this->assertFalse(Request::getBool($varname . 'no-such-key'));
    }

    public function testGetWord()
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = 'Lorem';
        $this->assertSame('Lorem', Request::getWord($varname));

        $_REQUEST[$varname] = 'Lorem ipsum 88 59';
        $this->assertSame('Loremipsum', Request::getWord($varname));

        $_REQUEST[$varname] = '.99 Lorem_ipsum @%&';
        $this->assertSame('Lorem_ipsum', Request::getWord($varname));

        //echo Request::getWord($varname);
    }

    public function testGetCmd()
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = 'Lorem';
        $this->assertSame('lorem', Request::getCmd($varname));

        $_REQUEST[$varname] = 'Lorem ipsum 88 59';
        $this->assertSame('loremipsum8859', Request::getCmd($varname));

        $_REQUEST[$varname] = '.99 Lorem_ipsum @%&';
        $this->assertSame('.99lorem_ipsum', Request::getCmd($varname), Request::getCmd($varname));
    }

    public function testGetString()
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = 'Lorem ipsum </i><script>alert();</script>';
        $this->assertSame('Lorem ipsum alert();', Request::getString($varname));
    }

    public function testGetString2()
    {
        $varname = 'RequestTest';

        $safeTest = '<p>This is a <em>simple</em> test.</p>';
        $_POST[$varname] = $safeTest;

        $this->assertSame('This is a simple test.', Request::getString($varname, '', 'POST'));
    }

    public function testGetStringAllowHtml()
    {
        $varname = 'RequestTest';

        $safeTest = '<p>This is a <em>simple</em> test.</p>';
        $_POST[$varname] = $safeTest;

        $this->assertSame($safeTest, Request::getString($varname, '', 'POST', Request::MASK_ALLOW_HTML));
    }

    public function testGetStringAllowHtmlXss()
    {
        $varname = 'RequestTest';

        $xssTest = '<p>This is a <em>xss</em> <script>alert();</script> test.</p>';
        $_POST[$varname] = $xssTest;
        $xssTestExpect = '<p>This is a <em>xss</em> alert(); test.</p>';
        $this->assertSame($xssTestExpect, Request::getString($varname, '', 'POST', Request::MASK_ALLOW_HTML));
    }

    public function testGetArray()
    {
        $varname = 'RequestTest';

        $testArray = ['one', 'two', 'three'];
        $_REQUEST[$varname] = $testArray;

        $get = Request::getArray($varname, null, 'request');
        $this->assertTrue(is_array($get));
        $this->assertSame($get, $testArray);

        $testArray2 = ['one', 'two', '<script>three</script>'];
        $_REQUEST[$varname] = $testArray2;

        $get = Request::getArray($varname, null, 'request');
        $this->assertTrue(is_array($get));
        $this->assertSame($get, $testArray);
    }

    public function testGetText()
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = 'Lorem ipsum </i><script>alert();</script>';
        $this->assertSame($_REQUEST[$varname], Request::getText($varname));
    }

    public function testHasVar()
    {
        $varname = 'RequestTest[HasVar]';
        $this->assertFalse(Request::hasVar($varname, 'GET'));
        Request::setVar($varname, 'OK', 'get');
        $this->assertTrue(Request::hasVar($varname, 'GET'));
    }

    public function testSetVar()
    {
        $varname = 'RequestTest';
        Request::setVar($varname, 'Porshca', 'get');
        $this->assertSame($_REQUEST[$varname], 'Porshca');
    }

    public function testGet()
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = 'Lorem';

        $get = Request::get('request');
        $this->assertTrue(is_array($get));
        $this->assertSame('Lorem', $get[$varname]);

        unset($get);
        $_REQUEST[$varname] = '<i>Lorem ipsum </i><script>alert();</script>';
        $get = Request::get('request');
        $this->assertSame('Lorem ipsum alert();', $get[$varname]);
    }

    public function testSet()
    {
        $varname = 'RequestTest';
        Request::set([$varname => 'Pourquoi'], 'get');
        $this->assertSame($_REQUEST[$varname], 'Pourquoi');
    }
}
