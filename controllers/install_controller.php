<?php

class InstallController extends AppController {
	
	var $uses = null;
				
	function beforeFilter() {
		$this->Auth->allow('*');
		if ($this->Session->read('Auth')) {
			$this->Session->write('Auth', null);
		}
	}
	
	function beforeRender() {}
		
	/**
	 * writes initial configuration data to database
	 */
	function configure() {
		
		if (!file_exists(APP . 'config/database.php')) {
			$this->redirect('/install/');
		}
		
		if (!empty($this->data)) {			
			
			$this->Config  = ClassRegistry::init('Config');
			$this->Content = ClassRegistry::init('Content');
			$this->User    = ClassRegistry::init('User');
			
			if ($this->Config->save($this->data)) {		
				// mark as installed
				$this->Session->setFlash(__('Successfully configured system', true));
				$file = new File(APP . 'config/INSTALLED');
				$file->write(time());
				
				// create initital user
				$this->User->save($this->data['User'], false);
				$this->redirect('/');
			} else {
				$this->Session->setFlash(__('Failed to configure system', true));
			}
		}
	}
		
	/**
	 * creates database.php files
	 */
	function index() {
		if (file_exists(APP . 'config/database.php')) {
			$this->redirect('/install/configure');
		}
		if (!empty($this->data)) {
			extract($this->data['Install']);
			$config = <<<END
class DATABASE_CONFIG {
	var \$default = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => '$host',
		'login' => '$username',
		'password' => '$password',
		'database' => '$database',
		'prefix' => '',
	);
}
END;
			try {
				$dir = APP . 'webroot/upload/';
				if (!is_writable($dir)) {
					$this->Session->setFlash(__('Please make sure /webroot/upload is writable by the webserver', true), null, null, 'error');
					throw new Exception();
				}
				$dir = APP . 'config/';
				if (!is_writable($dir)) {
					$this->Session->setFlash(__('Please make sure /config is writable by the webserver', true), null, null, 'error');
					throw new Exception();
				} else {
					$file = new File($dir . 'database.php');
					if (!$file->write('<?php '.$config.' ?>')) {
						$this->Session->setFlash(__('Unable to write database.php file to /config/database.php', true), null, null, 'error');
					} else {
						$this->Session->setFlash(__('Successfully wrote database configuration', true));
					}
				}
				
				App::import('ConnectionManager');
				$db = ConnectionManager::getDataSource('default');
				
				if (!$db->execute('DROP DATABASE IF EXISTS '.$database)) {
					$this->Session->setFlash(__('Failed to drop old database', true), null, null, 'error');
					throw new Exception();
				}
				
				if (!$db->execute('CREATE DATABASE '.$database)) {
					$this->Session->setFlash(__('Failed to create database', true), null, null, 'error');
					throw new Exception();
				}
				
				// reconnect database, drop/create killed the handle
				$db->connect();
				
				// import schema
				App::import('Schema');
				$schema = new CakeSchema;
				$schema = $schema->load();
				foreach ($schema->tables as $d => $t) {
					$db->execute($db->createSchema($schema, $d));
				}
				
				// import schema data
				include(APP . 'config/sql/data.php');
				foreach ($data as $name => $records) {
					$model = ClassRegistry::init($name);
					foreach ($records as $r) {
						$model->save($r);
					}
				}
								
				$this->redirect('/install/configure');
		
			} catch (Exception $e) {}	
		}
			
	}
	
}

?>