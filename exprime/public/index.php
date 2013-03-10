<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

    
// Ensure library/ is on include_path
set_include_path(
	implode(
		PATH_SEPARATOR, 
		array(
    		realpath(APPLICATION_PATH . '/../library'),
    		get_include_path(),
		)
	)
);

/** Zend_Application */
require_once 'Zend/Application.php';


/** Create application, bootstrap, and run */
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

/** Necessary imports */
require_once 'Zend/Registry.php';
require_once 'Custom/Logger.php';

/** Initiates the layout process */
Zend_Layout::startMvc( array('layoutPath' => APPLICATION_PATH . "/views/layouts") );

/** create log object **/
$log = new Custom_Logger(APPLICATION_PATH . "/logs/exprime.log");
//register log object into registry
Zend_Registry::set('log', $log);		

/** Creates DB object */
// loading databroker ini file
$log->info("Reading DB config from conf file...");
$config = new Zend_Config_Ini(APPLICATION_PATH . "/configs/databroker.ini", APPLICATION_ENV);
$log->info("DataBroker: adapter=" . $config->database->adapter);
$log->info("DataBroker: host=" . $config->database->params->host);
$log->info("DataBroker: port=" . $config->database->params->port);
$log->info("DataBroker: username=" . $config->database->params->username);
$log->info("DataBroker: password=" . $config->database->params->password);
$log->info("DataBroker: dbname=" . $config->database->params->dbname);
// creates mysql adpater
$db = new Zend_Db_Adapter_Pdo_Mysql($config->database->params);
//$db = Zend_Db::factory($config->database);
//register mysql adapter in registry
Zend_Registry::set('db', $db);		


/** start application */
$application->bootstrap()
            ->run();