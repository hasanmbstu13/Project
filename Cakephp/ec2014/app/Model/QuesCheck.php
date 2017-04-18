<?php
App::uses('AppModel', 'Model');
/**
 * QuesCheck Model
 *
 * @property Questionaire $Questionaire
 */
class QuesCheck extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'questionaire_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'questionaire_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
		'entry_by' => array(
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
		'Questionaire' => array(
			'className' => 'Questionaire',
			'foreignKey' => 'questionaire_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
