<?php

class ReportsTable12Controller extends AppController {

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
            $query = "SELECT (D.DIVN_CODE) AS DIVN_CODE, (D.DIVN_CODE_DESC_BNG) AS DIVN_CODE_DESC_BNG, COUNT(R.QUESTIONNARIE_ID) AS TOTAL_EST FROM IND_CODE_DIVNS D LEFT JOIN BBSEC2013_REPORTS R ON (SUBSTR(R.Q6_IND_CODE_CLASS_CODE,1,2) = D.DIVN_CODE) WHERE ".$where." AND SUBSTR(R.Q6_IND_CODE_CLASS_CODE,1,2) = '".$code."' GROUP BY D.DIVN_CODE, D.DIVN_CODE_DESC_BNG ";
        else
            $query = "SELECT (D.DIVN_CODE) AS DIVN_CODE, COUNT(R.QUESTIONNARIE_ID) AS TOTAL_EST FROM IND_CODE_DIVNS D LEFT JOIN BBSEC2013_REPORTS R ON (SUBSTR(R.Q6_IND_CODE_CLASS_CODE,1,2) = D.DIVN_CODE) WHERE ".$where." AND SUBSTR(R.Q6_IND_CODE_CLASS_CODE,1,2) = '".$code."' AND ".$condition." GROUP BY D.DIVN_CODE ";
        $result = $this -> Report -> query($query);
        return $result[0];
    }



    public function _total($ea)
        {
            $where = " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
            return $where;
        }

    public function _mode_retail($ea)
        {
            $where = "";
            $where .= " AND C.Q13_SALE_PROCEDURE = 1 ";
            $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
            return $where;
        }

    public function _mode_wholesale($ea)
        {
            $where = "";
            $where .= " AND C.Q13_SALE_PROCEDURE = 2 ";
            $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
            return $where;
        }

    public function _mode_not_applicable($ea)
        {
            $where = "";
            $where .= " AND C.Q13_SALE_PROCEDURE = 3 ";
            $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
            return $where;
        }

    public function _as_daily ($ea)
            {
                $where = "";
                $where .= " AND C.Q14_IS_ACCOUNTABLE = 1 AND Q14_ACCOUNTABLE_DURATION = 1 ";
                $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                return $where;
            }

    public function _as_monthly ($ea)
            {
                $where = "";
               $where .= " AND C.Q14_IS_ACCOUNTABLE = 1 AND C.Q14_ACCOUNTABLE_DURATION = 2 ";
                $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                return $where;
            }

    public function _as_annual ($ea)
            {
                $where = "";
                $where .= " AND C.Q14_IS_ACCOUNTABLE = 1 AND C.Q14_ACCOUNTABLE_DURATION = 3 ";
                $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                return $where;
            }


    public function _as_others ($ea)
            {
                $where = "";
                $where .= " AND C.Q14_IS_ACCOUNTABLE = 1 AND C.Q14_ACCOUNTABLE_DURATION = 4 ";
                $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                return $where;
            }


    public function _as_no ($ea)
            {
                $where = "";
                $where .= " AND C.Q14_IS_ACCOUNTABLE = 2";
                $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                return $where;
            }


    public function _ps_cheque ($ea)
            {
                $where = "";
                $where .= " AND C.Q15_SALARY_INSTR = 1 ";
                $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                return $where;
            }


    public function _ps_cash_daily ($ea)
            {
                $where = "";
                $where .= " AND C.Q15_SALARY_INSTR = 2 AND C.Q15_SALARY_PERIOD = 1";
                $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                return $where;
            }

    public function _ps_cash_weekly ($ea)
            {
                $where = "";
                $where .= " AND C.Q15_SALARY_INSTR = 2 AND C.Q15_SALARY_PERIOD = 2";
                $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                return $where;
            }

    public function _ps_cash_monthly ($ea)
            {
                $where = "";
               $where .= " AND C.Q15_SALARY_INSTR = 2 AND C.Q15_SALARY_PERIOD = 3";
                $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                return $where;
            }


    public function _ps_cash_others ($ea)
            {
                $where = "";
                $where .= " AND C.Q15_SALARY_INSTR = 2 AND C.Q15_SALARY_PERIOD = 4";
                $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                return $where;
            }

    public function _ps_cash_not_app ($ea)
            {
                $where = "";
                $where .= " AND C.Q15_SALARY_INSTR = 2 AND C.Q15_SALARY_PERIOD = 5";
                $where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
                return $where;
            }





    public function _ps_other ($ea)
            {
                $where = "";
                $where .= " AND C.Q15_SALARY_INSTR = 3";
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
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total(" BETWEEN 1 AND 3"));
            $A_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail(" BETWEEN 1 AND 3"));
            $A_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale(" BETWEEN 1 AND 3"));
            $A_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable(" BETWEEN 1 AND 3"));
            $A_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily(" BETWEEN 1 AND 3"));
            $A_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly(" BETWEEN 1 AND 3"));
            $A_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual(" BETWEEN 1 AND 3"));
            $A_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others(" BETWEEN 1 AND 3"));
            $A_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no(" BETWEEN 1 AND 3"));
            $A_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque(" BETWEEN 1 AND 3"));
            $A_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily(" BETWEEN 1 AND 3"));
            $A_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly(" BETWEEN 1 AND 3"));
            $A_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others(" BETWEEN 1 AND 3"));
            $A_ps_cash_others = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app(" BETWEEN 1 AND 3"));
            $A_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];    

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly(" BETWEEN 1 AND 3"));
            $A_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other(" BETWEEN 1 AND 3"));
            $A_ps_other = $result_est[0][0]['TOTAL_EST']; 



             #B----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 05 AND 09"));
            $B_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("BETWEEN 05 AND 09"));
            $B_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("BETWEEN 05 AND 09"));
            $B_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("BETWEEN 05 AND 09"));
            $B_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("BETWEEN 05 AND 09"));
            $B_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("BETWEEN 05 AND 09"));
            $B_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("BETWEEN 05 AND 09"));
            $B_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("BETWEEN 05 AND 09"));
            $B_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("BETWEEN 05 AND 09"));
            $B_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("BETWEEN 05 AND 09"));
            $B_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("BETWEEN 05 AND 09"));
            $B_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("BETWEEN 05 AND 09"));
            $B_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("BETWEEN 05 AND 09"));
            $B_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("BETWEEN 05 AND 09"));
            $B_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app(" BETWEEN 05 AND 09"));
            $B_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];    

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("BETWEEN 05 AND 09"));
            $B_ps_other = $result_est[0][0]['TOTAL_EST'];  

             #C----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 10 AND 33"));
            $C_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("BETWEEN 10 AND 33"));
            $C_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("BETWEEN 10 AND 33"));
            $C_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("BETWEEN 10 AND 33"));
            $C_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("BETWEEN 10 AND 33"));
            $C_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("BETWEEN 10 AND 33"));
            $C_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("BETWEEN 10 AND 33"));
            $C_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("BETWEEN 10 AND 33"));
            $C_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("BETWEEN 10 AND 33"));
            $C_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("BETWEEN 10 AND 33"));
            $C_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("BETWEEN 10 AND 33"));
            $C_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("BETWEEN 10 AND 33"));
            $C_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("BETWEEN 10 AND 33"));
            $C_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("BETWEEN 10 AND 33"));
            $C_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  

             $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app(" BETWEEN 10 AND 33"));
            $C_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("BETWEEN 10 AND 33"));
            $C_ps_other = $result_est[0][0]['TOTAL_EST'];  

             #D----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("= 35"));
            $D_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("= 35"));
            $D_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("= 35"));
            $D_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("= 35"));
            $D_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("= 35"));
            $D_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("= 35"));
            $D_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("= 35"));
            $D_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("= 35"));
            $D_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("= 35"));
            $D_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("= 35"));
            $D_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("= 35"));
            $D_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("= 35"));
            $D_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("= 35"));
            $D_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("= 35"));
            $D_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  

             $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app(" = 35"));
            $D_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];



            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("= 35"));
            $D_ps_other = $result_est[0][0]['TOTAL_EST'];  


             #E----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 36  AND 39"));
            $E_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("BETWEEN 36  AND 39"));
            $E_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("BETWEEN 36  AND 39"));
            $E_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("BETWEEN 36  AND 39"));
            $E_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("BETWEEN 36  AND 39"));
            $E_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("BETWEEN 36  AND 39"));
            $E_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("BETWEEN 36  AND 39"));
            $E_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("BETWEEN 36  AND 39"));
            $E_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("BETWEEN 36  AND 39"));
            $E_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("BETWEEN 36  AND 39"));
            $E_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("BETWEEN 36  AND 39"));
            $E_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("BETWEEN 36  AND 39"));
            $E_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("BETWEEN 36  AND 39"));
            $E_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("BETWEEN 36  AND 39"));
            $E_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  

             $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app(" BETWEEN 36  AND 39"));
            $E_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];


            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("BETWEEN 36  AND 39"));
            $E_ps_other = $result_est[0][0]['TOTAL_EST'];  

             #F----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 41 AND 43"));
            $F_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("BETWEEN 41 AND 43"));
            $F_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("BETWEEN 41 AND 43"));
            $F_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("BETWEEN 41 AND 43"));
            $F_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("BETWEEN 41 AND 43"));
            $F_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("BETWEEN 41 AND 43"));
            $F_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("BETWEEN 41 AND 43"));
            $F_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("BETWEEN 41 AND 43"));
            $F_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("BETWEEN 41 AND 43"));
            $F_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("BETWEEN 41 AND 43"));
            $F_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("BETWEEN 41 AND 43"));
            $F_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("BETWEEN 41 AND 43"));
            $F_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("BETWEEN 41 AND 43"));
            $F_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("BETWEEN 41 AND 43"));
            $F_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  


             $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app(" BETWEEN 41 AND 43"));
            $F_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];



            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("BETWEEN 41 AND 43"));
            $F_ps_other = $result_est[0][0]['TOTAL_EST'];  


             #G----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 45 AND 47"));
            $G_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("BETWEEN 45 AND 47"));
            $G_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("BETWEEN 45 AND 47"));
            $G_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("BETWEEN 45 AND 47"));
            $G_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("BETWEEN 45 AND 47"));
            $G_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("BETWEEN 45 AND 47"));
            $G_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("BETWEEN 45 AND 47"));
            $G_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("BETWEEN 45 AND 47"));
            $G_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("BETWEEN 45 AND 47"));
            $G_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("BETWEEN 45 AND 47"));
            $G_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("BETWEEN 45 AND 47"));
            $G_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("BETWEEN 45 AND 47"));
            $G_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("BETWEEN 45 AND 47"));
            $G_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("BETWEEN 45 AND 47"));
            $G_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  

             $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app(" BETWEEN 45 AND 47"));
            $G_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("BETWEEN 45 AND 47"));
            $G_ps_other = $result_est[0][0]['TOTAL_EST'];  

             #H----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 49 AND 53"));
            $H_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("BETWEEN 49 AND 53"));
            $H_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("BETWEEN 49 AND 53"));
            $H_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("BETWEEN 49 AND 53"));
            $H_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("BETWEEN 49 AND 53"));
            $H_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("BETWEEN 49 AND 53"));
            $H_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("BETWEEN 49 AND 53"));
            $H_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("BETWEEN 49 AND 53"));
            $H_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("BETWEEN 49 AND 53"));
            $H_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("BETWEEN 49 AND 53"));
            $H_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("BETWEEN 49 AND 53"));
            $H_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("BETWEEN 49 AND 53"));
            $H_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("BETWEEN 49 AND 53"));
            $H_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("BETWEEN 49 AND 53"));
            $H_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  


             $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app("BETWEEN 49 AND 53"));
            $H_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];



            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("BETWEEN 49 AND 53"));
            $H_ps_other = $result_est[0][0]['TOTAL_EST'];  

             #I----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 55 AND 56"));
            $I_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("BETWEEN 55 AND 56"));
            $I_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("BETWEEN 55 AND 56"));
            $I_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("BETWEEN 55 AND 56"));
            $I_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("BETWEEN 55 AND 56"));
            $I_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("BETWEEN 55 AND 56"));
            $I_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("BETWEEN 55 AND 56"));
            $I_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("BETWEEN 55 AND 56"));
            $I_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("BETWEEN 55 AND 56"));
            $I_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("BETWEEN 55 AND 56"));
            $I_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("BETWEEN 55 AND 56"));
            $I_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("BETWEEN 55 AND 56"));
            $I_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("BETWEEN 55 AND 56"));
            $I_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("BETWEEN 55 AND 56"));
            $I_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];


             $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app(" BETWEEN 55 AND 56"));
            $I_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];

  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("BETWEEN 55 AND 56"));
            $I_ps_other = $result_est[0][0]['TOTAL_EST'];  

             #J----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 58 AND 63"));
            $J_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("BETWEEN 58 AND 63"));
            $J_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("BETWEEN 58 AND 63"));
            $J_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("BETWEEN 58 AND 63"));
            $J_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("BETWEEN 58 AND 63"));
            $J_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("BETWEEN 58 AND 63"));
            $J_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("BETWEEN 58 AND 63"));
            $J_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("BETWEEN 58 AND 63"));
            $J_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("BETWEEN 58 AND 63"));
            $J_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("BETWEEN 58 AND 63"));
            $J_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("BETWEEN 58 AND 63"));
            $J_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("BETWEEN 58 AND 63"));
            $J_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("BETWEEN 58 AND 63"));
            $J_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("BETWEEN 58 AND 63"));
            $J_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  


             $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app(" BETWEEN 58 AND 63"));
            $J_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];



            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("BETWEEN 58 AND 63"));
            $J_ps_other = $result_est[0][0]['TOTAL_EST'];  

             #K----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 64 AND 66"));
            $K_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("BETWEEN 64 AND 66"));
            $K_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("BETWEEN 64 AND 66"));
            $K_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("BETWEEN 64 AND 66"));
            $K_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("BETWEEN 64 AND 66"));
            $K_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("BETWEEN 64 AND 66"));
            $K_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("BETWEEN 64 AND 66"));
            $K_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("BETWEEN 64 AND 66"));
            $K_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("BETWEEN 64 AND 66"));
            $K_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("BETWEEN 64 AND 66"));
            $K_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("BETWEEN 64 AND 66"));
            $K_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("BETWEEN 64 AND 66"));
            $K_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("BETWEEN 64 AND 66"));
            $K_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("BETWEEN 64 AND 66"));
            $K_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  


             $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app(" BETWEEN 64 AND 66"));
            $K_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];



            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("BETWEEN 64 AND 66"));
            $K_ps_other = $result_est[0][0]['TOTAL_EST'];  

             #L----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("= 68"));
            $L_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("= 68"));
            $L_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("= 68"));
            $L_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("= 68"));
            $L_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("= 68"));
            $L_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("= 68"));
            $L_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("= 68"));
            $L_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("= 68"));
            $L_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("= 68"));
            $L_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("= 68"));
            $L_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("= 68"));
            $L_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("= 68"));
            $L_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("= 68"));
            $L_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("= 68"));
            $L_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  


             $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app(" = 68"));
            $L_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];



            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("= 68"));
            $L_ps_other = $result_est[0][0]['TOTAL_EST'];  

             #M----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 69 AND 75"));
            $M_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("BETWEEN 69 AND 75"));
            $M_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("BETWEEN 69 AND 75"));
            $M_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("BETWEEN 69 AND 75"));
            $M_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("BETWEEN 69 AND 75"));
            $M_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("BETWEEN 69 AND 75"));
            $M_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("BETWEEN 69 AND 75"));
            $M_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("BETWEEN 69 AND 75"));
            $M_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("BETWEEN 69 AND 75"));
            $M_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("BETWEEN 69 AND 75"));
            $M_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("BETWEEN 69 AND 75"));
            $M_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("BETWEEN 69 AND 75"));
            $M_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("BETWEEN 69 AND 75"));
            $M_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("BETWEEN 69 AND 75"));
            $M_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  


             $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app(" BETWEEN 69 AND 75"));
            $M_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];



            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("BETWEEN 69 AND 75"));
            $M_ps_other = $result_est[0][0]['TOTAL_EST'];  

             #N----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 77  AND 82"));
            $N_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("BETWEEN 77  AND 82"));
            $N_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("BETWEEN 77  AND 82"));
            $N_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("BETWEEN 77  AND 82"));
            $N_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("BETWEEN 77  AND 82"));
            $N_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("BETWEEN 77  AND 82"));
            $N_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("BETWEEN 77  AND 82"));
            $N_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("BETWEEN 77  AND 82"));
            $N_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("BETWEEN 77  AND 82"));
            $N_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("BETWEEN 77  AND 82"));
            $N_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("BETWEEN 77  AND 82"));
            $N_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("BETWEEN 77  AND 82"));
            $N_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("BETWEEN 77  AND 82"));
            $N_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("BETWEEN 77  AND 82"));
            $N_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  


             $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app(" BETWEEN 77  AND 82"));
            $N_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];



            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("BETWEEN 77  AND 82"));
            $N_ps_other = $result_est[0][0]['TOTAL_EST'];  


             #O----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("= 84"));
            $O_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("= 84"));
            $O_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("= 84"));
            $O_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("= 84"));
            $O_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("= 84"));
            $O_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("= 84"));
            $O_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("= 84"));
            $O_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("= 84"));
            $O_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("= 84"));
            $O_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("= 84"));
            $O_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("= 84"));
            $O_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("= 84"));
            $O_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("= 84"));
            $O_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("= 84"));
            $O_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  


             $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app("= 84"));
            $O_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];



            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("= 84"));
            $O_ps_other = $result_est[0][0]['TOTAL_EST'];  

             #P----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("= 85"));
            $P_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("= 85"));
            $P_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("= 85"));
            $P_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("= 85"));
            $P_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("= 85"));
            $P_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("= 85"));
            $P_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("= 85"));
            $P_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("= 85"));
            $P_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("= 85"));
            $P_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("= 85"));
            $P_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("= 85"));
            $P_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("= 85"));
            $P_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("= 85"));
            $P_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("= 85"));
            $P_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  

             $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app("= 85"));
            $P_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];



            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("= 85"));
            $P_ps_other = $result_est[0][0]['TOTAL_EST'];  


             #Q----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 86 AND 88"));
            $Q_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("BETWEEN 86 AND 88"));
            $Q_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("BETWEEN 86 AND 88"));
            $Q_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("BETWEEN 86 AND 88"));
            $Q_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("BETWEEN 86 AND 88"));
            $Q_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("BETWEEN 86 AND 88"));
            $Q_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("BETWEEN 86 AND 88"));
            $Q_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("BETWEEN 86 AND 88"));
            $Q_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("BETWEEN 86 AND 88"));
            $Q_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("BETWEEN 86 AND 88"));
            $Q_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("BETWEEN 86 AND 88"));
            $Q_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("BETWEEN 86 AND 88"));
            $Q_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("BETWEEN 86 AND 88"));
            $Q_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("BETWEEN 86 AND 88"));
            $Q_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  

             $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app(" BETWEEN 86 AND 88"));
            $Q_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];



            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("BETWEEN 86 AND 88"));
            $Q_ps_other = $result_est[0][0]['TOTAL_EST'];  

             #R----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 90 AND 93"));
            $R_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("BETWEEN 90 AND 93"));
            $R_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("BETWEEN 90 AND 93"));
            $R_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("BETWEEN 90 AND 93"));
            $R_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("BETWEEN 90 AND 93"));
            $R_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("BETWEEN 90 AND 93"));
            $R_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("BETWEEN 90 AND 93"));
            $R_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("BETWEEN 90 AND 93"));
            $R_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("BETWEEN 90 AND 93"));
            $R_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("BETWEEN 90 AND 93"));
            $R_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("BETWEEN 90 AND 93"));
            $R_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("BETWEEN 90 AND 93"));
            $R_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("BETWEEN 90 AND 93"));
            $R_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("BETWEEN 90 AND 93"));
            $R_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  

             $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app("BETWEEN 90 AND 93"));
            $R_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];



            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("BETWEEN 90 AND 93"));
            $R_ps_other = $result_est[0][0]['TOTAL_EST'];  


             #S----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 94 AND 96"));
            $S_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("BETWEEN 94 AND 96"));
            $S_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("BETWEEN 94 AND 96"));
            $S_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("BETWEEN 94 AND 96"));
            $S_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("BETWEEN 94 AND 96"));
            $S_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("BETWEEN 94 AND 96"));
            $S_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("BETWEEN 94 AND 96"));
            $S_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("BETWEEN 94 AND 96"));
            $S_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("BETWEEN 94 AND 96"));
            $S_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("BETWEEN 94 AND 96"));
            $S_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("BETWEEN 94 AND 96"));
            $S_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("BETWEEN 94 AND 96"));
            $S_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("BETWEEN 94 AND 96"));
            $S_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("BETWEEN 94 AND 96"));
            $S_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  

             $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app(" BETWEEN 94 AND 96"));
            $S_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];



            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("BETWEEN 94 AND 96"));
            $S_ps_other = $result_est[0][0]['TOTAL_EST'];  

             #T----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("BETWEEN 97 AND 98"));
            $T_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("BETWEEN 97 AND 98"));
            $T_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("BETWEEN 97 AND 98"));
            $T_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("BETWEEN 97 AND 98"));
            $T_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("BETWEEN 97 AND 98"));
            $T_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("BETWEEN 97 AND 98"));
            $T_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("BETWEEN 97 AND 98"));
            $T_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("BETWEEN 97 AND 98"));
            $T_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("BETWEEN 97 AND 98"));
            $T_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("BETWEEN 97 AND 98"));
            $T_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("BETWEEN 97 AND 98"));
            $T_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("BETWEEN 97 AND 98"));
            $T_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("BETWEEN 97 AND 98"));
            $T_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("BETWEEN 97 AND 98"));
            $T_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app(" BETWEEN 97 AND 98"));
            $T_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];



            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("BETWEEN 97 AND 98"));
            $T_ps_other = $result_est[0][0]['TOTAL_EST'];  

             #U----------------------------------------------------------------------------------------------------
            $result_est = $this -> Report -> query($main_query_est.$where.$this->_total("= 99"));
            $U_total = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_retail("= 99"));
            $U_mode_retail = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_wholesale("= 99"));
            $U_mode_wholesale = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_mode_not_applicable("= 99"));
            $U_mode_not_applicable = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_daily("= 99"));
            $U_as_daily= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_monthly("= 99"));
            $U_as_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_annual("= 99"));
            $U_as_annual = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_others("= 99"));
            $U_as_others = $result_est[0][0]['TOTAL_EST']; 

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_as_no("= 99"));
            $U_as_no = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cheque("= 99"));
            $U_ps_cheque = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_daily("= 99"));
            $U_ps_cash_daily = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_weekly("= 99"));
            $U_ps_cash_weekly= $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_others("= 99"));
            $U_ps_cash_others = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_monthly("= 99"));
            $U_ps_cash_monthly = $result_est[0][0]['TOTAL_EST'];  

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_cash_not_app("= 99"));
            $U_ps_cash_not_app = $result_est[0][0]['TOTAL_EST'];

            $result_est = $this -> Report -> query($main_query_est.$where.$this->_ps_other("= 99"));
            $U_ps_other = $result_est[0][0]['TOTAL_EST'];       

        }

