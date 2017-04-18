<?php
App::uses('AppController', 'Controller');
/**
 * UnitHeadEducations Controller
 *
 * @property UnitHeadEducation $UnitHeadEducation
 */
class UnitHeadEducationsController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> paginate = array('limit' => 30);
		$this -> UnitHeadEducation -> recursive = 0;
		$this -> set('unitHeadEducations', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> UnitHeadEducation -> id = $id;
		if (!$this -> UnitHeadEducation -> exists()) {
			throw new NotFoundException(__('Invalid unit head education'));
		}
		$this -> set('unitHeadEducation', $this -> UnitHeadEducation -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> UnitHeadEducation -> create();
			if ($this -> UnitHeadEducation -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The unit head education has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The unit head education could not be saved. Please, try again.'));
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
		$this -> UnitHeadEducation -> id = $id;
		if (!$this -> UnitHeadEducation -> exists()) {
			throw new NotFoundException(__('Invalid unit head education'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> UnitHeadEducation -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The unit head education has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The unit head education could not be saved. Please, try again.'));
			}
		} else {
			$this -> request -> data = $this -> UnitHeadEducation -> read(null, $id);
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
		$this -> UnitHeadEducation -> id = $id;
		if (!$this -> UnitHeadEducation -> exists()) {
			throw new NotFoundException(__('Invalid unit head education'));
		}
		if ($this -> UnitHeadEducation -> delete()) {
			$this -> Session -> setFlash(__('Unit head education deleted'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Unit head education was not deleted'));
		$this -> redirect(array('action' => 'index'));
	}

}
