<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

use Xoops\Core\PreloadItem;

class PreloadItemTest extends \PHPUnit\Framework\TestCase
{
    public function test___construct(): void
    {
        $instance = new PreloadItem();
        $this->assertInstanceOf('\Xoops\Core\PreloadItem', $instance);
    }
}
