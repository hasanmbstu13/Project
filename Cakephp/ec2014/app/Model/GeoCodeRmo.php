<?php
App::uses('AppModel', 'Model');
/**
 * GeoCodeRmo Model
 *
 * @property GeoCodeMauza $GeoCodeMauza
 * @property GeoCodePsa $GeoCodePsa
 * @property GeoCodeUnion $GeoCodeUnion
 */
class GeoCodeRmo extends AppModel {
 		var $displayField = 'rmo_type_eng';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'rmo_code' => array(
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
 * hasMany associations
 *
 * @var array
 */
	/*
	public $hasMany = array(
			'GeoCodeMauza' => array(
				'className' => 'GeoCodeMauza',
				'foreignKey' => 'geo_code_rmo_id',
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
			'GeoCodePsa' => array(
				'className' => 'GeoCodePsa',
				'foreignKey' => 'geo_code_rmo_id',
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
			'GeoCodeUnion' => array(
				'className' => 'GeoCodeUnion',
				'foreignKey' => 'geo_code_rmo_id',
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
		);
	*/
	

	public function getRmoID($rmo_code = NULL){
            $rmoID = "";
            if($rmo_code != NUll){
                $rmoID = $this->find('all', array(
                   'conditions' => array(
                       'GeoCodeRmo.rmo_code' => $rmo_code
                   )
                ));
              $rmoID = $rmoID[0]['GeoCodeRmo']['id'];
            }
		return $rmoID;
	}

}
