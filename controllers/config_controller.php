<?php

class ConfigController extends AppController {

	var $layout = 'admin';
	var $uses = array('Config');

	/**
	 * main configuration screen
	 */
	function admin_index() {
		if (!empty($this->data)) {
			$this->Config->id = 1;
			if ($this->Config->save($this->data)) {
				$this->Session->setFlash(__('Successfully saved configuration', true));
			} else {
				$this->Session->setFlash(__('Failed to save configuration', true));
			}
		} else {
			$this->data = $this->Config->read(null, 1);
		}
	}
	
}

?>