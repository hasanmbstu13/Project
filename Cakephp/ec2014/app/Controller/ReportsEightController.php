<?php

class ReportsEightController extends AppController {

	
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

    public function _cottage($rmo = null, $ea)
    {
    	$where = "";
    	if($rmo == 'urban') $where .= " AND C.QUES_RMO_CODE IN(2,3,5,9) ";
		if($rmo == 'rural') $where .= " AND C.QUES_RMO_CODE IN(1,7) ";

    	$where .= " AND UNIT_SIZE = 1 ";
    	$where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
    	return $where;
    }

    public function _micro($rmo = null, $ea)
    {
    	$where = "";
    	if($rmo == 'urban') $where .= " AND C.QUES_RMO_CODE IN(2,3,5,9) ";
		if($rmo == 'rural') $where .= " AND C.QUES_RMO_CODE IN(1,7) ";

    	$where .= " AND UNIT_SIZE = 2 ";
    	$where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
    	return $where;
    }

    public function _small($rmo = null, $ea)
    
{    	$where = "";
    	if($rmo == 'urban') $where .= " AND C.QUES_RMO_CODE IN(2,3,5,9) ";
		if($rmo == 'rural') $where .= " AND C.QUES_RMO_CODE IN(1,7) ";

    	$where .= " AND UNIT_SIZE = 3 ";
    	$where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
    	return $where;
    }

    public function _medium($rmo = null, $ea)
    {
    	$where = "";
    	if($rmo == 'urban') $where .= " AND C.QUES_RMO_CODE IN(2,3,5,9) ";
		if($rmo == 'rural') $where .= " AND C.QUES_RMO_CODE IN(1,7) ";

    	$where .= " AND UNIT_SIZE = 4";
    	$where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;

    	return $where;
    }

    public function _large($rmo = null, $ea)
    {
    	$where = "";
    	if($rmo == 'urban') $where .= " AND C.QUES_RMO_CODE IN(2,3,5,9) ";
		if($rmo == 'rural') $where .= " AND C.QUES_RMO_CODE IN(1,7) ";

    	$where .= " AND UNIT_SIZE = 5";

    	$where .= " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;

    	return $where;
    }

    public function _total($ea)
    {
    	$where = " AND F_TO_NUMBER(SUBSTR(C.Q6_IND_CODE_CLASS_CODE,1,2)) ".$ea;
    	return $where;
    }


	public function tpe_tbl_eight_one() {
		
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

			$main_query = "SELECT COUNT(C.QUESTIONNARIE_ID) TOTAL_COTTAGE FROM BBSEC2013_REPORTS C WHERE ";
			
			//ROW A

			// $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 1 AND 3"));
			// $A_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 1 AND 3"));
			// $A_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 1 AND 3"));
			// $A_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 1 AND 3"));
			// $A_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			// $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 1 AND 3"));
			// $A_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 1 AND 3"));
			// $A_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 1 AND 3"));
			// $A_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			// $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 1 AND 3"));
			// $A_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 1 AND 3"));
			// $A_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 1 AND 3"));
			// $A_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			// $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 1 AND 3"));
			// $A_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 1 AND 3"));
			// $A_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 1 AND 3"));
			// $A_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			// $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 1 AND 3"));
			// $A_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 1 AND 3"));
			// $A_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 1 AND 3"));
			// $A_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			//ROW B

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 05 AND 09"));
			$B_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 05 AND 09"));
			$B_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 05 AND 09"));
			$B_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 05 AND 09"));
			$B_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 05 AND 09"));
			$B_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 05 AND 09"));
			$B_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 05 AND 09"));
			$B_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 05 AND 09"));
			$B_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 05 AND 09"));
			$B_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 05 AND 09"));
			$B_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 05 AND 09"));
			$B_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 05 AND 09"));
			$B_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 05 AND 09"));
			$B_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 05 AND 09"));
			$B_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 05 AND 09"));
			$B_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 05 AND 09"));
			$B_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 







			//ROW C

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 10 AND 33"));
			$C_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 10 AND 33"));
			$C_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 10 AND 33"));
			$C_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 10 AND 33"));
			$C_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 10 AND 33"));
			$C_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 10 AND 33"));
			$C_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 10 AND 33"));
			$C_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 10 AND 33"));
			$C_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 10 AND 33"));
			$C_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 10 AND 33"));
			$C_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 10 AND 33"));
			$C_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 10 AND 33"));
			$C_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 10 AND 33"));
			$C_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 10 AND 33"));
			$C_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 10 AND 33"));
			$C_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 10 AND 33"));
			$C_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			//ROW D

			$result = $this -> Report -> query($main_query.$where.$this->_total(" = 35"));
			$D_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 35"));
			$D_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 35"));
			$D_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 35"));
			$D_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 35"));
			$D_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 35"));
			$D_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 35"));
			$D_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 35"));
			$D_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 35"));
			$D_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 35"));
			$D_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 35"));
			$D_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 35"));
			$D_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 35"));
			$D_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 35"));
			$D_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 35"));
			$D_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 35"));
			$D_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];




			//ROW E

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 36  AND 39"));
			$E_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 36  AND 39"));
			$E_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 36  AND 39"));
			$E_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 36  AND 39"));
			$E_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 36  AND 39"));
			$E_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 36  AND 39"));
			$E_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 36  AND 39"));
			$E_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 36  AND 39"));
			$E_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 36  AND 39"));
			$E_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 36  AND 39"));
			$E_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 36  AND 39"));
			$E_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 36  AND 39"));
			$E_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 36  AND 39"));
			$E_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 36  AND 39"));
			$E_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 36  AND 39"));
			$E_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 36  AND 39"));
			$E_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			//ROW F

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 41 AND 43"));
			$F_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 41 AND 43"));
			$F_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 41 AND 43"));
			$F_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 41 AND 43"));
			$F_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 41 AND 43"));
			$F_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 41 AND 43"));
			$F_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 41 AND 43"));
			$F_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 41 AND 43"));
			$F_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 41 AND 43"));
			$F_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 41 AND 43"));
			$F_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 41 AND 43"));
			$F_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 41 AND 43"));
			$F_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 41 AND 43"));
			$F_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 41 AND 43"));
			$F_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 41 AND 43"));
			$F_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 41 AND 43"));
			$F_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



			//ROW G

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 45 AND 47"));
			$G_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 45 AND 47"));
			$G_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 45 AND 47"));
			$G_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 45 AND 47"));
			$G_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 45 AND 47"));
			$G_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 45 AND 47"));
			$G_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 45 AND 47"));
			$G_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 45 AND 47"));
			$G_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 45 AND 47"));
			$G_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 45 AND 47"));
			$G_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 45 AND 47"));
			$G_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 45 AND 47"));
			$G_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 45 AND 47"));
			$G_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 45 AND 47"));
			$G_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 45 AND 47"));
			$G_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 45 AND 47"));
			$G_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



			//ROW H

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 49 AND 53"));
			$H_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 49 AND 53"));
			$H_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 49 AND 53"));
			$H_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 49 AND 53"));
			$H_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 49 AND 53"));
			$H_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 49 AND 53"));
			$H_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 49 AND 53"));
			$H_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 49 AND 53"));
			$H_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 49 AND 53"));
			$H_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 49 AND 53"));
			$H_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 49 AND 53"));
			$H_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 49 AND 53"));
			$H_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 49 AND 53"));
			$H_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 49 AND 53"));
			$H_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 49 AND 53"));
			$H_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 49 AND 53"));
			$H_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



			//ROW I

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 55 AND 56"));
			$I_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 55 AND 56"));
			$I_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 55 AND 56"));
			$I_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 55 AND 56"));
			$I_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 55 AND 56"));
			$I_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 55 AND 56"));
			$I_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 55 AND 56"));
			$I_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 55 AND 56"));
			$I_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 55 AND 56"));
			$I_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 55 AND 56"));
			$I_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 55 AND 56"));
			$I_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 55 AND 56"));
			$I_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 55 AND 56"));
			$I_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 55 AND 56"));
			$I_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 55 AND 56"));
			$I_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 55 AND 56"));
			$I_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



			//ROW J

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 58 AND 63"));
			$J_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 58 AND 63"));
			$J_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 58 AND 63"));
			$J_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 58 AND 63"));
			$J_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 58 AND 63"));
			$J_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 58 AND 63"));
			$J_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 58 AND 63"));
			$J_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 58 AND 63"));
			$J_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 58 AND 63"));
			$J_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 58 AND 63"));
			$J_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 58 AND 63"));
			$J_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 58 AND 63"));
			$J_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 58 AND 63"));
			$J_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 58 AND 63"));
			$J_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 58 AND 63"));
			$J_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 58 AND 63"));
			$J_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


			//ROW K

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 64 AND 66"));
			$K_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 64 AND 66"));
			$K_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 64 AND 66"));
			$K_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 64 AND 66"));
			$K_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 64 AND 66"));
			$K_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 64 AND 66"));
			$K_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 64 AND 66"));
			$K_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 64 AND 66"));
			$K_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 64 AND 66"));
			$K_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 64 AND 66"));
			$K_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 64 AND 66"));
			$K_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 64 AND 66"));
			$K_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 64 AND 66"));
			$K_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 64 AND 66"));
			$K_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 64 AND 66"));
			$K_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 64 AND 66"));
			$K_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



			//ROW L

			$result = $this -> Report -> query($main_query.$where.$this->_total(" = 68"));
			$L_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 68"));
			$L_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 68"));
			$L_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 68"));
			$L_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 68"));
			$L_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 68"));
			$L_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 68"));
			$L_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 68"));
			$L_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 68"));
			$L_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 68"));
			$L_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 68"));
			$L_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 68"));
			$L_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 68"));
			$L_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 68"));
			$L_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 68"));
			$L_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 68"));
			$L_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


			//ROW M

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 69 AND 75"));
			$M_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 69 AND 75"));
			$M_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 69 AND 75"));
			$M_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 69 AND 75"));
			$M_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 69 AND 75"));
			$M_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 69 AND 75"));
			$M_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 69 AND 75"));
			$M_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 69 AND 75"));
			$M_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 69 AND 75"));
			$M_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 69 AND 75"));
			$M_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 69 AND 75"));
			$M_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 69 AND 75"));
			$M_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 69 AND 75"));
			$M_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 69 AND 75"));
			$M_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 69 AND 75"));
			$M_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 69 AND 75"));
			$M_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


			//ROW N

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 77  AND 82"));
			$N_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 77  AND 82"));
			$N_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 77  AND 82"));
			$N_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 77  AND 82"));
			$N_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 77  AND 82"));
			$N_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 77  AND 82"));
			$N_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 77  AND 82"));
			$N_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 77  AND 82"));
			$N_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 77  AND 82"));
			$N_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 77  AND 82"));
			$N_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 77  AND 82"));
			$N_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 
  
			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 77  AND 82"));
			$N_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 77  AND 82"));
			$N_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 77  AND 82"));
			$N_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 77  AND 82"));
			$N_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 77  AND 82"));
			$N_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


			//ROW O

			$result = $this -> Report -> query($main_query.$where.$this->_total(" = 84"));
			$O_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 84"));
			$O_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 84"));
			$O_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 84"));
			$O_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 84"));
			$O_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 84"));
			$O_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 84"));
			$O_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 84"));
			$O_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 84"));
			$O_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 84"));
			$O_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 84"));
			$O_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 84"));
			$O_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 84"));
			$O_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 84"));
			$O_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 84"));
			$O_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 84"));
			$O_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



			//ROW P

			$result = $this -> Report -> query($main_query.$where.$this->_total(" = 85"));
			$P_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 85"));
			$P_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 85"));
			$P_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 85"));
			$P_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 85"));
			$P_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 85"));
			$P_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 85"));
			$P_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 85"));
			$P_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 85"));
			$P_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 85"));
			$P_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 85"));
			$P_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 85"));
			$P_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 85"));
			$P_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 85"));
			$P_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 85"));
			$P_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 85"));
			$P_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


			//ROW Q

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 86 AND 88"));
			$Q_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 86 AND 88"));
			$Q_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 86 AND 88"));
			$Q_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 86 AND 88"));
			$Q_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 86 AND 88"));
			$Q_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 86 AND 88"));
			$Q_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 86 AND 88"));
			$Q_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 86 AND 88"));
			$Q_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 86 AND 88"));
			$Q_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 86 AND 88"));
			$Q_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 86 AND 88"));
			$Q_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 86 AND 88"));
			$Q_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 86 AND 88"));
			$Q_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 86 AND 88"));
			$Q_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 86 AND 88"));
			$Q_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 86 AND 88"));
			$Q_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


			//ROW R

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 90 AND 93"));
			$R_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 90 AND 93"));
			$R_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 90 AND 93"));
			$R_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 90 AND 93"));
			$R_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 90 AND 93"));
			$R_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 90 AND 93"));
			$R_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 90 AND 93"));
			$R_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 90 AND 93"));
			$R_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 90 AND 93"));
			$R_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 90 AND 93"));
			$R_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 90 AND 93"));
			$R_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 90 AND 93"));
			$R_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 90 AND 93"));
			$R_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 90 AND 93"));
			$R_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 90 AND 93"));
			$R_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 90 AND 93"));
			$R_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


			//ROW S

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 94 AND 96"));
			$S_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 94 AND 96"));
			$S_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 94 AND 96"));
			$S_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 94 AND 96"));
			$S_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 94 AND 96"));
			$S_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 94 AND 96"));
			$S_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 94 AND 96"));
			$S_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 94 AND 96"));
			$S_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 94 AND 96"));
			$S_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 94 AND 96"));
			$S_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 94 AND 96"));
			$S_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 94 AND 96"));
			$S_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 94 AND 96"));
			$S_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 94 AND 96"));
			$S_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 94 AND 96"));
			$S_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 94 AND 96"));
			$S_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


			//ROW T

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 97 AND 98"));
			$T_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 97 AND 98"));
			$T_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 97 AND 98"));
			$T_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 97 AND 98"));
			$T_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 97 AND 98"));
			$T_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 97 AND 98"));
			$T_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 97 AND 98"));
			$T_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 97 AND 98"));
			$T_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 97 AND 98"));
			$T_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 97 AND 98"));
			$T_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 97 AND 98"));
			$T_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 97 AND 98"));
			$T_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 97 AND 98"));
			$T_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 97 AND 98"));
			$T_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 97 AND 98"));
			$T_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 97 AND 98"));
			$T_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


			//ROW U

