<?PHP
  App::uses('Model','Model');
  class OrdersL extends Model
  {
	   public $actsAs = array('Containable');
	   public $useTable = "orders_l";
	   public $hasMany = array('OrderExtras');
	   public $belongsTo=array('ComboOffer','Portion','Item');

  }

