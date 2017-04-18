<?php
App::uses('AppController', 'Controller');
/**
 * IndCodeDivns Controller
 *
 * @property IndCodeDivn $IndCodeDivn
 */
class IndCodeDivnsController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> IndCodeDivn -> recursive = 0;
		$this -> set('indCodeDivns', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> IndCodeDivn -> id = $id;
		if (!$this -> IndCodeDivn -> exists()) {
			throw new NotFoundException(__('Invalid ind code divn'));
		}
		$this -> set('indCodeDivn', $this -> IndCodeDivn -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> IndCodeDivn -> create();
			if ($this -> IndCodeDivn -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The ind code divn has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The ind code divn could not be saved. Please, try again.'));
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
		$this -> IndCodeDivn -> id = $id;
		if (!$this -> IndCodeDivn -> exists()) {
			throw new NotFoundException(__('Invalid ind code divn'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> IndCodeDivn -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The ind code divn has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The ind code divn could not be saved. Please, try again.'));
			}
		} else {
			$this -> request -> data = $this -> IndCodeDivn -> read(null, $id);
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
		$this -> IndCodeDivn -> id = $id;
		if (!$this -> IndCodeDivn -> exists()) {
			throw new NotFoundException(__('Invalid ind code divn'));
		}
		if ($this -> IndCodeDivn -> delete()) {
			$this -> Session -> setFlash(__('Ind code divn deleted'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Ind code divn was not deleted'));
		$this -> redirect(array('action' => 'index'));
	}

}
