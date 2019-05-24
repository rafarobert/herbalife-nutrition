<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/2/2017
 * Time: 12:34
 */

class Ctrl_Dashboard extends ES_Estic_Controller {

    function __construct(){
        parent::__construct();
    }

    public function index()
    {

        if(validate_modulo('estic','users')){
            $oUser = $this->session->getDataUserLoggued();
            if (is_object($oUser)){
                $this->data['subLayout'] = 'backend/_subLayout';
                $this->data['oUser'] = $oUser;
                if($oUser->getIdRole() == 1){
                    $this->data['subview'] = 'estic/dashboard/index';
                } else {
                    $this->data['subview'] = 'admin/dashboard/index';
                }
            } else {
                $this->data['subLayout'] = 'pages/login';
            }
        } else {
            $this->data['subLayout'] = 'pages/building';
        }
    }

    public function modal(){
        $this->data['subLayout'] = 'pages/login';
    }
}
