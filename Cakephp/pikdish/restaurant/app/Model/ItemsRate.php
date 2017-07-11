<?PHP
  App::uses('Model','Model');
  class ItemsRate extends Model
  {
	  public $useTable="items_rate";
	  public $belongsTo=array('Item','Portion');
  }
  
