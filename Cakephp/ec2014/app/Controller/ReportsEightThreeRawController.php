<?php

Class ReportsEightThreeRawController extends AppController {

	var $uses = false;
	

    public function tpe_tbl_eight_three_raw() {
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
            
            $result_B = $this->_prepate_result_eight_three_raw("Mining and quarrying", $where, "BETWEEN 5 AND 9");
            $result_C = $this->_prepate_result_eight_three_raw("Manufacturing", $where, "BETWEEN 10 AND 33");
            $result_D = $this->_prepate_result_eight_three_raw("Electricity ,gas,steam and air conditioning supply", $where, "= 35");
            $result_E = $this->_prepate_result_eight_three_raw("Water supply,sewerage,waste management and remediation activities", $where, "BETWEEN 36 AND 39");
            $result_F = $this->_prepate_result_eight_three_raw("Construction", $where, "BETWEEN 41 AND 43");
            $result_G = $this->_prepate_result_eight_three_raw("Wholesale and retail trade,repair of motor vehicles and motorcycles", $where, "BETWEEN 45 AND 47");
            $result_H = $this->_prepate_result_eight_three_raw("Transportation and storage", $where, "BETWEEN 49 AND 53");
            $result_I = $this->_prepate_result_eight_three_raw("Accommodation and food service activities (Hotel and restaurents)", $where, "BETWEEN 55 AND 56");
            $result_J = $this->_prepate_result_eight_three_raw("Information and communication", $where, "BETWEEN 58 AND 63");
            $result_K = $this->_prepate_result_eight_three_raw("Financial and insurance activities", $where, "BETWEEN 64 AND 66");
            $result_L = $this->_prepate_result_eight_three_raw("Real state activities", $where, "= 68");
            $result_M = $this->_prepate_result_eight_three_raw("Professional, scientific and technical activities", $where, "BETWEEN 69 AND 75");
            $result_N = $this->_prepate_result_eight_three_raw("Administrative and support service activities", $where, "BETWEEN 77 AND 82");
            $result_O = $this->_prepate_result_eight_three_raw("Public administration and defence,compulsory social security", $where, "= 84");
            $result_P = $this->_prepate_result_eight_three_raw("Education", $where, " = 85");
            $result_Q = $this->_prepate_result_eight_three_raw("Human health and social work activities", $where, "BETWEEN 86 AND 88");
            $result_R = $this->_prepate_result_eight_three_raw("Art, entertainment and recreation", $where, "BETWEEN 90 AND 93");
            $result_S = $this->_prepate_result_eight_three_raw("Other service activities", $where, "BETWEEN 94 AND 96");
            $result_T = $this->_prepate_result_eight_three_raw("Activities of households as employers, undifferentiated goods and services producing activities of households for own use", $where, "BETWEEN 97 AND 98");
            $result_U = $this->_prepate_result_eight_three_raw("Activities of extraterritorial organizations and bodies", $where, "= 99");

  
            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 
                'result_B', 'result_C','result_D',
                'result_E','result_F','result_G',
                'result_H','result_I','result_J',
                'result_K','result_L','result_M',
                'result_N','result_O','result_P',
                'result_Q','result_R','result_S',
                'result_T','result_U'));  
            
        }
    }


    public function _prepate_result_eight_three_raw($activity, $where, $between) {
        $db = get_class_vars('DATABASE_CONFIG');
        $conn = oci_connect($db['default']['login'], $db['default']['password'], $db['default']['database']);

        if (!$conn) {
                $m = oci_error();
                echo 'Failed to connect with server. ' . $m['message']; die(); } else {

$sql = "SELECT '".$activity."' AS BSIC_DESCRIPTION,

(SELECT SUM(R_ZERO.TOTAL_PERSON_ENGAGED) AS TOTAL_EST FROM BBSEC2013_REPORTS R_ZERO WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_ZERO.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  AND R_ZERO.UNIT_SIZE IN (1,2,3,4,5)) AS TOTAL_TPE, 

(SELECT SUM(R_ONE.TOTAL_PERSON_ENGAGED) AS COTTAGE_TPE FROM BBSEC2013_REPORTS R_ONE WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_ONE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  AND R_ONE.UNIT_SIZE = 1) AS COTTAGE_TPE, 
    
    (SELECT SUM(R_ONE.TOTAL_MALE_ENGAGED) AS COTTAGE_MALE FROM BBSEC2013_REPORTS R_ONE WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_ONE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  AND R_ONE.UNIT_SIZE = 1) AS COTTAGE_MALE, 
    (SELECT SUM(R_ONE.TOTAL_FEMALE_ENGAGED) AS COTTAGE_FEMALE FROM BBSEC2013_REPORTS R_ONE WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_ONE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  AND R_ONE.UNIT_SIZE = 1) AS COTTAGE_FEMALE, 


(SELECT SUM(R_TWO.TOTAL_PERSON_ENGAGED) AS MICRO_TPE FROM BBSEC2013_REPORTS R_TWO WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_TWO.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  AND R_TWO.UNIT_SIZE = 2 ) AS MICRO_TPE,

    (SELECT SUM(R_TWO.TOTAL_MALE_ENGAGED) AS MICRO_MALE FROM BBSEC2013_REPORTS R_TWO WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_TWO.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  AND R_TWO.UNIT_SIZE = 2) AS MICRO_MALE, 
    (SELECT SUM(R_TWO.TOTAL_FEMALE_ENGAGED) AS MICRO_FEMALE FROM BBSEC2013_REPORTS R_TWO WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_TWO.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  AND R_TWO.UNIT_SIZE = 2) AS MICRO_FEMALE, 


(SELECT SUM(R_THREE.TOTAL_PERSON_ENGAGED) AS SMALL_TPE FROM BBSEC2013_REPORTS R_THREE WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_THREE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  AND R_THREE.UNIT_SIZE = 3) AS SMALL_TPE,

    (SELECT SUM(R_THREE.TOTAL_MALE_ENGAGED) AS SMALL_MALE FROM BBSEC2013_REPORTS R_THREE WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_THREE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  AND R_THREE.UNIT_SIZE = 3) AS SMALL_MALE, 
    (SELECT SUM(R_THREE.TOTAL_FEMALE_ENGAGED) AS SMALL_FEMALE FROM BBSEC2013_REPORTS R_THREE WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_THREE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  AND R_THREE.UNIT_SIZE = 3) AS SMALL_FEMALE, 


(SELECT SUM(R_FOUR.TOTAL_PERSON_ENGAGED) AS MEDIUM_TPE FROM BBSEC2013_REPORTS R_FOUR WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_FOUR.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  AND R_FOUR.UNIT_SIZE = 4) AS MEDIUM_TPE,

    (SELECT SUM(R_FOUR.TOTAL_MALE_ENGAGED) AS MEDIUM_MALE FROM BBSEC2013_REPORTS R_FOUR WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_FOUR.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  AND R_FOUR.UNIT_SIZE = 4) AS MEDIUM_MALE, 
    (SELECT SUM(R_FOUR.TOTAL_FEMALE_ENGAGED) AS MEDIUM_FEMALE FROM BBSEC2013_REPORTS R_FOUR WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_FOUR.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  AND R_FOUR.UNIT_SIZE = 4) AS MEDIUM_FEMALE, 


(SELECT SUM(R_FIVE.TOTAL_PERSON_ENGAGED) AS LARGE_TPE FROM BBSEC2013_REPORTS R_FIVE WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_FIVE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  AND R_FIVE.UNIT_SIZE = 5) AS LARGE_TPE, 

    (SELECT SUM(R_FIVE.TOTAL_MALE_ENGAGED) AS LARGE_MALE FROM BBSEC2013_REPORTS R_FIVE WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_FIVE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  AND R_FIVE.UNIT_SIZE = 5) AS LARGE_MALE, 
    (SELECT SUM(R_FIVE.TOTAL_FEMALE_ENGAGED) AS LARGE_FEMALE FROM BBSEC2013_REPORTS R_FIVE WHERE ".$where." AND F_TO_NUMBER(SUBSTR(R_FIVE.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  AND R_FIVE.UNIT_SIZE = 5) AS LARGE_FEMALE

FROM BBSEC2013_REPORTS REPORT WHERE ".$where." AND F_TO_NUMBER(SUBSTR(REPORT.Q6_IND_CODE_CLASS_CODE,1,2)) ".$between."  GROUP BY '".$activity."' ";

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

