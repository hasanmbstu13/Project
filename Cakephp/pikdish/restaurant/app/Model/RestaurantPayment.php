<?PHP
  App::uses('Model','Model');
  class RestaurantPayment extends Model
  {
		public $useTable="restaurant_payment";

	    public $belongsTo = array(
	        'OrdersH' => array(
	            'className' => 'OrdersH',
	            'foreignKey' => 'order_h_id'
	        )
	    );

  }
  
