<?php 
/* SVN FILE: $Id$ */
/* Pressmate schema generated on: 2008-12-22 18:12:42 : 1229987442*/
class PressmateSchema extends CakeSchema {
	var $name = 'Pressmate';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $acos = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
			'model' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'foreign_key' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
			'alias' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
			'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
			'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'created' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'modified' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $areas = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
			'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $aros = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
			'model' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'foreign_key' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
			'alias' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
			'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
			'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $aros_acos = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'aro_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
			'aco_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
			'_create' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
			'_read' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
			'_update' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
			'_delete' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'ARO_ACO_KEY' => array('column' => array('aro_id', 'aco_id'), 'unique' => 1))
		);
	var $categories = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
			'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'area_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $categories_contents = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'content_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'category_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'area_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $comments = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'body' => array('type' => 'text', 'null' => true, 'default' => NULL),
			'email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
			'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
			'content_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'url' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $content_statuses = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
			'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $content_types = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
			'area_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'created' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'modified' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $contents = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
			'body' => array('type' => 'text', 'null' => true, 'default' => NULL),
			'content_status_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 1),
			'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'updated' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'slug' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
			'commentable' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'redirect_code' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3),
			'redirect_url' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
			'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'area_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'content_type_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $contents_tags = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'tag_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'content_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $images = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $redirects = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'from' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
			'to' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $tags = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $urls = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'area_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'url' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
			'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $users = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'username' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'key' => 'unique'),
			'password' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
			'first_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
			'last_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
			'email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200, 'key' => 'unique'),
			'avatar_url' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
			'area_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'uk_username' => array('column' => 'username', 'unique' => 1), 'uk_email' => array('column' => 'email', 'unique' => 1))
		);
}
?>