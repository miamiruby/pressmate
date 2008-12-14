<?php 
/* SVN FILE: $Id$ */
/* ContentsController Test cases generated on: 2008-12-13 15:12:53 : 1229201873*/
App::import('Controller', 'Contents');

class TestContents extends ContentsController {
	var $autoRender = false;
}

class ContentsControllerTest extends CakeTestCase {
	var $Contents = null;

	function setUp() {
		$this->Contents = new TestContents();
		$this->Contents->constructClasses();
	}

	function testContentsControllerInstance() {
		$this->assertTrue(is_a($this->Contents, 'ContentsController'));
	}

	function tearDown() {
		unset($this->Contents);
	}
}
?>