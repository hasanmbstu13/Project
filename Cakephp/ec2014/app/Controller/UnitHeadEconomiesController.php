<?php
App::uses('AppController', 'Controller');
/**
 * UnitHeadEconomies Controller
 *
 * @property UnitHeadEconomy $UnitHeadEconomy
 */
class UnitHeadEconomiesController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> paginate = array('limit' => 30);
		$this -> UnitHeadEconomy -> recursive = 0;
		$this -> set('unitHeadEconomies', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> UnitHeadEconomy -> id = $id;
		if (!$this -> UnitHeadEconomy -> exists()) {
			throw new NotFoundException(__('Invalid unit head economy'));
		}
		$this -> set('unitHeadEconomy', $this -> UnitHeadEconomy -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> UnitHeadEconomy -> create();
			if ($this -> UnitHeadEconomy -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The unit head economy has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The unit head economy could not be saved. Please, try again.'));
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
		$this -> UnitHeadEconomy -> id = $id;
		if (!$this -> UnitHeadEconomy -> exists()) {
			throw new NotFoundException(__('Invalid unit head economy'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> UnitHeadEconomy -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The unit head economy has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The unit head economy could not be saved. Please, try again.'));
			}
		} else {
			$this -> request -> data = $this -> UnitHeadEconomy -> read(null, $id);
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
		$this -> UnitHeadEconomy -> id = $id;
		if (!$this -> UnitHeadEconomy -> exists()) {
			throw new NotFoundException(__('Invalid unit head economy'));
		}
		if ($this -> UnitHeadEconomy -> delete()) {
			$this -> Session -> setFlash(__('Unit head economy deleted'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Unit head economy was not deleted'));
		$this -> redirect(array('action' => 'index'));
	}

}
