<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 24/04/2019
 * Time: 12:17 pm
 * @property Model_Domains $oDomain
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class Ctrl_Domains extends ES_Ctrl_Domains
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

        $oDomains = $this->model_domains->find();

        $this->data["oDomains"] = $oDomains;

        return $this->loadView('estic/domains/index', $view);
    }

    public function edit($id = NULL)
    {
        $this->init();

        if (isNumeric($id) || isString($id)) {

            $rules = $this->model_domains->rules_edit;

            $oDomain = $this->model_domains->findOneByIdDomain($id);

            if (!count((array)$oDomain)) {

                $this->data["errors"][] = "El domain no pudo ser encontrado";
            }
        } else {

            $rules = $this->model_domains->rules;

            $oDomain = $this->model_domains->getNewDomain();
        }
        //validateFieldImgUpload3
        if(is_object($oDomain)){

            $this->form_validation->set_rules($rules);
            

            $this->data['oDomain'] = $oDomain;

            $aReturn = array();

            if ($this->form_validation->run() == true) {

                $oDomain = $this->model_domains->getDataFromPost($oDomain);
                //validateFieldImgUpload1
                //validateFieldPassword
                if ($this->error == 'ok') {
                    $data = $oDomain->saveOrUpdate($id);
                    //validateUserSavedForRolling1
                    //validateUsersSavedForPersonTable1
                    //validateUsersSavedForEstudentTable1
                    //validateFieldImgUpload2
                    $this->data['oDomain'] = $oDomain;
                    return $this->returnResponse($oDomain);
                } else {
                    return $this->returnResponse($oDomain);
                }
            } else {
                $this->data['error'][] = $this->error = $this->errors[] = "Domain con datos incompletos, porfavor revisa los datos";;
            }
            // Se carga la vista
            return $this->loadView('estic/domains/edit', $this->error);
        } else {
            redirect('estic/domains/index');
        }
    }
    
}