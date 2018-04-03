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
 * page module.
 *
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @since           2.6.0
 * @author          DuGris (aka Laurent JEN)
 * @version         $Id$
 */
class Page extends Xoops\Module\Helper\HelperAbstract
{
    /**
     * Init the module.
     *
     * @return null|void
     */
    public function init()
    {
        $this->setDirname('page');
    }

    /**
     * @return Page
     */
    public static function getInstance(): Page
    {
        return parent::getInstance();
    }

    /**
     * @return PagePage_contentHandler
     */
    public function getContentHandler(): PagePage_contentHandler
    {
        return $this->getHandler('page_content');
    }

    /**
     * @return PagePage_ratingHandler
     */
    public function getRatingHandler(): PagePage_ratingHandler
    {
        return $this->getHandler('page_rating');
    }

    /**
     * @return PagePage_relatedHandler
     */
    public function getRelatedHandler(): PagePage_relatedHandler
    {
        return $this->getHandler('page_related');
    }

    /**
     * @return PagePage_relatedHandler
     */
    public function getLinkHandler(): PagePage_relatedHandler
    {
        return $this->getHandler('page_related_link');
    }

    /**
     * @return PublisherGrouppermHandler
     */
    public function getGrouppermHandler(): PublisherGrouppermHandler
    {
        return $this->getHandler('groupperm');
    }

    public function getUserId()
    {
        if ($this->xoops()->isUser()) {
            return $this->xoops()->user->getVar('uid');
        }

        return 0;
    }
}
