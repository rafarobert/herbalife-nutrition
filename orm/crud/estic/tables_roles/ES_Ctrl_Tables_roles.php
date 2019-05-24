<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Ctrl_Tables_roles extends ES_Estic_Controller
{
    public static $initialized;
    
    public $tables;
    
    public $roles;
    
    public $users;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("estic/model_tables_roles");

        if(isset($this->model_tables_roles)){

            $this->model_initialized = $this->model_tables_roles;

        } else if(isset($this->CI_global->model_tables_roles)){

            $this->model_initialized = $this->CI_global->model_tables_roles;
        }
        //validateUserSavedForRolling2
        $this->subjectP = 'tables_roles';
        $this->subjectS = 'table_role';
    }

    public function init(){
        
        if(!validate_modulo('estic','tables')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_tables");
        
        if(!validate_modulo('estic','roles')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_roles");
        
        if(!validate_modulo('estic','users')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_users");
        
        $this->initLoaded();
        
        
        $this->tables = $this->model_tables->selectBy(array (
  0 => 'title',
));
        
        $this->roles = $this->model_roles->selectBy(array (
  0 => 'name',
));
        
        $this->users = $this->model_users->selectBy(array (
  0 => 'name',
  1 => 'lastname',
));
        
        
        $this->data['tabName'] = $this->model_tables_roles->_table_name;
        
        $this->data['oTables'] = $this->model_tables->setOptions($this->tables);
        
        $this->data['oRoles'] = $this->model_roles->setOptions($this->roles);
        
        $this->data['oUsers'] = $this->model_users->setOptions($this->users);
        
        
        self::$initialized = true;
        return $this->getInstance();
    }

    public function setTablesRoles($oData, $oTablesRoles = null)
    {
        $oModelTablesRoles = array();
        if (isArray($oData) || isObject($oData))
        {
            if(isCollection($oData)){

                foreach ($oData as $key => $data){

                    if (isObject($oTablesRoles)) {

                        $oModelTablesRoles[$key] = $oTablesRoles;

                    } else {

                        $oModelTablesRoles[$key] = new Model_Tables_roles();
                    }
                    $oModelTablesRoles[$key] = $oModelTablesRoles[$key]->setFromData($data);
                }
            } else {

                if (isObject($oTablesRoles)) {

                    $oModelTablesRoles[0] = $oTablesRoles;

                } else {

                    $oModelTablesRoles[0] = new Model_Tables_roles();
                }
                $oModelTablesRoles[0] = $oModelTablesRoles[0]->setFromData($oData);
            }

            return $oModelTablesRoles;

        } else if (isArray($oTablesRoles) || isObject($oTablesRoles)) {

            return $this->setTablesRoles($oTablesRoles);

        } else {

            $oModelTablesRoles[] = new Model_Tables_roles();

            return $oModelTablesRoles;
        }
    }

    
}
