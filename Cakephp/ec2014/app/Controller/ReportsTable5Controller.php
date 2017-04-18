<?php

class ReportsTable5Controller extends AppController {

    
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

    public function _make_query($condition, $union_id)
    {
        $this -> loadModel('Report');
        $query = "SELECT COUNT(questionnarie_id) AS total_est, SUM(total_person_engaged) AS total_person FROM bbsec2013_reports WHERE ".$this->_make_where_condition()." AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) ".$condition." AND geo_code_union_id = ".$union_id;
        //echo $query."<br><br>";
        $result = $this -> Report -> query($query);
        return $result[0];
    }

    public function _make_query_all($union_id)
    {
        $this -> loadModel('Report');
        $query = "SELECT COUNT(questionnarie_id) AS total_est, SUM(total_person_engaged) AS total_person FROM bbsec2013_reports WHERE ".$this->_make_where_condition()." AND geo_code_union_id = ".$union_id;
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

            $where = $this->_make_where_condition();

            if($divn == "" || $zila == '') $this->redirect(array('action' => 'show'));

            $query = "SELECT DISTINCT zila_code, upazila_id, upzila_code, upzila_name, union_id, union_code, union_name FROM view_geo WHERE divn_id = $div_id AND zila_id = $zila_id ORDER BY zila_code, upazila_id, upzila_code, upzila_name, union_id, union_code, union_name ";

            $results = $this -> Report -> query($query);

         
            $i = 0;
            $data = array();
            $tmp_upazila = "";
            foreach ($results as $key => $result) {
                
                //if($i > 20) break;
                $union_id = $result[0]['union_id'];

                $data[$i]['zila_code'] = $result[0]['zila_code'];
                $data[$i]['upzila_code'] = $result[0]['upzila_code'];

                if($tmp_upazila == $result[0]['upazila_id'])
                {

                }
                else
                {
                    $tmp_upazila = $result[0]['upazila_id'];
                    $data[$i]['upazila_name'] = $result[0]['upzila_name'];
                    $i++;

                    $data[$i]['zila_code'] = $result[0]['zila_code'];
                    $data[$i]['upzila_code'] = $result[0]['upzila_code'];
                }
                
               // echo "<pre>"; print_r($result); echo "</pre>";

                $data[$i]['union_code'] = $result[0]['union_code'];
                $data[$i]['union_name'] = $result[0]['union_name'];

                $res = $this->_make_query_all($union_id);
                $data[$i]['est_all_sector'] = $res[0]['total_est'];
                $data[$i]['person_all_sector'] = (int) $res[0]['total_person'];

                // $res = $this->_make_query(" BETWEEN 1 AND 3 ", $union_id);
                // $data[$i]['est_agri_quarry'] = $res[0]['total_est'];
                // $data[$i]['person_agri_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" BETWEEN 5 AND 9 ", $union_id);
                $data[$i]['est_mining_quarry'] = $res[0]['total_est'];
                $data[$i]['person_mining_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" BETWEEN 10 AND 33 ", $union_id);
                $data[$i]['est_manufac_quarry'] = $res[0]['total_est'];
                $data[$i]['person_manufac_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" = 35 ", $union_id);
                $data[$i]['est_electricity_quarry'] = $res[0]['total_est'];
                $data[$i]['person_electricity_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" BETWEEN 36 AND 39 ", $union_id);
                $data[$i]['est_water_quarry'] = $res[0]['total_est'];
                $data[$i]['person_water_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" BETWEEN 41 AND 43 ", $union_id);
                $data[$i]['est_construction_quarry'] = $res[0]['total_est'];
                $data[$i]['person_construction_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" BETWEEN 45 AND 47 ", $union_id);
                $data[$i]['est_wholesale_quarry'] = $res[0]['total_est'];
                $data[$i]['person_wholesale_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" BETWEEN 49 AND 53 ", $union_id);
                $data[$i]['est_trasnportation_quarry'] = $res[0]['total_est'];
                $data[$i]['person_trasnportation_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" BETWEEN 55 AND 56 ", $union_id);
                $data[$i]['est_accomodation_quarry'] = $res[0]['total_est'];
                $data[$i]['person_accomodation_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" BETWEEN 58 AND 63 ", $union_id);
                $data[$i]['est_information_quarry'] = $res[0]['total_est'];
                $data[$i]['person_information_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" BETWEEN 64 AND 66 ", $union_id);
                $data[$i]['est_financial_quarry'] = $res[0]['total_est'];
                $data[$i]['person_financial_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" = 68 ", $union_id);
                $data[$i]['est_realestate_quarry'] = $res[0]['total_est'];
                $data[$i]['person_realestate_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" BETWEEN 69 AND 75 ", $union_id);
                $data[$i]['est_professional_quarry'] = $res[0]['total_est'];
                $data[$i]['person_professional_quarry'] = (int) $res[0]['total_person'];

                $res = $this->_make_query(" BETWEEN 77 AND 82 ", $union_id);
                $data[$i]['est_administrative_quarry'] = $res[0]['total_est'];
                $data[$i]['person_administrative_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" = 84 ", $union_id);
                $data[$i]['est_public_administrative_quarry'] = $res[0]['total_est'];
                $data[$i]['person_public_administrative_quarry'] = (int) $res[0]['total_person'];

                $res = $this->_make_query(" = 85 ", $union_id);
                $data[$i]['est_education_quarry'] = $res[0]['total_est'];
                $data[$i]['person_education_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" BETWEEN 86 AND 88 ", $union_id);
                $data[$i]['est_human_quarry'] = $res[0]['total_est'];
                $data[$i]['person_human_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" BETWEEN 90 AND 93 ", $union_id);
                $data[$i]['est_art_quarry'] = $res[0]['total_est'];
                $data[$i]['person_art_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" BETWEEN 94 AND 96 ", $union_id);
                $data[$i]['est_other_service_quarry'] = $res[0]['total_est'];
                $data[$i]['person_other_service_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" BETWEEN 97 AND 98 ", $union_id);
                $data[$i]['est_activities_household_quarry'] = $res[0]['total_est'];
                $data[$i]['person_activities_household_quarry'] = (int) $res[0]['total_person'];


                $res = $this->_make_query(" = 99 ", $union_id);
                $data[$i]['est_activities_extraterritorial_quarry'] = $res[0]['total_est'];
                $data[$i]['person_activities_extraterritorial_quarry'] = (int) $res[0]['total_person'];
               
                $i++;

            }
            #echo "<pre>"; print_r($data); echo "</pre>";
        }   
        $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union','data'));    
    }
}

?>