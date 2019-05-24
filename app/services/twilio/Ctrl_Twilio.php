<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrezgaspar
 * Date: 2019-05-21
 * Time: 01:31
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;
use Twilio\Rest\Client;

defined("BASEPATH") OR exit("No direct script access allowed");

class Ctrl_Twilio extends ES_Backend_Controller
{
  protected $sid = "AC2b012a1d61731752f1f57072426dc7a5";
  protected $token = "86967027bed0e21681a12d44e27eb426";
  protected $client;
  protected $from = '+18148464946';

  private static $instance = null;

  public function __construct()
  {
    parent::__construct();
  }

  public function getInstance()
  {
    return self::$instance;
  }

  public function toBePrinted()
  {
    $this->printView = true;
    return self::$instance;
  }
  public function send(){
    $this->client = new Client($this->sid, $this->token);
    $toNumber = $this->input->post('number');
    // Authentication stuff goes here
    $data = $this->client->messages->create(
    // Where to send a text message (your cell phone?)
      $toNumber,
      array(
        'from' => $this->from,
        'body' => 'I sent this message in under 10 minutes! from Estic.com.bo'
      )
    );
      return array(
        'error' => 'ok',
        'data' => $data
      );
  }
}
