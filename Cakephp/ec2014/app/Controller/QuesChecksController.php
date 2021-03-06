<?php
App::uses('AppController', 'Controller');
/**
 * QuesChecks Controller
 *
 * @property QuesCheck $QuesCheck
 */
class QuesChecksController extends AppController {

	public function qall_upazila() {

		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeDivn');
		$this -> loadModel('GeoCodeZila');
		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel('GeoCodeRmo');

		if (in_array(5, $this -> Session -> read('Authake.group_ids')))//Division Coordinator
		{

			$divn = $this -> GeoCodeDivn -> find('first', array('conditions' => array('GeoCodeDivn.divn_code' => $this -> jd_divn), 'fields' => array('id', 'divn_name')));

			$zilas_name = $divn['GeoCodeDivn']['divn_name'] . " Division";

			$conditions['conditions'][] = array('GeoCodeZila.geo_code_divn_id' => $divn['GeoCodeDivn']['id']);

			$conditions['fields'] = array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name');
			$conditions['order'] = array('GeoCodeUpazila.upzila_name');

			$upazilas = $this -> GeoCodeUpazila -> find('all', $conditions);

		} else if (in_array(4, $this -> Session -> read('Authake.group_ids')))//Supervising Officer
		{
			$zilas = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.zila_code' => $this -> sup_officer_zila), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_name')));

			$zilaId = $zilas[0]['GeoCodeZila']['id'];
			$zilas_name = $zilas[0]['GeoCodeZila']['zila_name'] . " Zila";

			$upazilas = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id' => $zilaId), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name'), 'order' => array('GeoCodeUpazila.upzila_name')));
		} else if (in_array(3, $this -> Session -> read('Authake.group_ids')))//Supervisor
		{
			$zilas = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.zila_code' => $this -> supervisor_zila), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_name')));

			$zilaId = $zilas[0]['GeoCodeZila']['id'];
			$zilas_name = $zilas[0]['GeoCodeZila']['zila_name'] . " Zila";

			$upazilas = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id' => $zilaId, 'GeoCodeUpazila.upzila_code' => $this -> supervisor_upazila), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name'), 'order' => array('GeoCodeUpazila.upzila_name')));
		}

		$this -> set(compact('zilas_name', 'upazilas'));
	}

	public function unitname($upazilaID=null) {
		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeZila');
		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel('GeoCodeRmo');
		$this -> loadModel('GeoCodeUnion');
        
        $this -> GeoCodeUpazila ->id = $upazilaID;
         if (!$this -> GeoCodeUpazila -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }       
        
        
		$upazilaID = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.id' => $upazilaID), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name')));
		$upazilaName = $upazilaID[0]['GeoCodeUpazila']['upzila_name'];
		$upazilaID = $upazilaID[0]['GeoCodeUpazila']['id'];
		$unionNames = $this -> GeoCodeUnion -> find('all', array('conditions' => array('GeoCodeUnion.geo_code_upazila_id' => $upazilaID)));
		$this -> set(compact('unionNames', 'upazilaName', 'upazilaID'));

	}

	public function books($id=null, $upazilaID=null) {
		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('Book');
		$this -> loadModel('Questionaire');
        $this -> loadModel('GeoCodeUpazila');
        $this -> loadModel('GeoCodeUnion');

$this -> GeoCodeUpazila ->id = $upazilaID;
$this -> GeoCodeUnion ->id = $id;
         if (!$this -> GeoCodeUpazila -> exists()||!$this -> GeoCodeUnion -> exists() ) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }      

		$this -> Book -> unbindModel(array('belongsTo' => array('GeoCodeDivn', 'GeoCodeZila', 'GeoCodeUpazila', 'GeoCodeRmo', 'GeoCodePsa', 'GeoCodeUnion')));
		$books = $this -> Book -> find('all', array('conditions' => array('Book.geo_code_union_id' => $id), 'fields' => array('Book.id'), 'order' => array('Book.id' => 'asc')));

		foreach ($books as $key => $value) {

			$questionaires = $this -> Questionaire -> find('count', array('conditions' => array('Questionaire.is_out_of_scope' => 0, 'QuesCheck.entry_by' => NULL, 'Questionaire.book_id' => $value['Book']['id']), 'fields' => array('Questionaire.id')));
			if ($questionaires == 0) {
				$books[$key]['Book']['status'] = 'Checked';
			} else {
				$books[$key]['Book']['status'] = 'Pending';
			}
		}
		$this -> set(compact('books', 'id', 'upazilaID'));
	}

	public function questions($id=null) {
		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('Questionaire');
		$this -> loadModel('Book');
        
$this -> Book ->id = $id;
         if (!$this -> Book -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }
         
         
		$questionaires = $this -> Questionaire -> find('all', array('conditions' => array('Questionaire.book_id' => $id, 'Questionaire.is_out_of_scope' => 0, 'QuesCheck.entry_by' => NULL), 'fields' => array('Questionaire.id', 'Questionaire.q1_geo_code_mauza_name', 'Questionaire.q1_unit_serial_no', 'Questionaire.q2_unit_name', 'Questionaire.q6_economy_description', 'Questionaire.q4_unit_type', 'Questionaire.q5_unit_head_economy_id', 'Questionaire.q6_ind_code_class_id', 'Book.geo_code_union_id'), 'order' => array('Questionaire.id' => 'asc')));
		$book = $this -> Book -> find('all', array('conditions' => array('Book.id' => $id), 'fields' => array('Book.geo_code_union_id', 'Book.geo_code_upazila_id')));
		$book = $book[0]['Book'];
		$this -> set(compact('questionaires', 'id', 'book'));
	}

	public function details($quesID=null) {
		$this -> layout = 'table';
		$_SESSION["MenuActive"] = 5;

		$this -> loadModel('Questionaire');
		$this -> loadModel('QuesCheck');
        $this -> loadModel('UnitHeadEducation');


$this -> Questionaire ->id = $quesID;
         if (!$this -> Questionaire -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }
         
		if ($this -> request -> is('post')) {

		$insert_data = array('QuesCheck' => array('questionaire_id' => $quesID, 'error_note' => $this -> request -> data['QuesCheck']['error_note'], 'sync_required' => "1", 'created' => date("Y-m-d H:i:s"), 'modified' => date("Y-m-d H:i:s"), 'entry_by' => $this -> Session -> read('Authake.id')));

		$this -> QuesCheck -> create();

		if ($this -> QuesCheck -> save($insert_data)) {

		$this -> Session -> setFlash(__('Questionnaries has been checked successfully.'));
		$this -> redirect(array('action' => 'questions', $this -> request -> data['QuesCheck']['book_id']));
			} 
		else {
		$this -> Session -> setFlash(__('Data could not be saved. Please, try again.'));
		$this -> redirect(array('action' => 'questions', $this -> request -> data['QuesCheck']['book_id']));
			}

		}

		$questionaires = $this -> Questionaire -> find('all', array('conditions' => array('Questionaire.is_out_of_scope' => 0, 'QuesCheck.entry_by' => NULL, 'Questionaire.id' => $quesID)));
        
        $edu_code = $this->UnitHeadEducation->find('all', array('conditions'=> array('UnitHeadEducation.id' => $questionaires[0]['Questionaire']['q3_unit_head_education_id'])));
		$this -> set(compact('questionaires','edu_code'));

	}

	public function op_ques_check() {

		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('Questionaire');
		$data = $this -> Questionaire -> find('all', array(
        		'conditions' => array(
        		'Questionaire.entry_by' => $this -> Session -> read('Authake.id'),
        	
        		'QuesCheck.error_note <>' => NULL, 
        		'QuesCheck.updated_by' => NULL), 
		'fields' => array(
        		'Questionaire.book_id', 
        		'Questionaire.q1_geo_code_mauza_name', 
        		'Questionaire.q1_unit_serial_no',
        		'Questionaire.is_out_of_scope', 
        		'QuesCheck.error_note', 
        		'QuesCheck.questionaire_id'),
			'order' => array('Questionaire.id' => 'ASC')	
				));
        
        
		$this -> set('error_data', $data);

	}

	public function edit_details($questionaire_id=null) {
		$this -> layout = 'table';
		$_SESSION["MenuActive"] = 5;
		$_SESSION["QuesID"] = $questionaire_id;

		$this -> loadModel('Questionaire');
		$this -> loadModel('QuesCheck');
		$this -> loadModel('UnitHeadEducation');
		$this -> loadModel('IndCodeDivn');
		$this -> loadModel('IndCodeClass');
		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeMauza');
		$this -> loadModel('GeoCodeRmo');


$this -> Questionaire ->id = $questionaire_id;
         if (!$this -> Questionaire -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }
         
		//if (!$this -> Session -> check('q1_geo_code_mauza_id')) {
			$this -> Session -> write('q1_geo_code_mauza_id', "");
			$this -> Session -> write('q1_geo_code_mauza_name', "");
			$this -> Session -> write('village_options', array());
		//}

		if ($this -> request -> is('post')) {
 //Grabbing input fields for validation 
			$q1 = $this -> request -> data['Questionaire']['q1_geo_code_mauza_id'];
			$q1_1 = $this -> request -> data['Questionaire']['q1_unit_serial_no'];
			$q2_1 = $this -> request -> data['Questionaire']['q2_unit_name'];
			$q2_2 = $this -> request -> data['Questionaire']['q2_village_maholla'];
			$q3_1 = $this -> request -> data['Questionaire']['q3_unit_head_gender'];
			$q3_2 = $this -> request -> data['Questionaire']['q3_unit_head_education_id'];
			$q3_3 = $this -> request -> data['Questionaire']['q3_unit_head_age'];
			$q6_1 = $this -> request -> data['Questionaire']['q6_economy_description'];
			$q6_2 = $this -> request -> data['Questionaire']['q6_economy_id'];
			$q12 = $this -> request -> data['Questionaire']['q12_year_of_start'];
			$q13 = $this -> request -> data['Questionaire']['q13_sale_procedure'];
			$q14 = $this -> request -> data['Questionaire']['q14_is_accountable'];
			$q15_1 = $this -> request -> data['Questionaire']['q15_salary_instr'];
			$q15_2 = $this -> request -> data['Questionaire']['q15_salary_period'];
			$q16 = $this -> request -> data['Questionaire']['q16_fixed_capital'];
			$q25 = $this -> request -> data['Questionaire']['q25_is_tin_registered'];
			$q26 = $this -> request -> data['Questionaire']['q26_is_vat_registered'];
// calling the validation function
			$this -> qus_validation($q1, $q1_1, $q2_1, $q2_2, $q3_1, $q3_2, $q3_3, $q6_1, $q6_2, $q12, $q13, $q14, $q15_1, $q15_2, $q16, $q25, $q26);
			
			$this -> Session -> write('q1_geo_code_mauza_id', $this -> request -> data['Questionaire']['q1_geo_code_mauza_id']);
			$this -> Session -> write('q1_geo_code_mauza_name', $this -> request -> data['Questionaire']['q1_geo_code_mauza_name']);

			// SECTION 2 Lower to uper case
			$this -> request -> data['Questionaire']['q2_unit_name'] = strtoupper($this -> request -> data['Questionaire']['q2_unit_name']);

			$this -> request -> data['Questionaire']['q2_village_maholla'] = strtoupper($this -> request -> data['Questionaire']['q2_village_maholla']);
			$this -> request -> data['Questionaire']['q2_home_market'] = strtoupper($this -> request -> data['Questionaire']['q2_home_market']);
			$this -> request -> data['Questionaire']['q2_road_no_name'] = strtoupper($this -> request -> data['Questionaire']['q2_road_no_name']);
			$this -> request -> data['Questionaire']['q2_holding_no'] = strtoupper($this -> request -> data['Questionaire']['q2_holding_no']);

			// END of lower to upper

			$this -> request -> data['Questionaire']['rmo_code'] = $this -> request -> data['Questionaire']['rmo_code2'];

			$this -> request -> data['Questionaire']['id'] = $this -> request -> data['Questionaire']['book_id'] . str_pad($this -> request -> data['Questionaire']['q1_unit_serial_no'], 3, "0", STR_PAD_LEFT);
			$this -> request -> data['Questionaire']['q3_unit_head_education_id'] = $this -> UnitHeadEducation -> getUnitHeadEducationID($this -> request -> data['Questionaire']['q3_unit_head_education_id']);
			$this -> request -> data['Questionaire']['q6_ind_code_class_id'] = $this -> request -> data['Questionaire']['q6_economy_id'];
            
            
			$Books = $this -> Book -> find('all', array('conditions' => array('Book.id =' => $this -> request -> data['Questionaire']['book_id']), 'fields' => array('Book.geo_code_union_id', 'Book.geo_code_rmo_id', 'Book.growth_centre')));

			$union_id = $Books[0]['Book']['geo_code_union_id'];
			//$rmo_id = $Books[0]['Book']['geo_code_rmo_id'];
			$rmo_id = $this -> GeoCodeRmo -> getRmoID($this -> request -> data['Questionaire']['rmo_code2']);
			
			
$growth_centre = $Books[0]['Book']['growth_centre'];
if($growth_centre == 1 && $this -> request -> data['Questionaire']['rmo_code2'] == 7)
{
	$Muzas = $this -> GeoCodeMauza -> find('all', array('conditions' => array(
            'GeoCodeMauza.geo_code_union_id =' => $union_id, 
            'GeoCodeMauza.mauza_code' => $this -> request -> data['Questionaire']['q1_geo_code_mauza_id']), 
            'fields' => array('GeoCodeMauza.id')));
}
else 
{
	$Muzas = $this -> GeoCodeMauza -> find('all', array('conditions' => array(
            'GeoCodeMauza.geo_code_union_id =' => $union_id, 
            'GeoCodeMauza.geo_code_rmo_id =' => $rmo_id, 
            'GeoCodeMauza.mauza_code' => $this -> request -> data['Questionaire']['q1_geo_code_mauza_id']), 
            'fields' => array('GeoCodeMauza.id')));
}
			$this -> request -> data['Questionaire']['q1_geo_code_mauza_id'] = $Muzas[0]['GeoCodeMauza']['id'];
			

//******** Assigning data status *********  
			$this -> request -> data['Questionaire']['update_by'] = $this -> Session -> read('Authake.id');
			$this -> request -> data['Questionaire']['sync_required'] = 1;
			$this -> request -> data['Questionaire']['modified'] = date("Y-m-d H:i:s");
			$this->request->data['Questionaire']['is_out_of_scope'] = 0;
            
if ($this->request->data['Questionaire']['q4_unit_type'] == 1) {
    $this->request->data['Questionaire']['q4_unit_org_type'] = 0 ;
    
}

// *****  Starting saving process ********
		$this -> Questionaire -> begin();
			  $this -> Questionaire -> create();
			  if ($this -> Questionaire -> save($this -> request -> data)) {

			$insert_data = array('QuesCheck' => array(
            			'questionaire_id' => $this -> request -> data['Questionaire']['id'], 
            			'operator_chk' => "YES", 
            			'sync_required' => "1", 
            			'modified' => date("Y-m-d H:i:s"), 
            			'updated_by' => $this -> Session -> read('Authake.id')));

			 $this -> QuesCheck -> create();
			   if ($this -> QuesCheck -> save($insert_data)) {
					$this -> Questionaire -> commit();
					$this -> Session -> setFlash(__('The questionnaire has been saved'));
					$this -> redirect(array('controller' => 'QuesChecks', 'action' => 'op_ques_check'));
				} else {
					$this -> Questionaire -> rollback();
					$this -> Session -> setFlash(__('The questionnaire could not be saved. Please, try again.'));
					$this -> redirect(array('controller' => 'QuesChecks', 'action' => 'op_ques_check'));
				}

			} else {
				$this -> Questionaire -> commit();
				$this -> Session -> setFlash(__('The questionnaire could not be saved. Please, try again.'));
				$this -> redirect(array('controller' => 'QuesChecks', 'action' => 'op_ques_check'));
			}
		}

		$questionaires = $this -> Questionaire -> find('all', array('conditions' => array(
                		//'Questionaire.is_out_of_scope' => 0, 
                		'QuesCheck.questionaire_id <>' => NULL, 
                		'Questionaire.id' => $questionaire_id)));
         
         
         $edu_code = $this->UnitHeadEducation->find('all', array('conditions'=> array('UnitHeadEducation.id' => $questionaires[0]['Questionaire']['q3_unit_head_education_id'])
     ));               
         
         $this -> set(compact('questionaires','edu_code'));

	}

