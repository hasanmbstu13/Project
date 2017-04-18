<?php
App::uses('AppController', 'Controller');
/**
 * GeoCodeZilas Controller
 *
 * @property GeoCodeZila $GeoCodeZila
 */
class GeoCodeZilasController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> set('title_for_layout', 'Zilas');
		$this -> GeoCodeZila -> recursive = 0;

		$this -> set('geoCodeZilas', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> GeoCodeZila -> id = $id;
		if (!$this -> GeoCodeZila -> exists()) {
			throw new NotFoundException(__('Invalid geo code zila'));
		}
		$this -> set('geoCodeZila', $this -> GeoCodeZila -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> GeoCodeZila -> create();
			if ($this -> GeoCodeZila -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The geo code zila has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The geo code zila could not be saved. Please, try again.'));
			}
		}
		$geoCodeDivns = $this -> GeoCodeZila -> GeoCodeDivn -> find('list');
		$this -> set(compact('geoCodeDivns'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> GeoCodeZila -> id = $id;
		if (!$this -> GeoCodeZila -> exists()) {
			throw new NotFoundException(__('Invalid geo code zila'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {

			//pr($this->request->data); exit;

			if ($this -> GeoCodeZila -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The geo code zila has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The geo code zila could not be saved. Please, try again.'));
			}
		} else {
			$this -> request -> data = $this -> GeoCodeZila -> read(null, $id);
		}
		$geoCodeDivns = $this -> GeoCodeZila -> GeoCodeDivn -> find('list');
		$this -> set(compact('geoCodeDivns'));
	}

	/**
	 * delete method
	 *
	 * @throws MethodNotAllowedException
	 * @throws NotFoundException
	 * @param  string $id
	 * @return void
	 */
	public function delete($id = null) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> GeoCodeZila -> id = $id;
		if (!$this -> GeoCodeZila -> exists()) {
			throw new NotFoundException(__('Invalid geo code zila'));
		}
		if ($this -> GeoCodeZila -> delete()) {
			$this -> Session -> setFlash(__('Geo code zila deleted'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Geo code zila was not deleted'));
		$this -> redirect(array('action' => 'index'));
	}

}
