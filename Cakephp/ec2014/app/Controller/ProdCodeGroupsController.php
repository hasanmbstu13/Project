<?php
App::uses('AppController', 'Controller');
/**
 * ProdCodeGroups Controller
 *
 * @property ProdCodeGroup $ProdCodeGroup
 */
class ProdCodeGroupsController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> ProdCodeGroup -> recursive = 0;
		$this -> set('prodCodeGroups', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> ProdCodeGroup -> id = $id;
		if (!$this -> ProdCodeGroup -> exists()) {
			throw new NotFoundException(__('Invalid prod code group'));
		}
		$this -> set('prodCodeGroup', $this -> ProdCodeGroup -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> ProdCodeGroup -> create();
			if ($this -> ProdCodeGroup -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The prod code group has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The prod code group could not be saved. Please, try again.'));
			}
		}
		$prodCodeDivns = $this -> ProdCodeGroup -> ProdCodeDivn -> find('list');
		$this -> set(compact('prodCodeDivns'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> ProdCodeGroup -> id = $id;
		if (!$this -> ProdCodeGroup -> exists()) {
			throw new NotFoundException(__('Invalid prod code group'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> ProdCodeGroup -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The prod code group has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The prod code group could not be saved. Please, try again.'));
			}
		} else {
			$this -> request -> data = $this -> ProdCodeGroup -> read(null, $id);
		}
		$prodCodeDivns = $this -> ProdCodeGroup -> ProdCodeDivn -> find('list');
		$this -> set(compact('prodCodeDivns'));
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
		$this -> ProdCodeGroup -> id = $id;
		if (!$this -> ProdCodeGroup -> exists()) {
			throw new NotFoundException(__('Invalid prod code group'));
		}
		if ($this -> ProdCodeGroup -> delete()) {
			$this -> Session -> setFlash(__('Prod code group deleted'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Prod code group was not deleted'));
		$this -> redirect(array('action' => 'index'));
	}

}