$this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result_est_total', 'result_tpe_toal','result_est_1947', 'result_tpe_1947',

'A_total', 'A_mode_retail', 'A_mode_wholesale', 'A_mode_not_applicable', 'A_as_daily', 'A_as_monthly',
'A_as_annual', 'A_as_others', 'A_as_no', 'A_ps_cheque', 'A_ps_cash_daily', 'A_ps_cash_weekly', 'A_ps_cash_others', 'A_ps_cash_monthly', 'A_ps_cash_monthly', 'A_ps_other', 'A_ps_cash_not_app',

'B_total', 'B_mode_retail', 'B_mode_wholesale', 'B_mode_not_applicable', 'B_as_daily', 'B_as_monthly',
'B_as_annual', 'B_as_others', 'B_as_no', 'B_ps_cheque', 'B_ps_cash_daily', 'B_ps_cash_weekly', 'B_ps_cash_others', 'B_ps_cash_monthly', 'B_ps_cash_monthly', 'B_ps_other', 'B_ps_cash_not_app',

'C_total', 'C_mode_retail', 'C_mode_wholesale', 'C_mode_not_applicable', 'C_as_daily', 'C_as_monthly',
'C_as_annual', 'C_as_others', 'C_as_no', 'C_ps_cheque', 'C_ps_cash_daily', 'C_ps_cash_weekly', 'C_ps_cash_others', 'C_ps_cash_monthly', 'C_ps_cash_monthly', 'C_ps_other', 'C_ps_cash_not_app',

