<?php

class ReportsTable6Controller extends AppController {

    
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


    public function _make_query_all($upazila_id)
    {
        $this -> loadModel('Report');
        $query = "SELECT COUNT(questionnarie_id) AS total_est, SUM(total_person_engaged) AS total_person, SUM (total_male_engaged) AS total_male, SUM (total_female_engaged) AS total_female FROM bbsec2013_reports WHERE ".$this->_make_where_condition()." AND geo_code_upazila_id = ".$upazila_id ;
        $result = $this -> Report -> query($query);
        return $result[0];
    }

     public function _make_query_parmanent($upazila_id)
    {
        $this -> loadModel('Report');
        $query = "SELECT COUNT(questionnarie_id) AS total_est, SUM(total_person_engaged) AS total_person, SUM (total_male_engaged) AS total_parmament_male_engage, SUM (total_female_engaged) AS total_parmament_female_engage FROM bbsec2013_reports WHERE q4_unit_type = '2' AND q4_unit_org_type = '1' AND ".$this->_make_where_condition()." AND geo_code_upazila_id = ".$upazila_id ;
        $result = $this -> Report -> query($query);
        return $result[0];
    }

     public function _make_query_temporary($upazila_id)
    {
        $this -> loadModel('Report');
        $query = "SELECT COUNT(questionnarie_id) AS total_est, SUM(total_person_engaged) AS total_person, SUM (total_male_engaged) AS total_temporary_male_engage, SUM (total_female_engaged) AS total_temporary_female_engage FROM bbsec2013_reports WHERE q4_unit_type = '2' AND q4_unit_org_type = '2' AND ".$this->_make_where_condition()." AND geo_code_upazila_id = ".$upazila_id ;
        $result = $this -> Report -> query($query);
        return $result[0];
    }


    public function _make_query_echonomic_household($upazila_id)
    {
        $this -> loadModel('Report');
        $query = "SELECT COUNT(questionnarie_id) AS total_est, SUM(total_person_engaged) AS total_person, SUM (total_male_engaged) AS total_eh_male_engage, SUM (total_female_engaged) AS total_eh_female_engage FROM bbsec2013_reports WHERE q4_unit_type = '1' AND ".$this->_make_where_condition()." AND geo_code_upazila_id = ".$upazila_id ;
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

            $where = $this->_make_where_condition();

            if($divn == "" || $zila == '') $this->redirect(array('action' => 'show'));

            $query = "SELECT DISTINCT upazila_id, upzila_code, upzila_name FROM view_geo WHERE divn_id = $div_id AND zila_id = $zila_id ORDER BY upazila_id, upzila_code, upzila_name ";

            $results = $this -> Report -> query($query);

         
            $i = 0;
            $data = array();
            foreach ($results as $key => $result) {
                
                $upazila_id = $result[0]['upazila_id'];
                $data[$i]['upazila_name'] = $result[0]['upzila_name'];
               

                $res = $this->_make_query_all($upazila_id);
                $data[$i]['total_east'] = $res[0]['total_est'];
                $data[$i]['total_person_engage'] = (int) $res[0]['total_person'];
                $data[$i]['total_male_engage'] = (int) $res[0]['total_male'];
                $data[$i]['total_female_engage'] = (int) $res[0]['total_female'];


                $res = $this->_make_query_parmanent($upazila_id);
                $data[$i]['total_parmament_east'] = $res[0]['total_est'];
                $data[$i]['total_parmament_person_engage'] = (int) $res[0]['total_person'];
                $data[$i]['total_parmament_male_engage'] = (int) $res[0]['total_parmament_male_engage'];
                $data[$i]['total_parmament_female_engage'] = (int) $res[0]['total_parmament_female_engage'];



                $res = $this->_make_query_temporary($upazila_id);
                $data[$i]['total_temporary_east'] = $res[0]['total_est'];
                $data[$i]['total_temporary_person_engage'] = (int) $res[0]['total_person'];
                $data[$i]['total_temporary_male_engage'] = (int) $res[0]['total_temporary_male_engage'];
                $data[$i]['total_temporary_female_engage'] = (int) $res[0]['total_temporary_female_engage'];



                $res = $this->_make_query_echonomic_household($upazila_id);
                $data[$i]['total_eh_east'] = $res[0]['total_est'];
                $data[$i]['total_eh_person_engage'] = (int) $res[0]['total_person'];
                $data[$i]['total_eh_male_engage'] = (int) $res[0]['total_eh_male_engage'];
                $data[$i]['total_eh_female_engage'] = (int) $res[0]['total_eh_female_engage'];
               
                $i++;

            }
           
        }   
        $this -> set(compact('divn', 'zila', 'upazila_name','data'));    
    }
}

?>