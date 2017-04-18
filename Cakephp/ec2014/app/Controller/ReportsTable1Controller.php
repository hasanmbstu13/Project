<?php

class ReportsTable1Controller extends AppController {

	
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
    	return " COUNT(questionnarie_id) AS number_of_unit, SUM(total_person_engaged) AS total_person_engaged, SUM(total_male_engaged) AS total_male_engaged, SUM(total_female_engaged) AS total_female_engaged";
    }
    public function _select_working_proprietor()
    {
    	return " SUM(q17_hr_male) AS male_wp, SUM(q17_hr_female) AS female_wp";
    }
    public function _select_unpaid_family()
    {
    	return " SUM(q17_hr_male_foc) AS male_foc, SUM(q17_hr_female_foc) AS female_foc";
    }
    public function _select_full_time()
    {
    	return " SUM(q17_hr_male_fulltime) AS male_full_time, SUM(q17_hr_female_fulltime) AS female_full_time";
    }
    public function _select_part_time()
    {
    	return " SUM(q17_hr_male_parttime) AS male_part_time, SUM(q17_hr_female_parttime) AS female_part_time";
    }

    public function _select_irregular()
    {
    	return " SUM(q17_hr_male_irregular) AS male_irregular, SUM(q17_hr_female_irregular) AS female_irregular";
    }


    public function show()
    {
    	$this -> loadModel('Report');

        $divn = "";
        $zila = "";
        $upazila = "";
        $psa = "";
        $union = "";

    	if ($this -> request -> is('post')) {


        ini_set("memory_limit","1024M");
        ini_set('max_execution_time', 30000);
        
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
                $data[$i]['total_male_engaged'] =   (int)  $res[0][0]['total_male_engaged'];
                $data[$i]['total_female_engaged'] =   (int)  $res[0][0]['total_female_engaged'];


                $query = "select ".$this->_select_working_proprietor()." FROM bbsec2013_reports WHERE ".$where." AND q6_ind_code_class_code = '".$result[0]['q6_ind_code_class_code']."'";
                $res = $this -> Report -> query($query);

                $data[$i]['male_wp'] =   (int)  $res[0][0]['male_wp'];
                $data[$i]['female_wp'] =   (int)  $res[0][0]['female_wp'];


                $query = "select ".$this->_select_unpaid_family()." FROM bbsec2013_reports WHERE ".$where." AND q6_ind_code_class_code = '".$result[0]['q6_ind_code_class_code']."'";
                $res = $this -> Report -> query($query);

                $data[$i]['male_foc'] =   (int)  $res[0][0]['male_foc'];
                $data[$i]['female_foc'] =   (int)  $res[0][0]['female_foc'];

                $query = "select ".$this->_select_full_time()." FROM bbsec2013_reports WHERE ".$where." AND q6_ind_code_class_code = '".$result[0]['q6_ind_code_class_code']."'";
                $res = $this -> Report -> query($query);

                $data[$i]['male_full_time'] =   (int)  $res[0][0]['male_full_time'];
                $data[$i]['female_full_time'] =   (int)  $res[0][0]['female_full_time'];


                $query = "select ".$this->_select_part_time()." FROM bbsec2013_reports WHERE ".$where." AND q6_ind_code_class_code = '".$result[0]['q6_ind_code_class_code']."'";
                $res = $this -> Report -> query($query);

                $data[$i]['male_part_time'] =   (int)  $res[0][0]['male_part_time'];
                $data[$i]['female_part_time'] =   (int)  $res[0][0]['female_part_time'];


                $query = "select ".$this->_select_irregular()." FROM bbsec2013_reports WHERE ".$where." AND q6_ind_code_class_code = '".$result[0]['q6_ind_code_class_code']."'";
                $res = $this -> Report -> query($query);

                $data[$i]['male_irregular'] =   (int)  $res[0][0]['male_irregular'];
                $data[$i]['female_irregular'] =   (int)  $res[0][0]['female_irregular'];

                $i++;

                $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union','data')); 
	    	}
    	}		
    }
}

?>