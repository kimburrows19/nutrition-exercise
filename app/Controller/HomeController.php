<?php

class HomeController extends AppController {
	var $layout = 'horton';
	var $helpers = array('Form', 'Html');

	function index(){	
		if($this->Session->read('msg')){
			$this->set('message',$this->Session->read('msg'));
			$this->Session->delete('msg');
		}
		$this->render('/Horton/login');

	}
}
