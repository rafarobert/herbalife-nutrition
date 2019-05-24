<?php

namespace Base;

use \EsLogsQuery as ChildEsLogsQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\EsLogsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'es_logs' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class EsLogs implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\EsLogsTableMap';


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
     * The value for the id_log field.
     *
     * @var        int
     */
    protected $id_log;

    /**
     * The value for the heading field.
     *
     * @var        string
     */
    protected $heading;

    /**
     * The value for the message field.
     *
     * @var        string
     */
    protected $message;

    /**
     * The value for the action field.
     *
     * @var        string
     */
    protected $action;

    /**
     * The value for the code field.
     *
     * @var        string
     */
    protected $code;

    /**
     * The value for the level field.
     *
     * @var        int
     */
    protected $level;

    /**
     * The value for the file field.
     *
     * @var        string
     */
    protected $file;

    /**
     * The value for the line field.
     *
     * @var        int
     */
    protected $line;

    /**
     * The value for the trace field.
     *
     * @var        string
     */
    protected $trace;

    /**
     * The value for the previous field.
     *
     * @var        string
     */
    protected $previous;

    /**
     * The value for the xdebug_message field.
     *
     * @var        string
     */
    protected $xdebug_message;

    /**
     * The value for the type field.
     *
     * @var        int
     */
    protected $type;

    /**
     * The value for the post field.
     *
     * @var        string
     */
    protected $post;

    /**
     * The value for the severity field.
     *
     * @var        string
     */
    protected $severity;

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
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

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
     * Initializes internal state of Base\EsLogs object.
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
     * Compares this with another <code>EsLogs</code> instance.  If
     * <code>obj</code> is an instance of <code>EsLogs</code>, delegates to
     * <code>equals(EsLogs)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|EsLogs The current object, for fluid interface
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
     * Get the [id_log] column value.
     *
     * @return int
     */
    public function getIdLog()
    {
        return $this->id_log;
    }

    /**
     * Get the [heading] column value.
     *
     * @return string
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * Get the [message] column value.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get the [action] column value.
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Get the [code] column value.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get the [level] column value.
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Get the [file] column value.
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Get the [line] column value.
     *
     * @return int
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Get the [trace] column value.
     *
     * @return string
     */
    public function getTrace()
    {
        return $this->trace;
    }

    /**
     * Get the [previous] column value.
     *
     * @return string
     */
    public function getPrevious()
    {
        return $this->previous;
    }

    /**
     * Get the [xdebug_message] column value.
     *
     * @return string
     */
    public function getXdebugMessage()
    {
        return $this->xdebug_message;
    }

    /**
     * Get the [type] column value.
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the [post] column value.
     *
     * @return string
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Get the [severity] column value.
     *
     * @return string
     */
    public function getSeverity()
    {
        return $this->severity;
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
     * Set the value of [id_log] column.
     *
     * @param int $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setIdLog($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_log !== $v) {
            $this->id_log = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_ID_LOG] = true;
        }

        return $this;
    } // setIdLog()

    /**
     * Set the value of [heading] column.
     *
     * @param string $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setHeading($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->heading !== $v) {
            $this->heading = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_HEADING] = true;
        }

        return $this;
    } // setHeading()

    /**
     * Set the value of [message] column.
     *
     * @param string $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setMessage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->message !== $v) {
            $this->message = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_MESSAGE] = true;
        }

        return $this;
    } // setMessage()

    /**
     * Set the value of [action] column.
     *
     * @param string $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setAction($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->action !== $v) {
            $this->action = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_ACTION] = true;
        }

        return $this;
    } // setAction()

    /**
     * Set the value of [code] column.
     *
     * @param string $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_CODE] = true;
        }

        return $this;
    } // setCode()

    /**
     * Set the value of [level] column.
     *
     * @param int $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setLevel($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->level !== $v) {
            $this->level = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_LEVEL] = true;
        }

        return $this;
    } // setLevel()

    /**
     * Set the value of [file] column.
     *
     * @param string $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setFile($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->file !== $v) {
            $this->file = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_FILE] = true;
        }

        return $this;
    } // setFile()

    /**
     * Set the value of [line] column.
     *
     * @param int $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setLine($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->line !== $v) {
            $this->line = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_LINE] = true;
        }

        return $this;
    } // setLine()

    /**
     * Set the value of [trace] column.
     *
     * @param string $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setTrace($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->trace !== $v) {
            $this->trace = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_TRACE] = true;
        }

        return $this;
    } // setTrace()

    /**
     * Set the value of [previous] column.
     *
     * @param string $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setPrevious($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->previous !== $v) {
            $this->previous = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_PREVIOUS] = true;
        }

        return $this;
    } // setPrevious()

    /**
     * Set the value of [xdebug_message] column.
     *
     * @param string $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setXdebugMessage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->xdebug_message !== $v) {
            $this->xdebug_message = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_XDEBUG_MESSAGE] = true;
        }

        return $this;
    } // setXdebugMessage()

    /**
     * Set the value of [type] column.
     *
     * @param int $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_TYPE] = true;
        }

        return $this;
    } // setType()

    /**
     * Set the value of [post] column.
     *
     * @param string $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setPost($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->post !== $v) {
            $this->post = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_POST] = true;
        }

        return $this;
    } // setPost()

    /**
     * Set the value of [severity] column.
     *
     * @param string $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setSeverity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->severity !== $v) {
            $this->severity = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_SEVERITY] = true;
        }

        return $this;
    } // setSeverity()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [change_count] column.
     *
     * @param int $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setChangeCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->change_count !== $v) {
            $this->change_count = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_CHANGE_COUNT] = true;
        }

        return $this;
    } // setChangeCount()

    /**
     * Set the value of [id_user_modified] column.
     *
     * @param int $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setIdUserModified($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_modified !== $v) {
            $this->id_user_modified = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_ID_USER_MODIFIED] = true;
        }

        return $this;
    } // setIdUserModified()

    /**
     * Set the value of [id_user_created] column.
     *
     * @param int $v new value
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setIdUserCreated($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_created !== $v) {
            $this->id_user_created = $v;
            $this->modifiedColumns[EsLogsTableMap::COL_ID_USER_CREATED] = true;
        }

        return $this;
    } // setIdUserCreated()

    /**
     * Sets the value of [date_modified] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_modified !== null || $dt !== null) {
            if ($this->date_modified === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_modified->format("Y-m-d H:i:s.u")) {
                $this->date_modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EsLogsTableMap::COL_DATE_MODIFIED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateModified()

    /**
     * Sets the value of [date_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\EsLogs The current object (for fluent API support)
     */
    public function setDateCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_created !== null || $dt !== null) {
            if ($this->date_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_created->format("Y-m-d H:i:s.u")) {
                $this->date_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EsLogsTableMap::COL_DATE_CREATED] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : EsLogsTableMap::translateFieldName('IdLog', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_log = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : EsLogsTableMap::translateFieldName('Heading', TableMap::TYPE_PHPNAME, $indexType)];
            $this->heading = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : EsLogsTableMap::translateFieldName('Message', TableMap::TYPE_PHPNAME, $indexType)];
            $this->message = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : EsLogsTableMap::translateFieldName('Action', TableMap::TYPE_PHPNAME, $indexType)];
            $this->action = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : EsLogsTableMap::translateFieldName('Code', TableMap::TYPE_PHPNAME, $indexType)];
            $this->code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : EsLogsTableMap::translateFieldName('Level', TableMap::TYPE_PHPNAME, $indexType)];
            $this->level = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : EsLogsTableMap::translateFieldName('File', TableMap::TYPE_PHPNAME, $indexType)];
            $this->file = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : EsLogsTableMap::translateFieldName('Line', TableMap::TYPE_PHPNAME, $indexType)];
            $this->line = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : EsLogsTableMap::translateFieldName('Trace', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trace = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : EsLogsTableMap::translateFieldName('Previous', TableMap::TYPE_PHPNAME, $indexType)];
            $this->previous = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : EsLogsTableMap::translateFieldName('XdebugMessage', TableMap::TYPE_PHPNAME, $indexType)];
            $this->xdebug_message = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : EsLogsTableMap::translateFieldName('Type', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : EsLogsTableMap::translateFieldName('Post', TableMap::TYPE_PHPNAME, $indexType)];
            $this->post = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : EsLogsTableMap::translateFieldName('Severity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->severity = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : EsLogsTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : EsLogsTableMap::translateFieldName('ChangeCount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->change_count = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : EsLogsTableMap::translateFieldName('IdUserModified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_modified = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : EsLogsTableMap::translateFieldName('IdUserCreated', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_created = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : EsLogsTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : EsLogsTableMap::translateFieldName('DateCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 20; // 20 = EsLogsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\EsLogs'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(EsLogsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildEsLogsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see EsLogs::setDeleted()
     * @see EsLogs::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsLogsTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildEsLogsQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(EsLogsTableMap::DATABASE_NAME);
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
                EsLogsTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[EsLogsTableMap::COL_ID_LOG] = true;
        if (null !== $this->id_log) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EsLogsTableMap::COL_ID_LOG . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EsLogsTableMap::COL_ID_LOG)) {
            $modifiedColumns[':p' . $index++]  = 'id_log';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_HEADING)) {
            $modifiedColumns[':p' . $index++]  = 'heading';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_MESSAGE)) {
            $modifiedColumns[':p' . $index++]  = 'message';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_ACTION)) {
            $modifiedColumns[':p' . $index++]  = 'action';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'code';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_LEVEL)) {
            $modifiedColumns[':p' . $index++]  = 'level';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_FILE)) {
            $modifiedColumns[':p' . $index++]  = 'file';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_LINE)) {
            $modifiedColumns[':p' . $index++]  = 'line';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_TRACE)) {
            $modifiedColumns[':p' . $index++]  = 'trace';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_PREVIOUS)) {
            $modifiedColumns[':p' . $index++]  = 'previous';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_XDEBUG_MESSAGE)) {
            $modifiedColumns[':p' . $index++]  = 'xdebug_message';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'type';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_POST)) {
            $modifiedColumns[':p' . $index++]  = 'post';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_SEVERITY)) {
            $modifiedColumns[':p' . $index++]  = 'severity';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_CHANGE_COUNT)) {
            $modifiedColumns[':p' . $index++]  = 'change_count';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_ID_USER_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_modified';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_ID_USER_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_created';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_DATE_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'date_created';
        }

        $sql = sprintf(
            'INSERT INTO es_logs (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_log':
                        $stmt->bindValue($identifier, $this->id_log, PDO::PARAM_INT);
                        break;
                    case 'heading':
                        $stmt->bindValue($identifier, $this->heading, PDO::PARAM_STR);
                        break;
                    case 'message':
                        $stmt->bindValue($identifier, $this->message, PDO::PARAM_STR);
                        break;
                    case 'action':
                        $stmt->bindValue($identifier, $this->action, PDO::PARAM_STR);
                        break;
                    case 'code':
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_STR);
                        break;
                    case 'level':
                        $stmt->bindValue($identifier, $this->level, PDO::PARAM_INT);
                        break;
                    case 'file':
                        $stmt->bindValue($identifier, $this->file, PDO::PARAM_STR);
                        break;
                    case 'line':
                        $stmt->bindValue($identifier, $this->line, PDO::PARAM_INT);
                        break;
                    case 'trace':
                        $stmt->bindValue($identifier, $this->trace, PDO::PARAM_STR);
                        break;
                    case 'previous':
                        $stmt->bindValue($identifier, $this->previous, PDO::PARAM_STR);
                        break;
                    case 'xdebug_message':
                        $stmt->bindValue($identifier, $this->xdebug_message, PDO::PARAM_STR);
                        break;
                    case 'type':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_INT);
                        break;
                    case 'post':
                        $stmt->bindValue($identifier, $this->post, PDO::PARAM_STR);
                        break;
                    case 'severity':
                        $stmt->bindValue($identifier, $this->severity, PDO::PARAM_STR);
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
        $this->setIdLog($pk);

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
        $pos = EsLogsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdLog();
                break;
            case 1:
                return $this->getHeading();
                break;
            case 2:
                return $this->getMessage();
                break;
            case 3:
                return $this->getAction();
                break;
            case 4:
                return $this->getCode();
                break;
            case 5:
                return $this->getLevel();
                break;
            case 6:
                return $this->getFile();
                break;
            case 7:
                return $this->getLine();
                break;
            case 8:
                return $this->getTrace();
                break;
            case 9:
                return $this->getPrevious();
                break;
            case 10:
                return $this->getXdebugMessage();
                break;
            case 11:
                return $this->getType();
                break;
            case 12:
                return $this->getPost();
                break;
            case 13:
                return $this->getSeverity();
                break;
            case 14:
                return $this->getStatus();
                break;
            case 15:
                return $this->getChangeCount();
                break;
            case 16:
                return $this->getIdUserModified();
                break;
            case 17:
                return $this->getIdUserCreated();
                break;
            case 18:
                return $this->getDateModified();
                break;
            case 19:
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['EsLogs'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['EsLogs'][$this->hashCode()] = true;
        $keys = EsLogsTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdLog(),
            $keys[1] => $this->getHeading(),
            $keys[2] => $this->getMessage(),
            $keys[3] => $this->getAction(),
            $keys[4] => $this->getCode(),
            $keys[5] => $this->getLevel(),
            $keys[6] => $this->getFile(),
            $keys[7] => $this->getLine(),
            $keys[8] => $this->getTrace(),
            $keys[9] => $this->getPrevious(),
            $keys[10] => $this->getXdebugMessage(),
            $keys[11] => $this->getType(),
            $keys[12] => $this->getPost(),
            $keys[13] => $this->getSeverity(),
            $keys[14] => $this->getStatus(),
            $keys[15] => $this->getChangeCount(),
            $keys[16] => $this->getIdUserModified(),
            $keys[17] => $this->getIdUserCreated(),
            $keys[18] => $this->getDateModified(),
            $keys[19] => $this->getDateCreated(),
        );
        if ($result[$keys[18]] instanceof \DateTimeInterface) {
            $result[$keys[18]] = $result[$keys[18]]->format('c');
        }

        if ($result[$keys[19]] instanceof \DateTimeInterface) {
            $result[$keys[19]] = $result[$keys[19]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
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
     * @return $this|\EsLogs
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EsLogsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\EsLogs
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdLog($value);
                break;
            case 1:
                $this->setHeading($value);
                break;
            case 2:
                $this->setMessage($value);
                break;
            case 3:
                $this->setAction($value);
                break;
            case 4:
                $this->setCode($value);
                break;
            case 5:
                $this->setLevel($value);
                break;
            case 6:
                $this->setFile($value);
                break;
            case 7:
                $this->setLine($value);
                break;
            case 8:
                $this->setTrace($value);
                break;
            case 9:
                $this->setPrevious($value);
                break;
            case 10:
                $this->setXdebugMessage($value);
                break;
            case 11:
                $this->setType($value);
                break;
            case 12:
                $this->setPost($value);
                break;
            case 13:
                $this->setSeverity($value);
                break;
            case 14:
                $this->setStatus($value);
                break;
            case 15:
                $this->setChangeCount($value);
                break;
            case 16:
                $this->setIdUserModified($value);
                break;
            case 17:
                $this->setIdUserCreated($value);
                break;
            case 18:
                $this->setDateModified($value);
                break;
            case 19:
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
        $keys = EsLogsTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdLog($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setHeading($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setMessage($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setAction($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCode($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setLevel($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setFile($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setLine($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setTrace($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPrevious($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setXdebugMessage($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setType($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setPost($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setSeverity($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setStatus($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setChangeCount($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setIdUserModified($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setIdUserCreated($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setDateModified($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setDateCreated($arr[$keys[19]]);
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
     * @return $this|\EsLogs The current object, for fluid interface
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
        $criteria = new Criteria(EsLogsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(EsLogsTableMap::COL_ID_LOG)) {
            $criteria->add(EsLogsTableMap::COL_ID_LOG, $this->id_log);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_HEADING)) {
            $criteria->add(EsLogsTableMap::COL_HEADING, $this->heading);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_MESSAGE)) {
            $criteria->add(EsLogsTableMap::COL_MESSAGE, $this->message);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_ACTION)) {
            $criteria->add(EsLogsTableMap::COL_ACTION, $this->action);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_CODE)) {
            $criteria->add(EsLogsTableMap::COL_CODE, $this->code);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_LEVEL)) {
            $criteria->add(EsLogsTableMap::COL_LEVEL, $this->level);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_FILE)) {
            $criteria->add(EsLogsTableMap::COL_FILE, $this->file);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_LINE)) {
            $criteria->add(EsLogsTableMap::COL_LINE, $this->line);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_TRACE)) {
            $criteria->add(EsLogsTableMap::COL_TRACE, $this->trace);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_PREVIOUS)) {
            $criteria->add(EsLogsTableMap::COL_PREVIOUS, $this->previous);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_XDEBUG_MESSAGE)) {
            $criteria->add(EsLogsTableMap::COL_XDEBUG_MESSAGE, $this->xdebug_message);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_TYPE)) {
            $criteria->add(EsLogsTableMap::COL_TYPE, $this->type);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_POST)) {
            $criteria->add(EsLogsTableMap::COL_POST, $this->post);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_SEVERITY)) {
            $criteria->add(EsLogsTableMap::COL_SEVERITY, $this->severity);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_STATUS)) {
            $criteria->add(EsLogsTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_CHANGE_COUNT)) {
            $criteria->add(EsLogsTableMap::COL_CHANGE_COUNT, $this->change_count);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_ID_USER_MODIFIED)) {
            $criteria->add(EsLogsTableMap::COL_ID_USER_MODIFIED, $this->id_user_modified);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_ID_USER_CREATED)) {
            $criteria->add(EsLogsTableMap::COL_ID_USER_CREATED, $this->id_user_created);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(EsLogsTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }
        if ($this->isColumnModified(EsLogsTableMap::COL_DATE_CREATED)) {
            $criteria->add(EsLogsTableMap::COL_DATE_CREATED, $this->date_created);
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
        $criteria = ChildEsLogsQuery::create();
        $criteria->add(EsLogsTableMap::COL_ID_LOG, $this->id_log);

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
        $validPk = null !== $this->getIdLog();

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
        return $this->getIdLog();
    }

    /**
     * Generic method to set the primary key (id_log column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdLog($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdLog();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \EsLogs (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setHeading($this->getHeading());
        $copyObj->setMessage($this->getMessage());
        $copyObj->setAction($this->getAction());
        $copyObj->setCode($this->getCode());
        $copyObj->setLevel($this->getLevel());
        $copyObj->setFile($this->getFile());
        $copyObj->setLine($this->getLine());
        $copyObj->setTrace($this->getTrace());
        $copyObj->setPrevious($this->getPrevious());
        $copyObj->setXdebugMessage($this->getXdebugMessage());
        $copyObj->setType($this->getType());
        $copyObj->setPost($this->getPost());
        $copyObj->setSeverity($this->getSeverity());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setChangeCount($this->getChangeCount());
        $copyObj->setIdUserModified($this->getIdUserModified());
        $copyObj->setIdUserCreated($this->getIdUserCreated());
        $copyObj->setDateModified($this->getDateModified());
        $copyObj->setDateCreated($this->getDateCreated());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdLog(NULL); // this is a auto-increment column, so set to default value
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
     * @return \EsLogs Clone of current object.
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
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id_log = null;
        $this->heading = null;
        $this->message = null;
        $this->action = null;
        $this->code = null;
        $this->level = null;
        $this->file = null;
        $this->line = null;
        $this->trace = null;
        $this->previous = null;
        $this->xdebug_message = null;
        $this->type = null;
        $this->post = null;
        $this->severity = null;
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
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EsLogsTableMap::DEFAULT_STRING_FORMAT);
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
