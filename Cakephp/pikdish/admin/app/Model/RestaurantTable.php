
<?php
App::uses('Model','Model');
App::uses('BlowfishPasswordHasher','Controller/Component/Auth');

class RestaurantTable extends Model
{
	public $useTable = "restaurant_tables";
	public $validate = array(
		'restaurant_id'=>array
		                   (
		                     'required'=>array('rule'=>array('notBlank'),'messgae'=>'Restaurant id is required'),
		                      'unique'=>array('rule'=>array('isUnique'),'message'=>'','on'=>'create')
						    ));
	
	public $belongsTo=array('Restaurant');
	
	
}