<?php

class ReportsTable3Controller extends AppController {

	
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
    public function _make_query($bsic)
    {
    	return "SELECT COUNT(questionnarie_id) AS total_est, SUM(total_person_engaged) AS total_person FROM bbsec2013_reports WHERE ".$this->_make_where_condition()." AND q6_ind_code_class_code = '".$bsic."'";
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

            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];

    		$results = $this -> Report -> query("SELECT DISTINCT q6_ind_code_class_code, class_code_desc_eng FROM bbsec2013_reports ORDER BY q6_ind_code_class_code");
         
            $i = 0;
            $data = array();
            $where = $this->_make_where_condition();
	    	foreach ($results as $key => $result) {
 
                $data[$i]['bsic_code'] = $result[0]['q6_ind_code_class_code'];
                $data[$i]['bsic_description'] = $result[0]['class_code_desc_eng'];

                $query = $this->_make_query($result[0]['q6_ind_code_class_code']);
                $res = $this -> Report -> query($query);
                $data[$i]['total_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['total_person'] =  (int) $res[0][0]['total_person'];
                //echo $query."<br>";


                $query = $this->_make_query($result[0]['q6_ind_code_class_code']) . " AND unit_size = 1 ";
                $res = $this -> Report -> query($query);
                $data[$i]['cottage_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['cottage_person'] =  (int) $res[0][0]['total_person'];
                //echo $query."<br>";
                //echo "<pre>"; print_r($data); echo "</pre>";

                $query = $this->_make_query($result[0]['q6_ind_code_class_code']) . " AND unit_size = 2 ";
                $res = $this -> Report -> query($query);
                $data[$i]['micro_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['micro_person'] =  (int) $res[0][0]['total_person'];

                $query = $this->_make_query($result[0]['q6_ind_code_class_code']) . " AND unit_size = 3 ";
                $res = $this -> Report -> query($query);
                $data[$i]['small_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['small_person'] =  (int) $res[0][0]['total_person'];

                $query = $this->_make_query($result[0]['q6_ind_code_class_code']) . " AND unit_size = 4 ";
                $res = $this -> Report -> query($query);
                $data[$i]['medium_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['medium_person'] =  (int) $res[0][0]['total_person'];

                $query = $this->_make_query($result[0]['q6_ind_code_class_code']) . " AND unit_size = 5 ";
                $res = $this -> Report -> query($query);
                $data[$i]['large_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['large_person'] =  (int) $res[0][0]['total_person'];

                $i++;

                
	    	}
    	}	
        $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union','data'));	
    }
}

?>