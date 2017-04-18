<?php

class ReportsTable15Controller extends AppController {

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
            $query = "SELECT (D.DIVN_CODE) AS DIVN_CODE, (D.DIVN_CODE_DESC_ENG) AS DIVN_CODE_DESC_ENG, COUNT(R.QUESTIONNARIE_ID) AS TOTAL_EST, SUM(R.TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON FROM IND_CODE_DIVNS D LEFT JOIN BBSEC2013_REPORTS R ON (SUBSTR(R.Q6_IND_CODE_CLASS_CODE,1,2) = D.DIVN_CODE) WHERE ".$where." AND SUBSTR(R.Q6_IND_CODE_CLASS_CODE,1,2) = '".$code."' GROUP BY D.DIVN_CODE, D.DIVN_CODE_DESC_ENG ";
        else
            $query = "SELECT (D.DIVN_CODE) AS DIVN_CODE, COUNT(R.QUESTIONNARIE_ID) AS TOTAL_EST FROM IND_CODE_DIVNS D LEFT JOIN BBSEC2013_REPORTS R ON (SUBSTR(R.Q6_IND_CODE_CLASS_CODE,1,2) = D.DIVN_CODE) WHERE ".$where." AND SUBSTR(R.Q6_IND_CODE_CLASS_CODE,1,2) = '".$code."' AND ".$condition." GROUP BY D.DIVN_CODE ";
        //echo $query."<br><br>";
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
            for($i=10; $i <= 33; $i++)
            {
                $res = $this->_make_query($i, "T");
                $data[$j]['DIVN_CODE'] = $res[0]['DIVN_CODE'];
                $data[$j]['DIVN_CODE_DESC_ENG'] = $res[0]['DIVN_CODE_DESC_ENG'];
                $data[$j]['TOTAL_EST'] = $res[0]['TOTAL_EST'];
                $data[$j]['TOTAL_PERSON'] = $res[0]['TOTAL_PERSON'];

                // Q18_MACHINE_USES : MACHINE
                $res = $this->_make_query($i, " R.Q18_MACHINE_USES = 1 ");
                $data[$j]['MAC_POWER_OPERATING'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q18_MACHINE_USES = 2 ");
                $data[$j]['MAC_FUEL_OPERATING'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q18_MACHINE_USES = 3 ");
                $data[$j]['MAC_BOTH'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q18_MACHINE_USES = 4 ");
                $data[$j]['MAC_HANE_OPERATING'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q18_MACHINE_USES = 5 ");
                $data[$j]['MAC_NOT_APPLICABLE'] = $res[0]['TOTAL_EST'];


                //Q19_MARKETING: MARKETING 
                $res = $this->_make_query($i, " R.Q19_MARKETING = 1 ");
                $data[$j]['MAR_TOTALLY_LOCAL'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q19_MARKETING = 2 ");
                $data[$j]['MAR_TOTALLY_EXPORT'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q19_MARKETING = 3 ");
                $data[$j]['MAR_BOTH'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q19_MARKETING = 4 ");
                $data[$j]['MAR_NOT_APPLICABLE'] = $res[0]['TOTAL_EST'];


                // Q20_FUEL_USES:FUEL
                $res = $this->_make_query($i, " R.Q20_FUEL_USES = 1 ");
                $data[$j]['ENERGY_ELICTRICITY'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q20_FUEL_USES = 2 ");
                $data[$j]['ENERGY_SOLAR'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q20_FUEL_USES = 3 ");
                $data[$j]['ENERGY_GAS'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q20_FUEL_USES = 4 ");
                $data[$j]['ENERGY_PETROLEUM'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q20_FUEL_USES = 5 ");
                $data[$j]['ENERGY_COAL'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q20_FUEL_USES = 6 ");
                $data[$j]['ENERGY_WOOD'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q20_FUEL_USES = 7 ");
                $data[$j]['ENERGY_OTHERS'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query($i, " R.Q20_FUEL_USES = 8 ");
                $data[$j]['ENERGY_NOT_APPLICABLE'] = $res[0]['TOTAL_EST'];

                $j++;
            }
        } 
        
        $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union','data'));    
    }
}

?>
