<?php

class User extends AppModel {
	
	var $actsAs = array('Acl' => array('Aro' => 'requestor'));
	
	 var $validate = array(
		'first_name' => array(
			'rule' => array('custom', '/^[A-Za-z\-]+$/'),
			'message' => 'Only letters and hyphens allowed'
		),
		'last_name' => array(
			'rule' => array('custom', '/^[A-Za-z\-]+$/'),
			'message' => 'Only letters and hyphens allowed'
		),
		'email' => array(
			'rule' => array('email'),
			'message' => 'Must be valid email address'
		)
	);

	/**
	 * required for ACL behavior
	 */
	function parentNode() {
		return false;
	}
	
}

?>