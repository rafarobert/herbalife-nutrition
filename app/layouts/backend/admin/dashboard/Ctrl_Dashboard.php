<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/2/2017
 * Time: 12:34
 */

class Ctrl_Dashboard extends ES_Admin_Controller{

    function __construct(){
        parent::__construct();
    }

    public function index()
    {
        if(validate_modulo('estic','users')){
            if (is_object($this->oUserLogguedIn)){
                $this->data['oUser'] = $this->oUserLogguedIn;
                $this->data['subview'] = 'admin/dashboard/index';
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
