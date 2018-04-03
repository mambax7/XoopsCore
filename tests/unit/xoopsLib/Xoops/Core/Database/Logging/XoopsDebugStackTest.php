<?php declare(strict_types=1);

require_once __DIR__.'/../../../../../init_new.php';

class XoopsDebugStackTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'Xoops\Core\Database\Logging\XoopsDebugStack';

    public function test___construct(): void
    {
        $instance = new $this->myClass();
        $this->assertInstanceOf($this->myClass, $instance);
        $this->assertInstanceOf('Doctrine\DBAL\Logging\DebugStack', $instance);
    }

    public function test_stopQuery(): void
    {
        $instance = new $this->myClass();
        $this->assertInstanceOf($this->myClass, $instance);

        $instance->stopQuery();
    }
}
