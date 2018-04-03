<?php declare(strict_types=1);

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @since           1.0.0
 * @author          Kazumi Ono (AKA onokazu)
 * @version         $Id$
 */
class XoopsThemeSetParser extends SaxParser
{
    /**
     * @var array
     */
    public $tempArr = [];

    /**
     * @var array
     */
    public $themeSetData = [];

    /**
     * @var array
     */
    public $imagesData = [];

    /**
     * @var array
     */
    public $templatesData = [];

    /**
     * @param string $input
     */
    public function __construct(string &$input)
    {
        parent::__construct($input);
        //$this->addTagHandler(new ThemeSetThemeNameHandler());
        $this->addTagHandler(new ThemeSetDateCreatedHandler());
        $this->addTagHandler(new ThemeSetAuthorHandler());
        $this->addTagHandler(new ThemeSetDescriptionHandler());
        $this->addTagHandler(new ThemeSetGeneratorHandler());
        $this->addTagHandler(new ThemeSetNameHandler());
        $this->addTagHandler(new ThemeSetEmailHandler());
        $this->addTagHandler(new ThemeSetLinkHandler());
        $this->addTagHandler(new ThemeSetTemplateHandler());
        $this->addTagHandler(new ThemeSetImageHandler());
        $this->addTagHandler(new ThemeSetModuleHandler());
        $this->addTagHandler(new ThemeSetFileTypeHandler());
        $this->addTagHandler(new ThemeSetTagHandler());
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function setThemeSetData(string $name, string &$value): void
    {
        $this->themeSetData[$name] = $value;
    }

    /**
     * @param  string     $name
     * @return array|bool
     */
    public function getThemeSetData(?string $name = null)
    {
        if (isset($name)) {
            if (isset($this->themeSetData[$name])) {
                return $this->themeSetData[$name];
            }

            return false;
        }

        return $this->themeSetData;
    }

    /**
     * @param array $imagearr
     */
    public function setImagesData(array &$imagearr): void
    {
        $this->imagesData[] = $imagearr;
    }

    /**
     * @return array
     */
    public function getImagesData(): array
    {
        return $this->imagesData;
    }

    /**
     * @param array $tplarr
     */
    public function setTemplatesData(array &$tplarr): void
    {
        $this->templatesData[] = $tplarr;
    }

    /**
     * @return array
     */
    public function getTemplatesData(): array
    {
        return $this->templatesData;
    }

    /**
     * @param string $name
     * @param string $value
     * @param string $delim
     */
    public function setTempArr(string $name, string &$value, string $delim = ''): void
    {
        if (!isset($this->tempArr[$name])) {
            $this->tempArr[$name] = $value;
        } else {
            $this->tempArr[$name] .= $delim.$value;
        }
    }

    /**
     * @return array
     */
    public function getTempArr($name = null): array
    {
        if (isset($name)) {
            if (isset($this->tempArr[$name])) {
                return $this->tempArr[$name];
            }

            return false;
        }

        return $this->tempArr;
    }

    public function resetTempArr(): void
    {
        unset($this->tempArr);
        $this->tempArr = [];
    }
}

/**
 * Class ThemeSetDateCreatedHandler.
 */
class ThemeSetDateCreatedHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'dateCreated';
    }

    /**
     * @param array $data
     */
    public function handleCharacterData(SaxParser $parser, array &$data): void
    {
        if (!is_a($parser, 'XoopsThemeSetParser')) {
            return;
        }
        switch ($parser->getParentTag()) {
            case 'themeset':
                $parser->setThemeSetData('date', $data);

                break;
            default:
                break;
        }
    }
}

/**
 * Class ThemeSetAuthorHandler.
 */
class ThemeSetAuthorHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'author';
    }

    /**
     * @param array $attributes
     */
    public function handleBeginElement(SaxParser $parser, array &$attributes): void
    {
        if (!is_a($parser, 'XoopsThemeSetParser')) {
            return;
        }
        $parser->resetTempArr();
    }

    public function handleEndElement(SaxParser $parser): void
    {
        if (!is_a($parser, 'XoopsThemeSetParser')) {
            return;
        }
        //todo where does this method come from??
        $parser->setCreditsData($parser->getTempArr());
    }
}

/**
 * Class ThemeSetDescriptionHandler.
 */
class ThemeSetDescriptionHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'description';
    }

    /**
     * @param array $data
     */
    public function handleCharacterData(SaxParser $parser, array &$data): void
    {
        if (!is_a($parser, 'XoopsThemeSetParser')) {
            return;
        }
        switch ($parser->getParentTag()) {
            case 'template':
                $parser->setTempArr('description', $data);

                break;
            case 'image':
                $parser->setTempArr('description', $data);

                break;
            default:
                break;
        }
    }
}

/**
 * Class ThemeSetGeneratorHandler.
 */
class ThemeSetGeneratorHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'generator';
    }

    /**
     * @param array $data
     */
    public function handleCharacterData(SaxParser $parser, array &$data): void
    {
        if (!is_a($parser, 'XoopsThemeSetParser')) {
            return;
        }
        switch ($parser->getParentTag()) {
            case 'themeset':
                $parser->setThemeSetData('generator', $data);

                break;
            default:
                break;
        }
    }
}

/**
 * Class ThemeSetNameHandler.
 */
class ThemeSetNameHandler extends XmlTagHandler
{
    public function getName()
    {
        return 'name';
    }

    /**
     * @param array $data
     */
    public function handleCharacterData(SaxParser $parser, array &$data): void
    {
        if (!is_a($parser, 'XoopsThemeSetParser')) {
            return;
        }
        switch ($parser->getParentTag()) {
            case 'themeset':
                $parser->setThemeSetData('name', $data);

                break;
            case 'author':
                $parser->setTempArr('name', $data);

                break;
            default:
                break;
        }
    }
}

/**
 * Class ThemeSetEmailHandler.
 */
class ThemeSetEmailHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'email';
    }

    /**
     * @param array $data
     */
    public function handleCharacterData(SaxParser $parser, array &$data): void
    {
        if (!is_a($parser, 'XoopsThemeSetParser')) {
            return;
        }
        switch ($parser->getParentTag()) {
            case 'author':
                $parser->setTempArr('email', $data);

                break;
            default:
                break;
        }
    }
}

/**
 * Class ThemeSetLinkHandler.
 */
class ThemeSetLinkHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'link';
    }

    /**
     * @param array $data
     */
    public function handleCharacterData(SaxParser $parser, array &$data): void
    {
        if (!is_a($parser, 'XoopsThemeSetParser')) {
            return;
        }
        switch ($parser->getParentTag()) {
            case 'author':
                $parser->setTempArr('link', $data);

                break;
            default:
                break;
        }
    }
}

/**
 * Class ThemeSetTemplateHandler.
 */
class ThemeSetTemplateHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'template';
    }

    /**
     * @param array $attributes
     */
    public function handleBeginElement(SaxParser $parser, array &$attributes): void
    {
        if (!is_a($parser, 'XoopsThemeSetParser')) {
            return;
        }
        $parser->resetTempArr();
        if (isset($attributes['name'])) {
            $parser->setTempArr('name', $attributes['name']);
        }
    }

    public function handleEndElement(SaxParser $parser): void
    {
        if (!is_a($parser, 'XoopsThemeSetParser')) {
            return;
        }
        $value = $parser->getTempArr();
        $parser->setTemplatesData($value);
    }
}

/**
 * Class ThemeSetImageHandler.
 */
class ThemeSetImageHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'image';
    }

    /**
     * @param array $attributes
     */
    public function handleBeginElement(SaxParser $parser, array &$attributes): void
    {
        if (!is_a($parser, 'XoopsThemeSetParser')) {
            return;
        }
        $parser->resetTempArr();
        if (isset($attributes['name'])) {
            $parser->setTempArr('name', $attributes['name']);
        }
    }

    public function handleEndElement(SaxParser $parser): void
    {
        if (!is_a($parser, 'XoopsThemeSetParser')) {
            return;
        }
        $value = $parser->getTempArr();
        $parser->setImagesData($value);
    }
}

/**
 * Class ThemeSetModuleHandler.
 */
class ThemeSetModuleHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'module';
    }

    /**
     * @param array $data
     */
    public function handleCharacterData(SaxParser $parser, array &$data): void
    {
        if (!is_a($parser, 'XoopsThemeSetParser')) {
            return;
        }
        switch ($parser->getParentTag()) {
            case 'template':
            case 'image':
                $parser->setTempArr('module', $data);

                break;
            default:
                break;
        }
    }
}

/**
 * Class ThemeSetFileTypeHandler.
 */
class ThemeSetFileTypeHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'fileType';
    }

    /**
     * @param array $data
     */
    public function handleCharacterData(SaxParser $parser, array &$data): void
    {
        if (!is_a($parser, 'XoopsThemeSetParser')) {
            return;
        }
        switch ($parser->getParentTag()) {
            case 'template':
                $parser->setTempArr('type', $data);

                break;
            default:
                break;
        }
    }
}

/**
 * Class ThemeSetTagHandler.
 */
class ThemeSetTagHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'tag';
    }

    /**
     * @param array $data
     */
    public function handleCharacterData(SaxParser $parser, array &$data): void
    {
        if (!is_a($parser, 'XoopsThemeSetParser')) {
            return;
        }
        switch ($parser->getParentTag()) {
            case 'image':
                $parser->setTempArr('tag', $data);

                break;
            default:
                break;
        }
    }
}
