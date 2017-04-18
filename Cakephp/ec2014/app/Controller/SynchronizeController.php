<?php
App::uses('AppController', 'Controller');

class SynchronizeController extends AppController {

	public function index() {
		$_SESSION["MenuActive"] = 4;
		$this -> loadModel('BookServer');
		$this -> loadModel('QuesServer');
		$this -> loadModel('QuesCheckServer');
		//$this->loadModel('QuesSixCheckServer');

		$this -> loadModel('Book');
		$this -> loadModel('Questionaire');
		$this -> loadModel('QuesCheck');
		//$this->loadModel('QuesSixCheck');

		$user_id = $this -> Session -> read('Authake.id');

		$serverBooks = $this -> BookServer -> find('count', array('conditions' => array('BookServer.ENTRY_BY' => $user_id)));
		$serverQues = $this -> QuesServer -> find('count', array('conditions' => array('QuesServer.ENTRY_BY' => $user_id)));
		$serverQCheck = $this -> QuesCheckServer -> find('count', array('conditions' => array('QuesCheckServer.QUES_ENTRY_BY' => $user_id)));

		$books = $this -> Book -> find('count', array('conditions' => array('Book.sync_required' => '1')));

		$Questionaires = $this -> Questionaire -> find('count', array('conditions' => array('Questionaire.sync_required' => '1')));

		$q_All = $this -> QuesCheck -> find('count', array('conditions' => array('QuesCheck.sync_required' => '1')));

		$localToServer = $books + $Questionaires + $q_All;

		$serverToLocal = $serverBooks + $serverQues + $serverQCheck;

		$this -> set(compact('localToServer', 'serverToLocal'));
	}

	public function localToServer() {
		$_SESSION["MenuActive"] = 4;

		$db = get_class_vars('DATABASE_CONFIG');

		$conn = oci_connect($db['bbsserver']['login'], $db['bbsserver']['password'], $db['bbsserver']['database']);

		if (!$conn) {
			$m = oci_error();
			$this -> Session -> setFlash(__('Failed to connect with server. ' . $m['message']));
			$this -> redirect(array('controller' => 'Synchronize', 'action' => 'index'));

		} else {
			$booksMsg = $this -> _books_sync($conn);
			$quesMsg = $this -> _ques_sync($conn);
			$quesCheck = $this -> _ques_checks_sync($conn);

		}
		$this -> set(compact('booksMsg', 'quesMsg', 'quesCheck'));
	}

	function _books_sync($conn) {
		$this -> loadModel('Book');
		$this -> loadModel('Authake.User');

		$user_id = $this -> Session -> read('Authake.id');

		$users = $this -> User -> find('all', array('conditions' => array('User.id' => $user_id)));
		$users = $users[0];
		$msg = "";
		//FETCH DATA FROM BOOKS===========================================================
		$this -> Book -> unbindModel(array('belongsTo' => array('GeoCodeDivn', 'GeoCodeZila', 'GeoCodeUpazila', 'GeoCodeRmo', 'GeoCodePsa', 'GeoCodeUnion')));

		$books = $this -> Book -> find('all', array('conditions' => array('Book.sync_required' => '1')));

		$sql = 'BEGIN BBS_BOOKS(:P_ID, :P_GEO_CODE_DIVN_ID, :P_GEO_CODE_ZILA_ID, :P_GEO_CODE_UPAZILA_ID, :P_GEO_CODE_RMO_ID, :P_GEO_CODE_PSA_ID, :P_GEO_CODE_UNION_ID, :P_ENTRY_BY, :P_UPDATE_BY, :P_CREATED, :P_MODIFIED, :P_SYNC_REQUIRED, :P_GROWTH_CENTRE, :P_AREA_ID, :P_USER_ID, :P_USER_PASSWORD, :P_RESULT, :P_MESSAGE); END;';

		//END OF FETCH DATA FROM BOOKS===========================================================

		$i = 0;

		foreach ($books as $key => $book) {

			++$i;

			$stmt = oci_parse($conn, $sql);

			//  Bind the input parameter
			oci_bind_by_name($stmt, ':P_ID', $P_ID, 20);
			oci_bind_by_name($stmt, ':P_GEO_CODE_DIVN_ID', $P_GEO_CODE_DIVN_ID, 11);
			oci_bind_by_name($stmt, ':P_GEO_CODE_ZILA_ID', $P_GEO_CODE_ZILA_ID, 11);
			oci_bind_by_name($stmt, ':P_GEO_CODE_UPAZILA_ID', $P_GEO_CODE_UPAZILA_ID, 11);
			oci_bind_by_name($stmt, ':P_GEO_CODE_RMO_ID', $P_GEO_CODE_RMO_ID, 11);
			oci_bind_by_name($stmt, ':P_GEO_CODE_PSA_ID', $P_GEO_CODE_PSA_ID, 11);
			oci_bind_by_name($stmt, ':P_GEO_CODE_UNION_ID', $P_GEO_CODE_UNION_ID, 20);
			oci_bind_by_name($stmt, ':P_ENTRY_BY', $P_ENTRY_BY, 11);
			oci_bind_by_name($stmt, ':P_UPDATE_BY', $P_UPDATE_BY, 11);
			oci_bind_by_name($stmt, ':P_CREATED', $P_CREATED, 20);
			oci_bind_by_name($stmt, ':P_MODIFIED', $P_MODIFIED, 20);
			oci_bind_by_name($stmt, ':P_SYNC_REQUIRED', $P_SYNC_REQUIRED, 1);
			oci_bind_by_name($stmt, ':P_GROWTH_CENTRE', $P_GROWTH_CENTRE, 1);
			oci_bind_by_name($stmt, ':P_AREA_ID', $P_AREA_ID, 2);
			oci_bind_by_name($stmt, ':P_USER_ID', $P_USER_ID, 10);
			oci_bind_by_name($stmt, ':P_USER_PASSWORD', $P_USER_PASSWORD, 50);

			// Bind the output parameter
			oci_bind_by_name($stmt, ':P_RESULT', $P_RESULT, 1);
			oci_bind_by_name($stmt, ':P_MESSAGE', $P_MESSAGE, 50);

			$P_USER_ID = $user_id;
			$P_USER_PASSWORD = $users['User']['password'];

			$P_ID = $book['Book']['id'];
			$P_GEO_CODE_DIVN_ID = $book['Book']['geo_code_divn_id'];
			$P_GEO_CODE_ZILA_ID = $book['Book']['geo_code_zila_id'];
			$P_GEO_CODE_UPAZILA_ID = $book['Book']['geo_code_upazila_id'];
			$P_GEO_CODE_RMO_ID = $book['Book']['geo_code_rmo_id'];
			$P_GEO_CODE_PSA_ID = $book['Book']['geo_code_psa_id'];
			$P_GEO_CODE_UNION_ID = $book['Book']['geo_code_union_id'];
			$P_ENTRY_BY = $book['Book']['entry_by'];
			$P_UPDATE_BY = $book['Book']['update_by'];
			$P_CREATED = (string)$book['Book']['created'];
			$P_MODIFIED = (string)$book['Book']['modified'];
			$P_SYNC_REQUIRED = 0;
			$P_GROWTH_CENTRE = $book['Book']['growth_centre'];
			$P_AREA_ID = $book['Book']['area_id'];

			//echo $P_MODIFIED; exit;

			oci_execute($stmt, OCI_DEFAULT);

			if ($P_RESULT == 1) {
				$BookData = array('Book' => array('id' => $book['Book']['id'], 'sync_required' => '0', 'update_by' => $user_id));

				if ($this -> Book -> saveAll($BookData)) {
					oci_commit($conn);
					$msg .= "<br />Record: " . $i . ", Status: " . $P_MESSAGE;
				} else {
					oci_rollback($conn);
					$msg .= "<br />Record: " . $i . ", Status: Failed to update local Database";
				}

			} else {
				oci_rollback($conn);
				$msg .= "<br />Record: " . $i . ", Status: " . $P_MESSAGE;
			}
			oci_free_statement($stid);
			unset($BookData);
		}

		return $msg;

	}

