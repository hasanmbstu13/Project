<?php
App::uses('AppModel', 'Model');
/**
 * UnitHeadEducation Model
 *
 */
class UnitHeadEducation extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'education_desc_bng';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'education_code' => array(
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
	
	public function getUnitHeadEducationID($education_code = NULL){
            $EducationID = "";
            if(education_code != NUll){
                $EducationID = $this->find('all', array(
                   'conditions' => array(
                       'UnitHeadEducation.education_code' => $education_code
                   )
                ));
              $EducationID = $EducationID[0]['UnitHeadEducation']['id'];
            }
		return $EducationID;
	}
}
