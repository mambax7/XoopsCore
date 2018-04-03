<?php declare(strict_types=1);

require_once __DIR__.'/../../../../init_new.php';

use Doctrine\Common\EventManager;
use Doctrine\DBAL\Configuration;

class ConnectionTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = '\Xoops\Core\Database\Connection';

    /** @var Xoops\Core\Database\Connection */
    protected $object;

    protected function setUp(): void
    {
        $params = [];
        $config = new Configuration();
        $eventManager = new EventManager();
        $driver = new Doctrine\DBAL\Driver\PDOMySql\Driver();

        $this->object = new $this->myclass($params, $driver, $config, $eventManager);
    }

    public function test___construct(): void
    {
        $params = [];
        $config = new Configuration();
        $eventManager = new EventManager();
        $driver = new Doctrine\DBAL\Driver\PDOMySql\Driver();

        $instance = new $this->myclass($params, $driver, $config, $eventManager);
        $this->assertInstanceOf('\Xoops\Core\Database\Connection', $instance);
    }

    public function test_setSafe(): void
    {
        $class = $this->myclass;
        $this->object->setSafe(true);
        $x = $this->object->getSafe();
        $this->assertTrue($x);

        $this->object->setSafe(false);
        $x = $this->object->getSafe();
        $this->assertFalse($x);
    }

    public function test_setForce(): void
    {
        $this->object->setForce(true);
        $x = $this->object->getForce();
        $this->assertTrue($x);

        $this->object->setForce(false);
        $x = $this->object->getForce();
        $this->assertFalse($x);
    }

    public function test_prefix(): void
    {
        $x = $this->object->prefix('');
        $db_prefix = \XoopsBaseConfig::get('db-prefix');
        $this->assertSame($db_prefix, $x);

        $table = 'toto';
        $x = $this->object->prefix($table);
        $this->assertSame($db_prefix.'_'.$table, $x);
    }

    public function test_insertPrefix(): void
    {
        $this->markTestIncomplete('No test yet');
        //  insertPrefix($tableName, array $data, array $types = array())
    }

    public function test_updatePrefix(): void
    {
        $this->markTestIncomplete('No test yet');
        //  updatePrefix($tableName, array $data, array $identifier, array $types = array())
    }

    public function test_deletePrefix(): void
    {
        $this->markTestIncomplete('No test yet');
        //  deletePrefix($tableName, array $identifier)
    }

    public function test_executeQuery(): void
    {
        $this->markTestIncomplete('No test yet');
        /*
        executeQuery(
        $query,
        array $params = array(),
        $types = array(),
        \Doctrine\DBAL\Cache\QueryCacheProfile $qcp = null
        */
    }

    public function test_executeUpdate(): void
    {
        $this->markTestIncomplete('No test yet');
        //  executeUpdate($query, array $params = array(), array $types = array())
    }

    public function test_beginTransaction(): void
    {
        $this->markTestIncomplete('No test yet');
        //  beginTransaction()
    }

    public function test_commit(): void
    {
        $this->markTestIncomplete('No test yet');
        //  commit()
    }

    public function test_rollBack(): void
    {
        $this->markTestIncomplete('No test yet');
        //  rollBack()
    }

    public function test_query(): void
    {
        $this->markTestIncomplete('No test yet');
        //  query()
    }

    public function test_queryFromFile(): void
    {
        $this->markTestIncomplete('No test yet');
        //  queryFromFile($file)
    }

    public function test_quoteSlash(): void
    {
        $this->markTestIncomplete('No test yet');
        //  quoteSlash($input)
    }

    public function test_createXoopsQueryBuilder(): void
    {
        $this->markTestIncomplete('No test yet');
        //  createXoopsQueryBuilder()
    }
}
