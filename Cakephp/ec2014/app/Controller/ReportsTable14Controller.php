<?php

class ReportsTable14Controller extends AppController {

    var $uses = false;
    public function _make_where_condition()
    {
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

    public function _make_query($code, $condition)
    {
        $this -> loadModel('Report');

        $where = $this->_make_where_condition();

        if($condition == "T")
            $query = "SELECT (CL.CLASS_CODE) AS CLASS_CODE, (CL.CLASS_CODE_DESC_ENG) AS CLASS_CODE_DESC_ENG, COUNT(R.QUESTIONNARIE_ID) AS TOTAL_EST FROM IND_CODE_CLASSES CL LEFT JOIN BBSEC2013_REPORTS R ON (R.Q6_IND_CODE_CLASS_CODE = CL.CLASS_CODE)  WHERE ".$where." AND R.Q6_IND_CODE_CLASS_CODE = '".$code."' AND R.Q16_FIXED_CAPITAL IN(1,2,3,4,5,6,7) GROUP BY CL.CLASS_CODE, CL.CLASS_CODE_DESC_ENG ";
        else
            $query = "SELECT  (CL.CLASS_CODE) AS CLASS_CODE, COUNT(R.QUESTIONNARIE_ID) AS TOTAL_EST FROM IND_CODE_CLASSES CL 
        LEFT JOIN BBSEC2013_REPORTS R ON (R.Q6_IND_CODE_CLASS_CODE = CL.CLASS_CODE)  WHERE ".$where." AND R.Q6_IND_CODE_CLASS_CODE = '".$code."' AND ".$condition." GROUP BY CL.CLASS_CODE ";

        $result = $this -> Report -> query($query);
        return $result[0];
    }
    
    public function show()
    {
        ini_set("memory_limit","1024M");
        ini_set('max_execution_time', 30000);

        $this -> loadModel('Report');
        $divn = "";
        $zila = "";
        $upazila = "";
        $psa = "";
        $union = "";

        if ($this -> request -> is('post')) {

            $div_id = $this -> request -> data['geo_code_divn'];
            $zila_id = $this -> request -> data['geo_code_zila'];

            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];

            $data = array();
            $j = 0;
            for($i=1000; $i <= 3400; $i++)
            {
                $res = $this->_make_query($i, "T");
                $data[$j]['CLASS_CODE'] = $res[0]['CLASS_CODE'];
                $data[$j]['CLASS_CODE_DESC_ENG'] = $res[0]['CLASS_CODE_DESC_ENG'];
                $data[$j]['TOTAL_EST'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q16_FIXED_CAPITAL = 1 ");
                $data[$j]['UP_TO_5'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q16_FIXED_CAPITAL = 2 ");
                $data[$j]['BET_5_50'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q16_FIXED_CAPITAL = 3 ");
                $data[$j]['BET_50_100'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q16_FIXED_CAPITAL = 4 ");
                $data[$j]['BET_100_1000'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q16_FIXED_CAPITAL = 5 ");
                $data[$j]['BET_1000_1500'] = $res[0]['TOTAL_EST'];

                 $res = $this->_make_query($i, " R.Q16_FIXED_CAPITAL = 6 ");
                $data[$j]['BET_1500_3000'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q16_FIXED_CAPITAL = 7 ");
                $data[$j]['ABOVE_3000'] = $res[0]['TOTAL_EST'];

                $j++;
            }
        } 
        
        $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union','data'));    
    }
}

?>





<?php

/*


SELECT (CL.CLASS_CODE) AS CLASS_CODE, COUNT(R.QUESTIONNARIE_ID) AS TOTAL_EST 
FROM IND_CODE_CLASSES CL
LEFT JOIN BBSEC2013_REPORTS R ON (R.Q6_IND_CODE_CLASS_CODE  = CL.CLASS_CODE) 
LEFT JOIN IND_CODE_GROUPS G  ON (CL.IND_CODE_GROUP_ID = G.ID)
LEFT JOIN  IND_CODE_DIVNS D ON (G.IND_CODE_DIVN_ID = D.ID)
WHERE 1=1 AND geo_code_divn_id = '3' AND geo_code_zila_id = '20' AND geo_code_upazila_id = '213' 
AND SUBSTR(R.Q6_IND_CODE_CLASS_CODE,1,2) = '10' AND R.Q22_IS_FIRE_SECURED = 1 
GROUP BY CL.CLASS_CODE
ORDER BY CL.CLASS_CODE


*/


/*



SELECT (CL.CLASS_CODE) AS CLASS_CODE, (CL.CLASS_CODE_DESC_BNG) AS CLASS_CODE_DESC_BNG, 
COUNT(R.QUESTIONNARIE_ID) AS TOTAL_EST, SUM(R.TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON 
FROM IND_CODE_CLASSES CL
LEFT JOIN BBSEC2013_REPORTS R ON (R.Q6_IND_CODE_CLASS_CODE  = CL.CLASS_CODE) 
LEFT JOIN IND_CODE_GROUPS G  ON (CL.IND_CODE_GROUP_ID = G.ID)
LEFT JOIN  IND_CODE_DIVNS D ON (G.IND_CODE_DIVN_ID = D.ID) WHERE 1=1
AND geo_code_divn_id = '3' AND geo_code_zila_id = '20' AND geo_code_upazila_id = '213' AND SUBSTR(R.Q6_IND_CODE_CLASS_CODE,1,2) = '10' 
GROUP BY CL.CLASS_CODE, CL.CLASS_CODE_DESC_BNG;


*/


/*

SELECT (CL.CLASS_CODE) AS CLASS_CODE, (CL.CLASS_CODE_DESC_BNG) AS CLASS_CODE_DESC_BNG, 
COUNT(R.QUESTIONNARIE_ID) AS TOTAL_EST, SUM(R.TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON 
FROM IND_CODE_CLASSES CL
LEFT JOIN BBSEC2013_REPORTS R ON (R.Q6_IND_CODE_CLASS_CODE  = CL.CLASS_CODE) 
LEFT JOIN IND_CODE_GROUPS G  ON (CL.IND_CODE_GROUP_ID = G.ID)
LEFT JOIN  IND_CODE_DIVNS D ON (G.IND_CODE_DIVN_ID = D.ID) WHERE 1=1
AND geo_code_divn_id = '3' AND geo_code_zila_id = '20' AND geo_code_upazila_id = '213' AND SUBSTR(R.Q6_IND_CODE_CLASS_CODE,1,2) BETWEEN 10 AND 35
GROUP BY CL.CLASS_CODE, CL.CLASS_CODE_DESC_BNG;

*/



?>