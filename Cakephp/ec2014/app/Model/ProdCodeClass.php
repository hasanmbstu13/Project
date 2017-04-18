<?php
App::uses('AppModel', 'Model');
/**
 * ProdCodeClass Model
 *
 * @property ProdCodeGroup $ProdCodeGroup
 * @property ProdCodeSubClass $ProdCodeSubClass
 */
class ProdCodeClass extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'class_desc_eng';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'prod_code_group_id' => array(
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
		'ProdCodeGroup' => array(
			'className' => 'ProdCodeGroup',
			'foreignKey' => 'prod_code_group_id',
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
			'ProdCodeSubClass' => array(
				'className' => 'ProdCodeSubClass',
				'foreignKey' => 'prod_code_class_id',
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