			$result = $this -> Report -> query($main_query.$where.$this->_total(" = 99"));
			$U_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 99"));
			$U_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 99"));
			$U_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 99"));
			$U_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 99"));
			$U_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 99"));
			$U_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 99"));
			$U_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 99"));
			$U_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 99"));
			$U_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 99"));
			$U_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 99"));
			$U_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 99"));
			$U_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 99"));
			$U_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 99"));
			$U_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 99"));
			$U_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 99"));
			$U_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];

		}

		$this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union',
		# A -----------------
		// 'A_TOTAL', 'A_COTTAGE_TOTAL', 'A_COTTAGE_URBAN', 'A_COTTAGE_RURAL', 'A_MICRO_TOTAL', 'A_MICRO_URBAN', 'A_MICRO_RURAL',
		// 'A_SMALL_TOTAL', 'A_SMALL_URBAN', 'A_SMALL_RURAL', 'A_MEDIUM_TOTAL', 'A_MEDIUM_URBAN', 'A_MEDIUM_RURAL',
		// 'A_LARGE_TOTAL', 'A_LARGE_URBAN', 'A_LARGE_RURAL', 
		# B--------------------------
		'B_TOTAL', 'B_COTTAGE_TOTAL', 'B_COTTAGE_URBAN', 'B_COTTAGE_RURAL', 'B_MICRO_TOTAL', 'B_MICRO_URBAN', 'B_MICRO_RURAL',
		'B_SMALL_TOTAL', 'B_SMALL_URBAN', 'B_SMALL_RURAL', 'B_MEDIUM_TOTAL', 'B_MEDIUM_URBAN', 'B_MEDIUM_RURAL',
		'B_LARGE_TOTAL', 'B_LARGE_URBAN', 'B_LARGE_RURAL', 
		# C -----------------
		'C_TOTAL', 'C_COTTAGE_TOTAL', 'C_COTTAGE_URBAN', 'C_COTTAGE_RURAL', 'C_MICRO_TOTAL', 'C_MICRO_URBAN', 'C_MICRO_RURAL',
		'C_SMALL_TOTAL', 'C_SMALL_URBAN', 'C_SMALL_RURAL', 'C_MEDIUM_TOTAL', 'C_MEDIUM_URBAN', 'C_MEDIUM_RURAL',
		'C_LARGE_TOTAL', 'C_LARGE_URBAN', 'C_LARGE_RURAL', 
		# D -----------------
		'D_TOTAL', 'D_COTTAGE_TOTAL', 'D_COTTAGE_URBAN', 'D_COTTAGE_RURAL', 'D_MICRO_TOTAL', 'D_MICRO_URBAN', 'D_MICRO_RURAL',
		'D_SMALL_TOTAL', 'D_SMALL_URBAN', 'D_SMALL_RURAL', 'D_MEDIUM_TOTAL', 'D_MEDIUM_URBAN', 'D_MEDIUM_RURAL',
		'D_LARGE_TOTAL', 'D_LARGE_URBAN', 'D_LARGE_RURAL', 
		# E -----------------
		'E_TOTAL', 'E_COTTAGE_TOTAL', 'E_COTTAGE_URBAN', 'E_COTTAGE_RURAL', 'E_MICRO_TOTAL', 'E_MICRO_URBAN', 'E_MICRO_RURAL',
		'E_SMALL_TOTAL', 'E_SMALL_URBAN', 'E_SMALL_RURAL', 'E_MEDIUM_TOTAL', 'E_MEDIUM_URBAN', 'E_MEDIUM_RURAL',
		'E_LARGE_TOTAL', 'E_LARGE_URBAN', 'E_LARGE_RURAL', 
		# F-----------------
		'F_TOTAL', 'F_COTTAGE_TOTAL', 'F_COTTAGE_URBAN', 'F_COTTAGE_RURAL', 'F_MICRO_TOTAL', 'F_MICRO_URBAN', 'F_MICRO_RURAL',
		'F_SMALL_TOTAL', 'F_SMALL_URBAN', 'F_SMALL_RURAL', 'F_MEDIUM_TOTAL', 'F_MEDIUM_URBAN', 'F_MEDIUM_RURAL',
		'F_LARGE_TOTAL', 'F_LARGE_URBAN', 'F_LARGE_RURAL',  
		# G -----------------
		'G_TOTAL', 'G_COTTAGE_TOTAL', 'G_COTTAGE_URBAN', 'G_COTTAGE_RURAL', 'G_MICRO_TOTAL', 'G_MICRO_URBAN', 'G_MICRO_RURAL',
		'G_SMALL_TOTAL', 'G_SMALL_URBAN', 'G_SMALL_RURAL', 'G_MEDIUM_TOTAL', 'G_MEDIUM_URBAN', 'G_MEDIUM_RURAL',
		'G_LARGE_TOTAL', 'G_LARGE_URBAN', 'G_LARGE_RURAL', 
		# H -----------------
		'H_TOTAL', 'H_COTTAGE_TOTAL', 'H_COTTAGE_URBAN', 'H_COTTAGE_RURAL', 'H_MICRO_TOTAL', 'H_MICRO_URBAN', 'H_MICRO_RURAL',
		'H_SMALL_TOTAL', 'H_SMALL_URBAN', 'H_SMALL_RURAL', 'H_MEDIUM_TOTAL', 'H_MEDIUM_URBAN', 'H_MEDIUM_RURAL',
		'H_LARGE_TOTAL', 'H_LARGE_URBAN', 'H_LARGE_RURAL', 
		# I -----------------
		'I_TOTAL', 'I_COTTAGE_TOTAL', 'I_COTTAGE_URBAN', 'I_COTTAGE_RURAL', 'I_MICRO_TOTAL', 'I_MICRO_URBAN', 'I_MICRO_RURAL',
		'I_SMALL_TOTAL', 'I_SMALL_URBAN', 'I_SMALL_RURAL', 'I_MEDIUM_TOTAL', 'I_MEDIUM_URBAN', 'I_MEDIUM_RURAL',
		'I_LARGE_TOTAL', 'I_LARGE_URBAN', 'I_LARGE_RURAL', 
		# J -----------------
		'J_TOTAL', 'J_COTTAGE_TOTAL', 'J_COTTAGE_URBAN', 'J_COTTAGE_RURAL', 'J_MICRO_TOTAL', 'J_MICRO_URBAN', 'J_MICRO_RURAL',
		'J_SMALL_TOTAL', 'J_SMALL_URBAN', 'J_SMALL_RURAL', 'J_MEDIUM_TOTAL', 'J_MEDIUM_URBAN', 'J_MEDIUM_RURAL',
		'J_LARGE_TOTAL', 'J_LARGE_URBAN', 'J_LARGE_RURAL', 
		# K -----------------
		'K_TOTAL', 'K_COTTAGE_TOTAL', 'K_COTTAGE_URBAN', 'K_COTTAGE_RURAL', 'K_MICRO_TOTAL', 'K_MICRO_URBAN', 'K_MICRO_RURAL',
		'K_SMALL_TOTAL', 'K_SMALL_URBAN', 'K_SMALL_RURAL', 'K_MEDIUM_TOTAL', 'K_MEDIUM_URBAN', 'K_MEDIUM_RURAL',
		'K_LARGE_TOTAL', 'K_LARGE_URBAN', 'K_LARGE_RURAL', 
		# L -----------------
		'L_TOTAL', 'L_COTTAGE_TOTAL', 'L_COTTAGE_URBAN', 'L_COTTAGE_RURAL', 'L_MICRO_TOTAL', 'L_MICRO_URBAN', 'L_MICRO_RURAL',
		'L_SMALL_TOTAL', 'L_SMALL_URBAN', 'L_SMALL_RURAL', 'L_MEDIUM_TOTAL', 'L_MEDIUM_URBAN', 'L_MEDIUM_RURAL',
		'L_LARGE_TOTAL', 'L_LARGE_URBAN', 'L_LARGE_RURAL', 
		# M -----------------
		'M_TOTAL', 'M_COTTAGE_TOTAL', 'M_COTTAGE_URBAN', 'M_COTTAGE_RURAL', 'M_MICRO_TOTAL', 'M_MICRO_URBAN', 'M_MICRO_RURAL',
		'M_SMALL_TOTAL', 'M_SMALL_URBAN', 'M_SMALL_RURAL', 'M_MEDIUM_TOTAL', 'M_MEDIUM_URBAN', 'M_MEDIUM_RURAL',
		'M_LARGE_TOTAL', 'M_LARGE_URBAN', 'M_LARGE_RURAL',  
		# N -----------------
		'N_TOTAL', 'N_COTTAGE_TOTAL', 'N_COTTAGE_URBAN', 'N_COTTAGE_RURAL', 'N_MICRO_TOTAL', 'N_MICRO_URBAN', 'N_MICRO_RURAL',
		'N_SMALL_TOTAL', 'N_SMALL_URBAN', 'N_SMALL_RURAL', 'N_MEDIUM_TOTAL', 'N_MEDIUM_URBAN', 'N_MEDIUM_RURAL',
		'N_LARGE_TOTAL', 'N_LARGE_URBAN', 'N_LARGE_RURAL', 
		# O -----------------
		'O_TOTAL', 'O_COTTAGE_TOTAL', 'O_COTTAGE_URBAN', 'O_COTTAGE_RURAL', 'O_MICRO_TOTAL', 'O_MICRO_URBAN', 'O_MICRO_RURAL',
		'O_SMALL_TOTAL', 'O_SMALL_URBAN', 'O_SMALL_RURAL', 'O_MEDIUM_TOTAL', 'O_MEDIUM_URBAN', 'O_MEDIUM_RURAL',
		'O_LARGE_TOTAL', 'O_LARGE_URBAN', 'O_LARGE_RURAL', 
		# P -----------------
		'P_TOTAL', 'P_COTTAGE_TOTAL', 'P_COTTAGE_URBAN', 'P_COTTAGE_RURAL', 'P_MICRO_TOTAL', 'P_MICRO_URBAN', 'P_MICRO_RURAL',
		'P_SMALL_TOTAL', 'P_SMALL_URBAN', 'P_SMALL_RURAL', 'P_MEDIUM_TOTAL', 'P_MEDIUM_URBAN', 'P_MEDIUM_RURAL',
		'P_LARGE_TOTAL', 'P_LARGE_URBAN', 'P_LARGE_RURAL', 
		# Q -----------------
		'Q_TOTAL', 'Q_COTTAGE_TOTAL', 'Q_COTTAGE_URBAN', 'Q_COTTAGE_RURAL', 'Q_MICRO_TOTAL', 'Q_MICRO_URBAN', 'Q_MICRO_RURAL',
		'Q_SMALL_TOTAL', 'Q_SMALL_URBAN', 'Q_SMALL_RURAL', 'Q_MEDIUM_TOTAL', 'Q_MEDIUM_URBAN', 'Q_MEDIUM_RURAL',
		'Q_LARGE_TOTAL', 'Q_LARGE_URBAN', 'Q_LARGE_RURAL', 
		# R -----------------
		'R_TOTAL', 'R_COTTAGE_TOTAL', 'R_COTTAGE_URBAN', 'R_COTTAGE_RURAL', 'R_MICRO_TOTAL', 'R_MICRO_URBAN', 'R_MICRO_RURAL',
		'R_SMALL_TOTAL', 'R_SMALL_URBAN', 'R_SMALL_RURAL', 'R_MEDIUM_TOTAL', 'R_MEDIUM_URBAN', 'R_MEDIUM_RURAL',
		'R_LARGE_TOTAL', 'R_LARGE_URBAN', 'R_LARGE_RURAL', 
		# S -----------------
		'S_TOTAL', 'S_COTTAGE_TOTAL', 'S_COTTAGE_URBAN', 'S_COTTAGE_RURAL', 'S_MICRO_TOTAL', 'S_MICRO_URBAN', 'S_MICRO_RURAL',
		'S_SMALL_TOTAL', 'S_SMALL_URBAN', 'S_SMALL_RURAL', 'S_MEDIUM_TOTAL', 'S_MEDIUM_URBAN', 'S_MEDIUM_RURAL',
		'S_LARGE_TOTAL', 'S_LARGE_URBAN', 'S_LARGE_RURAL', 
		# T -----------------
		'T_TOTAL', 'T_COTTAGE_TOTAL', 'T_COTTAGE_URBAN', 'T_COTTAGE_RURAL', 'T_MICRO_TOTAL', 'T_MICRO_URBAN', 'T_MICRO_RURAL',
		'T_SMALL_TOTAL', 'T_SMALL_URBAN', 'T_SMALL_RURAL', 'T_MEDIUM_TOTAL', 'T_MEDIUM_URBAN', 'T_MEDIUM_RURAL',
		'T_LARGE_TOTAL', 'T_LARGE_URBAN', 'T_LARGE_RURAL', 
		# U -----------------
		'U_TOTAL', 'U_COTTAGE_TOTAL', 'U_COTTAGE_URBAN', 'U_COTTAGE_RURAL', 'U_MICRO_TOTAL', 'U_MICRO_URBAN', 'U_MICRO_RURAL',
		'U_SMALL_TOTAL', 'U_SMALL_URBAN', 'U_SMALL_RURAL', 'U_MEDIUM_TOTAL', 'U_MEDIUM_URBAN', 'U_MEDIUM_RURAL',
		'U_LARGE_TOTAL', 'U_LARGE_URBAN', 'U_LARGE_RURAL'
		
		));

	}