//partial submission of form / called by a function written in func.js submit_form()

   public function partialSubmitEdit() {
        $this -> layout = 'table';
        $_SESSION["MenuActive"] = 2;
        $this -> loadModel('Questionaire');
       
        
        
        if ($this -> request -> is('post')) {

      $questionaire_id = $this -> request -> data['Questionaire']['book_id'] . str_pad($this -> request -> data['Questionaire']['q1_unit_serial_no'], 3, "0", STR_PAD_LEFT);

if ($this->request->data['Questionaire']['q4_unit_type'] == 1) {
    $this->request->data['Questionaire']['q4_unit_org_type'] = 0 ;
    
}

$Ques_Scope_Status = $this->Questionaire->updateAll(
                    array(
'Questionaire.q4_unit_type' => $this -> request ->data['Questionaire']['q4_unit_type'],
'Questionaire.q4_unit_org_type' => $this -> request ->data['Questionaire']['q4_unit_org_type'],
'Questionaire.q5_unit_head_economy_id' => $this -> request ->data['Questionaire']['q5_unit_head_economy_id'],
'Questionaire.q6_ind_code_class_id' => $this -> request ->data['Questionaire']['q6_economy_id'],
'Questionaire.is_out_of_scope' => '1',
'Questionaire.sync_required' => '1'), 
array('Questionaire.id' => $questionaire_id));
                    
            if ($Ques_Scope_Status) {

                $this -> clear_cache();
                $this -> Session -> setFlash(__('The questionnaire has been saved'));
            
                $this -> redirect(array('plugin' => '', 'controller' => 'Questionaires', 'action' => 'index'));
            } else {
                $this -> clear_cache();
                $this -> Session -> setFlash(__('The questionnaire could not be saved. Please, try again.'));
                $this -> redirect(array('plugin' => '', 'controller' => 'Questionaires', 'action' => 'index'));
            }
        }

    }
   




	/**
	 * function to clear all cache data
	 * by default accessible only for admin
	 *
	 * @access Public
	 * @return void
	 */
	public function clear_cache() {
		Cache::clear();
		clearCache();

		$files = array();
		$files = array_merge($files, glob(CACHE . '*'));
		// remove cached css
		$files = array_merge($files, glob(CACHE . 'css' . DS . '*'));
		// remove cached css
		$files = array_merge($files, glob(CACHE . 'js' . DS . '*'));
		// remove cached js
		$files = array_merge($files, glob(CACHE . 'models' . DS . '*'));
		// remove cached models
		$files = array_merge($files, glob(CACHE . 'persistent' . DS . '*'));
		// remove cached persistent
		$files = array_merge($files, glob(CACHE . 'Html' . DS . '*'));
		// remove cached persistent
		$files = array_merge($files, glob(CACHE . 'Form' . DS . '*'));
		// remove cached persistent

		foreach ($files as $f) {
			if (is_file($f)) {
				unlink($f);
			}
		}

		if (function_exists('apc_clear_cache')) :
			apc_clear_cache();
			apc_clear_cache('user');
		endif;

		$this -> set(compact('files'));
		$this -> layout = 'ajax';
	}

	// Input field validation function=======================================
	

	function qus_validation($q1, $q1_1, $q2_1, $q2_2, $q3_1, $q3_2, $q3_3, $q6_1, $q6_2, $q12, $q13, $q14, $q15_1, $q15_2, $q16, $q25, $q26) {
		$msg = "";

		$mauza_code = $q1;
		if ($mauza_code == "" || strlen($mauza_code) <> 3) {
			$msg .= "<br />Wrong Mauza Code!";
		}

		$unit_serial = $q1_1;
		if ($unit_serial == "" || strlen($unit_serial) <> 3) {
			$msg .= "<br />Wrong Unit Serial Number!";
		}
		$name = $q2_1;
		if ($name == "") {
			$msg .= "<br />Please Enter A Name!";
		}
		
		
		$villageName = $q2_2;
		if ($villageName == "") {
			$msg .= "<br />Please Enter A Village Name!";
		}
		
		$gender = array('1', '2', '3', '9');
		if (!in_array($q3_1, $gender)) {
			$msg .= "<br />Please Select Gender Type!";
		}

		$education = array('00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '12', '15', '16', '18', '99');
		if (!in_array($q3_2, $education)) {
			$msg .= "<br />Please Provide Correct Education Code !";
		}
		$age = $q3_3;
		if ($age == "") {
			$msg .= "<br />Please Provide Valid Age !";
		}

		$economy_desc = $q6_1;
		if ($economy_desc == "") {
			$msg .= "<br />Please Provide Valid Economy Code Description !";
		}
		$economy_code = $q6_2;
		if ($economy_code == "") {
			$msg .= "<br />Please Provide Valid Economy Code !";
		}
		$year = $q12;
		if ($year == "") {
			$msg .= "<br />Ques. No- 12 : Year Field is Blank !";
		}
		$sale_pros = array('1', '2', '3', '9');
		if (!in_array($q13, $sale_pros)) {
			$msg .= "<br />Please Provide Correct Code For Ques. No- 13 !";
		}

		$account_yes_no = array('1', '2', '9');
		if (!in_array($q14, $account_yes_no)) {
			$msg .= "<br />Please Provide Correct Code For Ques. No- 14 !";
		}

		$salary_method = array('1', '2', '3', '9');
		if (!in_array($q15_1, $salary_method)) {
			$msg .= "<br />Please Provide Correct Code For Ques. No- 15.1!";
		}

		$payment_type = array('1', '2', '3', '4', '5', '9');
		if (!in_array($q15_2, $payment_type)) {
			$msg .= "<br />Please Provide Correct Code For Ques. No- 15.2!";
		}

		$present_debit = array('1', '2', '3', '4', '5', '6', '7', '9');
		if (!in_array($q16, $present_debit)) {
			$msg .= "<br />Please Provide Correct Code For Ques. No- 16!";
		}
		$tin_status = array('1', '2', '9');
		if (!in_array($q25, $tin_status)) {
			$msg .= "<br />Please Provide Correct Code For Ques. No- 25!";
		}
		$vat_status = array('1', '2', '3', '4', '5', '6', '7', '9');
		if (!in_array($q26, $vat_status)) {
			$msg .= "<br />Please Provide Correct Code For Ques. No- 26!";
		}
		
		if ($msg != "") {
			$this -> clear_cache();

			$this -> Session -> setFlash(__($msg));
			$this -> redirect(array('controller' => 'QuesChecks', 'action' => 'op_ques_check', $_SESSION["QuesID"]));
		} else {
			return true;
		}
	}

/*************************  OUT OF SCOPE SECTION ********************************/ 

public function qall_upazila_outscope() {

        $_SESSION["MenuActive"] = 5;
        $this -> loadModel('Book');
        $this -> loadModel('GeoCodeDivn');
        $this -> loadModel('GeoCodeZila');
        $this -> loadModel('GeoCodeUpazila');
        $this -> loadModel('GeoCodeRmo');

        if (in_array(5, $this -> Session -> read('Authake.group_ids')))//Division Coordinator
        {

            $divn = $this -> GeoCodeDivn -> find('first', array('conditions' => array('GeoCodeDivn.divn_code' => $this -> jd_divn), 'fields' => array('id', 'divn_name')));

            $zilas_name = $divn['GeoCodeDivn']['divn_name'] . " Division";

            $conditions['conditions'][] = array('GeoCodeZila.geo_code_divn_id' => $divn['GeoCodeDivn']['id']);

            $conditions['fields'] = array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name');
            $conditions['order'] = array('GeoCodeUpazila.upzila_name');

            $upazilas = $this -> GeoCodeUpazila -> find('all', $conditions);

        } else if (in_array(4, $this -> Session -> read('Authake.group_ids')))//Supervising Officer
        {
            $zilas = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.zila_code' => $this -> sup_officer_zila), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_name')));

            $zilaId = $zilas[0]['GeoCodeZila']['id'];
            $zilas_name = $zilas[0]['GeoCodeZila']['zila_name'] . " Zila";

            $upazilas = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id' => $zilaId), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name'), 'order' => array('GeoCodeUpazila.upzila_name')));
        } else if (in_array(3, $this -> Session -> read('Authake.group_ids')))//Supervisor
        {
            $zilas = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.zila_code' => $this -> supervisor_zila), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_name')));

            $zilaId = $zilas[0]['GeoCodeZila']['id'];
            $zilas_name = $zilas[0]['GeoCodeZila']['zila_name'] . " Zila";

            $upazilas = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id' => $zilaId, 'GeoCodeUpazila.upzila_code' => $this -> supervisor_upazila), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name'), 'order' => array('GeoCodeUpazila.upzila_name')));
        }

        $this -> set(compact('zilas_name', 'upazilas'));
    }

