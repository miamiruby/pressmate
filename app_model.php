<?php
/* SVN FILE: $Id: app_model.php 7847 2008-11-08 02:54:07Z renan.saddam $ */

/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @version       $Revision: 7847 $
 * @modifiedby    $LastChangedBy: renan.saddam $
 * @lastmodified  $Date: 2008-11-07 21:54:07 -0500 (Fri, 07 Nov 2008) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppModel extends Model {
	
	function beforeSave() {
		$this->__injectUser();
		// $this->__injectArea();
		return true;
	}
	
	/**
	 * make sure record is tagged with user_id
	 */
	function __injectUser() {
		if (!isset($_SESSION['Auth'])) {
			return false;
		}
		$user_id = $_SESSION['Auth']['User']['id'];
		if (!isset($this->_schema['user_id'])) {
			throw new Exception($this->alias . ' is not being tagged with user_id');
		}
		if (empty($this->data[$this->alias]['user_id'])) {
			$this->data[$this->alias]['user_id'] = $user_id;
		}
	}
	
	/**
	 * make sure record is tagged with area_id
	 */
	// function __injectArea() {
	// 	if (!$area = Configure::read('Area')) {
	// 		return false;
	// 	}
	// 	if (!isset($this->_schema['area_id'])) {
	// 		throw new Exception($this->alias . ' is not being tagged with area_id');
	// 	}
	// 	if (empty($this->data[$this->alias]['area_id'])) {
	// 		$this->data[$this->alias]['area_id'] = $area['id'];
	// 	}
	// }
}
?>