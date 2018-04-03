<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class Xoops_Auth_LdapTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'Xoops\Auth\Ldap';

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        if (!extension_loaded('ldap')) {
            $this->markTestSkipped();
        }
    }

    public function testContract(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $this->assertInstanceOf('\Xoops\Auth\AuthAbstract', $instance);
    }

    public function test_cp1252_to_utf8(): void
    {
        $this->markTestIncomplete();
    }

    public function test_authenticate(): void
    {
        $this->markTestIncomplete();
    }

    public function test_getUserDN(): void
    {
        $this->markTestIncomplete();
    }

    public function test_getFilter(): void
    {
        $this->markTestIncomplete();
    }

    public function test_loadXoopsUser(): void
    {
        $this->markTestIncomplete();
    }
}
