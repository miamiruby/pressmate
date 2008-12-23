<?php

class Url extends AppModel {

	 var $validate = array(
		'url' => array(
			'rule' => array('validateUrl')
		)
	);
	
	/**
	 * validates a url
	 */
	function validateUrl() {
		if (empty($this->data[$this->alias]['url'])) {
			return 'Must be valid web address';
		}
		if (strstr($this->data[$this->alias]['url'], 'localhost')) {
			return true;
		}
		if (Validation::url($this->data[$this->alias]['url'])) {
			return true;
		} else {
			return 'Must be valid web address';
		}
	}
	
}

?>