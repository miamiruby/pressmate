<?php

class Content extends AppModel {

	var $actsAs = array('Sluggable');
	var $hasMany = array('Comment');
	var $belongsTo = array('Status', 'User');
	var $hasAndBelongsToMany = array('Category');
	
	 var $validate = array(
		'title' => array(
			'rule' => array('custom', '/^[A-Za-z0-9,\.\- ]+$/'),
			'message' => 'Only letters, numbers, spaces, commas, periods, and hyphens allowed'
		)
	);

		
}

?>