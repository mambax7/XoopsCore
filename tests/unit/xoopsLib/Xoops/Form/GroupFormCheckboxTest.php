<?php declare(strict_types=1);

namespace Xoops\Form;

require_once __DIR__.'/../../../init_new.php';

class GroupFormCheckboxTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var GroupFormCheckbox
     */
    protected $object;

    protected $optionTree = [];

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new GroupFormCheckbox('Caption', 'name', 2);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testRender(): void
    {
        $this->addItem(1, 'item_name1');
        $this->addItem(10, 'item_name10', 1);
        foreach (array_keys($this->optionTree) as $item_id) {
            $this->optionTree[$item_id]['allchild'] = [];
            $this->loadAllChildItemIds($item_id, $this->optionTree[$item_id]['allchild']);
        }

        $this->object->setOptionTree($this->optionTree);
        $value = $this->object->render();
        $this->assertInternalType('string', $value);
        $this->assertTrue(false !== strpos($value, '<input type="checkbox" name="name[groups][2][1]"'));
        $this->assertTrue(false !== strpos($value, '<input type="checkbox" name="name[groups][2][10]"'));
        $this->assertTrue(false !== strpos($value, 'value="item_name1"'));
        $this->assertTrue(false !== strpos($value, 'value="item_name10"'));
    }

    protected function addItem($itemId, $itemName, $itemParent = 0): void
    {
        $this->optionTree[$itemParent]['children'][] = $itemId;
        $this->optionTree[$itemId]['parent'] = $itemParent;
        $this->optionTree[$itemId]['name'] = $itemName;
        $this->optionTree[$itemId]['id'] = $itemId;
    }

    protected function loadAllChildItemIds($itemId, &$childIds): void
    {
        if (!empty($this->optionTree[$itemId]['children'])) {
            $children = $this->optionTree[$itemId]['children'];
            if (is_array($children)) {
                foreach ($children as $fcid) {
                    array_push($childIds, $fcid);
                    $this->loadAllChildItemIds($fcid, $childIds);
                }
            }
        }
    }
}
