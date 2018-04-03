<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsFormDateTimeTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsFormDateTime';

    public function test___construct(): void
    {
        $instance = new $this->myClass('', '');
        $this->assertInstanceOf('Xoops\\Form\\DateTimeSelect', $instance);
    }

    public function test_const(): void
    {
        $this->assertNotNull(\XoopsFormDateTime::SHOW_BOTH);
        $this->assertNotNull(\XoopsFormDateTime::SHOW_DATE);
        $this->assertNotNull(\XoopsFormDateTime::SHOW_TIME);
    }
}
