<?php

namespace Map;

use \EsDomains;
use \EsDomainsQuery;
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
 * This class defines the structure of the 'es_domains' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EsDomainsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EsDomainsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife_dev';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'es_domains';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\EsDomains';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'EsDomains';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the id_domain field
     */
    const COL_ID_DOMAIN = 'es_domains.id_domain';

    /**
     * the column name for the host field
     */
    const COL_HOST = 'es_domains.host';

    /**
     * the column name for the hostname field
     */
    const COL_HOSTNAME = 'es_domains.hostname';

    /**
     * the column name for the protocol field
     */
    const COL_PROTOCOL = 'es_domains.protocol';

    /**
     * the column name for the port field
     */
    const COL_PORT = 'es_domains.port';

    /**
     * the column name for the origin field
     */
    const COL_ORIGIN = 'es_domains.origin';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'es_domains.estado';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'es_domains.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'es_domains.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'es_domains.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'es_domains.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'es_domains.date_created';

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
        self::TYPE_PHPNAME       => array('IdDomain', 'Host', 'Hostname', 'Protocol', 'Port', 'Origin', 'Estado', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idDomain', 'host', 'hostname', 'protocol', 'port', 'origin', 'estado', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(EsDomainsTableMap::COL_ID_DOMAIN, EsDomainsTableMap::COL_HOST, EsDomainsTableMap::COL_HOSTNAME, EsDomainsTableMap::COL_PROTOCOL, EsDomainsTableMap::COL_PORT, EsDomainsTableMap::COL_ORIGIN, EsDomainsTableMap::COL_ESTADO, EsDomainsTableMap::COL_CHANGE_COUNT, EsDomainsTableMap::COL_ID_USER_MODIFIED, EsDomainsTableMap::COL_ID_USER_CREATED, EsDomainsTableMap::COL_DATE_MODIFIED, EsDomainsTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_domain', 'host', 'hostname', 'protocol', 'port', 'origin', 'estado', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdDomain' => 0, 'Host' => 1, 'Hostname' => 2, 'Protocol' => 3, 'Port' => 4, 'Origin' => 5, 'Estado' => 6, 'ChangeCount' => 7, 'IdUserModified' => 8, 'IdUserCreated' => 9, 'DateModified' => 10, 'DateCreated' => 11, ),
        self::TYPE_CAMELNAME     => array('idDomain' => 0, 'host' => 1, 'hostname' => 2, 'protocol' => 3, 'port' => 4, 'origin' => 5, 'estado' => 6, 'changeCount' => 7, 'idUserModified' => 8, 'idUserCreated' => 9, 'dateModified' => 10, 'dateCreated' => 11, ),
        self::TYPE_COLNAME       => array(EsDomainsTableMap::COL_ID_DOMAIN => 0, EsDomainsTableMap::COL_HOST => 1, EsDomainsTableMap::COL_HOSTNAME => 2, EsDomainsTableMap::COL_PROTOCOL => 3, EsDomainsTableMap::COL_PORT => 4, EsDomainsTableMap::COL_ORIGIN => 5, EsDomainsTableMap::COL_ESTADO => 6, EsDomainsTableMap::COL_CHANGE_COUNT => 7, EsDomainsTableMap::COL_ID_USER_MODIFIED => 8, EsDomainsTableMap::COL_ID_USER_CREATED => 9, EsDomainsTableMap::COL_DATE_MODIFIED => 10, EsDomainsTableMap::COL_DATE_CREATED => 11, ),
        self::TYPE_FIELDNAME     => array('id_domain' => 0, 'host' => 1, 'hostname' => 2, 'protocol' => 3, 'port' => 4, 'origin' => 5, 'estado' => 6, 'change_count' => 7, 'id_user_modified' => 8, 'id_user_created' => 9, 'date_modified' => 10, 'date_created' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('es_domains');
        $this->setPhpName('EsDomains');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\EsDomains');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_domain', 'IdDomain', 'INTEGER', true, null, null);
        $this->addColumn('host', 'Host', 'VARCHAR', false, 450, null);
        $this->addColumn('hostname', 'Hostname', 'VARCHAR', false, 450, null);
        $this->addColumn('protocol', 'Protocol', 'VARCHAR', false, 10, null);
        $this->addColumn('port', 'Port', 'INTEGER', false, null, null);
        $this->addColumn('origin', 'Origin', 'VARCHAR', false, 450, null);
        $this->addColumn('estado', 'Estado', 'VARCHAR', true, 15, 'ENABLED');
        $this->addColumn('change_count', 'ChangeCount', 'INTEGER', true, null, 0);
        $this->addForeignKey('id_user_modified', 'IdUserModified', 'INTEGER', 'es_users', 'id_user', true, null, null);
        $this->addForeignKey('id_user_created', 'IdUserCreated', 'INTEGER', 'es_users', 'id_user', true, null, null);
        $this->addColumn('date_modified', 'DateModified', 'TIMESTAMP', true, null, null);
        $this->addColumn('date_created', 'DateCreated', 'TIMESTAMP', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('EsUsersRelatedByIdUserCreated', '\\EsUsers', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_user',
  ),
), null, null, null, false);
        $this->addRelation('EsUsersRelatedByIdUserModified', '\\EsUsers', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_user_modified',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDomain', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDomain', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDomain', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDomain', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDomain', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDomain', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdDomain', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EsDomainsTableMap::CLASS_DEFAULT : EsDomainsTableMap::OM_CLASS;
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
     * @return array           (EsDomains object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EsDomainsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EsDomainsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EsDomainsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EsDomainsTableMap::OM_CLASS;
            /** @var EsDomains $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EsDomainsTableMap::addInstanceToPool($obj, $key);
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
            $key = EsDomainsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EsDomainsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var EsDomains $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EsDomainsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EsDomainsTableMap::COL_ID_DOMAIN);
            $criteria->addSelectColumn(EsDomainsTableMap::COL_HOST);
            $criteria->addSelectColumn(EsDomainsTableMap::COL_HOSTNAME);
            $criteria->addSelectColumn(EsDomainsTableMap::COL_PROTOCOL);
            $criteria->addSelectColumn(EsDomainsTableMap::COL_PORT);
            $criteria->addSelectColumn(EsDomainsTableMap::COL_ORIGIN);
            $criteria->addSelectColumn(EsDomainsTableMap::COL_ESTADO);
            $criteria->addSelectColumn(EsDomainsTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(EsDomainsTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(EsDomainsTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(EsDomainsTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(EsDomainsTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_domain');
            $criteria->addSelectColumn($alias . '.host');
            $criteria->addSelectColumn($alias . '.hostname');
            $criteria->addSelectColumn($alias . '.protocol');
            $criteria->addSelectColumn($alias . '.port');
            $criteria->addSelectColumn($alias . '.origin');
            $criteria->addSelectColumn($alias . '.estado');
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
        return Propel::getServiceContainer()->getDatabaseMap(EsDomainsTableMap::DATABASE_NAME)->getTable(EsDomainsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EsDomainsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EsDomainsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EsDomainsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a EsDomains or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or EsDomains object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EsDomainsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \EsDomains) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EsDomainsTableMap::DATABASE_NAME);
            $criteria->add(EsDomainsTableMap::COL_ID_DOMAIN, (array) $values, Criteria::IN);
        }

        $query = EsDomainsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EsDomainsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EsDomainsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the es_domains table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EsDomainsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a EsDomains or Criteria object.
     *
     * @param mixed               $criteria Criteria or EsDomains object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsDomainsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from EsDomains object
        }

        if ($criteria->containsKey(EsDomainsTableMap::COL_ID_DOMAIN) && $criteria->keyContainsValue(EsDomainsTableMap::COL_ID_DOMAIN) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EsDomainsTableMap::COL_ID_DOMAIN.')');
        }


        // Set the correct dbName
        $query = EsDomainsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EsDomainsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EsDomainsTableMap::buildTableMap();
