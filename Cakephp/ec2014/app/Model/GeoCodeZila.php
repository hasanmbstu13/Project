<?php
App::uses('AppModel', 'Model');
/**
 * GeoCodeZila Model
 *
 * @property GeoCodeDivn $GeoCodeDivn
 * @property Book $Book
 * @property GeoCodeUpazila $GeoCodeUpazila
 */
class GeoCodeZila extends AppModel {
	var $displayField = 'zila_name';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'geo_code_divn_id' => array(
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
		'zila_code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'zila_name' => array(
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
		'GeoCodeDivn' => array(
			'className' => 'GeoCodeDivn',
			'foreignKey' => 'geo_code_divn_id',
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
				'foreignKey' => 'geo_code_zila_id',
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
			'GeoCodeUpazila' => array(
				'className' => 'GeoCodeUpazila',
				'foreignKey' => 'geo_code_zila_id',
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
	

	public function getZilaID($zila_code = NULL, $divnID){
            $zilaID = "";
            if($zila_code != NUll){
                $zilaID = $this->find('all', array(
                   'conditions' => array(
                       'GeoCodeZila.zila_code' => $zila_code,
                       'GeoCodeZila.geo_code_divn_id' => $divnID
            	    )
                ));
              $zilaID = $zilaID[0]['GeoCodeZila']['id'];
            }
		return $zilaID;
	}

	public function getZilaID_dashboard($zila_code = NULL){
            $zilaID = "";
            if($zila_code != NUll){
                $zilaID = $this->find('all', array(
                   'conditions' => array(
                       'GeoCodeZila.zila_code' => $zila_code
            	    )
                ));
              $zilaID = $zilaID[0]['GeoCodeZila']['id'];
            }
		return $zilaID;
	}

}
