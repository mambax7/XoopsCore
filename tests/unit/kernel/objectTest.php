<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

require_once XOOPS_TU_ROOT_PATH.'/kernel/object.php';

class Legacy_XoopsObjectTestInstance extends \XoopsObject
{
}

class Legacy_XoopsObjectTest extends \PHPUnit\Framework\TestCase
{
    public $myClass = 'Legacy_XoopsObjectTestInstance';

    public function test___construct(): void
    {
        $instance = new $this->myClass();
        $this->assertInstanceOf($this->myClass, $instance);
        $this->assertInstanceOf('Xoops\Core\Kernel\XoopsObject', $instance);
    }
}
