<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 3:18 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_es_tables_roles extends CI_Migration
{
    static $tableId = 'id_table_role';
    static $tableName = 'es_tables_roles';
    static $tableFields = array (
  'id_table_role' => 
  array (
    'tabName' => 'es_tables_roles',
    'field' => 'id_table_role',
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
    'pk' => 'id_table_role',
  ),
  'id_table' => 
  array (
    'tabName' => 'es_tables_roles',
    'field' => 'id_table',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'idForeign' => 'id_table',
    'table' => 'es_tables',
    'pk' => 'id_table_role',
  ),
  'id_role' => 
  array (
    'tabName' => 'es_tables_roles',
    'field' => 'id_role',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'idForeign' => 'id_role',
    'table' => 'es_roles',
    'pk' => 'id_table_role',
  ),
  'estado' => 
  array (
    'tabName' => 'es_tables_roles',
    'field' => 'estado',
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => 'ENABLED',
    'extra' => '',
    'label' => 'Estado',
    'input' => 'radio',
    'options' => 
    array (
      0 => 'ENABLED',
      1 => 'DISABLED',
    ),
    'pk' => 'id_table_role',
  ),
  'change_count' => 
  array (
    'tabName' => 'es_tables_roles',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_table_role',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'es_tables_roles',
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
    'pk' => 'id_table_role',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'es_tables_roles',
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
    'pk' => 'id_table_role',
  ),
  'date_modified' => 
  array (
    'tabName' => 'es_tables_roles',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_table_role',
  ),
  'date_created' => 
  array (
    'tabName' => 'es_tables_roles',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_table_role',
  ),
);
    static $tableForeignKeys = array (
  'es_tables_roles_id_table_role_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_table_role',
    'idForeign' => NULL,
  ),
  'es_tables_roles_ibfk_1' => 
  array (
    'table' => 'es_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'es_tables_roles_ibfk_2' => 
  array (
    'table' => 'es_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'es_tables_roles_ibfk_3' => 
  array (
    'table' => 'es_tables',
    'idLocal' => 'id_table',
    'idForeign' => 'id_table',
  ),
  'es_tables_roles_ibfk_4' => 
  array (
    'table' => 'es_roles',
    'idLocal' => 'id_role',
    'idForeign' => 'id_role',
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
        //$this->dbforge->drop_table('es_tables_roles');
    }
}