public function tpe_tbl_eight_two() {
		
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


			
			//ROW A

			// $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 1 AND 3"));
			// $A_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 1 AND 3"));
			// $A_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 1 AND 3"));
			// $A_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 1 AND 3"));
			// $A_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			// $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 1 AND 3"));
			// $A_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 1 AND 3"));
			// $A_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 1 AND 3"));
			// $A_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			// $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 1 AND 3"));
			// $A_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 1 AND 3"));
			// $A_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 1 AND 3"));
			// $A_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			// $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 1 AND 3"));
			// $A_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 1 AND 3"));
			// $A_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 1 AND 3"));
			// $A_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			// $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 1 AND 3"));
			// $A_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 1 AND 3"));
			// $A_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			// $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 1 AND 3"));
			// $A_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 





			#echo $main_query; exit;

			//ROW B

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 05 AND 09"));
			$B_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 05 AND 09"));
			$B_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 05 AND 09"));
			$B_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 05 AND 09"));
			$B_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 05 AND 09"));
			$B_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 05 AND 09"));
			$B_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 05 AND 09"));
			$B_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 05 AND 09"));
			$B_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 05 AND 09"));
			$B_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 05 AND 09"));
			$B_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 05 AND 09"));
			$B_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 05 AND 09"));
			$B_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 05 AND 09"));
			$B_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 05 AND 09"));
			$B_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 05 AND 09"));
			$B_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 05 AND 09"));
			$B_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 







			//ROW C

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 10 AND 33"));
			$C_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 10 AND 33"));
			$C_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 10 AND 33"));
			$C_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 10 AND 33"));
			$C_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 10 AND 33"));
			$C_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 10 AND 33"));
			$C_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 10 AND 33"));
			$C_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 10 AND 33"));
			$C_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 10 AND 33"));
			$C_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 10 AND 33"));
			$C_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 10 AND 33"));
			$C_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 10 AND 33"));
			$C_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 10 AND 33"));
			$C_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 10 AND 33"));
			$C_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 10 AND 33"));
			$C_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 10 AND 33"));
			$C_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 






			//ROW D

			$result = $this -> Report -> query($main_query.$where.$this->_total(" = 35"));
			$D_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 35"));
			$D_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 35"));
			$D_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 35"));
			$D_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 35"));
			$D_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 35"));
			$D_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 35"));
			$D_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 35"));
			$D_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 35"));
			$D_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 35"));
			$D_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 35"));
			$D_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 35"));
			$D_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 35"));
			$D_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 35"));
			$D_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 35"));
			$D_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 35"));
			$D_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE'];






			//ROW E

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 36  AND 39"));
			$E_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 36  AND 39"));
			$E_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 36  AND 39"));
			$E_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 36  AND 39"));
			$E_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 36  AND 39"));
			$E_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 36  AND 39"));
			$E_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 36  AND 39"));
			$E_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 36  AND 39"));
			$E_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 36  AND 39"));
			$E_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 36  AND 39"));
			$E_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 36  AND 39"));
			$E_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 36  AND 39"));
			$E_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 36  AND 39"));
			$E_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 36  AND 39"));
			$E_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 36  AND 39"));
			$E_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 36  AND 39"));
			$E_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 





			//ROW F

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 41 AND 43"));
			$F_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 41 AND 43"));
			$F_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 41 AND 43"));
			$F_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 41 AND 43"));
			$F_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 41 AND 43"));
			$F_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 41 AND 43"));
			$F_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 41 AND 43"));
			$F_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 41 AND 43"));
			$F_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 41 AND 43"));
			$F_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 41 AND 43"));
			$F_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 41 AND 43"));
			$F_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 41 AND 43"));
			$F_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 41 AND 43"));
			$F_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 41 AND 43"));
			$F_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 41 AND 43"));
			$F_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 41 AND 43"));
			$F_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE'];



			//ROW G

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 45 AND 47"));
			$G_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 45 AND 47"));
			$G_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 45 AND 47"));
			$G_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 45 AND 47"));
			$G_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 45 AND 47"));
			$G_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 45 AND 47"));
			$G_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 45 AND 47"));
			$G_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 45 AND 47"));
			$G_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 45 AND 47"));
			$G_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 45 AND 47"));
			$G_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 45 AND 47"));
			$G_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 45 AND 47"));
			$G_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 45 AND 47"));
			$G_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 45 AND 47"));
			$G_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 45 AND 47"));
			$G_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 45 AND 47"));
			$G_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE'];



			//ROW H

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 49 AND 53"));
			$H_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 49 AND 53"));
			$H_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 49 AND 53"));
			$H_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 49 AND 53"));
			$H_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 49 AND 53"));
			$H_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 49 AND 53"));
			$H_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 49 AND 53"));
			$H_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 49 AND 53"));
			$H_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 49 AND 53"));
			$H_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 49 AND 53"));
			$H_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 49 AND 53"));
			$H_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 49 AND 53"));
			$H_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 49 AND 53"));
			$H_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 49 AND 53"));
			$H_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 49 AND 53"));
			$H_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 49 AND 53"));
			$H_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE'];



			//ROW I

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 55 AND 56"));
			$I_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 55 AND 56"));
			$I_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 55 AND 56"));
			$I_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 55 AND 56"));
			$I_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 55 AND 56"));
			$I_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 55 AND 56"));
			$I_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 55 AND 56"));
			$I_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 55 AND 56"));
			$I_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 55 AND 56"));
			$I_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 55 AND 56"));
			$I_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 55 AND 56"));
			$I_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 55 AND 56"));
			$I_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 55 AND 56"));
			$I_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 55 AND 56"));
			$I_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 55 AND 56"));
			$I_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 55 AND 56"));
			$I_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE'];



			//ROW J

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 58 AND 63"));
			$J_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 58 AND 63"));
			$J_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 58 AND 63"));
			$J_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 58 AND 63"));
			$J_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 58 AND 63"));
			$J_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 58 AND 63"));
			$J_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 58 AND 63"));
			$J_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 58 AND 63"));
			$J_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 58 AND 63"));
			$J_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 58 AND 63"));
			$J_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 58 AND 63"));
			$J_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 58 AND 63"));
			$J_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 58 AND 63"));
			$J_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 58 AND 63"));
			$J_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 58 AND 63"));
			$J_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 58 AND 63"));
			$J_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE'];


			//ROW K

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 64 AND 66"));
			$K_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 64 AND 66"));
			$K_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 64 AND 66"));
			$K_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 64 AND 66"));
			$K_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 64 AND 66"));
			$K_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 64 AND 66"));
			$K_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 64 AND 66"));
			$K_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 64 AND 66"));
			$K_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 64 AND 66"));
			$K_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 64 AND 66"));
			$K_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 64 AND 66"));
			$K_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 64 AND 66"));
			$K_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 64 AND 66"));
			$K_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 64 AND 66"));
			$K_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 64 AND 66"));
			$K_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 64 AND 66"));
			$K_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE'];



			//ROW L

			$result = $this -> Report -> query($main_query.$where.$this->_total(" = 68"));
			$L_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 68"));
			$L_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 68"));
			$L_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 68"));
			$L_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 68"));
			$L_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 68"));
			$L_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 68"));
			$L_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 68"));
			$L_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 68"));
			$L_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 68"));
			$L_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 68"));
			$L_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 68"));
			$L_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 68"));
			$L_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 68"));
			$L_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 68"));
			$L_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 68"));
			$L_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE'];


			//ROW M

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 69 AND 75"));
			$M_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 69 AND 75"));
			$M_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 69 AND 75"));
			$M_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 69 AND 75"));
			$M_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 69 AND 75"));
			$M_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 69 AND 75"));
			$M_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 69 AND 75"));
			$M_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 69 AND 75"));
			$M_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 69 AND 75"));
			$M_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 69 AND 75"));
			$M_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 69 AND 75"));
			$M_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 69 AND 75"));
			$M_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 69 AND 75"));
			$M_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 69 AND 75"));
			$M_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 69 AND 75"));
			$M_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 69 AND 75"));
			$M_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE'];


			//ROW N

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 77  AND 82"));
			$N_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 77  AND 82"));
			$N_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 77  AND 82"));
			$N_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 77  AND 82"));
			$N_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 77  AND 82"));
			$N_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 77  AND 82"));
			$N_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 77  AND 82"));
			$N_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 77  AND 82"));
			$N_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 77  AND 82"));
			$N_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 77  AND 82"));
			$N_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 77  AND 82"));
			$N_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 77  AND 82"));
			$N_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 77  AND 82"));
			$N_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 77  AND 82"));
			$N_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 77  AND 82"));
			$N_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 77  AND 82"));
			$N_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE'];


			//ROW O

			$result = $this -> Report -> query($main_query.$where.$this->_total(" = 84"));
			$O_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 84"));
			$O_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 84"));
			$O_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 84"));
			$O_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 84"));
			$O_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 84"));
			$O_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 84"));
			$O_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 84"));
			$O_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 84"));
			$O_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 84"));
			$O_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 84"));
			$O_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 84"));
			$O_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 84"));
			$O_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 84"));
			$O_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 84"));
			$O_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 84"));
			$O_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE'];



			//ROW P

			$result = $this -> Report -> query($main_query.$where.$this->_total(" = 85"));
			$P_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 85"));
			$P_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 85"));
			$P_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 85"));
			$P_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 85"));
			$P_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 85"));
			$P_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 85"));
			$P_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 85"));
			$P_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 85"));
			$P_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 85"));
			$P_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 85"));
			$P_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 85"));
			$P_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 85"));
			$P_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 85"));
			$P_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 85"));
			$P_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 85"));
			$P_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE'];


			//ROW Q

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 86 AND 88"));
			$Q_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 86 AND 88"));
			$Q_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 86 AND 88"));
			$Q_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 86 AND 88"));
			$Q_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 86 AND 88"));
			$Q_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 86 AND 88"));
			$Q_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 86 AND 88"));
			$Q_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 86 AND 88"));
			$Q_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 86 AND 88"));
			$Q_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 86 AND 88"));
			$Q_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 86 AND 88"));
			$Q_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 86 AND 88"));
			$Q_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 86 AND 88"));
			$Q_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 86 AND 88"));
			$Q_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 86 AND 88"));
			$Q_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 86 AND 88"));
			$Q_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE'];


			//ROW R

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 90 AND 93"));
			$R_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 90 AND 93"));
			$R_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 90 AND 93"));
			$R_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 90 AND 93"));
			$R_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 90 AND 93"));
			$R_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 90 AND 93"));
			$R_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 90 AND 93"));
			$R_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 90 AND 93"));
			$R_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 90 AND 93"));
			$R_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 90 AND 93"));
			$R_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 90 AND 93"));
			$R_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 90 AND 93"));
			$R_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 90 AND 93"));
			$R_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 90 AND 93"));
			$R_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 90 AND 93"));
			$R_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 90 AND 93"));
			$R_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE'];


			//ROW S

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 94 AND 96"));
			$S_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 94 AND 96"));
			$S_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 94 AND 96"));
			$S_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 94 AND 96"));
			$S_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 94 AND 96"));
			$S_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 94 AND 96"));
			$S_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 94 AND 96"));
			$S_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 94 AND 96"));
			$S_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 94 AND 96"));
			$S_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 94 AND 96"));
			$S_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 94 AND 96"));
			$S_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 94 AND 96"));
			$S_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 94 AND 96"));
			$S_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 94 AND 96"));
			$S_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 94 AND 96"));
			$S_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 94 AND 96"));
			$S_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE'];


			//ROW T

			$result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 97 AND 98"));
			$T_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 97 AND 98"));
			$T_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 97 AND 98"));
			$T_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 97 AND 98"));
			$T_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 97 AND 98"));
			$T_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 97 AND 98"));
			$T_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 97 AND 98"));
			$T_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 97 AND 98"));
			$T_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 97 AND 98"));
			$T_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 97 AND 98"));
			$T_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 97 AND 98"));
			$T_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 97 AND 98"));
			$T_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 97 AND 98"));
			$T_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 97 AND 98"));
			$T_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 97 AND 98"));
			$T_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 97 AND 98"));
			$T_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE'];


			//ROW U

			$result = $this -> Report -> query($main_query.$where.$this->_total(" = 99"));
			$U_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 99"));
			$U_COTTAGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 99"));
			$U_COTTAGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 99"));
			$U_COTTAGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 



			$result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 99"));
			$U_MICRO_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 99"));
			$U_MICRO_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 99"));
			$U_MICRO_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 99"));
			$U_SMALL_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 99"));
			$U_SMALL_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 99"));
			$U_SMALL_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 


			$result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 99"));
			$U_MEDIUM_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 99"));
			$U_MEDIUM_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 99"));
			$U_MEDIUM_RURAL = (int)$result[0][0]['TOTAL_COTTAGE']; 
			

			$result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 99"));
			$U_LARGE_TOTAL = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 99"));
			$U_LARGE_URBAN = (int)$result[0][0]['TOTAL_COTTAGE']; 

			$result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 99"));
			$U_LARGE_RURAL = (int)$result[0][0]['TOTAL_COTTAGE'];





			
		}

		$this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union',
		# A -----------------
		// 'A_TOTAL', 'A_COTTAGE_TOTAL', 'A_COTTAGE_URBAN', 'A_COTTAGE_RURAL', 'A_MICRO_TOTAL', 'A_MICRO_URBAN', 'A_MICRO_RURAL',
		// 'A_SMALL_TOTAL', 'A_SMALL_URBAN', 'A_SMALL_RURAL', 'A_MEDIUM_TOTAL', 'A_MEDIUM_URBAN', 'A_MEDIUM_RURAL',
		// 'A_LARGE_TOTAL', 'A_LARGE_URBAN', 'A_LARGE_RURAL', 
		# B--------------------------
		'B_TOTAL', 'B_COTTAGE_TOTAL', 'B_COTTAGE_URBAN', 'B_COTTAGE_RURAL', 'B_MICRO_TOTAL', 'B_MICRO_URBAN', 'B_MICRO_RURAL',
		'B_SMALL_TOTAL', 'B_SMALL_URBAN', 'B_SMALL_RURAL', 'B_MEDIUM_TOTAL', 'B_MEDIUM_URBAN', 'B_MEDIUM_RURAL',
		'B_LARGE_TOTAL', 'B_LARGE_URBAN', 'B_LARGE_RURAL', 
		# C -----------------
		'C_TOTAL', 'C_COTTAGE_TOTAL', 'C_COTTAGE_URBAN', 'C_COTTAGE_RURAL', 'C_MICRO_TOTAL', 'C_MICRO_URBAN', 'C_MICRO_RURAL',
		'C_SMALL_TOTAL', 'C_SMALL_URBAN', 'C_SMALL_RURAL', 'C_MEDIUM_TOTAL', 'C_MEDIUM_URBAN', 'C_MEDIUM_RURAL',
		'C_LARGE_TOTAL', 'C_LARGE_URBAN', 'C_LARGE_RURAL', 
		# D -----------------
		'D_TOTAL', 'D_COTTAGE_TOTAL', 'D_COTTAGE_URBAN', 'D_COTTAGE_RURAL', 'D_MICRO_TOTAL', 'D_MICRO_URBAN', 'D_MICRO_RURAL',
		'D_SMALL_TOTAL', 'D_SMALL_URBAN', 'D_SMALL_RURAL', 'D_MEDIUM_TOTAL', 'D_MEDIUM_URBAN', 'D_MEDIUM_RURAL',
		'D_LARGE_TOTAL', 'D_LARGE_URBAN', 'D_LARGE_RURAL', 
		# E -----------------
		'E_TOTAL', 'E_COTTAGE_TOTAL', 'E_COTTAGE_URBAN', 'E_COTTAGE_RURAL', 'E_MICRO_TOTAL', 'E_MICRO_URBAN', 'E_MICRO_RURAL',
		'E_SMALL_TOTAL', 'E_SMALL_URBAN', 'E_SMALL_RURAL', 'E_MEDIUM_TOTAL', 'E_MEDIUM_URBAN', 'E_MEDIUM_RURAL',
		'E_LARGE_TOTAL', 'E_LARGE_URBAN', 'E_LARGE_RURAL', 
		# F-----------------
		'F_TOTAL', 'F_COTTAGE_TOTAL', 'F_COTTAGE_URBAN', 'F_COTTAGE_RURAL', 'F_MICRO_TOTAL', 'F_MICRO_URBAN', 'F_MICRO_RURAL',
		'F_SMALL_TOTAL', 'F_SMALL_URBAN', 'F_SMALL_RURAL', 'F_MEDIUM_TOTAL', 'F_MEDIUM_URBAN', 'F_MEDIUM_RURAL',
		'F_LARGE_TOTAL', 'F_LARGE_URBAN', 'F_LARGE_RURAL',  
		# G -----------------
		'G_TOTAL', 'G_COTTAGE_TOTAL', 'G_COTTAGE_URBAN', 'G_COTTAGE_RURAL', 'G_MICRO_TOTAL', 'G_MICRO_URBAN', 'G_MICRO_RURAL',
		'G_SMALL_TOTAL', 'G_SMALL_URBAN', 'G_SMALL_RURAL', 'G_MEDIUM_TOTAL', 'G_MEDIUM_URBAN', 'G_MEDIUM_RURAL',
		'G_LARGE_TOTAL', 'G_LARGE_URBAN', 'G_LARGE_RURAL', 
		# H -----------------
		'H_TOTAL', 'H_COTTAGE_TOTAL', 'H_COTTAGE_URBAN', 'H_COTTAGE_RURAL', 'H_MICRO_TOTAL', 'H_MICRO_URBAN', 'H_MICRO_RURAL',
		'H_SMALL_TOTAL', 'H_SMALL_URBAN', 'H_SMALL_RURAL', 'H_MEDIUM_TOTAL', 'H_MEDIUM_URBAN', 'H_MEDIUM_RURAL',
		'H_LARGE_TOTAL', 'H_LARGE_URBAN', 'H_LARGE_RURAL', 
		# I -----------------
		'I_TOTAL', 'I_COTTAGE_TOTAL', 'I_COTTAGE_URBAN', 'I_COTTAGE_RURAL', 'I_MICRO_TOTAL', 'I_MICRO_URBAN', 'I_MICRO_RURAL',
		'I_SMALL_TOTAL', 'I_SMALL_URBAN', 'I_SMALL_RURAL', 'I_MEDIUM_TOTAL', 'I_MEDIUM_URBAN', 'I_MEDIUM_RURAL',
		'I_LARGE_TOTAL', 'I_LARGE_URBAN', 'I_LARGE_RURAL', 
		# J -----------------
		'J_TOTAL', 'J_COTTAGE_TOTAL', 'J_COTTAGE_URBAN', 'J_COTTAGE_RURAL', 'J_MICRO_TOTAL', 'J_MICRO_URBAN', 'J_MICRO_RURAL',
		'J_SMALL_TOTAL', 'J_SMALL_URBAN', 'J_SMALL_RURAL', 'J_MEDIUM_TOTAL', 'J_MEDIUM_URBAN', 'J_MEDIUM_RURAL',
		'J_LARGE_TOTAL', 'J_LARGE_URBAN', 'J_LARGE_RURAL', 
		# K -----------------
		'K_TOTAL', 'K_COTTAGE_TOTAL', 'K_COTTAGE_URBAN', 'K_COTTAGE_RURAL', 'K_MICRO_TOTAL', 'K_MICRO_URBAN', 'K_MICRO_RURAL',
		'K_SMALL_TOTAL', 'K_SMALL_URBAN', 'K_SMALL_RURAL', 'K_MEDIUM_TOTAL', 'K_MEDIUM_URBAN', 'K_MEDIUM_RURAL',
		'K_LARGE_TOTAL', 'K_LARGE_URBAN', 'K_LARGE_RURAL', 
		# L -----------------
		'L_TOTAL', 'L_COTTAGE_TOTAL', 'L_COTTAGE_URBAN', 'L_COTTAGE_RURAL', 'L_MICRO_TOTAL', 'L_MICRO_URBAN', 'L_MICRO_RURAL',
		'L_SMALL_TOTAL', 'L_SMALL_URBAN', 'L_SMALL_RURAL', 'L_MEDIUM_TOTAL', 'L_MEDIUM_URBAN', 'L_MEDIUM_RURAL',
		'L_LARGE_TOTAL', 'L_LARGE_URBAN', 'L_LARGE_RURAL', 
		# M -----------------
		'M_TOTAL', 'M_COTTAGE_TOTAL', 'M_COTTAGE_URBAN', 'M_COTTAGE_RURAL', 'M_MICRO_TOTAL', 'M_MICRO_URBAN', 'M_MICRO_RURAL',
		'M_SMALL_TOTAL', 'M_SMALL_URBAN', 'M_SMALL_RURAL', 'M_MEDIUM_TOTAL', 'M_MEDIUM_URBAN', 'M_MEDIUM_RURAL',
		'M_LARGE_TOTAL', 'M_LARGE_URBAN', 'M_LARGE_RURAL',  
		# N -----------------
		'N_TOTAL', 'N_COTTAGE_TOTAL', 'N_COTTAGE_URBAN', 'N_COTTAGE_RURAL', 'N_MICRO_TOTAL', 'N_MICRO_URBAN', 'N_MICRO_RURAL',
		'N_SMALL_TOTAL', 'N_SMALL_URBAN', 'N_SMALL_RURAL', 'N_MEDIUM_TOTAL', 'N_MEDIUM_URBAN', 'N_MEDIUM_RURAL',
		'N_LARGE_TOTAL', 'N_LARGE_URBAN', 'N_LARGE_RURAL', 
		# O -----------------
		'O_TOTAL', 'O_COTTAGE_TOTAL', 'O_COTTAGE_URBAN', 'O_COTTAGE_RURAL', 'O_MICRO_TOTAL', 'O_MICRO_URBAN', 'O_MICRO_RURAL',
		'O_SMALL_TOTAL', 'O_SMALL_URBAN', 'O_SMALL_RURAL', 'O_MEDIUM_TOTAL', 'O_MEDIUM_URBAN', 'O_MEDIUM_RURAL',
		'O_LARGE_TOTAL', 'O_LARGE_URBAN', 'O_LARGE_RURAL', 
		# P -----------------
		'P_TOTAL', 'P_COTTAGE_TOTAL', 'P_COTTAGE_URBAN', 'P_COTTAGE_RURAL', 'P_MICRO_TOTAL', 'P_MICRO_URBAN', 'P_MICRO_RURAL',
		'P_SMALL_TOTAL', 'P_SMALL_URBAN', 'P_SMALL_RURAL', 'P_MEDIUM_TOTAL', 'P_MEDIUM_URBAN', 'P_MEDIUM_RURAL',
		'P_LARGE_TOTAL', 'P_LARGE_URBAN', 'P_LARGE_RURAL', 
		# Q -----------------
		'Q_TOTAL', 'Q_COTTAGE_TOTAL', 'Q_COTTAGE_URBAN', 'Q_COTTAGE_RURAL', 'Q_MICRO_TOTAL', 'Q_MICRO_URBAN', 'Q_MICRO_RURAL',
		'Q_SMALL_TOTAL', 'Q_SMALL_URBAN', 'Q_SMALL_RURAL', 'Q_MEDIUM_TOTAL', 'Q_MEDIUM_URBAN', 'Q_MEDIUM_RURAL',
		'Q_LARGE_TOTAL', 'Q_LARGE_URBAN', 'Q_LARGE_RURAL', 
		# R -----------------
		'R_TOTAL', 'R_COTTAGE_TOTAL', 'R_COTTAGE_URBAN', 'R_COTTAGE_RURAL', 'R_MICRO_TOTAL', 'R_MICRO_URBAN', 'R_MICRO_RURAL',
		'R_SMALL_TOTAL', 'R_SMALL_URBAN', 'R_SMALL_RURAL', 'R_MEDIUM_TOTAL', 'R_MEDIUM_URBAN', 'R_MEDIUM_RURAL',
		'R_LARGE_TOTAL', 'R_LARGE_URBAN', 'R_LARGE_RURAL', 
		# S -----------------
		'S_TOTAL', 'S_COTTAGE_TOTAL', 'S_COTTAGE_URBAN', 'S_COTTAGE_RURAL', 'S_MICRO_TOTAL', 'S_MICRO_URBAN', 'S_MICRO_RURAL',
		'S_SMALL_TOTAL', 'S_SMALL_URBAN', 'S_SMALL_RURAL', 'S_MEDIUM_TOTAL', 'S_MEDIUM_URBAN', 'S_MEDIUM_RURAL',
		'S_LARGE_TOTAL', 'S_LARGE_URBAN', 'S_LARGE_RURAL', 
		# T -----------------
		'T_TOTAL', 'T_COTTAGE_TOTAL', 'T_COTTAGE_URBAN', 'T_COTTAGE_RURAL', 'T_MICRO_TOTAL', 'T_MICRO_URBAN', 'T_MICRO_RURAL',
		'T_SMALL_TOTAL', 'T_SMALL_URBAN', 'T_SMALL_RURAL', 'T_MEDIUM_TOTAL', 'T_MEDIUM_URBAN', 'T_MEDIUM_RURAL',
		'T_LARGE_TOTAL', 'T_LARGE_URBAN', 'T_LARGE_RURAL', 
		# U -----------------
		'U_TOTAL', 'U_COTTAGE_TOTAL', 'U_COTTAGE_URBAN', 'U_COTTAGE_RURAL', 'U_MICRO_TOTAL', 'U_MICRO_URBAN', 'U_MICRO_RURAL',
		'U_SMALL_TOTAL', 'U_SMALL_URBAN', 'U_SMALL_RURAL', 'U_MEDIUM_TOTAL', 'U_MEDIUM_URBAN', 'U_MEDIUM_RURAL',
		'U_LARGE_TOTAL', 'U_LARGE_URBAN', 'U_LARGE_RURAL'
		
		));

	}


















	 public function tpe_tbl_eight_four() {

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

            $main_query = "SELECT COUNT(C.QUESTIONNARIE_ID) TOTAL_COTTAGE FROM BBSEC2013_REPORTS C WHERE ";
            
            //ROW A

            // $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 1 AND 3"));
            // $A_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 1 AND 3"));
            // $A_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 1 AND 3"));
            // $A_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 1 AND 3"));
            // $A_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            // $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 1 AND 3"));
            // $A_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 1 AND 3"));
            // $A_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 1 AND 3"));
            // $A_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            // $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 1 AND 3"));
            // $A_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 1 AND 3"));
            // $A_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 1 AND 3"));
            // $A_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            // $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 1 AND 3"));
            // $A_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 1 AND 3"));
            // $A_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 1 AND 3"));
            // $A_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            // $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 1 AND 3"));
            // $A_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 1 AND 3"));
            // $A_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            // $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 1 AND 3"));
            // $A_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 







            //ROW B

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 05 AND 09"));
            $B_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 05 AND 09"));
            $B_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 05 AND 09"));
            $B_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 05 AND 09"));
            $B_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 05 AND 09"));
            $B_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 05 AND 09"));
            $B_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 05 AND 09"));
            $B_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 05 AND 09"));
            $B_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 05 AND 09"));
            $B_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 05 AND 09"));
            $B_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 05 AND 09"));
            $B_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 05 AND 09"));
            $B_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 05 AND 09"));
            $B_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 05 AND 09"));
            $B_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 05 AND 09"));
            $B_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 05 AND 09"));
            $B_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 







            //ROW C

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 10 AND 33"));
            $C_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 10 AND 33"));
            $C_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 10 AND 33"));
            $C_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 10 AND 33"));
            $C_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 10 AND 33"));
            $C_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 10 AND 33"));
            $C_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 10 AND 33"));
            $C_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 10 AND 33"));
            $C_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 10 AND 33"));
            $C_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 10 AND 33"));
            $C_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 10 AND 33"));
            $C_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 10 AND 33"));
            $C_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 10 AND 33"));
            $C_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 10 AND 33"));
            $C_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 10 AND 33"));
            $C_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 10 AND 33"));
            $C_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 






            //ROW D

            $result = $this -> Report -> query($main_query.$where.$this->_total(" = 35"));
            $D_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 35"));
            $D_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 35"));
            $D_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 35"));
            $D_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 35"));
            $D_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 35"));
            $D_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 35"));
            $D_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 35"));
            $D_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 35"));
            $D_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 35"));
            $D_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 35"));
            $D_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 35"));
            $D_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 35"));
            $D_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 35"));
            $D_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 35"));
            $D_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 35"));
            $D_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];






            //ROW E

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 36  AND 39"));
            $E_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 36  AND 39"));
            $E_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 36  AND 39"));
            $E_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 36  AND 39"));
            $E_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 36  AND 39"));
            $E_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 36  AND 39"));
            $E_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 36  AND 39"));
            $E_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 36  AND 39"));
            $E_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 36  AND 39"));
            $E_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 36  AND 39"));
            $E_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 36  AND 39"));
            $E_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 36  AND 39"));
            $E_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 36  AND 39"));
            $E_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 36  AND 39"));
            $E_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 36  AND 39"));
            $E_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 36  AND 39"));
            $E_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 





            //ROW F

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 41 AND 43"));
            $F_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 41 AND 43"));
            $F_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 41 AND 43"));
            $F_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 41 AND 43"));
            $F_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 41 AND 43"));
            $F_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 41 AND 43"));
            $F_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 41 AND 43"));
            $F_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 41 AND 43"));
            $F_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 41 AND 43"));
            $F_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 41 AND 43"));
            $F_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 41 AND 43"));
            $F_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 41 AND 43"));
            $F_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 41 AND 43"));
            $F_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 41 AND 43"));
            $F_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 41 AND 43"));
            $F_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 41 AND 43"));
            $F_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



            //ROW G

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 45 AND 47"));
            $G_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 45 AND 47"));
            $G_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 45 AND 47"));
            $G_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 45 AND 47"));
            $G_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 45 AND 47"));
            $G_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 45 AND 47"));
            $G_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 45 AND 47"));
            $G_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 45 AND 47"));
            $G_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 45 AND 47"));
            $G_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 45 AND 47"));
            $G_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 45 AND 47"));
            $G_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 45 AND 47"));
            $G_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 45 AND 47"));
            $G_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 45 AND 47"));
            $G_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 45 AND 47"));
            $G_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 45 AND 47"));
            $G_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



            //ROW H

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 49 AND 53"));
            $H_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 49 AND 53"));
            $H_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 49 AND 53"));
            $H_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 49 AND 53"));
            $H_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 49 AND 53"));
            $H_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 49 AND 53"));
            $H_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 49 AND 53"));
            $H_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 49 AND 53"));
            $H_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 49 AND 53"));
            $H_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 49 AND 53"));
            $H_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 49 AND 53"));
            $H_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 49 AND 53"));
            $H_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 49 AND 53"));
            $H_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 49 AND 53"));
            $H_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 49 AND 53"));
            $H_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 49 AND 53"));
            $H_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



            //ROW I

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 55 AND 56"));
            $I_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 55 AND 56"));
            $I_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 55 AND 56"));
            $I_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 55 AND 56"));
            $I_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 55 AND 56"));
            $I_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 55 AND 56"));
            $I_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 55 AND 56"));
            $I_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 55 AND 56"));
            $I_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 55 AND 56"));
            $I_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 55 AND 56"));
            $I_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 55 AND 56"));
            $I_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 55 AND 56"));
            $I_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 55 AND 56"));
            $I_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 55 AND 56"));
            $I_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 55 AND 56"));
            $I_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 55 AND 56"));
            $I_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



            //ROW J

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 58 AND 63"));
            $J_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 58 AND 63"));
            $J_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 58 AND 63"));
            $J_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 58 AND 63"));
            $J_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 58 AND 63"));
            $J_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 58 AND 63"));
            $J_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 58 AND 63"));
            $J_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 58 AND 63"));
            $J_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 58 AND 63"));
            $J_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 58 AND 63"));
            $J_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 58 AND 63"));
            $J_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 58 AND 63"));
            $J_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 58 AND 63"));
            $J_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 58 AND 63"));
            $J_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 58 AND 63"));
            $J_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 58 AND 63"));
            $J_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW K

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 64 AND 66"));
            $K_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 64 AND 66"));
            $K_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 64 AND 66"));
            $K_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 64 AND 66"));
            $K_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 64 AND 66"));
            $K_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 64 AND 66"));
            $K_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 64 AND 66"));
            $K_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 64 AND 66"));
            $K_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 64 AND 66"));
            $K_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 64 AND 66"));
            $K_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 64 AND 66"));
            $K_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 64 AND 66"));
            $K_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 64 AND 66"));
            $K_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 64 AND 66"));
            $K_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 64 AND 66"));
            $K_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 64 AND 66"));
            $K_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



            //ROW L

            $result = $this -> Report -> query($main_query.$where.$this->_total(" = 68"));
            $L_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 68"));
            $L_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 68"));
            $L_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 68"));
            $L_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 68"));
            $L_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 68"));
            $L_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 68"));
            $L_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 68"));
            $L_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 68"));
            $L_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 68"));
            $L_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 68"));
            $L_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 68"));
            $L_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 68"));
            $L_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 68"));
            $L_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 68"));
            $L_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 68"));
            $L_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW M

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 69 AND 75"));
            $M_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 69 AND 75"));
            $M_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 69 AND 75"));
            $M_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 69 AND 75"));
            $M_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 69 AND 75"));
            $M_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 69 AND 75"));
            $M_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 69 AND 75"));
            $M_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 69 AND 75"));
            $M_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 69 AND 75"));
            $M_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 69 AND 75"));
            $M_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 69 AND 75"));
            $M_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 69 AND 75"));
            $M_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 69 AND 75"));
            $M_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 69 AND 75"));
            $M_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 69 AND 75"));
            $M_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 69 AND 75"));
            $M_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW N

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 77  AND 82"));
            $N_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 77  AND 82"));
            $N_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 77  AND 82"));
            $N_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 77  AND 82"));
            $N_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 77  AND 82"));
            $N_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 77  AND 82"));
            $N_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 77  AND 82"));
            $N_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 77  AND 82"));
            $N_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 77  AND 82"));
            $N_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 77  AND 82"));
            $N_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 77  AND 82"));
            $N_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 77  AND 82"));
            $N_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 77  AND 82"));
            $N_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 77  AND 82"));
            $N_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 77  AND 82"));
            $N_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 77  AND 82"));
            $N_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW O

            $result = $this -> Report -> query($main_query.$where.$this->_total(" = 84"));
            $O_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 84"));
            $O_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 84"));
            $O_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 84"));
            $O_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 84"));
            $O_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 84"));
            $O_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 84"));
            $O_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 84"));
            $O_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 84"));
            $O_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 84"));
            $O_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 84"));
            $O_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 84"));
            $O_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 84"));
            $O_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 84"));
            $O_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 84"));
            $O_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 84"));
            $O_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



            //ROW P

            $result = $this -> Report -> query($main_query.$where.$this->_total(" = 85"));
            $P_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 85"));
            $P_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 85"));
            $P_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 85"));
            $P_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 85"));
            $P_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 85"));
            $P_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 85"));
            $P_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 85"));
            $P_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 85"));
            $P_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 85"));
            $P_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 85"));
            $P_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 85"));
            $P_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 85"));
            $P_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 85"));
            $P_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 85"));
            $P_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 85"));
            $P_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW Q

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 86 AND 88"));
            $Q_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 86 AND 88"));
            $Q_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 86 AND 88"));
            $Q_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 86 AND 88"));
            $Q_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 86 AND 88"));
            $Q_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 86 AND 88"));
            $Q_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 86 AND 88"));
            $Q_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 86 AND 88"));
            $Q_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 86 AND 88"));
            $Q_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 86 AND 88"));
            $Q_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 86 AND 88"));
            $Q_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 86 AND 88"));
            $Q_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 86 AND 88"));
            $Q_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 86 AND 88"));
            $Q_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 86 AND 88"));
            $Q_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 86 AND 88"));
            $Q_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW R

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 90 AND 93"));
            $R_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 90 AND 93"));
            $R_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 90 AND 93"));
            $R_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 90 AND 93"));
            $R_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 90 AND 93"));
            $R_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 90 AND 93"));
            $R_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 90 AND 93"));
            $R_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 90 AND 93"));
            $R_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 90 AND 93"));
            $R_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 90 AND 93"));
            $R_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 90 AND 93"));
            $R_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 90 AND 93"));
            $R_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 90 AND 93"));
            $R_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 90 AND 93"));
            $R_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 90 AND 93"));
            $R_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 90 AND 93"));
            $R_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW S

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 94 AND 96"));
            $S_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 94 AND 96"));
            $S_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 94 AND 96"));
            $S_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 94 AND 96"));
            $S_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 94 AND 96"));
            $S_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 94 AND 96"));
            $S_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 94 AND 96"));
            $S_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 94 AND 96"));
            $S_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 94 AND 96"));
            $S_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 94 AND 96"));
            $S_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 94 AND 96"));
            $S_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 94 AND 96"));
            $S_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 94 AND 96"));
            $S_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 94 AND 96"));
            $S_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 94 AND 96"));
            $S_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 94 AND 96"));
            $S_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW T

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 97 AND 98"));
            $T_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 97 AND 98"));
            $T_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 97 AND 98"));
            $T_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 97 AND 98"));
            $T_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 97 AND 98"));
            $T_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 97 AND 98"));
            $T_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 97 AND 98"));
            $T_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 97 AND 98"));
            $T_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 97 AND 98"));
            $T_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 97 AND 98"));
            $T_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 97 AND 98"));
            $T_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 97 AND 98"));
            $T_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 97 AND 98"));
            $T_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 97 AND 98"));
            $T_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 97 AND 98"));
            $T_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 97 AND 98"));
            $T_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW U

            $result = $this -> Report -> query($main_query.$where.$this->_total(" = 99"));
            $U_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 99"));
            $U_COTTAGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 99"));
            $U_COTTAGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 99"));
            $U_COTTAGE_RURAL = $result[0][0]['TOTAL_COTTAGE']; 



            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 99"));
            $U_MICRO_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 99"));
            $U_MICRO_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 99"));
            $U_MICRO_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 99"));
            $U_SMALL_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 99"));
            $U_SMALL_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 99"));
            $U_SMALL_RURAL = $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 99"));
            $U_MEDIUM_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 99"));
            $U_MEDIUM_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 99"));
            $U_MEDIUM_RURAL = $result[0][0]['TOTAL_COTTAGE']; 
            

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 99"));
            $U_LARGE_TOTAL = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 99"));
            $U_LARGE_URBAN = $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 99"));
            $U_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];





            
        }

        $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union',
        # A -----------------
        'A_TOTAL', 'A_COTTAGE_TOTAL', 'A_COTTAGE_URBAN', 'A_COTTAGE_RURAL', 'A_MICRO_TOTAL', 'A_MICRO_URBAN', 'A_MICRO_RURAL',
        'A_SMALL_TOTAL', 'A_SMALL_URBAN', 'A_SMALL_RURAL', 'A_MEDIUM_TOTAL', 'A_MEDIUM_URBAN', 'A_MEDIUM_RURAL',
        'A_LARGE_TOTAL', 'A_LARGE_URBAN', 'A_LARGE_RURAL', 
        # B--------------------------
        'B_TOTAL', 'B_COTTAGE_TOTAL', 'B_COTTAGE_URBAN', 'B_COTTAGE_RURAL', 'B_MICRO_TOTAL', 'B_MICRO_URBAN', 'B_MICRO_RURAL',
        'B_SMALL_TOTAL', 'B_SMALL_URBAN', 'B_SMALL_RURAL', 'B_MEDIUM_TOTAL', 'B_MEDIUM_URBAN', 'B_MEDIUM_RURAL',
        'B_LARGE_TOTAL', 'B_LARGE_URBAN', 'B_LARGE_RURAL', 
        # C -----------------
        'C_TOTAL', 'C_COTTAGE_TOTAL', 'C_COTTAGE_URBAN', 'C_COTTAGE_RURAL', 'C_MICRO_TOTAL', 'C_MICRO_URBAN', 'C_MICRO_RURAL',
        'C_SMALL_TOTAL', 'C_SMALL_URBAN', 'C_SMALL_RURAL', 'C_MEDIUM_TOTAL', 'C_MEDIUM_URBAN', 'C_MEDIUM_RURAL',
        'C_LARGE_TOTAL', 'C_LARGE_URBAN', 'C_LARGE_RURAL', 
        # D -----------------
        'D_TOTAL', 'D_COTTAGE_TOTAL', 'D_COTTAGE_URBAN', 'D_COTTAGE_RURAL', 'D_MICRO_TOTAL', 'D_MICRO_URBAN', 'D_MICRO_RURAL',
        'D_SMALL_TOTAL', 'D_SMALL_URBAN', 'D_SMALL_RURAL', 'D_MEDIUM_TOTAL', 'D_MEDIUM_URBAN', 'D_MEDIUM_RURAL',
        'D_LARGE_TOTAL', 'D_LARGE_URBAN', 'D_LARGE_RURAL', 
        # E -----------------
        'E_TOTAL', 'E_COTTAGE_TOTAL', 'E_COTTAGE_URBAN', 'E_COTTAGE_RURAL', 'E_MICRO_TOTAL', 'E_MICRO_URBAN', 'E_MICRO_RURAL',
        'E_SMALL_TOTAL', 'E_SMALL_URBAN', 'E_SMALL_RURAL', 'E_MEDIUM_TOTAL', 'E_MEDIUM_URBAN', 'E_MEDIUM_RURAL',
        'E_LARGE_TOTAL', 'E_LARGE_URBAN', 'E_LARGE_RURAL', 
        # F-----------------
        'F_TOTAL', 'F_COTTAGE_TOTAL', 'F_COTTAGE_URBAN', 'F_COTTAGE_RURAL', 'F_MICRO_TOTAL', 'F_MICRO_URBAN', 'F_MICRO_RURAL',
        'F_SMALL_TOTAL', 'F_SMALL_URBAN', 'F_SMALL_RURAL', 'F_MEDIUM_TOTAL', 'F_MEDIUM_URBAN', 'F_MEDIUM_RURAL',
        'F_LARGE_TOTAL', 'F_LARGE_URBAN', 'F_LARGE_RURAL',  
        # G -----------------
        'G_TOTAL', 'G_COTTAGE_TOTAL', 'G_COTTAGE_URBAN', 'G_COTTAGE_RURAL', 'G_MICRO_TOTAL', 'G_MICRO_URBAN', 'G_MICRO_RURAL',
        'G_SMALL_TOTAL', 'G_SMALL_URBAN', 'G_SMALL_RURAL', 'G_MEDIUM_TOTAL', 'G_MEDIUM_URBAN', 'G_MEDIUM_RURAL',
        'G_LARGE_TOTAL', 'G_LARGE_URBAN', 'G_LARGE_RURAL', 
        # H -----------------
        'H_TOTAL', 'H_COTTAGE_TOTAL', 'H_COTTAGE_URBAN', 'H_COTTAGE_RURAL', 'H_MICRO_TOTAL', 'H_MICRO_URBAN', 'H_MICRO_RURAL',
        'H_SMALL_TOTAL', 'H_SMALL_URBAN', 'H_SMALL_RURAL', 'H_MEDIUM_TOTAL', 'H_MEDIUM_URBAN', 'H_MEDIUM_RURAL',
        'H_LARGE_TOTAL', 'H_LARGE_URBAN', 'H_LARGE_RURAL', 
        # I -----------------
        'I_TOTAL', 'I_COTTAGE_TOTAL', 'I_COTTAGE_URBAN', 'I_COTTAGE_RURAL', 'I_MICRO_TOTAL', 'I_MICRO_URBAN', 'I_MICRO_RURAL',
        'I_SMALL_TOTAL', 'I_SMALL_URBAN', 'I_SMALL_RURAL', 'I_MEDIUM_TOTAL', 'I_MEDIUM_URBAN', 'I_MEDIUM_RURAL',
        'I_LARGE_TOTAL', 'I_LARGE_URBAN', 'I_LARGE_RURAL', 
        # J -----------------
        'J_TOTAL', 'J_COTTAGE_TOTAL', 'J_COTTAGE_URBAN', 'J_COTTAGE_RURAL', 'J_MICRO_TOTAL', 'J_MICRO_URBAN', 'J_MICRO_RURAL',
        'J_SMALL_TOTAL', 'J_SMALL_URBAN', 'J_SMALL_RURAL', 'J_MEDIUM_TOTAL', 'J_MEDIUM_URBAN', 'J_MEDIUM_RURAL',
        'J_LARGE_TOTAL', 'J_LARGE_URBAN', 'J_LARGE_RURAL', 
        # K -----------------
        'K_TOTAL', 'K_COTTAGE_TOTAL', 'K_COTTAGE_URBAN', 'K_COTTAGE_RURAL', 'K_MICRO_TOTAL', 'K_MICRO_URBAN', 'K_MICRO_RURAL',
        'K_SMALL_TOTAL', 'K_SMALL_URBAN', 'K_SMALL_RURAL', 'K_MEDIUM_TOTAL', 'K_MEDIUM_URBAN', 'K_MEDIUM_RURAL',
        'K_LARGE_TOTAL', 'K_LARGE_URBAN', 'K_LARGE_RURAL', 
        # L -----------------
        'L_TOTAL', 'L_COTTAGE_TOTAL', 'L_COTTAGE_URBAN', 'L_COTTAGE_RURAL', 'L_MICRO_TOTAL', 'L_MICRO_URBAN', 'L_MICRO_RURAL',
        'L_SMALL_TOTAL', 'L_SMALL_URBAN', 'L_SMALL_RURAL', 'L_MEDIUM_TOTAL', 'L_MEDIUM_URBAN', 'L_MEDIUM_RURAL',
        'L_LARGE_TOTAL', 'L_LARGE_URBAN', 'L_LARGE_RURAL', 
        # M -----------------
        'M_TOTAL', 'M_COTTAGE_TOTAL', 'M_COTTAGE_URBAN', 'M_COTTAGE_RURAL', 'M_MICRO_TOTAL', 'M_MICRO_URBAN', 'M_MICRO_RURAL',
        'M_SMALL_TOTAL', 'M_SMALL_URBAN', 'M_SMALL_RURAL', 'M_MEDIUM_TOTAL', 'M_MEDIUM_URBAN', 'M_MEDIUM_RURAL',
        'M_LARGE_TOTAL', 'M_LARGE_URBAN', 'M_LARGE_RURAL',  
        # N -----------------
        'N_TOTAL', 'N_COTTAGE_TOTAL', 'N_COTTAGE_URBAN', 'N_COTTAGE_RURAL', 'N_MICRO_TOTAL', 'N_MICRO_URBAN', 'N_MICRO_RURAL',
        'N_SMALL_TOTAL', 'N_SMALL_URBAN', 'N_SMALL_RURAL', 'N_MEDIUM_TOTAL', 'N_MEDIUM_URBAN', 'N_MEDIUM_RURAL',
        'N_LARGE_TOTAL', 'N_LARGE_URBAN', 'N_LARGE_RURAL', 
        # O -----------------
        'O_TOTAL', 'O_COTTAGE_TOTAL', 'O_COTTAGE_URBAN', 'O_COTTAGE_RURAL', 'O_MICRO_TOTAL', 'O_MICRO_URBAN', 'O_MICRO_RURAL',
        'O_SMALL_TOTAL', 'O_SMALL_URBAN', 'O_SMALL_RURAL', 'O_MEDIUM_TOTAL', 'O_MEDIUM_URBAN', 'O_MEDIUM_RURAL',
        'O_LARGE_TOTAL', 'O_LARGE_URBAN', 'O_LARGE_RURAL', 
        # P -----------------
        'P_TOTAL', 'P_COTTAGE_TOTAL', 'P_COTTAGE_URBAN', 'P_COTTAGE_RURAL', 'P_MICRO_TOTAL', 'P_MICRO_URBAN', 'P_MICRO_RURAL',
        'P_SMALL_TOTAL', 'P_SMALL_URBAN', 'P_SMALL_RURAL', 'P_MEDIUM_TOTAL', 'P_MEDIUM_URBAN', 'P_MEDIUM_RURAL',
        'P_LARGE_TOTAL', 'P_LARGE_URBAN', 'P_LARGE_RURAL', 
        # Q -----------------
        'Q_TOTAL', 'Q_COTTAGE_TOTAL', 'Q_COTTAGE_URBAN', 'Q_COTTAGE_RURAL', 'Q_MICRO_TOTAL', 'Q_MICRO_URBAN', 'Q_MICRO_RURAL',
        'Q_SMALL_TOTAL', 'Q_SMALL_URBAN', 'Q_SMALL_RURAL', 'Q_MEDIUM_TOTAL', 'Q_MEDIUM_URBAN', 'Q_MEDIUM_RURAL',
        'Q_LARGE_TOTAL', 'Q_LARGE_URBAN', 'Q_LARGE_RURAL', 
        # R -----------------
        'R_TOTAL', 'R_COTTAGE_TOTAL', 'R_COTTAGE_URBAN', 'R_COTTAGE_RURAL', 'R_MICRO_TOTAL', 'R_MICRO_URBAN', 'R_MICRO_RURAL',
        'R_SMALL_TOTAL', 'R_SMALL_URBAN', 'R_SMALL_RURAL', 'R_MEDIUM_TOTAL', 'R_MEDIUM_URBAN', 'R_MEDIUM_RURAL',
        'R_LARGE_TOTAL', 'R_LARGE_URBAN', 'R_LARGE_RURAL', 
        # S -----------------
        'S_TOTAL', 'S_COTTAGE_TOTAL', 'S_COTTAGE_URBAN', 'S_COTTAGE_RURAL', 'S_MICRO_TOTAL', 'S_MICRO_URBAN', 'S_MICRO_RURAL',
        'S_SMALL_TOTAL', 'S_SMALL_URBAN', 'S_SMALL_RURAL', 'S_MEDIUM_TOTAL', 'S_MEDIUM_URBAN', 'S_MEDIUM_RURAL',
        'S_LARGE_TOTAL', 'S_LARGE_URBAN', 'S_LARGE_RURAL', 
        # T -----------------
        'T_TOTAL', 'T_COTTAGE_TOTAL', 'T_COTTAGE_URBAN', 'T_COTTAGE_RURAL', 'T_MICRO_TOTAL', 'T_MICRO_URBAN', 'T_MICRO_RURAL',
        'T_SMALL_TOTAL', 'T_SMALL_URBAN', 'T_SMALL_RURAL', 'T_MEDIUM_TOTAL', 'T_MEDIUM_URBAN', 'T_MEDIUM_RURAL',
        'T_LARGE_TOTAL', 'T_LARGE_URBAN', 'T_LARGE_RURAL', 
        # U -----------------
        'U_TOTAL', 'U_COTTAGE_TOTAL', 'U_COTTAGE_URBAN', 'U_COTTAGE_RURAL', 'U_MICRO_TOTAL', 'U_MICRO_URBAN', 'U_MICRO_RURAL',
        'U_SMALL_TOTAL', 'U_SMALL_URBAN', 'U_SMALL_RURAL', 'U_MEDIUM_TOTAL', 'U_MEDIUM_URBAN', 'U_MEDIUM_RURAL',
        'U_LARGE_TOTAL', 'U_LARGE_URBAN', 'U_LARGE_RURAL'
        
        ));

    }


