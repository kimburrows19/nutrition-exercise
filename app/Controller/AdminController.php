<?php

class AdminController extends AppController {

/**
 * This controller's model is users
 */
	//public $uses = array('users');
	var $uses = array('User');
	var $layout = 'horton_back';
	var $helpers = array('Form', 'Html');
	var $components = array('RequestHandler');

	function index(){		
		//$this->loadModel('Project');  loading a model from an action
	    $this->redirect(array( "action" => "manageClients"));
	}

	function manageClients(){
		if($this->request->is('ajax')){
			$action=$this->request->data['action'];
        	switch ($action) {
        		case 'add_user':
        			$this->addUser();
        			break;
        		
        		default:
        			break;
        	}
    	}
    	$clients=$this->getClients();
		$consultant=$this->getAdmin();
    	$this->set('consultant',$consultant);
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
				$this->set('client_list',$this->getClients());
				$this->set('message',"User Successfully Added");
				$this->set('_serialize', array('client_list','message'));
				$this->response->statusCode(200);

			}
		}
		return new CakeResponse(array('type'=>'json','body'=> json_encode(array('val'=>'wasnotabletosave')),'status'=>200));
	}
	function getAdmin(){
		$lid=$this->Session->read('login_id');
		return $this->User->find('first',array('conditions'=>array('User.id'=>$lid)));
	}
	function getClients(){
		$lid=$this->Session->read('login_id');
		return $this->User->getClients($lid);
	}
}
