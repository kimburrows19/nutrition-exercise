<?php

class LoginHubController extends AppController {
	/**
 * This controller's model is users
 */
	public $uses = array('User');

	function login(){
		$entered_email = $this->request->data['email_address'];
		$entered_pw =  $this->request->data['login_pw'];
		
		$user_login_info = $this->User->find('first', array(
        'conditions' => array('User.email_address' => $entered_email)));

        if(!empty($user_login_info)){
	        $pw = hash('sha256', $user_login_info['User']['mui'].$entered_pw);

	        if($pw==$user_login_info['User']['login_pw']){
	        	$id=$user_login_info['User']['id'];
	        	switch ($user_login_info['Role']['role_name']) {
	        		case 'client':
	        			$this->redirect(array('controller'=>'MyFitness','action'=>'index', 'user_id'=>$id));
	        			break;
	        		case 'consultant';
	        		case 'admin';
	        		    $this->redirect(array('controller'=>'Admin','action'=>'index', 'user_id'=>$id));
	        			break;
	        		default:
	        			$this->redirect(array('controller'=>'Admin','action'=>'index', 'user_id'=>$id));
	        			break;
	        	}
	        }
    	}
        else{
        	$this->Session->write('msg','Your login credentials are incorrect, please try again');
        	$this->redirect(array('controller'=>'Home',  'action' => 'index'));
        }
	}
}
