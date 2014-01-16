<?php

class HomeController extends AppController {
	var $layout = 'horton';
	var $helpers = array('Form', 'Html');

	function index(){	
		var_dump($this->Session->read('msg'));
		if($this->Session->read('msg')){
			$this->set('message',$this->Session->read('msg'));
			$this->Session->delete('msg');
		}
		$this->render('/Horton/login');

	}
}