public function unitname_outscope($upazilaID=null) {
        $_SESSION["MenuActive"] = 5;
        $this -> loadModel('Book');
        $this -> loadModel('GeoCodeZila');
        $this -> loadModel('GeoCodeUpazila');
        $this -> loadModel('GeoCodeRmo');
        $this -> loadModel('GeoCodeUnion');
        
          $this -> GeoCodeUpazila ->id = $upazilaID;
         if (!$this -> GeoCodeUpazila -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }       
        
        
        $upazilaID = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.id' => $upazilaID), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name')));
        $upazilaName = $upazilaID[0]['GeoCodeUpazila']['upzila_name'];
        $upazilaID = $upazilaID[0]['GeoCodeUpazila']['id'];
        $unionNames = $this -> GeoCodeUnion -> find('all', array('conditions' => array('GeoCodeUnion.geo_code_upazila_id' => $upazilaID)));
        $this -> set(compact('unionNames', 'upazilaName', 'upazilaID'));

    }

    public function books_outscope($id=null, $upazilaID=null) {
        $_SESSION["MenuActive"] = 5;
        $this -> loadModel('Book');
        $this -> loadModel('Questionaire');
        $this -> loadModel('GeoCodeUpazila');
        $this -> loadModel('GeoCodeUnion');
        
        
 $this -> GeoCodeUpazila ->id = $upazilaID;
$this -> GeoCodeUnion ->id = $id;
         if (!$this -> GeoCodeUpazila -> exists()||!$this -> GeoCodeUnion -> exists() ) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }       

        $this -> Book -> unbindModel(array('belongsTo' => array('GeoCodeDivn', 'GeoCodeZila', 'GeoCodeUpazila', 'GeoCodeRmo', 'GeoCodePsa', 'GeoCodeUnion')));
        $books = $this -> Book -> find('all', array('conditions' => array('Book.geo_code_union_id' => $id), 'fields' => array('Book.id'), 'order' => array('Book.id' => 'asc')));
		
	

        foreach ($books as $key => $value) {

            $questionaires = $this -> Questionaire -> find('count', array('conditions' => array('Questionaire.is_out_of_scope' => 1, 'QuesCheck.entry_by' => NULL, 'Questionaire.book_id' => $value['Book']['id']), 'fields' => array('Questionaire.id')));
            if ($questionaires == 0) {
                $books[$key]['Book']['status'] = 'Checked';
            } else {
                $books[$key]['Book']['status'] = 'Pending';
            }
        }
        $this -> set(compact('books', 'id', 'upazilaID'));
    }

    public function questions_outscope($id=null) {
        $_SESSION["MenuActive"] = 5;
        $this -> loadModel('Questionaire');
        $this -> loadModel('Book');
        
   $this -> Book ->id = $id;
         if (!$this -> Book -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }     

        $questionaires = $this -> Questionaire -> find('all', array('conditions' => array('Questionaire.book_id' => $id, 'Questionaire.is_out_of_scope' => 1, 'QuesCheck.entry_by' => NULL), 'fields' => array('Questionaire.id', 'Questionaire.q1_geo_code_mauza_name', 'Questionaire.q1_unit_serial_no', 'Questionaire.q2_unit_name', 'Questionaire.q6_economy_description', 'Questionaire.q4_unit_type', 'Questionaire.q5_unit_head_economy_id', 'Questionaire.q6_ind_code_class_id', 'Book.geo_code_union_id'), 'order' => array('Questionaire.id' => 'asc')));
		
        $book = $this -> Book -> find('all', array('conditions' => array('Book.id' => $id), 'fields' => array('Book.geo_code_union_id', 'Book.geo_code_upazila_id')));
        $book = $book[0]['Book'];
        $this -> set(compact('questionaires', 'id', 'book'));
    }

    public function details_outscope($quesID=null) {
        $this -> layout = 'table';
        $_SESSION["MenuActive"] = 5;

        $this -> loadModel('Questionaire');
        $this -> loadModel('QuesCheck');
        $this -> loadModel('UnitHeadEducation');
        
  $this -> Questionaire ->id = $quesID;
         if (!$this -> Questionaire -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }      

        if ($this -> request -> is('post')) {

        $insert_data = array('QuesCheck' => array('questionaire_id' => $quesID, 'error_note' => $this -> request -> data['QuesCheck']['error_note'], 'sync_required' => "1", 'created' => date("Y-m-d H:i:s"), 'modified' => date("Y-m-d H:i:s"), 'entry_by' => $this -> Session -> read('Authake.id')));

        $this -> QuesCheck -> create();

        if ($this -> QuesCheck -> save($insert_data)) {

        $this -> Session -> setFlash(__('Questionnaries has been checked successfully.'));
        $this -> redirect(array('action' => 'questions_outscope', $this -> request -> data['QuesCheck']['book_id']));
            } 
        else {
        $this -> Session -> setFlash(__('Data could not be saved. Please, try again.'));
        $this -> redirect(array('action' => 'questions_outscope', $this -> request -> data['QuesCheck']['book_id']));
            }
        }

        $questionaires = $this -> Questionaire -> find('all', array('conditions' => array('Questionaire.is_out_of_scope' => 1, 'QuesCheck.entry_by' => NULL, 'Questionaire.id' => $quesID)));
        
      $edu_code = $this->UnitHeadEducation->find('all', array('conditions'=> array('UnitHeadEducation.id' => $questionaires[0]['Questionaire']['q3_unit_head_education_id'])
     ));
        
        $this -> set(compact('questionaires','edu_code'));

    }
}
