<?php
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
 * Database manager for XOOPS
 *
 * PHP version 5.3
 *
 * @category  Xoops\Class\Database\Manager
 * @package   Manager
 * @author    Haruki Setoyama  <haruki@planewave.org>
 * @copyright 2013 XOOPS Project (http://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @version   Release: 2.6
 * @link      http://xoops.org
 * @since     2.6.0
 */

use XoopsBaseConfig;
class XoopsDatabaseManager
{
    /**
     * @var XoopsDatabase
     */
    public $xoopsDatabase;

    /**
     * @var array
     */
    public $successStrings = [];

    /**
     * @var array
     */
    public $failureStrings = [];

    /**
     * @var array
     */
    private $s_tables = [];

    /**
     * @var array
     */
    private $f_tables = [];

    /**
     *Construct declaration
     */
    public function __construct()
    {
        $xoops = Xoops::getInstance();
        $xoops->db();
        global $xoopsDB;
        $this->xoopsDatabase = $xoopsDB;
        $this->xoopsDatabase->setPrefix(XoopsBaseConfig::get('db-prefix'));
        $this->successStrings = [
            'create' => XoopsLocale::SF_TABLE_CREATED,
            'insert' => XoopsLocale::SF_ENTRIES_INSERTED_TO_TABLE,
            'alter' => XoopsLocale::SF_TABLE_UPDATED,
            'drop' => XoopsLocale::SF_TABLE_DROPPED,
        ];
        $this->failureStrings = [
            'create' => XoopsLocale::EF_TABLE_NOT_CREATED,
            'insert' => XoopsLocale::EF_ENTRIES_NOT_INSERTED_TO_TABLE,
            'alter' => XoopsLocale::EF_TABLE_NOT_UPDATED,
            'drop' => XoopsLocale::EF_TABLE_NOT_DROPPED,
        ];
    }

    /**
     * Is the database connectable?
     *
     * @return bool is it connectable?
     */
    public function isConnectable()
    {
        return ($this->xoopsDatabase->connect(false) !== false) ? true : false;
    }

    /**
     * Checks if a database exists
     *
     * @return bool returns if exists
     */
    public function dbExists()
    {
        return ($this->xoopsDatabase->connect() !== false) ? true : false;
    }

    /**
     * creates a database table
     *
     * @return bool return if successful
     */
    public function createDB()
    {
        $this->xoopsDatabase->connect(false);

        $result = $this->xoopsDatabase->query('CREATE DATABASE ' . XoopsBaseConfig::get('db-name'));

        return ($result !== false) ? true : false;
    }

    /**
     * Loads a query from a file
     *
     * @param string $sql_file_path name of file to read
     * @param bool   $force         weither to force the query or not
     *
     * @return bool
     */
    public function queryFromFile($sql_file_path, $force = false)
    {
        if (! XoopsLoad::fileExists($sql_file_path)) {
            return false;
        }
        $queryFunc = (bool) $force ? 'queryF' : 'query';
        $sql_query = trim(fread(fopen($sql_file_path, 'r'), filesize($sql_file_path)));
        SqlUtility::splitMySqlFile($pieces, $sql_query);
        $this->xoopsDatabase->connect();
        foreach ($pieces as $piece) {
            $piece = trim($piece);
            // [0] contains the prefixed query
            // [4] contains unprefixed table name
            $prefixed_query = SqlUtility::prefixQuery($piece, $this->xoopsDatabase->prefix());
            if ($prefixed_query !== false) {
                $table = $this->xoopsDatabase->prefix($prefixed_query[4]);
                if ($prefixed_query[1] === 'CREATE TABLE') {
                    if ($this->xoopsDatabase->{$queryFunc}($prefixed_query[0]) !== false) {
                        if (! isset($this->s_tables['create'][$table])) {
                            $this->s_tables['create'][$table] = 1;
                        }
                    } else {
                        if (! isset($this->f_tables['create'][$table])) {
                            $this->f_tables['create'][$table] = 1;
                        }
                    }
                } else {
                    if ($prefixed_query[1] === 'INSERT INTO') {
                        if ($this->xoopsDatabase->{$queryFunc}($prefixed_query[0]) !== false) {
                            if (! isset($this->s_tables['insert'][$table])) {
                                $this->s_tables['insert'][$table] = 1;
                            } else {
                                $this->s_tables['insert'][$table]++;
                            }
                        } else {
                            if (! isset($this->f_tables['insert'][$table])) {
                                $this->f_tables['insert'][$table] = 1;
                            } else {
                                $this->f_tables['insert'][$table]++;
                            }
                        }
                    } else {
                        if ($prefixed_query[1] === 'ALTER TABLE') {
                            if ($this->xoopsDatabase->{$queryFunc}($prefixed_query[0]) !== false) {
                                if (! isset($this->s_tables['alter'][$table])) {
                                    $this->s_tables['alter'][$table] = 1;
                                }
                            } else {
                                if (! isset($this->s_tables['alter'][$table])) {
                                    $this->f_tables['alter'][$table] = 1;
                                }
                            }
                        } else {
                            if ($prefixed_query[1] === 'DROP TABLE') {
                                if ($this->xoopsDatabase->{$queryFunc}('DROP TABLE ' . $table) !== false) {
                                    if (! isset($this->s_tables['drop'][$table])) {
                                        $this->s_tables['drop'][$table] = 1;
                                    }
                                } else {
                                    if (! isset($this->s_tables['drop'][$table])) {
                                        $this->f_tables['drop'][$table] = 1;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return true;
    }

    /**
     * returns a report
     *
     * @return string
     */
    public function report()
    {
        $commands = ['create', 'insert', 'alter', 'drop'];
        $content = '<ul class="log">';
        foreach ($commands as $cmd) {
            if (! @empty($this->s_tables[$cmd])) {
                foreach ($this->s_tables[$cmd] as $key => $val) {
                    $content .= '<li class="success">';
                    $content .= ($cmd !== 'insert')
                        ? sprintf($this->successStrings[$cmd], $key)
                        : sprintf($this->successStrings[$cmd], $val, $key);
                    $content .= "</li>\n";
                }
            }
        }
        foreach ($commands as $cmd) {
            if (! @empty($this->f_tables[$cmd])) {
                foreach ($this->f_tables[$cmd] as $key => $val) {
                    $content .= '<li class="failure">';
                    $content .= ($cmd !== 'insert')
                        ? sprintf($this->failureStrings[$cmd], $key)
                        : sprintf($this->failureStrings[$cmd], $val, $key);
                    $content .= "</li>\n";
                }
            }
        }
        $content .= '</ul>';
        return $content;
    }

    /**
     * runs a query
     *
     * @param string $sql sql statement to perform
     *
     * @return resource
     */
    public function query($sql)
    {
        $this->xoopsDatabase->connect();
        return $this->xoopsDatabase->query($sql);
    }

    /**
     * Setup prefix table
     *
     * @param string $table table to prefix
     *
     * @return string prefixed table
     */
    public function prefix($table)
    {
        $this->xoopsDatabase->connect();
        return $this->xoopsDatabase->prefix($table);
    }

    /**
     * fetches an array
     *
     * @param string $ret resource that was returned from query
     *
     * @return array returns the array
     */
    public function fetchArray($ret)
    {
        $this->xoopsDatabase->connect();
        return $this->xoopsDatabase->fetchArray($ret);
    }

    /**
     * Inserts into a table
     *
     * @param string $table table to insert into
     * @param string $query query to use to insert
     *
     * @return bool|void
     */
    public function insert($table, $query)
    {
        $this->xoopsDatabase->connect();
        $table = $this->xoopsDatabase->prefix($table);
        $query = 'INSERT INTO ' . $table . ' ' . $query;
        if (! $this->xoopsDatabase->queryF($query)) {
            if (! isset($this->f_tables['insert'][$table])) {
                $this->f_tables['insert'][$table] = 1;
            } else {
                $this->f_tables['insert'][$table]++;
            }
            return false;
        }
            if (! isset($this->s_tables['insert'][$table])) {
                $this->s_tables['insert'][$table] = 1;
            } else {
                $this->s_tables['insert'][$table]++;
            }
            return $this->xoopsDatabase->getInsertId();

    }

    /**
     * return the error
     *
     * @return bool
     */
    public function isError()
    {
        return (isset($this->f_tables)) ? true : false;
    }

    /**
     * Deletes tables
     *
     * No callers found in core. foreach loop is suspect, using key and value for
     * a list of tables? No docs or examples about what it is supposed to do.
     *
     * @param array $tables table to delete
     *
     * @return array list of dropped tables
     */
    public function deleteTables($tables)
    {
        $deleted = [];
        $this->xoopsDatabase->connect();
        foreach ($tables as $key => $val) {
            //was: if (!$this->db->query("DROP TABLE " . $this->db->prefix($key))) {
            if (! $this->xoopsDatabase->query('DROP TABLE ' . $this->xoopsDatabase->prefix($val))) {
                $deleted[] = $val;
            }
        }
        return $deleted;
    }

    /**
     * Checks to see if table exists
     *
     * @param string $table name of database table looking for
     *
     * @return bool true if exists or false if doesnt
     */
    public function tableExists($table)
    {
        $table = trim($table);
        $ret = false;
        if ($table !== '') {
            $this->xoopsDatabase->connect();
            $sql = 'SELECT COUNT(*) FROM ' . $this->xoopsDatabase->prefix($table);
            $ret = ($this->xoopsDatabase->query($sql) !== false) ? true : false;
        }
        return $ret;
    }

    /**
     * This method allows to copy fields from one table to another
     *
     * @param array  $fieldsMap  Map of the fields
     *                           ex: array('oldfieldname' => 'newfieldname');
     * @param string $oTableName Old Table
     * @param string $nTableName New Table
     * @param bool   $dropTable  Drop old Table
     *
     * @return $this does not return anything
     */
    public function copyFields($fieldsMap, $oTableName, $nTableName, $dropTable = false) {
        $sql = 'SHOW COLUMNS FROM ' . $this->xoopsDatabase->prefix($oTableName);
        $result = $this->xoopsDatabase->queryF($sql);
        if (($rows = $this->xoopsDatabase->getRowsNum($result)) === count($fieldsMap)) {
            $sql = 'SELECT * FROM ' . $this->xoopsDatabase->prefix($oTableName);
            $result = $this->xoopsDatabase->queryF($sql);
            while (($myrow = $this->xoopsDatabase->fetchArray($result)) !== false) {
                ksort($fieldsMap);
                ksort($myrow);
                $sql = 'INSERT INTO `' . $this->xoopsDatabase->prefix($nTableName)
                    . '` ' . '(`' . implode('`,`', $fieldsMap) . '`)' .
                    " VALUES ('" . implode("','", $myrow) . "')";

                $this->xoopsDatabase->queryF($sql);
            }
            if ($dropTable) {
                $sql = 'DROP TABLE ' . $this->xoopsDatabase->prefix($oTableName);
                $this->xoopsDatabase->queryF($sql);
            }
        }
    }
}
