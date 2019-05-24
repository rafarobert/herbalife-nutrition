<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Ctrl_Sessions extends ES_Estic_Controller
{
    public static $initialized;
    
    public $users;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("estic/model_sessions");

        if(isset($this->model_sessions)){

            $this->model_initialized = $this->model_sessions;

        } else if(isset($this->CI_global->model_sessions)){

            $this->model_initialized = $this->CI_global->model_sessions;
        }
        //validateUserSavedForRolling2
        $this->subjectP = 'sessions';
        $this->subjectS = 'session';
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
        
        
        $this->data['tabName'] = $this->model_sessions->_table_name;
        
        $this->data['oUsers'] = $this->model_users->setOptions($this->users);
        
        
        self::$initialized = true;
        return $this->getInstance();
    }

    public function setSessions($oData, $oSessions = null)
    {
        $oModelSessions = array();
        if (isArray($oData) || isObject($oData))
        {
            if(isCollection($oData)){

                foreach ($oData as $key => $data){

                    if (isObject($oSessions)) {

                        $oModelSessions[$key] = $oSessions;

                    } else {

                        $oModelSessions[$key] = new Model_Sessions();
                    }
                    $oModelSessions[$key] = $oModelSessions[$key]->setFromData($data);
                }
            } else {

                if (isObject($oSessions)) {

                    $oModelSessions[0] = $oSessions;

                } else {

                    $oModelSessions[0] = new Model_Sessions();
                }
                $oModelSessions[0] = $oModelSessions[0]->setFromData($oData);
            }

            return $oModelSessions;

        } else if (isArray($oSessions) || isObject($oSessions)) {

            return $this->setSessions($oSessions);

        } else {

            $oModelSessions[] = new Model_Sessions();

            return $oModelSessions;
        }
    }

    
            public function login(){
                $this->session->login();
            }
            public function logout(){
                $this->session->logout();
            }
            public function signup(){
                $this->session->signUp();
            }
            public function forgot_password(){
                $this->session->forgotPassword();
            }
            
}
