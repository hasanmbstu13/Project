<?php
App::uses('AppModel', 'Model');

class Password extends AppModel {

	var $useDbConfig = 'authake';
	public $useTable = 'authake_users';

}
