<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 06/05/2019
 * Time: 3:04 am
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_Roles extends ES_Model_Roles
{

    private static $instance = null;

    function __construct()
    {
        parent::__construct();
    }

    public static function create()
    {
        if (!self::$instance) {
            self::$instance = new self();
            self::$instance->init();
        }
        return self::$instance;
    }

    public function getTableName()
    {
        return $this->_table_name;
    }

    public function getTimeStamps()
    {
        return $this->_timestaps;
    }

    public function getOrderBy()
    {
        return $this->_order_by;
    }

    public function getPrimaryKey()
    {
        return $this->_primary_key;
    }

    public function getEsClass()
    {
        return $this->_es_class;
    }

    public function setOrderBy($field, $bDescAsc = false)
    {
        $order = $bDescAsc ? 'asc' : 'desc';
        return $this->_order_by = "$field $order";
    }

    public function setTimeStamps($bSw = true)
    {
        return $this->_timestaps = $bSw;
    }

}