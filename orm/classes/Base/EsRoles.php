<?php

namespace Base;

use \EsRoles as ChildEsRoles;
use \EsRolesQuery as ChildEsRolesQuery;
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
use Map\EsRolesTableMap;
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
 * Base class that represents a row from the 'es_roles' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class EsRoles implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\EsRolesTableMap';


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
     * The value for the id_role field.
     *
     * @var        int
     */
    protected $id_role;

    /**
     * The value for the name field.
     *
     * @var        string
     */
    protected $name;

    /**
     * The value for the description field.
     *
     * @var        string
     */
    protected $description;

    /**
     * The value for the write field.
     *
     * @var        string
     */
    protected $write;

    /**
     * The value for the read field.
     *
     * @var        string
     */
    protected $read;

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
     * @var        ObjectCollection|ChildEsTables[] Collection to store aggregation of ChildEsTables objects.
     */
    protected $collEsTabless;
    protected $collEsTablessPartial;

    /**
     * @var        ObjectCollection|ChildEsTablesRoles[] Collection to store aggregation of ChildEsTablesRoles objects.
     */
    protected $collEsTablesRoless;
    protected $collEsTablesRolessPartial;

    /**
     * @var        ObjectCollection|ChildEsUsers[] Collection to store aggregation of ChildEsUsers objects.
     */
    protected $collEsUserssRelatedByIdRole;
    protected $collEsUserssRelatedByIdRolePartial;

    /**
     * @var        ObjectCollection|ChildEsUsersRoles[] Collection to store aggregation of ChildEsUsersRoles objects.
     */
    protected $collEsUsersRoless;
    protected $collEsUsersRolessPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsTables[]
     */
    protected $esTablessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsTablesRoles[]
     */
    protected $esTablesRolessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsUsers[]
     */
    protected $esUserssRelatedByIdRoleScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsUsersRoles[]
     */
    protected $esUsersRolessScheduledForDeletion = null;

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
     * Initializes internal state of Base\EsRoles object.
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
     * Compares this with another <code>EsRoles</code> instance.  If
     * <code>obj</code> is an instance of <code>EsRoles</code>, delegates to
     * <code>equals(EsRoles)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|EsRoles The current object, for fluid interface
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
     * Get the [id_role] column value.
     *
     * @return int
     */
    public function getIdRole()
    {
        return $this->id_role;
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
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [write] column value.
     *
     * @return string
     */
    public function getWrite()
    {
        return $this->write;
    }

    /**
     * Get the [read] column value.
     *
     * @return string
     */
    public function getRead()
    {
        return $this->read;
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
     * Set the value of [id_role] column.
     *
     * @param int $v new value
     * @return $this|\EsRoles The current object (for fluent API support)
     */
    public function setIdRole($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_role !== $v) {
            $this->id_role = $v;
            $this->modifiedColumns[EsRolesTableMap::COL_ID_ROLE] = true;
        }

        return $this;
    } // setIdRole()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\EsRoles The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[EsRolesTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return $this|\EsRoles The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[EsRolesTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [write] column.
     *
     * @param string $v new value
     * @return $this|\EsRoles The current object (for fluent API support)
     */
    public function setWrite($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->write !== $v) {
            $this->write = $v;
            $this->modifiedColumns[EsRolesTableMap::COL_WRITE] = true;
        }

        return $this;
    } // setWrite()

    /**
     * Set the value of [read] column.
     *
     * @param string $v new value
     * @return $this|\EsRoles The current object (for fluent API support)
     */
    public function setRead($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->read !== $v) {
            $this->read = $v;
            $this->modifiedColumns[EsRolesTableMap::COL_READ] = true;
        }

        return $this;
    } // setRead()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\EsRoles The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[EsRolesTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [change_count] column.
     *
     * @param int $v new value
     * @return $this|\EsRoles The current object (for fluent API support)
     */
    public function setChangeCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->change_count !== $v) {
            $this->change_count = $v;
            $this->modifiedColumns[EsRolesTableMap::COL_CHANGE_COUNT] = true;
        }

        return $this;
    } // setChangeCount()

    /**
     * Set the value of [id_user_modified] column.
     *
     * @param int $v new value
     * @return $this|\EsRoles The current object (for fluent API support)
     */
    public function setIdUserModified($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_modified !== $v) {
            $this->id_user_modified = $v;
            $this->modifiedColumns[EsRolesTableMap::COL_ID_USER_MODIFIED] = true;
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
     * @return $this|\EsRoles The current object (for fluent API support)
     */
    public function setIdUserCreated($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_created !== $v) {
            $this->id_user_created = $v;
            $this->modifiedColumns[EsRolesTableMap::COL_ID_USER_CREATED] = true;
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
     * @return $this|\EsRoles The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_modified !== null || $dt !== null) {
            if ($this->date_modified === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_modified->format("Y-m-d H:i:s.u")) {
                $this->date_modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EsRolesTableMap::COL_DATE_MODIFIED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateModified()

    /**
     * Sets the value of [date_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\EsRoles The current object (for fluent API support)
     */
    public function setDateCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_created !== null || $dt !== null) {
            if ($this->date_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_created->format("Y-m-d H:i:s.u")) {
                $this->date_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EsRolesTableMap::COL_DATE_CREATED] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : EsRolesTableMap::translateFieldName('IdRole', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_role = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : EsRolesTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : EsRolesTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : EsRolesTableMap::translateFieldName('Write', TableMap::TYPE_PHPNAME, $indexType)];
            $this->write = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : EsRolesTableMap::translateFieldName('Read', TableMap::TYPE_PHPNAME, $indexType)];
            $this->read = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : EsRolesTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : EsRolesTableMap::translateFieldName('ChangeCount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->change_count = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : EsRolesTableMap::translateFieldName('IdUserModified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_modified = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : EsRolesTableMap::translateFieldName('IdUserCreated', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_created = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : EsRolesTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : EsRolesTableMap::translateFieldName('DateCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 11; // 11 = EsRolesTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\EsRoles'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(EsRolesTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildEsRolesQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aEsUsersRelatedByIdUserCreated = null;
            $this->aEsUsersRelatedByIdUserModified = null;
            $this->collEsTabless = null;

            $this->collEsTablesRoless = null;

            $this->collEsUserssRelatedByIdRole = null;

            $this->collEsUsersRoless = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see EsRoles::setDeleted()
     * @see EsRoles::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsRolesTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildEsRolesQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(EsRolesTableMap::DATABASE_NAME);
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
                EsRolesTableMap::addInstanceToPool($this);
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

            if ($this->esTablessScheduledForDeletion !== null) {
                if (!$this->esTablessScheduledForDeletion->isEmpty()) {
                    foreach ($this->esTablessScheduledForDeletion as $esTables) {
                        // need to save related object because we set the relation to null
                        $esTables->save($con);
                    }
                    $this->esTablessScheduledForDeletion = null;
                }
            }

            if ($this->collEsTabless !== null) {
                foreach ($this->collEsTabless as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esTablesRolessScheduledForDeletion !== null) {
                if (!$this->esTablesRolessScheduledForDeletion->isEmpty()) {
                    foreach ($this->esTablesRolessScheduledForDeletion as $esTablesRoles) {
                        // need to save related object because we set the relation to null
                        $esTablesRoles->save($con);
                    }
                    $this->esTablesRolessScheduledForDeletion = null;
                }
            }

            if ($this->collEsTablesRoless !== null) {
                foreach ($this->collEsTablesRoless as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esUserssRelatedByIdRoleScheduledForDeletion !== null) {
                if (!$this->esUserssRelatedByIdRoleScheduledForDeletion->isEmpty()) {
                    foreach ($this->esUserssRelatedByIdRoleScheduledForDeletion as $esUsersRelatedByIdRole) {
                        // need to save related object because we set the relation to null
                        $esUsersRelatedByIdRole->save($con);
                    }
                    $this->esUserssRelatedByIdRoleScheduledForDeletion = null;
                }
            }

            if ($this->collEsUserssRelatedByIdRole !== null) {
                foreach ($this->collEsUserssRelatedByIdRole as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esUsersRolessScheduledForDeletion !== null) {
                if (!$this->esUsersRolessScheduledForDeletion->isEmpty()) {
                    foreach ($this->esUsersRolessScheduledForDeletion as $esUsersRoles) {
                        // need to save related object because we set the relation to null
                        $esUsersRoles->save($con);
                    }
                    $this->esUsersRolessScheduledForDeletion = null;
                }
            }

            if ($this->collEsUsersRoless !== null) {
                foreach ($this->collEsUsersRoless as $referrerFK) {
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

        $this->modifiedColumns[EsRolesTableMap::COL_ID_ROLE] = true;
        if (null !== $this->id_role) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EsRolesTableMap::COL_ID_ROLE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EsRolesTableMap::COL_ID_ROLE)) {
            $modifiedColumns[':p' . $index++]  = 'id_role';
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_WRITE)) {
            $modifiedColumns[':p' . $index++]  = 'write';
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_READ)) {
            $modifiedColumns[':p' . $index++]  = 'read';
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_CHANGE_COUNT)) {
            $modifiedColumns[':p' . $index++]  = 'change_count';
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_ID_USER_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_modified';
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_ID_USER_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_created';
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_DATE_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'date_created';
        }

        $sql = sprintf(
            'INSERT INTO es_roles (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_role':
                        $stmt->bindValue($identifier, $this->id_role, PDO::PARAM_INT);
                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'description':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'write':
                        $stmt->bindValue($identifier, $this->write, PDO::PARAM_STR);
                        break;
                    case 'read':
                        $stmt->bindValue($identifier, $this->read, PDO::PARAM_STR);
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
        $this->setIdRole($pk);

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
        $pos = EsRolesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdRole();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getDescription();
                break;
            case 3:
                return $this->getWrite();
                break;
            case 4:
                return $this->getRead();
                break;
            case 5:
                return $this->getStatus();
                break;
            case 6:
                return $this->getChangeCount();
                break;
            case 7:
                return $this->getIdUserModified();
                break;
            case 8:
                return $this->getIdUserCreated();
                break;
            case 9:
                return $this->getDateModified();
                break;
            case 10:
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

        if (isset($alreadyDumpedObjects['EsRoles'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['EsRoles'][$this->hashCode()] = true;
        $keys = EsRolesTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdRole(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getDescription(),
            $keys[3] => $this->getWrite(),
            $keys[4] => $this->getRead(),
            $keys[5] => $this->getStatus(),
            $keys[6] => $this->getChangeCount(),
            $keys[7] => $this->getIdUserModified(),
            $keys[8] => $this->getIdUserCreated(),
            $keys[9] => $this->getDateModified(),
            $keys[10] => $this->getDateCreated(),
        );
        if ($result[$keys[9]] instanceof \DateTimeInterface) {
            $result[$keys[9]] = $result[$keys[9]]->format('c');
        }

        if ($result[$keys[10]] instanceof \DateTimeInterface) {
            $result[$keys[10]] = $result[$keys[10]]->format('c');
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
            if (null !== $this->collEsTabless) {

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

                $result[$key] = $this->collEsTabless->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsTablesRoless) {

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

                $result[$key] = $this->collEsTablesRoless->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsUserssRelatedByIdRole) {

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

                $result[$key] = $this->collEsUserssRelatedByIdRole->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsUsersRoless) {

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

                $result[$key] = $this->collEsUsersRoless->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\EsRoles
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EsRolesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\EsRoles
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdRole($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setDescription($value);
                break;
            case 3:
                $this->setWrite($value);
                break;
            case 4:
                $this->setRead($value);
                break;
            case 5:
                $this->setStatus($value);
                break;
            case 6:
                $this->setChangeCount($value);
                break;
            case 7:
                $this->setIdUserModified($value);
                break;
            case 8:
                $this->setIdUserCreated($value);
                break;
            case 9:
                $this->setDateModified($value);
                break;
            case 10:
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
        $keys = EsRolesTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdRole($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDescription($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setWrite($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setRead($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setStatus($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setChangeCount($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setIdUserModified($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setIdUserCreated($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setDateModified($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setDateCreated($arr[$keys[10]]);
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
     * @return $this|\EsRoles The current object, for fluid interface
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
        $criteria = new Criteria(EsRolesTableMap::DATABASE_NAME);

        if ($this->isColumnModified(EsRolesTableMap::COL_ID_ROLE)) {
            $criteria->add(EsRolesTableMap::COL_ID_ROLE, $this->id_role);
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_NAME)) {
            $criteria->add(EsRolesTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_DESCRIPTION)) {
            $criteria->add(EsRolesTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_WRITE)) {
            $criteria->add(EsRolesTableMap::COL_WRITE, $this->write);
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_READ)) {
            $criteria->add(EsRolesTableMap::COL_READ, $this->read);
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_STATUS)) {
            $criteria->add(EsRolesTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_CHANGE_COUNT)) {
            $criteria->add(EsRolesTableMap::COL_CHANGE_COUNT, $this->change_count);
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_ID_USER_MODIFIED)) {
            $criteria->add(EsRolesTableMap::COL_ID_USER_MODIFIED, $this->id_user_modified);
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_ID_USER_CREATED)) {
            $criteria->add(EsRolesTableMap::COL_ID_USER_CREATED, $this->id_user_created);
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(EsRolesTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }
        if ($this->isColumnModified(EsRolesTableMap::COL_DATE_CREATED)) {
            $criteria->add(EsRolesTableMap::COL_DATE_CREATED, $this->date_created);
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
        $criteria = ChildEsRolesQuery::create();
        $criteria->add(EsRolesTableMap::COL_ID_ROLE, $this->id_role);

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
        $validPk = null !== $this->getIdRole();

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
        return $this->getIdRole();
    }

    /**
     * Generic method to set the primary key (id_role column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdRole($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdRole();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \EsRoles (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setWrite($this->getWrite());
        $copyObj->setRead($this->getRead());
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

            foreach ($this->getEsTabless() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsTables($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsTablesRoless() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsTablesRoles($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsUserssRelatedByIdRole() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsUsersRelatedByIdRole($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsUsersRoless() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsUsersRoles($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdRole(NULL); // this is a auto-increment column, so set to default value
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
     * @return \EsRoles Clone of current object.
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
     * @return $this|\EsRoles The current object (for fluent API support)
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
            $v->addEsRolesRelatedByIdUserCreated($this);
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
                $this->aEsUsersRelatedByIdUserCreated->addEsRolessRelatedByIdUserCreated($this);
             */
        }

        return $this->aEsUsersRelatedByIdUserCreated;
    }

    /**
     * Declares an association between this object and a ChildEsUsers object.
     *
     * @param  ChildEsUsers $v
     * @return $this|\EsRoles The current object (for fluent API support)
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
            $v->addEsRolesRelatedByIdUserModified($this);
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
                $this->aEsUsersRelatedByIdUserModified->addEsRolessRelatedByIdUserModified($this);
             */
        }

        return $this->aEsUsersRelatedByIdUserModified;
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
        if ('EsTables' == $relationName) {
            $this->initEsTabless();
            return;
        }
        if ('EsTablesRoles' == $relationName) {
            $this->initEsTablesRoless();
            return;
        }
        if ('EsUsersRelatedByIdRole' == $relationName) {
            $this->initEsUserssRelatedByIdRole();
            return;
        }
        if ('EsUsersRoles' == $relationName) {
            $this->initEsUsersRoless();
            return;
        }
    }

    /**
     * Clears out the collEsTabless collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsTabless()
     */
    public function clearEsTabless()
    {
        $this->collEsTabless = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsTabless collection loaded partially.
     */
    public function resetPartialEsTabless($v = true)
    {
        $this->collEsTablessPartial = $v;
    }

    /**
     * Initializes the collEsTabless collection.
     *
     * By default this just sets the collEsTabless collection to an empty array (like clearcollEsTabless());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsTabless($overrideExisting = true)
    {
        if (null !== $this->collEsTabless && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsTablesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsTabless = new $collectionClassName;
        $this->collEsTabless->setModel('\EsTables');
    }

    /**
     * Gets an array of ChildEsTables objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsRoles is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsTables[] List of ChildEsTables objects
     * @throws PropelException
     */
    public function getEsTabless(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsTablessPartial && !$this->isNew();
        if (null === $this->collEsTabless || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsTabless) {
                // return empty collection
                $this->initEsTabless();
            } else {
                $collEsTabless = ChildEsTablesQuery::create(null, $criteria)
                    ->filterByEsRoles($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsTablessPartial && count($collEsTabless)) {
                        $this->initEsTabless(false);

                        foreach ($collEsTabless as $obj) {
                            if (false == $this->collEsTabless->contains($obj)) {
                                $this->collEsTabless->append($obj);
                            }
                        }

                        $this->collEsTablessPartial = true;
                    }

                    return $collEsTabless;
                }

                if ($partial && $this->collEsTabless) {
                    foreach ($this->collEsTabless as $obj) {
                        if ($obj->isNew()) {
                            $collEsTabless[] = $obj;
                        }
                    }
                }

                $this->collEsTabless = $collEsTabless;
                $this->collEsTablessPartial = false;
            }
        }

        return $this->collEsTabless;
    }

    /**
     * Sets a collection of ChildEsTables objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esTabless A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsRoles The current object (for fluent API support)
     */
    public function setEsTabless(Collection $esTabless, ConnectionInterface $con = null)
    {
        /** @var ChildEsTables[] $esTablessToDelete */
        $esTablessToDelete = $this->getEsTabless(new Criteria(), $con)->diff($esTabless);


        $this->esTablessScheduledForDeletion = $esTablessToDelete;

        foreach ($esTablessToDelete as $esTablesRemoved) {
            $esTablesRemoved->setEsRoles(null);
        }

        $this->collEsTabless = null;
        foreach ($esTabless as $esTables) {
            $this->addEsTables($esTables);
        }

        $this->collEsTabless = $esTabless;
        $this->collEsTablessPartial = false;

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
    public function countEsTabless(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsTablessPartial && !$this->isNew();
        if (null === $this->collEsTabless || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsTabless) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsTabless());
            }

            $query = ChildEsTablesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsRoles($this)
                ->count($con);
        }

        return count($this->collEsTabless);
    }

    /**
     * Method called to associate a ChildEsTables object to this object
     * through the ChildEsTables foreign key attribute.
     *
     * @param  ChildEsTables $l ChildEsTables
     * @return $this|\EsRoles The current object (for fluent API support)
     */
    public function addEsTables(ChildEsTables $l)
    {
        if ($this->collEsTabless === null) {
            $this->initEsTabless();
            $this->collEsTablessPartial = true;
        }

        if (!$this->collEsTabless->contains($l)) {
            $this->doAddEsTables($l);

            if ($this->esTablessScheduledForDeletion and $this->esTablessScheduledForDeletion->contains($l)) {
                $this->esTablessScheduledForDeletion->remove($this->esTablessScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsTables $esTables The ChildEsTables object to add.
     */
    protected function doAddEsTables(ChildEsTables $esTables)
    {
        $this->collEsTabless[]= $esTables;
        $esTables->setEsRoles($this);
    }

    /**
     * @param  ChildEsTables $esTables The ChildEsTables object to remove.
     * @return $this|ChildEsRoles The current object (for fluent API support)
     */
    public function removeEsTables(ChildEsTables $esTables)
    {
        if ($this->getEsTabless()->contains($esTables)) {
            $pos = $this->collEsTabless->search($esTables);
            $this->collEsTabless->remove($pos);
            if (null === $this->esTablessScheduledForDeletion) {
                $this->esTablessScheduledForDeletion = clone $this->collEsTabless;
                $this->esTablessScheduledForDeletion->clear();
            }
            $this->esTablessScheduledForDeletion[]= $esTables;
            $esTables->setEsRoles(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsRoles is new, it will return
     * an empty collection; or if this EsRoles has previously
     * been saved, it will retrieve related EsTabless from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsRoles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsTables[] List of ChildEsTables objects
     */
    public function getEsTablessJoinEsUsersRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsTablesQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserCreated', $joinBehavior);

        return $this->getEsTabless($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsRoles is new, it will return
     * an empty collection; or if this EsRoles has previously
     * been saved, it will retrieve related EsTabless from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsRoles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsTables[] List of ChildEsTables objects
     */
    public function getEsTablessJoinEsUsersRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsTablesQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserModified', $joinBehavior);

        return $this->getEsTabless($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsRoles is new, it will return
     * an empty collection; or if this EsRoles has previously
     * been saved, it will retrieve related EsTabless from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsRoles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsTables[] List of ChildEsTables objects
     */
    public function getEsTablessJoinEsModules(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsTablesQuery::create(null, $criteria);
        $query->joinWith('EsModules', $joinBehavior);

        return $this->getEsTabless($query, $con);
    }

    /**
     * Clears out the collEsTablesRoless collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsTablesRoless()
     */
    public function clearEsTablesRoless()
    {
        $this->collEsTablesRoless = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsTablesRoless collection loaded partially.
     */
    public function resetPartialEsTablesRoless($v = true)
    {
        $this->collEsTablesRolessPartial = $v;
    }

    /**
     * Initializes the collEsTablesRoless collection.
     *
     * By default this just sets the collEsTablesRoless collection to an empty array (like clearcollEsTablesRoless());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsTablesRoless($overrideExisting = true)
    {
        if (null !== $this->collEsTablesRoless && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsTablesRolesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsTablesRoless = new $collectionClassName;
        $this->collEsTablesRoless->setModel('\EsTablesRoles');
    }

    /**
     * Gets an array of ChildEsTablesRoles objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsRoles is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsTablesRoles[] List of ChildEsTablesRoles objects
     * @throws PropelException
     */
    public function getEsTablesRoless(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsTablesRolessPartial && !$this->isNew();
        if (null === $this->collEsTablesRoless || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsTablesRoless) {
                // return empty collection
                $this->initEsTablesRoless();
            } else {
                $collEsTablesRoless = ChildEsTablesRolesQuery::create(null, $criteria)
                    ->filterByEsRoles($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsTablesRolessPartial && count($collEsTablesRoless)) {
                        $this->initEsTablesRoless(false);

                        foreach ($collEsTablesRoless as $obj) {
                            if (false == $this->collEsTablesRoless->contains($obj)) {
                                $this->collEsTablesRoless->append($obj);
                            }
                        }

                        $this->collEsTablesRolessPartial = true;
                    }

                    return $collEsTablesRoless;
                }

                if ($partial && $this->collEsTablesRoless) {
                    foreach ($this->collEsTablesRoless as $obj) {
                        if ($obj->isNew()) {
                            $collEsTablesRoless[] = $obj;
                        }
                    }
                }

                $this->collEsTablesRoless = $collEsTablesRoless;
                $this->collEsTablesRolessPartial = false;
            }
        }

        return $this->collEsTablesRoless;
    }

    /**
     * Sets a collection of ChildEsTablesRoles objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esTablesRoless A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsRoles The current object (for fluent API support)
     */
    public function setEsTablesRoless(Collection $esTablesRoless, ConnectionInterface $con = null)
    {
        /** @var ChildEsTablesRoles[] $esTablesRolessToDelete */
        $esTablesRolessToDelete = $this->getEsTablesRoless(new Criteria(), $con)->diff($esTablesRoless);


        $this->esTablesRolessScheduledForDeletion = $esTablesRolessToDelete;

        foreach ($esTablesRolessToDelete as $esTablesRolesRemoved) {
            $esTablesRolesRemoved->setEsRoles(null);
        }

        $this->collEsTablesRoless = null;
        foreach ($esTablesRoless as $esTablesRoles) {
            $this->addEsTablesRoles($esTablesRoles);
        }

        $this->collEsTablesRoless = $esTablesRoless;
        $this->collEsTablesRolessPartial = false;

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
    public function countEsTablesRoless(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsTablesRolessPartial && !$this->isNew();
        if (null === $this->collEsTablesRoless || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsTablesRoless) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsTablesRoless());
            }

            $query = ChildEsTablesRolesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsRoles($this)
                ->count($con);
        }

        return count($this->collEsTablesRoless);
    }

    /**
     * Method called to associate a ChildEsTablesRoles object to this object
     * through the ChildEsTablesRoles foreign key attribute.
     *
     * @param  ChildEsTablesRoles $l ChildEsTablesRoles
     * @return $this|\EsRoles The current object (for fluent API support)
     */
    public function addEsTablesRoles(ChildEsTablesRoles $l)
    {
        if ($this->collEsTablesRoless === null) {
            $this->initEsTablesRoless();
            $this->collEsTablesRolessPartial = true;
        }

        if (!$this->collEsTablesRoless->contains($l)) {
            $this->doAddEsTablesRoles($l);

            if ($this->esTablesRolessScheduledForDeletion and $this->esTablesRolessScheduledForDeletion->contains($l)) {
                $this->esTablesRolessScheduledForDeletion->remove($this->esTablesRolessScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsTablesRoles $esTablesRoles The ChildEsTablesRoles object to add.
     */
    protected function doAddEsTablesRoles(ChildEsTablesRoles $esTablesRoles)
    {
        $this->collEsTablesRoless[]= $esTablesRoles;
        $esTablesRoles->setEsRoles($this);
    }

    /**
     * @param  ChildEsTablesRoles $esTablesRoles The ChildEsTablesRoles object to remove.
     * @return $this|ChildEsRoles The current object (for fluent API support)
     */
    public function removeEsTablesRoles(ChildEsTablesRoles $esTablesRoles)
    {
        if ($this->getEsTablesRoless()->contains($esTablesRoles)) {
            $pos = $this->collEsTablesRoless->search($esTablesRoles);
            $this->collEsTablesRoless->remove($pos);
            if (null === $this->esTablesRolessScheduledForDeletion) {
                $this->esTablesRolessScheduledForDeletion = clone $this->collEsTablesRoless;
                $this->esTablesRolessScheduledForDeletion->clear();
            }
            $this->esTablesRolessScheduledForDeletion[]= $esTablesRoles;
            $esTablesRoles->setEsRoles(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsRoles is new, it will return
     * an empty collection; or if this EsRoles has previously
     * been saved, it will retrieve related EsTablesRoless from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsRoles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsTablesRoles[] List of ChildEsTablesRoles objects
     */
    public function getEsTablesRolessJoinEsUsersRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsTablesRolesQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserCreated', $joinBehavior);

        return $this->getEsTablesRoless($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsRoles is new, it will return
     * an empty collection; or if this EsRoles has previously
     * been saved, it will retrieve related EsTablesRoless from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsRoles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsTablesRoles[] List of ChildEsTablesRoles objects
     */
    public function getEsTablesRolessJoinEsUsersRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsTablesRolesQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserModified', $joinBehavior);

        return $this->getEsTablesRoless($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsRoles is new, it will return
     * an empty collection; or if this EsRoles has previously
     * been saved, it will retrieve related EsTablesRoless from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsRoles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsTablesRoles[] List of ChildEsTablesRoles objects
     */
    public function getEsTablesRolessJoinEsTables(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsTablesRolesQuery::create(null, $criteria);
        $query->joinWith('EsTables', $joinBehavior);

        return $this->getEsTablesRoless($query, $con);
    }

    /**
     * Clears out the collEsUserssRelatedByIdRole collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsUserssRelatedByIdRole()
     */
    public function clearEsUserssRelatedByIdRole()
    {
        $this->collEsUserssRelatedByIdRole = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsUserssRelatedByIdRole collection loaded partially.
     */
    public function resetPartialEsUserssRelatedByIdRole($v = true)
    {
        $this->collEsUserssRelatedByIdRolePartial = $v;
    }

    /**
     * Initializes the collEsUserssRelatedByIdRole collection.
     *
     * By default this just sets the collEsUserssRelatedByIdRole collection to an empty array (like clearcollEsUserssRelatedByIdRole());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsUserssRelatedByIdRole($overrideExisting = true)
    {
        if (null !== $this->collEsUserssRelatedByIdRole && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsUsersTableMap::getTableMap()->getCollectionClassName();

        $this->collEsUserssRelatedByIdRole = new $collectionClassName;
        $this->collEsUserssRelatedByIdRole->setModel('\EsUsers');
    }

    /**
     * Gets an array of ChildEsUsers objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsRoles is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsUsers[] List of ChildEsUsers objects
     * @throws PropelException
     */
    public function getEsUserssRelatedByIdRole(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsUserssRelatedByIdRolePartial && !$this->isNew();
        if (null === $this->collEsUserssRelatedByIdRole || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsUserssRelatedByIdRole) {
                // return empty collection
                $this->initEsUserssRelatedByIdRole();
            } else {
                $collEsUserssRelatedByIdRole = ChildEsUsersQuery::create(null, $criteria)
                    ->filterByEsRolesRelatedByIdRole($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsUserssRelatedByIdRolePartial && count($collEsUserssRelatedByIdRole)) {
                        $this->initEsUserssRelatedByIdRole(false);

                        foreach ($collEsUserssRelatedByIdRole as $obj) {
                            if (false == $this->collEsUserssRelatedByIdRole->contains($obj)) {
                                $this->collEsUserssRelatedByIdRole->append($obj);
                            }
                        }

                        $this->collEsUserssRelatedByIdRolePartial = true;
                    }

                    return $collEsUserssRelatedByIdRole;
                }

                if ($partial && $this->collEsUserssRelatedByIdRole) {
                    foreach ($this->collEsUserssRelatedByIdRole as $obj) {
                        if ($obj->isNew()) {
                            $collEsUserssRelatedByIdRole[] = $obj;
                        }
                    }
                }

                $this->collEsUserssRelatedByIdRole = $collEsUserssRelatedByIdRole;
                $this->collEsUserssRelatedByIdRolePartial = false;
            }
        }

        return $this->collEsUserssRelatedByIdRole;
    }

    /**
     * Sets a collection of ChildEsUsers objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esUserssRelatedByIdRole A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsRoles The current object (for fluent API support)
     */
    public function setEsUserssRelatedByIdRole(Collection $esUserssRelatedByIdRole, ConnectionInterface $con = null)
    {
        /** @var ChildEsUsers[] $esUserssRelatedByIdRoleToDelete */
        $esUserssRelatedByIdRoleToDelete = $this->getEsUserssRelatedByIdRole(new Criteria(), $con)->diff($esUserssRelatedByIdRole);


        $this->esUserssRelatedByIdRoleScheduledForDeletion = $esUserssRelatedByIdRoleToDelete;

        foreach ($esUserssRelatedByIdRoleToDelete as $esUsersRelatedByIdRoleRemoved) {
            $esUsersRelatedByIdRoleRemoved->setEsRolesRelatedByIdRole(null);
        }

        $this->collEsUserssRelatedByIdRole = null;
        foreach ($esUserssRelatedByIdRole as $esUsersRelatedByIdRole) {
            $this->addEsUsersRelatedByIdRole($esUsersRelatedByIdRole);
        }

        $this->collEsUserssRelatedByIdRole = $esUserssRelatedByIdRole;
        $this->collEsUserssRelatedByIdRolePartial = false;

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
    public function countEsUserssRelatedByIdRole(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsUserssRelatedByIdRolePartial && !$this->isNew();
        if (null === $this->collEsUserssRelatedByIdRole || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsUserssRelatedByIdRole) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsUserssRelatedByIdRole());
            }

            $query = ChildEsUsersQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsRolesRelatedByIdRole($this)
                ->count($con);
        }

        return count($this->collEsUserssRelatedByIdRole);
    }

    /**
     * Method called to associate a ChildEsUsers object to this object
     * through the ChildEsUsers foreign key attribute.
     *
     * @param  ChildEsUsers $l ChildEsUsers
     * @return $this|\EsRoles The current object (for fluent API support)
     */
    public function addEsUsersRelatedByIdRole(ChildEsUsers $l)
    {
        if ($this->collEsUserssRelatedByIdRole === null) {
            $this->initEsUserssRelatedByIdRole();
            $this->collEsUserssRelatedByIdRolePartial = true;
        }

        if (!$this->collEsUserssRelatedByIdRole->contains($l)) {
            $this->doAddEsUsersRelatedByIdRole($l);

            if ($this->esUserssRelatedByIdRoleScheduledForDeletion and $this->esUserssRelatedByIdRoleScheduledForDeletion->contains($l)) {
                $this->esUserssRelatedByIdRoleScheduledForDeletion->remove($this->esUserssRelatedByIdRoleScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsUsers $esUsersRelatedByIdRole The ChildEsUsers object to add.
     */
    protected function doAddEsUsersRelatedByIdRole(ChildEsUsers $esUsersRelatedByIdRole)
    {
        $this->collEsUserssRelatedByIdRole[]= $esUsersRelatedByIdRole;
        $esUsersRelatedByIdRole->setEsRolesRelatedByIdRole($this);
    }

    /**
     * @param  ChildEsUsers $esUsersRelatedByIdRole The ChildEsUsers object to remove.
     * @return $this|ChildEsRoles The current object (for fluent API support)
     */
    public function removeEsUsersRelatedByIdRole(ChildEsUsers $esUsersRelatedByIdRole)
    {
        if ($this->getEsUserssRelatedByIdRole()->contains($esUsersRelatedByIdRole)) {
            $pos = $this->collEsUserssRelatedByIdRole->search($esUsersRelatedByIdRole);
            $this->collEsUserssRelatedByIdRole->remove($pos);
            if (null === $this->esUserssRelatedByIdRoleScheduledForDeletion) {
                $this->esUserssRelatedByIdRoleScheduledForDeletion = clone $this->collEsUserssRelatedByIdRole;
                $this->esUserssRelatedByIdRoleScheduledForDeletion->clear();
            }
            $this->esUserssRelatedByIdRoleScheduledForDeletion[]= $esUsersRelatedByIdRole;
            $esUsersRelatedByIdRole->setEsRolesRelatedByIdRole(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsRoles is new, it will return
     * an empty collection; or if this EsRoles has previously
     * been saved, it will retrieve related EsUserssRelatedByIdRole from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsRoles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsers[] List of ChildEsUsers objects
     */
    public function getEsUserssRelatedByIdRoleJoinEsProvinciasRelatedByIdProvincia(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersQuery::create(null, $criteria);
        $query->joinWith('EsProvinciasRelatedByIdProvincia', $joinBehavior);

        return $this->getEsUserssRelatedByIdRole($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsRoles is new, it will return
     * an empty collection; or if this EsRoles has previously
     * been saved, it will retrieve related EsUserssRelatedByIdRole from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsRoles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsers[] List of ChildEsUsers objects
     */
    public function getEsUserssRelatedByIdRoleJoinEsFilesRelatedByIdCoverPicture(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersQuery::create(null, $criteria);
        $query->joinWith('EsFilesRelatedByIdCoverPicture', $joinBehavior);

        return $this->getEsUserssRelatedByIdRole($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsRoles is new, it will return
     * an empty collection; or if this EsRoles has previously
     * been saved, it will retrieve related EsUserssRelatedByIdRole from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsRoles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsers[] List of ChildEsUsers objects
     */
    public function getEsUserssRelatedByIdRoleJoinEsCitiesRelatedByIdCity(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersQuery::create(null, $criteria);
        $query->joinWith('EsCitiesRelatedByIdCity', $joinBehavior);

        return $this->getEsUserssRelatedByIdRole($query, $con);
    }

    /**
     * Clears out the collEsUsersRoless collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsUsersRoless()
     */
    public function clearEsUsersRoless()
    {
        $this->collEsUsersRoless = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsUsersRoless collection loaded partially.
     */
    public function resetPartialEsUsersRoless($v = true)
    {
        $this->collEsUsersRolessPartial = $v;
    }

    /**
     * Initializes the collEsUsersRoless collection.
     *
     * By default this just sets the collEsUsersRoless collection to an empty array (like clearcollEsUsersRoless());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsUsersRoless($overrideExisting = true)
    {
        if (null !== $this->collEsUsersRoless && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsUsersRolesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsUsersRoless = new $collectionClassName;
        $this->collEsUsersRoless->setModel('\EsUsersRoles');
    }

    /**
     * Gets an array of ChildEsUsersRoles objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsRoles is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsUsersRoles[] List of ChildEsUsersRoles objects
     * @throws PropelException
     */
    public function getEsUsersRoless(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsUsersRolessPartial && !$this->isNew();
        if (null === $this->collEsUsersRoless || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsUsersRoless) {
                // return empty collection
                $this->initEsUsersRoless();
            } else {
                $collEsUsersRoless = ChildEsUsersRolesQuery::create(null, $criteria)
                    ->filterByEsRoles($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsUsersRolessPartial && count($collEsUsersRoless)) {
                        $this->initEsUsersRoless(false);

                        foreach ($collEsUsersRoless as $obj) {
                            if (false == $this->collEsUsersRoless->contains($obj)) {
                                $this->collEsUsersRoless->append($obj);
                            }
                        }

                        $this->collEsUsersRolessPartial = true;
                    }

                    return $collEsUsersRoless;
                }

                if ($partial && $this->collEsUsersRoless) {
                    foreach ($this->collEsUsersRoless as $obj) {
                        if ($obj->isNew()) {
                            $collEsUsersRoless[] = $obj;
                        }
                    }
                }

                $this->collEsUsersRoless = $collEsUsersRoless;
                $this->collEsUsersRolessPartial = false;
            }
        }

        return $this->collEsUsersRoless;
    }

    /**
     * Sets a collection of ChildEsUsersRoles objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esUsersRoless A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsRoles The current object (for fluent API support)
     */
    public function setEsUsersRoless(Collection $esUsersRoless, ConnectionInterface $con = null)
    {
        /** @var ChildEsUsersRoles[] $esUsersRolessToDelete */
        $esUsersRolessToDelete = $this->getEsUsersRoless(new Criteria(), $con)->diff($esUsersRoless);


        $this->esUsersRolessScheduledForDeletion = $esUsersRolessToDelete;

        foreach ($esUsersRolessToDelete as $esUsersRolesRemoved) {
            $esUsersRolesRemoved->setEsRoles(null);
        }

        $this->collEsUsersRoless = null;
        foreach ($esUsersRoless as $esUsersRoles) {
            $this->addEsUsersRoles($esUsersRoles);
        }

        $this->collEsUsersRoless = $esUsersRoless;
        $this->collEsUsersRolessPartial = false;

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
    public function countEsUsersRoless(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsUsersRolessPartial && !$this->isNew();
        if (null === $this->collEsUsersRoless || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsUsersRoless) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsUsersRoless());
            }

            $query = ChildEsUsersRolesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsRoles($this)
                ->count($con);
        }

        return count($this->collEsUsersRoless);
    }

    /**
     * Method called to associate a ChildEsUsersRoles object to this object
     * through the ChildEsUsersRoles foreign key attribute.
     *
     * @param  ChildEsUsersRoles $l ChildEsUsersRoles
     * @return $this|\EsRoles The current object (for fluent API support)
     */
    public function addEsUsersRoles(ChildEsUsersRoles $l)
    {
        if ($this->collEsUsersRoless === null) {
            $this->initEsUsersRoless();
            $this->collEsUsersRolessPartial = true;
        }

        if (!$this->collEsUsersRoless->contains($l)) {
            $this->doAddEsUsersRoles($l);

            if ($this->esUsersRolessScheduledForDeletion and $this->esUsersRolessScheduledForDeletion->contains($l)) {
                $this->esUsersRolessScheduledForDeletion->remove($this->esUsersRolessScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsUsersRoles $esUsersRoles The ChildEsUsersRoles object to add.
     */
    protected function doAddEsUsersRoles(ChildEsUsersRoles $esUsersRoles)
    {
        $this->collEsUsersRoless[]= $esUsersRoles;
        $esUsersRoles->setEsRoles($this);
    }

    /**
     * @param  ChildEsUsersRoles $esUsersRoles The ChildEsUsersRoles object to remove.
     * @return $this|ChildEsRoles The current object (for fluent API support)
     */
    public function removeEsUsersRoles(ChildEsUsersRoles $esUsersRoles)
    {
        if ($this->getEsUsersRoless()->contains($esUsersRoles)) {
            $pos = $this->collEsUsersRoless->search($esUsersRoles);
            $this->collEsUsersRoless->remove($pos);
            if (null === $this->esUsersRolessScheduledForDeletion) {
                $this->esUsersRolessScheduledForDeletion = clone $this->collEsUsersRoless;
                $this->esUsersRolessScheduledForDeletion->clear();
            }
            $this->esUsersRolessScheduledForDeletion[]= $esUsersRoles;
            $esUsersRoles->setEsRoles(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsRoles is new, it will return
     * an empty collection; or if this EsRoles has previously
     * been saved, it will retrieve related EsUsersRoless from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsRoles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsersRoles[] List of ChildEsUsersRoles objects
     */
    public function getEsUsersRolessJoinEsUsersRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersRolesQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserCreated', $joinBehavior);

        return $this->getEsUsersRoless($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsRoles is new, it will return
     * an empty collection; or if this EsRoles has previously
     * been saved, it will retrieve related EsUsersRoless from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsRoles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsersRoles[] List of ChildEsUsersRoles objects
     */
    public function getEsUsersRolessJoinEsUsersRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersRolesQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserModified', $joinBehavior);

        return $this->getEsUsersRoless($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsRoles is new, it will return
     * an empty collection; or if this EsRoles has previously
     * been saved, it will retrieve related EsUsersRoless from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsRoles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsersRoles[] List of ChildEsUsersRoles objects
     */
    public function getEsUsersRolessJoinEsUsersRelatedByIdUser(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersRolesQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUser', $joinBehavior);

        return $this->getEsUsersRoless($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aEsUsersRelatedByIdUserCreated) {
            $this->aEsUsersRelatedByIdUserCreated->removeEsRolesRelatedByIdUserCreated($this);
        }
        if (null !== $this->aEsUsersRelatedByIdUserModified) {
            $this->aEsUsersRelatedByIdUserModified->removeEsRolesRelatedByIdUserModified($this);
        }
        $this->id_role = null;
        $this->name = null;
        $this->description = null;
        $this->write = null;
        $this->read = null;
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
            if ($this->collEsTabless) {
                foreach ($this->collEsTabless as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsTablesRoless) {
                foreach ($this->collEsTablesRoless as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsUserssRelatedByIdRole) {
                foreach ($this->collEsUserssRelatedByIdRole as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsUsersRoless) {
                foreach ($this->collEsUsersRoless as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collEsTabless = null;
        $this->collEsTablesRoless = null;
        $this->collEsUserssRelatedByIdRole = null;
        $this->collEsUsersRoless = null;
        $this->aEsUsersRelatedByIdUserCreated = null;
        $this->aEsUsersRelatedByIdUserModified = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EsRolesTableMap::DEFAULT_STRING_FORMAT);
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
