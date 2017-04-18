<?php

class ReportsTable11Controller extends AppController {

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
            $query = "SELECT (D.DIVN_CODE) AS DIVN_CODE, (D.DIVN_CODE_DESC_BNG) AS DIVN_CODE_DESC_BNG, COUNT(R.QUESTIONNARIE_ID) AS TOTAL_EST, SUM(R.TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON FROM IND_CODE_DIVNS D LEFT JOIN BBSEC2013_REPORTS R ON (SUBSTR(R.Q6_IND_CODE_CLASS_CODE,1,2) = D.DIVN_CODE) WHERE ".$where." AND SUBSTR(R.Q6_IND_CODE_CLASS_CODE,1,2) = '".$code."' GROUP BY D.DIVN_CODE, D.DIVN_CODE_DESC_BNG ";
        else
            $query = "SELECT (D.DIVN_CODE) AS DIVN_CODE, COUNT(R.QUESTIONNARIE_ID) AS TOTAL_EST , SUM(R.TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON  FROM IND_CODE_DIVNS D LEFT JOIN BBSEC2013_REPORTS R ON (SUBSTR(R.Q6_IND_CODE_CLASS_CODE,1,2) = D.DIVN_CODE) WHERE ".$where." AND SUBSTR(R.Q6_IND_CODE_CLASS_CODE,1,2) = '".$code."' AND ".$condition." GROUP BY D.DIVN_CODE ";
        $result = $this -> Report -> query($query);
        return $result[0];
    }



     public function _total($ea)
        {
            $where = " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
            return $where;
        }


      public function _before_1947($ea)
        {
            $where = "";
            $where .= " AND C.Q12_YEAR_OF_START BETWEEN 1 AND 1946 ";
            $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
            return $where;
        }

         public function _bet_1947_1959($ea)
            {
                $where = "";
                $where .= " AND C.Q12_YEAR_OF_START BETWEEN 1947 AND 1959 ";
                $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                return $where;
            }


         public function _bet_1960_1970($ea)
            {
                $where = "";
                $where .= " AND C.Q12_YEAR_OF_START BETWEEN 1960 AND 1970 ";
                $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                return $where;
            }


         public function _bet_1971_1979($ea)
            {
                $where = "";
                $where .= " AND C.Q12_YEAR_OF_START BETWEEN 1971 AND 1979 ";
                $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                return $where;
            }


         public function _bet_1980_1989 ($ea)
            {
                $where = "";
                $where .= " AND C.Q12_YEAR_OF_START BETWEEN 1980 AND 1989 ";
                $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                return $where;
            }


          public function _bet_1990_1999 ($ea)
            {
                $where = "";
                $where .= " AND C.Q12_YEAR_OF_START BETWEEN 1990 AND 1999 ";
                $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                return $where;
            }


         public function _bet_2000_2009 ($ea)
            {
                $where = "";
                $where .= " AND C.Q12_YEAR_OF_START BETWEEN 2000 AND 2009 ";
                $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                return $where;
            }
            

        public function _bet_2010_2013 ($ea)
                {
                    $where = "";
                    $where .= " AND C.Q12_YEAR_OF_START BETWEEN 2010 AND 2013 ";
                    $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                    return $where;
                }

         public function _not_reported ($ea)
                {
                    $where = "";
                    $where .= " AND C.Q12_YEAR_OF_START = 0000 ";
                    $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                    return $where;
                }


    
    public function show() {

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

            $main_query_est = "SELECT COUNT(C.QUESTIONNARIE_ID) TOTAL_EST FROM BBSEC2013_REPORTS C WHERE ";
            $main_query_tpe = "SELECT SUM(C.TOTAL_PERSON_ENGAGED) TOTAL_TPE FROM BBSEC2013_REPORTS C WHERE ";  

            #A----------------------------------------------------------------------------------------------------
/*            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total(" BETWEEN 1 AND 3"));
            $A_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total(" BETWEEN 1 AND 3"));
            $A_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947(" BETWEEN 1 AND 3"));
            $A_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947(" BETWEEN 1 AND 3"));
            $A_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959(" BETWEEN 1 AND 3"));
            $A_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959(" BETWEEN 1 AND 3"));
            $A_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970(" BETWEEN 1 AND 3"));
            $A_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970(" BETWEEN 1 AND 3"));
            $A_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979(" BETWEEN 1 AND 3"));
            $A_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979(" BETWEEN 1 AND 3"));
            $A_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989(" BETWEEN 1 AND 3"));
            $A_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989(" BETWEEN 1 AND 3"));
            $A_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999(" BETWEEN 1 AND 3"));
            $A_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999(" BETWEEN 1 AND 3"));
            $A_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009(" BETWEEN 1 AND 3"));
            $A_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009(" BETWEEN 1 AND 3"));
            $A_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013(" BETWEEN 1 AND 3"));
            $A_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013(" BETWEEN 1 AND 3"));
            $A_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported(" BETWEEN 1 AND 3"));
            $A_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported(" BETWEEN 1 AND 3"));
            $A_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];
*/

 #B----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 05 AND 09"));
            $B_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("BETWEEN 05 AND 09"));
            $B_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("BETWEEN 05 AND 09"));
            $B_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("BETWEEN 05 AND 09"));
            $B_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("BETWEEN 05 AND 09"));
            $B_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("BETWEEN 05 AND 09"));
            $B_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("BETWEEN 05 AND 09"));
            $B_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("BETWEEN 05 AND 09"));
            $B_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("BETWEEN 05 AND 09"));
            $B_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("BETWEEN 05 AND 09"));
            $B_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("BETWEEN 05 AND 09"));
            $B_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("BETWEEN 05 AND 09"));
            $B_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("BETWEEN 05 AND 09"));
            $B_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("BETWEEN 05 AND 09"));
            $B_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("BETWEEN 05 AND 09"));
            $B_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("BETWEEN 05 AND 09"));
            $B_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("BETWEEN 05 AND 09"));
            $B_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("BETWEEN 05 AND 09"));
            $B_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];


            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported(" BETWEEN 05 AND 09"));
            $B_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported(" BETWEEN 05 AND 09"));
            $B_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];




             #C----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 10 AND 33"));
            $C_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("BETWEEN 10 AND 33"));
            $C_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("BETWEEN 10 AND 33"));
            $C_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("BETWEEN 10 AND 33"));
            $C_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("BETWEEN 10 AND 33"));
            $C_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("BETWEEN 10 AND 33"));
            $C_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("BETWEEN 10 AND 33"));
            $C_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("BETWEEN 10 AND 33"));
            $C_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("BETWEEN 10 AND 33"));
            $C_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("BETWEEN 10 AND 33"));
            $C_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("BETWEEN 10 AND 33"));
            $C_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("BETWEEN 10 AND 33"));
            $C_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("BETWEEN 10 AND 33"));
            $C_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("BETWEEN 10 AND 33"));
            $C_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("BETWEEN 10 AND 33"));
            $C_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("BETWEEN 10 AND 33"));
            $C_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("BETWEEN 10 AND 33"));
            $C_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("BETWEEN 10 AND 33"));
            $C_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];


            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported(" BETWEEN 10 AND 33"));
            $C_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported(" BETWEEN 10 AND 33"));
            $C_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];



             #D----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("= 35"));
            $D_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("= 35"));
            $D_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("= 35"));
            $D_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("= 35"));
            $D_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("= 35"));
            $D_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("= 35"));
            $D_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("= 35"));
            $D_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("= 35"));
            $D_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("= 35"));
            $D_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("= 35"));
            $D_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("= 35"));
            $D_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("= 35"));
            $D_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("= 35"));
            $D_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("= 35"));
            $D_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("= 35"));
            $D_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("= 35"));
            $D_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("= 35"));
            $D_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("= 35"));
            $D_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported(" = 35 "));
            $D_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported(" = 35 "));
            $D_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];



             #E----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 36  AND 39"));
            $E_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("BETWEEN 36  AND 39"));
            $E_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("BETWEEN 36  AND 39"));
            $E_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("BETWEEN 36  AND 39"));
            $E_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("BETWEEN 36  AND 39"));
            $E_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("BETWEEN 36  AND 39"));
            $E_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("BETWEEN 36  AND 39"));
            $E_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("BETWEEN 36  AND 39"));
            $E_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("BETWEEN 36  AND 39"));
            $E_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("BETWEEN 36  AND 39"));
            $E_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("BETWEEN 36  AND 39"));
            $E_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("BETWEEN 36  AND 39"));
            $E_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("BETWEEN 36  AND 39"));
            $E_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("BETWEEN 36  AND 39"));
            $E_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("BETWEEN 36  AND 39"));
            $E_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("BETWEEN 36  AND 39"));
            $E_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("BETWEEN 36  AND 39"));
            $E_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("BETWEEN 36  AND 39"));
            $E_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported(" BETWEEN 36  AND 39"));
            $E_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported(" BETWEEN 36  AND 39"));
            $E_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];


             #F----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 41 AND 43"));
            $F_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("BETWEEN 41 AND 43"));
            $F_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("BETWEEN 41 AND 43"));
            $F_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("BETWEEN 41 AND 43"));
            $F_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("BETWEEN 41 AND 43"));
            $F_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("BETWEEN 41 AND 43"));
            $F_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("BETWEEN 41 AND 43"));
            $F_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("BETWEEN 41 AND 43"));
            $F_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("BETWEEN 41 AND 43"));
            $F_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("BETWEEN 41 AND 43"));
            $F_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("BETWEEN 41 AND 43"));
            $F_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("BETWEEN 41 AND 43"));
            $F_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("BETWEEN 41 AND 43"));
            $F_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("BETWEEN 41 AND 43"));
            $F_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("BETWEEN 41 AND 43"));
            $F_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("BETWEEN 41 AND 43"));
            $F_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("BETWEEN 41 AND 43"));
            $F_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("BETWEEN 41 AND 43"));
            $F_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported("BETWEEN 41 AND 43"));
            $F_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported("BETWEEN 41 AND 43"));
            $F_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];



             #G----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 45 AND 47"));
            $G_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("BETWEEN 45 AND 47"));
            $G_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("BETWEEN 45 AND 47"));
            $G_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("BETWEEN 45 AND 47"));
            $G_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("BETWEEN 45 AND 47"));
            $G_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("BETWEEN 45 AND 47"));
            $G_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("BETWEEN 45 AND 47"));
            $G_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("BETWEEN 45 AND 47"));
            $G_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("BETWEEN 45 AND 47"));
            $G_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("BETWEEN 45 AND 47"));
            $G_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("BETWEEN 45 AND 47"));
            $G_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("BETWEEN 45 AND 47"));
            $G_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("BETWEEN 45 AND 47"));
            $G_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("BETWEEN 45 AND 47"));
            $G_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("BETWEEN 45 AND 47"));
            $G_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("BETWEEN 45 AND 47"));
            $G_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("BETWEEN 45 AND 47"));
            $G_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("BETWEEN 45 AND 47"));
            $G_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported("BETWEEN 45 AND 47"));
            $G_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported("BETWEEN 45 AND 47"));
            $G_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];



            #H----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 49 AND 53"));
            $H_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("BETWEEN 49 AND 53"));
            $H_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("BETWEEN 49 AND 53"));
            $H_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("BETWEEN 49 AND 53"));
            $H_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("BETWEEN 49 AND 53"));
            $H_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("BETWEEN 49 AND 53"));
            $H_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("BETWEEN 49 AND 53"));
            $H_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("BETWEEN 49 AND 53"));
            $H_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("BETWEEN 49 AND 53"));
            $H_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("BETWEEN 49 AND 53"));
            $H_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("BETWEEN 49 AND 53"));
            $H_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("BETWEEN 49 AND 53"));
            $H_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("BETWEEN 49 AND 53"));
            $H_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("BETWEEN 49 AND 53"));
            $H_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("BETWEEN 49 AND 53"));
            $H_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("BETWEEN 49 AND 53"));
            $H_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("BETWEEN 49 AND 53"));
            $H_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("BETWEEN 49 AND 53"));
            $H_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported("BETWEEN 49 AND 53"));
            $H_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported("BETWEEN 49 AND 53"));
            $H_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];



            #I----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 55 AND 56"));
            $I_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("BETWEEN 55 AND 56"));
            $I_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("BETWEEN 55 AND 56"));
            $I_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("BETWEEN 55 AND 56"));
            $I_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("BETWEEN 55 AND 56"));
            $I_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("BETWEEN 55 AND 56"));
            $I_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("BETWEEN 55 AND 56"));
            $I_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("BETWEEN 55 AND 56"));
            $I_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("BETWEEN 55 AND 56"));
            $I_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("BETWEEN 55 AND 56"));
            $I_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("BETWEEN 55 AND 56"));
            $I_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("BETWEEN 55 AND 56"));
            $I_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("BETWEEN 55 AND 56"));
            $I_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("BETWEEN 55 AND 56"));
            $I_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("BETWEEN 55 AND 56"));
            $I_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("BETWEEN 55 AND 56"));
            $I_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("BETWEEN 55 AND 56"));
            $I_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("BETWEEN 55 AND 56"));
            $I_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported("BETWEEN 55 AND 56"));
            $I_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported("BETWEEN 55 AND 56"));
            $I_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];


             #J----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 58 AND 63"));
            $J_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("BETWEEN 58 AND 63"));
            $J_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("BETWEEN 58 AND 63"));
            $J_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("BETWEEN 58 AND 63"));
            $J_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("BETWEEN 58 AND 63"));
            $J_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("BETWEEN 58 AND 63"));
            $J_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("BETWEEN 58 AND 63"));
            $J_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("BETWEEN 58 AND 63"));
            $J_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("BETWEEN 58 AND 63"));
            $J_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("BETWEEN 58 AND 63"));
            $J_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("BETWEEN 58 AND 63"));
            $J_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("BETWEEN 58 AND 63"));
            $J_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("BETWEEN 58 AND 63"));
            $J_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("BETWEEN 58 AND 63"));
            $J_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("BETWEEN 58 AND 63"));
            $J_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("BETWEEN 58 AND 63"));
            $J_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("BETWEEN 58 AND 63"));
            $J_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("BETWEEN 58 AND 63"));
            $J_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];


            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported("BETWEEN 58 AND 63"));
            $J_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported("BETWEEN 58 AND 63"));
            $J_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];


            #K----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 64 AND 66"));
            $K_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("BETWEEN 64 AND 66"));
            $K_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("BETWEEN 64 AND 66"));
            $K_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("BETWEEN 64 AND 66"));
            $K_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("BETWEEN 64 AND 66"));
            $K_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("BETWEEN 64 AND 66"));
            $K_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("BETWEEN 64 AND 66"));
            $K_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("BETWEEN 64 AND 66"));
            $K_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("BETWEEN 64 AND 66"));
            $K_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("BETWEEN 64 AND 66"));
            $K_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("BETWEEN 64 AND 66"));
            $K_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("BETWEEN 64 AND 66"));
            $K_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("BETWEEN 64 AND 66"));
            $K_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("BETWEEN 64 AND 66"));
            $K_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("BETWEEN 64 AND 66"));
            $K_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("BETWEEN 64 AND 66"));
            $K_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("BETWEEN 64 AND 66"));
            $K_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("BETWEEN 64 AND 66"));
            $K_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported("BETWEEN 64 AND 66"));
            $K_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported("BETWEEN 64 AND 66"));
            $K_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];


             #L----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("= 68"));
            $L_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("= 68"));
            $L_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("= 68"));
            $L_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("= 68"));
            $L_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("= 68"));
            $L_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("= 68"));
            $L_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("= 68"));
            $L_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("= 68"));
            $L_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("= 68"));
            $L_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("= 68"));
            $L_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("= 68"));
            $L_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("= 68"));
            $L_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("= 68"));
            $L_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("= 68"));
            $L_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("= 68"));
            $L_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("= 68"));
            $L_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("= 68"));
            $L_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("= 68"));
            $L_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported("= 68"));
            $L_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported("= 68"));
            $L_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];



             #M----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 69 AND 75"));
            $M_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("BETWEEN 69 AND 75"));
            $M_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("BETWEEN 69 AND 75"));
            $M_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("BETWEEN 69 AND 75"));
            $M_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("BETWEEN 69 AND 75"));
            $M_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("BETWEEN 69 AND 75"));
            $M_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("BETWEEN 69 AND 75"));
            $M_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("BETWEEN 69 AND 75"));
            $M_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("BETWEEN 69 AND 75"));
            $M_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("BETWEEN 69 AND 75"));
            $M_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("BETWEEN 69 AND 75"));
            $M_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("BETWEEN 69 AND 75"));
            $M_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("BETWEEN 69 AND 75"));
            $M_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("BETWEEN 69 AND 75"));
            $M_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("BETWEEN 69 AND 75"));
            $M_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("BETWEEN 69 AND 75"));
            $M_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("BETWEEN 69 AND 75"));
            $M_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("BETWEEN 69 AND 75"));
            $M_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];


            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported("BETWEEN 69 AND 75"));
            $M_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported("BETWEEN 69 AND 75"));
            $M_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];


             #N----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 77  AND 82"));
            $N_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("BETWEEN 77  AND 82"));
            $N_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("BETWEEN 77  AND 82"));
            $N_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("BETWEEN 77  AND 82"));
            $N_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("BETWEEN 77  AND 82"));
            $N_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("BETWEEN 77  AND 82"));
            $N_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("BETWEEN 77  AND 82"));
            $N_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("BETWEEN 77  AND 82"));
            $N_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("BETWEEN 77  AND 82"));
            $N_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("BETWEEN 77  AND 82"));
            $N_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("BETWEEN 77  AND 82"));
            $N_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("BETWEEN 77  AND 82"));
            $N_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("BETWEEN 77  AND 82"));
            $N_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("BETWEEN 77  AND 82"));
            $N_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("BETWEEN 77  AND 82"));
            $N_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("BETWEEN 77  AND 82"));
            $N_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("BETWEEN 77  AND 82"));
            $N_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("BETWEEN 77  AND 82"));
            $N_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported("BETWEEN 77  AND 82"));
            $N_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported("BETWEEN 77  AND 82"));
            $N_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];


             #O----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("= 84"));
            $O_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("= 84"));
            $O_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("= 84"));
            $O_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("= 84"));
            $O_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("= 84"));
            $O_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("= 84"));
            $O_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("= 84"));
            $O_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("= 84"));
            $O_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("= 84"));
            $O_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("= 84"));
            $O_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("= 84"));
            $O_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("= 84"));
            $O_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("= 84"));
            $O_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("= 84"));
            $O_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("= 84"));
            $O_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("= 84"));
            $O_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("= 84"));
            $O_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("= 84"));
            $O_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported("= 84"));
            $O_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported("= 84"));
            $O_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];


             #P----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("= 85"));
            $P_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("= 85"));
            $P_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("= 85"));
            $P_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("= 85"));
            $P_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("= 85"));
            $P_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("= 85"));
            $P_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("= 85"));
            $P_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("= 85"));
            $P_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("= 85"));
            $P_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("= 85"));
            $P_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("= 85"));
            $P_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("= 85"));
            $P_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("= 85"));
            $P_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("= 85"));
            $P_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("= 85"));
            $P_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("= 85"));
            $P_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("= 85"));
            $P_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("= 85"));
            $P_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported("= 85"));
            $P_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported("= 85"));
            $P_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];


             #Q----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 86 AND 88"));
            $Q_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("BETWEEN 86 AND 88"));
            $Q_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("BETWEEN 86 AND 88"));
            $Q_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("BETWEEN 86 AND 88"));
            $Q_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("BETWEEN 86 AND 88"));
            $Q_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("BETWEEN 86 AND 88"));
            $Q_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("BETWEEN 86 AND 88"));
            $Q_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("BETWEEN 86 AND 88"));
            $Q_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("BETWEEN 86 AND 88"));
            $Q_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("BETWEEN 86 AND 88"));
            $Q_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("BETWEEN 86 AND 88"));
            $Q_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("BETWEEN 86 AND 88"));
            $Q_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("BETWEEN 86 AND 88"));
            $Q_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("BETWEEN 86 AND 88"));
            $Q_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("BETWEEN 86 AND 88"));
            $Q_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("BETWEEN 86 AND 88"));
            $Q_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("BETWEEN 86 AND 88"));
            $Q_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("BETWEEN 86 AND 88"));
            $Q_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];


            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported("BETWEEN 86 AND 88"));
            $Q_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported("BETWEEN 86 AND 88"));
            $Q_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];


             #R----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 90 AND 93"));
            $R_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("BETWEEN 90 AND 93"));
            $R_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("BETWEEN 90 AND 93"));
            $R_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("BETWEEN 90 AND 93"));
            $R_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("BETWEEN 90 AND 93"));
            $R_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("BETWEEN 90 AND 93"));
            $R_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("BETWEEN 90 AND 93"));
            $R_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("BETWEEN 90 AND 93"));
            $R_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("BETWEEN 90 AND 93"));
            $R_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("BETWEEN 90 AND 93"));
            $R_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("BETWEEN 90 AND 93"));
            $R_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("BETWEEN 90 AND 93"));
            $R_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("BETWEEN 90 AND 93"));
            $R_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("BETWEEN 90 AND 93"));
            $R_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("BETWEEN 90 AND 93"));
            $R_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("BETWEEN 90 AND 93"));
            $R_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("BETWEEN 90 AND 93"));
            $R_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("BETWEEN 90 AND 93"));
            $R_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported("BETWEEN 90 AND 93"));
            $R_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported("BETWEEN 90 AND 93"));
            $R_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];



            #S----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 94 AND 96"));
            $S_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("BETWEEN 94 AND 96"));
            $S_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-1947
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("BETWEEN 94 AND 96"));
            $S_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("BETWEEN 94 AND 96"));
            $S_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-1959
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("BETWEEN 94 AND 96"));
            $S_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("BETWEEN 94 AND 96"));
            $S_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-1970
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("BETWEEN 94 AND 96"));
            $S_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("BETWEEN 94 AND 96"));
            $S_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("BETWEEN 94 AND 96"));
            $S_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("BETWEEN 94 AND 96"));
            $S_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("BETWEEN 94 AND 96"));
            $S_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("BETWEEN 94 AND 96"));
            $S_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("BETWEEN 94 AND 96"));
            $S_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("BETWEEN 94 AND 96"));
            $S_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("BETWEEN 94 AND 96"));
            $S_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("BETWEEN 94 AND 96"));
            $S_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("BETWEEN 94 AND 96"));
            $S_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("BETWEEN 94 AND 96"));
            $S_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];


            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported("BETWEEN 94 AND 96"));
            $S_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported("BETWEEN 94 AND 96"));
            $S_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];


             #T----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 97 AND 98"));
            $T_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("BETWEEN 97 AND 98"));
            $T_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("BETWEEN 97 AND 98"));
            $T_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("BETWEEN 97 AND 98"));
            $T_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("BETWEEN 97 AND 98"));
            $T_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("BETWEEN 97 AND 98"));
            $T_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("BETWEEN 97 AND 98"));
            $T_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("BETWEEN 97 AND 98"));
            $T_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("BETWEEN 97 AND 98"));
            $T_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("BETWEEN 97 AND 98"));
            $T_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("BETWEEN 97 AND 98"));
            $T_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("BETWEEN 97 AND 98"));
            $T_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("BETWEEN 97 AND 98"));
            $T_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("BETWEEN 97 AND 98"));
            $T_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("BETWEEN 97 AND 98"));
            $T_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("BETWEEN 97 AND 98"));
            $T_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("BETWEEN 97 AND 98"));
            $T_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("BETWEEN 97 AND 98"));
            $T_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported("BETWEEN 97 AND 98"));
            $T_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported("BETWEEN 97 AND 98"));
            $T_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];



             #U----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("= 99"));
            $U_result_est_total = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_total("= 99"));
            $U_result_tpe_total = (int) $result_tpe[0][0]['TOTAL_TPE']; 

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_before_1947("= 99"));
            $U_result_est_1947 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_before_1947("= 99"));
            $U_result_tpe_1947 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1947_1959("= 99"));
            $U_result_est_1947_1959 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1947_1959("= 99"));
            $U_result_tpe_1947_1959 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1960_1970("= 99"));
            $U_result_est_1960_1970 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1960_1970("= 99"));
            $U_result_tpe_1960_1970 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1971_1979("= 99"));
            $U_result_est_1971_1979= $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1971_1979("= 99"));
            $U_result_tpe_1971_1979= (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1980_1989("= 99"));
            $U_result_est_1980_1989 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1980_1989("= 99"));
            $U_result_tpe_1980_1989 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_1990_1999("= 99"));
            $U_result_est_1990_1999 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_1990_1999("= 99"));
            $U_result_tpe_1990_1999 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2000_2009("= 99"));
            $U_result_est_2000_2009 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2000_2009("= 99"));
            $U_result_tpe_2000_2009 = (int) $result_tpe[0][0]['TOTAL_TPE'];
            #-
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_bet_2010_2013("= 99"));
            $U_result_est_2010_2013 = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_bet_2010_2013("= 99"));
            $U_result_tpe_2010_2013 = (int) $result_tpe[0][0]['TOTAL_TPE'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_not_reported("= 99"));
            $U_result_est_not_reported = $result_est[0][0]['TOTAL_EST'];  

            $result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_not_reported("= 99"));
            $U_result_tpe_not_reported = (int) $result_tpe[0][0]['TOTAL_TPE'];



        }

