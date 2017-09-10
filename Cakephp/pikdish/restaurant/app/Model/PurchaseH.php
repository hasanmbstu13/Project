<?php
App::uses('Model','Model');
class PurchaseH extends AppModel{
    
    
    public $useTable="purchase_h";
    
    public $hasMany = array('PurchaseL'=>array(
        'dependent' => true,
        'className'=>'PurchaseL',
        'foreignKey' => 'purchase_h_id'));
    
    public $belongsTo = array('Vendor');
    
    public $validate = array(
	);
}