<?php declare(strict_types=1);

require_once __DIR__.'/../../../../init_new.php';

use Xoops\Core\Service\Manager;

class NullProviderTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = '\Xoops\Core\Service\NullProvider';

    public function test___construct(): void
    {
        $manager = Manager::getInstance();
        $service = 'Avatars';
        $instance = new $this->myClass($manager, $service);
        $this->assertInstanceOf($this->myClass, $instance);
    }

    public function test___set(): void
    {
        $manager = Manager::getInstance();
        $service = 'Avatars';
        $instance = new $this->myClass($manager, $service);
        $instance->property = 'property';
        $this->assertNull($instance->property);
    }

    public function test___get(): void
    {
        $manager = Manager::getInstance();
        $service = 'Avatars';
        $instance = new $this->myClass($manager, $service);
        $this->assertNull($instance->property);
    }

    public function test___isset(): void
    {
        $manager = Manager::getInstance();
        $service = 'Avatars';
        $instance = new $this->myClass($manager, $service);
        $instance->property = 'property';
        $this->assertFalse(isset($instance->property));
    }

    public function test___unset(): void
    {
        $manager = Manager::getInstance();
        $service = 'Avatars';
        $instance = new $this->myClass($manager, $service);

        unset($instance->property);
        $this->assertFalse(isset($instance->property));
    }

    public function test___call(): void
    {
        $manager = Manager::getInstance();
        $service = 'Avatars';
        $instance = new $this->myClass($manager, $service);
        $this->assertInstanceOf($this->myClass, $instance);

        $x = $instance->dummy();
        $this->assertInstanceOf('\Xoops\Core\Service\Response', $x);
    }

    public function test___callStatic(): void
    {
        $class = $this->myClass;

        $x = $class::dummy();
        $this->assertInstanceOf('\Xoops\Core\Service\Response', $x);
    }
}
