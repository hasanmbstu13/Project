<?php
App::uses('AppModel', 'Model');

class AuthakeUserGroup extends AppModel {
	//var $displayField = 'id';
	var $useTable = 'authake_groups_users';
	var $useDbConfig = 'authake';
	
	public $belongsTo = array(
		'AuthakeUser' => array(
			'className' => 'AuthakeUser',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
}

?>