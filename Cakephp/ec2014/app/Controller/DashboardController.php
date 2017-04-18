<?php
App::uses('AppController', 'Controller');


class DashboardController extends AppController {

	public function index() {
		
		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('GeoCodeDivn');
		$this -> loadModel('GeoCodeZila');
		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel('GeoCodeRmo');
		$this -> loadModel('GeoCodePsa');
		$this -> loadModel('GeoCodeUnion');

		$this -> loadModel('Book');
		$this -> loadModel('Questionaire');
		$this -> loadModel('QuesCheck');
		$this -> loadModel('QuesSixCheck');
		

		//RESET OLD VALUE
		$old_geo_code_divn_id = "";
		$old_geo_code_zila_id = "";
		$old_geo_code_upazila_id = "";
		$old_geo_code_psa_id = "";
		$old_geo_code_union_id = "";
		$old_geo_code_mauza_id = "";
		$old_geo_code_village_id = "";
		$old_book_id = "";
		//$old_geo_code_psa_nonpsa = "";
		//END OF RESET OLD VALUE
		
		$where = " WHERE 1=1 ";

		$condition_common = array();
		if ($this -> request -> is('post')) {
			
	

			//SET OLD VALUE
			$old_geo_code_divn_id = $this -> request -> data['Dashboard']['geo_code_divn_id'];
			$old_geo_code_zila_id = $this -> request -> data['Dashboard']['geo_code_zila_id'];
			$old_geo_code_upazila_id = $this -> request -> data['Dashboard']['geo_code_upazila_id'];
			//$old_geo_code_psa_nonpsa= $this -> request -> data['Dashboard']['geo_code_psa_nonpsa'];
			$old_geo_code_psa_id = $this -> request -> data['Dashboard']['geo_code_psa_id'];
			$old_geo_code_union_id = $this -> request -> data['Dashboard']['geo_code_union_id'];
			$old_geo_code_mauza_id = $this -> request -> data['Dashboard']['geo_code_mauza_id'];
			$old_geo_code_village_id = $this -> request -> data['Dashboard']['geo_code_village_id'];
			$old_book_id = $this -> request -> data['Dashboard']['book_id'];
			//END OF SET OLD VALUE

			if ($this -> request -> data['Dashboard']['geo_code_divn_id'] != '')
			{
				$where .= " AND books.geo_code_divn_id = ".$this -> request -> data['Dashboard']['geo_code_divn_id'];
			}
				

			if ($this -> request -> data['Dashboard']['geo_code_zila_id'] != '')
			{
				$where .= " AND books.geo_code_zila_id = ".$this -> request -> data['Dashboard']['geo_code_zila_id'];
			}
				
				

			if ($this -> request -> data['Dashboard']['geo_code_upazila_id'] != '')
			{
				$where .= " AND books.geo_code_upazila_id = ".$this -> request -> data['Dashboard']['geo_code_upazila_id'];
			}
				
				

			if ($this -> request -> data['Dashboard']['geo_code_psa_id'] == 'NON_PSA')
			{
				$where .= " AND geo_code_unions.union_or_ward = 'UNION' ";
			}

			if ($this -> request -> data['Dashboard']['geo_code_psa_id'] != 'NON_PSA' && $this -> request -> data['Dashboard']['geo_code_psa_id'] != '')
			{
				$where .= " AND books.geo_code_psa_id = ".$this -> request -> data['Dashboard']['geo_code_psa_id']." AND geo_code_unions.union_or_ward = 'WARD' ";
			}
				
			
			

			if ($this -> request -> data['Dashboard']['geo_code_union_id'] != '')
			{
				$where .= " AND books.geo_code_union_id = ".$this -> request -> data['Dashboard']['geo_code_union_id'];
			}

			if ($this -> request -> data['Dashboard']['geo_code_mauza_id'] != '')
			{
				$where .= " AND questionaires.q1_geo_code_mauza_id = ".$this -> request -> data['Dashboard']['geo_code_mauza_id'];
			}

			if ($this -> request -> data['Dashboard']['geo_code_village_id'] != '')
			{
				$where .= " AND questionaires.q2_village_maholla = '".$this -> request -> data['Dashboard']['geo_code_village_id'] ."' ";
			}
		

			if ($this -> request -> data['Dashboard']['book_id'] != '')
			{
				$where .= " AND questionaires.book_id = ".$this -> request -> data['Dashboard']['book_id'];
			}

		}

		//OPERATOR================================================================
		if (in_array(2, $this -> Session -> read('Authake.group_ids'))) {
			$where .= " AND questionaires.entry_by = ".$this -> Session -> read('Authake.id');
		}
		//END OF OPERATOR======================================================

		//SUPERVISOR============================================================
		if (in_array(3, $this -> Session -> read('Authake.group_ids'))) {
			$geo_code_zila_id = $this -> GeoCodeZila -> getZilaID_dashboard($this -> supervisor_zila);
			$geo_code_upazila_id = $this -> GeoCodeUpazila -> getUpazilaID($this -> supervisor_upazila, $geo_code_zila_id);

			$where .= " AND books.geo_code_zila_id = ".$geo_code_zila_id;
			$where .= " AND books.geo_code_upazila_id = ".$geo_code_upazila_id;
		}
		//END OF SUPERVISOR=====================================================

		//SUPERVISING OFFICER===================================================
		if (in_array(4, $this -> Session -> read('Authake.group_ids'))) {
			$geo_code_zila_id = $this -> GeoCodeZila -> getZilaID_dashboard($this -> supervisor_zila);

			$where .= " AND books.geo_code_zila_id = ".$geo_code_zila_id;
		}
		//END OF SUPERVISING OFFICER===========================================

		//DINV COO=============================================================
		if (in_array(5, $this -> Session -> read('Authake.group_ids'))) {
			$geo_code_divn_id = $this -> GeoCodeDivn -> getDivnID($this -> divn_coo);
			$where .= " AND books.geo_code_divn_id = ".$geo_code_divn_id;
		}
		//END OF DINV COO=======================================================

		$from = " FROM questionaires LEFT JOIN books ON (questionaires.book_id = books.id) LEFT JOIN geo_code_unions ON (books.geo_code_union_id = geo_code_unions.id) LEFT JOIN geo_code_psas ON (books.geo_code_psa_id = geo_code_psas.id)";

		//1. FIELDS FOR Number of DEO worked=====================================
		$query1 = "SELECT COUNT(DISTINCT questionaires.entry_by) AS total_deo_work " . $from . $where;
		$results1 = $this->Questionaire->query($query1);
		$totalDeoWork = $results1[0][0]['total_deo_work'];
		//END FIELDS FOR Number of DEO worked=====================================

		//2. FIELDS FOR Number of Books Entered===================================
		$query2 = "SELECT COUNT(DISTINCT books.id) AS total_book " . $from . $where;
		$results2 = $this->Questionaire->query($query2);
		$totalBookEntered = $results2[0][0]['total_book'];
		//END FIELDS FOR Number of Books Entered================================
		
		
		//NUMBER OF EA
		$query3 = "SELECT COUNT(DISTINCT books.area_id) AS total_ea " . $from . $where . " GROUP BY books.geo_code_union_id ";
		$totalEA_groups = $this->Questionaire->query($query3);
		
		$totalEAs = 0;
		foreach ($totalEA_groups as $key => $totalEA) {
			$totalEAs += $totalEA[0]['total_ea'];
		}
		




		//3. FIELDS FOR Parmanent Establishment=================================
		$where_for_pe = " AND questionaires.q4_unit_type = 2 AND questionaires.q4_unit_org_type = 1 AND questionaires.is_out_of_scope = 0 ";
		$query4 = "SELECT COUNT(questionaires.id) AS parmanent_est " . $from . $where . $where_for_pe;
		$results4 = $this->Questionaire->query($query4);
		$totalParmanentEstablishment = $results4[0][0]['parmanent_est'];
		//END FIELDS FOR Parmanent Establishment================================

		
		//4. FIELDS FOR Temporary Establishment=============================
		$where_for_te = " AND questionaires.q4_unit_type = 2 AND questionaires.q4_unit_org_type = 2 AND questionaires.is_out_of_scope = 0 ";
		$query5 = "SELECT COUNT(questionaires.id) AS temporary_est " . $from . $where . $where_for_te;
		$results5 = $this->Questionaire->query($query5);
		$totalTemporaryEstablishment = $results5[0][0]['temporary_est'];
		//END FIELDS FOR Temporary Establishment===========================
		
		

		//5. FIELDS FOR Economic Household========================================
		$where_for_eh = " AND questionaires.q4_unit_type = 1 AND questionaires.is_out_of_scope = 0 ";
		$query6 = "SELECT COUNT(questionaires.id) AS echonomic_household " . $from . $where . $where_for_eh;
		$results6 = $this->Questionaire->query($query6);
		$totalEconomicHousehold = $results6[0][0]['echonomic_household'];
		//END FIELDS FOR Economic Household=========================================

		//6. FIELDS FOR Agricultural Establishments====================================
		$where_for_ae = " AND questionaires.q4_unit_type = 2 AND questionaires.q5_unit_head_economy_id = '01' AND questionaires.is_out_of_scope = 0 ";
		$query7 = "SELECT COUNT(questionaires.id) AS agricultural_est " . $from . $where . $where_for_ae;
		$results7 = $this->Questionaire->query($query7);
		$totalAgriculturalEstablishments = $results7[0][0]['agricultural_est'];
		//END FIELDS FOR Agricultural Establishments==================================
		
		$where_for_tu = " AND questionaires.is_out_of_scope = 0 ";
		$query8 = "SELECT COUNT(questionaires.id) AS total_unit " . $from . $where . $where_for_tu;
		$results8 = $this->Questionaire->query($query8);
		$totalUnit = $results8[0][0]['total_unit'];
		
		
		$where_for_oos = " AND questionaires.is_out_of_scope = 1 ";
		$query9 = "SELECT COUNT(questionaires.id) AS total_oos " . $from . $where . $where_for_oos;
		$results9 = $this->Questionaire->query($query9);
		$totalUnit_oos = $results9[0][0]['total_oos'];
		

		$divns = $this -> GeoCodeDivn -> find('list');
		$rmos = $this -> GeoCodeRmo -> find('list');


		$this -> set(compact('divns', 'rmos', 'totalDeoWork', 'totalBookEntered', 'totalParmanentEstablishment', 'totalTemporaryEstablishment', 'totalEconomicHousehold', 'totalAgriculturalEstablishments', 'totalUnit', 'old_geo_code_divn_id', 'old_geo_code_zila_id', 'old_geo_code_upazila_id', 'old_geo_code_psa_id', 'old_geo_code_union_id', 'old_geo_code_mauza_id', 'old_geo_code_village_id', 'old_book_id', 'totalUnit_oos', 'totalEAs'));
	}

