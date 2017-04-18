<?php

class PagesController extends AppController {

	 var $uses = false;

	public function index() {
		$this -> set('title_for_layout', 'Home');
		$_SESSION["MenuActive"] = 1;
		
		$this->loadModel('Notice');
		$notices = $this -> Notice -> find('all', array('order' => array('msg_order', 'id')));
		$this -> set(compact('notices'));
	}

	public function masterinformation() {
		$this -> set('title_for_layout', 'Master Information');
		$_SESSION["MenuActive"] = 3;
	}

	public function dashboard() {
		$this -> set('title_for_layout', 'Master ');
		$_SESSION["MenuActive"] = 5;
	}

	public function help_pdf() {

		$this -> set('title_for_layout', 'Instruction');
		$this -> viewClass = 'Media';
		$params = array('id' => 'help.pdf', 'name' => 'pdf', 'download' => false, 'extension' => 'pdf', 'path' => APP . 'outside_webroot_dir' . DS);
		$this -> set($params);
	}

	//Edit For ISIC Code=======================================

	public function isic_pdf() {
		$this -> set('title_for_layout', 'ISIC');
		$this -> viewClass = 'Media';
		$params = array('id' => 'isic.pdf', 'name' => 'pdf', 'download' => false, 'extension' => 'pdf', 'path' => APP . 'outside_webroot_dir' . DS);
		$this -> set($params);
	}
    
    
    // BOOK DISTRIBUTION
    
