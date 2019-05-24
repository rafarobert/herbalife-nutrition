<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Model_Users extends ES_Estic_Model
{
    protected $_timestaps = true;
    protected $_order_by = "id_user desc";
    public $_primary_key = "id_user";
    public $_table_name = "es_users";
    public $_es_class = "ES_Model_Users";

    
    /**
     * Value for Masculino static option.
     *
     * @var        string
     */
    public static $optMasculino = 'Masculino';
    
    /**
     * Value for Femenino static option.
     *
     * @var        string
     */
    public static $optFemenino = 'Femenino';
    
    //
    /**
     * Value for id_user static option.
     *
     * @var        string
     */
    public static $fieldIdUser = 'id_user';
    
    /**
     * Value for name static option.
     *
     * @var        int
     */
    public static $fieldName = 'name';
    
    /**
     * Value for lastname static option.
     *
     * @var        string
     */
    public static $fieldLastname = 'lastname';
    
    /**
     * Value for username static option.
     *
     * @var        string
     */
    public static $fieldUsername = 'username';
    
    /**
     * Value for email static option.
     *
     * @var        string
     */
    public static $fieldEmail = 'email';
    
    /**
     * Value for address static option.
     *
     * @var        string
     */
    public static $fieldAddress = 'address';
    
    /**
     * Value for password static option.
     *
     * @var        string
     */
    public static $fieldPassword = 'password';
    
    /**
     * Value for birthdate static option.
     *
     * @var        string
     */
    public static $fieldBirthdate = 'birthdate';
    
    /**
     * Value for age static option.
     *
     * @var        string
     */
    public static $fieldAge = 'age';
    
    /**
     * Value for carnet static option.
     *
     * @var        int
     */
    public static $fieldCarnet = 'carnet';
    
    /**
     * Value for sexo static option.
     *
     * @var        string
     */
    public static $fieldSexo = 'sexo';
    
    /**
     * Value for phone_1 static option.
     *
     * @var        string
     */
    public static $fieldPhone1 = 'phone_1';
    
    /**
     * Value for phone_2 static option.
     *
     * @var        string
     */
    public static $fieldPhone2 = 'phone_2';
    
    /**
     * Value for cellphone_1 static option.
     *
     * @var        string
     */
    public static $fieldCellphone1 = 'cellphone_1';
    
    /**
     * Value for cellphone_2 static option.
     *
     * @var        string
     */
    public static $fieldCellphone2 = 'cellphone_2';
    
    /**
     * Value for ids_files static option.
     *
     * @var        string
     */
    public static $fieldIdsFiles = 'ids_files';
    
    /**
     * Value for id_cover_picture static option.
     *
     * @var        string
     */
    public static $fieldIdCoverPicture = 'id_cover_picture';
    
    /**
     * Value for id_city static option.
     *
     * @var        int
     */
    public static $fieldIdCity = 'id_city';
    
    /**
     * Value for id_provincia static option.
     *
     * @var        int
     */
    public static $fieldIdProvincia = 'id_provincia';
    
    /**
     * Value for id_role static option.
     *
     * @var        int
     */
    public static $fieldIdRole = 'id_role';
    
    /**
     * Value for signin_method static option.
     *
     * @var        int
     */
    public static $fieldSigninMethod = 'signin_method';
    
    /**
     * Value for uid static option.
     *
     * @var        string
     */
    public static $fieldUid = 'uid';
    
    /**
     * Value for country_code static option.
     *
     * @var        string
     */
    public static $fieldCountryCode = 'country_code';
    
    /**
     * Value for authy_id static option.
     *
     * @var        string
     */
    public static $fieldAuthyId = 'authy_id';
    
    /**
     * Value for verified static option.
     *
     * @var        string
     */
    public static $fieldVerified = 'verified';
    
    /**
     * Value for change_count static option.
     *
     * @var        int
     */
    public static $fieldChangeCount = 'change_count';
    
    /**
     * Value for status static option.
     *
     * @var        int
     */
    public static $fieldStatus = 'status';
    
    /**
     * Value for date_modified static option.
     *
     * @var        string
     */
    public static $fieldDateModified = 'date_modified';
    
    /**
     * Value for date_created static option.
     *
     * @var        string
     */
    public static $fieldDateCreated = 'date_created';
    
    
    /**
     * Value for id_user field.
     *
     * @var        int
     */
    public $id_user = null;
    
    /**
     * Value for name field.
     *
     * @var        string
     */
    public $name = '';
    
    /**
     * Value for lastname field.
     *
     * @var        string
     */
    public $lastname = '';
    
    /**
     * Value for username field.
     *
     * @var        string
     */
    public $username = '';
    
    /**
     * Value for email field.
     *
     * @var        string
     */
    public $email = '';
    
    /**
     * Value for address field.
     *
     * @var        string
     */
    public $address = '';
    
    /**
     * Value for password field.
     *
     * @var        string
     */
    public $password = '';
    
    /**
     * Value for birthdate field.
     *
     * @var        string
     */
    public $birthdate = '';
    
    /**
     * Value for age field.
     *
     * @var        int
     */
    public $age = 0;
    
    /**
     * Value for carnet field.
     *
     * @var        string
     */
    public $carnet = '';
    
    /**
     * Value for sexo field.
     *
     * @var        string
     */
    public $sexo = '';
    
    /**
     * Value for phone_1 field.
     *
     * @var        string
     */
    public $phone_1 = '';
    
    /**
     * Value for phone_2 field.
     *
     * @var        string
     */
    public $phone_2 = '';
    
    /**
     * Value for cellphone_1 field.
     *
     * @var        string
     */
    public $cellphone_1 = '';
    
    /**
     * Value for cellphone_2 field.
     *
     * @var        string
     */
    public $cellphone_2 = '';
    
    /**
     * Value for ids_files field.
     *
     * @var        string
     */
    public $ids_files = '';
    
    /**
     * Value for id_cover_picture field.
     *
     * @var        int
     */
    public $id_cover_picture = null;
    
    /**
     * Value for id_city field.
     *
     * @var        int
     */
    public $id_city = null;
    
    /**
     * Value for id_provincia field.
     *
     * @var        int
     */
    public $id_provincia = null;
    
    /**
     * Value for id_role field.
     *
     * @var        int
     */
    public $id_role = null;
    
    /**
     * Value for signin_method field.
     *
     * @var        string
     */
    public $signin_method = '';
    
    /**
     * Value for uid field.
     *
     * @var        string
     */
    public $uid = '';
    
    /**
     * Value for country_code field.
     *
     * @var        string
     */
    public $country_code = '';
    
    /**
     * Value for authy_id field.
     *
     * @var        string
     */
    public $authy_id = '';
    
    /**
     * Value for verified field.
     *
     * @var        int
     */
    public $verified = 0;
    
    /**
     * Value for change_count field.
     *
     * @var        int
     */
    public $change_count = 0;
    
    /**
     * Value for status field.
     *
     * @var        string
     */
    public $status = '';
    
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
     * Value for id_role field related with name.
     *
     * @var        int
     */
    public $id_role_name = null;
    

    public $rules = array (
  'name' => 
  array (
    'field' => 'name',
    'label' => 'Name',
    'rules' => 'trim|max_length[256]|required',
  ),
  'lastname' => 
  array (
    'field' => 'lastname',
    'label' => 'Lastname',
    'rules' => 'trim|max_length[256]',
  ),
  'username' => 
  array (
    'field' => 'username',
    'label' => 'Username',
    'rules' => 'trim|max_length[250]',
  ),
  'email' => 
  array (
    'field' => 'email',
    'label' => 'Email',
    'rules' => 'trim|max_length[100]',
  ),
  'address' => 
  array (
    'field' => 'address',
    'label' => 'Domicilio',
    'rules' => 'trim|max_length[500]',
  ),
  'password' => 
  array (
    'password' => 
    array (
      'field' => 'password',
      'label' => 'Password',
      'rules' => 'trim|max_length[128]|matches[password_confirm]',
    ),
    'password_confirm' => 
    array (
      'field' => 'passwordConfirm',
      'label' => 'Password Confirm',
      'rules' => 'trim|matches[password]',
    ),
  ),
  'birthdate' => 
  array (
    'field' => 'birthdate',
    'label' => 'Birthdate',
    'rules' => 'trim',
  ),
  'age' => 
  array (
    'field' => 'age',
    'label' => 'Age',
    'rules' => 'trim|max_length[11]',
  ),
  'carnet' => 
  array (
    'field' => 'carnet',
    'label' => 'Carnet de Identidad',
    'rules' => 'trim|max_length[30]',
  ),
  'sexo' => 
  array (
    'field' => 'sexo',
    'label' => 'Sexo',
    'rules' => 'trim|max_length[15]',
  ),
  'phone_1' => 
  array (
    'field' => 'phone1',
    'label' => 'Telefono 1',
    'rules' => 'trim|max_length[20]',
  ),
  'phone_2' => 
  array (
    'field' => 'phone2',
    'label' => 'Telefono 2',
    'rules' => 'trim|max_length[20]',
  ),
  'cellphone_1' => 
  array (
    'field' => 'cellphone1',
    'label' => 'Celular 1',
    'rules' => 'trim|max_length[20]',
  ),
  'cellphone_2' => 
  array (
    'field' => 'cellphone2',
    'label' => 'Celular 2',
    'rules' => 'trim|max_length[20]',
  ),
  'ids_files' => 
  array (
    'field' => 'idsFiles',
    'label' => 'Foto de perfil',
    'rules' => 'trim|max_length[450]',
  ),
  'id_cover_picture' => 
  array (
    'field' => 'idCoverPicture',
    'label' => 'Id Cover Picture',
    'rules' => 'trim|max_length[10]',
  ),
  'id_city' => 
  array (
    'field' => 'idCity',
    'label' => 'Id City',
    'rules' => 'trim|max_length[10]',
  ),
  'id_provincia' => 
  array (
    'field' => 'idProvincia',
    'label' => 'Id Provincia',
    'rules' => 'trim|max_length[10]',
  ),
  'id_role' => 
  array (
    'field' => 'idRole',
    'label' => 'Role',
    'rules' => 'trim|max_length[10]|required',
  ),
  'signin_method' => 
  array (
    'field' => 'signinMethod',
    'label' => 'Signin Method',
    'rules' => 'trim|max_length[100]',
  ),
  'uid' => 
  array (
    'field' => 'uid',
    'label' => 'Uid',
    'rules' => 'trim|max_length[499]',
  ),
  'country_code' => 
  array (
    'field' => 'countryCode',
    'label' => 'Country Code',
    'rules' => 'trim|max_length[50]|required',
  ),
  'authy_id' => 
  array (
    'field' => 'authyId',
    'label' => 'Authy Id',
    'rules' => 'trim|max_length[50]|required',
  ),
  'verified' => 
  array (
    'field' => 'verified',
    'label' => 'Verified',
    'rules' => 'trim|max_length[1]|required',
  ),
);
    public $rules_edit = array (
  'name' => 
  array (
    'field' => 'name',
    'label' => 'Name',
    'rules' => 'trim|max_length[256]|required',
  ),
  'lastname' => 
  array (
    'field' => 'lastname',
    'label' => 'Lastname',
    'rules' => 'trim|max_length[256]',
  ),
  'username' => 
  array (
    'field' => 'username',
    'label' => 'Username',
    'rules' => 'trim|max_length[250]',
  ),
  'email' => 
  array (
    'field' => 'email',
    'label' => 'Email',
    'rules' => 'trim|max_length[100]',
  ),
  'address' => 
  array (
    'field' => 'address',
    'label' => 'Domicilio',
    'rules' => 'trim|max_length[500]',
  ),
  'birthdate' => 
  array (
    'field' => 'birthdate',
    'label' => 'Birthdate',
    'rules' => 'trim',
  ),
  'age' => 
  array (
    'field' => 'age',
    'label' => 'Age',
    'rules' => 'trim|max_length[11]',
  ),
  'carnet' => 
  array (
    'field' => 'carnet',
    'label' => 'Carnet de Identidad',
    'rules' => 'trim|max_length[30]',
  ),
  'sexo' => 
  array (
    'field' => 'sexo',
    'label' => 'Sexo',
    'rules' => 'trim|max_length[15]',
  ),
  'phone_1' => 
  array (
    'field' => 'phone1',
    'label' => 'Telefono 1',
    'rules' => 'trim|max_length[20]',
  ),
  'phone_2' => 
  array (
    'field' => 'phone2',
    'label' => 'Telefono 2',
    'rules' => 'trim|max_length[20]',
  ),
  'cellphone_1' => 
  array (
    'field' => 'cellphone1',
    'label' => 'Celular 1',
    'rules' => 'trim|max_length[20]',
  ),
  'cellphone_2' => 
  array (
    'field' => 'cellphone2',
    'label' => 'Celular 2',
    'rules' => 'trim|max_length[20]',
  ),
  'ids_files' => 
  array (
    'field' => 'idsFiles',
    'label' => 'Foto de perfil',
    'rules' => 'trim|max_length[450]',
  ),
  'id_cover_picture' => 
  array (
    'field' => 'idCoverPicture',
    'label' => 'Id Cover Picture',
    'rules' => 'trim|max_length[10]',
  ),
  'id_city' => 
  array (
    'field' => 'idCity',
    'label' => 'Id City',
    'rules' => 'trim|max_length[10]',
  ),
  'id_provincia' => 
  array (
    'field' => 'idProvincia',
    'label' => 'Id Provincia',
    'rules' => 'trim|max_length[10]',
  ),
  'id_role' => 
  array (
    'field' => 'idRole',
    'label' => 'Role',
    'rules' => 'trim|max_length[10]|required',
  ),
  'signin_method' => 
  array (
    'field' => 'signinMethod',
    'label' => 'Signin Method',
    'rules' => 'trim|max_length[100]',
  ),
  'uid' => 
  array (
    'field' => 'uid',
    'label' => 'Uid',
    'rules' => 'trim|max_length[499]',
  ),
  'country_code' => 
  array (
    'field' => 'countryCode',
    'label' => 'Country Code',
    'rules' => 'trim|max_length[50]|required',
  ),
  'authy_id' => 
  array (
    'field' => 'authyId',
    'label' => 'Authy Id',
    'rules' => 'trim|max_length[50]|required',
  ),
  'verified' => 
  array (
    'field' => 'verified',
    'label' => 'Verified',
    'rules' => 'trim|max_length[1]|required',
  ),
);
    

    function __construct()
    {
        parent::__construct();
    }

    public function getNew()
    {
        $this->user = new Model_Users();
        return $this->user;
    }

    public function getRules(){
        return $this->rules;
    }

    public function getRulesEdit(){
        return $this->rules_edit;
    }

    
    public function getIdUser()
    {
        return $this->id_user;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getLastname()
    {
        return $this->lastname;
    }
    
    public function getUsername()
    {
        return $this->username;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function getAddress()
    {
        return $this->address;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function getBirthdate()
    {
        return $this->birthdate;
    }
    
    public function getAge()
    {
        return $this->age;
    }
    
    public function getCarnet()
    {
        return $this->carnet;
    }
    
    public function getSexo()
    {
        return $this->sexo;
    }
    
    public function getPhone1()
    {
        return $this->phone_1;
    }
    
    public function getPhone2()
    {
        return $this->phone_2;
    }
    
    public function getCellphone1()
    {
        return $this->cellphone_1;
    }
    
    public function getCellphone2()
    {
        return $this->cellphone_2;
    }
    
    public function getIdsFiles()
    {
        return $this->ids_files;
    }
    
    public function getIdCoverPicture()
    {
        return $this->id_cover_picture;
    }
    
    public function getIdCity()
    {
        return $this->id_city;
    }
    
    public function getIdProvincia()
    {
        return $this->id_provincia;
    }
    
    public function getIdRole()
    {
        return $this->id_role;
    }
    
    public function getSigninMethod()
    {
        return $this->signin_method;
    }
    
    public function getUid()
    {
        return $this->uid;
    }
    
    public function getCountryCode()
    {
        return $this->country_code;
    }
    
    public function getAuthyId()
    {
        return $this->authy_id;
    }
    
    public function getVerified()
    {
        return $this->verified;
    }
    
    public function getChangeCount()
    {
        return $this->change_count;
    }
    
    public function getStatus()
    {
        return $this->status;
    }
    
    public function getDateModified()
    {
        return $this->date_modified;
    }
    
    public function getDateCreated()
    {
        return $this->date_created;
    }
    

    

    
    public function setIdUser($idUser = ''){
        if(objectHas($this,'id_user', false)){
            return $this->id_user = $idUser;
        }
    }
    
    public function setName($name = ''){
        if(objectHas($this,'name', false)){
            return $this->name = $name;
        }
    }
    
    public function setLastname($lastname = ''){
        if(objectHas($this,'lastname', false)){
            return $this->lastname = $lastname;
        }
    }
    
    public function setUsername($username = ''){
        if(objectHas($this,'username', false)){
            return $this->username = $username;
        }
    }
    
    public function setEmail($email = ''){
        if(objectHas($this,'email', false)){
            return $this->email = $email;
        }
    }
    
    public function setAddress($address = ''){
        if(objectHas($this,'address', false)){
            return $this->address = $address;
        }
    }
    
    public function setPassword($password = ''){
        if(objectHas($this,'password', false)){
            return $this->password = $password;
        }
    }
    
    public function setBirthdate($birthdate = ''){
        if(objectHas($this,'birthdate', false)){
            return $this->birthdate = $birthdate;
        }
    }
    
    public function setAge($age = ''){
        if(objectHas($this,'age', false)){
            return $this->age = $age;
        }
    }
    
    public function setCarnet($carnet = ''){
        if(objectHas($this,'carnet', false)){
            return $this->carnet = $carnet;
        }
    }
    
    public function setSexo($sexo = ''){
        if(objectHas($this,'sexo', false)){
            return $this->sexo = $sexo;
        }
    }
    
    public function setPhone1($phone1 = ''){
        if(objectHas($this,'phone_1', false)){
            return $this->phone_1 = $phone1;
        }
    }
    
    public function setPhone2($phone2 = ''){
        if(objectHas($this,'phone_2', false)){
            return $this->phone_2 = $phone2;
        }
    }
    
    public function setCellphone1($cellphone1 = ''){
        if(objectHas($this,'cellphone_1', false)){
            return $this->cellphone_1 = $cellphone1;
        }
    }
    
    public function setCellphone2($cellphone2 = ''){
        if(objectHas($this,'cellphone_2', false)){
            return $this->cellphone_2 = $cellphone2;
        }
    }
    
    public function setIdsFiles($idsFiles = ''){
        if(objectHas($this,'ids_files', false)){
            return $this->ids_files = $idsFiles;
        }
    }
    
    public function setIdCoverPicture($idCoverPicture = ''){
        if(objectHas($this,'id_cover_picture', false)){
            return $this->id_cover_picture = $idCoverPicture;
        }
    }
    
    public function setIdCity($idCity = ''){
        if(objectHas($this,'id_city', false)){
            return $this->id_city = $idCity;
        }
    }
    
    public function setIdProvincia($idProvincia = ''){
        if(objectHas($this,'id_provincia', false)){
            return $this->id_provincia = $idProvincia;
        }
    }
    
    public function setIdRole($idRole = ''){
        if(objectHas($this,'id_role', false)){
            return $this->id_role = $idRole;
        }
    }
    
    public function setSigninMethod($signinMethod = ''){
        if(objectHas($this,'signin_method', false)){
            return $this->signin_method = $signinMethod;
        }
    }
    
    public function setUid($uid = ''){
        if(objectHas($this,'uid', false)){
            return $this->uid = $uid;
        }
    }
    
    public function setCountryCode($countryCode = ''){
        if(objectHas($this,'country_code', false)){
            return $this->country_code = $countryCode;
        }
    }
    
    public function setAuthyId($authyId = ''){
        if(objectHas($this,'authy_id', false)){
            return $this->authy_id = $authyId;
        }
    }
    
    public function setVerified($verified = ''){
        if(objectHas($this,'verified', false)){
            return $this->verified = $verified;
        }
    }
    
    public function setChangeCount($changeCount = ''){
        if(objectHas($this,'change_count', false)){
            return $this->change_count = $changeCount;
        }
    }
    
    public function setStatus($status = ''){
        if(objectHas($this,'status', false)){
            return $this->status = $status;
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
    

    
    public function findOneByIdUser($idUser,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_user' => $idUser],false,true,$orderBy,$direction);
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
    
    public function findOneByLastname($lastname,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['lastname' => $lastname],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByUsername($username,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['username' => $username],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByEmail($email,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['email' => $email],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByAddress($address,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['address' => $address],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByPassword($password,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['password' => $password],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByBirthdate($birthdate,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['birthdate' => $birthdate],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByAge($age,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['age' => $age],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByCarnet($carnet,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['carnet' => $carnet],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneBySexo($sexo,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['sexo' => $sexo],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByPhone1($phone1,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['phone_1' => $phone1],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByPhone2($phone2,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['phone_2' => $phone2],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByCellphone1($cellphone1,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['cellphone_1' => $cellphone1],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByCellphone2($cellphone2,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['cellphone_2' => $cellphone2],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIdsFiles($idsFiles,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['ids_files' => $idsFiles],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIdCoverPicture($idCoverPicture,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_cover_picture' => $idCoverPicture],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIdCity($idCity,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_city' => $idCity],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIdProvincia($idProvincia,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_provincia' => $idProvincia],false,true,$orderBy,$direction);
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
    
    public function findOneBySigninMethod($signinMethod,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['signin_method' => $signinMethod],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByUid($uid,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['uid' => $uid],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByCountryCode($countryCode,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['country_code' => $countryCode],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByAuthyId($authyId,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['authy_id' => $authyId],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByVerified($verified,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['verified' => $verified],false,true,$orderBy,$direction);
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
    

    
    public function filterByIdUser($idUser, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['id_user'] = $idUser;

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
    
    public function filterByLastname($lastname, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['lastname'] = $lastname;

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
    
    public function filterByUsername($username, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['username'] = $username;

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
    
    public function filterByEmail($email, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['email'] = $email;

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
    
    public function filterByAddress($address, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['address'] = $address;

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
    
    public function filterByPassword($password, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['password'] = $password;

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
    
    public function filterByBirthdate($birthdate, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['birthdate'] = $birthdate;

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
    
    public function filterByAge($age, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['age'] = $age;

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
    
    public function filterByCarnet($carnet, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['carnet'] = $carnet;

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
    
    public function filterBySexo($sexo, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['sexo'] = $sexo;

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
    
    public function filterByPhone1($phone1, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['phone_1'] = $phone1;

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
    
    public function filterByPhone2($phone2, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['phone_2'] = $phone2;

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
    
    public function filterByCellphone1($cellphone1, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['cellphone_1'] = $cellphone1;

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
    
    public function filterByCellphone2($cellphone2, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['cellphone_2'] = $cellphone2;

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
    
    public function filterByIdsFiles($idsFiles, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['ids_files'] = $idsFiles;

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
    
    public function filterByIdCoverPicture($idCoverPicture, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['id_cover_picture'] = $idCoverPicture;

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
    
    public function filterByIdCity($idCity, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['id_city'] = $idCity;

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
    
    public function filterByIdProvincia($idProvincia, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['id_provincia'] = $idProvincia;

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
    
    public function filterBySigninMethod($signinMethod, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['signin_method'] = $signinMethod;

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
    
    public function filterByUid($uid, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['uid'] = $uid;

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
    
    public function filterByCountryCode($countryCode, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['country_code'] = $countryCode;

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
    
    public function filterByAuthyId($authyId, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['authy_id'] = $authyId;

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
    
    public function filterByVerified($verified, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['verified'] = $verified;

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
    

    public function getNewUser()
    {
        $post = $this->input->post();

        $this->user = $this->setFromData($post);

        return $this->user;
    }

    public function find($bCreateCtrl = false){
        if($bCreateCtrl){
            Ctrl_Tables::create($bCreateCtrl);
        }
        // Obtiene a todos los users
        $oUsers = $this->get();

        
        $oUsers = $this->getThumbs($oUsers);
        

        $oModelUsers = array();

        foreach ($oUsers as $user){

            $oModelUsers[] = $this->setForeigns($user);
        }
        return $oModelUsers;
    }

    public function setFromData($oData, $oUser = null){

        if(isArray($oData)){
            $oData = array2std($oData);
        }
        if(isObject($oData)){

            $oData = verifyArraysInResult($oData);

            if(isObject($oUser)){

                $oModelUsers = $oUser;

            } else {

                $oModelUsers = new Model_Users();
            }
            $aFields = $this->getArrayData(true);
            $aData = std2array($oData);
            foreach ($aFields as $key => $value){

                if(objectHas($oData,$key,false)){

                    $oModelUsers->$key = isNumeric($oData->$key) ? valNumeric($oData->$key) : $oData->$key;

                } else if(objectHas($oData,setObject($key),false)){

                    $oModelUsers->$key = isNumeric($oData->{setObject($key)}) ? valNumeric($oData->{setObject($key)}) : ($oData->{setObject($key)} == "" ? $value : $oData->{setObject($key)});

                } else if(objectHas($oData,ucfirst(setObject($key)),false)){

                    $oModelUsers->$key = isNumeric($oData->{ucfirst(setObject($key))}) ? valNumeric($oData->{ucfirst(setObject($key))}) : ($oData->{ucfirst(setObject($key))} == "" ? $value : $oData->{ucfirst(setObject($key))});
                }
                if(in_array($key,$this->uriStrings) && isset($oData->$key) && validateVar($oData->$key)){

                    $oModelUsers->uriString = clean($oData->$key);

                } else if(in_array($key,$this->uriStrings) && isset($oData->{setObject($key)}) && validateVar($oData->{setObject($key)})){

                    $oModelUsers->uriString = clean($oData->{setObject($key)});

                } else if(in_array($key,$this->uriStrings) && isset($oData->{ucfirst(setObject($key))}) && validateVar($oData->{ucfirst(setObject($key))})){

                    $oModelUsers->uriString = clean($oData->{ucfirst(setObject($key))});
                }
                if(isset($aData[$key])) {
                    unset($aData[$key]);
                }
            }
            foreach ($aData as $dataKey => $dataValue){
                $oModelUsers->$dataKey = $dataValue;
            }
            return $oModelUsers;

        } else {

            return new Model_Users();
        }
    }

    public function getArrayData($bWithForeign = false){
        $data = array(
            
            'id_user' => $this->id_user,
            
            'name' => $this->name,
            
            'lastname' => $this->lastname,
            
            'username' => $this->username,
            
            'email' => $this->email,
            
            'address' => $this->address,
            
            'password' => $this->password,
            
            'birthdate' => $this->birthdate,
            
            'age' => $this->age,
            
            'carnet' => $this->carnet,
            
            'sexo' => $this->sexo,
            
            'phone_1' => $this->phone_1,
            
            'phone_2' => $this->phone_2,
            
            'cellphone_1' => $this->cellphone_1,
            
            'cellphone_2' => $this->cellphone_2,
            
            'ids_files' => $this->ids_files,
            
            'id_cover_picture' => $this->id_cover_picture,
            
            'id_city' => $this->id_city,
            
            'id_provincia' => $this->id_provincia,
            
            'id_role' => $this->id_role,
            
            'signin_method' => $this->signin_method,
            
            'uid' => $this->uid,
            
            'country_code' => $this->country_code,
            
            'authy_id' => $this->authy_id,
            
            'verified' => $this->verified,
            
            'change_count' => $this->change_count,
            
            'status' => $this->status,
            
            'date_modified' => $this->date_modified,
            
            'date_created' => $this->date_created,
            
        );
        if($bWithForeign){
            
            $data['id_role_name'] = $this->id_role_name;
            
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
            
            'IdUser' => $this->id_user,
            
            'Name' => $this->name,
            
            'Lastname' => $this->lastname,
            
            'Username' => $this->username,
            
            'Email' => $this->email,
            
            'Address' => $this->address,
            
            'Password' => $this->password,
            
            'Birthdate' => $this->birthdate,
            
            'Age' => $this->age,
            
            'Carnet' => $this->carnet,
            
            'Sexo' => $this->sexo,
            
            'Phone1' => $this->phone_1,
            
            'Phone2' => $this->phone_2,
            
            'Cellphone1' => $this->cellphone_1,
            
            'Cellphone2' => $this->cellphone_2,
            
            'IdsFiles' => $this->ids_files,
            
            'IdCoverPicture' => $this->id_cover_picture,
            
            'IdCity' => $this->id_city,
            
            'IdProvincia' => $this->id_provincia,
            
            'IdRole' => $this->id_role,
            
            'SigninMethod' => $this->signin_method,
            
            'Uid' => $this->uid,
            
            'CountryCode' => $this->country_code,
            
            'AuthyId' => $this->authy_id,
            
            'Verified' => $this->verified,
            
            'ChangeCount' => $this->change_count,
            
            'Status' => $this->status,
            
            'DateModified' => $this->date_modified,
            
            'DateCreated' => $this->date_created,
            
        );
        if($bWithForeign){
            
            $data['IdRoleName'] = $this->id_role_name;
            
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
