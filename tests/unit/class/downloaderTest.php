<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

class XoopsDownloaderTest extends \PHPUnit\Framework\TestCase
{
    public function test___construct(): void
    {
        $instance = $this->getMockForAbstractClass('XoopsDownloader');
        $this->assertInstanceOf('\XoopsDownloader', $instance);
    }
}
