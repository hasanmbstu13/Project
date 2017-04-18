<?php
App::uses('AppModel', 'Model');
/**
 * GeoCodeVillage Model
 *
 * @property Muza $Muza
 * @property GeoCodeRmo $GeoCodeRmo
 */
class GeoCodeVillage extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'village_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'muza_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'village_code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'village_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operation
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
		'GeoCodeMauza' => array(
			'className' => 'GeoCodeMauza',
			'foreignKey' => 'muza_id',
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
		)
	);
}
