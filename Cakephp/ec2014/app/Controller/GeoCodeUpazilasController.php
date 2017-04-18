<?php
App::uses('AppController', 'Controller');
/**
 * GeoCodeUpazilas Controller
 *
 * @property GeoCodeUpazila $GeoCodeUpazila
 */
class GeoCodeUpazilasController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> set('title_for_layout', 'Upazilas');
		$this -> loadModel('GeoCodeDivn');
		$conditions = array();
		$conditions['joins'] = array( array('table' => 'geo_code_zilas', 'alias' => 'GeoCodeZila', 'type' => 'INNER', 'conditions' => array('GeoCodeZila.geo_code_divn_id = GeoCodeDivn.id')), array('table' => 'geo_code_upazilas', 'alias' => 'GeoCodeUpazila', 'type' => 'INNER', 'conditions' => array('GeoCodeUpazila.geo_code_zila_id = GeoCodeZila.id')));
		
		$conditions['fields'] = array('GeoCodeDivn.divn_code', 'GeoCodeDivn.divn_name', 'GeoCodeZila.zila_code', 'GeoCodeZila.zila_name', 'GeoCodeUpazila.upzila_code', 'GeoCodeUpazila.upzila_name', 'GeoCodeUpazila.id', 'GeoCodeDivn.id', 'GeoCodeZila.id');
		
		
		
		if ($this -> request -> is('post') && $this -> request ->data['GeoCodeUpazila']['upzila_name'] != "") {
			$conditions['conditions'] = array('GeoCodeUpazila.upzila_name LIKE' => '%'.$this -> request ->data['GeoCodeUpazila']['upzila_name'].'%');
			$conditions['limit'] = 100;
		}
		

		$this -> paginate = $conditions;
		$geoCodeUpazilas = $this -> paginate('GeoCodeDivn');
		$this -> set(compact('geoCodeUpazilas'));
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> GeoCodeUpazila -> id = $id;
		if (!$this -> GeoCodeUpazila -> exists()) {
			throw new NotFoundException(__('Invalid geo code upazila'));
		}
		$this -> set('geoCodeUpazila', $this -> GeoCodeUpazila -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$this -> loadModel('GeoCodeDivn');

		if ($this -> request -> is('post')) {
			$this -> GeoCodeUpazila -> create();
			if ($this -> GeoCodeUpazila -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The geo code upazila has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The geo code upazila could not be saved. Please, try again.'));
			}
		}

		$divns = $this -> GeoCodeDivn -> find('list');
		$this -> set(compact('divns'));
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
		$this -> GeoCodeUpazila -> id = $id;
		if (!$this -> GeoCodeUpazila -> exists()) {
			throw new NotFoundException(__('Invalid geo code upazila'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> GeoCodeUpazila -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The geo code upazila has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The geo code upazila could not be saved. Please, try again.'));
			}
		} else {
			$this -> request -> data = $this -> GeoCodeUpazila -> read(null, $id);
		}
		$divns = $this -> GeoCodeDivn -> find('list');
		$geoCodeZilas = null;
		$this -> set(compact('geoCodeZilas', 'divns'));
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
		$this -> GeoCodeUpazila -> id = $id;
		if (!$this -> GeoCodeUpazila -> exists()) {
			throw new NotFoundException(__('Invalid geo code upazila'));
		}
		if ($this -> GeoCodeUpazila -> delete()) {
			$this -> Session -> setFlash(__('Geo code upazila deleted'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Geo code upazila was not deleted'));
		$this -> redirect(array('action' => 'index'));
	}

	public function getZilaName() {
		$this -> autoRender = false;
		$this -> layout = false;
		$this -> loadModel('GeoCodeZila');
		$GeoCodeZila = $this -> GeoCodeZila -> find('list', array('conditions' => array('GeoCodeZila.geo_code_divn_id =' => $_REQUEST['geo_code_divn_id']), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_name'), 'order' => 'GeoCodeZila.zila_name'));
		echo json_encode($GeoCodeZila);
	}

}
