<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 3:18 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_es_modules extends CI_Migration
{
    static $tableId = 'id_module';
    static $tableName = 'es_modules';
    static $tableFields = array (
  'id_module' => 
  array (
    'tabName' => 'es_modules',
    'field' => 'id_module',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'idForeign' => NULL,
    'table' => NULL,
    'pk' => 'id_module',
  ),
  'name' => 
  array (
    'tabName' => 'es_modules',
    'field' => 'name',
    'type' => 'varchar',
    'constraint' => '256',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_module',
  ),
  'description' => 
  array (
    'tabName' => 'es_modules',
    'field' => 'description',
    'type' => 'varchar',
    'constraint' => '500',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_module',
  ),
  'status' => 
  array (
    'tabName' => 'es_modules',
    'field' => 'status',
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => 'ENABLED',
    'extra' => '',
    'pk' => 'id_module',
  ),
  'change_count' => 
  array (
    'tabName' => 'es_modules',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_module',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'es_modules',
    'field' => 'id_user_modified',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'idForeign' => 'id_user',
    'table' => 'es_users',
    'label' => 'Nombre del usuario que modifico el registro',
    'selectBy' => 
    array (
      0 => 'name',
      1 => 'lastname',
    ),
    'input' => 'disabled',
    'pk' => 'id_module',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'es_modules',
    'field' => 'id_user_created',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'idForeign' => 'id_user',
    'table' => 'es_users',
    'label' => 'Nombre del usuario que creo el registro',
    'selectBy' => 
    array (
      0 => 'name',
      1 => 'lastname',
    ),
    'input' => 'disabled',
    'pk' => 'id_module',
  ),
  'date_modified' => 
  array (
    'tabName' => 'es_modules',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_module',
  ),
  'date_created' => 
  array (
    'tabName' => 'es_modules',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_module',
  ),
);
    static $tableForeignKeys = array (
  'es_modules_id_module_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_module',
    'idForeign' => NULL,
  ),
  'es_modules_ibfk_1' => 
  array (
    'table' => 'es_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'es_modules_ibfk_2' => 
  array (
    'table' => 'es_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
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
        //$this->dbforge->drop_table('es_modules');
    }
}