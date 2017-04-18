<?php

class ReportsSixController extends AppController {

	var $uses = false;
	

	#----------------------------------------------SIX------------------------------------------------------

	public function tpe_tbl_six_one() {
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

           // $result_A = $this->_prepate_result("Agriculture,forestry and fishing", $where, "BETWEEN 1 AND 3");
            $result_B = $this->_prepate_result("Mining and quarrying", $where, "BETWEEN 5 AND 9");
            $result_C = $this->_prepate_result("Manufacturing", $where, "BETWEEN 10 AND 33");
            $result_D = $this->_prepate_result("Electricity ,gas,steam and air conditioning supply", $where, "= 35");
            $result_E = $this->_prepate_result("Water supply,sewerage,waste management and remediation activities", $where, "BETWEEN 36 AND 39");
            $result_F = $this->_prepate_result("Construction", $where, "BETWEEN 41 AND 43");
            $result_G = $this->_prepate_result("Wholesale and retail trade,repair of motor vehicles and motorcycles", $where, "BETWEEN 45 AND 47");
            $result_H = $this->_prepate_result("Transportation and storage", $where, "BETWEEN 49 AND 53");
            $result_I = $this->_prepate_result("Accommodation and food service activities (Hotel and restaurents)", $where, "BETWEEN 55 AND 56");
            $result_J = $this->_prepate_result("Information and communication", $where, "BETWEEN 58 AND 63");
            $result_K = $this->_prepate_result("Financial and insurance activities", $where, "BETWEEN 64 AND 66");
            $result_L = $this->_prepate_result("Real state activities", $where, "= 68");
            $result_M = $this->_prepate_result("Professional, scientific and technical activities", $where, "BETWEEN 69 AND 75");
            $result_N = $this->_prepate_result("Administrative and support service activities", $where, "BETWEEN 77 AND 82");
            $result_O = $this->_prepate_result("Public administration and defence,compulsory social security", $where, "= 84");
            $result_P = $this->_prepate_result("Education", $where, " = 85");
            $result_Q = $this->_prepate_result("Human health and social work activities", $where, "BETWEEN 86 AND 88");
            $result_R = $this->_prepate_result("Art, entertainment and recreation", $where, "BETWEEN 90 AND 93");
            $result_S = $this->_prepate_result("Other service activities", $where, "BETWEEN 94 AND 96");
            $result_T = $this->_prepate_result("Activities of households as employers, undifferentiated goods and services producing activities of households for own use", $where, "BETWEEN 97 AND 98");
            $result_U = $this->_prepate_result("Activities of extraterritorial organizations and bodies", $where, "= 99");


			
            //$this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result_A', 'result_B', 'result_C','result_D','result_E','result_F','result_G','result_H','result_I','result_J','result_K','result_L','result_M','result_N','result_O','result_P','result_Q','result_R','result_S','result_T','result_U'));  
            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result_B', 'result_C','result_D','result_E','result_F','result_G','result_H','result_I','result_J','result_K','result_L','result_M','result_N','result_O','result_P','result_Q','result_R','result_S','result_T','result_U'));  
            
        }
	}


	public function _prepate_result($activity, $where, $between)
	{
		$db = get_class_vars('DATABASE_CONFIG');

			$conn = oci_connect($db['default']['login'], $db['default']['password'], $db['default']['database']);

			if (!$conn) {
				$m = oci_error();
				echo 'Failed to connect with server. ' . $m['message'];
				die();
			} else {
				$sql = "SELECT '".$activity."' AS BSIC_DESCRIPTION,

							(SELECT COUNT(R_ZERO.QUESTIONNARIE_ID)  AS TOTAL_EST FROM BBSEC2013_REPORTS  R_ZERO 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_ZERO.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_ZERO.Q16_FIXED_CAPITAL != 9 )  AS TOTAL_EST,
						 
						    (SELECT COUNT(R_ONE.QUESTIONNARIE_ID)  AS F_A_1 FROM BBSEC2013_REPORTS  R_ONE 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_ONE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_ONE.Q16_FIXED_CAPITAL = 1)  AS F_A_1,
						    
						    (SELECT COUNT(R_TWO.QUESTIONNARIE_ID)  AS F_A_2 FROM BBSEC2013_REPORTS  R_TWO 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_TWO.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_TWO.Q16_FIXED_CAPITAL = 2 )  AS F_A_2,
						    
						    (SELECT COUNT(R_THREE.QUESTIONNARIE_ID) AS  F_A_3 FROM BBSEC2013_REPORTS  R_THREE
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_THREE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_THREE.Q16_FIXED_CAPITAL = 3)  AS F_A_3,
						    
						    (SELECT COUNT(R_FOUR.QUESTIONNARIE_ID) AS  F_A_4 FROM BBSEC2013_REPORTS  R_FOUR 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_FOUR.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_FOUR.Q16_FIXED_CAPITAL = 4)  AS F_A_4,
						    
						    (SELECT COUNT(R_FIVE.QUESTIONNARIE_ID)  AS F_A_5 FROM BBSEC2013_REPORTS  R_FIVE
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_FIVE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_FIVE.Q16_FIXED_CAPITAL = 5) AS  F_A_5,
						    
						    (SELECT COUNT(R_SIX.QUESTIONNARIE_ID) AS  F_A_6 FROM BBSEC2013_REPORTS  R_SIX 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_SIX.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_SIX.Q16_FIXED_CAPITAL = 6)  AS F_A_6,
						    
						    (SELECT COUNT(R_SEVEN.QUESTIONNARIE_ID) AS  F_A_7 FROM BBSEC2013_REPORTS  R_SEVEN 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_SEVEN.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_SEVEN.Q16_FIXED_CAPITAL = 7)  AS F_A_7
						    
						FROM BBSEC2013_REPORTS REPORT
						WHERE ".$where." AND F_TO_NUMBER(SUBSTR(REPORT.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						GROUP BY  '".$activity."'";

                #echo $sql; exit;

				$stid = oci_parse($conn, $sql);
				oci_execute($stid); 
				$array = array();
		        while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
		            $array = $row;
		        }

		         oci_free_statement($stid);
        		 oci_close($conn);
        		 return $array;
			}
			
	}





    public function tpe_tbl_six_two_ajax() {
		$this -> autoRender = false;
		$this -> layout = false;
		
		if(isset($_SESSION['t_6_2'])) echo json_encode($_SESSION['t_6_2']);
		else echo json_encode("false");
	}


	public function tpe_tbl_six_two() {
		
		$this -> set('title_for_layout', 'Table: 6.2 Number of manufacturing establishments by selected working facilities');

		$this -> loadModel('Report');

		$divn = "";
		$zila = "";
		$upazila = "";
		$psa = "";
		$union = "";

		if ($this -> request -> is('post')) {

			unset($_SESSION['t_6_2']);
                 
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


			//ROW TWO
			$total_est_urban = $this -> Report -> query("SELECT COUNT(*) AS total_est_urban FROM BBSEC2013_REPORTS WHERE " . $where_urban ."AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33");
			$total_est_urban = (int) $total_est_urban[0][0]['total_est_urban'];

			$total_est_rural = $this -> Report -> query("SELECT COUNT(*) AS total_est_rural FROM BBSEC2013_REPORTS WHERE " . $where_rural ."AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33");
			$total_est_rural = (int) $total_est_rural[0][0]['total_est_rural'];



			//ROW THREE 
			$total_person_urban = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_urban FROM BBSEC2013_REPORTS WHERE " . $where_urban ."AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33");
			$total_person_urban = (int) $total_person_urban[0][0]['total_person_urban'];


			$total_person_rural = $this -> Report -> query("SELECT SUM(total_person_engaged) AS total_person_rural FROM BBSEC2013_REPORTS WHERE " . $where_rural ."AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33");
			$total_person_rural = (int) $total_person_rural[0][0]['total_person_rural'];

			
			//ROW FOUR 
			$total_fire_equipment_urban = $this -> Report -> query("SELECT COUNT(*) AS total_fire_equipment_urban FROM BBSEC2013_REPORTS WHERE".$where_urban."AND Q22_IS_FIRE_SECURED = 1 AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33");
			$total_fire_equipment_urban = (int) $total_fire_equipment_urban[0][0]['total_fire_equipment_urban'];

			$total_fire_equipment_rural = $this -> Report -> query("SELECT COUNT(*) AS total_fire_equipment_rural FROM BBSEC2013_REPORTS WHERE".$where_rural."AND Q22_IS_FIRE_SECURED = 1 AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33");
			$total_fire_equipment_rural = (int) $total_fire_equipment_rural[0][0]['total_fire_equipment_rural'];



			//ROW FIVE 
			$total_waste_management_urban = $this -> Report -> query("SELECT COUNT(*) AS total_waste_management_urban FROM BBSEC2013_REPORTS WHERE".$where_urban."AND Q23_IS_GARBAGE_PROPER = 1 AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33");
			$total_waste_management_urban = (int) $total_waste_management_urban[0][0]['total_waste_management_urban'];

			$total_waste_management_rural = $this -> Report -> query("SELECT COUNT(*) AS total_waste_management_rural FROM BBSEC2013_REPORTS WHERE".$where_rural."AND Q23_IS_GARBAGE_PROPER = 1 AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33");
			$total_waste_management_rural = (int) $total_waste_management_rural[0][0]['total_waste_management_rural'];



			//ROW SIX
			$total_toilet_facility_urban = $this -> Report -> query("SELECT COUNT(*) AS total_toilet_facility_urban FROM BBSEC2013_REPORTS WHERE".$where_urban." AND Q24_IS_TOILET_AVAILABLE = 1 AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33");
			$total_toilet_facility_urban = (int) $total_toilet_facility_urban[0][0]['total_toilet_facility_urban'];

			$total_toilet_facility_rural = $this -> Report -> query("SELECT COUNT(*) AS total_toilet_facility_rural FROM BBSEC2013_REPORTS WHERE".$where_rural."AND Q24_IS_TOILET_AVAILABLE = 1 AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33");
			$total_toilet_facility_rural = (int) $total_toilet_facility_rural[0][0]['total_toilet_facility_rural'];


			//ROW SEVEN
			$total_women_toilet_urban = $this -> Report -> query("SELECT COUNT(*) AS total_women_toilet_urban FROM BBSEC2013_REPORTS WHERE".$where_urban."AND Q24_IS_LADIES_TOILET_AVAILABLE = 1 AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33");
			$total_women_toilet_urban = (int) $total_women_toilet_urban[0][0]['total_women_toilet_urban'];

			$total_women_toilet_rural = $this -> Report -> query("SELECT COUNT(*) AS total_women_toilet_rural FROM BBSEC2013_REPORTS WHERE".$where_rural."AND Q24_IS_LADIES_TOILET_AVAILABLE = 1 AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33");
			$total_women_toilet_rural = (int) $total_women_toilet_rural[0][0]['total_women_toilet_rural'];

		}


		# Storing Required GraphData in Session variable
		$_SESSION['t_6_2']['urban_fire'] = $total_fire_equipment_urban;
		$_SESSION['t_6_2']['urban_waste'] = $total_waste_management_urban;
		$_SESSION['t_6_2']['urban_toilet'] = $total_toilet_facility_urban;

		$_SESSION['t_6_2']['rural_fire'] = $total_fire_equipment_rural;
		$_SESSION['t_6_2']['rural_waste'] = $total_waste_management_rural;
		$_SESSION['t_6_2']['rural_toilet'] = $total_toilet_facility_rural;


		$this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 
		# -----------------
		'total_est_urban', 'total_est_rural',
		#--------------------------
		'total_person_urban', 'total_person_rural',
		# -----------------
		'total_fire_equipment_urban', 'total_fire_equipment_rural',
		# -----------------
		'total_waste_management_urban', 'total_waste_management_rural',
		# -----------------
		'total_toilet_facility_urban', 'total_toilet_facility_rural',
		# -----------------
		'total_women_toilet_urban', 'total_women_toilet_rural'

		));
		
	}

	public function tpe_tbl_six_three() {
		$this -> set('title_for_layout', 'Table: 6.3 Number of establishments by size of investment invested by Non-resident Bangladeshi (NRB) in 2013');

		if ($this -> request -> is('post')) {
            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];

            $where = $this->_make_where_condition();

            $result = $this->_prepate_result_six_three ($where);

            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result'));  
        }
	}


	public function _prepate_result_six_three ($where)
	{
		$db = get_class_vars('DATABASE_CONFIG');

			$conn = oci_connect($db['default']['login'], $db['default']['password'], $db['default']['database']);

			if (!$conn) {
				$m = oci_error();
				echo 'Failed to connect with server. ' . $m['message'];
				die();
			} else {
			
			$sql = "SELECT REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME, 
			        (SELECT COUNT(REPORT_0.QUESTIONNARIE_ID) AS TOTAL_EST FROM BBSEC2013_REPORTS REPORT_0
					WHERE ((REPORT_0.Q10_NBR_AMOUNT_IN_THOU BETWEEN 1 AND 50000)
					OR (REPORT_0.Q10_NBR_AMOUNT_IN_THOU BETWEEN 51000 AND 100000)
					OR (REPORT_0.Q10_NBR_AMOUNT_IN_THOU BETWEEN 101000 AND 500000)
					OR (REPORT_0.Q10_NBR_AMOUNT_IN_THOU > 500000))
					AND REPORT_0.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) AS TOTAL_EST, 
					
					(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 
					WHERE REPORT_1.Q10_NBR_AMOUNT_IN_THOU BETWEEN 1 AND 50000
					AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) UP_TO_50, 
					
					(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID)
					FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q10_NBR_AMOUNT_IN_THOU BETWEEN 51000 AND 100000 AND 
					REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) BET_51_100,
					
					(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID)
					FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q10_NBR_AMOUNT_IN_THOU BETWEEN 101000 AND 500000 AND 
					REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) BET_101_500,
					
					(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID)
					FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q10_NBR_AMOUNT_IN_THOU > 500000 AND 
					REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) above_500
					
					FROM BBSEC2013_REPORTS REPORT
					WHERE" .$where.
					"GROUP BY REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME
					ORDER BY REPORT.UPZILA_NAME";
		         

		        //echo $sql; exit;
				$stid = oci_parse($conn, $sql);
				oci_execute($stid); 
				$array = array();
		        while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
		            $array[] = $row;
		        }

		         oci_free_statement($stid);
        		 oci_close($conn);
        		 return $array;
			}
			
	}



	public function tpe_tbl_six_four() {
		$this -> set('title_for_layout', 'Table: 6.4 Number of manufacturing establishments by type of machinery used and by upazila in 2013');

		if ($this -> request -> is('post')) {
            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];

            $where = $this->_make_where_condition();

            $result = $this->_prepare_result_six_four ($where);

            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result'));  
        }
	}


	public function _prepare_result_six_four ($where)
	{
		$db = get_class_vars('DATABASE_CONFIG');

			$conn = oci_connect($db['default']['login'], $db['default']['password'], $db['default']['database']);

			if (!$conn) {
				$m = oci_error();
				echo 'Failed to connect with server. ' . $m['message'];
				die();
			} else {
			
			$sql = "SELECT REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME,
					(SELECT COUNT(REPORT_0 .QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS  REPORT_0 
					 WHERE (REPORT_0 .Q18_MACHINE_USES  BETWEEN  1 AND 5) AND REPORT_0.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID 
					 AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33 ) AS TOTAL_EST, 
 
                    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS  REPORT_1 WHERE REPORT_1.Q18_MACHINE_USES = '1' 
                        AND  REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
                        AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
                        )  Power_Operating,
                    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS  REPORT_1 WHERE REPORT_1.Q18_MACHINE_USES = '2' 
                        AND  REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
                        AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
                        )  Fuel_Operating,
                    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS  REPORT_1 WHERE REPORT_1.Q18_MACHINE_USES = '3' 
                        AND  REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
                        AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
                        )  Both_Operating,
                    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS  REPORT_1 WHERE REPORT_1.Q18_MACHINE_USES = '4' 
                        AND  REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
                        AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
                        )  Hand_Operating,
                    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS  REPORT_1 WHERE REPORT_1.Q18_MACHINE_USES = '5' 
                        AND  REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
                        AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
                        )  Not_appilcable
					FROM BBSEC2013_REPORTS REPORT
					WHERE" .$where.
					"AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33 GROUP BY REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME
						 ORDER BY REPORT.UPZILA_NAME";

				//echo $sql; exit;

				$stid = oci_parse($conn, $sql);
				oci_execute($stid); 
				$array = array();
		        while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
		            $array[] = $row;
		        }

		         oci_free_statement($stid);
        		 oci_close($conn);
        		 return $array;
			}
			
	}


	public function tpe_tbl_six_five() {
		$this -> set('title_for_layout', 'Table: 6.5 Number of manufacturing establishments by marketing area and upazila in 2013');

		if ($this -> request -> is('post')) {
            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];

            $where = $this->_make_where_condition();

            $result = $this->_prepate_result_six_five ($where);

            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result'));  
        }
	}


	public function _prepate_result_six_five ($where)
	{
		$db = get_class_vars('DATABASE_CONFIG');

			$conn = oci_connect($db['default']['login'], $db['default']['password'], $db['default']['database']);

			if (!$conn) {
				$m = oci_error();
				echo 'Failed to connect with server. ' . $m['message'];
				die();
			} else {
			
			// $sql = "SELECT REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME, COUNT(REPORT.QUESTIONNARIE_ID) 
			// AS TOTAL_EST,
			// 	(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE
			// 	 REPORT_1.Q19_MARKETING = '1' 
			// 	AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) TOTALLY_LOCAL, 
			// 	(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID)
			// 	FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q19_MARKETING = '2' 
			// 	AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) TOTALLY_EXPORT, 
			// 	(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE 
			// 		REPORT_1.Q19_MARKETING = '3'
			// 	AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) LOCAL_EXPORT,
			// 	 (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID)
			// 	FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q19_MARKETING = '4' 
			// 	AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) NOT_APPLICABLE
			// 	FROM BBSEC2013_REPORTS REPORT 
			// 			WHERE" .$where.
			// 			"AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33 GROUP BY REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME
			// 			 ORDER BY REPORT.UPZILA_NAME";



					$sql = "SELECT REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME, 
							(SELECT COUNT(REPORT_0 .QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS  REPORT_0 
							WHERE (REPORT_0 .Q19_MARKETING  BETWEEN  1 AND 4) AND REPORT_0.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
							AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
							) AS TOTAL_EST, 

							(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE
				 			REPORT_1.Q19_MARKETING = '1' 
							AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
							AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
							) TOTALLY_LOCAL, 
							(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID)
							FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q19_MARKETING = '2' 
							AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
							AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
							) TOTALLY_EXPORT, 
							(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE 
							REPORT_1.Q19_MARKETING = '3'
							AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
							AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
							) LOCAL_EXPORT,
				 			(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID)
							FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q19_MARKETING = '4' 
							AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
							AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
							) NOT_APPLICABLE
							FROM BBSEC2013_REPORTS REPORT 
							WHERE" .$where.
							"AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33 GROUP BY REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME
						 	ORDER BY REPORT.UPZILA_NAME";






				//echo $sql;exit;
						
				$stid = oci_parse($conn, $sql);
				oci_execute($stid); 
				$array = array();
		        while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
		            $array[] = $row;
		        }

		         oci_free_statement($stid);
        		 oci_close($conn);
        		 return $array;
			}		
	}




	public function tpe_tbl_six_six() {
		$this -> set('title_for_layout', 'Table: 6.6 Number of manufacturing establishments by type of fuel used for production and upazila in 2013');

		if ($this -> request -> is('post')) {
            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];

            $where = $this->_make_where_condition();

            $result = $this->_prepate_result_six_six ($where);

            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result'));  
        }
	}


	public function _prepate_result_six_six ($where)
	{
		$db = get_class_vars('DATABASE_CONFIG');

			$conn = oci_connect($db['default']['login'], $db['default']['password'], $db['default']['database']);

			if (!$conn) {
				$m = oci_error();
				echo 'Failed to connect with server. ' . $m['message'];
				die();
			} else {
			
			$sql = "SELECT REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME, 
(SELECT COUNT(REPORT_0.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_0 
	WHERE (REPORT_0.Q20_FUEL_USES BETWEEN 1 AND 8) AND REPORT_0.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
	AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
	) TOTAL_EST, 
(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 
	WHERE REPORT_1.Q20_FUEL_USES = '1' AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
	AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
	) Electricity, 
(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 
	WHERE REPORT_1.Q20_FUEL_USES = '2' AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
	AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
	) Solar , 
(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 
	WHERE REPORT_1.Q20_FUEL_USES = '3' AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
	AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
	) Gas, 
(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 
	WHERE REPORT_1.Q20_FUEL_USES = '4' AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
	AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
	) Petroliam,
(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 
	WHERE REPORT_1.Q20_FUEL_USES = '5' AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
	AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
	) Coal, 
(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 
	WHERE REPORT_1.Q20_FUEL_USES = '6' AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
	AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
	) Wood,
(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 
	WHERE REPORT_1.Q20_FUEL_USES = '7' AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
	AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
	) Other, 
(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 
	WHERE REPORT_1.Q20_FUEL_USES = '8' AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
	AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
	) NOT_APPLICABLE
FROM BBSEC2013_REPORTS REPORT 
WHERE" .$where. "AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33 GROUP BY REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME
ORDER BY REPORT.UPZILA_NAME";

				// echo $sql;exit;		
				$stid = oci_parse($conn, $sql);
				oci_execute($stid); 
				$array = array();
		        while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
		            $array[] = $row;
		        }

		         oci_free_statement($stid);
        		 oci_close($conn);
        		 return $array;
			}		
	}


	public function tpe_tbl_six_seven() {
		$this -> set('title_for_layout', 'Table: 6.7 Number of manufacturing establishments used computer technology (CT) in production by upazila in 2013');

		if ($this -> request -> is('post')) {
            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];

            $where = $this->_make_where_condition();

            $result = $this->_prepate_result_six_seven ($where);

            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result'));  
        }
		
	}

	public function _prepate_result_six_seven ($where)
	{
		$db = get_class_vars('DATABASE_CONFIG');

			$conn = oci_connect($db['default']['login'], $db['default']['password'], $db['default']['database']);

			if (!$conn) {
				$m = oci_error();
				echo 'Failed to connect with server. ' . $m['message'];
				die();
			} else {
			
			$sql = "SELECT REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME,

					(SELECT COUNT(REPORT_0.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_0 
                  		WHERE (REPORT_0.Q21_IS_IT_ENABLED  BETWEEN 1 AND 2) AND REPORT_0.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
                  		AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
                  		) TOTAL_EST,

					(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE 
						REPORT_1.Q21_IS_IT_ENABLED = '1' 
						AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
						AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
						) ENABLED, 
					(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID)
						FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q21_IS_IT_ENABLED = '2' AND 
					REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID
					AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33
					) NOT_ENABLED 
						FROM BBSEC2013_REPORTS REPORT 
						WHERE" .$where.
						"AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33 GROUP BY REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME
						ORDER BY REPORT.UPZILA_NAME";

					#echo $sql; exit;
						
				$stid = oci_parse($conn, $sql);
				oci_execute($stid); 
				$array = array();
		        while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
		            $array[] = $row;
		        }

		         oci_free_statement($stid);
        		 oci_close($conn);
        		 return $array;
			}		
	}










	public function tpe_tbl_six_eight() {
		$this -> set('title_for_layout', 'Table: 6.8 Number of establishments by status of TIN and upazila in 2013');

		if ($this -> request -> is('post')) {
            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];

            $where = $this->_make_where_condition();

            $result = $this->_prepate_result_six_eight ($where);

            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result'));  
        }
		
	}


	public function _prepate_result_six_eight ($where)
	{
		$db = get_class_vars('DATABASE_CONFIG');

			$conn = oci_connect($db['default']['login'], $db['default']['password'], $db['default']['database']);

			if (!$conn) {
				$m = oci_error();
				echo 'Failed to connect with server. ' . $m['message'];
				die();
			} else {
			
			$sql = "SELECT REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME, COUNT(REPORT.QUESTIONNARIE_ID) AS TOTAL_EST,
					(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE
					 REPORT_1.Q25_IS_TIN_REGISTERED = '1' 
					AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) TIN_REGISTERED, 
					(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID)
					FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q25_IS_TIN_REGISTERED = '2' 
					AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) TIN_NOT_REGISTERED 
					FROM BBSEC2013_REPORTS REPORT 
					WHERE" .$where.
					"GROUP BY REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME
					ORDER BY REPORT.UPZILA_NAME";

				#echo $sql; exit;
						
				$stid = oci_parse($conn, $sql);
				oci_execute($stid); 
				$array = array();
		        while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
		            $array[] = $row;
		        }

		         oci_free_statement($stid);
        		 oci_close($conn);
        		 return $array;
			}		
	}









	public function tpe_tbl_six_nine() {
		$this -> set('title_for_layout', 'Table: 6.9 Number of establishments by status of TIN and economic activity in 2013');

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

            #$result_A = $this->_prepate_result_six_nine("Agriculture,forestry and fishing", $where, "BETWEEN 1 AND 3");
            $result_B = $this->_prepate_result_six_nine("Mining and quarrying", $where, "BETWEEN 5 AND 9");
            $result_C = $this->_prepate_result_six_nine("Manufacturing", $where, "BETWEEN 10 AND 33");
            $result_D = $this->_prepate_result_six_nine("Electricity ,gas,steam and air conditioning supply", $where, "= 35");
            $result_E = $this->_prepate_result_six_nine("Water supply,sewerage,waste management and remediation activities", $where, "BETWEEN 36 AND 39");
            $result_F = $this->_prepate_result_six_nine("Construction", $where, "BETWEEN 41 AND 43");
            $result_G = $this->_prepate_result_six_nine("Wholesale and retail trade,repair of motor vehicles and motorcycles", $where, "BETWEEN 45 AND 47");
            $result_H = $this->_prepate_result_six_nine("Transportation and storage", $where, "BETWEEN 49 AND 53");
            $result_I = $this->_prepate_result_six_nine("Accommodation and food service activities (Hotel and restaurents)", $where, "BETWEEN 55 AND 56");
            $result_J = $this->_prepate_result_six_nine("Information and communication", $where, "BETWEEN 58 AND 63");
            $result_K = $this->_prepate_result_six_nine("Financial and insurance activities", $where, "BETWEEN 64 AND 66");
            $result_L = $this->_prepate_result_six_nine("Real state activities", $where, "= 68");
            $result_M = $this->_prepate_result_six_nine("Professional, scientific and technical activities", $where, "BETWEEN 69 AND 75");
            $result_N = $this->_prepate_result_six_nine("Administrative and support service activities", $where, "BETWEEN 77 AND 82");
            $result_O = $this->_prepate_result_six_nine("Public administration and defence,compulsory social security", $where, "= 84");
            $result_P = $this->_prepate_result_six_nine("Education", $where, " = 85");
            $result_Q = $this->_prepate_result_six_nine("Human health and social work activities", $where, "BETWEEN 86 AND 88");
            $result_R = $this->_prepate_result_six_nine("Art, entertainment and recreation", $where, "BETWEEN 90 AND 93");
            $result_S = $this->_prepate_result_six_nine("Other service activities", $where, "BETWEEN 94 AND 96");
            $result_T = $this->_prepate_result_six_nine("Activities of households as employers, undifferentiated goods and services producing activities of households for own use", $where, "BETWEEN 97 AND 98");
            $result_U = $this->_prepate_result_six_nine("Activities of extraterritorial organizations and bodies", $where, "= 99");


			
            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 
            	//'result_A', 
            	'result_B', 'result_C','result_D','result_E','result_F','result_G','result_H','result_I','result_J','result_K','result_L','result_M','result_N','result_O','result_P','result_Q','result_R','result_S','result_T','result_U'));  
            
        }
	}



    // COUNT(REPORT.QUESTIONNARIE_ID) AS TOTAL_EST,
	public function _prepate_result_six_nine($activity, $where, $between)
	{
		$db = get_class_vars('DATABASE_CONFIG');

			$conn = oci_connect($db['default']['login'], $db['default']['password'], $db['default']['database']);

			if (!$conn) {
				$m = oci_error();
				echo 'Failed to connect with server. ' . $m['message'];
				die();
			} else {
				$sql = "SELECT '".$activity."' AS BSIC_DESCRIPTION, 
					
					(SELECT COUNT(R_ZERO.QUESTIONNARIE_ID)  AS TOTAL_EST FROM BBSEC2013_REPORTS  R_ZERO 
						WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_ZERO.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						AND R_ZERO.Q25_IS_TIN_REGISTERED BETWEEN 1 AND 2)  AS TOTAL_EST,

					(SELECT COUNT(R_ONE.QUESTIONNARIE_ID)  AS F_A_1 FROM BBSEC2013_REPORTS  R_ONE 
						WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_ONE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						AND R_ONE.Q25_IS_TIN_REGISTERED = 1)  AS F_A_1,
						    
					(SELECT COUNT(R_TWO.QUESTIONNARIE_ID)  AS F_A_2 FROM BBSEC2013_REPORTS  R_TWO 
						WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_TWO.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						AND R_TWO.Q25_IS_TIN_REGISTERED = 2 )  AS F_A_2

						FROM BBSEC2013_REPORTS REPORT
						WHERE ".$where." AND F_TO_NUMBER(SUBSTR(REPORT.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						GROUP BY  '".$activity."'";

			    //echo $sql,exit; 
				$stid = oci_parse($conn, $sql);
				oci_execute($stid); 
				$array = array();
		        while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
		            $array = $row;
		        }

		         oci_free_statement($stid);
        		 oci_close($conn);
        		 return $array;
			}
			
	}






	public function tpe_tbl_six_ten() {
		$this -> set('title_for_layout', 'Table: 6.10 Number of establishments by status of VAT registration and upazila in 2013

');
		if ($this -> request -> is('post')) {

            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];

            $where = $this->_make_where_condition();

            $result = $this->_prepate_result_six_ten ($where);

            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result'));  
        }
	}


	public function _prepate_result_six_ten ($where)
	{
		$db = get_class_vars('DATABASE_CONFIG');

			$conn = oci_connect($db['default']['login'], $db['default']['password'], $db['default']['database']);

			if (!$conn) {
				$m = oci_error();
				echo 'Failed to connect with server. ' . $m['message'];
				die();
			} else {
			
			$sql = "SELECT REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME, 

					(SELECT COUNT(REPORT_0.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_0 
		              WHERE (REPORT_0.Q26_IS_VAT_REGISTERED BETWEEN 1 AND 2) AND REPORT_0.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) TOTAL_EST,

					(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE
					  REPORT_1.Q26_IS_VAT_REGISTERED = '1' 
					  AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) VAT_REGISTERED, 
					(SELECT COUNT(REPORT_1.QUESTIONNARIE_ID)
					FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q26_IS_VAT_REGISTERED = '2' 
					AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) VAT_NOT_REGISTERED 
					FROM BBSEC2013_REPORTS REPORT 
					WHERE" .$where.
					"GROUP BY REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME
					ORDER BY REPORT.UPZILA_NAME";
				#echo $sql; exit;

				$stid = oci_parse($conn, $sql);
				oci_execute($stid); 
				$array = array();
		        while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
		            $array[] = $row;
		        }

		         oci_free_statement($stid);
        		 oci_close($conn);
        		 return $array;
			}		
	}




	public function tpe_tbl_six_eleven() {
		$this -> set('title_for_layout', 'Table: 6.11 Number of establishments by status of VAT registration and economic activity in 2013');

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

            //$result_A = $this->_prepate_result_six_eleven("Agriculture,forestry and fishing", $where, "BETWEEN 1 AND 3");
            $result_B = $this->_prepate_result_six_eleven("Mining and quarrying", $where, "BETWEEN 5 AND 9");
            $result_C = $this->_prepate_result_six_eleven("Manufacturing", $where, "BETWEEN 10 AND 33");
            $result_D = $this->_prepate_result_six_eleven("Electricity ,gas,steam and air conditioning supply", $where, "= 35");
            $result_E = $this->_prepate_result_six_eleven("Water supply,sewerage,waste management and remediation activities", $where, "BETWEEN 36 AND 39");
            $result_F = $this->_prepate_result_six_eleven("Construction", $where, "BETWEEN 41 AND 43");
            $result_G = $this->_prepate_result_six_eleven("Wholesale and retail trade,repair of motor vehicles and motorcycles", $where, "BETWEEN 45 AND 47");
            $result_H = $this->_prepate_result_six_eleven("Transportation and storage", $where, "BETWEEN 49 AND 53");
            $result_I = $this->_prepate_result_six_eleven("Accommodation and food service activities (Hotel and restaurents)", $where, "BETWEEN 55 AND 56");
            $result_J = $this->_prepate_result_six_eleven("Information and communication", $where, "BETWEEN 58 AND 63");
            $result_K = $this->_prepate_result_six_eleven("Financial and insurance activities", $where, "BETWEEN 64 AND 66");
            $result_L = $this->_prepate_result_six_eleven("Real state activities", $where, "= 68");
            $result_M = $this->_prepate_result_six_eleven("Professional, scientific and technical activities", $where, "BETWEEN 69 AND 75");
            $result_N = $this->_prepate_result_six_eleven("Administrative and support service activities", $where, "BETWEEN 77 AND 82");
            $result_O = $this->_prepate_result_six_eleven("Public administration and defence,compulsory social security", $where, "= 84");
            $result_P = $this->_prepate_result_six_eleven("Education", $where, " = 85");
            $result_Q = $this->_prepate_result_six_eleven("Human health and social work activities", $where, "BETWEEN 86 AND 88");
            $result_R = $this->_prepate_result_six_eleven("Art, entertainment and recreation", $where, "BETWEEN 90 AND 93");
            $result_S = $this->_prepate_result_six_eleven("Other service activities", $where, "BETWEEN 94 AND 96");
            $result_T = $this->_prepate_result_six_eleven("Activities of households as employers, undifferentiated goods and services producing activities of households for own use", $where, "BETWEEN 97 AND 98");
            $result_U = $this->_prepate_result_six_eleven("Activities of extraterritorial organizations and bodies", $where, "= 99");


			
            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 
            	//'result_A', 
            	'result_B', 'result_C','result_D','result_E','result_F','result_G','result_H','result_I','result_J','result_K','result_L','result_M','result_N','result_O','result_P','result_Q','result_R','result_S','result_T','result_U'));  
            
        }
			

		
	}

	public function _prepate_result_six_eleven($activity, $where, $between)
	{
		$db = get_class_vars('DATABASE_CONFIG');

			$conn = oci_connect($db['default']['login'], $db['default']['password'], $db['default']['database']);

			if (!$conn) {
				$m = oci_error();
				echo 'Failed to connect with server. ' . $m['message'];
				die();
			} else {
				$sql = "SELECT '".$activity."' AS BSIC_DESCRIPTION,

					(SELECT COUNT(R_ZERO.QUESTIONNARIE_ID)  AS TOTAL_EST FROM BBSEC2013_REPORTS  R_ZERO 
						WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_ZERO.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						AND R_ZERO.Q26_IS_VAT_REGISTERED BETWEEN 1 AND 2)  AS TOTAL_EST,	    

					(SELECT COUNT(R_ONE.QUESTIONNARIE_ID)  AS F_A_1 FROM BBSEC2013_REPORTS  R_ONE 
						WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_ONE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						AND R_ONE.Q26_IS_VAT_REGISTERED = 1)  AS F_A_1,
						    
					(SELECT COUNT(R_TWO.QUESTIONNARIE_ID)  AS F_A_2 FROM BBSEC2013_REPORTS  R_TWO 
						WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_TWO.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						AND R_TWO.Q26_IS_VAT_REGISTERED = 2 )  AS F_A_2

						FROM BBSEC2013_REPORTS REPORT
						WHERE ".$where." AND F_TO_NUMBER(SUBSTR(REPORT.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						GROUP BY  '".$activity."'";

				//echo $sql, exit; 
				$stid = oci_parse($conn, $sql);
				oci_execute($stid); 
				$array = array();
		        while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
		            $array = $row;
		        }

		         oci_free_statement($stid);
        		 oci_close($conn);
        		 return $array;
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