$this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result_est_total', 'result_tpe_toal','result_est_1947', 'result_tpe_1947',

'A_result_est_total','A_result_tpe_total','A_result_est_1947','A_result_tpe_1947',
'A_result_est_1947_1959','A_result_tpe_1947_1959','A_result_est_1960_1970','A_result_tpe_1960_1970',
'A_result_est_1971_1979','A_result_tpe_1971_1979','A_result_est_1980_1989','A_result_tpe_1980_1989',
'A_result_est_1990_1999','A_result_tpe_1990_1999','A_result_est_2000_2009','A_result_tpe_2000_2009',
'A_result_est_2010_2013','A_result_tpe_2010_2013', 'A_result_est_not_reported', 'A_result_tpe_not_reported',

'B_result_est_total','B_result_tpe_total','B_result_est_1947','B_result_tpe_1947',
'B_result_est_1947_1959','B_result_tpe_1947_1959','B_result_est_1960_1970','B_result_tpe_1960_1970',
'B_result_est_1971_1979','B_result_tpe_1971_1979','B_result_est_1980_1989','B_result_tpe_1980_1989',
'B_result_est_1990_1999','B_result_tpe_1990_1999','B_result_est_2000_2009','B_result_tpe_2000_2009',
'B_result_est_2010_2013','B_result_tpe_2010_2013',  'B_result_est_not_reported', 'B_result_tpe_not_reported',

