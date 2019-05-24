<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 3:18 pm
 */

if (!function_exists('initStaticTableVars')) {

    function initStaticTableVars($obj)
    {
        
        $obj->table_es_cities = class_exists('Migration_Create_es_cities') ? Migration_Create_es_cities::$tableFields : null;
        
        $obj->table_es_domains = class_exists('Migration_Create_es_domains') ? Migration_Create_es_domains::$tableFields : null;
        
        $obj->table_es_files = class_exists('Migration_Create_es_files') ? Migration_Create_es_files::$tableFields : null;
        
        $obj->table_es_logs = class_exists('Migration_Create_es_logs') ? Migration_Create_es_logs::$tableFields : null;
        
        $obj->table_es_messages = class_exists('Migration_Create_es_messages') ? Migration_Create_es_messages::$tableFields : null;
        
        $obj->table_es_modules = class_exists('Migration_Create_es_modules') ? Migration_Create_es_modules::$tableFields : null;
        
        $obj->table_es_provincias = class_exists('Migration_Create_es_provincias') ? Migration_Create_es_provincias::$tableFields : null;
        
        $obj->table_es_roles = class_exists('Migration_Create_es_roles') ? Migration_Create_es_roles::$tableFields : null;
        
        $obj->table_es_sessions = class_exists('Migration_Create_es_sessions') ? Migration_Create_es_sessions::$tableFields : null;
        
        $obj->table_es_tables = class_exists('Migration_Create_es_tables') ? Migration_Create_es_tables::$tableFields : null;
        
        $obj->table_es_tables_roles = class_exists('Migration_Create_es_tables_roles') ? Migration_Create_es_tables_roles::$tableFields : null;
        
        $obj->table_es_users = class_exists('Migration_Create_es_users') ? Migration_Create_es_users::$tableFields : null;
        
        $obj->table_es_users_roles = class_exists('Migration_Create_es_users_roles') ? Migration_Create_es_users_roles::$tableFields : null;
        
    }
}