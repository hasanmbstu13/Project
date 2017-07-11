<?php
App::uses('Model','Model');
App::uses('BlowfishPasswordHasher','Controller/Component/Auth');

class Restaurant extends Model
{
	
	public $validate = array(
	'user_id'=>array('required'=>array('rule'=>array('notBlank'),'messgae'=>'Owner name is required')),
	'restaurant_name'=>array('required'=>array('rule'=>array('notBlank'),'messgae'=>'Name is required')),
	'mobile_no'=>array('required'=>array('rule'=>array('notBlank'),'messgae'=>'Mobile no is required'),
		                   'unique'=>array('rule'=>array('isUnique'),'message'=>'An account with the selected mobile no already exists. Please specify a different mobile no','on'=>'create')),
	'email'=>array('required'=>array('rule'=>array('notBlank'),'message'=>'Email Id is required'),
	                  'unique'=>array('rule'=>array('isUnique'),'message'=>'An account with the selected username already exists. Please specify a different username','on'=>'create'))
	
	
	
	);
	
	public $belongsTo=array('City','State','Country','User');
	
	
	
	
}