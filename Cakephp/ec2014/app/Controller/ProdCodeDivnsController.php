<?php
App::uses('AppController', 'Controller');
/**
 * ProdCodeDivns Controller
 *
 * @property ProdCodeDivn $ProdCodeDivn
 */
class ProdCodeDivnsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProdCodeDivn->recursive = 0;
		$this->set('prodCodeDivns', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ProdCodeDivn->id = $id;
		if (!$this->ProdCodeDivn->exists()) {
			throw new NotFoundException(__('Invalid prod code divn'));
		}
		$this->set('prodCodeDivn', $this->ProdCodeDivn->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProdCodeDivn->create();
			if ($this->ProdCodeDivn->save($this->request->data)) {
				$this->Session->setFlash(__('The prod code divn has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prod code divn could not be saved. Please, try again.'));
			}
		}
		$prodCodeSections = $this->ProdCodeDivn->ProdCodeSection->find('list');
		$this->set(compact('prodCodeSections'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ProdCodeDivn->id = $id;
		if (!$this->ProdCodeDivn->exists()) {
			throw new NotFoundException(__('Invalid prod code divn'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProdCodeDivn->save($this->request->data)) {
				$this->Session->setFlash(__('The prod code divn has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prod code divn could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ProdCodeDivn->read(null, $id);
		}
		$prodCodeSections = $this->ProdCodeDivn->ProdCodeSection->find('list');
		$this->set(compact('prodCodeSections'));
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
		$this->ProdCodeDivn->id = $id;
		if (!$this->ProdCodeDivn->exists()) {
			throw new NotFoundException(__('Invalid prod code divn'));
		}
		if ($this->ProdCodeDivn->delete()) {
			$this->Session->setFlash(__('Prod code divn deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Prod code divn was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

