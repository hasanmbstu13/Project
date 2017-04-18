<?php
App::uses('AppController', 'Controller');
/**
 * GeoCodePsas Controller
 *
 * @property GeoCodePsa $GeoCodePsa
 */
class GeoCodePsasController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		$this -> set('title_for_layout', 'PSAs');
		$this -> loadModel('GeoCodeDivn');
		$conditions = array();

		$conditions['joins'] = array( array('table' => 'geo_code_zilas', 'alias' => 'GeoCodeZila', 'type' => 'INNER', 'conditions' => array('GeoCodeZila.geo_code_divn_id = GeoCodeDivn.id')), array('table' => 'geo_code_upazilas', 'alias' => 'GeoCodeUpazila', 'type' => 'INNER', 'conditions' => array('GeoCodeUpazila.geo_code_zila_id = GeoCodeZila.id')), array('table' => 'geo_code_psas', 'alias' => 'GeoCodePsa', 'type' => 'INNER', 'conditions' => array('GeoCodePsa.geo_code_upazila_id = GeoCodeUpazila.id')), array('table' => 'geo_code_rmos', 'alias' => 'GeoCodeRmo', 'type' => 'LEFT', 'conditions' => array('GeoCodeRmo.id = GeoCodePsa.geo_code_rmo_id')));

		$conditions['fields'] = array('GeoCodeDivn.divn_code', 'GeoCodeDivn.divn_name', 'GeoCodeZila.zila_code', 'GeoCodeZila.zila_name', 'GeoCodeUpazila.upzila_code', 'GeoCodeUpazila.upzila_name', 'GeoCodeRmo.rmo_type_eng', 'GeoCodePsa.psa_code', 'GeoCodePsa.psa_name', 'GeoCodePsa.id');
		
		if ($this -> request -> is('post') && $this -> request ->data['GeoCodePsa']['psa_name'] != "") {
			$conditions['conditions'] = array('GeoCodePsa.psa_name LIKE' => '%'.$this -> request ->data['GeoCodePsa']['psa_name'].'%');
			$conditions['limit'] = 100;
		}


		$this -> paginate = $conditions;
		$geoCodePsas = $this -> paginate('GeoCodeDivn');
		$this -> set(compact('geoCodePsas'));
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> GeoCodePsa -> id = $id;
		if (!$this -> GeoCodePsa -> exists()) {
			throw new NotFoundException(__('Invalid geo code psa'));
		}
		$this -> set('geoCodePsa', $this -> GeoCodePsa -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$this -> loadModel('GeoCodeDivn');

		if ($this -> request -> is('post')) {
			$this -> GeoCodePsa -> create();
			if ($this -> GeoCodePsa -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The geo code psa has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The geo code psa could not be saved. Please, try again.'));
			}
		}

		$divns = $this -> GeoCodeDivn -> find('list');
		$geoCodeRmos = $this -> GeoCodePsa -> GeoCodeRmo -> find('list');

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
		$this -> GeoCodePsa -> id = $id;

		if (!$this -> GeoCodePsa -> exists()) {
			throw new NotFoundException(__('Invalid geo code psa'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {

			//pr($this->request->data); exit;

			if ($this -> GeoCodePsa -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The geo code psa has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The geo code psa could not be saved. Please, try again.'));
			}
		} else {
			$this -> request -> data = $this -> GeoCodePsa -> read(null, $id);
		}
		$divns = $this -> GeoCodeDivn -> find('list');
		//$geoCodeUpazilas = $this->GeoCodePsa->GeoCodeUpazila->find('list');
		$geoCodeUpazilas = null;
		$geoCodeRmos = $this -> GeoCodePsa -> GeoCodeRmo -> find('list');
		$this -> set(compact('geoCodeUpazilas', 'geoCodeRmos', 'divns'));
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
		$this -> GeoCodePsa -> id = $id;
		if (!$this -> GeoCodePsa -> exists()) {
			throw new NotFoundException(__('Invalid geo code psa'));
		}
		if ($this -> GeoCodePsa -> delete()) {
			$this -> Session -> setFlash(__('Geo code psa deleted'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Geo code psa was not deleted'));
		$this -> redirect(array('action' => 'index'));
	}

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
}
