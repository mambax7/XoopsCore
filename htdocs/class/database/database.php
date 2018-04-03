<?php declare(strict_types=1);

/**
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * Abstract base class for Database access classes.
 *
 * PHP version 5.3
 *
 * @category   Xoops\Class\Database\Database
 * @author     Kazumi Ono <onokazu@xoops.org>
 * @copyright  2013 XOOPS Project (http://xoops.org)
 * @license    GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @version    Release:2.6
 * @see       http://xoops.org
 * @since      2.6.0
 * @abstract
 * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
 */
abstract class AbstractXoopsDatabase
{
    /**
     * Database connection.
     *
     * @var resource
     */
    public $conn;

    /**
     * Prefix for tables in the database.
     *
     * @var string
     */
    public $prefix = '';

    /**
     * If statements that modify the database are selected.
     *
     * @var boolean
     */
    public $allowWebChanges = false;

    /**
     * set the prefix for tables in the database.
     *
     * @param string $value table prefix
     *
     * @return $this does not return a value
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     */
    public function setPrefix(string $value)
    {
        $this->prefix = $value;
    }

    /**
     * public function prefix($tablename = '').
     *
     * attach the prefix.'_' to a given tablename
     * if tablename is empty, only prefix will be returned
     *
     * @param string $tablename tablename
     *
     * @return string prefixed tablename, just prefix if tablename is empty
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     */
    public function prefix(string $tablename = ''): string
    {
        if ('' !== $tablename) {
            return $this->prefix.'_'.$tablename;
        }

        return $this->prefix;
    }

    /**
     * connect to the database.
     *
     * @param bool $selectdb select the database now?
     *
     * @return bool successful?
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function connect(bool $selectdb = true): bool;

    /**
     * generate an ID for a new row.
     *
     * This is for compatibility only. Will always return 0, because MySQL supports
     * autoincrement for primary keys.
     *
     * @param string $sequence name of the sequence from which to get the next ID
     *
     * @return int always 0, because mysql has support for autoincrement
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function genId(string $sequence): int;

    /**
     * Get a result row as an enumerated array.
     *
     * @param resource $result resource to get result from
     *
     * @return array
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function fetchRow($result): array;

    /**
     * Fetch a result row as an associative array.
     *
     * @param resource $result resource to get result from
     *
     * @return array
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function fetchArray($result): array;

    /**
     * Fetch a result row as an associative array.
     *
     * @param resource $result resource to get result from
     *
     * @return array
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function fetchBoth($result): array;

    /**
     * Fetch a result row as an object.
     *
     * @param resource $result resource to get result from
     *
     * @return object|stdClass
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function fetchObject($result);

    /**
     * Get the ID generated from the previous INSERT operation.
     *
     * @return int
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function getInsertId(): int;

    /**
     * Get number of rows in result.
     *
     * @param resource $result the resource containing the number of rows
     *
     * @return int the number of rows to return
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function getRowsNum($result): int;

    /**
     * Get number of affected rows.
     *
     * @return int
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function getAffectedRows(): int;

    /**
     * Close MySQL connection.
     *
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function close(): void;

    /**
     * Free all memory associated with the result identifier result.
     *
     * @param resource $result query result
     *
     * @return bool TRUE on success or FALSE on failure.
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function freeRecordSet($result): bool;

    /**
     * Returns the text of the error message from previous MySQL operation.
     *
     * @return bool Returns the error text from the last MySQL function,
     * or '' (the empty string) if no error occurred.
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function error(): bool;

    /**
     * Returns the numerical value of the error message from previous
     * MySQL operation.
     *
     * @return int Returns the error number from the last MySQL function
     * , or 0 (zero) if no error occurred.
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function errno(): int;

    /**
     * Returns escaped string text with single
     * quotes around it to be safely stored in database.
     *
     * @param string $str unescaped string text
     *
     * @return string escaped string text with single quotes around
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function quoteString(string $str): string;

    /**
     * Quotes a string for use in a query.
     *
     * @param string $string string to quote
     *
     * @return string
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function quote(string $string): string;

    /**
     * Returns escaped string text without quotes around it.
     *
     * @param string $string unescaped string text
     *
     * @return string escaped text string escaped to be safely used in database calls
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function escape(string $string): string;

    /**
     * perform a query on the database.
     *
     * @param string $sql   a valid MySQL query
     * @param int    $limit number of records to return
     * @param int    $start offset of first record to return
     *
     * @return bool|resource query result or FALSE if successful
     * or TRUE if successful and no result
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function queryF(string $sql, int $limit = 0, int $start = 0);

    /**
     * perform a query.
     *
     * This method is empty and does nothing! It should therefore only be
     * used if nothing is exactly what you want done! ;-)
     *
     * @param string $sql   a valid MySQL query
     * @param int    $limit number of records to return
     * @param int    $start offset of first record to return
     *
     * @return resource returns nothing
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function query(string $sql, int $limit = 0, int $start = 0);

    /**
     * perform queries from SQL dump file in a batch.
     *
     * @param string $file file path to an SQL dump file
     *
     * @return bool FALSE if failed reading SQL file or TRUE
     * if the file has been read and queries executed
     * @deprecated since version 2.6.0 - alpha 3
     * @abstract
     */
    abstract public function queryFromFile(string $file): bool;

    /**
     * Get field name.
     *
     * @param resource $result query result
     * @param int      $offset numerical field index
     *
     * @return string
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function getFieldName($result, $offset): string;

    /**
     * Get field type.
     *
     * @param resource $result query result
     * @param int      $offset numerical field index
     *
     * @return string
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function getFieldType($result, $offset): string;

    /**
     * Get number of fields in result.
     *
     * @param resource $result query result
     *
     * @return int
     * @deprecated since version 2.6.0 - alpha 3. Switch to doctrine connector.
     * @abstract
     */
    abstract public function getFieldsNum($result): int;
}
