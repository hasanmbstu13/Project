<?php
App::uses('AppController', 'Controller');
/**
 * ProdCodeClasses Controller
 *
 * @property ProdCodeClass $ProdCodeClass
 */
class ProdCodeClassesController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> ProdCodeClass -> recursive = 0;
		$this -> set('prodCodeClasses', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> ProdCodeClass -> id = $id;
		if (!$this -> ProdCodeClass -> exists()) {
			throw new NotFoundException(__('Invalid prod code class'));
		}
		$this -> set('prodCodeClass', $this -> ProdCodeClass -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> ProdCodeClass -> create();
			if ($this -> ProdCodeClass -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The prod code class has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The prod code class could not be saved. Please, try again.'));
			}
		}
		$prodCodeGroups = $this -> ProdCodeClass -> ProdCodeGroup -> find('list');
		$this -> set(compact('prodCodeGroups'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> ProdCodeClass -> id = $id;
		if (!$this -> ProdCodeClass -> exists()) {
			throw new NotFoundException(__('Invalid prod code class'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> ProdCodeClass -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The prod code class has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The prod code class could not be saved. Please, try again.'));
			}
		} else {
			$this -> request -> data = $this -> ProdCodeClass -> read(null, $id);
		}
		$prodCodeGroups = $this -> ProdCodeClass -> ProdCodeGroup -> find('list');
		$this -> set(compact('prodCodeGroups'));
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
		$this -> ProdCodeClass -> id = $id;
		if (!$this -> ProdCodeClass -> exists()) {
			throw new NotFoundException(__('Invalid prod code class'));
		}
		if ($this -> ProdCodeClass -> delete()) {
			$this -> Session -> setFlash(__('Prod code class deleted'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Prod code class was not deleted'));
		$this -> redirect(array('action' => 'index'));
	}

}
