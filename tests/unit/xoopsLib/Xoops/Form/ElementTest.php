<?php declare(strict_types=1);

namespace Xoops\Form;

require_once __DIR__.'/../../../init_new.php';

class ElementTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Element
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = $this->getMockForAbstractClass('Xoops\Form\Element');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testRenderAttributeString(): void
    {
        $instance = $this->object;

        $arrAttr = ['title' => 'title_value', 'name' => 'name_value[]'];
        $instance->setAll($arrAttr);

        $value = $instance->renderAttributeString();
        $expected = 'title="title_value" name="name_value[]" id="name_value" ';
        $this->assertSame($expected, $value);
    }

    public function testRenderAttributeString100(): void
    {
        $arrAttr = ['caption' => 'caption_value'];
        $this->object->setAll($arrAttr);

        $value = $this->object->renderAttributeString();
        $expected = 'title="caption_value" id="0" ';
        $this->assertSame($expected, $value);

        $this->object->clear();
        $arrAttr = ['caption' => 'caption_value', ':pattern_description' => 'pattern description'];
        $this->object->setAll($arrAttr);
        $value = $this->object->renderAttributeString();
        $expected = 'title="caption_value - pattern description" id="0" ';
        $this->assertSame($expected, $value);
    }

    public function testRenderAttributeString120(): void
    {
        $instance = $this->object;

        $arrAttr = ['title' => 'title_value', 'id' => 100];
        $instance->setAll($arrAttr);

        $value = $instance->renderAttributeString();
        $expected = 'title="title_value" id="100" ';
        $this->assertSame($expected, $value);
    }

    public function testGetValue(): void
    {
        $name = 'name';
        $this->object->setValue($name);
        $value = $this->object->getValue();
        $this->assertSame($name, $value);

        $names = ['name1', 'name2'];
        $this->object->setValue($names);
        $value = $this->object->getValue();
        $this->assertSame($names, $value);
    }

    public function testGetName(): void
    {
        $name = 'name';
        $this->object->setName($name);
        $value = $this->object->getName();
        $this->assertSame($name, $value);
    }

    public function testGetAccessKey(): void
    {
        $key = 'name';
        $this->object->setAccessKey($key);
        $value = $this->object->getAccessKey();
        $this->assertSame($key, $value);
    }

    public function testGetAccessString(): void
    {
        $instance = $this->object;

        $key = 'name';
        $instance->setAccessKey($key);

        $str = 'this sentence contains name';
        $result = $instance->getAccessString($str);

        $expected = '<span style="text-decoration: underline;">n</span>ame';
        $this->assertTrue(false !== strpos($result, $expected));

        $str = 'this sentence contains no access string';
        $result = $instance->getAccessString($str);
        $this->assertSame($str, $result);
    }

    public function testGetClass(): void
    {
        $this->assertFalse($this->object->getClass());

        $name = 'name';
        $this->object->setClass($name);
        $value = $this->object->getClass();
        $this->assertSame($name, $value);
    }

    public function testGetPattern(): void
    {
        $name = 'name';
        $this->object->setPattern($name);
        $value = $this->object->getPattern();
        $this->assertSame($name, $value);
    }

    public function testGetPatternDescription(): void
    {
        $instance = $this->object;

        $name = 'name';
        $instance->setPattern($name);

        $result = $instance->getPatternDescription();
        $this->assertSame('', $result);

        $name = 'name';
        $pattern = 'pattern';
        $instance->setPattern($name, $pattern);

        $result = $instance->getPatternDescription();
        $this->assertSame($pattern, $result);
    }

    public function testRenderDatalist(): void
    {
        $instance = $this->object;

        $result = $instance->renderDatalist();
        $this->assertSame('', $result);

        $name = 'name';
        $instance->setName($name);

        $data = 'data';
        $instance->setDatalist($data);

        $result = $instance->renderDatalist();
        $expected = "\n".'<datalist id="list_'.$name.'">'."\n";
        $expected .= '<option value="'.htmlspecialchars($data, ENT_QUOTES).'">'."\n";
        $expected .= '</datalist>'."\n";

        $this->assertSame($expected, $result);
    }

    public function testRenderDatalist100(): void
    {
        $instance = $this->object;

        $result = $instance->renderDatalist();
        $this->assertSame('', $result);

        $name = 'name';
        $instance->setName($name);

        $data = ['key1' => 'value1', 'key2' => 'value2'];
        $instance->setDatalist($data);

        $result = $instance->renderDatalist();
        $expected = "\n".'<datalist id="list_'.$name.'">'."\n";
        foreach ($data as $item) {
            $expected .= '<option value="'.htmlspecialchars($item, ENT_QUOTES).'">'."\n";
        }
        $expected .= '</datalist>'."\n";

        $this->assertSame($expected, $result);
    }

    public function testIsDatalist(): void
    {
        $instance = $this->object;

        $result = $instance->isDatalist();
        $this->assertFalse($result);

        $data = 'data';
        $instance->setDatalist($data);

        $result = $instance->isDatalist();
        $this->assertTrue($result);
    }

    public function testGetCaption(): void
    {
        $name = 'name';
        $this->object->setCaption($name);
        $value = $this->object->getCaption();
        $this->assertSame($name, $value);
    }

    public function testGetTitle(): void
    {
        $name = 'name';
        $this->object->setTitle($name);
        $value = $this->object->getTitle();
        $this->assertSame($name, $value);

        $name = 'another name';
        $this->object->remove('title');
        $this->object->set('caption', $name);
        $value = $this->object->getTitle();
        $this->assertSame($name, $value);
        $desc = 'description';
        $this->object->set(':pattern_description', $desc);
        $value = $this->object->getTitle();
        $this->assertSame($name.' - '.$desc, $value);
    }

    public function testGetDescription(): void
    {
        $name = 'name';
        $this->object->setDescription($name);
        $value = $this->object->getDescription();
        $this->assertSame($name, $value);
    }

    public function testIsHidden(): void
    {
        $value = $this->object->isHidden();
        $this->assertFalse($value);
        $this->object->setHidden();
        $value = $this->object->isHidden();
        $this->assertTrue($value);
    }

    public function testIsRequired(): void
    {
        $value = $this->object->isRequired();
        $this->assertFalse($value);
        $this->object->setRequired();
        $value = $this->object->isRequired();
        $this->assertTrue($value);
    }

    public function testGetExtra(): void
    {
        $name = 'name';
        $this->object->setExtra('one');
        $value = $this->object->getExtra();
        $this->assertSame('one', $value);

        $this->object->setExtra('two');
        $value = $this->object->getExtra();
        $this->assertSame('one two', $value);

        $this->object->setExtra('three', true);
        $value = $this->object->getExtra(true);
        $this->assertSame('three', $value);
    }

    public function testRenderValidationJS(): void
    {
        $value = $this->object->renderValidationJS();
        $this->assertFalse($value);

        $this->object->setRequired();
        $this->object->setName('rendertest');
        $value = $this->object->renderValidationJS();
        $this->assertNotFalse($value);

        $this->object->remove('required');

        $this->object->addCustomValidationCode('');
        $value = $this->object->renderValidationJS();
        $this->assertSame($value, '');

        $this->object->addCustomValidationCode('');
        $value = $this->object->renderValidationJS();
        $this->assertSame($value, "\n");

        $this->object->addCustomValidationCode('', true);
        $value = $this->object->renderValidationJS();
        $this->assertSame($value, '');
    }

    public function test_hasClassLike(): void
    {
        $name = 'class';
        $stem = 'stem';
        $this->assertFalse($this->object->hasClassLike($stem));
        $this->object->set($name, 'notstem');
        $this->assertFalse($this->object->hasClassLike($stem));
        $this->object->add($name, $stem);
        $this->assertNotFalse($this->object->hasClassLike($stem));
        $this->object->set($name, 'stuff');
        $this->object->add($name, 'stem3 fred');
        $this->assertNotFalse($this->object->hasClassLike($stem));
    }

    public function test_themeDecorateElement(): void
    {
        $class = 'class';
        $this->object->set($class, 'span3');
        $this->object->themeDecorateElement();
        $this->assertNotFalse($this->object->hasClassLike('span3'));
        $this->assertNotFalse($this->object->hasClassLike('form-control'));

        $this->object->remove($class);
        $this->object->themeDecorateElement();
        $this->assertNotFalse($this->object->hasClassLike('form-control'));
    }

    public function test_setWithDefaults(): void
    {
        $name = 'color';
        $enum = ['red', 'blue', 'green'];
        $default = 'black';
        $this->object->setWithDefaults($name, '', $default, $enum);
        $this->assertSame($default, $this->object->get($name));
        $this->object->setWithDefaults($name, 'purple', $default, $enum);
        $this->assertSame($default, $this->object->get($name));
        $this->object->setWithDefaults($name, 'blue', $default, $enum);
        $this->assertSame('blue', $this->object->get($name));
    }

    public function test_setIfNotEmpty(): void
    {
        $name = 'name';
        $value = 'test';
        $this->assertFalse($this->object->has($name));
        $this->object->setIfNotEmpty($name, '');
        $this->assertFalse($this->object->has($name));

        $this->object->setIfNotEmpty($name, $value);
        $actual = $this->object->get($name);
        $this->assertSame($value, $actual);

        $this->object->setIfNotEmpty($name, 'this_will_not_be_set');
        $actual = $this->object->get($name);
        $this->assertSame($value, $actual);
    }

    public function test_setIfNotSet(): void
    {
        $name = 'name';
        $value = 'test';
        $this->assertFalse($this->object->has($name));
        $this->object->setIfNotSet($name, $value);
        $actual = $this->object->get($name);
        $this->assertSame($value, $actual);

        $this->object->setIfNotSet($name, 'this_will_not_be_set');
        $actual = $this->object->get($name);
        $this->assertSame($value, $actual);
    }

    public function test_arrayAccess(): void
    {
        $key = 'value';
        $value = 'testvalue';
        $instance = new Raw($value);
        //$this->assertFalse(isset($instance[$key]));
        $instance->setValue($value);
        $this->assertTrue(isset($instance[$key]));
        $this->assertSame($value, $instance[$key]);

        $key = 'name';
        $value = 'testname';
        $this->assertFalse(isset($instance[$key]));
        $instance->setName($value);
        $this->assertTrue(isset($instance[$key]));
        $this->assertSame($value, $instance[$key]);

        $key = 'accesskey';
        $value = 'testkey';
        $this->assertFalse(isset($instance[$key]));
        $instance->setAccessKey($value);
        $this->assertTrue(isset($instance[$key]));
        $this->assertSame($value, $instance[$key]);

        $key = 'class';
        $value = 'testclass';
        $this->assertFalse(isset($instance[$key]));
        $instance->setClass($value);
        $this->assertTrue(isset($instance[$key]));
        $this->assertSame([$value], $instance[$key]);

        $key = 'pattern';
        $value = 'testpattern';
        $this->assertFalse(isset($instance[$key]));
        $instance->setPattern($value, 'testdesc');
        $this->assertTrue(isset($instance[$key]));
        $this->assertSame($value, $instance[$key]);
        $this->assertSame('testdesc', $instance[':pattern_description']);

        $key = 'datalist';
        $value = 'testdatalist';
        $this->assertFalse(isset($instance[$key]));
        $instance->setDatalist($value);
        $this->assertTrue(isset($instance[$key]));
        $this->assertSame([$value], $instance[$key]);

        $key = 'caption';
        $value = 'testcaption';
        $this->assertFalse(isset($instance[$key]));
        $instance->setCaption($value);
        $this->assertTrue(isset($instance[$key]));
        $this->assertSame($value, $instance[$key]);

        $key = 'title';
        $value = 'testtitle';
        $this->assertFalse(isset($instance[$key]));
        $instance->setTitle($value);
        $this->assertTrue(isset($instance[$key]));
        $this->assertSame($value, $instance[$key]);

        $key = 'description';
        $value = 'testdescription';
        $this->assertFalse(isset($instance[$key]));
        $instance->setDescription($value);
        $this->assertTrue(isset($instance[$key]));
        $this->assertSame($value, $instance[$key]);

        $key = 'hidden';
        $this->assertArrayNotHasKey($key, $instance);
        $instance->setHidden();
        $this->assertArrayHasKey($key, $instance);
        $this->assertNull($instance[$key]);

        $key = 'required';
        $this->assertArrayNotHasKey($key, $instance);
        $instance->setRequired(true);
        $this->assertArrayHasKey($key, $instance);
        $this->assertNull($instance[$key]);
    }
}
