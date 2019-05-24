<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 3:18 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_es_sessions extends CI_Migration
{
    static $tableId = 'id';
    static $tableName = 'es_sessions';
    static $tableFields = array (
  'id' => 
  array (
    'tabName' => 'es_sessions',
    'field' => 'id',
    'type' => 'varchar',
    'constraint' => '128',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'ip_address' => 
  array (
    'tabName' => 'es_sessions',
    'field' => 'ip_address',
    'type' => 'varchar',
    'constraint' => '45',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'timestamp' => 
  array (
    'tabName' => 'es_sessions',
    'field' => 'timestamp',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'data' => 
  array (
    'tabName' => 'es_sessions',
    'field' => 'data',
    'type' => 'blob',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Datos en sesion',
    'input' => 'textarea',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'last_activity' => 
  array (
    'tabName' => 'es_sessions',
    'field' => 'last_activity',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => '0000-00-00 00:00:00',
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'id_user' => 
  array (
    'tabName' => 'es_sessions',
    'field' => 'id_user',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Nombre del Usuario',
    'selectBy' => 
    array (
      0 => 'name',
      1 => 'lastname',
    ),
    'validate' => 'required',
    'idForeign' => 'id_user',
    'table' => 'es_users',
    'pk' => 'id',
  ),
  'lng' => 
  array (
    'tabName' => 'es_sessions',
    'field' => 'lng',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'lat' => 
  array (
    'tabName' => 'es_sessions',
    'field' => 'lat',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
);
    static $tableForeignKeys = array (
  'es_sessions_ibfk_1' => 
  array (
    'table' => 'es_users',
    'idLocal' => 'id_user',
    'idForeign' => 'id_user',
  ),
);
    static $tableSettings = array (
  'title' => 'Sesiones del Sistema',
  'indexFields' => 
  array (
    0 => 'ip_address',
    1 => 'timestamp',
    2 => 'last_activity',
    3 => 'id_user',
  ),
  'numListed' => 4,
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
        //$this->dbforge->drop_table('es_sessions');
    }
}