'D_total', 'D_mode_retail', 'D_mode_wholesale', 'D_mode_not_applicable', 'D_as_daily', 'D_as_monthly',
'D_as_annual', 'D_as_others', 'D_as_no', 'D_ps_cheque', 'D_ps_cash_daily', 'D_ps_cash_weekly', 'D_ps_cash_others', 'D_ps_cash_monthly', 'D_ps_cash_monthly', 'D_ps_other', 'D_ps_cash_not_app',

'E_total', 'E_mode_retail', 'E_mode_wholesale', 'E_mode_not_applicable', 'E_as_daily', 'E_as_monthly',
'E_as_annual', 'E_as_others', 'E_as_no', 'E_ps_cheque', 'E_ps_cash_daily', 'E_ps_cash_weekly', 'E_ps_cash_others', 'E_ps_cash_monthly', 'E_ps_cash_monthly', 'E_ps_other', 'E_ps_cash_not_app',


'F_total', 'F_mode_retail', 'F_mode_wholesale', 'F_mode_not_applicable', 'F_as_daily', 'F_as_monthly',
'F_as_annual', 'F_as_others', 'F_as_no', 'F_ps_cheque', 'F_ps_cash_daily', 'F_ps_cash_weekly', 'F_ps_cash_others', 'F_ps_cash_monthly', 'F_ps_cash_monthly', 'F_ps_other', 'F_ps_cash_not_app',