'C_result_est_total','C_result_tpe_total','C_result_est_1947','C_result_tpe_1947',
'C_result_est_1947_1959','C_result_tpe_1947_1959','C_result_est_1960_1970','C_result_tpe_1960_1970',
'C_result_est_1971_1979','C_result_tpe_1971_1979','C_result_est_1980_1989','C_result_tpe_1980_1989',
'C_result_est_1990_1999','C_result_tpe_1990_1999','C_result_est_2000_2009','C_result_tpe_2000_2009',
'C_result_est_2010_2013','C_result_tpe_2010_2013',  'C_result_est_not_reported', 'C_result_tpe_not_reported',

'D_result_est_total','D_result_tpe_total','D_result_est_1947','D_result_tpe_1947',
'D_result_est_1947_1959','D_result_tpe_1947_1959','D_result_est_1960_1970','D_result_tpe_1960_1970',
'D_result_est_1971_1979','D_result_tpe_1971_1979','D_result_est_1980_1989','D_result_tpe_1980_1989',
'D_result_est_1990_1999','D_result_tpe_1990_1999','D_result_est_2000_2009','D_result_tpe_2000_2009',
'D_result_est_2010_2013','D_result_tpe_2010_2013',  'D_result_est_not_reported', 'D_result_tpe_not_reported',

