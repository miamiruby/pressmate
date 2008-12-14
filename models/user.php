<?php

class User extends AppModel {
	
	var $actsAs = array('Acl' => array('Aro' => 'requestor'));
	
	 var $validate = array(
		'first_name' => array(
			'rule' => array('custom', '/^[A-Za-z\- ]+$/'),
			'message' => 'Only letters, spaces, and hyphens allowed'
		),
		'last_name' => array(
			'rule' => array('custom', '/^[A-Za-z\- ]+$/'),
			'message' => 'Only letters, spaces and hyphens allowed'
		),
		'email' => array(
			'usernameExists' => array(
				'rule' => array('validateEmail'),
				'message' => 'That email address is already taken'
			),
			'email' => array(
				'rule' => array('email'),
				'message' => 'Must be valid email address'
			)
		),
		'avatar_url' => array(
			'rule' => array('url'),
			'message' => 'Must be valid web address'
		),
		'username' => array(
			'usernameExists' => array(
				'rule' => array('validateUsername'),
				'message' => 'That username is already taken'
			),
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				'message' => 'Only letters and numbers allowed'
			)
		),
		'password' => array(
			'rule' => array('validatePassword'),
			'message' => 'Passwords must match',
			'empty' => false
		),
		'password1' => array(
			'rule' => array('validatePassword'),
			'message' => 'Passwords must match',
			'empty' => false
		)
	);

	/**
	 * required for ACL behavior
	 */
	function parentNode() {
		return false;
	}
	
	/**
	 * checks that passwords match
	 */
	function validatePassword() {
		extract($this->data[$this->alias]);
		
		// user already has a password, no need to validate
		if (isset($id) && isset($password)) {
			$user = $this->findById($id);
			if (empty($password) && $user[$this->alias]['password']) {
				return true;
			}
		}
		
		// check that passwords match
		if (empty($password1) || empty($password2) || $password1 != $password2) {
			$this->invalidate('password', 'Passwords must match');
			$this->invalidate('password1', 'Passwords must match');
			$this->invalidate('password2', 'Passwords must match');
			return false;
		}
		
		// assign to proper password field
		$this->data[$this->alias]['password'] = $this->data[$this->alias]['password1'];
		return true;
	}
	
	/**
	 * checks that username is not taken
	 */
	function validateUsername() {
		extract($this->data[$this->alias]);
		$user = $this->findByUsername($username);
		if ($user && $id != $user[$this->alias][$this->primaryKey]) {
			return false;
		}
		return true;
	}
	
	/**
	 * checks that email is not already used
	 */
	function validateEmail() {
		extract($this->data[$this->alias]);
		$user = $this->findByEmail($email);
		if ($user && $id != $user[$this->alias][$this->primaryKey]) {
			return false;
		}
		return true;
	}
	
	/**
	 * creates user account
	 */
	function createAccount($data) {
		extract($data[$this->alias]);
		$this->create($data);
		if (!$this->save()) {
			return false;
		}
		return true;
	}
	
}

?>