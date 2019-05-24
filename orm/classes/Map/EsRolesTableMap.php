<?php

namespace Map;

use \EsRoles;
use \EsRolesQuery;
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
 * This class defines the structure of the 'es_roles' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EsRolesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EsRolesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife_dev';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'es_roles';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\EsRoles';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'EsRoles';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the id_role field
     */
    const COL_ID_ROLE = 'es_roles.id_role';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'es_roles.name';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'es_roles.description';

    /**
     * the column name for the write field
     */
    const COL_WRITE = 'es_roles.write';

    /**
     * the column name for the read field
     */
    const COL_READ = 'es_roles.read';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'es_roles.status';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'es_roles.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'es_roles.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'es_roles.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'es_roles.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'es_roles.date_created';

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
        self::TYPE_PHPNAME       => array('IdRole', 'Name', 'Description', 'Write', 'Read', 'Status', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idRole', 'name', 'description', 'write', 'read', 'status', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(EsRolesTableMap::COL_ID_ROLE, EsRolesTableMap::COL_NAME, EsRolesTableMap::COL_DESCRIPTION, EsRolesTableMap::COL_WRITE, EsRolesTableMap::COL_READ, EsRolesTableMap::COL_STATUS, EsRolesTableMap::COL_CHANGE_COUNT, EsRolesTableMap::COL_ID_USER_MODIFIED, EsRolesTableMap::COL_ID_USER_CREATED, EsRolesTableMap::COL_DATE_MODIFIED, EsRolesTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_role', 'name', 'description', 'write', 'read', 'status', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdRole' => 0, 'Name' => 1, 'Description' => 2, 'Write' => 3, 'Read' => 4, 'Status' => 5, 'ChangeCount' => 6, 'IdUserModified' => 7, 'IdUserCreated' => 8, 'DateModified' => 9, 'DateCreated' => 10, ),
        self::TYPE_CAMELNAME     => array('idRole' => 0, 'name' => 1, 'description' => 2, 'write' => 3, 'read' => 4, 'status' => 5, 'changeCount' => 6, 'idUserModified' => 7, 'idUserCreated' => 8, 'dateModified' => 9, 'dateCreated' => 10, ),
        self::TYPE_COLNAME       => array(EsRolesTableMap::COL_ID_ROLE => 0, EsRolesTableMap::COL_NAME => 1, EsRolesTableMap::COL_DESCRIPTION => 2, EsRolesTableMap::COL_WRITE => 3, EsRolesTableMap::COL_READ => 4, EsRolesTableMap::COL_STATUS => 5, EsRolesTableMap::COL_CHANGE_COUNT => 6, EsRolesTableMap::COL_ID_USER_MODIFIED => 7, EsRolesTableMap::COL_ID_USER_CREATED => 8, EsRolesTableMap::COL_DATE_MODIFIED => 9, EsRolesTableMap::COL_DATE_CREATED => 10, ),
        self::TYPE_FIELDNAME     => array('id_role' => 0, 'name' => 1, 'description' => 2, 'write' => 3, 'read' => 4, 'status' => 5, 'change_count' => 6, 'id_user_modified' => 7, 'id_user_created' => 8, 'date_modified' => 9, 'date_created' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setName('es_roles');
        $this->setPhpName('EsRoles');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\EsRoles');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_role', 'IdRole', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 256, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 500, null);
        $this->addColumn('write', 'Write', 'VARCHAR', false, 10, null);
        $this->addColumn('read', 'Read', 'VARCHAR', false, 10, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 15, 'ENABLED');
        $this->addColumn('change_count', 'ChangeCount', 'INTEGER', true, null, 0);
        $this->addForeignKey('id_user_modified', 'IdUserModified', 'INTEGER', 'es_users', 'id_user', false, null, null);
        $this->addForeignKey('id_user_created', 'IdUserCreated', 'INTEGER', 'es_users', 'id_user', false, null, null);
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
        $this->addRelation('EsTables', '\\EsTables', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_role',
    1 => ':id_role',
  ),
), null, null, 'EsTabless', false);
        $this->addRelation('EsTablesRoles', '\\EsTablesRoles', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_role',
    1 => ':id_role',
  ),
), null, null, 'EsTablesRoless', false);
        $this->addRelation('EsUsersRelatedByIdRole', '\\EsUsers', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_role',
    1 => ':id_role',
  ),
), null, null, 'EsUserssRelatedByIdRole', false);
        $this->addRelation('EsUsersRoles', '\\EsUsersRoles', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_role',
    1 => ':id_role',
  ),
), null, null, 'EsUsersRoless', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdRole', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdRole', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdRole', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdRole', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdRole', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdRole', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdRole', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EsRolesTableMap::CLASS_DEFAULT : EsRolesTableMap::OM_CLASS;
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
     * @return array           (EsRoles object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EsRolesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EsRolesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EsRolesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EsRolesTableMap::OM_CLASS;
            /** @var EsRoles $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EsRolesTableMap::addInstanceToPool($obj, $key);
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
            $key = EsRolesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EsRolesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var EsRoles $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EsRolesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EsRolesTableMap::COL_ID_ROLE);
            $criteria->addSelectColumn(EsRolesTableMap::COL_NAME);
            $criteria->addSelectColumn(EsRolesTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(EsRolesTableMap::COL_WRITE);
            $criteria->addSelectColumn(EsRolesTableMap::COL_READ);
            $criteria->addSelectColumn(EsRolesTableMap::COL_STATUS);
            $criteria->addSelectColumn(EsRolesTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(EsRolesTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(EsRolesTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(EsRolesTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(EsRolesTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_role');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.write');
            $criteria->addSelectColumn($alias . '.read');
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
        return Propel::getServiceContainer()->getDatabaseMap(EsRolesTableMap::DATABASE_NAME)->getTable(EsRolesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EsRolesTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EsRolesTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EsRolesTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a EsRoles or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or EsRoles object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EsRolesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \EsRoles) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EsRolesTableMap::DATABASE_NAME);
            $criteria->add(EsRolesTableMap::COL_ID_ROLE, (array) $values, Criteria::IN);
        }

        $query = EsRolesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EsRolesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EsRolesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the es_roles table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EsRolesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a EsRoles or Criteria object.
     *
     * @param mixed               $criteria Criteria or EsRoles object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsRolesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from EsRoles object
        }

        if ($criteria->containsKey(EsRolesTableMap::COL_ID_ROLE) && $criteria->keyContainsValue(EsRolesTableMap::COL_ID_ROLE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EsRolesTableMap::COL_ID_ROLE.')');
        }


        // Set the correct dbName
        $query = EsRolesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EsRolesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EsRolesTableMap::buildTableMap();
