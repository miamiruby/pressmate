<?php

class Tag extends AppModel {
	
	 var $validate = array(
		'name' => array(
			'rule' => array('custom', '/^[A-Za-z\- ]+$/'),
			'message' => 'Only letters, spaces, and hyphens allowed'
		)
	);
	
}

?>