        public function book_distribution() {

        $this -> set('title_for_layout', 'Book Distribution');
        $this -> viewClass = 'Media';
        $params = array('id' => 'BookDistributionForm.pdf', 'name' => 'pdf', 'download' => false, 'extension' => 'pdf', 'path' => APP . 'outside_webroot_dir' . DS);
        $this -> set($params);
    }

public function check_data () {

    		$this->loadModel('Report');
			$this->loadModel('Book');
			$this->loadModel('QuesSixCheck');
			$this->loadModel('QuesCheck');
			$this->loadModel('UnitHeadEconomy');
			$this->loadModel('GeoCodeMauza');

			$data = array();

			

			$this->Report->unBindModel(array(belongsTo => array('Book', 'QuesSixCheck','QuesCheck','UnitHeadEconomy','GeoCodeMauza')), false);

			$data['q_id']['id'] = $this->Report->find('count');
			$data['q_id']['id_null'] = $this->Report->find('count', array('conditions' => array('Report.QUESTIONNARIE_ID' => NULL)));
	        
	        $data['book_id']['book_id'] = $this->Report->find('count');
	        $data['book_id']['book_id_null'] = $this->Report->find('count', array('conditions' => array('Report.book_id' => NULL)));

	       
	        $data['q1_geo_code_mauza_name']['total'] = $this->Report->find('count');
	        $data['q1_geo_code_mauza_name']['null'] = $this->Report->find('count', array('conditions' => array('Report.q1_geo_code_mauza_id' => NULL)));

	        $data['q1_geo_code_mauza_id']['total'] = $this->Report->find('count');
	        $data['q1_geo_code_mauza_id']['total_null'] = $this->Report->find('count', array('conditions' => array('Report.q1_geo_code_mauza_id' => NULL)));

	        $data['q1_unit_serial_no']['total'] = $this->Report->find('count');
	        $data['q1_unit_serial_no']['null'] = $this->Report->find('count', array('conditions' => array('Report.q1_unit_serial_no' => NULL)));

	        $data['q2_unit_name'] = $this->Report->find('count', array('conditions' => array('Report.q2_unit_name' => NULL)));
	        $data['q2_village_maholla'] = $this->Report->find('count', array('conditions' => array('Report.q2_village_maholla' => NULL)));
	        $data['q2_home_market'] = $this->Report->find('count', array('conditions' => array('Report.q2_home_market' => NULL)));
	        $data['q2_road_no_name'] = $this->Report->find('count', array('conditions' => array('Report.q2_road_no_name' => NULL)));
	        $data['q2_holding_no'] = $this->Report->find('count', array('conditions' => array('Report.q2_holding_no' => NULL)));
	        $data['q2_telephone_no'] = $this->Report->find('count', array('conditions' => array('Report.q2_telephone_no' => NULL)));
	        $data['q2_fax_no'] = $this->Report->find('count', array('conditions' => array('Report.q2_fax_no' => NULL)));
	        $data['q2_email_address'] = $this->Report->find('count', array('conditions' => array('Report.q2_email_address' => NULL)));
	        
	        
	        $data['q3_unit_head_gender']['null'] = $this->Report->find('count', array('conditions' => array('Report.Q3_UNIT_HEAD_GENDER_CODE' => NULL)));
	        
	        $data['q3_unit_head_gender']['1'] = $this->Report->find('count', array('conditions' => array('Report.Q3_UNIT_HEAD_GENDER_CODE' => 1)));
	        $data['q3_unit_head_gender']['2'] = $this->Report->find('count', array('conditions' => array('Report.Q3_UNIT_HEAD_GENDER_CODE' => 2)));
	        $data['q3_unit_head_gender']['3'] = $this->Report->find('count', array('conditions' => array('Report.Q3_UNIT_HEAD_GENDER_CODE' => 3)));


	         $data['q3_unit_head_gender']['9'] = $this->Report->find('count', array('conditions' => array('Report.Q3_UNIT_HEAD_GENDER_CODE' => 9)));



	        $data['q3_unit_head_education_id'] = $this->Report->find('count', array('conditions' => array('Report.education_code' => NULL)));
	        $data['q3_unit_head_age'] = $this->Report->find('count', array('conditions' => array('Report.q3_unit_head_age' => NULL)));

	       

	       
	          
	        $data['q4_unit_type']['total'] = $this->Report->find('count');
	        $data['q4_unit_type']['null'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => NULL)));
	        $data['q4_unit_type']['eco_house'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => '1')));

	        $data['q4_unit_type']['organization'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => '2')));

	       $data['q4_unit_org_type']['total'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => '2')));
	       $data['q4_unit_org_type']['null'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => '2', 'Report.q4_unit_org_type' => NULL)));
	       $data['q4_unit_org_type']['TE'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => '2', 'Report.q4_unit_org_type' => '1')));
	       $data['q4_unit_org_type']['PE'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => '2', 'Report.q4_unit_org_type' => '2')));


	       $data['q5_unit_head_economy_id'] = $this->Report->find('count', array('conditions' => array('Report.Q5_UNIT_HEAD_ECONOMY_CODE' => NULL)));

	       $data['q6_economy_description'] = $this->Report->find('count', array('conditions' => array('Report.q6_economy_description' => NULL)));

	       $data['q6_ind_code_class_id'] = $this->Report->find('count', array('conditions' => array('Report.Q6_IND_CODE_CLASS_CODE' => NULL)));  

	       $data['q7_q8'] = $this->Report->find('count', array('conditions' => array('Report.Q7_PRODUCT_ID_1' => NULL,'Report.q7_product_id_2' => NULL,'Report.q7_product_id_3' => NULL, 'Report.q7_product_id_4' => NULL, 'Report.q8_service_id_1' => NULL, 'Report.Q8_SERVICE_ID_2' => NULL,'Report.q8_service_id_3' => NULL, 'Report.q8_service_id_4' => NULL)));

	       

	       

	       $data['q9_legal_entity_type_id']['null'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => 2,  'Report.q9_legal_entity_type_id' => NULL)));
	       $data['q9_legal_entity_type_id']['01'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => 2,  'Report.q9_legal_entity_type_id' => '01')));
	       $data['q9_legal_entity_type_id']['02'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => 2,  'Report.q9_legal_entity_type_id' => '02')));
	       $data['q9_legal_entity_type_id']['03'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => 2,  'Report.q9_legal_entity_type_id' => '03')));
	       $data['q9_legal_entity_type_id']['04'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => 2,  'Report.q9_legal_entity_type_id' => '04')));
	       $data['q9_legal_entity_type_id']['05'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => 2,  'Report.q9_legal_entity_type_id' => '05')));
	       $data['q9_legal_entity_type_id']['06'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => 2,  'Report.q9_legal_entity_type_id' => '06')));
	       $data['q9_legal_entity_type_id']['07'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => 2,  'Report.q9_legal_entity_type_id' => '07')));
	       $data['q9_legal_entity_type_id']['08'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => 2,  'Report.q9_legal_entity_type_id' => '08')));
	       $data['q9_legal_entity_type_id']['09'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => 2,  'Report.q9_legal_entity_type_id' => '09')));
	       $data['q9_legal_entity_type_id']['10'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => 2,  'Report.q9_legal_entity_type_id' => '10')));
	       $data['q9_legal_entity_type_id']['11'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => 2,  'Report.q9_legal_entity_type_id' => '11')));
	       $data['q9_legal_entity_type_id']['12'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => 2,  'Report.q9_legal_entity_type_id' => '12')));
	       $data['q9_legal_entity_type_id']['99'] = $this->Report->find('count', array('conditions' => array('Report.q4_unit_type' => 2,  'Report.q9_legal_entity_type_id' => '99')));

	       	
	       
	       $data['q10_is_nbr_investment'] = $this->Report->find('count', array('conditions' => array('Report.q10_is_nbr_investment' => NULL)));

	      $data['q10_nbr_amount_in_thou'] = $this->Report->find('count', array('conditions' => array('Report.q10_is_nbr_investment' => 1, 'Report.q10_nbr_amount_in_thou' => NULL)));

	      $data['q11_is_registered']['null']= $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => NULL)));
	      $data['q11_is_registered']['1']= $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => 1)));
	      $data['q11_is_registered']['2']= $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => 2)));
	      $data['q11_is_registered']['3']= $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => 3)));
	      $data['q11_is_registered']['9']= $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => 9)));
		

	      $data['q11_registrar_id']['null'] = $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => 1, 'Report.q11_registrar_id' => NULL)));
	      $data['q11_registrar_id']['01'] = $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => 1, 'Report.q11_registrar_id' => '01')));
	      $data['q11_registrar_id']['02'] = $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => 1, 'Report.q11_registrar_id' => '02')));
	      $data['q11_registrar_id']['03'] = $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => 1, 'Report.q11_registrar_id' => '03')));
	      $data['q11_registrar_id']['04'] = $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => 1, 'Report.q11_registrar_id' => '04')));
	      $data['q11_registrar_id']['05'] = $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => 1, 'Report.q11_registrar_id' => '05')));
	      $data['q11_registrar_id']['06'] = $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => 1, 'Report.q11_registrar_id' => '06')));
	      $data['q11_registrar_id']['07'] = $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => 1, 'Report.q11_registrar_id' => '07')));
	      $data['q11_registrar_id']['08'] = $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => 1, 'Report.q11_registrar_id' => '08')));
	      $data['q11_registrar_id']['09'] = $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => 1, 'Report.q11_registrar_id' => '09')));
	      $data['q11_registrar_id']['10'] = $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => 1, 'Report.q11_registrar_id' => '10')));
	      $data['q11_registrar_id']['11'] = $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => 1, 'Report.q11_registrar_id' => '11')));
	      $data['q11_registrar_id']['99'] = $this->Report->find('count', array('conditions' => array('Report.q11_is_registered' => 1, 'Report.q11_registrar_id' => '99')));


	      $data['q12_year_of_start'] = $this->Report->find('count', array('conditions' => array('Report.q12_year_of_start' => NULL)));

	      $data['q13_sale_procedure']['null'] = $this->Report->find('count', array('conditions' => array('Report.q13_sale_procedure' => NULL)));
	      $data['q13_sale_procedure']['1'] = $this->Report->find('count', array('conditions' => array('Report.q13_sale_procedure' => 1)));
	      $data['q13_sale_procedure']['2'] = $this->Report->find('count', array('conditions' => array('Report.q13_sale_procedure' => 2)));
	      $data['q13_sale_procedure']['3'] = $this->Report->find('count', array('conditions' => array('Report.q13_sale_procedure' => 3)));
	      $data['q13_sale_procedure']['9'] = $this->Report->find('count', array('conditions' => array('Report.q13_sale_procedure' => 9)));
			
		
	
	      $data['q14_is_accountable']['null'] = $this->Report->find('count', array('conditions' => array('Report.q14_is_accountable' => NULL)));
	      $data['q14_is_accountable']['1'] = $this->Report->find('count', array('conditions' => array('Report.q14_is_accountable' => 1)));
	      $data['q14_is_accountable']['2'] = $this->Report->find('count', array('conditions' => array('Report.q14_is_accountable' => 2)));
	      $data['q14_is_accountable']['9'] = $this->Report->find('count', array('conditions' => array('Report.q14_is_accountable' => 9)));
			
	     
	      $data['q14_accountable_duration']['null']= $this->Report->find('count', array('conditions' => array('Report.q14_is_accountable' => 1,'Report.q14_accountable_duration' => NULL)));
	      $data['q14_accountable_duration']['0'] = $this->Report->find('count', array('conditions' => array('Report.q14_is_accountable' => 1,'Report.q14_accountable_duration' => 0)));
	      $data['q14_accountable_duration']['1'] = $this->Report->find('count', array('conditions' => array('Report.q14_is_accountable' => 1,'Report.q14_accountable_duration' => 1)));
	      $data['q14_accountable_duration']['2'] = $this->Report->find('count', array('conditions' => array('Report.q14_is_accountable' => 1,'Report.q14_accountable_duration' => 2)));
	      $data['q14_accountable_duration']['3'] = $this->Report->find('count', array('conditions' => array('Report.q14_is_accountable' => 1,'Report.q14_accountable_duration' => 3)));
	      $data['q14_accountable_duration']['4'] = $this->Report->find('count', array('conditions' => array('Report.q14_is_accountable' => 1,'Report.q14_accountable_duration' => 4)));
	      $data['q14_accountable_duration']['9'] = $this->Report->find('count', array('conditions' => array('Report.q14_is_accountable' => 1,'Report.q14_accountable_duration' => 9)));
	      
	      $data['q15_salary_instr']['null'] = $this->Report->find('count', array('conditions' => array('Report.q15_salary_instr' => NULL)));
	      $data['q15_salary_instr']['1'] = $this->Report->find('count', array('conditions' => array('Report.q15_salary_instr' => 1)));
	      $data['q15_salary_instr']['2']= $this->Report->find('count', array('conditions' => array('Report.q15_salary_instr' => 2)));
	      $data['q15_salary_instr']['3'] = $this->Report->find('count', array('conditions' => array('Report.q15_salary_instr' => 3)));
	      $data['q15_salary_instr']['9'] = $this->Report->find('count', array('conditions' => array('Report.q15_salary_instr' => 9)));

	      $data['q15_salary_period']['null'] = $this->Report->find('count', array('conditions' => array('Report.q15_salary_period' => NULL)));
	      $data['q15_salary_period']['1'] = $this->Report->find('count', array('conditions' => array('Report.q15_salary_period' => 1)));
	      $data['q15_salary_period']['2']= $this->Report->find('count', array('conditions' => array('Report.q15_salary_period' => 2)));
	      $data['q15_salary_period']['3'] = $this->Report->find('count', array('conditions' => array('Report.q15_salary_period' => 3)));
	      $data['q15_salary_period']['4']= $this->Report->find('count', array('conditions' => array('Report.q15_salary_period' => 4)));
	      $data['q15_salary_period']['5'] = $this->Report->find('count', array('conditions' => array('Report.q15_salary_period' => 5)));
	      $data['q15_salary_period']['9'] = $this->Report->find('count', array('conditions' => array('Report.q15_salary_period' => 9)));
		
	       
	      $data['q16_fixed_capital']['null'] = $this->Report->find('count', array('conditions' => array('Report.q16_fixed_capital' => NULL)));
	      $data['q16_fixed_capital']['1'] = $this->Report->find('count', array('conditions' => array('Report.q16_fixed_capital' => 1)));
	      $data['q16_fixed_capital']['2'] = $this->Report->find('count', array('conditions' => array('Report.q16_fixed_capital' => 2)));
	      $data['q16_fixed_capital']['3'] = $this->Report->find('count', array('conditions' => array('Report.q16_fixed_capital' => 3)));
	      $data['q16_fixed_capital']['4'] = $this->Report->find('count', array('conditions' => array('Report.q16_fixed_capital' => 4)));
	      $data['q16_fixed_capital']['5'] = $this->Report->find('count', array('conditions' => array('Report.q16_fixed_capital' => 5)));
	      $data['q16_fixed_capital']['6'] = $this->Report->find('count', array('conditions' => array('Report.q16_fixed_capital' => 6)));
	      $data['q16_fixed_capital']['7'] = $this->Report->find('count', array('conditions' => array('Report.q16_fixed_capital' => 7)));
	      $data['q16_fixed_capital']['9'] = $this->Report->find('count', array('conditions' => array('Report.q16_fixed_capital' => 9, 'Report.q9_legal_entity_type_id' =>'<> 05' )));

	       $data['production']['total'] = $this->Report->find('count', array('conditions' => array( 'Report.q6_ind_code_class_code < ' => 3400)));
	      #----------------------------------
	       #$data['q18_machine_uses'] = $this->Report->find('count', array('conditions' => array( 'Report.q6_ind_code_class_code < ' => 3400,  'Report.q18_machine_uses' => NULL, 'Report.q18_machine_uses' => 9)));

	        $data['q18_machine_uses'] = $this->Report->find('count', array('conditions' => array( 
										'Report.q6_ind_code_class_code < ' => 3400,
										'OR' => array(array('Report.q18_machine_uses' => NULL),
															'Report.q18_machine_uses' => 9)  
															)));
	      
	       $data['q19_marketing'] = $this->Report->find('count', array('conditions' => array(
	       	'Report.q6_ind_code_class_code < ' => 3400,
            'OR' => array(array('Report.q19_marketing' => NULL),'Report.q19_marketing' => 9) )));
	       
	       $data['q20_fuel_uses'] = $this->Report->find('count', array('conditions' => array(
	       	'Report.q6_ind_code_class_code < ' => 3400,
	       	'OR' => array(array('Report.q20_fuel_uses' => NULL),'Report.q20_fuel_uses' => 9) )));
	     
	       $data['q21_is_it_enabled'] = $this->Report->find('count', array('conditions' => array(
	       	'Report.q6_ind_code_class_code < ' => 3400,
	       	'OR' => array(array('Report.q21_is_it_enabled' => NULL), 'Report.q20_fuel_uses' => 9 ) )));
	     
	       $data['q22_is_fire_secured'] = $this->Report->find('count', array('conditions' => array(
	       	'Report.q6_ind_code_class_code < ' => 3400,
	       	'OR' => array(array('Report.q22_is_fire_secured' => NULL), 'Report.q22_is_fire_secured' => 9) )));
	      
	       $data['q22_is_fire_device_maintained'] = $this->Report->find('count', array('conditions' => array(
	       	'Report.q6_ind_code_class_code < ' => 3400, 
	       	'Report.q22_is_fire_secured' => 1, 
	       	'OR' => array(array('Report.q22_is_fire_device_maintained' => NULL), 
	       	'Report.q22_is_fire_device_maintained' => 9) )));
	       
	       $data['q23_is_garbage_proper'] = $this->Report->find('count', array('conditions' => array(
	       	'Report.q6_ind_code_class_code < ' => 3400,
	       	'OR' => array(array('Report.q23_is_garbage_proper' => NULL), 'Report.q23_is_garbage_proper' => 9) )));
	       
	       $data['q24_is_toilet_available'] = $this->Report->find('count', array('conditions' => array(
	       	'Report.q6_ind_code_class_code < ' => 3400,
	       	'OR' => array(array('Report.q24_is_toilet_available' => NULL), 'Report.q24_is_toilet_available' => 9) )));

	       $data['q24_is_ladies_toilet_available'] = $this->Report->find('count', array('conditions' => array( 
	       	'Report.q6_ind_code_class_code < ' => 3400, 'Report.q24_is_toilet_available' => 1,
	       	'OR' => array(array('Report.q24_is_ladies_toilet_available' => NULL), 'Report.q24_is_ladies_toilet_available' => 9) )));
	  
	      
	      $data['q25_is_tin_registered'] = $this->Report->find('count', array('conditions' => array( 'Report.q25_is_tin_registered' => NULL)));

	       $data['q26_is_vat_registered'] = $this->Report->find('count', array('conditions' => array( 'Report.q26_is_vat_registered' => NULL)));

	       $data['q26_is_vat_registered'] = $this->Report->find('count', array('conditions' => array( 'Report.q26_is_vat_registered' => NULL)));

	       $data['q27_year_vat_registered'] = $this->Report->find('count', array('conditions' => array( 'Report.q26_is_vat_registered' => 1, 'Report.q27_year_vat_registered' => NULL)));

	       
			
	      $this->set(compact('data'));

    	}


		public function search_view($id = null){
			$this -> layout = 'table';
			$this->loadModel('Questionaire');
			
		$this->Questionaire->id = $id;
		if (!$this->Questionaire->exists()) {
			throw new NotFoundException(__('Invalid Questionaire id'));
		}
		#$this->Questionaire->unBindModel(array(belongsTo => array('Book', 'QuesSixCheck','QuesCheck','UnitHeadEconomy','GeoCodeMauza')));
		$questionaires = $this->Questionaire->read(null, $id);

		//pr($data);exit;
		$this->set(compact('questionaires'));
			
		}


		//Search By book
	
	public function search_book ($id = null)
	{

		$this -> layout = 'table';
		$_SESSION["MenuActive"] = 10;
		$this->loadModel('Book');
		$this->loadModel('Questionaire');
		$this->loadModel('Report');
			
		if ($this->request->data['Book']['find_book'] != null){
	            $id = trim($this->request->data['Book']['find_book']);
	            $questionaires = $this->Report->find('all',array('conditions' => array( 'Report.book_id' => $id), 'order' => array('Report.q1_unit_serial_no')));
	            $total = $this->Report->find('count', array('conditions' => array( 'Report.book_id' => $id)));
		} 

			$this->set(compact('questionaires', 'total'));
		}





		public function search_ques(){

			$this -> layout = 'table';
			$_SESSION["MenuActive"] = 9;
			$this->loadModel('Questionaire');
			$this->loadModel('UnitHeadEducation');

            # debug($this->request->data);
			if ($this->request->data['Questionaire']['find_ques'] != null){

	            $id = trim($this->request->data['Questionaire']['find_ques']); 
	            $questionaires = $this->Questionaire->read(null, $id);

	           // pr( $questionaires); exit;

	              $edu_code = $this->UnitHeadEducation->find('all', array(
	              	'conditions'=> array('UnitHeadEducation.id' => $questionaires['Questionaire']['q3_unit_head_education_id'])
     			));
     			

				$this -> set(compact('questionaires', 'edu_code'));
				} 

				
				else if($this -> request -> is('post') && $this->request->data['Questionaire']['ques_id']) {

				$input_data = array();
				
				$input_data['Questionaire']['id'] = $this->request->data['Questionaire']['ques_id'];
	 
	            $input_data['Questionaire']['q2_unit_name'] = $this->request->data['Questionaire']['q2_unit_name'];
	            $input_data['Questionaire']['q2_village_maholla'] = $this->request->data['Questionaire']['q2_village_maholla'];
	            $input_data['Questionaire']['q2_home_market'] = $this->request->data['Questionaire']['q2_home_market'];
	            $input_data['Questionaire']['q2_road_no_name'] = $this->request->data['Questionaire']['q2_road_no_name'];
	            $input_data['Questionaire']['q2_holding_no'] = $this->request->data['Questionaire']['q2_holding_no'];
	            $input_data['Questionaire']['q2_telephone_no'] = $this->request->data['Questionaire']['q2_telephone_no'];
	            $input_data['Questionaire']['q2_fax_no'] = $this->request->data['Questionaire']['q2_fax_no'];
	            $input_data['Questionaire']['q2_email_address'] = $this->request->data['Questionaire']['q2_email_address'];


	            $input_data['Questionaire']['q3_unit_head_gender'] = $this->request->data['Questionaire']['q3_unit_head_gender'];
	           // $input_data['Questionaire']['q3_unit_head_education_id'] = $this->request->data['Questionaire']['q3_unit_head_education_id'];
	            $input_data['Questionaire']['q3_unit_head_age'] = $this->request->data['Questionaire']['q3_unit_head_age'];


	            $input_data['Questionaire']['q4_unit_type'] = $this->request->data['Questionaire']['q4_unit_type'];
	            $input_data['Questionaire']['q4_unit_org_type'] = $this->request->data['Questionaire']['q4_unit_org_type'];
	            $input_data['Questionaire']['q5_unit_head_economy_id'] = $this->request->data['Questionaire']['q5_unit_head_economy_id'];


				$input_data['Questionaire']['q6_economy_description'] = $this->request->data['Questionaire']['q6_economy_description'];
	            $input_data['Questionaire']['q6_ind_code_class_id'] = $this->request->data['Questionaire']['q6_economy_id'];


	            $input_data['Questionaire']['q7_product_id_1'] = $this->request->data['Questionaire']['q7_product_id_1'];
	            $input_data['Questionaire']['q7_product_id_2'] = $this->request->data['Questionaire']['q7_product_id_2'];
	            $input_data['Questionaire']['q7_product_id_3'] = $this->request->data['Questionaire']['q7_product_id_3'];
	            $input_data['Questionaire']['q7_product_id_4'] = $this->request->data['Questionaire']['q7_product_id_4'];


	            $input_data['Questionaire']['q7_product_desc_1'] = $this->request->data['Questionaire']['q7_product_desc_1'];
	            $input_data['Questionaire']['q7_product_desc_2'] = $this->request->data['Questionaire']['q7_product_desc_2'];
	            $input_data['Questionaire']['q7_product_desc_3'] = $this->request->data['Questionaire']['q7_product_desc_3'];
	            $input_data['Questionaire']['q7_product_desc_4'] = $this->request->data['Questionaire']['q7_product_desc_4'];


	            $input_data['Questionaire']['q8_service_id_1'] = $this->request->data['Questionaire']['q8_service_id_1'];
	            $input_data['Questionaire']['q8_service_id_2'] = $this->request->data['Questionaire']['q8_service_id_2'];
	            $input_data['Questionaire']['q8_service_id_3'] = $this->request->data['Questionaire']['q8_service_id_3'];
	            $input_data['Questionaire']['q8_service_id_4'] = $this->request->data['Questionaire']['q8_service_id_4'];


	            $input_data['Questionaire']['q8_service_desc_1'] = $this->request->data['Questionaire']['q8_service_desc_1'];
	            $input_data['Questionaire']['q8_service_desc_2'] = $this->request->data['Questionaire']['q8_service_desc_2'];
	            $input_data['Questionaire']['q8_service_desc_3'] = $this->request->data['Questionaire']['q8_service_desc_3'];
	            $input_data['Questionaire']['q8_service_desc_4'] = $this->request->data['Questionaire']['q8_service_desc_4'];



	            $input_data['Questionaire']['q9_legal_entity_type_id'] = $this->request->data['Questionaire']['q9_legal_entity_type_id'];
	            $input_data['Questionaire']['q10_is_nbr_investment'] = $this->request->data['Questionaire']['q10_is_nbr_investment'];
	            $input_data['Questionaire']['q10_nbr_amount_in_thou'] = $this->request->data['Questionaire']['q10_nbr_amount_in_thou'];
	            $input_data['Questionaire']['q11_is_registered'] = $this->request->data['Questionaire']['q11_is_registered'];
	            $input_data['Questionaire']['q11_registrar_id'] = $this->request->data['Questionaire']['q11_registrar_id'];
	           

	            $input_data['Questionaire']['q12_year_of_start'] = $this->request->data['Questionaire']['q12_year_of_start'];
	            $input_data['Questionaire']['q13_sale_procedure'] = $this->request->data['Questionaire']['q13_sale_procedure'];
	            $input_data['Questionaire']['q14_is_accountable'] = $this->request->data['Questionaire']['q14_is_accountable'];
	            $input_data['Questionaire']['q14_accountable_duration'] = $this->request->data['Questionaire']['q14_accountable_duration'];
	            $input_data['Questionaire']['q15_salary_period'] = $this->request->data['Questionaire']['q15_salary_period'];
	            $input_data['Questionaire']['q16_fixed_capital'] = $this->request->data['Questionaire']['q16_fixed_capital'];
	           
	            
	            $input_data['Questionaire']['q17_hr_male'] = $this->request->data['Questionaire']['q17_hr_male'];
	            $input_data['Questionaire']['q17_hr_female'] = $this->request->data['Questionaire']['q17_hr_female'];

	            $input_data['Questionaire']['q17_hr_male_foc'] = $this->request->data['Questionaire']['q17_hr_male_foc'];
	            $input_data['Questionaire']['q17_hr_female_foc'] = $this->request->data['Questionaire']['q17_hr_female_foc'];

	            $input_data['Questionaire']['q17_hr_male_fulltime'] = $this->request->data['Questionaire']['q17_hr_male_fulltime'];
	            $input_data['Questionaire']['q17_hr_female_fulltime'] = $this->request->data['Questionaire']['q17_hr_female_fulltime'];

 				$input_data['Questionaire']['q17_hr_male_parttime'] = $this->request->data['Questionaire']['q17_hr_male_parttime'];
	            $input_data['Questionaire']['q17_hr_female_parttime'] = $this->request->data['Questionaire']['q17_hr_female_parttime'];

	            $input_data['Questionaire']['q17_hr_male_irregular'] = $this->request->data['Questionaire']['q17_hr_male_irregular'];
	            $input_data['Questionaire']['q17_hr_female_irregular'] = $this->request->data['Questionaire']['q17_hr_female_irregular'];

	            $input_data['Questionaire']['q18_machine_uses'] = $this->request->data['Questionaire']['q18_machine_uses'];
	            $input_data['Questionaire']['q19_marketing'] = $this->request->data['Questionaire']['q19_marketing'];
	            $input_data['Questionaire']['q20_fuel_uses'] = $this->request->data['Questionaire']['q20_fuel_uses'];
	            $input_data['Questionaire']['q21_is_it_enabled'] = $this->request->data['Questionaire']['q21_is_it_enabled'];
	            $input_data['Questionaire']['q22_is_fire_secured'] = $this->request->data['Questionaire']['q22_is_fire_secured'];  
	            $input_data['Questionaire']['q22_is_fire_device_maintained'] = $this->request->data['Questionaire']['q22_is_fire_device_maintained'];
	            $input_data['Questionaire']['q23_is_garbage_proper'] = $this->request->data['Questionaire']['q23_is_garbage_proper'];
	            $input_data['Questionaire']['q24_is_toilet_available'] = $this->request->data['Questionaire']['q24_is_toilet_available'];
	            $input_data['Questionaire']['q24_is_ladies_toilet_available'] = $this->request->data['Questionaire']['q24_is_ladies_toilet_available'];
	            $input_data['Questionaire']['q25_is_tin_registered'] = $this->request->data['Questionaire']['q25_is_tin_registered'];
	            $input_data['Questionaire']['q26_is_vat_registered'] = $this->request->data['Questionaire']['q26_is_vat_registered'];
	            $input_data['Questionaire']['q27_year_vat_registered'] = $this->request->data['Questionaire']['q27_year_vat_registered'];

	            $data = $this -> Questionaire -> save($input_data);

	            if ($data) {
					$this -> Session -> setFlash(__('The Questionaire has been updated'));
					$this -> redirect(array('action' => 'search_ques'));
				} else {
					$this -> Session -> setFlash(__('The Questionaire could not be updated. Please, try again.'));
				} 
			} 
		}


		public function getEconomyDesc() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('UnitHeadEconomy');

		$Desc = $this -> UnitHeadEconomy -> find('list', 
			array('conditions' => array('UnitHeadEconomy.economy_code' => $_REQUEST['economy_code']),
			 'fields' => array('UnitHeadEconomy.economy_desc_bng')));

		echo json_encode($Desc);
	}




