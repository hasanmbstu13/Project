<?php
App::uses('AppModel', 'Model');
/**
 * ProdCodeSubClass Model
 *
 * @property ProdCodeClass $ProdCodeClass
 */
class ProdCodeSubClass extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'sub_class_code';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'prod_code_class_id' => array(
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
			'ProdCodeClass' => array(
			'className' => 'ProdCodeClass',
			'foreignKey' => 'prod_code_class_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
