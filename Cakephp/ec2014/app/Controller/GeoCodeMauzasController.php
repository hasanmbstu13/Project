<?php
App::uses('AppController', 'Controller');
/**
 * GeoCodeMauzas Controller
 *
 * @property GeoCodeMauza $GeoCodeMauza
 */
class GeoCodeMauzasController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> set('title_for_layout', 'Mauzas');
		$this -> loadModel('GeoCodeDivn');
		//$this->GeoCodeMauza->recursive = 4;
		$conditions = array();

		$conditions['joins'] = array( array('table' => 'geo_code_zilas', 'alias' => 'GeoCodeZila', 'type' => 'INNER', 'conditions' => array('GeoCodeZila.geo_code_divn_id = GeoCodeDivn.id')), array('table' => 'geo_code_upazilas', 'alias' => 'GeoCodeUpazila', 'type' => 'INNER', 'conditions' => array('GeoCodeUpazila.geo_code_zila_id = GeoCodeZila.id')), array('table' => 'geo_code_unions', 'alias' => 'GeoCodeUnion', 'type' => 'INNER', 'conditions' => array('GeoCodeUnion.geo_code_upazila_id = GeoCodeUpazila.id')), array('table' => 'geo_code_mauzas', 'alias' => 'GeoCodeMauza', 'type' => 'INNER', 'conditions' => array('GeoCodeMauza.geo_code_union_id = GeoCodeUnion.id')), array('table' => 'geo_code_rmos', 'alias' => 'GeoCodeRmo', 'type' => 'LEFT', 'conditions' => array('GeoCodeRmo.id = GeoCodeMauza.geo_code_rmo_id')));

		$conditions['fields'] = array('GeoCodeDivn.divn_code', 'GeoCodeDivn.divn_name', 'GeoCodeZila.zila_code', 'GeoCodeZila.zila_name', 'GeoCodeUpazila.upzila_code', 'GeoCodeUpazila.upzila_name', 'GeoCodeUnion.union_code', 'GeoCodeUnion.union_name', 'GeoCodeMauza.mauza_code', 'GeoCodeMauza.mauza_name', 'GeoCodeMauza.id', 'GeoCodeRmo.rmo_type_eng');
		
		if ($this -> request -> is('post') && $this -> request ->data['GeoCodeMauza']['mauza_name'] != "") {
			$conditions['conditions'] = array('GeoCodeMauza.mauza_name LIKE' => '%'.$this -> request ->data['GeoCodeMauza']['mauza_name'].'%');
			$conditions['limit'] = 100;
		}

		$this -> paginate = $conditions;

		$geoCodeMauzas = $this -> paginate('GeoCodeDivn');

		$this -> set(compact('geoCodeMauzas'));

	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> GeoCodeMauza -> id = $id;
		if (!$this -> GeoCodeMauza -> exists()) {
			throw new NotFoundException(__('Invalid geo code mauza'));
		}
		$this -> set('geoCodeMauza', $this -> GeoCodeMauza -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$this -> loadModel('GeoCodeDivn');
		if ($this -> request -> is('post')) {
			$this -> GeoCodeMauza -> create();
			if ($this -> GeoCodeMauza -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The geo code mauza has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The geo code mauza could not be saved. Please, try again.'));
			}
		}
		$divns = $this -> GeoCodeDivn -> find('list');
		//$geoCodeUnions = $this->GeoCodeMauza->GeoCodeUnion->find('list');
		$geoCodeRmos = $this -> GeoCodeMauza -> GeoCodeRmo -> find('list');
		$this -> set(compact('divns', 'geoCodeRmos'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> loadModel('GeoCodeDivn');
		$this -> GeoCodeMauza -> id = $id;
		if (!$this -> GeoCodeMauza -> exists()) {
			throw new NotFoundException(__('Invalid geo code mauza'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			//pr($this->request->data); exit;
			if ($this -> GeoCodeMauza -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The geo code mauza has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The geo code mauza could not be saved. Please, try again.'));
			}
		} else {
			$this -> request -> data = $this -> GeoCodeMauza -> read(null, $id);
		}

		//$geoCodeUnions = $this->GeoCodeMauza->GeoCodeUnion->find('list');

		$geoCodeUnions = null;
		$geoCodeRmos = $this -> GeoCodeMauza -> GeoCodeRmo -> find('list');
		$geoCodeDivns = $this -> GeoCodeDivn -> find('list');
		$this -> set(compact('geoCodeUnions', 'geoCodeRmos', 'geoCodeDivns'));
	}

	/**
	 * delete method
	 *
	 * @throws MethodNotAllowedException
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> GeoCodeMauza -> id = $id;
		if (!$this -> GeoCodeMauza -> exists()) {
			throw new NotFoundException(__('Invalid geo code mauza'));
		}
		if ($this -> GeoCodeMauza -> delete()) {
			$this -> Session -> setFlash(__('Geo code mauza deleted'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Geo code mauza was not deleted'));
		$this -> redirect(array('action' => 'index'));
	}

	// **********************************************************************
	//For Ajax Request=======================================

	public function getZilaName() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodeZila');

		$GeoCodeZila = $this -> GeoCodeZila -> find('list', array('conditions' => array('GeoCodeZila.geo_code_divn_id =' => $_REQUEST['geo_code_divn_id']), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_name'), 'order' => 'GeoCodeZila.zila_name'));
		echo json_encode($GeoCodeZila);
	}

	public function getUpaZila() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodeUpazila');

		$GeoCodeUpazilas = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id =' => $_REQUEST['geo_code_zila_id']), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name'), 'order' => 'GeoCodeUpazila.upzila_name'));

		echo json_encode($GeoCodeUpazilas);
	}

	public function getUnion() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodeUnion');
		$GeoCodeUnions = $this -> GeoCodeUnion -> find('all', array('conditions' => array('GeoCodeUnion.geo_code_upazila_id =' => $_REQUEST['geo_code_upazila_id']), 'fields' => array('GeoCodeUnion.id', 'GeoCodeUnion.union_name'), 'order' => 'GeoCodeUnion.union_name'));
		echo json_encode($GeoCodeUnions);
	}

	public function getPSA() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodePsa');
		$GeoCodePsas = $this -> GeoCodePsa -> find('all', array(
			'conditions' => array(
			'GeoCodePsa.geo_code_upazila_id =' => $_REQUEST['geo_code_upazila_id']), 
			'order' => 'GeoCodePsa.psa_name'));
		echo json_encode($GeoCodePsas);
	}
   	public function getUnionWithNonPSA() {
		$this -> autoRender = false;
		$this -> layout = false;
		
		if($_REQUEST['geo_code_psa_nonpsa'] == 1) $_REQUEST['geo_code_psa_nonpsa'] = "UNION";
		
		if($_REQUEST['geo_code_psa_nonpsa'] == 2) $_REQUEST['geo_code_psa_nonpsa'] = "WARD";

		$this -> loadModel('GeoCodeUnion');
		if($_REQUEST['geo_code_psa_nonpsa'] == "UNION")
		{
			$GeoCodeUnions = $this -> GeoCodeUnion -> find('all', array(
			'conditions' => array(
				'GeoCodeUnion.geo_code_upazila_id =' => $_REQUEST['geo_code_upazila_id'], 
				'GeoCodeUnion.union_or_ward ='=>$_REQUEST['geo_code_psa_nonpsa']),  
				'fields' => array('GeoCodeUnion.id', 'GeoCodeUnion.union_code', 'GeoCodeUnion.union_name'), 
				'order' => 'GeoCodeUnion.union_name'));
		}
		else
		{
			$GeoCodeUnions = $this -> GeoCodeUnion -> find('all', array(
			'conditions' => array(
				'GeoCodeUnion.geo_code_upazila_id =' => $_REQUEST['geo_code_upazila_id'], 
				'GeoCodeUnion.union_or_ward ='=>$_REQUEST['geo_code_psa_nonpsa'],
				'GeoCodeUnion.geo_code_psa_id ='=>$_REQUEST['geo_code_psa_id']),  
				'fields' => array('GeoCodeUnion.id', 'GeoCodeUnion.union_code', 'GeoCodeUnion.union_name'), 
				'order' => 'GeoCodeUnion.union_name'));
		}
		
		
		echo json_encode($GeoCodeUnions);
	}

}
