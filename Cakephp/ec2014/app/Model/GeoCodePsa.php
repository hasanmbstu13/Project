<?php
App::uses('AppModel', 'Model');
/**
 * GeoCodePsa Model
 *
 * @property GeoCodeUpazila $GeoCodeUpazila
 * @property GeoCodeRmo $GeoCodeRmo
 */
class GeoCodePsa extends AppModel {
	var $displayField = 'psa_name';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'geo_code_upazila_id' => array(
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
		'psa_code' => array(
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
		'psa_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
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
		)
	);


	public function getPsaID($psa_code = NULL, $upaZilaID){
            $psaId = "";
            if($psa_code != NUll){
            	
                $psaId =  $this->find('all',
				array(
					'fields' => array('GeoCodePsa.id', 'GeoCodePsa.psa_name', 'GeoCodePsa.psa_code', 'GeoCodePsa.psa_code'),
					
					'conditions' => array('GeoCodePsa.psa_code' => $psa_code,
					'GeoCodeUpazila.id' => $upaZilaID
				),
				));
              $psaId = $psaId[0]['GeoCodePsa']['id'];
            }
		return $psaId;
	}
}
