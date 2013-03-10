<?php 
header('content-type: text/plain; charset=utf-8');


include 'Zend/Config/Ini.php';
include 'Zend/Log.php';
include 'Zend/Log/Writer/Stream.php';



$log = new Zend_Log();
$writer = new Zend_Log_Writer_Stream("php://output");
$log->addWriter($writer);

/** LOADING DATABROKER INI FILE */
$configFile = dirname(__FILE__) . "/config.ini";
$config = new Zend_Config_Ini($configFile, 'dev');
echo "Config: " . $config->arbi->humeur . "\n";

$log->log( $config->arbi->humeur, Zend_Log::INFO );


echo "APPLICATION_PATH=".APPLICATION_PATH."\n";
echo "APPLICATION_ENV=".APPLICATION_ENV."\n";
?>