<?php
App::uses('AppController', 'Controller');
/**
 * IndCodeClasses Controller
 *
 * @property IndCodeClass $IndCodeClass
 */
class IndCodeClassesController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> IndCodeClass -> recursive = 0;
		
		$conditions['conditions'] = array();
// Search by bangla description        
		if ($this -> request -> is('post') && $this -> request ->data['IndCodeClass']['class_code_desc_bng'] != "") {
			$conditions['conditions'][] = array('IndCodeClass.class_code_desc_bng LIKE' => '%'.$this -> request ->data['IndCodeClass']['class_code_desc_bng'].'%');
			$conditions['limit'] = 100;
		}
// Search by class code        
     if ($this -> request -> is('post') && $this -> request ->data['IndCodeClass']['class_code'] != "") {
            $conditions['conditions'][] = array('IndCodeClass.class_code LIKE' => '%'.$this -> request ->data['IndCodeClass']['class_code'].'%');
            $conditions['limit'] = 100;
        }
		
		
		
		$this -> paginate = $conditions;
		$indCodeClasses = $this -> paginate('IndCodeClass');
		
		$this -> set(compact('indCodeClasses'));
		
		//$this -> set('indCodeClasses', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> IndCodeClass -> id = $id;
		if (!$this -> IndCodeClass -> exists()) {
			throw new NotFoundException(__('Invalid ind code class'));
		}
		$this -> set('indCodeClass', $this -> IndCodeClass -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this -> request -> is('post')) {
			$this -> IndCodeClass -> create();
			if ($this -> IndCodeClass -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The ind code class has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The ind code class could not be saved. Please, try again.'));
			}
		}
		$indCodeGroups = $this -> IndCodeClass -> IndCodeGroup -> find('list');
		$this -> set(compact('indCodeGroups'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this -> IndCodeClass -> id = $id;
		if (!$this -> IndCodeClass -> exists()) {
			throw new NotFoundException(__('Invalid ind code class'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> IndCodeClass -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The ind code class has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The ind code class could not be saved. Please, try again.'));
			}
		} else {
			$this -> request -> data = $this -> IndCodeClass -> read(null, $id);
		}
		$indCodeGroups = $this -> IndCodeClass -> IndCodeGroup -> find('list');
		$this -> set(compact('indCodeGroups'));
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
		$this -> IndCodeClass -> id = $id;
		if (!$this -> IndCodeClass -> exists()) {
			throw new NotFoundException(__('Invalid ind code class'));
		}
		if ($this -> IndCodeClass -> delete()) {
			$this -> Session -> setFlash(__('Ind code class deleted'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Ind code class was not deleted'));
		$this -> redirect(array('action' => 'index'));
	}

}