public function tpe_tbl_eight_five() {

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
            
            //ROW A

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 1 AND 3"));
            $A_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 1 AND 3"));
            $A_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 1 AND 3"));
            $A_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 1 AND 3"));
            $A_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 1 AND 3"));
            $A_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 1 AND 3"));
            $A_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 1 AND 3"));
            $A_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 1 AND 3"));
            $A_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 1 AND 3"));
            $A_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 1 AND 3"));
            $A_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 1 AND 3"));
            $A_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 1 AND 3"));
            $A_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 1 AND 3"));
            $A_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 1 AND 3"));
            $A_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 1 AND 3"));
            $A_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 1 AND 3"));
            $A_LARGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 






            //ROW B

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 05 AND 09"));
            $B_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 05 AND 09"));
            $B_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 05 AND 09"));
            $B_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 05 AND 09"));
            $B_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 05 AND 09"));
            $B_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 05 AND 09"));
            $B_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 05 AND 09"));
            $B_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 05 AND 09"));
            $B_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 05 AND 09"));
            $B_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 05 AND 09"));
            $B_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 05 AND 09"));
            $B_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 05 AND 09"));
            $B_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 05 AND 09"));
            $B_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 05 AND 09"));
            $B_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 05 AND 09"));
            $B_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 05 AND 09"));
            $B_LARGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 






            //ROW C

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 10 AND 33"));
            $C_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 10 AND 33"));
            $C_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 10 AND 33"));
            $C_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 10 AND 33"));
            $C_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 10 AND 33"));
            $C_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 10 AND 33"));
            $C_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 10 AND 33"));
            $C_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 10 AND 33"));
            $C_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 10 AND 33"));
            $C_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 10 AND 33"));
            $C_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 10 AND 33"));
            $C_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 10 AND 33"));
            $C_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 10 AND 33"));
            $C_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 10 AND 33"));
            $C_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 10 AND 33"));
            $C_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 10 AND 33"));
            $C_LARGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 





            //ROW D

            $result = $this -> Report -> query($main_query.$where.$this->_total(" = 35"));
            $D_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 35"));
            $D_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 35"));
            $D_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 35"));
            $D_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 35"));
            $D_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 35"));
            $D_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 35"));
            $D_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 35"));
            $D_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 35"));
            $D_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 35"));
            $D_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 35"));
            $D_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 35"));
            $D_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 35"));
            $D_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 35"));
            $D_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 35"));
            $D_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 35"));
            $D_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];






            //ROW E

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 36  AND 39"));
            $E_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 36  AND 39"));
            $E_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 36  AND 39"));
            $E_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 36  AND 39"));
            $E_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 36  AND 39"));
            $E_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 36  AND 39"));
            $E_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 36  AND 39"));
            $E_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 36  AND 39"));
            $E_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 36  AND 39"));
            $E_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 36  AND 39"));
            $E_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 36  AND 39"));
            $E_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 36  AND 39"));
            $E_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 36  AND 39"));
            $E_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 36  AND 39"));
            $E_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 36  AND 39"));
            $E_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 36  AND 39"));
            $E_LARGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 




            //ROW F

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 41 AND 43"));
            $F_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 41 AND 43"));
            $F_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 41 AND 43"));
            $F_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 41 AND 43"));
            $F_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 41 AND 43"));
            $F_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 41 AND 43"));
            $F_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 41 AND 43"));
            $F_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 41 AND 43"));
            $F_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 41 AND 43"));
            $F_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 41 AND 43"));
            $F_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 41 AND 43"));
            $F_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 41 AND 43"));
            $F_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 41 AND 43"));
            $F_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 41 AND 43"));
            $F_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 41 AND 43"));
            $F_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 41 AND 43"));
            $F_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



            //ROW G

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 45 AND 47"));
            $G_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 45 AND 47"));
            $G_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 45 AND 47"));
            $G_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 45 AND 47"));
            $G_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 45 AND 47"));
            $G_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 45 AND 47"));
            $G_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 45 AND 47"));
            $G_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 45 AND 47"));
            $G_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 45 AND 47"));
            $G_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 45 AND 47"));
            $G_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 45 AND 47"));
            $G_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 45 AND 47"));
            $G_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 45 AND 47"));
            $G_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 45 AND 47"));
            $G_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 45 AND 47"));
            $G_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 45 AND 47"));
            $G_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



            //ROW H

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 49 AND 53"));
            $H_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 49 AND 53"));
            $H_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 49 AND 53"));
            $H_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 49 AND 53"));
            $H_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 49 AND 53"));
            $H_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 49 AND 53"));
            $H_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 49 AND 53"));
            $H_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 49 AND 53"));
            $H_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 49 AND 53"));
            $H_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 49 AND 53"));
            $H_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 49 AND 53"));
            $H_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 49 AND 53"));
            $H_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 49 AND 53"));
            $H_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 49 AND 53"));
            $H_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 49 AND 53"));
            $H_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 49 AND 53"));
            $H_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



            //ROW I

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 55 AND 56"));
            $I_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 55 AND 56"));
            $I_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 55 AND 56"));
            $I_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 55 AND 56"));
            $I_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 55 AND 56"));
            $I_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 55 AND 56"));
            $I_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 55 AND 56"));
            $I_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 55 AND 56"));
            $I_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 55 AND 56"));
            $I_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 55 AND 56"));
            $I_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 55 AND 56"));
            $I_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 55 AND 56"));
            $I_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 55 AND 56"));
            $I_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 55 AND 56"));
            $I_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 55 AND 56"));
            $I_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 55 AND 56"));
            $I_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



            //ROW J

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 58 AND 63"));
            $J_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 58 AND 63"));
            $J_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 58 AND 63"));
            $J_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 58 AND 63"));
            $J_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 58 AND 63"));
            $J_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 58 AND 63"));
            $J_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 58 AND 63"));
            $J_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 58 AND 63"));
            $J_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 58 AND 63"));
            $J_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 58 AND 63"));
            $J_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 58 AND 63"));
            $J_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 58 AND 63"));
            $J_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 58 AND 63"));
            $J_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 58 AND 63"));
            $J_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 58 AND 63"));
            $J_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 58 AND 63"));
            $J_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW K

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 64 AND 66"));
            $K_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 64 AND 66"));
            $K_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 64 AND 66"));
            $K_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 64 AND 66"));
            $K_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 64 AND 66"));
            $K_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 64 AND 66"));
            $K_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 64 AND 66"));
            $K_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 64 AND 66"));
            $K_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 64 AND 66"));
            $K_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 64 AND 66"));
            $K_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 64 AND 66"));
            $K_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 64 AND 66"));
            $K_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 64 AND 66"));
            $K_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 64 AND 66"));
            $K_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 64 AND 66"));
            $K_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 64 AND 66"));
            $K_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



            //ROW L

            $result = $this -> Report -> query($main_query.$where.$this->_total(" = 68"));
            $L_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 68"));
            $L_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 68"));
            $L_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 68"));
            $L_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 68"));
            $L_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 68"));
            $L_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 68"));
            $L_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 68"));
            $L_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 68"));
            $L_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 68"));
            $L_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 68"));
            $L_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 68"));
            $L_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 68"));
            $L_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 68"));
            $L_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 68"));
            $L_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 68"));
            $L_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW M

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 69 AND 75"));
            $M_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 69 AND 75"));
            $M_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 69 AND 75"));
            $M_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 69 AND 75"));
            $M_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 69 AND 75"));
            $M_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 69 AND 75"));
            $M_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 69 AND 75"));
            $M_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 69 AND 75"));
            $M_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 69 AND 75"));
            $M_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 69 AND 75"));
            $M_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 69 AND 75"));
            $M_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 69 AND 75"));
            $M_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 69 AND 75"));
            $M_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 69 AND 75"));
            $M_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 69 AND 75"));
            $M_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 69 AND 75"));
            $M_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW N

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 77  AND 82"));
            $N_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 77  AND 82"));
            $N_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 77  AND 82"));
            $N_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 77  AND 82"));
            $N_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 77  AND 82"));
            $N_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 77  AND 82"));
            $N_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 77  AND 82"));
            $N_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 77  AND 82"));
            $N_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 77  AND 82"));
            $N_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 77  AND 82"));
            $N_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 77  AND 82"));
            $N_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 77  AND 82"));
            $N_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 77  AND 82"));
            $N_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 77  AND 82"));
            $N_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 77  AND 82"));
            $N_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 77  AND 82"));
            $N_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW O

            $result = $this -> Report -> query($main_query.$where.$this->_total(" = 84"));
            $O_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 84"));
            $O_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 84"));
            $O_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 84"));
            $O_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 84"));
            $O_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 84"));
            $O_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 84"));
            $O_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 84"));
            $O_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 84"));
            $O_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 84"));
            $O_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 84"));
            $O_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 84"));
            $O_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 84"));
            $O_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 84"));
            $O_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 84"));
            $O_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 84"));
            $O_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];



            //ROW P

            $result = $this -> Report -> query($main_query.$where.$this->_total(" = 85"));
            $P_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 85"));
            $P_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 85"));
            $P_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 85"));
            $P_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 85"));
            $P_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 85"));
            $P_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 85"));
            $P_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 85"));
            $P_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 85"));
            $P_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 85"));
            $P_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 85"));
            $P_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 85"));
            $P_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 85"));
            $P_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 85"));
            $P_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 85"));
            $P_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 85"));
            $P_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW Q

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 86 AND 88"));
            $Q_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 86 AND 88"));
            $Q_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 86 AND 88"));
            $Q_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 86 AND 88"));
            $Q_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 86 AND 88"));
            $Q_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 86 AND 88"));
            $Q_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 86 AND 88"));
            $Q_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 86 AND 88"));
            $Q_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 86 AND 88"));
            $Q_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 86 AND 88"));
            $Q_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 86 AND 88"));
            $Q_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 86 AND 88"));
            $Q_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 86 AND 88"));
            $Q_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 86 AND 88"));
            $Q_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 86 AND 88"));
            $Q_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 86 AND 88"));
            $Q_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW R

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 90 AND 93"));
            $R_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 90 AND 93"));
            $R_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 90 AND 93"));
            $R_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 90 AND 93"));
            $R_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 90 AND 93"));
            $R_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 90 AND 93"));
            $R_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 90 AND 93"));
            $R_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 90 AND 93"));
            $R_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 90 AND 93"));
            $R_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 90 AND 93"));
            $R_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 90 AND 93"));
            $R_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 90 AND 93"));
            $R_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 90 AND 93"));
            $R_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 90 AND 93"));
            $R_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 90 AND 93"));
            $R_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 90 AND 93"));
            $R_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW S

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 94 AND 96"));
            $S_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 94 AND 96"));
            $S_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 94 AND 96"));
            $S_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 94 AND 96"));
            $S_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 94 AND 96"));
            $S_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 94 AND 96"));
            $S_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 94 AND 96"));
            $S_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 94 AND 96"));
            $S_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 94 AND 96"));
            $S_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 94 AND 96"));
            $S_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 94 AND 96"));
            $S_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 94 AND 96"));
            $S_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 94 AND 96"));
            $S_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 94 AND 96"));
            $S_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 94 AND 96"));
            $S_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 94 AND 96"));
            $S_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW T

            $result = $this -> Report -> query($main_query.$where.$this->_total(" BETWEEN 97 AND 98"));
            $T_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " BETWEEN 97 AND 98"));
            $T_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " BETWEEN 97 AND 98"));
            $T_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " BETWEEN 97 AND 98"));
            $T_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " BETWEEN 97 AND 98"));
            $T_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " BETWEEN 97 AND 98"));
            $T_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " BETWEEN 97 AND 98"));
            $T_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " BETWEEN 97 AND 98"));
            $T_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " BETWEEN 97 AND 98"));
            $T_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " BETWEEN 97 AND 98"));
            $T_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " BETWEEN 97 AND 98"));
            $T_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " BETWEEN 97 AND 98"));
            $T_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " BETWEEN 97 AND 98"));
            $T_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " BETWEEN 97 AND 98"));
            $T_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " BETWEEN 97 AND 98"));
            $T_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " BETWEEN 97 AND 98"));
            $T_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];


            //ROW U

            $result = $this -> Report -> query($main_query.$where.$this->_total(" = 99"));
            $U_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage(null, " = 99"));
            $U_COTTAGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('urban', " = 99"));
            $U_COTTAGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_cottage('rural', " = 99"));
            $U_COTTAGE_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 


            $result = $this -> Report -> query($main_query.$where.$this->_micro(null, " = 99"));
            $U_MICRO_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('urban', " = 99"));
            $U_MICRO_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_micro('rural', " = 99"));
            $U_MICRO_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_small(null, " = 99"));
            $U_SMALL_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('urban', " = 99"));
            $U_SMALL_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_small('rural', " = 99"));
            $U_SMALL_RURAL = (int) $result[0][0]['TOTAL_COTTAGE']; 

            $result = $this -> Report -> query($main_query.$where.$this->_medium(null, " = 99"));
            $U_MEDIUM_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('urban', " = 99"));
            $U_MEDIUM_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_medium('rural', " = 99"));
            $U_MEDIUM_RURAL = (int) $result[0][0]['TOTAL_COTTAGE'];             

            $result = $this -> Report -> query($main_query.$where.$this->_large(null, " = 99"));
            $U_LARGE_TOTAL = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('urban', " = 99"));
            $U_LARGE_URBAN = (int) $result[0][0]['TOTAL_COTTAGE']; 
            $result = $this -> Report -> query($main_query.$where.$this->_large('rural', " = 99"));
            $U_LARGE_RURAL = $result[0][0]['TOTAL_COTTAGE'];

        }

        $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union',
        # A -----------------
        'A_TOTAL', 'A_COTTAGE_TOTAL', 'A_COTTAGE_URBAN', 'A_COTTAGE_RURAL', 'A_MICRO_TOTAL', 'A_MICRO_URBAN', 'A_MICRO_RURAL',
        'A_SMALL_TOTAL', 'A_SMALL_URBAN', 'A_SMALL_RURAL', 'A_MEDIUM_TOTAL', 'A_MEDIUM_URBAN', 'A_MEDIUM_RURAL',
        'A_LARGE_TOTAL', 'A_LARGE_URBAN', 'A_LARGE_RURAL', 
        # B--------------------------
        'B_TOTAL', 'B_COTTAGE_TOTAL', 'B_COTTAGE_URBAN', 'B_COTTAGE_RURAL', 'B_MICRO_TOTAL', 'B_MICRO_URBAN', 'B_MICRO_RURAL',
        'B_SMALL_TOTAL', 'B_SMALL_URBAN', 'B_SMALL_RURAL', 'B_MEDIUM_TOTAL', 'B_MEDIUM_URBAN', 'B_MEDIUM_RURAL',
        'B_LARGE_TOTAL', 'B_LARGE_URBAN', 'B_LARGE_RURAL', 
        # C -----------------
        'C_TOTAL', 'C_COTTAGE_TOTAL', 'C_COTTAGE_URBAN', 'C_COTTAGE_RURAL', 'C_MICRO_TOTAL', 'C_MICRO_URBAN', 'C_MICRO_RURAL',
        'C_SMALL_TOTAL', 'C_SMALL_URBAN', 'C_SMALL_RURAL', 'C_MEDIUM_TOTAL', 'C_MEDIUM_URBAN', 'C_MEDIUM_RURAL',
        'C_LARGE_TOTAL', 'C_LARGE_URBAN', 'C_LARGE_RURAL', 
        # D -----------------
        'D_TOTAL', 'D_COTTAGE_TOTAL', 'D_COTTAGE_URBAN', 'D_COTTAGE_RURAL', 'D_MICRO_TOTAL', 'D_MICRO_URBAN', 'D_MICRO_RURAL',
        'D_SMALL_TOTAL', 'D_SMALL_URBAN', 'D_SMALL_RURAL', 'D_MEDIUM_TOTAL', 'D_MEDIUM_URBAN', 'D_MEDIUM_RURAL',
        'D_LARGE_TOTAL', 'D_LARGE_URBAN', 'D_LARGE_RURAL', 
        # E -----------------
        'E_TOTAL', 'E_COTTAGE_TOTAL', 'E_COTTAGE_URBAN', 'E_COTTAGE_RURAL', 'E_MICRO_TOTAL', 'E_MICRO_URBAN', 'E_MICRO_RURAL',
        'E_SMALL_TOTAL', 'E_SMALL_URBAN', 'E_SMALL_RURAL', 'E_MEDIUM_TOTAL', 'E_MEDIUM_URBAN', 'E_MEDIUM_RURAL',
        'E_LARGE_TOTAL', 'E_LARGE_URBAN', 'E_LARGE_RURAL', 
        # F-----------------
        'F_TOTAL', 'F_COTTAGE_TOTAL', 'F_COTTAGE_URBAN', 'F_COTTAGE_RURAL', 'F_MICRO_TOTAL', 'F_MICRO_URBAN', 'F_MICRO_RURAL',
        'F_SMALL_TOTAL', 'F_SMALL_URBAN', 'F_SMALL_RURAL', 'F_MEDIUM_TOTAL', 'F_MEDIUM_URBAN', 'F_MEDIUM_RURAL',
        'F_LARGE_TOTAL', 'F_LARGE_URBAN', 'F_LARGE_RURAL',  
        # G -----------------
        'G_TOTAL', 'G_COTTAGE_TOTAL', 'G_COTTAGE_URBAN', 'G_COTTAGE_RURAL', 'G_MICRO_TOTAL', 'G_MICRO_URBAN', 'G_MICRO_RURAL',
        'G_SMALL_TOTAL', 'G_SMALL_URBAN', 'G_SMALL_RURAL', 'G_MEDIUM_TOTAL', 'G_MEDIUM_URBAN', 'G_MEDIUM_RURAL',
        'G_LARGE_TOTAL', 'G_LARGE_URBAN', 'G_LARGE_RURAL', 
        # H -----------------
        'H_TOTAL', 'H_COTTAGE_TOTAL', 'H_COTTAGE_URBAN', 'H_COTTAGE_RURAL', 'H_MICRO_TOTAL', 'H_MICRO_URBAN', 'H_MICRO_RURAL',
        'H_SMALL_TOTAL', 'H_SMALL_URBAN', 'H_SMALL_RURAL', 'H_MEDIUM_TOTAL', 'H_MEDIUM_URBAN', 'H_MEDIUM_RURAL',
        'H_LARGE_TOTAL', 'H_LARGE_URBAN', 'H_LARGE_RURAL', 
        # I -----------------
        'I_TOTAL', 'I_COTTAGE_TOTAL', 'I_COTTAGE_URBAN', 'I_COTTAGE_RURAL', 'I_MICRO_TOTAL', 'I_MICRO_URBAN', 'I_MICRO_RURAL',
        'I_SMALL_TOTAL', 'I_SMALL_URBAN', 'I_SMALL_RURAL', 'I_MEDIUM_TOTAL', 'I_MEDIUM_URBAN', 'I_MEDIUM_RURAL',
        'I_LARGE_TOTAL', 'I_LARGE_URBAN', 'I_LARGE_RURAL', 
        # J -----------------
        'J_TOTAL', 'J_COTTAGE_TOTAL', 'J_COTTAGE_URBAN', 'J_COTTAGE_RURAL', 'J_MICRO_TOTAL', 'J_MICRO_URBAN', 'J_MICRO_RURAL',
        'J_SMALL_TOTAL', 'J_SMALL_URBAN', 'J_SMALL_RURAL', 'J_MEDIUM_TOTAL', 'J_MEDIUM_URBAN', 'J_MEDIUM_RURAL',
        'J_LARGE_TOTAL', 'J_LARGE_URBAN', 'J_LARGE_RURAL', 
        # K -----------------
        'K_TOTAL', 'K_COTTAGE_TOTAL', 'K_COTTAGE_URBAN', 'K_COTTAGE_RURAL', 'K_MICRO_TOTAL', 'K_MICRO_URBAN', 'K_MICRO_RURAL',
        'K_SMALL_TOTAL', 'K_SMALL_URBAN', 'K_SMALL_RURAL', 'K_MEDIUM_TOTAL', 'K_MEDIUM_URBAN', 'K_MEDIUM_RURAL',
        'K_LARGE_TOTAL', 'K_LARGE_URBAN', 'K_LARGE_RURAL', 
        # L -----------------
        'L_TOTAL', 'L_COTTAGE_TOTAL', 'L_COTTAGE_URBAN', 'L_COTTAGE_RURAL', 'L_MICRO_TOTAL', 'L_MICRO_URBAN', 'L_MICRO_RURAL',
        'L_SMALL_TOTAL', 'L_SMALL_URBAN', 'L_SMALL_RURAL', 'L_MEDIUM_TOTAL', 'L_MEDIUM_URBAN', 'L_MEDIUM_RURAL',
        'L_LARGE_TOTAL', 'L_LARGE_URBAN', 'L_LARGE_RURAL', 
        # M -----------------
        'M_TOTAL', 'M_COTTAGE_TOTAL', 'M_COTTAGE_URBAN', 'M_COTTAGE_RURAL', 'M_MICRO_TOTAL', 'M_MICRO_URBAN', 'M_MICRO_RURAL',
        'M_SMALL_TOTAL', 'M_SMALL_URBAN', 'M_SMALL_RURAL', 'M_MEDIUM_TOTAL', 'M_MEDIUM_URBAN', 'M_MEDIUM_RURAL',
        'M_LARGE_TOTAL', 'M_LARGE_URBAN', 'M_LARGE_RURAL',  
        # N -----------------
        'N_TOTAL', 'N_COTTAGE_TOTAL', 'N_COTTAGE_URBAN', 'N_COTTAGE_RURAL', 'N_MICRO_TOTAL', 'N_MICRO_URBAN', 'N_MICRO_RURAL',
        'N_SMALL_TOTAL', 'N_SMALL_URBAN', 'N_SMALL_RURAL', 'N_MEDIUM_TOTAL', 'N_MEDIUM_URBAN', 'N_MEDIUM_RURAL',
        'N_LARGE_TOTAL', 'N_LARGE_URBAN', 'N_LARGE_RURAL', 
        # O -----------------
        'O_TOTAL', 'O_COTTAGE_TOTAL', 'O_COTTAGE_URBAN', 'O_COTTAGE_RURAL', 'O_MICRO_TOTAL', 'O_MICRO_URBAN', 'O_MICRO_RURAL',
        'O_SMALL_TOTAL', 'O_SMALL_URBAN', 'O_SMALL_RURAL', 'O_MEDIUM_TOTAL', 'O_MEDIUM_URBAN', 'O_MEDIUM_RURAL',
        'O_LARGE_TOTAL', 'O_LARGE_URBAN', 'O_LARGE_RURAL', 
        # P -----------------
        'P_TOTAL', 'P_COTTAGE_TOTAL', 'P_COTTAGE_URBAN', 'P_COTTAGE_RURAL', 'P_MICRO_TOTAL', 'P_MICRO_URBAN', 'P_MICRO_RURAL',
        'P_SMALL_TOTAL', 'P_SMALL_URBAN', 'P_SMALL_RURAL', 'P_MEDIUM_TOTAL', 'P_MEDIUM_URBAN', 'P_MEDIUM_RURAL',
        'P_LARGE_TOTAL', 'P_LARGE_URBAN', 'P_LARGE_RURAL', 
        # Q -----------------
        'Q_TOTAL', 'Q_COTTAGE_TOTAL', 'Q_COTTAGE_URBAN', 'Q_COTTAGE_RURAL', 'Q_MICRO_TOTAL', 'Q_MICRO_URBAN', 'Q_MICRO_RURAL',
        'Q_SMALL_TOTAL', 'Q_SMALL_URBAN', 'Q_SMALL_RURAL', 'Q_MEDIUM_TOTAL', 'Q_MEDIUM_URBAN', 'Q_MEDIUM_RURAL',
        'Q_LARGE_TOTAL', 'Q_LARGE_URBAN', 'Q_LARGE_RURAL', 
        # R -----------------
        'R_TOTAL', 'R_COTTAGE_TOTAL', 'R_COTTAGE_URBAN', 'R_COTTAGE_RURAL', 'R_MICRO_TOTAL', 'R_MICRO_URBAN', 'R_MICRO_RURAL',
        'R_SMALL_TOTAL', 'R_SMALL_URBAN', 'R_SMALL_RURAL', 'R_MEDIUM_TOTAL', 'R_MEDIUM_URBAN', 'R_MEDIUM_RURAL',
        'R_LARGE_TOTAL', 'R_LARGE_URBAN', 'R_LARGE_RURAL', 
        # S -----------------
        'S_TOTAL', 'S_COTTAGE_TOTAL', 'S_COTTAGE_URBAN', 'S_COTTAGE_RURAL', 'S_MICRO_TOTAL', 'S_MICRO_URBAN', 'S_MICRO_RURAL',
        'S_SMALL_TOTAL', 'S_SMALL_URBAN', 'S_SMALL_RURAL', 'S_MEDIUM_TOTAL', 'S_MEDIUM_URBAN', 'S_MEDIUM_RURAL',
        'S_LARGE_TOTAL', 'S_LARGE_URBAN', 'S_LARGE_RURAL', 
        # T -----------------
        'T_TOTAL', 'T_COTTAGE_TOTAL', 'T_COTTAGE_URBAN', 'T_COTTAGE_RURAL', 'T_MICRO_TOTAL', 'T_MICRO_URBAN', 'T_MICRO_RURAL',
        'T_SMALL_TOTAL', 'T_SMALL_URBAN', 'T_SMALL_RURAL', 'T_MEDIUM_TOTAL', 'T_MEDIUM_URBAN', 'T_MEDIUM_RURAL',
        'T_LARGE_TOTAL', 'T_LARGE_URBAN', 'T_LARGE_RURAL', 
        # U -----------------
        'U_TOTAL', 'U_COTTAGE_TOTAL', 'U_COTTAGE_URBAN', 'U_COTTAGE_RURAL', 'U_MICRO_TOTAL', 'U_MICRO_URBAN', 'U_MICRO_RURAL',
        'U_SMALL_TOTAL', 'U_SMALL_URBAN', 'U_SMALL_RURAL', 'U_MEDIUM_TOTAL', 'U_MEDIUM_URBAN', 'U_MEDIUM_RURAL',
        'U_LARGE_TOTAL', 'U_LARGE_URBAN', 'U_LARGE_RURAL'
        
        ));

    }





