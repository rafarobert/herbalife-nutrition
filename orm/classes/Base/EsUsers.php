<?php

namespace Base;

use \EsCities as ChildEsCities;
use \EsCitiesQuery as ChildEsCitiesQuery;
use \EsDomains as ChildEsDomains;
use \EsDomainsQuery as ChildEsDomainsQuery;
use \EsFiles as ChildEsFiles;
use \EsFilesQuery as ChildEsFilesQuery;
use \EsModules as ChildEsModules;
use \EsModulesQuery as ChildEsModulesQuery;
use \EsProvincias as ChildEsProvincias;
use \EsProvinciasQuery as ChildEsProvinciasQuery;
use \EsRoles as ChildEsRoles;
use \EsRolesQuery as ChildEsRolesQuery;
use \EsSessions as ChildEsSessions;
use \EsSessionsQuery as ChildEsSessionsQuery;
use \EsTables as ChildEsTables;
use \EsTablesQuery as ChildEsTablesQuery;
use \EsTablesRoles as ChildEsTablesRoles;
use \EsTablesRolesQuery as ChildEsTablesRolesQuery;
use \EsUsers as ChildEsUsers;
use \EsUsersQuery as ChildEsUsersQuery;
use \EsUsersRoles as ChildEsUsersRoles;
use \EsUsersRolesQuery as ChildEsUsersRolesQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\EsCitiesTableMap;
use Map\EsDomainsTableMap;
use Map\EsFilesTableMap;
use Map\EsModulesTableMap;
use Map\EsProvinciasTableMap;
use Map\EsRolesTableMap;
use Map\EsSessionsTableMap;
use Map\EsTablesRolesTableMap;
use Map\EsTablesTableMap;
use Map\EsUsersRolesTableMap;
use Map\EsUsersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'es_users' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class EsUsers implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\EsUsersTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id_user field.
     *
     * @var        int
     */
    protected $id_user;

    /**
     * The value for the name field.
     *
     * @var        string
     */
    protected $name;

    /**
     * The value for the lastname field.
     *
     * @var        string
     */
    protected $lastname;

    /**
     * The value for the username field.
     *
     * @var        string
     */
    protected $username;

    /**
     * The value for the email field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $email;

    /**
     * The value for the address field.
     *
     * @var        string
     */
    protected $address;

    /**
     * The value for the password field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $password;

    /**
     * The value for the birthdate field.
     *
     * @var        DateTime
     */
    protected $birthdate;

    /**
     * The value for the age field.
     *
     * @var        int
     */
    protected $age;

    /**
     * The value for the carnet field.
     *
     * @var        string
     */
    protected $carnet;

    /**
     * The value for the sexo field.
     *
     * @var        string
     */
    protected $sexo;

    /**
     * The value for the phone_1 field.
     *
     * @var        string
     */
    protected $phone_1;

    /**
     * The value for the phone_2 field.
     *
     * @var        string
     */
    protected $phone_2;

    /**
     * The value for the cellphone_1 field.
     *
     * @var        string
     */
    protected $cellphone_1;

    /**
     * The value for the cellphone_2 field.
     *
     * @var        string
     */
    protected $cellphone_2;

    /**
     * The value for the ids_files field.
     *
     * @var        string
     */
    protected $ids_files;

    /**
     * The value for the id_cover_picture field.
     *
     * @var        int
     */
    protected $id_cover_picture;

    /**
     * The value for the id_city field.
     *
     * @var        int
     */
    protected $id_city;

    /**
     * The value for the id_provincia field.
     *
     * @var        int
     */
    protected $id_provincia;

    /**
     * The value for the id_role field.
     *
     * @var        int
     */
    protected $id_role;

    /**
     * The value for the signin_method field.
     *
     * @var        string
     */
    protected $signin_method;

    /**
     * The value for the uid field.
     *
     * @var        string
     */
    protected $uid;

    /**
     * The value for the country_code field.
     *
     * @var        string
     */
    protected $country_code;

    /**
     * The value for the authy_id field.
     *
     * @var        string
     */
    protected $authy_id;

    /**
     * The value for the verified field.
     *
     * @var        boolean
     */
    protected $verified;

    /**
     * The value for the change_count field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $change_count;

    /**
     * The value for the status field.
     *
     * Note: this column has a database default value of: 'ENABLED'
     * @var        string
     */
    protected $status;

    /**
     * The value for the date_modified field.
     *
     * @var        DateTime
     */
    protected $date_modified;

    /**
     * The value for the date_created field.
     *
     * @var        DateTime
     */
    protected $date_created;

    /**
     * @var        ChildEsRoles
     */
    protected $aEsRolesRelatedByIdRole;

    /**
     * @var        ChildEsProvincias
     */
    protected $aEsProvinciasRelatedByIdProvincia;

    /**
     * @var        ChildEsFiles
     */
    protected $aEsFilesRelatedByIdCoverPicture;

    /**
     * @var        ChildEsCities
     */
    protected $aEsCitiesRelatedByIdCity;

    /**
     * @var        ObjectCollection|ChildEsCities[] Collection to store aggregation of ChildEsCities objects.
     */
    protected $collEsCitiessRelatedByIdUserCreated;
    protected $collEsCitiessRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildEsCities[] Collection to store aggregation of ChildEsCities objects.
     */
    protected $collEsCitiessRelatedByIdUserModified;
    protected $collEsCitiessRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildEsDomains[] Collection to store aggregation of ChildEsDomains objects.
     */
    protected $collEsDomainssRelatedByIdUserCreated;
    protected $collEsDomainssRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildEsDomains[] Collection to store aggregation of ChildEsDomains objects.
     */
    protected $collEsDomainssRelatedByIdUserModified;
    protected $collEsDomainssRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildEsFiles[] Collection to store aggregation of ChildEsFiles objects.
     */
    protected $collEsFilessRelatedByIdUserCreated;
    protected $collEsFilessRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildEsFiles[] Collection to store aggregation of ChildEsFiles objects.
     */
    protected $collEsFilessRelatedByIdUserModified;
    protected $collEsFilessRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildEsModules[] Collection to store aggregation of ChildEsModules objects.
     */
    protected $collEsModulessRelatedByIdUserModified;
    protected $collEsModulessRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildEsModules[] Collection to store aggregation of ChildEsModules objects.
     */
    protected $collEsModulessRelatedByIdUserCreated;
    protected $collEsModulessRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildEsProvincias[] Collection to store aggregation of ChildEsProvincias objects.
     */
    protected $collEsProvinciassRelatedByIdUserCreated;
    protected $collEsProvinciassRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildEsProvincias[] Collection to store aggregation of ChildEsProvincias objects.
     */
    protected $collEsProvinciassRelatedByIdUserModified;
    protected $collEsProvinciassRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildEsRoles[] Collection to store aggregation of ChildEsRoles objects.
     */
    protected $collEsRolessRelatedByIdUserCreated;
    protected $collEsRolessRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildEsRoles[] Collection to store aggregation of ChildEsRoles objects.
     */
    protected $collEsRolessRelatedByIdUserModified;
    protected $collEsRolessRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildEsSessions[] Collection to store aggregation of ChildEsSessions objects.
     */
    protected $collEsSessionss;
    protected $collEsSessionssPartial;

    /**
     * @var        ObjectCollection|ChildEsTables[] Collection to store aggregation of ChildEsTables objects.
     */
    protected $collEsTablessRelatedByIdUserCreated;
    protected $collEsTablessRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildEsTables[] Collection to store aggregation of ChildEsTables objects.
     */
    protected $collEsTablessRelatedByIdUserModified;
    protected $collEsTablessRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildEsTablesRoles[] Collection to store aggregation of ChildEsTablesRoles objects.
     */
    protected $collEsTablesRolessRelatedByIdUserCreated;
    protected $collEsTablesRolessRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildEsTablesRoles[] Collection to store aggregation of ChildEsTablesRoles objects.
     */
    protected $collEsTablesRolessRelatedByIdUserModified;
    protected $collEsTablesRolessRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildEsUsersRoles[] Collection to store aggregation of ChildEsUsersRoles objects.
     */
    protected $collEsUsersRolessRelatedByIdUserCreated;
    protected $collEsUsersRolessRelatedByIdUserCreatedPartial;

    /**
     * @var        ObjectCollection|ChildEsUsersRoles[] Collection to store aggregation of ChildEsUsersRoles objects.
     */
    protected $collEsUsersRolessRelatedByIdUserModified;
    protected $collEsUsersRolessRelatedByIdUserModifiedPartial;

    /**
     * @var        ObjectCollection|ChildEsUsersRoles[] Collection to store aggregation of ChildEsUsersRoles objects.
     */
    protected $collEsUsersRolessRelatedByIdUser;
    protected $collEsUsersRolessRelatedByIdUserPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsCities[]
     */
    protected $esCitiessRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsCities[]
     */
    protected $esCitiessRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsDomains[]
     */
    protected $esDomainssRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsDomains[]
     */
    protected $esDomainssRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsFiles[]
     */
    protected $esFilessRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsFiles[]
     */
    protected $esFilessRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsModules[]
     */
    protected $esModulessRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsModules[]
     */
    protected $esModulessRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsProvincias[]
     */
    protected $esProvinciassRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsProvincias[]
     */
    protected $esProvinciassRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsRoles[]
     */
    protected $esRolessRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsRoles[]
     */
    protected $esRolessRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsSessions[]
     */
    protected $esSessionssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsTables[]
     */
    protected $esTablessRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsTables[]
     */
    protected $esTablessRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsTablesRoles[]
     */
    protected $esTablesRolessRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsTablesRoles[]
     */
    protected $esTablesRolessRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsUsersRoles[]
     */
    protected $esUsersRolessRelatedByIdUserCreatedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsUsersRoles[]
     */
    protected $esUsersRolessRelatedByIdUserModifiedScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsUsersRoles[]
     */
    protected $esUsersRolessRelatedByIdUserScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->email = '';
        $this->password = '';
        $this->change_count = 0;
        $this->status = 'ENABLED';
    }

    /**
     * Initializes internal state of Base\EsUsers object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>EsUsers</code> instance.  If
     * <code>obj</code> is an instance of <code>EsUsers</code>, delegates to
     * <code>equals(EsUsers)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|EsUsers The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id_user] column value.
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [lastname] column value.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Get the [username] column value.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [address] column value.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the [optionally formatted] temporal [birthdate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBirthdate($format = NULL)
    {
        if ($format === null) {
            return $this->birthdate;
        } else {
            return $this->birthdate instanceof \DateTimeInterface ? $this->birthdate->format($format) : null;
        }
    }

    /**
     * Get the [age] column value.
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Get the [carnet] column value.
     *
     * @return string
     */
    public function getCarnet()
    {
        return $this->carnet;
    }

    /**
     * Get the [sexo] column value.
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Get the [phone_1] column value.
     *
     * @return string
     */
    public function getPhone1()
    {
        return $this->phone_1;
    }

    /**
     * Get the [phone_2] column value.
     *
     * @return string
     */
    public function getPhone2()
    {
        return $this->phone_2;
    }

    /**
     * Get the [cellphone_1] column value.
     *
     * @return string
     */
    public function getCellphone1()
    {
        return $this->cellphone_1;
    }

    /**
     * Get the [cellphone_2] column value.
     *
     * @return string
     */
    public function getCellphone2()
    {
        return $this->cellphone_2;
    }

    /**
     * Get the [ids_files] column value.
     *
     * @return string
     */
    public function getIdsFiles()
    {
        return $this->ids_files;
    }

    /**
     * Get the [id_cover_picture] column value.
     *
     * @return int
     */
    public function getIdCoverPicture()
    {
        return $this->id_cover_picture;
    }

    /**
     * Get the [id_city] column value.
     *
     * @return int
     */
    public function getIdCity()
    {
        return $this->id_city;
    }

    /**
     * Get the [id_provincia] column value.
     *
     * @return int
     */
    public function getIdProvincia()
    {
        return $this->id_provincia;
    }

    /**
     * Get the [id_role] column value.
     *
     * @return int
     */
    public function getIdRole()
    {
        return $this->id_role;
    }

    /**
     * Get the [signin_method] column value.
     *
     * @return string
     */
    public function getSigninMethod()
    {
        return $this->signin_method;
    }

    /**
     * Get the [uid] column value.
     *
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Get the [country_code] column value.
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * Get the [authy_id] column value.
     *
     * @return string
     */
    public function getAuthyId()
    {
        return $this->authy_id;
    }

    /**
     * Get the [verified] column value.
     *
     * @return boolean
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * Get the [verified] column value.
     *
     * @return boolean
     */
    public function isVerified()
    {
        return $this->getVerified();
    }

    /**
     * Get the [change_count] column value.
     *
     * @return int
     */
    public function getChangeCount()
    {
        return $this->change_count;
    }

    /**
     * Get the [status] column value.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [optionally formatted] temporal [date_modified] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateModified($format = NULL)
    {
        if ($format === null) {
            return $this->date_modified;
        } else {
            return $this->date_modified instanceof \DateTimeInterface ? $this->date_modified->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [date_created] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateCreated($format = NULL)
    {
        if ($format === null) {
            return $this->date_created;
        } else {
            return $this->date_created instanceof \DateTimeInterface ? $this->date_created->format($format) : null;
        }
    }

    /**
     * Set the value of [id_user] column.
     *
     * @param int $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setIdUser($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user !== $v) {
            $this->id_user = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_ID_USER] = true;
        }

        return $this;
    } // setIdUser()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [lastname] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setLastname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lastname !== $v) {
            $this->lastname = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_LASTNAME] = true;
        }

        return $this;
    } // setLastname()

    /**
     * Set the value of [username] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setUsername($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->username !== $v) {
            $this->username = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_USERNAME] = true;
        }

        return $this;
    } // setUsername()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [address] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address !== $v) {
            $this->address = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_ADDRESS] = true;
        }

        return $this;
    } // setAddress()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_PASSWORD] = true;
        }

        return $this;
    } // setPassword()

    /**
     * Sets the value of [birthdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setBirthdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->birthdate !== null || $dt !== null) {
            if ($this->birthdate === null || $dt === null || $dt->format("Y-m-d") !== $this->birthdate->format("Y-m-d")) {
                $this->birthdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EsUsersTableMap::COL_BIRTHDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setBirthdate()

    /**
     * Set the value of [age] column.
     *
     * @param int $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setAge($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->age !== $v) {
            $this->age = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_AGE] = true;
        }

        return $this;
    } // setAge()

    /**
     * Set the value of [carnet] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setCarnet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->carnet !== $v) {
            $this->carnet = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_CARNET] = true;
        }

        return $this;
    } // setCarnet()

    /**
     * Set the value of [sexo] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setSexo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sexo !== $v) {
            $this->sexo = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_SEXO] = true;
        }

        return $this;
    } // setSexo()

    /**
     * Set the value of [phone_1] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setPhone1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone_1 !== $v) {
            $this->phone_1 = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_PHONE_1] = true;
        }

        return $this;
    } // setPhone1()

    /**
     * Set the value of [phone_2] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setPhone2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone_2 !== $v) {
            $this->phone_2 = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_PHONE_2] = true;
        }

        return $this;
    } // setPhone2()

    /**
     * Set the value of [cellphone_1] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setCellphone1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cellphone_1 !== $v) {
            $this->cellphone_1 = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_CELLPHONE_1] = true;
        }

        return $this;
    } // setCellphone1()

    /**
     * Set the value of [cellphone_2] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setCellphone2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cellphone_2 !== $v) {
            $this->cellphone_2 = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_CELLPHONE_2] = true;
        }

        return $this;
    } // setCellphone2()

    /**
     * Set the value of [ids_files] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setIdsFiles($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ids_files !== $v) {
            $this->ids_files = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_IDS_FILES] = true;
        }

        return $this;
    } // setIdsFiles()

    /**
     * Set the value of [id_cover_picture] column.
     *
     * @param int $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setIdCoverPicture($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_cover_picture !== $v) {
            $this->id_cover_picture = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_ID_COVER_PICTURE] = true;
        }

        if ($this->aEsFilesRelatedByIdCoverPicture !== null && $this->aEsFilesRelatedByIdCoverPicture->getIdFile() !== $v) {
            $this->aEsFilesRelatedByIdCoverPicture = null;
        }

        return $this;
    } // setIdCoverPicture()

    /**
     * Set the value of [id_city] column.
     *
     * @param int $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setIdCity($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_city !== $v) {
            $this->id_city = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_ID_CITY] = true;
        }

        if ($this->aEsCitiesRelatedByIdCity !== null && $this->aEsCitiesRelatedByIdCity->getIdCity() !== $v) {
            $this->aEsCitiesRelatedByIdCity = null;
        }

        return $this;
    } // setIdCity()

    /**
     * Set the value of [id_provincia] column.
     *
     * @param int $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setIdProvincia($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_provincia !== $v) {
            $this->id_provincia = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_ID_PROVINCIA] = true;
        }

        if ($this->aEsProvinciasRelatedByIdProvincia !== null && $this->aEsProvinciasRelatedByIdProvincia->getIdProvincia() !== $v) {
            $this->aEsProvinciasRelatedByIdProvincia = null;
        }

        return $this;
    } // setIdProvincia()

    /**
     * Set the value of [id_role] column.
     *
     * @param int $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setIdRole($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_role !== $v) {
            $this->id_role = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_ID_ROLE] = true;
        }

        if ($this->aEsRolesRelatedByIdRole !== null && $this->aEsRolesRelatedByIdRole->getIdRole() !== $v) {
            $this->aEsRolesRelatedByIdRole = null;
        }

        return $this;
    } // setIdRole()

    /**
     * Set the value of [signin_method] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setSigninMethod($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->signin_method !== $v) {
            $this->signin_method = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_SIGNIN_METHOD] = true;
        }

        return $this;
    } // setSigninMethod()

    /**
     * Set the value of [uid] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setUid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid !== $v) {
            $this->uid = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_UID] = true;
        }

        return $this;
    } // setUid()

    /**
     * Set the value of [country_code] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setCountryCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->country_code !== $v) {
            $this->country_code = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_COUNTRY_CODE] = true;
        }

        return $this;
    } // setCountryCode()

    /**
     * Set the value of [authy_id] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setAuthyId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->authy_id !== $v) {
            $this->authy_id = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_AUTHY_ID] = true;
        }

        return $this;
    } // setAuthyId()

    /**
     * Sets the value of the [verified] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setVerified($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->verified !== $v) {
            $this->verified = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_VERIFIED] = true;
        }

        return $this;
    } // setVerified()

    /**
     * Set the value of [change_count] column.
     *
     * @param int $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setChangeCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->change_count !== $v) {
            $this->change_count = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_CHANGE_COUNT] = true;
        }

        return $this;
    } // setChangeCount()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[EsUsersTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Sets the value of [date_modified] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_modified !== null || $dt !== null) {
            if ($this->date_modified === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_modified->format("Y-m-d H:i:s.u")) {
                $this->date_modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EsUsersTableMap::COL_DATE_MODIFIED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateModified()

    /**
     * Sets the value of [date_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function setDateCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_created !== null || $dt !== null) {
            if ($this->date_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_created->format("Y-m-d H:i:s.u")) {
                $this->date_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EsUsersTableMap::COL_DATE_CREATED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateCreated()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->email !== '') {
                return false;
            }

            if ($this->password !== '') {
                return false;
            }

            if ($this->change_count !== 0) {
                return false;
            }

            if ($this->status !== 'ENABLED') {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : EsUsersTableMap::translateFieldName('IdUser', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : EsUsersTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : EsUsersTableMap::translateFieldName('Lastname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lastname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : EsUsersTableMap::translateFieldName('Username', TableMap::TYPE_PHPNAME, $indexType)];
            $this->username = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : EsUsersTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : EsUsersTableMap::translateFieldName('Address', TableMap::TYPE_PHPNAME, $indexType)];
            $this->address = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : EsUsersTableMap::translateFieldName('Password', TableMap::TYPE_PHPNAME, $indexType)];
            $this->password = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : EsUsersTableMap::translateFieldName('Birthdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->birthdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : EsUsersTableMap::translateFieldName('Age', TableMap::TYPE_PHPNAME, $indexType)];
            $this->age = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : EsUsersTableMap::translateFieldName('Carnet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->carnet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : EsUsersTableMap::translateFieldName('Sexo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sexo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : EsUsersTableMap::translateFieldName('Phone1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone_1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : EsUsersTableMap::translateFieldName('Phone2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone_2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : EsUsersTableMap::translateFieldName('Cellphone1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cellphone_1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : EsUsersTableMap::translateFieldName('Cellphone2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cellphone_2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : EsUsersTableMap::translateFieldName('IdsFiles', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ids_files = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : EsUsersTableMap::translateFieldName('IdCoverPicture', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_cover_picture = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : EsUsersTableMap::translateFieldName('IdCity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_city = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : EsUsersTableMap::translateFieldName('IdProvincia', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_provincia = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : EsUsersTableMap::translateFieldName('IdRole', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_role = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : EsUsersTableMap::translateFieldName('SigninMethod', TableMap::TYPE_PHPNAME, $indexType)];
            $this->signin_method = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : EsUsersTableMap::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : EsUsersTableMap::translateFieldName('CountryCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->country_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : EsUsersTableMap::translateFieldName('AuthyId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->authy_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : EsUsersTableMap::translateFieldName('Verified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->verified = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : EsUsersTableMap::translateFieldName('ChangeCount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->change_count = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : EsUsersTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : EsUsersTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : EsUsersTableMap::translateFieldName('DateCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 29; // 29 = EsUsersTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\EsUsers'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aEsFilesRelatedByIdCoverPicture !== null && $this->id_cover_picture !== $this->aEsFilesRelatedByIdCoverPicture->getIdFile()) {
            $this->aEsFilesRelatedByIdCoverPicture = null;
        }
        if ($this->aEsCitiesRelatedByIdCity !== null && $this->id_city !== $this->aEsCitiesRelatedByIdCity->getIdCity()) {
            $this->aEsCitiesRelatedByIdCity = null;
        }
        if ($this->aEsProvinciasRelatedByIdProvincia !== null && $this->id_provincia !== $this->aEsProvinciasRelatedByIdProvincia->getIdProvincia()) {
            $this->aEsProvinciasRelatedByIdProvincia = null;
        }
        if ($this->aEsRolesRelatedByIdRole !== null && $this->id_role !== $this->aEsRolesRelatedByIdRole->getIdRole()) {
            $this->aEsRolesRelatedByIdRole = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EsUsersTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildEsUsersQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aEsRolesRelatedByIdRole = null;
            $this->aEsProvinciasRelatedByIdProvincia = null;
            $this->aEsFilesRelatedByIdCoverPicture = null;
            $this->aEsCitiesRelatedByIdCity = null;
            $this->collEsCitiessRelatedByIdUserCreated = null;

            $this->collEsCitiessRelatedByIdUserModified = null;

            $this->collEsDomainssRelatedByIdUserCreated = null;

            $this->collEsDomainssRelatedByIdUserModified = null;

            $this->collEsFilessRelatedByIdUserCreated = null;

            $this->collEsFilessRelatedByIdUserModified = null;

            $this->collEsModulessRelatedByIdUserModified = null;

            $this->collEsModulessRelatedByIdUserCreated = null;

            $this->collEsProvinciassRelatedByIdUserCreated = null;

            $this->collEsProvinciassRelatedByIdUserModified = null;

            $this->collEsRolessRelatedByIdUserCreated = null;

            $this->collEsRolessRelatedByIdUserModified = null;

            $this->collEsSessionss = null;

            $this->collEsTablessRelatedByIdUserCreated = null;

            $this->collEsTablessRelatedByIdUserModified = null;

            $this->collEsTablesRolessRelatedByIdUserCreated = null;

            $this->collEsTablesRolessRelatedByIdUserModified = null;

            $this->collEsUsersRolessRelatedByIdUserCreated = null;

            $this->collEsUsersRolessRelatedByIdUserModified = null;

            $this->collEsUsersRolessRelatedByIdUser = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see EsUsers::setDeleted()
     * @see EsUsers::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsUsersTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildEsUsersQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsUsersTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                EsUsersTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aEsRolesRelatedByIdRole !== null) {
                if ($this->aEsRolesRelatedByIdRole->isModified() || $this->aEsRolesRelatedByIdRole->isNew()) {
                    $affectedRows += $this->aEsRolesRelatedByIdRole->save($con);
                }
                $this->setEsRolesRelatedByIdRole($this->aEsRolesRelatedByIdRole);
            }

            if ($this->aEsProvinciasRelatedByIdProvincia !== null) {
                if ($this->aEsProvinciasRelatedByIdProvincia->isModified() || $this->aEsProvinciasRelatedByIdProvincia->isNew()) {
                    $affectedRows += $this->aEsProvinciasRelatedByIdProvincia->save($con);
                }
                $this->setEsProvinciasRelatedByIdProvincia($this->aEsProvinciasRelatedByIdProvincia);
            }

            if ($this->aEsFilesRelatedByIdCoverPicture !== null) {
                if ($this->aEsFilesRelatedByIdCoverPicture->isModified() || $this->aEsFilesRelatedByIdCoverPicture->isNew()) {
                    $affectedRows += $this->aEsFilesRelatedByIdCoverPicture->save($con);
                }
                $this->setEsFilesRelatedByIdCoverPicture($this->aEsFilesRelatedByIdCoverPicture);
            }

            if ($this->aEsCitiesRelatedByIdCity !== null) {
                if ($this->aEsCitiesRelatedByIdCity->isModified() || $this->aEsCitiesRelatedByIdCity->isNew()) {
                    $affectedRows += $this->aEsCitiesRelatedByIdCity->save($con);
                }
                $this->setEsCitiesRelatedByIdCity($this->aEsCitiesRelatedByIdCity);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->esCitiessRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->esCitiessRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \EsCitiesQuery::create()
                        ->filterByPrimaryKeys($this->esCitiessRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->esCitiessRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collEsCitiessRelatedByIdUserCreated !== null) {
                foreach ($this->collEsCitiessRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esCitiessRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->esCitiessRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \EsCitiesQuery::create()
                        ->filterByPrimaryKeys($this->esCitiessRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->esCitiessRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collEsCitiessRelatedByIdUserModified !== null) {
                foreach ($this->collEsCitiessRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esDomainssRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->esDomainssRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \EsDomainsQuery::create()
                        ->filterByPrimaryKeys($this->esDomainssRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->esDomainssRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collEsDomainssRelatedByIdUserCreated !== null) {
                foreach ($this->collEsDomainssRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esDomainssRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->esDomainssRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \EsDomainsQuery::create()
                        ->filterByPrimaryKeys($this->esDomainssRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->esDomainssRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collEsDomainssRelatedByIdUserModified !== null) {
                foreach ($this->collEsDomainssRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esFilessRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->esFilessRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \EsFilesQuery::create()
                        ->filterByPrimaryKeys($this->esFilessRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->esFilessRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collEsFilessRelatedByIdUserCreated !== null) {
                foreach ($this->collEsFilessRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esFilessRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->esFilessRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \EsFilesQuery::create()
                        ->filterByPrimaryKeys($this->esFilessRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->esFilessRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collEsFilessRelatedByIdUserModified !== null) {
                foreach ($this->collEsFilessRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esModulessRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->esModulessRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \EsModulesQuery::create()
                        ->filterByPrimaryKeys($this->esModulessRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->esModulessRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collEsModulessRelatedByIdUserModified !== null) {
                foreach ($this->collEsModulessRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esModulessRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->esModulessRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \EsModulesQuery::create()
                        ->filterByPrimaryKeys($this->esModulessRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->esModulessRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collEsModulessRelatedByIdUserCreated !== null) {
                foreach ($this->collEsModulessRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esProvinciassRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->esProvinciassRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \EsProvinciasQuery::create()
                        ->filterByPrimaryKeys($this->esProvinciassRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->esProvinciassRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collEsProvinciassRelatedByIdUserCreated !== null) {
                foreach ($this->collEsProvinciassRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esProvinciassRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->esProvinciassRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \EsProvinciasQuery::create()
                        ->filterByPrimaryKeys($this->esProvinciassRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->esProvinciassRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collEsProvinciassRelatedByIdUserModified !== null) {
                foreach ($this->collEsProvinciassRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esRolessRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->esRolessRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    foreach ($this->esRolessRelatedByIdUserCreatedScheduledForDeletion as $esRolesRelatedByIdUserCreated) {
                        // need to save related object because we set the relation to null
                        $esRolesRelatedByIdUserCreated->save($con);
                    }
                    $this->esRolessRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collEsRolessRelatedByIdUserCreated !== null) {
                foreach ($this->collEsRolessRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esRolessRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->esRolessRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    foreach ($this->esRolessRelatedByIdUserModifiedScheduledForDeletion as $esRolesRelatedByIdUserModified) {
                        // need to save related object because we set the relation to null
                        $esRolesRelatedByIdUserModified->save($con);
                    }
                    $this->esRolessRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collEsRolessRelatedByIdUserModified !== null) {
                foreach ($this->collEsRolessRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esSessionssScheduledForDeletion !== null) {
                if (!$this->esSessionssScheduledForDeletion->isEmpty()) {
                    foreach ($this->esSessionssScheduledForDeletion as $esSessions) {
                        // need to save related object because we set the relation to null
                        $esSessions->save($con);
                    }
                    $this->esSessionssScheduledForDeletion = null;
                }
            }

            if ($this->collEsSessionss !== null) {
                foreach ($this->collEsSessionss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esTablessRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->esTablessRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \EsTablesQuery::create()
                        ->filterByPrimaryKeys($this->esTablessRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->esTablessRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collEsTablessRelatedByIdUserCreated !== null) {
                foreach ($this->collEsTablessRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esTablessRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->esTablessRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \EsTablesQuery::create()
                        ->filterByPrimaryKeys($this->esTablessRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->esTablessRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collEsTablessRelatedByIdUserModified !== null) {
                foreach ($this->collEsTablessRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esTablesRolessRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->esTablesRolessRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \EsTablesRolesQuery::create()
                        ->filterByPrimaryKeys($this->esTablesRolessRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->esTablesRolessRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collEsTablesRolessRelatedByIdUserCreated !== null) {
                foreach ($this->collEsTablesRolessRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esTablesRolessRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->esTablesRolessRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \EsTablesRolesQuery::create()
                        ->filterByPrimaryKeys($this->esTablesRolessRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->esTablesRolessRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collEsTablesRolessRelatedByIdUserModified !== null) {
                foreach ($this->collEsTablesRolessRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esUsersRolessRelatedByIdUserCreatedScheduledForDeletion !== null) {
                if (!$this->esUsersRolessRelatedByIdUserCreatedScheduledForDeletion->isEmpty()) {
                    \EsUsersRolesQuery::create()
                        ->filterByPrimaryKeys($this->esUsersRolessRelatedByIdUserCreatedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->esUsersRolessRelatedByIdUserCreatedScheduledForDeletion = null;
                }
            }

            if ($this->collEsUsersRolessRelatedByIdUserCreated !== null) {
                foreach ($this->collEsUsersRolessRelatedByIdUserCreated as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esUsersRolessRelatedByIdUserModifiedScheduledForDeletion !== null) {
                if (!$this->esUsersRolessRelatedByIdUserModifiedScheduledForDeletion->isEmpty()) {
                    \EsUsersRolesQuery::create()
                        ->filterByPrimaryKeys($this->esUsersRolessRelatedByIdUserModifiedScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->esUsersRolessRelatedByIdUserModifiedScheduledForDeletion = null;
                }
            }

            if ($this->collEsUsersRolessRelatedByIdUserModified !== null) {
                foreach ($this->collEsUsersRolessRelatedByIdUserModified as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esUsersRolessRelatedByIdUserScheduledForDeletion !== null) {
                if (!$this->esUsersRolessRelatedByIdUserScheduledForDeletion->isEmpty()) {
                    foreach ($this->esUsersRolessRelatedByIdUserScheduledForDeletion as $esUsersRolesRelatedByIdUser) {
                        // need to save related object because we set the relation to null
                        $esUsersRolesRelatedByIdUser->save($con);
                    }
                    $this->esUsersRolessRelatedByIdUserScheduledForDeletion = null;
                }
            }

            if ($this->collEsUsersRolessRelatedByIdUser !== null) {
                foreach ($this->collEsUsersRolessRelatedByIdUser as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[EsUsersTableMap::COL_ID_USER] = true;
        if (null !== $this->id_user) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EsUsersTableMap::COL_ID_USER . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EsUsersTableMap::COL_ID_USER)) {
            $modifiedColumns[':p' . $index++]  = 'id_user';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_LASTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'lastname';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_USERNAME)) {
            $modifiedColumns[':p' . $index++]  = 'username';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'address';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = 'password';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_BIRTHDATE)) {
            $modifiedColumns[':p' . $index++]  = 'birthdate';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_AGE)) {
            $modifiedColumns[':p' . $index++]  = 'age';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_CARNET)) {
            $modifiedColumns[':p' . $index++]  = 'carnet';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_SEXO)) {
            $modifiedColumns[':p' . $index++]  = 'sexo';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_PHONE_1)) {
            $modifiedColumns[':p' . $index++]  = 'phone_1';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_PHONE_2)) {
            $modifiedColumns[':p' . $index++]  = 'phone_2';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_CELLPHONE_1)) {
            $modifiedColumns[':p' . $index++]  = 'cellphone_1';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_CELLPHONE_2)) {
            $modifiedColumns[':p' . $index++]  = 'cellphone_2';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_IDS_FILES)) {
            $modifiedColumns[':p' . $index++]  = 'ids_files';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_ID_COVER_PICTURE)) {
            $modifiedColumns[':p' . $index++]  = 'id_cover_picture';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_ID_CITY)) {
            $modifiedColumns[':p' . $index++]  = 'id_city';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_ID_PROVINCIA)) {
            $modifiedColumns[':p' . $index++]  = 'id_provincia';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_ID_ROLE)) {
            $modifiedColumns[':p' . $index++]  = 'id_role';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_SIGNIN_METHOD)) {
            $modifiedColumns[':p' . $index++]  = 'signin_method';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_UID)) {
            $modifiedColumns[':p' . $index++]  = 'uid';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_COUNTRY_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'country_code';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_AUTHY_ID)) {
            $modifiedColumns[':p' . $index++]  = 'authy_id';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_VERIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'verified';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_CHANGE_COUNT)) {
            $modifiedColumns[':p' . $index++]  = 'change_count';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_DATE_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'date_created';
        }

        $sql = sprintf(
            'INSERT INTO es_users (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_user':
                        $stmt->bindValue($identifier, $this->id_user, PDO::PARAM_INT);
                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'lastname':
                        $stmt->bindValue($identifier, $this->lastname, PDO::PARAM_STR);
                        break;
                    case 'username':
                        $stmt->bindValue($identifier, $this->username, PDO::PARAM_STR);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'address':
                        $stmt->bindValue($identifier, $this->address, PDO::PARAM_STR);
                        break;
                    case 'password':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case 'birthdate':
                        $stmt->bindValue($identifier, $this->birthdate ? $this->birthdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'age':
                        $stmt->bindValue($identifier, $this->age, PDO::PARAM_INT);
                        break;
                    case 'carnet':
                        $stmt->bindValue($identifier, $this->carnet, PDO::PARAM_STR);
                        break;
                    case 'sexo':
                        $stmt->bindValue($identifier, $this->sexo, PDO::PARAM_STR);
                        break;
                    case 'phone_1':
                        $stmt->bindValue($identifier, $this->phone_1, PDO::PARAM_STR);
                        break;
                    case 'phone_2':
                        $stmt->bindValue($identifier, $this->phone_2, PDO::PARAM_STR);
                        break;
                    case 'cellphone_1':
                        $stmt->bindValue($identifier, $this->cellphone_1, PDO::PARAM_STR);
                        break;
                    case 'cellphone_2':
                        $stmt->bindValue($identifier, $this->cellphone_2, PDO::PARAM_STR);
                        break;
                    case 'ids_files':
                        $stmt->bindValue($identifier, $this->ids_files, PDO::PARAM_STR);
                        break;
                    case 'id_cover_picture':
                        $stmt->bindValue($identifier, $this->id_cover_picture, PDO::PARAM_INT);
                        break;
                    case 'id_city':
                        $stmt->bindValue($identifier, $this->id_city, PDO::PARAM_INT);
                        break;
                    case 'id_provincia':
                        $stmt->bindValue($identifier, $this->id_provincia, PDO::PARAM_INT);
                        break;
                    case 'id_role':
                        $stmt->bindValue($identifier, $this->id_role, PDO::PARAM_INT);
                        break;
                    case 'signin_method':
                        $stmt->bindValue($identifier, $this->signin_method, PDO::PARAM_STR);
                        break;
                    case 'uid':
                        $stmt->bindValue($identifier, $this->uid, PDO::PARAM_STR);
                        break;
                    case 'country_code':
                        $stmt->bindValue($identifier, $this->country_code, PDO::PARAM_STR);
                        break;
                    case 'authy_id':
                        $stmt->bindValue($identifier, $this->authy_id, PDO::PARAM_STR);
                        break;
                    case 'verified':
                        $stmt->bindValue($identifier, (int) $this->verified, PDO::PARAM_INT);
                        break;
                    case 'change_count':
                        $stmt->bindValue($identifier, $this->change_count, PDO::PARAM_INT);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case 'date_modified':
                        $stmt->bindValue($identifier, $this->date_modified ? $this->date_modified->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'date_created':
                        $stmt->bindValue($identifier, $this->date_created ? $this->date_created->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdUser($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EsUsersTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdUser();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getLastname();
                break;
            case 3:
                return $this->getUsername();
                break;
            case 4:
                return $this->getEmail();
                break;
            case 5:
                return $this->getAddress();
                break;
            case 6:
                return $this->getPassword();
                break;
            case 7:
                return $this->getBirthdate();
                break;
            case 8:
                return $this->getAge();
                break;
            case 9:
                return $this->getCarnet();
                break;
            case 10:
                return $this->getSexo();
                break;
            case 11:
                return $this->getPhone1();
                break;
            case 12:
                return $this->getPhone2();
                break;
            case 13:
                return $this->getCellphone1();
                break;
            case 14:
                return $this->getCellphone2();
                break;
            case 15:
                return $this->getIdsFiles();
                break;
            case 16:
                return $this->getIdCoverPicture();
                break;
            case 17:
                return $this->getIdCity();
                break;
            case 18:
                return $this->getIdProvincia();
                break;
            case 19:
                return $this->getIdRole();
                break;
            case 20:
                return $this->getSigninMethod();
                break;
            case 21:
                return $this->getUid();
                break;
            case 22:
                return $this->getCountryCode();
                break;
            case 23:
                return $this->getAuthyId();
                break;
            case 24:
                return $this->getVerified();
                break;
            case 25:
                return $this->getChangeCount();
                break;
            case 26:
                return $this->getStatus();
                break;
            case 27:
                return $this->getDateModified();
                break;
            case 28:
                return $this->getDateCreated();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['EsUsers'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['EsUsers'][$this->hashCode()] = true;
        $keys = EsUsersTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdUser(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getLastname(),
            $keys[3] => $this->getUsername(),
            $keys[4] => $this->getEmail(),
            $keys[5] => $this->getAddress(),
            $keys[6] => $this->getPassword(),
            $keys[7] => $this->getBirthdate(),
            $keys[8] => $this->getAge(),
            $keys[9] => $this->getCarnet(),
            $keys[10] => $this->getSexo(),
            $keys[11] => $this->getPhone1(),
            $keys[12] => $this->getPhone2(),
            $keys[13] => $this->getCellphone1(),
            $keys[14] => $this->getCellphone2(),
            $keys[15] => $this->getIdsFiles(),
            $keys[16] => $this->getIdCoverPicture(),
            $keys[17] => $this->getIdCity(),
            $keys[18] => $this->getIdProvincia(),
            $keys[19] => $this->getIdRole(),
            $keys[20] => $this->getSigninMethod(),
            $keys[21] => $this->getUid(),
            $keys[22] => $this->getCountryCode(),
            $keys[23] => $this->getAuthyId(),
            $keys[24] => $this->getVerified(),
            $keys[25] => $this->getChangeCount(),
            $keys[26] => $this->getStatus(),
            $keys[27] => $this->getDateModified(),
            $keys[28] => $this->getDateCreated(),
        );
        if ($result[$keys[7]] instanceof \DateTimeInterface) {
            $result[$keys[7]] = $result[$keys[7]]->format('c');
        }

        if ($result[$keys[27]] instanceof \DateTimeInterface) {
            $result[$keys[27]] = $result[$keys[27]]->format('c');
        }

        if ($result[$keys[28]] instanceof \DateTimeInterface) {
            $result[$keys[28]] = $result[$keys[28]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aEsRolesRelatedByIdRole) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esRoles';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_roles';
                        break;
                    default:
                        $key = 'EsRoles';
                }

                $result[$key] = $this->aEsRolesRelatedByIdRole->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEsProvinciasRelatedByIdProvincia) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esProvincias';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_provincias';
                        break;
                    default:
                        $key = 'EsProvincias';
                }

                $result[$key] = $this->aEsProvinciasRelatedByIdProvincia->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEsFilesRelatedByIdCoverPicture) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esFiles';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_files';
                        break;
                    default:
                        $key = 'EsFiles';
                }

                $result[$key] = $this->aEsFilesRelatedByIdCoverPicture->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEsCitiesRelatedByIdCity) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esCities';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_cities';
                        break;
                    default:
                        $key = 'EsCities';
                }

                $result[$key] = $this->aEsCitiesRelatedByIdCity->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collEsCitiessRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esCitiess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_citiess';
                        break;
                    default:
                        $key = 'EsCitiess';
                }

                $result[$key] = $this->collEsCitiessRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsCitiessRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esCitiess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_citiess';
                        break;
                    default:
                        $key = 'EsCitiess';
                }

                $result[$key] = $this->collEsCitiessRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsDomainssRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esDomainss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_domainss';
                        break;
                    default:
                        $key = 'EsDomainss';
                }

                $result[$key] = $this->collEsDomainssRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsDomainssRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esDomainss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_domainss';
                        break;
                    default:
                        $key = 'EsDomainss';
                }

                $result[$key] = $this->collEsDomainssRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsFilessRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esFiless';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_filess';
                        break;
                    default:
                        $key = 'EsFiless';
                }

                $result[$key] = $this->collEsFilessRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsFilessRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esFiless';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_filess';
                        break;
                    default:
                        $key = 'EsFiless';
                }

                $result[$key] = $this->collEsFilessRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsModulessRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esModuless';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_moduless';
                        break;
                    default:
                        $key = 'EsModuless';
                }

                $result[$key] = $this->collEsModulessRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsModulessRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esModuless';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_moduless';
                        break;
                    default:
                        $key = 'EsModuless';
                }

                $result[$key] = $this->collEsModulessRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsProvinciassRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esProvinciass';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_provinciass';
                        break;
                    default:
                        $key = 'EsProvinciass';
                }

                $result[$key] = $this->collEsProvinciassRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsProvinciassRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esProvinciass';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_provinciass';
                        break;
                    default:
                        $key = 'EsProvinciass';
                }

                $result[$key] = $this->collEsProvinciassRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsRolessRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esRoless';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_roless';
                        break;
                    default:
                        $key = 'EsRoless';
                }

                $result[$key] = $this->collEsRolessRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsRolessRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esRoless';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_roless';
                        break;
                    default:
                        $key = 'EsRoless';
                }

                $result[$key] = $this->collEsRolessRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsSessionss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esSessionss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_sessionss';
                        break;
                    default:
                        $key = 'EsSessionss';
                }

                $result[$key] = $this->collEsSessionss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsTablessRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esTabless';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_tabless';
                        break;
                    default:
                        $key = 'EsTabless';
                }

                $result[$key] = $this->collEsTablessRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsTablessRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esTabless';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_tabless';
                        break;
                    default:
                        $key = 'EsTabless';
                }

                $result[$key] = $this->collEsTablessRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsTablesRolessRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esTablesRoless';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_tables_roless';
                        break;
                    default:
                        $key = 'EsTablesRoless';
                }

                $result[$key] = $this->collEsTablesRolessRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsTablesRolessRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esTablesRoless';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_tables_roless';
                        break;
                    default:
                        $key = 'EsTablesRoless';
                }

                $result[$key] = $this->collEsTablesRolessRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsUsersRolessRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esUsersRoless';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_users_roless';
                        break;
                    default:
                        $key = 'EsUsersRoless';
                }

                $result[$key] = $this->collEsUsersRolessRelatedByIdUserCreated->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsUsersRolessRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esUsersRoless';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_users_roless';
                        break;
                    default:
                        $key = 'EsUsersRoless';
                }

                $result[$key] = $this->collEsUsersRolessRelatedByIdUserModified->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsUsersRolessRelatedByIdUser) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esUsersRoless';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_users_roless';
                        break;
                    default:
                        $key = 'EsUsersRoless';
                }

                $result[$key] = $this->collEsUsersRolessRelatedByIdUser->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\EsUsers
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EsUsersTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\EsUsers
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdUser($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setLastname($value);
                break;
            case 3:
                $this->setUsername($value);
                break;
            case 4:
                $this->setEmail($value);
                break;
            case 5:
                $this->setAddress($value);
                break;
            case 6:
                $this->setPassword($value);
                break;
            case 7:
                $this->setBirthdate($value);
                break;
            case 8:
                $this->setAge($value);
                break;
            case 9:
                $this->setCarnet($value);
                break;
            case 10:
                $this->setSexo($value);
                break;
            case 11:
                $this->setPhone1($value);
                break;
            case 12:
                $this->setPhone2($value);
                break;
            case 13:
                $this->setCellphone1($value);
                break;
            case 14:
                $this->setCellphone2($value);
                break;
            case 15:
                $this->setIdsFiles($value);
                break;
            case 16:
                $this->setIdCoverPicture($value);
                break;
            case 17:
                $this->setIdCity($value);
                break;
            case 18:
                $this->setIdProvincia($value);
                break;
            case 19:
                $this->setIdRole($value);
                break;
            case 20:
                $this->setSigninMethod($value);
                break;
            case 21:
                $this->setUid($value);
                break;
            case 22:
                $this->setCountryCode($value);
                break;
            case 23:
                $this->setAuthyId($value);
                break;
            case 24:
                $this->setVerified($value);
                break;
            case 25:
                $this->setChangeCount($value);
                break;
            case 26:
                $this->setStatus($value);
                break;
            case 27:
                $this->setDateModified($value);
                break;
            case 28:
                $this->setDateCreated($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = EsUsersTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdUser($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setLastname($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setUsername($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setEmail($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setAddress($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPassword($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setBirthdate($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setAge($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setCarnet($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setSexo($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setPhone1($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setPhone2($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setCellphone1($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setCellphone2($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setIdsFiles($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setIdCoverPicture($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setIdCity($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setIdProvincia($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setIdRole($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setSigninMethod($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setUid($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setCountryCode($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setAuthyId($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setVerified($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setChangeCount($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setStatus($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setDateModified($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setDateCreated($arr[$keys[28]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\EsUsers The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EsUsersTableMap::DATABASE_NAME);

        if ($this->isColumnModified(EsUsersTableMap::COL_ID_USER)) {
            $criteria->add(EsUsersTableMap::COL_ID_USER, $this->id_user);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_NAME)) {
            $criteria->add(EsUsersTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_LASTNAME)) {
            $criteria->add(EsUsersTableMap::COL_LASTNAME, $this->lastname);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_USERNAME)) {
            $criteria->add(EsUsersTableMap::COL_USERNAME, $this->username);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_EMAIL)) {
            $criteria->add(EsUsersTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_ADDRESS)) {
            $criteria->add(EsUsersTableMap::COL_ADDRESS, $this->address);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_PASSWORD)) {
            $criteria->add(EsUsersTableMap::COL_PASSWORD, $this->password);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_BIRTHDATE)) {
            $criteria->add(EsUsersTableMap::COL_BIRTHDATE, $this->birthdate);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_AGE)) {
            $criteria->add(EsUsersTableMap::COL_AGE, $this->age);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_CARNET)) {
            $criteria->add(EsUsersTableMap::COL_CARNET, $this->carnet);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_SEXO)) {
            $criteria->add(EsUsersTableMap::COL_SEXO, $this->sexo);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_PHONE_1)) {
            $criteria->add(EsUsersTableMap::COL_PHONE_1, $this->phone_1);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_PHONE_2)) {
            $criteria->add(EsUsersTableMap::COL_PHONE_2, $this->phone_2);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_CELLPHONE_1)) {
            $criteria->add(EsUsersTableMap::COL_CELLPHONE_1, $this->cellphone_1);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_CELLPHONE_2)) {
            $criteria->add(EsUsersTableMap::COL_CELLPHONE_2, $this->cellphone_2);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_IDS_FILES)) {
            $criteria->add(EsUsersTableMap::COL_IDS_FILES, $this->ids_files);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_ID_COVER_PICTURE)) {
            $criteria->add(EsUsersTableMap::COL_ID_COVER_PICTURE, $this->id_cover_picture);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_ID_CITY)) {
            $criteria->add(EsUsersTableMap::COL_ID_CITY, $this->id_city);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_ID_PROVINCIA)) {
            $criteria->add(EsUsersTableMap::COL_ID_PROVINCIA, $this->id_provincia);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_ID_ROLE)) {
            $criteria->add(EsUsersTableMap::COL_ID_ROLE, $this->id_role);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_SIGNIN_METHOD)) {
            $criteria->add(EsUsersTableMap::COL_SIGNIN_METHOD, $this->signin_method);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_UID)) {
            $criteria->add(EsUsersTableMap::COL_UID, $this->uid);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_COUNTRY_CODE)) {
            $criteria->add(EsUsersTableMap::COL_COUNTRY_CODE, $this->country_code);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_AUTHY_ID)) {
            $criteria->add(EsUsersTableMap::COL_AUTHY_ID, $this->authy_id);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_VERIFIED)) {
            $criteria->add(EsUsersTableMap::COL_VERIFIED, $this->verified);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_CHANGE_COUNT)) {
            $criteria->add(EsUsersTableMap::COL_CHANGE_COUNT, $this->change_count);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_STATUS)) {
            $criteria->add(EsUsersTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(EsUsersTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }
        if ($this->isColumnModified(EsUsersTableMap::COL_DATE_CREATED)) {
            $criteria->add(EsUsersTableMap::COL_DATE_CREATED, $this->date_created);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildEsUsersQuery::create();
        $criteria->add(EsUsersTableMap::COL_ID_USER, $this->id_user);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getIdUser();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdUser();
    }

    /**
     * Generic method to set the primary key (id_user column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdUser($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdUser();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \EsUsers (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setLastname($this->getLastname());
        $copyObj->setUsername($this->getUsername());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setAddress($this->getAddress());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setBirthdate($this->getBirthdate());
        $copyObj->setAge($this->getAge());
        $copyObj->setCarnet($this->getCarnet());
        $copyObj->setSexo($this->getSexo());
        $copyObj->setPhone1($this->getPhone1());
        $copyObj->setPhone2($this->getPhone2());
        $copyObj->setCellphone1($this->getCellphone1());
        $copyObj->setCellphone2($this->getCellphone2());
        $copyObj->setIdsFiles($this->getIdsFiles());
        $copyObj->setIdCoverPicture($this->getIdCoverPicture());
        $copyObj->setIdCity($this->getIdCity());
        $copyObj->setIdProvincia($this->getIdProvincia());
        $copyObj->setIdRole($this->getIdRole());
        $copyObj->setSigninMethod($this->getSigninMethod());
        $copyObj->setUid($this->getUid());
        $copyObj->setCountryCode($this->getCountryCode());
        $copyObj->setAuthyId($this->getAuthyId());
        $copyObj->setVerified($this->getVerified());
        $copyObj->setChangeCount($this->getChangeCount());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setDateModified($this->getDateModified());
        $copyObj->setDateCreated($this->getDateCreated());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getEsCitiessRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsCitiesRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsCitiessRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsCitiesRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsDomainssRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsDomainsRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsDomainssRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsDomainsRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsFilessRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsFilesRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsFilessRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsFilesRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsModulessRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsModulesRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsModulessRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsModulesRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsProvinciassRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsProvinciasRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsProvinciassRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsProvinciasRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsRolessRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsRolesRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsRolessRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsRolesRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsSessionss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsSessions($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsTablessRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsTablesRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsTablessRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsTablesRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsTablesRolessRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsTablesRolesRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsTablesRolessRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsTablesRolesRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsUsersRolessRelatedByIdUserCreated() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsUsersRolesRelatedByIdUserCreated($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsUsersRolessRelatedByIdUserModified() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsUsersRolesRelatedByIdUserModified($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsUsersRolessRelatedByIdUser() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsUsersRolesRelatedByIdUser($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdUser(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \EsUsers Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildEsRoles object.
     *
     * @param  ChildEsRoles $v
     * @return $this|\EsUsers The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEsRolesRelatedByIdRole(ChildEsRoles $v = null)
    {
        if ($v === null) {
            $this->setIdRole(NULL);
        } else {
            $this->setIdRole($v->getIdRole());
        }

        $this->aEsRolesRelatedByIdRole = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEsRoles object, it will not be re-added.
        if ($v !== null) {
            $v->addEsUsersRelatedByIdRole($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEsRoles object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEsRoles The associated ChildEsRoles object.
     * @throws PropelException
     */
    public function getEsRolesRelatedByIdRole(ConnectionInterface $con = null)
    {
        if ($this->aEsRolesRelatedByIdRole === null && ($this->id_role != 0)) {
            $this->aEsRolesRelatedByIdRole = ChildEsRolesQuery::create()->findPk($this->id_role, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEsRolesRelatedByIdRole->addEsUserssRelatedByIdRole($this);
             */
        }

        return $this->aEsRolesRelatedByIdRole;
    }

    /**
     * Declares an association between this object and a ChildEsProvincias object.
     *
     * @param  ChildEsProvincias $v
     * @return $this|\EsUsers The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEsProvinciasRelatedByIdProvincia(ChildEsProvincias $v = null)
    {
        if ($v === null) {
            $this->setIdProvincia(NULL);
        } else {
            $this->setIdProvincia($v->getIdProvincia());
        }

        $this->aEsProvinciasRelatedByIdProvincia = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEsProvincias object, it will not be re-added.
        if ($v !== null) {
            $v->addEsUsersRelatedByIdProvincia($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEsProvincias object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEsProvincias The associated ChildEsProvincias object.
     * @throws PropelException
     */
    public function getEsProvinciasRelatedByIdProvincia(ConnectionInterface $con = null)
    {
        if ($this->aEsProvinciasRelatedByIdProvincia === null && ($this->id_provincia != 0)) {
            $this->aEsProvinciasRelatedByIdProvincia = ChildEsProvinciasQuery::create()->findPk($this->id_provincia, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEsProvinciasRelatedByIdProvincia->addEsUserssRelatedByIdProvincia($this);
             */
        }

        return $this->aEsProvinciasRelatedByIdProvincia;
    }

    /**
     * Declares an association between this object and a ChildEsFiles object.
     *
     * @param  ChildEsFiles $v
     * @return $this|\EsUsers The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEsFilesRelatedByIdCoverPicture(ChildEsFiles $v = null)
    {
        if ($v === null) {
            $this->setIdCoverPicture(NULL);
        } else {
            $this->setIdCoverPicture($v->getIdFile());
        }

        $this->aEsFilesRelatedByIdCoverPicture = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEsFiles object, it will not be re-added.
        if ($v !== null) {
            $v->addEsUsersRelatedByIdCoverPicture($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEsFiles object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEsFiles The associated ChildEsFiles object.
     * @throws PropelException
     */
    public function getEsFilesRelatedByIdCoverPicture(ConnectionInterface $con = null)
    {
        if ($this->aEsFilesRelatedByIdCoverPicture === null && ($this->id_cover_picture != 0)) {
            $this->aEsFilesRelatedByIdCoverPicture = ChildEsFilesQuery::create()->findPk($this->id_cover_picture, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEsFilesRelatedByIdCoverPicture->addEsUserssRelatedByIdCoverPicture($this);
             */
        }

        return $this->aEsFilesRelatedByIdCoverPicture;
    }

    /**
     * Declares an association between this object and a ChildEsCities object.
     *
     * @param  ChildEsCities $v
     * @return $this|\EsUsers The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEsCitiesRelatedByIdCity(ChildEsCities $v = null)
    {
        if ($v === null) {
            $this->setIdCity(NULL);
        } else {
            $this->setIdCity($v->getIdCity());
        }

        $this->aEsCitiesRelatedByIdCity = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEsCities object, it will not be re-added.
        if ($v !== null) {
            $v->addEsUsersRelatedByIdCity($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEsCities object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEsCities The associated ChildEsCities object.
     * @throws PropelException
     */
    public function getEsCitiesRelatedByIdCity(ConnectionInterface $con = null)
    {
        if ($this->aEsCitiesRelatedByIdCity === null && ($this->id_city != 0)) {
            $this->aEsCitiesRelatedByIdCity = ChildEsCitiesQuery::create()->findPk($this->id_city, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEsCitiesRelatedByIdCity->addEsUserssRelatedByIdCity($this);
             */
        }

        return $this->aEsCitiesRelatedByIdCity;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('EsCitiesRelatedByIdUserCreated' == $relationName) {
            $this->initEsCitiessRelatedByIdUserCreated();
            return;
        }
        if ('EsCitiesRelatedByIdUserModified' == $relationName) {
            $this->initEsCitiessRelatedByIdUserModified();
            return;
        }
        if ('EsDomainsRelatedByIdUserCreated' == $relationName) {
            $this->initEsDomainssRelatedByIdUserCreated();
            return;
        }
        if ('EsDomainsRelatedByIdUserModified' == $relationName) {
            $this->initEsDomainssRelatedByIdUserModified();
            return;
        }
        if ('EsFilesRelatedByIdUserCreated' == $relationName) {
            $this->initEsFilessRelatedByIdUserCreated();
            return;
        }
        if ('EsFilesRelatedByIdUserModified' == $relationName) {
            $this->initEsFilessRelatedByIdUserModified();
            return;
        }
        if ('EsModulesRelatedByIdUserModified' == $relationName) {
            $this->initEsModulessRelatedByIdUserModified();
            return;
        }
        if ('EsModulesRelatedByIdUserCreated' == $relationName) {
            $this->initEsModulessRelatedByIdUserCreated();
            return;
        }
        if ('EsProvinciasRelatedByIdUserCreated' == $relationName) {
            $this->initEsProvinciassRelatedByIdUserCreated();
            return;
        }
        if ('EsProvinciasRelatedByIdUserModified' == $relationName) {
            $this->initEsProvinciassRelatedByIdUserModified();
            return;
        }
        if ('EsRolesRelatedByIdUserCreated' == $relationName) {
            $this->initEsRolessRelatedByIdUserCreated();
            return;
        }
        if ('EsRolesRelatedByIdUserModified' == $relationName) {
            $this->initEsRolessRelatedByIdUserModified();
            return;
        }
        if ('EsSessions' == $relationName) {
            $this->initEsSessionss();
            return;
        }
        if ('EsTablesRelatedByIdUserCreated' == $relationName) {
            $this->initEsTablessRelatedByIdUserCreated();
            return;
        }
        if ('EsTablesRelatedByIdUserModified' == $relationName) {
            $this->initEsTablessRelatedByIdUserModified();
            return;
        }
        if ('EsTablesRolesRelatedByIdUserCreated' == $relationName) {
            $this->initEsTablesRolessRelatedByIdUserCreated();
            return;
        }
        if ('EsTablesRolesRelatedByIdUserModified' == $relationName) {
            $this->initEsTablesRolessRelatedByIdUserModified();
            return;
        }
        if ('EsUsersRolesRelatedByIdUserCreated' == $relationName) {
            $this->initEsUsersRolessRelatedByIdUserCreated();
            return;
        }
        if ('EsUsersRolesRelatedByIdUserModified' == $relationName) {
            $this->initEsUsersRolessRelatedByIdUserModified();
            return;
        }
        if ('EsUsersRolesRelatedByIdUser' == $relationName) {
            $this->initEsUsersRolessRelatedByIdUser();
            return;
        }
    }

    /**
     * Clears out the collEsCitiessRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsCitiessRelatedByIdUserCreated()
     */
    public function clearEsCitiessRelatedByIdUserCreated()
    {
        $this->collEsCitiessRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsCitiessRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialEsCitiessRelatedByIdUserCreated($v = true)
    {
        $this->collEsCitiessRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collEsCitiessRelatedByIdUserCreated collection.
     *
     * By default this just sets the collEsCitiessRelatedByIdUserCreated collection to an empty array (like clearcollEsCitiessRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsCitiessRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collEsCitiessRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsCitiesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsCitiessRelatedByIdUserCreated = new $collectionClassName;
        $this->collEsCitiessRelatedByIdUserCreated->setModel('\EsCities');
    }

    /**
     * Gets an array of ChildEsCities objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     * @throws PropelException
     */
    public function getEsCitiessRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsCitiessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsCitiessRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsCitiessRelatedByIdUserCreated) {
                // return empty collection
                $this->initEsCitiessRelatedByIdUserCreated();
            } else {
                $collEsCitiessRelatedByIdUserCreated = ChildEsCitiesQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsCitiessRelatedByIdUserCreatedPartial && count($collEsCitiessRelatedByIdUserCreated)) {
                        $this->initEsCitiessRelatedByIdUserCreated(false);

                        foreach ($collEsCitiessRelatedByIdUserCreated as $obj) {
                            if (false == $this->collEsCitiessRelatedByIdUserCreated->contains($obj)) {
                                $this->collEsCitiessRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collEsCitiessRelatedByIdUserCreatedPartial = true;
                    }

                    return $collEsCitiessRelatedByIdUserCreated;
                }

                if ($partial && $this->collEsCitiessRelatedByIdUserCreated) {
                    foreach ($this->collEsCitiessRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collEsCitiessRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collEsCitiessRelatedByIdUserCreated = $collEsCitiessRelatedByIdUserCreated;
                $this->collEsCitiessRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collEsCitiessRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildEsCities objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esCitiessRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsCitiessRelatedByIdUserCreated(Collection $esCitiessRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildEsCities[] $esCitiessRelatedByIdUserCreatedToDelete */
        $esCitiessRelatedByIdUserCreatedToDelete = $this->getEsCitiessRelatedByIdUserCreated(new Criteria(), $con)->diff($esCitiessRelatedByIdUserCreated);


        $this->esCitiessRelatedByIdUserCreatedScheduledForDeletion = $esCitiessRelatedByIdUserCreatedToDelete;

        foreach ($esCitiessRelatedByIdUserCreatedToDelete as $esCitiesRelatedByIdUserCreatedRemoved) {
            $esCitiesRelatedByIdUserCreatedRemoved->setEsUsersRelatedByIdUserCreated(null);
        }

        $this->collEsCitiessRelatedByIdUserCreated = null;
        foreach ($esCitiessRelatedByIdUserCreated as $esCitiesRelatedByIdUserCreated) {
            $this->addEsCitiesRelatedByIdUserCreated($esCitiesRelatedByIdUserCreated);
        }

        $this->collEsCitiessRelatedByIdUserCreated = $esCitiessRelatedByIdUserCreated;
        $this->collEsCitiessRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsCities objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsCities objects.
     * @throws PropelException
     */
    public function countEsCitiessRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsCitiessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsCitiessRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsCitiessRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsCitiessRelatedByIdUserCreated());
            }

            $query = ChildEsCitiesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collEsCitiessRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildEsCities object to this object
     * through the ChildEsCities foreign key attribute.
     *
     * @param  ChildEsCities $l ChildEsCities
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsCitiesRelatedByIdUserCreated(ChildEsCities $l)
    {
        if ($this->collEsCitiessRelatedByIdUserCreated === null) {
            $this->initEsCitiessRelatedByIdUserCreated();
            $this->collEsCitiessRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collEsCitiessRelatedByIdUserCreated->contains($l)) {
            $this->doAddEsCitiesRelatedByIdUserCreated($l);

            if ($this->esCitiessRelatedByIdUserCreatedScheduledForDeletion and $this->esCitiessRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->esCitiessRelatedByIdUserCreatedScheduledForDeletion->remove($this->esCitiessRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsCities $esCitiesRelatedByIdUserCreated The ChildEsCities object to add.
     */
    protected function doAddEsCitiesRelatedByIdUserCreated(ChildEsCities $esCitiesRelatedByIdUserCreated)
    {
        $this->collEsCitiessRelatedByIdUserCreated[]= $esCitiesRelatedByIdUserCreated;
        $esCitiesRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildEsCities $esCitiesRelatedByIdUserCreated The ChildEsCities object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsCitiesRelatedByIdUserCreated(ChildEsCities $esCitiesRelatedByIdUserCreated)
    {
        if ($this->getEsCitiessRelatedByIdUserCreated()->contains($esCitiesRelatedByIdUserCreated)) {
            $pos = $this->collEsCitiessRelatedByIdUserCreated->search($esCitiesRelatedByIdUserCreated);
            $this->collEsCitiessRelatedByIdUserCreated->remove($pos);
            if (null === $this->esCitiessRelatedByIdUserCreatedScheduledForDeletion) {
                $this->esCitiessRelatedByIdUserCreatedScheduledForDeletion = clone $this->collEsCitiessRelatedByIdUserCreated;
                $this->esCitiessRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->esCitiessRelatedByIdUserCreatedScheduledForDeletion[]= clone $esCitiesRelatedByIdUserCreated;
            $esCitiesRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsCitiessRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     */
    public function getEsCitiessRelatedByIdUserCreatedJoinEsCitiesRelatedByIdCapital(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsCitiesQuery::create(null, $criteria);
        $query->joinWith('EsCitiesRelatedByIdCapital', $joinBehavior);

        return $this->getEsCitiessRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsCitiessRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     */
    public function getEsCitiessRelatedByIdUserCreatedJoinEsCitiesRelatedByIdRegion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsCitiesQuery::create(null, $criteria);
        $query->joinWith('EsCitiesRelatedByIdRegion', $joinBehavior);

        return $this->getEsCitiessRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsCitiessRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     */
    public function getEsCitiessRelatedByIdUserCreatedJoinEsFiles(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsCitiesQuery::create(null, $criteria);
        $query->joinWith('EsFiles', $joinBehavior);

        return $this->getEsCitiessRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collEsCitiessRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsCitiessRelatedByIdUserModified()
     */
    public function clearEsCitiessRelatedByIdUserModified()
    {
        $this->collEsCitiessRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsCitiessRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialEsCitiessRelatedByIdUserModified($v = true)
    {
        $this->collEsCitiessRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collEsCitiessRelatedByIdUserModified collection.
     *
     * By default this just sets the collEsCitiessRelatedByIdUserModified collection to an empty array (like clearcollEsCitiessRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsCitiessRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collEsCitiessRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsCitiesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsCitiessRelatedByIdUserModified = new $collectionClassName;
        $this->collEsCitiessRelatedByIdUserModified->setModel('\EsCities');
    }

    /**
     * Gets an array of ChildEsCities objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     * @throws PropelException
     */
    public function getEsCitiessRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsCitiessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsCitiessRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsCitiessRelatedByIdUserModified) {
                // return empty collection
                $this->initEsCitiessRelatedByIdUserModified();
            } else {
                $collEsCitiessRelatedByIdUserModified = ChildEsCitiesQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsCitiessRelatedByIdUserModifiedPartial && count($collEsCitiessRelatedByIdUserModified)) {
                        $this->initEsCitiessRelatedByIdUserModified(false);

                        foreach ($collEsCitiessRelatedByIdUserModified as $obj) {
                            if (false == $this->collEsCitiessRelatedByIdUserModified->contains($obj)) {
                                $this->collEsCitiessRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collEsCitiessRelatedByIdUserModifiedPartial = true;
                    }

                    return $collEsCitiessRelatedByIdUserModified;
                }

                if ($partial && $this->collEsCitiessRelatedByIdUserModified) {
                    foreach ($this->collEsCitiessRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collEsCitiessRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collEsCitiessRelatedByIdUserModified = $collEsCitiessRelatedByIdUserModified;
                $this->collEsCitiessRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collEsCitiessRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildEsCities objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esCitiessRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsCitiessRelatedByIdUserModified(Collection $esCitiessRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildEsCities[] $esCitiessRelatedByIdUserModifiedToDelete */
        $esCitiessRelatedByIdUserModifiedToDelete = $this->getEsCitiessRelatedByIdUserModified(new Criteria(), $con)->diff($esCitiessRelatedByIdUserModified);


        $this->esCitiessRelatedByIdUserModifiedScheduledForDeletion = $esCitiessRelatedByIdUserModifiedToDelete;

        foreach ($esCitiessRelatedByIdUserModifiedToDelete as $esCitiesRelatedByIdUserModifiedRemoved) {
            $esCitiesRelatedByIdUserModifiedRemoved->setEsUsersRelatedByIdUserModified(null);
        }

        $this->collEsCitiessRelatedByIdUserModified = null;
        foreach ($esCitiessRelatedByIdUserModified as $esCitiesRelatedByIdUserModified) {
            $this->addEsCitiesRelatedByIdUserModified($esCitiesRelatedByIdUserModified);
        }

        $this->collEsCitiessRelatedByIdUserModified = $esCitiessRelatedByIdUserModified;
        $this->collEsCitiessRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsCities objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsCities objects.
     * @throws PropelException
     */
    public function countEsCitiessRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsCitiessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsCitiessRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsCitiessRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsCitiessRelatedByIdUserModified());
            }

            $query = ChildEsCitiesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collEsCitiessRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildEsCities object to this object
     * through the ChildEsCities foreign key attribute.
     *
     * @param  ChildEsCities $l ChildEsCities
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsCitiesRelatedByIdUserModified(ChildEsCities $l)
    {
        if ($this->collEsCitiessRelatedByIdUserModified === null) {
            $this->initEsCitiessRelatedByIdUserModified();
            $this->collEsCitiessRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collEsCitiessRelatedByIdUserModified->contains($l)) {
            $this->doAddEsCitiesRelatedByIdUserModified($l);

            if ($this->esCitiessRelatedByIdUserModifiedScheduledForDeletion and $this->esCitiessRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->esCitiessRelatedByIdUserModifiedScheduledForDeletion->remove($this->esCitiessRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsCities $esCitiesRelatedByIdUserModified The ChildEsCities object to add.
     */
    protected function doAddEsCitiesRelatedByIdUserModified(ChildEsCities $esCitiesRelatedByIdUserModified)
    {
        $this->collEsCitiessRelatedByIdUserModified[]= $esCitiesRelatedByIdUserModified;
        $esCitiesRelatedByIdUserModified->setEsUsersRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildEsCities $esCitiesRelatedByIdUserModified The ChildEsCities object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsCitiesRelatedByIdUserModified(ChildEsCities $esCitiesRelatedByIdUserModified)
    {
        if ($this->getEsCitiessRelatedByIdUserModified()->contains($esCitiesRelatedByIdUserModified)) {
            $pos = $this->collEsCitiessRelatedByIdUserModified->search($esCitiesRelatedByIdUserModified);
            $this->collEsCitiessRelatedByIdUserModified->remove($pos);
            if (null === $this->esCitiessRelatedByIdUserModifiedScheduledForDeletion) {
                $this->esCitiessRelatedByIdUserModifiedScheduledForDeletion = clone $this->collEsCitiessRelatedByIdUserModified;
                $this->esCitiessRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->esCitiessRelatedByIdUserModifiedScheduledForDeletion[]= clone $esCitiesRelatedByIdUserModified;
            $esCitiesRelatedByIdUserModified->setEsUsersRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsCitiessRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     */
    public function getEsCitiessRelatedByIdUserModifiedJoinEsCitiesRelatedByIdCapital(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsCitiesQuery::create(null, $criteria);
        $query->joinWith('EsCitiesRelatedByIdCapital', $joinBehavior);

        return $this->getEsCitiessRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsCitiessRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     */
    public function getEsCitiessRelatedByIdUserModifiedJoinEsCitiesRelatedByIdRegion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsCitiesQuery::create(null, $criteria);
        $query->joinWith('EsCitiesRelatedByIdRegion', $joinBehavior);

        return $this->getEsCitiessRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsCitiessRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     */
    public function getEsCitiessRelatedByIdUserModifiedJoinEsFiles(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsCitiesQuery::create(null, $criteria);
        $query->joinWith('EsFiles', $joinBehavior);

        return $this->getEsCitiessRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collEsDomainssRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsDomainssRelatedByIdUserCreated()
     */
    public function clearEsDomainssRelatedByIdUserCreated()
    {
        $this->collEsDomainssRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsDomainssRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialEsDomainssRelatedByIdUserCreated($v = true)
    {
        $this->collEsDomainssRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collEsDomainssRelatedByIdUserCreated collection.
     *
     * By default this just sets the collEsDomainssRelatedByIdUserCreated collection to an empty array (like clearcollEsDomainssRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsDomainssRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collEsDomainssRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsDomainsTableMap::getTableMap()->getCollectionClassName();

        $this->collEsDomainssRelatedByIdUserCreated = new $collectionClassName;
        $this->collEsDomainssRelatedByIdUserCreated->setModel('\EsDomains');
    }

    /**
     * Gets an array of ChildEsDomains objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsDomains[] List of ChildEsDomains objects
     * @throws PropelException
     */
    public function getEsDomainssRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsDomainssRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsDomainssRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsDomainssRelatedByIdUserCreated) {
                // return empty collection
                $this->initEsDomainssRelatedByIdUserCreated();
            } else {
                $collEsDomainssRelatedByIdUserCreated = ChildEsDomainsQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsDomainssRelatedByIdUserCreatedPartial && count($collEsDomainssRelatedByIdUserCreated)) {
                        $this->initEsDomainssRelatedByIdUserCreated(false);

                        foreach ($collEsDomainssRelatedByIdUserCreated as $obj) {
                            if (false == $this->collEsDomainssRelatedByIdUserCreated->contains($obj)) {
                                $this->collEsDomainssRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collEsDomainssRelatedByIdUserCreatedPartial = true;
                    }

                    return $collEsDomainssRelatedByIdUserCreated;
                }

                if ($partial && $this->collEsDomainssRelatedByIdUserCreated) {
                    foreach ($this->collEsDomainssRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collEsDomainssRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collEsDomainssRelatedByIdUserCreated = $collEsDomainssRelatedByIdUserCreated;
                $this->collEsDomainssRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collEsDomainssRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildEsDomains objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esDomainssRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsDomainssRelatedByIdUserCreated(Collection $esDomainssRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildEsDomains[] $esDomainssRelatedByIdUserCreatedToDelete */
        $esDomainssRelatedByIdUserCreatedToDelete = $this->getEsDomainssRelatedByIdUserCreated(new Criteria(), $con)->diff($esDomainssRelatedByIdUserCreated);


        $this->esDomainssRelatedByIdUserCreatedScheduledForDeletion = $esDomainssRelatedByIdUserCreatedToDelete;

        foreach ($esDomainssRelatedByIdUserCreatedToDelete as $esDomainsRelatedByIdUserCreatedRemoved) {
            $esDomainsRelatedByIdUserCreatedRemoved->setEsUsersRelatedByIdUserCreated(null);
        }

        $this->collEsDomainssRelatedByIdUserCreated = null;
        foreach ($esDomainssRelatedByIdUserCreated as $esDomainsRelatedByIdUserCreated) {
            $this->addEsDomainsRelatedByIdUserCreated($esDomainsRelatedByIdUserCreated);
        }

        $this->collEsDomainssRelatedByIdUserCreated = $esDomainssRelatedByIdUserCreated;
        $this->collEsDomainssRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsDomains objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsDomains objects.
     * @throws PropelException
     */
    public function countEsDomainssRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsDomainssRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsDomainssRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsDomainssRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsDomainssRelatedByIdUserCreated());
            }

            $query = ChildEsDomainsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collEsDomainssRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildEsDomains object to this object
     * through the ChildEsDomains foreign key attribute.
     *
     * @param  ChildEsDomains $l ChildEsDomains
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsDomainsRelatedByIdUserCreated(ChildEsDomains $l)
    {
        if ($this->collEsDomainssRelatedByIdUserCreated === null) {
            $this->initEsDomainssRelatedByIdUserCreated();
            $this->collEsDomainssRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collEsDomainssRelatedByIdUserCreated->contains($l)) {
            $this->doAddEsDomainsRelatedByIdUserCreated($l);

            if ($this->esDomainssRelatedByIdUserCreatedScheduledForDeletion and $this->esDomainssRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->esDomainssRelatedByIdUserCreatedScheduledForDeletion->remove($this->esDomainssRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsDomains $esDomainsRelatedByIdUserCreated The ChildEsDomains object to add.
     */
    protected function doAddEsDomainsRelatedByIdUserCreated(ChildEsDomains $esDomainsRelatedByIdUserCreated)
    {
        $this->collEsDomainssRelatedByIdUserCreated[]= $esDomainsRelatedByIdUserCreated;
        $esDomainsRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildEsDomains $esDomainsRelatedByIdUserCreated The ChildEsDomains object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsDomainsRelatedByIdUserCreated(ChildEsDomains $esDomainsRelatedByIdUserCreated)
    {
        if ($this->getEsDomainssRelatedByIdUserCreated()->contains($esDomainsRelatedByIdUserCreated)) {
            $pos = $this->collEsDomainssRelatedByIdUserCreated->search($esDomainsRelatedByIdUserCreated);
            $this->collEsDomainssRelatedByIdUserCreated->remove($pos);
            if (null === $this->esDomainssRelatedByIdUserCreatedScheduledForDeletion) {
                $this->esDomainssRelatedByIdUserCreatedScheduledForDeletion = clone $this->collEsDomainssRelatedByIdUserCreated;
                $this->esDomainssRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->esDomainssRelatedByIdUserCreatedScheduledForDeletion[]= clone $esDomainsRelatedByIdUserCreated;
            $esDomainsRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated(null);
        }

        return $this;
    }

    /**
     * Clears out the collEsDomainssRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsDomainssRelatedByIdUserModified()
     */
    public function clearEsDomainssRelatedByIdUserModified()
    {
        $this->collEsDomainssRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsDomainssRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialEsDomainssRelatedByIdUserModified($v = true)
    {
        $this->collEsDomainssRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collEsDomainssRelatedByIdUserModified collection.
     *
     * By default this just sets the collEsDomainssRelatedByIdUserModified collection to an empty array (like clearcollEsDomainssRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsDomainssRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collEsDomainssRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsDomainsTableMap::getTableMap()->getCollectionClassName();

        $this->collEsDomainssRelatedByIdUserModified = new $collectionClassName;
        $this->collEsDomainssRelatedByIdUserModified->setModel('\EsDomains');
    }

    /**
     * Gets an array of ChildEsDomains objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsDomains[] List of ChildEsDomains objects
     * @throws PropelException
     */
    public function getEsDomainssRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsDomainssRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsDomainssRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsDomainssRelatedByIdUserModified) {
                // return empty collection
                $this->initEsDomainssRelatedByIdUserModified();
            } else {
                $collEsDomainssRelatedByIdUserModified = ChildEsDomainsQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsDomainssRelatedByIdUserModifiedPartial && count($collEsDomainssRelatedByIdUserModified)) {
                        $this->initEsDomainssRelatedByIdUserModified(false);

                        foreach ($collEsDomainssRelatedByIdUserModified as $obj) {
                            if (false == $this->collEsDomainssRelatedByIdUserModified->contains($obj)) {
                                $this->collEsDomainssRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collEsDomainssRelatedByIdUserModifiedPartial = true;
                    }

                    return $collEsDomainssRelatedByIdUserModified;
                }

                if ($partial && $this->collEsDomainssRelatedByIdUserModified) {
                    foreach ($this->collEsDomainssRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collEsDomainssRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collEsDomainssRelatedByIdUserModified = $collEsDomainssRelatedByIdUserModified;
                $this->collEsDomainssRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collEsDomainssRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildEsDomains objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esDomainssRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsDomainssRelatedByIdUserModified(Collection $esDomainssRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildEsDomains[] $esDomainssRelatedByIdUserModifiedToDelete */
        $esDomainssRelatedByIdUserModifiedToDelete = $this->getEsDomainssRelatedByIdUserModified(new Criteria(), $con)->diff($esDomainssRelatedByIdUserModified);


        $this->esDomainssRelatedByIdUserModifiedScheduledForDeletion = $esDomainssRelatedByIdUserModifiedToDelete;

        foreach ($esDomainssRelatedByIdUserModifiedToDelete as $esDomainsRelatedByIdUserModifiedRemoved) {
            $esDomainsRelatedByIdUserModifiedRemoved->setEsUsersRelatedByIdUserModified(null);
        }

        $this->collEsDomainssRelatedByIdUserModified = null;
        foreach ($esDomainssRelatedByIdUserModified as $esDomainsRelatedByIdUserModified) {
            $this->addEsDomainsRelatedByIdUserModified($esDomainsRelatedByIdUserModified);
        }

        $this->collEsDomainssRelatedByIdUserModified = $esDomainssRelatedByIdUserModified;
        $this->collEsDomainssRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsDomains objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsDomains objects.
     * @throws PropelException
     */
    public function countEsDomainssRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsDomainssRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsDomainssRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsDomainssRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsDomainssRelatedByIdUserModified());
            }

            $query = ChildEsDomainsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collEsDomainssRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildEsDomains object to this object
     * through the ChildEsDomains foreign key attribute.
     *
     * @param  ChildEsDomains $l ChildEsDomains
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsDomainsRelatedByIdUserModified(ChildEsDomains $l)
    {
        if ($this->collEsDomainssRelatedByIdUserModified === null) {
            $this->initEsDomainssRelatedByIdUserModified();
            $this->collEsDomainssRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collEsDomainssRelatedByIdUserModified->contains($l)) {
            $this->doAddEsDomainsRelatedByIdUserModified($l);

            if ($this->esDomainssRelatedByIdUserModifiedScheduledForDeletion and $this->esDomainssRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->esDomainssRelatedByIdUserModifiedScheduledForDeletion->remove($this->esDomainssRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsDomains $esDomainsRelatedByIdUserModified The ChildEsDomains object to add.
     */
    protected function doAddEsDomainsRelatedByIdUserModified(ChildEsDomains $esDomainsRelatedByIdUserModified)
    {
        $this->collEsDomainssRelatedByIdUserModified[]= $esDomainsRelatedByIdUserModified;
        $esDomainsRelatedByIdUserModified->setEsUsersRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildEsDomains $esDomainsRelatedByIdUserModified The ChildEsDomains object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsDomainsRelatedByIdUserModified(ChildEsDomains $esDomainsRelatedByIdUserModified)
    {
        if ($this->getEsDomainssRelatedByIdUserModified()->contains($esDomainsRelatedByIdUserModified)) {
            $pos = $this->collEsDomainssRelatedByIdUserModified->search($esDomainsRelatedByIdUserModified);
            $this->collEsDomainssRelatedByIdUserModified->remove($pos);
            if (null === $this->esDomainssRelatedByIdUserModifiedScheduledForDeletion) {
                $this->esDomainssRelatedByIdUserModifiedScheduledForDeletion = clone $this->collEsDomainssRelatedByIdUserModified;
                $this->esDomainssRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->esDomainssRelatedByIdUserModifiedScheduledForDeletion[]= clone $esDomainsRelatedByIdUserModified;
            $esDomainsRelatedByIdUserModified->setEsUsersRelatedByIdUserModified(null);
        }

        return $this;
    }

    /**
     * Clears out the collEsFilessRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsFilessRelatedByIdUserCreated()
     */
    public function clearEsFilessRelatedByIdUserCreated()
    {
        $this->collEsFilessRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsFilessRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialEsFilessRelatedByIdUserCreated($v = true)
    {
        $this->collEsFilessRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collEsFilessRelatedByIdUserCreated collection.
     *
     * By default this just sets the collEsFilessRelatedByIdUserCreated collection to an empty array (like clearcollEsFilessRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsFilessRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collEsFilessRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsFilesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsFilessRelatedByIdUserCreated = new $collectionClassName;
        $this->collEsFilessRelatedByIdUserCreated->setModel('\EsFiles');
    }

    /**
     * Gets an array of ChildEsFiles objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsFiles[] List of ChildEsFiles objects
     * @throws PropelException
     */
    public function getEsFilessRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsFilessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsFilessRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsFilessRelatedByIdUserCreated) {
                // return empty collection
                $this->initEsFilessRelatedByIdUserCreated();
            } else {
                $collEsFilessRelatedByIdUserCreated = ChildEsFilesQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsFilessRelatedByIdUserCreatedPartial && count($collEsFilessRelatedByIdUserCreated)) {
                        $this->initEsFilessRelatedByIdUserCreated(false);

                        foreach ($collEsFilessRelatedByIdUserCreated as $obj) {
                            if (false == $this->collEsFilessRelatedByIdUserCreated->contains($obj)) {
                                $this->collEsFilessRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collEsFilessRelatedByIdUserCreatedPartial = true;
                    }

                    return $collEsFilessRelatedByIdUserCreated;
                }

                if ($partial && $this->collEsFilessRelatedByIdUserCreated) {
                    foreach ($this->collEsFilessRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collEsFilessRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collEsFilessRelatedByIdUserCreated = $collEsFilessRelatedByIdUserCreated;
                $this->collEsFilessRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collEsFilessRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildEsFiles objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esFilessRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsFilessRelatedByIdUserCreated(Collection $esFilessRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildEsFiles[] $esFilessRelatedByIdUserCreatedToDelete */
        $esFilessRelatedByIdUserCreatedToDelete = $this->getEsFilessRelatedByIdUserCreated(new Criteria(), $con)->diff($esFilessRelatedByIdUserCreated);


        $this->esFilessRelatedByIdUserCreatedScheduledForDeletion = $esFilessRelatedByIdUserCreatedToDelete;

        foreach ($esFilessRelatedByIdUserCreatedToDelete as $esFilesRelatedByIdUserCreatedRemoved) {
            $esFilesRelatedByIdUserCreatedRemoved->setEsUsersRelatedByIdUserCreated(null);
        }

        $this->collEsFilessRelatedByIdUserCreated = null;
        foreach ($esFilessRelatedByIdUserCreated as $esFilesRelatedByIdUserCreated) {
            $this->addEsFilesRelatedByIdUserCreated($esFilesRelatedByIdUserCreated);
        }

        $this->collEsFilessRelatedByIdUserCreated = $esFilessRelatedByIdUserCreated;
        $this->collEsFilessRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsFiles objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsFiles objects.
     * @throws PropelException
     */
    public function countEsFilessRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsFilessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsFilessRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsFilessRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsFilessRelatedByIdUserCreated());
            }

            $query = ChildEsFilesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collEsFilessRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildEsFiles object to this object
     * through the ChildEsFiles foreign key attribute.
     *
     * @param  ChildEsFiles $l ChildEsFiles
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsFilesRelatedByIdUserCreated(ChildEsFiles $l)
    {
        if ($this->collEsFilessRelatedByIdUserCreated === null) {
            $this->initEsFilessRelatedByIdUserCreated();
            $this->collEsFilessRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collEsFilessRelatedByIdUserCreated->contains($l)) {
            $this->doAddEsFilesRelatedByIdUserCreated($l);

            if ($this->esFilessRelatedByIdUserCreatedScheduledForDeletion and $this->esFilessRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->esFilessRelatedByIdUserCreatedScheduledForDeletion->remove($this->esFilessRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsFiles $esFilesRelatedByIdUserCreated The ChildEsFiles object to add.
     */
    protected function doAddEsFilesRelatedByIdUserCreated(ChildEsFiles $esFilesRelatedByIdUserCreated)
    {
        $this->collEsFilessRelatedByIdUserCreated[]= $esFilesRelatedByIdUserCreated;
        $esFilesRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildEsFiles $esFilesRelatedByIdUserCreated The ChildEsFiles object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsFilesRelatedByIdUserCreated(ChildEsFiles $esFilesRelatedByIdUserCreated)
    {
        if ($this->getEsFilessRelatedByIdUserCreated()->contains($esFilesRelatedByIdUserCreated)) {
            $pos = $this->collEsFilessRelatedByIdUserCreated->search($esFilesRelatedByIdUserCreated);
            $this->collEsFilessRelatedByIdUserCreated->remove($pos);
            if (null === $this->esFilessRelatedByIdUserCreatedScheduledForDeletion) {
                $this->esFilessRelatedByIdUserCreatedScheduledForDeletion = clone $this->collEsFilessRelatedByIdUserCreated;
                $this->esFilessRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->esFilessRelatedByIdUserCreatedScheduledForDeletion[]= clone $esFilesRelatedByIdUserCreated;
            $esFilesRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsFilessRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsFiles[] List of ChildEsFiles objects
     */
    public function getEsFilessRelatedByIdUserCreatedJoinEsFilesRelatedByIdParent(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsFilesQuery::create(null, $criteria);
        $query->joinWith('EsFilesRelatedByIdParent', $joinBehavior);

        return $this->getEsFilessRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collEsFilessRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsFilessRelatedByIdUserModified()
     */
    public function clearEsFilessRelatedByIdUserModified()
    {
        $this->collEsFilessRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsFilessRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialEsFilessRelatedByIdUserModified($v = true)
    {
        $this->collEsFilessRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collEsFilessRelatedByIdUserModified collection.
     *
     * By default this just sets the collEsFilessRelatedByIdUserModified collection to an empty array (like clearcollEsFilessRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsFilessRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collEsFilessRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsFilesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsFilessRelatedByIdUserModified = new $collectionClassName;
        $this->collEsFilessRelatedByIdUserModified->setModel('\EsFiles');
    }

    /**
     * Gets an array of ChildEsFiles objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsFiles[] List of ChildEsFiles objects
     * @throws PropelException
     */
    public function getEsFilessRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsFilessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsFilessRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsFilessRelatedByIdUserModified) {
                // return empty collection
                $this->initEsFilessRelatedByIdUserModified();
            } else {
                $collEsFilessRelatedByIdUserModified = ChildEsFilesQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsFilessRelatedByIdUserModifiedPartial && count($collEsFilessRelatedByIdUserModified)) {
                        $this->initEsFilessRelatedByIdUserModified(false);

                        foreach ($collEsFilessRelatedByIdUserModified as $obj) {
                            if (false == $this->collEsFilessRelatedByIdUserModified->contains($obj)) {
                                $this->collEsFilessRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collEsFilessRelatedByIdUserModifiedPartial = true;
                    }

                    return $collEsFilessRelatedByIdUserModified;
                }

                if ($partial && $this->collEsFilessRelatedByIdUserModified) {
                    foreach ($this->collEsFilessRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collEsFilessRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collEsFilessRelatedByIdUserModified = $collEsFilessRelatedByIdUserModified;
                $this->collEsFilessRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collEsFilessRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildEsFiles objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esFilessRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsFilessRelatedByIdUserModified(Collection $esFilessRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildEsFiles[] $esFilessRelatedByIdUserModifiedToDelete */
        $esFilessRelatedByIdUserModifiedToDelete = $this->getEsFilessRelatedByIdUserModified(new Criteria(), $con)->diff($esFilessRelatedByIdUserModified);


        $this->esFilessRelatedByIdUserModifiedScheduledForDeletion = $esFilessRelatedByIdUserModifiedToDelete;

        foreach ($esFilessRelatedByIdUserModifiedToDelete as $esFilesRelatedByIdUserModifiedRemoved) {
            $esFilesRelatedByIdUserModifiedRemoved->setEsUsersRelatedByIdUserModified(null);
        }

        $this->collEsFilessRelatedByIdUserModified = null;
        foreach ($esFilessRelatedByIdUserModified as $esFilesRelatedByIdUserModified) {
            $this->addEsFilesRelatedByIdUserModified($esFilesRelatedByIdUserModified);
        }

        $this->collEsFilessRelatedByIdUserModified = $esFilessRelatedByIdUserModified;
        $this->collEsFilessRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsFiles objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsFiles objects.
     * @throws PropelException
     */
    public function countEsFilessRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsFilessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsFilessRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsFilessRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsFilessRelatedByIdUserModified());
            }

            $query = ChildEsFilesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collEsFilessRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildEsFiles object to this object
     * through the ChildEsFiles foreign key attribute.
     *
     * @param  ChildEsFiles $l ChildEsFiles
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsFilesRelatedByIdUserModified(ChildEsFiles $l)
    {
        if ($this->collEsFilessRelatedByIdUserModified === null) {
            $this->initEsFilessRelatedByIdUserModified();
            $this->collEsFilessRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collEsFilessRelatedByIdUserModified->contains($l)) {
            $this->doAddEsFilesRelatedByIdUserModified($l);

            if ($this->esFilessRelatedByIdUserModifiedScheduledForDeletion and $this->esFilessRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->esFilessRelatedByIdUserModifiedScheduledForDeletion->remove($this->esFilessRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsFiles $esFilesRelatedByIdUserModified The ChildEsFiles object to add.
     */
    protected function doAddEsFilesRelatedByIdUserModified(ChildEsFiles $esFilesRelatedByIdUserModified)
    {
        $this->collEsFilessRelatedByIdUserModified[]= $esFilesRelatedByIdUserModified;
        $esFilesRelatedByIdUserModified->setEsUsersRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildEsFiles $esFilesRelatedByIdUserModified The ChildEsFiles object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsFilesRelatedByIdUserModified(ChildEsFiles $esFilesRelatedByIdUserModified)
    {
        if ($this->getEsFilessRelatedByIdUserModified()->contains($esFilesRelatedByIdUserModified)) {
            $pos = $this->collEsFilessRelatedByIdUserModified->search($esFilesRelatedByIdUserModified);
            $this->collEsFilessRelatedByIdUserModified->remove($pos);
            if (null === $this->esFilessRelatedByIdUserModifiedScheduledForDeletion) {
                $this->esFilessRelatedByIdUserModifiedScheduledForDeletion = clone $this->collEsFilessRelatedByIdUserModified;
                $this->esFilessRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->esFilessRelatedByIdUserModifiedScheduledForDeletion[]= clone $esFilesRelatedByIdUserModified;
            $esFilesRelatedByIdUserModified->setEsUsersRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsFilessRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsFiles[] List of ChildEsFiles objects
     */
    public function getEsFilessRelatedByIdUserModifiedJoinEsFilesRelatedByIdParent(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsFilesQuery::create(null, $criteria);
        $query->joinWith('EsFilesRelatedByIdParent', $joinBehavior);

        return $this->getEsFilessRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collEsModulessRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsModulessRelatedByIdUserModified()
     */
    public function clearEsModulessRelatedByIdUserModified()
    {
        $this->collEsModulessRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsModulessRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialEsModulessRelatedByIdUserModified($v = true)
    {
        $this->collEsModulessRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collEsModulessRelatedByIdUserModified collection.
     *
     * By default this just sets the collEsModulessRelatedByIdUserModified collection to an empty array (like clearcollEsModulessRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsModulessRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collEsModulessRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsModulesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsModulessRelatedByIdUserModified = new $collectionClassName;
        $this->collEsModulessRelatedByIdUserModified->setModel('\EsModules');
    }

    /**
     * Gets an array of ChildEsModules objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsModules[] List of ChildEsModules objects
     * @throws PropelException
     */
    public function getEsModulessRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsModulessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsModulessRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsModulessRelatedByIdUserModified) {
                // return empty collection
                $this->initEsModulessRelatedByIdUserModified();
            } else {
                $collEsModulessRelatedByIdUserModified = ChildEsModulesQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsModulessRelatedByIdUserModifiedPartial && count($collEsModulessRelatedByIdUserModified)) {
                        $this->initEsModulessRelatedByIdUserModified(false);

                        foreach ($collEsModulessRelatedByIdUserModified as $obj) {
                            if (false == $this->collEsModulessRelatedByIdUserModified->contains($obj)) {
                                $this->collEsModulessRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collEsModulessRelatedByIdUserModifiedPartial = true;
                    }

                    return $collEsModulessRelatedByIdUserModified;
                }

                if ($partial && $this->collEsModulessRelatedByIdUserModified) {
                    foreach ($this->collEsModulessRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collEsModulessRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collEsModulessRelatedByIdUserModified = $collEsModulessRelatedByIdUserModified;
                $this->collEsModulessRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collEsModulessRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildEsModules objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esModulessRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsModulessRelatedByIdUserModified(Collection $esModulessRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildEsModules[] $esModulessRelatedByIdUserModifiedToDelete */
        $esModulessRelatedByIdUserModifiedToDelete = $this->getEsModulessRelatedByIdUserModified(new Criteria(), $con)->diff($esModulessRelatedByIdUserModified);


        $this->esModulessRelatedByIdUserModifiedScheduledForDeletion = $esModulessRelatedByIdUserModifiedToDelete;

        foreach ($esModulessRelatedByIdUserModifiedToDelete as $esModulesRelatedByIdUserModifiedRemoved) {
            $esModulesRelatedByIdUserModifiedRemoved->setEsUsersRelatedByIdUserModified(null);
        }

        $this->collEsModulessRelatedByIdUserModified = null;
        foreach ($esModulessRelatedByIdUserModified as $esModulesRelatedByIdUserModified) {
            $this->addEsModulesRelatedByIdUserModified($esModulesRelatedByIdUserModified);
        }

        $this->collEsModulessRelatedByIdUserModified = $esModulessRelatedByIdUserModified;
        $this->collEsModulessRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsModules objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsModules objects.
     * @throws PropelException
     */
    public function countEsModulessRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsModulessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsModulessRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsModulessRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsModulessRelatedByIdUserModified());
            }

            $query = ChildEsModulesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collEsModulessRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildEsModules object to this object
     * through the ChildEsModules foreign key attribute.
     *
     * @param  ChildEsModules $l ChildEsModules
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsModulesRelatedByIdUserModified(ChildEsModules $l)
    {
        if ($this->collEsModulessRelatedByIdUserModified === null) {
            $this->initEsModulessRelatedByIdUserModified();
            $this->collEsModulessRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collEsModulessRelatedByIdUserModified->contains($l)) {
            $this->doAddEsModulesRelatedByIdUserModified($l);

            if ($this->esModulessRelatedByIdUserModifiedScheduledForDeletion and $this->esModulessRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->esModulessRelatedByIdUserModifiedScheduledForDeletion->remove($this->esModulessRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsModules $esModulesRelatedByIdUserModified The ChildEsModules object to add.
     */
    protected function doAddEsModulesRelatedByIdUserModified(ChildEsModules $esModulesRelatedByIdUserModified)
    {
        $this->collEsModulessRelatedByIdUserModified[]= $esModulesRelatedByIdUserModified;
        $esModulesRelatedByIdUserModified->setEsUsersRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildEsModules $esModulesRelatedByIdUserModified The ChildEsModules object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsModulesRelatedByIdUserModified(ChildEsModules $esModulesRelatedByIdUserModified)
    {
        if ($this->getEsModulessRelatedByIdUserModified()->contains($esModulesRelatedByIdUserModified)) {
            $pos = $this->collEsModulessRelatedByIdUserModified->search($esModulesRelatedByIdUserModified);
            $this->collEsModulessRelatedByIdUserModified->remove($pos);
            if (null === $this->esModulessRelatedByIdUserModifiedScheduledForDeletion) {
                $this->esModulessRelatedByIdUserModifiedScheduledForDeletion = clone $this->collEsModulessRelatedByIdUserModified;
                $this->esModulessRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->esModulessRelatedByIdUserModifiedScheduledForDeletion[]= clone $esModulesRelatedByIdUserModified;
            $esModulesRelatedByIdUserModified->setEsUsersRelatedByIdUserModified(null);
        }

        return $this;
    }

    /**
     * Clears out the collEsModulessRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsModulessRelatedByIdUserCreated()
     */
    public function clearEsModulessRelatedByIdUserCreated()
    {
        $this->collEsModulessRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsModulessRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialEsModulessRelatedByIdUserCreated($v = true)
    {
        $this->collEsModulessRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collEsModulessRelatedByIdUserCreated collection.
     *
     * By default this just sets the collEsModulessRelatedByIdUserCreated collection to an empty array (like clearcollEsModulessRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsModulessRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collEsModulessRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsModulesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsModulessRelatedByIdUserCreated = new $collectionClassName;
        $this->collEsModulessRelatedByIdUserCreated->setModel('\EsModules');
    }

    /**
     * Gets an array of ChildEsModules objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsModules[] List of ChildEsModules objects
     * @throws PropelException
     */
    public function getEsModulessRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsModulessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsModulessRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsModulessRelatedByIdUserCreated) {
                // return empty collection
                $this->initEsModulessRelatedByIdUserCreated();
            } else {
                $collEsModulessRelatedByIdUserCreated = ChildEsModulesQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsModulessRelatedByIdUserCreatedPartial && count($collEsModulessRelatedByIdUserCreated)) {
                        $this->initEsModulessRelatedByIdUserCreated(false);

                        foreach ($collEsModulessRelatedByIdUserCreated as $obj) {
                            if (false == $this->collEsModulessRelatedByIdUserCreated->contains($obj)) {
                                $this->collEsModulessRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collEsModulessRelatedByIdUserCreatedPartial = true;
                    }

                    return $collEsModulessRelatedByIdUserCreated;
                }

                if ($partial && $this->collEsModulessRelatedByIdUserCreated) {
                    foreach ($this->collEsModulessRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collEsModulessRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collEsModulessRelatedByIdUserCreated = $collEsModulessRelatedByIdUserCreated;
                $this->collEsModulessRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collEsModulessRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildEsModules objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esModulessRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsModulessRelatedByIdUserCreated(Collection $esModulessRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildEsModules[] $esModulessRelatedByIdUserCreatedToDelete */
        $esModulessRelatedByIdUserCreatedToDelete = $this->getEsModulessRelatedByIdUserCreated(new Criteria(), $con)->diff($esModulessRelatedByIdUserCreated);


        $this->esModulessRelatedByIdUserCreatedScheduledForDeletion = $esModulessRelatedByIdUserCreatedToDelete;

        foreach ($esModulessRelatedByIdUserCreatedToDelete as $esModulesRelatedByIdUserCreatedRemoved) {
            $esModulesRelatedByIdUserCreatedRemoved->setEsUsersRelatedByIdUserCreated(null);
        }

        $this->collEsModulessRelatedByIdUserCreated = null;
        foreach ($esModulessRelatedByIdUserCreated as $esModulesRelatedByIdUserCreated) {
            $this->addEsModulesRelatedByIdUserCreated($esModulesRelatedByIdUserCreated);
        }

        $this->collEsModulessRelatedByIdUserCreated = $esModulessRelatedByIdUserCreated;
        $this->collEsModulessRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsModules objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsModules objects.
     * @throws PropelException
     */
    public function countEsModulessRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsModulessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsModulessRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsModulessRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsModulessRelatedByIdUserCreated());
            }

            $query = ChildEsModulesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collEsModulessRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildEsModules object to this object
     * through the ChildEsModules foreign key attribute.
     *
     * @param  ChildEsModules $l ChildEsModules
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsModulesRelatedByIdUserCreated(ChildEsModules $l)
    {
        if ($this->collEsModulessRelatedByIdUserCreated === null) {
            $this->initEsModulessRelatedByIdUserCreated();
            $this->collEsModulessRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collEsModulessRelatedByIdUserCreated->contains($l)) {
            $this->doAddEsModulesRelatedByIdUserCreated($l);

            if ($this->esModulessRelatedByIdUserCreatedScheduledForDeletion and $this->esModulessRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->esModulessRelatedByIdUserCreatedScheduledForDeletion->remove($this->esModulessRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsModules $esModulesRelatedByIdUserCreated The ChildEsModules object to add.
     */
    protected function doAddEsModulesRelatedByIdUserCreated(ChildEsModules $esModulesRelatedByIdUserCreated)
    {
        $this->collEsModulessRelatedByIdUserCreated[]= $esModulesRelatedByIdUserCreated;
        $esModulesRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildEsModules $esModulesRelatedByIdUserCreated The ChildEsModules object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsModulesRelatedByIdUserCreated(ChildEsModules $esModulesRelatedByIdUserCreated)
    {
        if ($this->getEsModulessRelatedByIdUserCreated()->contains($esModulesRelatedByIdUserCreated)) {
            $pos = $this->collEsModulessRelatedByIdUserCreated->search($esModulesRelatedByIdUserCreated);
            $this->collEsModulessRelatedByIdUserCreated->remove($pos);
            if (null === $this->esModulessRelatedByIdUserCreatedScheduledForDeletion) {
                $this->esModulessRelatedByIdUserCreatedScheduledForDeletion = clone $this->collEsModulessRelatedByIdUserCreated;
                $this->esModulessRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->esModulessRelatedByIdUserCreatedScheduledForDeletion[]= clone $esModulesRelatedByIdUserCreated;
            $esModulesRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated(null);
        }

        return $this;
    }

    /**
     * Clears out the collEsProvinciassRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsProvinciassRelatedByIdUserCreated()
     */
    public function clearEsProvinciassRelatedByIdUserCreated()
    {
        $this->collEsProvinciassRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsProvinciassRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialEsProvinciassRelatedByIdUserCreated($v = true)
    {
        $this->collEsProvinciassRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collEsProvinciassRelatedByIdUserCreated collection.
     *
     * By default this just sets the collEsProvinciassRelatedByIdUserCreated collection to an empty array (like clearcollEsProvinciassRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsProvinciassRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collEsProvinciassRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsProvinciasTableMap::getTableMap()->getCollectionClassName();

        $this->collEsProvinciassRelatedByIdUserCreated = new $collectionClassName;
        $this->collEsProvinciassRelatedByIdUserCreated->setModel('\EsProvincias');
    }

    /**
     * Gets an array of ChildEsProvincias objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsProvincias[] List of ChildEsProvincias objects
     * @throws PropelException
     */
    public function getEsProvinciassRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsProvinciassRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsProvinciassRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsProvinciassRelatedByIdUserCreated) {
                // return empty collection
                $this->initEsProvinciassRelatedByIdUserCreated();
            } else {
                $collEsProvinciassRelatedByIdUserCreated = ChildEsProvinciasQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsProvinciassRelatedByIdUserCreatedPartial && count($collEsProvinciassRelatedByIdUserCreated)) {
                        $this->initEsProvinciassRelatedByIdUserCreated(false);

                        foreach ($collEsProvinciassRelatedByIdUserCreated as $obj) {
                            if (false == $this->collEsProvinciassRelatedByIdUserCreated->contains($obj)) {
                                $this->collEsProvinciassRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collEsProvinciassRelatedByIdUserCreatedPartial = true;
                    }

                    return $collEsProvinciassRelatedByIdUserCreated;
                }

                if ($partial && $this->collEsProvinciassRelatedByIdUserCreated) {
                    foreach ($this->collEsProvinciassRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collEsProvinciassRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collEsProvinciassRelatedByIdUserCreated = $collEsProvinciassRelatedByIdUserCreated;
                $this->collEsProvinciassRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collEsProvinciassRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildEsProvincias objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esProvinciassRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsProvinciassRelatedByIdUserCreated(Collection $esProvinciassRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildEsProvincias[] $esProvinciassRelatedByIdUserCreatedToDelete */
        $esProvinciassRelatedByIdUserCreatedToDelete = $this->getEsProvinciassRelatedByIdUserCreated(new Criteria(), $con)->diff($esProvinciassRelatedByIdUserCreated);


        $this->esProvinciassRelatedByIdUserCreatedScheduledForDeletion = $esProvinciassRelatedByIdUserCreatedToDelete;

        foreach ($esProvinciassRelatedByIdUserCreatedToDelete as $esProvinciasRelatedByIdUserCreatedRemoved) {
            $esProvinciasRelatedByIdUserCreatedRemoved->setEsUsersRelatedByIdUserCreated(null);
        }

        $this->collEsProvinciassRelatedByIdUserCreated = null;
        foreach ($esProvinciassRelatedByIdUserCreated as $esProvinciasRelatedByIdUserCreated) {
            $this->addEsProvinciasRelatedByIdUserCreated($esProvinciasRelatedByIdUserCreated);
        }

        $this->collEsProvinciassRelatedByIdUserCreated = $esProvinciassRelatedByIdUserCreated;
        $this->collEsProvinciassRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsProvincias objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsProvincias objects.
     * @throws PropelException
     */
    public function countEsProvinciassRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsProvinciassRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsProvinciassRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsProvinciassRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsProvinciassRelatedByIdUserCreated());
            }

            $query = ChildEsProvinciasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collEsProvinciassRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildEsProvincias object to this object
     * through the ChildEsProvincias foreign key attribute.
     *
     * @param  ChildEsProvincias $l ChildEsProvincias
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsProvinciasRelatedByIdUserCreated(ChildEsProvincias $l)
    {
        if ($this->collEsProvinciassRelatedByIdUserCreated === null) {
            $this->initEsProvinciassRelatedByIdUserCreated();
            $this->collEsProvinciassRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collEsProvinciassRelatedByIdUserCreated->contains($l)) {
            $this->doAddEsProvinciasRelatedByIdUserCreated($l);

            if ($this->esProvinciassRelatedByIdUserCreatedScheduledForDeletion and $this->esProvinciassRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->esProvinciassRelatedByIdUserCreatedScheduledForDeletion->remove($this->esProvinciassRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsProvincias $esProvinciasRelatedByIdUserCreated The ChildEsProvincias object to add.
     */
    protected function doAddEsProvinciasRelatedByIdUserCreated(ChildEsProvincias $esProvinciasRelatedByIdUserCreated)
    {
        $this->collEsProvinciassRelatedByIdUserCreated[]= $esProvinciasRelatedByIdUserCreated;
        $esProvinciasRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildEsProvincias $esProvinciasRelatedByIdUserCreated The ChildEsProvincias object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsProvinciasRelatedByIdUserCreated(ChildEsProvincias $esProvinciasRelatedByIdUserCreated)
    {
        if ($this->getEsProvinciassRelatedByIdUserCreated()->contains($esProvinciasRelatedByIdUserCreated)) {
            $pos = $this->collEsProvinciassRelatedByIdUserCreated->search($esProvinciasRelatedByIdUserCreated);
            $this->collEsProvinciassRelatedByIdUserCreated->remove($pos);
            if (null === $this->esProvinciassRelatedByIdUserCreatedScheduledForDeletion) {
                $this->esProvinciassRelatedByIdUserCreatedScheduledForDeletion = clone $this->collEsProvinciassRelatedByIdUserCreated;
                $this->esProvinciassRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->esProvinciassRelatedByIdUserCreatedScheduledForDeletion[]= clone $esProvinciasRelatedByIdUserCreated;
            $esProvinciasRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsProvinciassRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsProvincias[] List of ChildEsProvincias objects
     */
    public function getEsProvinciassRelatedByIdUserCreatedJoinEsCities(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsProvinciasQuery::create(null, $criteria);
        $query->joinWith('EsCities', $joinBehavior);

        return $this->getEsProvinciassRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsProvinciassRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsProvincias[] List of ChildEsProvincias objects
     */
    public function getEsProvinciassRelatedByIdUserCreatedJoinEsProvinciasRelatedByIdMunicipio(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsProvinciasQuery::create(null, $criteria);
        $query->joinWith('EsProvinciasRelatedByIdMunicipio', $joinBehavior);

        return $this->getEsProvinciassRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collEsProvinciassRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsProvinciassRelatedByIdUserModified()
     */
    public function clearEsProvinciassRelatedByIdUserModified()
    {
        $this->collEsProvinciassRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsProvinciassRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialEsProvinciassRelatedByIdUserModified($v = true)
    {
        $this->collEsProvinciassRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collEsProvinciassRelatedByIdUserModified collection.
     *
     * By default this just sets the collEsProvinciassRelatedByIdUserModified collection to an empty array (like clearcollEsProvinciassRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsProvinciassRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collEsProvinciassRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsProvinciasTableMap::getTableMap()->getCollectionClassName();

        $this->collEsProvinciassRelatedByIdUserModified = new $collectionClassName;
        $this->collEsProvinciassRelatedByIdUserModified->setModel('\EsProvincias');
    }

    /**
     * Gets an array of ChildEsProvincias objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsProvincias[] List of ChildEsProvincias objects
     * @throws PropelException
     */
    public function getEsProvinciassRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsProvinciassRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsProvinciassRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsProvinciassRelatedByIdUserModified) {
                // return empty collection
                $this->initEsProvinciassRelatedByIdUserModified();
            } else {
                $collEsProvinciassRelatedByIdUserModified = ChildEsProvinciasQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsProvinciassRelatedByIdUserModifiedPartial && count($collEsProvinciassRelatedByIdUserModified)) {
                        $this->initEsProvinciassRelatedByIdUserModified(false);

                        foreach ($collEsProvinciassRelatedByIdUserModified as $obj) {
                            if (false == $this->collEsProvinciassRelatedByIdUserModified->contains($obj)) {
                                $this->collEsProvinciassRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collEsProvinciassRelatedByIdUserModifiedPartial = true;
                    }

                    return $collEsProvinciassRelatedByIdUserModified;
                }

                if ($partial && $this->collEsProvinciassRelatedByIdUserModified) {
                    foreach ($this->collEsProvinciassRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collEsProvinciassRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collEsProvinciassRelatedByIdUserModified = $collEsProvinciassRelatedByIdUserModified;
                $this->collEsProvinciassRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collEsProvinciassRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildEsProvincias objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esProvinciassRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsProvinciassRelatedByIdUserModified(Collection $esProvinciassRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildEsProvincias[] $esProvinciassRelatedByIdUserModifiedToDelete */
        $esProvinciassRelatedByIdUserModifiedToDelete = $this->getEsProvinciassRelatedByIdUserModified(new Criteria(), $con)->diff($esProvinciassRelatedByIdUserModified);


        $this->esProvinciassRelatedByIdUserModifiedScheduledForDeletion = $esProvinciassRelatedByIdUserModifiedToDelete;

        foreach ($esProvinciassRelatedByIdUserModifiedToDelete as $esProvinciasRelatedByIdUserModifiedRemoved) {
            $esProvinciasRelatedByIdUserModifiedRemoved->setEsUsersRelatedByIdUserModified(null);
        }

        $this->collEsProvinciassRelatedByIdUserModified = null;
        foreach ($esProvinciassRelatedByIdUserModified as $esProvinciasRelatedByIdUserModified) {
            $this->addEsProvinciasRelatedByIdUserModified($esProvinciasRelatedByIdUserModified);
        }

        $this->collEsProvinciassRelatedByIdUserModified = $esProvinciassRelatedByIdUserModified;
        $this->collEsProvinciassRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsProvincias objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsProvincias objects.
     * @throws PropelException
     */
    public function countEsProvinciassRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsProvinciassRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsProvinciassRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsProvinciassRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsProvinciassRelatedByIdUserModified());
            }

            $query = ChildEsProvinciasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collEsProvinciassRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildEsProvincias object to this object
     * through the ChildEsProvincias foreign key attribute.
     *
     * @param  ChildEsProvincias $l ChildEsProvincias
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsProvinciasRelatedByIdUserModified(ChildEsProvincias $l)
    {
        if ($this->collEsProvinciassRelatedByIdUserModified === null) {
            $this->initEsProvinciassRelatedByIdUserModified();
            $this->collEsProvinciassRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collEsProvinciassRelatedByIdUserModified->contains($l)) {
            $this->doAddEsProvinciasRelatedByIdUserModified($l);

            if ($this->esProvinciassRelatedByIdUserModifiedScheduledForDeletion and $this->esProvinciassRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->esProvinciassRelatedByIdUserModifiedScheduledForDeletion->remove($this->esProvinciassRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsProvincias $esProvinciasRelatedByIdUserModified The ChildEsProvincias object to add.
     */
    protected function doAddEsProvinciasRelatedByIdUserModified(ChildEsProvincias $esProvinciasRelatedByIdUserModified)
    {
        $this->collEsProvinciassRelatedByIdUserModified[]= $esProvinciasRelatedByIdUserModified;
        $esProvinciasRelatedByIdUserModified->setEsUsersRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildEsProvincias $esProvinciasRelatedByIdUserModified The ChildEsProvincias object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsProvinciasRelatedByIdUserModified(ChildEsProvincias $esProvinciasRelatedByIdUserModified)
    {
        if ($this->getEsProvinciassRelatedByIdUserModified()->contains($esProvinciasRelatedByIdUserModified)) {
            $pos = $this->collEsProvinciassRelatedByIdUserModified->search($esProvinciasRelatedByIdUserModified);
            $this->collEsProvinciassRelatedByIdUserModified->remove($pos);
            if (null === $this->esProvinciassRelatedByIdUserModifiedScheduledForDeletion) {
                $this->esProvinciassRelatedByIdUserModifiedScheduledForDeletion = clone $this->collEsProvinciassRelatedByIdUserModified;
                $this->esProvinciassRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->esProvinciassRelatedByIdUserModifiedScheduledForDeletion[]= clone $esProvinciasRelatedByIdUserModified;
            $esProvinciasRelatedByIdUserModified->setEsUsersRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsProvinciassRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsProvincias[] List of ChildEsProvincias objects
     */
    public function getEsProvinciassRelatedByIdUserModifiedJoinEsCities(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsProvinciasQuery::create(null, $criteria);
        $query->joinWith('EsCities', $joinBehavior);

        return $this->getEsProvinciassRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsProvinciassRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsProvincias[] List of ChildEsProvincias objects
     */
    public function getEsProvinciassRelatedByIdUserModifiedJoinEsProvinciasRelatedByIdMunicipio(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsProvinciasQuery::create(null, $criteria);
        $query->joinWith('EsProvinciasRelatedByIdMunicipio', $joinBehavior);

        return $this->getEsProvinciassRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collEsRolessRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsRolessRelatedByIdUserCreated()
     */
    public function clearEsRolessRelatedByIdUserCreated()
    {
        $this->collEsRolessRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsRolessRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialEsRolessRelatedByIdUserCreated($v = true)
    {
        $this->collEsRolessRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collEsRolessRelatedByIdUserCreated collection.
     *
     * By default this just sets the collEsRolessRelatedByIdUserCreated collection to an empty array (like clearcollEsRolessRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsRolessRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collEsRolessRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsRolesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsRolessRelatedByIdUserCreated = new $collectionClassName;
        $this->collEsRolessRelatedByIdUserCreated->setModel('\EsRoles');
    }

    /**
     * Gets an array of ChildEsRoles objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsRoles[] List of ChildEsRoles objects
     * @throws PropelException
     */
    public function getEsRolessRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsRolessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsRolessRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsRolessRelatedByIdUserCreated) {
                // return empty collection
                $this->initEsRolessRelatedByIdUserCreated();
            } else {
                $collEsRolessRelatedByIdUserCreated = ChildEsRolesQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsRolessRelatedByIdUserCreatedPartial && count($collEsRolessRelatedByIdUserCreated)) {
                        $this->initEsRolessRelatedByIdUserCreated(false);

                        foreach ($collEsRolessRelatedByIdUserCreated as $obj) {
                            if (false == $this->collEsRolessRelatedByIdUserCreated->contains($obj)) {
                                $this->collEsRolessRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collEsRolessRelatedByIdUserCreatedPartial = true;
                    }

                    return $collEsRolessRelatedByIdUserCreated;
                }

                if ($partial && $this->collEsRolessRelatedByIdUserCreated) {
                    foreach ($this->collEsRolessRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collEsRolessRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collEsRolessRelatedByIdUserCreated = $collEsRolessRelatedByIdUserCreated;
                $this->collEsRolessRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collEsRolessRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildEsRoles objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esRolessRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsRolessRelatedByIdUserCreated(Collection $esRolessRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildEsRoles[] $esRolessRelatedByIdUserCreatedToDelete */
        $esRolessRelatedByIdUserCreatedToDelete = $this->getEsRolessRelatedByIdUserCreated(new Criteria(), $con)->diff($esRolessRelatedByIdUserCreated);


        $this->esRolessRelatedByIdUserCreatedScheduledForDeletion = $esRolessRelatedByIdUserCreatedToDelete;

        foreach ($esRolessRelatedByIdUserCreatedToDelete as $esRolesRelatedByIdUserCreatedRemoved) {
            $esRolesRelatedByIdUserCreatedRemoved->setEsUsersRelatedByIdUserCreated(null);
        }

        $this->collEsRolessRelatedByIdUserCreated = null;
        foreach ($esRolessRelatedByIdUserCreated as $esRolesRelatedByIdUserCreated) {
            $this->addEsRolesRelatedByIdUserCreated($esRolesRelatedByIdUserCreated);
        }

        $this->collEsRolessRelatedByIdUserCreated = $esRolessRelatedByIdUserCreated;
        $this->collEsRolessRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsRoles objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsRoles objects.
     * @throws PropelException
     */
    public function countEsRolessRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsRolessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsRolessRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsRolessRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsRolessRelatedByIdUserCreated());
            }

            $query = ChildEsRolesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collEsRolessRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildEsRoles object to this object
     * through the ChildEsRoles foreign key attribute.
     *
     * @param  ChildEsRoles $l ChildEsRoles
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsRolesRelatedByIdUserCreated(ChildEsRoles $l)
    {
        if ($this->collEsRolessRelatedByIdUserCreated === null) {
            $this->initEsRolessRelatedByIdUserCreated();
            $this->collEsRolessRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collEsRolessRelatedByIdUserCreated->contains($l)) {
            $this->doAddEsRolesRelatedByIdUserCreated($l);

            if ($this->esRolessRelatedByIdUserCreatedScheduledForDeletion and $this->esRolessRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->esRolessRelatedByIdUserCreatedScheduledForDeletion->remove($this->esRolessRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsRoles $esRolesRelatedByIdUserCreated The ChildEsRoles object to add.
     */
    protected function doAddEsRolesRelatedByIdUserCreated(ChildEsRoles $esRolesRelatedByIdUserCreated)
    {
        $this->collEsRolessRelatedByIdUserCreated[]= $esRolesRelatedByIdUserCreated;
        $esRolesRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildEsRoles $esRolesRelatedByIdUserCreated The ChildEsRoles object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsRolesRelatedByIdUserCreated(ChildEsRoles $esRolesRelatedByIdUserCreated)
    {
        if ($this->getEsRolessRelatedByIdUserCreated()->contains($esRolesRelatedByIdUserCreated)) {
            $pos = $this->collEsRolessRelatedByIdUserCreated->search($esRolesRelatedByIdUserCreated);
            $this->collEsRolessRelatedByIdUserCreated->remove($pos);
            if (null === $this->esRolessRelatedByIdUserCreatedScheduledForDeletion) {
                $this->esRolessRelatedByIdUserCreatedScheduledForDeletion = clone $this->collEsRolessRelatedByIdUserCreated;
                $this->esRolessRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->esRolessRelatedByIdUserCreatedScheduledForDeletion[]= $esRolesRelatedByIdUserCreated;
            $esRolesRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated(null);
        }

        return $this;
    }

    /**
     * Clears out the collEsRolessRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsRolessRelatedByIdUserModified()
     */
    public function clearEsRolessRelatedByIdUserModified()
    {
        $this->collEsRolessRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsRolessRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialEsRolessRelatedByIdUserModified($v = true)
    {
        $this->collEsRolessRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collEsRolessRelatedByIdUserModified collection.
     *
     * By default this just sets the collEsRolessRelatedByIdUserModified collection to an empty array (like clearcollEsRolessRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsRolessRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collEsRolessRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsRolesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsRolessRelatedByIdUserModified = new $collectionClassName;
        $this->collEsRolessRelatedByIdUserModified->setModel('\EsRoles');
    }

    /**
     * Gets an array of ChildEsRoles objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsRoles[] List of ChildEsRoles objects
     * @throws PropelException
     */
    public function getEsRolessRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsRolessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsRolessRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsRolessRelatedByIdUserModified) {
                // return empty collection
                $this->initEsRolessRelatedByIdUserModified();
            } else {
                $collEsRolessRelatedByIdUserModified = ChildEsRolesQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsRolessRelatedByIdUserModifiedPartial && count($collEsRolessRelatedByIdUserModified)) {
                        $this->initEsRolessRelatedByIdUserModified(false);

                        foreach ($collEsRolessRelatedByIdUserModified as $obj) {
                            if (false == $this->collEsRolessRelatedByIdUserModified->contains($obj)) {
                                $this->collEsRolessRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collEsRolessRelatedByIdUserModifiedPartial = true;
                    }

                    return $collEsRolessRelatedByIdUserModified;
                }

                if ($partial && $this->collEsRolessRelatedByIdUserModified) {
                    foreach ($this->collEsRolessRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collEsRolessRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collEsRolessRelatedByIdUserModified = $collEsRolessRelatedByIdUserModified;
                $this->collEsRolessRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collEsRolessRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildEsRoles objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esRolessRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsRolessRelatedByIdUserModified(Collection $esRolessRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildEsRoles[] $esRolessRelatedByIdUserModifiedToDelete */
        $esRolessRelatedByIdUserModifiedToDelete = $this->getEsRolessRelatedByIdUserModified(new Criteria(), $con)->diff($esRolessRelatedByIdUserModified);


        $this->esRolessRelatedByIdUserModifiedScheduledForDeletion = $esRolessRelatedByIdUserModifiedToDelete;

        foreach ($esRolessRelatedByIdUserModifiedToDelete as $esRolesRelatedByIdUserModifiedRemoved) {
            $esRolesRelatedByIdUserModifiedRemoved->setEsUsersRelatedByIdUserModified(null);
        }

        $this->collEsRolessRelatedByIdUserModified = null;
        foreach ($esRolessRelatedByIdUserModified as $esRolesRelatedByIdUserModified) {
            $this->addEsRolesRelatedByIdUserModified($esRolesRelatedByIdUserModified);
        }

        $this->collEsRolessRelatedByIdUserModified = $esRolessRelatedByIdUserModified;
        $this->collEsRolessRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsRoles objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsRoles objects.
     * @throws PropelException
     */
    public function countEsRolessRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsRolessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsRolessRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsRolessRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsRolessRelatedByIdUserModified());
            }

            $query = ChildEsRolesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collEsRolessRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildEsRoles object to this object
     * through the ChildEsRoles foreign key attribute.
     *
     * @param  ChildEsRoles $l ChildEsRoles
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsRolesRelatedByIdUserModified(ChildEsRoles $l)
    {
        if ($this->collEsRolessRelatedByIdUserModified === null) {
            $this->initEsRolessRelatedByIdUserModified();
            $this->collEsRolessRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collEsRolessRelatedByIdUserModified->contains($l)) {
            $this->doAddEsRolesRelatedByIdUserModified($l);

            if ($this->esRolessRelatedByIdUserModifiedScheduledForDeletion and $this->esRolessRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->esRolessRelatedByIdUserModifiedScheduledForDeletion->remove($this->esRolessRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsRoles $esRolesRelatedByIdUserModified The ChildEsRoles object to add.
     */
    protected function doAddEsRolesRelatedByIdUserModified(ChildEsRoles $esRolesRelatedByIdUserModified)
    {
        $this->collEsRolessRelatedByIdUserModified[]= $esRolesRelatedByIdUserModified;
        $esRolesRelatedByIdUserModified->setEsUsersRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildEsRoles $esRolesRelatedByIdUserModified The ChildEsRoles object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsRolesRelatedByIdUserModified(ChildEsRoles $esRolesRelatedByIdUserModified)
    {
        if ($this->getEsRolessRelatedByIdUserModified()->contains($esRolesRelatedByIdUserModified)) {
            $pos = $this->collEsRolessRelatedByIdUserModified->search($esRolesRelatedByIdUserModified);
            $this->collEsRolessRelatedByIdUserModified->remove($pos);
            if (null === $this->esRolessRelatedByIdUserModifiedScheduledForDeletion) {
                $this->esRolessRelatedByIdUserModifiedScheduledForDeletion = clone $this->collEsRolessRelatedByIdUserModified;
                $this->esRolessRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->esRolessRelatedByIdUserModifiedScheduledForDeletion[]= $esRolesRelatedByIdUserModified;
            $esRolesRelatedByIdUserModified->setEsUsersRelatedByIdUserModified(null);
        }

        return $this;
    }

    /**
     * Clears out the collEsSessionss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsSessionss()
     */
    public function clearEsSessionss()
    {
        $this->collEsSessionss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsSessionss collection loaded partially.
     */
    public function resetPartialEsSessionss($v = true)
    {
        $this->collEsSessionssPartial = $v;
    }

    /**
     * Initializes the collEsSessionss collection.
     *
     * By default this just sets the collEsSessionss collection to an empty array (like clearcollEsSessionss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsSessionss($overrideExisting = true)
    {
        if (null !== $this->collEsSessionss && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsSessionsTableMap::getTableMap()->getCollectionClassName();

        $this->collEsSessionss = new $collectionClassName;
        $this->collEsSessionss->setModel('\EsSessions');
    }

    /**
     * Gets an array of ChildEsSessions objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsSessions[] List of ChildEsSessions objects
     * @throws PropelException
     */
    public function getEsSessionss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsSessionssPartial && !$this->isNew();
        if (null === $this->collEsSessionss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsSessionss) {
                // return empty collection
                $this->initEsSessionss();
            } else {
                $collEsSessionss = ChildEsSessionsQuery::create(null, $criteria)
                    ->filterByEsUsers($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsSessionssPartial && count($collEsSessionss)) {
                        $this->initEsSessionss(false);

                        foreach ($collEsSessionss as $obj) {
                            if (false == $this->collEsSessionss->contains($obj)) {
                                $this->collEsSessionss->append($obj);
                            }
                        }

                        $this->collEsSessionssPartial = true;
                    }

                    return $collEsSessionss;
                }

                if ($partial && $this->collEsSessionss) {
                    foreach ($this->collEsSessionss as $obj) {
                        if ($obj->isNew()) {
                            $collEsSessionss[] = $obj;
                        }
                    }
                }

                $this->collEsSessionss = $collEsSessionss;
                $this->collEsSessionssPartial = false;
            }
        }

        return $this->collEsSessionss;
    }

    /**
     * Sets a collection of ChildEsSessions objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esSessionss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsSessionss(Collection $esSessionss, ConnectionInterface $con = null)
    {
        /** @var ChildEsSessions[] $esSessionssToDelete */
        $esSessionssToDelete = $this->getEsSessionss(new Criteria(), $con)->diff($esSessionss);


        $this->esSessionssScheduledForDeletion = $esSessionssToDelete;

        foreach ($esSessionssToDelete as $esSessionsRemoved) {
            $esSessionsRemoved->setEsUsers(null);
        }

        $this->collEsSessionss = null;
        foreach ($esSessionss as $esSessions) {
            $this->addEsSessions($esSessions);
        }

        $this->collEsSessionss = $esSessionss;
        $this->collEsSessionssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsSessions objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsSessions objects.
     * @throws PropelException
     */
    public function countEsSessionss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsSessionssPartial && !$this->isNew();
        if (null === $this->collEsSessionss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsSessionss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsSessionss());
            }

            $query = ChildEsSessionsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsers($this)
                ->count($con);
        }

        return count($this->collEsSessionss);
    }

    /**
     * Method called to associate a ChildEsSessions object to this object
     * through the ChildEsSessions foreign key attribute.
     *
     * @param  ChildEsSessions $l ChildEsSessions
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsSessions(ChildEsSessions $l)
    {
        if ($this->collEsSessionss === null) {
            $this->initEsSessionss();
            $this->collEsSessionssPartial = true;
        }

        if (!$this->collEsSessionss->contains($l)) {
            $this->doAddEsSessions($l);

            if ($this->esSessionssScheduledForDeletion and $this->esSessionssScheduledForDeletion->contains($l)) {
                $this->esSessionssScheduledForDeletion->remove($this->esSessionssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsSessions $esSessions The ChildEsSessions object to add.
     */
    protected function doAddEsSessions(ChildEsSessions $esSessions)
    {
        $this->collEsSessionss[]= $esSessions;
        $esSessions->setEsUsers($this);
    }

    /**
     * @param  ChildEsSessions $esSessions The ChildEsSessions object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsSessions(ChildEsSessions $esSessions)
    {
        if ($this->getEsSessionss()->contains($esSessions)) {
            $pos = $this->collEsSessionss->search($esSessions);
            $this->collEsSessionss->remove($pos);
            if (null === $this->esSessionssScheduledForDeletion) {
                $this->esSessionssScheduledForDeletion = clone $this->collEsSessionss;
                $this->esSessionssScheduledForDeletion->clear();
            }
            $this->esSessionssScheduledForDeletion[]= $esSessions;
            $esSessions->setEsUsers(null);
        }

        return $this;
    }

    /**
     * Clears out the collEsTablessRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsTablessRelatedByIdUserCreated()
     */
    public function clearEsTablessRelatedByIdUserCreated()
    {
        $this->collEsTablessRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsTablessRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialEsTablessRelatedByIdUserCreated($v = true)
    {
        $this->collEsTablessRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collEsTablessRelatedByIdUserCreated collection.
     *
     * By default this just sets the collEsTablessRelatedByIdUserCreated collection to an empty array (like clearcollEsTablessRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsTablessRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collEsTablessRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsTablesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsTablessRelatedByIdUserCreated = new $collectionClassName;
        $this->collEsTablessRelatedByIdUserCreated->setModel('\EsTables');
    }

    /**
     * Gets an array of ChildEsTables objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsTables[] List of ChildEsTables objects
     * @throws PropelException
     */
    public function getEsTablessRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsTablessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsTablessRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsTablessRelatedByIdUserCreated) {
                // return empty collection
                $this->initEsTablessRelatedByIdUserCreated();
            } else {
                $collEsTablessRelatedByIdUserCreated = ChildEsTablesQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsTablessRelatedByIdUserCreatedPartial && count($collEsTablessRelatedByIdUserCreated)) {
                        $this->initEsTablessRelatedByIdUserCreated(false);

                        foreach ($collEsTablessRelatedByIdUserCreated as $obj) {
                            if (false == $this->collEsTablessRelatedByIdUserCreated->contains($obj)) {
                                $this->collEsTablessRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collEsTablessRelatedByIdUserCreatedPartial = true;
                    }

                    return $collEsTablessRelatedByIdUserCreated;
                }

                if ($partial && $this->collEsTablessRelatedByIdUserCreated) {
                    foreach ($this->collEsTablessRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collEsTablessRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collEsTablessRelatedByIdUserCreated = $collEsTablessRelatedByIdUserCreated;
                $this->collEsTablessRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collEsTablessRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildEsTables objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esTablessRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsTablessRelatedByIdUserCreated(Collection $esTablessRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildEsTables[] $esTablessRelatedByIdUserCreatedToDelete */
        $esTablessRelatedByIdUserCreatedToDelete = $this->getEsTablessRelatedByIdUserCreated(new Criteria(), $con)->diff($esTablessRelatedByIdUserCreated);


        $this->esTablessRelatedByIdUserCreatedScheduledForDeletion = $esTablessRelatedByIdUserCreatedToDelete;

        foreach ($esTablessRelatedByIdUserCreatedToDelete as $esTablesRelatedByIdUserCreatedRemoved) {
            $esTablesRelatedByIdUserCreatedRemoved->setEsUsersRelatedByIdUserCreated(null);
        }

        $this->collEsTablessRelatedByIdUserCreated = null;
        foreach ($esTablessRelatedByIdUserCreated as $esTablesRelatedByIdUserCreated) {
            $this->addEsTablesRelatedByIdUserCreated($esTablesRelatedByIdUserCreated);
        }

        $this->collEsTablessRelatedByIdUserCreated = $esTablessRelatedByIdUserCreated;
        $this->collEsTablessRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsTables objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsTables objects.
     * @throws PropelException
     */
    public function countEsTablessRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsTablessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsTablessRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsTablessRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsTablessRelatedByIdUserCreated());
            }

            $query = ChildEsTablesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collEsTablessRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildEsTables object to this object
     * through the ChildEsTables foreign key attribute.
     *
     * @param  ChildEsTables $l ChildEsTables
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsTablesRelatedByIdUserCreated(ChildEsTables $l)
    {
        if ($this->collEsTablessRelatedByIdUserCreated === null) {
            $this->initEsTablessRelatedByIdUserCreated();
            $this->collEsTablessRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collEsTablessRelatedByIdUserCreated->contains($l)) {
            $this->doAddEsTablesRelatedByIdUserCreated($l);

            if ($this->esTablessRelatedByIdUserCreatedScheduledForDeletion and $this->esTablessRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->esTablessRelatedByIdUserCreatedScheduledForDeletion->remove($this->esTablessRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsTables $esTablesRelatedByIdUserCreated The ChildEsTables object to add.
     */
    protected function doAddEsTablesRelatedByIdUserCreated(ChildEsTables $esTablesRelatedByIdUserCreated)
    {
        $this->collEsTablessRelatedByIdUserCreated[]= $esTablesRelatedByIdUserCreated;
        $esTablesRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildEsTables $esTablesRelatedByIdUserCreated The ChildEsTables object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsTablesRelatedByIdUserCreated(ChildEsTables $esTablesRelatedByIdUserCreated)
    {
        if ($this->getEsTablessRelatedByIdUserCreated()->contains($esTablesRelatedByIdUserCreated)) {
            $pos = $this->collEsTablessRelatedByIdUserCreated->search($esTablesRelatedByIdUserCreated);
            $this->collEsTablessRelatedByIdUserCreated->remove($pos);
            if (null === $this->esTablessRelatedByIdUserCreatedScheduledForDeletion) {
                $this->esTablessRelatedByIdUserCreatedScheduledForDeletion = clone $this->collEsTablessRelatedByIdUserCreated;
                $this->esTablessRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->esTablessRelatedByIdUserCreatedScheduledForDeletion[]= clone $esTablesRelatedByIdUserCreated;
            $esTablesRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsTablessRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsTables[] List of ChildEsTables objects
     */
    public function getEsTablessRelatedByIdUserCreatedJoinEsRoles(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsTablesQuery::create(null, $criteria);
        $query->joinWith('EsRoles', $joinBehavior);

        return $this->getEsTablessRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsTablessRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsTables[] List of ChildEsTables objects
     */
    public function getEsTablessRelatedByIdUserCreatedJoinEsModules(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsTablesQuery::create(null, $criteria);
        $query->joinWith('EsModules', $joinBehavior);

        return $this->getEsTablessRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collEsTablessRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsTablessRelatedByIdUserModified()
     */
    public function clearEsTablessRelatedByIdUserModified()
    {
        $this->collEsTablessRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsTablessRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialEsTablessRelatedByIdUserModified($v = true)
    {
        $this->collEsTablessRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collEsTablessRelatedByIdUserModified collection.
     *
     * By default this just sets the collEsTablessRelatedByIdUserModified collection to an empty array (like clearcollEsTablessRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsTablessRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collEsTablessRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsTablesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsTablessRelatedByIdUserModified = new $collectionClassName;
        $this->collEsTablessRelatedByIdUserModified->setModel('\EsTables');
    }

    /**
     * Gets an array of ChildEsTables objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsTables[] List of ChildEsTables objects
     * @throws PropelException
     */
    public function getEsTablessRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsTablessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsTablessRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsTablessRelatedByIdUserModified) {
                // return empty collection
                $this->initEsTablessRelatedByIdUserModified();
            } else {
                $collEsTablessRelatedByIdUserModified = ChildEsTablesQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsTablessRelatedByIdUserModifiedPartial && count($collEsTablessRelatedByIdUserModified)) {
                        $this->initEsTablessRelatedByIdUserModified(false);

                        foreach ($collEsTablessRelatedByIdUserModified as $obj) {
                            if (false == $this->collEsTablessRelatedByIdUserModified->contains($obj)) {
                                $this->collEsTablessRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collEsTablessRelatedByIdUserModifiedPartial = true;
                    }

                    return $collEsTablessRelatedByIdUserModified;
                }

                if ($partial && $this->collEsTablessRelatedByIdUserModified) {
                    foreach ($this->collEsTablessRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collEsTablessRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collEsTablessRelatedByIdUserModified = $collEsTablessRelatedByIdUserModified;
                $this->collEsTablessRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collEsTablessRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildEsTables objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esTablessRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsTablessRelatedByIdUserModified(Collection $esTablessRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildEsTables[] $esTablessRelatedByIdUserModifiedToDelete */
        $esTablessRelatedByIdUserModifiedToDelete = $this->getEsTablessRelatedByIdUserModified(new Criteria(), $con)->diff($esTablessRelatedByIdUserModified);


        $this->esTablessRelatedByIdUserModifiedScheduledForDeletion = $esTablessRelatedByIdUserModifiedToDelete;

        foreach ($esTablessRelatedByIdUserModifiedToDelete as $esTablesRelatedByIdUserModifiedRemoved) {
            $esTablesRelatedByIdUserModifiedRemoved->setEsUsersRelatedByIdUserModified(null);
        }

        $this->collEsTablessRelatedByIdUserModified = null;
        foreach ($esTablessRelatedByIdUserModified as $esTablesRelatedByIdUserModified) {
            $this->addEsTablesRelatedByIdUserModified($esTablesRelatedByIdUserModified);
        }

        $this->collEsTablessRelatedByIdUserModified = $esTablessRelatedByIdUserModified;
        $this->collEsTablessRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsTables objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsTables objects.
     * @throws PropelException
     */
    public function countEsTablessRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsTablessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsTablessRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsTablessRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsTablessRelatedByIdUserModified());
            }

            $query = ChildEsTablesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collEsTablessRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildEsTables object to this object
     * through the ChildEsTables foreign key attribute.
     *
     * @param  ChildEsTables $l ChildEsTables
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsTablesRelatedByIdUserModified(ChildEsTables $l)
    {
        if ($this->collEsTablessRelatedByIdUserModified === null) {
            $this->initEsTablessRelatedByIdUserModified();
            $this->collEsTablessRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collEsTablessRelatedByIdUserModified->contains($l)) {
            $this->doAddEsTablesRelatedByIdUserModified($l);

            if ($this->esTablessRelatedByIdUserModifiedScheduledForDeletion and $this->esTablessRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->esTablessRelatedByIdUserModifiedScheduledForDeletion->remove($this->esTablessRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsTables $esTablesRelatedByIdUserModified The ChildEsTables object to add.
     */
    protected function doAddEsTablesRelatedByIdUserModified(ChildEsTables $esTablesRelatedByIdUserModified)
    {
        $this->collEsTablessRelatedByIdUserModified[]= $esTablesRelatedByIdUserModified;
        $esTablesRelatedByIdUserModified->setEsUsersRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildEsTables $esTablesRelatedByIdUserModified The ChildEsTables object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsTablesRelatedByIdUserModified(ChildEsTables $esTablesRelatedByIdUserModified)
    {
        if ($this->getEsTablessRelatedByIdUserModified()->contains($esTablesRelatedByIdUserModified)) {
            $pos = $this->collEsTablessRelatedByIdUserModified->search($esTablesRelatedByIdUserModified);
            $this->collEsTablessRelatedByIdUserModified->remove($pos);
            if (null === $this->esTablessRelatedByIdUserModifiedScheduledForDeletion) {
                $this->esTablessRelatedByIdUserModifiedScheduledForDeletion = clone $this->collEsTablessRelatedByIdUserModified;
                $this->esTablessRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->esTablessRelatedByIdUserModifiedScheduledForDeletion[]= clone $esTablesRelatedByIdUserModified;
            $esTablesRelatedByIdUserModified->setEsUsersRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsTablessRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsTables[] List of ChildEsTables objects
     */
    public function getEsTablessRelatedByIdUserModifiedJoinEsRoles(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsTablesQuery::create(null, $criteria);
        $query->joinWith('EsRoles', $joinBehavior);

        return $this->getEsTablessRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsTablessRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsTables[] List of ChildEsTables objects
     */
    public function getEsTablessRelatedByIdUserModifiedJoinEsModules(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsTablesQuery::create(null, $criteria);
        $query->joinWith('EsModules', $joinBehavior);

        return $this->getEsTablessRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collEsTablesRolessRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsTablesRolessRelatedByIdUserCreated()
     */
    public function clearEsTablesRolessRelatedByIdUserCreated()
    {
        $this->collEsTablesRolessRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsTablesRolessRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialEsTablesRolessRelatedByIdUserCreated($v = true)
    {
        $this->collEsTablesRolessRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collEsTablesRolessRelatedByIdUserCreated collection.
     *
     * By default this just sets the collEsTablesRolessRelatedByIdUserCreated collection to an empty array (like clearcollEsTablesRolessRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsTablesRolessRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collEsTablesRolessRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsTablesRolesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsTablesRolessRelatedByIdUserCreated = new $collectionClassName;
        $this->collEsTablesRolessRelatedByIdUserCreated->setModel('\EsTablesRoles');
    }

    /**
     * Gets an array of ChildEsTablesRoles objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsTablesRoles[] List of ChildEsTablesRoles objects
     * @throws PropelException
     */
    public function getEsTablesRolessRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsTablesRolessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsTablesRolessRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsTablesRolessRelatedByIdUserCreated) {
                // return empty collection
                $this->initEsTablesRolessRelatedByIdUserCreated();
            } else {
                $collEsTablesRolessRelatedByIdUserCreated = ChildEsTablesRolesQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsTablesRolessRelatedByIdUserCreatedPartial && count($collEsTablesRolessRelatedByIdUserCreated)) {
                        $this->initEsTablesRolessRelatedByIdUserCreated(false);

                        foreach ($collEsTablesRolessRelatedByIdUserCreated as $obj) {
                            if (false == $this->collEsTablesRolessRelatedByIdUserCreated->contains($obj)) {
                                $this->collEsTablesRolessRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collEsTablesRolessRelatedByIdUserCreatedPartial = true;
                    }

                    return $collEsTablesRolessRelatedByIdUserCreated;
                }

                if ($partial && $this->collEsTablesRolessRelatedByIdUserCreated) {
                    foreach ($this->collEsTablesRolessRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collEsTablesRolessRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collEsTablesRolessRelatedByIdUserCreated = $collEsTablesRolessRelatedByIdUserCreated;
                $this->collEsTablesRolessRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collEsTablesRolessRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildEsTablesRoles objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esTablesRolessRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsTablesRolessRelatedByIdUserCreated(Collection $esTablesRolessRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildEsTablesRoles[] $esTablesRolessRelatedByIdUserCreatedToDelete */
        $esTablesRolessRelatedByIdUserCreatedToDelete = $this->getEsTablesRolessRelatedByIdUserCreated(new Criteria(), $con)->diff($esTablesRolessRelatedByIdUserCreated);


        $this->esTablesRolessRelatedByIdUserCreatedScheduledForDeletion = $esTablesRolessRelatedByIdUserCreatedToDelete;

        foreach ($esTablesRolessRelatedByIdUserCreatedToDelete as $esTablesRolesRelatedByIdUserCreatedRemoved) {
            $esTablesRolesRelatedByIdUserCreatedRemoved->setEsUsersRelatedByIdUserCreated(null);
        }

        $this->collEsTablesRolessRelatedByIdUserCreated = null;
        foreach ($esTablesRolessRelatedByIdUserCreated as $esTablesRolesRelatedByIdUserCreated) {
            $this->addEsTablesRolesRelatedByIdUserCreated($esTablesRolesRelatedByIdUserCreated);
        }

        $this->collEsTablesRolessRelatedByIdUserCreated = $esTablesRolessRelatedByIdUserCreated;
        $this->collEsTablesRolessRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsTablesRoles objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsTablesRoles objects.
     * @throws PropelException
     */
    public function countEsTablesRolessRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsTablesRolessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsTablesRolessRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsTablesRolessRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsTablesRolessRelatedByIdUserCreated());
            }

            $query = ChildEsTablesRolesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collEsTablesRolessRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildEsTablesRoles object to this object
     * through the ChildEsTablesRoles foreign key attribute.
     *
     * @param  ChildEsTablesRoles $l ChildEsTablesRoles
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsTablesRolesRelatedByIdUserCreated(ChildEsTablesRoles $l)
    {
        if ($this->collEsTablesRolessRelatedByIdUserCreated === null) {
            $this->initEsTablesRolessRelatedByIdUserCreated();
            $this->collEsTablesRolessRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collEsTablesRolessRelatedByIdUserCreated->contains($l)) {
            $this->doAddEsTablesRolesRelatedByIdUserCreated($l);

            if ($this->esTablesRolessRelatedByIdUserCreatedScheduledForDeletion and $this->esTablesRolessRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->esTablesRolessRelatedByIdUserCreatedScheduledForDeletion->remove($this->esTablesRolessRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsTablesRoles $esTablesRolesRelatedByIdUserCreated The ChildEsTablesRoles object to add.
     */
    protected function doAddEsTablesRolesRelatedByIdUserCreated(ChildEsTablesRoles $esTablesRolesRelatedByIdUserCreated)
    {
        $this->collEsTablesRolessRelatedByIdUserCreated[]= $esTablesRolesRelatedByIdUserCreated;
        $esTablesRolesRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildEsTablesRoles $esTablesRolesRelatedByIdUserCreated The ChildEsTablesRoles object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsTablesRolesRelatedByIdUserCreated(ChildEsTablesRoles $esTablesRolesRelatedByIdUserCreated)
    {
        if ($this->getEsTablesRolessRelatedByIdUserCreated()->contains($esTablesRolesRelatedByIdUserCreated)) {
            $pos = $this->collEsTablesRolessRelatedByIdUserCreated->search($esTablesRolesRelatedByIdUserCreated);
            $this->collEsTablesRolessRelatedByIdUserCreated->remove($pos);
            if (null === $this->esTablesRolessRelatedByIdUserCreatedScheduledForDeletion) {
                $this->esTablesRolessRelatedByIdUserCreatedScheduledForDeletion = clone $this->collEsTablesRolessRelatedByIdUserCreated;
                $this->esTablesRolessRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->esTablesRolessRelatedByIdUserCreatedScheduledForDeletion[]= clone $esTablesRolesRelatedByIdUserCreated;
            $esTablesRolesRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsTablesRolessRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsTablesRoles[] List of ChildEsTablesRoles objects
     */
    public function getEsTablesRolessRelatedByIdUserCreatedJoinEsTables(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsTablesRolesQuery::create(null, $criteria);
        $query->joinWith('EsTables', $joinBehavior);

        return $this->getEsTablesRolessRelatedByIdUserCreated($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsTablesRolessRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsTablesRoles[] List of ChildEsTablesRoles objects
     */
    public function getEsTablesRolessRelatedByIdUserCreatedJoinEsRoles(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsTablesRolesQuery::create(null, $criteria);
        $query->joinWith('EsRoles', $joinBehavior);

        return $this->getEsTablesRolessRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collEsTablesRolessRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsTablesRolessRelatedByIdUserModified()
     */
    public function clearEsTablesRolessRelatedByIdUserModified()
    {
        $this->collEsTablesRolessRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsTablesRolessRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialEsTablesRolessRelatedByIdUserModified($v = true)
    {
        $this->collEsTablesRolessRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collEsTablesRolessRelatedByIdUserModified collection.
     *
     * By default this just sets the collEsTablesRolessRelatedByIdUserModified collection to an empty array (like clearcollEsTablesRolessRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsTablesRolessRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collEsTablesRolessRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsTablesRolesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsTablesRolessRelatedByIdUserModified = new $collectionClassName;
        $this->collEsTablesRolessRelatedByIdUserModified->setModel('\EsTablesRoles');
    }

    /**
     * Gets an array of ChildEsTablesRoles objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsTablesRoles[] List of ChildEsTablesRoles objects
     * @throws PropelException
     */
    public function getEsTablesRolessRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsTablesRolessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsTablesRolessRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsTablesRolessRelatedByIdUserModified) {
                // return empty collection
                $this->initEsTablesRolessRelatedByIdUserModified();
            } else {
                $collEsTablesRolessRelatedByIdUserModified = ChildEsTablesRolesQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsTablesRolessRelatedByIdUserModifiedPartial && count($collEsTablesRolessRelatedByIdUserModified)) {
                        $this->initEsTablesRolessRelatedByIdUserModified(false);

                        foreach ($collEsTablesRolessRelatedByIdUserModified as $obj) {
                            if (false == $this->collEsTablesRolessRelatedByIdUserModified->contains($obj)) {
                                $this->collEsTablesRolessRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collEsTablesRolessRelatedByIdUserModifiedPartial = true;
                    }

                    return $collEsTablesRolessRelatedByIdUserModified;
                }

                if ($partial && $this->collEsTablesRolessRelatedByIdUserModified) {
                    foreach ($this->collEsTablesRolessRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collEsTablesRolessRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collEsTablesRolessRelatedByIdUserModified = $collEsTablesRolessRelatedByIdUserModified;
                $this->collEsTablesRolessRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collEsTablesRolessRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildEsTablesRoles objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esTablesRolessRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsTablesRolessRelatedByIdUserModified(Collection $esTablesRolessRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildEsTablesRoles[] $esTablesRolessRelatedByIdUserModifiedToDelete */
        $esTablesRolessRelatedByIdUserModifiedToDelete = $this->getEsTablesRolessRelatedByIdUserModified(new Criteria(), $con)->diff($esTablesRolessRelatedByIdUserModified);


        $this->esTablesRolessRelatedByIdUserModifiedScheduledForDeletion = $esTablesRolessRelatedByIdUserModifiedToDelete;

        foreach ($esTablesRolessRelatedByIdUserModifiedToDelete as $esTablesRolesRelatedByIdUserModifiedRemoved) {
            $esTablesRolesRelatedByIdUserModifiedRemoved->setEsUsersRelatedByIdUserModified(null);
        }

        $this->collEsTablesRolessRelatedByIdUserModified = null;
        foreach ($esTablesRolessRelatedByIdUserModified as $esTablesRolesRelatedByIdUserModified) {
            $this->addEsTablesRolesRelatedByIdUserModified($esTablesRolesRelatedByIdUserModified);
        }

        $this->collEsTablesRolessRelatedByIdUserModified = $esTablesRolessRelatedByIdUserModified;
        $this->collEsTablesRolessRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsTablesRoles objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsTablesRoles objects.
     * @throws PropelException
     */
    public function countEsTablesRolessRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsTablesRolessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsTablesRolessRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsTablesRolessRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsTablesRolessRelatedByIdUserModified());
            }

            $query = ChildEsTablesRolesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collEsTablesRolessRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildEsTablesRoles object to this object
     * through the ChildEsTablesRoles foreign key attribute.
     *
     * @param  ChildEsTablesRoles $l ChildEsTablesRoles
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsTablesRolesRelatedByIdUserModified(ChildEsTablesRoles $l)
    {
        if ($this->collEsTablesRolessRelatedByIdUserModified === null) {
            $this->initEsTablesRolessRelatedByIdUserModified();
            $this->collEsTablesRolessRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collEsTablesRolessRelatedByIdUserModified->contains($l)) {
            $this->doAddEsTablesRolesRelatedByIdUserModified($l);

            if ($this->esTablesRolessRelatedByIdUserModifiedScheduledForDeletion and $this->esTablesRolessRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->esTablesRolessRelatedByIdUserModifiedScheduledForDeletion->remove($this->esTablesRolessRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsTablesRoles $esTablesRolesRelatedByIdUserModified The ChildEsTablesRoles object to add.
     */
    protected function doAddEsTablesRolesRelatedByIdUserModified(ChildEsTablesRoles $esTablesRolesRelatedByIdUserModified)
    {
        $this->collEsTablesRolessRelatedByIdUserModified[]= $esTablesRolesRelatedByIdUserModified;
        $esTablesRolesRelatedByIdUserModified->setEsUsersRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildEsTablesRoles $esTablesRolesRelatedByIdUserModified The ChildEsTablesRoles object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsTablesRolesRelatedByIdUserModified(ChildEsTablesRoles $esTablesRolesRelatedByIdUserModified)
    {
        if ($this->getEsTablesRolessRelatedByIdUserModified()->contains($esTablesRolesRelatedByIdUserModified)) {
            $pos = $this->collEsTablesRolessRelatedByIdUserModified->search($esTablesRolesRelatedByIdUserModified);
            $this->collEsTablesRolessRelatedByIdUserModified->remove($pos);
            if (null === $this->esTablesRolessRelatedByIdUserModifiedScheduledForDeletion) {
                $this->esTablesRolessRelatedByIdUserModifiedScheduledForDeletion = clone $this->collEsTablesRolessRelatedByIdUserModified;
                $this->esTablesRolessRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->esTablesRolessRelatedByIdUserModifiedScheduledForDeletion[]= clone $esTablesRolesRelatedByIdUserModified;
            $esTablesRolesRelatedByIdUserModified->setEsUsersRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsTablesRolessRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsTablesRoles[] List of ChildEsTablesRoles objects
     */
    public function getEsTablesRolessRelatedByIdUserModifiedJoinEsTables(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsTablesRolesQuery::create(null, $criteria);
        $query->joinWith('EsTables', $joinBehavior);

        return $this->getEsTablesRolessRelatedByIdUserModified($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsTablesRolessRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsTablesRoles[] List of ChildEsTablesRoles objects
     */
    public function getEsTablesRolessRelatedByIdUserModifiedJoinEsRoles(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsTablesRolesQuery::create(null, $criteria);
        $query->joinWith('EsRoles', $joinBehavior);

        return $this->getEsTablesRolessRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collEsUsersRolessRelatedByIdUserCreated collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsUsersRolessRelatedByIdUserCreated()
     */
    public function clearEsUsersRolessRelatedByIdUserCreated()
    {
        $this->collEsUsersRolessRelatedByIdUserCreated = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsUsersRolessRelatedByIdUserCreated collection loaded partially.
     */
    public function resetPartialEsUsersRolessRelatedByIdUserCreated($v = true)
    {
        $this->collEsUsersRolessRelatedByIdUserCreatedPartial = $v;
    }

    /**
     * Initializes the collEsUsersRolessRelatedByIdUserCreated collection.
     *
     * By default this just sets the collEsUsersRolessRelatedByIdUserCreated collection to an empty array (like clearcollEsUsersRolessRelatedByIdUserCreated());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsUsersRolessRelatedByIdUserCreated($overrideExisting = true)
    {
        if (null !== $this->collEsUsersRolessRelatedByIdUserCreated && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsUsersRolesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsUsersRolessRelatedByIdUserCreated = new $collectionClassName;
        $this->collEsUsersRolessRelatedByIdUserCreated->setModel('\EsUsersRoles');
    }

    /**
     * Gets an array of ChildEsUsersRoles objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsUsersRoles[] List of ChildEsUsersRoles objects
     * @throws PropelException
     */
    public function getEsUsersRolessRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsUsersRolessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsUsersRolessRelatedByIdUserCreated || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsUsersRolessRelatedByIdUserCreated) {
                // return empty collection
                $this->initEsUsersRolessRelatedByIdUserCreated();
            } else {
                $collEsUsersRolessRelatedByIdUserCreated = ChildEsUsersRolesQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserCreated($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsUsersRolessRelatedByIdUserCreatedPartial && count($collEsUsersRolessRelatedByIdUserCreated)) {
                        $this->initEsUsersRolessRelatedByIdUserCreated(false);

                        foreach ($collEsUsersRolessRelatedByIdUserCreated as $obj) {
                            if (false == $this->collEsUsersRolessRelatedByIdUserCreated->contains($obj)) {
                                $this->collEsUsersRolessRelatedByIdUserCreated->append($obj);
                            }
                        }

                        $this->collEsUsersRolessRelatedByIdUserCreatedPartial = true;
                    }

                    return $collEsUsersRolessRelatedByIdUserCreated;
                }

                if ($partial && $this->collEsUsersRolessRelatedByIdUserCreated) {
                    foreach ($this->collEsUsersRolessRelatedByIdUserCreated as $obj) {
                        if ($obj->isNew()) {
                            $collEsUsersRolessRelatedByIdUserCreated[] = $obj;
                        }
                    }
                }

                $this->collEsUsersRolessRelatedByIdUserCreated = $collEsUsersRolessRelatedByIdUserCreated;
                $this->collEsUsersRolessRelatedByIdUserCreatedPartial = false;
            }
        }

        return $this->collEsUsersRolessRelatedByIdUserCreated;
    }

    /**
     * Sets a collection of ChildEsUsersRoles objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esUsersRolessRelatedByIdUserCreated A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsUsersRolessRelatedByIdUserCreated(Collection $esUsersRolessRelatedByIdUserCreated, ConnectionInterface $con = null)
    {
        /** @var ChildEsUsersRoles[] $esUsersRolessRelatedByIdUserCreatedToDelete */
        $esUsersRolessRelatedByIdUserCreatedToDelete = $this->getEsUsersRolessRelatedByIdUserCreated(new Criteria(), $con)->diff($esUsersRolessRelatedByIdUserCreated);


        $this->esUsersRolessRelatedByIdUserCreatedScheduledForDeletion = $esUsersRolessRelatedByIdUserCreatedToDelete;

        foreach ($esUsersRolessRelatedByIdUserCreatedToDelete as $esUsersRolesRelatedByIdUserCreatedRemoved) {
            $esUsersRolesRelatedByIdUserCreatedRemoved->setEsUsersRelatedByIdUserCreated(null);
        }

        $this->collEsUsersRolessRelatedByIdUserCreated = null;
        foreach ($esUsersRolessRelatedByIdUserCreated as $esUsersRolesRelatedByIdUserCreated) {
            $this->addEsUsersRolesRelatedByIdUserCreated($esUsersRolesRelatedByIdUserCreated);
        }

        $this->collEsUsersRolessRelatedByIdUserCreated = $esUsersRolessRelatedByIdUserCreated;
        $this->collEsUsersRolessRelatedByIdUserCreatedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsUsersRoles objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsUsersRoles objects.
     * @throws PropelException
     */
    public function countEsUsersRolessRelatedByIdUserCreated(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsUsersRolessRelatedByIdUserCreatedPartial && !$this->isNew();
        if (null === $this->collEsUsersRolessRelatedByIdUserCreated || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsUsersRolessRelatedByIdUserCreated) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsUsersRolessRelatedByIdUserCreated());
            }

            $query = ChildEsUsersRolesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserCreated($this)
                ->count($con);
        }

        return count($this->collEsUsersRolessRelatedByIdUserCreated);
    }

    /**
     * Method called to associate a ChildEsUsersRoles object to this object
     * through the ChildEsUsersRoles foreign key attribute.
     *
     * @param  ChildEsUsersRoles $l ChildEsUsersRoles
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsUsersRolesRelatedByIdUserCreated(ChildEsUsersRoles $l)
    {
        if ($this->collEsUsersRolessRelatedByIdUserCreated === null) {
            $this->initEsUsersRolessRelatedByIdUserCreated();
            $this->collEsUsersRolessRelatedByIdUserCreatedPartial = true;
        }

        if (!$this->collEsUsersRolessRelatedByIdUserCreated->contains($l)) {
            $this->doAddEsUsersRolesRelatedByIdUserCreated($l);

            if ($this->esUsersRolessRelatedByIdUserCreatedScheduledForDeletion and $this->esUsersRolessRelatedByIdUserCreatedScheduledForDeletion->contains($l)) {
                $this->esUsersRolessRelatedByIdUserCreatedScheduledForDeletion->remove($this->esUsersRolessRelatedByIdUserCreatedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsUsersRoles $esUsersRolesRelatedByIdUserCreated The ChildEsUsersRoles object to add.
     */
    protected function doAddEsUsersRolesRelatedByIdUserCreated(ChildEsUsersRoles $esUsersRolesRelatedByIdUserCreated)
    {
        $this->collEsUsersRolessRelatedByIdUserCreated[]= $esUsersRolesRelatedByIdUserCreated;
        $esUsersRolesRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated($this);
    }

    /**
     * @param  ChildEsUsersRoles $esUsersRolesRelatedByIdUserCreated The ChildEsUsersRoles object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsUsersRolesRelatedByIdUserCreated(ChildEsUsersRoles $esUsersRolesRelatedByIdUserCreated)
    {
        if ($this->getEsUsersRolessRelatedByIdUserCreated()->contains($esUsersRolesRelatedByIdUserCreated)) {
            $pos = $this->collEsUsersRolessRelatedByIdUserCreated->search($esUsersRolesRelatedByIdUserCreated);
            $this->collEsUsersRolessRelatedByIdUserCreated->remove($pos);
            if (null === $this->esUsersRolessRelatedByIdUserCreatedScheduledForDeletion) {
                $this->esUsersRolessRelatedByIdUserCreatedScheduledForDeletion = clone $this->collEsUsersRolessRelatedByIdUserCreated;
                $this->esUsersRolessRelatedByIdUserCreatedScheduledForDeletion->clear();
            }
            $this->esUsersRolessRelatedByIdUserCreatedScheduledForDeletion[]= clone $esUsersRolesRelatedByIdUserCreated;
            $esUsersRolesRelatedByIdUserCreated->setEsUsersRelatedByIdUserCreated(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsUsersRolessRelatedByIdUserCreated from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsersRoles[] List of ChildEsUsersRoles objects
     */
    public function getEsUsersRolessRelatedByIdUserCreatedJoinEsRoles(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersRolesQuery::create(null, $criteria);
        $query->joinWith('EsRoles', $joinBehavior);

        return $this->getEsUsersRolessRelatedByIdUserCreated($query, $con);
    }

    /**
     * Clears out the collEsUsersRolessRelatedByIdUserModified collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsUsersRolessRelatedByIdUserModified()
     */
    public function clearEsUsersRolessRelatedByIdUserModified()
    {
        $this->collEsUsersRolessRelatedByIdUserModified = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsUsersRolessRelatedByIdUserModified collection loaded partially.
     */
    public function resetPartialEsUsersRolessRelatedByIdUserModified($v = true)
    {
        $this->collEsUsersRolessRelatedByIdUserModifiedPartial = $v;
    }

    /**
     * Initializes the collEsUsersRolessRelatedByIdUserModified collection.
     *
     * By default this just sets the collEsUsersRolessRelatedByIdUserModified collection to an empty array (like clearcollEsUsersRolessRelatedByIdUserModified());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsUsersRolessRelatedByIdUserModified($overrideExisting = true)
    {
        if (null !== $this->collEsUsersRolessRelatedByIdUserModified && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsUsersRolesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsUsersRolessRelatedByIdUserModified = new $collectionClassName;
        $this->collEsUsersRolessRelatedByIdUserModified->setModel('\EsUsersRoles');
    }

    /**
     * Gets an array of ChildEsUsersRoles objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsUsersRoles[] List of ChildEsUsersRoles objects
     * @throws PropelException
     */
    public function getEsUsersRolessRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsUsersRolessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsUsersRolessRelatedByIdUserModified || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsUsersRolessRelatedByIdUserModified) {
                // return empty collection
                $this->initEsUsersRolessRelatedByIdUserModified();
            } else {
                $collEsUsersRolessRelatedByIdUserModified = ChildEsUsersRolesQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUserModified($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsUsersRolessRelatedByIdUserModifiedPartial && count($collEsUsersRolessRelatedByIdUserModified)) {
                        $this->initEsUsersRolessRelatedByIdUserModified(false);

                        foreach ($collEsUsersRolessRelatedByIdUserModified as $obj) {
                            if (false == $this->collEsUsersRolessRelatedByIdUserModified->contains($obj)) {
                                $this->collEsUsersRolessRelatedByIdUserModified->append($obj);
                            }
                        }

                        $this->collEsUsersRolessRelatedByIdUserModifiedPartial = true;
                    }

                    return $collEsUsersRolessRelatedByIdUserModified;
                }

                if ($partial && $this->collEsUsersRolessRelatedByIdUserModified) {
                    foreach ($this->collEsUsersRolessRelatedByIdUserModified as $obj) {
                        if ($obj->isNew()) {
                            $collEsUsersRolessRelatedByIdUserModified[] = $obj;
                        }
                    }
                }

                $this->collEsUsersRolessRelatedByIdUserModified = $collEsUsersRolessRelatedByIdUserModified;
                $this->collEsUsersRolessRelatedByIdUserModifiedPartial = false;
            }
        }

        return $this->collEsUsersRolessRelatedByIdUserModified;
    }

    /**
     * Sets a collection of ChildEsUsersRoles objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esUsersRolessRelatedByIdUserModified A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsUsersRolessRelatedByIdUserModified(Collection $esUsersRolessRelatedByIdUserModified, ConnectionInterface $con = null)
    {
        /** @var ChildEsUsersRoles[] $esUsersRolessRelatedByIdUserModifiedToDelete */
        $esUsersRolessRelatedByIdUserModifiedToDelete = $this->getEsUsersRolessRelatedByIdUserModified(new Criteria(), $con)->diff($esUsersRolessRelatedByIdUserModified);


        $this->esUsersRolessRelatedByIdUserModifiedScheduledForDeletion = $esUsersRolessRelatedByIdUserModifiedToDelete;

        foreach ($esUsersRolessRelatedByIdUserModifiedToDelete as $esUsersRolesRelatedByIdUserModifiedRemoved) {
            $esUsersRolesRelatedByIdUserModifiedRemoved->setEsUsersRelatedByIdUserModified(null);
        }

        $this->collEsUsersRolessRelatedByIdUserModified = null;
        foreach ($esUsersRolessRelatedByIdUserModified as $esUsersRolesRelatedByIdUserModified) {
            $this->addEsUsersRolesRelatedByIdUserModified($esUsersRolesRelatedByIdUserModified);
        }

        $this->collEsUsersRolessRelatedByIdUserModified = $esUsersRolessRelatedByIdUserModified;
        $this->collEsUsersRolessRelatedByIdUserModifiedPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsUsersRoles objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsUsersRoles objects.
     * @throws PropelException
     */
    public function countEsUsersRolessRelatedByIdUserModified(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsUsersRolessRelatedByIdUserModifiedPartial && !$this->isNew();
        if (null === $this->collEsUsersRolessRelatedByIdUserModified || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsUsersRolessRelatedByIdUserModified) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsUsersRolessRelatedByIdUserModified());
            }

            $query = ChildEsUsersRolesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUserModified($this)
                ->count($con);
        }

        return count($this->collEsUsersRolessRelatedByIdUserModified);
    }

    /**
     * Method called to associate a ChildEsUsersRoles object to this object
     * through the ChildEsUsersRoles foreign key attribute.
     *
     * @param  ChildEsUsersRoles $l ChildEsUsersRoles
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsUsersRolesRelatedByIdUserModified(ChildEsUsersRoles $l)
    {
        if ($this->collEsUsersRolessRelatedByIdUserModified === null) {
            $this->initEsUsersRolessRelatedByIdUserModified();
            $this->collEsUsersRolessRelatedByIdUserModifiedPartial = true;
        }

        if (!$this->collEsUsersRolessRelatedByIdUserModified->contains($l)) {
            $this->doAddEsUsersRolesRelatedByIdUserModified($l);

            if ($this->esUsersRolessRelatedByIdUserModifiedScheduledForDeletion and $this->esUsersRolessRelatedByIdUserModifiedScheduledForDeletion->contains($l)) {
                $this->esUsersRolessRelatedByIdUserModifiedScheduledForDeletion->remove($this->esUsersRolessRelatedByIdUserModifiedScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsUsersRoles $esUsersRolesRelatedByIdUserModified The ChildEsUsersRoles object to add.
     */
    protected function doAddEsUsersRolesRelatedByIdUserModified(ChildEsUsersRoles $esUsersRolesRelatedByIdUserModified)
    {
        $this->collEsUsersRolessRelatedByIdUserModified[]= $esUsersRolesRelatedByIdUserModified;
        $esUsersRolesRelatedByIdUserModified->setEsUsersRelatedByIdUserModified($this);
    }

    /**
     * @param  ChildEsUsersRoles $esUsersRolesRelatedByIdUserModified The ChildEsUsersRoles object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsUsersRolesRelatedByIdUserModified(ChildEsUsersRoles $esUsersRolesRelatedByIdUserModified)
    {
        if ($this->getEsUsersRolessRelatedByIdUserModified()->contains($esUsersRolesRelatedByIdUserModified)) {
            $pos = $this->collEsUsersRolessRelatedByIdUserModified->search($esUsersRolesRelatedByIdUserModified);
            $this->collEsUsersRolessRelatedByIdUserModified->remove($pos);
            if (null === $this->esUsersRolessRelatedByIdUserModifiedScheduledForDeletion) {
                $this->esUsersRolessRelatedByIdUserModifiedScheduledForDeletion = clone $this->collEsUsersRolessRelatedByIdUserModified;
                $this->esUsersRolessRelatedByIdUserModifiedScheduledForDeletion->clear();
            }
            $this->esUsersRolessRelatedByIdUserModifiedScheduledForDeletion[]= clone $esUsersRolesRelatedByIdUserModified;
            $esUsersRolesRelatedByIdUserModified->setEsUsersRelatedByIdUserModified(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsUsersRolessRelatedByIdUserModified from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsersRoles[] List of ChildEsUsersRoles objects
     */
    public function getEsUsersRolessRelatedByIdUserModifiedJoinEsRoles(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersRolesQuery::create(null, $criteria);
        $query->joinWith('EsRoles', $joinBehavior);

        return $this->getEsUsersRolessRelatedByIdUserModified($query, $con);
    }

    /**
     * Clears out the collEsUsersRolessRelatedByIdUser collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsUsersRolessRelatedByIdUser()
     */
    public function clearEsUsersRolessRelatedByIdUser()
    {
        $this->collEsUsersRolessRelatedByIdUser = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsUsersRolessRelatedByIdUser collection loaded partially.
     */
    public function resetPartialEsUsersRolessRelatedByIdUser($v = true)
    {
        $this->collEsUsersRolessRelatedByIdUserPartial = $v;
    }

    /**
     * Initializes the collEsUsersRolessRelatedByIdUser collection.
     *
     * By default this just sets the collEsUsersRolessRelatedByIdUser collection to an empty array (like clearcollEsUsersRolessRelatedByIdUser());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsUsersRolessRelatedByIdUser($overrideExisting = true)
    {
        if (null !== $this->collEsUsersRolessRelatedByIdUser && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsUsersRolesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsUsersRolessRelatedByIdUser = new $collectionClassName;
        $this->collEsUsersRolessRelatedByIdUser->setModel('\EsUsersRoles');
    }

    /**
     * Gets an array of ChildEsUsersRoles objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsUsersRoles[] List of ChildEsUsersRoles objects
     * @throws PropelException
     */
    public function getEsUsersRolessRelatedByIdUser(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsUsersRolessRelatedByIdUserPartial && !$this->isNew();
        if (null === $this->collEsUsersRolessRelatedByIdUser || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsUsersRolessRelatedByIdUser) {
                // return empty collection
                $this->initEsUsersRolessRelatedByIdUser();
            } else {
                $collEsUsersRolessRelatedByIdUser = ChildEsUsersRolesQuery::create(null, $criteria)
                    ->filterByEsUsersRelatedByIdUser($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsUsersRolessRelatedByIdUserPartial && count($collEsUsersRolessRelatedByIdUser)) {
                        $this->initEsUsersRolessRelatedByIdUser(false);

                        foreach ($collEsUsersRolessRelatedByIdUser as $obj) {
                            if (false == $this->collEsUsersRolessRelatedByIdUser->contains($obj)) {
                                $this->collEsUsersRolessRelatedByIdUser->append($obj);
                            }
                        }

                        $this->collEsUsersRolessRelatedByIdUserPartial = true;
                    }

                    return $collEsUsersRolessRelatedByIdUser;
                }

                if ($partial && $this->collEsUsersRolessRelatedByIdUser) {
                    foreach ($this->collEsUsersRolessRelatedByIdUser as $obj) {
                        if ($obj->isNew()) {
                            $collEsUsersRolessRelatedByIdUser[] = $obj;
                        }
                    }
                }

                $this->collEsUsersRolessRelatedByIdUser = $collEsUsersRolessRelatedByIdUser;
                $this->collEsUsersRolessRelatedByIdUserPartial = false;
            }
        }

        return $this->collEsUsersRolessRelatedByIdUser;
    }

    /**
     * Sets a collection of ChildEsUsersRoles objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esUsersRolessRelatedByIdUser A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function setEsUsersRolessRelatedByIdUser(Collection $esUsersRolessRelatedByIdUser, ConnectionInterface $con = null)
    {
        /** @var ChildEsUsersRoles[] $esUsersRolessRelatedByIdUserToDelete */
        $esUsersRolessRelatedByIdUserToDelete = $this->getEsUsersRolessRelatedByIdUser(new Criteria(), $con)->diff($esUsersRolessRelatedByIdUser);


        $this->esUsersRolessRelatedByIdUserScheduledForDeletion = $esUsersRolessRelatedByIdUserToDelete;

        foreach ($esUsersRolessRelatedByIdUserToDelete as $esUsersRolesRelatedByIdUserRemoved) {
            $esUsersRolesRelatedByIdUserRemoved->setEsUsersRelatedByIdUser(null);
        }

        $this->collEsUsersRolessRelatedByIdUser = null;
        foreach ($esUsersRolessRelatedByIdUser as $esUsersRolesRelatedByIdUser) {
            $this->addEsUsersRolesRelatedByIdUser($esUsersRolesRelatedByIdUser);
        }

        $this->collEsUsersRolessRelatedByIdUser = $esUsersRolessRelatedByIdUser;
        $this->collEsUsersRolessRelatedByIdUserPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsUsersRoles objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsUsersRoles objects.
     * @throws PropelException
     */
    public function countEsUsersRolessRelatedByIdUser(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsUsersRolessRelatedByIdUserPartial && !$this->isNew();
        if (null === $this->collEsUsersRolessRelatedByIdUser || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsUsersRolessRelatedByIdUser) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsUsersRolessRelatedByIdUser());
            }

            $query = ChildEsUsersRolesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsUsersRelatedByIdUser($this)
                ->count($con);
        }

        return count($this->collEsUsersRolessRelatedByIdUser);
    }

    /**
     * Method called to associate a ChildEsUsersRoles object to this object
     * through the ChildEsUsersRoles foreign key attribute.
     *
     * @param  ChildEsUsersRoles $l ChildEsUsersRoles
     * @return $this|\EsUsers The current object (for fluent API support)
     */
    public function addEsUsersRolesRelatedByIdUser(ChildEsUsersRoles $l)
    {
        if ($this->collEsUsersRolessRelatedByIdUser === null) {
            $this->initEsUsersRolessRelatedByIdUser();
            $this->collEsUsersRolessRelatedByIdUserPartial = true;
        }

        if (!$this->collEsUsersRolessRelatedByIdUser->contains($l)) {
            $this->doAddEsUsersRolesRelatedByIdUser($l);

            if ($this->esUsersRolessRelatedByIdUserScheduledForDeletion and $this->esUsersRolessRelatedByIdUserScheduledForDeletion->contains($l)) {
                $this->esUsersRolessRelatedByIdUserScheduledForDeletion->remove($this->esUsersRolessRelatedByIdUserScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsUsersRoles $esUsersRolesRelatedByIdUser The ChildEsUsersRoles object to add.
     */
    protected function doAddEsUsersRolesRelatedByIdUser(ChildEsUsersRoles $esUsersRolesRelatedByIdUser)
    {
        $this->collEsUsersRolessRelatedByIdUser[]= $esUsersRolesRelatedByIdUser;
        $esUsersRolesRelatedByIdUser->setEsUsersRelatedByIdUser($this);
    }

    /**
     * @param  ChildEsUsersRoles $esUsersRolesRelatedByIdUser The ChildEsUsersRoles object to remove.
     * @return $this|ChildEsUsers The current object (for fluent API support)
     */
    public function removeEsUsersRolesRelatedByIdUser(ChildEsUsersRoles $esUsersRolesRelatedByIdUser)
    {
        if ($this->getEsUsersRolessRelatedByIdUser()->contains($esUsersRolesRelatedByIdUser)) {
            $pos = $this->collEsUsersRolessRelatedByIdUser->search($esUsersRolesRelatedByIdUser);
            $this->collEsUsersRolessRelatedByIdUser->remove($pos);
            if (null === $this->esUsersRolessRelatedByIdUserScheduledForDeletion) {
                $this->esUsersRolessRelatedByIdUserScheduledForDeletion = clone $this->collEsUsersRolessRelatedByIdUser;
                $this->esUsersRolessRelatedByIdUserScheduledForDeletion->clear();
            }
            $this->esUsersRolessRelatedByIdUserScheduledForDeletion[]= $esUsersRolesRelatedByIdUser;
            $esUsersRolesRelatedByIdUser->setEsUsersRelatedByIdUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsUsers is new, it will return
     * an empty collection; or if this EsUsers has previously
     * been saved, it will retrieve related EsUsersRolessRelatedByIdUser from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsUsers.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsersRoles[] List of ChildEsUsersRoles objects
     */
    public function getEsUsersRolessRelatedByIdUserJoinEsRoles(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersRolesQuery::create(null, $criteria);
        $query->joinWith('EsRoles', $joinBehavior);

        return $this->getEsUsersRolessRelatedByIdUser($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aEsRolesRelatedByIdRole) {
            $this->aEsRolesRelatedByIdRole->removeEsUsersRelatedByIdRole($this);
        }
        if (null !== $this->aEsProvinciasRelatedByIdProvincia) {
            $this->aEsProvinciasRelatedByIdProvincia->removeEsUsersRelatedByIdProvincia($this);
        }
        if (null !== $this->aEsFilesRelatedByIdCoverPicture) {
            $this->aEsFilesRelatedByIdCoverPicture->removeEsUsersRelatedByIdCoverPicture($this);
        }
        if (null !== $this->aEsCitiesRelatedByIdCity) {
            $this->aEsCitiesRelatedByIdCity->removeEsUsersRelatedByIdCity($this);
        }
        $this->id_user = null;
        $this->name = null;
        $this->lastname = null;
        $this->username = null;
        $this->email = null;
        $this->address = null;
        $this->password = null;
        $this->birthdate = null;
        $this->age = null;
        $this->carnet = null;
        $this->sexo = null;
        $this->phone_1 = null;
        $this->phone_2 = null;
        $this->cellphone_1 = null;
        $this->cellphone_2 = null;
        $this->ids_files = null;
        $this->id_cover_picture = null;
        $this->id_city = null;
        $this->id_provincia = null;
        $this->id_role = null;
        $this->signin_method = null;
        $this->uid = null;
        $this->country_code = null;
        $this->authy_id = null;
        $this->verified = null;
        $this->change_count = null;
        $this->status = null;
        $this->date_modified = null;
        $this->date_created = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collEsCitiessRelatedByIdUserCreated) {
                foreach ($this->collEsCitiessRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsCitiessRelatedByIdUserModified) {
                foreach ($this->collEsCitiessRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsDomainssRelatedByIdUserCreated) {
                foreach ($this->collEsDomainssRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsDomainssRelatedByIdUserModified) {
                foreach ($this->collEsDomainssRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsFilessRelatedByIdUserCreated) {
                foreach ($this->collEsFilessRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsFilessRelatedByIdUserModified) {
                foreach ($this->collEsFilessRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsModulessRelatedByIdUserModified) {
                foreach ($this->collEsModulessRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsModulessRelatedByIdUserCreated) {
                foreach ($this->collEsModulessRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsProvinciassRelatedByIdUserCreated) {
                foreach ($this->collEsProvinciassRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsProvinciassRelatedByIdUserModified) {
                foreach ($this->collEsProvinciassRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsRolessRelatedByIdUserCreated) {
                foreach ($this->collEsRolessRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsRolessRelatedByIdUserModified) {
                foreach ($this->collEsRolessRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsSessionss) {
                foreach ($this->collEsSessionss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsTablessRelatedByIdUserCreated) {
                foreach ($this->collEsTablessRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsTablessRelatedByIdUserModified) {
                foreach ($this->collEsTablessRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsTablesRolessRelatedByIdUserCreated) {
                foreach ($this->collEsTablesRolessRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsTablesRolessRelatedByIdUserModified) {
                foreach ($this->collEsTablesRolessRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsUsersRolessRelatedByIdUserCreated) {
                foreach ($this->collEsUsersRolessRelatedByIdUserCreated as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsUsersRolessRelatedByIdUserModified) {
                foreach ($this->collEsUsersRolessRelatedByIdUserModified as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsUsersRolessRelatedByIdUser) {
                foreach ($this->collEsUsersRolessRelatedByIdUser as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collEsCitiessRelatedByIdUserCreated = null;
        $this->collEsCitiessRelatedByIdUserModified = null;
        $this->collEsDomainssRelatedByIdUserCreated = null;
        $this->collEsDomainssRelatedByIdUserModified = null;
        $this->collEsFilessRelatedByIdUserCreated = null;
        $this->collEsFilessRelatedByIdUserModified = null;
        $this->collEsModulessRelatedByIdUserModified = null;
        $this->collEsModulessRelatedByIdUserCreated = null;
        $this->collEsProvinciassRelatedByIdUserCreated = null;
        $this->collEsProvinciassRelatedByIdUserModified = null;
        $this->collEsRolessRelatedByIdUserCreated = null;
        $this->collEsRolessRelatedByIdUserModified = null;
        $this->collEsSessionss = null;
        $this->collEsTablessRelatedByIdUserCreated = null;
        $this->collEsTablessRelatedByIdUserModified = null;
        $this->collEsTablesRolessRelatedByIdUserCreated = null;
        $this->collEsTablesRolessRelatedByIdUserModified = null;
        $this->collEsUsersRolessRelatedByIdUserCreated = null;
        $this->collEsUsersRolessRelatedByIdUserModified = null;
        $this->collEsUsersRolessRelatedByIdUser = null;
        $this->aEsRolesRelatedByIdRole = null;
        $this->aEsProvinciasRelatedByIdProvincia = null;
        $this->aEsFilesRelatedByIdCoverPicture = null;
        $this->aEsCitiesRelatedByIdCity = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EsUsersTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