'G_total', 'G_mode_retail', 'G_mode_wholesale', 'G_mode_not_applicable', 'G_as_daily', 'G_as_monthly',
'G_as_annual', 'G_as_others', 'G_as_no', 'G_ps_cheque', 'G_ps_cash_daily', 'G_ps_cash_weekly', 'G_ps_cash_others', 'G_ps_cash_monthly', 'G_ps_cash_monthly', 'G_ps_other', 'G_ps_cash_not_app',

'H_total', 'H_mode_retail', 'H_mode_wholesale', 'H_mode_not_applicable', 'H_as_daily', 'H_as_monthly',
'H_as_annual', 'H_as_others', 'H_as_no', 'H_ps_cheque', 'H_ps_cash_daily', 'H_ps_cash_weekly', 'H_ps_cash_others', 'H_ps_cash_monthly', 'H_ps_cash_monthly', 'H_ps_other', 'H_ps_cash_not_app',


'I_total', 'I_mode_retail', 'I_mode_wholesale', 'I_mode_not_applicable', 'I_as_daily', 'I_as_monthly',
'I_as_annual', 'I_as_others', 'I_as_no', 'I_ps_cheque', 'I_ps_cash_daily', 'I_ps_cash_weekly', 'I_ps_cash_others', 'I_ps_cash_monthly', 'I_ps_cash_monthly', 'I_ps_other', 'I_ps_cash_not_app',

