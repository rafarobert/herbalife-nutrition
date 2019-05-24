<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Ctrl_Users_roles extends ES_Estic_Controller
{
    public static $initialized;
    
    public $users;
    
    public $roles;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("estic/model_users_roles");

        if(isset($this->model_users_roles)){

            $this->model_initialized = $this->model_users_roles;

        } else if(isset($this->CI_global->model_users_roles)){

            $this->model_initialized = $this->CI_global->model_users_roles;
        }
        //validateUserSavedForRolling2
        $this->subjectP = 'users_roles';
        $this->subjectS = 'user_role';
    }

    public function init(){
        
        if(!validate_modulo('estic','users')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_users");
        
        if(!validate_modulo('estic','roles')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_roles");
        
        $this->initLoaded();
        
        
        $this->users = $this->model_users->selectBy(array (
  0 => 'name',
  1 => 'lastname',
));
        
        $this->roles = $this->model_roles->selectBy(array (
  0 => 'name',
));
        
        
        $this->data['tabName'] = $this->model_users_roles->_table_name;
        
        $this->data['oUsers'] = $this->model_users->setOptions($this->users);
        
        $this->data['oRoles'] = $this->model_roles->setOptions($this->roles);
        
        
        self::$initialized = true;
        return $this->getInstance();
    }

    public function setUsersRoles($oData, $oUsersRoles = null)
    {
        $oModelUsersRoles = array();
        if (isArray($oData) || isObject($oData))
        {
            if(isCollection($oData)){

                foreach ($oData as $key => $data){

                    if (isObject($oUsersRoles)) {

                        $oModelUsersRoles[$key] = $oUsersRoles;

                    } else {

                        $oModelUsersRoles[$key] = new Model_Users_roles();
                    }
                    $oModelUsersRoles[$key] = $oModelUsersRoles[$key]->setFromData($data);
                }
            } else {

                if (isObject($oUsersRoles)) {

                    $oModelUsersRoles[0] = $oUsersRoles;

                } else {

                    $oModelUsersRoles[0] = new Model_Users_roles();
                }
                $oModelUsersRoles[0] = $oModelUsersRoles[0]->setFromData($oData);
            }

            return $oModelUsersRoles;

        } else if (isArray($oUsersRoles) || isObject($oUsersRoles)) {

            return $this->setUsersRoles($oUsersRoles);

        } else {

            $oModelUsersRoles[] = new Model_Users_roles();

            return $oModelUsersRoles;
        }
    }

    
}