public function getMuzaName() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeMauza');
		$this -> loadModel('GeoCodeRmo');
		

		$Books = $this -> Book -> find('all', array('conditions' => array('Book.id =' => $_POST['book_id']), 'fields' => array('Book.geo_code_union_id','Book.geo_code_rmo_id', 'Book.growth_centre')));
		
		
		//$upzila_id = $Books[0]['Book']['geo_code_upazila_id'];
		$union_id = $Books[0]['Book']['geo_code_union_id'];
		//$rmo = $Books[0]['Book']['geo_code_rmo_id'];
		$growth_centre = $Books[0]['Book']['growth_centre'];
		//$rmo = $this -> GeoCodeRmo -> getRmoID($_POST['rmo_code']);
		
		
		if($growth_centre == 1 && $_POST['rmo_code'] == 7)
		{
			$Muzas = $this -> GeoCodeMauza -> find('list', array('conditions' => array('GeoCodeMauza.geo_code_union_id' => $union_id, 'GeoCodeMauza.mauza_code' => $_POST['mauza_code']), 'fields' => array('GeoCodeMauza.mauza_name')));
		}
		else
		{
			$Muzas = $this -> GeoCodeMauza -> find('list', array('conditions' => array('GeoCodeMauza.geo_code_union_id' => $union_id, 'GeoCodeMauza.mauza_code' => $_POST['mauza_code'], /*'GeoCodeMauza.geo_code_rmo_id' => $rmo */), 'fields' => array('GeoCodeMauza.mauza_name')));
		}

		
		echo json_encode($Muzas);

	}
    
