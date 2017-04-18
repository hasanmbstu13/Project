<?php

class ReportsSevenDemoController extends AppController {

	var $uses = false;



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


#----------------------------------------------SIX------------------------------------------------------
	public function tpe_tbl_seven_one() {
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

            $result_A = $this->_prepate_result("Agriculture,forestry and fishing", $where, "BETWEEN 1 AND 3");
            $result_B = $this->_prepate_result("Mining and quarrying", $where , "BETWEEN 5 AND 9");
            $result_C = $this->_prepate_result("Manufacturing", $where , "BETWEEN 10 AND 33");
            $result_D = $this->_prepate_result("Electricity ,gas,steam and air conditioning supply", $where , "= 35");
            $result_E = $this->_prepate_result("Water supply,sewerage,waste management and remediation activities", $where , "BETWEEN 36 AND 39");
            $result_F = $this->_prepate_result("Construction", $where , "BETWEEN 41 AND 43");
            $result_G = $this->_prepate_result("Wholesale and retail trade,repair of motor vehicles and motorcycles", $where , "BETWEEN 45 AND 47");
            $result_H = $this->_prepate_result("Transportation and storage", $where , "BETWEEN 49 AND 53");
            $result_I = $this->_prepate_result("Accommodation and food service activities (Hotel and restaurents)", $where , "BETWEEN 55 AND 56");
            $result_J = $this->_prepate_result("Information and communication", $where , "BETWEEN 58 AND 63");
            $result_K = $this->_prepate_result("Financial and insurance activities", $where , "BETWEEN 64 AND 66");
            $result_L = $this->_prepate_result("Real state activities", $where , "= 68");
            $result_M = $this->_prepate_result("Professional, scientific and technical activities", $where , "BETWEEN 69 AND 75");
            $result_N = $this->_prepate_result("Administrative and support service activities", $where , "BETWEEN 77 AND 82");
            $result_O = $this->_prepate_result("Public administration and defence,compulsory social security", $where , "= 84");
            $result_P = $this->_prepate_result("Education", $where , " = 85");
            $result_Q = $this->_prepate_result("Human health and social work activities", $where , "BETWEEN 86 AND 88");
            $result_R = $this->_prepate_result("Art, entertainment and recreation", $where , "BETWEEN 90 AND 93");
            $result_S = $this->_prepate_result("Other service activities", $where , "BETWEEN 94 AND 96");
            $result_T = $this->_prepate_result("Activities of households as employers, undifferentiated goods and services producing activities of households for own use", $where, "BETWEEN 97 AND 98");
            $result_U = $this->_prepate_result("Activities of extraterritorial organizations and bodies", $where , "= 99");

  
			
            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result_A', 'result_B', 'result_C','result_D','result_E','result_F','result_G','result_H','result_I','result_J','result_K','result_L','result_M','result_N','result_O','result_P','result_Q','result_R','result_S','result_T','result_U'));  
            
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
				$sql = "SELECT '".$activity."' AS BSIC_DESCRIPTION, COUNT(REPORT.QUESTIONNARIE_ID) AS TOTAL_EST, 
						    (SELECT COUNT(R_ONE.QUESTIONNARIE_ID)  AS F_A_1 FROM BBSEC2013_REPORTS  R_ONE 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_ONE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_ONE.Q12_YEAR_OF_START  < 1971)  AS F_A_1971,
						    
						    (SELECT COUNT(R_TWO.QUESTIONNARIE_ID)  AS F_A_2 FROM BBSEC2013_REPORTS  R_TWO 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_TWO.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_TWO.Q12_YEAR_OF_START  BETWEEN 1971 AND 1989 )  AS F_A_1989,
						    
						    (SELECT COUNT(R_THREE.QUESTIONNARIE_ID) AS  F_A_3 FROM BBSEC2013_REPORTS  R_THREE
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_THREE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_THREE.Q12_YEAR_OF_START  BETWEEN 1990 AND 1999 )  AS F_A_1999,
						    
						    (SELECT COUNT(R_FOUR.QUESTIONNARIE_ID) AS  F_A_4 FROM BBSEC2013_REPORTS  R_FOUR 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_FOUR.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_FOUR.Q12_YEAR_OF_START  BETWEEN 2000 AND 2009 )  AS F_A_2009,
						    
						    (SELECT COUNT(R_FIVE.QUESTIONNARIE_ID)  AS F_A_5 FROM BBSEC2013_REPORTS  R_FIVE
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_FIVE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_FIVE.Q12_YEAR_OF_START  BETWEEN 2010 AND 2013 ) AS  F_A_2013
						    
						    
						FROM BBSEC2013_REPORTS REPORT
						WHERE ".$where." AND F_TO_NUMBER(SUBSTR(REPORT.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						GROUP BY  '".$activity."'";

                # echo $sql ; exit ;
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



	public function tpe_tbl_seven_two() {
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

            $result_A = $this->_prepate_result2("Agriculture,forestry and fishing", $where, "BETWEEN 1 AND 3");
            $result_B = $this->_prepate_result2("Mining and quarrying", $where , "BETWEEN 5 AND 9");
            $result_C = $this->_prepate_result2("Manufacturing", $where , "BETWEEN 10 AND 33");
            $result_D = $this->_prepate_result2("Electricity ,gas,steam and air conditioning supply", $where , "= 35");
            $result_E = $this->_prepate_result2("Water supply,sewerage,waste management and remediation activities", $where , "BETWEEN 36 AND 39");
            $result_F = $this->_prepate_result2("Construction", $where , "BETWEEN 41 AND 43");
            $result_G = $this->_prepate_result2("Wholesale and retail trade,repair of motor vehicles and motorcycles", $where , "BETWEEN 45 AND 47");
            $result_H = $this->_prepate_result2("Transportation and storage", $where , "BETWEEN 49 AND 53");
            $result_I = $this->_prepate_result2("Accommodation and food service activities (Hotel and restaurents)", $where , "BETWEEN 55 AND 56");
            $result_J = $this->_prepate_result2("Information and communication", $where , "BETWEEN 58 AND 63");
            $result_K = $this->_prepate_result2("Financial and insurance activities", $where , "BETWEEN 64 AND 66");
            $result_L = $this->_prepate_result2("Real state activities", $where , "= 68");
            $result_M = $this->_prepate_result2("Professional, scientific and technical activities", $where , "BETWEEN 69 AND 75");
            $result_N = $this->_prepate_result2("Administrative and support service activities", $where , "BETWEEN 77 AND 82");
            $result_O = $this->_prepate_result2("Public administration and defence,compulsory social security", $where , "= 84");
            $result_P = $this->_prepate_result2("Education", $where , " = 85");
            $result_Q = $this->_prepate_result2("Human health and social work activities", $where , "BETWEEN 86 AND 88");
            $result_R = $this->_prepate_result2("Art, entertainment and recreation", $where , "BETWEEN 90 AND 93");
            $result_S = $this->_prepate_result2("Other service activities", $where , "BETWEEN 94 AND 96");
            $result_T = $this->_prepate_result2("Activities of households as employers, undifferentiated goods and services producing activities of households for own use", $where, "BETWEEN 97 AND 98");
            $result_U = $this->_prepate_result2("Activities of extraterritorial organizations and bodies", $where , "= 99");

  
			
            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result_A', 'result_B', 'result_C','result_D','result_E','result_F','result_G','result_H','result_I','result_J','result_K','result_L','result_M','result_N','result_O','result_P','result_Q','result_R','result_S','result_T','result_U'));  
            
        }
	}

	public function _prepate_result2($activity, $where, $between)
	{
		$db = get_class_vars('DATABASE_CONFIG');

			$conn = oci_connect($db['default']['login'], $db['default']['password'], $db['default']['database']);

			if (!$conn) {
				$m = oci_error();
				echo 'Failed to connect with server. ' . $m['message'];
				die();
			} else {
				$sql = "SELECT '".$activity."' AS BSIC_DESCRIPTION, SUM(REPORT.TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON, 
						    (SELECT SUM(R_ONE.TOTAL_PERSON_ENGAGED)  AS F_A_1 FROM BBSEC2013_REPORTS  R_ONE 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_ONE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_ONE.Q12_YEAR_OF_START  < 1971)  AS F_A_1971,
						    
						    (SELECT SUM(R_TWO.TOTAL_PERSON_ENGAGED)  AS F_A_2 FROM BBSEC2013_REPORTS  R_TWO 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_TWO.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_TWO.Q12_YEAR_OF_START  BETWEEN 1971 AND 1989 )  AS F_A_1989,
						    
						    (SELECT SUM(R_THREE.TOTAL_PERSON_ENGAGED) AS  F_A_3 FROM BBSEC2013_REPORTS  R_THREE
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_THREE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_THREE.Q12_YEAR_OF_START  BETWEEN 1990 AND 1999 )  AS F_A_1999,
						    
						    (SELECT SUM(R_FOUR.TOTAL_PERSON_ENGAGED) AS  F_A_4 FROM BBSEC2013_REPORTS  R_FOUR 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_FOUR.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_FOUR.Q12_YEAR_OF_START  BETWEEN 2000 AND 2009 )  AS F_A_2009,
						    
						    (SELECT SUM(R_FIVE.TOTAL_PERSON_ENGAGED)  AS F_A_5 FROM BBSEC2013_REPORTS  R_FIVE
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_FIVE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_FIVE.Q12_YEAR_OF_START  BETWEEN 2010 AND 2013 ) AS  F_A_2013
						    
						    
						FROM BBSEC2013_REPORTS REPORT
						WHERE ".$where." AND F_TO_NUMBER(SUBSTR(REPORT.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						GROUP BY  '".$activity."'";

               #echo $sql ; exit ;
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


	public function tpe_tbl_seven_three() {



		$this -> set('title_for_layout', 'Table: 7.3 Number of permanent establishments by ownership and economic activity in 2013');

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


            $result_A = $this->_prepate_result_seven_three("Agriculture,forestry and fishing", $where, "BETWEEN 1 AND 3");
            $result_B = $this->_prepate_result_seven_three("Mining and quarrying", $where, "BETWEEN 5 AND 9");
            $result_C = $this->_prepate_result_seven_three("Manufacturing", $where, "BETWEEN 10 AND 33");
            $result_D = $this->_prepate_result_seven_three("Electricity ,gas,steam and air conditioning supply", $where, "= 35");
            $result_E = $this->_prepate_result_seven_three("Water supply,sewerage,waste management and remediation activities", $where, "BETWEEN 36 AND 39");
            $result_F = $this->_prepate_result_seven_three("Construction", $where, "BETWEEN 41 AND 43");
            $result_G = $this->_prepate_result_seven_three("Wholesale and retail trade,repair of motor vehicles and motorcycles", $where, "BETWEEN 45 AND 47");
            $result_H = $this->_prepate_result_seven_three("Transportation and storage", $where, "BETWEEN 49 AND 53");
            $result_I = $this->_prepate_result_seven_three("Accommodation and food service activities (Hotel and restaurents)", $where, "BETWEEN 55 AND 56");
            $result_J = $this->_prepate_result_seven_three("Information and communication", $where, "BETWEEN 58 AND 63");
            $result_K = $this->_prepate_result_seven_three("Financial and insurance activities", $where, "BETWEEN 64 AND 66");
            $result_L = $this->_prepate_result_seven_three("Real state activities", $where, "= 68");
            $result_M = $this->_prepate_result_seven_three("Professional, scientific and technical activities", $where, "BETWEEN 69 AND 75");
            $result_N = $this->_prepate_result_seven_three("Administrative and support service activities", $where, "BETWEEN 77 AND 82");
            $result_O = $this->_prepate_result_seven_three("Public administration and defence,compulsory social security", $where, "= 84");
            $result_P = $this->_prepate_result_seven_three("Education", $where, " = 85");
            $result_Q = $this->_prepate_result_seven_three("Human health and social work activities", $where, "BETWEEN 86 AND 88");
            $result_R = $this->_prepate_result_seven_three("Art, entertainment and recreation", $where, "BETWEEN 90 AND 93");
            $result_S = $this->_prepate_result_seven_three("Other service activities", $where, "BETWEEN 94 AND 96");
            $result_T = $this->_prepate_result_seven_three("Activities of households as employers, undifferentiated goods and services producing activities of households for own use", $where, "BETWEEN 97 AND 98");
            $result_U = $this->_prepate_result_seven_three("Activities of extraterritorial organizations and bodies", $where, "= 99");


			
            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result_A', 'result_B', 'result_C','result_D','result_E','result_F','result_G','result_H','result_I','result_J','result_K','result_L','result_M','result_N','result_O','result_P','result_Q','result_R','result_S','result_T','result_U'));  
            
        }
			

		
	}

	public function _prepate_result_seven_three($activity, $where, $between)
	{
		$db = get_class_vars('DATABASE_CONFIG');

			$conn = oci_connect($db['default']['login'], $db['default']['password'], $db['default']['database']);

			if (!$conn) {
				$m = oci_error();
				echo 'Failed to connect with server. ' . $m['message'];
				die();
			} else {
				$sql = "SELECT '".$activity."' AS BSIC_DESCRIPTION, COUNT(REPORT.QUESTIONNARIE_ID) AS TOTAL_EST, 
						    (SELECT COUNT(R_ONE.QUESTIONNARIE_ID)  AS F_A_1 FROM BBSEC2013_REPORTS  R_ONE 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_ONE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_ONE.Q9_LEGAL_ENTITY_TYPE_ID = '01')  AS F_A_1,
						    
						    (SELECT COUNT(R_TWO.QUESTIONNARIE_ID)  AS F_A_2 FROM BBSEC2013_REPORTS  R_TWO 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_TWO.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_TWO.Q9_LEGAL_ENTITY_TYPE_ID = '02' )  AS F_A_2,
						    
						    (SELECT COUNT(R_THREE.QUESTIONNARIE_ID) AS  F_A_3 FROM BBSEC2013_REPORTS  R_THREE
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_THREE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_THREE.Q9_LEGAL_ENTITY_TYPE_ID = '03')  AS F_A_3,
						    
						    (SELECT COUNT(R_FOUR.QUESTIONNARIE_ID) AS  F_A_4 FROM BBSEC2013_REPORTS  R_FOUR 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_FOUR.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_FOUR.Q9_LEGAL_ENTITY_TYPE_ID = '04')  AS F_A_4,
						    
						    (SELECT COUNT(R_FIVE.QUESTIONNARIE_ID)  AS F_A_5 FROM BBSEC2013_REPORTS  R_FIVE
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_FIVE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_FIVE.Q9_LEGAL_ENTITY_TYPE_ID = '05') AS  F_A_5,
						    
						    (SELECT COUNT(R_SIX.QUESTIONNARIE_ID) AS  F_A_6 FROM BBSEC2013_REPORTS  R_SIX 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_SIX.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_SIX.Q9_LEGAL_ENTITY_TYPE_ID = '06')  AS F_A_6,
						    
						    (SELECT COUNT(R_SEVEN.QUESTIONNARIE_ID) AS  F_A_7 FROM BBSEC2013_REPORTS  R_SEVEN 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_SEVEN.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_SEVEN.Q9_LEGAL_ENTITY_TYPE_ID = '07')  AS F_A_7,

							(SELECT COUNT(R_EIGHT.QUESTIONNARIE_ID)  AS F_A_8 FROM BBSEC2013_REPORTS  R_EIGHT 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_EIGHT.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_EIGHT.Q9_LEGAL_ENTITY_TYPE_ID = '08' )  AS F_A_8,
						    
						    (SELECT COUNT(R_NINE.QUESTIONNARIE_ID) AS  F_A_9 FROM BBSEC2013_REPORTS  R_NINE
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_NINE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_NINE.Q9_LEGAL_ENTITY_TYPE_ID = '09')  AS F_A_9,
						    
						    (SELECT COUNT(R_TEN.QUESTIONNARIE_ID) AS  F_A_10 FROM BBSEC2013_REPORTS  R_TEN 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_TEN.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_TEN.Q9_LEGAL_ENTITY_TYPE_ID = '10')  AS F_A_10,
						    
						    (SELECT COUNT(R_ELEVEN.QUESTIONNARIE_ID)  AS F_A_11 FROM BBSEC2013_REPORTS  R_ELEVEN
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_ELEVEN.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_ELEVEN.Q9_LEGAL_ENTITY_TYPE_ID = '11') AS  F_A_11,
						    
						    (SELECT COUNT(R_TWELEVE.QUESTIONNARIE_ID) AS  F_A_12 FROM BBSEC2013_REPORTS  R_TWELEVE
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_TWELEVE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_TWELEVE.Q9_LEGAL_ENTITY_TYPE_ID  = '12')  AS F_A_12
						    
						FROM BBSEC2013_REPORTS REPORT
						WHERE ".$where." AND F_TO_NUMBER(SUBSTR(REPORT.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." AND Q4_UNIT_TYPE = '2' AND Q4_UNIT_ORG_TYPE = '1'
						GROUP BY  '".$activity."'";


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


public function tpe_tbl_seven_four() {



		$this -> set('title_for_layout', 'Table: 7.4 Total persons engaged (TPE) in permanent establishments by ownership and economic activity in 2013');

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


            $result_A = $this->_prepate_result_seven_four("Agriculture,forestry and fishing", $where, "BETWEEN 1 AND 3");
            $result_B = $this->_prepate_result_seven_four("Mining and quarrying", $where, "BETWEEN 5 AND 9");
            $result_C = $this->_prepate_result_seven_four("Manufacturing", $where, "BETWEEN 10 AND 33");
            $result_D = $this->_prepate_result_seven_four("Electricity ,gas,steam and air conditioning supply", $where, "= 35");
            $result_E = $this->_prepate_result_seven_four("Water supply,sewerage,waste management and remediation activities", $where, "BETWEEN 36 AND 39");
            $result_F = $this->_prepate_result_seven_four("Construction", $where, "BETWEEN 41 AND 43");
            $result_G = $this->_prepate_result_seven_four("Wholesale and retail trade,repair of motor vehicles and motorcycles", $where, "BETWEEN 45 AND 47");
            $result_H = $this->_prepate_result_seven_four("Transportation and storage", $where, "BETWEEN 49 AND 53");
            $result_I = $this->_prepate_result_seven_four("Accommodation and food service activities (Hotel and restaurents)", $where, "BETWEEN 55 AND 56");
            $result_J = $this->_prepate_result_seven_four("Information and communication", $where, "BETWEEN 58 AND 63");
            $result_K = $this->_prepate_result_seven_four("Financial and insurance activities", $where, "BETWEEN 64 AND 66");
            $result_L = $this->_prepate_result_seven_four("Real state activities", $where, "= 68");
            $result_M = $this->_prepate_result_seven_four("Professional, scientific and technical activities", $where, "BETWEEN 69 AND 75");
            $result_N = $this->_prepate_result_seven_four("Administrative and support service activities", $where, "BETWEEN 77 AND 82");
            $result_O = $this->_prepate_result_seven_four("Public administration and defence,compulsory social security", $where, "= 84");
            $result_P = $this->_prepate_result_seven_four("Education", $where, " = 85");
            $result_Q = $this->_prepate_result_seven_four("Human health and social work activities", $where, "BETWEEN 86 AND 88");
            $result_R = $this->_prepate_result_seven_four("Art, entertainment and recreation", $where, "BETWEEN 90 AND 93");
            $result_S = $this->_prepate_result_seven_four("Other service activities", $where, "BETWEEN 94 AND 96");
            $result_T = $this->_prepate_result_seven_four("Activities of households as employers, undifferentiated goods and services producing activities of households for own use", $where, "BETWEEN 97 AND 98");
            $result_U = $this->_prepate_result_seven_four("Activities of extraterritorial organizations and bodies", $where, "= 99");


            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result_A', 'result_B', 'result_C','result_D','result_E','result_F','result_G','result_H','result_I','result_J','result_K','result_L','result_M','result_N','result_O','result_P','result_Q','result_R','result_S','result_T','result_U'));  
            
        }
			

		
	}

	public function _prepate_result_seven_four($activity, $where, $between)
	{
		$db = get_class_vars('DATABASE_CONFIG');

			$conn = oci_connect($db['default']['login'], $db['default']['password'], $db['default']['database']);

			if (!$conn) {
				$m = oci_error();
				echo 'Failed to connect with server. ' . $m['message'];
				die();
			} else {
				$sql = "SELECT '".$activity."' AS BSIC_DESCRIPTION, COUNT(REPORT.QUESTIONNARIE_ID) AS TOTAL_EST, 
						    (SELECT SUM(R_ONE.TOTAL_PERSON_ENGAGED)  AS F_A_1 FROM BBSEC2013_REPORTS  R_ONE 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_ONE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_ONE.Q9_LEGAL_ENTITY_TYPE_ID = '01')  AS F_A_1,
						    
						    (SELECT SUM(R_TWO.TOTAL_PERSON_ENGAGED)  AS F_A_2 FROM BBSEC2013_REPORTS  R_TWO 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_TWO.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_TWO.Q9_LEGAL_ENTITY_TYPE_ID = '02' )  AS F_A_2,
						    
						    (SELECT SUM(R_THREE.TOTAL_PERSON_ENGAGED) AS  F_A_3 FROM BBSEC2013_REPORTS  R_THREE
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_THREE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_THREE.Q9_LEGAL_ENTITY_TYPE_ID = '03')  AS F_A_3,
						    
						    (SELECT SUM(R_FOUR.TOTAL_PERSON_ENGAGED) AS  F_A_4 FROM BBSEC2013_REPORTS  R_FOUR 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_FOUR.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_FOUR.Q9_LEGAL_ENTITY_TYPE_ID = '04')  AS F_A_4,
						    
						    (SELECT SUM(R_FIVE.TOTAL_PERSON_ENGAGED)  AS F_A_5 FROM BBSEC2013_REPORTS  R_FIVE
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_FIVE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_FIVE.Q9_LEGAL_ENTITY_TYPE_ID = '05') AS  F_A_5,
						    
						    (SELECT SUM(R_SIX.TOTAL_PERSON_ENGAGED) AS  F_A_6 FROM BBSEC2013_REPORTS  R_SIX 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_SIX.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_SIX.Q9_LEGAL_ENTITY_TYPE_ID = '06')  AS F_A_6,
						    
						    (SELECT SUM(R_SEVEN.TOTAL_PERSON_ENGAGED) AS  F_A_7 FROM BBSEC2013_REPORTS  R_SEVEN 
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_SEVEN.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_SEVEN.Q9_LEGAL_ENTITY_TYPE_ID = '07')  AS F_A_7,

							(SELECT SUM(R_EIGHT.TOTAL_PERSON_ENGAGED)  AS F_A_8 FROM BBSEC2013_REPORTS  R_EIGHT
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_EIGHT.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_EIGHT.Q9_LEGAL_ENTITY_TYPE_ID = '08' )  AS F_A_8,
						    
						    (SELECT SUM(R_NINE.TOTAL_PERSON_ENGAGED) AS  F_A_9 FROM BBSEC2013_REPORTS  R_NINE
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_NINE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  
						    AND R_NINE.Q9_LEGAL_ENTITY_TYPE_ID = '09')  AS F_A_9,
						    
						    (SELECT SUM(R_TEN.TOTAL_PERSON_ENGAGED) AS  F_A_10 FROM BBSEC2013_REPORTS  R_TEN
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_TEN.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_TEN.Q9_LEGAL_ENTITY_TYPE_ID = '10')  AS F_A_10,
						    
						    (SELECT SUM(R_ELEVEN.TOTAL_PERSON_ENGAGED)  AS F_A_5 FROM BBSEC2013_REPORTS  R_ELEVEN
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_ELEVEN.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_ELEVEN.Q9_LEGAL_ENTITY_TYPE_ID = '11') AS  F_A_11,
						    
						    (SELECT SUM(R_TWELEVE.TOTAL_PERSON_ENGAGED) AS  F_A_12 FROM BBSEC2013_REPORTS  R_TWELEVE
						    WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_TWELEVE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." 
						    AND R_TWELEVE.Q9_LEGAL_ENTITY_TYPE_ID  = '12')  AS F_A_12
						    
						FROM BBSEC2013_REPORTS REPORT
						WHERE ".$where." AND F_TO_NUMBER(SUBSTR(REPORT.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between." AND Q4_UNIT_TYPE = '2' AND Q4_UNIT_ORG_TYPE = '1'
						GROUP BY  '".$activity."'";


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


public function tpe_tbl_seven_five () {

   $this -> set('title_for_layout', 'Table: 7.5 Total number of permanent establishments &total persons engaged (TPE) by ownership & average size of establishments in 2013 and in 2001 & 03');

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

            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where. " AND  Q9_LEGAL_ENTITY_TYPE_ID = '01' AND Q4_UNIT_TYPE = '2' AND Q4_UNIT_ORG_TYPE = '1'");
            $A_Total_unit = (int)$result[0][0]['total_est'];
            $A_Total_Person = (int)$result[0][0]['total_person_engaged'];

            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where. " AND  Q9_LEGAL_ENTITY_TYPE_ID = '02' AND Q4_UNIT_TYPE = '2' AND Q4_UNIT_ORG_TYPE = '1' ");
            $B_Total_unit = (int)$result[0][0]['total_est'];
            $B_Total_Person = (int)$result[0][0]['total_person_engaged'];

            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " .$where. " AND  Q9_LEGAL_ENTITY_TYPE_ID = '03' AND Q4_UNIT_TYPE = '2' AND Q4_UNIT_ORG_TYPE = '1' ");
            $C_Total_unit = (int)$result[0][0]['total_est'];
            $C_Total_Person = (int)$result[0][0]['total_person_engaged'];

            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  Q9_LEGAL_ENTITY_TYPE_ID = '04' AND Q4_UNIT_TYPE = '2' AND Q4_UNIT_ORG_TYPE = '1' ");
            $D_Total_unit = (int)$result[0][0]['total_est'];
            $D_Total_Person = (int)$result[0][0]['total_person_engaged'];

            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  Q9_LEGAL_ENTITY_TYPE_ID = '05' AND Q4_UNIT_TYPE = '2' AND Q4_UNIT_ORG_TYPE = '1' ");
            $E_Total_unit = (int)$result[0][0]['total_est'];
            $E_Total_Person = (int)$result[0][0]['total_person_engaged'];

            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  Q9_LEGAL_ENTITY_TYPE_ID = '06' AND Q4_UNIT_TYPE = '2' AND Q4_UNIT_ORG_TYPE = '1' ");
            $F_Total_unit = (int)$result[0][0]['total_est'];
            $F_Total_Person = (int)$result[0][0]['total_person_engaged'];

            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  Q9_LEGAL_ENTITY_TYPE_ID = '07' AND Q4_UNIT_TYPE = '2' AND Q4_UNIT_ORG_TYPE = '1' ");
            $G_Total_unit = (int)$result[0][0]['total_est'];
            $G_Total_Person = (int)$result[0][0]['total_person_engaged'];

            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  Q9_LEGAL_ENTITY_TYPE_ID = '08' AND Q4_UNIT_TYPE = '2' AND Q4_UNIT_ORG_TYPE = '1' ");
            $H_Total_unit = (int)$result[0][0]['total_est'];
            $H_Total_Person = (int)$result[0][0]['total_person_engaged'];

            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  Q9_LEGAL_ENTITY_TYPE_ID = '09' AND Q4_UNIT_TYPE = '2' AND Q4_UNIT_ORG_TYPE = '1' ");
            $I_Total_unit = (int)$result[0][0]['total_est'];
            $I_Total_Person = (int)$result[0][0]['total_person_engaged'];

            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  Q9_LEGAL_ENTITY_TYPE_ID = '10' AND Q4_UNIT_TYPE = '2' AND Q4_UNIT_ORG_TYPE = '1' ");
            $J_Total_unit = (int)$result[0][0]['total_est'];
            $J_Total_Person = (int)$result[0][0]['total_person_engaged'];

            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  Q9_LEGAL_ENTITY_TYPE_ID = '11' AND Q4_UNIT_TYPE = '2' AND Q4_UNIT_ORG_TYPE = '1");
            $K_Total_unit = (int)$result[0][0]['total_est'];
            $K_Total_Person = (int)$result[0][0]['total_person_engaged'];

            $result = $this -> Report -> query("SELECT COUNT(*) AS total_est, SUM(TOTAL_PERSON_ENGAGED) AS total_person_engaged FROM BBSEC2013_REPORTS WHERE " . $where . " AND  Q9_LEGAL_ENTITY_TYPE_ID = '12' AND Q4_UNIT_TYPE = '2' AND Q4_UNIT_ORG_TYPE = '1");
            $L_Total_unit = (int)$result[0][0]['total_est'];
            $L_Total_Person = (int)$result[0][0]['total_person_engaged'];
    
            }

           $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union',
        'A_Total_unit', 'A_Total_Person', 
        'B_Total_unit', 'B_Total_Person',
        'C_Total_unit', 'C_Total_Person', 
        'D_Total_unit', 'D_Total_Person',
        'E_Total_unit', 'E_Total_Person', 
        'F_Total_unit', 'F_Total_Person', 
        'G_Total_unit', 'G_Total_Person', 
        'H_Total_unit', 'H_Total_Person',
        'I_Total_unit', 'I_Total_Person',
        'J_Total_unit', 'J_Total_Person',
        'K_Total_unit', 'K_Total_Person', 
        'L_Total_unit', 'L_Total_Person')); 
} 


public function tpe_tbl_seven_six() {

		$this -> set('title_for_layout', 'Registration status of establishments by upazila in 2013');

		if ($this -> request -> is('post')) {
            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];

            $where = $this->_make_where_condition();

            $result = $this->_prepate_result_seven_six ($where);

            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result'));  
        }
	}


	public function _prepate_result_seven_six ($where)
	{
		$db = get_class_vars('DATABASE_CONFIG');

			$conn = oci_connect($db['default']['login'], $db['default']['password'], $db['default']['database']);

			if (!$conn) {
				$m = oci_error();
				echo 'Failed to connect with server. ' . $m['message'];
				die();
			} else {
			
			$sql = "SELECT REPORT.GEO_CODE_UNION_ID, REPORT.UNION_NAME,
					COUNT(REPORT.QUESTIONNARIE_ID) AS TOTAL_EST, 
                        (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS  REPORT_1 WHERE REPORT_1.Q11_IS_REGISTERED = '1' 
                        AND  REPORT_1.GEO_CODE_UNION_ID = REPORT.GEO_CODE_UNION_ID) REGISTERED ,
                        (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS  REPORT_1 WHERE REPORT_1.Q11_IS_REGISTERED = '2' 
                        AND  REPORT_1.GEO_CODE_UNION_ID = REPORT.GEO_CODE_UNION_ID)  NON_REGISTERED,
                          (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS  REPORT_1 WHERE REPORT_1.Q11_IS_REGISTERED NOT IN (1,2)  
                        AND  REPORT_1.GEO_CODE_UNION_ID = REPORT.GEO_CODE_UNION_ID)  NOT_APPLICABLE
						FROM BBSEC2013_REPORTS REPORT
						WHERE" .$where.
						"GROUP BY REPORT.GEO_CODE_UNION_ID, REPORT.UNION_NAME
						 ORDER BY REPORT.UNION_NAME";

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


	public function tpe_tbl_seven_seven() {
		$this -> set('title_for_layout', 'Registration status of establishments by upazila in 2013');

		if ($this -> request -> is('post')) {
            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];

            $where = $this->_make_where_condition();

            $result = $this->_prepate_result_seven_seven ($where);

            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result'));  
        }
	}


	public function _prepate_result_seven_seven ($where)
	{
		$db = get_class_vars('DATABASE_CONFIG');

			$conn = oci_connect($db['default']['login'], $db['default']['password'], $db['default']['database']);

			if (!$conn) {
				$m = oci_error();
				echo 'Failed to connect with server. ' . $m['message'];
				die();
			} else {
			
			$sql = "SELECT REPORT.GEO_CODE_UNION_ID, REPORT.UNION_NAME,
					COUNT(REPORT.QUESTIONNARIE_ID) AS TOTAL_EST, 
                        (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS  REPORT_1 WHERE REPORT_1.Q13_SALE_PROCEDURE = '1' 
                        AND  REPORT_1.GEO_CODE_UNION_ID = REPORT.GEO_CODE_UNION_ID)  RETAIL,
                        (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS  REPORT_1 WHERE REPORT_1.Q13_SALE_PROCEDURE = '2' 
                        AND  REPORT_1.GEO_CODE_UNION_ID = REPORT.GEO_CODE_UNION_ID)  WHOLESALE,
                          (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS  REPORT_1 WHERE REPORT_1.Q13_SALE_PROCEDURE NOT IN (1,2) 
                        AND  REPORT_1.GEO_CODE_UNION_ID = REPORT.GEO_CODE_UNION_ID)  NOT_APPLICABLE,
                          (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS  REPORT_1 WHERE REPORT_1.Q14_IS_ACCOUNTABLE = '1' 
                        AND  REPORT_1.GEO_CODE_UNION_ID = REPORT.GEO_CODE_UNION_ID)  ACCOUNT,
                          (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS  REPORT_1 WHERE REPORT_1.Q14_IS_ACCOUNTABLE != '1'
                        AND  REPORT_1.GEO_CODE_UNION_ID = REPORT.GEO_CODE_UNION_ID) NOT_ACCOUNT
						FROM BBSEC2013_REPORTS REPORT
						WHERE" .$where.
						"GROUP BY REPORT.GEO_CODE_UNION_ID, REPORT.UNION_NAME
						 ORDER BY REPORT.UNION_NAME";

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


    public function tpe_tbl_seven_eight() {

        $this -> set('title_for_layout', 'Table: 7.8 Head of establishments by sex, location and level of education in 2013');

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

            $where_urban = $where . " AND ques_rmo_code IN(2,3,9) ";
            $where_rural = $where . " AND ques_rmo_code IN(1,5,7) ";

            $where_education_none = $where . " AND education_code = '00' ";
            $where_education_primary = $where . " AND education_code IN('01', '02', '03', '04', '05') ";
            $where_education_lower_sec = $where . " AND education_code IN('06', '07', '08', '09') ";
            $where_education_sec = $where . " AND education_code = '10' ";
            $where_education_higher_sec = $where . " AND education_code = '12' ";
            $where_education_higher = $where . " AND education_code IN ('15', '16', '18') ";

            $where_male = $where . " AND q3_unit_head_gender = 'Male' ";
            $where_female = $where . " AND q3_unit_head_gender = 'Female' ";
            $where_others = $where . " AND q3_unit_head_gender = 'Others' ";



            $total_est_none = $this -> Report -> query("SELECT COUNT(*) AS total_est_none FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_none );
            $total_est_none = (int) $total_est_none[0][0]['total_est_none'];



            $total_male_none = $this -> Report -> query("SELECT COUNT(*) AS total_male_none FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_none."AND" .$where_male);
            $total_male_none = (int)$total_male_none[0][0]['total_male_none'];

            $total_female_none = $this -> Report -> query("SELECT COUNT(*) AS total_female_none FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_none."AND" .$where_female);      
            $total_female_none = (int)$total_female_none[0][0]['total_female_none'];

            $total_others_none = $this -> Report -> query("SELECT COUNT(*) AS total_others_none FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_none."AND" .$where_others);       
            $total_others_none = (int)$total_others_none[0][0]['total_others_none'];



            $total_urban_male_none = $this -> Report -> query("SELECT COUNT(*) AS total_urban_male_none FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_none."AND" .$where_male. "AND" .$where_urban);
            $total_urban_male_none = (int)$total_urban_male_none[0][0]['total_urban_male_none'];

            $total_urban_female_none = $this -> Report -> query("SELECT COUNT(*) AS total_urban_female_none FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_none."AND" .$where_female. "AND" .$where_urban);
            $total_urban_female_none = (int) $total_urban_female_none[0][0]['total_urban_female_none'];

             $total_urban_others_none = $this -> Report -> query("SELECT COUNT(*) AS total_urban_others_none FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_none."AND" .$where_others. "AND" .$where_urban);
            $total_urban_others_none = (int) $total_urban_others_none[0][0]['total_urban_others_none'];



            $total_rural_male_none = $this -> Report -> query("SELECT COUNT(*) AS total_rural_male_none FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_none."AND" .$where_male. "AND" .$where_rural);
            $total_rural_male_none = (int)$total_rural_male_none[0][0]['total_rural_male_none'];


            $total_rural_female_none = $this -> Report -> query("SELECT COUNT(*) AS total_rural_female_none FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_none."AND" .$where_female. "AND" .$where_rural);
            $total_rural_female_none = (int) $total_rural_female_none[0][0]['total_rural_female_none'];

            $total_rural_others_none = $this -> Report -> query("SELECT COUNT(*) AS total_rural_others_none FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_none."AND" .$where_others. "AND" .$where_rural);
            $total_rural_others_none = (int) $total_rural_others_none[0][0]['total_rural_others_none'];





            $total_est_primary = $this -> Report -> query("SELECT COUNT(*) AS total_est_primary FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_primary );
            $total_est_primary = (int) $total_est_primary[0][0]['total_est_primary'];



            $total_male_primary = $this -> Report -> query("SELECT COUNT(*) AS total_male_primary FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_primary."AND" .$where_male);
            $total_male_primary = (int)$total_male_primary[0][0]['total_male_primary'];

            $total_female_primary = $this -> Report -> query("SELECT COUNT(*) AS total_female_primary FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_primary."AND" .$where_female);      
            $total_female_primary = (int)$total_female_primary[0][0]['total_female_primary'];

            $total_others_primary = $this -> Report -> query("SELECT COUNT(*) AS total_others_primary FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_primary."AND" .$where_others);       
            $total_others_primary = (int)$total_others_primary[0][0]['total_others_primary'];



            $total_urban_male_primary = $this -> Report -> query("SELECT COUNT(*) AS total_urban_male_primary FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_primary."AND" .$where_male. "AND" .$where_urban);
            $total_urban_male_primary = (int)$total_urban_male_primary[0][0]['total_urban_male_primary'];

            $total_urban_female_primary = $this -> Report -> query("SELECT COUNT(*) AS total_urban_female_primary FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_primary."AND" .$where_female. "AND" .$where_urban);
            $total_urban_female_primary = (int) $total_urban_female_primary[0][0]['total_urban_female_primary'];

             $total_urban_others_primary = $this -> Report -> query("SELECT COUNT(*) AS total_urban_others_primary FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_primary."AND" .$where_others. "AND" .$where_urban);
            $total_urban_others_primary = (int) $total_urban_others_primary[0][0]['total_urban_others_primary'];



            $total_rural_male_primary = $this -> Report -> query("SELECT COUNT(*) AS total_rural_male_primary FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_primary."AND" .$where_male. "AND" .$where_rural);
            $total_rural_male_primary = (int)$total_rural_male_primary[0][0]['total_rural_male_primary'];


            $total_rural_female_primary = $this -> Report -> query("SELECT COUNT(*) AS total_rural_female_primary FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_primary."AND" .$where_female. "AND" .$where_rural);
            $total_rural_female_primary = (int) $total_rural_female_primary[0][0]['total_rural_female_primary'];

            $total_rural_others_primary = $this -> Report -> query("SELECT COUNT(*) AS total_rural_others_primary FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_primary."AND" .$where_others. "AND" .$where_rural);
            $total_rural_others_primary = (int) $total_rural_others_primary[0][0]['total_rural_others_primary'];





            $total_est_lower_sec = $this -> Report -> query("SELECT COUNT(*) AS total_est_lower_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_lower_sec );
            $total_est_lower_sec = (int) $total_est_lower_sec[0][0]['total_est_lower_sec'];



            $total_male_lower_sec = $this -> Report -> query("SELECT COUNT(*) AS total_male_lower_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_lower_sec."AND" .$where_male);
            $total_male_lower_sec = (int)$total_male_lower_sec[0][0]['total_male_lower_sec'];

            $total_female_lower_sec = $this -> Report -> query("SELECT COUNT(*) AS total_female_lower_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_lower_sec."AND" .$where_female);      
            $total_female_lower_sec = (int)$total_female_lower_sec[0][0]['total_female_lower_sec'];

            $total_others_lower_sec = $this -> Report -> query("SELECT COUNT(*) AS total_others_lower_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_lower_sec."AND" .$where_others);       
            $total_others_lower_sec = (int)$total_others_lower_sec[0][0]['total_others_lower_sec'];



            $total_urban_male_lower_sec = $this -> Report -> query("SELECT COUNT(*) AS total_urban_male_lower_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_lower_sec."AND" .$where_male. "AND" .$where_urban);
            $total_urban_male_lower_sec = (int)$total_urban_male_lower_sec[0][0]['total_urban_male_lower_sec'];

            $total_urban_female_lower_sec = $this -> Report -> query("SELECT COUNT(*) AS total_urban_female_lower_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_lower_sec."AND" .$where_female. "AND" .$where_urban);
            $total_urban_female_lower_sec = (int) $total_urban_female_lower_sec[0][0]['total_urban_female_lower_sec'];

             $total_urban_others_lower_sec = $this -> Report -> query("SELECT COUNT(*) AS total_urban_others_lower_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_lower_sec."AND" .$where_others. "AND" .$where_urban);
            $total_urban_others_lower_sec = (int) $total_urban_others_lower_sec[0][0]['total_urban_others_lower_sec'];



            $total_rural_male_lower_sec = $this -> Report -> query("SELECT COUNT(*) AS total_rural_male_lower_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_lower_sec."AND" .$where_male. "AND" .$where_rural);
            $total_rural_male_lower_sec = (int)$total_rural_male_lower_sec[0][0]['total_rural_male_lower_sec'];


            $total_rural_female_lower_sec = $this -> Report -> query("SELECT COUNT(*) AS total_rural_female_lower_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_lower_sec."AND" .$where_female. "AND" .$where_rural);
            $total_rural_female_lower_sec = (int) $total_rural_female_lower_sec[0][0]['total_rural_female_lower_sec'];

            $total_rural_others_lower_sec = $this -> Report -> query("SELECT COUNT(*) AS total_rural_others_lower_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_lower_sec."AND" .$where_others. "AND" .$where_rural);
            $total_rural_others_lower_sec = (int) $total_rural_others_lower_sec[0][0]['total_rural_others_lower_sec'];




                        $total_est_sec = $this -> Report -> query("SELECT COUNT(*) AS total_est_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_sec );
            $total_est_sec = (int) $total_est_sec[0][0]['total_est_sec'];



            $total_male_sec = $this -> Report -> query("SELECT COUNT(*) AS total_male_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_sec."AND" .$where_male);
            $total_male_sec = (int)$total_male_sec[0][0]['total_male_sec'];

            $total_female_sec = $this -> Report -> query("SELECT COUNT(*) AS total_female_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_sec."AND" .$where_female);      
            $total_female_sec = (int)$total_female_sec[0][0]['total_female_sec'];

            $total_others_sec = $this -> Report -> query("SELECT COUNT(*) AS total_others_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_sec."AND" .$where_others);       
            $total_others_sec = (int)$total_others_sec[0][0]['total_others_sec'];



            $total_urban_male_sec = $this -> Report -> query("SELECT COUNT(*) AS total_urban_male_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_sec."AND" .$where_male. "AND" .$where_urban);
            $total_urban_male_sec = (int)$total_urban_male_sec[0][0]['total_urban_male_sec'];

            $total_urban_female_sec = $this -> Report -> query("SELECT COUNT(*) AS total_urban_female_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_sec."AND" .$where_female. "AND" .$where_urban);
            $total_urban_female_sec = (int) $total_urban_female_sec[0][0]['total_urban_female_sec'];

             $total_urban_others_sec = $this -> Report -> query("SELECT COUNT(*) AS total_urban_others_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_sec."AND" .$where_others. "AND" .$where_urban);
            $total_urban_others_sec = (int) $total_urban_others_sec[0][0]['total_urban_others_sec'];



            $total_rural_male_sec = $this -> Report -> query("SELECT COUNT(*) AS total_rural_male_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_sec."AND" .$where_male. "AND" .$where_rural);
            $total_rural_male_sec = (int)$total_rural_male_sec[0][0]['total_rural_male_sec'];


            $total_rural_female_sec = $this -> Report -> query("SELECT COUNT(*) AS total_rural_female_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_sec."AND" .$where_female. "AND" .$where_rural);
            $total_rural_female_sec = (int) $total_rural_female_sec[0][0]['total_rural_female_sec'];

            $total_rural_others_sec = $this -> Report -> query("SELECT COUNT(*) AS total_rural_others_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_sec."AND" .$where_others. "AND" .$where_rural);
            $total_rural_others_sec = (int) $total_rural_others_sec[0][0]['total_rural_others_sec'];





            $total_est_higher = $this -> Report -> query("SELECT COUNT(*) AS total_est_higher FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher );
            $total_est_higher = (int) $total_est_higher[0][0]['total_est_higher'];


            $total_est_higher_sec = $this -> Report -> query("SELECT COUNT(*) AS total_est_higher_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher_sec );
            $total_est_higher_sec = (int) $total_est_higher_sec[0][0]['total_est_higher_sec'];



            $total_male_higher_sec = $this -> Report -> query("SELECT COUNT(*) AS total_male_higher_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher_sec."AND" .$where_male);
            $total_male_higher_sec = (int)$total_male_higher_sec[0][0]['total_male_higher_sec'];

            $total_female_higher_sec = $this -> Report -> query("SELECT COUNT(*) AS total_female_higher_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher_sec."AND" .$where_female);      
            $total_female_higher_sec = (int)$total_female_higher_sec[0][0]['total_female_higher_sec'];

            $total_others_higher_sec = $this -> Report -> query("SELECT COUNT(*) AS total_others_higher_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher_sec."AND" .$where_others);       
            $total_others_higher_sec = (int)$total_others_higher_sec[0][0]['total_others_higher_sec'];



            $total_urban_male_higher_sec = $this -> Report -> query("SELECT COUNT(*) AS total_urban_male_higher_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher_sec."AND" .$where_male. "AND" .$where_urban);
            $total_urban_male_higher_sec = (int)$total_urban_male_higher_sec[0][0]['total_urban_male_higher_sec'];

            $total_urban_female_higher_sec = $this -> Report -> query("SELECT COUNT(*) AS total_urban_female_higher_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher_sec."AND" .$where_female. "AND" .$where_urban);
            $total_urban_female_higher_sec = (int) $total_urban_female_higher_sec[0][0]['total_urban_female_higher_sec'];

             $total_urban_others_higher_sec = $this -> Report -> query("SELECT COUNT(*) AS total_urban_others_higher_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher_sec."AND" .$where_others. "AND" .$where_urban);
            $total_urban_others_higher_sec = (int) $total_urban_others_higher_sec[0][0]['total_urban_others_higher_sec'];



            $total_rural_male_higher_sec = $this -> Report -> query("SELECT COUNT(*) AS total_rural_male_higher_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher_sec."AND" .$where_male. "AND" .$where_rural);
            $total_rural_male_higher_sec = (int)$total_rural_male_higher_sec[0][0]['total_rural_male_higher_sec'];


            $total_rural_female_higher_sec = $this -> Report -> query("SELECT COUNT(*) AS total_rural_female_higher_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher_sec."AND" .$where_female. "AND" .$where_rural);
            $total_rural_female_higher_sec = (int) $total_rural_female_higher_sec[0][0]['total_rural_female_higher_sec'];

            $total_rural_others_higher_sec = $this -> Report -> query("SELECT COUNT(*) AS total_rural_others_higher_sec FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher_sec."AND" .$where_others. "AND" .$where_rural);
            $total_rural_others_higher_sec = (int) $total_rural_others_higher_sec[0][0]['total_rural_others_higher_sec'];


                        



            $total_male_higher = $this -> Report -> query("SELECT COUNT(*) AS total_male_higher FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher."AND" .$where_male);
            $total_male_higher = (int)$total_male_higher[0][0]['total_male_higher'];

            $total_female_higher = $this -> Report -> query("SELECT COUNT(*) AS total_female_higher FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher."AND" .$where_female);      
            $total_female_higher = (int)$total_female_higher[0][0]['total_female_higher'];

            $total_others_higher = $this -> Report -> query("SELECT COUNT(*) AS total_others_higher FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher."AND" .$where_others);       
            $total_others_higher = (int)$total_others_higher[0][0]['total_others_higher'];



            $total_urban_male_higher = $this -> Report -> query("SELECT COUNT(*) AS total_urban_male_higher FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher."AND" .$where_male. "AND" .$where_urban);
            $total_urban_male_higher = (int)$total_urban_male_higher[0][0]['total_urban_male_higher'];

            $total_urban_female_higher = $this -> Report -> query("SELECT COUNT(*) AS total_urban_female_higher FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher."AND" .$where_female. "AND" .$where_urban);
            $total_urban_female_higher = (int) $total_urban_female_higher[0][0]['total_urban_female_higher'];

             $total_urban_others_higher = $this -> Report -> query("SELECT COUNT(*) AS total_urban_others_higher FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher."AND" .$where_others. "AND" .$where_urban);
            $total_urban_others_higher = (int) $total_urban_others_higher[0][0]['total_urban_others_higher'];



            $total_rural_male_higher = $this -> Report -> query("SELECT COUNT(*) AS total_rural_male_higher FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher."AND" .$where_male. "AND" .$where_rural);
            $total_rural_male_higher = (int)$total_rural_male_higher[0][0]['total_rural_male_higher'];


            $total_rural_female_higher = $this -> Report -> query("SELECT COUNT(*) AS total_rural_female_higher FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher."AND" .$where_female. "AND" .$where_rural);
            $total_rural_female_higher = (int) $total_rural_female_higher[0][0]['total_rural_female_higher'];

            $total_rural_others_higher = $this -> Report -> query("SELECT COUNT(*) AS total_rural_others_higher FROM BBSEC2013_REPORTS WHERE " . $where. "AND".$where_education_higher."AND" .$where_others. "AND" .$where_rural);
            $total_rural_others_higher = (int) $total_rural_others_higher[0][0]['total_rural_others_higher'];


        }


        $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 
        # None -----------------
        'total_est_none', 'total_male_none', 'total_female_none', 'total_others_none','total_urban_male_none','total_urban_female_none', 'total_urban_others_none','total_rural_male_none', 'total_rural_female_none', 'total_rural_others_none',
        #Primary ---------------
        'total_est_primary', 'total_male_primary', 'total_female_primary', 'total_others_primary','total_urban_male_primary',
        'total_urban_female_primary', 'total_urban_others_primary','total_rural_male_primary', 'total_rural_female_primary', 
        'total_rural_others_primary',
        #Lower Sec-----
        'total_est_lower_sec', 'total_male_lower_sec', 'total_female_lower_sec', 'total_others_lower_sec','total_urban_male_lower_sec','total_urban_female_lower_sec', 'total_urban_others_lower_sec','total_rural_male_lower_sec', 'total_rural_female_lower_sec', 'total_rural_others_lower_sec',
        #Sec----------------
        'total_est_sec', 'total_male_sec', 'total_female_sec', 'total_others_sec','total_urban_male_sec','total_urban_female_sec', 
        'total_urban_others_sec','total_rural_male_sec', 'total_rural_female_sec', 'total_rural_others_sec',

        #Higher Sec----
        'total_est_higher_sec', 'total_male_higher_sec', 'total_female_higher_sec', 'total_others_higher_sec',
        'total_urban_male_higher_sec','total_urban_female_higher_sec', 'total_urban_others_higher_sec','total_rural_male_higher_sec', 'total_rural_female_higher_sec', 'total_rural_others_higher_sec',

        #Graduation or Higher-----
        'total_est_higher', 'total_male_higher', 'total_female_higher', 'total_others_higher','total_urban_male_higher','total_urban_female_higher', 'total_urban_others_higher','total_rural_male_higher', 'total_rural_female_higher', 'total_rural_others_higher'
        ));
    }
}