<?php

namespace Map;

use \EsCities;
use \EsCitiesQuery;
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
 * This class defines the structure of the 'es_cities' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EsCitiesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EsCitiesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife_dev';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'es_cities';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\EsCities';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'EsCities';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 21;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 21;

    /**
     * the column name for the id_city field
     */
    const COL_ID_CITY = 'es_cities.id_city';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'es_cities.name';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'es_cities.description';

    /**
     * the column name for the abbreviation field
     */
    const COL_ABBREVIATION = 'es_cities.abbreviation';

    /**
     * the column name for the id_capital field
     */
    const COL_ID_CAPITAL = 'es_cities.id_capital';

    /**
     * the column name for the id_region field
     */
    const COL_ID_REGION = 'es_cities.id_region';

    /**
     * the column name for the lat field
     */
    const COL_LAT = 'es_cities.lat';

    /**
     * the column name for the lng field
     */
    const COL_LNG = 'es_cities.lng';

    /**
     * the column name for the area field
     */
    const COL_AREA = 'es_cities.area';

    /**
     * the column name for the nro_municipios field
     */
    const COL_NRO_MUNICIPIOS = 'es_cities.nro_municipios';

    /**
     * the column name for the surface field
     */
    const COL_SURFACE = 'es_cities.surface';

    /**
     * the column name for the ids_files field
     */
    const COL_IDS_FILES = 'es_cities.ids_files';

    /**
     * the column name for the id_cover_picture field
     */
    const COL_ID_COVER_PICTURE = 'es_cities.id_cover_picture';

    /**
     * the column name for the height field
     */
    const COL_HEIGHT = 'es_cities.height';

    /**
     * the column name for the tipo field
     */
    const COL_TIPO = 'es_cities.tipo';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'es_cities.status';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'es_cities.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'es_cities.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'es_cities.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'es_cities.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'es_cities.date_created';

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
        self::TYPE_PHPNAME       => array('IdCity', 'Name', 'Description', 'Abbreviation', 'IdCapital', 'IdRegion', 'Lat', 'Lng', 'Area', 'NroMunicipios', 'Surface', 'IdsFiles', 'IdCoverPicture', 'Height', 'Tipo', 'Status', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idCity', 'name', 'description', 'abbreviation', 'idCapital', 'idRegion', 'lat', 'lng', 'area', 'nroMunicipios', 'surface', 'idsFiles', 'idCoverPicture', 'height', 'tipo', 'status', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(EsCitiesTableMap::COL_ID_CITY, EsCitiesTableMap::COL_NAME, EsCitiesTableMap::COL_DESCRIPTION, EsCitiesTableMap::COL_ABBREVIATION, EsCitiesTableMap::COL_ID_CAPITAL, EsCitiesTableMap::COL_ID_REGION, EsCitiesTableMap::COL_LAT, EsCitiesTableMap::COL_LNG, EsCitiesTableMap::COL_AREA, EsCitiesTableMap::COL_NRO_MUNICIPIOS, EsCitiesTableMap::COL_SURFACE, EsCitiesTableMap::COL_IDS_FILES, EsCitiesTableMap::COL_ID_COVER_PICTURE, EsCitiesTableMap::COL_HEIGHT, EsCitiesTableMap::COL_TIPO, EsCitiesTableMap::COL_STATUS, EsCitiesTableMap::COL_CHANGE_COUNT, EsCitiesTableMap::COL_ID_USER_MODIFIED, EsCitiesTableMap::COL_ID_USER_CREATED, EsCitiesTableMap::COL_DATE_MODIFIED, EsCitiesTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_city', 'name', 'description', 'abbreviation', 'id_capital', 'id_region', 'lat', 'lng', 'area', 'nro_municipios', 'surface', 'ids_files', 'id_cover_picture', 'height', 'tipo', 'status', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdCity' => 0, 'Name' => 1, 'Description' => 2, 'Abbreviation' => 3, 'IdCapital' => 4, 'IdRegion' => 5, 'Lat' => 6, 'Lng' => 7, 'Area' => 8, 'NroMunicipios' => 9, 'Surface' => 10, 'IdsFiles' => 11, 'IdCoverPicture' => 12, 'Height' => 13, 'Tipo' => 14, 'Status' => 15, 'ChangeCount' => 16, 'IdUserModified' => 17, 'IdUserCreated' => 18, 'DateModified' => 19, 'DateCreated' => 20, ),
        self::TYPE_CAMELNAME     => array('idCity' => 0, 'name' => 1, 'description' => 2, 'abbreviation' => 3, 'idCapital' => 4, 'idRegion' => 5, 'lat' => 6, 'lng' => 7, 'area' => 8, 'nroMunicipios' => 9, 'surface' => 10, 'idsFiles' => 11, 'idCoverPicture' => 12, 'height' => 13, 'tipo' => 14, 'status' => 15, 'changeCount' => 16, 'idUserModified' => 17, 'idUserCreated' => 18, 'dateModified' => 19, 'dateCreated' => 20, ),
        self::TYPE_COLNAME       => array(EsCitiesTableMap::COL_ID_CITY => 0, EsCitiesTableMap::COL_NAME => 1, EsCitiesTableMap::COL_DESCRIPTION => 2, EsCitiesTableMap::COL_ABBREVIATION => 3, EsCitiesTableMap::COL_ID_CAPITAL => 4, EsCitiesTableMap::COL_ID_REGION => 5, EsCitiesTableMap::COL_LAT => 6, EsCitiesTableMap::COL_LNG => 7, EsCitiesTableMap::COL_AREA => 8, EsCitiesTableMap::COL_NRO_MUNICIPIOS => 9, EsCitiesTableMap::COL_SURFACE => 10, EsCitiesTableMap::COL_IDS_FILES => 11, EsCitiesTableMap::COL_ID_COVER_PICTURE => 12, EsCitiesTableMap::COL_HEIGHT => 13, EsCitiesTableMap::COL_TIPO => 14, EsCitiesTableMap::COL_STATUS => 15, EsCitiesTableMap::COL_CHANGE_COUNT => 16, EsCitiesTableMap::COL_ID_USER_MODIFIED => 17, EsCitiesTableMap::COL_ID_USER_CREATED => 18, EsCitiesTableMap::COL_DATE_MODIFIED => 19, EsCitiesTableMap::COL_DATE_CREATED => 20, ),
        self::TYPE_FIELDNAME     => array('id_city' => 0, 'name' => 1, 'description' => 2, 'abbreviation' => 3, 'id_capital' => 4, 'id_region' => 5, 'lat' => 6, 'lng' => 7, 'area' => 8, 'nro_municipios' => 9, 'surface' => 10, 'ids_files' => 11, 'id_cover_picture' => 12, 'height' => 13, 'tipo' => 14, 'status' => 15, 'change_count' => 16, 'id_user_modified' => 17, 'id_user_created' => 18, 'date_modified' => 19, 'date_created' => 20, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
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
        $this->setName('es_cities');
        $this->setPhpName('EsCities');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\EsCities');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_city', 'IdCity', 'INTEGER', true, 10, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 300, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 500, null);
        $this->addColumn('abbreviation', 'Abbreviation', 'VARCHAR', false, 200, null);
        $this->addForeignKey('id_capital', 'IdCapital', 'INTEGER', 'es_cities', 'id_city', false, 10, null);
        $this->addForeignKey('id_region', 'IdRegion', 'INTEGER', 'es_cities', 'id_city', false, 10, null);
        $this->addColumn('lat', 'Lat', 'DECIMAL', false, 10, null);
        $this->addColumn('lng', 'Lng', 'DECIMAL', false, 10, null);
        $this->addColumn('area', 'Area', 'INTEGER', false, null, null);
        $this->addColumn('nro_municipios', 'NroMunicipios', 'INTEGER', false, null, null);
        $this->addColumn('surface', 'Surface', 'DECIMAL', false, null, null);
        $this->addColumn('ids_files', 'IdsFiles', 'VARCHAR', false, 490, null);
        $this->addForeignKey('id_cover_picture', 'IdCoverPicture', 'INTEGER', 'es_files', 'id_file', false, 10, null);
        $this->addColumn('height', 'Height', 'DECIMAL', false, null, null);
        $this->addColumn('tipo', 'Tipo', 'VARCHAR', false, 490, null);
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
        $this->addRelation('EsCitiesRelatedByIdCapital', '\\EsCities', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_capital',
    1 => ':id_city',
  ),
), null, null, null, false);
        $this->addRelation('EsCitiesRelatedByIdRegion', '\\EsCities', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_region',
    1 => ':id_city',
  ),
), null, null, null, false);
        $this->addRelation('EsFiles', '\\EsFiles', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_cover_picture',
    1 => ':id_file',
  ),
), null, null, null, false);
        $this->addRelation('EsCitiesRelatedByIdCity0', '\\EsCities', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_capital',
    1 => ':id_city',
  ),
), null, null, 'EsCitiessRelatedByIdCity0', false);
        $this->addRelation('EsCitiesRelatedByIdCity1', '\\EsCities', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_region',
    1 => ':id_city',
  ),
), null, null, 'EsCitiessRelatedByIdCity1', false);
        $this->addRelation('EsProvincias', '\\EsProvincias', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_ciudad',
    1 => ':id_city',
  ),
), null, null, 'EsProvinciass', false);
        $this->addRelation('EsUsersRelatedByIdCity', '\\EsUsers', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_city',
    1 => ':id_city',
  ),
), null, null, 'EsUserssRelatedByIdCity', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCity', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCity', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCity', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCity', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCity', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCity', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdCity', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EsCitiesTableMap::CLASS_DEFAULT : EsCitiesTableMap::OM_CLASS;
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
     * @return array           (EsCities object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EsCitiesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EsCitiesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EsCitiesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EsCitiesTableMap::OM_CLASS;
            /** @var EsCities $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EsCitiesTableMap::addInstanceToPool($obj, $key);
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
            $key = EsCitiesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EsCitiesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var EsCities $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EsCitiesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EsCitiesTableMap::COL_ID_CITY);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_NAME);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_ABBREVIATION);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_ID_CAPITAL);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_ID_REGION);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_LAT);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_LNG);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_AREA);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_NRO_MUNICIPIOS);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_SURFACE);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_IDS_FILES);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_ID_COVER_PICTURE);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_HEIGHT);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_TIPO);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_STATUS);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(EsCitiesTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_city');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.abbreviation');
            $criteria->addSelectColumn($alias . '.id_capital');
            $criteria->addSelectColumn($alias . '.id_region');
            $criteria->addSelectColumn($alias . '.lat');
            $criteria->addSelectColumn($alias . '.lng');
            $criteria->addSelectColumn($alias . '.area');
            $criteria->addSelectColumn($alias . '.nro_municipios');
            $criteria->addSelectColumn($alias . '.surface');
            $criteria->addSelectColumn($alias . '.ids_files');
            $criteria->addSelectColumn($alias . '.id_cover_picture');
            $criteria->addSelectColumn($alias . '.height');
            $criteria->addSelectColumn($alias . '.tipo');
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
        return Propel::getServiceContainer()->getDatabaseMap(EsCitiesTableMap::DATABASE_NAME)->getTable(EsCitiesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EsCitiesTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EsCitiesTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EsCitiesTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a EsCities or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or EsCities object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EsCitiesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \EsCities) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EsCitiesTableMap::DATABASE_NAME);
            $criteria->add(EsCitiesTableMap::COL_ID_CITY, (array) $values, Criteria::IN);
        }

        $query = EsCitiesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EsCitiesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EsCitiesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the es_cities table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EsCitiesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a EsCities or Criteria object.
     *
     * @param mixed               $criteria Criteria or EsCities object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsCitiesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from EsCities object
        }

        if ($criteria->containsKey(EsCitiesTableMap::COL_ID_CITY) && $criteria->keyContainsValue(EsCitiesTableMap::COL_ID_CITY) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EsCitiesTableMap::COL_ID_CITY.')');
        }


        // Set the correct dbName
        $query = EsCitiesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EsCitiesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EsCitiesTableMap::buildTableMap();
