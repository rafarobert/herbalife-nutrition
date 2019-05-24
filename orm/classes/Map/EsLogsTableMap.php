<?php

namespace Map;

use \EsLogs;
use \EsLogsQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'es_logs' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EsLogsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EsLogsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife_dev';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'es_logs';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\EsLogs';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'EsLogs';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 20;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 20;

    /**
     * the column name for the id_log field
     */
    const COL_ID_LOG = 'es_logs.id_log';

    /**
     * the column name for the heading field
     */
    const COL_HEADING = 'es_logs.heading';

    /**
     * the column name for the message field
     */
    const COL_MESSAGE = 'es_logs.message';

    /**
     * the column name for the action field
     */
    const COL_ACTION = 'es_logs.action';

    /**
     * the column name for the code field
     */
    const COL_CODE = 'es_logs.code';

    /**
     * the column name for the level field
     */
    const COL_LEVEL = 'es_logs.level';

    /**
     * the column name for the file field
     */
    const COL_FILE = 'es_logs.file';

    /**
     * the column name for the line field
     */
    const COL_LINE = 'es_logs.line';

    /**
     * the column name for the trace field
     */
    const COL_TRACE = 'es_logs.trace';

    /**
     * the column name for the previous field
     */
    const COL_PREVIOUS = 'es_logs.previous';

    /**
     * the column name for the xdebug_message field
     */
    const COL_XDEBUG_MESSAGE = 'es_logs.xdebug_message';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'es_logs.type';

    /**
     * the column name for the post field
     */
    const COL_POST = 'es_logs.post';

    /**
     * the column name for the severity field
     */
    const COL_SEVERITY = 'es_logs.severity';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'es_logs.status';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'es_logs.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'es_logs.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'es_logs.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'es_logs.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'es_logs.date_created';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('IdLog', 'Heading', 'Message', 'Action', 'Code', 'Level', 'File', 'Line', 'Trace', 'Previous', 'XdebugMessage', 'Type', 'Post', 'Severity', 'Status', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idLog', 'heading', 'message', 'action', 'code', 'level', 'file', 'line', 'trace', 'previous', 'xdebugMessage', 'type', 'post', 'severity', 'status', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(EsLogsTableMap::COL_ID_LOG, EsLogsTableMap::COL_HEADING, EsLogsTableMap::COL_MESSAGE, EsLogsTableMap::COL_ACTION, EsLogsTableMap::COL_CODE, EsLogsTableMap::COL_LEVEL, EsLogsTableMap::COL_FILE, EsLogsTableMap::COL_LINE, EsLogsTableMap::COL_TRACE, EsLogsTableMap::COL_PREVIOUS, EsLogsTableMap::COL_XDEBUG_MESSAGE, EsLogsTableMap::COL_TYPE, EsLogsTableMap::COL_POST, EsLogsTableMap::COL_SEVERITY, EsLogsTableMap::COL_STATUS, EsLogsTableMap::COL_CHANGE_COUNT, EsLogsTableMap::COL_ID_USER_MODIFIED, EsLogsTableMap::COL_ID_USER_CREATED, EsLogsTableMap::COL_DATE_MODIFIED, EsLogsTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_log', 'heading', 'message', 'action', 'code', 'level', 'file', 'line', 'trace', 'previous', 'xdebug_message', 'type', 'post', 'severity', 'status', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdLog' => 0, 'Heading' => 1, 'Message' => 2, 'Action' => 3, 'Code' => 4, 'Level' => 5, 'File' => 6, 'Line' => 7, 'Trace' => 8, 'Previous' => 9, 'XdebugMessage' => 10, 'Type' => 11, 'Post' => 12, 'Severity' => 13, 'Status' => 14, 'ChangeCount' => 15, 'IdUserModified' => 16, 'IdUserCreated' => 17, 'DateModified' => 18, 'DateCreated' => 19, ),
        self::TYPE_CAMELNAME     => array('idLog' => 0, 'heading' => 1, 'message' => 2, 'action' => 3, 'code' => 4, 'level' => 5, 'file' => 6, 'line' => 7, 'trace' => 8, 'previous' => 9, 'xdebugMessage' => 10, 'type' => 11, 'post' => 12, 'severity' => 13, 'status' => 14, 'changeCount' => 15, 'idUserModified' => 16, 'idUserCreated' => 17, 'dateModified' => 18, 'dateCreated' => 19, ),
        self::TYPE_COLNAME       => array(EsLogsTableMap::COL_ID_LOG => 0, EsLogsTableMap::COL_HEADING => 1, EsLogsTableMap::COL_MESSAGE => 2, EsLogsTableMap::COL_ACTION => 3, EsLogsTableMap::COL_CODE => 4, EsLogsTableMap::COL_LEVEL => 5, EsLogsTableMap::COL_FILE => 6, EsLogsTableMap::COL_LINE => 7, EsLogsTableMap::COL_TRACE => 8, EsLogsTableMap::COL_PREVIOUS => 9, EsLogsTableMap::COL_XDEBUG_MESSAGE => 10, EsLogsTableMap::COL_TYPE => 11, EsLogsTableMap::COL_POST => 12, EsLogsTableMap::COL_SEVERITY => 13, EsLogsTableMap::COL_STATUS => 14, EsLogsTableMap::COL_CHANGE_COUNT => 15, EsLogsTableMap::COL_ID_USER_MODIFIED => 16, EsLogsTableMap::COL_ID_USER_CREATED => 17, EsLogsTableMap::COL_DATE_MODIFIED => 18, EsLogsTableMap::COL_DATE_CREATED => 19, ),
        self::TYPE_FIELDNAME     => array('id_log' => 0, 'heading' => 1, 'message' => 2, 'action' => 3, 'code' => 4, 'level' => 5, 'file' => 6, 'line' => 7, 'trace' => 8, 'previous' => 9, 'xdebug_message' => 10, 'type' => 11, 'post' => 12, 'severity' => 13, 'status' => 14, 'change_count' => 15, 'id_user_modified' => 16, 'id_user_created' => 17, 'date_modified' => 18, 'date_created' => 19, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('es_logs');
        $this->setPhpName('EsLogs');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\EsLogs');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_log', 'IdLog', 'INTEGER', true, null, null);
        $this->addColumn('heading', 'Heading', 'VARCHAR', false, 499, null);
        $this->addColumn('message', 'Message', 'LONGVARCHAR', false, null, null);
        $this->addColumn('action', 'Action', 'VARCHAR', false, 499, null);
        $this->addColumn('code', 'Code', 'VARCHAR', false, 200, null);
        $this->addColumn('level', 'Level', 'INTEGER', false, null, null);
        $this->addColumn('file', 'File', 'VARCHAR', false, 1000, null);
        $this->addColumn('line', 'Line', 'INTEGER', false, null, null);
        $this->addColumn('trace', 'Trace', 'LONGVARCHAR', false, null, null);
        $this->addColumn('previous', 'Previous', 'VARCHAR', false, 499, null);
        $this->addColumn('xdebug_message', 'XdebugMessage', 'LONGVARCHAR', false, null, null);
        $this->addColumn('type', 'Type', 'INTEGER', false, null, null);
        $this->addColumn('post', 'Post', 'VARCHAR', false, 1000, null);
        $this->addColumn('severity', 'Severity', 'VARCHAR', false, 400, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 15, 'ENABLED');
        $this->addColumn('change_count', 'ChangeCount', 'INTEGER', true, null, 0);
        $this->addColumn('id_user_modified', 'IdUserModified', 'INTEGER', true, null, null);
        $this->addColumn('id_user_created', 'IdUserCreated', 'INTEGER', true, null, null);
        $this->addColumn('date_modified', 'DateModified', 'TIMESTAMP', true, null, null);
        $this->addColumn('date_created', 'DateCreated', 'TIMESTAMP', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdLog', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdLog', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdLog', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdLog', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdLog', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdLog', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('IdLog', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? EsLogsTableMap::CLASS_DEFAULT : EsLogsTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (EsLogs object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EsLogsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EsLogsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EsLogsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EsLogsTableMap::OM_CLASS;
            /** @var EsLogs $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EsLogsTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = EsLogsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EsLogsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var EsLogs $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EsLogsTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(EsLogsTableMap::COL_ID_LOG);
            $criteria->addSelectColumn(EsLogsTableMap::COL_HEADING);
            $criteria->addSelectColumn(EsLogsTableMap::COL_MESSAGE);
            $criteria->addSelectColumn(EsLogsTableMap::COL_ACTION);
            $criteria->addSelectColumn(EsLogsTableMap::COL_CODE);
            $criteria->addSelectColumn(EsLogsTableMap::COL_LEVEL);
            $criteria->addSelectColumn(EsLogsTableMap::COL_FILE);
            $criteria->addSelectColumn(EsLogsTableMap::COL_LINE);
            $criteria->addSelectColumn(EsLogsTableMap::COL_TRACE);
            $criteria->addSelectColumn(EsLogsTableMap::COL_PREVIOUS);
            $criteria->addSelectColumn(EsLogsTableMap::COL_XDEBUG_MESSAGE);
            $criteria->addSelectColumn(EsLogsTableMap::COL_TYPE);
            $criteria->addSelectColumn(EsLogsTableMap::COL_POST);
            $criteria->addSelectColumn(EsLogsTableMap::COL_SEVERITY);
            $criteria->addSelectColumn(EsLogsTableMap::COL_STATUS);
            $criteria->addSelectColumn(EsLogsTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(EsLogsTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(EsLogsTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(EsLogsTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(EsLogsTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_log');
            $criteria->addSelectColumn($alias . '.heading');
            $criteria->addSelectColumn($alias . '.message');
            $criteria->addSelectColumn($alias . '.action');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.level');
            $criteria->addSelectColumn($alias . '.file');
            $criteria->addSelectColumn($alias . '.line');
            $criteria->addSelectColumn($alias . '.trace');
            $criteria->addSelectColumn($alias . '.previous');
            $criteria->addSelectColumn($alias . '.xdebug_message');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.post');
            $criteria->addSelectColumn($alias . '.severity');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.change_count');
            $criteria->addSelectColumn($alias . '.id_user_modified');
            $criteria->addSelectColumn($alias . '.id_user_created');
            $criteria->addSelectColumn($alias . '.date_modified');
            $criteria->addSelectColumn($alias . '.date_created');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(EsLogsTableMap::DATABASE_NAME)->getTable(EsLogsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EsLogsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EsLogsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EsLogsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a EsLogs or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or EsLogs object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsLogsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \EsLogs) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EsLogsTableMap::DATABASE_NAME);
            $criteria->add(EsLogsTableMap::COL_ID_LOG, (array) $values, Criteria::IN);
        }

        $query = EsLogsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EsLogsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EsLogsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the es_logs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EsLogsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a EsLogs or Criteria object.
     *
     * @param mixed               $criteria Criteria or EsLogs object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsLogsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from EsLogs object
        }

        if ($criteria->containsKey(EsLogsTableMap::COL_ID_LOG) && $criteria->keyContainsValue(EsLogsTableMap::COL_ID_LOG) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EsLogsTableMap::COL_ID_LOG.')');
        }


        // Set the correct dbName
        $query = EsLogsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EsLogsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EsLogsTableMap::buildTableMap();
