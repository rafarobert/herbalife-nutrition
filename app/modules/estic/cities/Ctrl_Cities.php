<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 10/05/2019
 * Time: 12:56 am
 * @property Model_Cities $oCitie
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class Ctrl_Cities extends ES_Ctrl_Cities
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

        $oCities = $this->model_cities->find();

        $this->data["oCities"] = $oCities;

        return $this->loadView('estic/cities/index', $view);
    }

    public function edit($id = NULL)
    {
        $this->init();

        if (isNumeric($id) || isString($id)) {

            $rules = $this->model_cities->rules_edit;

            $oCitie = $this->model_cities->findOneByIdCity($id);

            if (!count((array)$oCitie)) {

                $this->data["errors"][] = "El citie no pudo ser encontrado";
            }
        } else {

            $rules = $this->model_cities->rules;

            $oCitie = $this->model_cities->getNewCitie();
        }
        
        // revisa esta seccion despues de cada migracion
        $oCitie = $this->model_cities->setThumbs($oCitie,$oCitie->getIdsfiles());
        
        if(is_object($oCitie)){

            $this->form_validation->set_rules($rules);
            

            $this->data['oCitie'] = $oCitie;

            $aReturn = array();

            if ($this->form_validation->run() == true) {

                $oCitie = $this->model_cities->getDataFromPost($oCitie);
                //validateFieldImgUpload1
                //validateFieldPassword
                if ($this->error == 'ok') {
                    $data = $oCitie->saveOrUpdate($id);
                    //validateUserSavedForRolling1
                    //validateUsersSavedForPersonTable1
                    //validateUsersSavedForEstudentTable1
                    //validateFieldImgUpload2
                    $this->data['oCitie'] = $oCitie;
                    return $this->returnResponse($oCitie);
                } else {
                    return $this->returnResponse($oCitie);
                }
            } else {
                $this->data['error'][] = $this->error = $this->errors[] = "Citie con datos incompletos, porfavor revisa los datos";;
            }
            // Se carga la vista
            return $this->loadView('estic/cities/edit', $this->error);
        } else {
            redirect('estic/cities/index');
        }
    }
    
}