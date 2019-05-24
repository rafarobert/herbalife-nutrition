<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Model_Roles extends ES_Estic_Model
{
    protected $_timestaps = true;
    protected $_order_by = "id_role desc";
    public $_primary_key = "id_role";
    public $_table_name = "es_roles";
    public $_es_class = "ES_Model_Roles";

    
    /**
     * Value for on static option.
     *
     * @var        string
     */
    public static $optOn = 'on';
    
    /**
     * Value for off static option.
     *
     * @var        string
     */
    public static $optOff = 'off';
    
    //
    /**
     * Value for id_role static option.
     *
     * @var        string
     */
    public static $fieldIdRole = 'id_role';
    
    /**
     * Value for name static option.
     *
     * @var        int
     */
    public static $fieldName = 'name';
    
    /**
     * Value for description static option.
     *
     * @var        string
     */
    public static $fieldDescription = 'description';
    
    /**
     * Value for write static option.
     *
     * @var        string
     */
    public static $fieldWrite = 'write';
    
    /**
     * Value for read static option.
     *
     * @var        string
     */
    public static $fieldRead = 'read';
    
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
     * Value for id_role field.
     *
     * @var        int
     */
    public $id_role = null;
    
    /**
     * Value for name field.
     *
     * @var        string
     */
    public $name = '';
    
    /**
     * Value for description field.
     *
     * @var        string
     */
    public $description = '';
    
    /**
     * Value for write field.
     *
     * @var        string
     */
    public $write = '';
    
    /**
     * Value for read field.
     *
     * @var        string
     */
    public $read = '';
    
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
  'name' => 
  array (
    'field' => 'name',
    'label' => 'Name',
    'rules' => 'trim|max_length[256]|required',
  ),
  'description' => 
  array (
    'field' => 'description',
    'label' => 'Description',
    'rules' => 'trim|max_length[500]',
  ),
  'write' => 
  array (
    'field' => 'write',
    'label' => 'Write',
    'rules' => 'trim|max_length[10]|required',
  ),
  'read' => 
  array (
    'field' => 'read',
    'label' => 'Read',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    public $rules_edit = array (
  'name' => 
  array (
    'field' => 'name',
    'label' => 'Name',
    'rules' => 'trim|max_length[256]|required',
  ),
  'description' => 
  array (
    'field' => 'description',
    'label' => 'Description',
    'rules' => 'trim|max_length[500]',
  ),
  'write' => 
  array (
    'field' => 'write',
    'label' => 'Write',
    'rules' => 'trim|max_length[10]|required',
  ),
  'read' => 
  array (
    'field' => 'read',
    'label' => 'Read',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    

    function __construct()
    {
        parent::__construct();
    }

    public function getNew()
    {
        $this->role = new Model_Roles();
        return $this->role;
    }

    public function getRules(){
        return $this->rules;
    }

    public function getRulesEdit(){
        return $this->rules_edit;
    }

    
    public function getIdRole()
    {
        return $this->id_role;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function getWrite()
    {
        return $this->write;
    }
    
    public function getRead()
    {
        return $this->read;
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
    

    
    public function setIdRole($idRole = ''){
        if(objectHas($this,'id_role', false)){
            return $this->id_role = $idRole;
        }
    }
    
    public function setName($name = ''){
        if(objectHas($this,'name', false)){
            return $this->name = $name;
        }
    }
    
    public function setDescription($description = ''){
        if(objectHas($this,'description', false)){
            return $this->description = $description;
        }
    }
    
    public function setWrite($write = ''){
        if(objectHas($this,'write', false)){
            return $this->write = $write;
        }
    }
    
    public function setRead($read = ''){
        if(objectHas($this,'read', false)){
            return $this->read = $read;
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
    
    public function findOneByName($name,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['name' => $name],false,true,$orderBy,$direction);
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
    
    public function findOneByWrite($write,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['write' => $write],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByRead($read,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['read' => $read],false,true,$orderBy,$direction);
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
    
    public function filterByName($name, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['name'] = $name;

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
    
    public function filterByWrite($write, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['write'] = $write;

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
    
    public function filterByRead($read, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['read'] = $read;

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
    

    public function getNewRole()
    {
        $post = $this->input->post();

        $this->role = $this->setFromData($post);

        return $this->role;
    }

    public function find($bCreateCtrl = false){
        if($bCreateCtrl){
            Ctrl_Tables::create($bCreateCtrl);
        }
        // Obtiene a todos los roles
        $oRoles = $this->get();

        

        $oModelRoles = array();

        foreach ($oRoles as $role){

            $oModelRoles[] = $this->setForeigns($role);
        }
        return $oModelRoles;
    }

    public function setFromData($oData, $oRole = null){

        if(isArray($oData)){
            $oData = array2std($oData);
        }
        if(isObject($oData)){

            $oData = verifyArraysInResult($oData);

            if(isObject($oRole)){

                $oModelRoles = $oRole;

            } else {

                $oModelRoles = new Model_Roles();
            }
            $aFields = $this->getArrayData(true);
            $aData = std2array($oData);
            foreach ($aFields as $key => $value){

                if(objectHas($oData,$key,false)){

                    $oModelRoles->$key = isNumeric($oData->$key) ? valNumeric($oData->$key) : $oData->$key;

                } else if(objectHas($oData,setObject($key),false)){

                    $oModelRoles->$key = isNumeric($oData->{setObject($key)}) ? valNumeric($oData->{setObject($key)}) : ($oData->{setObject($key)} == "" ? $value : $oData->{setObject($key)});

                } else if(objectHas($oData,ucfirst(setObject($key)),false)){

                    $oModelRoles->$key = isNumeric($oData->{ucfirst(setObject($key))}) ? valNumeric($oData->{ucfirst(setObject($key))}) : ($oData->{ucfirst(setObject($key))} == "" ? $value : $oData->{ucfirst(setObject($key))});
                }
                if(in_array($key,$this->uriStrings) && isset($oData->$key) && validateVar($oData->$key)){

                    $oModelRoles->uriString = clean($oData->$key);

                } else if(in_array($key,$this->uriStrings) && isset($oData->{setObject($key)}) && validateVar($oData->{setObject($key)})){

                    $oModelRoles->uriString = clean($oData->{setObject($key)});

                } else if(in_array($key,$this->uriStrings) && isset($oData->{ucfirst(setObject($key))}) && validateVar($oData->{ucfirst(setObject($key))})){

                    $oModelRoles->uriString = clean($oData->{ucfirst(setObject($key))});
                }
                if(isset($aData[$key])) {
                    unset($aData[$key]);
                }
            }
            foreach ($aData as $dataKey => $dataValue){
                $oModelRoles->$dataKey = $dataValue;
            }
            return $oModelRoles;

        } else {

            return new Model_Roles();
        }
    }

    public function getArrayData($bWithForeign = false){
        $data = array(
            
            'id_role' => $this->id_role,
            
            'name' => $this->name,
            
            'description' => $this->description,
            
            'write' => $this->write,
            
            'read' => $this->read,
            
            'status' => $this->status,
            
            'change_count' => $this->change_count,
            
            'id_user_modified' => $this->id_user_modified,
            
            'id_user_created' => $this->id_user_created,
            
            'date_modified' => $this->date_modified,
            
            'date_created' => $this->date_created,
            
        );
        if($bWithForeign){
            
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
            
            'IdRole' => $this->id_role,
            
            'Name' => $this->name,
            
            'Description' => $this->description,
            
            'Write' => $this->write,
            
            'Read' => $this->read,
            
            'Status' => $this->status,
            
            'ChangeCount' => $this->change_count,
            
            'IdUserModified' => $this->id_user_modified,
            
            'IdUserCreated' => $this->id_user_created,
            
            'DateModified' => $this->date_modified,
            
            'DateCreated' => $this->date_created,
            
        );
        if($bWithForeign){
            
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
