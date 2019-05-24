<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Model_Logs extends ES_Estic_Model
{
    protected $_timestaps = true;
    protected $_order_by = "id_log desc";
    public $_primary_key = "id_log";
    public $_table_name = "es_logs";
    public $_es_class = "ES_Model_Logs";

    
    //
    /**
     * Value for id_log static option.
     *
     * @var        string
     */
    public static $fieldIdLog = 'id_log';
    
    /**
     * Value for heading static option.
     *
     * @var        int
     */
    public static $fieldHeading = 'heading';
    
    /**
     * Value for message static option.
     *
     * @var        string
     */
    public static $fieldMessage = 'message';
    
    /**
     * Value for action static option.
     *
     * @var        string
     */
    public static $fieldAction = 'action';
    
    /**
     * Value for code static option.
     *
     * @var        string
     */
    public static $fieldCode = 'code';
    
    /**
     * Value for level static option.
     *
     * @var        string
     */
    public static $fieldLevel = 'level';
    
    /**
     * Value for file static option.
     *
     * @var        int
     */
    public static $fieldFile = 'file';
    
    /**
     * Value for line static option.
     *
     * @var        string
     */
    public static $fieldLine = 'line';
    
    /**
     * Value for trace static option.
     *
     * @var        int
     */
    public static $fieldTrace = 'trace';
    
    /**
     * Value for previous static option.
     *
     * @var        string
     */
    public static $fieldPrevious = 'previous';
    
    /**
     * Value for xdebug_message static option.
     *
     * @var        string
     */
    public static $fieldXdebugMessage = 'xdebug_message';
    
    /**
     * Value for type static option.
     *
     * @var        string
     */
    public static $fieldType = 'type';
    
    /**
     * Value for post static option.
     *
     * @var        int
     */
    public static $fieldPost = 'post';
    
    /**
     * Value for severity static option.
     *
     * @var        string
     */
    public static $fieldSeverity = 'severity';
    
    /**
     * Value for status static option.
     *
     * @var        string
     */
    public static $fieldStatus = 'status';
    
    /**
     * Value for change_count static option.
     *
     * @var        string
     */
    public static $fieldChangeCount = 'change_count';
    
    /**
     * Value for id_user_modified static option.
     *
     * @var        int
     */
    public static $fieldIdUserModified = 'id_user_modified';
    
    /**
     * Value for id_user_created static option.
     *
     * @var        int
     */
    public static $fieldIdUserCreated = 'id_user_created';
    
    /**
     * Value for date_modified static option.
     *
     * @var        int
     */
    public static $fieldDateModified = 'date_modified';
    
    /**
     * Value for date_created static option.
     *
     * @var        string
     */
    public static $fieldDateCreated = 'date_created';
    
    
    /**
     * Value for id_log field.
     *
     * @var        int
     */
    public $id_log = null;
    
    /**
     * Value for heading field.
     *
     * @var        string
     */
    public $heading = '';
    
    /**
     * Value for message field.
     *
     * @var        string
     */
    public $message = '';
    
    /**
     * Value for action field.
     *
     * @var        string
     */
    public $action = '';
    
    /**
     * Value for code field.
     *
     * @var        string
     */
    public $code = '';
    
    /**
     * Value for level field.
     *
     * @var        int
     */
    public $level = 0;
    
    /**
     * Value for file field.
     *
     * @var        string
     */
    public $file = '';
    
    /**
     * Value for line field.
     *
     * @var        int
     */
    public $line = 0;
    
    /**
     * Value for trace field.
     *
     * @var        string
     */
    public $trace = '';
    
    /**
     * Value for previous field.
     *
     * @var        string
     */
    public $previous = '';
    
    /**
     * Value for xdebug_message field.
     *
     * @var        string
     */
    public $xdebug_message = '';
    
    /**
     * Value for type field.
     *
     * @var        int
     */
    public $type = 0;
    
    /**
     * Value for post field.
     *
     * @var        string
     */
    public $post = '';
    
    /**
     * Value for severity field.
     *
     * @var        string
     */
    public $severity = '';
    
    /**
     * Value for status field.
     *
     * @var        string
     */
    public $status = '';
    
    /**
     * Value for change_count field.
     *
     * @var        int
     */
    public $change_count = 0;
    
    /**
     * Value for id_user_modified field.
     *
     * @var        int
     */
    public $id_user_modified = 0;
    
    /**
     * Value for id_user_created field.
     *
     * @var        int
     */
    public $id_user_created = 0;
    
    /**
     * Value for date_modified field.
     *
     * @var        string
     */
    public $date_modified = '';
    
    /**
     * Value for date_created field.
     *
     * @var        string
     */
    public $date_created = '';
    

    

    public $rules = array (
  'heading' => 
  array (
    'field' => 'heading',
    'label' => 'Heading',
    'rules' => 'trim|max_length[499]|required',
  ),
  'message' => 
  array (
    'field' => 'message',
    'label' => 'Message',
    'rules' => 'trim|required',
  ),
  'action' => 
  array (
    'field' => 'action',
    'label' => 'Action',
    'rules' => 'trim|max_length[499]|required',
  ),
  'code' => 
  array (
    'field' => 'code',
    'label' => 'Code',
    'rules' => 'trim|max_length[200]|required',
  ),
  'level' => 
  array (
    'field' => 'level',
    'label' => 'Level',
    'rules' => 'trim|max_length[11]|required',
  ),
  'file' => 
  array (
    'field' => 'file',
    'label' => 'File',
    'rules' => 'trim|max_length[1000]|required',
  ),
  'line' => 
  array (
    'field' => 'line',
    'label' => 'Line',
    'rules' => 'trim|max_length[11]|required',
  ),
  'trace' => 
  array (
    'field' => 'trace',
    'label' => 'Trace',
    'rules' => 'trim|required',
  ),
  'previous' => 
  array (
    'field' => 'previous',
    'label' => 'Previous',
    'rules' => 'trim|max_length[499]|required',
  ),
  'xdebug_message' => 
  array (
    'field' => 'xdebugMessage',
    'label' => 'Xdebug Message',
    'rules' => 'trim|required',
  ),
  'type' => 
  array (
    'field' => 'type',
    'label' => 'Type',
    'rules' => 'trim|max_length[11]|required',
  ),
  'post' => 
  array (
    'field' => 'post',
    'label' => 'Post',
    'rules' => 'trim|max_length[1000]|required',
  ),
  'severity' => 
  array (
    'field' => 'severity',
    'label' => 'Severity',
    'rules' => 'trim|max_length[400]|required',
  ),
);
    public $rules_edit = array (
  'heading' => 
  array (
    'field' => 'heading',
    'label' => 'Heading',
    'rules' => 'trim|max_length[499]|required',
  ),
  'message' => 
  array (
    'field' => 'message',
    'label' => 'Message',
    'rules' => 'trim|required',
  ),
  'action' => 
  array (
    'field' => 'action',
    'label' => 'Action',
    'rules' => 'trim|max_length[499]|required',
  ),
  'code' => 
  array (
    'field' => 'code',
    'label' => 'Code',
    'rules' => 'trim|max_length[200]|required',
  ),
  'level' => 
  array (
    'field' => 'level',
    'label' => 'Level',
    'rules' => 'trim|max_length[11]|required',
  ),
  'file' => 
  array (
    'field' => 'file',
    'label' => 'File',
    'rules' => 'trim|max_length[1000]|required',
  ),
  'line' => 
  array (
    'field' => 'line',
    'label' => 'Line',
    'rules' => 'trim|max_length[11]|required',
  ),
  'trace' => 
  array (
    'field' => 'trace',
    'label' => 'Trace',
    'rules' => 'trim|required',
  ),
  'previous' => 
  array (
    'field' => 'previous',
    'label' => 'Previous',
    'rules' => 'trim|max_length[499]|required',
  ),
  'xdebug_message' => 
  array (
    'field' => 'xdebugMessage',
    'label' => 'Xdebug Message',
    'rules' => 'trim|required',
  ),
  'type' => 
  array (
    'field' => 'type',
    'label' => 'Type',
    'rules' => 'trim|max_length[11]|required',
  ),
  'post' => 
  array (
    'field' => 'post',
    'label' => 'Post',
    'rules' => 'trim|max_length[1000]|required',
  ),
  'severity' => 
  array (
    'field' => 'severity',
    'label' => 'Severity',
    'rules' => 'trim|max_length[400]|required',
  ),
);
    

    function __construct()
    {
        parent::__construct();
    }

    public function getNew()
    {
        $this->log = new Model_Logs();
        return $this->log;
    }

    public function getRules(){
        return $this->rules;
    }

    public function getRulesEdit(){
        return $this->rules_edit;
    }

    
    public function getIdLog()
    {
        return $this->id_log;
    }
    
    public function getHeading()
    {
        return $this->heading;
    }
    
    public function getMessage()
    {
        return $this->message;
    }
    
    public function getAction()
    {
        return $this->action;
    }
    
    public function getCode()
    {
        return $this->code;
    }
    
    public function getLevel()
    {
        return $this->level;
    }
    
    public function getFile()
    {
        return $this->file;
    }
    
    public function getLine()
    {
        return $this->line;
    }
    
    public function getTrace()
    {
        return $this->trace;
    }
    
    public function getPrevious()
    {
        return $this->previous;
    }
    
    public function getXdebugMessage()
    {
        return $this->xdebug_message;
    }
    
    public function getType()
    {
        return $this->type;
    }
    
    public function getPost()
    {
        return $this->post;
    }
    
    public function getSeverity()
    {
        return $this->severity;
    }
    
    public function getStatus()
    {
        return $this->status;
    }
    
    public function getChangeCount()
    {
        return $this->change_count;
    }
    
    public function getIdUserModified()
    {
        return $this->id_user_modified;
    }
    
    public function getIdUserCreated()
    {
        return $this->id_user_created;
    }
    
    public function getDateModified()
    {
        return $this->date_modified;
    }
    
    public function getDateCreated()
    {
        return $this->date_created;
    }
    

    

    
    public function setIdLog($idLog = ''){
        if(objectHas($this,'id_log', false)){
            return $this->id_log = $idLog;
        }
    }
    
    public function setHeading($heading = ''){
        if(objectHas($this,'heading', false)){
            return $this->heading = $heading;
        }
    }
    
    public function setMessage($message = ''){
        if(objectHas($this,'message', false)){
            return $this->message = $message;
        }
    }
    
    public function setAction($action = ''){
        if(objectHas($this,'action', false)){
            return $this->action = $action;
        }
    }
    
    public function setCode($code = ''){
        if(objectHas($this,'code', false)){
            return $this->code = $code;
        }
    }
    
    public function setLevel($level = ''){
        if(objectHas($this,'level', false)){
            return $this->level = $level;
        }
    }
    
    public function setFile($file = ''){
        if(objectHas($this,'file', false)){
            return $this->file = $file;
        }
    }
    
    public function setLine($line = ''){
        if(objectHas($this,'line', false)){
            return $this->line = $line;
        }
    }
    
    public function setTrace($trace = ''){
        if(objectHas($this,'trace', false)){
            return $this->trace = $trace;
        }
    }
    
    public function setPrevious($previous = ''){
        if(objectHas($this,'previous', false)){
            return $this->previous = $previous;
        }
    }
    
    public function setXdebugMessage($xdebugMessage = ''){
        if(objectHas($this,'xdebug_message', false)){
            return $this->xdebug_message = $xdebugMessage;
        }
    }
    
    public function setType($type = ''){
        if(objectHas($this,'type', false)){
            return $this->type = $type;
        }
    }
    
    public function setPost($post = ''){
        if(objectHas($this,'post', false)){
            return $this->post = $post;
        }
    }
    
    public function setSeverity($severity = ''){
        if(objectHas($this,'severity', false)){
            return $this->severity = $severity;
        }
    }
    
    public function setStatus($status = ''){
        if(objectHas($this,'status', false)){
            return $this->status = $status;
        }
    }
    
    public function setChangeCount($changeCount = ''){
        if(objectHas($this,'change_count', false)){
            return $this->change_count = $changeCount;
        }
    }
    
    public function setIdUserModified($idUserModified = ''){
        if(objectHas($this,'id_user_modified', false)){
            return $this->id_user_modified = $idUserModified;
        }
    }
    
    public function setIdUserCreated($idUserCreated = ''){
        if(objectHas($this,'id_user_created', false)){
            return $this->id_user_created = $idUserCreated;
        }
    }
    
    public function setDateModified($dateModified = ''){
        if(objectHas($this,'date_modified', false)){
            return $this->date_modified = $dateModified;
        }
    }
    
    public function setDateCreated($dateCreated = ''){
        if(objectHas($this,'date_created', false)){
            return $this->date_created = $dateCreated;
        }
    }
    

    
    public function findOneByIdLog($idLog,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_log' => $idLog],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByHeading($heading,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['heading' => $heading],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByMessage($message,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['message' => $message],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByAction($action,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['action' => $action],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByCode($code,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['code' => $code],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByLevel($level,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['level' => $level],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByFile($file,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['file' => $file],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByLine($line,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['line' => $line],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByTrace($trace,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['trace' => $trace],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByPrevious($previous,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['previous' => $previous],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByXdebugMessage($xdebugMessage,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['xdebug_message' => $xdebugMessage],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByType($type,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['type' => $type],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByPost($post,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['post' => $post],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneBySeverity($severity,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['severity' => $severity],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByStatus($status,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['status' => $status],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByChangeCount($changeCount,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['change_count' => $changeCount],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIdUserModified($idUserModified,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_user_modified' => $idUserModified],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIdUserCreated($idUserCreated,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_user_created' => $idUserCreated],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByDateModified($dateModified,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['date_modified' => $dateModified],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByDateCreated($dateCreated,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['date_created' => $dateCreated],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    

    
    public function filterByIdLog($idLog, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['id_log'] = $idLog;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByHeading($heading, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['heading'] = $heading;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByMessage($message, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['message'] = $message;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByAction($action, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['action'] = $action;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByCode($code, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['code'] = $code;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByLevel($level, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['level'] = $level;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByFile($file, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['file'] = $file;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByLine($line, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['line'] = $line;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByTrace($trace, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['trace'] = $trace;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByPrevious($previous, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['previous'] = $previous;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByXdebugMessage($xdebugMessage, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['xdebug_message'] = $xdebugMessage;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByType($type, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['type'] = $type;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByPost($post, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['post'] = $post;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterBySeverity($severity, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['severity'] = $severity;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByStatus($status, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['status'] = $status;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByChangeCount($changeCount, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['change_count'] = $changeCount;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByIdUserModified($idUserModified, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['id_user_modified'] = $idUserModified;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByIdUserCreated($idUserCreated, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['id_user_created'] = $idUserCreated;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByDateModified($dateModified, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['date_modified'] = $dateModified;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByDateCreated($dateCreated, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['date_created'] = $dateCreated;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    

    public function getNewLog()
    {
        $post = $this->input->post();

        $this->log = $this->setFromData($post);

        return $this->log;
    }

    public function find($bCreateCtrl = false){
        if($bCreateCtrl){
            Ctrl_Tables::create($bCreateCtrl);
        }
        // Obtiene a todos los logs
        $oLogs = $this->get();

        

        $oModelLogs = array();

        foreach ($oLogs as $log){

            $oModelLogs[] = $this->setForeigns($log);
        }
        return $oModelLogs;
    }

    public function setFromData($oData, $oLog = null){

        if(isArray($oData)){
            $oData = array2std($oData);
        }
        if(isObject($oData)){

            $oData = verifyArraysInResult($oData);

            if(isObject($oLog)){

                $oModelLogs = $oLog;

            } else {

                $oModelLogs = new Model_Logs();
            }
            $aFields = $this->getArrayData(true);
            $aData = std2array($oData);
            foreach ($aFields as $key => $value){

                if(objectHas($oData,$key,false)){

                    $oModelLogs->$key = isNumeric($oData->$key) ? valNumeric($oData->$key) : $oData->$key;

                } else if(objectHas($oData,setObject($key),false)){

                    $oModelLogs->$key = isNumeric($oData->{setObject($key)}) ? valNumeric($oData->{setObject($key)}) : ($oData->{setObject($key)} == "" ? $value : $oData->{setObject($key)});

                } else if(objectHas($oData,ucfirst(setObject($key)),false)){

                    $oModelLogs->$key = isNumeric($oData->{ucfirst(setObject($key))}) ? valNumeric($oData->{ucfirst(setObject($key))}) : ($oData->{ucfirst(setObject($key))} == "" ? $value : $oData->{ucfirst(setObject($key))});
                }
                if(in_array($key,$this->uriStrings) && isset($oData->$key) && validateVar($oData->$key)){

                    $oModelLogs->uriString = clean($oData->$key);

                } else if(in_array($key,$this->uriStrings) && isset($oData->{setObject($key)}) && validateVar($oData->{setObject($key)})){

                    $oModelLogs->uriString = clean($oData->{setObject($key)});

                } else if(in_array($key,$this->uriStrings) && isset($oData->{ucfirst(setObject($key))}) && validateVar($oData->{ucfirst(setObject($key))})){

                    $oModelLogs->uriString = clean($oData->{ucfirst(setObject($key))});
                }
                if(isset($aData[$key])) {
                    unset($aData[$key]);
                }
            }
            foreach ($aData as $dataKey => $dataValue){
                $oModelLogs->$dataKey = $dataValue;
            }
            return $oModelLogs;

        } else {

            return new Model_Logs();
        }
    }

    public function getArrayData($bWithForeign = false){
        $data = array(
            
            'id_log' => $this->id_log,
            
            'heading' => $this->heading,
            
            'message' => $this->message,
            
            'action' => $this->action,
            
            'code' => $this->code,
            
            'level' => $this->level,
            
            'file' => $this->file,
            
            'line' => $this->line,
            
            'trace' => $this->trace,
            
            'previous' => $this->previous,
            
            'xdebug_message' => $this->xdebug_message,
            
            'type' => $this->type,
            
            'post' => $this->post,
            
            'severity' => $this->severity,
            
            'status' => $this->status,
            
            'change_count' => $this->change_count,
            
            'id_user_modified' => $this->id_user_modified,
            
            'id_user_created' => $this->id_user_created,
            
            'date_modified' => $this->date_modified,
            
            'date_created' => $this->date_created,
            
        );
        if($bWithForeign){
            
        }
        if(isset($this->thumbs) && validateVar($this->thumbs, 'array')){
            $data['thumbs'] = $this->thumbs;
        }
        if(isset($this->uriString) && validateVar($this->uriString)){
            $data['uriString'] = $this->uriString;
        }
        $funct = function($val){
            return isNumeric($val,false) ? valNumeric($val) : $val;
        };
        $data = array_map($funct,$data);
        return $data;
    }

    public function toArray($bWithForeign = false){
        $data = array(
            
            'IdLog' => $this->id_log,
            
            'Heading' => $this->heading,
            
            'Message' => $this->message,
            
            'Action' => $this->action,
            
            'Code' => $this->code,
            
            'Level' => $this->level,
            
            'File' => $this->file,
            
            'Line' => $this->line,
            
            'Trace' => $this->trace,
            
            'Previous' => $this->previous,
            
            'XdebugMessage' => $this->xdebug_message,
            
            'Type' => $this->type,
            
            'Post' => $this->post,
            
            'Severity' => $this->severity,
            
            'Status' => $this->status,
            
            'ChangeCount' => $this->change_count,
            
            'IdUserModified' => $this->id_user_modified,
            
            'IdUserCreated' => $this->id_user_created,
            
            'DateModified' => $this->date_modified,
            
            'DateCreated' => $this->date_created,
            
        );
        if($bWithForeign){
            
        }
        if(isset($this->thumbs) && validateVar($this->thumbs, 'array')){
            $data['thumbs'] = $this->thumbs;
        }
        if(isset($this->uriString) && validateVar($this->uriString)){
            $data['uriString'] = $this->uriString;
        }
        $funct = function($val){
            return isNumeric($val,false) ? valNumeric($val) : ($val == null ? '' : $val);
        };
        $data = array_map($funct,$data);
        if(isset($this->foreigns)){
            foreach ($this->foreigns as $fKey => $fValue){
                $data[$fKey] = $fValue;
            }
        }
        return $data;
    }
}
