<?php
App::uses('AppModel', 'Model');

class BookServer extends AppModel {
	//var $displayField = 'id';
	var $useTable = 'VIEW_BOOKS';
	var $useDbConfig = 'bbsserver';
}


?>