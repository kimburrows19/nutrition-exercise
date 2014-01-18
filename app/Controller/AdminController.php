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
		$login_id=$this->Session->read('login_id');
		$clients=$this->User->getClients($login_id);
		$consultant=$this->User->find('first',array('conditions'=>array('User.id'=>$login_id)));
		$this->set('consultant',$consultant);
    	$this->set('clients',$clients);

		if($this->request->is('ajax')){
			$action=$this->request->data['action'];
        	switch ($action) {
        		case 'add_user':
        			$this->addUser($clients);
        			break;
        		
        		default:
        		    $this->render('/Horton/Admin/manageClients');
        			break;
        	}
    	}
		$this->render('/Horton/Admin/manageClients');


	}
	function addUser($clients){
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

				//NEED TO GET CLIENTS AGAIN AFTER ADDING THE USER CANT USE CLIENTS PASSED FROM MANAGE CLIENTS	

				$this->set('clients',$clients);
				$this->set('message',"User Successfully Added");
				$this->set('_serialize', array('clients','message'));
				$this->response->statusCode(200);

			}
		}
		return new CakeResponse(array('type'=>'json','body'=> json_encode(array('val'=>'wasnotabletosave')),'status'=>200));
	}
}