'J_total', 'J_mode_retail', 'J_mode_wholesale', 'J_mode_not_applicable', 'J_as_daily', 'J_as_monthly',
'J_as_annual', 'J_as_others', 'J_as_no', 'J_ps_cheque', 'J_ps_cash_daily', 'J_ps_cash_weekly', 'J_ps_cash_others', 'J_ps_cash_monthly', 'J_ps_cash_monthly', 'J_ps_other', 'J_ps_cash_not_app',

'K_total', 'K_mode_retail', 'K_mode_wholesale', 'K_mode_not_applicable', 'K_as_daily', 'K_as_monthly',
'K_as_annual', 'K_as_others', 'K_as_no', 'K_ps_cheque', 'K_ps_cash_daily', 'K_ps_cash_weekly', 'K_ps_cash_others', 'K_ps_cash_monthly', 'K_ps_cash_monthly', 'K_ps_other', 'K_ps_cash_not_app',

'L_total', 'L_mode_retail', 'L_mode_wholesale', 'L_mode_not_applicable', 'L_as_daily', 'L_as_monthly',
'L_as_annual', 'L_as_others', 'L_as_no', 'L_ps_cheque', 'L_ps_cash_daily', 'L_ps_cash_weekly', 'L_ps_cash_others', 'L_ps_cash_monthly', 'L_ps_cash_monthly', 'L_ps_other', 'L_ps_cash_not_app',