// GET RMO NAME
        public function getRmoName() {
        $this -> autoRender = false;
        $this -> layout = false;

        $this -> loadModel('GeoCodeRmo');
        $GeoCodeRmoName = $this -> GeoCodeRmo -> find('list', array('conditions' => array('GeoCodeRmo.rmo_code =' => $_REQUEST['rmo_code']), 'order' => 'GeoCodeRmo.rmo_type_eng'));
        echo json_encode($GeoCodeRmoName);
    }
    
// GET VILLAGE NAME	
	public function getVillageName() {
		
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeMauza');
		$this -> loadModel('GeoCodeVillage');
		

		$Books = $this -> Book -> find('list', array('conditions' => array('Book.id =' => $_REQUEST['book_id']), 'fields' => array('Book.geo_code_union_id')));

		$union_id = $Books[$_REQUEST['book_id']];
		
		$Muzas = $this -> GeoCodeMauza -> find('all', array('conditions' => array('GeoCodeMauza.geo_code_union_id =' => $union_id, 'GeoCodeMauza.mauza_code' => $_REQUEST['mauza_code']), 'fields' => array('GeoCodeMauza.mauza_name','GeoCodeMauza.id' )));
		
		$muzaId = $Muzas[0]['GeoCodeMauza']['id'];
		
		$village = $this->GeoCodeVillage->find('all', array('conditions' => array('muza_id' =>$muzaId),
		'fields' => array('GeoCodeVillage.id','GeoCodeVillage.village_name')));
		
		$options = array();
		foreach ($village as $key => $value) {
			$options[$value['GeoCodeVillage']['village_name']] = $value['GeoCodeVillage']['village_name'];
		}
		$this->Session->write('village_options', $options);
		
		echo json_encode($village);

	}


