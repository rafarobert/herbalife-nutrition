<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/05/2019
 * Time: 10:50 am
 * @property Model_Messages $oMessage
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class Ctrl_Messages extends ES_Ctrl_Messages
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

        $oMessages = $this->model_messages->find();

        $this->data["oMessages"] = $oMessages;

        return $this->loadView('estic/messages/index', $view);
    }

    public function edit($id = NULL)
    {
        $this->init();

        if (isNumeric($id) || isString($id)) {

            $rules = $this->model_messages->rules_edit;

            $oMessage = $this->model_messages->findOneByIdMessage($id);

            if (!count((array)$oMessage)) {

                $this->data["errors"][] = "El message no pudo ser encontrado";
            }
        } else {

            $rules = $this->model_messages->rules;

            $oMessage = $this->model_messages->getNewMessage();
        }
        //validateFieldImgUpload3
        if(is_object($oMessage)){

            $this->form_validation->set_rules($rules);
            

            $this->data['oMessage'] = $oMessage;

            $aReturn = array();

            if ($this->form_validation->run() == true) {

                $oMessage = $this->model_messages->getDataFromPost($oMessage);
                //validateFieldImgUpload1
                //validateFieldPassword
                if ($this->error == 'ok') {
                    $data = $oMessage->saveOrUpdate($id);
                    //validateUserSavedForRolling1
                    //validateFieldImgUpload2
                    $this->data['oMessage'] = $oMessage;
                    return $this->returnResponse($oMessage);
                } else {
                    return $this->returnResponse($oMessage);
                }
            } else {
                $this->data['error'][] = $this->error = $this->errors[] = "Message con datos incompletos, porfavor revisa los datos";;
            }
            // Se carga la vista
            return $this->loadView('estic/messages/edit', $this->error);
        } else {
            redirect('estic/messages/index');
        }
    }
    
}
