<?php

class ReportsEightThreeController extends AppController {

    
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

    public function _cottage($gender = null, $ea)
    {
        $where = "";
        if($gender == 'Male') $where .= " AND C.Q3_UNIT_HEAD_GENDER = 'Male' ";
        if($gender == 'Female') $where .= " AND C.Q3_UNIT_HEAD_GENDER = 'Female' ";

        $where .= " AND UNIT_SIZE = 1 ";
        $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
        return $where;
    }

    public function _micro($gender = null, $ea)
    {
        $where = "";
        if($gender == 'Male') $where .= " AND C.Q3_UNIT_HEAD_GENDER = 'Male' ";
        if($gender == 'Female') $where .= " AND C.Q3_UNIT_HEAD_GENDER = 'Female' ";

        $where .= " AND UNIT_SIZE = 2 ";
        $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
        return $where;
    }

    public function _small($gender = null, $ea)
    {
        $where = "";
        if($gender == 'Male') $where .= " AND C.Q3_UNIT_HEAD_GENDER = 'Male' ";
        if($gender == 'Female') $where .= " AND C.Q3_UNIT_HEAD_GENDER = 'Female' ";

        $where .= " AND UNIT_SIZE = 3 ";
        $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
        return $where;
    }

    public function _medium($gender = null, $ea)
    {
        $where = "";
        if($gender == 'Male') $where .= " AND C.Q3_UNIT_HEAD_GENDER = 'Male' ";
        if($gender == 'Female') $where .= " AND C.Q3_UNIT_HEAD_GENDER = 'Female' ";

        $where .= " AND UNIT_SIZE = 4";
        $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;

        return $where;
    }

    public function _large($gender = null, $ea)
    {
        $where = "";
        if($gender == 'Male') $where .= " AND C.Q3_UNIT_HEAD_GENDER = 'Male' ";
        if($gender == 'Female') $where .= " AND C.Q3_UNIT_HEAD_GENDER = 'Female' ";

        $where .= " AND UNIT_SIZE = 5";
        $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;

        return $where;
    }

    public function _total($ea)
    {
        $where = " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
        return $where;
    }


