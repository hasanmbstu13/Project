<?php

class ReportsThreeDemoController extends AppController {

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
	// public function tpe_tbl_three_one_ajax() {
	// 	$this -> autoRender = false;
	// 	$this -> layout = false;
		
	// 	if(isset($_SESSION['t_3_1'])) echo json_encode($_SESSION['t_3_1']);
	// 	else echo json_encode("false");
	// }

	public function tpe_tbl_three_one_demo() {
		
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

			$where_urban = $where . " AND ques_rmo_code IN(2,3,9) ";
			$where_rural = $where . " AND ques_rmo_code IN(1,5,7) ";

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
			//ROW ONE TOTAL OF TOTAL
			$total_est = $this -> Report -> query("SELECT COUNT(QUESTIONNARIE_ID) AS total_est FROM BBSEC2013_REPORTS WHERE " .$where);
			$total_est = $total_est[0][0]['total_est'];

			$total_est_person = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where);
			$total_est_person = (int)$total_est_person[0][0]['total_person_engaged'];

			$total_est_male = $this -> Report -> query("SELECT SUM(total_male_engaged) AS total_male_engaged FROM BBSEC2013_REPORTS WHERE " . $where);
			$total_est_male = $total_est_male[0][0]['total_male_engaged'];

			$total_est_female = $this -> Report -> query("SELECT SUM(total_female_engaged) AS total_female_engaged FROM BBSEC2013_REPORTS WHERE " . $where);
			$total_est_female = $total_est_female[0][0]['total_female_engaged'];

			//ROW TWO PARMANENT OF TOTAL
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

			//#############################   PART TWO:URBAN ####################################
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
		/*
       # Storing Required GraphData in Session variable
		$_SESSION['t_3_1']['total_est'] = $total_est;
		$_SESSION['t_3_1']['total_est_person'] = $total_est_person;

		$_SESSION['t_3_1']['total_urban_est'] = $total_urban_est;
		$_SESSION['t_3_1']['total_urban_est_person'] = $total_urban_est_person;

		$_SESSION['t_3_1']['total_rural_est'] = $total_rural_est;
		$_SESSION['t_3_1']['total_rural_est_person'] = $total_rural_est_person;
		*/

       # Sending Query Result To View
		$this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'total_est', 'total_est_person', 'total_est_male', 'total_est_female',
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


}