<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 10/05/2019
 * Time: 12:57 am
 * @property Model_Sessions $oSession
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class Ctrl_Sessions extends ES_Ctrl_Sessions
{

    private static $instance = null;

    public function __construct()
    {
        parent::__construct();
    }

    public function getInstance(){
        return self::$instance;
    }

    public function toBePrinted(){
        $this->printView = true;
        return self::$instance;
    }

    public static function create($bWithInit = false)
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        if($bWithInit){
            self::$instance->init();
        } else if(!self::$initialized){
            self::$instance->init();
        }
        return self::$instance;
    }

    public function index($view = NULL, $id = NULL)
    {
        $this->init();

        list($id, $view) = $this->filterIdOrView($id, $view);

        $oSessions = $this->model_sessions->find();

        $this->data["oSessions"] = $oSessions;

        return $this->loadView('estic/sessions/index', $view);
    }

    public function edit($id = NULL)
    {
        $this->init();

        if (isNumeric($id) || isString($id)) {

            $rules = $this->model_sessions->rules_edit;

            $oSession = $this->model_sessions->findOneById($id);

            if (!count((array)$oSession)) {

                $this->data["errors"][] = "El session no pudo ser encontrado";
            }
        } else {

            $rules = $this->model_sessions->rules;

            $oSession = $this->model_sessions->getNewSession();
        }
        //validateFieldImgUpload3
        if(is_object($oSession)){

            $this->form_validation->set_rules($rules);
            

            $this->data['oSession'] = $oSession;

            $aReturn = array();

            if ($this->form_validation->run() == true) {

                $oSession = $this->model_sessions->getDataFromPost($oSession);
                //validateFieldImgUpload1
                //validateFieldPassword
                if ($this->error == 'ok') {
                    $data = $oSession->saveOrUpdate($id);
                    //validateUserSavedForRolling1
                    //validateUsersSavedForPersonTable1
                    //validateUsersSavedForEstudentTable1
                    //validateFieldImgUpload2
                    $this->data['oSession'] = $oSession;
                    return $this->returnResponse($oSession);
                } else {
                    return $this->returnResponse($oSession);
                }
            } else {
                $this->data['error'][] = $this->error = $this->errors[] = "Sesiones del Sistema con datos incompletos, porfavor revisa los datos";;
            }
            // Se carga la vista
            return $this->loadView('estic/sessions/edit', $this->error);
        } else {
            redirect('estic/sessions/index');
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