<?php declare(strict_types=1);

require_once __DIR__.'/../../../../init_new.php';

class Kernel_CriteriaTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'Xoops\Core\Kernel\Criteria';

    public function test___construct(): void
    {
        $column = 'column';
        $value = 'value';
        $operator = 'operator';
        $prefix = 'prefix';
        $function = 'function';
        $criteria = new $this->myclass($column, $value, $operator, $prefix, $function);
        $this->assertInstanceOf($this->myclass, $criteria);
        $this->assertInstanceOf('Xoops\Core\Kernel\CriteriaElement', $criteria);
        $this->assertSame($column, $criteria->column);
        $this->assertSame($value, $criteria->value);
        $this->assertSame($operator, $criteria->operator);
        $this->assertSame($prefix, $criteria->prefix);
        $this->assertSame($function, $criteria->function);
    }

    public function test___construct100(): void
    {
        $column = 'column';
        $value = '';
        $operator = '=';
        $prefix = '';
        $function = '';
        $criteria = new $this->myclass($column);
        $this->assertSame($column, $criteria->column);
        $this->assertSame($value, $criteria->value);
        $this->assertSame($operator, $criteria->operator);
        $this->assertSame($prefix, $criteria->prefix);
        $this->assertSame($function, $criteria->function);
    }

    public function test_render(): void
    {
        $column = 'column';
        $value = '';
        $operator = '=';
        $prefix = '';
        $function = '';
        $criteria = new $this->myclass($column);
        $clause = $criteria->render();
        $this->assertSame('', $clause);
    }

    public function test_render100(): void
    {
        $column = 'column';
        $value = 'value';
        $operator = 'operator';
        $prefix = '';
        $function = '';
        $criteria = new $this->myclass($column, $value, $operator, $prefix, $function);
        $clause = $criteria->render();
        $this->assertSame("${column} ${operator} '${value}'", $clause);
    }

    public function test_render200(): void
    {
        $column = 'column';
        $value = 'value';
        $operator = 'is null';
        $prefix = 'prefix';
        $function = '';
        $criteria = new $this->myclass($column, $value, $operator, $prefix, $function);
        $clause = $criteria->render();
        $this->assertSame("${prefix}.${column} ${operator}", $clause);
    }

    public function test_render300(): void
    {
        $column = 'column';
        $value = 'value';
        $operator = 'is NOT null';
        $prefix = 'prefix';
        $function = '';
        $criteria = new $this->myclass($column, $value, $operator, $prefix, $function);
        $clause = $criteria->render();
        $this->assertSame("${prefix}.${column} ${operator}", $clause);
    }

    public function test_render400(): void
    {
        $column = 'column';
        $value = '(0,10)';
        $operator = 'in';
        $prefix = 'prefix';
        $function = '';
        $criteria = new $this->myclass($column, $value, $operator, $prefix, $function);
        $clause = $criteria->render();
        $this->assertSame("${prefix}.${column} ${operator} ${value}", $clause);
    }

    public function test_render500(): void
    {
        $column = 'column';
        $value = '(0,10)';
        $operator = 'NOT in';
        $prefix = 'prefix';
        $function = '';
        $criteria = new $this->myclass($column, $value, $operator, $prefix, $function);
        $clause = $criteria->render();
        $this->assertSame("${prefix}.${column} ${operator} ${value}", $clause);
    }

    public function test_renderLdap(): void
    {
        $column = 'column';
        $value = '(0,10)';
        $operator = 'NOT in';
        $prefix = 'prefix';
        $function = '';
        $criteria = new $this->myclass($column, $value, $operator, $prefix, $function);
        $clause = $criteria->renderLdap();
        $this->assertSame("(${column} ${operator} ${value})", $clause);
    }

    public function test_renderWhere(): void
    {
        $column = 'column';
        $value = '(0,10)';
        $operator = 'NOT in';
        $prefix = 'prefix';
        $function = '';
        $criteria = new $this->myclass($column, $value, $operator, $prefix, $function);
        $clause = $criteria->renderWhere();
        $this->assertSame("WHERE ${prefix}.${column} ${operator} ${value}", $clause);
    }

    public function test_renderQb(): void
    {
        $column = 'column';
        $value = '(0,10)';
        $operator = 'NOT in';
        $prefix = 'prefix';
        $function = '';
        $criteria = new $this->myclass($column, $value, $operator, $prefix, $function);
        $clause = $criteria->renderQb();
        $this->assertInstanceOf('Xoops\Core\Database\QueryBuilder', $clause);
    }

    public function test_buildExpressionQb(): void
    {
        $column = 'column';
        $value = '(0,10)';
        $operator = 'NOT in';
        $prefix = 'prefix';
        $function = '';
        $criteria = new $this->myclass($column, $value, $operator, $prefix, $function);
        $qb = \Xoops::getInstance()->db()->createXoopsQueryBuilder();
        $x = $criteria->buildExpressionQb($qb);
        $this->assertSame("${prefix}.${column} ".strtoupper($operator)." ${value}", $x);
    }
}
