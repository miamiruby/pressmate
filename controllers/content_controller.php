<?php
class ContentController extends AppController {

	var $name = 'Content';
	var $helpers = array('Html', 'Form', 'Javascript', 'LiveValidation.JqueryForm', 'Rss');
	var $components = array('LiveValidation.JqueryForm', 'RequestHandler');
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
		
	/**
	 * Dashboard stub
	 */
	function admin_admin() {}

	/**
	 * view all content or content via slug
	 */
	function index($slug = '') {
		if ($slug) {
			$this->set('contents', $this->Content->findAllBySlug($slug));
		} else {
			$this->Content->recursive = 1;
			$contents = $this->paginate('Content.status_id=1');
			$this->set('contents', $contents);
		}
	}

	/**
	 * view content by id
	 */
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Content', true));
		}
		$this->set('content', $this->Content->read(null, $id));
	}

	function admin_index() {
		$this->Content->recursive = 0;
		$this->set('contents', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Content', true));
		}
		$this->set('content', $this->Content->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$user = $this->Auth->user();
			$this->data['Content']['user_id'] = $user['User']['id'];
			$this->Content->create();
			if ($this->Content->save($this->data)) {
				$this->Session->setFlash(__('Content saved', true));
				$this->redirect('/admin/content/index');
			} else {
			}
		}
		$categories = $this->Content->Category->find('list');
		$statuses = $this->Content->Status->find('list');
		$commentables = array(1 => 'Yes', 0 => 'No');
		$this->set(compact('categories', 'statuses', 'commentables'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Content'));
		}
		if (!empty($this->data)) {
			$user = $this->Auth->user();
			$this->data['User']['user_id'] = $user['User']['id'];
			if ($this->Content->save($this->data)) {
				$this->Session->setFlash('Content has been saved');
				$this->redirect('/admin/content');
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Content->read(null, $id);
		}
		$categories = $this->Content->Category->find('list');
		$statuses = $this->Content->Status->find('list');
		$commentables = array(1 => 'Yes', 0 => 'No');
		$this->set(compact('categories', 'statuses', 'commentables'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Content', true));
		}
		if ($this->Content->del($id)) {
			$this->Session->setFlash(__('Content deleted', true));
		}
		$this->redirect('/admin/content/index');
	}

}
?>