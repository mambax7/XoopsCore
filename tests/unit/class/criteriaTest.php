<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

class criteriaTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'Criteria';

    public function test___construct(): void
    {
        $column = 'column';
        $x = new $this->myclass($column);
        $this->assertInstanceOf($this->myclass, $x);
        $this->assertInstanceOf('\\Xoops\\Core\\Kernel\\Criteria', $x);
    }
}
