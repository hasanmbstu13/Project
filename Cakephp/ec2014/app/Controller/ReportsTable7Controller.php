<?php

class ReportsTable7Controller extends AppController {

	
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

    public function _make_query($gender, $education, $condition)
    {
        $this -> loadModel('Report');
        
        if($education == "T") $edu = "";
        else if($education == "N") $edu = "  AND education_code = '00' ";
        else if($education == "P") $edu = " AND education_code IN('01', '02', '03', '04', '05') ";
        else if($education == "LS") $edu = " AND education_code IN('06', '07', '08', '09') ";
        else if($education == "S") $edu = " AND education_code = '10' ";
        else if($education == "HS") $edu = " AND education_code = '12' ";
        else if($education == "D") $edu = " AND education_code IN ('15', '16', '18') ";

        if($condition == "ALL")
        $query = "SELECT COUNT(questionnarie_id) AS total_est FROM bbsec2013_reports WHERE ".$this->_make_where_condition()." AND Q3_UNIT_HEAD_GENDER_CODE = '".$gender."' ".$edu." ";
        else
    	$query = "SELECT COUNT(questionnarie_id) AS total_est FROM bbsec2013_reports WHERE ".$this->_make_where_condition()." AND Q3_UNIT_HEAD_GENDER_CODE = '".$gender."' ".$edu." AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) ".$condition." ";

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

           // $where = $this->_make_where_condition();
            $data = array();

        //male headed establishment

        # TOTAL
           $res = $this->_make_query(1, "T", "ALL");
           $data['male_total_est'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "T", "BETWEEN 1 AND 3");
             $data['male_total_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "T","BETWEEN 5 AND 9");
           $data['male_total_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "T","BETWEEN 10 AND 33");
           $data['male_total_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(1, "T","= 35");
           $data['male_total_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "T","BETWEEN 36 AND 39");
           $data['male_total_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "T","BETWEEN 41 AND 43");
           $data['male_total_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "T","BETWEEN 45 AND 47");
           $data['male_total_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "T","BETWEEN 49 AND 53");
           $data['male_total_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "T","BETWEEN 55 AND 56");
           $data['male_total_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "T","BETWEEN 58 AND 63");
           $data['male_total_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "T","BETWEEN 64 AND 66");
           $data['male_total_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "T","= 68");
           $data['male_total_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "T","BETWEEN 69 AND 75");
           $data['male_total_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "T","BETWEEN 77 AND 82");
           $data['male_total_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "T","= 84");
           $data['male_total_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "T", " = 85");
           $data['male_total_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "T","BETWEEN 86 AND 88");
           $data['male_total_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(1, "T","BETWEEN 90 AND 93");
           $data['male_total_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "T","BETWEEN 94 AND 96");
           $data['male_total_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "T","BETWEEN 97 AND 98");
           $data['male_total_households'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "T", "= 99");
           $data['male_total_extraterritorial'] = $res[0]['total_est'];





        # NONE
           $res = $this->_make_query(1, "N", "ALL");
           $data['male_none_est'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "N", "BETWEEN 1 AND 3");
             $data['male_none_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "N","BETWEEN 5 AND 9");
           $data['male_none_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "N","BETWEEN 10 AND 33");
           $data['male_none_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(1, "N","= 35");
           $data['male_none_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "N","BETWEEN 36 AND 39");
           $data['male_none_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "N","BETWEEN 41 AND 43");
           $data['male_none_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "N","BETWEEN 45 AND 47");
           $data['male_none_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "N","BETWEEN 49 AND 53");
           $data['male_none_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "N","BETWEEN 55 AND 56");
           $data['male_none_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "N","BETWEEN 58 AND 63");
           $data['male_none_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "N","BETWEEN 64 AND 66");
           $data['male_none_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "N","= 68");
           $data['male_none_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "N","BETWEEN 69 AND 75");
           $data['male_none_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "N","BETWEEN 77 AND 82");
           $data['male_none_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "N","= 84");
           $data['male_none_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "N", " = 85");
           $data['male_none_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "N","BETWEEN 86 AND 88");
           $data['male_none_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(1, "N","BETWEEN 90 AND 93");
           $data['male_none_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "N","BETWEEN 94 AND 96");
           $data['male_none_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "N","BETWEEN 97 AND 98");
           $data['male_none_households'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "N", "= 99");
           $data['male_none_extraterritorial'] = $res[0]['total_est'];




           #primary

           $res = $this->_make_query(1, "P", "ALL");
           $data['male_primary_est'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "P", "BETWEEN 1 AND 3");
           $data['male_primary_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "P","BETWEEN 5 AND 9");
           $data['male_primary_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "P","BETWEEN 10 AND 33");
           $data['male_primary_manufacturing'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "P","= 35");
           $data['male_primary_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "P","BETWEEN 36 AND 39");
           $data['male_primary_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "P","BETWEEN 41 AND 43");
           $data['male_primary_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "P","BETWEEN 45 AND 47");
           $data['male_primary_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "P","BETWEEN 49 AND 53");
           $data['male_primary_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "P","BETWEEN 55 AND 56");
           $data['male_primary_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "P","BETWEEN 58 AND 63");
           $data['male_primary_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "P","BETWEEN 64 AND 66");
           $data['male_primary_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "P","= 68");
           $data['male_primary_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "P","BETWEEN 69 AND 75");
           $data['male_primary_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "P","BETWEEN 77 AND 82");
           $data['male_primary_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "P","= 84");
           $data['male_primary_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "P", " = 85");
           $data['male_primary_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "P","BETWEEN 86 AND 88");
           $data['male_primary_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(1, "P","BETWEEN 90 AND 93");
           $data['male_primary_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "P","BETWEEN 94 AND 96");
           $data['male_primary_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "P","BETWEEN 97 AND 98");
           $data['male_primary_households'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "P", "= 99");
           $data['male_primary_extraterritorial'] = $res[0]['total_est'];


           #Lower Secondary

           $res = $this->_make_query(1, "LS", "ALL");
           $data['male_lower_est'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "LS", "BETWEEN 1 AND 3");
             $data['male_lower_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "LS","BETWEEN 5 AND 9");
           $data['male_lower_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "LS","BETWEEN 10 AND 33");
           $data['male_lower_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(1, "LS","= 35");
           $data['male_lower_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "LS","BETWEEN 36 AND 39");
           $data['male_lower_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "LS","BETWEEN 41 AND 43");
           $data['male_lower_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "LS","BETWEEN 45 AND 47");
           $data['male_lower_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "LS","BETWEEN 49 AND 53");
           $data['male_lower_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "LS","BETWEEN 55 AND 56");
           $data['male_lower_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "LS","BETWEEN 58 AND 63");
           $data['male_lower_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "LS","BETWEEN 64 AND 66");
           $data['male_lower_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "LS","= 68");
           $data['male_lower_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "LS","BETWEEN 69 AND 75");
           $data['male_lower_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "LS","BETWEEN 77 AND 82");
           $data['male_lower_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "LS","= 84");
           $data['male_lower_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "LS", " = 85");
           $data['male_lower_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "LS","BETWEEN 86 AND 88");
           $data['male_lower_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(1, "LS","BETWEEN 90 AND 93");
           $data['male_lower_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "LS","BETWEEN 94 AND 96");
           $data['male_lower_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "LS","BETWEEN 97 AND 98");
           $data['male_lower_households'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "LS", "= 99");
           $data['male_lower_extraterritorial'] = $res[0]['total_est'];


           #Secondary

                    $res = $this->_make_query(1, "S", "ALL");
           $data['male_secondary_est'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "S", "BETWEEN 1 AND 3");
             $data['male_secondary_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "S","BETWEEN 5 AND 9");
           $data['male_secondary_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "S","BETWEEN 10 AND 33");
           $data['male_secondary_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(1, "S","= 35");
           $data['male_secondary_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "S","BETWEEN 36 AND 39");
           $data['male_secondary_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "S","BETWEEN 41 AND 43");
           $data['male_secondary_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "S","BETWEEN 45 AND 47");
           $data['male_secondary_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "S","BETWEEN 49 AND 53");
           $data['male_secondary_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "S","BETWEEN 55 AND 56");
           $data['male_secondary_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "S","BETWEEN 58 AND 63");
           $data['male_secondary_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "S","BETWEEN 64 AND 66");
           $data['male_secondary_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "S","= 68");
           $data['male_secondary_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "S","BETWEEN 69 AND 75");
           $data['male_secondary_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "S","BETWEEN 77 AND 82");
           $data['male_secondary_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "S","= 84");
           $data['male_secondary_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "S", " = 85");
           $data['male_secondary_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "S","BETWEEN 86 AND 88");
           $data['male_secondary_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(1, "S","BETWEEN 90 AND 93");
           $data['male_secondary_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "S","BETWEEN 94 AND 96");
           $data['male_secondary_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "S","BETWEEN 97 AND 98");
           $data['male_secondary_households'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "S", "= 99");
           $data['male_secondary_extraterritorial'] = $res[0]['total_est'];


           #Higher Secondary

           $res = $this->_make_query(1, "HS", "ALL");
           $data['male_higher_secondary_est'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "HS", "BETWEEN 1 AND 3");
             $data['male_higher_secondary_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "HS","BETWEEN 5 AND 9");
           $data['male_higher_secondary_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "HS","BETWEEN 10 AND 33");
           $data['male_higher_secondary_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(1, "HS","= 35");
           $data['male_higher_secondary_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "HS","BETWEEN 36 AND 39");
           $data['male_higher_secondary_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "HS","BETWEEN 41 AND 43");
           $data['male_higher_secondary_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "HS","BETWEEN 45 AND 47");
           $data['male_higher_secondary_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "HS","BETWEEN 49 AND 53");
           $data['male_higher_secondary_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "HS","BETWEEN 55 AND 56");
           $data['male_higher_secondary_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "HS","BETWEEN 58 AND 63");
           $data['male_higher_secondary_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "HS","BETWEEN 64 AND 66");
           $data['male_higher_secondary_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "HS","= 68");
           $data['male_higher_secondary_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "HS","BETWEEN 69 AND 75");
           $data['male_higher_secondary_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "HS","BETWEEN 77 AND 82");
           $data['male_higher_secondary_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "HS","= 84");
           $data['male_higher_secondary_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "HS", " = 85");
           $data['male_higher_secondary_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "HS","BETWEEN 86 AND 88");
           $data['male_higher_secondary_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(1, "HS","BETWEEN 90 AND 93");
           $data['male_higher_secondary_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "HS","BETWEEN 94 AND 96");
           $data['male_higher_secondary_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "HS","BETWEEN 97 AND 98");
           $data['male_higher_secondary_households'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "HS", "= 99");
           $data['male_higher_secondary_extraterritorial'] = $res[0]['total_est'];
        

           #Degree

           $res = $this->_make_query(1, "D", "ALL");
           $data['male_degree_est'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "D", "BETWEEN 1 AND 3");
             $data['male_degree_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "D","BETWEEN 5 AND 9");
           $data['male_degree_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "D","BETWEEN 10 AND 33");
           $data['male_degree_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(1, "D","= 35");
           $data['male_degree_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "D","BETWEEN 36 AND 39");
           $data['male_degree_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "D","BETWEEN 41 AND 43");
           $data['male_degree_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "D","BETWEEN 45 AND 47");
           $data['male_degree_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "D","BETWEEN 49 AND 53");
           $data['male_degree_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "D","BETWEEN 55 AND 56");
           $data['male_degree_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "D","BETWEEN 58 AND 63");
           $data['male_degree_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "D","BETWEEN 64 AND 66");
           $data['male_degree_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "D","= 68");
           $data['male_degree_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "D","BETWEEN 69 AND 75");
           $data['male_degree_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "D","BETWEEN 77 AND 82");
           $data['male_degree_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "D","= 84");
           $data['male_degree_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "D", " = 85");
           $data['male_degree_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(1, "D","BETWEEN 86 AND 88");
           $data['male_degree_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(1, "D","BETWEEN 90 AND 93");
           $data['male_degree_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "D","BETWEEN 94 AND 96");
           $data['male_degree_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "D","BETWEEN 97 AND 98");
           $data['male_degree_households'] = $res[0]['total_est'];

           $res = $this->_make_query(1, "D", "= 99");
           $data['male_degree_extraterritorial'] = $res[0]['total_est'];




        #-------------------------------------------------------------------------------------------
        //Female headed establishment
        #-------------------------------------------------------------------------------------------

        # Total
           $res = $this->_make_query(2, "T", "ALL");
           $data['female_total_est'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "T", "BETWEEN 1 AND 3");
             $data['female_total_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "T","BETWEEN 5 AND 9");
           $data['female_total_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "T","BETWEEN 10 AND 33");
           $data['female_total_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(2, "T","= 35");
           $data['female_total_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "T","BETWEEN 36 AND 39");
           $data['female_total_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "T","BETWEEN 41 AND 43");
           $data['female_total_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "T","BETWEEN 45 AND 47");
           $data['female_total_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "T","BETWEEN 49 AND 53");
           $data['female_total_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "T","BETWEEN 55 AND 56");
           $data['female_total_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "T","BETWEEN 58 AND 63");
           $data['female_total_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "T","BETWEEN 64 AND 66");
           $data['female_total_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "T","= 68");
           $data['female_total_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "T","BETWEEN 69 AND 75");
           $data['female_total_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "T","BETWEEN 77 AND 82");
           $data['female_total_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "T","= 84");
           $data['female_total_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "T", " = 85");
           $data['female_total_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "T","BETWEEN 86 AND 88");
           $data['female_total_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(2, "T","BETWEEN 90 AND 93");
           $data['female_total_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "T","BETWEEN 94 AND 96");
           $data['female_total_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "T","BETWEEN 97 AND 98");
           $data['female_total_households'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "T", "= 99");
           $data['female_total_extraterritorial'] = $res[0]['total_est'];





        # NONE
           $res = $this->_make_query(2, "N", "ALL");
           $data['female_none_est'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "N", "BETWEEN 1 AND 3");
             $data['female_none_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "N","BETWEEN 5 AND 9");
           $data['female_none_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "N","BETWEEN 10 AND 33");
           $data['female_none_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(2, "N","= 35");
           $data['female_none_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "N","BETWEEN 36 AND 39");
           $data['female_none_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "N","BETWEEN 41 AND 43");
           $data['female_none_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "N","BETWEEN 45 AND 47");
           $data['female_none_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "N","BETWEEN 49 AND 53");
           $data['female_none_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "N","BETWEEN 55 AND 56");
           $data['female_none_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "N","BETWEEN 58 AND 63");
           $data['female_none_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "N","BETWEEN 64 AND 66");
           $data['female_none_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "N","= 68");
           $data['female_none_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "N","BETWEEN 69 AND 75");
           $data['female_none_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "N","BETWEEN 77 AND 82");
           $data['female_none_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "N","= 84");
           $data['female_none_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "N", " = 85");
           $data['female_none_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "N","BETWEEN 86 AND 88");
           $data['female_none_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(2, "N","BETWEEN 90 AND 93");
           $data['female_none_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "N","BETWEEN 94 AND 96");
           $data['female_none_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "N","BETWEEN 97 AND 98");
           $data['female_none_households'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "N", "= 99");
           $data['female_none_extraterritorial'] = $res[0]['total_est'];




           #primary

           $res = $this->_make_query(2, "P", "ALL");
           $data['female_primary_est'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "P", "BETWEEN 1 AND 3");
           $data['female_primary_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "P","BETWEEN 5 AND 9");
           $data['female_primary_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "P","BETWEEN 10 AND 33");
           $data['female_primary_manufacturing'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "P","= 35");
           $data['female_primary_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "P","BETWEEN 36 AND 39");
           $data['female_primary_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "P","BETWEEN 41 AND 43");
           $data['female_primary_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "P","BETWEEN 45 AND 47");
           $data['female_primary_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "P","BETWEEN 49 AND 53");
           $data['female_primary_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "P","BETWEEN 55 AND 56");
           $data['female_primary_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "P","BETWEEN 58 AND 63");
           $data['female_primary_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "P","BETWEEN 64 AND 66");
           $data['female_primary_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "P","= 68");
           $data['female_primary_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "P","BETWEEN 69 AND 75");
           $data['female_primary_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "P","BETWEEN 77 AND 82");
           $data['female_primary_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "P","= 84");
           $data['female_primary_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "P", " = 85");
           $data['female_primary_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "P","BETWEEN 86 AND 88");
           $data['female_primary_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(2, "P","BETWEEN 90 AND 93");
           $data['female_primary_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "P","BETWEEN 94 AND 96");
           $data['female_primary_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "P","BETWEEN 97 AND 98");
           $data['female_primary_households'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "P", "= 99");
           $data['female_primary_extraterritorial'] = $res[0]['total_est'];


           #Lower Secondary

           $res = $this->_make_query(2, "LS", "ALL");
           $data['female_lower_est'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "LS", "BETWEEN 1 AND 3");
             $data['female_lower_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "LS","BETWEEN 5 AND 9");
           $data['female_lower_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "LS","BETWEEN 10 AND 33");
           $data['female_lower_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(2, "LS","= 35");
           $data['female_lower_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "LS","BETWEEN 36 AND 39");
           $data['female_lower_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "LS","BETWEEN 41 AND 43");
           $data['female_lower_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "LS","BETWEEN 45 AND 47");
           $data['female_lower_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "LS","BETWEEN 49 AND 53");
           $data['female_lower_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "LS","BETWEEN 55 AND 56");
           $data['female_lower_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "LS","BETWEEN 58 AND 63");
           $data['female_lower_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "LS","BETWEEN 64 AND 66");
           $data['female_lower_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "LS","= 68");
           $data['female_lower_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "LS","BETWEEN 69 AND 75");
           $data['female_lower_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "LS","BETWEEN 77 AND 82");
           $data['female_lower_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "LS","= 84");
           $data['female_lower_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "LS", " = 85");
           $data['female_lower_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "LS","BETWEEN 86 AND 88");
           $data['female_lower_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(2, "LS","BETWEEN 90 AND 93");
           $data['female_lower_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "LS","BETWEEN 94 AND 96");
           $data['female_lower_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "LS","BETWEEN 97 AND 98");
           $data['female_lower_households'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "LS", "= 99");
           $data['female_lower_extraterritorial'] = $res[0]['total_est'];


           #Secondary

                    $res = $this->_make_query(2, "S", "ALL");
           $data['female_secondary_est'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "S", "BETWEEN 1 AND 3");
             $data['female_secondary_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "S","BETWEEN 5 AND 9");
           $data['female_secondary_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "S","BETWEEN 10 AND 33");
           $data['female_secondary_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(2, "S","= 35");
           $data['female_secondary_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "S","BETWEEN 36 AND 39");
           $data['female_secondary_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "S","BETWEEN 41 AND 43");
           $data['female_secondary_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "S","BETWEEN 45 AND 47");
           $data['female_secondary_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "S","BETWEEN 49 AND 53");
           $data['female_secondary_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "S","BETWEEN 55 AND 56");
           $data['female_secondary_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "S","BETWEEN 58 AND 63");
           $data['female_secondary_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "S","BETWEEN 64 AND 66");
           $data['female_secondary_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "S","= 68");
           $data['female_secondary_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "S","BETWEEN 69 AND 75");
           $data['female_secondary_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "S","BETWEEN 77 AND 82");
           $data['female_secondary_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "S","= 84");
           $data['female_secondary_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "S", " = 85");
           $data['female_secondary_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "S","BETWEEN 86 AND 88");
           $data['female_secondary_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(2, "S","BETWEEN 90 AND 93");
           $data['female_secondary_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "S","BETWEEN 94 AND 96");
           $data['female_secondary_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "S","BETWEEN 97 AND 98");
           $data['female_secondary_households'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "S", "= 99");
           $data['female_secondary_extraterritorial'] = $res[0]['total_est'];


           #Higher Secondary

           $res = $this->_make_query(2, "HS", "ALL");
           $data['female_higher_secondary_est'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "HS", "BETWEEN 1 AND 3");
             $data['female_higher_secondary_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "HS","BETWEEN 5 AND 9");
           $data['female_higher_secondary_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "HS","BETWEEN 10 AND 33");
           $data['female_higher_secondary_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(2, "HS","= 35");
           $data['female_higher_secondary_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "HS","BETWEEN 36 AND 39");
           $data['female_higher_secondary_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "HS","BETWEEN 41 AND 43");
           $data['female_higher_secondary_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "HS","BETWEEN 45 AND 47");
           $data['female_higher_secondary_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "HS","BETWEEN 49 AND 53");
           $data['female_higher_secondary_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "HS","BETWEEN 55 AND 56");
           $data['female_higher_secondary_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "HS","BETWEEN 58 AND 63");
           $data['female_higher_secondary_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "HS","BETWEEN 64 AND 66");
           $data['female_higher_secondary_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "HS","= 68");
           $data['female_higher_secondary_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "HS","BETWEEN 69 AND 75");
           $data['female_higher_secondary_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "HS","BETWEEN 77 AND 82");
           $data['female_higher_secondary_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "HS","= 84");
           $data['female_higher_secondary_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "HS", " = 85");
           $data['female_higher_secondary_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "HS","BETWEEN 86 AND 88");
           $data['female_higher_secondary_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(2, "HS","BETWEEN 90 AND 93");
           $data['female_higher_secondary_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "HS","BETWEEN 94 AND 96");
           $data['female_higher_secondary_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "HS","BETWEEN 97 AND 98");
           $data['female_higher_secondary_households'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "HS", "= 99");
           $data['female_higher_secondary_extraterritorial'] = $res[0]['total_est'];
        

           #Degree

           $res = $this->_make_query(2, "D", "ALL");
           $data['female_degree_est'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "D", "BETWEEN 1 AND 3");
             $data['female_degree_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "D","BETWEEN 5 AND 9");
           $data['female_degree_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "D","BETWEEN 10 AND 33");
           $data['female_degree_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(2, "D","= 35");
           $data['female_degree_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "D","BETWEEN 36 AND 39");
           $data['female_degree_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "D","BETWEEN 41 AND 43");
           $data['female_degree_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "D","BETWEEN 45 AND 47");
           $data['female_degree_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "D","BETWEEN 49 AND 53");
           $data['female_degree_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "D","BETWEEN 55 AND 56");
           $data['female_degree_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "D","BETWEEN 58 AND 63");
           $data['female_degree_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "D","BETWEEN 64 AND 66");
           $data['female_degree_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "D","= 68");
           $data['female_degree_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "D","BETWEEN 69 AND 75");
           $data['female_degree_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "D","BETWEEN 77 AND 82");
           $data['female_degree_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "D","= 84");
           $data['female_degree_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "D", " = 85");
           $data['female_degree_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(2, "D","BETWEEN 86 AND 88");
           $data['female_degree_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(2, "D","BETWEEN 90 AND 93");
           $data['female_degree_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "D","BETWEEN 94 AND 96");
           $data['female_degree_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "D","BETWEEN 97 AND 98");
           $data['female_degree_households'] = $res[0]['total_est'];

           $res = $this->_make_query(2, "D", "= 99");
           $data['female_degree_extraterritorial'] = $res[0]['total_est'];

            

           #Other

           //Female headed establishment

        # Total
           $res = $this->_make_query(3, "T", "ALL");
           $data['other_total_est'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "T", "BETWEEN 1 AND 3");
             $data['other_total_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "T","BETWEEN 5 AND 9");
           $data['other_total_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "T","BETWEEN 10 AND 33");
           $data['other_total_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(3, "T","= 35");
           $data['other_total_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "T","BETWEEN 36 AND 39");
           $data['other_total_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "T","BETWEEN 41 AND 43");
           $data['other_total_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "T","BETWEEN 45 AND 47");
           $data['other_total_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "T","BETWEEN 49 AND 53");
           $data['other_total_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "T","BETWEEN 55 AND 56");
           $data['other_total_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "T","BETWEEN 58 AND 63");
           $data['other_total_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "T","BETWEEN 64 AND 66");
           $data['other_total_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "T","= 68");
           $data['other_total_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "T","BETWEEN 69 AND 75");
           $data['other_total_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "T","BETWEEN 77 AND 82");
           $data['other_total_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "T","= 84");
           $data['other_total_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "T", " = 85");
           $data['other_total_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "T","BETWEEN 86 AND 88");
           $data['other_total_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(3, "T","BETWEEN 90 AND 93");
           $data['other_total_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "T","BETWEEN 94 AND 96");
           $data['other_total_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "T","BETWEEN 97 AND 98");
           $data['other_total_households'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "T", "= 99");
           $data['other_total_extraterritorial'] = $res[0]['total_est'];





        # NONE
           $res = $this->_make_query(3, "N", "ALL");
           $data['other_none_est'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "N", "BETWEEN 1 AND 3");
             $data['other_none_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "N","BETWEEN 5 AND 9");
           $data['other_none_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "N","BETWEEN 10 AND 33");
           $data['other_none_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(3, "N","= 35");
           $data['other_none_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "N","BETWEEN 36 AND 39");
           $data['other_none_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "N","BETWEEN 41 AND 43");
           $data['other_none_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "N","BETWEEN 45 AND 47");
           $data['other_none_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "N","BETWEEN 49 AND 53");
           $data['other_none_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "N","BETWEEN 55 AND 56");
           $data['other_none_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "N","BETWEEN 58 AND 63");
           $data['other_none_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "N","BETWEEN 64 AND 66");
           $data['other_none_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "N","= 68");
           $data['other_none_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "N","BETWEEN 69 AND 75");
           $data['other_none_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "N","BETWEEN 77 AND 82");
           $data['other_none_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "N","= 84");
           $data['other_none_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "N", " = 85");
           $data['other_none_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "N","BETWEEN 86 AND 88");
           $data['other_none_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(3, "N","BETWEEN 90 AND 93");
           $data['other_none_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "N","BETWEEN 94 AND 96");
           $data['other_none_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "N","BETWEEN 97 AND 98");
           $data['other_none_households'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "N", "= 99");
           $data['other_none_extraterritorial'] = $res[0]['total_est'];




           #primary

           $res = $this->_make_query(3, "P", "ALL");
           $data['other_primary_est'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "P", "BETWEEN 1 AND 3");
           $data['other_primary_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "P","BETWEEN 5 AND 9");
           $data['other_primary_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "P","BETWEEN 10 AND 33");
           $data['other_primary_manufacturing'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "P","= 35");
           $data['other_primary_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "P","BETWEEN 36 AND 39");
           $data['other_primary_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "P","BETWEEN 41 AND 43");
           $data['other_primary_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "P","BETWEEN 45 AND 47");
           $data['other_primary_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "P","BETWEEN 49 AND 53");
           $data['other_primary_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "P","BETWEEN 55 AND 56");
           $data['other_primary_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "P","BETWEEN 58 AND 63");
           $data['other_primary_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "P","BETWEEN 64 AND 66");
           $data['other_primary_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "P","= 68");
           $data['other_primary_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "P","BETWEEN 69 AND 75");
           $data['other_primary_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "P","BETWEEN 77 AND 82");
           $data['other_primary_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "P","= 84");
           $data['other_primary_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "P", " = 85");
           $data['other_primary_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "P","BETWEEN 86 AND 88");
           $data['other_primary_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(3, "P","BETWEEN 90 AND 93");
           $data['other_primary_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "P","BETWEEN 94 AND 96");
           $data['other_primary_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "P","BETWEEN 97 AND 98");
           $data['other_primary_households'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "P", "= 99");
           $data['other_primary_extraterritorial'] = $res[0]['total_est'];


           #Lower Secondary

           $res = $this->_make_query(3, "LS", "ALL");
           $data['other_lower_est'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "LS", "BETWEEN 1 AND 3");
             $data['other_lower_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "LS","BETWEEN 5 AND 9");
           $data['other_lower_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "LS","BETWEEN 10 AND 33");
           $data['other_lower_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(3, "LS","= 35");
           $data['other_lower_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "LS","BETWEEN 36 AND 39");
           $data['other_lower_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "LS","BETWEEN 41 AND 43");
           $data['other_lower_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "LS","BETWEEN 45 AND 47");
           $data['other_lower_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "LS","BETWEEN 49 AND 53");
           $data['other_lower_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "LS","BETWEEN 55 AND 56");
           $data['other_lower_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "LS","BETWEEN 58 AND 63");
           $data['other_lower_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "LS","BETWEEN 64 AND 66");
           $data['other_lower_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "LS","= 68");
           $data['other_lower_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "LS","BETWEEN 69 AND 75");
           $data['other_lower_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "LS","BETWEEN 77 AND 82");
           $data['other_lower_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "LS","= 84");
           $data['other_lower_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "LS", " = 85");
           $data['other_lower_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "LS","BETWEEN 86 AND 88");
           $data['other_lower_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(3, "LS","BETWEEN 90 AND 93");
           $data['other_lower_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "LS","BETWEEN 94 AND 96");
           $data['other_lower_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "LS","BETWEEN 97 AND 98");
           $data['other_lower_households'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "LS", "= 99");
           $data['other_lower_extraterritorial'] = $res[0]['total_est'];


           #Secondary

                    $res = $this->_make_query(3, "S", "ALL");
           $data['other_secondary_est'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "S", "BETWEEN 1 AND 3");
             $data['other_secondary_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "S","BETWEEN 5 AND 9");
           $data['other_secondary_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "S","BETWEEN 10 AND 33");
           $data['other_secondary_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(3, "S","= 35");
           $data['other_secondary_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "S","BETWEEN 36 AND 39");
           $data['other_secondary_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "S","BETWEEN 41 AND 43");
           $data['other_secondary_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "S","BETWEEN 45 AND 47");
           $data['other_secondary_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "S","BETWEEN 49 AND 53");
           $data['other_secondary_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "S","BETWEEN 55 AND 56");
           $data['other_secondary_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "S","BETWEEN 58 AND 63");
           $data['other_secondary_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "S","BETWEEN 64 AND 66");
           $data['other_secondary_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "S","= 68");
           $data['other_secondary_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "S","BETWEEN 69 AND 75");
           $data['other_secondary_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "S","BETWEEN 77 AND 82");
           $data['other_secondary_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "S","= 84");
           $data['other_secondary_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "S", " = 85");
           $data['other_secondary_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "S","BETWEEN 86 AND 88");
           $data['other_secondary_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(3, "S","BETWEEN 90 AND 93");
           $data['other_secondary_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "S","BETWEEN 94 AND 96");
           $data['other_secondary_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "S","BETWEEN 97 AND 98");
           $data['other_secondary_households'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "S", "= 99");
           $data['other_secondary_extraterritorial'] = $res[0]['total_est'];


           #Higher Secondary

           $res = $this->_make_query(3, "HS", "ALL");
           $data['other_higher_secondary_est'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "HS", "BETWEEN 1 AND 3");
             $data['other_higher_secondary_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "HS","BETWEEN 5 AND 9");
           $data['other_higher_secondary_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "HS","BETWEEN 10 AND 33");
           $data['other_higher_secondary_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(3, "HS","= 35");
           $data['other_higher_secondary_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "HS","BETWEEN 36 AND 39");
           $data['other_higher_secondary_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "HS","BETWEEN 41 AND 43");
           $data['other_higher_secondary_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "HS","BETWEEN 45 AND 47");
           $data['other_higher_secondary_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "HS","BETWEEN 49 AND 53");
           $data['other_higher_secondary_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "HS","BETWEEN 55 AND 56");
           $data['other_higher_secondary_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "HS","BETWEEN 58 AND 63");
           $data['other_higher_secondary_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "HS","BETWEEN 64 AND 66");
           $data['other_higher_secondary_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "HS","= 68");
           $data['other_higher_secondary_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "HS","BETWEEN 69 AND 75");
           $data['other_higher_secondary_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "HS","BETWEEN 77 AND 82");
           $data['other_higher_secondary_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "HS","= 84");
           $data['other_higher_secondary_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "HS", " = 85");
           $data['other_higher_secondary_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "HS","BETWEEN 86 AND 88");
           $data['other_higher_secondary_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(3, "HS","BETWEEN 90 AND 93");
           $data['other_higher_secondary_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "HS","BETWEEN 94 AND 96");
           $data['other_higher_secondary_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "HS","BETWEEN 97 AND 98");
           $data['other_higher_secondary_households'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "HS", "= 99");
           $data['other_higher_secondary_extraterritorial'] = $res[0]['total_est'];
        

           #Degree

           $res = $this->_make_query(3, "D", "ALL");
           $data['other_degree_est'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "D", "BETWEEN 1 AND 3");
             $data['other_degree_agri'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "D","BETWEEN 5 AND 9");
           $data['other_degree_mining'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "D","BETWEEN 10 AND 33");
           $data['other_degree_manufacturing'] = $res[0]['total_est'];
           
           

           $res = $this->_make_query(3, "D","= 35");
           $data['other_degree_electricity'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "D","BETWEEN 36 AND 39");
           $data['other_degree_water'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "D","BETWEEN 41 AND 43");
           $data['other_degree_construction'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "D","BETWEEN 45 AND 47");
           $data['other_degree_wholesale'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "D","BETWEEN 49 AND 53");
           $data['other_degree_transport'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "D","BETWEEN 55 AND 56");
           $data['other_degree_accomodation'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "D","BETWEEN 58 AND 63");
           $data['other_degree_information'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "D","BETWEEN 64 AND 66");
           $data['other_degree_financial'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "D","= 68");
           $data['other_degree_real_estate'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "D","BETWEEN 69 AND 75");
           $data['other_degree_professional'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "D","BETWEEN 77 AND 82");
           $data['other_degree_administration'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "D","= 84");
           $data['other_degree_public'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "D", " = 85");
           $data['other_degree_education'] = $res[0]['total_est'];
           

           $res = $this->_make_query(3, "D","BETWEEN 86 AND 88");
           $data['other_degree_human'] = $res[0]['total_est'];
           
           $res = $this->_make_query(3, "D","BETWEEN 90 AND 93");
           $data['other_degree_arts'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "D","BETWEEN 94 AND 96");
           $data['other_degree_other_service'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "D","BETWEEN 97 AND 98");
           $data['other_degree_households'] = $res[0]['total_est'];

           $res = $this->_make_query(3, "D", "= 99");
           $data['other_degree_extraterritorial'] = $res[0]['total_est'];



            #debug($data);
            //echo "<pre>"; print_r($data); echo "</pre>"; die();

            
    	}	
        $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union','data'));	
    }
}

?>