<?php

class ReportsTable4Controller extends AppController {

	
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
    	return "SELECT COUNT(questionnarie_id) AS total_est, SUM(total_person_engaged) AS total_person FROM bbsec2013_reports WHERE ".$this->_make_where_condition()." AND q6_ind_code_class_code = '".$bsic."' AND Q4_UNIT_TYPE = '2' AND Q4_UNIT_ORG_TYPE = '1' ";
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


                $query = $this->_make_query($result[0]['q6_ind_code_class_code']) . " AND Q9_LEGAL_ENTITY_TYPE_ID = '01' ";
                $res = $this -> Report -> query($query);
                $data[$i]['private_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['private_person'] =  (int) $res[0][0]['total_person'];

                $query = $this->_make_query($result[0]['q6_ind_code_class_code']) . " AND Q9_LEGAL_ENTITY_TYPE_ID = '02' ";
                $res = $this -> Report -> query($query);
                $data[$i]['partner_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['partner_person'] =  (int) $res[0][0]['total_person'];

                $query = $this->_make_query($result[0]['q6_ind_code_class_code']) . " AND Q9_LEGAL_ENTITY_TYPE_ID = '03' ";
                $res = $this -> Report -> query($query);
                $data[$i]['privateltd_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['privateltd_person'] =  (int) $res[0][0]['total_person'];

                $query = $this->_make_query($result[0]['q6_ind_code_class_code']) . " AND Q9_LEGAL_ENTITY_TYPE_ID = '04' ";
                $res = $this -> Report -> query($query);
                $data[$i]['public_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['public_person'] =  (int) $res[0][0]['total_person'];

                $query = $this->_make_query($result[0]['q6_ind_code_class_code']) . " AND Q9_LEGAL_ENTITY_TYPE_ID = '05' ";
                $res = $this -> Report -> query($query);
                $data[$i]['govt_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['govt_person'] =  (int) $res[0][0]['total_person'];

                $query = $this->_make_query($result[0]['q6_ind_code_class_code']) . " AND Q9_LEGAL_ENTITY_TYPE_ID = '06' ";
                $res = $this -> Report -> query($query);
                $data[$i]['autonomous_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['autonomous_person'] =  (int) $res[0][0]['total_person'];

                $query = $this->_make_query($result[0]['q6_ind_code_class_code']) . " AND Q9_LEGAL_ENTITY_TYPE_ID = '07' ";
                $res = $this -> Report -> query($query);
                $data[$i]['foreign_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['foreign_person'] =  (int) $res[0][0]['total_person'];

                $query = $this->_make_query($result[0]['q6_ind_code_class_code']) . " AND Q9_LEGAL_ENTITY_TYPE_ID = '08' ";
                $res = $this -> Report -> query($query);
                $data[$i]['joint_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['joint_person'] =  (int) $res[0][0]['total_person'];

                $query = $this->_make_query($result[0]['q6_ind_code_class_code']) . " AND Q9_LEGAL_ENTITY_TYPE_ID = '09' ";
                $res = $this -> Report -> query($query);
                $data[$i]['cooperative_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['cooperative_person'] =  (int) $res[0][0]['total_person'];

                $query = $this->_make_query($result[0]['q6_ind_code_class_code']) . " AND Q9_LEGAL_ENTITY_TYPE_ID = '10' ";
                $res = $this -> Report -> query($query);
                $data[$i]['npi_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['npi_person'] =  (int) $res[0][0]['total_person'];

                $query = $this->_make_query($result[0]['q6_ind_code_class_code']) . " AND Q9_LEGAL_ENTITY_TYPE_ID = '11' ";
                $res = $this -> Report -> query($query);
                $data[$i]['nrb_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['nrb_person'] =  (int) $res[0][0]['total_person'];

                $query = $this->_make_query($result[0]['q6_ind_code_class_code']) . " AND Q9_LEGAL_ENTITY_TYPE_ID = '12' ";
                $res = $this -> Report -> query($query);
                $data[$i]['others_est'] =  (int) $res[0][0]['total_est'];
                $data[$i]['others_person'] =  (int) $res[0][0]['total_person'];

                $i++;
                
	    	}
    	}

        $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union','data'));	
    }
}

?>