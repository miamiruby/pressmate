<?php

class Content extends AppModel {

	var $actsAs = array('Sluggable');
	var $hasMany = array('Comment');
	var $belongsTo = array('Status', 'User');
	var $hasAndBelongsToMany = array('Category');
		
}

?>