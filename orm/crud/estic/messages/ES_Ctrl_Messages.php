<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Ctrl_Messages extends ES_Estic_Controller
{
    public static $initialized;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("estic/model_messages");

        if(isset($this->model_messages)){

            $this->model_initialized = $this->model_messages;

        } else if(isset($this->CI_global->model_messages)){

            $this->model_initialized = $this->CI_global->model_messages;
        }
        //validateUserSavedForRolling2
        $this->subjectP = 'messages';
        $this->subjectS = 'message';
    }

    public function init(){
        
        $this->initLoaded();
        
        
        
        $this->data['tabName'] = $this->model_messages->_table_name;
        
        
        self::$initialized = true;
        return $this->getInstance();
    }

    public function setMessages($oData, $oMessages = null)
    {
        $oModelMessages = array();
        if (isArray($oData) || isObject($oData))
        {
            if(isCollection($oData)){

                foreach ($oData as $key => $data){

                    if (isObject($oMessages)) {

                        $oModelMessages[$key] = $oMessages;

                    } else {

                        $oModelMessages[$key] = new Model_Messages();
                    }
                    $oModelMessages[$key] = $oModelMessages[$key]->setFromData($data);
                }
            } else {

                if (isObject($oMessages)) {

                    $oModelMessages[0] = $oMessages;

                } else {

                    $oModelMessages[0] = new Model_Messages();
                }
                $oModelMessages[0] = $oModelMessages[0]->setFromData($oData);
            }

            return $oModelMessages;

        } else if (isArray($oMessages) || isObject($oMessages)) {

            return $this->setMessages($oMessages);

        } else {

            $oModelMessages[] = new Model_Messages();

            return $oModelMessages;
        }
    }

    
}
