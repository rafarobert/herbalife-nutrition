<?php

namespace Map;

use \EsUsers;
use \EsUsersQuery;
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
 * This class defines the structure of the 'es_users' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EsUsersTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EsUsersTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife_dev';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'es_users';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\EsUsers';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'EsUsers';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 29;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 29;

    /**
     * the column name for the id_user field
     */
    const COL_ID_USER = 'es_users.id_user';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'es_users.name';

    /**
     * the column name for the lastname field
     */
    const COL_LASTNAME = 'es_users.lastname';

    /**
     * the column name for the username field
     */
    const COL_USERNAME = 'es_users.username';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'es_users.email';

    /**
     * the column name for the address field
     */
    const COL_ADDRESS = 'es_users.address';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'es_users.password';

    /**
     * the column name for the birthdate field
     */
    const COL_BIRTHDATE = 'es_users.birthdate';

    /**
     * the column name for the age field
     */
    const COL_AGE = 'es_users.age';

    /**
     * the column name for the carnet field
     */
    const COL_CARNET = 'es_users.carnet';

    /**
     * the column name for the sexo field
     */
    const COL_SEXO = 'es_users.sexo';

    /**
     * the column name for the phone_1 field
     */
    const COL_PHONE_1 = 'es_users.phone_1';

    /**
     * the column name for the phone_2 field
     */
    const COL_PHONE_2 = 'es_users.phone_2';

    /**
     * the column name for the cellphone_1 field
     */
    const COL_CELLPHONE_1 = 'es_users.cellphone_1';

    /**
     * the column name for the cellphone_2 field
     */
    const COL_CELLPHONE_2 = 'es_users.cellphone_2';

    /**
     * the column name for the ids_files field
     */
    const COL_IDS_FILES = 'es_users.ids_files';

    /**
     * the column name for the id_cover_picture field
     */
    const COL_ID_COVER_PICTURE = 'es_users.id_cover_picture';

    /**
     * the column name for the id_city field
     */
    const COL_ID_CITY = 'es_users.id_city';

    /**
     * the column name for the id_provincia field
     */
    const COL_ID_PROVINCIA = 'es_users.id_provincia';

    /**
     * the column name for the id_role field
     */
    const COL_ID_ROLE = 'es_users.id_role';

    /**
     * the column name for the signin_method field
     */
    const COL_SIGNIN_METHOD = 'es_users.signin_method';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'es_users.uid';

    /**
     * the column name for the country_code field
     */
    const COL_COUNTRY_CODE = 'es_users.country_code';

    /**
     * the column name for the authy_id field
     */
    const COL_AUTHY_ID = 'es_users.authy_id';

    /**
     * the column name for the verified field
     */
    const COL_VERIFIED = 'es_users.verified';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'es_users.change_count';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'es_users.status';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'es_users.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'es_users.date_created';

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
        self::TYPE_PHPNAME       => array('IdUser', 'Name', 'Lastname', 'Username', 'Email', 'Address', 'Password', 'Birthdate', 'Age', 'Carnet', 'Sexo', 'Phone1', 'Phone2', 'Cellphone1', 'Cellphone2', 'IdsFiles', 'IdCoverPicture', 'IdCity', 'IdProvincia', 'IdRole', 'SigninMethod', 'Uid', 'CountryCode', 'AuthyId', 'Verified', 'ChangeCount', 'Status', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idUser', 'name', 'lastname', 'username', 'email', 'address', 'password', 'birthdate', 'age', 'carnet', 'sexo', 'phone1', 'phone2', 'cellphone1', 'cellphone2', 'idsFiles', 'idCoverPicture', 'idCity', 'idProvincia', 'idRole', 'signinMethod', 'uid', 'countryCode', 'authyId', 'verified', 'changeCount', 'status', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(EsUsersTableMap::COL_ID_USER, EsUsersTableMap::COL_NAME, EsUsersTableMap::COL_LASTNAME, EsUsersTableMap::COL_USERNAME, EsUsersTableMap::COL_EMAIL, EsUsersTableMap::COL_ADDRESS, EsUsersTableMap::COL_PASSWORD, EsUsersTableMap::COL_BIRTHDATE, EsUsersTableMap::COL_AGE, EsUsersTableMap::COL_CARNET, EsUsersTableMap::COL_SEXO, EsUsersTableMap::COL_PHONE_1, EsUsersTableMap::COL_PHONE_2, EsUsersTableMap::COL_CELLPHONE_1, EsUsersTableMap::COL_CELLPHONE_2, EsUsersTableMap::COL_IDS_FILES, EsUsersTableMap::COL_ID_COVER_PICTURE, EsUsersTableMap::COL_ID_CITY, EsUsersTableMap::COL_ID_PROVINCIA, EsUsersTableMap::COL_ID_ROLE, EsUsersTableMap::COL_SIGNIN_METHOD, EsUsersTableMap::COL_UID, EsUsersTableMap::COL_COUNTRY_CODE, EsUsersTableMap::COL_AUTHY_ID, EsUsersTableMap::COL_VERIFIED, EsUsersTableMap::COL_CHANGE_COUNT, EsUsersTableMap::COL_STATUS, EsUsersTableMap::COL_DATE_MODIFIED, EsUsersTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_user', 'name', 'lastname', 'username', 'email', 'address', 'password', 'birthdate', 'age', 'carnet', 'sexo', 'phone_1', 'phone_2', 'cellphone_1', 'cellphone_2', 'ids_files', 'id_cover_picture', 'id_city', 'id_provincia', 'id_role', 'signin_method', 'uid', 'country_code', 'authy_id', 'verified', 'change_count', 'status', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdUser' => 0, 'Name' => 1, 'Lastname' => 2, 'Username' => 3, 'Email' => 4, 'Address' => 5, 'Password' => 6, 'Birthdate' => 7, 'Age' => 8, 'Carnet' => 9, 'Sexo' => 10, 'Phone1' => 11, 'Phone2' => 12, 'Cellphone1' => 13, 'Cellphone2' => 14, 'IdsFiles' => 15, 'IdCoverPicture' => 16, 'IdCity' => 17, 'IdProvincia' => 18, 'IdRole' => 19, 'SigninMethod' => 20, 'Uid' => 21, 'CountryCode' => 22, 'AuthyId' => 23, 'Verified' => 24, 'ChangeCount' => 25, 'Status' => 26, 'DateModified' => 27, 'DateCreated' => 28, ),
        self::TYPE_CAMELNAME     => array('idUser' => 0, 'name' => 1, 'lastname' => 2, 'username' => 3, 'email' => 4, 'address' => 5, 'password' => 6, 'birthdate' => 7, 'age' => 8, 'carnet' => 9, 'sexo' => 10, 'phone1' => 11, 'phone2' => 12, 'cellphone1' => 13, 'cellphone2' => 14, 'idsFiles' => 15, 'idCoverPicture' => 16, 'idCity' => 17, 'idProvincia' => 18, 'idRole' => 19, 'signinMethod' => 20, 'uid' => 21, 'countryCode' => 22, 'authyId' => 23, 'verified' => 24, 'changeCount' => 25, 'status' => 26, 'dateModified' => 27, 'dateCreated' => 28, ),
        self::TYPE_COLNAME       => array(EsUsersTableMap::COL_ID_USER => 0, EsUsersTableMap::COL_NAME => 1, EsUsersTableMap::COL_LASTNAME => 2, EsUsersTableMap::COL_USERNAME => 3, EsUsersTableMap::COL_EMAIL => 4, EsUsersTableMap::COL_ADDRESS => 5, EsUsersTableMap::COL_PASSWORD => 6, EsUsersTableMap::COL_BIRTHDATE => 7, EsUsersTableMap::COL_AGE => 8, EsUsersTableMap::COL_CARNET => 9, EsUsersTableMap::COL_SEXO => 10, EsUsersTableMap::COL_PHONE_1 => 11, EsUsersTableMap::COL_PHONE_2 => 12, EsUsersTableMap::COL_CELLPHONE_1 => 13, EsUsersTableMap::COL_CELLPHONE_2 => 14, EsUsersTableMap::COL_IDS_FILES => 15, EsUsersTableMap::COL_ID_COVER_PICTURE => 16, EsUsersTableMap::COL_ID_CITY => 17, EsUsersTableMap::COL_ID_PROVINCIA => 18, EsUsersTableMap::COL_ID_ROLE => 19, EsUsersTableMap::COL_SIGNIN_METHOD => 20, EsUsersTableMap::COL_UID => 21, EsUsersTableMap::COL_COUNTRY_CODE => 22, EsUsersTableMap::COL_AUTHY_ID => 23, EsUsersTableMap::COL_VERIFIED => 24, EsUsersTableMap::COL_CHANGE_COUNT => 25, EsUsersTableMap::COL_STATUS => 26, EsUsersTableMap::COL_DATE_MODIFIED => 27, EsUsersTableMap::COL_DATE_CREATED => 28, ),
        self::TYPE_FIELDNAME     => array('id_user' => 0, 'name' => 1, 'lastname' => 2, 'username' => 3, 'email' => 4, 'address' => 5, 'password' => 6, 'birthdate' => 7, 'age' => 8, 'carnet' => 9, 'sexo' => 10, 'phone_1' => 11, 'phone_2' => 12, 'cellphone_1' => 13, 'cellphone_2' => 14, 'ids_files' => 15, 'id_cover_picture' => 16, 'id_city' => 17, 'id_provincia' => 18, 'id_role' => 19, 'signin_method' => 20, 'uid' => 21, 'country_code' => 22, 'authy_id' => 23, 'verified' => 24, 'change_count' => 25, 'status' => 26, 'date_modified' => 27, 'date_created' => 28, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
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
        $this->setName('es_users');
        $this->setPhpName('EsUsers');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\EsUsers');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_user', 'IdUser', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 256, null);
        $this->addColumn('lastname', 'Lastname', 'VARCHAR', false, 256, null);
        $this->addColumn('username', 'Username', 'VARCHAR', false, 250, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 100, '');
        $this->addColumn('address', 'Address', 'VARCHAR', false, 500, null);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 128, '');
        $this->addColumn('birthdate', 'Birthdate', 'DATE', false, null, null);
        $this->addColumn('age', 'Age', 'INTEGER', false, null, null);
        $this->addColumn('carnet', 'Carnet', 'VARCHAR', false, 30, null);
        $this->addColumn('sexo', 'Sexo', 'VARCHAR', false, 15, null);
        $this->addColumn('phone_1', 'Phone1', 'VARCHAR', false, 20, null);
        $this->addColumn('phone_2', 'Phone2', 'VARCHAR', false, 20, null);
        $this->addColumn('cellphone_1', 'Cellphone1', 'VARCHAR', false, 20, null);
        $this->addColumn('cellphone_2', 'Cellphone2', 'VARCHAR', false, 20, null);
        $this->addColumn('ids_files', 'IdsFiles', 'VARCHAR', false, 450, null);
        $this->addForeignKey('id_cover_picture', 'IdCoverPicture', 'INTEGER', 'es_files', 'id_file', false, 10, null);
        $this->addForeignKey('id_city', 'IdCity', 'INTEGER', 'es_cities', 'id_city', false, 10, null);
        $this->addForeignKey('id_provincia', 'IdProvincia', 'INTEGER', 'es_provincias', 'id_provincia', false, 10, null);
        $this->addForeignKey('id_role', 'IdRole', 'INTEGER', 'es_roles', 'id_role', false, 10, null);
        $this->addColumn('signin_method', 'SigninMethod', 'VARCHAR', false, 100, null);
        $this->addColumn('uid', 'Uid', 'VARCHAR', false, 499, null);
        $this->addColumn('country_code', 'CountryCode', 'VARCHAR', false, 50, null);
        $this->addColumn('authy_id', 'AuthyId', 'VARCHAR', false, 50, null);
        $this->addColumn('verified', 'Verified', 'BOOLEAN', false, 1, null);
        $this->addColumn('change_count', 'ChangeCount', 'INTEGER', true, null, 0);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 15, 'ENABLED');
        $this->addColumn('date_modified', 'DateModified', 'TIMESTAMP', true, null, null);
        $this->addColumn('date_created', 'DateCreated', 'TIMESTAMP', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('EsRolesRelatedByIdRole', '\\EsRoles', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_role',
    1 => ':id_role',
  ),
), null, null, null, false);
        $this->addRelation('EsProvinciasRelatedByIdProvincia', '\\EsProvincias', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_provincia',
    1 => ':id_provincia',
  ),
), null, null, null, false);
        $this->addRelation('EsFilesRelatedByIdCoverPicture', '\\EsFiles', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_cover_picture',
    1 => ':id_file',
  ),
), null, null, null, false);
        $this->addRelation('EsCitiesRelatedByIdCity', '\\EsCities', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_city',
    1 => ':id_city',
  ),
), null, null, null, false);
        $this->addRelation('EsCitiesRelatedByIdUserCreated', '\\EsCities', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_user',
  ),
), null, null, 'EsCitiessRelatedByIdUserCreated', false);
        $this->addRelation('EsCitiesRelatedByIdUserModified', '\\EsCities', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_user',
  ),
), null, null, 'EsCitiessRelatedByIdUserModified', false);
        $this->addRelation('EsDomainsRelatedByIdUserCreated', '\\EsDomains', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_user',
  ),
), null, null, 'EsDomainssRelatedByIdUserCreated', false);
        $this->addRelation('EsDomainsRelatedByIdUserModified', '\\EsDomains', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_user',
  ),
), null, null, 'EsDomainssRelatedByIdUserModified', false);
        $this->addRelation('EsFilesRelatedByIdUserCreated', '\\EsFiles', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_user',
  ),
), null, null, 'EsFilessRelatedByIdUserCreated', false);
        $this->addRelation('EsFilesRelatedByIdUserModified', '\\EsFiles', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_user',
  ),
), null, null, 'EsFilessRelatedByIdUserModified', false);
        $this->addRelation('EsModulesRelatedByIdUserModified', '\\EsModules', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_user',
  ),
), null, null, 'EsModulessRelatedByIdUserModified', false);
        $this->addRelation('EsModulesRelatedByIdUserCreated', '\\EsModules', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_user',
  ),
), null, null, 'EsModulessRelatedByIdUserCreated', false);
        $this->addRelation('EsProvinciasRelatedByIdUserCreated', '\\EsProvincias', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_user',
  ),
), null, null, 'EsProvinciassRelatedByIdUserCreated', false);
        $this->addRelation('EsProvinciasRelatedByIdUserModified', '\\EsProvincias', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_user',
  ),
), null, null, 'EsProvinciassRelatedByIdUserModified', false);
        $this->addRelation('EsRolesRelatedByIdUserCreated', '\\EsRoles', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_user',
  ),
), null, null, 'EsRolessRelatedByIdUserCreated', false);
        $this->addRelation('EsRolesRelatedByIdUserModified', '\\EsRoles', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_user',
  ),
), null, null, 'EsRolessRelatedByIdUserModified', false);
        $this->addRelation('EsSessions', '\\EsSessions', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user',
    1 => ':id_user',
  ),
), null, null, 'EsSessionss', false);
        $this->addRelation('EsTablesRelatedByIdUserCreated', '\\EsTables', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_user',
  ),
), null, null, 'EsTablessRelatedByIdUserCreated', false);
        $this->addRelation('EsTablesRelatedByIdUserModified', '\\EsTables', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_user',
  ),
), null, null, 'EsTablessRelatedByIdUserModified', false);
        $this->addRelation('EsTablesRolesRelatedByIdUserCreated', '\\EsTablesRoles', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_user',
  ),
), null, null, 'EsTablesRolessRelatedByIdUserCreated', false);
        $this->addRelation('EsTablesRolesRelatedByIdUserModified', '\\EsTablesRoles', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_user',
  ),
), null, null, 'EsTablesRolessRelatedByIdUserModified', false);
        $this->addRelation('EsUsersRolesRelatedByIdUserCreated', '\\EsUsersRoles', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_user',
  ),
), null, null, 'EsUsersRolessRelatedByIdUserCreated', false);
        $this->addRelation('EsUsersRolesRelatedByIdUserModified', '\\EsUsersRoles', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_user',
  ),
), null, null, 'EsUsersRolessRelatedByIdUserModified', false);
        $this->addRelation('EsUsersRolesRelatedByIdUser', '\\EsUsersRoles', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_user',
    1 => ':id_user',
  ),
), null, null, 'EsUsersRolessRelatedByIdUser', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUser', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUser', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUser', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUser', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUser', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUser', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdUser', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EsUsersTableMap::CLASS_DEFAULT : EsUsersTableMap::OM_CLASS;
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
     * @return array           (EsUsers object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EsUsersTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EsUsersTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EsUsersTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EsUsersTableMap::OM_CLASS;
            /** @var EsUsers $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EsUsersTableMap::addInstanceToPool($obj, $key);
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
            $key = EsUsersTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EsUsersTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var EsUsers $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EsUsersTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EsUsersTableMap::COL_ID_USER);
            $criteria->addSelectColumn(EsUsersTableMap::COL_NAME);
            $criteria->addSelectColumn(EsUsersTableMap::COL_LASTNAME);
            $criteria->addSelectColumn(EsUsersTableMap::COL_USERNAME);
            $criteria->addSelectColumn(EsUsersTableMap::COL_EMAIL);
            $criteria->addSelectColumn(EsUsersTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(EsUsersTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(EsUsersTableMap::COL_BIRTHDATE);
            $criteria->addSelectColumn(EsUsersTableMap::COL_AGE);
            $criteria->addSelectColumn(EsUsersTableMap::COL_CARNET);
            $criteria->addSelectColumn(EsUsersTableMap::COL_SEXO);
            $criteria->addSelectColumn(EsUsersTableMap::COL_PHONE_1);
            $criteria->addSelectColumn(EsUsersTableMap::COL_PHONE_2);
            $criteria->addSelectColumn(EsUsersTableMap::COL_CELLPHONE_1);
            $criteria->addSelectColumn(EsUsersTableMap::COL_CELLPHONE_2);
            $criteria->addSelectColumn(EsUsersTableMap::COL_IDS_FILES);
            $criteria->addSelectColumn(EsUsersTableMap::COL_ID_COVER_PICTURE);
            $criteria->addSelectColumn(EsUsersTableMap::COL_ID_CITY);
            $criteria->addSelectColumn(EsUsersTableMap::COL_ID_PROVINCIA);
            $criteria->addSelectColumn(EsUsersTableMap::COL_ID_ROLE);
            $criteria->addSelectColumn(EsUsersTableMap::COL_SIGNIN_METHOD);
            $criteria->addSelectColumn(EsUsersTableMap::COL_UID);
            $criteria->addSelectColumn(EsUsersTableMap::COL_COUNTRY_CODE);
            $criteria->addSelectColumn(EsUsersTableMap::COL_AUTHY_ID);
            $criteria->addSelectColumn(EsUsersTableMap::COL_VERIFIED);
            $criteria->addSelectColumn(EsUsersTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(EsUsersTableMap::COL_STATUS);
            $criteria->addSelectColumn(EsUsersTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(EsUsersTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_user');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.lastname');
            $criteria->addSelectColumn($alias . '.username');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.address');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.birthdate');
            $criteria->addSelectColumn($alias . '.age');
            $criteria->addSelectColumn($alias . '.carnet');
            $criteria->addSelectColumn($alias . '.sexo');
            $criteria->addSelectColumn($alias . '.phone_1');
            $criteria->addSelectColumn($alias . '.phone_2');
            $criteria->addSelectColumn($alias . '.cellphone_1');
            $criteria->addSelectColumn($alias . '.cellphone_2');
            $criteria->addSelectColumn($alias . '.ids_files');
            $criteria->addSelectColumn($alias . '.id_cover_picture');
            $criteria->addSelectColumn($alias . '.id_city');
            $criteria->addSelectColumn($alias . '.id_provincia');
            $criteria->addSelectColumn($alias . '.id_role');
            $criteria->addSelectColumn($alias . '.signin_method');
            $criteria->addSelectColumn($alias . '.uid');
            $criteria->addSelectColumn($alias . '.country_code');
            $criteria->addSelectColumn($alias . '.authy_id');
            $criteria->addSelectColumn($alias . '.verified');
            $criteria->addSelectColumn($alias . '.change_count');
            $criteria->addSelectColumn($alias . '.status');
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
        return Propel::getServiceContainer()->getDatabaseMap(EsUsersTableMap::DATABASE_NAME)->getTable(EsUsersTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EsUsersTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EsUsersTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EsUsersTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a EsUsers or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or EsUsers object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EsUsersTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \EsUsers) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EsUsersTableMap::DATABASE_NAME);
            $criteria->add(EsUsersTableMap::COL_ID_USER, (array) $values, Criteria::IN);
        }

        $query = EsUsersQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EsUsersTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EsUsersTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the es_users table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EsUsersQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a EsUsers or Criteria object.
     *
     * @param mixed               $criteria Criteria or EsUsers object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsUsersTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from EsUsers object
        }

        if ($criteria->containsKey(EsUsersTableMap::COL_ID_USER) && $criteria->keyContainsValue(EsUsersTableMap::COL_ID_USER) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EsUsersTableMap::COL_ID_USER.')');
        }


        // Set the correct dbName
        $query = EsUsersQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EsUsersTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EsUsersTableMap::buildTableMap();
