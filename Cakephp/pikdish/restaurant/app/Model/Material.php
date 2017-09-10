<?php
App::uses('Model','Model');
class Material extends Model{
    
    public $useTable = "material";
    
    public $belongsTo=array('Unit');
    
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
            'material_code' => array(
			'notempty'=> array(
				'rule' => 'notBlank',
				'message' => 'The field cannot be empty.'
			),
			'custom'=>array(
				'rule' => '/^[a-z0-9]/i',
				'message' => 'Only letters and integers')
		),
		'is_stockable' => array(
			'notempty'=> array(
				'rule' => 'notBlank',
				'message' => 'The field cannot be empty.'
			),
			'numeric'=>array(
				'rule' => 'numeric',
				'message' => 'Only integer')
		),
		'unit_id' => array(
			'notempty' => array(
				'rule' 		=> 'notBlank',
				'message' 	=> 'The field cannot be empty.'
			),
                    'numeric'=>array(
				'rule' => 'numeric',
				'message' => 'Only integer')
		),
            'reorder_level' => array(
			'notempty' => array(
				'rule' 		=> 'notBlank',
				'message' 	=> 'The field cannot be empty.'
			),
                    'numeric'=>array(
				'rule' => 'numeric',
				'message' => 'Only integer')
		)
	);
}
  
