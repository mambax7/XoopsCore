<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsDatabaseTestInstance extends XoopsDatabase
{
    public function connect($selectdb = true): void
    {
    }

    public function genId($sequence): void
    {
    }

    public function fetchRow($result): void
    {
    }

    public function fetchArray($result): void
    {
    }

    public function fetchBoth($result): void
    {
    }

    public function fetchObject($result): void
    {
    }

    public function getInsertId(): void
    {
    }

    public function getRowsNum($result): void
    {
    }

    public function getAffectedRows(): void
    {
    }

    public function close(): void
    {
    }

    public function freeRecordSet($result): void
    {
    }

    public function error(): void
    {
    }

    public function errno(): void
    {
    }

    public function quoteString($str): void
    {
    }

    public function quote($string): void
    {
    }

    public function escape($string): void
    {
    }

    public function queryF($sql, $limit = 0, $start = 0): void
    {
    }

    public function query($sql, $limit = 0, $start = 0): void
    {
    }

    public function queryFromFile($file): void
    {
    }

    public function getFieldName($result, $offset): void
    {
    }

    public function getFieldType($result, $offset): void
    {
    }

    public function getFieldsNum($result): void
    {
    }
}

class XoopsDatabaseTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsDatabaseTestInstance';

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
    }

    public function test___publicProperties(): void
    {
        $items = ['conn', 'prefix', 'allowWebChanges'];
        foreach ($items as $item) {
            $prop = new ReflectionProperty($this->myclass, $item);
            $this->assertTrue($prop->isPublic());
        }
    }

    public function test_setPrefix(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $prefix = 'prefix';
        $value = $instance->setPrefix($prefix);
        $this->assertSame($prefix, $instance->prefix);
    }

    public function test_prefix(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $prefix = 'prefix';
        $value = $instance->setPrefix($prefix);
        $x = $instance->prefix();
        $this->assertSame($prefix, $x);
        $table = 'table';
        $x = $instance->prefix($table);
        $tmp = $prefix.'_'.$table;
        $this->assertSame($tmp, $x);
    }
}