'E_result_est_total','E_result_tpe_total','E_result_est_1947','E_result_tpe_1947',
'E_result_est_1947_1959','E_result_tpe_1947_1959','E_result_est_1960_1970','E_result_tpe_1960_1970',
'E_result_est_1971_1979','E_result_tpe_1971_1979','E_result_est_1980_1989','E_result_tpe_1980_1989',
'E_result_est_1990_1999','E_result_tpe_1990_1999','E_result_est_2000_2009','E_result_tpe_2000_2009',
'E_result_est_2010_2013','E_result_tpe_2010_2013',  'E_result_est_not_reported', 'E_result_tpe_not_reported',

'F_result_est_total','F_result_tpe_total','F_result_est_1947','F_result_tpe_1947',
'F_result_est_1947_1959','F_result_tpe_1947_1959','F_result_est_1960_1970','F_result_tpe_1960_1970',
'F_result_est_1971_1979','F_result_tpe_1971_1979','F_result_est_1980_1989','F_result_tpe_1980_1989',
'F_result_est_1990_1999','F_result_tpe_1990_1999','F_result_est_2000_2009','F_result_tpe_2000_2009',
'F_result_est_2010_2013','F_result_tpe_2010_2013',  'F_result_est_not_reported', 'F_result_tpe_not_reported',

