<?php declare(strict_types=1);

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/*
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *                                     1785 E. Sahara Avenue, Suite 490-204
 *                                     Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 */

/**
 * File engine For XOOPS
 * Convenience class for reading, writing and appending to files.
 * PHP 5.3.
 *
 * @category  Xoops\Class\File\File
 * @author    Taiwen Jiang <phppp@users.sourceforge.net>
 * @copyright 2005-2008 Cake Software Foundation, Inc.
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 * @version   $Id$
 * @see      http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @since     CakePHP(tm) v 0.2.9
 */
class XoopsFileHandler
{
    /**
     * folder object of the File.
     *
     * @var XoopsFolderHandler
     */
    public $folder = null;

    /**
     * Filename.
     *
     * @var string
     */
    public $name = null;

    /**
     * file info.
     *
     * @var string
     */
    public $info = [];

    /**
     * Holds the file handler resource if the file is opened.
     *
     * @var resource
     */
    public $handle = null;

    /**
     * enable locking for file reading and writing.
     *
     * @var boolean
     */
    public $lock = null;

    /**
     * Constructor.
     *
     * @param string $path   Path to file
     * @param bool   $create Create file if it does not exist (if true)
     * @param int    $mode   Mode to apply to the folder holding the file
     *
     * @todo reconsider validity this class, if valid add exceptions to __construct()
     */
    public function __construct(string $path, bool $create = false, int $mode = 0755)
    {
        $this->folder = XoopsFile::getHandler('folder', dirname($path), $create, $mode);
        if (!is_dir($path)) {
            $this->name = basename($path);
        } else {
            return; // false;
        }
        if (!$this->exists()) {
            if (true === $create) {
                if ($this->safe($path) && false === $this->create()) {
                    return; // false;
                }
            } else {
                return; // false;
            }
        }

        return; // true;
    }

    /**
     * Closes the current file if it is opened.
     */
    public function __destruct()
    {
        $this->close();
    }

    /**
     * Creates the File.
     *
     * @return bool Success
     */
    public function create(): bool
    {
        $dir = $this->folder->pwd();
        if (is_dir($dir) && is_writable($dir) && !$this->exists()) {
            if (touch($this->pwd())) {
                return true;
            }
        }

        return false;
    }

    /**
     * Opens the current file with a given $mode.
     *
     * @param string $mode  A valid 'fopen' mode string (r|w|a ...)
     * @param bool   $force If true then the file will be re-opened even if
     * its already opened, otherwise it won't
     *
     * @return bool True on success, false on failure
     */
    public function open(string $mode = 'r', bool $force = false): bool
    {
        if (!$force && is_resource($this->handle)) {
            return true;
        }
        if (false === $this->exists()) {
            if (false === $this->create()) {
                return false;
            }
        }
        $this->handle = fopen($this->pwd(), $mode);
        if (is_resource($this->handle)) {
            return true;
        }

        return false;
    }

    /**
     * Return the contents of this File as a string.
     *
     * @param string|bool $bytes where to start
     * @param string      $mode  mode of file access
     * @param bool        $force If true then the file will be re-opened even if its already opened, otherwise it won't
     *
     * @return mixed string on success, false on failure
     */
    public function read($bytes = false, $mode = 'rb', $force = false)
    {
        $success = false;
        if (null !== $this->lock) {
            if (false === flock($this->handle, LOCK_SH)) {
                return false;
            }
        }
        if (false === $bytes) {
            $success = file_get_contents($this->pwd());
        } else {
            if (true === $this->open($mode, $force)) {
                if (is_int($bytes)) {
                    $success = fread($this->handle, $bytes);
                } else {
                    $data = '';
                    while (!feof($this->handle)) {
                        $data .= fgets($this->handle, 4096);
                    }
                    $success = trim($data);
                }
            }
        }
        if (null !== $this->lock) {
            flock($this->handle, LOCK_UN);
        }

        return $success;
    }

    /**
     * Sets or gets the offset for the currently opened file.
     *
     * @param mixed $offset The $offset in bytes to seek. If set to false then the current offset is returned.
     * @param int   $seek   PHP Constant SEEK_SET | SEEK_CUR | SEEK_END determining what the $offset is relative to
     *
     * @return mixed True on success, false on failure (set mode),
     * false on failure or integer offset on success (get mode)
     */
    public function offset($offset = false, $seek = SEEK_SET)
    {
        if (false === $offset) {
            if (is_resource($this->handle)) {
                return ftell($this->handle);
            }
        } else {
            if (true === $this->open()) {
                return 0 === fseek($this->handle, $offset, $seek);
            }
        }

        return false;
    }

    /**
     * Prepares a ascii string for writing
     * fixes line endings.
     *
     * @param string $data Data to prepare for writing.
     *
     * @return string
     */
    public function prepare(string $data): string
    {
        $lineBreak = "\n";
        if ('WIN' === substr(PHP_OS, 0, 3)) {
            $lineBreak = "\r\n";
        }

        return strtr($data, ["\r\n" => $lineBreak, "\n" => $lineBreak, "\r" => $lineBreak]);
    }

    /**
     * Write given data to this File.
     *
     * @param string $data  Data to write to this File.
     * @param string $mode  Mode of writing. {@link http://php.net/fwrite See fwrite()}.
     * @param bool   $force force the file to open
     *
     * @return bool Success
     */
    public function write(string $data, string $mode = 'w', bool $force = false): bool
    {
        $success = false;
        if (true === $this->open($mode, $force)) {
            if (null !== $this->lock) {
                if (false === flock($this->handle, LOCK_EX)) {
                    return false;
                }
            }
            if (false !== fwrite($this->handle, $data)) {
                $success = true;
            }
            if (null !== $this->lock) {
                flock($this->handle, LOCK_UN);
            }
        }

        return $success;
    }

