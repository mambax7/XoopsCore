<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * Legacy compatibility for CriteriaElement
 */
abstract use Xoops\Core\Kernel\Criteria;
use Xoops\Core\Kernel\CriteriaCompo;
use Xoops\Core\Kernel\CriteriaElement;
class AbstractCriteriaElement extends CriteriaElement
{
}

/**
 * Legacy compatibility for CriteriaCompo
 */
class CriteriaCompo extends CriteriaCompo
{
}

/**
 * Legacy compatibility for Criteria
 */
class Criteria extends Criteria
{
}
