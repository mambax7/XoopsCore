<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

class zipfileTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'zipfile';

    public function test___construct(): void
    {
        $x = new $this->myClass();
        $this->assertInstanceOf($this->myClass, $x);
    }
}
