<?php

class CommentsController extends AppController {
	
	var $helpers = array('Paginator');
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add');
	}

	function add() {
		if (!empty($this->data)) {
			if (!empty($this->data['Comment']['spam_answer'])) {
				if ($this->data['Comment']['spam_answer'] != Configure::read('Config.spam_answer')) {
					$this->Comment->set($this->data);
					$this->Comment->invalidate('spam_answer', 'Incorrect answer');
					$this->Session->write('data.Comment', $this->data['Comment']);
					$this->Session->write('validationErrors.Comment', $this->Comment->invalidFields());
					$this->Session->setFlash(__('Failed to save comment', true), null, null, 'error');
					$this->redirect($this->referer());
				}
			}
			if ($this->Comment->save($this->data)) {
				extract($this->data['Comment']);
				$this->Cookie->write('CommentUser', compact('name', 'email', 'url'));
				$this->Session->setFlash(__('Successfully saved comment', true));
			} else {
				$this->Session->write('data.Comment', $this->data['Comment']);
				$this->Session->write('validationErrors.Comment', $this->Comment->invalidFields());
				$this->Session->setFlash(__('Failed to save comment', true), null, null, 'error');
			}
		}
		$this->redirect($this->referer());
	}

}

?>