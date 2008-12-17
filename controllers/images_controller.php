<?php

class ImagesController extends AppController {

	/**
	 * adds an image
	 */
	function admin_add() {
		if (!empty($this->data)) {
			$file = $this->data['Image']['image'];
			// @TODO don't forget to use Rasmus' check for massive overflow
			// @TODO also add checks for other upload errors
			if ($file['error'] == UPLOAD_ERR_OK) {
				if ($this->Image->save(array('name' => $file['name']))) {
					if (move_uploaded_file($file['tmp_name'], $this->Image->path())) {
						$this->Session->setFlash(__('Successfully added image', true));
						$this->redirect('/admin/images');
					} else {
						$this->log('Failed to move uploaded image');
						$this->Session->setFlash(__('Failed to add image', true), null, null, 'error');
					}
				} else {
					$this->log('Failed to save database record for image');
					$this->Session->setFlash(__('Failed to add image', true), null, null, 'error');
				}
			} else {
				$this->log('Error uploading file');
				$this->Session->setFlash(__('Failed to add image', true), null, null, 'error');
			}
		}
	}
	
	/**
	 * edits an image
	 */
	function admin_edit($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('That image does not exist', true), null, null, 'error');
			$this->redirect('/admin/images');
		}
		if (!empty($this->data)) {
			if ($this->Image->save($this->data)) {
				$this->Session->setFlash(__('Successfully edited image', true));
				$this->redirect('/admin/images');
			} else {
				$this->Session->setFlash(__('Failed to edit image', true), null, null, 'error');
			}
		}
		$this->data = $this->Image->findById($id);
	}
	
	/**
	 * review images
	 */
	function admin_index() {
		$images = $this->paginate();
		$this->set('images', $images);
	}
	
	/**
	 * deletes an image
	 */
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('That image does not exist', true), null, null, 'error');
			$this->redirect('/admin/images');
		}
		if ($this->Image->delete($id)) {
			$this->Session->setFlash(__('Successfully deleted image', true));
		} else {
			$this->Session->setFlash(__('Failed to delete image', true), null, null, 'error');
		}
		$this->redirect('/admin/images');
	}
	
}

?>