<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class Xoops_Module_HelperTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = '\Xoops\Module\Helper';

    public function test_getHelper(): void
    {
        $instance = $this->myClass;
        $x = $instance::getHelper();
        $this->assertInstanceOf('\Xoops\Module\Helper\Dummy', $x);
    }
}
