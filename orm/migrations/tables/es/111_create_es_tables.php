<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 3:18 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_es_tables extends CI_Migration
{
    static $tableId = 'id_table';
    static $tableName = 'es_tables';
    static $tableFields = array (
  'id_table' => 
  array (
    'tabName' => 'es_tables',
    'field' => 'id_table',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
    'validate' => 'required',
    'idForeign' => NULL,
    'table' => NULL,
    'pk' => 'id_table',
  ),
  'id_module' => 
  array (
    'tabName' => 'es_tables',
    'field' => 'id_module',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Modulo',
    'input' => 'select',
    'selectBy' => 
    array (
      0 => 'name',
    ),
    'validate' => 'required',
    'idForeign' => 'id_module',
    'table' => 'es_modules',
    'pk' => 'id_table',
  ),
  'id_role' => 
  array (
    'tabName' => 'es_tables',
    'field' => 'id_role',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Roles Admitidos',
    'input' => 'radios',
    'validate' => 'required',
    'idForeign' => 'id_role',
    'table' => 'es_roles',
    'pk' => 'id_table',
  ),
  'title' => 
  array (
    'tabName' => 'es_tables',
    'field' => 'title',
    'type' => 'varchar',
    'constraint' => '100',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_table',
  ),
  'table_name' => 
  array (
    'tabName' => 'es_tables',
    'field' => 'table_name',
    'type' => 'varchar',
    'constraint' => '255',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Tablas',
    'input' => 'select',
    'options' => 'db_tabs',
    'validate' => 'required',
    'pk' => 'id_table',
  ),
  'listed' => 
  array (
    'tabName' => 'es_tables',
    'field' => 'listed',
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => 'ENABLED',
    'extra' => '',
    'input' => 'radios',
    'options' => 
    array (
      'enabled' => 'enabled',
      'disabled' => 'disabled',
    ),
    'validate' => 'required',
    'pk' => 'id_table',
  ),
  'description' => 
  array (
    'tabName' => 'es_tables',
    'field' => 'description',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_table',
  ),
  'icon' => 
  array (
    'tabName' => 'es_tables',
    'field' => 'icon',
    'type' => 'varchar',
    'constraint' => '200',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_table',
  ),
  'url' => 
  array (
    'tabName' => 'es_tables',
    'field' => 'url',
    'type' => 'varchar',
    'constraint' => '400',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_table',
  ),
  'url_edit' => 
  array (
    'tabName' => 'es_tables',
    'field' => 'url_edit',
    'type' => 'varchar',
    'constraint' => '450',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_table',
  ),
  'url_index' => 
  array (
    'tabName' => 'es_tables',
    'field' => 'url_index',
    'type' => 'varchar',
    'constraint' => '450',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_table',
  ),
  'status' => 
  array (
    'tabName' => 'es_tables',
    'field' => 'status',
    'type' => 'varchar',
    'constraint' => '255',
    'unsigned' => false,
    'null' => true,
    'default' => 'ENABLED',
    'extra' => '',
    'pk' => 'id_table',
  ),
  'change_count' => 
  array (
    'tabName' => 'es_tables',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_table',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'es_tables',
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
    'pk' => 'id_table',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'es_tables',
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
    'pk' => 'id_table',
  ),
  'date_modified' => 
  array (
    'tabName' => 'es_tables',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_table',
  ),
  'date_created' => 
  array (
    'tabName' => 'es_tables',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_table',
  ),
);
    static $tableForeignKeys = array (
  'es_tables_id_table_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_table',
    'idForeign' => NULL,
  ),
  'es_tables_ibfk_1' => 
  array (
    'table' => 'es_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'es_tables_ibfk_2' => 
  array (
    'table' => 'es_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'es_tables_ibfk_3' => 
  array (
    'table' => 'es_roles',
    'idLocal' => 'id_role',
    'idForeign' => 'id_role',
  ),
  'es_tables_ibfk_4' => 
  array (
    'table' => 'es_modules',
    'idLocal' => 'id_module',
    'idForeign' => 'id_module',
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
        //$this->dbforge->drop_table('es_tables');
    }
}