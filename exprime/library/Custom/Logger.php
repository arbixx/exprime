<?php
require 'Zend/Log.php';

class Custom_Logger {
	
	private $logger = null;
	
	public function __construct( $output )
	{
		$this->logger = new Zend_Log();
		$writer = new Zend_Log_Writer_Stream($output);
		$this->logger->addWriter($writer);	
	}
	
	
	public function info($message)
	{
		$this->logger->log($message, Zend_Log::INFO);
	}
	
	public function warn($message)
	{
		$this->logger->log($message, Zend_Log::WARN);
	}
	public function debug($message)
	{
		$this->logger->log($message, Zend_Log::DEBUG);
	}
	public function alert($message)
	{
		$this->logger->log($message, Zend_Log::ALERT);
	}
	public function notice($message)
	{
		$this->logger->log($message, Zend_Log::NOTICE);
	}
	public function error($message)
	{
		$this->logger->log($message, Zend_Log::ERR);
	}
	
	
}
?>