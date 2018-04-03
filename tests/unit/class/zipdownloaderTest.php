<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

class XoopsZipDownloaderTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsZipDownloader';

    public function test___construct(): void
    {
        $class = $this->myClass;
        $x = new $class();
        $this->assertInstanceOf($this->myClass, $x);
        $this->assertInstanceOf('XoopsDownloader', $x);
    }
}
