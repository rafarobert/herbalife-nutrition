<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 06/05/2019
 * Time: 3:02 am
 * @property Model_Tables $oTable
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class Ctrl_Tables extends ES_Ctrl_Tables
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

        $oTables = $this->model_tables->find();

        $this->data["oTables"] = $oTables;

        return $this->loadView('estic/tables/index', $view);
    }

    public function edit($id = NULL)
    {
        $this->init();

        if (isNumeric($id) || isString($id)) {

            $rules = $this->model_tables->rules_edit;

            $oTable = $this->model_tables->findOneByIdTable($id);

            if (!count((array)$oTable)) {

                $this->data["errors"][] = "El table no pudo ser encontrado";
            }
        } else {

            $rules = $this->model_tables->rules;

            $oTable = $this->model_tables->getNewTable();
        }
        //validateFieldImgUpload3
        if(is_object($oTable)){

            $this->form_validation->set_rules($rules);
            
            $aDBTables = std2array($this->model_tables->get_by(['table_name']));
            $this->data['aDBTables'] = array_combine(array_column($aDBTables, 'table_name'), array_column($aDBTables, 'table_name'));
            $this->data['aDBTableRef'] = isset($oTable->idDBTableRef) && $oTable->idDBTableRef != null ? [$oTable->idDBTableRef => $oTable->idDBTableRef] : [];
            $this->data['aDBTableFields'] = isset($oTable->fieldDBTableRef) && $oTable->fieldDBTableRef != null ? std2array($oTable->fieldDBTableRef) : [];
            

            $this->data['oTable'] = $oTable;

            $aReturn = array();

            if ($this->form_validation->run() == true) {

                $oTable = $this->model_tables->getDataFromPost($oTable);
                //validateFieldImgUpload1
                //validateFieldPassword
                if ($this->error == 'ok') {
                    $data = $oTable->saveOrUpdate($id);
                    //validateUserSavedForRolling1
                    //validateUsersSavedForPersonTable1
                    //validateUsersSavedForEstudentTable1
                    //validateFieldImgUpload2
                    $this->data['oTable'] = $oTable;
                    return $this->returnResponse($oTable);
                } else {
                    return $this->returnResponse($oTable);
                }
            } else {
                $this->data['error'][] = $this->error = $this->errors[] = "Table con datos incompletos, porfavor revisa los datos";;
            }
            // Se carga la vista
            return $this->loadView('estic/tables/edit', $this->error);
        } else {
            redirect('estic/tables/index');
        }
    }
    
}