'G_result_est_total','G_result_tpe_total','G_result_est_1947','G_result_tpe_1947',
'G_result_est_1947_1959','G_result_tpe_1947_1959','G_result_est_1960_1970','G_result_tpe_1960_1970',
'G_result_est_1971_1979','G_result_tpe_1971_1979','G_result_est_1980_1989','G_result_tpe_1980_1989',
'G_result_est_1990_1999','G_result_tpe_1990_1999','G_result_est_2000_2009','G_result_tpe_2000_2009',
'G_result_est_2010_2013','G_result_tpe_2010_2013',  'G_result_est_not_reported', 'G_result_tpe_not_reported',

'H_result_est_total','H_result_tpe_total','H_result_est_1947','H_result_tpe_1947',
'H_result_est_1947_1959','H_result_tpe_1947_1959','H_result_est_1960_1970','H_result_tpe_1960_1970',
'H_result_est_1971_1979','H_result_tpe_1971_1979','H_result_est_1980_1989','H_result_tpe_1980_1989',
'H_result_est_1990_1999','H_result_tpe_1990_1999','H_result_est_2000_2009','H_result_tpe_2000_2009',
'H_result_est_2010_2013','H_result_tpe_2010_2013',  'H_result_est_not_reported', 'H_result_tpe_not_reported',

