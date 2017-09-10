<?PHP
  App::uses('Model','Model');
  class OrderExtras extends Model
  {
	   
	  // public $useTable = "OrderExtras";
	  
	   public $belongsTo=array('Extras');
	  
  }
  