'M_total', 'M_mode_retail', 'M_mode_wholesale', 'M_mode_not_applicable', 'M_as_daily', 'M_as_monthly',
'M_as_annual', 'M_as_others', 'M_as_no', 'M_ps_cheque', 'M_ps_cash_daily', 'M_ps_cash_weekly', 'M_ps_cash_others', 'M_ps_cash_monthly', 'M_ps_cash_monthly', 'M_ps_other', 'M_ps_cash_not_app',

'N_total', 'N_mode_retail', 'N_mode_wholesale', 'N_mode_not_applicable', 'N_as_daily', 'N_as_monthly',
'N_as_annual', 'N_as_others', 'N_as_no', 'N_ps_cheque', 'N_ps_cash_daily', 'N_ps_cash_weekly', 'N_ps_cash_others', 'N_ps_cash_monthly', 'N_ps_cash_monthly', 'N_ps_other', 'N_ps_cash_not_app',

'O_total', 'O_mode_retail', 'O_mode_wholesale', 'O_mode_not_applicable', 'O_as_daily', 'O_as_monthly',
'O_as_annual', 'O_as_others', 'O_as_no', 'O_ps_cheque', 'O_ps_cash_daily', 'O_ps_cash_weekly', 'O_ps_cash_others', 'O_ps_cash_monthly', 'O_ps_cash_monthly', 'O_ps_other', 'O_ps_cash_not_app',