'I_result_est_total','I_result_tpe_total','I_result_est_1947','I_result_tpe_1947',
'I_result_est_1947_1959','I_result_tpe_1947_1959','I_result_est_1960_1970','I_result_tpe_1960_1970',
'I_result_est_1971_1979','I_result_tpe_1971_1979','I_result_est_1980_1989','I_result_tpe_1980_1989',
'I_result_est_1990_1999','I_result_tpe_1990_1999','I_result_est_2000_2009','I_result_tpe_2000_2009',
'I_result_est_2010_2013','I_result_tpe_2010_2013',  'I_result_est_not_reported', 'I_result_tpe_not_reported',

'J_result_est_total','J_result_tpe_total','J_result_est_1947','J_result_tpe_1947',
'J_result_est_1947_1959','J_result_tpe_1947_1959','J_result_est_1960_1970','J_result_tpe_1960_1970',
'J_result_est_1971_1979','J_result_tpe_1971_1979','J_result_est_1980_1989','J_result_tpe_1980_1989',
'J_result_est_1990_1999','J_result_tpe_1990_1999','J_result_est_2000_2009','J_result_tpe_2000_2009',
'J_result_est_2010_2013','J_result_tpe_2010_2013',  'J_result_est_not_reported', 'J_result_tpe_not_reported',


