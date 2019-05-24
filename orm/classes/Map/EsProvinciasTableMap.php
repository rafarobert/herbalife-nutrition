<?php

namespace Map;

use \EsProvincias;
use \EsProvinciasQuery;
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
 * This class defines the structure of the 'es_provincias' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EsProvinciasTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EsProvinciasTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife_dev';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'es_provincias';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\EsProvincias';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'EsProvincias';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 13;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 13;

    /**
     * the column name for the id_provincia field
     */
    const COL_ID_PROVINCIA = 'es_provincias.id_provincia';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'es_provincias.name';

    /**
     * the column name for the area field
     */
    const COL_AREA = 'es_provincias.area';

    /**
     * the column name for the lat field
     */
    const COL_LAT = 'es_provincias.lat';

    /**
     * the column name for the lng field
     */
    const COL_LNG = 'es_provincias.lng';

    /**
     * the column name for the id_municipio field
     */
    const COL_ID_MUNICIPIO = 'es_provincias.id_municipio';

    /**
     * the column name for the id_ciudad field
     */
    const COL_ID_CIUDAD = 'es_provincias.id_ciudad';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'es_provincias.status';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'es_provincias.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'es_provincias.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'es_provincias.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'es_provincias.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'es_provincias.date_created';

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
        self::TYPE_PHPNAME       => array('IdProvincia', 'Name', 'Area', 'Lat', 'Lng', 'IdMunicipio', 'IdCiudad', 'Status', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idProvincia', 'name', 'area', 'lat', 'lng', 'idMunicipio', 'idCiudad', 'status', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(EsProvinciasTableMap::COL_ID_PROVINCIA, EsProvinciasTableMap::COL_NAME, EsProvinciasTableMap::COL_AREA, EsProvinciasTableMap::COL_LAT, EsProvinciasTableMap::COL_LNG, EsProvinciasTableMap::COL_ID_MUNICIPIO, EsProvinciasTableMap::COL_ID_CIUDAD, EsProvinciasTableMap::COL_STATUS, EsProvinciasTableMap::COL_CHANGE_COUNT, EsProvinciasTableMap::COL_ID_USER_MODIFIED, EsProvinciasTableMap::COL_ID_USER_CREATED, EsProvinciasTableMap::COL_DATE_MODIFIED, EsProvinciasTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_provincia', 'name', 'area', 'lat', 'lng', 'id_municipio', 'id_ciudad', 'status', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdProvincia' => 0, 'Name' => 1, 'Area' => 2, 'Lat' => 3, 'Lng' => 4, 'IdMunicipio' => 5, 'IdCiudad' => 6, 'Status' => 7, 'ChangeCount' => 8, 'IdUserModified' => 9, 'IdUserCreated' => 10, 'DateModified' => 11, 'DateCreated' => 12, ),
        self::TYPE_CAMELNAME     => array('idProvincia' => 0, 'name' => 1, 'area' => 2, 'lat' => 3, 'lng' => 4, 'idMunicipio' => 5, 'idCiudad' => 6, 'status' => 7, 'changeCount' => 8, 'idUserModified' => 9, 'idUserCreated' => 10, 'dateModified' => 11, 'dateCreated' => 12, ),
        self::TYPE_COLNAME       => array(EsProvinciasTableMap::COL_ID_PROVINCIA => 0, EsProvinciasTableMap::COL_NAME => 1, EsProvinciasTableMap::COL_AREA => 2, EsProvinciasTableMap::COL_LAT => 3, EsProvinciasTableMap::COL_LNG => 4, EsProvinciasTableMap::COL_ID_MUNICIPIO => 5, EsProvinciasTableMap::COL_ID_CIUDAD => 6, EsProvinciasTableMap::COL_STATUS => 7, EsProvinciasTableMap::COL_CHANGE_COUNT => 8, EsProvinciasTableMap::COL_ID_USER_MODIFIED => 9, EsProvinciasTableMap::COL_ID_USER_CREATED => 10, EsProvinciasTableMap::COL_DATE_MODIFIED => 11, EsProvinciasTableMap::COL_DATE_CREATED => 12, ),
        self::TYPE_FIELDNAME     => array('id_provincia' => 0, 'name' => 1, 'area' => 2, 'lat' => 3, 'lng' => 4, 'id_municipio' => 5, 'id_ciudad' => 6, 'status' => 7, 'change_count' => 8, 'id_user_modified' => 9, 'id_user_created' => 10, 'date_modified' => 11, 'date_created' => 12, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $this->setName('es_provincias');
        $this->setPhpName('EsProvincias');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\EsProvincias');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_provincia', 'IdProvincia', 'INTEGER', true, 10, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 300, null);
        $this->addColumn('area', 'Area', 'VARCHAR', false, 900, null);
        $this->addColumn('lat', 'Lat', 'INTEGER', false, null, null);
        $this->addColumn('lng', 'Lng', 'INTEGER', false, null, null);
        $this->addForeignKey('id_municipio', 'IdMunicipio', 'INTEGER', 'es_provincias', 'id_provincia', false, null, null);
        $this->addForeignKey('id_ciudad', 'IdCiudad', 'INTEGER', 'es_cities', 'id_city', false, 10, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 15, 'ENABLED');
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
        $this->addRelation('EsCities', '\\EsCities', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_ciudad',
    1 => ':id_city',
  ),
), null, null, null, false);
        $this->addRelation('EsProvinciasRelatedByIdMunicipio', '\\EsProvincias', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_municipio',
    1 => ':id_provincia',
  ),
), null, null, null, false);
        $this->addRelation('EsProvinciasRelatedByIdProvincia', '\\EsProvincias', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_municipio',
    1 => ':id_provincia',
  ),
), null, null, 'EsProvinciassRelatedByIdProvincia', false);
        $this->addRelation('EsUsersRelatedByIdProvincia', '\\EsUsers', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_provincia',
    1 => ':id_provincia',
  ),
), null, null, 'EsUserssRelatedByIdProvincia', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProvincia', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProvincia', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProvincia', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProvincia', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProvincia', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProvincia', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdProvincia', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EsProvinciasTableMap::CLASS_DEFAULT : EsProvinciasTableMap::OM_CLASS;
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
     * @return array           (EsProvincias object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EsProvinciasTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EsProvinciasTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EsProvinciasTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EsProvinciasTableMap::OM_CLASS;
            /** @var EsProvincias $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EsProvinciasTableMap::addInstanceToPool($obj, $key);
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
            $key = EsProvinciasTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EsProvinciasTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var EsProvincias $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EsProvinciasTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EsProvinciasTableMap::COL_ID_PROVINCIA);
            $criteria->addSelectColumn(EsProvinciasTableMap::COL_NAME);
            $criteria->addSelectColumn(EsProvinciasTableMap::COL_AREA);
            $criteria->addSelectColumn(EsProvinciasTableMap::COL_LAT);
            $criteria->addSelectColumn(EsProvinciasTableMap::COL_LNG);
            $criteria->addSelectColumn(EsProvinciasTableMap::COL_ID_MUNICIPIO);
            $criteria->addSelectColumn(EsProvinciasTableMap::COL_ID_CIUDAD);
            $criteria->addSelectColumn(EsProvinciasTableMap::COL_STATUS);
            $criteria->addSelectColumn(EsProvinciasTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(EsProvinciasTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(EsProvinciasTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(EsProvinciasTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(EsProvinciasTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_provincia');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.area');
            $criteria->addSelectColumn($alias . '.lat');
            $criteria->addSelectColumn($alias . '.lng');
            $criteria->addSelectColumn($alias . '.id_municipio');
            $criteria->addSelectColumn($alias . '.id_ciudad');
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
        return Propel::getServiceContainer()->getDatabaseMap(EsProvinciasTableMap::DATABASE_NAME)->getTable(EsProvinciasTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EsProvinciasTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EsProvinciasTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EsProvinciasTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a EsProvincias or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or EsProvincias object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EsProvinciasTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \EsProvincias) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EsProvinciasTableMap::DATABASE_NAME);
            $criteria->add(EsProvinciasTableMap::COL_ID_PROVINCIA, (array) $values, Criteria::IN);
        }

        $query = EsProvinciasQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EsProvinciasTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EsProvinciasTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the es_provincias table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EsProvinciasQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a EsProvincias or Criteria object.
     *
     * @param mixed               $criteria Criteria or EsProvincias object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsProvinciasTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from EsProvincias object
        }

        if ($criteria->containsKey(EsProvinciasTableMap::COL_ID_PROVINCIA) && $criteria->keyContainsValue(EsProvinciasTableMap::COL_ID_PROVINCIA) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EsProvinciasTableMap::COL_ID_PROVINCIA.')');
        }


        // Set the correct dbName
        $query = EsProvinciasQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EsProvinciasTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EsProvinciasTableMap::buildTableMap();
