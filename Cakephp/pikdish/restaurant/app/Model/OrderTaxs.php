<?PHP
  App::uses('Model','Model');
  class OrderTaxs extends Model
  {
	   public $belongsTo= array('TaxMasters');
	  
	  
  }
  
