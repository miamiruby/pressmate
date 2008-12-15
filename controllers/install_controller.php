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
			$this->Config = ClassRegistry::init('Config');
			$this->Content = ClassRegistry::init('Content');
			$this->User = ClassRegistry::init('User');
			
			$this->Config->data['Config']['id'] = 1;
			if ($this->Config->save($this->data)) {
				
				// mark as installed
				$this->Session->setFlash(__('Successfully configured system', true));
				$file = new File(APP . 'config/INSTALLED');
				$file->write(time());
				
				// create helpful first post
				$data['Content'] = array(
					'id' => 1,
					'title' => 'Welcome To PressMate CMS',
					'body' => 'Feel free to sign in with your new account',
					'status_id' => 1
				);
				$this->Content->save($data);
				
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
						
			// build database configuration
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
		
				$dir = APP . 'config/';
	
				// check to see if config dir is writable
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
				
				// import new schema
				$file = $dir . 'sql/pressmate.sql';
				$cmd  = "mysql -u $username -p$password $database < $file";
				`$cmd`;
				
				// import schema data
				$file = $dir . 'sql/data.sql';
				$cmd  = "mysql -u $username -p$password $database < $file";
				`$cmd`;
								
				$this->redirect('/install/configure');
		
			} catch (Exception $e) {
		
			}
		
		}
	
	}
	
}

?>