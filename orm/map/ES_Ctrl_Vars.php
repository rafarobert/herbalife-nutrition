<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 3:18 pm
 */

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

/**
 * @property CI_DB_query_builder $db                     This is the platform-independent base Active Record implementation class.
 * @property CI_DB_forge $dbforge                 Database Utility Class
 * @property CI_Benchmark $benchmark              This class enables you to mark points and calculate the time difference between them.<br />  Memory consumption can also be displayed.
 * @property CI_Calendar $calendar                This class enables the creation of calendars
 * @property CI_Cart $cart                        Shopping Cart Class
 * @property CI_Config $config                    This class contains functions that enable config files to be managed
 * @property CI_Controller $controller            This class object is the super class that every library in.<br />CodeIgniter will be assigned to.
 * @property CI_Email $email                      Permits email to be sent using Mail, Sendmail, or SMTP.
 * @property CI_Encrypt $encrypt                  Provides two-way keyed encoding using XOR Hashing and Mcrypt
 * @property CI_Exceptions $exceptions            Exceptions Class
 * @property CI_Form_validation $form_validation  Form Validation Class
 * @property CI_Ftp $ftp                          FTP Class
 * @property CI_Hooks $hooks                      Provides a mechanism to extend the base system without hacking.
 * @property CI_Image_lib $image_lib              Image Manipulation class
 * @property CI_Input $input                      Pre-processes global input data for security
 * @property CI_Lang $lang                        Language Class
 * @property CI_Loader $load                      Loads views and files
 * @property CI_Log $log                          Logging Class
 * @property CI_Model $model                      CodeIgniter Model Class
 * @property CI_Output $output                    Responsible for sending final output to browser
 * @property CI_Pagination $pagination            Pagination Class
 * @property CI_Parser $parser                    Parses pseudo-variables contained in the specified template view,<br />replacing them with the data in the second param
 * @property CI_Profiler $profiler                This class enables you to display benchmark, query, and other data<br />in order to help with debugging and optimization.
 * @property CI_Router $router                    Parses URIs and determines routing
 * @property CI_Session $session                  Session Class
 * @property CI_Sha1 $sha1                        Provides 160 bit hashing using The Secure Hash Algorithm
 * @property CI_Table $table                      HTML table generation<br />Lets you create tables manually or from database result objects, or arrays.
 * @property CI_Trackback $trackback              Trackback Sending/Receiving Class
 * @property CI_Typography $typography            Typography Class
 * @property CI_Unit_test $unit_test              Simple testing class
 * @property CI_Upload $upload                    File Uploading Class
 * @property CI_URI $uri                          Parses URIs and determines routing
 * @property CI_User_agent $user_agent            Identifies the platform, browser, robot, or mobile devise of the browsing agent
 * @property CI_Validation $validation            //dead
 * @property CI_Xmlrpc $xmlrpc                    XML-RPC request handler class
 * @property CI_Xmlrpcs $xmlrpcs                  XML-RPC server class
 * @property CI_Zip $zip                          Zip Compression Class
 * @property CI_Javascript $javascript            Javascript Class
 * @property CI_Jquery $jquery                    Jquery Class
 * @property CI_Utf8 $utf8                        Provides support for UTF-8 environments
 * @property CI_Security $security                Security Class, xss, csrf, etc...
 * @property Request $request
 *
 * 
 * @property Model_Cities $model_cities
 * @property Ctrl_Cities $ctrl_cities
 * 
 * @property Model_Domains $model_domains
 * @property Ctrl_Domains $ctrl_domains
 * 
 * @property Model_Files $model_files
 * @property Ctrl_Files $ctrl_files
 * 
 * @property Model_Logs $model_logs
 * @property Ctrl_Logs $ctrl_logs
 * 
 * @property Model_Messages $model_messages
 * @property Ctrl_Messages $ctrl_messages
 * 
 * @property Model_Modules $model_modules
 * @property Ctrl_Modules $ctrl_modules
 * 
 * @property Model_Provincias $model_provincias
 * @property Ctrl_Provincias $ctrl_provincias
 * 
 * @property Model_Roles $model_roles
 * @property Ctrl_Roles $ctrl_roles
 * 
 * @property Model_Sessions $model_sessions
 * @property Ctrl_Sessions $ctrl_sessions
 * 
 * @property Model_Tables $model_tables
 * @property Ctrl_Tables $ctrl_tables
 * 
 * @property Model_Tables_roles $model_tables_roles
 * @property Ctrl_Tables_roles $ctrl_tables_roles
 * 
 * @property Model_Users $model_users
 * @property Ctrl_Users $ctrl_users
 * 
 * @property Model_Users_roles $model_users_roles
 * @property Ctrl_Users_roles $ctrl_users_roles
 * 
 *
 */
class ES_Ctrl_Vars extends CI_Controller
{
    use ES_Table_Trait;
    use ES_Config_Trait;
    // **************** tables Charged ****************
    
    public $table_es_cities;
    
    public $table_es_domains;
    
    public $table_es_files;
    
    public $table_es_logs;
    
    public $table_es_messages;
    
    public $table_es_modules;
    
    public $table_es_provincias;
    
    public $table_es_roles;
    
    public $table_es_sessions;
    
    public $table_es_tables;
    
    public $table_es_tables_roles;
    
    public $table_es_users;
    
    public $table_es_users_roles;
    
    // ************************************************

    public function __construct()
    {
        parent::__construct();
    }
}
