<?php
App::uses('AppController', 'Controller');
/**
 * IndCodeGroups Controller
 *
 * @property IndCodeGroup $IndCodeGroup
 */
class IndCodeGroupsController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> IndCodeGroup -> recursive = 0;
		
		
		if ($this -> request -> is('post') && $this -> request ->data['IndCodeGroup']['group_code_desc_bng'] != "") {
			$conditions['conditions'] = array('IndCodeGroup.group_code_desc_bng LIKE' => '%'.$this -> request ->data['IndCodeGroup']['group_code_desc_bng'].'%');
			$conditions['limit'] = 100;
		}
		else {
			$conditions['conditions'] = array();
		}
		
		
		
		
		$this -> paginate = $conditions;
		$indCodeGroups = $this -> paginate('IndCodeGroup');
		
		$this -> set(compact('indCodeGroups'));
		
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> IndCodeGroup -> id = $id;
		if (!$this -> IndCodeGroup -> exists()) {
			throw new NotFoundException(__('Invalid ind code group'));
		}
		$this -> set('indCodeGroup', $this -> IndCodeGroup -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> IndCodeGroup -> create();
			if ($this -> IndCodeGroup -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The ind code group has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The ind code group could not be saved. Please, try again.'));
			}
		}
		$indCodeDivns = $this -> IndCodeGroup -> IndCodeDivn -> find('list');
		$this -> set(compact('indCodeDivns'));

	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> IndCodeGroup -> id = $id;
		if (!$this -> IndCodeGroup -> exists()) {
			throw new NotFoundException(__('Invalid ind code group'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> IndCodeGroup -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The ind code group has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The ind code group could not be saved. Please, try again.'));
			}
		} else {
			$this -> request -> data = $this -> IndCodeGroup -> read(null, $id);
		}
		$indCodeDivns = $this -> IndCodeGroup -> IndCodeDivn -> find('list');
		$this -> set(compact('indCodeDivns'));
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
		$this -> IndCodeGroup -> id = $id;
		if (!$this -> IndCodeGroup -> exists()) {
			throw new NotFoundException(__('Invalid ind code group'));
		}
		if ($this -> IndCodeGroup -> delete()) {
			$this -> Session -> setFlash(__('Ind code group deleted'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Ind code group was not deleted'));
		$this -> redirect(array('action' => 'index'));
	}

}
