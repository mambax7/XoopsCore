<?php declare(strict_types=1);

require_once __DIR__.'/../../../../init_new.php';

use Doctrine\DBAL\Query\QueryBuilder;

class Kernel_CriteriaElementTestInstance extends Xoops\Core\Kernel\CriteriaElement
{
    public function render(): void
    {
    }

    public function renderWhere(): void
    {
    }

    public function renderLdap(): void
    {
    }

    public function renderQb(?QueryBuilder $qb = null, $whereMode = ''): void
    {
    }

    public function buildExpressionQb(QueryBuilder $qb): void
    {
    }
}

class Kernel_CriteriaElementTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'Kernel_CriteriaElementTestInstance';

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
    }

    public function test_setSort(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $sort = 'sort';
        $instance->setSort($sort);
        $this->assertSame($sort, $instance->getSort());
    }

    public function test_setOrder(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $save = $instance->getOrder();
        $order = 1;
        $instance->setOrder($order);
        $this->assertSame($save, $instance->getOrder());

        $save = $instance->getOrder();
        $order = 'asc';
        $instance->setOrder($order);
        $this->assertSame(strtoupper($order), $instance->getOrder());

        $save = $instance->getOrder();
        $order = 'desc';
        $instance->setOrder($order);
        $this->assertSame(strtoupper($order), $instance->getOrder());

        $save = $instance->getOrder();
        $order = 'dummy';
        $instance->setOrder($order);
        $this->assertSame($save, $instance->getOrder());
    }

    public function test_setLimit(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $save = $instance->getLimit();
        $limit = 71;
        $instance->setLimit($limit);
        $this->assertSame($limit, $instance->getLimit());
    }

    public function test_setStart(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $save = $instance->getStart();
        $start = 71;
        $instance->setStart($start);
        $this->assertSame($start, $instance->getStart());
    }

    public function test_setGroupby(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $save = $instance->getGroupby();
        $groupby = 'groupby';
        $instance->setGroupby($groupby);
        $this->assertSame($groupby, $instance->getGroupby());
    }
}
