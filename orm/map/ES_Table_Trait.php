<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 3:18 pm
 */

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

trait ES_Table_Trait
{
    
    public function initCities($both = false, $bWithInit = false)
    {
        if(validate_modulo('estic','cities')){

            if ($both) {
                $this->ctrl_cities = Ctrl_Cities::create($bWithInit);
            }
            $this->model_cities = Model_Cities::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initDomains($both = false, $bWithInit = false)
    {
        if(validate_modulo('estic','domains')){

            if ($both) {
                $this->ctrl_domains = Ctrl_Domains::create($bWithInit);
            }
            $this->model_domains = Model_Domains::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initFiles($both = false, $bWithInit = false)
    {
        if(validate_modulo('estic','files')){

            if ($both) {
                $this->ctrl_files = Ctrl_Files::create($bWithInit);
            }
            $this->model_files = Model_Files::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initLogs($both = false, $bWithInit = false)
    {
        if(validate_modulo('estic','logs')){

            if ($both) {
                $this->ctrl_logs = Ctrl_Logs::create($bWithInit);
            }
            $this->model_logs = Model_Logs::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initMessages($both = false, $bWithInit = false)
    {
        if(validate_modulo('estic','messages')){

            if ($both) {
                $this->ctrl_messages = Ctrl_Messages::create($bWithInit);
            }
            $this->model_messages = Model_Messages::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initModules($both = false, $bWithInit = false)
    {
        if(validate_modulo('estic','modules')){

            if ($both) {
                $this->ctrl_modules = Ctrl_Modules::create($bWithInit);
            }
            $this->model_modules = Model_Modules::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initProvincias($both = false, $bWithInit = false)
    {
        if(validate_modulo('estic','provincias')){

            if ($both) {
                $this->ctrl_provincias = Ctrl_Provincias::create($bWithInit);
            }
            $this->model_provincias = Model_Provincias::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initRoles($both = false, $bWithInit = false)
    {
        if(validate_modulo('estic','roles')){

            if ($both) {
                $this->ctrl_roles = Ctrl_Roles::create($bWithInit);
            }
            $this->model_roles = Model_Roles::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initSessions($both = false, $bWithInit = false)
    {
        if(validate_modulo('estic','sessions')){

            if ($both) {
                $this->ctrl_sessions = Ctrl_Sessions::create($bWithInit);
            }
            $this->model_sessions = Model_Sessions::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initTables($both = false, $bWithInit = false)
    {
        if(validate_modulo('estic','tables')){

            if ($both) {
                $this->ctrl_tables = Ctrl_Tables::create($bWithInit);
            }
            $this->model_tables = Model_Tables::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initTablesRoles($both = false, $bWithInit = false)
    {
        if(validate_modulo('estic','tables_roles')){

            if ($both) {
                $this->ctrl_tables_roles = Ctrl_Tables_roles::create($bWithInit);
            }
            $this->model_tables_roles = Model_Tables_roles::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initUsers($both = false, $bWithInit = false)
    {
        if(validate_modulo('estic','users')){

            if ($both) {
                $this->ctrl_users = Ctrl_Users::create($bWithInit);
            }
            $this->model_users = Model_Users::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initUsersRoles($both = false, $bWithInit = false)
    {
        if(validate_modulo('estic','users_roles')){

            if ($both) {
                $this->ctrl_users_roles = Ctrl_Users_roles::create($bWithInit);
            }
            $this->model_users_roles = Model_Users_roles::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
}