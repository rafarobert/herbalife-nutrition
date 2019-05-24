<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 3:18 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_es_messages extends CI_Migration
{
    static $tableId = 'id_message';
    static $tableName = 'es_messages';
    static $tableFields = array (
  'id_message' => 
  array (
    'tabName' => 'es_messages',
    'field' => 'id_message',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'idForeign' => NULL,
    'table' => NULL,
    'pk' => 'id_message',
  ),
  'phone_number' => 
  array (
    'tabName' => 'es_messages',
    'field' => 'phone_number',
    'type' => 'varchar',
    'constraint' => '100',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_message',
  ),
  'country_code' => 
  array (
    'tabName' => 'es_messages',
    'field' => 'country_code',
    'type' => 'varchar',
    'constraint' => '50',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_message',
  ),
  'authy_id' => 
  array (
    'tabName' => 'es_messages',
    'field' => 'authy_id',
    'type' => 'varchar',
    'constraint' => '50',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_message',
  ),
  'verified' => 
  array (
    'tabName' => 'es_messages',
    'field' => 'verified',
    'type' => 'tinyint',
    'constraint' => '1',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_message',
  ),
);
    static $tableForeignKeys = array (
  'es_messages_id_message_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_message',
    'idForeign' => NULL,
  ),
);
    static $tableSettings = array (
  'ctrl' => true,
  'model' => true,
  'views' => true,
);

    public function up()
    {
        $this->dbforge->add_field(self::$tableFields);
        $this->dbforge->add_key(self::$tableId, TRUE);
        $this->dbforge->add_key(self::$tableForeignKeys);
        $this->create_or_alter_table(self::$tableName);
        $settings = self::$tableSettings;
        $this->set_settings($settings, self::$tableName);
    }

    public function down()
    {
        //$this->dbforge->drop_table('es_messages');
    }
}