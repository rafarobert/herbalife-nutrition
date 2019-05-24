<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 3:18 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_es_files extends CI_Migration
{
    static $tableId = 'id_file';
    static $tableName = 'es_files';
    static $tableFields = array (
  'id_file' => 
  array (
    'tabName' => 'es_files',
    'field' => 'id_file',
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
    'pk' => 'id_file',
  ),
  'name' => 
  array (
    'tabName' => 'es_files',
    'field' => 'name',
    'type' => 'varchar',
    'constraint' => '256',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_file',
  ),
  'url' => 
  array (
    'tabName' => 'es_files',
    'field' => 'url',
    'type' => 'varchar',
    'constraint' => '450',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_file',
  ),
  'ext' => 
  array (
    'tabName' => 'es_files',
    'field' => 'ext',
    'type' => 'varchar',
    'constraint' => '100',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_file',
  ),
  'raw_name' => 
  array (
    'tabName' => 'es_files',
    'field' => 'raw_name',
    'type' => 'varchar',
    'constraint' => '400',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_file',
  ),
  'full_path' => 
  array (
    'tabName' => 'es_files',
    'field' => 'full_path',
    'type' => 'varchar',
    'constraint' => '400',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_file',
  ),
  'path' => 
  array (
    'tabName' => 'es_files',
    'field' => 'path',
    'type' => 'varchar',
    'constraint' => '400',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_file',
  ),
  'width' => 
  array (
    'tabName' => 'es_files',
    'field' => 'width',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_file',
  ),
  'height' => 
  array (
    'tabName' => 'es_files',
    'field' => 'height',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_file',
  ),
  'size' => 
  array (
    'tabName' => 'es_files',
    'field' => 'size',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_file',
  ),
  'library' => 
  array (
    'tabName' => 'es_files',
    'field' => 'library',
    'type' => 'varchar',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_file',
  ),
  'nro_thumbs' => 
  array (
    'tabName' => 'es_files',
    'field' => 'nro_thumbs',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_file',
  ),
  'id_parent' => 
  array (
    'tabName' => 'es_files',
    'field' => 'id_parent',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'filterBy' => 
    array (
      'thumb_marker' => '',
    ),
    'idForeign' => 'id_file',
    'table' => 'es_files',
    'pk' => 'id_file',
  ),
  'thumb_marker' => 
  array (
    'tabName' => 'es_files',
    'field' => 'thumb_marker',
    'type' => 'varchar',
    'constraint' => '200',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_file',
  ),
  'type' => 
  array (
    'tabName' => 'es_files',
    'field' => 'type',
    'type' => 'varchar',
    'constraint' => '100',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'radios',
    'options' => 
    array (
      'gif' => 'gif',
      'jpg' => 'jpg',
      'png' => 'png',
      'jpeg' => 'jpeg',
      'pdf' => 'pdf',
      'docx' => 'docx',
      'xlsx' => 'xlsx',
      'zip' => 'zip',
      'mp4' => 'mp4',
      'mp3' => 'mp3',
    ),
    'pk' => 'id_file',
  ),
  'x' => 
  array (
    'tabName' => 'es_files',
    'field' => 'x',
    'type' => 'decimal',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_file',
  ),
  'y' => 
  array (
    'tabName' => 'es_files',
    'field' => 'y',
    'type' => 'decimal',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_file',
  ),
  'fix_width' => 
  array (
    'tabName' => 'es_files',
    'field' => 'fix_width',
    'type' => 'decimal',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_file',
  ),
  'fix_height' => 
  array (
    'tabName' => 'es_files',
    'field' => 'fix_height',
    'type' => 'decimal',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_file',
  ),
  'status' => 
  array (
    'tabName' => 'es_files',
    'field' => 'status',
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => 'ENABLED',
    'extra' => '',
    'pk' => 'id_file',
  ),
  'change_count' => 
  array (
    'tabName' => 'es_files',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_file',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'es_files',
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
    'pk' => 'id_file',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'es_files',
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
    'pk' => 'id_file',
  ),
  'date_modified' => 
  array (
    'tabName' => 'es_files',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_file',
  ),
  'date_created' => 
  array (
    'tabName' => 'es_files',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_file',
  ),
);
    static $tableForeignKeys = array (
  'es_files_id_file_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_file',
    'idForeign' => NULL,
  ),
  'es_files_ibfk_1' => 
  array (
    'table' => 'es_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'es_files_ibfk_2' => 
  array (
    'table' => 'es_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'es_files_ibfk_3' => 
  array (
    'table' => 'es_files',
    'idLocal' => 'id_parent',
    'idForeign' => 'id_file',
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
        //$this->dbforge->drop_table('es_files');
    }
}