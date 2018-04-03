<?php declare(strict_types=1);

require_once __DIR__.'/../../../../../init_new.php';

use Xoops\Core\Kernel\Handlers\XoopsGroupHandler;

class StatsTest extends \PHPUnit\Framework\TestCase
{
    protected $conn = null;

    protected $myClass = 'Xoops\Core\Kernel\Model\Stats';

    protected $myAbstractClass = 'Xoops\Core\Kernel\XoopsModelAbstract';

    protected function setUp(): void
    {
        $this->conn = \Xoops::getInstance()->db();
    }

    public function test___construct(): void
    {
        $instance = new $this->myClass();
        $this->assertInstanceOf($this->myClass, $instance);
        $this->assertInstanceOf($this->myAbstractClass, $instance);
    }

    public function test_getCount(): void
    {
        $instance = new $this->myClass();
        $this->assertinstanceOf($this->myClass, $instance);

        $handler = new XoopsGroupHandler($this->conn);
        $result = $instance->setHandler($handler);
        $this->assertTrue($result);

        $values = $instance->getCount();
        $this->assertInternalType('string', $values);
        $this->assertTrue((int) $values >= 0);
    }

    public function test_getCounts(): void
    {
        $instance = new $this->myClass();
        $this->assertinstanceOf($this->myClass, $instance);

        $handler = new XoopsGroupHandler($this->conn);
        $result = $instance->setHandler($handler);
        $this->assertTrue($result);

        $values = $instance->getCounts();
        $this->assertInternalType('array', $values);
        $this->assertTrue(count($values) >= 0);
        if (!empty($values[1])) {
            $this->assertInternalType('string', $values[1]);
            $this->assertTrue((int) ($values[1]) >= 0);
        }
    }
}
