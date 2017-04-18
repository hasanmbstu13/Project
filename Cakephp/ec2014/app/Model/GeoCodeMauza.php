<?php
App::uses('AppModel', 'Model');
/**
 * GeoCodeMauza Model
 *
 * @property GeoCodeUnion $GeoCodeUnion
 * @property GeoCodeRmo $GeoCodeRmo
 */
class GeoCodeMauza extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'mauza_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'geo_code_union_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be numeric',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Select an union',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mauza_code' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be numeric',
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
		'mauza_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Muza name required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'geo_code_rmo_id' => array(
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
				'message' => 'Rmo required',
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
		'GeoCodeUnion' => array(
			'className' => 'GeoCodeUnion',
			'foreignKey' => 'geo_code_union_id',
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

	public function getMauzaID($mauza_code = NULL){
            $mauzaID = "";
            if($mauza_code != NUll){
                $mauzaID = $this->find('all', array(
                   'conditions' => array(
                       'GeoCodeMauza.mauza_code' => $mauza_code
                   )
                ));
              $mauzaID = $mauzaID[0]['GeoCodeMauza']['id'];
            }
		return $mauzaID;
	}
}
