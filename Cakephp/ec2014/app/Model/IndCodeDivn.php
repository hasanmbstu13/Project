<?php
App::uses('AppModel', 'Model');
/**
 * IndCodeDivn Model
 *
 * @property IndCodeGroup $IndCodeGroup
 */
class IndCodeDivn extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'divn_code';

/**
 * Validation rules
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
		'divn_code_desc_bng' => array(
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
			'IndCodeGroup' => array(
				'className' => 'IndCodeGroup',
				'foreignKey' => 'ind_code_divn_id',
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
	

	public function getIndCodeDivnID ($ind_code_divn = NULL){
            $ind_code_divn_id = "";
            if($ind_code_divn != NUll) {
                $ind_code_divn_id = $this->find('all', array(
                   'conditions' => array(
                       'IndCodeDivn.divn_code' => $ind_code_divn
                   )
                ));
              $ind_code_divn_id = $ind_code_divn_id[0]['IndCodeDivn']['id'];
            }

		return $ind_code_divn_id;

	}

}