	public function sup_dashboard()
	{
		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('GeoCodeDivn');
		$this -> loadModel('GeoCodeZila');
		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel('GeoCodeRmo');
		$this -> loadModel('GeoCodePsa');
		$this -> loadModel('GeoCodeUnion');

		$this -> loadModel('Book');
		$this -> loadModel('Questionaire');
		$this -> loadModel('QuesCheck');
		$this -> loadModel('QuesSixCheck');


		$geo_code_zila_id = $this -> GeoCodeZila -> getZilaID_dashboard($this -> supervisor_zila);
		$geo_code_upazila_id = $this -> GeoCodeUpazila -> getUpazilaID($this -> supervisor_upazila, $geo_code_zila_id);

		$data = $this->Questionaire->query("SELECT COUNT(Q6.QUESTIONAIRE_ID) CORRECTED_BY_ADMIN FROM QUES_SIX_CHECKS Q6 LEFT JOIN
		QUESTIONAIRES Q  ON (Q6.QUESTIONAIRE_ID = Q.id)  LEFT JOIN BOOKS B ON 
		(Q.BOOK_ID = B.ID) WHERE (Q6.ENTRY_BY >=  21001 AND  Q6.ENTRY_BY <= 21030) AND B.GEO_CODE_ZILA_ID = '".$geo_code_zila_id."' AND B.GEO_CODE_UPAZILA_ID = '".$geo_code_upazila_id."' ");

		$corrected_by_admin = $data[0][0]['CORRECTED_BY_ADMIN'];
				
		//SUPERVISOR============================================================
		if (in_array(3, $this -> Session -> read('Authake.group_ids'))) {
			$geo_code_zila_id = $this -> GeoCodeZila -> getZilaID_dashboard($this -> supervisor_zila);
			$geo_code_upazila_id = $this -> GeoCodeUpazila -> getUpazilaID($this -> supervisor_upazila, $geo_code_zila_id);

			$condition_common['conditions'][] = array('Book.geo_code_zila_id' => $geo_code_zila_id);
			$condition_common['conditions'][] = array('Book.geo_code_upazila_id' => $geo_code_upazila_id);
		}
		//END OF SUPERVISOR=====================================================

//TOTAL UNIT=====================================================================		
		$condition_total = $condition_common;
		$condition_total['fields'] = array('Questionaire.id');
		$total_unit = $this -> Questionaire -> find('count', $condition_total);
		//$total_unit = count($Questionaires);
		//echo "<br />Total Unit = ".$total_unit;


//ALL QUES VERIFIED BY SUPERVISOR
		$condition_all_qus = $condition_common;
		$condition_all_qus['conditions'][] = array('QuesCheck.entry_by' => $this -> Session -> read('Authake.id'));
		$condition_all_qus['fields'] = array('QuesCheck.questionaire_id');
		$all_ques_verified_by_supervisor = $this -> Questionaire -> find('count', $condition_all_qus);
		//$all_ques_verified_by_supervisor = count($Questionaires1);
		//echo "<br />ALL QUES VERIFIED BY SUPERVISOR = ".$all_ques_verified_by_supervisor;

		
//QUES 6 VERIFIED BY SUPERVISOR		
		$condition_q6 = $condition_common;
		$condition_q6['conditions'][] = array('QuesSixCheck.entry_by' => $this -> Session -> read('Authake.id'));
		$condition_q6['fields'] = array('QuesSixCheck.questionaire_id');
		$q6_verified_by_supervisor = $this -> Questionaire -> find('count', $condition_q6);
		//$q6_verified_by_supervisor = count($Questionaires2);
		//echo "<br />ALL QUES VERIFIED BY SUPERVISOR = ".$q6_verified_by_supervisor;
		
		
//QUES 6 WRONG	
		$condition_q6_wrong = $condition_common;
		$condition_q6_wrong['conditions'][] = array('QuesSixCheck.entry_by' => $this -> Session -> read('Authake.id'), 'QuesSixCheck.is_right' => 0);
		$condition_q6_wrong['fields'] = array('QuesSixCheck.questionaire_id');
		$q6_wrong = $this -> Questionaire -> find('count', $condition_q6_wrong);
		//$q6_wrong = count($Questionaires3);
		
		//echo "<br />QUES 6 WRONG	 = ".$q6_wrong;

//QUES 6 RIGHT	
		$condition_q6_right = $condition_common;
		$condition_q6_right['conditions'][] = array('QuesSixCheck.entry_by' => $this -> Session -> read('Authake.id'), 'QuesSixCheck.is_right' => 0, 'QuesSixCheck.update_by' => $this -> Session -> read('Authake.id'), 'QuesSixCheck.right_code <>' => NULL);
		$condition_q6_right['fields'] = array('QuesSixCheck.questionaire_id');
		$q6_right = $this -> Questionaire -> find('count', $condition_q6_right);
		//$q6_right = count($Questionaires4);
		//echo "<br />QUES 6 RIGHT	 = ".$q6_right;
		
//QUES 6 APPROVED	
		$condition_q6_approved = $condition_common;
		$condition_q6_approved['conditions'][] = array('QuesSixCheck.entry_by' => $this -> Session -> read('Authake.id'), 'QuesSixCheck.approve_status' => "APPROVE");
		$condition_q6_approved['fields'] = array('QuesSixCheck.questionaire_id');
		$q6_approved = $this -> Questionaire -> find('count', $condition_q6_approved);
		//$q6_approved = count($Questionaires5);
		//echo "<br />QUES 6 APPROVED	 = ".$q6_approved;  
		
		$this -> set(compact('total_unit', 'all_ques_verified_by_supervisor', 'q6_verified_by_supervisor', 'q6_wrong', 'q6_right', 'q6_approved', 'corrected_by_admin'));
		
	
	}

	public function so_dashboard()
	{
		
		$_SESSION["MenuActive"] = 5;
		$this->loadModel('AuthakeUserGroup');
		$this -> loadModel('Questionaire');
		$this -> loadModel('GeoCodeZila');
		$this -> loadModel('GeoCodeUpazila');
		
		$so_zila = $this -> sup_officer_zila;
		$geo_code_zila_id = $this -> GeoCodeZila -> getZilaID_dashboard($so_zila);

		$data = $this->Questionaire->query("SELECT COUNT(Q6.QUESTIONAIRE_ID) CORRECTED_BY_ADMIN FROM QUES_SIX_CHECKS Q6 LEFT JOIN
		QUESTIONAIRES Q  ON (Q6.QUESTIONAIRE_ID = Q.id)  LEFT JOIN BOOKS B ON 
		(Q.BOOK_ID = B.ID) WHERE (Q6.ENTRY_BY >=  21001 AND  Q6.ENTRY_BY <= 21030) AND B.GEO_CODE_ZILA_ID = '".$geo_code_zila_id."' ");
		
		$corrected = $data['0']['0']['CORRECTED_BY_ADMIN']; 

		$dashboard_data = array();
		
		$users = $this->AuthakeUserGroup->find('all', array('conditions' => array('AuthakeUserGroup.group_id' => 3, 'AuthakeUser.login LIKE' => $so_zila."%"), 'fields' => array('AuthakeUser.login', 'AuthakeUser.id')));
		
		$this -> Questionaire -> unbindModel(array('belongsTo' => array('GeoCodeMauza', 'UnitHeadEconomy')));
		
		$so_id = $this -> Session -> read('Authake.id');

		$counter = 0;
		$upazila_name_tmp = "";
		foreach ($users as $key => $user) {

	
			$exp = explode("_", $user['AuthakeUser']['login']);

			$zila = substr($exp[0], 0, 2);
			$upazila = substr($exp[1], 0, 2);
			
			$geo_code_zila_id = $this -> GeoCodeZila -> getZilaID_dashboard($zila);
			$geo_code_upazila_id = $this -> GeoCodeUpazila -> getUpazilaID($upazila, $geo_code_zila_id);

			$upazila_name = $this->GeoCodeUpazila->findAllById($geo_code_upazila_id);

			$upazila_name = $upazila_name[0]['GeoCodeUpazila']['upzila_name'];
			//echo $so_zila;
			//pr($upazila_name[0]['GeoCodeUpazila']['upzila_name']); exit;
			
			//RESET ARRAY----------------------------------------
			$condition_common = array();
			$condition_total = array();
			$condition_all_qus = array();
			$condition_q6 = array();
			$condition_q6_wrong = array();
			$condition_q6_right = array();
			$condition_q6_approved = array();

			$condition_all_qus_so = array();
			$condition_q6_so = array();
			$condition_q6_wrong_so = array();
			$condition_q6_right_so = array();
			$condition_q6_approved_so = array();
			
			//RESET ARRAY----------------------------------------
			
			
			$condition_common['conditions'][] = array('Book.geo_code_zila_id' => $geo_code_zila_id);
			$condition_common['conditions'][] = array('Book.geo_code_upazila_id' => $geo_code_upazila_id);
			
			$condition_common_so['conditions'][] = array('Book.geo_code_upazila_id' => $geo_code_upazila_id);
			
			
	//TOTAL UNIT==================================================================
			if($upazila_name_tmp != $upazila_name)
			{
				$condition_total = $condition_common;
				$condition_total['fields'] = array('Questionaire.id');
				$total_unit = $this -> Questionaire -> find('count', $condition_total);
				if($total_unit == 0) continue;
			}
			
			
	
	
	//ALL QUES VERIFIED BY SUPERVISOR
		
			$condition_all_qus = $condition_common;
			$condition_all_qus['conditions'][] = array('QuesCheck.entry_by' => $user['AuthakeUser']['id']);
			$condition_all_qus['fields'] = array('QuesCheck.questionaire_id');
			$all_ques_verified_by_supervisor = $this -> Questionaire -> find('count', $condition_all_qus);
	
			//SO
			if($upazila_name_tmp != $upazila_name)
			{
				$condition_all_qus_so = $condition_common;
				$condition_all_qus_so['conditions'][] = array('QuesCheck.entry_by' => $so_id);
				$condition_all_qus_so['fields'] = array('QuesCheck.questionaire_id');
				$all_ques_verified_by_so = $this -> Questionaire -> find('count', $condition_all_qus_so);
			}
			
	//QUES 6 VERIFIED BY SUPERVISOR		
			
			$condition_q6 = $condition_common;
			$condition_q6['conditions'][] = array('QuesSixCheck.entry_by' => $user['AuthakeUser']['id']);
			$condition_q6['fields'] = array('QuesSixCheck.questionaire_id');
			$q6_verified_by_supervisor = $this -> Questionaire -> find('count', $condition_q6);

			//SO
			if($upazila_name_tmp != $upazila_name)
			{
				$condition_q6_so = $condition_common;
				$condition_q6_so['conditions'][] = array('QuesSixCheck.entry_by' => $so_id);
				$condition_q6_so['fields'] = array('QuesSixCheck.questionaire_id');
				$q6_verified_by_so = $this -> Questionaire -> find('count', $condition_q6_so);
			}
			
	//QUES 6 WRONG	
			
			$condition_q6_wrong = $condition_common;
			$condition_q6_wrong['conditions'][] = array('QuesSixCheck.entry_by' => $user['AuthakeUser']['id'], 'QuesSixCheck.is_right' => 0);
			$condition_q6_wrong['fields'] = array('QuesSixCheck.questionaire_id');
			$q6_wrong = $this -> Questionaire -> find('count', $condition_q6_wrong);
			
			//SO
			if($upazila_name_tmp != $upazila_name)
			{
				$condition_q6_wrong_so = $condition_common;
				$condition_q6_wrong_so['conditions'][] = array('QuesSixCheck.entry_by' => $so_id, 'QuesSixCheck.is_right' => 0);
				$condition_q6_wrong_so['fields'] = array('QuesSixCheck.questionaire_id');
				$q6_wrong_so = $this -> Questionaire -> find('count', $condition_q6_wrong_so);
			}

	
	//QUES 6 CORRECTED	
			
			$condition_q6_right = $condition_common;
			//$condition_q6_right['conditions'][] = array('QuesSixCheck.entry_by' => $user['AuthakeUser']['id'], 'QuesSixCheck.is_right' => 0, 'QuesSixCheck.update_by' => $user['AuthakeUser']['id'], 'QuesSixCheck.right_code <>' => NULL);
			$condition_q6_right['conditions'][] = array('QuesSixCheck.is_right' => 0, 'QuesSixCheck.update_by' => $user['AuthakeUser']['id'], 'QuesSixCheck.right_code <>' => NULL);
			$condition_q6_right['fields'] = array('QuesSixCheck.questionaire_id');
			$q6_right = $this -> Questionaire -> find('count', $condition_q6_right);
			
			//SO
			if($upazila_name_tmp != $upazila_name)
			{
				$condition_q6_right_so = $condition_common;
				$condition_q6_right_so['conditions'][] = array('QuesSixCheck.is_right' => 0, 'QuesSixCheck.update_by' => $so_id, 
					'OR' => array(
				array('QuesSixCheck.right_code <>' => NULL),
				array('QuesSixCheck.right_code <>' => '')
			)
					);
				$condition_q6_right_so['fields'] = array('QuesSixCheck.questionaire_id');
				$q6_right_so = $this -> Questionaire -> find('count', $condition_q6_right_so);
			}
			
	//QUES 6 APPROVED	
			
			if($upazila_name_tmp != $upazila_name)
			{
				$condition_q6_approved = $condition_common;
				$condition_q6_approved['conditions'][] = array('QuesSixCheck.approve_by' => $this -> Session -> read('Authake.id'), 'QuesSixCheck.approve_status' => "APPROVE");
				$condition_q6_approved['fields'] = array('QuesSixCheck.questionaire_id');
				$q6_approved = $this -> Questionaire -> find('count', $condition_q6_approved);
			}

			if($upazila_name_tmp != $upazila_name)
			{
				$dashboard_data[$counter]['supervisor_name'] = "SO of ".$upazila_name;
				$dashboard_data[$counter]['total_unit'] = $total_unit;
				$dashboard_data[$counter]['all_ques_verified_by_supervisor'] = $all_ques_verified_by_so;
				$dashboard_data[$counter]['q6_verified_by_supervisor'] = $q6_verified_by_so;
				$dashboard_data[$counter]['q6_wrong'] = $q6_wrong_so;
				$dashboard_data[$counter]['q6_right'] = $q6_right_so;
				$dashboard_data[$counter]['q6_approved'] = $q6_approved;

				$upazila_name_tmp = $upazila_name;
				$counter++;
			}
			
			
			$dashboard_data[$counter]['supervisor_name'] = $user['AuthakeUser']['login'];
			$dashboard_data[$counter]['total_unit'] = "-";
			$dashboard_data[$counter]['all_ques_verified_by_supervisor'] = $all_ques_verified_by_supervisor;
			$dashboard_data[$counter]['q6_verified_by_supervisor'] = $q6_verified_by_supervisor;
			$dashboard_data[$counter]['q6_wrong'] = $q6_wrong;
			$dashboard_data[$counter]['q6_right'] = $q6_right;
			$dashboard_data[$counter]['q6_approved'] = "-";

			$counter++;
		}
		
		
		
		$this -> set(compact('dashboard_data', 'corrected'));
		
	}



	public function admin_dashboard()
	{
		$_SESSION["MenuActive"] = 5;
		$this->loadModel('UpazilaWiseReport');
		$UpazilaWiseReport = $this -> UpazilaWiseReport -> find('all');

		
		$this -> set(compact('UpazilaWiseReport'));	
	}
	
}
?>