public function tpe_tbl_eight_six() {
		
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

			$main_query_est = "SELECT COUNT(C.QUESTIONNARIE_ID) TOTAL_EST FROM BBSEC2013_REPORTS C WHERE ";
			$main_query_tpe = "SELECT SUM(C.TOTAL_PERSON_ENGAGED) TOTAL_TPE FROM BBSEC2013_REPORTS C WHERE ";			



			//ROW A------------------------------------------------------------------------------------------
			


			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, " BETWEEN 1 AND 3"));
			$A_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, " BETWEEN 1 AND 3"));
			$A_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 


			

			$A_AVG_COTTAGE_EST = round(($A_COTTAGE_TOTAL_TPE / $A_COTTAGE_TOTAL_EST),2) ;

			
			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, " BETWEEN 1 AND 3"));
			$A_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, " BETWEEN 1 AND 3"));
			$A_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$A_AVG_MICRO_EST = round(($A_MICRO_TOTAL_TPE / $A_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, " BETWEEN 1 AND 3"));
			$A_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, " BETWEEN 1 AND 3"));
			$A_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$A_AVG_SMALL_EST = round(($A_SMALL_TOTAL_TPE / $A_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, " BETWEEN 1 AND 3"));
			$A_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, " BETWEEN 1 AND 3"));
			$A_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$A_AVG_MEDIUM_EST = round(($A_MEDIUM_TOTAL_TPE / $A_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, " BETWEEN 1 AND 3"));
			$A_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, " BETWEEN 1 AND 3"));
			$A_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$A_AVG_LARGE_EST = round(($A_LARGE_TOTAL_TPE / $A_LARGE_TOTAL_EST), 2) ;








 //ROW B_------------------------------------------------------------------------------------------
			

			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, " BETWEEN 05 AND 09"));
			$B_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, " BETWEEN 05 AND 09"));
			$B_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$B_AVG_COTTAGE_EST = round(($B_COTTAGE_TOTAL_TPE / $B_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, " BETWEEN 05 AND 09"));
			$B_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, " BETWEEN 05 AND 09"));
			$B_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$B_AVG_MICRO_EST = round(($B_MICRO_TOTAL_TPE / $B_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, " BETWEEN 05 AND 09"));
			$B_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, " BETWEEN 05 AND 09"));
			$B_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$B_AVG_SMALL_EST = round(($B_SMALL_TOTAL_TPE / $B_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, " BETWEEN 05 AND 09"));
			$B_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, " BETWEEN 05 AND 09"));
			$B_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$B_AVG_MEDIUM_EST = round(($B_MEDIUM_TOTAL_TPE / $B_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, " BETWEEN 05 AND 09"));
			$B_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, " BETWEEN 05 AND 09"));
			$B_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$B_AVG_LARGE_EST = round(($B_LARGE_TOTAL_TPE / $B_LARGE_TOTAL_EST), 2) ;








			//ROW C_------------------------------------------------------------------------------------------
			

			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, " BETWEEN 10 AND 33"));
			$C_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, " BETWEEN 10 AND 33"));
			$C_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$C_AVG_COTTAGE_EST = round(($C_COTTAGE_TOTAL_TPE / $C_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, " BETWEEN 10 AND 33"));
			$C_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, " BETWEEN 10 AND 33"));
			$C_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$C_AVG_MICRO_EST = round(($C_MICRO_TOTAL_TPE / $C_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, " BETWEEN 10 AND 33"));
			$C_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, " BETWEEN 10 AND 33"));
			$C_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$C_AVG_SMALL_EST = round(($C_SMALL_TOTAL_TPE / $C_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, " BETWEEN 10 AND 33"));
			$C_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, " BETWEEN 10 AND 33"));
			$C_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$C_AVG_MEDIUM_EST = round(($C_MEDIUM_TOTAL_TPE / $C_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, " BETWEEN 10 AND 33"));
			$C_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, " BETWEEN 10 AND 33"));
			$C_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$C_AVG_LARGE_EST = round(($C_LARGE_TOTAL_TPE / $C_LARGE_TOTAL_EST), 2) ;







