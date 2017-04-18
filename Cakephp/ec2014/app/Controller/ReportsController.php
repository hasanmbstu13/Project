<?php

class ReportsController extends AppController {

	var $uses = false;
	// $_SESSION["MenuActive"] = 10;
	public function index() {
		$this -> set('title_for_layout', 'Reports');
		$_SESSION["MenuActive"] = 10;

		$this -> loadModel('Notice');
		$notices = $this -> Notice -> find('all', array('order' => array('msg_order', 'id')));
		$this -> set(compact('notices'));
	}

	public function get_geo_divn() {

		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodeDivn');

		$data = $this -> GeoCodeDivn -> find('all', array('fields' => array('id', 'divn_code', 'divn_name')));
		echo json_encode($data);
	}

	public function get_geo_zila() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodeDivn');
		$this -> loadModel('GeoCodeZila');

		$data = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.geo_code_divn_id =' => $_REQUEST['divn_id']), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_code', 'GeoCodeZila.zila_name'), 'order' => 'GeoCodeZila.zila_name'));

		echo json_encode($data);
	}

	public function get_geo_upazila() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodeUpazila');

		$data = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id =' => $_REQUEST['zila_id']), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_code', 'GeoCodeUpazila.upzila_name'), 'order' => 'GeoCodeUpazila.upzila_name'));

		echo json_encode($data);
	}

	public function get_geo_psa() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodePsa');

		$this -> loadModel('GeoCodeUnion');

		$data1 = $this -> GeoCodePsa -> find('all', array('conditions' => array('GeoCodePsa.geo_code_upazila_id =' => $_REQUEST['upazila_id']), 'fields' => array('GeoCodePsa.id', 'GeoCodePsa.psa_code', 'GeoCodePsa.psa_name'), 'order' => 'GeoCodePsa.psa_name'));

		$data2 = $this -> GeoCodeUnion -> find('all', array('conditions' => array('GeoCodeUnion.geo_code_upazila_id =' => $_REQUEST['upazila_id']), 'fields' => array('GeoCodeUnion.id', 'GeoCodeUnion.union_code', 'GeoCodeUnion.union_name'), 'order' => 'GeoCodeUnion.union_name'));

		echo json_encode(array('psa' => $data1, 'union' => $data2));
	}




















	#--------------------------------------------THREE---------------------------------------------------------
	public function tpe_tbl_three_one_ajax() {
		$this -> autoRender = false;
		$this -> layout = false;
		
		if(isset($_SESSION['t_3_1'])) echo json_encode($_SESSION['t_3_1']);
		else echo json_encode("false");
	}

	public function tpe_tbl_three_one() {
		
		$this -> loadModel('Report');

		$divn = "";
		$zila = "";
		$upazila = "";
		$psa = "";
		$union = "";
		
		if ($this -> request -> is('post')) {
			unset($_SESSION['t_3_1']);
			$divn = $this -> request -> data['divn_text'];
			$zila = $this -> request -> data['zila_text'];
			$upazila = $this -> request -> data['upazila_text'];
			$psa = $this -> request -> data['psa_text'];
			$union = $this -> request -> data['union_text'];

			$conditions = array();
			$where = " 1=1";
			if ($this -> request -> data['geo_code_divn'] != "") {
				$conditions['geo_code_divn_id'] = $this -> request -> data['geo_code_divn'];
				$where .= " AND geo_code_divn_id = '" . $this -> request -> data['geo_code_divn'] . "'";
			}
			if ($this -> request -> data['geo_code_zila'] != "") {
				$conditions['geo_code_zila_id'] = $this -> request -> data['geo_code_zila'];
				$where .= " AND geo_code_zila_id = '" . $this -> request -> data['geo_code_zila'] . "'";
			}
			if ($this -> request -> data['geo_code_upazila'] != "") {
				$conditions['geo_code_upazila_id'] = $this -> request -> data['geo_code_upazila'];
				$where .= " AND geo_code_upazila_id = '" . $this -> request -> data['geo_code_upazila'] . "'";
			}
			if ($this -> request -> data['geo_code_psa'] != "") {
				$conditions['geo_code_psa_id'] = $this -> request -> data['geo_code_psa'];
				$where .= " AND geo_code_psa_id = '" . $this -> request -> data['geo_code_psa'] . "'";
			}
			if ($this -> request -> data['geo_code_union'] != "") {
				$conditions['geo_code_union_id'] = $this -> request -> data['geo_code_union'];
				$where .= " AND geo_code_union_id = '" . $this -> request -> data['geo_code_union'] . "'";
			}

			$where_urban = $where . " AND ques_rmo_code IN(2,3,5,9) ";			
			$where_rural = $where . " AND ques_rmo_code IN(1,7) ";

			$where_parmanent = $where . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 ";
			$where_temporary = $where . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 2 ";
			$where_household = $where . " AND Q4_UNIT_TYPE = 1 ";

			$where_urban_parmanent = $where_urban . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 ";
			$where_urban_temporary = $where_urban . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 2 ";
			$where_urban_household = $where_urban . " AND Q4_UNIT_TYPE = 1 ";

			$where_rural_parmanent = $where_rural . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 ";
			$where_rural_temporary = $where_rural . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 2 ";
			$where_rural_household = $where_rural . " AND Q4_UNIT_TYPE = 1 ";

			//#############################   PART ONE ####################################
			// //ROW ONE TOTAL
			// $total_est = $this -> Report -> query("SELECT COUNT(QUESTIONNARIE_ID) AS total_est FROM BBSEC2013_REPORTS WHERE " .$where);
			// $total_est = $total_est[0][0]['total_est'];

			// $total_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where);
			// $total_est_person = (int)$total_est_person[0][0]['total_person_engaged'];

			// $total_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where);
			// $total_est_male = $total_est_male[0][0]['total_male_engaged'];

			// $total_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where);
			// $total_est_female = $total_est_female[0][0]['total_female_engaged'];

			// //ROW TWO PARMANENT
			// $total_parmanent_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_parmanent);
			// $total_parmanent_est = $total_parmanent_est[0][0]['total_est'];

			// $total_parmanent_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent);
			// $total_parmanent_est_person = $total_parmanent_est_person[0][0]['total_person_engaged'];

			// $total_parmanent_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent);
			// $total_parmanent_est_male = $total_parmanent_est_male[0][0]['total_male_engaged'];

			// $total_parmanent_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent);
			// $total_parmanent_est_female = $total_parmanent_est_female[0][0]['total_female_engaged'];

			// //ROW THREE TEMPORARY
			// $total_temporary_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_temporary);
			// $total_temporary_est = $total_temporary_est[0][0]['total_est'];

			// $total_temporary_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary);
			// $total_temporary_est_person = $total_temporary_est_person[0][0]['total_person_engaged'];

			// $total_temporary_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary);
			// $total_temporary_est_male = $total_temporary_est_male[0][0]['total_male_engaged'];

			// $total_temporary_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary);
			// $total_temporary_est_female = $total_temporary_est_female[0][0]['total_female_engaged'];

			// //ROW FOUR HOUSE
			// $total_household_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_household);
			// $total_household_est = $total_household_est[0][0]['total_est'];

			// $total_household_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household);
			// $total_household_est_person = $total_household_est_person[0][0]['total_person_engaged'];

			// $total_household_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household);
			// $total_household_est_male = $total_household_est_male[0][0]['total_male_engaged'];

			// $total_household_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household);
			// $total_household_est_female = $total_household_est_female[0][0]['total_female_engaged'];

			

			//#############################   PART TWO: URBAN ####################################
			//ROW ONE URBAN TOTAL
			// $total_urban_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_urban);
			// $total_urban_est = $total_urban_est[0][0]['total_est'];

			// $total_urban_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban);
			// $total_urban_est_person = $total_urban_est_person[0][0]['total_person_engaged'];

			// $total_urban_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban);
			// $total_urban_est_male = $total_urban_est_male[0][0]['total_male_engaged'];

			// $total_urban_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban);
			// $total_urban_est_female = $total_urban_est_female[0][0]['total_female_engaged'];

			//ROW TWO URBAN PARMANENT
			$total_urban_parmanent_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_urban_parmanent);
			$total_urban_parmanent_est = $total_urban_parmanent_est[0][0]['total_est'];

			$total_urban_parmanent_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_parmanent);
			$total_urban_parmanent_est_person = $total_urban_parmanent_est_person[0][0]['total_person_engaged'];

			$total_urban_parmanent_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_parmanent);
			$total_urban_parmanent_est_male = $total_urban_parmanent_est_male[0][0]['total_male_engaged'];

			$total_urban_parmanent_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_parmanent);
			$total_urban_parmanent_est_female = $total_urban_parmanent_est_female[0][0]['total_female_engaged'];

			//ROW THREE URBAN TEMPORARY
			$total_urban_temporary_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_urban_temporary);
			$total_urban_temporary_est = $total_urban_temporary_est[0][0]['total_est'];

			$total_urban_temporary_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_temporary);
			$total_urban_temporary_est_person = $total_urban_temporary_est_person[0][0]['total_person_engaged'];

			$total_urban_temporary_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_temporary);
			$total_urban_temporary_est_male = $total_urban_temporary_est_male[0][0]['total_male_engaged'];

			$total_urban_temporary_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_temporary);
			$total_urban_temporary_est_female = $total_urban_temporary_est_female[0][0]['total_female_engaged'];

			//ROW FOUR URBAN HOUSEHOLD
			$total_urban_household_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_urban_household);
			$total_urban_household_est = $total_urban_household_est[0][0]['total_est'];

			$total_urban_household_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_household);
			$total_urban_household_est_person = $total_urban_household_est_person[0][0]['total_person_engaged'];

			$total_urban_household_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_household);
			$total_urban_household_est_male = $total_urban_household_est_male[0][0]['total_male_engaged'];

			$total_urban_household_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_household);
			$total_urban_household_est_female = $total_urban_household_est_female[0][0]['total_female_engaged'];

			




			//#############################   PART THREE: RURAL ####################################
			//ROW ONE RURAL TOTAL
			// $total_rural_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_rural);
			// $total_rural_est = $total_rural_est[0][0]['total_est'];

			// $total_rural_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural);
			// $total_rural_est_person = $total_rural_est_person[0][0]['total_person_engaged'];

			// $total_rural_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural);
			// $total_rural_est_male = $total_rural_est_male[0][0]['total_male_engaged'];

			// $total_rural_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural);
			// $total_rural_est_female = $total_rural_est_female[0][0]['total_female_engaged'];

			//ROW TWO RURAL PARMANENT
			$total_rural_parmanent_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_rural_parmanent);
			$total_rural_parmanent_est = $total_rural_parmanent_est[0][0]['total_est'];

			$total_rural_parmanent_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_parmanent);
			$total_rural_parmanent_est_person = $total_rural_parmanent_est_person[0][0]['total_person_engaged'];

			$total_rural_parmanent_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_parmanent);
			$total_rural_parmanent_est_male = $total_rural_parmanent_est_male[0][0]['total_male_engaged'];

			$total_rural_parmanent_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_parmanent);
			$total_rural_parmanent_est_female = $total_rural_parmanent_est_female[0][0]['total_female_engaged'];

			//ROW THREE RURAL TEMPORARY
			$total_rural_temporary_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_rural_temporary);
			$total_rural_temporary_est = $total_rural_temporary_est[0][0]['total_est'];

			$total_rural_temporary_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_temporary);
			$total_rural_temporary_est_person = $total_rural_temporary_est_person[0][0]['total_person_engaged'];

			$total_rural_temporary_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_temporary);
			$total_rural_temporary_est_male = $total_rural_temporary_est_male[0][0]['total_male_engaged'];

			$total_rural_temporary_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_temporary);
			$total_rural_temporary_est_female = $total_rural_temporary_est_female[0][0]['total_female_engaged'];

			//ROW FOUR RURAL HOUSEHOLD
			$total_rural_household_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_rural_household);
			$total_rural_household_est = $total_rural_household_est[0][0]['total_est'];

			$total_rural_household_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_household);
			$total_rural_household_est_person = $total_rural_household_est_person[0][0]['total_person_engaged'];

			$total_rural_household_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_household);
			$total_rural_household_est_male = $total_rural_household_est_male[0][0]['total_male_engaged'];

			$total_rural_household_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_household);
			$total_rural_household_est_female = $total_rural_household_est_female[0][0]['total_female_engaged'];

		}

       # Storing Required GraphData in Session variable
		// $_SESSION['t_3_1']['total_est'] = $total_est;
		// $_SESSION['t_3_1']['total_est_person'] = $total_est_person;

		// $_SESSION['t_3_1']['total_urban_est'] = $total_urban_est;
		// $_SESSION['t_3_1']['total_urban_est_person'] = $total_urban_est_person;

		// $_SESSION['t_3_1']['total_rural_est'] = $total_rural_est;
		// $_SESSION['t_3_1']['total_rural_est_person'] = $total_rural_est_person;


       # Sending Query Result To View
		$this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 


		// 'total_est', 'total_est_person', 'total_est_male', 'total_est_female',
		// # -----------------
		// 'total_parmanent_est', 'total_parmanent_est_person', 'total_parmanent_est_male', 'total_parmanent_est_female',
		// #--------------------------
		// 'total_temporary_est', 'total_temporary_est_person', 'total_temporary_est_male', 'total_temporary_est_female',
		// # -----------------
		// 'total_household_est', 'total_household_est_person', 'total_household_est_male', 'total_household_est_female',
		
		# -------URBAN----------
		//'total_urban_est', 'total_urban_est_person', 'total_urban_est_male', 'total_urban_est_female',
		# -----------------
		'total_urban_parmanent_est', 'total_urban_parmanent_est_person', 'total_urban_parmanent_est_male', 'total_urban_parmanent_est_female',
		# -----------------
		'total_urban_temporary_est', 'total_urban_temporary_est_person', 'total_urban_temporary_est_male', 'total_urban_temporary_est_female',
		# -----------------
		'total_urban_household_est', 'total_urban_household_est_person', 'total_urban_household_est_male', 'total_urban_household_est_female',
		
		# -------RURAL----------
		//'total_rural_est', 'total_rural_est_person', 'total_rural_est_male', 'total_rural_est_female',
		# -----------------
		'total_rural_parmanent_est', 'total_rural_parmanent_est_person', 'total_rural_parmanent_est_male', 'total_rural_parmanent_est_female',
		# -----------------
		'total_rural_temporary_est', 'total_rural_temporary_est_person', 'total_rural_temporary_est_male', 'total_rural_temporary_est_female',
		# -----------------
		'total_rural_household_est', 'total_rural_household_est_person', 'total_rural_household_est_male', 'total_rural_household_est_female'));
	}
























	public function tpe_tbl_three_two_ajax() {
		$this -> autoRender = false;
		$this -> layout = false;
		
		if(isset($_SESSION['t_3_2'])) echo json_encode($_SESSION['t_3_2']);
		else echo json_encode("false");
	}


	public function tpe_tbl_three_two() {
		$this -> set('title_for_layout', 'Total establishment and persons engaged (TPE) by type & locality and annual growth rate between 2001 & 03 and 2013');

		$this -> loadModel('Report');

		$divn = "";
		$zila = "";
		$upazila = "";
		$psa = "";
		$union = "";

		if ($this -> request -> is('post')) {

			unset($_SESSION['t_3_2']);

			$divn = $this -> request -> data['divn_text'];
			$zila = $this -> request -> data['zila_text'];
			$upazila = $this -> request -> data['upazila_text'];
			$psa = $this -> request -> data['psa_text'];
			$union = $this -> request -> data['union_text'];

			$conditions = array();
			$where = " 1=1";
			if ($this -> request -> data['geo_code_divn'] != "") {
				$conditions['geo_code_divn_id'] = $this -> request -> data['geo_code_divn'];
				$where .= " AND geo_code_divn_id = '" . $this -> request -> data['geo_code_divn'] . "'";
			}
			if ($this -> request -> data['geo_code_zila'] != "") {
				$conditions['geo_code_zila_id'] = $this -> request -> data['geo_code_zila'];
				$where .= " AND geo_code_zila_id = '" . $this -> request -> data['geo_code_zila'] . "'";
			}
			if ($this -> request -> data['geo_code_upazila'] != "") {
				$conditions['geo_code_upazila_id'] = $this -> request -> data['geo_code_upazila'];
				$where .= " AND geo_code_upazila_id = '" . $this -> request -> data['geo_code_upazila'] . "'";
			}
			if ($this -> request -> data['geo_code_psa'] != "") {
				$conditions['geo_code_psa_id'] = $this -> request -> data['geo_code_psa'];
				$where .= " AND geo_code_psa_id = '" . $this -> request -> data['geo_code_psa'] . "'";
			}
			if ($this -> request -> data['geo_code_union'] != "") {
				$conditions['geo_code_union_id'] = $this -> request -> data['geo_code_union'];
				$where .= " AND geo_code_union_id = '" . $this -> request -> data['geo_code_union'] . "'";
			}
            
            #Dynamic Where Conditions
			$where_urban = $where . " AND ques_rmo_code IN(2,3,5,9) ";
			$where_rural = $where . " AND ques_rmo_code IN(1,7) ";

			$where_parmanent = $where . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 ";
			$where_temporary = $where . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 2 ";
			$where_household = $where . " AND Q4_UNIT_TYPE = 1 ";

			$where_urban_parmanent = $where_urban . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 ";
			$where_urban_temporary = $where_urban . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 2 ";
			$where_urban_household = $where_urban . " AND Q4_UNIT_TYPE = 1 ";

			$where_rural_parmanent = $where_rural . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 ";
			$where_rural_temporary = $where_rural . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 2 ";
			$where_rural_household = $where_rural . " AND Q4_UNIT_TYPE = 1 ";

			//#############################   PART ONE ####################################
			// //ROW ONE TOTAL
			// $total_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where);
			// $total_est = (int)$total_est[0][0]['total_est'];

			// $total_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where);
			// $total_est_person = (int)$total_est_person[0][0]['total_person_engaged'];

			// //ROW TWO PARMANENT
			// $total_parmanent_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_parmanent);
			// $total_parmanent_est = (int)$total_parmanent_est[0][0]['total_est'];

			// $total_parmanent_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent);
			// $total_parmanent_est_person = (int)$total_parmanent_est_person[0][0]['total_person_engaged'];

			// //ROW THREE TEMPORARY
			// $total_temporary_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_temporary);
			// $total_temporary_est = (int)$total_temporary_est[0][0]['total_est'];

			// $total_temporary_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary);
			// $total_temporary_est_person = (int)$total_temporary_est_person[0][0]['total_person_engaged'];

			// //ROW FOUR HOUSE
			// $total_household_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_household);
			// $total_household_est = (int)$total_household_est[0][0]['total_est'];

			// $total_household_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household);
			// $total_household_est_person = (int)$total_household_est_person[0][0]['total_person_engaged'];

			//#############################   PART TWO ####################################
			//ROW ONE URBAN TOTAL
			$total_urban_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_urban);
			$total_urban_est = (int)$total_urban_est[0][0]['total_est'];

			$total_urban_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban);
			$total_urban_est_person = (int)$total_urban_est_person[0][0]['total_person_engaged'];

			//ROW TWO URBAN PARMANENT
			$total_urban_parmanent_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_urban_parmanent);
			$total_urban_parmanent_est = (int)$total_urban_parmanent_est[0][0]['total_est'];

			$total_urban_parmanent_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_parmanent);
			$total_urban_parmanent_est_person = (int)$total_urban_parmanent_est_person[0][0]['total_person_engaged'];

			//ROW THREE URBAN TEMPORARY
			$total_urban_temporary_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_urban_temporary);
			$total_urban_temporary_est = (int)$total_urban_temporary_est[0][0]['total_est'];

			$total_urban_temporary_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_temporary);
			$total_urban_temporary_est_person = (int)$total_urban_temporary_est_person[0][0]['total_person_engaged'];

			//ROW FOUR URBAN HOUSEHOLD
			$total_urban_household_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_urban_household);
			$total_urban_household_est = (int)$total_urban_household_est[0][0]['total_est'];

			$total_urban_household_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_household);
			$total_urban_household_est_person = (int)$total_urban_household_est_person[0][0]['total_person_engaged'];

			//#############################   PART THREE ####################################
			//ROW ONE RURAL TOTAL
			$total_rural_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_rural);
			$total_rural_est = (int)$total_rural_est[0][0]['total_est'];

			$total_rural_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural);
			$total_rural_est_person = (int)$total_rural_est_person[0][0]['total_person_engaged'];

			//ROW TWO RURAL PARMANENT
			$total_rural_parmanent_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_rural_parmanent);
			$total_rural_parmanent_est = (int)$total_rural_parmanent_est[0][0]['total_est'];

			$total_rural_parmanent_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_parmanent);
			$total_rural_parmanent_est_person = (int)$total_rural_parmanent_est_person[0][0]['total_person_engaged'];

			//ROW THREE RURAL TEMPORARY
			$total_rural_temporary_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_rural_temporary);
			$total_rural_temporary_est = (int)$total_rural_temporary_est[0][0]['total_est'];

			$total_rural_temporary_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_temporary);
			$total_rural_temporary_est_person = (int)$total_rural_temporary_est_person[0][0]['total_person_engaged'];

			//ROW FOUR RURAL HOUSEHOLD
			$total_rural_household_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_rural_household);
			$total_rural_household_est = (int)$total_rural_household_est[0][0]['total_est'];

			$total_rural_household_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_household);
			$total_rural_household_est_person = (int)$total_rural_household_est_person[0][0]['total_person_engaged'];

		}

		 # Storing Required GraphData in Session variable
		
		
		$_SESSION['t_3_2']['total_est_2013'] = $total_est;
		$_SESSION['t_3_2']['total_urban_est_2013'] = $total_urban_est;
		$_SESSION['t_3_2']['total_rural_est_2013'] = $total_rural_est;

        // data for 2003 is not set{ HAVE TO SET-- ON GOING}
		$_SESSION['t_3_2']['total_est_2003'] = $total_est_2003;
		$_SESSION['t_3_2']['total_urban_est_2003'] = $total_urban_est_2003;
		$_SESSION['t_3_2']['total_rural_est_2003'] = $total_rural_est_2003;
		


		$this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 

		// 'total_est', 'total_est_person', 
		// # -----------------
		// 'total_parmanent_est', 'total_parmanent_est_person',
		// #--------------------------
		// 'total_temporary_est', 'total_temporary_est_person',
		// # -----------------
		// 'total_household_est', 'total_household_est_person',
		# -------URBAN----------
		#'total_urban_est', 'total_urban_est_person',
		# -----------------
		'total_urban_parmanent_est', 'total_urban_parmanent_est_person',
		# -----------------
		'total_urban_temporary_est', 'total_urban_temporary_est_person',
		# -----------------
		'total_urban_household_est', 'total_urban_household_est_person',
		# -------RURAL----------
		#'total_rural_est', 'total_rural_est_person',
		# -----------------
		'total_rural_parmanent_est', 'total_rural_parmanent_est_person',
		# -----------------
		'total_rural_temporary_est', 'total_rural_temporary_est_person',
		# -----------------
		'total_rural_household_est', 'total_rural_household_est_person'));

	}



























	public function tpe_tbl_three_three() {
		$this -> set('title_for_layout', '3.3: Total persons engaged (TPE) by sex, type of establishments and location in 2001 & 03 and in 2013');

		// Logic goes Here

		$this -> loadModel('Report');

		$divn = "";
		$zila = "";
		$upazila = "";
		$psa = "";
		$union = "";

		if ($this -> request -> is('post')) {
			$divn = $this -> request -> data['divn_text'];
			$zila = $this -> request -> data['zila_text'];
			$upazila = $this -> request -> data['upazila_text'];
			$psa = $this -> request -> data['psa_text'];
			$union = $this -> request -> data['union_text'];

			$conditions = array();
			$where = " 1=1";
			if ($this -> request -> data['geo_code_divn'] != "") {
				$conditions['geo_code_divn_id'] = $this -> request -> data['geo_code_divn'];
				$where .= " AND geo_code_divn_id = '" . $this -> request -> data['geo_code_divn'] . "'";
			}
			if ($this -> request -> data['geo_code_zila'] != "") {
				$conditions['geo_code_zila_id'] = $this -> request -> data['geo_code_zila'];
				$where .= " AND geo_code_zila_id = '" . $this -> request -> data['geo_code_zila'] . "'";
			}
			if ($this -> request -> data['geo_code_upazila'] != "") {
				$conditions['geo_code_upazila_id'] = $this -> request -> data['geo_code_upazila'];
				$where .= " AND geo_code_upazila_id = '" . $this -> request -> data['geo_code_upazila'] . "'";
			}
			if ($this -> request -> data['geo_code_psa'] != "") {
				$conditions['geo_code_psa_id'] = $this -> request -> data['geo_code_psa'];
				$where .= " AND geo_code_psa_id = '" . $this -> request -> data['geo_code_psa'] . "'";
			}
			if ($this -> request -> data['geo_code_union'] != "") {
				$conditions['geo_code_union_id'] = $this -> request -> data['geo_code_union'];
				$where .= " AND geo_code_union_id = '" . $this -> request -> data['geo_code_union'] . "'";
			}

			$where_urban = $where . " AND ques_rmo_code IN(2,3,5,9) ";
			$where_rural = $where . " AND ques_rmo_code IN(1,7) ";

			$where_parmanent = $where . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 ";
			$where_temporary = $where . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 2 ";
			$where_household = $where . " AND Q4_UNIT_TYPE = 1 ";

			$where_urban_parmanent = $where_urban . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 ";
			$where_urban_temporary = $where_urban . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 2 ";
			$where_urban_household = $where_urban . " AND Q4_UNIT_TYPE = 1 ";

			$where_rural_parmanent = $where_rural . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 ";
			$where_rural_temporary = $where_rural . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 2 ";
			$where_rural_household = $where_rural . " AND Q4_UNIT_TYPE = 1 ";

			//#############################   PART ONE ####################################
			//ROW ONE TOTAL

			// $total_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where);
			// $total_est_person = (int)$total_est_person[0][0]['total_person_engaged'];

			// $total_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where);
			// $total_est_male = $total_est_male[0][0]['total_male_engaged'];

			// $total_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where);
			// $total_est_female = $total_est_female[0][0]['total_female_engaged'];

			//ROW TWO PARMANENT

			// $total_parmanent_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent);
			// $total_parmanent_est_person = $total_parmanent_est_person[0][0]['total_person_engaged'];

			// $total_parmanent_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent);
			// $total_parmanent_est_male = $total_parmanent_est_male[0][0]['total_male_engaged'];

			// $total_parmanent_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent);
			// $total_parmanent_est_female = $total_parmanent_est_female[0][0]['total_female_engaged'];

			// //ROW THREE TEMPORARY

			// $total_temporary_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary);
			// $total_temporary_est_person = $total_temporary_est_person[0][0]['total_person_engaged'];

			// $total_temporary_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary);
			// $total_temporary_est_male = $total_temporary_est_male[0][0]['total_male_engaged'];

			// $total_temporary_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary);
			// $total_temporary_est_female = $total_temporary_est_female[0][0]['total_female_engaged'];

			// //ROW FOUR HOUSE

			// $total_household_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household);
			// $total_household_est_person = $total_household_est_person[0][0]['total_person_engaged'];

			// $total_household_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household);
			// $total_household_est_male = $total_household_est_male[0][0]['total_male_engaged'];

			// $total_household_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household);
			// $total_household_est_female = $total_household_est_female[0][0]['total_female_engaged'];

			//#############################   PART TWO : URBAN ####################################
			//ROW ONE URBAN TOTAL

			$total_urban_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban);
			$total_urban_est_person = $total_urban_est_person[0][0]['total_person_engaged'];

			$total_urban_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban);
			$total_urban_est_male = $total_urban_est_male[0][0]['total_male_engaged'];

			$total_urban_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban);
			$total_urban_est_female = $total_urban_est_female[0][0]['total_female_engaged'];

			//ROW TWO URBAN PARMANENT

			$total_urban_parmanent_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_parmanent);
			$total_urban_parmanent_est_person = $total_urban_parmanent_est_person[0][0]['total_person_engaged'];

			$total_urban_parmanent_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_parmanent);
			$total_urban_parmanent_est_male = $total_urban_parmanent_est_male[0][0]['total_male_engaged'];

			$total_urban_parmanent_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_parmanent);
			$total_urban_parmanent_est_female = $total_urban_parmanent_est_female[0][0]['total_female_engaged'];

			//ROW THREE URBAN TEMPORARY

			$total_urban_temporary_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_temporary);
			$total_urban_temporary_est_person = $total_urban_temporary_est_person[0][0]['total_person_engaged'];

			$total_urban_temporary_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_temporary);
			$total_urban_temporary_est_male = $total_urban_temporary_est_male[0][0]['total_male_engaged'];

			$total_urban_temporary_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_temporary);
			$total_urban_temporary_est_female = $total_urban_temporary_est_female[0][0]['total_female_engaged'];

			//ROW FOUR URBAN HOUSEHOLD

			$total_urban_household_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_household);
			$total_urban_household_est_person = $total_urban_household_est_person[0][0]['total_person_engaged'];

			$total_urban_household_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_household);
			$total_urban_household_est_male = $total_urban_household_est_male[0][0]['total_male_engaged'];

			$total_urban_household_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_household);
			$total_urban_household_est_female = $total_urban_household_est_female[0][0]['total_female_engaged'];

			//#############################   PART THREE: RURAL####################################
			//ROW ONE RURAL TOTAL

			$total_rural_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural);
			$total_rural_est_person = $total_rural_est_person[0][0]['total_person_engaged'];

			$total_rural_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural);
			$total_rural_est_male = $total_rural_est_male[0][0]['total_male_engaged'];

			$total_rural_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural);
			$total_rural_est_female = $total_rural_est_female[0][0]['total_female_engaged'];

			//ROW TWO RURAL PARMANENT

			$total_rural_parmanent_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_parmanent);
			$total_rural_parmanent_est_person = $total_rural_parmanent_est_person[0][0]['total_person_engaged'];

			$total_rural_parmanent_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_parmanent);
			$total_rural_parmanent_est_male = $total_rural_parmanent_est_male[0][0]['total_male_engaged'];

			$total_rural_parmanent_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_parmanent);
			$total_rural_parmanent_est_female = $total_rural_parmanent_est_female[0][0]['total_female_engaged'];

			//ROW THREE RURAL TEMPORARY

			$total_rural_temporary_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_temporary);
			$total_rural_temporary_est_person = $total_rural_temporary_est_person[0][0]['total_person_engaged'];

			$total_rural_temporary_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_temporary);
			$total_rural_temporary_est_male = $total_rural_temporary_est_male[0][0]['total_male_engaged'];

			$total_rural_temporary_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_temporary);
			$total_rural_temporary_est_female = $total_rural_temporary_est_female[0][0]['total_female_engaged'];

			//ROW FOUR RURAL HOUSEHOLD

			$total_rural_household_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_household);
			$total_rural_household_est_person = $total_rural_household_est_person[0][0]['total_person_engaged'];

			$total_rural_household_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_household);
			$total_rural_household_est_male = $total_rural_household_est_male[0][0]['total_male_engaged'];

			$total_rural_household_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_household);
			$total_rural_household_est_female = $total_rural_household_est_female[0][0]['total_female_engaged'];

		}

		$this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union',
		# -------TOTAL----------
		// 'total_est_person', 'total_est_male', 'total_est_female',
		// # -----------------
		// 'total_parmanent_est_person', 'total_parmanent_est_male', 'total_parmanent_est_female',
		// #--------------------------
		// 'total_temporary_est_person', 'total_temporary_est_male', 'total_temporary_est_female',
		// # -----------------
		// 'total_household_est_person', 'total_household_est_male', 'total_household_est_female',
		
		# -------URBAN----------
		//'total_urban_est_person', 'total_urban_est_male', 'total_urban_est_female',
		# -----------------
		'total_urban_parmanent_est_person', 'total_urban_parmanent_est_male', 'total_urban_parmanent_est_female',
		# -----------------
		'total_urban_temporary_est_person', 'total_urban_temporary_est_male', 'total_urban_temporary_est_female',
		# -----------------
		'total_urban_household_est_person', 'total_urban_household_est_male', 'total_urban_household_est_female',
		# -------RURAL----------
		//'total_rural_est_person', 'total_rural_est_male', 'total_rural_est_female',
		# -----------------
		'total_rural_parmanent_est_person', 'total_rural_parmanent_est_male', 'total_rural_parmanent_est_female',
		# -----------------
		'total_rural_temporary_est_person', 'total_rural_temporary_est_male', 'total_rural_temporary_est_female',
		# -----------------
		'total_rural_household_est_person', 'total_rural_household_est_male', 'total_rural_household_est_female'));

	}

	
















	public function tpe_tbl_three_four() {
		$this -> set('title_for_layout', '3.4: Average size of establishments by type, location and sex in 2001 & 03 and in 2013');

		$this -> loadModel('Report');

		$divn = "";
		$zila = "";
		$upazila = "";
		$psa = "";
		$union = "";

		if ($this -> request -> is('post')) {
			$divn = $this -> request -> data['divn_text'];
			$zila = $this -> request -> data['zila_text'];
			$upazila = $this -> request -> data['upazila_text'];
			$psa = $this -> request -> data['psa_text'];
			$union = $this -> request -> data['union_text'];

			$conditions = array();
			$where = " 1=1";
			if ($this -> request -> data['geo_code_divn'] != "") {
				$conditions['geo_code_divn_id'] = $this -> request -> data['geo_code_divn'];
				$where .= " AND geo_code_divn_id = '" . $this -> request -> data['geo_code_divn'] . "'";
			}
			if ($this -> request -> data['geo_code_zila'] != "") {
				$conditions['geo_code_zila_id'] = $this -> request -> data['geo_code_zila'];
				$where .= " AND geo_code_zila_id = '" . $this -> request -> data['geo_code_zila'] . "'";
			}
			if ($this -> request -> data['geo_code_upazila'] != "") {
				$conditions['geo_code_upazila_id'] = $this -> request -> data['geo_code_upazila'];
				$where .= " AND geo_code_upazila_id = '" . $this -> request -> data['geo_code_upazila'] . "'";
			}
			if ($this -> request -> data['geo_code_psa'] != "") {
				$conditions['geo_code_psa_id'] = $this -> request -> data['geo_code_psa'];
				$where .= " AND geo_code_psa_id = '" . $this -> request -> data['geo_code_psa'] . "'";
			}
			if ($this -> request -> data['geo_code_union'] != "") {
				$conditions['geo_code_union_id'] = $this -> request -> data['geo_code_union'];
				$where .= " AND geo_code_union_id = '" . $this -> request -> data['geo_code_union'] . "'";
			}

			$where_urban = $where . " AND ques_rmo_code IN(2,3,5,9) ";
			$where_rural = $where . " AND ques_rmo_code IN(1,7) ";

			$where_parmanent = $where . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 ";
			$where_temporary = $where . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 2 ";
			$where_household = $where . " AND Q4_UNIT_TYPE = 1 ";

			$where_urban_parmanent = $where_urban . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 ";
			$where_urban_temporary = $where_urban . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 2 ";
			$where_urban_household = $where_urban . " AND Q4_UNIT_TYPE = 1 ";

			$where_rural_parmanent = $where_rural . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 ";
			$where_rural_temporary = $where_rural . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 2 ";
			$where_rural_household = $where_rural . " AND Q4_UNIT_TYPE = 1 ";

			//#############################   PART ONE ####################################
			//ROW ONE TOTAL
			$total_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where);
			$total_est = $total_est[0][0]['total_est'];

			$total_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where);
			$total_est_person = (int)$total_est_person[0][0]['total_person_engaged'];

			$total_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where);
			$total_est_male = $total_est_male[0][0]['total_male_engaged'];

			$total_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where);
			$total_est_female = $total_est_female[0][0]['total_female_engaged'];

			//ROW TWO PARMANENT
			$total_parmanent_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_parmanent);
			$total_parmanent_est = $total_parmanent_est[0][0]['total_est'];

			$total_parmanent_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent);
			$total_parmanent_est_person = $total_parmanent_est_person[0][0]['total_person_engaged'];

			$total_parmanent_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent);
			$total_parmanent_est_male = $total_parmanent_est_male[0][0]['total_male_engaged'];

			$total_parmanent_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent);
			$total_parmanent_est_female = $total_parmanent_est_female[0][0]['total_female_engaged'];

			//ROW THREE TEMPORARY
			$total_temporary_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_temporary);
			$total_temporary_est = $total_temporary_est[0][0]['total_est'];

			$total_temporary_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary);
			$total_temporary_est_person = $total_temporary_est_person[0][0]['total_person_engaged'];

			$total_temporary_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary);
			$total_temporary_est_male = $total_temporary_est_male[0][0]['total_male_engaged'];

			$total_temporary_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary);
			$total_temporary_est_female = $total_temporary_est_female[0][0]['total_female_engaged'];

			//ROW FOUR HOUSE
			$total_household_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_household);
			$total_household_est = $total_household_est[0][0]['total_est'];

			$total_household_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household);
			$total_household_est_person = $total_household_est_person[0][0]['total_person_engaged'];

			$total_household_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household);
			$total_household_est_male = $total_household_est_male[0][0]['total_male_engaged'];

			$total_household_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household);
			$total_household_est_female = $total_household_est_female[0][0]['total_female_engaged'];

			//#############################   PART TWO ####################################
			//ROW ONE URBAN TOTAL
			$total_urban_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_urban);
			$total_urban_est = $total_urban_est[0][0]['total_est'];

			$total_urban_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban);
			$total_urban_est_person = $total_urban_est_person[0][0]['total_person_engaged'];

			$total_urban_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban);
			$total_urban_est_male = $total_urban_est_male[0][0]['total_male_engaged'];

			$total_urban_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban);
			$total_urban_est_female = $total_urban_est_female[0][0]['total_female_engaged'];

			//ROW TWO URBAN PARMANENT
			$total_urban_parmanent_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_urban_parmanent);
			$total_urban_parmanent_est = $total_urban_parmanent_est[0][0]['total_est'];

			$total_urban_parmanent_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_parmanent);
			$total_urban_parmanent_est_person = $total_urban_parmanent_est_person[0][0]['total_person_engaged'];

			$total_urban_parmanent_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_parmanent);
			$total_urban_parmanent_est_male = $total_urban_parmanent_est_male[0][0]['total_male_engaged'];

			$total_urban_parmanent_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_parmanent);
			$total_urban_parmanent_est_female = $total_urban_parmanent_est_female[0][0]['total_female_engaged'];

			//ROW THREE URBAN TEMPORARY
			$total_urban_temporary_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_urban_temporary);
			$total_urban_temporary_est = $total_urban_temporary_est[0][0]['total_est'];

			$total_urban_temporary_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_temporary);
			$total_urban_temporary_est_person = $total_urban_temporary_est_person[0][0]['total_person_engaged'];

			$total_urban_temporary_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_temporary);
			$total_urban_temporary_est_male = $total_urban_temporary_est_male[0][0]['total_male_engaged'];

			$total_urban_temporary_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_temporary);
			$total_urban_temporary_est_female = $total_urban_temporary_est_female[0][0]['total_female_engaged'];

			//ROW FOUR URBAN HOUSEHOLD
			$total_urban_household_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_urban_household);
			$total_urban_household_est = $total_urban_household_est[0][0]['total_est'];

			$total_urban_household_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_household);
			$total_urban_household_est_person = $total_urban_household_est_person[0][0]['total_person_engaged'];

			$total_urban_household_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_household);
			$total_urban_household_est_male = $total_urban_household_est_male[0][0]['total_male_engaged'];

			$total_urban_household_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban_household);
			$total_urban_household_est_female = $total_urban_household_est_female[0][0]['total_female_engaged'];

			//#############################   PART THREE ####################################
			//ROW ONE RURAL TOTAL
			$total_rural_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_rural);
			$total_rural_est = $total_rural_est[0][0]['total_est'];

			$total_rural_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural);
			$total_rural_est_person = $total_rural_est_person[0][0]['total_person_engaged'];

			$total_rural_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural);
			$total_rural_est_male = $total_rural_est_male[0][0]['total_male_engaged'];

			$total_rural_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural);
			$total_rural_est_female = $total_rural_est_female[0][0]['total_female_engaged'];

			//ROW TWO RURAL PARMANENT
			$total_rural_parmanent_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_rural_parmanent);
			$total_rural_parmanent_est = $total_rural_parmanent_est[0][0]['total_est'];

			$total_rural_parmanent_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_parmanent);
			$total_rural_parmanent_est_person = $total_rural_parmanent_est_person[0][0]['total_person_engaged'];

			$total_rural_parmanent_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_parmanent);
			$total_rural_parmanent_est_male = $total_rural_parmanent_est_male[0][0]['total_male_engaged'];

			$total_rural_parmanent_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_parmanent);
			$total_rural_parmanent_est_female = $total_rural_parmanent_est_female[0][0]['total_female_engaged'];

			//ROW THREE RURAL TEMPORARY
			$total_rural_temporary_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_rural_temporary);
			$total_rural_temporary_est = $total_rural_temporary_est[0][0]['total_est'];

			$total_rural_temporary_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_temporary);
			$total_rural_temporary_est_person = $total_rural_temporary_est_person[0][0]['total_person_engaged'];

			$total_rural_temporary_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_temporary);
			$total_rural_temporary_est_male = $total_rural_temporary_est_male[0][0]['total_male_engaged'];

			$total_rural_temporary_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_temporary);
			$total_rural_temporary_est_female = $total_rural_temporary_est_female[0][0]['total_female_engaged'];

			//ROW FOUR RURAL HOUSEHOLD
			$total_rural_household_est = $this -> Report -> query("SELECT COUNT(*) AS total_est FROM BBSEC2013_REPORTS WHERE " . $where_rural_household);
			$total_rural_household_est = $total_rural_household_est[0][0]['total_est'];

			$total_rural_household_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_household);
			$total_rural_household_est_person = $total_rural_household_est_person[0][0]['total_person_engaged'];

			$total_rural_household_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_household);
			$total_rural_household_est_male = $total_rural_household_est_male[0][0]['total_male_engaged'];

			$total_rural_household_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural_household);
			$total_rural_household_est_female = $total_rural_household_est_female[0][0]['total_female_engaged'];

		}

		$this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 
		'total_est', 'total_est_person', 'total_est_male', 'total_est_female',
		# -----------------
		'total_parmanent_est', 'total_parmanent_est_person', 'total_parmanent_est_male', 'total_parmanent_est_female',
		#--------------------------
		'total_temporary_est', 'total_temporary_est_person', 'total_temporary_est_male', 'total_temporary_est_female',
		# -----------------
		'total_household_est', 'total_household_est_person', 'total_household_est_male', 'total_household_est_female',
		# -------URBAN----------
		'total_urban_est', 'total_urban_est_person', 'total_urban_est_male', 'total_urban_est_female',
		# -----------------
		'total_urban_parmanent_est', 'total_urban_parmanent_est_person', 'total_urban_parmanent_est_male', 'total_urban_parmanent_est_female',
		# -----------------
		'total_urban_temporary_est', 'total_urban_temporary_est_person', 'total_urban_temporary_est_male', 'total_urban_temporary_est_female',
		# -----------------
		'total_urban_household_est', 'total_urban_household_est_person', 'total_urban_household_est_male', 'total_urban_household_est_female',
		# -------RURAL----------
		'total_rural_est', 'total_rural_est_person', 'total_rural_est_male', 'total_rural_est_female',
		# -----------------
		'total_rural_parmanent_est', 'total_rural_parmanent_est_person', 'total_rural_parmanent_est_male', 'total_rural_parmanent_est_female',
		# -----------------
		'total_rural_temporary_est', 'total_rural_temporary_est_person', 'total_rural_temporary_est_male', 'total_rural_temporary_est_female',
		# -----------------
		'total_rural_household_est', 'total_rural_household_est_person', 'total_rural_household_est_male', 'total_rural_household_est_female'));

	}















	public function tpe_tbl_three_five() {

		$this -> set('title_for_layout', '3.5: Average size of establishments by type, location and sex in 2001 & 03 and in 2013');

		$this -> loadModel('Report');

		$divn = "";
		$zila = "";
		$upazila = "";
		$psa = "";
		$union = "";

		if ($this -> request -> is('post')) {
			$divn = $this -> request -> data['divn_text'];
			$zila = $this -> request -> data['zila_text'];
			$upazila = $this -> request -> data['upazila_text'];
			$psa = $this -> request -> data['psa_text'];
			$union = $this -> request -> data['union_text'];

			$conditions = array();
			$where = " 1=1";
			if ($this -> request -> data['geo_code_divn'] != "") {
				$conditions['geo_code_divn_id'] = $this -> request -> data['geo_code_divn'];
				$where .= " AND geo_code_divn_id = '" . $this -> request -> data['geo_code_divn'] . "'";
			}
			if ($this -> request -> data['geo_code_zila'] != "") {
				$conditions['geo_code_zila_id'] = $this -> request -> data['geo_code_zila'];
				$where .= " AND geo_code_zila_id = '" . $this -> request -> data['geo_code_zila'] . "'";
			}
			if ($this -> request -> data['geo_code_upazila'] != "") {
				$conditions['geo_code_upazila_id'] = $this -> request -> data['geo_code_upazila'];
				$where .= " AND geo_code_upazila_id = '" . $this -> request -> data['geo_code_upazila'] . "'";
			}
			if ($this -> request -> data['geo_code_psa'] != "") {
				$conditions['geo_code_psa_id'] = $this -> request -> data['geo_code_psa'];
				$where .= " AND geo_code_psa_id = '" . $this -> request -> data['geo_code_psa'] . "'";
			}
			if ($this -> request -> data['geo_code_union'] != "") {
				$conditions['geo_code_union_id'] = $this -> request -> data['geo_code_union'];
				$where .= " AND geo_code_union_id = '" . $this -> request -> data['geo_code_union'] . "'";
			}

			$where_parmanent = $where . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 ";
			$where_temporary = $where . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 2 ";
			$where_household = $where . " AND Q4_UNIT_TYPE = 1 ";

			
			$total_worker = $this -> Report -> query("SELECT SUM(TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON_ENGAGED FROM BBSEC2013_REPORTS WHERE " . $where);
			$total_worker = $total_worker[0][0]['TOTAL_PERSON_ENGAGED'];

			$total_paid_worker = $this -> Report -> query("SELECT SUM(TOTAL_PAID_ENGAGED) AS total_paid_engaged FROM BBSEC2013_REPORTS WHERE " . $where);
			$total_paid_worker = $total_paid_worker[0][0]['total_paid_engaged'];

			$total_casual_worker = $this -> Report -> query("SELECT SUM(TOTAL_CASUAL_ENGAGED) AS total_casual_engaged FROM BBSEC2013_REPORTS WHERE " . $where);
			$total_casual_worker = $total_casual_worker[0][0]['total_casual_engaged'];

			

			//ROW TWO PARMANENT
			$total_parmanent_worker = $this -> Report -> query("SELECT SUM(TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON_ENGAGED FROM BBSEC2013_REPORTS WHERE " . $where_parmanent);
			$total_parmanent_worker = $total_parmanent_worker[0][0]['TOTAL_PERSON_ENGAGED'];

			$total_parmanent_paid_worker = $this -> Report -> query("SELECT SUM(TOTAL_PAID_ENGAGED) AS total_parmanent_paid_worker FROM BBSEC2013_REPORTS WHERE " . $where_parmanent);
			$total_parmanent_paid_worker = $total_parmanent_paid_worker[0][0]['total_parmanent_paid_worker'];

			$total_parmanent_casual_worker = $this -> Report -> query("SELECT SUM(TOTAL_CASUAL_ENGAGED) AS total_parmanent_casual_worker FROM BBSEC2013_REPORTS WHERE " . $where_parmanent);
			$total_parmanent_casual_worker = $total_parmanent_casual_worker[0][0]['total_parmanent_casual_worker'];



			
			//ROW THREE TEMPORARY
			$total_temporary_worker = $this -> Report -> query("SELECT SUM(TOTAL_PERSON_ENGAGED) AS total_temporary_worker FROM BBSEC2013_REPORTS WHERE " . $where_temporary);
			$total_temporary_worker = $total_temporary_worker[0][0]['total_temporary_worker'];

			$total_temporary_paid_worker = $this -> Report -> query("SELECT SUM(TOTAL_PAID_ENGAGED) AS total_temporary_paid_worker FROM BBSEC2013_REPORTS WHERE " . $where_temporary);
			$total_temporary_paid_worker = $total_temporary_paid_worker[0][0]['total_temporary_paid_worker'];

			$total_temporary_casual_worker = $this -> Report -> query("SELECT SUM(TOTAL_CASUAL_ENGAGED) AS total_temporary_casual_worker FROM BBSEC2013_REPORTS WHERE " . $where_temporary);
			$total_temporary_casual_worker = $total_temporary_casual_worker[0][0]['total_temporary_casual_worker'];

			
			//ROW FOUR HOUSEHOLD
			$total_household_worker = $this -> Report -> query("SELECT SUM(TOTAL_PERSON_ENGAGED) AS total_household_worker FROM BBSEC2013_REPORTS WHERE " . $where_household);
			$total_household_worker = $total_household_worker[0][0]['total_household_worker'];

			$total_household_paid_worker = $this -> Report -> query("SELECT SUM(TOTAL_PAID_ENGAGED) AS total_household_paid_worker FROM BBSEC2013_REPORTS WHERE " . $where_household);
			$total_household_paid_worker = $total_household_paid_worker[0][0]['total_household_paid_worker'];

			$total_household_casual_worker = $this -> Report -> query("SELECT SUM(TOTAL_CASUAL_ENGAGED) AS total_household_casual_worker FROM BBSEC2013_REPORTS WHERE " . $where_household);
			$total_household_casual_worker = $total_household_casual_worker[0][0]['total_household_casual_worker'];
		
		}

		$this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 
		# Total -----------------	
		//'total_worker', 'total_paid_worker', 'total_casual_worker', 
		# Parmanent -----------------
		//'total_parmanent_worker', 
		'total_parmanent_paid_worker', 'total_parmanent_casual_worker', 
		# Temporary-------------------
		//'total_temporary_worker', 
		'total_temporary_paid_worker', 'total_temporary_casual_worker', 
		# Economic Household----------
		//'total_household_worker', 
		'total_household_paid_worker', 'total_household_casual_worker'
		));
	}

	




















	#------------------------------------------------FOUR-----------------------------------------------------

	public function tpe_tbl_four_one() {
		$this -> loadModel('Report');

		$divn = "";
		$zila = "";
		$upazila = "";
		$psa = "";
		$union = "";

		if ($this -> request -> is('post')) {
			$divn = $this -> request -> data['divn_text'];
			$zila = $this -> request -> data['zila_text'];
			$upazila = $this -> request -> data['upazila_text'];
			$psa = $this -> request -> data['psa_text'];
			$union = $this -> request -> data['union_text'];

			$where = $this->_make_where_condition();

			//#############################   PART ONE ####################################
			//ROW A
			// $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 1 AND 3 ");
			// $A_Total_Estab =  (int) $result[0][0]['total_est'];
			// $A_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			// $A_Total_Person_Male =  (int) $result[0][0]['total_male_engaged'];
			// $A_Total_Person_Female =  (int) $result[0][0]['total_female_engaged'];

			//ROW B
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 5 AND 9 ");
			$B_Total_Estab =  (int) $result[0][0]['total_est'];
			$B_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$B_Total_Person_Male = (int)  $result[0][0]['total_male_engaged'];
			$B_Total_Person_Female = (int) $result[0][0]['total_female_engaged'];
			
			//ROW C
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33 ");
			$C_Total_Estab =  (int) $result[0][0]['total_est'];
			$C_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$C_Total_Person_Male = (int)  $result[0][0]['total_male_engaged'];
			$C_Total_Person_Female = (int)  $result[0][0]['total_female_engaged'];
			
			//ROW D
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 35 ");
			$D_Total_Estab =  (int) $result[0][0]['total_est'];
			$D_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$D_Total_Person_Male = (int)  $result[0][0]['total_male_engaged'];
			$D_Total_Person_Female = (int) $result[0][0]['total_female_engaged'];
			
			//ROW E
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 36 AND 39 ");
			$E_Total_Estab = (int)  $result[0][0]['total_est'];
			$E_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$E_Total_Person_Male = (int)  $result[0][0]['total_male_engaged'];
			$E_Total_Person_Female =  (int) $result[0][0]['total_female_engaged'];
			
			
			//ROW F
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 41 AND 43 ");
			$F_Total_Estab =  (int) $result[0][0]['total_est'];
			$F_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$F_Total_Person_Male =  (int) $result[0][0]['total_male_engaged'];
			$F_Total_Person_Female = (int) $result[0][0]['total_female_engaged'];
			
			//ROW G
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 45 AND 47 ");
			$G_Total_Estab =  (int) $result[0][0]['total_est'];
			$G_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$G_Total_Person_Male =  (int) $result[0][0]['total_male_engaged'];
			$G_Total_Person_Female =  (int) $result[0][0]['total_female_engaged'];
			
			//ROW H
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 49 AND 53 ");
			$H_Total_Estab =  (int) $result[0][0]['total_est'];
			$H_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$H_Total_Person_Male =  (int) $result[0][0]['total_male_engaged'];
			$H_Total_Person_Female =  (int) $result[0][0]['total_female_engaged'];
			
			
			//ROW I
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 55 AND 56 ");
			$I_Total_Estab =  (int) $result[0][0]['total_est'];
			$I_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$I_Total_Person_Male =  (int) $result[0][0]['total_male_engaged'];
			$I_Total_Person_Female =  (int) $result[0][0]['total_female_engaged'];
			
			
			//ROW J
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 58 AND 63 ");
			$J_Total_Estab =  (int) $result[0][0]['total_est'];
			$J_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$J_Total_Person_Male = (int)  $result[0][0]['total_male_engaged'];
			$J_Total_Person_Female =  (int) $result[0][0]['total_female_engaged'];
			
			
			
			//ROW K
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 64 AND 66 ");
			$K_Total_Estab =  (int) $result[0][0]['total_est'];
			$K_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$K_Total_Person_Male = (int)  $result[0][0]['total_male_engaged'];
			$K_Total_Person_Female =  (int) $result[0][0]['total_female_engaged'];
			
			
			//ROW L
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 68 ");
			$L_Total_Estab = (int)  $result[0][0]['total_est'];
			$L_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$L_Total_Person_Male = (int)  $result[0][0]['total_male_engaged'];
			$L_Total_Person_Female =  (int) $result[0][0]['total_female_engaged'];
			
			
			//ROW M
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 69 AND 75 ");
			$M_Total_Estab = (int)  $result[0][0]['total_est'];
			$M_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$M_Total_Person_Male =  (int) $result[0][0]['total_male_engaged'];
			$M_Total_Person_Female =  (int) $result[0][0]['total_female_engaged'];
			
			
			//ROW N
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 77 AND 82 ");
			$N_Total_Estab = (int)  $result[0][0]['total_est'];
			$N_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$N_Total_Person_Male = (int)  $result[0][0]['total_male_engaged'];
			$N_Total_Person_Female =  (int) $result[0][0]['total_female_engaged'];
			
			//ROW O
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 84 ");
			$O_Total_Estab = (int)  $result[0][0]['total_est'];
			$O_Total_Person = (int)  $result[0][0]['total_person_engaged'];
			$O_Total_Person_Male = (int)  $result[0][0]['total_male_engaged'];
			$O_Total_Person_Female =  (int) $result[0][0]['total_female_engaged'];
			
			
			//ROW P
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 85 ");
			$P_Total_Estab =  (int) $result[0][0]['total_est'];
			$P_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$P_Total_Person_Male =  (int) $result[0][0]['total_male_engaged'];
			$P_Total_Person_Female =  (int) $result[0][0]['total_female_engaged'];
			
			
			//ROW Q
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 86 AND 88 ");
			$Q_Total_Estab =  (int) $result[0][0]['total_est'];
			$Q_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$Q_Total_Person_Male = (int)  $result[0][0]['total_male_engaged'];
			$Q_Total_Person_Female = (int)  $result[0][0]['total_female_engaged'];
			
			
			//ROW R
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 90 AND 93 ");
			$R_Total_Estab = (int)  $result[0][0]['total_est'];
			$R_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$R_Total_Person_Male = (int)  $result[0][0]['total_male_engaged'];
			$R_Total_Person_Female = (int)  $result[0][0]['total_female_engaged'];
			
			
			//ROW S
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 94 AND 96 ");
			$S_Total_Estab = (int)  $result[0][0]['total_est'];
			$S_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$S_Total_Person_Male = (int)  $result[0][0]['total_male_engaged'];
			$S_Total_Person_Female =  (int) $result[0][0]['total_female_engaged'];
			
			
			//ROW T
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 97 AND 98 ");
			$T_Total_Estab = (int)  $result[0][0]['total_est'];
			$T_Total_Person =  (int) $result[0][0]['total_person_engaged'];
			$T_Total_Person_Male = (int)  $result[0][0]['total_male_engaged'];
			$T_Total_Person_Female = (int)  $result[0][0]['total_female_engaged'];
			
			
			//ROW U
			$result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged, SUM(TOTAL_MALE_ENGAGED) AS total_male_engaged, SUM(TOTAL_FEMALE_ENGAGED) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 99 ");
			$U_Total_Estab = (int) $result[0][0]['total_est'];
			$U_Total_Person = (int)$result[0][0]['total_person_engaged'];
			$U_Total_Person_Male = (int) $result[0][0]['total_male_engaged'];
			$U_Total_Person_Female = (int) $result[0][0]['total_female_engaged'];
	
			
		}

		$this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union',
		# A -----------------
		// 'A_Total_Estab', 'A_Total_Person', 'A_Total_Person_Male', 'A_Total_Person_Female',
		# B--------------------------
		'B_Total_Estab', 'B_Total_Person', 'B_Total_Person_Male', 'B_Total_Person_Female',
		# C -----------------
		'C_Total_Estab', 'C_Total_Person', 'C_Total_Person_Male', 'C_Total_Person_Female',
		# D -----------------
		'D_Total_Estab', 'D_Total_Person', 'D_Total_Person_Male', 'D_Total_Person_Female',
		# E -----------------
		'E_Total_Estab', 'E_Total_Person', 'E_Total_Person_Male', 'E_Total_Person_Female',
		# F-----------------
		'F_Total_Estab', 'F_Total_Person', 'F_Total_Person_Male', 'F_Total_Person_Female',
		# G -----------------
		'G_Total_Estab', 'G_Total_Person', 'G_Total_Person_Male', 'G_Total_Person_Female',
		# H -----------------
		'H_Total_Estab', 'H_Total_Person', 'H_Total_Person_Male', 'H_Total_Person_Female',
		# I -----------------
		'I_Total_Estab', 'I_Total_Person', 'I_Total_Person_Male', 'I_Total_Person_Female',
		# J -----------------
		'J_Total_Estab', 'J_Total_Person', 'J_Total_Person_Male', 'J_Total_Person_Female',
		# K -----------------
		'K_Total_Estab', 'K_Total_Person', 'K_Total_Person_Male', 'K_Total_Person_Female',
		# L -----------------
		'L_Total_Estab', 'L_Total_Person', 'L_Total_Person_Male', 'L_Total_Person_Female',
		# M -----------------
		'M_Total_Estab', 'M_Total_Person', 'M_Total_Person_Male', 'M_Total_Person_Female',
		# N -----------------
		'N_Total_Estab', 'N_Total_Person', 'N_Total_Person_Male', 'N_Total_Person_Female',
		# O -----------------
		'O_Total_Estab', 'O_Total_Person', 'O_Total_Person_Male', 'O_Total_Person_Female',
		# P -----------------
		'P_Total_Estab', 'P_Total_Person', 'P_Total_Person_Male', 'P_Total_Person_Female',
		# Q -----------------
		'Q_Total_Estab', 'Q_Total_Person', 'Q_Total_Person_Male', 'Q_Total_Person_Female',
		# R -----------------
		'R_Total_Estab', 'R_Total_Person', 'R_Total_Person_Male', 'R_Total_Person_Female',
		# S -----------------
		'S_Total_Estab', 'S_Total_Person', 'S_Total_Person_Male', 'S_Total_Person_Female',
		# T -----------------
		'T_Total_Estab', 'T_Total_Person', 'T_Total_Person_Male', 'T_Total_Person_Female',
		# U -----------------
		'U_Total_Estab', 'U_Total_Person', 'U_Total_Person_Male', 'U_Total_Person_Female',
		#Total------------------
		'Total_Estab'
		));
	}























	public function tpe_tbl_four_two() {
		$this -> loadModel('Report');

        $divn = "";
        $zila = "";
        $upazila = "";
        $psa = "";
        $union = "";

        if ($this -> request -> is('post')) {
            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];

            $where = $this->_make_where_condition();
            
            $where_urban = $where . " AND ques_rmo_code IN(2,3,5,9) ";
            $where_rural = $where . " AND ques_rmo_code IN(1,7) ";

            //#############################  PART ONE ####################################
            //ROW A : 01 -03 : AGRICULTURE
            //TOTAL
           /* $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 1 AND 3 ");
            $A_Total_Estab = (int)$result[0][0]['total_est'];
            $A_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 1 AND 3 ");
            $A_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $A_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 1 AND 3 ");
            $A_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $A_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];
            
            */
            
            //ROW B :05-09 : MINING
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 5 AND 9 ");
            $B_Total_Estab = (int)$result[0][0]['total_est'];
            $B_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 5 AND 9 ");
            $B_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $B_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 5 AND 9 ");
            $B_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $B_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];


            //ROW C: 10-33 : MANUFACTURING
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33");
            $C_Total_Estab = (int)$result[0][0]['total_est'];
            $C_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33 ");
            $C_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $C_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33 ");
            $C_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $C_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];


            //ROW D: 35  : ELECTRICITY,GAS STREAM
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 35");
            $D_Total_Estab = (int)$result[0][0]['total_est'];
            $D_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 35 ");
            $D_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $D_Total_Person_Urban =(int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 35 ");
            $D_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $D_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];


            //ROW E: 36-39  : WATER SUPPLY
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 36 AND 39");
            $E_Total_Estab = (int)$result[0][0]['total_est'];
            $E_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 36 AND 39 ");
            $E_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $E_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 36 AND 39 ");
            $E_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $E_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];


            
            //ROW F: 41-43 :
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 41 AND 43");
            $F_Total_Estab = (int)$result[0][0]['total_est'];
            $F_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 41 AND 43 ");
            $F_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $F_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 41 AND 43 ");
            $F_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $F_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];



            //ROW G: 45-47
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 45 AND 47");
            $G_Total_Estab = (int)$result[0][0]['total_est'];
            $G_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 45 AND 47 ");
            $G_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $G_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 45 AND 47 ");
            $G_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $G_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];



            //ROW H: 49-53
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 49 AND 53");
            $H_Total_Estab = (int)$result[0][0]['total_est'];
            $H_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 49 AND 53 ");
            $H_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $H_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 49 AND 53 ");
            $H_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $H_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];



            //ROW I: 55-56
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 55 AND 56");
            $I_Total_Estab = (int)$result[0][0]['total_est'];
            $I_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 55 AND 56 ");
            $I_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $I_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 55 AND 56 ");
            $I_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $I_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];



            //ROW J: 58-63
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 58 AND 63");
            $J_Total_Estab = (int)$result[0][0]['total_est'];
            $J_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 58 AND 63 ");
            $J_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $J_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 58 AND 63 ");
            $J_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $J_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];



            //ROW K: 64-66
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 64 AND 66");
            $K_Total_Estab = (int)$result[0][0]['total_est'];
            $K_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 64 AND 66 ");
            $K_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $K_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 64 AND 66 ");
            $K_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $K_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];



            //ROW L: 68
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 68");
            $L_Total_Estab = (int)$result[0][0]['total_est'];
            $L_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 68 ");
            $L_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $L_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 68 ");
            $L_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $L_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];



            //ROW M: 69-75
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 69 AND 75");
            $M_Total_Estab = (int)$result[0][0]['total_est'];
            $M_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 69 AND 75 ");
            $M_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $M_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 69 AND 75 ");
            $M_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $M_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];


            //ROW N: 77-82
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 77 AND 82");
            $N_Total_Estab = (int)$result[0][0]['total_est'];
            $N_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 77 AND 82 ");
            $N_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $N_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 77 AND 82 ");
            $N_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $N_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];



            //ROW O: 84
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 84");
            $O_Total_Estab = (int)$result[0][0]['total_est'];
            $O_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 84 ");
            $O_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $O_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 84 ");
            $O_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $O_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];


            //ROW P: 85
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) =85");
            $P_Total_Estab = (int)$result[0][0]['total_est'];
            $P_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) =85 ");
            $P_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $P_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) =85 ");
            $P_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $P_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];



            //ROW Q: 86-88
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 86 AND 88");
            $Q_Total_Estab = (int)$result[0][0]['total_est'];
            $Q_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 86 AND 88 ");
            $Q_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $Q_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 86 AND 88 ");
            $Q_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $Q_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];



            //ROW R: 90-93
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 90 AND 93");
            $R_Total_Estab = (int)$result[0][0]['total_est'];
            $R_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 90 AND 93 ");
            $R_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $R_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 90 AND 93 ");
            $R_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $R_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];




            //ROW S: 94-96
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 94 AND 96");
            $S_Total_Estab = (int)$result[0][0]['total_est'];
            $S_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 94 AND 96 ");
            $S_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $S_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 94 AND 96 ");
            $S_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $S_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];



            //ROW T: 97-98
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 97 AND 98");
           $T_Total_Estab = (int)$result[0][0]['total_est'];
           $T_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 97 AND 98 ");
           $T_Total_Estab_Urban = (int)$result[0][0]['total_est'];
           $T_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 97 AND 98 ");
           $T_Total_Estab_Rural = (int)$result[0][0]['total_est'];
           $T_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];



            //ROW U: 99
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 99");
            $U_Total_Estab = (int)$result[0][0]['total_est'];
            $U_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 99 ");
            $U_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $U_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            //RURAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_rural . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 99 ");
            $U_Total_Estab_Rural = (int)$result[0][0]['total_est'];
            $U_Total_Person_Rural = (int)$result[0][0]['total_person_engaged'];

            
            
        }

        $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union',
        # A -----------------
        # 'A_Total_Estab','A_Total_Person','A_Total_Estab_Urban','A_Total_Person_Urban','A_Total_Estab_Rural','A_Total_Person_Rural',
        # B--------------------------
        'B_Total_Estab','B_Total_Person','B_Total_Estab_Urban','B_Total_Person_Urban','B_Total_Estab_Rural','B_Total_Person_Rural',
        # C -----------------
        'C_Total_Estab','C_Total_Person','C_Total_Estab_Urban','C_Total_Person_Urban','C_Total_Estab_Rural','C_Total_Person_Rural',
        # D -----------------
        'D_Total_Estab','D_Total_Person','D_Total_Estab_Urban','D_Total_Person_Urban','D_Total_Estab_Rural','D_Total_Person_Rural',

        # E -----------------
       'E_Total_Estab','E_Total_Person','E_Total_Estab_Urban','E_Total_Person_Urban','E_Total_Estab_Rural','E_Total_Person_Rural',

        # F-----------------
       'F_Total_Estab','F_Total_Person','F_Total_Estab_Urban','F_Total_Person_Urban','F_Total_Estab_Rural','F_Total_Person_Rural',

        # G -----------------
        'G_Total_Estab','G_Total_Person','G_Total_Estab_Urban','G_Total_Person_Urban','G_Total_Estab_Rural','G_Total_Person_Rural',

        # H -----------------
        'H_Total_Estab','H_Total_Person','H_Total_Estab_Urban','H_Total_Person_Urban','H_Total_Estab_Rural','H_Total_Person_Rural',

        # I -----------------
        'I_Total_Estab','I_Total_Person','I_Total_Estab_Urban','I_Total_Person_Urban','I_Total_Estab_Rural','I_Total_Person_Rural',

        # J -----------------
        'J_Total_Estab','J_Total_Person','J_Total_Estab_Urban','J_Total_Person_Urban','J_Total_Estab_Rural','J_Total_Person_Rural',

        # K -----------------
        'K_Total_Estab','K_Total_Person','K_Total_Estab_Urban','K_Total_Person_Urban','K_Total_Estab_Rural','K_Total_Person_Rural',

        # L -----------------
        'L_Total_Estab','L_Total_Person','L_Total_Estab_Urban','L_Total_Person_Urban','L_Total_Estab_Rural','L_Total_Person_Rural',

        # M -----------------
        'M_Total_Estab','M_Total_Person','M_Total_Estab_Urban','M_Total_Person_Urban','M_Total_Estab_Rural','M_Total_Person_Rural',

        # N -----------------
        'N_Total_Estab','N_Total_Person','N_Total_Estab_Urban','N_Total_Person_Urban','N_Total_Estab_Rural','N_Total_Person_Rural',

        # O -----------------
        'O_Total_Estab','O_Total_Person','O_Total_Estab_Urban','O_Total_Person_Urban','O_Total_Estab_Rural','O_Total_Person_Rural',

        # P -----------------
        'P_Total_Estab','P_Total_Person','P_Total_Estab_Urban','P_Total_Person_Urban','P_Total_Estab_Rural','P_Total_Person_Rural',

        # Q -----------------
        'Q_Total_Estab','Q_Total_Person','Q_Total_Estab_Urban','Q_Total_Person_Urban','Q_Total_Estab_Rural','Q_Total_Person_Rural',

        # R -----------------
        'R_Total_Estab','R_Total_Person','R_Total_Estab_Urban','R_Total_Person_Urban','R_Total_Estab_Rural','R_Total_Person_Rural',

        # S -----------------
        'S_Total_Estab','S_Total_Person','S_Total_Estab_Urban','S_Total_Person_Urban','S_Total_Estab_Rural','S_Total_Person_Rural',

        # T -----------------
        'T_Total_Estab','T_Total_Person','T_Total_Estab_Urban','T_Total_Person_Urban','T_Total_Estab_Rural','T_Total_Person_Rural',

        # U -----------------
        'U_Total_Estab','U_Total_Person','U_Total_Estab_Urban','U_Total_Person_Urban','U_Total_Estab_Rural','U_Total_Person_Rural'

        ));
	}









	public function tpe_tbl_four_three() {
		$this->tpe_tbl_four_two();
	}


	// OLD TBL-4.4
	// public function tpe_tbl_four_four() {
	// 	$this->tpe_tbl_four_two();
	// }

	public function tpe_tbl_four_four() {
		$this -> loadModel('Report');

        $divn = "";
        $zila = "";
        $upazila = "";
        $psa = "";
        $union = "";

        if ($this -> request -> is('post')) {
            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];

            $where = $this->_make_where_condition();
            
            $where_urban = $where . " AND ques_rmo_code IN(2,3,5,9) ";
            $where_rural = $where . " AND ques_rmo_code IN(1,7) ";

            //#############################  PART ONE ####################################
          
            //ROW B :05-09 : MINING
     
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 5 AND 9 ");
            $B_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $B_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
           


            //ROW C: 10-33 : MANUFACTURING
    
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33 ");
            $C_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $C_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
           


            //ROW D: 35  : ELECTRICITY,GAS STREAM
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 35 ");
            $D_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $D_Total_Person_Urban =(int)$result[0][0]['total_person_engaged'];
            
           

            //ROW E: 36-39  : WATER SUPPLY
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 36 AND 39 ");
            $E_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $E_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
           


            
            //ROW F: 41-43 :
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 41 AND 43 ");
            $F_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $F_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            


            //ROW G: 45-47
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 45 AND 47 ");
            $G_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $G_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
           



            //ROW H: 49-53

            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 49 AND 53 ");
            $H_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $H_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
           



            //ROW I: 55-56

            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 55 AND 56 ");
            $I_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $I_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
           


            //ROW J: 58-63

            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 58 AND 63 ");
            $J_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $J_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
           



            //ROW K: 64-66
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 64 AND 66 ");
            $K_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $K_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
           



            //ROW L: 68
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 68 ");
            $L_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $L_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
          


            //ROW M: 69-75
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 69 AND 75 ");
            $M_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $M_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            


            //ROW N: 77-82
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 77 AND 82 ");
            $N_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $N_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
           



            //ROW O: 84
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 84 ");
            $O_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $O_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
           


            //ROW P: 85
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) =85 ");
            $P_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $P_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
           



            //ROW Q: 86-88
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 86 AND 88 ");
            $Q_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $Q_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            



            //ROW R: 90-93
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 90 AND 93 ");
            $R_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $R_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
          




            //ROW S: 94-96

            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 94 AND 96 ");
            $S_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $S_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
           



            //ROW T: 97-98

            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 97 AND 98 ");
           $T_Total_Estab_Urban = (int)$result[0][0]['total_est'];
           $T_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
           



            //ROW U: 99
            
            //URBAN
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_urban . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 99 ");
            $U_Total_Estab_Urban = (int)$result[0][0]['total_est'];
            $U_Total_Person_Urban = (int)$result[0][0]['total_person_engaged'];
            
            
            
            
        }

        $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union',

        # B--------------------------
       'B_Total_Estab_Urban','B_Total_Person_Urban',
        # C -----------------
       'C_Total_Estab_Urban','C_Total_Person_Urban',
        # D -----------------
       'D_Total_Estab_Urban','D_Total_Person_Urban',

        # E -----------------
       'E_Total_Estab_Urban','E_Total_Person_Urban',

        # F-----------------
       'F_Total_Estab_Urban','F_Total_Person_Urban',
        # G -----------------
       'G_Total_Estab_Urban','G_Total_Person_Urban',

        # H -----------------
        'H_Total_Estab_Urban','H_Total_Person_Urban',

        # I -----------------
        'I_Total_Estab_Urban','I_Total_Person_Urban',

        # J -----------------
        'J_Total_Estab_Urban','J_Total_Person_Urban',

        # K -----------------
        'K_Total_Estab_Urban','K_Total_Person_Urban',

        # L -----------------
        'L_Total_Estab_Urban','L_Total_Person_Urban',

        # M -----------------
        'M_Total_Estab_Urban','M_Total_Person_Urban',

        # N -----------------
        'N_Total_Estab_Urban','N_Total_Person_Urban',

        # O -----------------
        'O_Total_Estab_Urban','O_Total_Person_Urban',

        # P -----------------
        'P_Total_Estab_Urban','P_Total_Person_Urban',
        # Q -----------------
        'Q_Total_Estab_Urban','Q_Total_Person_Urban',

        # R -----------------
        'R_Total_Estab_Urban','R_Total_Person_Urban',

        # S -----------------
        'S_Total_Estab_Urban','S_Total_Person_Urban',

        # T -----------------
        'T_Total_Estab_Urban','T_Total_Person_Urban',

        # U -----------------
        'U_Total_Estab_Urban','U_Total_Person_Urban'

        ));
	}



	public function tpe_tbl_four_five() {
		$this->tpe_tbl_four_two();
	}

	public function tpe_tbl_four_six() {
		$this -> loadModel('Report');

        $divn = "";
        $zila = "";
        $upazila = "";
        $psa = "";
        $union = "";

        if ($this -> request -> is('post')) {
            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];

            $where = $this->_make_where_condition();
            
            $where_parmanent = $where . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 ";
            $where_temporary = $where . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 2 ";
            $where_household = $where . " AND Q4_UNIT_TYPE = 1 ";

            //#############################  PART ONE ####################################
            //ROW A : 01 -03
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 1 AND 3 ");
            $A_Total_unit = (int)$result[0][0]['total_est'];
            $A_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 1 AND 3 ");
            $A_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $A_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 1 AND 3 ");
            $A_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $A_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 1 AND 3 ");
            $A_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $A_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];
            
            
            //ROW B : 05 -09
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 5 AND 9 ");
            $B_Total_unit = (int)$result[0][0]['total_est'];
            $B_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 5 AND 9 ");
            $B_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $B_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 5 AND 9 ");
            $B_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $B_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 5 AND 9 ");
            $B_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $B_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];



            //ROW C : 10 - 33
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33 ");
            $C_Total_unit = (int)$result[0][0]['total_est'];
            $C_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33 ");
            $C_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $C_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33 ");
            $C_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $C_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33 ");
            $C_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $C_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];


            //ROW D : 35
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 35 ");
            $D_Total_unit = (int)$result[0][0]['total_est'];
            $D_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 35 ");
            $D_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $D_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 35 ");
            $D_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $D_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 35 ");
            $D_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $D_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];


            //ROW E : 36 - 39
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 36 AND 39");
            $E_Total_unit = (int)$result[0][0]['total_est'];
            $E_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 36 AND 39 ");
            $E_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $E_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 36 AND 39");
            $E_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $E_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 36 AND 39 ");
            $E_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $E_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];


             //ROW F : 41 - 43
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 41 AND 43");
            $F_Total_unit = (int)$result[0][0]['total_est'];
            $F_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 41 AND 43 ");
            $F_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $F_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 41 AND 43 ");
            $F_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $F_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 41 AND 43 ");
            $F_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $F_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];


             //ROW G : 45 - 47
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 45 AND 47");
            $G_Total_unit = (int)$result[0][0]['total_est'];
            $G_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 45 AND 47 ");
            $G_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $G_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 45 AND 47 ");
            $G_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $G_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 45 AND 47 ");
            $G_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $G_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];


            //ROW H : 49 - 53
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 49 AND 53");
            $H_Total_unit = (int)$result[0][0]['total_est'];
            $H_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 49 AND 53 ");
            $H_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $H_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 49 AND 53 ");
            $H_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $H_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 49 AND 53 ");
            $H_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $H_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];



             //ROW I : 55 - 56
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 55 AND 56");
            $I_Total_unit = (int)$result[0][0]['total_est'];
            $I_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 55 AND 56 ");
            $I_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $I_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 55 AND 56 ");
            $I_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $I_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 55 AND 56");
            $I_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $I_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];



             //ROW J : 58 - 63
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 58 AND 63");
            $J_Total_unit = (int)$result[0][0]['total_est'];
            $J_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 58 AND 63 ");
            $J_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $J_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 58 AND 63 ");
            $J_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $J_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 58 AND 63");
            $J_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $J_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];



            //ROW K : 64 - 66
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 64 AND 66 ");
            $K_Total_unit = (int)$result[0][0]['total_est'];
            $K_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 64 AND 66 ");
            $K_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $K_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 64 AND 66 ");
            $K_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $K_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 64 AND 66");
            $K_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $K_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];


            //ROW L : 68
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 68 ");
            $L_Total_unit = (int)$result[0][0]['total_est'];
            $L_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 68 ");
            $L_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $L_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 68 ");
            $L_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $L_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 68 ");
            $L_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $L_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];



            //ROW M : 69 - 75
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 69 AND 75 ");
            $M_Total_unit = (int)$result[0][0]['total_est'];
            $M_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 69 AND 75 ");
            $M_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $M_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 69 AND 75  ");
            $M_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $M_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 69 AND 75  ");
            $M_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $M_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];



             //ROW N : 77 - 82
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 77 AND 82 ");
            $N_Total_unit = (int)$result[0][0]['total_est'];
            $N_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 77 AND 82 ");
            $N_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $N_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 77 AND 82  ");
            $N_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $N_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 77 AND 82  ");
            $N_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $N_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];


            //ROW O : 84
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 84 ");
            $O_Total_unit = (int)$result[0][0]['total_est'];
            $O_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 84 ");
            $O_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $O_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2))  = 84 ");
            $O_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $O_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 84 ");
            $O_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $O_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];


            //ROW P : 85
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 85 ");
            $P_Total_unit = (int)$result[0][0]['total_est'];
            $P_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 85 ");
            $P_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $P_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2))  = 85 ");
            $P_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $P_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 85 ");
            $P_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $P_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];



            //ROW Q : 86 - 88
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 86 AND 88  ");
            $Q_Total_unit = (int)$result[0][0]['total_est'];
            $Q_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 86 AND 88 ");
            $Q_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $Q_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 86 AND 88 ");
            $Q_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $Q_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 86 AND 88 ");
            $Q_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $Q_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];


            //ROW R : 90 - 93
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 90 AND 93 ");
            $R_Total_unit = (int)$result[0][0]['total_est'];
            $R_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 90 AND 93 ");
            $R_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $R_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 90 AND 93 ");
            $R_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $R_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 90 AND 93  ");
            $R_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $R_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];



            //ROW S : 94 - 96
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 94 AND 96 ");
            $S_Total_unit = (int)$result[0][0]['total_est'];
            $S_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 94 AND 96 ");
            $S_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $S_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 94 AND 96 ");
            $S_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $S_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 94 AND 96  ");
            $S_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $S_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];


            //ROW T : 97 - 98
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 97 AND 98 ");
            $T_Total_unit = (int)$result[0][0]['total_est'];
            $T_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 97 AND 98 ");
            $T_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $T_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 97 AND 98  ");
            $T_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $T_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 97 AND 98 ");
            $T_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $T_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];


            //ROW U : 99
            //TOTAL
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 99 ");
            $U_Total_unit = (int)$result[0][0]['total_est'];
            $U_Total_Person = (int)$result[0][0]['total_person_engaged'];
            
            //PARMANENT
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_parmanent . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2))  = 99 ");
            $U_Total_Unit_Parmanent = (int)$result[0][0]['total_est'];
            $U_Total_Person_Parmanent = (int)$result[0][0]['total_person_engaged'];
            
            //TEMPORARY
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_temporary . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) = 99 ");
            $U_Total_Unit_Temporary = (int)$result[0][0]['total_est'];
            $U_Total_Person_Temporary = (int)$result[0][0]['total_person_engaged'];
            
            //HOUSEHOLD
            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where_household . " AND  F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2))  = 99 ");
            $U_Total_Unit_Household = (int)$result[0][0]['total_est'];
            $U_Total_Person_Household = (int)$result[0][0]['total_person_engaged'];


            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 
		# A -----------------
		'A_Total_unit', 'A_Total_Person', 'A_Total_Unit_Parmanent', 'A_Total_Person_Parmanent',
		'A_Total_Unit_Temporary', 'A_Total_Person_Temporary', 'A_Total_Unit_Household','A_Total_Person_Household',
		# B --------------------------
		'B_Total_unit', 'B_Total_Person', 'B_Total_Unit_Parmanent', 'B_Total_Person_Parmanent',
		'B_Total_Unit_Temporary', 'B_Total_Person_Temporary', 'B_Total_Unit_Household','B_Total_Person_Household',
		# C -----------------
		'C_Total_unit', 'C_Total_Person', 'C_Total_Unit_Parmanent', 'C_Total_Person_Parmanent',
		'C_Total_Unit_Temporary', 'C_Total_Person_Temporary', 'C_Total_Unit_Household','C_Total_Person_Household',
		# D----------
		'D_Total_unit', 'D_Total_Person', 'D_Total_Unit_Parmanent', 'D_Total_Person_Parmanent',
		'D_Total_Unit_Temporary', 'D_Total_Person_Temporary', 'D_Total_Unit_Household','D_Total_Person_Household',
		# E  -----------------
		'E_Total_unit', 'E_Total_Person', 'E_Total_Unit_Parmanent', 'E_Total_Person_Parmanent',
		'E_Total_Unit_Temporary', 'E_Total_Person_Temporary', 'E_Total_Unit_Household','E_Total_Person_Household',
		# F -----------------
		'F_Total_unit', 'F_Total_Person', 'F_Total_Unit_Parmanent', 'F_Total_Person_Parmanent',
		'F_Total_Unit_Temporary', 'F_Total_Person_Temporary', 'F_Total_Unit_Household','F_Total_Person_Household',
		# G -----------------
		'G_Total_unit', 'G_Total_Person', 'G_Total_Unit_Parmanent', 'G_Total_Person_Parmanent',
		'G_Total_Unit_Temporary', 'G_Total_Person_Temporary', 'G_Total_Unit_Household','G_Total_Person_Household',
		# H ----------
		'H_Total_unit', 'H_Total_Person', 'H_Total_Unit_Parmanent', 'H_Total_Person_Parmanent',
		'H_Total_Unit_Temporary', 'H_Total_Person_Temporary', 'H_Total_Unit_Household','H_Total_Person_Household',
		# I-----------------
		'I_Total_unit', 'I_Total_Person', 'I_Total_Unit_Parmanent', 'I_Total_Person_Parmanent',
		'I_Total_Unit_Temporary', 'I_Total_Person_Temporary', 'I_Total_Unit_Household','I_Total_Person_Household',
		# J-----------------
		'J_Total_unit', 'J_Total_Person', 'J_Total_Unit_Parmanent', 'J_Total_Person_Parmanent',
		'J_Total_Unit_Temporary', 'J_Total_Person_Temporary', 'J_Total_Unit_Household','J_Total_Person_Household',
		# K -----------------
		'K_Total_unit', 'K_Total_Person', 'K_Total_Unit_Parmanent', 'K_Total_Person_Parmanent',
		'K_Total_Unit_Temporary', 'K_Total_Person_Temporary', 'K_Total_Unit_Household','K_Total_Person_Household',
		# L -----------------
		'L_Total_unit', 'L_Total_Person', 'L_Total_Unit_Parmanent', 'L_Total_Person_Parmanent',
		'L_Total_Unit_Temporary', 'L_Total_Person_Temporary', 'L_Total_Unit_Household','L_Total_Person_Household',
		# M -----------------
		'M_Total_unit', 'M_Total_Person', 'M_Total_Unit_Parmanent', 'M_Total_Person_Parmanent',
		'M_Total_Unit_Temporary', 'M_Total_Person_Temporary', 'M_Total_Unit_Household','M_Total_Person_Household',
		# N -----------------
		'N_Total_unit', 'N_Total_Person', 'N_Total_Unit_Parmanent', 'N_Total_Person_Parmanent',
		'N_Total_Unit_Temporary', 'N_Total_Person_Temporary', 'N_Total_Unit_Household','N_Total_Person_Household',
		# O -----------------
		'O_Total_unit', 'O_Total_Person', 'O_Total_Unit_Parmanent', 'O_Total_Person_Parmanent',
		'O_Total_Unit_Temporary', 'O_Total_Person_Temporary', 'O_Total_Unit_Household','O_Total_Person_Household',
		# P -----------------
		'P_Total_unit', 'P_Total_Person', 'P_Total_Unit_Parmanent', 'P_Total_Person_Parmanent',
		'P_Total_Unit_Temporary', 'P_Total_Person_Temporary', 'P_Total_Unit_Household','P_Total_Person_Household',
		# Q -----------------
		'Q_Total_unit', 'Q_Total_Person', 'Q_Total_Unit_Parmanent', 'Q_Total_Person_Parmanent',
		'Q_Total_Unit_Temporary', 'Q_Total_Person_Temporary', 'Q_Total_Unit_Household','Q_Total_Person_Household',
		# R -----------------
		'R_Total_unit', 'R_Total_Person', 'R_Total_Unit_Parmanent', 'R_Total_Person_Parmanent',
		'R_Total_Unit_Temporary', 'R_Total_Person_Temporary', 'R_Total_Unit_Household','R_Total_Person_Household',
		# S -----------------
		'S_Total_unit', 'S_Total_Person', 'S_Total_Unit_Parmanent', 'S_Total_Person_Parmanent',
		'S_Total_Unit_Temporary', 'S_Total_Person_Temporary', 'S_Total_Unit_Household','S_Total_Person_Household',
		# T -----------------
		'T_Total_unit', 'T_Total_Person', 'T_Total_Unit_Parmanent', 'T_Total_Person_Parmanent',
		'T_Total_Unit_Temporary', 'T_Total_Person_Temporary', 'T_Total_Unit_Household','T_Total_Person_Household',
		# U -----------------
		'U_Total_unit', 'U_Total_Person', 'U_Total_Unit_Parmanent', 'U_Total_Person_Parmanent',
		'U_Total_Unit_Temporary', 'U_Total_Person_Temporary', 'U_Total_Unit_Household','U_Total_Person_Household'

		));     
        }
	}

	public function tpe_tbl_four_seven() {
		$this -> set('title_for_layout', '4.7: Percentage distribution of establishments and total persons engaged (TPE)  by type of establishment & economic activity in 2013');

		// Logic goes Here
		$this->tpe_tbl_four_six();
	}















	#-----------------------------------------FIVE------------------------------------------------
	public function tpe_tbl_five_one_ajax() {
		$this -> autoRender = false;
		$this -> layout = false;
		
		if(isset($_SESSION['t_5_1'])) echo json_encode($_SESSION['t_5_1']);
		else echo json_encode("false");
	}

	public function tpe_tbl_five_one() {
		$this -> loadModel('Report');

        $divn = "";
        $zila = "";
        $upazila = "";
        $psa = "";
        $union = "";

        if ($this -> request -> is('post')) {

        	unset($_SESSION['t_5_1']);

            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];

            $where = $this->_make_where_condition();
            
           
            $result = $this -> Report -> query("SELECT (PEOPLE.Q17_HR_MALE + PEOPLE.Q17_HR_FEMALE) AS WORKING_PROPRIETOR, 
												(PEOPLE.Q17_HR_MALE_FOC + PEOPLE.Q17_HR_FEMALE_FOC) AS UNPAID_FAMILY_WORKERS, 
												(PEOPLE.Q17_HR_MALE_FULLTIME + PEOPLE.Q17_HR_FEMALE_FULLTIME) AS FULL_TIME_WORKERS, 
												(PEOPLE.Q17_HR_MALE_PARTTIME + PEOPLE.Q17_HR_FEMALE_PARTTIME) AS PART_TIME_WORKERS, 
												(PEOPLE.Q17_HR_MALE_IRREGULAR + PEOPLE.Q17_HR_FEMALE_IRREGULAR) AS CASUAL_WORKERS,
												(PEOPLE.Q17_HR_MALE) AS WORKING_PROPRIETOR_MALE, (PEOPLE.Q17_HR_FEMALE) AS WORKING_PROPRIETOR_FEMALE, 
												(PEOPLE.Q17_HR_MALE_FOC) AS UNPAID_FAMILY_WORKERS_MALE, (PEOPLE.Q17_HR_FEMALE_FOC) AS UNPAID_FAMILY_WORKERS_FEMALE, 
												(PEOPLE.Q17_HR_MALE_FULLTIME) AS FULL_TIME_WORKERS_MALE, (PEOPLE.Q17_HR_FEMALE_FULLTIME) AS FULL_TIME_WORKERS_FEMALE, 
												(PEOPLE.Q17_HR_MALE_PARTTIME) AS PART_TIME_WORKERS_MALE, (PEOPLE.Q17_HR_FEMALE_PARTTIME) AS PART_TIME_WORKERS_FEMALE, 
												(PEOPLE.Q17_HR_MALE_IRREGULAR) AS CASUAL_WORKERS_MALE, (PEOPLE.Q17_HR_FEMALE_IRREGULAR) AS CASUAL_WORKERS_FEMALE
												FROM
												(
												SELECT SUM(Q17_HR_MALE) AS Q17_HR_MALE,  SUM(Q17_HR_FEMALE) AS Q17_HR_FEMALE,
												SUM(Q17_HR_MALE_FOC) AS Q17_HR_MALE_FOC, SUM(Q17_HR_FEMALE_FOC) AS Q17_HR_FEMALE_FOC, 
												SUM(Q17_HR_MALE_FULLTIME) AS  Q17_HR_MALE_FULLTIME, SUM(Q17_HR_FEMALE_FULLTIME) AS Q17_HR_FEMALE_FULLTIME, 
												SUM(Q17_HR_MALE_PARTTIME) AS  Q17_HR_MALE_PARTTIME, SUM(Q17_HR_FEMALE_PARTTIME) AS Q17_HR_FEMALE_PARTTIME, 
												SUM(Q17_HR_MALE_IRREGULAR) AS Q17_HR_MALE_IRREGULAR, SUM(Q17_HR_FEMALE_IRREGULAR) AS Q17_HR_FEMALE_IRREGULAR
												FROM BBSEC2013_REPORTS
												WHERE ".$where." ) PEOPLE ");


			#debug($result);  
            
        # Storing Required GraphData in Session variable
        // DEMO DATA FOR 2003
	    $_SESSION['t_5_1']['tpe_working_2003'] = $result[0][0]['WORKING_PROPRIETOR'];
		$_SESSION['t_5_1']['tpe_unpaid_2003'] = $result[0][0]['UNPAID_FAMILY_WORKERS'];
		$_SESSION['t_5_1']['tpe_fulltime_2003'] = $result[0][0]['FULL_TIME_WORKERS'];
		$_SESSION['t_5_1']['tpe_parttime_2003'] = $result[0][0]['PART_TIME_WORKERS'];
		$_SESSION['t_5_1']['tpe_casual_2003'] = $result[0][0]['CASUAL_WORKERS'];

        // 2013
		$_SESSION['t_5_1']['tpe_working_2013'] = $result[0][0]['WORKING_PROPRIETOR'];
		$_SESSION['t_5_1']['tpe_unpaid_2013'] = $result[0][0]['UNPAID_FAMILY_WORKERS'];
		$_SESSION['t_5_1']['tpe_fulltime_2013'] = $result[0][0]['FULL_TIME_WORKERS'];
		$_SESSION['t_5_1']['tpe_parttime_2013'] = $result[0][0]['PART_TIME_WORKERS'];
		$_SESSION['t_5_1']['tpe_casual_2013'] = $result[0][0]['CASUAL_WORKERS'];

            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result')); 
         }
	}











	public function tpe_tbl_five_two() {
		$this -> loadModel('Report');

        $divn = "";
        $zila = "";
        $upazila = "";
        $psa = "";
        $union = "";

        if ($this -> request -> is('post')) {
            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];

            $where = $this->_make_where_condition();
            
            $where_parmanent = $where . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 ";
            $where_temporary = $where . " AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 2 ";
            $where_household = $where . " AND Q4_UNIT_TYPE = 1 ";

$result_parmanent = $this -> Report -> query("SELECT (PEOPLE.Q17_HR_MALE + PEOPLE.Q17_HR_FEMALE) AS WORKING_PROPRIETOR, 
									(PEOPLE.Q17_HR_MALE_FOC + PEOPLE.Q17_HR_FEMALE_FOC) AS UNPAID_FAMILY_WORKERS, 
									(PEOPLE.Q17_HR_MALE_FULLTIME + PEOPLE.Q17_HR_FEMALE_FULLTIME) AS FULL_TIME_WORKERS, 
									(PEOPLE.Q17_HR_MALE_PARTTIME + PEOPLE.Q17_HR_FEMALE_PARTTIME) AS PART_TIME_WORKERS, 
									(PEOPLE.Q17_HR_MALE_IRREGULAR + PEOPLE.Q17_HR_FEMALE_IRREGULAR) AS CASUAL_WORKERS,

									(PEOPLE.Q17_HR_MALE) AS WORKING_PROPRIETOR_MALE, (PEOPLE.Q17_HR_FEMALE) AS WORKING_PROPRIETOR_FEMALE, 
									(PEOPLE.Q17_HR_MALE_FOC) AS UNPAID_FAMILY_WORKERS_MALE, (PEOPLE.Q17_HR_FEMALE_FOC) AS UNPAID_FAMILY_WORKERS_FEMALE, 
									(PEOPLE.Q17_HR_MALE_FULLTIME) AS FULL_TIME_WORKERS_MALE, (PEOPLE.Q17_HR_FEMALE_FULLTIME) AS FULL_TIME_WORKERS_FEMALE, 
									(PEOPLE.Q17_HR_MALE_PARTTIME) AS PART_TIME_WORKERS_MALE, (PEOPLE.Q17_HR_FEMALE_PARTTIME) AS PART_TIME_WORKERS_FEMALE, 
									(PEOPLE.Q17_HR_MALE_IRREGULAR) AS CASUAL_WORKERS_MALE, (PEOPLE.Q17_HR_FEMALE_IRREGULAR) AS CASUAL_WORKERS_FEMALE,
									(PEOPLE.TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON_ENGAGED,
									(PEOPLE.TOTAL_MALE_ENGAGED) AS TOTAL_MALE_ENGAGED,
									(PEOPLE.TOTAL_FEMALE_ENGAGED) AS TOTAL_FEMALE_ENGAGED
									FROM
									(
									SELECT SUM(Q17_HR_MALE) AS Q17_HR_MALE,  SUM(Q17_HR_FEMALE) AS Q17_HR_FEMALE,
									SUM(Q17_HR_MALE_FOC) AS Q17_HR_MALE_FOC, SUM(Q17_HR_FEMALE_FOC) AS Q17_HR_FEMALE_FOC, 
									SUM(Q17_HR_MALE_FULLTIME) AS  Q17_HR_MALE_FULLTIME, SUM(Q17_HR_FEMALE_FULLTIME) AS Q17_HR_FEMALE_FULLTIME, 
									SUM(Q17_HR_MALE_PARTTIME) AS  Q17_HR_MALE_PARTTIME, SUM(Q17_HR_FEMALE_PARTTIME) AS Q17_HR_FEMALE_PARTTIME, 
									SUM(Q17_HR_MALE_IRREGULAR) AS Q17_HR_MALE_IRREGULAR, SUM(Q17_HR_FEMALE_IRREGULAR) AS Q17_HR_FEMALE_IRREGULAR,
									SUM(TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON_ENGAGED, 
									SUM(TOTAL_MALE_ENGAGED) AS TOTAL_MALE_ENGAGED,
									SUM(TOTAL_FEMALE_ENGAGED) AS TOTAL_FEMALE_ENGAGED
									FROM BBSEC2013_REPORTS
									WHERE ".$where_parmanent.") PEOPLE ");
$result_temporary = $this -> Report -> query("SELECT (PEOPLE.Q17_HR_MALE + PEOPLE.Q17_HR_FEMALE) AS WORKING_PROPRIETOR, 
									(PEOPLE.Q17_HR_MALE_FOC + PEOPLE.Q17_HR_FEMALE_FOC) AS UNPAID_FAMILY_WORKERS, 
									(PEOPLE.Q17_HR_MALE_FULLTIME + PEOPLE.Q17_HR_FEMALE_FULLTIME) AS FULL_TIME_WORKERS, 
									(PEOPLE.Q17_HR_MALE_PARTTIME + PEOPLE.Q17_HR_FEMALE_PARTTIME) AS PART_TIME_WORKERS, 
									(PEOPLE.Q17_HR_MALE_IRREGULAR + PEOPLE.Q17_HR_FEMALE_IRREGULAR) AS CASUAL_WORKERS,

									(PEOPLE.Q17_HR_MALE) AS WORKING_PROPRIETOR_MALE, (PEOPLE.Q17_HR_FEMALE) AS WORKING_PROPRIETOR_FEMALE, 
									(PEOPLE.Q17_HR_MALE_FOC) AS UNPAID_FAMILY_WORKERS_MALE, (PEOPLE.Q17_HR_FEMALE_FOC) AS UNPAID_FAMILY_WORKERS_FEMALE, 
									(PEOPLE.Q17_HR_MALE_FULLTIME) AS FULL_TIME_WORKERS_MALE, (PEOPLE.Q17_HR_FEMALE_FULLTIME) AS FULL_TIME_WORKERS_FEMALE, 
									(PEOPLE.Q17_HR_MALE_PARTTIME) AS PART_TIME_WORKERS_MALE, (PEOPLE.Q17_HR_FEMALE_PARTTIME) AS PART_TIME_WORKERS_FEMALE, 
									(PEOPLE.Q17_HR_MALE_IRREGULAR) AS CASUAL_WORKERS_MALE, (PEOPLE.Q17_HR_FEMALE_IRREGULAR) AS CASUAL_WORKERS_FEMALE,
									(PEOPLE.TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON_ENGAGED,
									(PEOPLE.TOTAL_MALE_ENGAGED) AS TOTAL_MALE_ENGAGED,
									(PEOPLE.TOTAL_FEMALE_ENGAGED) AS TOTAL_FEMALE_ENGAGED
									FROM
									(
									SELECT SUM(Q17_HR_MALE) AS Q17_HR_MALE,  SUM(Q17_HR_FEMALE) AS Q17_HR_FEMALE,
									SUM(Q17_HR_MALE_FOC) AS Q17_HR_MALE_FOC, SUM(Q17_HR_FEMALE_FOC) AS Q17_HR_FEMALE_FOC, 
									SUM(Q17_HR_MALE_FULLTIME) AS  Q17_HR_MALE_FULLTIME, SUM(Q17_HR_FEMALE_FULLTIME) AS Q17_HR_FEMALE_FULLTIME, 
									SUM(Q17_HR_MALE_PARTTIME) AS  Q17_HR_MALE_PARTTIME, SUM(Q17_HR_FEMALE_PARTTIME) AS Q17_HR_FEMALE_PARTTIME, 
									SUM(Q17_HR_MALE_IRREGULAR) AS Q17_HR_MALE_IRREGULAR, SUM(Q17_HR_FEMALE_IRREGULAR) AS Q17_HR_FEMALE_IRREGULAR,
									SUM(TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON_ENGAGED, 
									SUM(TOTAL_MALE_ENGAGED) AS TOTAL_MALE_ENGAGED,
									SUM(TOTAL_FEMALE_ENGAGED) AS TOTAL_FEMALE_ENGAGED
									FROM BBSEC2013_REPORTS
									WHERE ".$where_temporary.") PEOPLE ");

	$result_household = $this -> Report -> query("SELECT (PEOPLE.Q17_HR_MALE + PEOPLE.Q17_HR_FEMALE) AS WORKING_PROPRIETOR, 
									(PEOPLE.Q17_HR_MALE_FOC + PEOPLE.Q17_HR_FEMALE_FOC) AS UNPAID_FAMILY_WORKERS, 
									(PEOPLE.Q17_HR_MALE_FULLTIME + PEOPLE.Q17_HR_FEMALE_FULLTIME) AS FULL_TIME_WORKERS, 
									(PEOPLE.Q17_HR_MALE_PARTTIME + PEOPLE.Q17_HR_FEMALE_PARTTIME) AS PART_TIME_WORKERS, 
									(PEOPLE.Q17_HR_MALE_IRREGULAR + PEOPLE.Q17_HR_FEMALE_IRREGULAR) AS CASUAL_WORKERS,

									(PEOPLE.Q17_HR_MALE) AS WORKING_PROPRIETOR_MALE, (PEOPLE.Q17_HR_FEMALE) AS WORKING_PROPRIETOR_FEMALE, 
									(PEOPLE.Q17_HR_MALE_FOC) AS UNPAID_FAMILY_WORKERS_MALE, (PEOPLE.Q17_HR_FEMALE_FOC) AS UNPAID_FAMILY_WORKERS_FEMALE, 
									(PEOPLE.Q17_HR_MALE_FULLTIME) AS FULL_TIME_WORKERS_MALE, (PEOPLE.Q17_HR_FEMALE_FULLTIME) AS FULL_TIME_WORKERS_FEMALE, 
									(PEOPLE.Q17_HR_MALE_PARTTIME) AS PART_TIME_WORKERS_MALE, (PEOPLE.Q17_HR_FEMALE_PARTTIME) AS PART_TIME_WORKERS_FEMALE, 
									(PEOPLE.Q17_HR_MALE_IRREGULAR) AS CASUAL_WORKERS_MALE, (PEOPLE.Q17_HR_FEMALE_IRREGULAR) AS CASUAL_WORKERS_FEMALE,
									(PEOPLE.TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON_ENGAGED,
									(PEOPLE.TOTAL_MALE_ENGAGED) AS TOTAL_MALE_ENGAGED,
									(PEOPLE.TOTAL_FEMALE_ENGAGED) AS TOTAL_FEMALE_ENGAGED
									FROM
									(
									SELECT SUM(Q17_HR_MALE) AS Q17_HR_MALE,  SUM(Q17_HR_FEMALE) AS Q17_HR_FEMALE,
									SUM(Q17_HR_MALE_FOC) AS Q17_HR_MALE_FOC, SUM(Q17_HR_FEMALE_FOC) AS Q17_HR_FEMALE_FOC, 
									SUM(Q17_HR_MALE_FULLTIME) AS  Q17_HR_MALE_FULLTIME, SUM(Q17_HR_FEMALE_FULLTIME) AS Q17_HR_FEMALE_FULLTIME, 
									SUM(Q17_HR_MALE_PARTTIME) AS  Q17_HR_MALE_PARTTIME, SUM(Q17_HR_FEMALE_PARTTIME) AS Q17_HR_FEMALE_PARTTIME, 
									SUM(Q17_HR_MALE_IRREGULAR) AS Q17_HR_MALE_IRREGULAR, SUM(Q17_HR_FEMALE_IRREGULAR) AS Q17_HR_FEMALE_IRREGULAR,
									SUM(TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON_ENGAGED, 
									SUM(TOTAL_MALE_ENGAGED) AS TOTAL_MALE_ENGAGED,
									SUM(TOTAL_FEMALE_ENGAGED) AS TOTAL_FEMALE_ENGAGED
									FROM BBSEC2013_REPORTS
									WHERE ".$where_household.") PEOPLE ");
        }
        $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result_parmanent', 'result_temporary', 'result_household'));
	}




	public function tpe_tbl_five_three() {
		$this -> loadModel('Report');

        $divn = "";
        $zila = "";
        $upazila = "";
        $psa = "";
        $union = "";

        if ($this -> request -> is('post')) {
            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];

            $where = $this->_make_where_condition();

            
            $result = $this -> Report -> query("SELECT GEO_CODE_UPAZILA_ID, UPZILA_NAME,
												COUNT(*) AS TOTAL_EST, 
												SUM(TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON_ENGAGED, 
												SUM(TOTAL_MALE_ENGAGED) AS TOTAL_MALE_ENGAGED,
												SUM(TOTAL_FEMALE_ENGAGED) AS TOTAL_FEMALE_ENGAGED
												FROM BBSEC2013_REPORTS
												WHERE " . $where . "
												GROUP BY GEO_CODE_UPAZILA_ID, UPZILA_NAME
												ORDER BY UPZILA_NAME ");

            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result'));  
            
        }
            
	}

    public function _make_where_condition()
    {
            $conditions = array();
            $where = " 1=1";
            if ($this -> request -> data['geo_code_divn'] != "") {
                $where .= " AND geo_code_divn_id = '" . $this -> request -> data['geo_code_divn'] . "'";
            }
            if ($this -> request -> data['geo_code_zila'] != "") {
                $where .= " AND geo_code_zila_id = '" . $this -> request -> data['geo_code_zila'] . "'";
            }
            if ($this -> request -> data['geo_code_upazila'] != "") {
                $where .= " AND geo_code_upazila_id = '" . $this -> request -> data['geo_code_upazila'] . "'";
            }
            if ($this -> request -> data['geo_code_psa'] != "") {
                $where .= " AND geo_code_psa_id = '" . $this -> request -> data['geo_code_psa'] . "'";
            }
            if ($this -> request -> data['geo_code_union'] != "") {
                $where .= " AND geo_code_union_id = '" . $this -> request -> data['geo_code_union'] . "'";
            }
            
            return $where;
    }

}
