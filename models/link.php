<?php

class Link extends AppModel {
	
	 var $validate = array(
		'name' => array(
			'rule' => array('custom', '/^[A-Za-z\- ]+$/'),
			'message' => 'Only letters, spaces, and hyphens allowed'
		),
		'url' => array(
			'rule' => array('url'),
			'message' => 'Must be valid web address'
		)
	);	
	
}

?>