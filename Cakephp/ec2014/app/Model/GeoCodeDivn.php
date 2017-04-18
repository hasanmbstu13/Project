<?php
App::uses('AppModel', 'Model');
/**
 * GeoCodeDivn Model
 *
 * @property GeoCodeZila $GeoCodeZila
 */
class GeoCodeDivn extends AppModel {
	var $displayField = 'divn_name';
/**
 * Validation rules
 *
 *
 * @var array
 */
	public $validate = array(
		'divn_code' => array(
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
		'divn_name' => array(
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
			'GeoCodeZila' => array(
				'className' => 'GeoCodeZila',
				'foreignKey' => 'geo_code_divn_id',
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
	


	public function getDivnID($divn_code = NULL){
            $divnID = "";
            if($divn_code != NUll){
                $divnID = $this->find('all', array(
                   'conditions' => array(
                       'GeoCodeDivn.divn_code' => $divn_code
                   )
                ));
              $divnID = $divnID[0]['GeoCodeDivn']['id'];
            }
		return $divnID;
	}

}
