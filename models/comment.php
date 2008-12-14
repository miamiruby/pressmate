<?php 

class Comment extends AppModel {

	 var $validate = array(
		'name' => array(
			'rule' => array('custom', '/^[A-Za-z\-]+$/'),
			'message' => 'Only letters and hyphens allowed'
		),
		'body' => array(
			'rule' => array('custom', '/^[A-Za-z0-9\-\. ,]+$/'),
			'message' => 'Only letters, numbers, spaces, periods, commas, and hyphens allowed'
		),
		'email' => array(
			'rule' => array('email'),
			'message' => 'Must be valid email address'
		)
	);
	
}

?>