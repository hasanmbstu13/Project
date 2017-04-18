<?php
App::uses('AppController', 'Controller');
/**
 * Books Controller
 *
 * @property Book $Book
 */
class BooksController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> set('title_for_layout', 'Books');
		$this -> Book -> recursive = 0;

		$this -> paginate = array('limit' => 20, // this was the option which you forgot to mention
		'conditions' => array('entry_by' => $this -> Session -> read('Authake.id')), 'order' => array('Book.id' => 'ASC'));

		$this -> set('books', $this -> paginate());

	}

	public function view($id = null) {
		$this -> Book -> id = $id;
		if (!$this -> Book -> exists()) {
			throw new NotFoundException(__('Invalid book'));
		}
		$this -> set('book', $this -> Book -> read(null, $id));
	}

	public function delete($id = null) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> Book -> id = $id;
		if (!$this -> Book -> exists()) {
			throw new NotFoundException(__('Invalid book'));
		}
		if ($this -> Book -> delete()) {
			$this -> Session -> setFlash(__('Book deleted'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Book was not deleted'));
		$this -> redirect(array('action' => 'index'));
	}

	public function add() {

		$this -> loadModel('GeoCodeDivn');
		$this -> loadModel('GeoCodeZila');
		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel('GeoCodeRmo');
		$this -> loadModel('GeoCodePsa');
		$this -> loadModel('GeoCodeUnion');

		//Edited 06 January==========================================

		$zilaCode = $this -> operator_zila;

		if ($zilaCode == "ad") {

			$zilaCode = null;
			//pr($zilaCode); exit;
		}

		$divnAll = $this -> GeoCodeZila -> find('all', array('conditions' => array('zila_code' => $zilaCode)));

		$divnId = $divnAll[0]['GeoCodeDivn']['id'];

		$divnCode = $divnAll[0]['GeoCodeDivn']['divn_code'];

		$divnName = $divnAll[0]['GeoCodeDivn']['divn_name'];

		$zilaAll = $this -> GeoCodeZila -> find('all', array('conditions' => array('zila_code' => $zilaCode, 'geo_code_divn_id' => $divnId)));

		$zilaName = $zilaAll[0]['GeoCodeZila']['zila_name'];

		$zilaId = $zilaAll[0]['GeoCodeZila']['id'];

		$upazilaCode = $this -> operator_upazila;

		$upazilaAll = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('upzila_code' => $upazilaCode, 'geo_code_zila_id' => $zilaId)));

		$upazilaName = $upazilaAll[0]['GeoCodeUpazila']['upzila_name'];

		if ($this -> request -> is('post')) {
			
			//pr($this->request->data); exit;

			$divn = $this -> request -> data['Book']['geo_code_divn_id'];
			$zila = $this -> request -> data['Book']['geo_code_zila_id'];
			$upzila = $this -> request -> data['Book']['geo_code_upazila_id'];
			$psa = $this -> request -> data['Book']['geo_code_psa_id'];
			$rmo = $this -> request -> data['Book']['geo_code_rmo_id'];
			$union = $this -> request -> data['Book']['geo_code_union_id'];
			$bookcode = $this -> request -> data['Book']['book_code'];
			$bookcode2 = $this -> request -> data['Book']['book_code2'];
			$areaCode = $this -> request -> data['Book']['area_id'];
			
			
			$this -> book_validation($divn, $zila, $upzila, $psa, $rmo, $union, $bookcode, $bookcode2, $areaCode);

			$code = $this -> request -> data['Book']['book_code2'];
			if (strlen($code) == 1) {
				$code = str_pad($code, 2, "0", STR_PAD_LEFT);
			}

			$this -> request -> data['Book']['id'] = $this -> request -> data['Book']['book_code'] . $code;
			$this -> request -> data['Questionaire']['QuestionaireRmoCode2'] = $this -> request -> data['Questionaire']['QuestionaireRmoCode'];

			$count_book = $this -> Book -> find('count', array('conditions' => array('Book.id =' => $this -> request -> data['Book']['id'])));

			if ($count_book >= 1) {

				$this -> redirect(array('controller' => 'Questionaires', 'action' => 'add', $this -> request -> data['Book']['id']));
			}

			if ($this -> request -> data['Book']['geo_code_rmo_id'] == 1 || $this -> request -> data['Book']['geo_code_rmo_id'] == 3 || $this -> request -> data['Book']['geo_code_rmo_id'] == 7) 
			{
				if($this -> request -> data['Book']['growth_centre'] == 1 || $this -> request -> data['Book']['growth_centre'] == 2)
				{
						
				}
				else 
				{
					$this -> Session -> setFlash(__('Please select Growth Center.'));
					$this -> redirect(array('action' => 'add'));
				}

			} else {
				unset($this -> request -> data['Book']['growth_centre']);
			}

			$this -> request -> data['Book']['geo_code_divn_id'] = $this -> GeoCodeDivn -> getDivnID($this -> request -> data['Book']['geo_code_divn_id']);

			$this -> request -> data['Book']['geo_code_zila_id'] = $this -> GeoCodeZila -> getZilaID($this -> request -> data['Book']['geo_code_zila_id'], $this -> request -> data['Book']['geo_code_divn_id']);

			$this -> request -> data['Book']['geo_code_upazila_id'] = $this -> GeoCodeUpazila -> getUpazilaID($this -> request -> data['Book']['geo_code_upazila_id'], $this -> request -> data['Book']['geo_code_zila_id']);
			
			
			//Date 16th February 2014=========================
			
			$this -> request -> data['Book']['geo_code_psa_id'] = $this -> GeoCodePsa -> getPsaID($this -> request -> data['Book']['geo_code_psa_id'], $this -> request -> data['Book']['geo_code_upazila_id']);
			
			
			
			
			$this -> request -> data['Book']['geo_code_rmo_id'] = $this -> GeoCodeRmo -> getRmoID($this -> request -> data['Book']['geo_code_rmo_id']);


			$this -> request -> data['Book']['geo_code_union_id'] = $this -> GeoCodeUnion -> getUnionID($this -> request -> data['Book']['geo_code_union_id'], $this -> request -> data['Book']['geo_code_upazila_id'], $this -> request -> data['Book']['geo_code_rmo_id']);

			$this -> request -> data['Book']['entry_by'] = $this -> Session -> read('Authake.id');

			$this -> request -> data['Book']['created'] = date("Y-m-d H:i:s");
			$this -> request -> data['Book']['modified'] = date("Y-m-d H:i:s");
			
		//pr($this -> request -> data); exit;
			
//WITHOUT EA UNIQUE TEST=========================================================
$BID = $this -> request -> data['Book']['id'];

$B_FIEST_PART = substr($BID, 0, 10);
$B_2ND_PART = substr($BID, -2, 2);

$findBooks = $this -> Book -> find('all', array('conditions' => array('Book.id LIKE' => $B_FIEST_PART.'%'), fields => array('Book.id')));

foreach ($findBooks as $key => $value) {
	$VALUE_FIEST_PART = substr($value['Book']['id'], 0, 10);
	$VALUE_2ND_PART = substr($value['Book']['id'], -2, 2);
	if($B_FIEST_PART == $VALUE_FIEST_PART && $B_2ND_PART == $VALUE_2ND_PART)
	{
		$this -> Session -> setFlash(__('Book No. '.$VALUE_2ND_PART.' already entered with this union.'));
		$this -> redirect(array('action' => 'add'));
	}
}
//END OF WITHOUT EA UNIQUE TEST==================================================			
			$this -> Book -> create();

			if ($this -> Book -> save($this -> request -> data)) {

				$this -> redirect(array('controller' => 'Questionaires', 'action' => 'add', $this -> request -> data['Book']['id']));
			} else {
				$this -> Session -> setFlash(__('The book could not be saved. Please, try again.'));
			}

		}

		$geoCodeDivns = $this -> Book -> GeoCodeDivn -> find('list');
		$geoCodeZilas = $this -> Book -> GeoCodeZila -> find('list');
		$geoCodeUpazilas = $this -> Book -> GeoCodeUpazila -> find('list');
		$geoCodeRmos = $this -> Book -> GeoCodeRmo -> find('list');
		$geoCodePsas = $this -> Book -> GeoCodePsa -> find('list');
		$geoCodeUnions = $this -> Book -> GeoCodeUnion -> find('list');
		
		
		$code_of_union = $this->operator_union;
		
		
		$zilaID = $this -> GeoCodeZila -> getZilaID_dashboard($this->operator_zila);
		
		
		
		$upaZilaID = $this -> GeoCodeUpazila -> getUpazilaID($this->operator_upazila, $zilaID);
		
	
		
		$name_of_union = $this -> GeoCodeUnion -> find('all', array('conditions' => array('GeoCodeUnion.union_code =' => $code_of_union, 'GeoCodeUnion.geo_code_upazila_id' => $upaZilaID, 'GeoCodeUnion.union_or_ward' => 'UNION'), 'fields' => 'GeoCodeUnion.union_name'));
		
	
		
		$name_of_union = $name_of_union[0]['GeoCodeUnion']['union_name'];
		
		$this -> set(compact('divnCode', 'divnName', 'zilaCode', 'zilaName', 'upazilaCode', 'upazilaName', 'geoCodeDivns', 'geoCodeZilas', 'geoCodeUpazilas', 'geoCodeRmos', 'geoCodePsas', 'geoCodeUnions', 'code_of_union', 'name_of_union'));
	}

	public function edit($id = null) {
		$this -> Book -> id = $id;
		
		if ($this -> request -> is('post')) {
			
			$this -> redirect(array('controller' => 'Questionaires', 'action' => 'add', $this -> request -> data['Book']['id']));

		} else {
			$Books = $this -> Book -> read(null, $id);
		}

		$this -> set(compact('Books'));
	}


	public function getRmoName() {
		$this -> autoRender = false;
		$this -> layout = false;
		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel('GeoCodeUnion');
		$this -> loadModel('GeoCodeRmo');
		$this -> loadModel('GeoCodeZila');
		$this -> loadModel('GeoCodePsa');
		$this -> loadModel('GeoCodeMauza');

		$GeoCodeRmoName = $this -> GeoCodeRmo -> find('all', array('conditions' => array('GeoCodeRmo.rmo_code =' => $_REQUEST['rmo_code'])));

		$rmoID = $GeoCodeRmoName[0]['GeoCodeRmo']['rmo_code'];

		$GeoCodeZilaName = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.zila_code =' => $_REQUEST['zila_code'])));

		$zilaID = $GeoCodeZilaName[0]['GeoCodeZila']['id'];

		$GeoCodeUpazilaName = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.upzila_code =' => $_REQUEST['upzila_code'], 'GeoCodeUpazila.geo_code_zila_id =' => $zilaID)));

		$upzilaID = $GeoCodeUpazilaName[0]['GeoCodeUpazila']['id'];

		$Unions = $this -> GeoCodeUnion -> find('list', array('conditions' => array('GeoCodeUnion.geo_code_upazila_id' => $upzilaID)));
	
		$Muzas = $this -> GeoCodeMauza -> find('all', array('fields' => array('DISTINCT GeoCodeMauza.geo_code_rmo_id'), 'order' => 'GeoCodeMauza.geo_code_rmo_id'));
		
		
		$RMOs = array();
		foreach ($Muzas as $key => $Muza) {
			array_push($RMOs, $Muza['GeoCodeMauza']['geo_code_rmo_id']);
		}

		if (count($RMOs) == 1 && (in_array(2, $RMOs) || in_array(9, $RMOs))) {
			//ONLY 2 or 9 EXISTS
		} else if (count($RMOs) == 2 && in_array(2, $RMOs) && in_array(9, $RMOs)) {
			// 2 and 9 BOTH EXISTS
		} else {
			array_push($RMOs, 7);
		}

		$GeoCodeRmoName = array();

		if (in_array($rmoID, $RMOs)) {
			$GeoCodeRmoName = $this -> GeoCodeRmo -> find('list', array('conditions' => array('GeoCodeRmo.rmo_code =' => $_REQUEST['rmo_code'])));
			echo json_encode($GeoCodeRmoName);
			exit ;
		} else {
			echo json_encode($GeoCodeRmoName);
			exit ;
		}  
			
		/*

		$unionIDs = array();

		//$conditions['GeoCodeMauza.geo_code_union_id'] = array();

		foreach ($Unions as $key => $Union) {
			array_push($unionIDs, $key);
			//$conditions['GeoCodeMauza.geo_code_union_id'][] = $key;
			$conditions[]['GeoCodeMauza.geo_code_union_id'] = $key;
		}
		$conditions = array('OR' => $conditions);
		//pr($conditions); exit;

		$Muzas = $this -> GeoCodeMauza -> find('all', array('conditions' => $conditions, 'fields' => array('DISTINCT GeoCodeMauza.geo_code_rmo_id'), 'order' => 'GeoCodeMauza.geo_code_rmo_id'));

		//pr($Muzas); exit;

		$RMOs = array();
		foreach ($Muzas as $key => $Muza) {
			array_push($RMOs, $Muza['GeoCodeMauza']['geo_code_rmo_id']);
		}

		if (count($RMOs) == 1 && (in_array(2, $RMOs) || in_array(9, $RMOs))) {
			//ONLY 2 or 9 EXISTS
		} else if (count($RMOs) == 2 && in_array(2, $RMOs) && in_array(9, $RMOs)) {
			// 2 and 9 BOTH EXISTS
		} else {
			array_push($RMOs, 7);
		}

		$GeoCodeRmoName = array();

		if (in_array($rmoID, $RMOs)) {
			$GeoCodeRmoName = $this -> GeoCodeRmo -> find('list', array('conditions' => array('GeoCodeRmo.rmo_code =' => $_REQUEST['rmo_code'])));
			echo json_encode($GeoCodeRmoName);
			exit ;
		} else {
			echo json_encode($GeoCodeRmoName);
			exit ;
		}  */
	}






	public function getPsaName() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodePsa');
		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel('GeoCodeZila');
		$this -> loadModel("GeoCodeRmo");
		$this -> GeoCodeUpazila -> recursive = 0;
		$this -> GeoCodeRmo -> recursive = 0;

		/* $GeoCodeRmoName = $this -> GeoCodeRmo -> find('all', array('conditions' => array('GeoCodeRmo.rmo_code =' => $_REQUEST['rmo_code']), 'order' => 'GeoCodeRmo.rmo_type_eng'));

		$rmoID = $GeoCodeRmoName[0]['GeoCodeRmo']['rmo_code']; */

		$GeoCodeZilaName = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.zila_code =' => $_REQUEST['zila_code']), 'order' => 'GeoCodeZila.zila_name'));

		$zilaID = $GeoCodeZilaName[0]['GeoCodeZila']['id'];

		$GeoCodeUpazilaName = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.upzila_code =' => $_REQUEST['upzila_code'], 'GeoCodeUpazila.geo_code_zila_id =' => $zilaID), 'order' => 'GeoCodeUpazila.upzila_name'));

		$upzilaID = $GeoCodeUpazilaName[0]['GeoCodeUpazila']['id'];

		$GeoCodePsaName = $this -> GeoCodePsa -> find('list', array('conditions' => array('GeoCodePsa.psa_code =' => $_REQUEST['psa_code'], 'GeoCodePsa.geo_code_upazila_id' => $upzilaID, /*'GeoCodePsa.geo_code_rmo_id' => $rmoID */), 'order' => 'GeoCodePsa.psa_name'));

		echo json_encode($GeoCodePsaName);

	}

	public function getUnionName() {
		//var $union_ward;
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodeUnion');
		$this -> loadModel('GeoCodeZila');
		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel("GeoCodeRmo");
		$this -> GeoCodeUpazila -> recursive = 0;
		$this -> GeoCodeRmo -> recursive = 0;

	/*	$GeoCodeRmoName = $this -> GeoCodeRmo -> find('all', array('conditions' => array('GeoCodeRmo.rmo_code =' => $_REQUEST['rmo_code']), 'order' => 'GeoCodeRmo.rmo_type_eng'));

		$rmoID = $GeoCodeRmoName[0]['GeoCodeRmo']['id'];

		if ($_REQUEST['rmo_code'] == "2" || $_REQUEST['rmo_code'] == "9") {
			$union_ward = "WARD";
		} else {
			$union_ward = "UNION";
		} */

		$GeoCodeZilaName = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.zila_code =' => $_REQUEST['zila_code']), 'order' => 'GeoCodeZila.zila_name'));

		$zilaID = $GeoCodeZilaName[0]['GeoCodeZila']['id'];

		$GeoCodeUpazilaName = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.upzila_code =' => $_REQUEST['upzila_code'], 'GeoCodeUpazila.geo_code_zila_id' => $zilaID), 'order' => 'GeoCodeUpazila.upzila_name'));

		$upazilaID = $GeoCodeUpazilaName[0]['GeoCodeUpazila']['id'];

		$GeoUnionName = $this -> GeoCodeUnion -> find('list', array('conditions' => array('GeoCodeUnion.union_code =' => $_REQUEST['union_code'], 'GeoCodeUnion.geo_code_upazila_id' => $upazilaID, /*'GeoCodeUnion.geo_code_rmo_id' => $rmoID, 'GeoCodeUnion.union_or_ward' => $union_ward */ ), 'order' => 'GeoCodeUnion.union_name'));

		echo json_encode($GeoUnionName);

	}

	function book_validation($divn, $zila, $upzila, $psa,  $rmo, $union, $bookcode, $bookcode2, $areaCode) {

		$msg = "";

		if ($divn == "" || strlen($divn) <> 2) {
			$msg .= "<br />Wrong Divn Code!";
		}

		if ($zila == "" || strlen($zila) <> 2) {
			$msg .= "<br />Wrong Zila Code!";
		}

		if ($upzila == "" || strlen($upzila) <> 2) {
			$msg .= "<br />Wrong Upzila Code!";
		}
		
		//Edited February 16=======================================
		
		if (($rmo == 2 || $rmo == 9 ) && $psa == "") {
			$msg .= "<br />Wrong PSA/City Corporation Code!";
		}

		if (strlen($rmo) <> 1) {
			$msg .= "<br />Wrong RMO Code!";
		}

		if (strlen($bookcode) <> 12) {
			$msg .= "<br />Wrong Book Code!";
		}

		if (strlen($bookcode2) <> 2) {
			$msg .= "<br />Wrong Book Code!";
		}
		
		if (strlen($areaCode) <> 2) {
			$msg .= "<br />Wrong Area Code!";
		}

		if ($msg != "") {

			$this -> Session -> setFlash(__($msg));
			$this -> redirect(array('controller' => 'Books', 'action' => 'add'));
		} else {
			return true;
		}

	}

}
