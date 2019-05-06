<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->checkVersion('2.0.0-dev');
$serviceContainer->setAdapterClass('herbalife_prod', 'mysql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
$manager->setConfiguration(array (
  'classname' => 'Propel\\Runtime\\Connection\\ConnectionWrapper',
  'dsn' => 'mysql:host=127.0.0.1;dbname=herbalife_prod',
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
$manager->setName('herbalife_prod');
$serviceContainer->setConnectionManager('herbalife_prod', $manager);
$serviceContainer->setAdapterClass('herbalife_dev', 'mysql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
$manager->setConfiguration(array (
  'classname' => 'Propel\\Runtime\\Connection\\DebugPDO',
  'dsn' => 'mysql:host=127.0.0.1;dbname=herbalife_dev',
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
$manager->setName('herbalife_dev');
$serviceContainer->setConnectionManager('herbalife_dev', $manager);
$serviceContainer->setDefaultDatasource('herbalife_prod');
$serviceContainer->setLoggerConfiguration('defaultLogger', array (
  'type' => 'stream',
  'path' => './propel_log.txt',
  'level' => 100,
));