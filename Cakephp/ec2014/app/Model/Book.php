<?php
App::uses('AppModel', 'Model');
/**
 * Book Model
 *
 * @property GeoCodeDivn $GeoCodeDivn
 * @property GeoCodeZila $GeoCodeZila
 * @property GeoCodeUpazila $GeoCodeUpazila
 * @property GeoCodeRmo $GeoCodeRmo
 * @property GeoCodePsa $GeoCodePsa
 * @property GeoCodeUnion $GeoCodeUnion
 * @property BookOrganization $BookOrganization
 * @property Questionaire $Questionaire
 */
class Book extends AppModel {
	var $displayField = 'id';
/**
 * Validation rules
 *
 * @var array
 */
	
/*
	public $validate = array(
			
			'geo_code_divn_id' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Division Code is Required',
					'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
			'geo_code_zila_id' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Zila Code is Required',
					'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
			'geo_code_upazila_id' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Upazila Code is Required',
					'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
			'geo_code_rmo_id' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'RMO Code is Required',
					'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
			'geo_code_union_id' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Union Code is Required',
					'allowEmpty' => false,
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
		'GeoCodeDivn' => array(
			'className' => 'GeoCodeDivn',
			'foreignKey' => 'geo_code_divn_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'GeoCodeZila' => array(
			'className' => 'GeoCodeZila',
			'foreignKey' => 'geo_code_zila_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'GeoCodeUpazila' => array(
			'className' => 'GeoCodeUpazila',
			'foreignKey' => 'geo_code_upazila_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'GeoCodeRmo' => array(
			'className' => 'GeoCodeRmo',
			'foreignKey' => 'geo_code_rmo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'GeoCodePsa' => array(
			'className' => 'GeoCodePsa',
			'foreignKey' => 'geo_code_psa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'GeoCodeUnion' => array(
			'className' => 'GeoCodeUnion',
			'foreignKey' => 'geo_code_union_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	/*
	public $hasMany = array(
			'BookOrganization' => array(
				'className' => 'BookOrganization',
				'foreignKey' => 'book_id',
				'dependent' => false,
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'limit' => '',
				'offset' => '',
				'exclusive' => '',
				'finderQuery' => '',
				'counterQuery' => ''
			),
			'Questionaire' => array(
				'className' => 'Questionaire',
				'foreignKey' => 'book_id',
				'dependent' => false,
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'limit' => '',
				'offset' => '',
				'exclusive' => '',
				'finderQuery' => '',
				'counterQuery' => ''
			)
		);*/
	

}