    public function tpe_tbl_eight_three() {
        
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

            $where = $this->_make_where_condition();

            //#############################   PART ONE ####################################

            $main_query = "SELECT SUM(C.TOTAL_PERSON_ENGAGED) TOTAL_COTTAGE FROM BBSEC2013_REPORTS C WHERE ";
            $male_query =  "SELECT SUM(C.TOTAL_MALE_ENGAGED) TOTAL_COTTAGE FROM BBSEC2013_REPORTS C WHERE ";
            $female_query =  "SELECT SUM(C.TOTAL_FEMALE_ENGAGED) TOTAL_COTTAGE FROM BBSEC2013_REPORTS C WHERE ";
            
            //ROW A

            // $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 1 AND 3"));
            // $A_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 1 AND 3"));
            // $A_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_cottage('Male', " BETWEEN 1 AND 3"));
            // $A_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_cottage('Female', " BETWEEN 1 AND 3"));
            // $A_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            // $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 1 AND 3"));
            // $A_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_micro('Male', " BETWEEN 1 AND 3"));
            // $A_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_micro('Female', " BETWEEN 1 AND 3"));
            // $A_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            // $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 1 AND 3"));
            // $A_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_small('Male', " BETWEEN 1 AND 3"));
            // $A_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_small('Female', " BETWEEN 1 AND 3"));
            // $A_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            // $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 1 AND 3"));
            // $A_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_medium('Male', " BETWEEN 1 AND 3"));
            // $A_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_medium('Female', " BETWEEN 1 AND 3"));
            // $A_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            // $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 1 AND 3"));
            // $A_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_large('Male', " BETWEEN 1 AND 3"));
            // $A_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_large('Female', " BETWEEN 1 AND 3"));
            // $A_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 







            //ROW B

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 05 AND 09"));
            $B_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 05 AND 09"));
            $B_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " BETWEEN 05 AND 09"));
            $B_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " BETWEEN 05 AND 09"));
            $B_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 05 AND 09"));
            $B_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " BETWEEN 05 AND 09"));
            $B_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " BETWEEN 05 AND 09"));
            $B_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 05 AND 09"));
            $B_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " BETWEEN 05 AND 09"));
            $B_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " BETWEEN 05 AND 09"));
            $B_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 05 AND 09"));
            $B_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " BETWEEN 05 AND 09"));
            $B_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " BETWEEN 05 AND 09"));
            $B_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 05 AND 09"));
            $B_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " BETWEEN 05 AND 09"));
            $B_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " BETWEEN 05 AND 09"));
            $B_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 







            //ROW C

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 10 AND 33"));
            $C_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 10 AND 33"));
            $C_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " BETWEEN 10 AND 33"));
            $C_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " BETWEEN 10 AND 33"));
            $C_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 10 AND 33"));
            $C_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " BETWEEN 10 AND 33"));
            $C_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " BETWEEN 10 AND 33"));
            $C_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 10 AND 33"));
            $C_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " BETWEEN 10 AND 33"));
            $C_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " BETWEEN 10 AND 33"));
            $C_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 10 AND 33"));
            $C_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " BETWEEN 10 AND 33"));
            $C_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " BETWEEN 10 AND 33"));
            $C_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 10 AND 33"));
            $C_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " BETWEEN 10 AND 33"));
            $C_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " BETWEEN 10 AND 33"));
            $C_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 






            //ROW D

            $result = $this -> Report -> query($main_query.$where.$this->_total(" = 35"));
            $D_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 35"));
            $D_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " = 35"));
            $D_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " = 35"));
            $D_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 35"));
            $D_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " = 35"));
            $D_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " = 35"));
            $D_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 35"));
            $D_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " = 35"));
            $D_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " = 35"));
            $D_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 35"));
            $D_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " = 35"));
            $D_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " = 35"));
            $D_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 35"));
            $D_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " = 35"));
            $D_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " = 35"));
            $D_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE'];






            //ROW E

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 36  AND 39"));
            $E_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 36  AND 39"));
            $E_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " BETWEEN 36  AND 39"));
            $E_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " BETWEEN 36  AND 39"));
            $E_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 36  AND 39"));
            $E_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " BETWEEN 36  AND 39"));
            $E_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " BETWEEN 36  AND 39"));
            $E_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 36  AND 39"));
            $E_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " BETWEEN 36  AND 39"));
            $E_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " BETWEEN 36  AND 39"));
            $E_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 36  AND 39"));
            $E_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " BETWEEN 36  AND 39"));
            $E_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " BETWEEN 36  AND 39"));
            $E_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 36  AND 39"));
            $E_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " BETWEEN 36  AND 39"));
            $E_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " BETWEEN 36  AND 39"));
            $E_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 





            //ROW F

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 41 AND 43"));
            $F_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 41 AND 43"));
            $F_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " BETWEEN 41 AND 43"));
            $F_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " BETWEEN 41 AND 43"));
            $F_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 41 AND 43"));
            $F_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " BETWEEN 41 AND 43"));
            $F_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " BETWEEN 41 AND 43"));
            $F_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 41 AND 43"));
            $F_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " BETWEEN 41 AND 43"));
            $F_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " BETWEEN 41 AND 43"));
            $F_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 41 AND 43"));
            $F_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " BETWEEN 41 AND 43"));
            $F_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " BETWEEN 41 AND 43"));
            $F_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 41 AND 43"));
            $F_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " BETWEEN 41 AND 43"));
            $F_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " BETWEEN 41 AND 43"));
            $F_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE'];



            //ROW G

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 45 AND 47"));
            $G_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 45 AND 47"));
            $G_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " BETWEEN 45 AND 47"));
            $G_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " BETWEEN 45 AND 47"));
            $G_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 45 AND 47"));
            $G_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " BETWEEN 45 AND 47"));
            $G_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " BETWEEN 45 AND 47"));
            $G_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 45 AND 47"));
            $G_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " BETWEEN 45 AND 47"));
            $G_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " BETWEEN 45 AND 47"));
            $G_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 45 AND 47"));
            $G_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " BETWEEN 45 AND 47"));
            $G_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " BETWEEN 45 AND 47"));
            $G_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 45 AND 47"));
            $G_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " BETWEEN 45 AND 47"));
            $G_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " BETWEEN 45 AND 47"));
            $G_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE'];



            //ROW H

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 49 AND 53"));
            $H_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 49 AND 53"));
            $H_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " BETWEEN 49 AND 53"));
            $H_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " BETWEEN 49 AND 53"));
            $H_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 49 AND 53"));
            $H_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " BETWEEN 49 AND 53"));
            $H_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " BETWEEN 49 AND 53"));
            $H_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 49 AND 53"));
            $H_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " BETWEEN 49 AND 53"));
            $H_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " BETWEEN 49 AND 53"));
            $H_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 49 AND 53"));
            $H_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " BETWEEN 49 AND 53"));
            $H_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " BETWEEN 49 AND 53"));
            $H_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 49 AND 53"));
            $H_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " BETWEEN 49 AND 53"));
            $H_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " BETWEEN 49 AND 53"));
            $H_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE'];



            //ROW I

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 55 AND 56"));
            $I_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 55 AND 56"));
            $I_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " BETWEEN 55 AND 56"));
            $I_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " BETWEEN 55 AND 56"));
            $I_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 55 AND 56"));
            $I_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " BETWEEN 55 AND 56"));
            $I_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " BETWEEN 55 AND 56"));
            $I_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 55 AND 56"));
            $I_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " BETWEEN 55 AND 56"));
            $I_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " BETWEEN 55 AND 56"));
            $I_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 55 AND 56"));
            $I_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " BETWEEN 55 AND 56"));
            $I_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " BETWEEN 55 AND 56"));
            $I_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 55 AND 56"));
            $I_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " BETWEEN 55 AND 56"));
            $I_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " BETWEEN 55 AND 56"));
            $I_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE'];



            //ROW J

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 58 AND 63"));
            $J_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 58 AND 63"));
            $J_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " BETWEEN 58 AND 63"));
            $J_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " BETWEEN 58 AND 63"));
            $J_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 58 AND 63"));
            $J_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " BETWEEN 58 AND 63"));
            $J_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " BETWEEN 58 AND 63"));
            $J_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 58 AND 63"));
            $J_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " BETWEEN 58 AND 63"));
            $J_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " BETWEEN 58 AND 63"));
            $J_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 58 AND 63"));
            $J_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " BETWEEN 58 AND 63"));
            $J_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " BETWEEN 58 AND 63"));
            $J_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 58 AND 63"));
            $J_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " BETWEEN 58 AND 63"));
            $J_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " BETWEEN 58 AND 63"));
            $J_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE'];


            //ROW K

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 64 AND 66"));
            $K_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 64 AND 66"));
            $K_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " BETWEEN 64 AND 66"));
            $K_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " BETWEEN 64 AND 66"));
            $K_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 64 AND 66"));
            $K_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " BETWEEN 64 AND 66"));
            $K_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " BETWEEN 64 AND 66"));
            $K_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 64 AND 66"));
            $K_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " BETWEEN 64 AND 66"));
            $K_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " BETWEEN 64 AND 66"));
            $K_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 64 AND 66"));
            $K_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " BETWEEN 64 AND 66"));
            $K_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " BETWEEN 64 AND 66"));
            $K_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 64 AND 66"));
            $K_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " BETWEEN 64 AND 66"));
            $K_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " BETWEEN 64 AND 66"));
            $K_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE'];



            //ROW L

            $result = $this -> Report -> query($main_query.$where.$this->_total(" = 68"));
            $L_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 68"));
            $L_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " = 68"));
            $L_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " = 68"));
            $L_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 68"));
            $L_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " = 68"));
            $L_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " = 68"));
            $L_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 68"));
            $L_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " = 68"));
            $L_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " = 68"));
            $L_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 68"));
            $L_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " = 68"));
            $L_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " = 68"));
            $L_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 68"));
            $L_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " = 68"));
            $L_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " = 68"));
            $L_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE'];


            //ROW M

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 69 AND 75"));
            $M_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 69 AND 75"));
            $M_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " BETWEEN 69 AND 75"));
            $M_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " BETWEEN 69 AND 75"));
            $M_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 69 AND 75"));
            $M_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " BETWEEN 69 AND 75"));
            $M_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " BETWEEN 69 AND 75"));
            $M_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 69 AND 75"));
            $M_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " BETWEEN 69 AND 75"));
            $M_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " BETWEEN 69 AND 75"));
            $M_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 69 AND 75"));
            $M_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " BETWEEN 69 AND 75"));
            $M_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " BETWEEN 69 AND 75"));
            $M_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 69 AND 75"));
            $M_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " BETWEEN 69 AND 75"));
            $M_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " BETWEEN 69 AND 75"));
            $M_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE'];


            //ROW N

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 77  AND 82"));
            $N_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 77  AND 82"));
            $N_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " BETWEEN 77  AND 82"));
            $N_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " BETWEEN 77  AND 82"));
            $N_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 77  AND 82"));
            $N_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " BETWEEN 77  AND 82"));
            $N_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " BETWEEN 77  AND 82"));
            $N_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 77  AND 82"));
            $N_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " BETWEEN 77  AND 82"));
            $N_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " BETWEEN 77  AND 82"));
            $N_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 77  AND 82"));
            $N_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " BETWEEN 77  AND 82"));
            $N_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " BETWEEN 77  AND 82"));
            $N_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 77  AND 82"));
            $N_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " BETWEEN 77  AND 82"));
            $N_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " BETWEEN 77  AND 82"));
            $N_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE'];


            //ROW O

            $result = $this -> Report -> query($main_query.$where.$this->_total(" = 84"));
            $O_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 84"));
            $O_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " = 84"));
            $O_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " = 84"));
            $O_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 84"));
            $O_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " = 84"));
            $O_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " = 84"));
            $O_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 84"));
            $O_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " = 84"));
            $O_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " = 84"));
            $O_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 84"));
            $O_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " = 84"));
            $O_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " = 84"));
            $O_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 84"));
            $O_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " = 84"));
            $O_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " = 84"));
            $O_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE'];



            //ROW P

            $result = $this -> Report -> query($main_query.$where.$this->_total(" = 85"));
            $P_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 85"));
            $P_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " = 85"));
            $P_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " = 85"));
            $P_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 85"));
            $P_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " = 85"));
            $P_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " = 85"));
            $P_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 85"));
            $P_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " = 85"));
            $P_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " = 85"));
            $P_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 85"));
            $P_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " = 85"));
            $P_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " = 85"));
            $P_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 85"));
            $P_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " = 85"));
            $P_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " = 85"));
            $P_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE'];


            //ROW Q

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 86 AND 88"));
            $Q_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 86 AND 88"));
            $Q_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " BETWEEN 86 AND 88"));
            $Q_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " BETWEEN 86 AND 88"));
            $Q_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 86 AND 88"));
            $Q_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " BETWEEN 86 AND 88"));
            $Q_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " BETWEEN 86 AND 88"));
            $Q_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 86 AND 88"));
            $Q_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " BETWEEN 86 AND 88"));
            $Q_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " BETWEEN 86 AND 88"));
            $Q_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 86 AND 88"));
            $Q_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " BETWEEN 86 AND 88"));
            $Q_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " BETWEEN 86 AND 88"));
            $Q_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 86 AND 88"));
            $Q_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " BETWEEN 86 AND 88"));
            $Q_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " BETWEEN 86 AND 88"));
            $Q_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE'];


            //ROW R

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 90 AND 93"));
            $R_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 90 AND 93"));
            $R_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " BETWEEN 90 AND 93"));
            $R_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " BETWEEN 90 AND 93"));
            $R_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 90 AND 93"));
            $R_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " BETWEEN 90 AND 93"));
            $R_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " BETWEEN 90 AND 93"));
            $R_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 90 AND 93"));
            $R_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " BETWEEN 90 AND 93"));
            $R_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " BETWEEN 90 AND 93"));
            $R_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 90 AND 93"));
            $R_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " BETWEEN 90 AND 93"));
            $R_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " BETWEEN 90 AND 93"));
            $R_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 90 AND 93"));
            $R_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " BETWEEN 90 AND 93"));
            $R_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " BETWEEN 90 AND 93"));
            $R_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE'];


            //ROW S

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 94 AND 96"));
            $S_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 94 AND 96"));
            $S_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " BETWEEN 94 AND 96"));
            $S_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " BETWEEN 94 AND 96"));
            $S_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 94 AND 96"));
            $S_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " BETWEEN 94 AND 96"));
            $S_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " BETWEEN 94 AND 96"));
            $S_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 94 AND 96"));
            $S_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " BETWEEN 94 AND 96"));
            $S_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " BETWEEN 94 AND 96"));
            $S_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 94 AND 96"));
            $S_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " BETWEEN 94 AND 96"));
            $S_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " BETWEEN 94 AND 96"));
            $S_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 94 AND 96"));
            $S_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " BETWEEN 94 AND 96"));
            $S_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " BETWEEN 94 AND 96"));
            $S_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE'];


            //ROW T

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 97 AND 98"));
            $T_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 97 AND 98"));
            $T_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " BETWEEN 97 AND 98"));
            $T_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " BETWEEN 97 AND 98"));
            $T_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 97 AND 98"));
            $T_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " BETWEEN 97 AND 98"));
            $T_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " BETWEEN 97 AND 98"));
            $T_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 97 AND 98"));
            $T_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " BETWEEN 97 AND 98"));
            $T_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " BETWEEN 97 AND 98"));
            $T_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 97 AND 98"));
            $T_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " BETWEEN 97 AND 98"));
            $T_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " BETWEEN 97 AND 98"));
            $T_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 97 AND 98"));
            $T_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " BETWEEN 97 AND 98"));
            $T_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " BETWEEN 97 AND 98"));
            $T_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE'];


            //ROW U

            $result = $this -> Report -> query($main_query.$where.$this->_total(" = 99"));
            $U_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 99"));
            $U_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_cottage(null, " = 99"));
            $U_COTTAGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_cottage(null, " = 99"));
            $U_COTTAGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 99"));
            $U_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_micro(null, " = 99"));
            $U_MICRO_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_micro(null, " = 99"));
            $U_MICRO_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 99"));
            $U_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_small(null, " = 99"));
            $U_SMALL_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_small(null, " = 99"));
            $U_SMALL_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 99"));
            $U_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_medium(null, " = 99"));
            $U_MEDIUM_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_medium(null, " = 99"));
            $U_MEDIUM_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 99"));
            $U_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($male_query.$where.$this->_large(null, " = 99"));
            $U_LARGE_MALE = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($female_query.$where.$this->_large(null, " = 99"));
            $U_LARGE_FEMALE = (int) $result[0][0]['TOTAL_COTTAGE'];





            
        }

        $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union',
        # A -----------------
        // 'A_TOTAL', 'A_COTTAGE_TOTAL', 'A_COTTAGE_MALE', 'A_COTTAGE_FEMALE', 'A_MICRO_TOTAL', 'A_MICRO_MALE', 'A_MICRO_FEMALE',
        // 'A_SMALL_TOTAL', 'A_SMALL_MALE', 'A_SMALL_FEMALE', 'A_MEDIUM_TOTAL', 'A_MEDIUM_MALE', 'A_MEDIUM_FEMALE',
        // 'A_LARGE_TOTAL', 'A_LARGE_MALE', 'A_LARGE_FEMALE', 
        # B--------------------------
        'B_TOTAL', 'B_COTTAGE_TOTAL', 'B_COTTAGE_MALE', 'B_COTTAGE_FEMALE', 'B_MICRO_TOTAL', 'B_MICRO_MALE', 'B_MICRO_FEMALE',
        'B_SMALL_TOTAL', 'B_SMALL_MALE', 'B_SMALL_FEMALE', 'B_MEDIUM_TOTAL', 'B_MEDIUM_MALE', 'B_MEDIUM_FEMALE',
        'B_LARGE_TOTAL', 'B_LARGE_MALE', 'B_LARGE_FEMALE', 
        # C -----------------
        'C_TOTAL', 'C_COTTAGE_TOTAL', 'C_COTTAGE_MALE', 'C_COTTAGE_FEMALE', 'C_MICRO_TOTAL', 'C_MICRO_MALE', 'C_MICRO_FEMALE',
        'C_SMALL_TOTAL', 'C_SMALL_MALE', 'C_SMALL_FEMALE', 'C_MEDIUM_TOTAL', 'C_MEDIUM_MALE', 'C_MEDIUM_FEMALE',
        'C_LARGE_TOTAL', 'C_LARGE_MALE', 'C_LARGE_FEMALE', 
        # D -----------------
        'D_TOTAL', 'D_COTTAGE_TOTAL', 'D_COTTAGE_MALE', 'D_COTTAGE_FEMALE', 'D_MICRO_TOTAL', 'D_MICRO_MALE', 'D_MICRO_FEMALE',
        'D_SMALL_TOTAL', 'D_SMALL_MALE', 'D_SMALL_FEMALE', 'D_MEDIUM_TOTAL', 'D_MEDIUM_MALE', 'D_MEDIUM_FEMALE',
        'D_LARGE_TOTAL', 'D_LARGE_MALE', 'D_LARGE_FEMALE', 
        # E -----------------
        'E_TOTAL', 'E_COTTAGE_TOTAL', 'E_COTTAGE_MALE', 'E_COTTAGE_FEMALE', 'E_MICRO_TOTAL', 'E_MICRO_MALE', 'E_MICRO_FEMALE',
        'E_SMALL_TOTAL', 'E_SMALL_MALE', 'E_SMALL_FEMALE', 'E_MEDIUM_TOTAL', 'E_MEDIUM_MALE', 'E_MEDIUM_FEMALE',
        'E_LARGE_TOTAL', 'E_LARGE_MALE', 'E_LARGE_FEMALE', 
        # F-----------------
        'F_TOTAL', 'F_COTTAGE_TOTAL', 'F_COTTAGE_MALE', 'F_COTTAGE_FEMALE', 'F_MICRO_TOTAL', 'F_MICRO_MALE', 'F_MICRO_FEMALE',
        'F_SMALL_TOTAL', 'F_SMALL_MALE', 'F_SMALL_FEMALE', 'F_MEDIUM_TOTAL', 'F_MEDIUM_MALE', 'F_MEDIUM_FEMALE',
        'F_LARGE_TOTAL', 'F_LARGE_MALE', 'F_LARGE_FEMALE',  
        # G -----------------
        'G_TOTAL', 'G_COTTAGE_TOTAL', 'G_COTTAGE_MALE', 'G_COTTAGE_FEMALE', 'G_MICRO_TOTAL', 'G_MICRO_MALE', 'G_MICRO_FEMALE',
        'G_SMALL_TOTAL', 'G_SMALL_MALE', 'G_SMALL_FEMALE', 'G_MEDIUM_TOTAL', 'G_MEDIUM_MALE', 'G_MEDIUM_FEMALE',
        'G_LARGE_TOTAL', 'G_LARGE_MALE', 'G_LARGE_FEMALE', 
        # H -----------------
        'H_TOTAL', 'H_COTTAGE_TOTAL', 'H_COTTAGE_MALE', 'H_COTTAGE_FEMALE', 'H_MICRO_TOTAL', 'H_MICRO_MALE', 'H_MICRO_FEMALE',
        'H_SMALL_TOTAL', 'H_SMALL_MALE', 'H_SMALL_FEMALE', 'H_MEDIUM_TOTAL', 'H_MEDIUM_MALE', 'H_MEDIUM_FEMALE',
        'H_LARGE_TOTAL', 'H_LARGE_MALE', 'H_LARGE_FEMALE', 
        # I -----------------
        'I_TOTAL', 'I_COTTAGE_TOTAL', 'I_COTTAGE_MALE', 'I_COTTAGE_FEMALE', 'I_MICRO_TOTAL', 'I_MICRO_MALE', 'I_MICRO_FEMALE',
        'I_SMALL_TOTAL', 'I_SMALL_MALE', 'I_SMALL_FEMALE', 'I_MEDIUM_TOTAL', 'I_MEDIUM_MALE', 'I_MEDIUM_FEMALE',
        'I_LARGE_TOTAL', 'I_LARGE_MALE', 'I_LARGE_FEMALE', 
        # J -----------------
        'J_TOTAL', 'J_COTTAGE_TOTAL', 'J_COTTAGE_MALE', 'J_COTTAGE_FEMALE', 'J_MICRO_TOTAL', 'J_MICRO_MALE', 'J_MICRO_FEMALE',
        'J_SMALL_TOTAL', 'J_SMALL_MALE', 'J_SMALL_FEMALE', 'J_MEDIUM_TOTAL', 'J_MEDIUM_MALE', 'J_MEDIUM_FEMALE',
        'J_LARGE_TOTAL', 'J_LARGE_MALE', 'J_LARGE_FEMALE', 
        # K -----------------
        'K_TOTAL', 'K_COTTAGE_TOTAL', 'K_COTTAGE_MALE', 'K_COTTAGE_FEMALE', 'K_MICRO_TOTAL', 'K_MICRO_MALE', 'K_MICRO_FEMALE',
        'K_SMALL_TOTAL', 'K_SMALL_MALE', 'K_SMALL_FEMALE', 'K_MEDIUM_TOTAL', 'K_MEDIUM_MALE', 'K_MEDIUM_FEMALE',
        'K_LARGE_TOTAL', 'K_LARGE_MALE', 'K_LARGE_FEMALE', 
        # L -----------------
        'L_TOTAL', 'L_COTTAGE_TOTAL', 'L_COTTAGE_MALE', 'L_COTTAGE_FEMALE', 'L_MICRO_TOTAL', 'L_MICRO_MALE', 'L_MICRO_FEMALE',
        'L_SMALL_TOTAL', 'L_SMALL_MALE', 'L_SMALL_FEMALE', 'L_MEDIUM_TOTAL', 'L_MEDIUM_MALE', 'L_MEDIUM_FEMALE',
        'L_LARGE_TOTAL', 'L_LARGE_MALE', 'L_LARGE_FEMALE', 
        # M -----------------
        'M_TOTAL', 'M_COTTAGE_TOTAL', 'M_COTTAGE_MALE', 'M_COTTAGE_FEMALE', 'M_MICRO_TOTAL', 'M_MICRO_MALE', 'M_MICRO_FEMALE',
        'M_SMALL_TOTAL', 'M_SMALL_MALE', 'M_SMALL_FEMALE', 'M_MEDIUM_TOTAL', 'M_MEDIUM_MALE', 'M_MEDIUM_FEMALE',
        'M_LARGE_TOTAL', 'M_LARGE_MALE', 'M_LARGE_FEMALE',  
        # N -----------------
        'N_TOTAL', 'N_COTTAGE_TOTAL', 'N_COTTAGE_MALE', 'N_COTTAGE_FEMALE', 'N_MICRO_TOTAL', 'N_MICRO_MALE', 'N_MICRO_FEMALE',
        'N_SMALL_TOTAL', 'N_SMALL_MALE', 'N_SMALL_FEMALE', 'N_MEDIUM_TOTAL', 'N_MEDIUM_MALE', 'N_MEDIUM_FEMALE',
        'N_LARGE_TOTAL', 'N_LARGE_MALE', 'N_LARGE_FEMALE', 
        # O -----------------
        'O_TOTAL', 'O_COTTAGE_TOTAL', 'O_COTTAGE_MALE', 'O_COTTAGE_FEMALE', 'O_MICRO_TOTAL', 'O_MICRO_MALE', 'O_MICRO_FEMALE',
        'O_SMALL_TOTAL', 'O_SMALL_MALE', 'O_SMALL_FEMALE', 'O_MEDIUM_TOTAL', 'O_MEDIUM_MALE', 'O_MEDIUM_FEMALE',
        'O_LARGE_TOTAL', 'O_LARGE_MALE', 'O_LARGE_FEMALE', 
        # P -----------------
        'P_TOTAL', 'P_COTTAGE_TOTAL', 'P_COTTAGE_MALE', 'P_COTTAGE_FEMALE', 'P_MICRO_TOTAL', 'P_MICRO_MALE', 'P_MICRO_FEMALE',
        'P_SMALL_TOTAL', 'P_SMALL_MALE', 'P_SMALL_FEMALE', 'P_MEDIUM_TOTAL', 'P_MEDIUM_MALE', 'P_MEDIUM_FEMALE',
        'P_LARGE_TOTAL', 'P_LARGE_MALE', 'P_LARGE_FEMALE', 
        # Q -----------------
        'Q_TOTAL', 'Q_COTTAGE_TOTAL', 'Q_COTTAGE_MALE', 'Q_COTTAGE_FEMALE', 'Q_MICRO_TOTAL', 'Q_MICRO_MALE', 'Q_MICRO_FEMALE',
        'Q_SMALL_TOTAL', 'Q_SMALL_MALE', 'Q_SMALL_FEMALE', 'Q_MEDIUM_TOTAL', 'Q_MEDIUM_MALE', 'Q_MEDIUM_FEMALE',
        'Q_LARGE_TOTAL', 'Q_LARGE_MALE', 'Q_LARGE_FEMALE', 
        # R -----------------
        'R_TOTAL', 'R_COTTAGE_TOTAL', 'R_COTTAGE_MALE', 'R_COTTAGE_FEMALE', 'R_MICRO_TOTAL', 'R_MICRO_MALE', 'R_MICRO_FEMALE',
        'R_SMALL_TOTAL', 'R_SMALL_MALE', 'R_SMALL_FEMALE', 'R_MEDIUM_TOTAL', 'R_MEDIUM_MALE', 'R_MEDIUM_FEMALE',
        'R_LARGE_TOTAL', 'R_LARGE_MALE', 'R_LARGE_FEMALE', 
        # S -----------------
        'S_TOTAL', 'S_COTTAGE_TOTAL', 'S_COTTAGE_MALE', 'S_COTTAGE_FEMALE', 'S_MICRO_TOTAL', 'S_MICRO_MALE', 'S_MICRO_FEMALE',
        'S_SMALL_TOTAL', 'S_SMALL_MALE', 'S_SMALL_FEMALE', 'S_MEDIUM_TOTAL', 'S_MEDIUM_MALE', 'S_MEDIUM_FEMALE',
        'S_LARGE_TOTAL', 'S_LARGE_MALE', 'S_LARGE_FEMALE', 
        # T -----------------
        'T_TOTAL', 'T_COTTAGE_TOTAL', 'T_COTTAGE_MALE', 'T_COTTAGE_FEMALE', 'T_MICRO_TOTAL', 'T_MICRO_MALE', 'T_MICRO_FEMALE',
        'T_SMALL_TOTAL', 'T_SMALL_MALE', 'T_SMALL_FEMALE', 'T_MEDIUM_TOTAL', 'T_MEDIUM_MALE', 'T_MEDIUM_FEMALE',
        'T_LARGE_TOTAL', 'T_LARGE_MALE', 'T_LARGE_FEMALE', 
        # U -----------------
        'U_TOTAL', 'U_COTTAGE_TOTAL', 'U_COTTAGE_MALE', 'U_COTTAGE_FEMALE', 'U_MICRO_TOTAL', 'U_MICRO_MALE', 'U_MICRO_FEMALE',
        'U_SMALL_TOTAL', 'U_SMALL_MALE', 'U_SMALL_FEMALE', 'U_MEDIUM_TOTAL', 'U_MEDIUM_MALE', 'U_MEDIUM_FEMALE',
        'U_LARGE_TOTAL', 'U_LARGE_MALE', 'U_LARGE_FEMALE'
        
        ));

    }
}


?>