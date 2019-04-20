<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->checkVersion('2.0.0-dev');
$serviceContainer->setAdapterClass('estic_prod', 'mysql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
$manager->setConfiguration(array (
  'classname' => 'Propel\\Runtime\\Connection\\ConnectionWrapper',
  'dsn' => 'mysql:host=127.0.0.1;dbname=estic_prod',
  'user' => 'root',
  'password' => 2613,
  'attributes' =>
  array (
    'ATTR_EMULATE_PREPARES' => false,
    'ATTR_TIMEOUT' => 30,
  ),
  'model_paths' =>
  array (
    0 => 'src',
    1 => 'vendor',
  ),
));
$manager->setName('estic_prod');
$serviceContainer->setConnectionManager('estic_prod', $manager);
$serviceContainer->setAdapterClass('estic_dev', 'mysql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
$manager->setConfiguration(array (
  'classname' => 'Propel\\Runtime\\Connection\\DebugPDO',
  'dsn' => 'mysql:host=127.0.0.1;dbname=estic_dev',
  'user' => 'root',
  'password' => '',
  'attributes' =>
  array (
    'ATTR_EMULATE_PREPARES' => false,
    'ATTR_TIMEOUT' => 30,
  ),
  'model_paths' =>
  array (
    0 => 'src',
    1 => 'vendor',
  ),
));
$manager->setName('estic_dev');
$serviceContainer->setConnectionManager('estic_dev', $manager);
$serviceContainer->setDefaultDatasource('estic_prod');
$serviceContainer->setLoggerConfiguration('defaultLogger', array (
  'type' => 'stream',
  'path' => './propel_log.txt',
  'level' => 100,
));