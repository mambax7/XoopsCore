<?php
require_once(__DIR__ . '/../init_new.php');

class xoopsloadTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsLoad';

    protected function setUp()
    {
    }

    public function test_getMap()
    {
        $class = $this->myClass;
        $map = ['zzzclassname' => 'path/to/class'];
        $value = $class::getMap();
        $this->assertTrue(is_array($value));
        $count = count($value);

        $value = $class::addMap($map);
        $this->assertTrue(is_array($value));
        $this->assertSame($count + 1, count($value));
    }

    public function test_loadCoreConfig()
    {
        $class = $this->myClass;
        $value = $class::loadCoreConfig();
        $this->assertTrue(is_array($value));
        $this->assertTrue(count($value) > 0);
        foreach ($value as $k => $v) {
            if (file_exists($v)) {
                $this->assertTrue(true);
            } else {
                $this->assertSame(true, $k);
            }
        }
    }
}
