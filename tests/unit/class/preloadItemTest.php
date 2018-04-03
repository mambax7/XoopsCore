<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

class XoopsPreloadItemTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsPreloadItem';

    public function test___construct(): void
    {
        $x = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $x);
        $this->assertInstanceOf('\\Xoops\\Core\\PreloadItem', $x);
    }
}
