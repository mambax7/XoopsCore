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
 * XOOPS downloader.
 *
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @since           2.0.0
 * @author          Kazumi Ono <onokazu@xoops.org>
 * @version         $Id$
 */

/**
 * Sends non HTML files through a http socket.
 */
abstract class XoopsDownloader
{
    /**
     * @var string
     */
    protected $mimetype;

    /**
     * @var string
     */
    protected $ext;

    /**
     * @var XoopsDownloader
     */
    protected $archiver;

    /**
     * @abstract
     * @param bool|string $newfilename
     */
    abstract public function addFile($filepath, $newfilename = null): void;

    /**
     * @abstract
     * @param null $newfilename
     */
    abstract public function addBinaryFile($filepath, $newfilename = null): void;

    /**
     * @abstract
     * @param int $time
     */
    abstract public function addFileData(&$data, $filename, int $time = 0): void;

    /**
     * @abstract
     * @param int $time
     */
    abstract public function addBinaryFileData(&$data, $filename, int $time = 0): void;

    /**
     * @abstract
     * @param bool $gzip
     */
    abstract public function download($name, bool $gzip = true): void;

    /**
     * Send the HTTP header.
     *
     * @param string $filename
     */
    protected function _header(string $filename): void
    {
        if (function_exists('mb_http_output')) {
            mb_http_output('pass');
        }
        header('Content-Type: '.$this->mimetype);
        if (preg_match("/MSIE ([0-9]\.[0-9]{1,2})/", $_SERVER['HTTP_USER_AGENT'])) {
            header('Content-Disposition: attachment; filename="'.$filename.'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
        } else {
            header('Content-Disposition: attachment; filename="'.$filename.'"');
            header('Expires: 0');
            header('Pragma: no-cache');
        }
    }
}