    /**
     * Append given data string to this File.
     *
     * @param string $data  Data to write
     * @param bool   $force force the file to open
     *
     * @return bool Success
     */
    public function append(string $data, bool $force = false): bool
    {
        return $this->write($data, 'a', $force);
    }

    /**
     * Closes the current file if it is opened.
     *
     * @return bool True if closing was successful or file was already closed, otherwise false
     */
    public function close(): bool
    {
        if (!is_resource($this->handle)) {
            return true;
        }

        return fclose($this->handle);
    }

    /**
     * Deletes the File.
     *
     * @return bool Success
     */
    public function delete(): bool
    {
        if ($this->exists()) {
            return unlink($this->pwd());
        }

        return false;
    }

    /**
     * Returns the File information array.
     *
     * @return array The File information
     */
    public function info(): array
    {
        if (null === $this->info) {
            $this->info = pathinfo($this->pwd());
        }
        if (!isset($this->info['filename'])) {
            $this->info['filename'] = $this->name();
        }

        return $this->info;
    }

    /**
     * Returns the File extension.
     *
     * @return string The File extension
     */
    public function ext(): string
    {
        if (null === $this->info) {
            $this->info();
        }
        if (isset($this->info['extension'])) {
            return $this->info['extension'];
        }

        return false;
    }

    /**
     * Returns the File name without extension.
     *
     * @return string The File name without extension.
     */
    public function name(): string
    {
        if (null === $this->info) {
            $this->info();
        }
        if (isset($this->info['extension'])) {
            return basename($this->name, '.'.$this->info['extension']);
        } elseif ($this->name) {
            return $this->name;
        }

        return false;
    }

    /**
     * makes filename safe for saving.
     *
     * @param string $name the name of the file to make safe if different from $this->name
     * @param string $ext  the extension of the file
     *
     * @return string
     */
    public function safe(?string $name = null, ?string $ext = null): string
    {
        if (!$name) {
            $name = $this->name;
        }
        if (!$ext) {
            $ext = $this->ext();
        }

        return preg_replace('/[^\w\.-]+/', '_', basename($name, $ext));
    }

    /**
     * Get md5 Checksum of file with previous check of Filesize.
     *
     * @param int $maxsize in MB or true to force
     *
     * @return string md5 Checksum {@link http://php.net/md5_file See md5_file()}
     */
    public function md5(int $maxsize = 5): string
    {
        if (true === $maxsize) {
            return md5_file($this->pwd());
        }
        $size = $this->size();
        if ($size && $size < ($maxsize * 1024) * 1024) {
            return md5_file($this->pwd());
        }

        return false;
    }

    /**
     * Returns the full path of the File.
     *
     * @return string Full path to file
     */
    public function pwd(): string
    {
        return $this->folder->slashTerm($this->folder->pwd()).$this->name;
    }

    /**
     * Returns true if the File exists.
     *
     * @return bool true if it exists, false otherwise
     */
    public function exists(): bool
    {
        $exists = is_file($this->pwd());

        return $exists;
    }

    /**
     * Returns the "chmod" (permissions) of the File.
     *
     * @return string Permissions for the file
     */
    public function perms(): string
    {
        if ($this->exists()) {
            return substr(sprintf('%o', fileperms($this->pwd())), -4);
        }

        return false;
    }

    /**
     * Returns the Filesize, either in bytes or in human-readable format.
     *
     * @return bool|int filesize as int or as a human-readable string
     */
    public function size()
    {
        if ($this->exists()) {
            clearstatcache();

            return filesize($this->pwd());
        }

        return false;
    }

    /**
     * Returns true if the File is writable.
     *
     * @return bool true if its writable, false otherwise
     */
    public function writable(): bool
    {
        return is_writable($this->pwd());
    }

    /**
     * Returns true if the File is executable.
     *
     * @return bool true if its executable, false otherwise
     */
    public function executable(): bool
    {
        return is_executable($this->pwd());
    }

    /**
     * Returns true if the File is readable.
     *
     * @return bool true if file is readable, false otherwise
     */
    public function readable(): bool
    {
        return is_readable($this->pwd());
    }

    /**
     * Returns the File's owner.
     *
     * @return int|bool the Fileowner
     */
    public function owner()
    {
        if ($this->exists()) {
            return fileowner($this->pwd());
        }

        return false;
    }

    /**
     * Returns the File group.
     *
     * @return int|bool the Filegroup
     */
    public function group()
    {
        if ($this->exists()) {
            return filegroup($this->pwd());
        }

        return false;
    }

    /**
     * Returns last access time.
     *
     * @return int|bool timestamp Timestamp of last access time
     */
    public function lastAccess()
    {
        if ($this->exists()) {
            return fileatime($this->pwd());
        }

        return false;
    }

    /**
     * Returns last modified time.
     *
     * @return int|bool timestamp Timestamp of last modification
     */
    public function lastChange()
    {
        if ($this->exists()) {
            return filemtime($this->pwd());
        }

        return false;
    }

    /**
     * Returns the current folder.
     *
     * @return XoopsFolderHandler Current folder
     */
    public function folder(): XoopsFolderHandler
    {
        return $this->folder;
    }
}
