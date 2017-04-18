<?php
App::uses('AppModel', 'Model');
/**
 * GeoCodeUnion Model
 *
 * @property GeoCodeUpazila $GeoCodeUpazila
 * @property GeoCodeRmo $GeoCodeRmo
 * @property Book $Book
 * @property GeoCodeMauza $GeoCodeMauza
 */
class GeoCodeUnion extends AppModel {
		var $displayField = 'union_name';
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
		'union_code' => array(
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
		'union_name' => array(
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
		'union_or_ward' => array(
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

/**
 * hasMany associations
 *
 * @var array
 */
	/*
	public $hasMany = array(
			'Book' => array(
				'className' => 'Book',
				'foreignKey' => 'geo_code_union_id',
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
			'GeoCodeMauza' => array(
				'className' => 'GeoCodeMauza',
				'foreignKey' => 'geo_code_union_id',
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
	

	public function getUnionID($union_code = NULL, $upaZilaID, $RMO){
            $unionID = "";
            if($union_code != NUll){
                $unionID = $this->find('all', array(
                   'conditions' => array(
                       'GeoCodeUnion.union_code' => $union_code,
                       'GeoCodeUnion.geo_code_upazila_id' => $upaZilaID/*
                       ,
                                              'GeoCodeUnion.geo_code_rmo_id' => $RMO*/
                       
                   )
                ));
				
				//pr($unionID); exit;
              $unionID = $unionID[0]['GeoCodeUnion']['id'];
            }
		return $unionID;
	}
}
