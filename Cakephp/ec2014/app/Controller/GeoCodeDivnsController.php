<?php
App::uses('AppController', 'Controller');
/**
 * GeoCodeDivns Controller
 *
 * @property GeoCodeDivn $GeoCodeDivn
 */
class GeoCodeDivnsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {

		//pr($this->GeoCodeDivn->getDivnID(10));
		$this->set('title_for_layout', 'Divisions');
		$this->GeoCodeDivn->recursive = 0;
		$this->set('geoCodeDivns', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->GeoCodeDivn->id = $id;
		if (!$this->GeoCodeDivn->exists()) {
			throw new NotFoundException(__('Invalid geo code divn'));
		}
		$this->set('geoCodeDivn', $this->GeoCodeDivn->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GeoCodeDivn->create();
			if ($this->GeoCodeDivn->save($this->request->data)) {
				$this->Session->setFlash(__('The geo code divn has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The geo code divn could not be saved. Please, try again.'));
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
		$this->GeoCodeDivn->id = $id;
		if (!$this->GeoCodeDivn->exists()) {
			throw new NotFoundException(__('Invalid geo code divn'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->GeoCodeDivn->save($this->request->data)) {
				$this->Session->setFlash(__('The geo code divn has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The geo code divn could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->GeoCodeDivn->read(null, $id);
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
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->GeoCodeDivn->id = $id;
		if (!$this->GeoCodeDivn->exists()) {
			throw new NotFoundException(__('Invalid geo code divn'));
		}
		if ($this->GeoCodeDivn->delete()) {
			$this->Session->setFlash(__('Geo code divn deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Geo code divn was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
