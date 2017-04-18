<?php
App::uses('AppModel', 'Model');
/**
 * UnitHeadEconomy Model
 *
 */
class UnitHeadEconomy extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'unit_head_economys';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'economy_desc_bng';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'economy_code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'economy_desc_bng' => array(
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
}