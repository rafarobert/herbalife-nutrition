<?php

namespace Base;

use \EsCities as ChildEsCities;
use \EsCitiesQuery as ChildEsCitiesQuery;
use \EsProvincias as ChildEsProvincias;
use \EsProvinciasQuery as ChildEsProvinciasQuery;
use \EsUsers as ChildEsUsers;
use \EsUsersQuery as ChildEsUsersQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\EsProvinciasTableMap;
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
 * Base class that represents a row from the 'es_provincias' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class EsProvincias implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\EsProvinciasTableMap';


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
     * The value for the id_provincia field.
     *
     * @var        int
     */
    protected $id_provincia;

    /**
     * The value for the name field.
     *
     * @var        string
     */
    protected $name;

    /**
     * The value for the area field.
     *
     * @var        string
     */
    protected $area;

    /**
     * The value for the lat field.
     *
     * @var        int
     */
    protected $lat;

    /**
     * The value for the lng field.
     *
     * @var        int
     */
    protected $lng;

    /**
     * The value for the id_municipio field.
     *
     * @var        int
     */
    protected $id_municipio;

    /**
     * The value for the id_ciudad field.
     *
     * @var        int
     */
    protected $id_ciudad;

    /**
     * The value for the status field.
     *
     * Note: this column has a database default value of: 'ENABLED'
     * @var        string
     */
    protected $status;

    /**
     * The value for the change_count field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $change_count;

    /**
     * The value for the id_user_modified field.
     *
     * @var        int
     */
    protected $id_user_modified;

    /**
     * The value for the id_user_created field.
     *
     * @var        int
     */
    protected $id_user_created;

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
     * @var        ChildEsUsers
     */
    protected $aEsUsersRelatedByIdUserCreated;

    /**
     * @var        ChildEsUsers
     */
    protected $aEsUsersRelatedByIdUserModified;

    /**
     * @var        ChildEsCities
     */
    protected $aEsCities;

    /**
     * @var        ChildEsProvincias
     */
    protected $aEsProvinciasRelatedByIdMunicipio;

    /**
     * @var        ObjectCollection|ChildEsProvincias[] Collection to store aggregation of ChildEsProvincias objects.
     */
    protected $collEsProvinciassRelatedByIdProvincia;
    protected $collEsProvinciassRelatedByIdProvinciaPartial;

    /**
     * @var        ObjectCollection|ChildEsUsers[] Collection to store aggregation of ChildEsUsers objects.
     */
    protected $collEsUserssRelatedByIdProvincia;
    protected $collEsUserssRelatedByIdProvinciaPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsProvincias[]
     */
    protected $esProvinciassRelatedByIdProvinciaScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsUsers[]
     */
    protected $esUserssRelatedByIdProvinciaScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->status = 'ENABLED';
        $this->change_count = 0;
    }

    /**
     * Initializes internal state of Base\EsProvincias object.
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
     * Compares this with another <code>EsProvincias</code> instance.  If
     * <code>obj</code> is an instance of <code>EsProvincias</code>, delegates to
     * <code>equals(EsProvincias)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|EsProvincias The current object, for fluid interface
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
     * Get the [id_provincia] column value.
     *
     * @return int
     */
    public function getIdProvincia()
    {
        return $this->id_provincia;
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
     * Get the [area] column value.
     *
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Get the [lat] column value.
     *
     * @return int
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Get the [lng] column value.
     *
     * @return int
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Get the [id_municipio] column value.
     *
     * @return int
     */
    public function getIdMunicipio()
    {
        return $this->id_municipio;
    }

    /**
     * Get the [id_ciudad] column value.
     *
     * @return int
     */
    public function getIdCiudad()
    {
        return $this->id_ciudad;
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
     * Get the [change_count] column value.
     *
     * @return int
     */
    public function getChangeCount()
    {
        return $this->change_count;
    }

    /**
     * Get the [id_user_modified] column value.
     *
     * @return int
     */
    public function getIdUserModified()
    {
        return $this->id_user_modified;
    }

    /**
     * Get the [id_user_created] column value.
     *
     * @return int
     */
    public function getIdUserCreated()
    {
        return $this->id_user_created;
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
     * Set the value of [id_provincia] column.
     *
     * @param int $v new value
     * @return $this|\EsProvincias The current object (for fluent API support)
     */
    public function setIdProvincia($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_provincia !== $v) {
            $this->id_provincia = $v;
            $this->modifiedColumns[EsProvinciasTableMap::COL_ID_PROVINCIA] = true;
        }

        return $this;
    } // setIdProvincia()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\EsProvincias The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[EsProvinciasTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [area] column.
     *
     * @param string $v new value
     * @return $this|\EsProvincias The current object (for fluent API support)
     */
    public function setArea($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->area !== $v) {
            $this->area = $v;
            $this->modifiedColumns[EsProvinciasTableMap::COL_AREA] = true;
        }

        return $this;
    } // setArea()

    /**
     * Set the value of [lat] column.
     *
     * @param int $v new value
     * @return $this|\EsProvincias The current object (for fluent API support)
     */
    public function setLat($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->lat !== $v) {
            $this->lat = $v;
            $this->modifiedColumns[EsProvinciasTableMap::COL_LAT] = true;
        }

        return $this;
    } // setLat()

    /**
     * Set the value of [lng] column.
     *
     * @param int $v new value
     * @return $this|\EsProvincias The current object (for fluent API support)
     */
    public function setLng($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->lng !== $v) {
            $this->lng = $v;
            $this->modifiedColumns[EsProvinciasTableMap::COL_LNG] = true;
        }

        return $this;
    } // setLng()

    /**
     * Set the value of [id_municipio] column.
     *
     * @param int $v new value
     * @return $this|\EsProvincias The current object (for fluent API support)
     */
    public function setIdMunicipio($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_municipio !== $v) {
            $this->id_municipio = $v;
            $this->modifiedColumns[EsProvinciasTableMap::COL_ID_MUNICIPIO] = true;
        }

        if ($this->aEsProvinciasRelatedByIdMunicipio !== null && $this->aEsProvinciasRelatedByIdMunicipio->getIdProvincia() !== $v) {
            $this->aEsProvinciasRelatedByIdMunicipio = null;
        }

        return $this;
    } // setIdMunicipio()

    /**
     * Set the value of [id_ciudad] column.
     *
     * @param int $v new value
     * @return $this|\EsProvincias The current object (for fluent API support)
     */
    public function setIdCiudad($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_ciudad !== $v) {
            $this->id_ciudad = $v;
            $this->modifiedColumns[EsProvinciasTableMap::COL_ID_CIUDAD] = true;
        }

        if ($this->aEsCities !== null && $this->aEsCities->getIdCity() !== $v) {
            $this->aEsCities = null;
        }

        return $this;
    } // setIdCiudad()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\EsProvincias The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[EsProvinciasTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [change_count] column.
     *
     * @param int $v new value
     * @return $this|\EsProvincias The current object (for fluent API support)
     */
    public function setChangeCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->change_count !== $v) {
            $this->change_count = $v;
            $this->modifiedColumns[EsProvinciasTableMap::COL_CHANGE_COUNT] = true;
        }

        return $this;
    } // setChangeCount()

    /**
     * Set the value of [id_user_modified] column.
     *
     * @param int $v new value
     * @return $this|\EsProvincias The current object (for fluent API support)
     */
    public function setIdUserModified($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_modified !== $v) {
            $this->id_user_modified = $v;
            $this->modifiedColumns[EsProvinciasTableMap::COL_ID_USER_MODIFIED] = true;
        }

        if ($this->aEsUsersRelatedByIdUserModified !== null && $this->aEsUsersRelatedByIdUserModified->getIdUser() !== $v) {
            $this->aEsUsersRelatedByIdUserModified = null;
        }

        return $this;
    } // setIdUserModified()

    /**
     * Set the value of [id_user_created] column.
     *
     * @param int $v new value
     * @return $this|\EsProvincias The current object (for fluent API support)
     */
    public function setIdUserCreated($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_created !== $v) {
            $this->id_user_created = $v;
            $this->modifiedColumns[EsProvinciasTableMap::COL_ID_USER_CREATED] = true;
        }

        if ($this->aEsUsersRelatedByIdUserCreated !== null && $this->aEsUsersRelatedByIdUserCreated->getIdUser() !== $v) {
            $this->aEsUsersRelatedByIdUserCreated = null;
        }

        return $this;
    } // setIdUserCreated()

    /**
     * Sets the value of [date_modified] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\EsProvincias The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_modified !== null || $dt !== null) {
            if ($this->date_modified === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_modified->format("Y-m-d H:i:s.u")) {
                $this->date_modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EsProvinciasTableMap::COL_DATE_MODIFIED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateModified()

    /**
     * Sets the value of [date_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\EsProvincias The current object (for fluent API support)
     */
    public function setDateCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_created !== null || $dt !== null) {
            if ($this->date_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_created->format("Y-m-d H:i:s.u")) {
                $this->date_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EsProvinciasTableMap::COL_DATE_CREATED] = true;
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
            if ($this->status !== 'ENABLED') {
                return false;
            }

            if ($this->change_count !== 0) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : EsProvinciasTableMap::translateFieldName('IdProvincia', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_provincia = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : EsProvinciasTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : EsProvinciasTableMap::translateFieldName('Area', TableMap::TYPE_PHPNAME, $indexType)];
            $this->area = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : EsProvinciasTableMap::translateFieldName('Lat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lat = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : EsProvinciasTableMap::translateFieldName('Lng', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lng = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : EsProvinciasTableMap::translateFieldName('IdMunicipio', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_municipio = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : EsProvinciasTableMap::translateFieldName('IdCiudad', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_ciudad = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : EsProvinciasTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : EsProvinciasTableMap::translateFieldName('ChangeCount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->change_count = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : EsProvinciasTableMap::translateFieldName('IdUserModified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_modified = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : EsProvinciasTableMap::translateFieldName('IdUserCreated', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_created = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : EsProvinciasTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : EsProvinciasTableMap::translateFieldName('DateCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 13; // 13 = EsProvinciasTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\EsProvincias'), 0, $e);
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
        if ($this->aEsProvinciasRelatedByIdMunicipio !== null && $this->id_municipio !== $this->aEsProvinciasRelatedByIdMunicipio->getIdProvincia()) {
            $this->aEsProvinciasRelatedByIdMunicipio = null;
        }
        if ($this->aEsCities !== null && $this->id_ciudad !== $this->aEsCities->getIdCity()) {
            $this->aEsCities = null;
        }
        if ($this->aEsUsersRelatedByIdUserModified !== null && $this->id_user_modified !== $this->aEsUsersRelatedByIdUserModified->getIdUser()) {
            $this->aEsUsersRelatedByIdUserModified = null;
        }
        if ($this->aEsUsersRelatedByIdUserCreated !== null && $this->id_user_created !== $this->aEsUsersRelatedByIdUserCreated->getIdUser()) {
            $this->aEsUsersRelatedByIdUserCreated = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(EsProvinciasTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildEsProvinciasQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aEsUsersRelatedByIdUserCreated = null;
            $this->aEsUsersRelatedByIdUserModified = null;
            $this->aEsCities = null;
            $this->aEsProvinciasRelatedByIdMunicipio = null;
            $this->collEsProvinciassRelatedByIdProvincia = null;

            $this->collEsUserssRelatedByIdProvincia = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see EsProvincias::setDeleted()
     * @see EsProvincias::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsProvinciasTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildEsProvinciasQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(EsProvinciasTableMap::DATABASE_NAME);
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
                EsProvinciasTableMap::addInstanceToPool($this);
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

            if ($this->aEsUsersRelatedByIdUserCreated !== null) {
                if ($this->aEsUsersRelatedByIdUserCreated->isModified() || $this->aEsUsersRelatedByIdUserCreated->isNew()) {
                    $affectedRows += $this->aEsUsersRelatedByIdUserCreated->save($con);
                }
                $this->setEsUsersRelatedByIdUserCreated($this->aEsUsersRelatedByIdUserCreated);
            }

            if ($this->aEsUsersRelatedByIdUserModified !== null) {
                if ($this->aEsUsersRelatedByIdUserModified->isModified() || $this->aEsUsersRelatedByIdUserModified->isNew()) {
                    $affectedRows += $this->aEsUsersRelatedByIdUserModified->save($con);
                }
                $this->setEsUsersRelatedByIdUserModified($this->aEsUsersRelatedByIdUserModified);
            }

            if ($this->aEsCities !== null) {
                if ($this->aEsCities->isModified() || $this->aEsCities->isNew()) {
                    $affectedRows += $this->aEsCities->save($con);
                }
                $this->setEsCities($this->aEsCities);
            }

            if ($this->aEsProvinciasRelatedByIdMunicipio !== null) {
                if ($this->aEsProvinciasRelatedByIdMunicipio->isModified() || $this->aEsProvinciasRelatedByIdMunicipio->isNew()) {
                    $affectedRows += $this->aEsProvinciasRelatedByIdMunicipio->save($con);
                }
                $this->setEsProvinciasRelatedByIdMunicipio($this->aEsProvinciasRelatedByIdMunicipio);
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

            if ($this->esProvinciassRelatedByIdProvinciaScheduledForDeletion !== null) {
                if (!$this->esProvinciassRelatedByIdProvinciaScheduledForDeletion->isEmpty()) {
                    foreach ($this->esProvinciassRelatedByIdProvinciaScheduledForDeletion as $esProvinciasRelatedByIdProvincia) {
                        // need to save related object because we set the relation to null
                        $esProvinciasRelatedByIdProvincia->save($con);
                    }
                    $this->esProvinciassRelatedByIdProvinciaScheduledForDeletion = null;
                }
            }

            if ($this->collEsProvinciassRelatedByIdProvincia !== null) {
                foreach ($this->collEsProvinciassRelatedByIdProvincia as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esUserssRelatedByIdProvinciaScheduledForDeletion !== null) {
                if (!$this->esUserssRelatedByIdProvinciaScheduledForDeletion->isEmpty()) {
                    foreach ($this->esUserssRelatedByIdProvinciaScheduledForDeletion as $esUsersRelatedByIdProvincia) {
                        // need to save related object because we set the relation to null
                        $esUsersRelatedByIdProvincia->save($con);
                    }
                    $this->esUserssRelatedByIdProvinciaScheduledForDeletion = null;
                }
            }

            if ($this->collEsUserssRelatedByIdProvincia !== null) {
                foreach ($this->collEsUserssRelatedByIdProvincia as $referrerFK) {
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

        $this->modifiedColumns[EsProvinciasTableMap::COL_ID_PROVINCIA] = true;
        if (null !== $this->id_provincia) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EsProvinciasTableMap::COL_ID_PROVINCIA . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EsProvinciasTableMap::COL_ID_PROVINCIA)) {
            $modifiedColumns[':p' . $index++]  = 'id_provincia';
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_AREA)) {
            $modifiedColumns[':p' . $index++]  = 'area';
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_LAT)) {
            $modifiedColumns[':p' . $index++]  = 'lat';
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_LNG)) {
            $modifiedColumns[':p' . $index++]  = 'lng';
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_ID_MUNICIPIO)) {
            $modifiedColumns[':p' . $index++]  = 'id_municipio';
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_ID_CIUDAD)) {
            $modifiedColumns[':p' . $index++]  = 'id_ciudad';
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_CHANGE_COUNT)) {
            $modifiedColumns[':p' . $index++]  = 'change_count';
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_ID_USER_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_modified';
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_ID_USER_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_created';
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_DATE_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'date_created';
        }

        $sql = sprintf(
            'INSERT INTO es_provincias (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_provincia':
                        $stmt->bindValue($identifier, $this->id_provincia, PDO::PARAM_INT);
                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'area':
                        $stmt->bindValue($identifier, $this->area, PDO::PARAM_STR);
                        break;
                    case 'lat':
                        $stmt->bindValue($identifier, $this->lat, PDO::PARAM_INT);
                        break;
                    case 'lng':
                        $stmt->bindValue($identifier, $this->lng, PDO::PARAM_INT);
                        break;
                    case 'id_municipio':
                        $stmt->bindValue($identifier, $this->id_municipio, PDO::PARAM_INT);
                        break;
                    case 'id_ciudad':
                        $stmt->bindValue($identifier, $this->id_ciudad, PDO::PARAM_INT);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case 'change_count':
                        $stmt->bindValue($identifier, $this->change_count, PDO::PARAM_INT);
                        break;
                    case 'id_user_modified':
                        $stmt->bindValue($identifier, $this->id_user_modified, PDO::PARAM_INT);
                        break;
                    case 'id_user_created':
                        $stmt->bindValue($identifier, $this->id_user_created, PDO::PARAM_INT);
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
        $this->setIdProvincia($pk);

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
        $pos = EsProvinciasTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdProvincia();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getArea();
                break;
            case 3:
                return $this->getLat();
                break;
            case 4:
                return $this->getLng();
                break;
            case 5:
                return $this->getIdMunicipio();
                break;
            case 6:
                return $this->getIdCiudad();
                break;
            case 7:
                return $this->getStatus();
                break;
            case 8:
                return $this->getChangeCount();
                break;
            case 9:
                return $this->getIdUserModified();
                break;
            case 10:
                return $this->getIdUserCreated();
                break;
            case 11:
                return $this->getDateModified();
                break;
            case 12:
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

        if (isset($alreadyDumpedObjects['EsProvincias'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['EsProvincias'][$this->hashCode()] = true;
        $keys = EsProvinciasTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdProvincia(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getArea(),
            $keys[3] => $this->getLat(),
            $keys[4] => $this->getLng(),
            $keys[5] => $this->getIdMunicipio(),
            $keys[6] => $this->getIdCiudad(),
            $keys[7] => $this->getStatus(),
            $keys[8] => $this->getChangeCount(),
            $keys[9] => $this->getIdUserModified(),
            $keys[10] => $this->getIdUserCreated(),
            $keys[11] => $this->getDateModified(),
            $keys[12] => $this->getDateCreated(),
        );
        if ($result[$keys[11]] instanceof \DateTimeInterface) {
            $result[$keys[11]] = $result[$keys[11]]->format('c');
        }

        if ($result[$keys[12]] instanceof \DateTimeInterface) {
            $result[$keys[12]] = $result[$keys[12]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aEsUsersRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esUsers';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_users';
                        break;
                    default:
                        $key = 'EsUsers';
                }

                $result[$key] = $this->aEsUsersRelatedByIdUserCreated->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEsUsersRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esUsers';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_users';
                        break;
                    default:
                        $key = 'EsUsers';
                }

                $result[$key] = $this->aEsUsersRelatedByIdUserModified->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEsCities) {

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

                $result[$key] = $this->aEsCities->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEsProvinciasRelatedByIdMunicipio) {

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

                $result[$key] = $this->aEsProvinciasRelatedByIdMunicipio->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collEsProvinciassRelatedByIdProvincia) {

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

                $result[$key] = $this->collEsProvinciassRelatedByIdProvincia->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsUserssRelatedByIdProvincia) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esUserss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_userss';
                        break;
                    default:
                        $key = 'EsUserss';
                }

                $result[$key] = $this->collEsUserssRelatedByIdProvincia->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\EsProvincias
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EsProvinciasTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\EsProvincias
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdProvincia($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setArea($value);
                break;
            case 3:
                $this->setLat($value);
                break;
            case 4:
                $this->setLng($value);
                break;
            case 5:
                $this->setIdMunicipio($value);
                break;
            case 6:
                $this->setIdCiudad($value);
                break;
            case 7:
                $this->setStatus($value);
                break;
            case 8:
                $this->setChangeCount($value);
                break;
            case 9:
                $this->setIdUserModified($value);
                break;
            case 10:
                $this->setIdUserCreated($value);
                break;
            case 11:
                $this->setDateModified($value);
                break;
            case 12:
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
        $keys = EsProvinciasTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdProvincia($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setArea($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setLat($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setLng($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setIdMunicipio($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setIdCiudad($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setStatus($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setChangeCount($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setIdUserModified($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setIdUserCreated($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setDateModified($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setDateCreated($arr[$keys[12]]);
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
     * @return $this|\EsProvincias The current object, for fluid interface
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
        $criteria = new Criteria(EsProvinciasTableMap::DATABASE_NAME);

        if ($this->isColumnModified(EsProvinciasTableMap::COL_ID_PROVINCIA)) {
            $criteria->add(EsProvinciasTableMap::COL_ID_PROVINCIA, $this->id_provincia);
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_NAME)) {
            $criteria->add(EsProvinciasTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_AREA)) {
            $criteria->add(EsProvinciasTableMap::COL_AREA, $this->area);
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_LAT)) {
            $criteria->add(EsProvinciasTableMap::COL_LAT, $this->lat);
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_LNG)) {
            $criteria->add(EsProvinciasTableMap::COL_LNG, $this->lng);
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_ID_MUNICIPIO)) {
            $criteria->add(EsProvinciasTableMap::COL_ID_MUNICIPIO, $this->id_municipio);
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_ID_CIUDAD)) {
            $criteria->add(EsProvinciasTableMap::COL_ID_CIUDAD, $this->id_ciudad);
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_STATUS)) {
            $criteria->add(EsProvinciasTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_CHANGE_COUNT)) {
            $criteria->add(EsProvinciasTableMap::COL_CHANGE_COUNT, $this->change_count);
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_ID_USER_MODIFIED)) {
            $criteria->add(EsProvinciasTableMap::COL_ID_USER_MODIFIED, $this->id_user_modified);
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_ID_USER_CREATED)) {
            $criteria->add(EsProvinciasTableMap::COL_ID_USER_CREATED, $this->id_user_created);
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(EsProvinciasTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }
        if ($this->isColumnModified(EsProvinciasTableMap::COL_DATE_CREATED)) {
            $criteria->add(EsProvinciasTableMap::COL_DATE_CREATED, $this->date_created);
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
        $criteria = ChildEsProvinciasQuery::create();
        $criteria->add(EsProvinciasTableMap::COL_ID_PROVINCIA, $this->id_provincia);

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
        $validPk = null !== $this->getIdProvincia();

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
        return $this->getIdProvincia();
    }

    /**
     * Generic method to set the primary key (id_provincia column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdProvincia($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdProvincia();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \EsProvincias (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setArea($this->getArea());
        $copyObj->setLat($this->getLat());
        $copyObj->setLng($this->getLng());
        $copyObj->setIdMunicipio($this->getIdMunicipio());
        $copyObj->setIdCiudad($this->getIdCiudad());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setChangeCount($this->getChangeCount());
        $copyObj->setIdUserModified($this->getIdUserModified());
        $copyObj->setIdUserCreated($this->getIdUserCreated());
        $copyObj->setDateModified($this->getDateModified());
        $copyObj->setDateCreated($this->getDateCreated());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getEsProvinciassRelatedByIdProvincia() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsProvinciasRelatedByIdProvincia($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsUserssRelatedByIdProvincia() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsUsersRelatedByIdProvincia($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdProvincia(NULL); // this is a auto-increment column, so set to default value
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
     * @return \EsProvincias Clone of current object.
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
     * Declares an association between this object and a ChildEsUsers object.
     *
     * @param  ChildEsUsers $v
     * @return $this|\EsProvincias The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEsUsersRelatedByIdUserCreated(ChildEsUsers $v = null)
    {
        if ($v === null) {
            $this->setIdUserCreated(NULL);
        } else {
            $this->setIdUserCreated($v->getIdUser());
        }

        $this->aEsUsersRelatedByIdUserCreated = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEsUsers object, it will not be re-added.
        if ($v !== null) {
            $v->addEsProvinciasRelatedByIdUserCreated($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEsUsers object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEsUsers The associated ChildEsUsers object.
     * @throws PropelException
     */
    public function getEsUsersRelatedByIdUserCreated(ConnectionInterface $con = null)
    {
        if ($this->aEsUsersRelatedByIdUserCreated === null && ($this->id_user_created != 0)) {
            $this->aEsUsersRelatedByIdUserCreated = ChildEsUsersQuery::create()->findPk($this->id_user_created, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEsUsersRelatedByIdUserCreated->addEsProvinciassRelatedByIdUserCreated($this);
             */
        }

        return $this->aEsUsersRelatedByIdUserCreated;
    }

    /**
     * Declares an association between this object and a ChildEsUsers object.
     *
     * @param  ChildEsUsers $v
     * @return $this|\EsProvincias The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEsUsersRelatedByIdUserModified(ChildEsUsers $v = null)
    {
        if ($v === null) {
            $this->setIdUserModified(NULL);
        } else {
            $this->setIdUserModified($v->getIdUser());
        }

        $this->aEsUsersRelatedByIdUserModified = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEsUsers object, it will not be re-added.
        if ($v !== null) {
            $v->addEsProvinciasRelatedByIdUserModified($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEsUsers object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEsUsers The associated ChildEsUsers object.
     * @throws PropelException
     */
    public function getEsUsersRelatedByIdUserModified(ConnectionInterface $con = null)
    {
        if ($this->aEsUsersRelatedByIdUserModified === null && ($this->id_user_modified != 0)) {
            $this->aEsUsersRelatedByIdUserModified = ChildEsUsersQuery::create()->findPk($this->id_user_modified, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEsUsersRelatedByIdUserModified->addEsProvinciassRelatedByIdUserModified($this);
             */
        }

        return $this->aEsUsersRelatedByIdUserModified;
    }

    /**
     * Declares an association between this object and a ChildEsCities object.
     *
     * @param  ChildEsCities $v
     * @return $this|\EsProvincias The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEsCities(ChildEsCities $v = null)
    {
        if ($v === null) {
            $this->setIdCiudad(NULL);
        } else {
            $this->setIdCiudad($v->getIdCity());
        }

        $this->aEsCities = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEsCities object, it will not be re-added.
        if ($v !== null) {
            $v->addEsProvincias($this);
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
    public function getEsCities(ConnectionInterface $con = null)
    {
        if ($this->aEsCities === null && ($this->id_ciudad != 0)) {
            $this->aEsCities = ChildEsCitiesQuery::create()->findPk($this->id_ciudad, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEsCities->addEsProvinciass($this);
             */
        }

        return $this->aEsCities;
    }

    /**
     * Declares an association between this object and a ChildEsProvincias object.
     *
     * @param  ChildEsProvincias $v
     * @return $this|\EsProvincias The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEsProvinciasRelatedByIdMunicipio(ChildEsProvincias $v = null)
    {
        if ($v === null) {
            $this->setIdMunicipio(NULL);
        } else {
            $this->setIdMunicipio($v->getIdProvincia());
        }

        $this->aEsProvinciasRelatedByIdMunicipio = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEsProvincias object, it will not be re-added.
        if ($v !== null) {
            $v->addEsProvinciasRelatedByIdProvincia($this);
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
    public function getEsProvinciasRelatedByIdMunicipio(ConnectionInterface $con = null)
    {
        if ($this->aEsProvinciasRelatedByIdMunicipio === null && ($this->id_municipio != 0)) {
            $this->aEsProvinciasRelatedByIdMunicipio = ChildEsProvinciasQuery::create()->findPk($this->id_municipio, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEsProvinciasRelatedByIdMunicipio->addEsProvinciassRelatedByIdProvincia($this);
             */
        }

        return $this->aEsProvinciasRelatedByIdMunicipio;
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
        if ('EsProvinciasRelatedByIdProvincia' == $relationName) {
            $this->initEsProvinciassRelatedByIdProvincia();
            return;
        }
        if ('EsUsersRelatedByIdProvincia' == $relationName) {
            $this->initEsUserssRelatedByIdProvincia();
            return;
        }
    }

    /**
     * Clears out the collEsProvinciassRelatedByIdProvincia collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsProvinciassRelatedByIdProvincia()
     */
    public function clearEsProvinciassRelatedByIdProvincia()
    {
        $this->collEsProvinciassRelatedByIdProvincia = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsProvinciassRelatedByIdProvincia collection loaded partially.
     */
    public function resetPartialEsProvinciassRelatedByIdProvincia($v = true)
    {
        $this->collEsProvinciassRelatedByIdProvinciaPartial = $v;
    }

    /**
     * Initializes the collEsProvinciassRelatedByIdProvincia collection.
     *
     * By default this just sets the collEsProvinciassRelatedByIdProvincia collection to an empty array (like clearcollEsProvinciassRelatedByIdProvincia());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsProvinciassRelatedByIdProvincia($overrideExisting = true)
    {
        if (null !== $this->collEsProvinciassRelatedByIdProvincia && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsProvinciasTableMap::getTableMap()->getCollectionClassName();

        $this->collEsProvinciassRelatedByIdProvincia = new $collectionClassName;
        $this->collEsProvinciassRelatedByIdProvincia->setModel('\EsProvincias');
    }

    /**
     * Gets an array of ChildEsProvincias objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsProvincias is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsProvincias[] List of ChildEsProvincias objects
     * @throws PropelException
     */
    public function getEsProvinciassRelatedByIdProvincia(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsProvinciassRelatedByIdProvinciaPartial && !$this->isNew();
        if (null === $this->collEsProvinciassRelatedByIdProvincia || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsProvinciassRelatedByIdProvincia) {
                // return empty collection
                $this->initEsProvinciassRelatedByIdProvincia();
            } else {
                $collEsProvinciassRelatedByIdProvincia = ChildEsProvinciasQuery::create(null, $criteria)
                    ->filterByEsProvinciasRelatedByIdMunicipio($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsProvinciassRelatedByIdProvinciaPartial && count($collEsProvinciassRelatedByIdProvincia)) {
                        $this->initEsProvinciassRelatedByIdProvincia(false);

                        foreach ($collEsProvinciassRelatedByIdProvincia as $obj) {
                            if (false == $this->collEsProvinciassRelatedByIdProvincia->contains($obj)) {
                                $this->collEsProvinciassRelatedByIdProvincia->append($obj);
                            }
                        }

                        $this->collEsProvinciassRelatedByIdProvinciaPartial = true;
                    }

                    return $collEsProvinciassRelatedByIdProvincia;
                }

                if ($partial && $this->collEsProvinciassRelatedByIdProvincia) {
                    foreach ($this->collEsProvinciassRelatedByIdProvincia as $obj) {
                        if ($obj->isNew()) {
                            $collEsProvinciassRelatedByIdProvincia[] = $obj;
                        }
                    }
                }

                $this->collEsProvinciassRelatedByIdProvincia = $collEsProvinciassRelatedByIdProvincia;
                $this->collEsProvinciassRelatedByIdProvinciaPartial = false;
            }
        }

        return $this->collEsProvinciassRelatedByIdProvincia;
    }

    /**
     * Sets a collection of ChildEsProvincias objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esProvinciassRelatedByIdProvincia A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsProvincias The current object (for fluent API support)
     */
    public function setEsProvinciassRelatedByIdProvincia(Collection $esProvinciassRelatedByIdProvincia, ConnectionInterface $con = null)
    {
        /** @var ChildEsProvincias[] $esProvinciassRelatedByIdProvinciaToDelete */
        $esProvinciassRelatedByIdProvinciaToDelete = $this->getEsProvinciassRelatedByIdProvincia(new Criteria(), $con)->diff($esProvinciassRelatedByIdProvincia);


        $this->esProvinciassRelatedByIdProvinciaScheduledForDeletion = $esProvinciassRelatedByIdProvinciaToDelete;

        foreach ($esProvinciassRelatedByIdProvinciaToDelete as $esProvinciasRelatedByIdProvinciaRemoved) {
            $esProvinciasRelatedByIdProvinciaRemoved->setEsProvinciasRelatedByIdMunicipio(null);
        }

        $this->collEsProvinciassRelatedByIdProvincia = null;
        foreach ($esProvinciassRelatedByIdProvincia as $esProvinciasRelatedByIdProvincia) {
            $this->addEsProvinciasRelatedByIdProvincia($esProvinciasRelatedByIdProvincia);
        }

        $this->collEsProvinciassRelatedByIdProvincia = $esProvinciassRelatedByIdProvincia;
        $this->collEsProvinciassRelatedByIdProvinciaPartial = false;

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
    public function countEsProvinciassRelatedByIdProvincia(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsProvinciassRelatedByIdProvinciaPartial && !$this->isNew();
        if (null === $this->collEsProvinciassRelatedByIdProvincia || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsProvinciassRelatedByIdProvincia) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsProvinciassRelatedByIdProvincia());
            }

            $query = ChildEsProvinciasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsProvinciasRelatedByIdMunicipio($this)
                ->count($con);
        }

        return count($this->collEsProvinciassRelatedByIdProvincia);
    }

    /**
     * Method called to associate a ChildEsProvincias object to this object
     * through the ChildEsProvincias foreign key attribute.
     *
     * @param  ChildEsProvincias $l ChildEsProvincias
     * @return $this|\EsProvincias The current object (for fluent API support)
     */
    public function addEsProvinciasRelatedByIdProvincia(ChildEsProvincias $l)
    {
        if ($this->collEsProvinciassRelatedByIdProvincia === null) {
            $this->initEsProvinciassRelatedByIdProvincia();
            $this->collEsProvinciassRelatedByIdProvinciaPartial = true;
        }

        if (!$this->collEsProvinciassRelatedByIdProvincia->contains($l)) {
            $this->doAddEsProvinciasRelatedByIdProvincia($l);

            if ($this->esProvinciassRelatedByIdProvinciaScheduledForDeletion and $this->esProvinciassRelatedByIdProvinciaScheduledForDeletion->contains($l)) {
                $this->esProvinciassRelatedByIdProvinciaScheduledForDeletion->remove($this->esProvinciassRelatedByIdProvinciaScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsProvincias $esProvinciasRelatedByIdProvincia The ChildEsProvincias object to add.
     */
    protected function doAddEsProvinciasRelatedByIdProvincia(ChildEsProvincias $esProvinciasRelatedByIdProvincia)
    {
        $this->collEsProvinciassRelatedByIdProvincia[]= $esProvinciasRelatedByIdProvincia;
        $esProvinciasRelatedByIdProvincia->setEsProvinciasRelatedByIdMunicipio($this);
    }

    /**
     * @param  ChildEsProvincias $esProvinciasRelatedByIdProvincia The ChildEsProvincias object to remove.
     * @return $this|ChildEsProvincias The current object (for fluent API support)
     */
    public function removeEsProvinciasRelatedByIdProvincia(ChildEsProvincias $esProvinciasRelatedByIdProvincia)
    {
        if ($this->getEsProvinciassRelatedByIdProvincia()->contains($esProvinciasRelatedByIdProvincia)) {
            $pos = $this->collEsProvinciassRelatedByIdProvincia->search($esProvinciasRelatedByIdProvincia);
            $this->collEsProvinciassRelatedByIdProvincia->remove($pos);
            if (null === $this->esProvinciassRelatedByIdProvinciaScheduledForDeletion) {
                $this->esProvinciassRelatedByIdProvinciaScheduledForDeletion = clone $this->collEsProvinciassRelatedByIdProvincia;
                $this->esProvinciassRelatedByIdProvinciaScheduledForDeletion->clear();
            }
            $this->esProvinciassRelatedByIdProvinciaScheduledForDeletion[]= $esProvinciasRelatedByIdProvincia;
            $esProvinciasRelatedByIdProvincia->setEsProvinciasRelatedByIdMunicipio(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsProvincias is new, it will return
     * an empty collection; or if this EsProvincias has previously
     * been saved, it will retrieve related EsProvinciassRelatedByIdProvincia from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsProvincias.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsProvincias[] List of ChildEsProvincias objects
     */
    public function getEsProvinciassRelatedByIdProvinciaJoinEsUsersRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsProvinciasQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserCreated', $joinBehavior);

        return $this->getEsProvinciassRelatedByIdProvincia($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsProvincias is new, it will return
     * an empty collection; or if this EsProvincias has previously
     * been saved, it will retrieve related EsProvinciassRelatedByIdProvincia from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsProvincias.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsProvincias[] List of ChildEsProvincias objects
     */
    public function getEsProvinciassRelatedByIdProvinciaJoinEsUsersRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsProvinciasQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserModified', $joinBehavior);

        return $this->getEsProvinciassRelatedByIdProvincia($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsProvincias is new, it will return
     * an empty collection; or if this EsProvincias has previously
     * been saved, it will retrieve related EsProvinciassRelatedByIdProvincia from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsProvincias.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsProvincias[] List of ChildEsProvincias objects
     */
    public function getEsProvinciassRelatedByIdProvinciaJoinEsCities(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsProvinciasQuery::create(null, $criteria);
        $query->joinWith('EsCities', $joinBehavior);

        return $this->getEsProvinciassRelatedByIdProvincia($query, $con);
    }

    /**
     * Clears out the collEsUserssRelatedByIdProvincia collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsUserssRelatedByIdProvincia()
     */
    public function clearEsUserssRelatedByIdProvincia()
    {
        $this->collEsUserssRelatedByIdProvincia = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsUserssRelatedByIdProvincia collection loaded partially.
     */
    public function resetPartialEsUserssRelatedByIdProvincia($v = true)
    {
        $this->collEsUserssRelatedByIdProvinciaPartial = $v;
    }

    /**
     * Initializes the collEsUserssRelatedByIdProvincia collection.
     *
     * By default this just sets the collEsUserssRelatedByIdProvincia collection to an empty array (like clearcollEsUserssRelatedByIdProvincia());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsUserssRelatedByIdProvincia($overrideExisting = true)
    {
        if (null !== $this->collEsUserssRelatedByIdProvincia && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsUsersTableMap::getTableMap()->getCollectionClassName();

        $this->collEsUserssRelatedByIdProvincia = new $collectionClassName;
        $this->collEsUserssRelatedByIdProvincia->setModel('\EsUsers');
    }

    /**
     * Gets an array of ChildEsUsers objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsProvincias is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsUsers[] List of ChildEsUsers objects
     * @throws PropelException
     */
    public function getEsUserssRelatedByIdProvincia(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsUserssRelatedByIdProvinciaPartial && !$this->isNew();
        if (null === $this->collEsUserssRelatedByIdProvincia || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsUserssRelatedByIdProvincia) {
                // return empty collection
                $this->initEsUserssRelatedByIdProvincia();
            } else {
                $collEsUserssRelatedByIdProvincia = ChildEsUsersQuery::create(null, $criteria)
                    ->filterByEsProvinciasRelatedByIdProvincia($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsUserssRelatedByIdProvinciaPartial && count($collEsUserssRelatedByIdProvincia)) {
                        $this->initEsUserssRelatedByIdProvincia(false);

                        foreach ($collEsUserssRelatedByIdProvincia as $obj) {
                            if (false == $this->collEsUserssRelatedByIdProvincia->contains($obj)) {
                                $this->collEsUserssRelatedByIdProvincia->append($obj);
                            }
                        }

                        $this->collEsUserssRelatedByIdProvinciaPartial = true;
                    }

                    return $collEsUserssRelatedByIdProvincia;
                }

                if ($partial && $this->collEsUserssRelatedByIdProvincia) {
                    foreach ($this->collEsUserssRelatedByIdProvincia as $obj) {
                        if ($obj->isNew()) {
                            $collEsUserssRelatedByIdProvincia[] = $obj;
                        }
                    }
                }

                $this->collEsUserssRelatedByIdProvincia = $collEsUserssRelatedByIdProvincia;
                $this->collEsUserssRelatedByIdProvinciaPartial = false;
            }
        }

        return $this->collEsUserssRelatedByIdProvincia;
    }

    /**
     * Sets a collection of ChildEsUsers objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esUserssRelatedByIdProvincia A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsProvincias The current object (for fluent API support)
     */
    public function setEsUserssRelatedByIdProvincia(Collection $esUserssRelatedByIdProvincia, ConnectionInterface $con = null)
    {
        /** @var ChildEsUsers[] $esUserssRelatedByIdProvinciaToDelete */
        $esUserssRelatedByIdProvinciaToDelete = $this->getEsUserssRelatedByIdProvincia(new Criteria(), $con)->diff($esUserssRelatedByIdProvincia);


        $this->esUserssRelatedByIdProvinciaScheduledForDeletion = $esUserssRelatedByIdProvinciaToDelete;

        foreach ($esUserssRelatedByIdProvinciaToDelete as $esUsersRelatedByIdProvinciaRemoved) {
            $esUsersRelatedByIdProvinciaRemoved->setEsProvinciasRelatedByIdProvincia(null);
        }

        $this->collEsUserssRelatedByIdProvincia = null;
        foreach ($esUserssRelatedByIdProvincia as $esUsersRelatedByIdProvincia) {
            $this->addEsUsersRelatedByIdProvincia($esUsersRelatedByIdProvincia);
        }

        $this->collEsUserssRelatedByIdProvincia = $esUserssRelatedByIdProvincia;
        $this->collEsUserssRelatedByIdProvinciaPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsUsers objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsUsers objects.
     * @throws PropelException
     */
    public function countEsUserssRelatedByIdProvincia(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsUserssRelatedByIdProvinciaPartial && !$this->isNew();
        if (null === $this->collEsUserssRelatedByIdProvincia || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsUserssRelatedByIdProvincia) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsUserssRelatedByIdProvincia());
            }

            $query = ChildEsUsersQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsProvinciasRelatedByIdProvincia($this)
                ->count($con);
        }

        return count($this->collEsUserssRelatedByIdProvincia);
    }

    /**
     * Method called to associate a ChildEsUsers object to this object
     * through the ChildEsUsers foreign key attribute.
     *
     * @param  ChildEsUsers $l ChildEsUsers
     * @return $this|\EsProvincias The current object (for fluent API support)
     */
    public function addEsUsersRelatedByIdProvincia(ChildEsUsers $l)
    {
        if ($this->collEsUserssRelatedByIdProvincia === null) {
            $this->initEsUserssRelatedByIdProvincia();
            $this->collEsUserssRelatedByIdProvinciaPartial = true;
        }

        if (!$this->collEsUserssRelatedByIdProvincia->contains($l)) {
            $this->doAddEsUsersRelatedByIdProvincia($l);

            if ($this->esUserssRelatedByIdProvinciaScheduledForDeletion and $this->esUserssRelatedByIdProvinciaScheduledForDeletion->contains($l)) {
                $this->esUserssRelatedByIdProvinciaScheduledForDeletion->remove($this->esUserssRelatedByIdProvinciaScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsUsers $esUsersRelatedByIdProvincia The ChildEsUsers object to add.
     */
    protected function doAddEsUsersRelatedByIdProvincia(ChildEsUsers $esUsersRelatedByIdProvincia)
    {
        $this->collEsUserssRelatedByIdProvincia[]= $esUsersRelatedByIdProvincia;
        $esUsersRelatedByIdProvincia->setEsProvinciasRelatedByIdProvincia($this);
    }

    /**
     * @param  ChildEsUsers $esUsersRelatedByIdProvincia The ChildEsUsers object to remove.
     * @return $this|ChildEsProvincias The current object (for fluent API support)
     */
    public function removeEsUsersRelatedByIdProvincia(ChildEsUsers $esUsersRelatedByIdProvincia)
    {
        if ($this->getEsUserssRelatedByIdProvincia()->contains($esUsersRelatedByIdProvincia)) {
            $pos = $this->collEsUserssRelatedByIdProvincia->search($esUsersRelatedByIdProvincia);
            $this->collEsUserssRelatedByIdProvincia->remove($pos);
            if (null === $this->esUserssRelatedByIdProvinciaScheduledForDeletion) {
                $this->esUserssRelatedByIdProvinciaScheduledForDeletion = clone $this->collEsUserssRelatedByIdProvincia;
                $this->esUserssRelatedByIdProvinciaScheduledForDeletion->clear();
            }
            $this->esUserssRelatedByIdProvinciaScheduledForDeletion[]= $esUsersRelatedByIdProvincia;
            $esUsersRelatedByIdProvincia->setEsProvinciasRelatedByIdProvincia(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsProvincias is new, it will return
     * an empty collection; or if this EsProvincias has previously
     * been saved, it will retrieve related EsUserssRelatedByIdProvincia from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsProvincias.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsers[] List of ChildEsUsers objects
     */
    public function getEsUserssRelatedByIdProvinciaJoinEsRolesRelatedByIdRole(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersQuery::create(null, $criteria);
        $query->joinWith('EsRolesRelatedByIdRole', $joinBehavior);

        return $this->getEsUserssRelatedByIdProvincia($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsProvincias is new, it will return
     * an empty collection; or if this EsProvincias has previously
     * been saved, it will retrieve related EsUserssRelatedByIdProvincia from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsProvincias.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsers[] List of ChildEsUsers objects
     */
    public function getEsUserssRelatedByIdProvinciaJoinEsFilesRelatedByIdCoverPicture(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersQuery::create(null, $criteria);
        $query->joinWith('EsFilesRelatedByIdCoverPicture', $joinBehavior);

        return $this->getEsUserssRelatedByIdProvincia($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsProvincias is new, it will return
     * an empty collection; or if this EsProvincias has previously
     * been saved, it will retrieve related EsUserssRelatedByIdProvincia from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsProvincias.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsers[] List of ChildEsUsers objects
     */
    public function getEsUserssRelatedByIdProvinciaJoinEsCitiesRelatedByIdCity(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersQuery::create(null, $criteria);
        $query->joinWith('EsCitiesRelatedByIdCity', $joinBehavior);

        return $this->getEsUserssRelatedByIdProvincia($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aEsUsersRelatedByIdUserCreated) {
            $this->aEsUsersRelatedByIdUserCreated->removeEsProvinciasRelatedByIdUserCreated($this);
        }
        if (null !== $this->aEsUsersRelatedByIdUserModified) {
            $this->aEsUsersRelatedByIdUserModified->removeEsProvinciasRelatedByIdUserModified($this);
        }
        if (null !== $this->aEsCities) {
            $this->aEsCities->removeEsProvincias($this);
        }
        if (null !== $this->aEsProvinciasRelatedByIdMunicipio) {
            $this->aEsProvinciasRelatedByIdMunicipio->removeEsProvinciasRelatedByIdProvincia($this);
        }
        $this->id_provincia = null;
        $this->name = null;
        $this->area = null;
        $this->lat = null;
        $this->lng = null;
        $this->id_municipio = null;
        $this->id_ciudad = null;
        $this->status = null;
        $this->change_count = null;
        $this->id_user_modified = null;
        $this->id_user_created = null;
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
            if ($this->collEsProvinciassRelatedByIdProvincia) {
                foreach ($this->collEsProvinciassRelatedByIdProvincia as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsUserssRelatedByIdProvincia) {
                foreach ($this->collEsUserssRelatedByIdProvincia as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collEsProvinciassRelatedByIdProvincia = null;
        $this->collEsUserssRelatedByIdProvincia = null;
        $this->aEsUsersRelatedByIdUserCreated = null;
        $this->aEsUsersRelatedByIdUserModified = null;
        $this->aEsCities = null;
        $this->aEsProvinciasRelatedByIdMunicipio = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EsProvinciasTableMap::DEFAULT_STRING_FORMAT);
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
