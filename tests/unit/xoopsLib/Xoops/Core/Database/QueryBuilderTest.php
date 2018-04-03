<?php declare(strict_types=1);

require_once __DIR__.'/../../../../init_new.php';

class QueryBuilderTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = '\Xoops\Core\Database\QueryBuilder';

    protected $conn = null;

    protected function setUp(): void
    {
        if (empty($this->conn)) {
            $this->conn = Xoops::getInstance()->db();
        }
    }

    public function test___construct(): void
    {
        $instance = new $this->myclass($this->conn);
        $this->assertInstanceOf('\Xoops\Core\Database\QueryBuilder', $instance);
        $this->assertInstanceOf('\Doctrine\DBAL\Query\QueryBuilder', $instance);
    }

    public function test_deletePrefix(): void
    {
        $this->markTestIncomplete('No test yet');
    }

    public function test_updatePrefix(): void
    {
        $this->markTestIncomplete('No test yet');
    }

    public function test_fromPrefix(): void
    {
        $this->markTestIncomplete('No test yet');
    }

    public function test_joinPrefix(): void
    {
        $this->markTestIncomplete('No test yet');
    }

    public function test_innerJoinPrefix(): void
    {
        $this->markTestIncomplete('No test yet');
    }

    public function test_leftJoinPrefix(): void
    {
        $this->markTestIncomplete('No test yet');
    }

    public function test_rightJoinPrefix(): void
    {
        $this->markTestIncomplete('No test yet');
    }
}