//ROW D_------------------------------------------------------------------------------------------
			

			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "= 35"));
			$D_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "= 35"));
			$D_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$D_AVG_COTTAGE_EST = round(($D_COTTAGE_TOTAL_TPE / $D_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "= 35"));
			$D_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "= 35"));
			$D_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$D_AVG_MICRO_EST = round(($D_MICRO_TOTAL_TPE / $D_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "= 35"));
			$D_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "= 35"));
			$D_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$D_AVG_SMALL_EST = round(($D_SMALL_TOTAL_TPE / $D_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "= 35"));
			$D_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "= 35"));
			$D_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$D_AVG_MEDIUM_EST = round(($D_MEDIUM_TOTAL_TPE / $D_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "= 35"));
			$D_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "= 35"));
			$D_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$D_AVG_LARGE_EST = round(($D_LARGE_TOTAL_TPE / $D_LARGE_TOTAL_EST), 2) ;





//ROW E_------------------------------------------------------------------------------------------
			


			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "BETWEEN 36  AND 39"));
			$E_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "BETWEEN 36  AND 39"));
			$E_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$E_AVG_COTTAGE_EST = round(($E_COTTAGE_TOTAL_TPE / $E_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "BETWEEN 36  AND 39"));
			$E_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "BETWEEN 36  AND 39"));
			$E_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$E_AVG_MICRO_EST = round(($E_MICRO_TOTAL_TPE / $E_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "BETWEEN 36  AND 39"));
			$E_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "BETWEEN 36  AND 39"));
			$E_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$E_AVG_SMALL_EST = round(($E_SMALL_TOTAL_TPE / $E_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "BETWEEN 36  AND 39"));
			$E_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "BETWEEN 36  AND 39"));
			$E_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$E_AVG_MEDIUM_EST = round(($E_MEDIUM_TOTAL_TPE / $E_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "BETWEEN 36  AND 39"));
			$E_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "BETWEEN 36  AND 39"));
			$E_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$E_AVG_LARGE_EST = round(($E_LARGE_TOTAL_TPE / $E_LARGE_TOTAL_EST), 2) ;





