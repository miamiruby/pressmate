<?php

class Area extends AppModel {
	
	var $hasMany = array('Url');
	
	 var $validate = array(
		'name' => array(
			'rule' => array('custom', '/^[A-Za-z0-9,\.\- ]+$/'),
			'message' => 'Only letters, numbers, spaces, commas, periods, and hyphens allowed'
		)
	);
// 'avatar_url' => array(
// 	'rule' => array('url'),
// 	'message' => 'Must be valid web address',
// 	'allowEmpty' => true
// ),
// 'google_analytics' => array(
// 	'rule' => array('custom', '/^[A-Za-z0-9\-]+$/'),
// 	'message' => 'Must be valid Google Analytics key. Only letters, numbers, and hyphens allowed',
// 	'allowEmpty' => true
// )
			
}

?>