<?php
App::uses('AppController', 'Controller');
/**
 * ProdCodeSubClasses Controller
 *
 * @property ProdCodeSubClass $ProdCodeSubClass
 */
class ProdCodeSubClassesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProdCodeSubClass->recursive = 0;
		$this->set('prodCodeSubClasses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ProdCodeSubClass->id = $id;
		if (!$this->ProdCodeSubClass->exists()) {
			throw new NotFoundException(__('Invalid prod code sub class'));
		}
		$this->set('prodCodeSubClass', $this->ProdCodeSubClass->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProdCodeSubClass->create();
			if ($this->ProdCodeSubClass->save($this->request->data)) {
				$this->Session->setFlash(__('The prod code sub class has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prod code sub class could not be saved. Please, try again.'));
			}
		}
		$prodCodeClasses = $this->ProdCodeSubClass->ProdCodeClass->find('list');
		$this->set(compact('prodCodeClasses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ProdCodeSubClass->id = $id;
		if (!$this->ProdCodeSubClass->exists()) {
			throw new NotFoundException(__('Invalid prod code sub class'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProdCodeSubClass->save($this->request->data)) {
				$this->Session->setFlash(__('The prod code sub class has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prod code sub class could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ProdCodeSubClass->read(null, $id);
		}
		$prodCodeClasses = $this->ProdCodeSubClass->ProdCodeClass->find('list');
		$this->set(compact('prodCodeClasses'));
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
		$this->ProdCodeSubClass->id = $id;
		if (!$this->ProdCodeSubClass->exists()) {
			throw new NotFoundException(__('Invalid prod code sub class'));
		}
		if ($this->ProdCodeSubClass->delete()) {
			$this->Session->setFlash(__('Prod code sub class deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Prod code sub class was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
