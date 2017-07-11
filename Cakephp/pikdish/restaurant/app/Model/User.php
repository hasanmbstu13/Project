<?php
App::uses('Model','Model');
App::uses('BlowfishPasswordHasher','Controller/Component/Auth');

class User extends Model
{
	
	public $validate = array(
	'name'=>array('required'=>array('rule'=>array('notBlank'),'messgae'=>'Name is required')),
		'mobile_no'=>array('required'=>array('rule'=>array('notBlank'),'messgae'=>'Mobile no is required'),
		                   'unique'=>array('rule'=>array('isUnique'),'message'=>'An account with the selected mobile no already exists. Please specify a different mobile no','on'=>'create')),
	'email'=>array('required'=>array('rule'=>array('notBlank'),'message'=>'Email Id is required'),
	                  'unique'=>array('rule'=>array('isUnique'),'message'=>'An account with the selected username already exists. Please specify a different username','on'=>'create')),
	'user_type'=>array('required'=>array('rule'=>array('notBlank'),'message'=>'User Type is required'))				  
	
	
	);
	
	public $belongsTo=array('City','State','Country');
	
	public function beforeSave($options = array()) 
	{
	  if(isset($this->data[$this->alias]['password']))
	  {
		  $passwordHash = new BlowfishPasswordHasher();
		  $this->data[$this->alias]['password'] = $passwordHash->hash( $this->data[$this->alias]['password']);
	  }
	  return true;
	}
	
	
	
}