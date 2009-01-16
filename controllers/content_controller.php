<?php
class ContentController extends AppController {

	var $name = 'Content';
	var $helpers = array('Html', 'Form', 'Javascript', 'Rss', 'Time', 'Text');
	var $components = array('RequestHandler');
	var $uses = array('Content');
	
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
			$contents = $this->Content->findAllBySlug($slug);
		} else {
			$this->Content->recursive = 1;
			$contents = $this->paginate(array('Content.content_status_id' => 1));
		}
		$categories = $this->Content->Category->find('all');
		$comments_recent = $this->Content->Comment->find('all');
		$this->set(compact('contents', 'categories', 'links', 'comments_recent'));
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
		$areas = $this->Content->Area->find('list');
		$content_types = $this->Content->ContentType->find('list');
		$categories = $this->Content->Category->find('list');
		$tags = $this->Content->Tag->find('list');
		$content_statuses = $this->Content->ContentStatus->find('list');
		$commentables = array(1 => 'Yes', 0 => 'No');
		$this->set(compact('areas', 'content_types', 'categories', 'content_statuses', 'commentables', 'tags'));
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
		$areas = $this->Content->Area->find('list');
		$content_types = $this->Content->ContentType->find('list');
		$categories = $this->Content->Category->find('list');
		$tags = $this->Content->Tag->find('list');
		$statuses = $this->Content->ContentStatus->find('list');
		$commentables = array(1 => 'Yes', 0 => 'No');
		$this->set(compact('areas', 'content_types', 'categories', 'statuses', 'commentables', 'tags'));
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