'K_result_est_total','K_result_tpe_total','K_result_est_1947','K_result_tpe_1947',
'K_result_est_1947_1959','K_result_tpe_1947_1959','K_result_est_1960_1970','K_result_tpe_1960_1970',
'K_result_est_1971_1979','K_result_tpe_1971_1979','K_result_est_1980_1989','K_result_tpe_1980_1989',
'K_result_est_1990_1999','K_result_tpe_1990_1999','K_result_est_2000_2009','K_result_tpe_2000_2009',
'K_result_est_2010_2013','K_result_tpe_2010_2013',  'K_result_est_not_reported', 'L_result_tpe_not_reported',


'L_result_est_total','L_result_tpe_total','L_result_est_1947','L_result_tpe_1947',
'L_result_est_1947_1959','L_result_tpe_1947_1959','L_result_est_1960_1970','L_result_tpe_1960_1970',
'L_result_est_1971_1979','L_result_tpe_1971_1979','L_result_est_1980_1989','L_result_tpe_1980_1989',
'L_result_est_1990_1999','L_result_tpe_1990_1999','L_result_est_2000_2009','L_result_tpe_2000_2009',
'L_result_est_2010_2013','L_result_tpe_2010_2013',  'L_result_est_not_reported', 'L_result_tpe_not_reported',


'M_result_est_total','M_result_tpe_total','M_result_est_1947','M_result_tpe_1947',
'M_result_est_1947_1959','M_result_tpe_1947_1959','M_result_est_1960_1970','M_result_tpe_1960_1970',
'M_result_est_1971_1979','M_result_tpe_1971_1979','M_result_est_1980_1989','M_result_tpe_1980_1989',
'M_result_est_1990_1999','M_result_tpe_1990_1999','M_result_est_2000_2009','M_result_tpe_2000_2009',
'M_result_est_2010_2013','M_result_tpe_2010_2013',  'M_result_est_not_reported', 'M_result_tpe_not_reported',


