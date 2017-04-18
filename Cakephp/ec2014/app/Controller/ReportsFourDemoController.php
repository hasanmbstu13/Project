<?php

class ReportsFourDemoController extends AppController {

	var $uses = false;
	// $_SESSION["MenuActive"] = 10;
	public function index() {
		$this -> set('title_for_layout', 'Reports');
		$_SESSION["MenuActive"] = 10;

		$this -> loadModel('Notice');
		$notices = $this -> Notice -> find('all', array('order' => array('msg_order', 'id')));
		$this -> set(compact('notices'));
	}

	public function get_geo_divn() {

		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodeDivn');

		$data = $this -> GeoCodeDivn -> find('all', array('fields' => array('id', 'divn_code', 'divn_name')));
		echo json_encode($data);
	}

	public function get_geo_zila() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodeDivn');
		$this -> loadModel('GeoCodeZila');

		$data = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.geo_code_divn_id =' => $_REQUEST['divn_id']), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_code', 'GeoCodeZila.zila_name'), 'order' => 'GeoCodeZila.zila_name'));

		echo json_encode($data);
	}

	public function get_geo_upazila() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodeUpazila');

		$data = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id =' => $_REQUEST['zila_id']), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_code', 'GeoCodeUpazila.upzila_name'), 'order' => 'GeoCodeUpazila.upzila_name'));

		echo json_encode($data);
	}

	public function get_geo_psa() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodePsa');

		$this -> loadModel('GeoCodeUnion');

		$data1 = $this -> GeoCodePsa -> find('all', array('conditions' => array('GeoCodePsa.geo_code_upazila_id =' => $_REQUEST['upazila_id']), 'fields' => array('GeoCodePsa.id', 'GeoCodePsa.psa_code', 'GeoCodePsa.psa_name'), 'order' => 'GeoCodePsa.psa_name'));

		$data2 = $this -> GeoCodeUnion -> find('all', array('conditions' => array('GeoCodeUnion.geo_code_upazila_id =' => $_REQUEST['upazila_id']), 'fields' => array('GeoCodeUnion.id', 'GeoCodeUnion.union_code', 'GeoCodeUnion.union_name'), 'order' => 'GeoCodeUnion.union_name'));

		echo json_encode(array('psa' => $data1, 'union' => $data2));
	}


		public function tpe_tbl_four_one() {

			}

	// public function tpe_tbl_five_three() {
	// 	$this -> loadModel('Report');

 //        $divn = "";
 //        $zila = "";
 //        $upazila = "";
 //        $psa = "";
 //        $union = "";

 //        if ($this -> request -> is('post')) {
 //            $divn = $this -> request -> data['divn_text'];
 //            $zila = $this -> request -> data['zila_text'];
 //            $upazila = $this -> request -> data['upazila_text'];
 //            $psa = $this -> request -> data['psa_text'];
 //            $union = $this -> request -> data['union_text'];

 //            $where = $this->_make_where_condition();

            
 //           $result = $this -> Report -> query("SELECT GEO_CODE_UNION_ID, UNION_NAME,
	// 											COUNT(*) AS TOTAL_EST, 
	// 											SUM(TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON_ENGAGED, 
	// 											SUM(TOTAL_MALE_ENGAGED) AS TOTAL_MALE_ENGAGED,
	// 											SUM(TOTAL_FEMALE_ENGAGED) AS TOTAL_FEMALE_ENGAGED
	// 											FROM BBSEC2013_REPORTS
	// 											WHERE " . $where . "
	// 											GROUP BY GEO_CODE_UNION_ID, UNION_NAME
	// 											ORDER BY UNION_NAME ");

											

	// 		/*$result = $this -> Report -> query("SELECT GEO_CODE_UNION_ID, UNION_NAME,
	// 											COUNT(*) AS TOTAL_EST, 
	// 											SUM(TOTAL_PERSON_ENGAGED) AS TOTAL_PERSON_ENGAGED, 
	// 											SUM(TOTAL_MALE_ENGAGED) AS TOTAL_MALE_ENGAGED,
	// 											SUM(TOTAL_FEMALE_ENGAGED) AS TOTAL_FEMALE_ENGAGED
	// 											FROM BBSEC2013_REPORTS
	// 											WHERE " . $where . "
	// 											GROUP BY GEO_CODE_UNION_ID, UNION_NAME
	// 											ORDER BY UNION_NAME "); */


 //            $this -> set(compact('divn', 'zila', 'upazila', 'psa', 'union', 'result'));  
            
 //        }
            
	// }

    public function _make_where_condition()
    {
            $conditions = array();
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

}
