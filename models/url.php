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
		if ($this->data[$this->alias]['url'] == 'localhost') {
			return true;
		}
		return !Validation::url($this->data[$this->alias]['url']);
	}
	
}

?>