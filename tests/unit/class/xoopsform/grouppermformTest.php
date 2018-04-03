<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsGroupPermFormTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsGroupPermForm';

    public function test___construct(): void
    {
        $instance = new $this->myClass('', 1, '', '');
        $this->assertInstanceOf('Xoops\\Form\\GroupPermissionForm', $instance);
    }
}
