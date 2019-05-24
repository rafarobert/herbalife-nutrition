<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Ctrl_Roles extends ES_Estic_Controller
{
    public static $initialized;
    
    public $users;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("estic/model_roles");

        if(isset($this->model_roles)){

            $this->model_initialized = $this->model_roles;

        } else if(isset($this->CI_global->model_roles)){

            $this->model_initialized = $this->CI_global->model_roles;
        }
        //validateUserSavedForRolling2
        $this->subjectP = 'roles';
        $this->subjectS = 'role';
    }

    public function init(){
        
        if(!validate_modulo('estic','users')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_users");
        
        $this->initLoaded();
        
        
        $this->users = $this->model_users->selectBy(array (
  0 => 'name',
  1 => 'lastname',
));
        
        
        $this->data['tabName'] = $this->model_roles->_table_name;
        
        $this->data['oUsers'] = $this->model_users->setOptions($this->users);
        
        
        self::$initialized = true;
        return $this->getInstance();
    }

    public function setRoles($oData, $oRoles = null)
    {
        $oModelRoles = array();
        if (isArray($oData) || isObject($oData))
        {
            if(isCollection($oData)){

                foreach ($oData as $key => $data){

                    if (isObject($oRoles)) {

                        $oModelRoles[$key] = $oRoles;

                    } else {

                        $oModelRoles[$key] = new Model_Roles();
                    }
                    $oModelRoles[$key] = $oModelRoles[$key]->setFromData($data);
                }
            } else {

                if (isObject($oRoles)) {

                    $oModelRoles[0] = $oRoles;

                } else {

                    $oModelRoles[0] = new Model_Roles();
                }
                $oModelRoles[0] = $oModelRoles[0]->setFromData($oData);
            }

            return $oModelRoles;

        } else if (isArray($oRoles) || isObject($oRoles)) {

            return $this->setRoles($oRoles);

        } else {

            $oModelRoles[] = new Model_Roles();

            return $oModelRoles;
        }
    }

    
}
