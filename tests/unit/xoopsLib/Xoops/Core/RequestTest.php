<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

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
    protected function setUp(): void
    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testGetMethod(): void
    {
        $method = Request::getMethod();
        $this->assertTrue(in_array($method, ['GET', 'HEAD', 'POST', 'PUT'], true));
    }

    public function testGetVar(): void
    {
        $varname = 'RequestTest';
        $value = 'testing';
        $_REQUEST[$varname] = $value;

        $this->assertSame($value, Request::getVar($varname));
        $this->assertNull(Request::getVar($varname.'no-such-key'));
    }

    public function testGetInt(): void
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

        $this->assertSame(0, Request::getInt($varname.'no-such-key'));
    }

    public function testGetFloat(): void
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = '1.23';
        $this->assertSame(1.23, Request::getFloat($varname));

        $_REQUEST[$varname] = '-1.23';
        $this->assertSame(-1.23, Request::getFloat($varname));

        $_REQUEST[$varname] = '5.68 blah blah';
        $this->assertSame(5.68, Request::getFloat($varname));

        $_REQUEST[$varname] = '1';
        $this->assertTrue(1.0 === Request::getFloat($varname));
    }

    public function testGetBool(): void
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

        $this->assertFalse(Request::getBool($varname.'no-such-key'));
    }

    public function testGetWord(): void
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

    public function testGetCmd(): void
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = 'Lorem';
        $this->assertSame('lorem', Request::getCmd($varname));

        $_REQUEST[$varname] = 'Lorem ipsum 88 59';
        $this->assertSame('loremipsum8859', Request::getCmd($varname));

        $_REQUEST[$varname] = '.99 Lorem_ipsum @%&';
        $this->assertSame('.99lorem_ipsum', Request::getCmd($varname), Request::getCmd($varname));
    }

    public function testGetString(): void
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = 'Lorem ipsum </i><script>alert();</script>';
        $this->assertSame('Lorem ipsum alert();', Request::getString($varname));
    }

    public function testGetArray(): void
    {
        $varname = 'RequestTest';

        $testArray = ['one', 'two', 'three'];
        $_REQUEST[$varname] = $testArray;

        $get = Request::getArray($varname, null, 'request');
        $this->assertInternalType('array', $get);
        $this->assertSame($get, $testArray);

        $testArray2 = ['one', 'two', '<script>three</script>'];
        $_REQUEST[$varname] = $testArray2;

        $get = Request::getArray($varname, null, 'request');
        $this->assertInternalType('array', $get);
        $this->assertSame($get, $testArray);
    }

    public function testGetText(): void
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = 'Lorem ipsum </i><script>alert();</script>';
        $this->assertSame($_REQUEST[$varname], Request::getText($varname));
    }

    public function testGetUrl(): void
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = 'http://example.com/test.php';
        $this->assertSame($_REQUEST[$varname], Request::getUrl($varname));

        $_REQUEST[$varname] = 'javascript:alert();';
        $this->assertSame('', Request::getUrl($varname), Request::getUrl($varname));

        $_REQUEST[$varname] = 'modules/test/index.php';
        $this->assertSame('modules/test/index.php', Request::getUrl($varname));
    }

    public function testGetPath(): void
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = '/var/tmp';
        $this->assertSame($_REQUEST[$varname], Request::getPath($varname), Request::getPath($varname));

        $_REQUEST[$varname] = ' modules/test/index.php?id=12 ';
        $this->assertSame('modules/test/index.php?id=12', Request::getPath($varname), Request::getPath($varname));

        $_REQUEST[$varname] = '/var/tmp muck';
        $this->assertSame('/var/tmp', Request::getPath($varname), Request::getPath($varname));
    }

    public function testGetEmail(): void
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = 'fred@example.com';
        $this->assertSame($_REQUEST[$varname], Request::getEmail($varname));

        $_REQUEST[$varname] = 'msdfniondfnlknlsdf';
        $this->assertSame('', Request::getEmail($varname));

        $_REQUEST[$varname] = 'msdfniondfnlknlsdf';
        $default = 'nobody@localhost';
        $this->assertSame($default, Request::getEmail($varname, $default));
    }

    public function testGetIPv4(): void
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = '16.32.48.64';
        $this->assertSame($_REQUEST[$varname], Request::getIP($varname));

        $_REQUEST[$varname] = '316.32.48.64';
        $this->assertSame('', Request::getIP($varname));

        $_REQUEST[$varname] = '316.32.48.64';
        $default = '0.0.0.0';
        $this->assertSame($default, Request::getIP($varname, $default));
    }

    public function testGetIPv6(): void
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = 'FE80:0000:0000:0000:0202:B3FF:FE1E:8329';
        $this->assertSame($_REQUEST[$varname], Request::getIP($varname));

        $_REQUEST[$varname] = 'FE80::0202:B3FF:FE1E:8329';
        $this->assertSame($_REQUEST[$varname], Request::getIP($varname));

        $_REQUEST[$varname] = 'GE80::0202:B3FF:FE1E:8329';
        $this->assertSame('', Request::getIP($varname));

        $_REQUEST[$varname] = '::ffff:16.32.48.64';
        $this->assertSame($_REQUEST[$varname], Request::getIP($varname));
    }

    public function testGetDateTime(): void
    {
        $varname = 'datetimetest';

        \Xoops\Locale::setTimeZone(new \DateTimeZone('UTC'));
        \Xoops\Locale::setCurrent('en_US');
        $exampleDate = '12/14/2015';
        $exampleTime = '12:10 AM';
        $_REQUEST[$varname] = $exampleDate;
        $actual = Request::getDateTime($varname);

        $this->assertInstanceOf('\DateTime', $actual);
        $this->assertSame($exampleDate, $actual->format('m/d/Y'));

        $_REQUEST[$varname] = ['date' => $exampleDate, 'time' => $exampleTime];
        $actual = Request::getDateTime($varname);

        $this->assertInstanceOf('\DateTime', $actual);
        $this->assertSame($exampleDate, $actual->format('m/d/Y'));
        $this->assertSame($exampleTime, $actual->format('h:i A'));
    }

    public function testSetVar(): void
    {
        $varname = 'RequestTest';
        Request::setVar($varname, 'Porshca', 'get');
        $this->assertSame($_REQUEST[$varname], 'Porshca');
    }

    public function testGet(): void
    {
        $varname = 'RequestTest';

        $_REQUEST[$varname] = 'Lorem';

        $get = Request::get('request');
        $this->assertInternalType('array', $get);
        $this->assertSame('Lorem', $get[$varname]);

        unset($get);
        $_REQUEST[$varname] = '<i>Lorem ipsum </i><script>alert();</script>';
        $get = Request::get('request');
        $this->assertSame('Lorem ipsum alert();', $get[$varname]);
    }

    public function testSet(): void
    {
        $varname = 'RequestTest';
        Request::set([$varname => 'Pourquoi'], 'get');
        $this->assertSame($_REQUEST[$varname], 'Pourquoi');
    }
}
