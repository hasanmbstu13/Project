<?php
App::uses('AppController', 'Controller');
/**
 * ProdCodeSections Controller
 *
 * @property ProdCodeSection $ProdCodeSection
 */
class ProdCodeSectionsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProdCodeSection->recursive = 0;
		$this->set('prodCodeSections', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ProdCodeSection->id = $id;
		if (!$this->ProdCodeSection->exists()) {
			throw new NotFoundException(__('Invalid prod code section'));
		}
		$this->set('prodCodeSection', $this->ProdCodeSection->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProdCodeSection->create();
			if ($this->ProdCodeSection->save($this->request->data)) {
				$this->Session->setFlash(__('The prod code section has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prod code section could not be saved. Please, try again.'));
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
		$this->ProdCodeSection->id = $id;
		if (!$this->ProdCodeSection->exists()) {
			throw new NotFoundException(__('Invalid prod code section'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProdCodeSection->save($this->request->data)) {
				$this->Session->setFlash(__('The prod code section has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prod code section could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ProdCodeSection->read(null, $id);
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
		$this->ProdCodeSection->id = $id;
		if (!$this->ProdCodeSection->exists()) {
			throw new NotFoundException(__('Invalid prod code section'));
		}
		if ($this->ProdCodeSection->delete()) {
			$this->Session->setFlash(__('Prod code section deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Prod code section was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