//ROW F_------------------------------------------------------------------------------------------
			


			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "BETWEEN 41 AND 43"));
			$F_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "BETWEEN 41 AND 43"));
			$F_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$F_AVG_COTTAGE_EST = round(($F_COTTAGE_TOTAL_TPE / $F_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "BETWEEN 41 AND 43"));
			$F_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "BETWEEN 41 AND 43"));
			$F_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$F_AVG_MICRO_EST = round(($F_MICRO_TOTAL_TPE / $F_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "BETWEEN 41 AND 43"));
			$F_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "BETWEEN 41 AND 43"));
			$F_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$F_AVG_SMALL_EST = round(($F_SMALL_TOTAL_TPE / $F_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "BETWEEN 41 AND 43"));
			$F_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "BETWEEN 41 AND 43"));
			$F_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$F_AVG_MEDIUM_EST = round(($F_MEDIUM_TOTAL_TPE / $F_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "BETWEEN 41 AND 43"));
			$F_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "BETWEEN 41 AND 43"));
			$F_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$F_AVG_LARGE_EST = round(($F_LARGE_TOTAL_TPE / $F_LARGE_TOTAL_EST), 2) ;





			//ROW G_------------------------------------------------------------------------------------------
			

			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "BETWEEN 45 AND 47"));
			$G_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "BETWEEN 45 AND 47"));
			$G_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$G_AVG_COTTAGE_EST = round(($G_COTTAGE_TOTAL_TPE / $G_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "BETWEEN 45 AND 47"));
			$G_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "BETWEEN 45 AND 47"));
			$G_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$G_AVG_MICRO_EST = round(($G_MICRO_TOTAL_TPE / $G_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "BETWEEN 45 AND 47"));
			$G_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "BETWEEN 45 AND 47"));
			$G_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$G_AVG_SMALL_EST = round(($G_SMALL_TOTAL_TPE / $G_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "BETWEEN 45 AND 47"));
			$G_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "BETWEEN 45 AND 47"));
			$G_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$G_AVG_MEDIUM_EST = round(($G_MEDIUM_TOTAL_TPE / $G_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "BETWEEN 45 AND 47"));
			$G_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "BETWEEN 45 AND 47"));
			$G_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$G_AVG_LARGE_EST = round(($G_LARGE_TOTAL_TPE / $G_LARGE_TOTAL_EST), 2) ;





			//ROW H_------------------------------------------------------------------------------------------
			

			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "BETWEEN 49 AND 53"));
			$H_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "BETWEEN 49 AND 53"));
			$H_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$H_AVG_COTTAGE_EST = round(($H_COTTAGE_TOTAL_TPE / $H_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "BETWEEN 49 AND 53"));
			$H_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST ']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "BETWEEN 49 AND 53"));
			$H_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$H_AVG_MICRO_EST = round(($H_MICRO_TOTAL_TPE / $H_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "BETWEEN 49 AND 53"));
			$H_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST ']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "BETWEEN 49 AND 53"));
			$H_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$H_AVG_SMALL_EST = round(($H_SMALL_TOTAL_TPE / $H_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "BETWEEN 49 AND 53"));
			$H_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "BETWEEN 49 AND 53"));
			$H_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$H_AVG_MEDIUM_EST = round(($H_MEDIUM_TOTAL_TPE / $H_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "BETWEEN 49 AND 53"));
			$H_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "BETWEEN 49 AND 53"));
			$H_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$H_AVG_LARGE_EST = round(($H_LARGE_TOTAL_TPE / $H_LARGE_TOTAL_EST), 2) ;






