<?php
App::uses('Model','Model');
class PurchaseL extends AppModel{
    
    public $useTable="purchase_l";
    
    public $belongsTo = array('PurchaseH'=>array(
        'className'=>'PurchaseH',
        'foreignKey' => 'purchase_h_id'));
}