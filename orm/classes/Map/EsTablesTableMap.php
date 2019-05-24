<?php

namespace Map;

use \EsTables;
use \EsTablesQuery;
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
 * This class defines the structure of the 'es_tables' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EsTablesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EsTablesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife_dev';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'es_tables';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\EsTables';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'EsTables';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 17;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 17;

    /**
     * the column name for the id_table field
     */
    const COL_ID_TABLE = 'es_tables.id_table';

    /**
     * the column name for the id_module field
     */
    const COL_ID_MODULE = 'es_tables.id_module';

    /**
     * the column name for the id_role field
     */
    const COL_ID_ROLE = 'es_tables.id_role';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'es_tables.title';

    /**
     * the column name for the table_name field
     */
    const COL_TABLE_NAME = 'es_tables.table_name';

    /**
     * the column name for the listed field
     */
    const COL_LISTED = 'es_tables.listed';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'es_tables.description';

    /**
     * the column name for the icon field
     */
    const COL_ICON = 'es_tables.icon';

    /**
     * the column name for the url field
     */
    const COL_URL = 'es_tables.url';

    /**
     * the column name for the url_edit field
     */
    const COL_URL_EDIT = 'es_tables.url_edit';

    /**
     * the column name for the url_index field
     */
    const COL_URL_INDEX = 'es_tables.url_index';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'es_tables.status';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'es_tables.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'es_tables.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'es_tables.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'es_tables.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'es_tables.date_created';

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
        self::TYPE_PHPNAME       => array('IdTable', 'IdModule', 'IdRole', 'Title', 'TableName', 'Listed', 'Description', 'Icon', 'Url', 'UrlEdit', 'UrlIndex', 'Status', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idTable', 'idModule', 'idRole', 'title', 'tableName', 'listed', 'description', 'icon', 'url', 'urlEdit', 'urlIndex', 'status', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(EsTablesTableMap::COL_ID_TABLE, EsTablesTableMap::COL_ID_MODULE, EsTablesTableMap::COL_ID_ROLE, EsTablesTableMap::COL_TITLE, EsTablesTableMap::COL_TABLE_NAME, EsTablesTableMap::COL_LISTED, EsTablesTableMap::COL_DESCRIPTION, EsTablesTableMap::COL_ICON, EsTablesTableMap::COL_URL, EsTablesTableMap::COL_URL_EDIT, EsTablesTableMap::COL_URL_INDEX, EsTablesTableMap::COL_STATUS, EsTablesTableMap::COL_CHANGE_COUNT, EsTablesTableMap::COL_ID_USER_MODIFIED, EsTablesTableMap::COL_ID_USER_CREATED, EsTablesTableMap::COL_DATE_MODIFIED, EsTablesTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_table', 'id_module', 'id_role', 'title', 'table_name', 'listed', 'description', 'icon', 'url', 'url_edit', 'url_index', 'status', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdTable' => 0, 'IdModule' => 1, 'IdRole' => 2, 'Title' => 3, 'TableName' => 4, 'Listed' => 5, 'Description' => 6, 'Icon' => 7, 'Url' => 8, 'UrlEdit' => 9, 'UrlIndex' => 10, 'Status' => 11, 'ChangeCount' => 12, 'IdUserModified' => 13, 'IdUserCreated' => 14, 'DateModified' => 15, 'DateCreated' => 16, ),
        self::TYPE_CAMELNAME     => array('idTable' => 0, 'idModule' => 1, 'idRole' => 2, 'title' => 3, 'tableName' => 4, 'listed' => 5, 'description' => 6, 'icon' => 7, 'url' => 8, 'urlEdit' => 9, 'urlIndex' => 10, 'status' => 11, 'changeCount' => 12, 'idUserModified' => 13, 'idUserCreated' => 14, 'dateModified' => 15, 'dateCreated' => 16, ),
        self::TYPE_COLNAME       => array(EsTablesTableMap::COL_ID_TABLE => 0, EsTablesTableMap::COL_ID_MODULE => 1, EsTablesTableMap::COL_ID_ROLE => 2, EsTablesTableMap::COL_TITLE => 3, EsTablesTableMap::COL_TABLE_NAME => 4, EsTablesTableMap::COL_LISTED => 5, EsTablesTableMap::COL_DESCRIPTION => 6, EsTablesTableMap::COL_ICON => 7, EsTablesTableMap::COL_URL => 8, EsTablesTableMap::COL_URL_EDIT => 9, EsTablesTableMap::COL_URL_INDEX => 10, EsTablesTableMap::COL_STATUS => 11, EsTablesTableMap::COL_CHANGE_COUNT => 12, EsTablesTableMap::COL_ID_USER_MODIFIED => 13, EsTablesTableMap::COL_ID_USER_CREATED => 14, EsTablesTableMap::COL_DATE_MODIFIED => 15, EsTablesTableMap::COL_DATE_CREATED => 16, ),
        self::TYPE_FIELDNAME     => array('id_table' => 0, 'id_module' => 1, 'id_role' => 2, 'title' => 3, 'table_name' => 4, 'listed' => 5, 'description' => 6, 'icon' => 7, 'url' => 8, 'url_edit' => 9, 'url_index' => 10, 'status' => 11, 'change_count' => 12, 'id_user_modified' => 13, 'id_user_created' => 14, 'date_modified' => 15, 'date_created' => 16, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
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
        $this->setName('es_tables');
        $this->setPhpName('EsTables');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\EsTables');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_table', 'IdTable', 'INTEGER', true, null, null);
        $this->addForeignKey('id_module', 'IdModule', 'INTEGER', 'es_modules', 'id_module', false, 10, null);
        $this->addForeignKey('id_role', 'IdRole', 'INTEGER', 'es_roles', 'id_role', false, 10, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 100, null);
        $this->addColumn('table_name', 'TableName', 'VARCHAR', false, 255, null);
        $this->addColumn('listed', 'Listed', 'VARCHAR', true, 15, 'ENABLED');
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('icon', 'Icon', 'VARCHAR', true, 200, null);
        $this->addColumn('url', 'Url', 'VARCHAR', true, 400, null);
        $this->addColumn('url_edit', 'UrlEdit', 'VARCHAR', false, 450, null);
        $this->addColumn('url_index', 'UrlIndex', 'VARCHAR', false, 450, null);
        $this->addColumn('status', 'Status', 'VARCHAR', false, 255, 'ENABLED');
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
        $this->addRelation('EsRoles', '\\EsRoles', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_role',
    1 => ':id_role',
  ),
), null, null, null, false);
        $this->addRelation('EsModules', '\\EsModules', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_module',
    1 => ':id_module',
  ),
), null, null, null, false);
        $this->addRelation('EsTablesRoles', '\\EsTablesRoles', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_table',
    1 => ':id_table',
  ),
), null, null, 'EsTablesRoless', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTable', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTable', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTable', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTable', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTable', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTable', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdTable', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EsTablesTableMap::CLASS_DEFAULT : EsTablesTableMap::OM_CLASS;
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
     * @return array           (EsTables object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EsTablesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EsTablesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EsTablesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EsTablesTableMap::OM_CLASS;
            /** @var EsTables $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EsTablesTableMap::addInstanceToPool($obj, $key);
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
            $key = EsTablesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EsTablesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var EsTables $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EsTablesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EsTablesTableMap::COL_ID_TABLE);
            $criteria->addSelectColumn(EsTablesTableMap::COL_ID_MODULE);
            $criteria->addSelectColumn(EsTablesTableMap::COL_ID_ROLE);
            $criteria->addSelectColumn(EsTablesTableMap::COL_TITLE);
            $criteria->addSelectColumn(EsTablesTableMap::COL_TABLE_NAME);
            $criteria->addSelectColumn(EsTablesTableMap::COL_LISTED);
            $criteria->addSelectColumn(EsTablesTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(EsTablesTableMap::COL_ICON);
            $criteria->addSelectColumn(EsTablesTableMap::COL_URL);
            $criteria->addSelectColumn(EsTablesTableMap::COL_URL_EDIT);
            $criteria->addSelectColumn(EsTablesTableMap::COL_URL_INDEX);
            $criteria->addSelectColumn(EsTablesTableMap::COL_STATUS);
            $criteria->addSelectColumn(EsTablesTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(EsTablesTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(EsTablesTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(EsTablesTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(EsTablesTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_table');
            $criteria->addSelectColumn($alias . '.id_module');
            $criteria->addSelectColumn($alias . '.id_role');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.table_name');
            $criteria->addSelectColumn($alias . '.listed');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.icon');
            $criteria->addSelectColumn($alias . '.url');
            $criteria->addSelectColumn($alias . '.url_edit');
            $criteria->addSelectColumn($alias . '.url_index');
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
        return Propel::getServiceContainer()->getDatabaseMap(EsTablesTableMap::DATABASE_NAME)->getTable(EsTablesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EsTablesTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EsTablesTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EsTablesTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a EsTables or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or EsTables object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EsTablesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \EsTables) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EsTablesTableMap::DATABASE_NAME);
            $criteria->add(EsTablesTableMap::COL_ID_TABLE, (array) $values, Criteria::IN);
        }

        $query = EsTablesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EsTablesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EsTablesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the es_tables table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EsTablesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a EsTables or Criteria object.
     *
     * @param mixed               $criteria Criteria or EsTables object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsTablesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from EsTables object
        }


        // Set the correct dbName
        $query = EsTablesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EsTablesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EsTablesTableMap::buildTableMap();
