<?php
App::uses('AppModel', 'Model');
/**
 * GeoCodeUpazila Model
 *
 * @property GeoCodeZila $GeoCodeZila
 */
class GeoCodeUpazila extends AppModel {
	var $displayField = 'upzila_name';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'geo_code_zila_id' => array(
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
		'upzila_code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'upzila_name' => array(
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
		'GeoCodeZila' => array(
			'className' => 'GeoCodeZila',
			'foreignKey' => 'geo_code_zila_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	public function getUpazilaID($upzila_code = NULL, $zilaID){
            $upzilaID = "";
            if($upzila_code != NUll){
                $upzilaID = $this->find('all', array(
                   'conditions' => array(
                       'GeoCodeUpazila.upzila_code' => $upzila_code,
                       'GeoCodeUpazila.geo_code_zila_id' => $zilaID
                   )
                ));
              $upzilaID = $upzilaID[0]['GeoCodeUpazila']['id'];
            }
		return $upzilaID;
	}
}
