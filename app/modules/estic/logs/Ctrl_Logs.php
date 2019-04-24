<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 24/04/2019
 * Time: 12:08 pm
 * @property Model_Logs $oLog
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class Ctrl_Logs extends ES_Ctrl_Logs
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

        $oLogs = $this->model_logs->find();

        $this->data["oLogs"] = $oLogs;

        return $this->loadView('estic/logs/index', $view);
    }

    public function edit($id = NULL)
    {
        $this->init();

        if (isNumeric($id) || isString($id)) {

            $rules = $this->model_logs->rules_edit;

            $oLog = $this->model_logs->findOneByIdLog($id);

            if (!count((array)$oLog)) {

                $this->data["errors"][] = "El log no pudo ser encontrado";
            }
        } else {

            $rules = $this->model_logs->rules;

            $oLog = $this->model_logs->getNewLog();
        }
        //validateFieldImgUpload3
        if(is_object($oLog)){

            $this->form_validation->set_rules($rules);
            

            $this->data['oLog'] = $oLog;

            $aReturn = array();

            if ($this->form_validation->run() == true) {

                $oLog = $this->model_logs->getDataFromPost($oLog);
                //validateFieldImgUpload1
                //validateFieldPassword
                if ($this->error == 'ok') {
                    $data = $oLog->saveOrUpdate($id);
                    //validateUserSavedForRolling1
                    //validateUsersSavedForPersonTable1
                    //validateUsersSavedForEstudentTable1
                    //validateFieldImgUpload2
                    $this->data['oLog'] = $oLog;
                    return $this->returnResponse($oLog);
                } else {
                    return $this->returnResponse($oLog);
                }
            } else {
                $this->data['error'][] = $this->error = $this->errors[] = "Log con datos incompletos, porfavor revisa los datos";;
            }
            // Se carga la vista
            return $this->loadView('estic/logs/edit', $this->error);
        } else {
            redirect('estic/logs/index');
        }
    }
    
}