// GET UNIT NO
	public function getUnitNumber() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeMauza');

		$unitNo = $this -> Questionaire -> find('list', array('conditions' => array('book_id =' => $_REQUEST['book_id'], 'q1_unit_serial_no' => $_REQUEST['unit_number']), 'fields' => array('q1_unit_serial_no')));

		echo json_encode($unitNo);

	}

    // Education Description Starts here. SECTION :3.2

    public function getEductionDesc() {
        $this -> autoRender = false;
        $this -> layout = false;

        $this -> loadModel('UnitHeadEducation');

        $EducationDesc = $this -> UnitHeadEducation -> find('list', array('conditions' => array('UnitHeadEducation.education_code' => $_REQUEST['education_code']), 'fields' => array('UnitHeadEducation.education_desc_bng')));

        echo json_encode($EducationDesc);

    }



	//Q6EconomyDescription Starts Here SECTION :6

	public function getEconomyDetails() {
		$this -> autoRender = false;
		$this -> layout = false;

		//$this->loadModel('Book');

		$this -> loadModel('IndCodeClass');

		$Desc = $this -> IndCodeClass -> find('list', array('conditions' => array('IndCodeClass.class_code' => $_REQUEST['class_code']), 'fields' => array('IndCodeClass.class_code_desc_bng')));

		echo json_encode($Desc);

	}

	//Q7 EconomyDescription Starts Here SECTION :7
	
	public function getProductDesc() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('ProdCodeSubClass');

		$ProdCodeSubClass = $this -> ProdCodeSubClass -> find('list', array('conditions' => array('ProdCodeSubClass.sub_class_code' => $_REQUEST['sub_class_code']), 'fields' => array('ProdCodeSubClass.sub_class_desc_bng')));

		echo json_encode($ProdCodeSubClass);

	}
}
