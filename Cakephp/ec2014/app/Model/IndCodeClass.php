<?php
App::uses('AppModel', 'Model');
/**
 * IndCodeClass Model
 *
 * @property IndCodeGroup $IndCodeGroup
 */
class IndCodeClass extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'class_code';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ind_code_group_id' => array(
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
		'class_code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'class_code_desc_bng' => array(
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
		'IndCodeGroup' => array(
			'className' => 'IndCodeGroup',
			'foreignKey' => 'ind_code_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	public function getIndCodeClassID ($ind_code_class = NULL){
            $ind_id = "";
            if($ind_code_class != NUll) {
                $ind_id = $this->find('all', array(
                   'conditions' => array(
                       'IndCodeClass.class_code' => $ind_code_class
                   )
                ));
               
                $ind_id =  $ind_id [0]['IndCodeClass']['id'];
                
            }

		return $ind_id;

	}
}
