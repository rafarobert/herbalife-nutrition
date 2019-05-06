<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 06/05/2019
 * Time: 3:04 am
 * @property Model_Provincias $oProvincia
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class Ctrl_Provincias extends ES_Ctrl_Provincias
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

        $oProvincias = $this->model_provincias->find();

        $this->data["oProvincias"] = $oProvincias;

        return $this->loadView('estic/provincias/index', $view);
    }

    public function edit($id = NULL)
    {
        $this->init();

        if (isNumeric($id) || isString($id)) {

            $rules = $this->model_provincias->rules_edit;

            $oProvincia = $this->model_provincias->findOneByIdProvincia($id);

            if (!count((array)$oProvincia)) {

                $this->data["errors"][] = "El provincia no pudo ser encontrado";
            }
        } else {

            $rules = $this->model_provincias->rules;

            $oProvincia = $this->model_provincias->getNewProvincia();
        }
        //validateFieldImgUpload3
        if(is_object($oProvincia)){

            $this->form_validation->set_rules($rules);
            

            $this->data['oProvincia'] = $oProvincia;

            $aReturn = array();

            if ($this->form_validation->run() == true) {

                $oProvincia = $this->model_provincias->getDataFromPost($oProvincia);
                //validateFieldImgUpload1
                //validateFieldPassword
                if ($this->error == 'ok') {
                    $data = $oProvincia->saveOrUpdate($id);
                    //validateUserSavedForRolling1
                    //validateUsersSavedForPersonTable1
                    //validateUsersSavedForEstudentTable1
                    //validateFieldImgUpload2
                    $this->data['oProvincia'] = $oProvincia;
                    return $this->returnResponse($oProvincia);
                } else {
                    return $this->returnResponse($oProvincia);
                }
            } else {
                $this->data['error'][] = $this->error = $this->errors[] = "Provincia con datos incompletos, porfavor revisa los datos";;
            }
            // Se carga la vista
            return $this->loadView('estic/provincias/edit', $this->error);
        } else {
            redirect('estic/provincias/index');
        }
    }
    
}