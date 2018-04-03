<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsFormRadioYNTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsFormRadioYN';

    public function test___construct(): void
    {
        $instance = new $this->myClass('');
        $this->assertInstanceOf('Xoops\\Form\\RadioYesNo', $instance);
    }
}
