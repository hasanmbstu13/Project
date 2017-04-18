<?php
App::uses('AppModel', 'Model');
/**
 * Questionaire Model
 *
 * @property Book $Book
 */
class Questionaire extends AppModel {


/**
 * Validation rules
 *
 * @var array
 */
 
 public $validate = array(
		'book_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Wrong Book ID'
			),
		 ),
		 'q1_geo_code_mauza_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Wrong Mauza ID'
			),
		 ),
		 'q1_geo_code_mauza_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Wrong Mauza Name'
			),
		 ),
		 'q1_unit_serial_no' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Wrong Unit Serial Number'
			),
		 ),
		);
		
		
/*
	public $validate = array(
		'book_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'q2_unit_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'q2_village_maholla' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'q4_unit_type' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'q4_unit_org_type' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'q5_unit_head_economy_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'q6_economy_description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'q6_ind_code_class_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'q9_legal_entity_type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
*/

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Book' => array(
			'className' => 'Book',
			'foreignKey' => 'book_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'QuesSixCheck' => array(
			'className' => 'QuesSixCheck',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'QuesCheck' => array(
			'className' => 'QuesCheck',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'UnitHeadEconomy' => array(
            'className' => 'UnitHeadEconomy',
            'foreignKey' => 'q5_unit_head_economy_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        
        'GeoCodeMauza' => array(
            'className' => 'GeoCodeMauza',
            'foreignKey' => 'q1_geo_code_mauza_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
	);
	
}