	function _ques_sync($conn) {

		$this -> loadModel('Questionaire');
		$this -> loadModel('Authake.User');

		$user_id = $this -> Session -> read('Authake.id');

		$users = $this -> User -> find('all', array('conditions' => array('User.id' => $user_id)));
		$users = $users[0];
		$msg = "";

		//FETCH DATA FROM QUESTIONIARE===================
		$this -> Questionaire -> unbindModel(array('belongsTo' => array('Book')));

		$Questionaires = $this -> Questionaire -> find('all', array('conditions' => array('Questionaire.sync_required' => '1')));

		$sql = 'BEGIN BBS_QUESTIONAIRES(
						:P_ID, 
						:P_BOOK_ID, 
						:P_Q1_GEO_CODE_MAUZA_NAME, 
						:P_Q1_GEO_CODE_MAUZA_ID, 
						:P_Q1_UNIT_SERIAL_NO, 
						:P_Q2_UNIT_NAME,
						:P_Q2_VILLAGE_MAHOLLA, 
						:P_Q2_HOME_MARKET, 
						:P_Q2_ROAD_NO_NAME, 
						:P_Q2_HOLDING_NO, 
						:P_Q2_TELEPHONE_NO, 
						:P_Q2_FAX_NO, 
						:P_Q2_EMAIL_ADDRESS, 
						:P_Q3_UNIT_HEAD_GENDER, 
						:P_Q3_UNIT_HEAD_EDUCATION_ID, 
						:P_Q3_UNIT_HEAD_AGE, 
						:P_Q4_UNIT_TYPE, 
						:P_Q4_UNIT_ORG_TYPE, 
						:P_Q5_UNIT_HEAD_ECONOMY_ID, 
						:P_Q6_ECONOMY_DESCRIPTION, 
						:P_Q6_IND_CODE_CLASS_ID, 
						:P_Q7_PRODUCT_DESC_1, 
						:P_Q7_PRODUCT_ID_1, 
						:P_Q7_PRODUCT_DESC_2, 
						:P_Q7_PRODUCT_ID_2, 
						:P_Q7_PRODUCT_DESC_3, 
						:P_Q7_PRODUCT_ID_3, 
						:P_Q7_PRODUCT_DESC_4, 
						:P_Q7_PRODUCT_ID_4,
						:P_Q8_SERVICE_DESC_1, 
						:P_Q8_SERVICE_ID_1, 
						:P_Q8_SERVICE_DESC_2, 
						:P_Q8_SERVICE_ID_2, 
						:P_Q8_SERVICE_DESC_3, 
						:P_Q8_SERVICE_ID_3, 
						:P_Q8_SERVICE_DESC_4, 
						:P_Q8_SERVICE_ID_4,
						:P_Q9_LEGAL_ENTITY_TYPE_ID, 
						:P_Q10_IS_NBR_INVESTMENT,
						:P_Q10_NBR_AMOUNT_IN_THOU,
						:P_Q11_IS_REGISTERED,
						:P_Q11_REGISTRAR_ID,
						:P_Q12_YEAR_OF_START, 
						:P_Q13_SALE_PROCEDURE,
						:P_Q14_IS_ACCOUNTABLE,
						:P_Q14_ACCOUNTABLE_DURATION, 
						:P_Q15_SALARY_INSTR,
						:P_Q15_SALARY_PERIOD,
						:P_Q16_FIXED_CAPITAL,
						:P_Q17_HR_MALE,
						:P_Q17_HR_FEMALE,
						:P_Q17_HR_MALE_FOC,
						:P_Q17_HR_FEMALE_FOC,
						:P_Q17_HR_MALE_FULLTIME,
						:P_Q17_HR_FEMALE_FULLTIME,
						:P_Q17_HR_MALE_PARTTIME,
						:P_Q17_HR_FEMALE_PARTTIME,
						:P_Q17_HR_MALE_IRREGULAR,
						:P_Q17_HR_FEMALE_IRREGULAR,
						:P_Q18_MACHINE_USES,
						:P_Q19_MARKETING,
						:P_Q20_FUEL_USES,
						:P_Q21_IS_IT_ENABLED,
						:P_Q22_IS_FIRE_SECURED,
						:P_Q22_IS_FIRE_DEVICE_MAINTAI,
						:P_Q23_IS_GARBAGE_PROPER,
						:P_Q24_IS_TOILET_AVAILABLE,
						:P_Q24_IS_LADIES_TOILET_AVAILA, 						
						:P_Q25_IS_TIN_REGISTERED,
						:P_Q26_IS_VAT_REGISTERED,
						:P_Q27_YEAR_VAT_REGISTERED,
						:P_ENTRY_BY,
						:P_UPDATE_BY,
						:P_CREATED,
						:P_MODIFIED,
						:P_SYNC_REQUIRED,
						:P_RMO_CODE,
						:P_IS_OUT_OF_SCOPE,	
						:P_USER_ID, 
						:P_USER_PASSWORD,
						:P_RESULT, 
						:P_MESSAGE); END;';

		//END OF FETCH DATA FROM QUESTIONIARE======================

		$i = 0;

