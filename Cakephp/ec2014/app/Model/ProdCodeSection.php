<?php
App::uses('AppModel', 'Model');
/**
 * ProdCodeSection Model
 *
 * @property ProdCodeDivn $ProdCodeDivn
 */
class ProdCodeSection extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'section_desc_eng';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'section_code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	/*
	public $hasMany = array(
			'ProdCodeDivn' => array(
				'className' => 'ProdCodeDivn',
				'foreignKey' => 'prod_code_section_id',
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
