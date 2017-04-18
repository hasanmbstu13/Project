<?php
App::uses('AppModel', 'Model');
/**
 * ProdCodeGroup Model
 *
 * @property ProdCodeDivn $ProdCodeDivn
 * @property ProdCodeClass $ProdCodeClass
 */
class ProdCodeGroup extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'group_code';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'prod_code_divn_id' => array(
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ProdCodeDivn' => array(
			'className' => 'ProdCodeDivn',
			'foreignKey' => 'prod_code_divn_id',
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
			'ProdCodeClass' => array(
				'className' => 'ProdCodeClass',
				'foreignKey' => 'prod_code_group_id',
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
