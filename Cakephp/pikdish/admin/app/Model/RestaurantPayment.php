<?php
App::uses('Model','Model');
App::uses('BlowfishPasswordHasher','Controller/Component/Auth');

class RestaurantPayment extends Model
{
	public $useTable = "restaurant_payment";
	public $validate = array();
	
	
}

