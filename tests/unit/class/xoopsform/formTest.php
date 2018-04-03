<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsFormInstance extends XoopsForm
{
    public function render(): void
    {
    }
}
class XoopsFormTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsFormInstance';

    public function test___construct(): void
    {
        $instance = new $this->myClass('', '', '');
        $this->assertInstanceOf('Xoops\\Form\\Form', $instance);
    }
}
