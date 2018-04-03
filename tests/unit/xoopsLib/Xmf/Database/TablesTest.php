<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

use Xmf\Database\Tables;
use Xoops\Core\Database\Factory;

$xoops = \Xoops::getInstance();
$xoopsLogger = $xoops->logger();
$xoops->events();
$psr4loader = new \Xoops\Core\Psr4ClassLoader();
$psr4loader->register();
$xoops->events()->triggerEvent('core.include.common.psr4loader', $psr4loader);
$xoops->events()->triggerEvent('core.include.common.classmaps');

class TablesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Tables
     */
    protected $object;

    /**
     * @var string
     */
    protected $prefix;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new Tables();
        $this->prefix = Factory::getConnection()->prefix();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testName(): void
    {
        $tableName = 'system_user';
        $actual = $this->object->useTable($tableName);
        $this->assertTrue($actual);

        $tables = $this->object->dumpTables();
        $this->assertArrayHasKey($tableName, $tables);
        $this->assertSame($this->prefix($tableName), $tables[$tableName]['name']);
    }

    public function testAddColumn(): void
    {
        $tableName = 'system_user';
        $actual = $this->object->useTable($tableName);
        $this->assertTrue($actual);

        $columnName = 'not_real_column';
        $columnAttr = 'int NOT NULL';

        $this->object->addColumn($tableName, $columnName, $columnAttr);
        $queue = $this->object->dumpQueue();
        $expected = "ALTER TABLE `{$this->prefix}_{$tableName}` ADD COLUMN `{$columnName}` {$columnAttr}";
        $this->assertSame($expected, $queue[0]);
    }

    public function testAddPrimaryKey(): void
    {
        $tableName = 'system_user';
        $actual = $this->object->useTable($tableName);
        $this->assertTrue($actual);

        $columnName = 'uid';

        $this->object->addPrimaryKey($tableName, $columnName);
        $queue = $this->object->dumpQueue();
        //var_dump($queue);
        $expected = "ALTER TABLE `{$this->prefix}_{$tableName}` ADD PRIMARY KEY(`{$columnName}`)";
        $this->assertSame($expected, $queue[0]);
    }

    public function testAddTable(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testUseTable(): void
    {
        $actual = $this->object->useTable('system_user');
        $this->assertTrue($actual);

        $actual = $this->object->useTable('system_nosuch_table');
        $this->assertFalse($actual);
    }

    public function testGetColumnAttributes(): void
    {
        $tableName = 'system_user';
        $actual = $this->object->useTable($tableName);
        $this->assertTrue($actual);

        $columnName = 'uid';

        $actual = $this->object->getColumnAttributes($tableName, $columnName);

        $this->assertNotFalse(stristr($actual, 'int(10)'));
        $this->assertNotFalse(stristr($actual, 'unsigned'));
        $this->assertNotFalse(stristr($actual, 'NOT NULL'));
        $this->assertNotFalse(stristr($actual, 'auto_increment'));
    }

    public function testGetTableIndexes(): void
    {
        $tableName = 'system_user';
        $this->object->useTable($tableName);
        $actual = $this->object->getTableIndexes($tableName);
        $this->assertInternalType('array', $actual);
        $this->assertArrayHasKey('PRIMARY', $actual);

        $actual = $this->object->getTableIndexes('system_bogus_table_name');
        $this->assertFalse($actual);
    }

    public function testAlterColumn(): void
    {
        $tableName = 'system_user';
        $actual = $this->object->useTable($tableName);
        $this->assertTrue($actual);

        $columnName = 'pass';
        $newColumnName = 'password';
        $attributes = 'varchar(255) NOT NULL DEFAULT \'\'';

        $this->object->alterColumn($tableName, $columnName, $attributes, $newColumnName);
        $queue = $this->object->dumpQueue();
        //var_dump($queue);
        $expected = "ALTER TABLE `{$this->prefix}_{$tableName}` CHANGE COLUMN `{$columnName}` `{$newColumnName}` {$attributes} ";
        $this->assertSame($expected, $queue[0]);
    }

    public function testCopyTable(): void
    {
        $tableName = 'system_user';
        $actual = $this->object->useTable($tableName);
        $this->assertTrue($actual);

        $copyName = 'notsystem_user';
        $actual = $this->object->useTable($copyName);
        $this->assertFalse($actual);

        $actual = $this->object->copyTable($tableName, $copyName, false);
        $this->assertTrue($actual);

        $tables = $this->object->dumpTables();
        $this->assertSame($tables[$tableName]['columns'], $tables[$copyName]['columns']);
        $this->assertSame($tables[$tableName]['keys'], $tables[$copyName]['keys']);
    }

    public function testCreateIndex(): void
    {
        $tableName = 'system_user';
        $actual = $this->object->useTable($tableName);
        $this->assertTrue($actual);

        $columnName = 'actkey';
        $indexName = 'user_actkey';

        $this->object->addIndex($indexName, $tableName, $columnName);
        $queue = $this->object->dumpQueue();

        $expected = "ALTER TABLE `{$this->prefix}_{$tableName}` ADD INDEX `{$indexName}` (`{$columnName}`)";
        $this->assertSame($expected, $queue[0]);
    }

    public function testDropColumn(): void
    {
        $tableName = 'system_user';
        $actual = $this->object->useTable($tableName);
        $this->assertTrue($actual);

        $columnName = 'actkey';

        $this->object->dropColumn($tableName, $columnName);
        $queue = $this->object->dumpQueue();

        $expected = "ALTER TABLE `{$this->prefix}_{$tableName}` DROP COLUMN `{$columnName}`";
        $this->assertSame($expected, $queue[0]);
    }

    public function testDropIndex(): void
    {
        $tableName = 'system_user';
        $actual = $this->object->useTable($tableName);
        $this->assertTrue($actual);

        $indexName = 'blahblah';

        $this->object->dropIndex($indexName, $tableName);
        $queue = $this->object->dumpQueue();

        $expected = "ALTER TABLE `{$this->prefix}_{$tableName}` DROP INDEX `{$indexName}`";
        $this->assertSame($expected, $queue[0]);
    }

    public function testDropIndexes(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testDropPrimaryKey(): void
    {
        $tableName = 'system_user';
        $actual = $this->object->useTable($tableName);
        $this->assertTrue($actual);

        $this->object->dropPrimaryKey($tableName);
        $queue = $this->object->dumpQueue();

        $expected = "ALTER TABLE `{$this->prefix}_{$tableName}` DROP PRIMARY KEY ";
        $this->assertSame($expected, $queue[0]);
    }

    public function testDropTable(): void
    {
        $tableName = 'system_user';
        $actual = $this->object->useTable($tableName);
        $this->assertTrue($actual);

        $this->object->dropTable($tableName);
        $queue = $this->object->dumpQueue();

        $expected = "DROP TABLE `{$this->prefix}_{$tableName}` ";
        $this->assertSame($expected, $queue[0]);
    }

    public function testRenameTable(): void
    {
        $tableName = 'system_user';
        $actual = $this->object->useTable($tableName);
        $this->assertTrue($actual);

        $newName = 'system_abuser';
        $this->object->renameTable($tableName, $newName);
        $queue = $this->object->dumpQueue();

        $expected = "ALTER TABLE `{$this->prefix}_{$tableName}` RENAME TO `{$this->prefix}_{$newName}`";
        $this->assertSame($expected, $queue[0]);
    }

    public function testSetTableOptions(): void
    {
        $tableName = 'system_user';
        $actual = $this->object->useTable($tableName);
        $this->assertTrue($actual);

        $options = 'ENGINE=MEMORY DEFAULT CHARSET=utf8;';
        $this->object->setTableOptions($tableName, $options);
        $queue = $this->object->dumpQueue();

        $expected = "ALTER TABLE `{$this->prefix}_{$tableName}` {$options} ";
        $this->assertSame($expected, $queue[0]);
    }

    public function testExecuteQueue(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testDelete(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testInsert(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testUpdate(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testTruncate(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testRenderTableCreate(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testGetLastError(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testGetLastErrNo(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testDumpTables(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testAddToQueue(): void
    {
        $this->object->resetQueue();
        $queue = $this->object->dumpQueue();
        $this->assertInternalType('array', $queue);
        $this->assertEmpty($queue);

        $expected = 'SELECT * FROM TEST.DUMMY';
        $this->object->addToQueue($expected);

        $queue = $this->object->dumpQueue();
        $this->assertInternalType('array', $queue);
        $this->assertTrue(1 === count($queue));
        $this->assertSame($expected, reset($queue));

        $this->object->resetQueue();
        $queue = $this->object->dumpQueue();
        $this->assertInternalType('array', $queue);
        $this->assertEmpty($queue);
    }

    protected function prefix($table)
    {
        return $this->prefix.'_'.$table;
    }
}
