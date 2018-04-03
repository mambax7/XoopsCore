<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

class criteriaCompoTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'CriteriaCompo';

    public function test___construct(): void
    {
        $x = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $x);
        $this->assertInstanceOf('\\Xoops\\Core\\Kernel\\CriteriaCompo', $x);
    }
}
