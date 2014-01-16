<?php

class MyFitnessController extends AppController {

	var $uses = array('User');
	var $layout = 'horton';
	var $helpers = array('Form', 'Html');

	function index(){		
		//$this->loadModel('Project');  loading a model from an action
	    //$this->redirect(array( "action" => "manageClients"));
	    $this->render('/Horton/MyFitness/dashboard/');
	}
}
