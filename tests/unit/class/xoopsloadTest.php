<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

class xoopsloadTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsLoad';

    protected function setUp(): void
    {
    }

    public function test_getMap(): void
    {
        $class = $this->myClass;
        $map = ['zzzclassname' => 'path/to/class'];
        $value = $class::getMap();
        $this->assertInternalType('array', $value);
        $count = count($value);

        $value = $class::addMap($map);
        $this->assertInternalType('array', $value);
        $this->assertSame($count + 1, count($value));
    }

    public function test_loadCoreConfig(): void
    {
        $class = $this->myClass;
        $value = $class::loadCoreConfig();
        $this->assertInternalType('array', $value);
        $this->assertTrue(count($value) > 0);
        foreach ($value as $k => $v) {
            if (file_exists($v)) {
                $this->assertTrue(true);
            } else {
                $this->assertTrue($k);
            }
        }
    }
}
