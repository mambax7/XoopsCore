<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class Xoops_Auth_FactoryTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'Xoops\Auth\Factory';

    public function test___construct(): void
    {
        $instance = new $this->myClass();
        $this->assertInstanceOf($this->myClass, $instance);
    }

    public function test_getAuthConnection(): void
    {
        $class = $this->myClass;

        $xoops = \Xoops::getInstance();

        $uname = '';
        $instance = $class::getAuthConnection($uname);
        $this->assertInstanceOf('Xoops\Auth\Xoops', $instance);
    }

    public function test_getAuthConnection100(): void
    {
        $class = $this->myClass;
        if (!extension_loaded('ldap')) {
            $this->markTestSkipped();
        }

        $xoops = \Xoops::getInstance();
        $xoops->setConfig('auth_method', 'ads');

        $uname = '';
        $instance = $class::getAuthConnection($uname, true);
        $this->assertInstanceOf('Xoops\Auth\Ads', $instance);
    }

    public function test_getAuthConnection150(): void
    {
        $class = $this->myClass;
        if (!extension_loaded('ldap')) {
            $this->markTestSkipped();
        }

        $xoops = \Xoops::getInstance();
        $xoops->setConfig('auth_method', 'ads');

        $uname = 'admin';
        $instance = $class::getAuthConnection($uname, true);
        $this->assertInstanceOf('Xoops\Auth\Xoops', $instance);
    }

    public function test_getAuthConnection200(): void
    {
        $class = $this->myClass;
        if (!extension_loaded('ldap')) {
            $this->markTestSkipped();
        }

        $xoops = \Xoops::getInstance();

        $xoops->setConfig('auth_method', 'ldap');

        $uname = '';
        $instance = $class::getAuthConnection($uname, true);
        $this->assertInstanceOf('Xoops\Auth\Ldap', $instance);
    }

    public function test_getAuthConnection250(): void
    {
        $class = $this->myClass;
        if (!extension_loaded('ldap')) {
            $this->markTestSkipped();
        }

        $xoops = \Xoops::getInstance();

        $xoops->setConfig('auth_method', 'ldap');

        $uname = 'admin';
        $instance = $class::getAuthConnection($uname, true);
        $this->assertInstanceOf('Xoops\Auth\Xoops', $instance);
    }
}
