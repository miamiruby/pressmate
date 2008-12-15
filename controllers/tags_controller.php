<?php

class TagsController extends AppController {
	
	var $helpers = array('Paginator');

	/**
	 * shows all tags
	 */
	function admin_index() {
		$this->set('tags', $this->paginate());
	}

	/**
	 * creates a tag
	 */
	function admin_add() {
		if (!empty($this->data)) {
			if ($this->Tag->save($this->data)) {
				$this->Session->setFlash(__('Successfully saved tag', true));
				$this->redirect('/admin/tags');
			} else {
				$this->Session->setFlash(__('Failed to save tags', true), null, null, 'error');
			}
		}
	}
	
	/**
	 * deletes a tag
	 */
	function admin_delete($id) {
		if (!$id) {
			$this->Session->setFlash(__('That tag does not exist', true), null, null, 'error');
			$this->redirect($this->referer());
		}
		if ($this->Tag->del($id)) {
			$this->Session->setFlash(__('Successfully deleted tag', true));
			$this->redirect($this->referer());
		} else {
			$this->Session->setFlash(__('Failed to delete tag', true), null, null, 'error');
		}
	}
	
	/**
	 * edits a tag
	 */
	function admin_edit($id = null) {
		if (!$id && empty($this->data['Category']['id'])) {
			$this->Session->setFlash(__('That tag does not exist', true), null, null, 'error');
			$this->redirect($this->referer());
		}
		if (!empty($this->data)) {
			if ($this->Tag->save($this->data)) {
				$this->Session->setFlash(__('Successfully saved tag', true));
				$this->redirect('/admin/tags');
			} else {
				$this->Session->setFlash(__('Failed to save tag', true), null, null, 'error');
			}
		} else {
			$this->data = $this->Tag->read(null, $id);
		}
	}
	
}

?>