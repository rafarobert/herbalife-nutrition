<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Ctrl_Users extends ES_Estic_Controller
{
    public static $initialized;
    
    public $files;
    
    public $cities;
    
    public $provincias;
    
    public $roles;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("estic/model_users");

        if(isset($this->model_users)){

            $this->model_initialized = $this->model_users;

        } else if(isset($this->CI_global->model_users)){

            $this->model_initialized = $this->CI_global->model_users;
        }
        
        if(validate_modulo('estic','users_roles')){
            $this->initUsersRoles();
        }
        
        $this->subjectP = 'users';
        $this->subjectS = 'user';
    }

    public function init(){
        
        if(!validate_modulo('estic','files')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_files");
        
        if(!validate_modulo('estic','cities')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_cities");
        
        if(!validate_modulo('estic','provincias')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_provincias");
        
        if(!validate_modulo('estic','roles')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_roles");
        
        $this->initLoaded();
        
        
        $this->files = $this->model_files->selectBy(array (
  0 => 'name',
));
        
        $this->cities = $this->model_cities->selectBy(array (
  0 => 'name',
));
        
        $this->provincias = $this->model_provincias->selectBy(array (
  0 => 'name',
));
        
        $this->roles = $this->model_roles->selectBy(array (
  0 => 'name',
));
        
        
        $this->data['tabName'] = $this->model_users->_table_name;
        
        $this->data['oFiles'] = $this->model_files->setOptions($this->files);
        
        $this->data['oCities'] = $this->model_cities->setOptions($this->cities);
        
        $this->data['oProvincias'] = $this->model_provincias->setOptions($this->provincias);
        
        $this->data['oRoles'] = $this->model_roles->setOptions($this->roles);
        
        
        self::$initialized = true;
        return $this->getInstance();
    }

    public function setUsers($oData, $oUsers = null)
    {
        $oModelUsers = array();
        if (isArray($oData) || isObject($oData))
        {
            if(isCollection($oData)){

                foreach ($oData as $key => $data){

                    if (isObject($oUsers)) {

                        $oModelUsers[$key] = $oUsers;

                    } else {

                        $oModelUsers[$key] = new Model_Users();
                    }
                    $oModelUsers[$key] = $oModelUsers[$key]->setFromData($data);
                }
            } else {

                if (isObject($oUsers)) {

                    $oModelUsers[0] = $oUsers;

                } else {

                    $oModelUsers[0] = new Model_Users();
                }
                $oModelUsers[0] = $oModelUsers[0]->setFromData($oData);
            }

            return $oModelUsers;

        } else if (isArray($oUsers) || isObject($oUsers)) {

            return $this->setUsers($oUsers);

        } else {

            $oModelUsers[] = new Model_Users();

            return $oModelUsers;
        }
    }
}
