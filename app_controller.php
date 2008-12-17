<?php
/* SVN FILE: $Id: app_controller.php 7805 2008-10-30 17:30:26Z AD7six $ */
/**
 * Short description for file.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision: 7805 $
 * @modifiedby    $LastChangedBy: AD7six $
 * @lastmodified  $Date: 2008-10-30 13:30:26 -0400 (Thu, 30 Oct 2008) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Short description for class.
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {
	
	var $components = array('Auth', 'Cookie');
	var $helpers = array('Javascript', 'Form');
	var $uses = array('Config', 'User');
	#var $view = 'Theme';
	#var $theme = 'pressmate';
	
	function __construct() {
		$this->__checkInstall();
		parent::__construct();
	}
		
	function beforeFilter() {
		parent::beforeFilter();
		$this->__loadConfig();
		$this->Auth->loginRedirect = '/admin';
		$this->Auth->logoutRedirect = '/';
	}
		
	function beforeRender() {
		parent::beforeRender();
		$this->__styleAdmin();
		$this->__validationErrors();
		$this->__data();
	}
	
	/**
	 * disallows access to installation wizard if already INSTALLED file is present
	 */
	function __checkInstall() {
		$base = strpos($_SERVER['REQUEST_URI'], Dispatcher::getUrl());
		$base = substr($_SERVER['REQUEST_URI'], 0, $base);
		if (!file_exists(APP . 'config/INSTALLED') && !in_array(Dispatcher::getUrl($_SERVER['REQUEST_URI']), array('install', 'install/configure'))) {
			header('Location: '.$base.'install');exit;
		}
	}
	
	/**
	 * propagates invalid fields back to source contoller after error in another method
	 */
	function __validationErrors() {
		if ($validationErrors = $this->Session->read('validationErrors')) {
			foreach ($validationErrors as $k => $i) {
				$obj = ClassRegistry::init($k);
				$obj->validationErrors = $i;
			}
			$this->Session->write('validationErrors', null);
		}
	}
	
	/**
	 * propagates data back to source contoller after error in another method
	 */
	function __data() {
		if ($data = $this->Session->read('data')) {
			foreach ($data as $k => $i) {
				$obj = ClassRegistry::init($k);
				$this->data[$k] = $i;
			}
			$this->Session->write('data', null);
		}
		// attempts to remember identity of commentor and prefill fields
		if (empty($this->data['Comment']) && $data = $this->Cookie->read('CommentUser')) {
			$this->data['Comment'] = $data;
		}
	}
		
	/**
	 * apply admin template to admin routes
	 */
	function __styleAdmin() {
		if (!empty($this->params['admin'])) {
			$this->layout = 'admin';
		}
	}
	
	/**
	 * loads configuration from database
	 */
	function __loadConfig() {	
		$config = $this->Config->findById(1);		
		Configure::write('Config', $config['Config']);
			
		$user = $this->User->findById($this->Session->read('Auth.User.id'));
		$user = $user['User'];
		Configure::write('User', $user);
	}
	
}
?>