<?PHP
  App::uses('Model','Model');
  class OrdersH extends Model
  {
	  public $actsAs = array('Containable');
	  public $useTable = "orders_h";
	  public $belongsTo=array('RestaurantTables','User');
	  public $hasMany = array(
	  	"OrdersL" => array(
	  		'order' => array('OrdersL.is_print' => 'DESC')
	  	),
	  	"OrderComments",
	  	"OrderTaxs"
	  );
  }

