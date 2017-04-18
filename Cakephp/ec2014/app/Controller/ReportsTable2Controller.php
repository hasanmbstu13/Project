<?php

class ReportsTable2Controller extends AppController {

	
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

    public function _select_unit_total_person()
    {
    	return " COUNT(questionnarie_id) AS number_of_unit, SUM(total_person_engaged) AS total_person_engaged";
    }


    public function _select_unit_and_person()
    {
        return " COUNT(questionnarie_id) AS total_unit, SUM(total_person_engaged) AS total_person";
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

                $query = "select ".$this->_select_unit_total_person()." FROM bbsec2013_reports WHERE ".$where." AND q6_ind_code_class_code = '".$result[0]['q6_ind_code_class_code']."'";
                $res = $this -> Report -> query($query);

                $data[$i]['number_of_unit'] =  (int) $res[0][0]['number_of_unit'];
                $data[$i]['total_person_engaged'] =   (int)  $res[0][0]['total_person_engaged'];


                $query = "select ".$this->_select_unit_and_person()." FROM bbsec2013_reports WHERE ".$where." AND q6_ind_code_class_code = '".$result[0]['q6_ind_code_class_code']."' AND total_person_engaged = 1 ";
                $res = $this -> Report -> query($query);

                $data[$i]['total_unit_1'] =   (int)  $res[0][0]['total_unit'];
                $data[$i]['total_person_1'] =   (int)  $res[0][0]['total_person'];

                $query = "select ".$this->_select_unit_and_person()." FROM bbsec2013_reports WHERE ".$where." AND q6_ind_code_class_code = '".$result[0]['q6_ind_code_class_code']."' AND total_person_engaged = 2 ";
                $res = $this -> Report -> query($query);

                $data[$i]['total_unit_2'] =   (int)  $res[0][0]['total_unit'];
                $data[$i]['total_person_2'] =   (int)  $res[0][0]['total_person'];


                $query = "select ".$this->_select_unit_and_person()." FROM bbsec2013_reports WHERE ".$where." AND q6_ind_code_class_code = '".$result[0]['q6_ind_code_class_code']."' AND total_person_engaged = 3 ";
                $res = $this -> Report -> query($query);

                $data[$i]['total_unit_3'] =   (int)  $res[0][0]['total_unit'];
                $data[$i]['total_person_3'] =   (int)  $res[0][0]['total_person'];


                $query = "select ".$this->_select_unit_and_person()." FROM bbsec2013_reports WHERE ".$where." AND q6_ind_code_class_code = '".$result[0]['q6_ind_code_class_code']."' AND total_person_engaged = 4 ";
                $res = $this -> Report -> query($query);

                $data[$i]['total_unit_4'] =   (int)  $res[0][0]['total_unit'];
                $data[$i]['total_person_4'] =   (int)  $res[0][0]['total_person'];


                $query = "select ".$this->_select_unit_and_person()." FROM bbsec2013_reports WHERE ".$where." AND q6_ind_code_class_code = '".$result[0]['q6_ind_code_class_code']."' AND total_person_engaged BETWEEN 5 AND 9 ";
                $res = $this -> Report -> query($query);

                $data[$i]['total_unit_5_9'] =   (int)  $res[0][0]['total_unit'];
                $data[$i]['total_person_5_9'] =   (int)  $res[0][0]['total_person'];


                $query = "select ".$this->_select_unit_and_person()." FROM bbsec2013_reports WHERE ".$where." AND q6_ind_code_class_code = '".$result[0]['q6_ind_code_class_code']."' AND total_person_engaged BETWEEN 10 AND 19 ";
                $res = $this -> Report -> query($query);

                $data[$i]['total_unit_10_19'] =   (int)  $res[0][0]['total_unit'];
                $data[$i]['total_person_10_19'] =   (int)  $res[0][0]['total_person'];


                $query = "select ".$this->_select_unit_and_person()." FROM bbsec2013_reports WHERE ".$where." AND q6_ind_code_class_code = '".$result[0]['q6_ind_code_class_code']."' AND total_person_engaged BETWEEN 20 AND 49 ";
                $res = $this -> Report -> query($query);

                $data[$i]['total_unit_20_49'] =   (int)  $res[0][0]['total_unit'];
                $data[$i]['total_person_20_49'] =   (int)  $res[0][0]['total_person'];


                $query = "select ".$this->_select_unit_and_person()." FROM bbsec2013_reports WHERE ".$where." AND q6_ind_code_class_code = '".$result[0]['q6_ind_code_class_code']."' AND total_person_engaged BETWEEN 50 AND 99 ";
                $res = $this -> Report -> query($query);

                $data[$i]['total_unit_50_99'] =   (int)  $res[0][0]['total_unit'];
                $data[$i]['total_person_50_99'] =   (int)  $res[0][0]['total_person'];


                $query = "select ".$this->_select_unit_and_person()." FROM bbsec2013_reports WHERE ".$where." AND q6_ind_code_class_code = '".$result[0]['q6_ind_code_class_code']."' AND total_person_engaged BETWEEN 100 AND 199 ";
                $res = $this -> Report -> query($query);

                $data[$i]['total_unit_100_199'] =   (int)  $res[0][0]['total_unit'];
                $data[$i]['total_person_100_199'] =   (int)  $res[0][0]['total_person'];


                $query = "select ".$this->_select_unit_and_person()." FROM bbsec2013_reports WHERE ".$where." AND q6_ind_code_class_code = '".$result[0]['q6_ind_code_class_code']."' AND total_person_engaged > 199 ";
                $res = $this -> Report -> query($query);

                $data[$i]['total_unit_200'] =   (int)  $res[0][0]['total_unit'];
                $data[$i]['total_person_200'] =   (int)  $res[0][0]['total_person'];

                $i++;

                $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union','data')); 
	    	}
    	}		
    }
}

?>