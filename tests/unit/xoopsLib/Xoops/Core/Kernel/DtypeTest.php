<?php declare(strict_types=1);

require_once __DIR__.'/../../../../init_new.php';

class DtypeTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'Xoops\Core\Kernel\Dtype';

    public function test___construct(): void
    {
        $criteria = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $criteria);
    }

    public function testConstants(): void
    {
        $this->assertTrue(defined('Xoops\Core\Kernel\Dtype::FORMAT_SHOW'));
        $this->assertTrue(defined('Xoops\Core\Kernel\Dtype::FORMAT_EDIT'));
        $this->assertTrue(defined('Xoops\Core\Kernel\Dtype::FORMAT_PREVIEW'));
        $this->assertTrue(defined('Xoops\Core\Kernel\Dtype::FORMAT_FORM_PREVIEW'));
        $this->assertTrue(defined('Xoops\Core\Kernel\Dtype::FORMAT_NONE'));
    }

    public function test_cleanVar(): void
    {
        $this->markTestIncomplete();
    }

    public function test_getVar(): void
    {
        $this->markTestIncomplete();
    }

    public function test_renderWhere(): void
    {
        $this->markTestIncomplete();
    }
}