'N_result_est_total','N_result_tpe_total','N_result_est_1947','N_result_tpe_1947',
'N_result_est_1947_1959','N_result_tpe_1947_1959','N_result_est_1960_1970','N_result_tpe_1960_1970',
'N_result_est_1971_1979','N_result_tpe_1971_1979','N_result_est_1980_1989','N_result_tpe_1980_1989',
'N_result_est_1990_1999','N_result_tpe_1990_1999','N_result_est_2000_2009','N_result_tpe_2000_2009',
'N_result_est_2010_2013','N_result_tpe_2010_2013',  'N_result_est_not_reported', 'N_result_tpe_not_reported',


'O_result_est_total','O_result_tpe_total','O_result_est_1947','O_result_tpe_1947',
'O_result_est_1947_1959','O_result_tpe_1947_1959','O_result_est_1960_1970','O_result_tpe_1960_1970',
'O_result_est_1971_1979','O_result_tpe_1971_1979','O_result_est_1980_1989','O_result_tpe_1980_1989',
'O_result_est_1990_1999','O_result_tpe_1990_1999','O_result_est_2000_2009','O_result_tpe_2000_2009',
'O_result_est_2010_2013','O_result_tpe_2010_2013',  'O_result_est_not_reported', 'O_result_tpe_not_reported',

'P_result_est_total','P_result_tpe_total','P_result_est_1947','P_result_tpe_1947',
'P_result_est_1947_1959','P_result_tpe_1947_1959','P_result_est_1960_1970','P_result_tpe_1960_1970',
'P_result_est_1971_1979','P_result_tpe_1971_1979','P_result_est_1980_1989','P_result_tpe_1980_1989',
'P_result_est_1990_1999','P_result_tpe_1990_1999','P_result_est_2000_2009','P_result_tpe_2000_2009',
'P_result_est_2010_2013','P_result_tpe_2010_2013',  'P_result_est_not_reported', 'P_result_tpe_not_reported',


'Q_result_est_total','Q_result_tpe_total','Q_result_est_1947','Q_result_tpe_1947',
'Q_result_est_1947_1959','Q_result_tpe_1947_1959','Q_result_est_1960_1970','Q_result_tpe_1960_1970',
'Q_result_est_1971_1979','Q_result_tpe_1971_1979','Q_result_est_1980_1989','Q_result_tpe_1980_1989',
'Q_result_est_1990_1999','Q_result_tpe_1990_1999','Q_result_est_2000_2009','Q_result_tpe_2000_2009',
'Q_result_est_2010_2013','Q_result_tpe_2010_2013',  'Q_result_est_not_reported', 'Q_result_tpe_not_reported',


'R_result_est_total','R_result_tpe_total','R_result_est_1947','R_result_tpe_1947',
'R_result_est_1947_1959','R_result_tpe_1947_1959','R_result_est_1960_1970','R_result_tpe_1960_1970',
'R_result_est_1971_1979','R_result_tpe_1971_1979','R_result_est_1980_1989','R_result_tpe_1980_1989',
'R_result_est_1990_1999','R_result_tpe_1990_1999','R_result_est_2000_2009','R_result_tpe_2000_2009',
'R_result_est_2010_2013','R_result_tpe_2010_2013',  'R_result_est_not_reported', 'R_result_tpe_not_reported',


'S_result_est_total','S_result_tpe_total','S_result_est_1947','S_result_tpe_1947',
'S_result_est_1947_1959','S_result_tpe_1947_1959','S_result_est_1960_1970','S_result_tpe_1960_1970',
'S_result_est_1971_1979','S_result_tpe_1971_1979','S_result_est_1980_1989','S_result_tpe_1980_1989',
'S_result_est_1990_1999','S_result_tpe_1990_1999','S_result_est_2000_2009','S_result_tpe_2000_2009',
'S_result_est_2010_2013','S_result_tpe_2010_2013',  'S_result_est_not_reported', 'S_result_tpe_not_reported',


'T_result_est_total','T_result_tpe_total','T_result_est_1947','T_result_tpe_1947',
'T_result_est_1947_1959','T_result_tpe_1947_1959','T_result_est_1960_1970','T_result_tpe_1960_1970',
'T_result_est_1971_1979','T_result_tpe_1971_1979','T_result_est_1980_1989','T_result_tpe_1980_1989',
'T_result_est_1990_1999','T_result_tpe_1990_1999','T_result_est_2000_2009','T_result_tpe_2000_2009',
'T_result_est_2010_2013','T_result_tpe_2010_2013',  'T_result_est_not_reported', 'T_result_tpe_not_reported',


'U_result_est_total','U_result_tpe_total','U_result_est_1947','U_result_tpe_1947',
'U_result_est_1947_1959','U_result_tpe_1947_1959','U_result_est_1960_1970','U_result_tpe_1960_1970',
'U_result_est_1971_1979','U_result_tpe_1971_1979','U_result_est_1980_1989','U_result_tpe_1980_1989',
'U_result_est_1990_1999','U_result_tpe_1990_1999','U_result_est_2000_2009','U_result_tpe_2000_2009',
'U_result_est_2010_2013','U_result_tpe_2010_2013' , 'U_result_est_not_reported', 'U_result_tpe_not_reported'

));   

    }

}

?>