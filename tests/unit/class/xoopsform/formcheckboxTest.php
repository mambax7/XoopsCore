<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsFormCheckBoxTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsFormCheckBox';

    public function test___construct(): void
    {
        $instance = new $this->myClass('');
        $this->assertInstanceOf('Xoops\\Form\\CheckBox', $instance);
    }
}
