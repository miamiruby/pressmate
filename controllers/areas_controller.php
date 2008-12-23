<?php

class AreasController extends AppController {

	/**
	 * creates a new area
	 */
	function admin_add() {
		if (!empty($this->data)) {
			if ($this->Area->saveAll($this->data, array('validate' => 'first'))) {
				$this->Session->setFlash(__('Successfully added area', true));
				$this->redirect('/admin/areas');
			} else {
				$this->Session->setFlash(__('Failed to add area', true), null, null, 'error');
			}
		}
	}
	
	/**
	 * edits an area
	 */
	function admin_edit($id = null) {
		if (!$id && empty($this->data['Area']['id'])) {
			$this->Session->setFlash(__('That area does not exist', true), null, null, 'error');
			$this->redirect($this->referer());
		}
		if (!empty($this->data)) {
			if ($this->Area->saveAll($this->data, array('validate' => 'first'))) {
				$this->Session->setFlash(__('Successfully updated area', true));
				$this->redirect('/admin/areas');
			} else {
				$this->Session->setFlash(__('Failed to update area', true), null, null, 'error');
			}
		} else {
			$this->data = $this->Area->findById($id);
		}
	}
	
	/**
	 * shows a list of areas
	 */
	function admin_index() {
		$areas = $this->paginate();
		$this->set(compact('areas'));
	}
	
	/**
	 * deletes an area
	 */
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid area', true));
		}
		if ($this->Area->del($id)) {
			$this->Session->setFlash(__('Area deleted', true));
		}
		$this->redirect('/admin/areas');
	}

}

?>