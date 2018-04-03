<?php declare(strict_types=1);

require_once __DIR__.'/../../../../init_new.php';

use Xoops\Core\Service\AbstractContract;
use Xoops\Core\Service\Manager;

class AbstractContractTestInstance extends AbstractContract
{
    public const MODE = Manager::MODE_EXCLUSIVE;

    public function getName(): void
    {
    }

    public function getDescription(): void
    {
    }
}

class AbstractContractTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'AbstractContractTestInstance';

    public function test_setPriority(): void
    {
        $instance = new $this->myClass();
        $this->assertInstanceOf($this->myClass, $instance);

        $priorities = [Manager::PRIORITY_SELECTED, Manager::PRIORITY_HIGH,
            Manager::PRIORITY_MEDIUM, Manager::PRIORITY_LOW, ];
        foreach ($priorities as $priority) {
            $instance->setPriority($priority);
            $value = $instance->getPriority();
            $this->assertSame($priority, $value);
        }
    }

    public function test_getMode(): void
    {
        $instance = new $this->myClass();
        $this->assertInstanceOf($this->myClass, $instance);

        $x = $instance->getMode();
        $this->assertSame($instance::MODE, $x);
    }
}
