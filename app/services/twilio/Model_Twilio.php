<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrezgaspar
 * Date: 2019-05-21
 * Time: 01:32
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_Domains extends ES_Model_Domains
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
}
