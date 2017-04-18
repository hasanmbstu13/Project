<?php
App::uses('AppController', 'Controller');
/**
 * GeoCodeRmos Controller
 *
 * @property GeoCodeRmo $GeoCodeRmo
 *
 */
class GeoCodeRmosController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> set('title_for_layout', 'RMOs');
		$this -> GeoCodeRmo -> recursive = 0;
		$this -> set('geoCodeRmos', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> GeoCodeRmo -> id = $id;
		if (!$this -> GeoCodeRmo -> exists()) {
			throw new NotFoundException(__('Invalid geo code rmo'));
		}
		$this -> set('geoCodeRmo', $this -> GeoCodeRmo -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> GeoCodeRmo -> create();
			if ($this -> GeoCodeRmo -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The geo code rmo has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The geo code rmo could not be saved. Please, try again.'));
			}
		}
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> GeoCodeRmo -> id = $id;
		if (!$this -> GeoCodeRmo -> exists()) {
			throw new NotFoundException(__('Invalid geo code rmo'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> GeoCodeRmo -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The geo code rmo has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The geo code rmo could not be saved. Please, try again.'));
			}
		} else {
			$this -> request -> data = $this -> GeoCodeRmo -> read(null, $id);
		}
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
		$this -> GeoCodeRmo -> id = $id;
		if (!$this -> GeoCodeRmo -> exists()) {
			throw new NotFoundException(__('Invalid geo code rmo'));
		}
		if ($this -> GeoCodeRmo -> delete()) {
			$this -> Session -> setFlash(__('Geo code rmo deleted'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Geo code rmo was not deleted'));
		$this -> redirect(array('action' => 'index'));
	}

}
