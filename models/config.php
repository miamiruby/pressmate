<?php

class Config extends AppModel {
	
	 var $validate = array(
		'site_name' => array(
			'rule' => array('custom', '/^[A-Za-z\-\' ]+$/'),
			'message' => 'Only letters, spaces, apostrophe, and hyphens allowed'
		),
		'avatar_url' => array(
			'rule' => array('url'),
			'message' => 'Must be valid web address',
			'allowEmpty' => true
		),
		'google_analytics' => array(
			'rule' => array('custom', '/^[A-Za-z0-9\-]+$/'),
			'message' => 'Must be valid Google Analytics key. Only letters, numbers, and hyphens allowed',
			'allowEmpty' => true
		)
		// spam_question
		// spam answer
	);
	
}

?>