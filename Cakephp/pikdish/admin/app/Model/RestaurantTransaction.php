<?php
App::uses('Model','Model');

class RestaurantTransaction extends Model
{
	public $useTable = "restaurant_transaction";

	public $belongsTo = array(
	    'Restaurant' => array(
	        'className' => 'Restaurant',
	        'foreignKey' => 'restaurant_id'
	    )
	);
		
}