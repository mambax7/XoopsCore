<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

use Xoops\Core\Kernel\Handlers\XoopsConfigItem;

class treeTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
    }

    public function test___construct(): void
    {
        $myId = 'Id';
        $parentId = 'parentId';
        $rootId = 'rootId';
        $item1 = new XoopsConfigItem();
        $item1->initVar('Id', XOBJ_DTYPE_INT, 71);
        $item1->initVar('parentId', XOBJ_DTYPE_INT);
        $item1->initVar('rootId', XOBJ_DTYPE_INT);

        $item2 = new XoopsConfigItem();
        $item2->initVar('Id', XOBJ_DTYPE_INT, 72);
        $item2->initVar('parentId', XOBJ_DTYPE_INT, 71);
        $item2->initVar('rootId', XOBJ_DTYPE_INT);

        $item3 = new XoopsConfigItem();
        $item3->initVar('Id', XOBJ_DTYPE_INT, 73);
        $item3->initVar('parentId', XOBJ_DTYPE_INT, 72);
        $item3->initVar('rootId', XOBJ_DTYPE_INT);
        $objectArr = [$item1, $item2, $item3];

        $instance = new XoopsObjectTree($objectArr, $myId, $parentId);
        $this->assertInstanceOf('XoopsObjectTree', $instance);

        $tree = $instance->getTree();
        $this->assertInternalType('array', $tree);

        $ret = $instance->getByKey(72);
        $this->assertSame(72, $ret->getVar('Id'));
    }

    public function test_getTree(): void
    {
        $this->markTestIncomplete();
    }

    public function test_getByKey(): void
    {
        $this->markTestIncomplete();
    }
}
