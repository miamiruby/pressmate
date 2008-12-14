<?php

class LinksController extends AppController {
	
	var $helpers = array('Paginator');

	/**
	 * shows all links
	 */
	function admin_index() {
		$this->set('links', $this->paginate());
	}

	/**
	 * creates a link
	 */
	function admin_add() {
		if (!empty($this->data)) {
			if ($this->Link->save($this->data)) {
				$this->Session->setFlash(__('Successfully saved link', true));
				$this->redirect('/admin/links');
			} else {
				$this->Session->setFlash(__('Failed to save link', true), null, null, 'error');
			}
		}
	}
	
	/**
	 * deletes a link
	 */
	function admin_delete($id) {
		if (!$id) {
			$this->Session->setFlash(__('That link does not exist', true), null, null, 'error');
			$this->redirect($this->referer());
		}
		if ($this->Link->del($id)) {
			$this->Session->setFlash(__('Successfully deleted link', true));
			$this->redirect($this->referer());
		} else {
			$this->Session->setFlash(__('Failed to delete link', true), null, null, 'error');
		}
	}
	
	/**
	 * edits a link
	 */
	function admin_edit($id = null) {
		if (!$id && empty($this->data['Link']['id'])) {
			$this->Session->setFlash(__('That link does not exist', true), null, null, 'error');
			$this->redirect($this->referer());
		}
		if (!empty($this->data)) {
			if ($this->Link->save($this->data)) {
				$this->Session->setFlash(__('Successfully saved link', true));
				$this->redirect('/admin/links');
			} else {
				$this->Session->setFlash(__('Failed to save link', true), null, null, 'error');
			}
		} else {
			$this->data = $this->Link->read(null, $id);
		}
	}
	
}

?>