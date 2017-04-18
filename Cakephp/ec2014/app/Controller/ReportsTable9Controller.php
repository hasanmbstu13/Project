<?php

class ReportsTable9Controller extends AppController {

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

            #debug($result);

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
            

    $sql = "SELECT REPORT.GEO_CODE_UPAZILA_ID,REPORT.UPZILA_CODE,REPORT.UPZILA_NAME, 

    (SELECT COUNT(REPORT_0.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_0 WHERE REPORT_0.Q10_IS_NBR_INVESTMENT = '1' 
        AND (REPORT_0.Q10_NBR_AMOUNT_IN_THOU <= 500  
            OR REPORT_0.Q10_NBR_AMOUNT_IN_THOU BETWEEN 501 AND 300000
            OR REPORT_0.Q10_NBR_AMOUNT_IN_THOU >= 300001 
         ) AND REPORT_0.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) TOTAL_EST,
         

    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q10_IS_NBR_INVESTMENT = '1' 
        AND REPORT_1.Q10_NBR_AMOUNT_IN_THOU <= 500 AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) INVEST_5, 

    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q10_IS_NBR_INVESTMENT = '1' 
        AND REPORT_1.Q10_NBR_AMOUNT_IN_THOU BETWEEN 501 AND 5000 AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) INVEST_5_50 , 

    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q10_IS_NBR_INVESTMENT = '1' 
        AND REPORT_1.Q10_NBR_AMOUNT_IN_THOU BETWEEN 5001 AND 10000 AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) INVEST_50_100, 

    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q10_IS_NBR_INVESTMENT = '1' 
        AND REPORT_1.Q10_NBR_AMOUNT_IN_THOU BETWEEN 10001 AND 100000 AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) INVEST_100_1000,

    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q10_IS_NBR_INVESTMENT = '1' 
        AND REPORT_1.Q10_NBR_AMOUNT_IN_THOU BETWEEN 100001 AND 150000 AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) INVEST_1000_1500, 

    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q10_IS_NBR_INVESTMENT = '1' 
        AND REPORT_1.Q10_NBR_AMOUNT_IN_THOU BETWEEN 150001 AND 300000 AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) INVEST_1500_3000,
    
    (SELECT COUNT(REPORT_1.QUESTIONNARIE_ID) FROM BBSEC2013_REPORTS REPORT_1 WHERE REPORT_1.Q10_IS_NBR_INVESTMENT = '1' 
        AND REPORT_1.Q10_NBR_AMOUNT_IN_THOU >= 300001 AND REPORT_1.GEO_CODE_UPAZILA_ID = REPORT.GEO_CODE_UPAZILA_ID) INVEST_3000_ABOVE

    FROM BBSEC2013_REPORTS REPORT WHERE" .$where.
    "GROUP BY REPORT.GEO_CODE_UPAZILA_ID,REPORT.UPZILA_CODE,REPORT.UPZILA_NAME
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
