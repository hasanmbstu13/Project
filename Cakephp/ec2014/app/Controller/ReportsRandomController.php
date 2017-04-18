<?php

class ReportsRandomController  extends AppController {
    var $uses = false;
    private $repeated_condition = " AND TOTAL_PERSON_ENGAGED <> 22590 ";

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

    public function _make_query_one($divn, $zila, $condition)
    {
        $this -> loadModel('Report');

        if($condition == "T")
        $query = "SELECT COUNT(QUESTIONNARIE_ID) TOTAL_EST FROM BBSEC2013_REPORTS WHERE GEO_CODE_DIVN_ID = ".$divn." AND GEO_CODE_ZILA_ID = ".$zila." AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 ";

        else 
            $query = "SELECT COUNT(QUESTIONNARIE_ID) TOTAL_EST FROM BBSEC2013_REPORTS WHERE GEO_CODE_DIVN_ID = ".$divn." AND GEO_CODE_ZILA_ID = ".$zila." AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 AND TOTAL_PERSON_ENGAGED BETWEEN " . $condition;
        
        $result = $this -> Report -> query($query);
        return $result[0];
    }
    
    public function random_tpe_one()
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
      

            $query = "SELECT DISTINCT geo_code_divn_id, divn_code, divn_name, geo_code_zila_id, zila_code, zila_name FROM bbsec2013_reports WHERE ".$where . " ORDER BY divn_code, zila_code ";
            $results = $this -> Report -> query($query);
            $data = array();
            $i = 0;
            foreach ($results as $key => $result) {
                
                $data[$i]['divn_code'] = $result[0]['divn_code'];
                $data[$i]['divn_name'] = $result[0]['divn_name'];
                $data[$i]['zila_code'] = $result[0]['zila_code'];
                $data[$i]['zila_name'] = $result[0]['zila_name'];


                $res = $this->_make_query_one($result[0]['geo_code_divn_id'], $result[0]['geo_code_zila_id'], "T");
                $data[$i]['total_est'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query_one($result[0]['geo_code_divn_id'], $result[0]['geo_code_zila_id'], " 1 AND 4 ");
                $data[$i]['emp_size_1_4'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query_one($result[0]['geo_code_divn_id'], $result[0]['geo_code_zila_id'], " 5 AND 9 ");
                $data[$i]['emp_size_5_9'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query_one($result[0]['geo_code_divn_id'], $result[0]['geo_code_zila_id'], " 10 AND 49 ");
                $data[$i]['emp_size_10_49'] = $res[0]['TOTAL_EST'];

                $res = $this->_make_query_one($result[0]['geo_code_divn_id'], $result[0]['geo_code_zila_id'], " 50 AND 99 ");
                $data[$i]['emp_size_50_99'] = $res[0]['TOTAL_EST'];

                $q = "SELECT COUNT(QUESTIONNARIE_ID) TOTAL_EST FROM BBSEC2013_REPORTS WHERE GEO_CODE_DIVN_ID = ".$result[0]['geo_code_divn_id']." AND GEO_CODE_ZILA_ID = ".$result[0]['geo_code_zila_id']." AND Q4_UNIT_TYPE = 2 AND Q4_UNIT_ORG_TYPE = 1 AND TOTAL_PERSON_ENGAGED > 99 ";
                $r = $this -> Report -> query($q);
                $data[$i]['emp_size_100_plus'] = $r[0][0]['TOTAL_EST'];

                $i++;
            }
        } 

        #debug($data);  
        $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union','data'));    
    }

    public function _size_distribution_eu_total($condition, $person = null)
    {
        $this -> loadModel('Report');
        $where = $this->_make_where_condition();

        if($person == null) 
        {
            $select = " COUNT(QUESTIONNARIE_ID) AS TOTAL_EST ";
            $repeated_cond = "";
        }
        else 
        {
            $select = " SUM(TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON ";
            $repeated_cond = $this->repeated_condition;
        }

        if($condition == "T")
            $query = "SELECT ".$select." FROM BBSEC2013_REPORTS WHERE ".$where." ".$repeated_cond;
        else 
            $query = "SELECT ".$select." FROM BBSEC2013_REPORTS WHERE ".$where." ".$repeated_cond." AND TOTAL_PERSON_ENGAGED ".$condition;
        //echo $query; exit;
        $result = $this -> Report -> query($query);
        return $result[0];
    }

    public function _size_distribution_eu_manufacturing($condition, $person = null)
    {
        $this -> loadModel('Report');
        $where = $this->_make_where_condition();

        if($person == null) 
        {
            $select = " COUNT(QUESTIONNARIE_ID) AS TOTAL_EST ";
            $repeated_cond = "";
        }
        else 
        {
            $select = " SUM(TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON ";
            $repeated_cond = $this->repeated_condition;
        }

        if($condition == "T")
            $query = "SELECT ".$select." FROM BBSEC2013_REPORTS WHERE ".$where." ".$repeated_cond." AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33 ";
        else 
            $query = "SELECT ".$select." FROM BBSEC2013_REPORTS WHERE ".$where." ".$repeated_cond." AND F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 10 AND 33 AND TOTAL_PERSON_ENGAGED ".$condition;

        $result = $this -> Report -> query($query);
        return $result[0];
    }

    public function _size_distribution_eu_others($condition, $person = null)
    {
        $this -> loadModel('Report');
        $where = $this->_make_where_condition();

        if($person == null) 
        {
            $select = " COUNT(QUESTIONNARIE_ID) AS TOTAL_EST ";
            $repeated_cond = "";
        }
        else 
        {
            $select = " SUM(TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON ";
            $repeated_cond = $this->repeated_condition;
        }

        if($condition == "T")
            $query = "SELECT ".$select." FROM BBSEC2013_REPORTS WHERE ".$where." ".$repeated_cond." AND ((F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 1 AND 9) OR (F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 35 AND 99)) ";
        else 
            $query = "SELECT ".$select." FROM BBSEC2013_REPORTS WHERE ".$where." ".$repeated_cond." AND ((F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 1 AND 9) OR (F_TO_NUMBER(SUBSTR(Q6_IND_CODE_CLASS_CODE,1,2)) BETWEEN 35 AND 99)) AND TOTAL_PERSON_ENGAGED ".$condition;

        $result = $this -> Report -> query($query);
        return $result[0];
    }

    public function _size_distribution_eu_rural($condition, $person = null)
    {
        $this -> loadModel('Report');
        $where = $this->_make_where_condition();

        if($person == null) 
        {
            $select = " COUNT(QUESTIONNARIE_ID) AS TOTAL_EST ";
            $repeated_cond = "";
        }
        else 
        {
            $select = " SUM(TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON ";
            $repeated_cond = $this->repeated_condition;
        }

        if($condition == "T")
            $query = "SELECT ".$select." FROM BBSEC2013_REPORTS WHERE ".$where." ".$repeated_cond." AND QUES_RMO_CODE IN(1,5,7) ";
        else 
            $query = "SELECT ".$select." FROM BBSEC2013_REPORTS WHERE ".$where." ".$repeated_cond." AND QUES_RMO_CODE IN(1,5,7) AND TOTAL_PERSON_ENGAGED ".$condition;

        $result = $this -> Report -> query($query);
        return $result[0];
    }

    public function _size_distribution_eu_urban($condition, $person = null)
    {
        $this -> loadModel('Report');
        $where = $this->_make_where_condition();

        if($person == null) 
        {
            $select = " COUNT(QUESTIONNARIE_ID) AS TOTAL_EST ";
            $repeated_cond = "";
        }
        else 
        {
            $select = " SUM(TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON ";
            $repeated_cond = $this->repeated_condition;
        }

        if($condition == "T")
            $query = "SELECT ".$select." FROM BBSEC2013_REPORTS WHERE ".$where." ".$repeated_cond." AND QUES_RMO_CODE IN(2,3,9) ";
        else 
            $query = "SELECT ".$select." FROM BBSEC2013_REPORTS WHERE ".$where." ".$repeated_cond." AND QUES_RMO_CODE IN(2,3,9) AND TOTAL_PERSON_ENGAGED ".$condition;

        $result = $this -> Report -> query($query);
        return $result[0];
    }

    public function size_distribution_eu()
    {
        ini_set("memory_limit","1024M");
        ini_set('max_execution_time', 30000);

        $this -> loadModel('Report');
        $divn = "";
        $zila = "";
        $upazila = "";
        $psa = "";
        $union = "";
        $data = array();

        if ($this -> request -> is('post')) {

            $div_id = $this -> request -> data['geo_code_divn'];
            $zila_id = $this -> request -> data['geo_code_zila'];

            $divn = $this -> request -> data['divn_text'];
            $zila = $this -> request -> data['zila_text'];
            $upazila = $this -> request -> data['upazila_text'];
            $psa = $this -> request -> data['psa_text'];
            $union = $this -> request -> data['union_text'];


//###############     TOTAL UNIT   #############################################
            $res = $this->_size_distribution_eu_total("T");
            $data['no_of_economic_units']['total'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_total(" < 10 ");
            $data['no_of_economic_units']['less_than_10'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_total(" BETWEEN 10 AND 49 ");
            $data['no_of_economic_units']['between_10_49'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_total(" BETWEEN 50 AND 99 ");
            $data['no_of_economic_units']['between_50_99'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_total(" > 99 ");
            $data['no_of_economic_units']['more_than_99'] = (int) $res[0]['TOTAL_EST'];

//-------------------------------------------------------------------------------------

            $res = $this->_size_distribution_eu_manufacturing("T");
            $data['manuacturing']['total'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_manufacturing(" < 10 ");
            $data['manuacturing']['less_than_10'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_manufacturing(" BETWEEN 10 AND 49 ");
            $data['manuacturing']['between_10_49'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_manufacturing(" BETWEEN 50 AND 99 ");
            $data['manuacturing']['between_50_99'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_manufacturing(" > 99 ");
            $data['manuacturing']['more_than_99'] = (int) $res[0]['TOTAL_EST'];

//-------------------------------------------------------------------------------------

            $res = $this->_size_distribution_eu_others("T");
            $data['others']['total'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_others(" < 10 ");
            $data['others']['less_than_10'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_others(" BETWEEN 10 AND 49 ");
            $data['others']['between_10_49'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_others(" BETWEEN 50 AND 99 ");
            $data['others']['between_50_99'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_others(" > 99 ");
            $data['others']['more_than_99'] = (int) $res[0]['TOTAL_EST'];


//-------------------------------------------------------------------------------------

            $res = $this->_size_distribution_eu_rural("T");
            $data['rural']['total'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_rural(" < 10 ");
            $data['rural']['less_than_10'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_rural(" BETWEEN 10 AND 49 ");
            $data['rural']['between_10_49'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_rural(" BETWEEN 50 AND 99 ");
            $data['rural']['between_50_99'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_rural(" > 99 ");
            $data['rural']['more_than_99'] = (int) $res[0]['TOTAL_EST'];

//-------------------------------------------------------------------------------------

            $res = $this->_size_distribution_eu_urban("T");
            $data['urban']['total'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_urban(" < 10 ");
            $data['urban']['less_than_10'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_urban(" BETWEEN 10 AND 49 ");
            $data['urban']['between_10_49'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_urban(" BETWEEN 50 AND 99 ");
            $data['urban']['between_50_99'] = (int) $res[0]['TOTAL_EST'];

            $res = $this->_size_distribution_eu_urban(" > 99 ");
            $data['urban']['more_than_99'] = (int) $res[0]['TOTAL_EST'];







//###############     TOTAL PERSON   #############################################
            $res = $this->_size_distribution_eu_total("T", "yes");
            $data2['no_of_economic_units']['total'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_total(" < 10 ", "yes");
            $data2['no_of_economic_units']['less_than_10'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_total(" BETWEEN 10 AND 49 ", "yes");
            $data2['no_of_economic_units']['between_10_49'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_total(" BETWEEN 50 AND 99 ", "yes");
            $data2['no_of_economic_units']['between_50_99'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_total(" > 99 ", "yes");
            $data2['no_of_economic_units']['more_than_99'] = (int) $res[0]['TOTAL_PERSON'];

//-------------------------------------------------------------------------------------

            $res = $this->_size_distribution_eu_manufacturing("T", "yes");
            $data2['manuacturing']['total'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_manufacturing(" < 10 ", "yes");
            $data2['manuacturing']['less_than_10'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_manufacturing(" BETWEEN 10 AND 49 ", "yes");
            $data2['manuacturing']['between_10_49'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_manufacturing(" BETWEEN 50 AND 99 ", "yes");
            $data2['manuacturing']['between_50_99'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_manufacturing(" > 99 ", "yes");
            $data2['manuacturing']['more_than_99'] = (int) $res[0]['TOTAL_PERSON'];

//-------------------------------------------------------------------------------------

            $res = $this->_size_distribution_eu_others("T", "yes");
            $data2['others']['total'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_others(" < 10 ", "yes");
            $data2['others']['less_than_10'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_others(" BETWEEN 10 AND 49 ", "yes");
            $data2['others']['between_10_49'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_others(" BETWEEN 50 AND 99 ", "yes");
            $data2['others']['between_50_99'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_others(" > 99 ", "yes");
            $data2['others']['more_than_99'] = (int) $res[0]['TOTAL_PERSON'];


//-------------------------------------------------------------------------------------

            $res = $this->_size_distribution_eu_rural("T", "yes");
            $data2['rural']['total'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_rural(" < 10 ", "yes");
            $data2['rural']['less_than_10'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_rural(" BETWEEN 10 AND 49 ", "yes");
            $data2['rural']['between_10_49'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_rural(" BETWEEN 50 AND 99 ", "yes");
            $data2['rural']['between_50_99'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_rural(" > 99 ", "yes");
            $data2['rural']['more_than_99'] = (int) $res[0]['TOTAL_PERSON'];

//-------------------------------------------------------------------------------------

            $res = $this->_size_distribution_eu_urban("T", "yes");
            $data2['urban']['total'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_urban(" < 10 ", "yes");
            $data2['urban']['less_than_10'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_urban(" BETWEEN 10 AND 49 ", "yes");
            $data2['urban']['between_10_49'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_urban(" BETWEEN 50 AND 99 ", "yes");
            $data2['urban']['between_50_99'] = (int) $res[0]['TOTAL_PERSON'];

            $res = $this->_size_distribution_eu_urban(" > 99 ", "yes");
            $data2['urban']['more_than_99'] = (int) $res[0]['TOTAL_PERSON'];

        }
        #debug($data);
        $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union','data', 'data2'));    
    }


}

?>