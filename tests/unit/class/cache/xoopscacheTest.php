<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class xoopscacheTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsCache';

    public function test__construct(): void
    {
        if (!class_exists('XoopsCache', false)) {
            $xoops_root_path = \XoopsBaseConfig::get('root-path');
            require_once $xoops_root_path.'/class/cache/xoopscache.php';
        }
        $instance = new $this->myclass(null);
        $this->assertInstanceOf('\\Xoops\\Core\\Cache\\Legacy', $instance);
    }
}
