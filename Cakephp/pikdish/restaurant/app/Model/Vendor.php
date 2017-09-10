<?php
App::uses('Model','Model');
class Vendor extends Model{
    
    public $useTable="vendors";
    
    public $belongsTo=array('Country','State','City');
    
    public $validate = array(
            'name' => array(
			'notempty'=> array(
				'rule' => 'notBlank',
				'message' => 'The field cannot be empty.'
			),
			'custom'=>array(
				'rule' => '/^[a-z0-9]/i',
				'message' => 'Only letters and integers')
		),
            'address' => array(
			'notempty'=> array(
				'rule' => 'notBlank',
				'message' => 'The field cannot be empty.'
			)
		),
		'country_id' => array(
			'notempty'=> array(
				'rule' => 'notBlank',
				'message' => 'The field cannot be empty.'
			),
			'numeric'=>array(
				'rule' => 'numeric',
				'message' => 'Only integer')
		),
		'state_id' => array(
			'notempty' => array(
				'rule' 		=> 'notBlank',
				'message' 	=> 'The field cannot be empty.'
			),
                    'numeric'=>array(
				'rule' => 'numeric',
				'message' => 'Only integer')
		),
            'mobile_no' => array(
			'notempty' => array(
				'rule' 		=> 'notBlank',
				'message' 	=> 'The field cannot be empty.'
			)
		),
            'email' => array(
                            'email' => array(
                    'rule' => array('email'),
                    'allowEmpty'=> false,
                    'message' => 'Not a valid e-mail address.')
		)
	);
}
  
