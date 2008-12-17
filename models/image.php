<?php

class Image extends AppModel {
	
	function afterFind($results, $primary = false) {
		if ($primary) {
			if (empty($results[0]['Image'])) {
				return $results;
			}
			foreach ($results as &$r) {
				$r[$this->alias]['url'] = $this->url($r[$this->alias]['id']);
			}
		}
		return $results;
	}

	/**
	 * returns filesystem path to image
	 */
	function path($name = '') {
		if (empty($name)) {
			$name = $this->id;
		}
		return realpath(WWW_ROOT . Configure::read('Config.image_path')) . '/' . $name;
	}
	
	/**
	 * returns url to image
	 */
	function url($name = '') {
		return Configure::read('Config.image_path') . $name;
	}
	
	/**
	 * deletes an image
	 */
	function del($id = null, $cascade = true) {
		if (parent::del($id, $cascade)) {
			unlink($this->path($id));
			return true;
		}
	}
	
}

?>