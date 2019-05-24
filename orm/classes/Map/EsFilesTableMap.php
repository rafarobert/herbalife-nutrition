<?php

namespace Map;

use \EsFiles;
use \EsFilesQuery;
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
 * This class defines the structure of the 'es_files' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EsFilesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EsFilesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife_dev';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'es_files';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\EsFiles';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'EsFiles';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 25;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 25;

    /**
     * the column name for the id_file field
     */
    const COL_ID_FILE = 'es_files.id_file';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'es_files.name';

    /**
     * the column name for the url field
     */
    const COL_URL = 'es_files.url';

    /**
     * the column name for the ext field
     */
    const COL_EXT = 'es_files.ext';

    /**
     * the column name for the raw_name field
     */
    const COL_RAW_NAME = 'es_files.raw_name';

    /**
     * the column name for the full_path field
     */
    const COL_FULL_PATH = 'es_files.full_path';

    /**
     * the column name for the path field
     */
    const COL_PATH = 'es_files.path';

    /**
     * the column name for the width field
     */
    const COL_WIDTH = 'es_files.width';

    /**
     * the column name for the height field
     */
    const COL_HEIGHT = 'es_files.height';

    /**
     * the column name for the size field
     */
    const COL_SIZE = 'es_files.size';

    /**
     * the column name for the library field
     */
    const COL_LIBRARY = 'es_files.library';

    /**
     * the column name for the nro_thumbs field
     */
    const COL_NRO_THUMBS = 'es_files.nro_thumbs';

    /**
     * the column name for the id_parent field
     */
    const COL_ID_PARENT = 'es_files.id_parent';

    /**
     * the column name for the thumb_marker field
     */
    const COL_THUMB_MARKER = 'es_files.thumb_marker';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'es_files.type';

    /**
     * the column name for the x field
     */
    const COL_X = 'es_files.x';

    /**
     * the column name for the y field
     */
    const COL_Y = 'es_files.y';

    /**
     * the column name for the fix_width field
     */
    const COL_FIX_WIDTH = 'es_files.fix_width';

    /**
     * the column name for the fix_height field
     */
    const COL_FIX_HEIGHT = 'es_files.fix_height';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'es_files.status';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'es_files.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'es_files.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'es_files.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'es_files.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'es_files.date_created';

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
        self::TYPE_PHPNAME       => array('IdFile', 'Name', 'Url', 'Ext', 'RawName', 'FullPath', 'Path', 'Width', 'Height', 'Size', 'Library', 'NroThumbs', 'IdParent', 'ThumbMarker', 'Type', 'X', 'Y', 'FixWidth', 'FixHeight', 'Status', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idFile', 'name', 'url', 'ext', 'rawName', 'fullPath', 'path', 'width', 'height', 'size', 'library', 'nroThumbs', 'idParent', 'thumbMarker', 'type', 'x', 'y', 'fixWidth', 'fixHeight', 'status', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(EsFilesTableMap::COL_ID_FILE, EsFilesTableMap::COL_NAME, EsFilesTableMap::COL_URL, EsFilesTableMap::COL_EXT, EsFilesTableMap::COL_RAW_NAME, EsFilesTableMap::COL_FULL_PATH, EsFilesTableMap::COL_PATH, EsFilesTableMap::COL_WIDTH, EsFilesTableMap::COL_HEIGHT, EsFilesTableMap::COL_SIZE, EsFilesTableMap::COL_LIBRARY, EsFilesTableMap::COL_NRO_THUMBS, EsFilesTableMap::COL_ID_PARENT, EsFilesTableMap::COL_THUMB_MARKER, EsFilesTableMap::COL_TYPE, EsFilesTableMap::COL_X, EsFilesTableMap::COL_Y, EsFilesTableMap::COL_FIX_WIDTH, EsFilesTableMap::COL_FIX_HEIGHT, EsFilesTableMap::COL_STATUS, EsFilesTableMap::COL_CHANGE_COUNT, EsFilesTableMap::COL_ID_USER_MODIFIED, EsFilesTableMap::COL_ID_USER_CREATED, EsFilesTableMap::COL_DATE_MODIFIED, EsFilesTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_file', 'name', 'url', 'ext', 'raw_name', 'full_path', 'path', 'width', 'height', 'size', 'library', 'nro_thumbs', 'id_parent', 'thumb_marker', 'type', 'x', 'y', 'fix_width', 'fix_height', 'status', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdFile' => 0, 'Name' => 1, 'Url' => 2, 'Ext' => 3, 'RawName' => 4, 'FullPath' => 5, 'Path' => 6, 'Width' => 7, 'Height' => 8, 'Size' => 9, 'Library' => 10, 'NroThumbs' => 11, 'IdParent' => 12, 'ThumbMarker' => 13, 'Type' => 14, 'X' => 15, 'Y' => 16, 'FixWidth' => 17, 'FixHeight' => 18, 'Status' => 19, 'ChangeCount' => 20, 'IdUserModified' => 21, 'IdUserCreated' => 22, 'DateModified' => 23, 'DateCreated' => 24, ),
        self::TYPE_CAMELNAME     => array('idFile' => 0, 'name' => 1, 'url' => 2, 'ext' => 3, 'rawName' => 4, 'fullPath' => 5, 'path' => 6, 'width' => 7, 'height' => 8, 'size' => 9, 'library' => 10, 'nroThumbs' => 11, 'idParent' => 12, 'thumbMarker' => 13, 'type' => 14, 'x' => 15, 'y' => 16, 'fixWidth' => 17, 'fixHeight' => 18, 'status' => 19, 'changeCount' => 20, 'idUserModified' => 21, 'idUserCreated' => 22, 'dateModified' => 23, 'dateCreated' => 24, ),
        self::TYPE_COLNAME       => array(EsFilesTableMap::COL_ID_FILE => 0, EsFilesTableMap::COL_NAME => 1, EsFilesTableMap::COL_URL => 2, EsFilesTableMap::COL_EXT => 3, EsFilesTableMap::COL_RAW_NAME => 4, EsFilesTableMap::COL_FULL_PATH => 5, EsFilesTableMap::COL_PATH => 6, EsFilesTableMap::COL_WIDTH => 7, EsFilesTableMap::COL_HEIGHT => 8, EsFilesTableMap::COL_SIZE => 9, EsFilesTableMap::COL_LIBRARY => 10, EsFilesTableMap::COL_NRO_THUMBS => 11, EsFilesTableMap::COL_ID_PARENT => 12, EsFilesTableMap::COL_THUMB_MARKER => 13, EsFilesTableMap::COL_TYPE => 14, EsFilesTableMap::COL_X => 15, EsFilesTableMap::COL_Y => 16, EsFilesTableMap::COL_FIX_WIDTH => 17, EsFilesTableMap::COL_FIX_HEIGHT => 18, EsFilesTableMap::COL_STATUS => 19, EsFilesTableMap::COL_CHANGE_COUNT => 20, EsFilesTableMap::COL_ID_USER_MODIFIED => 21, EsFilesTableMap::COL_ID_USER_CREATED => 22, EsFilesTableMap::COL_DATE_MODIFIED => 23, EsFilesTableMap::COL_DATE_CREATED => 24, ),
        self::TYPE_FIELDNAME     => array('id_file' => 0, 'name' => 1, 'url' => 2, 'ext' => 3, 'raw_name' => 4, 'full_path' => 5, 'path' => 6, 'width' => 7, 'height' => 8, 'size' => 9, 'library' => 10, 'nro_thumbs' => 11, 'id_parent' => 12, 'thumb_marker' => 13, 'type' => 14, 'x' => 15, 'y' => 16, 'fix_width' => 17, 'fix_height' => 18, 'status' => 19, 'change_count' => 20, 'id_user_modified' => 21, 'id_user_created' => 22, 'date_modified' => 23, 'date_created' => 24, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
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
        $this->setName('es_files');
        $this->setPhpName('EsFiles');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\EsFiles');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_file', 'IdFile', 'INTEGER', true, 10, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 256, null);
        $this->addColumn('url', 'Url', 'VARCHAR', false, 450, null);
        $this->addColumn('ext', 'Ext', 'VARCHAR', false, 100, null);
        $this->addColumn('raw_name', 'RawName', 'VARCHAR', false, 400, null);
        $this->addColumn('full_path', 'FullPath', 'VARCHAR', false, 400, null);
        $this->addColumn('path', 'Path', 'VARCHAR', false, 400, null);
        $this->addColumn('width', 'Width', 'INTEGER', false, null, null);
        $this->addColumn('height', 'Height', 'INTEGER', false, null, null);
        $this->addColumn('size', 'Size', 'DECIMAL', false, null, null);
        $this->addColumn('library', 'Library', 'VARCHAR', false, 20, null);
        $this->addColumn('nro_thumbs', 'NroThumbs', 'INTEGER', false, null, null);
        $this->addForeignKey('id_parent', 'IdParent', 'INTEGER', 'es_files', 'id_file', false, 10, null);
        $this->addColumn('thumb_marker', 'ThumbMarker', 'VARCHAR', false, 200, null);
        $this->addColumn('type', 'Type', 'VARCHAR', false, 100, null);
        $this->addColumn('x', 'X', 'DECIMAL', false, 20, null);
        $this->addColumn('y', 'Y', 'DECIMAL', false, 20, null);
        $this->addColumn('fix_width', 'FixWidth', 'DECIMAL', false, 20, null);
        $this->addColumn('fix_height', 'FixHeight', 'DECIMAL', false, 20, null);
        $this->addColumn('status', 'Status', 'VARCHAR', false, 15, 'ENABLED');
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
        $this->addRelation('EsFilesRelatedByIdParent', '\\EsFiles', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_parent',
    1 => ':id_file',
  ),
), null, null, null, false);
        $this->addRelation('EsCities', '\\EsCities', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_cover_picture',
    1 => ':id_file',
  ),
), null, null, 'EsCitiess', false);
        $this->addRelation('EsFilesRelatedByIdFile', '\\EsFiles', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_parent',
    1 => ':id_file',
  ),
), null, null, 'EsFilessRelatedByIdFile', false);
        $this->addRelation('EsUsersRelatedByIdCoverPicture', '\\EsUsers', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_cover_picture',
    1 => ':id_file',
  ),
), null, null, 'EsUserssRelatedByIdCoverPicture', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdFile', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdFile', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdFile', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdFile', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdFile', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdFile', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdFile', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EsFilesTableMap::CLASS_DEFAULT : EsFilesTableMap::OM_CLASS;
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
     * @return array           (EsFiles object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EsFilesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EsFilesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EsFilesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EsFilesTableMap::OM_CLASS;
            /** @var EsFiles $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EsFilesTableMap::addInstanceToPool($obj, $key);
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
            $key = EsFilesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EsFilesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var EsFiles $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EsFilesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EsFilesTableMap::COL_ID_FILE);
            $criteria->addSelectColumn(EsFilesTableMap::COL_NAME);
            $criteria->addSelectColumn(EsFilesTableMap::COL_URL);
            $criteria->addSelectColumn(EsFilesTableMap::COL_EXT);
            $criteria->addSelectColumn(EsFilesTableMap::COL_RAW_NAME);
            $criteria->addSelectColumn(EsFilesTableMap::COL_FULL_PATH);
            $criteria->addSelectColumn(EsFilesTableMap::COL_PATH);
            $criteria->addSelectColumn(EsFilesTableMap::COL_WIDTH);
            $criteria->addSelectColumn(EsFilesTableMap::COL_HEIGHT);
            $criteria->addSelectColumn(EsFilesTableMap::COL_SIZE);
            $criteria->addSelectColumn(EsFilesTableMap::COL_LIBRARY);
            $criteria->addSelectColumn(EsFilesTableMap::COL_NRO_THUMBS);
            $criteria->addSelectColumn(EsFilesTableMap::COL_ID_PARENT);
            $criteria->addSelectColumn(EsFilesTableMap::COL_THUMB_MARKER);
            $criteria->addSelectColumn(EsFilesTableMap::COL_TYPE);
            $criteria->addSelectColumn(EsFilesTableMap::COL_X);
            $criteria->addSelectColumn(EsFilesTableMap::COL_Y);
            $criteria->addSelectColumn(EsFilesTableMap::COL_FIX_WIDTH);
            $criteria->addSelectColumn(EsFilesTableMap::COL_FIX_HEIGHT);
            $criteria->addSelectColumn(EsFilesTableMap::COL_STATUS);
            $criteria->addSelectColumn(EsFilesTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(EsFilesTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(EsFilesTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(EsFilesTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(EsFilesTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_file');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.url');
            $criteria->addSelectColumn($alias . '.ext');
            $criteria->addSelectColumn($alias . '.raw_name');
            $criteria->addSelectColumn($alias . '.full_path');
            $criteria->addSelectColumn($alias . '.path');
            $criteria->addSelectColumn($alias . '.width');
            $criteria->addSelectColumn($alias . '.height');
            $criteria->addSelectColumn($alias . '.size');
            $criteria->addSelectColumn($alias . '.library');
            $criteria->addSelectColumn($alias . '.nro_thumbs');
            $criteria->addSelectColumn($alias . '.id_parent');
            $criteria->addSelectColumn($alias . '.thumb_marker');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.x');
            $criteria->addSelectColumn($alias . '.y');
            $criteria->addSelectColumn($alias . '.fix_width');
            $criteria->addSelectColumn($alias . '.fix_height');
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
        return Propel::getServiceContainer()->getDatabaseMap(EsFilesTableMap::DATABASE_NAME)->getTable(EsFilesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EsFilesTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EsFilesTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EsFilesTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a EsFiles or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or EsFiles object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EsFilesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \EsFiles) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EsFilesTableMap::DATABASE_NAME);
            $criteria->add(EsFilesTableMap::COL_ID_FILE, (array) $values, Criteria::IN);
        }

        $query = EsFilesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EsFilesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EsFilesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the es_files table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EsFilesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a EsFiles or Criteria object.
     *
     * @param mixed               $criteria Criteria or EsFiles object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsFilesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from EsFiles object
        }

        if ($criteria->containsKey(EsFilesTableMap::COL_ID_FILE) && $criteria->keyContainsValue(EsFilesTableMap::COL_ID_FILE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EsFilesTableMap::COL_ID_FILE.')');
        }


        // Set the correct dbName
        $query = EsFilesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EsFilesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EsFilesTableMap::buildTableMap();
