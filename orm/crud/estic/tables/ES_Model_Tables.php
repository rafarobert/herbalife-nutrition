<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Model_Tables extends ES_Estic_Model
{
    protected $_timestaps = true;
    protected $_order_by = "id_table desc";
    public $_primary_key = "id_table";
    public $_table_name = "es_tables";
    public $_es_class = "ES_Model_Tables";

    
    /**
     * Value for enabled static option.
     *
     * @var        string
     */
    public static $optEnabled = 'enabled';
    
    /**
     * Value for disabled static option.
     *
     * @var        string
     */
    public static $optDisabled = 'disabled';
    
    //
    /**
     * Value for id_table static option.
     *
     * @var        string
     */
    public static $fieldIdTable = 'id_table';
    
    /**
     * Value for id_module static option.
     *
     * @var        int
     */
    public static $fieldIdModule = 'id_module';
    
    /**
     * Value for id_role static option.
     *
     * @var        int
     */
    public static $fieldIdRole = 'id_role';
    
    /**
     * Value for title static option.
     *
     * @var        int
     */
    public static $fieldTitle = 'title';
    
    /**
     * Value for table_name static option.
     *
     * @var        string
     */
    public static $fieldTableName = 'table_name';
    
    /**
     * Value for listed static option.
     *
     * @var        string
     */
    public static $fieldListed = 'listed';
    
    /**
     * Value for description static option.
     *
     * @var        string
     */
    public static $fieldDescription = 'description';
    
    /**
     * Value for icon static option.
     *
     * @var        string
     */
    public static $fieldIcon = 'icon';
    
    /**
     * Value for url static option.
     *
     * @var        string
     */
    public static $fieldUrl = 'url';
    
    /**
     * Value for url_edit static option.
     *
     * @var        string
     */
    public static $fieldUrlEdit = 'url_edit';
    
    /**
     * Value for url_index static option.
     *
     * @var        string
     */
    public static $fieldUrlIndex = 'url_index';
    
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
     * Value for id_table field.
     *
     * @var        int
     */
    public $id_table = 0;
    
    /**
     * Value for id_module field.
     *
     * @var        int
     */
    public $id_module = null;
    
    /**
     * Value for id_role field.
     *
     * @var        int
     */
    public $id_role = null;
    
    /**
     * Value for title field.
     *
     * @var        string
     */
    public $title = '';
    
    /**
     * Value for table_name field.
     *
     * @var        string
     */
    public $table_name = '';
    
    /**
     * Value for listed field.
     *
     * @var        string
     */
    public $listed = '';
    
    /**
     * Value for description field.
     *
     * @var        string
     */
    public $description = '';
    
    /**
     * Value for icon field.
     *
     * @var        string
     */
    public $icon = '';
    
    /**
     * Value for url field.
     *
     * @var        string
     */
    public $url = '';
    
    /**
     * Value for url_edit field.
     *
     * @var        string
     */
    public $url_edit = '';
    
    /**
     * Value for url_index field.
     *
     * @var        string
     */
    public $url_index = '';
    
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
    public $id_user_modified = null;
    
    /**
     * Value for id_user_created field.
     *
     * @var        int
     */
    public $id_user_created = null;
    
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
    

    
    /**
     * Value for id_module field related with name.
     *
     * @var        int
     */
    public $id_module_name = null;
    
    /**
     * Value for id_user_modified field related with name.
     *
     * @var        int
     */
    public $id_user_modified_name = null;
    
    /**
     * Value for id_user_modified field related with lastname.
     *
     * @var        int
     */
    public $id_user_modified_lastname = null;
    
    /**
     * Value for id_user_created field related with name.
     *
     * @var        int
     */
    public $id_user_created_name = null;
    
    /**
     * Value for id_user_created field related with lastname.
     *
     * @var        int
     */
    public $id_user_created_lastname = null;
    

    public $rules = array (
  'id_module' => 
  array (
    'field' => 'idModule',
    'label' => 'Modulo',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_role' => 
  array (
    'field' => 'idRole',
    'label' => 'Roles Admitidos',
    'rules' => 'trim|max_length[10]|required',
  ),
  'title' => 
  array (
    'field' => 'title',
    'label' => 'Title',
    'rules' => 'trim|max_length[100]|required',
  ),
  'table_name' => 
  array (
    'field' => 'tableName',
    'label' => 'Tablas',
    'rules' => 'trim|max_length[255]|required',
  ),
  'listed' => 
  array (
    'field' => 'listed',
    'label' => 'Listed',
    'rules' => 'trim|max_length[15]|required',
  ),
  'description' => 
  array (
    'field' => 'description',
    'label' => 'Description',
    'rules' => 'trim',
  ),
  'icon' => 
  array (
    'field' => 'icon',
    'label' => 'Icon',
    'rules' => 'trim|max_length[200]',
  ),
  'url' => 
  array (
    'field' => 'url',
    'label' => 'Url',
    'rules' => 'trim|max_length[400]|required',
  ),
  'url_edit' => 
  array (
    'field' => 'urlEdit',
    'label' => 'Url Edit',
    'rules' => 'trim|max_length[450]|required',
  ),
  'url_index' => 
  array (
    'field' => 'urlIndex',
    'label' => 'Url Index',
    'rules' => 'trim|max_length[450]|required',
  ),
);
    public $rules_edit = array (
  'id_module' => 
  array (
    'field' => 'idModule',
    'label' => 'Modulo',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_role' => 
  array (
    'field' => 'idRole',
    'label' => 'Roles Admitidos',
    'rules' => 'trim|max_length[10]|required',
  ),
  'title' => 
  array (
    'field' => 'title',
    'label' => 'Title',
    'rules' => 'trim|max_length[100]|required',
  ),
  'table_name' => 
  array (
    'field' => 'tableName',
    'label' => 'Tablas',
    'rules' => 'trim|max_length[255]|required',
  ),
  'listed' => 
  array (
    'field' => 'listed',
    'label' => 'Listed',
    'rules' => 'trim|max_length[15]|required',
  ),
  'description' => 
  array (
    'field' => 'description',
    'label' => 'Description',
    'rules' => 'trim',
  ),
  'icon' => 
  array (
    'field' => 'icon',
    'label' => 'Icon',
    'rules' => 'trim|max_length[200]',
  ),
  'url' => 
  array (
    'field' => 'url',
    'label' => 'Url',
    'rules' => 'trim|max_length[400]|required',
  ),
  'url_edit' => 
  array (
    'field' => 'urlEdit',
    'label' => 'Url Edit',
    'rules' => 'trim|max_length[450]|required',
  ),
  'url_index' => 
  array (
    'field' => 'urlIndex',
    'label' => 'Url Index',
    'rules' => 'trim|max_length[450]|required',
  ),
);
    

    function __construct()
    {
        parent::__construct();
    }

    public function getNew()
    {
        $this->table = new Model_Tables();
        return $this->table;
    }

    public function getRules(){
        return $this->rules;
    }

    public function getRulesEdit(){
        return $this->rules_edit;
    }

    
    public function getIdTable()
    {
        return $this->id_table;
    }
    
    public function getIdModule()
    {
        return $this->id_module;
    }
    
    public function getIdRole()
    {
        return $this->id_role;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function getTableName()
    {
        return $this->table_name;
    }
    
    public function getListed()
    {
        return $this->listed;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function getIcon()
    {
        return $this->icon;
    }
    
    public function getUrl()
    {
        return $this->url;
    }
    
    public function getUrlEdit()
    {
        return $this->url_edit;
    }
    
    public function getUrlIndex()
    {
        return $this->url_index;
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
    

    
    public function getIdModuleName()
    {
        return $this->id_module_name;
    }
    
    public function getIdUserModifiedName()
    {
        return $this->id_user_modified_name;
    }
    
    public function getIdUserModifiedLastname()
    {
        return $this->id_user_modified_lastname;
    }
    
    public function getIdUserCreatedName()
    {
        return $this->id_user_created_name;
    }
    
    public function getIdUserCreatedLastname()
    {
        return $this->id_user_created_lastname;
    }
    

    
    public function setIdTable($idTable = ''){
        if(objectHas($this,'id_table', false)){
            return $this->id_table = $idTable;
        }
    }
    
    public function setIdModule($idModule = ''){
        if(objectHas($this,'id_module', false)){
            return $this->id_module = $idModule;
        }
    }
    
    public function setIdRole($idRole = ''){
        if(objectHas($this,'id_role', false)){
            return $this->id_role = $idRole;
        }
    }
    
    public function setTitle($title = ''){
        if(objectHas($this,'title', false)){
            return $this->title = $title;
        }
    }
    
    public function setTableName($tableName = ''){
        if(objectHas($this,'table_name', false)){
            return $this->table_name = $tableName;
        }
    }
    
    public function setListed($listed = ''){
        if(objectHas($this,'listed', false)){
            return $this->listed = $listed;
        }
    }
    
    public function setDescription($description = ''){
        if(objectHas($this,'description', false)){
            return $this->description = $description;
        }
    }
    
    public function setIcon($icon = ''){
        if(objectHas($this,'icon', false)){
            return $this->icon = $icon;
        }
    }
    
    public function setUrl($url = ''){
        if(objectHas($this,'url', false)){
            return $this->url = $url;
        }
    }
    
    public function setUrlEdit($urlEdit = ''){
        if(objectHas($this,'url_edit', false)){
            return $this->url_edit = $urlEdit;
        }
    }
    
    public function setUrlIndex($urlIndex = ''){
        if(objectHas($this,'url_index', false)){
            return $this->url_index = $urlIndex;
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
    

    
    public function findOneByIdTable($idTable,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_table' => $idTable],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIdModule($idModule,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_module' => $idModule],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIdRole($idRole,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_role' => $idRole],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByTitle($title,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['title' => $title],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByTableName($tableName,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['table_name' => $tableName],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByListed($listed,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['listed' => $listed],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByDescription($description,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['description' => $description],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIcon($icon,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['icon' => $icon],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByUrl($url,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['url' => $url],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByUrlEdit($urlEdit,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['url_edit' => $urlEdit],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByUrlIndex($urlIndex,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['url_index' => $urlIndex],false,true,$orderBy,$direction);
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
    

    
    public function filterByIdTable($idTable, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['id_table'] = $idTable;

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
    
    public function filterByIdModule($idModule, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['id_module'] = $idModule;

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
    
    public function filterByIdRole($idRole, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['id_role'] = $idRole;

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
    
    public function filterByTitle($title, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['title'] = $title;

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
    
    public function filterByTableName($tableName, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['table_name'] = $tableName;

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
    
    public function filterByListed($listed, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['listed'] = $listed;

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
    
    public function filterByDescription($description, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['description'] = $description;

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
    
    public function filterByIcon($icon, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['icon'] = $icon;

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
    
    public function filterByUrl($url, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['url'] = $url;

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
    
    public function filterByUrlEdit($urlEdit, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['url_edit'] = $urlEdit;

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
    
    public function filterByUrlIndex($urlIndex, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['url_index'] = $urlIndex;

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
    

    public function getNewTable()
    {
        $post = $this->input->post();

        $this->table = $this->setFromData($post);

        return $this->table;
    }

    public function find($bCreateCtrl = false){
        if($bCreateCtrl){
            Ctrl_Tables::create($bCreateCtrl);
        }
        // Obtiene a todos los tables
        $oTables = $this->get();

        

        $oModelTables = array();

        foreach ($oTables as $table){

            $oModelTables[] = $this->setForeigns($table);
        }
        return $oModelTables;
    }

    public function setFromData($oData, $oTable = null){

        if(isArray($oData)){
            $oData = array2std($oData);
        }
        if(isObject($oData)){

            $oData = verifyArraysInResult($oData);

            if(isObject($oTable)){

                $oModelTables = $oTable;

            } else {

                $oModelTables = new Model_Tables();
            }
            $aFields = $this->getArrayData(true);
            $aData = std2array($oData);
            foreach ($aFields as $key => $value){

                if(objectHas($oData,$key,false)){

                    $oModelTables->$key = isNumeric($oData->$key) ? valNumeric($oData->$key) : $oData->$key;

                } else if(objectHas($oData,setObject($key),false)){

                    $oModelTables->$key = isNumeric($oData->{setObject($key)}) ? valNumeric($oData->{setObject($key)}) : ($oData->{setObject($key)} == "" ? $value : $oData->{setObject($key)});

                } else if(objectHas($oData,ucfirst(setObject($key)),false)){

                    $oModelTables->$key = isNumeric($oData->{ucfirst(setObject($key))}) ? valNumeric($oData->{ucfirst(setObject($key))}) : ($oData->{ucfirst(setObject($key))} == "" ? $value : $oData->{ucfirst(setObject($key))});
                }
                if(in_array($key,$this->uriStrings) && isset($oData->$key) && validateVar($oData->$key)){

                    $oModelTables->uriString = clean($oData->$key);

                } else if(in_array($key,$this->uriStrings) && isset($oData->{setObject($key)}) && validateVar($oData->{setObject($key)})){

                    $oModelTables->uriString = clean($oData->{setObject($key)});

                } else if(in_array($key,$this->uriStrings) && isset($oData->{ucfirst(setObject($key))}) && validateVar($oData->{ucfirst(setObject($key))})){

                    $oModelTables->uriString = clean($oData->{ucfirst(setObject($key))});
                }
                if(isset($aData[$key])) {
                    unset($aData[$key]);
                }
            }
            foreach ($aData as $dataKey => $dataValue){
                $oModelTables->$dataKey = $dataValue;
            }
            return $oModelTables;

        } else {

            return new Model_Tables();
        }
    }

    public function getArrayData($bWithForeign = false){
        $data = array(
            
            'id_table' => $this->id_table,
            
            'id_module' => $this->id_module,
            
            'id_role' => $this->id_role,
            
            'title' => $this->title,
            
            'table_name' => $this->table_name,
            
            'listed' => $this->listed,
            
            'description' => $this->description,
            
            'icon' => $this->icon,
            
            'url' => $this->url,
            
            'url_edit' => $this->url_edit,
            
            'url_index' => $this->url_index,
            
            'status' => $this->status,
            
            'change_count' => $this->change_count,
            
            'id_user_modified' => $this->id_user_modified,
            
            'id_user_created' => $this->id_user_created,
            
            'date_modified' => $this->date_modified,
            
            'date_created' => $this->date_created,
            
        );
        if($bWithForeign){
            
            $data['id_module_name'] = $this->id_module_name;
            
            $data['id_user_modified_name'] = $this->id_user_modified_name;
            
            $data['id_user_modified_lastname'] = $this->id_user_modified_lastname;
            
            $data['id_user_created_name'] = $this->id_user_created_name;
            
            $data['id_user_created_lastname'] = $this->id_user_created_lastname;
            
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
            
            'IdTable' => $this->id_table,
            
            'IdModule' => $this->id_module,
            
            'IdRole' => $this->id_role,
            
            'Title' => $this->title,
            
            'TableName' => $this->table_name,
            
            'Listed' => $this->listed,
            
            'Description' => $this->description,
            
            'Icon' => $this->icon,
            
            'Url' => $this->url,
            
            'UrlEdit' => $this->url_edit,
            
            'UrlIndex' => $this->url_index,
            
            'Status' => $this->status,
            
            'ChangeCount' => $this->change_count,
            
            'IdUserModified' => $this->id_user_modified,
            
            'IdUserCreated' => $this->id_user_created,
            
            'DateModified' => $this->date_modified,
            
            'DateCreated' => $this->date_created,
            
        );
        if($bWithForeign){
            
            $data['IdModuleName'] = $this->id_module_name;
            
            $data['IdUserModifiedName'] = $this->id_user_modified_name;
            
            $data['IdUserModifiedLastname'] = $this->id_user_modified_lastname;
            
            $data['IdUserCreatedName'] = $this->id_user_created_name;
            
            $data['IdUserCreatedLastname'] = $this->id_user_created_lastname;
            
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
