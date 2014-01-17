<?php

class AdminController extends AppController {

/**
 * This controller's model is users
 */
	//public $uses = array('users');
	var $uses = array('User');
	var $layout = 'horton_back';
	var $helpers = array('Form', 'Html');

	function index(){		
		//$this->loadModel('Project');  loading a model from an action
	    $this->redirect(array( "action" => "manageClients"));
	}

	function manageClients(){
		$clients=$this->User->getClients($this->Session->read('login_id'));

		if($this->request->is('ajax')){
			$action=$this->request->data['action'];
        	switch ($action) {
        		case 'add_user':
        			$this->addUser();
        			break;
        		
        		default:
        			$this->set('clients',$clients);
        		    $this->render('/Horton/Admin/manageClients');
        			break;
        	}
    	}
    	$this->set('clients',$clients);
		$this->render('/Horton/Admin/manageClients');


	}
	function addUser(){
		$duser=$this->request->data['user'];
		if(!empty($duser)){
			$salt = substr(str_shuffle(MD5(microtime())), 0, 5);
			$pw = hash('sha256', $salt.$duser['password']); 
			$duser['login_pw']=$pw;
			$duser['mui']=$salt; 
			$user = $this->User->save($duser);
			if(!empty($user)){
				$this->request->data['address']['user_id']=$this->User->id;
				$this->User->Address->save($this->request->data['address']);
				return new CakeResponse(array('body'=> json_encode(array('val'=>'test ok')),'status'=>200));

			}
		}
		return new CakeResponse(array('body'=> json_encode(array('val'=>'wasnotabletosave')),'status'=>200));
	}
}
