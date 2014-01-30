<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppModel', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class User extends  AppModel{
	public $hasOne = array('Address'=>array('className' =>'Address',
											'dependant'=> true));
	public $belongsTo = array('Role'=>array('className'=>'Role'));

	function getClients($consultant_id){
		$sql = "SELECT * from users where consultant_id = '{$consultant_id}'";
		return $this->find('all',array('fields'=>array('id','last_name','first_name','phone_primary','email_address'), 'conditions'=>array('consultant_id'=>$consultant_id)));
	}
	function getClientPrograms($admin_id){
		
	}
	function calculateProgram($user_id, $data){
		$doutput = array();
		$doutput['start_body_fat_perc'] = $data['start_body_fat_perc']/100;
		$doutput['start_weight'] = $data['start_weight'];
		$doutput['target_body_fat_perc'] = $data['target_body_fat_perc']/100;
		$doutput['target_body_lean_mass'] = $data['target_body_lean_mass'];

		$doutput['start_body_fat_mass'] = $doutput['start_body_fat_perc'] * $doutput['start_weight'];
		$doutput['start_body_lean_mass'] = $doutput['start_weight'] - $doutput['start_body_fat_mass'];

		$doutput['body_fat_perc_deficit'] = $doutput['start_body_fat_perc'] - $doutput['target_body_fat_perc']; //how much % body fat you want to lose
		$doutput['end_weight'] = $doutput['target_body_lean_mass']/(1-$doutput['target_body_fat_perc']);
		$doutput['end_body_fat_mass'] = $doutput['end_weight']-$doutput['target_body_lean_mass'];

		return $doutput;
	}
}
