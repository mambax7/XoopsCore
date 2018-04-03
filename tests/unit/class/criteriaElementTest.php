<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

use Doctrine\DBAL\Query\QueryBuilder;

class CriteriaElementTestInstance extends CriteriaElement
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

class CriteriaElementTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'CriteriaElementTestInstance';

    public function test___construct(): void
    {
        $x = new $this->myclass();
        $this->assertInstanceOf('CriteriaElement', $x);
        $this->assertInstanceOf('\\Xoops\\Core\\Kernel\\CriteriaElement', $x);
    }
}
