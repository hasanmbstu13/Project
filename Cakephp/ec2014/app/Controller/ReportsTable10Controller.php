<?php

class ReportsTable10Controller extends AppController {

    var $uses = false;
    
    public function show() {

        $this -> set('title_for_layout', 'Table- 10: Number of establishments by registration status, location and upazila in 2013.');

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
            

    $sql = "SELECT REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME, COUNT(REPORT.QUESTIONNARIE_ID) AS TOTAL_EST,

    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q11_IS_REGISTERED = '1' 
        AND REPORT_1.Q11_REGISTRAR_ID = '02' AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) INVESTMENT_BOARD, 

    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q11_IS_REGISTERED = '1' 
        AND REPORT_1.Q11_REGISTRAR_ID = '03' AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) BSCIC , 

    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q11_IS_REGISTERED = '1' 
        AND REPORT_1.Q11_REGISTRAR_ID = '04' AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) BEPZA, 

    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q11_IS_REGISTERED = '1' 
        AND REPORT_1.Q11_REGISTRAR_ID = '05' AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) INS_FACTORIES,

    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q11_IS_REGISTERED = '1' 
        AND REPORT_1.Q11_REGISTRAR_ID IN ('07','08','09') AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) CITY_MIN_UP, 

    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q11_IS_REGISTERED = '1' 
        AND REPORT_1.Q11_REGISTRAR_ID = '01' AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) JOINT_STOCK,
    
    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q11_IS_REGISTERED = '1' 
        AND REPORT_1.Q11_REGISTRAR_ID = '06' AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) COOPERATIVE, 

    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q11_IS_REGISTERED = '1' 
        AND REPORT_1.Q11_REGISTRAR_ID = '10' AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) NGO, 

    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q11_IS_REGISTERED = '1' 
        AND REPORT_1.Q11_REGISTRAR_ID = '11' AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) OTHERS, 

    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q11_IS_REGISTERED = '2' 
        AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) NOT_REGISTERED, 

    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q11_IS_REGISTERED = '3' 
        AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) NOT_APPLICABLE
        FROM BBSEC2013_REPORTS REPORT WHERE" .$where.
        "GROUP BY REPORT.GEO_CODE_UPAZILA_ID, REPORT.UPZILA_NAME
        ORDER BY REPORT.UPZILA_NAME";

                        
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