'P_total', 'P_mode_retail', 'P_mode_wholesale', 'P_mode_not_applicable', 'P_as_daily', 'P_as_monthly',
'P_as_annual', 'P_as_others', 'P_as_no', 'P_ps_cheque', 'P_ps_cash_daily', 'P_ps_cash_weekly', 'P_ps_cash_others', 'P_ps_cash_monthly', 'P_ps_cash_monthly', 'P_ps_other', 'P_ps_cash_not_app',


'Q_total', 'Q_mode_retail', 'Q_mode_wholesale', 'Q_mode_not_applicable', 'Q_as_daily', 'Q_as_monthly',
'Q_as_annual', 'Q_as_others', 'Q_as_no', 'Q_ps_cheque', 'Q_ps_cash_daily', 'Q_ps_cash_weekly', 'Q_ps_cash_others', 'Q_ps_cash_monthly', 'Q_ps_cash_monthly', 'Q_ps_other', 'Q_ps_cash_not_app',


'R_total', 'R_mode_retail', 'R_mode_wholesale', 'R_mode_not_applicable', 'R_as_daily', 'R_as_monthly',
'R_as_annual', 'R_as_others', 'R_as_no', 'R_ps_cheque', 'R_ps_cash_daily', 'R_ps_cash_weekly', 'R_ps_cash_others', 'R_ps_cash_monthly', 'R_ps_cash_monthly', 'R_ps_other', 'R_ps_cash_not_app',