		foreach ($Questionaires as $key => $Questionaire) {
			//pr($Questionaire); exit;
			++$i;

			$stmt = oci_parse($conn, $sql);

			//  Bind the input parameter
			oci_bind_by_name($stmt, ':P_ID', $P_ID, 20);
			oci_bind_by_name($stmt, ':P_BOOK_ID', $P_BOOK_ID, 20);

			oci_bind_by_name($stmt, ':P_Q1_GEO_CODE_MAUZA_NAME', $P_Q1_GEO_CODE_MAUZA_NAME, 150);
			oci_bind_by_name($stmt, ':P_Q1_GEO_CODE_MAUZA_ID', $P_Q1_GEO_CODE_MAUZA_ID, 20);
			oci_bind_by_name($stmt, ':P_Q1_UNIT_SERIAL_NO', $P_Q1_UNIT_SERIAL_NO, 3);

			oci_bind_by_name($stmt, ':P_Q2_UNIT_NAME', $P_Q2_UNIT_NAME, 150);
			oci_bind_by_name($stmt, ':P_Q2_VILLAGE_MAHOLLA', $P_Q2_VILLAGE_MAHOLLA, 150);
			oci_bind_by_name($stmt, ':P_Q2_HOME_MARKET', $P_Q2_HOME_MARKET, 150);
			oci_bind_by_name($stmt, ':P_Q2_ROAD_NO_NAME', $P_Q2_ROAD_NO_NAME, 150);
			oci_bind_by_name($stmt, ':P_Q2_HOLDING_NO', $P_Q2_HOLDING_NO, 150);

			oci_bind_by_name($stmt, ':P_Q2_TELEPHONE_NO', $P_Q2_TELEPHONE_NO, 100);
			oci_bind_by_name($stmt, ':P_Q2_FAX_NO', $P_Q2_FAX_NO, 100);
			oci_bind_by_name($stmt, ':P_Q2_EMAIL_ADDRESS', $P_Q2_EMAIL_ADDRESS, 100);

			oci_bind_by_name($stmt, ':P_Q3_UNIT_HEAD_GENDER', $P_Q3_UNIT_HEAD_GENDER, 4);
			oci_bind_by_name($stmt, ':P_Q3_UNIT_HEAD_EDUCATION_ID', $P_Q3_UNIT_HEAD_EDUCATION_ID, 11);
			oci_bind_by_name($stmt, ':P_Q3_UNIT_HEAD_AGE', $P_Q3_UNIT_HEAD_AGE, 2);

			oci_bind_by_name($stmt, ':P_Q4_UNIT_TYPE', $P_Q4_UNIT_TYPE, 1);
			oci_bind_by_name($stmt, ':P_Q4_UNIT_ORG_TYPE', $P_Q4_UNIT_ORG_TYPE, 1);

			oci_bind_by_name($stmt, ':P_Q5_UNIT_HEAD_ECONOMY_ID', $P_Q5_UNIT_HEAD_ECONOMY_ID, 2);

			oci_bind_by_name($stmt, ':P_Q6_ECONOMY_DESCRIPTION', $P_Q6_ECONOMY_DESCRIPTION, 1000);
			oci_bind_by_name($stmt, ':P_Q6_IND_CODE_CLASS_ID', $P_Q6_IND_CODE_CLASS_ID, 11);

			oci_bind_by_name($stmt, ':P_Q7_PRODUCT_DESC_1', $P_Q7_PRODUCT_DESC_1, 1000);
			oci_bind_by_name($stmt, ':P_Q7_PRODUCT_ID_1', $P_Q7_PRODUCT_ID_1, 11);
			oci_bind_by_name($stmt, ':P_Q7_PRODUCT_DESC_2', $P_Q7_PRODUCT_DESC_2, 1000);
			oci_bind_by_name($stmt, ':P_Q7_PRODUCT_ID_2', $P_Q7_PRODUCT_ID_2, 11);
			oci_bind_by_name($stmt, ':P_Q7_PRODUCT_DESC_3', $P_Q7_PRODUCT_DESC_3, 1000);
			oci_bind_by_name($stmt, ':P_Q7_PRODUCT_ID_3', $P_Q7_PRODUCT_ID_3, 11);
			oci_bind_by_name($stmt, ':P_Q7_PRODUCT_DESC_4', $P_Q7_PRODUCT_DESC_4, 1000);
			oci_bind_by_name($stmt, ':P_Q7_PRODUCT_ID_4', $P_Q7_PRODUCT_ID_4, 11);

			oci_bind_by_name($stmt, ':P_Q8_SERVICE_DESC_1', $P_Q8_SERVICE_DESC_1, 1000);
			oci_bind_by_name($stmt, ':P_Q8_SERVICE_ID_1', $P_Q8_SERVICE_ID_1, 11);
			oci_bind_by_name($stmt, ':P_Q8_SERVICE_DESC_2', $P_Q8_SERVICE_DESC_2, 1000);
			oci_bind_by_name($stmt, ':P_Q8_SERVICE_ID_2', $P_Q8_SERVICE_ID_2, 11);
			oci_bind_by_name($stmt, ':P_Q8_SERVICE_DESC_3', $P_Q8_SERVICE_DESC_3, 1000);
			oci_bind_by_name($stmt, ':P_Q8_SERVICE_ID_3', $P_Q8_SERVICE_ID_3, 11);
			oci_bind_by_name($stmt, ':P_Q8_SERVICE_DESC_4', $P_Q8_SERVICE_DESC_4, 1000);
			oci_bind_by_name($stmt, ':P_Q8_SERVICE_ID_4', $P_Q8_SERVICE_ID_4, 11);

			oci_bind_by_name($stmt, ':P_Q9_LEGAL_ENTITY_TYPE_ID', $P_Q9_LEGAL_ENTITY_TYPE_ID, 11);

			oci_bind_by_name($stmt, ':P_Q10_IS_NBR_INVESTMENT', $P_Q10_IS_NBR_INVESTMENT, 1);
			oci_bind_by_name($stmt, ':P_Q10_NBR_AMOUNT_IN_THOU', $P_Q10_NBR_AMOUNT_IN_THOU, 7);

			oci_bind_by_name($stmt, ':P_Q11_IS_REGISTERED', $P_Q11_IS_REGISTERED, 1);
			oci_bind_by_name($stmt, ':P_Q11_REGISTRAR_ID', $P_Q11_REGISTRAR_ID, 11);

			oci_bind_by_name($stmt, ':P_Q12_YEAR_OF_START', $P_Q12_YEAR_OF_START, 4);

			oci_bind_by_name($stmt, ':P_Q13_SALE_PROCEDURE', $P_Q13_SALE_PROCEDURE, 1);

			oci_bind_by_name($stmt, ':P_Q14_IS_ACCOUNTABLE', $P_Q14_IS_ACCOUNTABLE, 1);
			oci_bind_by_name($stmt, ':P_Q14_ACCOUNTABLE_DURATION', $P_Q14_ACCOUNTABLE_DURATION, 1);

			oci_bind_by_name($stmt, ':P_Q15_SALARY_INSTR', $P_Q15_SALARY_INSTR, 1);
			oci_bind_by_name($stmt, ':P_Q15_SALARY_PERIOD', $P_Q15_SALARY_PERIOD, 1);

			oci_bind_by_name($stmt, ':P_Q16_FIXED_CAPITAL', $P_Q16_FIXED_CAPITAL, 1);

			oci_bind_by_name($stmt, ':P_Q17_HR_MALE', $P_Q17_HR_MALE, 2);
			oci_bind_by_name($stmt, ':P_Q17_HR_FEMALE', $P_Q17_HR_FEMALE, 2);
			oci_bind_by_name($stmt, ':P_Q17_HR_MALE_FOC', $P_Q17_HR_MALE_FOC, 2);
			oci_bind_by_name($stmt, ':P_Q17_HR_FEMALE_FOC', $P_Q17_HR_FEMALE_FOC, 2);
			oci_bind_by_name($stmt, ':P_Q17_HR_MALE_FULLTIME', $P_Q17_HR_MALE_FULLTIME, 4);
			oci_bind_by_name($stmt, ':P_Q17_HR_FEMALE_FULLTIME', $P_Q17_HR_FEMALE_FULLTIME, 4);
			oci_bind_by_name($stmt, ':P_Q17_HR_MALE_PARTTIME', $P_Q17_HR_MALE_PARTTIME, 3);
			oci_bind_by_name($stmt, ':P_Q17_HR_FEMALE_PARTTIME', $P_Q17_HR_FEMALE_PARTTIME, 3);
			oci_bind_by_name($stmt, ':P_Q17_HR_MALE_IRREGULAR', $P_Q17_HR_MALE_IRREGULAR, 2);
			oci_bind_by_name($stmt, ':P_Q17_HR_FEMALE_IRREGULAR', $P_Q17_HR_FEMALE_IRREGULAR, 2);

			oci_bind_by_name($stmt, ':P_Q18_MACHINE_USES', $P_Q18_MACHINE_USES, 1);

			oci_bind_by_name($stmt, ':P_Q19_MARKETING', $P_Q19_MARKETING, 1);

			oci_bind_by_name($stmt, ':P_Q20_FUEL_USES', $P_Q20_FUEL_USES, 1);

			oci_bind_by_name($stmt, ':P_Q21_IS_IT_ENABLED', $P_Q21_IS_IT_ENABLED, 1);

			oci_bind_by_name($stmt, ':P_Q22_IS_FIRE_SECURED', $P_Q22_IS_FIRE_SECURED, 1);
			oci_bind_by_name($stmt, ':P_Q22_IS_FIRE_DEVICE_MAINTAI', $P_Q22_IS_FIRE_DEVICE_MAINTAI, 1);

			oci_bind_by_name($stmt, ':P_Q23_IS_GARBAGE_PROPER', $P_Q23_IS_GARBAGE_PROPER, 1);

			oci_bind_by_name($stmt, ':P_Q24_IS_TOILET_AVAILABLE', $P_Q24_IS_TOILET_AVAILABLE, 1);
			oci_bind_by_name($stmt, ':P_Q24_IS_LADIES_TOILET_AVAILA', $P_Q24_IS_LADIES_TOILET_AVAILA, 1);

			oci_bind_by_name($stmt, ':P_Q25_IS_TIN_REGISTERED', $P_Q25_IS_TIN_REGISTERED, 1);

			oci_bind_by_name($stmt, ':P_Q26_IS_VAT_REGISTERED', $P_Q26_IS_VAT_REGISTERED, 1);
			oci_bind_by_name($stmt, ':P_Q27_YEAR_VAT_REGISTERED', $P_Q27_YEAR_VAT_REGISTERED, 4);

			oci_bind_by_name($stmt, ':P_ENTRY_BY', $P_ENTRY_BY, 11);
			oci_bind_by_name($stmt, ':P_UPDATE_BY', $P_UPDATE_BY, 11);
			oci_bind_by_name($stmt, ':P_CREATED', $P_CREATED, 20);
			oci_bind_by_name($stmt, ':P_MODIFIED', $P_MODIFIED, 20);
			oci_bind_by_name($stmt, ':P_SYNC_REQUIRED', $P_SYNC_REQUIRED, 1);
			oci_bind_by_name($stmt, ':P_RMO_CODE', $P_RMO_CODE, 1);
			oci_bind_by_name($stmt, ':P_IS_OUT_OF_SCOPE', $P_IS_OUT_OF_SCOPE, 1);

			oci_bind_by_name($stmt, ':P_USER_ID', $P_USER_ID, 10);
			oci_bind_by_name($stmt, ':P_USER_PASSWORD', $P_USER_PASSWORD, 50);

			// Bind the output parameter
			oci_bind_by_name($stmt, ':P_RESULT', $P_RESULT, 1);
			oci_bind_by_name($stmt, ':P_MESSAGE', $P_MESSAGE, 50);

			$P_ID = $Questionaire['Questionaire']['id'];

			$P_BOOK_ID = $Questionaire['Questionaire']['book_id'];

			$P_Q1_GEO_CODE_MAUZA_NAME = $Questionaire['Questionaire']['q1_geo_code_mauza_name'];
			$P_Q1_GEO_CODE_MAUZA_ID = $Questionaire['Questionaire']['q1_geo_code_mauza_id'];
			$P_Q1_UNIT_SERIAL_NO = $Questionaire['Questionaire']['q1_unit_serial_no'];

			$P_Q2_UNIT_NAME = $Questionaire['Questionaire']['q2_unit_name'];
			$P_Q2_VILLAGE_MAHOLLA = $Questionaire['Questionaire']['q2_village_maholla'];

			$P_Q2_HOME_MARKET = $Questionaire['Questionaire']['q2_home_market'];
			$P_Q2_ROAD_NO_NAME = $Questionaire['Questionaire']['q2_road_no_name'];
			$P_Q2_HOLDING_NO = $Questionaire['Questionaire']['q2_holding_no'];
			$P_Q2_TELEPHONE_NO = $Questionaire['Questionaire']['q2_telephone_no'];
			$P_Q2_FAX_NO = $Questionaire['Questionaire']['q2_fax_no'];
			$P_Q2_EMAIL_ADDRESS = $Questionaire['Questionaire']['q2_email_address'];

			$P_Q3_UNIT_HEAD_GENDER = $Questionaire['Questionaire']['q3_unit_head_gender'];
			$P_Q3_UNIT_HEAD_EDUCATION_ID = $Questionaire['Questionaire']['q3_unit_head_education_id'];
			$P_Q3_UNIT_HEAD_AGE = $Questionaire['Questionaire']['q3_unit_head_age'];

			$P_Q4_UNIT_TYPE = $Questionaire['Questionaire']['q4_unit_type'];
			$P_Q4_UNIT_ORG_TYPE = $Questionaire['Questionaire']['q4_unit_org_type'];

			$P_Q5_UNIT_HEAD_ECONOMY_ID = $Questionaire['Questionaire']['q5_unit_head_economy_id'];

			$P_Q6_ECONOMY_DESCRIPTION = $Questionaire['Questionaire']['q6_economy_description'];
			$P_Q6_IND_CODE_CLASS_ID = $Questionaire['Questionaire']['q6_ind_code_class_id'];
			$P_Q7_PRODUCT_DESC_1 = $Questionaire['Questionaire']['q7_product_desc_1'];
			$P_Q7_PRODUCT_ID_1 = $Questionaire['Questionaire']['q7_product_id_1'];
			$P_Q7_PRODUCT_DESC_2 = $Questionaire['Questionaire']['q7_product_desc_2'];
			$P_Q7_PRODUCT_ID_2 = $Questionaire['Questionaire']['q7_product_id_2'];
			$P_Q7_PRODUCT_DESC_3 = $Questionaire['Questionaire']['q7_product_desc_3'];
			$P_Q7_PRODUCT_ID_3 = $Questionaire['Questionaire']['q7_product_id_3'];
			$P_Q7_PRODUCT_DESC_4 = $Questionaire['Questionaire']['q7_product_desc_4'];
			$P_Q7_PRODUCT_ID_4 = $Questionaire['Questionaire']['q7_product_id_4'];

			$P_Q8_SERVICE_DESC_1 = $Questionaire['Questionaire']['q8_service_desc_1'];
			$P_Q8_SERVICE_ID_1 = $Questionaire['Questionaire']['q8_service_id_1'];
			$P_Q8_SERVICE_DESC_2 = $Questionaire['Questionaire']['q8_service_desc_2'];
			$P_Q8_SERVICE_ID_2 = $Questionaire['Questionaire']['q8_service_id_2'];
			$P_Q8_SERVICE_DESC_3 = $Questionaire['Questionaire']['q8_service_desc_3'];
			$P_Q8_SERVICE_ID_3 = $Questionaire['Questionaire']['q8_service_id_3'];
			$P_Q8_SERVICE_DESC_4 = $Questionaire['Questionaire']['q8_service_desc_4'];
			$P_Q8_SERVICE_ID_4 = $Questionaire['Questionaire']['q8_service_id_4'];

			$P_Q9_LEGAL_ENTITY_TYPE_ID = $Questionaire['Questionaire']['q9_legal_entity_type_id'];

			$P_Q10_IS_NBR_INVESTMENT = $Questionaire['Questionaire']['q10_is_nbr_investment'];
			$P_Q10_NBR_AMOUNT_IN_THOU = $Questionaire['Questionaire']['q10_nbr_amount_in_thou'];

			$P_Q11_IS_REGISTERED = $Questionaire['Questionaire']['q11_is_registered'];
			$P_Q11_REGISTRAR_ID = $Questionaire['Questionaire']['q11_registrar_id'];

			$P_Q12_YEAR_OF_START = $Questionaire['Questionaire']['q12_year_of_start'];
			$P_Q13_SALE_PROCEDURE = $Questionaire['Questionaire']['q13_sale_procedure'];

			$P_Q14_IS_ACCOUNTABLE = $Questionaire['Questionaire']['q14_is_accountable'];
			$P_Q14_ACCOUNTABLE_DURATION = $Questionaire['Questionaire']['q14_accountable_duration'];
			$P_Q15_SALARY_INSTR = $Questionaire['Questionaire']['q15_salary_instr'];
			$P_Q15_SALARY_PERIOD = $Questionaire['Questionaire']['q15_salary_period'];

			$P_Q16_FIXED_CAPITAL = $Questionaire['Questionaire']['q16_fixed_capital'];

			$P_Q17_HR_MALE = $Questionaire['Questionaire']['q17_hr_male'];
			$P_Q17_HR_FEMALE = $Questionaire['Questionaire']['q17_hr_female'];
			$P_Q17_HR_MALE_FOC = $Questionaire['Questionaire']['q17_hr_male_foc'];
			$P_Q17_HR_FEMALE_FOC = $Questionaire['Questionaire']['q17_hr_female_foc'];
			$P_Q17_HR_MALE_FULLTIME = $Questionaire['Questionaire']['q17_hr_male_fulltime'];
			$P_Q17_HR_FEMALE_FULLTIME = $Questionaire['Questionaire']['q17_hr_female_fulltime'];
			$P_Q17_HR_MALE_PARTTIME = $Questionaire['Questionaire']['q17_hr_male_parttime'];
			$P_Q17_HR_FEMALE_PARTTIME = $Questionaire['Questionaire']['q17_hr_female_parttime'];
			$P_Q17_HR_MALE_IRREGULAR = $Questionaire['Questionaire']['q17_hr_male_irregular'];
			$P_Q17_HR_FEMALE_IRREGULAR = $Questionaire['Questionaire']['q17_hr_female_irregular'];

			$P_Q18_MACHINE_USES = $Questionaire['Questionaire']['q18_machine_uses'];

			$P_Q19_MARKETING = $Questionaire['Questionaire']['q19_marketing'];

			$P_Q20_FUEL_USES = $Questionaire['Questionaire']['q20_fuel_uses'];

			$P_Q21_IS_IT_ENABLED = $Questionaire['Questionaire']['q21_is_it_enabled'];

			$P_Q22_IS_FIRE_SECURED = $Questionaire['Questionaire']['q22_is_fire_secured'];
			$P_Q22_IS_FIRE_DEVICE_MAINTAI = $Questionaire['Questionaire']['q22_is_fire_device_maintained'];

			$P_Q23_IS_GARBAGE_PROPER = $Questionaire['Questionaire']['q23_is_garbage_proper'];

			$P_Q24_IS_TOILET_AVAILABLE = $Questionaire['Questionaire']['q24_is_toilet_available'];
			$P_Q24_IS_LADIES_TOILET_AVAILA = $Questionaire['Questionaire']['q24_is_ladies_toilet_available'];

			$P_Q25_IS_TIN_REGISTERED = $Questionaire['Questionaire']['q25_is_tin_registered'];

			$P_Q26_IS_VAT_REGISTERED = $Questionaire['Questionaire']['q26_is_vat_registered'];

			$P_Q27_YEAR_VAT_REGISTERED = $Questionaire['Questionaire']['q27_year_vat_registered'];

			$P_RMO_CODE = $Questionaire['Questionaire']['rmo_code'];
			$P_IS_OUT_OF_SCOPE = (int)$Questionaire['Questionaire']['is_out_of_scope'];

			$P_ENTRY_BY = $Questionaire['Questionaire']['entry_by'];
			$P_UPDATE_BY = $Questionaire['Questionaire']['update_by'];
			$P_CREATED = $Questionaire['Questionaire']['created'];
			$P_MODIFIED = $Questionaire['Questionaire']['modified'];
			$P_SYNC_REQUIRED = 0;
			$P_USER_ID = $user_id;
			$P_USER_PASSWORD = $users['User']['password'];

			oci_execute($stmt, OCI_DEFAULT);

			if ($P_RESULT == 1) {

				$QuesData = array('Questionaire' => array('id' => $Questionaire['Questionaire']['id'], 'sync_required' => '0', 'update_by' => $user_id));

				if ($this -> Questionaire -> saveAll($QuesData)) {
					oci_commit($conn);
					$msg .= "<br />Record: " . $i . ", Status: " . $P_MESSAGE;
				} else {
					oci_rollback($conn);
					$msg .= "<br />Record: " . $i . ", Status: Failed to update local Database";
				}

			} else {
				oci_rollback($conn);
				$msg .= "<br />Record: " . $i . ", Status: " . $P_MESSAGE;
			}

			oci_free_statement($stid);
			unset($QuesData);
		}
		return $msg;
	}

	function _ques_checks_sync($conn) {

		$this -> loadModel('QuesCheck');
		$this -> loadModel('Authake.User');

		$user_id = $this -> Session -> read('Authake.id');

		$users = $this -> User -> find('all', array('conditions' => array('User.id' => $user_id)));
		$users = $users[0];

		$msg = "";

		$this -> QuesCheck -> unbindModel(array('belongsTo' => array('Questionaire')));

		$quesChks = $this -> QuesCheck -> find('all', array('conditions' => array('QuesCheck.sync_required' => '1')));

		$sql = 'BEGIN BBS_QUES_CHECKS(:P_QUESTIONAIRE_ID, :P_ERROR_NOTE, :P_ENTRY_BY, 	
			:P_OPERATOR_CHK, :P_UPDATED_BY, :P_OPERATOR_NOTE, :P_CREATED, :P_MODIFIED, :P_SYNC_REQUIRED, :P_USER_ID, :P_USER_PASSWORD, :P_RESULT, :P_MESSAGE); END;';

		//END OF FETCH DATA FROM BOOKS===========================================================

		$i = 0;

		foreach ($quesChks as $key => $quesChk) {

			++$i;

			$stmt = oci_parse($conn, $sql);

			//  Bind the input parameter

			oci_bind_by_name($stmt, ':P_QUESTIONAIRE_ID', $P_QUESTIONAIRE_ID, 20);
			oci_bind_by_name($stmt, ':P_ERROR_NOTE', $P_ERROR_NOTE, 2000);
			oci_bind_by_name($stmt, ':P_ENTRY_BY', $P_ENTRY_BY, 11);
			oci_bind_by_name($stmt, ':P_OPERATOR_CHK', $P_OPERATOR_CHK, 3);
			oci_bind_by_name($stmt, ':P_UPDATED_BY', $P_UPDATED_BY, 11);
			oci_bind_by_name($stmt, ':P_OPERATOR_NOTE', $P_OPERATOR_NOTE, 2000);
			oci_bind_by_name($stmt, ':P_CREATED', $P_CREATED, 20);
			oci_bind_by_name($stmt, ':P_MODIFIED', $P_MODIFIED, 20);
			oci_bind_by_name($stmt, ':P_SYNC_REQUIRED', $P_SYNC_REQUIRED, 1);
			oci_bind_by_name($stmt, ':P_USER_ID', $P_USER_ID, 10);
			oci_bind_by_name($stmt, ':P_USER_PASSWORD', $P_USER_PASSWORD, 50);

			// Bind the output parameter
			oci_bind_by_name($stmt, ':P_RESULT', $P_RESULT, 1);
			oci_bind_by_name($stmt, ':P_MESSAGE', $P_MESSAGE, 50);

			$P_QUESTIONAIRE_ID = $quesChk['QuesCheck']['questionaire_id'];
			$P_ERROR_NOTE = $quesChk['QuesCheck']['error_note'];
			$P_ENTRY_BY = $quesChk['QuesCheck']['entry_by'];
			$P_OPERATOR_CHK = $quesChk['QuesCheck']['operator_chk'];
			$P_UPDATED_BY = $quesChk['QuesCheck']['updated_by'];
			$P_OPERATOR_NOTE = $quesChk['QuesCheck']['operator_note'];
			$P_CREATED = $quesChk['QuesCheck']['created'];
			$P_MODIFIED = $quesChk['QuesCheck']['modified'];
			$P_SYNC_REQUIRED = 0;

			$P_USER_ID = $user_id;
			$P_USER_PASSWORD = $users['User']['password'];

			oci_execute($stmt, OCI_DEFAULT);
			if ($P_RESULT == 1) {
				$QuesCheckData = array('QuesCheck' => array('questionaire_id' => $quesChk['QuesCheck']['questionaire_id'], 'sync_required' => '0', 'update_by' => $user_id));

				if ($this -> QuesCheck -> saveAll($QuesCheckData)) {
					oci_commit($conn);
					$msg .= "<br />Record: " . $i . ", Status: " . $P_MESSAGE;
				} else {
					oci_rollback($conn);
					$msg .= "<br />Record: " . $i . ", Status: Failed to update local Database";
				}

			} else {
				oci_rollback($conn);
				$msg .= "<br />Record: " . $i . ", Status: " . $P_MESSAGE;
			}

			oci_free_statement($stid);
			unset($QuesCheckData);
		}

		return $msg;

	}

	function _ques_sixchks_sync($conn) {
		$this -> loadModel('QuesSixCheck');
		$this -> loadModel('Authake.User');

		$user_id = $this -> Session -> read('Authake.id');

		$users = $this -> User -> find('all', array('conditions' => array('User.id' => $user_id)));
		$users = $users[0];

		$msg = "";

		$this -> QuesSixCheck -> unbindModel(array('belongsTo' => array('Questionaire')));

		$quesSixChks = $this -> QuesSixCheck -> find('all', array('conditions' => array('QuesSixCheck.sync_required' => '1')));

		$sql = 'BEGIN BBS_QUES_SIX_CHECKS(:P_QUESTIONAIRE_ID, :P_IS_RIGHT, :P_ENTRY_BY, :P_RIGHT_CODE, :P_UPDATED_BY, :P_CREATED, :P_MODIFIED, :P_SYNC_REQUIRED, :P_USER_ID, :P_USER_PASSWORD, :P_RESULT, :P_MESSAGE); END;';

		//END OF FETCH DATA FROM BOOKS==============================

		$i = 0;

		foreach ($quesSixChks as $key => $quesSixChk) {

			++$i;
			$stmt = oci_parse($conn, $sql);

			//  Bind the input parameter

			oci_bind_by_name($stmt, ':P_QUESTIONAIRE_ID', $P_QUESTIONAIRE_ID, 20);
			oci_bind_by_name($stmt, ':P_IS_RIGHT', $P_IS_RIGHT, 1);
			oci_bind_by_name($stmt, ':P_ENTRY_BY', $P_ENTRY_BY, 11);
			oci_bind_by_name($stmt, ':P_RIGHT_CODE', $P_RIGHT_CODE, 4);
			oci_bind_by_name($stmt, ':P_UPDATED_BY', $P_UPDATED_BY, 11);
			oci_bind_by_name($stmt, ':P_CREATED', $P_CREATED, 20);
			oci_bind_by_name($stmt, ':P_MODIFIED', $P_MODIFIED, 20);
			oci_bind_by_name($stmt, ':P_SYNC_REQUIRED', $P_SYNC_REQUIRED, 1);
			oci_bind_by_name($stmt, ':P_USER_ID', $P_USER_ID, 10);
			oci_bind_by_name($stmt, ':P_USER_PASSWORD', $P_USER_PASSWORD, 50);

			// Bind the output parameter
			oci_bind_by_name($stmt, ':P_RESULT', $P_RESULT, 1);
			oci_bind_by_name($stmt, ':P_MESSAGE', $P_MESSAGE, 50);

			$P_QUESTIONAIRE_ID = $quesSixChk['QuesSixCheck']['questionaire_id'];
			$P_IS_RIGHT = $quesSixChk['QuesSixCheck']['is_right'];
			$P_ENTRY_BY = $quesSixChk['QuesSixCheck']['entry_by'];
			$P_RIGHT_CODE = $quesSixChk['QuesSixCheck']['right_code'];
			$P_UPDATED_BY = $quesSixChk['QuesSixCheck']['update_by'];
			$P_CREATED = $quesSixChk['QuesSixCheck']['created'];
			$P_MODIFIED = $quesSixChk['QuesSixCheck']['modified'];
			$P_SYNC_REQUIRED = 0;
			$P_USER_ID = $user_id;
			$P_USER_PASSWORD = $users['User']['password'];

			oci_execute($stmt, OCI_DEFAULT);
			if ($P_RESULT == 1) {

				$QuesSixCheckData = array('QuesSixCheck' => array('questionaire_id' => $quesSixChk['QuesSixCheck']['questionaire_id'], 'sync_required' => '0', 'update_by' => $user_id));
				if ($this -> QuesSixCheck -> saveAll($QuesSixCheckData)) {
					oci_commit($conn);
					$msg .= "<br />Record: " . $i . ", Status: " . $P_MESSAGE;
				} else {
					oci_rollback($conn);
					$msg .= "<br />Record: " . $i . ", Status: Failed to update local Database";
				}

			} else {
				oci_rollback($conn);
				$msg .= "<br />Record: " . $i . ", Status: " . $P_MESSAGE;
			}

			oci_free_statement($stid);
			unset($QuesSixCheckData);
		}

		return $msg;

	}

	//FECTH=========================================================================

	public function serverToLocal() {
		$_SESSION["MenuActive"] = 4;
		$db = get_class_vars('DATABASE_CONFIG');
		$conn = oci_connect($db['bbsserver']['login'], $db['bbsserver']['password'], $db['bbsserver']['database']);

		if (!$conn) {
			$m = oci_error();
			$this -> Session -> setFlash(__('Failed to connect with server. ' . $m['message']));
			$this -> redirect(array('controller' => 'Synchronize', 'action' => 'index'));
		} else {
			$booksMsg = $this -> _fetch_book($conn);
			$quesMsg = $this -> _fetch_ques($conn);
			//$quesSix = $this->_fetch_ques_six_check($conn);
			$quesCheck = $this -> _fetch_ques_check($conn);
		}
		$this -> set(compact('booksMsg', 'quesMsg', 'quesCheck'));
	}

	function _fetch_book($conn) {
		$this -> loadModel('Book');
		$this -> loadModel('BookServer');
		$this -> loadModel('Authake.User');

		$user_id = $this -> Session -> read('Authake.id');
		$users = $this -> User -> find('all', array('conditions' => array('User.id' => $user_id)));
		$users = $users[0];

		$serverBooks = $this -> BookServer -> find('all', array('conditions' => array('BookServer.ENTRY_BY' => $user_id)));

		$sql = 'BEGIN BBS_BOOKS_SYNC_UPDATE(:P_ID, :P_USER_ID, :P_USER_PASSWORD, :P_RESULT, :P_MESSAGE); END;';

		$i = 0;
		$msg = "";
		foreach ($serverBooks as $key => $value) {
			$i++;
			$insert_data['Book'] = $value['BookServer'];
			$insert_data['Book']['sync_required'] = 0;

			$this -> Book -> begin();

			$this -> Book -> create();
			if ($this -> Book -> save($insert_data)) {
				//ORACLE========================================================
				$stmt = oci_parse($conn, $sql);
				//Bind the input parameter---------------------------------
				oci_bind_by_name($stmt, ':P_ID', $P_ID, 20);
				oci_bind_by_name($stmt, ':P_USER_ID', $P_USER_ID, 10);
				oci_bind_by_name($stmt, ':P_USER_PASSWORD', $P_USER_PASSWORD, 50);
				//Bind the output parameter----------------------------------
				oci_bind_by_name($stmt, ':P_RESULT', $P_RESULT, 1);
				oci_bind_by_name($stmt, ':P_MESSAGE', $P_MESSAGE, 50);
				//SET VALUE---------------------------------------------------
				$P_ID = $insert_data['Book']['id'];
				$P_USER_ID = $user_id;
				$P_USER_PASSWORD = $users['User']['bk_password'];

				oci_execute($stmt, OCI_DEFAULT);
				if ($P_RESULT == 1) {
					oci_commit($conn);
					$this -> Book -> commit();
					$msg .= "<br />Record: " . $i . ", Status: " . $P_MESSAGE;
				} else {
					oci_rollback($conn);
					$this -> Book -> rollback();
					$msg .= "<br />Record: " . $i . ", Status: " . $P_MESSAGE;
				}
				oci_free_statement($stid);
				//END OF ORACLE========================================================
			} else {
				$msg .= "<br />Record: " . $i . ", Status: Failed to save.";
				$this -> Book -> rollback();
			}

			unset($insert_data);

		}
		return $msg;
	}

	function _fetch_ques($conn) {
		$this -> loadModel('Questionaire');
		$this -> loadModel('QuesServer');
		$this -> loadModel('Authake.User');

		$user_id = $this -> Session -> read('Authake.id');
		$users = $this -> User -> find('all', array('conditions' => array('User.id' => $user_id)));
		$users = $users[0];

		$serverQues = $this -> QuesServer -> find('all', array('conditions' => array('QuesServer.ENTRY_BY' => $user_id)));
		//pr($serverQues); exit;
		$sql = 'BEGIN BBS_QUESTIONAIRES_SYNC_UPDATE(:P_ID, :P_USER_ID, :P_USER_PASSWORD, :P_RESULT, :P_MESSAGE); END;';

		$i = 0;
		$msg = "";
		foreach ($serverQues as $key => $value) {
			$i++;
			$insert_data['Questionaire'] = $value['QuesServer'];
			$insert_data['Questionaire']['sync_required'] = 0;
			$this -> Questionaire -> begin();

			$this -> Questionaire -> create();
			if ($this -> Questionaire -> save($insert_data)) {
				//ORACLE========================================================
				$stmt = oci_parse($conn, $sql);
				//Bind the input parameter---------------------------------
				oci_bind_by_name($stmt, ':P_ID', $P_ID, 20);
				oci_bind_by_name($stmt, ':P_USER_ID', $P_USER_ID, 10);
				oci_bind_by_name($stmt, ':P_USER_PASSWORD', $P_USER_PASSWORD, 50);
				//Bind the output parameter----------------------------------
				oci_bind_by_name($stmt, ':P_RESULT', $P_RESULT, 1);
				oci_bind_by_name($stmt, ':P_MESSAGE', $P_MESSAGE, 50);
				//SET VALUE---------------------------------------------------
				$P_ID = $insert_data['Questionaire']['id'];
				$P_USER_ID = $user_id;
				$P_USER_PASSWORD = $users['User']['bk_password'];

				oci_execute($stmt, OCI_DEFAULT);
				if ($P_RESULT == 1) {
					oci_commit($conn);
					$this -> Questionaire -> commit();
					$msg .= "<br />Record: " . $i . ", Status: " . $P_MESSAGE;
				} else {
					oci_rollback($conn);
					$this -> Questionaire -> rollback();
					$msg .= "<br />Record: " . $i . ", Status: " . $P_MESSAGE;
				}
				oci_free_statement($stid);
				//END OF ORACLE========================================================
			} else {
				$msg .= "<br />Record: " . $i . ", Status: Failed to save.";
				$this -> Questionaire -> rollback();
			}
			unset($insert_data);
		}
		return $msg;
	}

	function _fetch_ques_check($conn) {
		$this -> loadModel('QuesCheck');
		$this -> loadModel('QuesCheckServer');
		$this -> loadModel('Questionaire');
		$this -> loadModel('Authake.User');

		$user_id = $this -> Session -> read('Authake.id');
		$users = $this -> User -> find('all', array('conditions' => array('User.id' => $user_id)));
		$users = $users[0];

		$serverQues = $this -> QuesCheckServer -> find('all', array('conditions' => array('QuesCheckServer.QUES_ENTRY_BY' => $user_id)));

		$sql = 'BEGIN BBS_QUES_CHECKS_UPDATE(:P_ID, :P_USER_ID, :P_USER_PASSWORD, :P_RESULT, :P_MESSAGE); END;';

		$i = 0;
		$msg = "";

		foreach ($serverQues as $key => $value) {
			$i++;
			$insert_data['QuesCheck'] = $value['QuesCheckServer'];
			$insert_data['QuesCheck']['sync_required'] = 0;
			$this -> QuesCheck -> begin();

			$this -> QuesCheck -> create();
			if ($this -> QuesCheck -> save($insert_data)) {
				//ORACLE========================================================
				$stmt = oci_parse($conn, $sql);
				//Bind the input parameter---------------------------------
				oci_bind_by_name($stmt, ':P_ID', $P_ID, 20);
				oci_bind_by_name($stmt, ':P_USER_ID', $P_USER_ID, 10);
				oci_bind_by_name($stmt, ':P_USER_PASSWORD', $P_USER_PASSWORD, 50);
				//Bind the output parameter----------------------------------
				oci_bind_by_name($stmt, ':P_RESULT', $P_RESULT, 1);
				oci_bind_by_name($stmt, ':P_MESSAGE', $P_MESSAGE, 50);
				//SET VALUE---------------------------------------------------
				$P_ID = $insert_data['QuesCheck']['questionaire_id'];
				$P_USER_ID = $user_id;
				$P_USER_PASSWORD = $users['User']['bk_password'];

				oci_execute($stmt, OCI_DEFAULT);
				if ($P_RESULT == 1) {
					oci_commit($conn);
					$this -> QuesCheck -> commit();
					$msg .= "<br />Record: " . $i . ", Status: " . $P_MESSAGE;
				} else {
					oci_rollback($conn);
					$this -> QuesCheck -> rollback();
					$msg .= "<br />Record: " . $i . ", Status: " . $P_MESSAGE;
				}
				oci_free_statement($stid);
				//END OF ORACLE========================================================
			} else {
				$msg .= "<br />Record: " . $i . ", Status: Failed to save.";
				$this -> QuesCheck -> rollback();
			}
			unset($insert_data);
		}

		return $msg;
	}

	function _fetch_ques_six_check($conn) {
		$this -> loadModel('QuesSixCheck');
		$this -> loadModel('QuesSixCheckServer');
		$this -> loadModel('Questionaire');
		$this -> loadModel('Authake.User');

		$user_id = $this -> Session -> read('Authake.id');
		$users = $this -> User -> find('all', array('conditions' => array('User.id' => $user_id)));
		$users = $users[0];
		$serverQues = $this -> QuesSixCheckServer -> find('all', array('conditions' => array('QuesSixCheckServer.QUES_ENTRY_BY' => $user_id)));

		$sql = 'BEGIN BBS_QUES_SIX_CHECKS_UPDATE(:P_ID, :P_USER_ID, :P_USER_PASSWORD, :P_RESULT, :P_MESSAGE); END;';

		$i = 0;
		$msg = "";

		foreach ($serverQues as $key => $value) {
			$i++;
			$insert_data['QuesSixCheck'] = $value['QuesSixCheckServer'];
			$insert_data['QuesSixCheck']['sync_required'] = 0;
			$this -> QuesSixCheck -> begin();

			$this -> QuesSixCheck -> create();
			if ($this -> QuesSixCheck -> save($insert_data)) {
				//ORACLE========================================================

				$stmt = oci_parse($conn, $sql);
				//Bind the input parameter---------------------------------
				oci_bind_by_name($stmt, ':P_ID', $P_ID, 20);
				oci_bind_by_name($stmt, ':P_USER_ID', $P_USER_ID, 10);
				oci_bind_by_name($stmt, ':P_USER_PASSWORD', $P_USER_PASSWORD, 50);
				//Bind the output parameter----------------------------------
				oci_bind_by_name($stmt, ':P_RESULT', $P_RESULT, 1);
				oci_bind_by_name($stmt, ':P_MESSAGE', $P_MESSAGE, 50);
				//SET VALUE---------------------------------------------------
				$P_ID = $insert_data['QuesSixCheck']['questionaire_id'];
				$P_USER_ID = $user_id;
				$P_USER_PASSWORD = $users['User']['bk_password'];

				oci_execute($stmt, OCI_DEFAULT);
				if ($P_RESULT == 1) {
					oci_commit($conn);
					$this -> QuesSixCheck -> commit();
					$msg .= "<br />Record: " . $i . ", Status: " . $P_MESSAGE;
				} else {
					oci_rollback($conn);
					$this -> QuesSixCheck -> rollback();
					$msg .= "<br />Record: " . $i . ", Status: " . $P_MESSAGE;
				}
				oci_free_statement($stid);
				//END OF ORACLE========================================================
			} else {
				$msg .= "<br />Record: " . $i . ", Status: Failed to save.";
				$this -> QuesSixCheck -> rollback();
			}
			unset($insert_data);
		}

		return $msg;
	}

}
?>

