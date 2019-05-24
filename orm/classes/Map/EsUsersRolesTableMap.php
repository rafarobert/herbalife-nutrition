<?php

namespace Map;

use \EsUsersRoles;
use \EsUsersRolesQuery;
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
 * This class defines the structure of the 'es_users_roles' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EsUsersRolesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EsUsersRolesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife_dev';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'es_users_roles';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\EsUsersRoles';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'EsUsersRoles';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id_user_role field
     */
    const COL_ID_USER_ROLE = 'es_users_roles.id_user_role';

    /**
     * the column name for the id_user field
     */
    const COL_ID_USER = 'es_users_roles.id_user';

    /**
     * the column name for the id_role field
     */
    const COL_ID_ROLE = 'es_users_roles.id_role';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'es_users_roles.estado';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'es_users_roles.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'es_users_roles.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'es_users_roles.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'es_users_roles.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'es_users_roles.date_created';

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
        self::TYPE_PHPNAME       => array('IdUserRole', 'IdUser', 'IdRole', 'Estado', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idUserRole', 'idUser', 'idRole', 'estado', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(EsUsersRolesTableMap::COL_ID_USER_ROLE, EsUsersRolesTableMap::COL_ID_USER, EsUsersRolesTableMap::COL_ID_ROLE, EsUsersRolesTableMap::COL_ESTADO, EsUsersRolesTableMap::COL_CHANGE_COUNT, EsUsersRolesTableMap::COL_ID_USER_MODIFIED, EsUsersRolesTableMap::COL_ID_USER_CREATED, EsUsersRolesTableMap::COL_DATE_MODIFIED, EsUsersRolesTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_user_role', 'id_user', 'id_role', 'estado', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdUserRole' => 0, 'IdUser' => 1, 'IdRole' => 2, 'Estado' => 3, 'ChangeCount' => 4, 'IdUserModified' => 5, 'IdUserCreated' => 6, 'DateModified' => 7, 'DateCreated' => 8, ),
        self::TYPE_CAMELNAME     => array('idUserRole' => 0, 'idUser' => 1, 'idRole' => 2, 'estado' => 3, 'changeCount' => 4, 'idUserModified' => 5, 'idUserCreated' => 6, 'dateModified' => 7, 'dateCreated' => 8, ),
        self::TYPE_COLNAME       => array(EsUsersRolesTableMap::COL_ID_USER_ROLE => 0, EsUsersRolesTableMap::COL_ID_USER => 1, EsUsersRolesTableMap::COL_ID_ROLE => 2, EsUsersRolesTableMap::COL_ESTADO => 3, EsUsersRolesTableMap::COL_CHANGE_COUNT => 4, EsUsersRolesTableMap::COL_ID_USER_MODIFIED => 5, EsUsersRolesTableMap::COL_ID_USER_CREATED => 6, EsUsersRolesTableMap::COL_DATE_MODIFIED => 7, EsUsersRolesTableMap::COL_DATE_CREATED => 8, ),
        self::TYPE_FIELDNAME     => array('id_user_role' => 0, 'id_user' => 1, 'id_role' => 2, 'estado' => 3, 'change_count' => 4, 'id_user_modified' => 5, 'id_user_created' => 6, 'date_modified' => 7, 'date_created' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('es_users_roles');
        $this->setPhpName('EsUsersRoles');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\EsUsersRoles');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_user_role', 'IdUserRole', 'INTEGER', true, null, null);
        $this->addForeignKey('id_user', 'IdUser', 'INTEGER', 'es_users', 'id_user', false, 10, null);
        $this->addForeignKey('id_role', 'IdRole', 'INTEGER', 'es_roles', 'id_role', false, 10, null);
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
        $this->addRelation('EsUsersRelatedByIdUser', '\\EsUsers', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_user',
    1 => ':id_user',
  ),
), null, null, null, false);
        $this->addRelation('EsRoles', '\\EsRoles', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_role',
    1 => ':id_role',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUserRole', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUserRole', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUserRole', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUserRole', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUserRole', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUserRole', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdUserRole', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EsUsersRolesTableMap::CLASS_DEFAULT : EsUsersRolesTableMap::OM_CLASS;
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
     * @return array           (EsUsersRoles object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EsUsersRolesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EsUsersRolesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EsUsersRolesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EsUsersRolesTableMap::OM_CLASS;
            /** @var EsUsersRoles $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EsUsersRolesTableMap::addInstanceToPool($obj, $key);
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
            $key = EsUsersRolesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EsUsersRolesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var EsUsersRoles $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EsUsersRolesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EsUsersRolesTableMap::COL_ID_USER_ROLE);
            $criteria->addSelectColumn(EsUsersRolesTableMap::COL_ID_USER);
            $criteria->addSelectColumn(EsUsersRolesTableMap::COL_ID_ROLE);
            $criteria->addSelectColumn(EsUsersRolesTableMap::COL_ESTADO);
            $criteria->addSelectColumn(EsUsersRolesTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(EsUsersRolesTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(EsUsersRolesTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(EsUsersRolesTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(EsUsersRolesTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_user_role');
            $criteria->addSelectColumn($alias . '.id_user');
            $criteria->addSelectColumn($alias . '.id_role');
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
        return Propel::getServiceContainer()->getDatabaseMap(EsUsersRolesTableMap::DATABASE_NAME)->getTable(EsUsersRolesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EsUsersRolesTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EsUsersRolesTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EsUsersRolesTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a EsUsersRoles or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or EsUsersRoles object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EsUsersRolesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \EsUsersRoles) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EsUsersRolesTableMap::DATABASE_NAME);
            $criteria->add(EsUsersRolesTableMap::COL_ID_USER_ROLE, (array) $values, Criteria::IN);
        }

        $query = EsUsersRolesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EsUsersRolesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EsUsersRolesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the es_users_roles table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EsUsersRolesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a EsUsersRoles or Criteria object.
     *
     * @param mixed               $criteria Criteria or EsUsersRoles object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsUsersRolesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from EsUsersRoles object
        }

        if ($criteria->containsKey(EsUsersRolesTableMap::COL_ID_USER_ROLE) && $criteria->keyContainsValue(EsUsersRolesTableMap::COL_ID_USER_ROLE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EsUsersRolesTableMap::COL_ID_USER_ROLE.')');
        }


        // Set the correct dbName
        $query = EsUsersRolesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EsUsersRolesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EsUsersRolesTableMap::buildTableMap();
