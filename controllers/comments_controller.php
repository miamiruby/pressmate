<?php

class CommentsController extends AppController {
	
	var $components = array('LiveValidation.JqueryForm');
	var $helpers = array('LiveValidation.JqueryForm', 'Paginator');

	function add() {
		if (!empty($this->data)) {
			if ($this->Comment->save($this->data)) {
				$this->Session->setFlash(__('Successfully saved comment', true));
			} else {
				$this->Session->write('validationErrors.Comment', $this->Comment->invalidFields());
				$this->Session->setFlash(__('Failed to save comment', true), null, null, 'error');
			}
		}
		$this->redirect($this->referer());
	}

}

?>