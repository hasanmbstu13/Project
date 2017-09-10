<?php

App::uses('Model', 'Model');

class RestroTax extends Model {

    var $name = 'RestroTax';
    public $belongsTo = array(
    	'Restaurant',
    	'TaxMaster' => array(
    		'foreignKey' => 'tax_id'
    	)
    );

}
