<?php

class Category extends AppModel {

	var $actsAs = array('Tree');
	
	 var $validate = array(
		'name' => array(
			'rule' => array('custom', '/^[A-Za-z\- ]+$/'),
			'message' => 'Only letters, spaces, and hyphens allowed'
		)
	);
	
}

?>