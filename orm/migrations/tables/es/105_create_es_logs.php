<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 3:18 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_es_logs extends CI_Migration
{
    static $tableId = 'id_log';
    static $tableName = 'es_logs';
    static $tableFields = array (
  'id_log' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'id_log',
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
    'pk' => 'id_log',
  ),
  'heading' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'heading',
    'type' => 'varchar',
    'constraint' => '499',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_log',
  ),
  'message' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'message',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_log',
  ),
  'action' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'action',
    'type' => 'varchar',
    'constraint' => '499',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_log',
  ),
  'code' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'code',
    'type' => 'varchar',
    'constraint' => '200',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_log',
  ),
  'level' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'level',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_log',
  ),
  'file' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'file',
    'type' => 'varchar',
    'constraint' => '1000',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_log',
  ),
  'line' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'line',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_log',
  ),
  'trace' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'trace',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_log',
  ),
  'previous' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'previous',
    'type' => 'varchar',
    'constraint' => '499',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_log',
  ),
  'xdebug_message' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'xdebug_message',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_log',
  ),
  'type' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'type',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_log',
  ),
  'post' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'post',
    'type' => 'varchar',
    'constraint' => '1000',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_log',
  ),
  'severity' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'severity',
    'type' => 'varchar',
    'constraint' => '400',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_log',
  ),
  'status' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'status',
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => 'ENABLED',
    'extra' => '',
    'pk' => 'id_log',
  ),
  'change_count' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_log',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'id_user_modified',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Nombre del usuario que modifico el registro',
    'selectBy' => 
    array (
      0 => 'name',
      1 => 'lastname',
    ),
    'input' => 'disabled',
    'pk' => 'id_log',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'id_user_created',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Nombre del usuario que creo el registro',
    'selectBy' => 
    array (
      0 => 'name',
      1 => 'lastname',
    ),
    'input' => 'disabled',
    'pk' => 'id_log',
  ),
  'date_modified' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_log',
  ),
  'date_created' => 
  array (
    'tabName' => 'es_logs',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_log',
  ),
);
    static $tableForeignKeys = array (
  'es_logs_id_log_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_log',
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
        //$this->dbforge->drop_table('es_logs');
    }
}