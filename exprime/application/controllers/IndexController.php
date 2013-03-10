<?php
require_once 'Zend/Config/Ini.php';
require_once 'Zend/Log.php';
require_once 'Zend/Log/Writer/Stream.php';

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    	//$this->getResponse()->setHeader('title', 'truc');
    }

    public function indexAction()
    {
		$log = Zend_Registry::get('log');
		$log->info("indexAction - START");
		
		$this->view->pageTitle = "Accueil";
		
		$log->info("indexAction - END");
		
    }

	public function popupAction()
    {
		$log = Zend_Registry::get('log');
		$log->info("popupAction - START");
		
		$this->view->pageTitle = "popup";
		
		$log->info("popupAction - END");
		
    }
    
}

