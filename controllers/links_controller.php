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
			} else {
				$this->Session->setFlash(__('Failed to save link', true), null, null, 'error');
			}
		}
	}
	
	/**
	 * edits a link
	 */
	function admin_edit() {
		
	}
	
}

?>