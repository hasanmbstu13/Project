<?php

App::uses('Model', 'Model');

class Restaurant extends Model {

    public $validate = array(
        'user_id' => array('required' => array('rule' => array('notBlank'), 'messgae' => 'Owner name is required')),
        'restaurant_name' => array('required' => array('rule' => array('notBlank'), 'messgae' => 'Name is required')),
        'mobile_no' => array('required' => array('rule' => array('notBlank'), 'messgae' => 'Mobile no is required'),
            'unique' => array('rule' => array('isUnique'), 'message' => 'An account with the selected mobile no already exists. Please specify a different mobile no', 'on' => 'create')),
        'email' => array('required' => array('rule' => array('notBlank'), 'message' => 'Email Id is required'),
            'unique' => array('rule' => array('isUnique'), 'message' => 'An account with the selected username already exists. Please specify a different username', 'on' => 'create'))
    );
    public $belongsTo = array('City', 'State', 'Country', 'User');
    var $hasAndBelongsToMany = array(
        'TaxMaster' => array(
            'className' => 'TaxMaster',
            'joinTable' => 'restro_taxes',
            'foreignKey' => 'restaurant_id',
            'associationForeignKey' => 'tax_id',
            'with' => 'RestroTax',
        ),
    );

}
