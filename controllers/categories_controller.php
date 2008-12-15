<?php

class CategoriesController extends AppController {
	
	var $helpers = array('Paginator');

	/**
	 * shows all categories
	 */
	function admin_index() {
		$this->set('categories', $this->paginate());
	}

	/**
	 * creates a category
	 */
	function admin_add() {
		if (!empty($this->data)) {
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('Successfully saved categories', true));
				$this->redirect('/admin/categories');
			} else {
				$this->Session->setFlash(__('Failed to save categories', true), null, null, 'error');
			}
		}
		$this->set('parents', $parents = $this->Category->find('list'));
	}
	
	/**
	 * deletes a category
	 */
	function admin_delete($id) {
		if (!$id) {
			$this->Session->setFlash(__('That category does not exist', true), null, null, 'error');
			$this->redirect($this->referer());
		}
		if ($this->Category->del($id)) {
			$this->Session->setFlash(__('Successfully deleted category', true));
			$this->redirect($this->referer());
		} else {
			$this->Session->setFlash(__('Failed to delete category', true), null, null, 'error');
		}
	}
	
	/**
	 * edits a category
	 */
	function admin_edit($id = null) {
		if (!$id && empty($this->data['Category']['id'])) {
			$this->Session->setFlash(__('That category does not exist', true), null, null, 'error');
			$this->redirect($this->referer());
		}
		if (!empty($this->data)) {
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('Successfully saved category', true));
				$this->redirect('/admin/categories');
			} else {
				$this->Session->setFlash(__('Failed to save category', true), null, null, 'error');
			}
		} else {
			$this->data = $this->Category->read(null, $id);
		}
		$this->set('parents', $parents = $this->Category->find('list'));
	}
	
}

?>