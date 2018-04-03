<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsDatabaseManagerTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsDatabaseManager';

    protected function setUp(): void
    {
        global $xoopsDB;
        $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection(true);
    }

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
    }

    public function test___publicProperties(): void
    {
        $items = ['db', 'successStrings', 'failureStrings'];
        foreach ($items as $item) {
            $prop = new ReflectionProperty($this->myclass, $item);
            $this->assertTrue($prop->isPublic());
        }
    }
}