'S_total', 'S_mode_retail', 'S_mode_wholesale', 'S_mode_not_applicable', 'S_as_daily', 'S_as_monthly',
'S_as_annual', 'S_as_others', 'S_as_no', 'S_ps_cheque', 'S_ps_cash_daily', 'S_ps_cash_weekly', 'S_ps_cash_others', 'S_ps_cash_monthly', 'S_ps_cash_monthly', 'S_ps_other', 'S_ps_cash_not_app',


'T_total', 'T_mode_retail', 'T_mode_wholesale', 'T_mode_not_applicable', 'T_as_daily', 'T_as_monthly',
'T_as_annual', 'T_as_others', 'T_as_no', 'T_ps_cheque', 'T_ps_cash_daily', 'T_ps_cash_weekly', 'T_ps_cash_others', 'T_ps_cash_monthly', 'T_ps_cash_monthly', 'T_ps_other', 'T_ps_cash_not_app',


'U_total', 'U_mode_retail', 'U_mode_wholesale', 'U_mode_not_applicable', 'U_as_daily', 'U_as_monthly',
'U_as_annual', 'U_as_others', 'U_as_no', 'U_ps_cheque', 'U_ps_cash_daily', 'U_ps_cash_weekly', 'U_ps_cash_others', 'U_ps_cash_monthly', 'U_ps_cash_monthly', 'U_ps_other', 'U_ps_cash_not_app'


));   

  }





}