//ROW I_------------------------------------------------------------------------------------------
			

			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "BETWEEN 55 AND 56"));
			$I_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "BETWEEN 55 AND 56"));
			$I_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$I_AVG_COTTAGE_EST = round(($I_COTTAGE_TOTAL_TPE / $I_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "BETWEEN 55 AND 56"));
			$I_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "BETWEEN 55 AND 56"));
			$I_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$I_AVG_MICRO_EST = round(($I_MICRO_TOTAL_TPE / $I_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "BETWEEN 55 AND 56"));
			$I_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "BETWEEN 55 AND 56"));
			$I_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$I_AVG_SMALL_EST = round(($I_SMALL_TOTAL_TPE / $I_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "BETWEEN 55 AND 56"));
			$I_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "BETWEEN 55 AND 56"));
			$I_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$I_AVG_MEDIUM_EST = round(($I_MEDIUM_TOTAL_TPE / $I_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "BETWEEN 55 AND 56"));
			$I_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "BETWEEN 55 AND 56"));
			$I_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$I_AVG_LARGE_EST = round(($I_LARGE_TOTAL_TPE / $I_LARGE_TOTAL_EST), 2) ;






			//ROW J_------------------------------------------------------------------------------------------
			

			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "BETWEEN 58 AND 63"));
			$J_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "BETWEEN 58 AND 63"));
			$J_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$J_AVG_COTTAGE_EST = round(($J_COTTAGE_TOTAL_TPE / $J_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "BETWEEN 58 AND 63"));
			$J_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "BETWEEN 58 AND 63"));
			$J_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$J_AVG_MICRO_EST = round(($J_MICRO_TOTAL_TPE / $J_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "BETWEEN 58 AND 63"));
			$J_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "BETWEEN 58 AND 63"));
			$J_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$J_AVG_SMALL_EST = round(($J_SMALL_TOTAL_TPE / $J_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "BETWEEN 58 AND 63"));
			$J_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "BETWEEN 58 AND 63"));
			$J_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$J_AVG_MEDIUM_EST = round(($J_MEDIUM_TOTAL_TPE / $J_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "BETWEEN 58 AND 63"));
			$J_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "BETWEEN 58 AND 63"));
			$J_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$J_AVG_LARGE_EST = round(($J_LARGE_TOTAL_TPE / $J_LARGE_TOTAL_EST), 2) ;





			//ROW K_------------------------------------------------------------------------------------------
			

			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "BETWEEN 64 AND 66"));
			$K_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "BETWEEN 64 AND 66"));
			$K_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$K_AVG_COTTAGE_EST = round(($K_COTTAGE_TOTAL_TPE / $K_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "BETWEEN 64 AND 66"));
			$K_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "BETWEEN 64 AND 66"));
			$K_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$K_AVG_MICRO_EST = round(($K_MICRO_TOTAL_TPE / $K_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "BETWEEN 64 AND 66"));
			$K_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "BETWEEN 64 AND 66"));
			$K_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$K_AVG_SMALL_EST = round(($K_SMALL_TOTAL_TPE / $K_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "BETWEEN 64 AND 66"));
			$K_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "BETWEEN 64 AND 66"));
			$K_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$K_AVG_MEDIUM_EST = round(($K_MEDIUM_TOTAL_TPE / $K_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "BETWEEN 64 AND 66"));
			$K_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "BETWEEN 64 AND 66"));
			$K_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$K_AVG_LARGE_EST = round(($K_LARGE_TOTAL_TPE / $K_LARGE_TOTAL_EST), 2) ;



			//ROW L_------------------------------------------------------------------------------------------
			

			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "= 68"));
			$L_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "= 68"));
			$L_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$L_AVG_COTTAGE_EST = round(($L_COTTAGE_TOTAL_TPE / $L_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "= 68"));
			$L_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "= 68"));
			$L_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$L_AVG_MICRO_EST = round(($L_MICRO_TOTAL_TPE / $L_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "= 68"));
			$L_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "= 68"));
			$L_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$L_AVG_SMALL_EST = round(($L_SMALL_TOTAL_TPE / $L_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "= 68"));
			$L_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "= 68"));
			$L_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$L_AVG_MEDIUM_EST = round(($L_MEDIUM_TOTAL_TPE / $L_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "= 68"));
			$L_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "= 68"));
			$L_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$L_AVG_LARGE_EST = round(($L_LARGE_TOTAL_TPE / $L_LARGE_TOTAL_EST), 2) ;






			//ROW M_------------------------------------------------------------------------------------------
			

			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "BETWEEN 69 AND 75"));
			$M_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "BETWEEN 69 AND 75"));
			$M_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$M_AVG_COTTAGE_EST = round(($M_COTTAGE_TOTAL_TPE / $M_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "BETWEEN 69 AND 75"));
			$M_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "BETWEEN 69 AND 75"));
			$M_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$M_AVG_MICRO_EST = round(($M_MICRO_TOTAL_TPE / $M_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "BETWEEN 69 AND 75"));
			$M_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "BETWEEN 69 AND 75"));
			$M_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$M_AVG_SMALL_EST = round(($M_SMALL_TOTAL_TPE / $M_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "BETWEEN 69 AND 75"));
			$M_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "BETWEEN 69 AND 75"));
			$M_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$M_AVG_MEDIUM_EST = round(($M_MEDIUM_TOTAL_TPE / $M_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "BETWEEN 69 AND 75"));
			$M_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "BETWEEN 69 AND 75"));
			$M_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$M_AVG_LARGE_EST = round(($M_LARGE_TOTAL_TPE / $M_LARGE_TOTAL_EST), 2) ;




			//ROW N_------------------------------------------------------------------------------------------
			


			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "BETWEEN 77  AND 82"));
			$N_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "BETWEEN 77  AND 82"));
			$N_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$N_AVG_COTTAGE_EST = round(($N_COTTAGE_TOTAL_TPE / $N_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "BETWEEN 77  AND 82"));
			$N_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "BETWEEN 77  AND 82"));
			$N_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$N_AVG_MICRO_EST = round(($N_MICRO_TOTAL_TPE / $N_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "BETWEEN 77  AND 82"));
			$N_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "BETWEEN 77  AND 82"));
			$N_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$N_AVG_SMALL_EST = round(($N_SMALL_TOTAL_TPE / $N_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "BETWEEN 77  AND 82"));
			$N_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "BETWEEN 77  AND 82"));
			$N_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$N_AVG_MEDIUM_EST = round(($N_MEDIUM_TOTAL_TPE / $N_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "BETWEEN 77  AND 82"));
			$N_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "BETWEEN 77  AND 82"));
			$N_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$N_AVG_LARGE_EST = round(($N_LARGE_TOTAL_TPE / $N_LARGE_TOTAL_EST), 2) ;







			//ROW O_------------------------------------------------------------------------------------------
			

			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "= 84"));
			$O_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "= 84"));
			$O_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$O_AVG_COTTAGE_EST = round(($O_COTTAGE_TOTAL_TPE / $O_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "= 84"));
			$O_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "= 84"));
			$O_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$O_AVG_MICRO_EST = round(($O_MICRO_TOTAL_TPE / $O_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "= 84"));
			$O_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "= 84"));
			$O_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$O_AVG_SMALL_EST = round(($O_SMALL_TOTAL_TPE / $O_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "= 84"));
			$O_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "= 84"));
			$O_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$O_AVG_MEDIUM_EST = round(($O_MEDIUM_TOTAL_TPE / $O_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "= 84"));
			$O_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "= 84"));
			$O_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$O_AVG_LARGE_EST = round(($O_LARGE_TOTAL_TPE / $O_LARGE_TOTAL_EST), 2) ;





			//ROW P_------------------------------------------------------------------------------------------
			


			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "= 85"));
			$P_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "= 85"));
			$P_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$P_AVG_COTTAGE_EST = round(($P_COTTAGE_TOTAL_TPE / $P_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "= 85"));
			$P_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "= 85"));
			$P_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$P_AVG_MICRO_EST = round(($P_MICRO_TOTAL_TPE / $P_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "= 85"));
			$P_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "= 85"));
			$P_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$P_AVG_SMALL_EST = round(($P_SMALL_TOTAL_TPE / $P_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "= 85"));
			$P_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "= 85"));
			$P_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$P_AVG_MEDIUM_EST = round(($P_MEDIUM_TOTAL_TPE / $P_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "= 85"));
			$P_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "= 85"));
			$P_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$P_AVG_LARGE_EST = round(($P_LARGE_TOTAL_TPE / $P_LARGE_TOTAL_EST), 2) ;





			//ROW Q_------------------------------------------------------------------------------------------
			


			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "BETWEEN 86 AND 88"));
			$Q_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "BETWEEN 86 AND 88"));
			$Q_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$Q_AVG_COTTAGE_EST = round(($Q_COTTAGE_TOTAL_TPE / $Q_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "BETWEEN 86 AND 88"));
			$Q_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "BETWEEN 86 AND 88"));
			$Q_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$Q_AVG_MICRO_EST = round(($Q_MICRO_TOTAL_TPE / $Q_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "BETWEEN 86 AND 88"));
			$Q_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "BETWEEN 86 AND 88"));
			$Q_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$Q_AVG_SMALL_EST = round(($Q_SMALL_TOTAL_TPE / $Q_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "BETWEEN 86 AND 88"));
			$Q_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "BETWEEN 86 AND 88"));
			$Q_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$Q_AVG_MEDIUM_EST = round(($Q_MEDIUM_TOTAL_TPE / $Q_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "BETWEEN 86 AND 88"));
			$Q_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "BETWEEN 86 AND 88"));
			$Q_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$Q_AVG_LARGE_EST = round(($Q_LARGE_TOTAL_TPE / $Q_LARGE_TOTAL_EST), 2) ;




			//ROW R_------------------------------------------------------------------------------------------
			


			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "BETWEEN 90 AND 93"));
			$R_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "BETWEEN 90 AND 93"));
			$R_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$R_AVG_COTTAGE_EST = round(($R_COTTAGE_TOTAL_TPE / $R_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "BETWEEN 90 AND 93"));
			$R_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "BETWEEN 90 AND 93"));
			$R_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$R_AVG_MICRO_EST = round(($R_MICRO_TOTAL_TPE / $R_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "BETWEEN 90 AND 93"));
			$R_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "BETWEEN 90 AND 93"));
			$R_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$R_AVG_SMALL_EST = round(($R_SMALL_TOTAL_TPE / $R_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "BETWEEN 90 AND 93"));
			$R_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "BETWEEN 90 AND 93"));
			$R_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$R_AVG_MEDIUM_EST = round(($R_MEDIUM_TOTAL_TPE / $R_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "BETWEEN 90 AND 93"));
			$R_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "BETWEEN 90 AND 93"));
			$R_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$R_AVG_LARGE_EST = round(($R_LARGE_TOTAL_TPE / $R_LARGE_TOTAL_EST), 2) ;



			//ROW S_------------------------------------------------------------------------------------------
			


			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "BETWEEN 94 AND 96"));
			$S_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "BETWEEN 94 AND 96"));
			$S_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$S_AVG_COTTAGE_EST = round(($S_COTTAGE_TOTAL_TPE / $S_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "BETWEEN 94 AND 96"));
			$S_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "BETWEEN 94 AND 96"));
			$S_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$S_AVG_MICRO_EST = round(($S_MICRO_TOTAL_TPE / $S_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "BETWEEN 94 AND 96"));
			$S_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "BETWEEN 94 AND 96"));
			$S_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$S_AVG_SMALL_EST = round(($S_SMALL_TOTAL_TPE / $S_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "BETWEEN 94 AND 96"));
			$S_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "BETWEEN 94 AND 96"));
			$S_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$S_AVG_MEDIUM_EST = round(($S_MEDIUM_TOTAL_TPE / $S_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "BETWEEN 94 AND 96"));
			$S_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "BETWEEN 94 AND 96"));
			$S_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$S_AVG_LARGE_EST = round(($S_LARGE_TOTAL_TPE / $S_LARGE_TOTAL_EST), 2) ;




			//ROW T_------------------------------------------------------------------------------------------
			


			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "BETWEEN 97 AND 98"));
			$T_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "BETWEEN 97 AND 98"));
			$T_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$T_AVG_COTTAGE_EST = round(($T_COTTAGE_TOTAL_TPE / $T_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "BETWEEN 97 AND 98"));
			$T_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST ']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "BETWEEN 97 AND 98"));
			$T_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$T_AVG_MICRO_EST = round(($T_MICRO_TOTAL_TPE / $T_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "BETWEEN 97 AND 98"));
			$T_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "BETWEEN 97 AND 98"));
			$T_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$T_AVG_SMALL_EST = round(($T_SMALL_TOTAL_TPE / $T_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "BETWEEN 97 AND 98"));
			$T_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "BETWEEN 97 AND 98"));
			$T_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$T_AVG_MEDIUM_EST = round(($T_MEDIUM_TOTAL_TPE / $T_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "BETWEEN 97 AND 98"));
			$T_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "BETWEEN 97 AND 98"));
			$T_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$T_AVG_LARGE_EST = round(($T_LARGE_TOTAL_TPE / $T_LARGE_TOTAL_EST), 2) ;





			//ROW U_------------------------------------------------------------------------------------------
			


			# cottage

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_cottage(null, "= 99"));
			$U_COTTAGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_cottage(null, "= 99"));
			$U_COTTAGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$U_AVG_COTTAGE_EST = round(($U_COTTAGE_TOTAL_TPE / $U_COTTAGE_TOTAL_EST), 2) ;


			# micro

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_micro(null, "= 99"));
			$U_MICRO_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_micro(null, "= 99"));
			$U_MICRO_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$U_AVG_MICRO_EST = round(($U_MICRO_TOTAL_TPE / $U_MICRO_TOTAL_EST), 2) ;


			# small

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_small(null, "= 99"));
			$U_SMALL_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_small(null, "= 99"));
			$U_SMALL_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$U_AVG_SMALL_EST = round(($U_SMALL_TOTAL_TPE / $U_SMALL_TOTAL_EST), 2) ;


			# medium

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_medium(null, "= 99"));
			$U_MEDIUM_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_medium(null, "= 99"));
			$U_MEDIUM_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$U_AVG_MEDIUM_EST = round(($U_MEDIUM_TOTAL_TPE / $U_MEDIUM_TOTAL_EST), 2) ;

			# large

			$result_est = $this -> Report -> query($main_query_est.$where.$this->_large(null, "= 99"));
			$U_LARGE_TOTAL_EST = $result_est[0][0]['TOTAL_EST']; 

			$result_tpe = $this -> Report -> query($main_query_tpe.$where.$this->_large(null, "= 99"));
			$U_LARGE_TOTAL_TPE = (int)$result_tpe[0][0]['TOTAL_TPE']; 

			$U_AVG_LARGE_EST = round(($U_LARGE_TOTAL_TPE / $U_LARGE_TOTAL_EST), 2) ;
			
	

				# EST TOTAL
				$COTTAGE_TOTAL_EST = $A_COTTAGE_TOTAL_EST+$B_COTTAGE_TOTAL_EST+$C_COTTAGE_TOTAL_EST+$D_COTTAGE_TOTAL_EST+ $E_COTTAGE_TOTAL_EST+
				$F_COTTAGE_TOTAL_EST+$G_COTTAGE_TOTAL_EST+$H_COTTAGE_TOTAL_EST+$I_COTTAGE_TOTAL_EST+ $J_COTTAGE_TOTAL_EST+ $K_COTTAGE_TOTAL_EST+
				$L_COTTAGE_TOTAL_EST+ $M_COTTAGE_TOTAL_EST+  $N_COTTAGE_TOTAL_EST+ $O_COTTAGE_TOTAL_EST+ $P_COTTAGE_TOTAL_EST+ $Q_COTTAGE_TOTAL_EST+
				$R_COTTAGE_TOTAL_EST+$S_COTTAGE_TOTAL_EST+$T_COTTAGE_TOTAL_EST+ $U_COTTAGE_TOTAL_EST;

				$MICRO_TOTAL_EST = $A_MICRO_TOTAL_EST+$B_MICRO_TOTAL_EST+$C_MICRO_TOTAL_EST+$D_MICRO_TOTAL_EST+ $E_MICRO_TOTAL_EST+
				$F_MICRO_TOTAL_EST+$G_MICRO_TOTAL_EST+$H_MICRO_TOTAL_EST+$I_MICRO_TOTAL_EST+ $J_MICRO_TOTAL_EST+ $K_MICRO_TOTAL_EST+
				$L_MICRO_TOTAL_EST+ $M_MICRO_TOTAL_EST+  $N_MICRO_TOTAL_EST+ $O_MICRO_TOTAL_EST+ $P_MICRO_TOTAL_EST+ $Q_MICRO_TOTAL_EST+
				$R_MICRO_TOTAL_EST+$S_MICRO_TOTAL_EST+$T_MICRO_TOTAL_EST+ $U_MICRO_TOTAL_EST;

				$SMALL_TOTAL_EST = $A_SMALL_TOTAL_EST+$B_SMALL_TOTAL_EST+$C_SMALL_TOTAL_EST+$D_SMALL_TOTAL_EST+ $E_SMALL_TOTAL_EST+
				$F_SMALL_TOTAL_EST+$G_SMALL_TOTAL_EST+$H_SMALL_TOTAL_EST+$I_SMALL_TOTAL_EST+ $J_SMALL_TOTAL_EST+ $K_SMALL_TOTAL_EST+
				$L_SMALL_TOTAL_EST+ $M_SMALL_TOTAL_EST+ $N_SMALL_TOTAL_EST+ $O_SMALL_TOTAL_EST+ $P_SMALL_TOTAL_EST+ $Q_SMALL_TOTAL_EST+
				$R_SMALL_TOTAL_EST+$S_SMALL_TOTAL_EST+$T_SMALL_TOTAL_EST+ $U_SMALL_TOTAL_EST;

				$MEDIUM_TOTAL_EST = $A_MEDIUM_TOTAL_EST+$B_MEDIUM_TOTAL_EST+$C_MEDIUM_TOTAL_EST+$D_MEDIUM_TOTAL_EST+ $E_MEDIUM_TOTAL_EST+
				$F_MEDIUM_TOTAL_EST+$G_MEDIUM_TOTAL_EST+$H_MEDIUM_TOTAL_EST+$I_MEDIUM_TOTAL_EST+ $J_MEDIUM_TOTAL_EST+ $K_MEDIUM_TOTAL_EST+
				$L_MEDIUM_TOTAL_EST+ $M_MEDIUM_TOTAL_EST+$N_MEDIUM_TOTAL_EST+ $O_MEDIUM_TOTAL_EST+ $P_MEDIUM_TOTAL_EST+$Q_MEDIUM_TOTAL_EST+
				$R_MEDIUM_TOTAL_EST+$S_MEDIUM_TOTAL_EST+$T_MEDIUM_TOTAL_EST+ $U_MEDIUM_TOTAL_EST;

				$LARGE_TOTAL_EST = $A_LARGE_TOTAL_EST+$B_LARGE_TOTAL_EST+$C_LARGE_TOTAL_EST+$D_LARGE_TOTAL_EST+ $E_LARGE_TOTAL_EST+
				$F_LARGE_TOTAL_EST+$G_LARGE_TOTAL_EST+$H_LARGE_TOTAL_EST+$I_LARGE_TOTAL_EST+ $J_LARGE_TOTAL_EST+$K_LARGE_TOTAL_EST+
				$L_LARGE_TOTAL_EST+ $M_LARGE_TOTAL_EST+$N_LARGE_TOTAL_EST+$O_LARGE_TOTAL_EST+$P_LARGE_TOTAL_EST+$Q_LARGE_TOTAL_EST+
				$R_LARGE_TOTAL_EST+$S_LARGE_TOTAL_EST+$T_LARGE_TOTAL_EST+ $U_LARGE_TOTAL_EST;

				# TPE TOTAL
				$COTTAGE_TOTAL_TPE = $A_COTTAGE_TOTAL_TPE+$B_COTTAGE_TOTAL_TPE+$C_COTTAGE_TOTAL_TPE+$D_COTTAGE_TOTAL_TPE+ $E_COTTAGE_TOTAL_TPE+
				$F_COTTAGE_TOTAL_TPE+$G_COTTAGE_TOTAL_TPE+$H_COTTAGE_TOTAL_TPE+$I_COTTAGE_TOTAL_TPE+ $J_COTTAGE_TOTAL_TPE+ $K_COTTAGE_TOTAL_TPE+
				$L_COTTAGE_TOTAL_TPE+ $M_COTTAGE_TOTAL_TPE+  $N_COTTAGE_TOTAL_TPE+ $O_COTTAGE_TOTAL_TPE+ $P_COTTAGE_TOTAL_TPE+ $Q_COTTAGE_TOTAL_TPE+
				$R_COTTAGE_TOTAL_TPE+$S_COTTAGE_TOTAL_TPE+$T_COTTAGE_TOTAL_TPE+ $U_COTTAGE_TOTAL_TPE;

				$MICRO_TOTAL_TPE = $A_MICRO_TOTAL_TPE+$B_MICRO_TOTAL_TPE+$C_MICRO_TOTAL_TPE+$D_MICRO_TOTAL_TPE+ $E_MICRO_TOTAL_TPE+
				$F_MICRO_TOTAL_TPE+$G_MICRO_TOTAL_TPE+$H_MICRO_TOTAL_TPE+$I_MICRO_TOTAL_TPE+ $J_MICRO_TOTAL_TPE+ $K_MICRO_TOTAL_TPE+
				$L_MICRO_TOTAL_TPE+ $M_MICRO_TOTAL_TPE+  $N_MICRO_TOTAL_TPE+ $O_MICRO_TOTAL_TPE+ $P_MICRO_TOTAL_TPE+ $Q_MICRO_TOTAL_TPE+
				$R_MICRO_TOTAL_TPE+$S_MICRO_TOTAL_TPE+$T_MICRO_TOTAL_TPE+ $U_MICRO_TOTAL_TPE;

				$SMALL_TOTAL_TPE = $A_SMALL_TOTAL_TPE+$B_SMALL_TOTAL_TPE+$C_SMALL_TOTAL_TPE+$D_SMALL_TOTAL_TPE+ $E_SMALL_TOTAL_TPE+
				$F_SMALL_TOTAL_TPE+$G_SMALL_TOTAL_TPE+$H_SMALL_TOTAL_TPE+$I_SMALL_TOTAL_TPE+ $J_SMALL_TOTAL_TPE+ $K_SMALL_TOTAL_TPE+
				$L_SMALL_TOTAL_TPE+ $M_SMALL_TOTAL_TPE+ $N_SMALL_TOTAL_TPE+ $O_SMALL_TOTAL_TPE+ $P_SMALL_TOTAL_TPE+ $Q_SMALL_TOTAL_TPE+
				$R_SMALL_TOTAL_TPE+$S_SMALL_TOTAL_TPE+$T_SMALL_TOTAL_TPE+ $U_SMALL_TOTAL_TPE;

				$MEDIUM_TOTAL_TPE = $A_MEDIUM_TOTAL_TPE+$B_MEDIUM_TOTAL_TPE+$C_MEDIUM_TOTAL_TPE+$D_MEDIUM_TOTAL_TPE+ $E_MEDIUM_TOTAL_TPE+
				$F_MEDIUM_TOTAL_TPE+$G_MEDIUM_TOTAL_TPE+$H_MEDIUM_TOTAL_TPE+$I_MEDIUM_TOTAL_TPE+ $J_MEDIUM_TOTAL_TPE+ $K_MEDIUM_TOTAL_TPE+
				$L_MEDIUM_TOTAL_TPE+ $M_MEDIUM_TOTAL_TPE+$N_MEDIUM_TOTAL_TPE+ $O_MEDIUM_TOTAL_TPE+ $P_MEDIUM_TOTAL_TPE+$Q_MEDIUM_TOTAL_TPE+
				$R_MEDIUM_TOTAL_TPE+$S_MEDIUM_TOTAL_TPE+$T_MEDIUM_TOTAL_TPE+ $U_MEDIUM_TOTAL_TPE;

				$LARGE_TOTAL_TPE = $A_LARGE_TOTAL_TPE+$B_LARGE_TOTAL_TPE+$C_LARGE_TOTAL_TPE+$D_LARGE_TOTAL_TPE+ $E_LARGE_TOTAL_TPE+
				$F_LARGE_TOTAL_TPE+$G_LARGE_TOTAL_TPE+$H_LARGE_TOTAL_TPE+$I_LARGE_TOTAL_TPE+ $J_LARGE_TOTAL_TPE+$K_LARGE_TOTAL_TPE+
				$L_LARGE_TOTAL_TPE+ $M_LARGE_TOTAL_TPE+$N_LARGE_TOTAL_TPE+$O_LARGE_TOTAL_TPE+$P_LARGE_TOTAL_TPE+$Q_LARGE_TOTAL_TPE+
				$R_LARGE_TOTAL_TPE+$S_LARGE_TOTAL_TPE+$T_LARGE_TOTAL_TPE+ $U_LARGE_TOTAL_TPE;



				# AVERAGE TOTAL---------

				$TOTAL_AVG_COTTAGE_EST = round(($COTTAGE_TOTAL_TPE/$COTTAGE_TOTAL_EST),2) ;
				$TOTAL_AVG_MICRO_EST = round(($MICRO_TOTAL_TPE/$MICRO_TOTAL_EST),2);
				$TOTAL_AVG_SMALL_EST = round(($SMALL_TOTAL_TPE/$SMALL_TOTAL_EST),2) ;
				$TOTAL_AVG_MEDIUM_EST = round(($MEDIUM_TOTAL_TPE/$MEDIUM_TOTAL_EST),2);
				$TOTAL_AVG_LARGE_EST = round(($LARGE_TOTAL_TPE/$LARGE_TOTAL_EST),2) ;

		}  


		$this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 
		# A-------------
		'A_AVG_COTTAGE_EST','A_AVG_MICRO_EST','A_AVG_SMALL_EST','A_AVG_MEDIUM_EST','A_AVG_LARGE_EST',
		# B--------------------------
		'B_AVG_COTTAGE_EST','B_AVG_MICRO_EST','B_AVG_SMALL_EST','B_AVG_MEDIUM_EST','B_AVG_LARGE_EST',
		# C -----------------
		'C_AVG_COTTAGE_EST','C_AVG_MICRO_EST','C_AVG_SMALL_EST','C_AVG_MEDIUM_EST','C_AVG_LARGE_EST',
		# D -----------------
		'D_AVG_COTTAGE_EST','D_AVG_MICRO_EST','D_AVG_SMALL_EST','D_AVG_MEDIUM_EST','D_AVG_LARGE_EST', 
		# E -----------------
		'E_AVG_COTTAGE_EST','E_AVG_MICRO_EST','E_AVG_SMALL_EST','E_AVG_MEDIUM_EST','E_AVG_LARGE_EST',
		# F-----------------
		'F_AVG_COTTAGE_EST','F_AVG_MICRO_EST','F_AVG_SMALL_EST','F_AVG_MEDIUM_EST','F_AVG_LARGE_EST',
		# G -----------------
		'G_AVG_COTTAGE_EST','G_AVG_MICRO_EST','G_AVG_SMALL_EST','G_AVG_MEDIUM_EST','G_AVG_LARGE_EST',
		# H -----------------
		'H_AVG_COTTAGE_EST','H_AVG_MICRO_EST','H_AVG_SMALL_EST','H_AVG_MEDIUM_EST','H_AVG_LARGE_EST', 
		# I -----------------
		'I_AVG_COTTAGE_EST','I_AVG_MICRO_EST','I_AVG_SMALL_EST','I_AVG_MEDIUM_EST','I_AVG_LARGE_EST', 
		# J -----------------
		'J_AVG_COTTAGE_EST','J_AVG_MICRO_EST','J_AVG_SMALL_EST','J_AVG_MEDIUM_EST','J_AVG_LARGE_EST', 
		# K -----------------
		'K_AVG_COTTAGE_EST','K_AVG_MICRO_EST','K_AVG_SMALL_EST','K_AVG_MEDIUM_EST','K_AVG_LARGE_EST',
		# L -----------------
		'L_AVG_COTTAGE_EST','L_AVG_MICRO_EST','L_AVG_SMALL_EST','L_AVG_MEDIUM_EST','L_AVG_LARGE_EST', 
		# M -----------------
		'M_AVG_COTTAGE_EST','M_AVG_MICRO_EST','M_AVG_SMALL_EST','M_AVG_MEDIUM_EST','M_AVG_LARGE_EST',  
		# N -----------------
		'N_AVG_COTTAGE_EST','N_AVG_MICRO_EST','N_AVG_SMALL_EST','N_AVG_MEDIUM_EST','N_AVG_LARGE_EST', 
		# O -----------------
		'O_AVG_COTTAGE_EST','O_AVG_MICRO_EST','O_AVG_SMALL_EST','O_AVG_MEDIUM_EST','O_AVG_LARGE_EST', 
		# P -----------------
		'P_AVG_COTTAGE_EST','P_AVG_MICRO_EST','P_AVG_SMALL_EST','P_AVG_MEDIUM_EST','P_AVG_LARGE_EST', 
		# Q -----------------
		'Q_AVG_COTTAGE_EST','Q_AVG_MICRO_EST','Q_AVG_SMALL_EST','Q_AVG_MEDIUM_EST','Q_AVG_LARGE_EST',
		# R -----------------
		'R_AVG_COTTAGE_EST','R_AVG_MICRO_EST','R_AVG_SMALL_EST','R_AVG_MEDIUM_EST','R_AVG_LARGE_EST',
		# S -----------------
		'S_AVG_COTTAGE_EST','S_AVG_MICRO_EST','S_AVG_SMALL_EST','S_AVG_MEDIUM_EST','S_AVG_LARGE_EST',
		# T -----------------
		'T_AVG_COTTAGE_EST','T_AVG_MICRO_EST','T_AVG_SMALL_EST','T_AVG_MEDIUM_EST','T_AVG_LARGE_EST', 
		# U -----------------
		'U_AVG_COTTAGE_EST','U_AVG_MICRO_EST','U_AVG_SMALL_EST','U_AVG_MEDIUM_EST','U_AVG_LARGE_EST',
		# TOTAL--------------
		'TOTAL_AVG_COTTAGE_EST','TOTAL_AVG_MICRO_EST','TOTAL_AVG_SMALL_EST','TOTAL_AVG_MEDIUM_EST','TOTAL_AVG_LARGE_EST'
		
		));
	}
}
