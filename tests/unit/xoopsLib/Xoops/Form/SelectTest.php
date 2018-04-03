<?php

namespace Xoops\Form;

require_once(__DIR__ . '/../../../init_new.php');

class SelectTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Select
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Select('Caption', 'name', 'value');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testIsMultiple()
    {
        $value = $this->object->isMultiple();
        $this->assertFalse($value);

        $aSelect = new Select('Caption', 'name', 'value', 1, true);
        $value = $aSelect->isMultiple();
        $this->assertTrue($value);
    }

    public function testGetSize()
    {
        $value = $this->object->getSize();
        $this->assertSame(1, $value);
    }

    public function testAddOption()
    {
        $this->object->addOption('opt_key', 'opt_name');
        $this->object->addOption('opt_just_key');
        $value = $this->object->getOptions();
        $this->assertTrue(is_array($value));
        $this->assertSame('opt_name', $value['opt_key']);
        $this->assertSame('opt_just_key', $value['opt_just_key']);
    }

    public function testAddOptionArray()
    {
        $this->object->addOptionArray(['opt_key' => 'opt_name', 'opt_just_key' => null]);
        $value = $this->object->getOptions();
        $this->assertTrue(is_array($value));
        $this->assertSame('opt_name', $value['opt_key']);
        $this->assertSame('opt_just_key', $value['opt_just_key']);
    }

    public function testAddOptionGroup()
    {
        $groups = ['grp_key' => 'grp_name', 'grp_key1' => 'grp_name1'];
        $this->object->addOptionGroup('opt_grp_name', $groups);
        $value = $this->object->get('option');
        $this->assertTrue(is_array($value));
        $this->assertSame($groups, $value['opt_grp_name']);
    }

    public function testRender()
    {
        $this->object->addOptionArray(['opt_key' => 'opt_name', 'opt_just_key' => null]);
        $this->object->setValue('opt_key');
        $value = $this->object->render();
        $this->assertTrue(is_string($value));
        $this->assertTrue(strpos($value, '<select') !== false);
        $this->assertTrue(strpos($value, 'name="name"') !== false);
        $this->assertTrue(strpos($value, 'size="1"') !== false);
        $this->assertTrue(strpos($value, 'title="Caption"') !== false);
        $this->assertTrue(strpos($value, 'id="name"') !== false);
        $this->assertTrue(strpos($value, '<option') !== false);
        $this->assertTrue(strpos($value, 'value="opt_key"') !== false);
        $this->assertTrue(strpos($value, '>opt_name</option>') !== false);
        $this->assertTrue(strpos($value, 'value="opt_just_key"') !== false);
        $this->assertTrue(strpos($value, '>opt_just_key</option>') !== false);

        $this->object = new Select('Caption', 'name', 'value'); // reset object
        $groups = ['grp_key' => 'grp_name', 'grp_key1' => 'grp_name1'];
        $this->object->addOptionGroup('opt_grp_name', $groups);
        $value = $this->object->render();
        $this->assertTrue(is_string($value));
        $this->assertTrue(strpos($value, '<select') !== false);
        $this->assertTrue(strpos($value, 'name="name"') !== false);
        $this->assertTrue(strpos($value, 'size="1"') !== false);
        $this->assertTrue(strpos($value, 'title="Caption"') !== false);
        $this->assertTrue(strpos($value, 'id="name"') !== false);
        $this->assertTrue(strpos($value, '<optgroup') !== false);
        $this->assertTrue(strpos($value, 'label="opt_grp_name"') !== false);
        $this->assertTrue(strpos($value, '<option') !== false);
        $this->assertTrue(strpos($value, 'value="grp_key"') !== false);
        $this->assertTrue(strpos($value, '>grp_name</option>') !== false);
        $this->assertTrue(strpos($value, 'value="grp_key1"') !== false);
        $this->assertTrue(strpos($value, '>grp_name1</option>') !== false);

    }

    public function testRenderValidationJS()
    {
        $value = $this->object->renderValidationJS();
        $this->assertSame('', $value);

        $this->object->setRequired(true);
        $value = $this->object->renderValidationJS();
        $this->assertTrue(is_string($value));
        $this->assertTrue(strpos($value, 'window.alert') !== false);
    }

    public function test__construct()
    {
        $oldWay = new Select('mycaption', 'myname', 'opt1');
        $oldWay->addOption('opt1', 'optname1');
        $oldWay->addOption('opt2', 'optname2');
        $newWay = new Select([
            'caption' => 'mycaption',
            'name' => 'myname',
            'value' => 'opt1',
            'option' => [
                'opt1' => 'optname1',
                'opt2' => 'optname2',
            ],
        ]);
        $this->assertSame($oldWay->render(), $newWay->render());
        $this->assertSame($oldWay->renderValidationJS(), $newWay->renderValidationJS());
    }
}
