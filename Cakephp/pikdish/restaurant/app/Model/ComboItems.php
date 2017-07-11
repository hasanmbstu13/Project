<?PHP
  App::uses('Model','Model');
  class ComboItems extends Model
  {
	  public $useTable="combo_items";
	  //public $hasMany = array('ItemsRate');
	  public $belongsTo=array('Item','Portion');
  }
  
