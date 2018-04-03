<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

global $config;
$config = null;

class configTest extends \PHPUnit\Framework\TestCase
{
    public function test_100(): void
    {
        global $config;

        $xoops_root_path = \XoopsBaseConfig::get('root-path');
        require $xoops_root_path.'/class/captcha/config.php';
        $this->assertInternalType('array', $config);
        $this->assertTrue(isset($config['disabled']));
        $this->assertTrue(isset($config['mode']));
        $this->assertTrue(isset($config['name']));
        $this->assertTrue(isset($config['skipmember']));
        $this->assertTrue(isset($config['maxattempts']));
    }
}
