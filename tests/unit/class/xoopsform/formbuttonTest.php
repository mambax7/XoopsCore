<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsFormButtonTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsFormButton';

    public function test___construct(): void
    {
        $instance = new $this->myClass('');
        $this->assertInstanceOf('Xoops\\Form\\Button', $instance);
    }
}
