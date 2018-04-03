<?php

require_once __DIR__.'/../../init_new.php';

class snoopyTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'Snoopy';

    public function test___construct()
    {
        $x = new $this->myClass();
        $this->assertInstanceOf($this->myClass, $x);
    }
}
