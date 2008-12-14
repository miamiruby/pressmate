<?php

class UsersController extends AppController {
	
	var $helpers = array('Paginator');
	
	/**
	 * stub for AuthComponent
	 */
	function login() {}
	
	/**
	 * Logs out user
	 */
	function logout() {
		$this->redirect($this->Auth->logout());
	}
	
	/**
	 * view list of users
	 */
	function admin_index() {
		$this->set('users', $this->paginate());
	}
	
	/**
	 * Creates a user account
	 */
	function admin_create() {
		if (!empty($this->data)) {
			if ($this->User->createAccount($this->data)) {
				$this->Session->setFlash(__('Successfully created account', true));
				$this->redirect('/admin');
			} else {
				$this->Session->setFlash(__('Failed to create account', true));
			}
		}
	}
	
	/**
	 * edits a user
	 */
	function admin_edit($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('That user does not exist', true), null, null, 'error');
			$this->redirect($this->referer());
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('Successfully updated user', true));
				$this->redirect('/admin/users/');
			} else {
				$this->Session->setFlash(__('Failed to update user', true), null, null, 'error');
			}
		} else {
			$this->data = $this->User->read(null, $id);
		}
	}
	
	/**
	 * deletes a user
	 */
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('That user does not exist', true), null, null, 'error');
			$this->redirect($this->referer());
		}
		if ($this->User->del($id)) {
			$this->Session->setFlash(__('Successfully deleted user', true));
		} else {
			$this->Session->setFlash(__('Failed to delete user', true), null, null, 'error');
		}
		$this->redirect('/admin/users');
	}
	
}

?>