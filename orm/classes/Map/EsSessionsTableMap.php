<?php

namespace Map;

use \EsSessions;
use \EsSessionsQuery;
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
 * This class defines the structure of the 'es_sessions' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EsSessionsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EsSessionsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife_dev';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'es_sessions';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\EsSessions';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'EsSessions';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the id field
     */
    const COL_ID = 'es_sessions.id';

    /**
     * the column name for the ip_address field
     */
    const COL_IP_ADDRESS = 'es_sessions.ip_address';

    /**
     * the column name for the timestamp field
     */
    const COL_TIMESTAMP = 'es_sessions.timestamp';

    /**
     * the column name for the data field
     */
    const COL_DATA = 'es_sessions.data';

    /**
     * the column name for the last_activity field
     */
    const COL_LAST_ACTIVITY = 'es_sessions.last_activity';

    /**
     * the column name for the id_user field
     */
    const COL_ID_USER = 'es_sessions.id_user';

    /**
     * the column name for the lng field
     */
    const COL_LNG = 'es_sessions.lng';

    /**
     * the column name for the lat field
     */
    const COL_LAT = 'es_sessions.lat';

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
        self::TYPE_PHPNAME       => array('Id', 'IpAddress', 'Timestamp', 'Data', 'LastActivity', 'IdUser', 'Lng', 'Lat', ),
        self::TYPE_CAMELNAME     => array('id', 'ipAddress', 'timestamp', 'data', 'lastActivity', 'idUser', 'lng', 'lat', ),
        self::TYPE_COLNAME       => array(EsSessionsTableMap::COL_ID, EsSessionsTableMap::COL_IP_ADDRESS, EsSessionsTableMap::COL_TIMESTAMP, EsSessionsTableMap::COL_DATA, EsSessionsTableMap::COL_LAST_ACTIVITY, EsSessionsTableMap::COL_ID_USER, EsSessionsTableMap::COL_LNG, EsSessionsTableMap::COL_LAT, ),
        self::TYPE_FIELDNAME     => array('id', 'ip_address', 'timestamp', 'data', 'last_activity', 'id_user', 'lng', 'lat', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'IpAddress' => 1, 'Timestamp' => 2, 'Data' => 3, 'LastActivity' => 4, 'IdUser' => 5, 'Lng' => 6, 'Lat' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'ipAddress' => 1, 'timestamp' => 2, 'data' => 3, 'lastActivity' => 4, 'idUser' => 5, 'lng' => 6, 'lat' => 7, ),
        self::TYPE_COLNAME       => array(EsSessionsTableMap::COL_ID => 0, EsSessionsTableMap::COL_IP_ADDRESS => 1, EsSessionsTableMap::COL_TIMESTAMP => 2, EsSessionsTableMap::COL_DATA => 3, EsSessionsTableMap::COL_LAST_ACTIVITY => 4, EsSessionsTableMap::COL_ID_USER => 5, EsSessionsTableMap::COL_LNG => 6, EsSessionsTableMap::COL_LAT => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'ip_address' => 1, 'timestamp' => 2, 'data' => 3, 'last_activity' => 4, 'id_user' => 5, 'lng' => 6, 'lat' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('es_sessions');
        $this->setPhpName('EsSessions');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\EsSessions');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'VARCHAR', true, 128, null);
        $this->addColumn('ip_address', 'IpAddress', 'VARCHAR', true, 45, null);
        $this->addColumn('timestamp', 'Timestamp', 'INTEGER', true, 10, 0);
        $this->addColumn('data', 'Data', 'BLOB', true, null, null);
        $this->addColumn('last_activity', 'LastActivity', 'TIMESTAMP', false, null, '0000-00-00 00:00:00');
        $this->addForeignKey('id_user', 'IdUser', 'INTEGER', 'es_users', 'id_user', false, null, null);
        $this->addColumn('lng', 'Lng', 'INTEGER', false, null, null);
        $this->addColumn('lat', 'Lat', 'INTEGER', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('EsUsers', '\\EsUsers', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_user',
    1 => ':id_user',
  ),
), null, null, null, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EsSessionsTableMap::CLASS_DEFAULT : EsSessionsTableMap::OM_CLASS;
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
     * @return array           (EsSessions object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EsSessionsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EsSessionsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EsSessionsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EsSessionsTableMap::OM_CLASS;
            /** @var EsSessions $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EsSessionsTableMap::addInstanceToPool($obj, $key);
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
            $key = EsSessionsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EsSessionsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var EsSessions $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EsSessionsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EsSessionsTableMap::COL_ID);
            $criteria->addSelectColumn(EsSessionsTableMap::COL_IP_ADDRESS);
            $criteria->addSelectColumn(EsSessionsTableMap::COL_TIMESTAMP);
            $criteria->addSelectColumn(EsSessionsTableMap::COL_DATA);
            $criteria->addSelectColumn(EsSessionsTableMap::COL_LAST_ACTIVITY);
            $criteria->addSelectColumn(EsSessionsTableMap::COL_ID_USER);
            $criteria->addSelectColumn(EsSessionsTableMap::COL_LNG);
            $criteria->addSelectColumn(EsSessionsTableMap::COL_LAT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.ip_address');
            $criteria->addSelectColumn($alias . '.timestamp');
            $criteria->addSelectColumn($alias . '.data');
            $criteria->addSelectColumn($alias . '.last_activity');
            $criteria->addSelectColumn($alias . '.id_user');
            $criteria->addSelectColumn($alias . '.lng');
            $criteria->addSelectColumn($alias . '.lat');
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
        return Propel::getServiceContainer()->getDatabaseMap(EsSessionsTableMap::DATABASE_NAME)->getTable(EsSessionsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EsSessionsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EsSessionsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EsSessionsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a EsSessions or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or EsSessions object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EsSessionsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \EsSessions) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EsSessionsTableMap::DATABASE_NAME);
            $criteria->add(EsSessionsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = EsSessionsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EsSessionsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EsSessionsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the es_sessions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EsSessionsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a EsSessions or Criteria object.
     *
     * @param mixed               $criteria Criteria or EsSessions object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsSessionsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from EsSessions object
        }


        // Set the correct dbName
        $query = EsSessionsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EsSessionsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EsSessionsTableMap::buildTableMap();
