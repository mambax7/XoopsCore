<?php declare(strict_types=1);

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

namespace Xoops\Core\Service\Contract;

/**
 * HtmlToPdf service interface.
 *
 * @category  Xoops\Core\Service\Contract\HtmlToPdfInterface
 * @author    Richard Griffith <richard@geekwright.com>
 * @copyright 2014 The XOOPS Project https://github.com/XOOPS/XoopsCore
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @version   Release: 1.0
 * @see      http://xoops.org
 * @since     2.6.0
 */
interface HtmlToPdfInterface
{
    public const MODE = \Xoops\Core\Service\Manager::MODE_EXCLUSIVE;

    /**
     * startPdf - start a new pdf.
     *
     * @param Response $response \Xoops\Core\Service\Response object
     */
    public function startPdf(Response $response): void;

    /**
     * setPageOrientation - set page orientation.
     *
     * @param Response $response        \Xoops\Core\Service\Response object
     * @param string   $pageOrientation page orientation, 'P' for portrait, 'L' for landscape
     */
    public function setPageOrientation(Response $response, string $pageOrientation): void;

    /**
     * setPageSize - set standard page size.
     *
     * @param Response $response \Xoops\Core\Service\Response object
     * @param string   $pageSize standard named page size, i.e. 'LETTER', 'A4', etc.
     */
    public function setPageSize(Response $response, string $pageSize): void;

    /**
     * setBaseUnit - set unit of measure for page size, margins, etc.
     *
     * @param Response $response \Xoops\Core\Service\Response object
     * @param string   $unit     unit used in page size, margins. Possible values include
     *                           'mm' = millimeter, "in" = inches, 'pt' = typographic points
     */
    public function setBaseUnit(Response $response, string $unit): void;

    /**
     * setMargins - set margin sizes.
     *
     * @param Response $response     \Xoops\Core\Service\Response object
     * @param float    $leftMargin   left margin in base units, @see setBaseUnits()
     * @param float    $topMargin    top margin in base units
     * @param float    $rightMargin  right margin in base units
     * @param float    $bottomMargin bottom margin in base units
     */
    public function setMargins(Response $response, float $leftMargin, float $topMargin, float $rightMargin, float $bottomMargin): void;

    /**
     * setBaseFont - set the base font used in rendering.
     *
     * @param Response $response   \Xoops\Core\Service\Response object
     * @param string   $fontFamily font family
     * @param string   $fontStyle  font style ('bold', 'italic', etc.)
     * @param float    $fontSize   font size in points
     */
    public function setBaseFont(Response $response, string $fontFamily, string $fontStyle = '', float $fontSize = null): void;

    /**
     * setDefaultMonospacedFont - default monotype font used in rendering.
     *
     * @param Response $response       \Xoops\Core\Service\Response object
     * @param string   $monoFontFamily font family
     */
    public function setDefaultMonospacedFont(Response $response, string $monoFontFamily): void;

    /**
     * setAuthor - set author in pdf meta data.
     *
     * @param Response $response  \Xoops\Core\Service\Response object
     * @param string   $pdfAuthor author name
     */
    public function setAuthor(Response $response, string $pdfAuthor): void;

    /**
     * setTitle - set title in pdf meta data.
     *
     * @param Response $response \Xoops\Core\Service\Response object
     * @param string   $pdfTitle document title
     */
    public function setTitle(Response $response, string $pdfTitle): void;

    /**
     * setSubject - set subject in pdf meta data.
     *
     * @param Response $response   \Xoops\Core\Service\Response object
     * @param string   $pdfSubject document subject
     */
    public function setSubject(Response $response, string $pdfSubject): void;

    /**
     * setKeywords - set keywords in pdf meta data.
     *
     * @param Response $response    \Xoops\Core\Service\Response object
     * @param string[] $pdfKeywords array of keywords pertaining to document
     */
    public function setKeywords(Response $response, $pdfKeywords): void;

    /**
     * addHtml - add HTML formatted text to document. This may be called multiple times.
     *
     * @param Response $response \Xoops\Core\Service\Response object
     * @param string   $html     HTML formated text to include in document
     *                           array     user info, 'uid', 'uname' and 'email' required
     */
    public function addHtml(Response $response, string $html): void;

    /**
     * outputPdfInline - output a named pdf document file inline.
     *
     * @param Response $response \Xoops\Core\Service\Response object
     * @param string   $name     filename for file
     */
    public function outputPdfInline(Response $response, string $name): void;

    /**
     * outputPdfDownload - output a named pdf document file for download.
     *
     * @param Response $response \Xoops\Core\Service\Response object
     * @param string   $name     filename for file
     */
    public function outputPdfDownload(Response $response, string $name): void;

    /**
     * fetchPdf - fetch rendered document as a string.
     *
     * @param Response $response \Xoops\Core\Service\Response object
     */
    public function fetchPdf(Response $response): void;
}
