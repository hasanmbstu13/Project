<?PHP
  App::uses('Model','Model');
  class ComboOffer extends Model
  {
	  public $useTable="combo_offer";
	  public $hasMany=array('ComboItems');
  }
  
