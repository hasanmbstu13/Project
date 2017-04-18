<?php

class PagesController extends AppController {

	 var $uses = false;

	public function index() {
		$this -> set('title_for_layout', 'Home');
		$_SESSION["MenuActive"] = 1;
		
		$this->loadModel('Notice');
		$notices = $this -> Notice -> find('all', array('order' => array('msg_order', 'id')));
		$this -> set(compact('notices'));
	}

	public function masterinformation() {
		$this -> set('title_for_layout', 'Master Information');
		$_SESSION["MenuActive"] = 3;
	}

	public function dashboard() {
		$this -> set('title_for_layout', 'Master Information');
		$_SESSION["MenuActive"] = 5;
	}

	public function help_pdf() {

		$this -> set('title_for_layout', 'Instruction');
		$this -> viewClass = 'Media';
		$params = array('id' => 'help.pdf', 'name' => 'pdf', 'download' => false, 'extension' => 'pdf', 'path' => APP . 'outside_webroot_dir' . DS);
		$this -> set($params);
	}

	//Edit For ISIC Code=======================================

	public function isic_pdf() {
		$this -> set('title_for_layout', 'ISIC');
		$this -> viewClass = 'Media';
		$params = array('id' => 'isic.pdf', 'name' => 'pdf', 'download' => false, 'extension' => 'pdf', 'path' => APP . 'outside_webroot_dir' . DS);
		$this -> set($params);
	}
    
    
    // BOOK DISTRIBUTION
    
        public function book_distribution() {

        $this -> set('title_for_layout', 'Book Distribution');
        $this -> viewClass = 'Media';
        $params = array('id' => 'BookDistributionForm.pdf', 'name' => 'pdf', 'download' => false, 'extension' => 'pdf', 'path' => APP . 'outside_webroot_dir' . DS);
        $this -> set($params);
    }
	
		public function search_view($id = null){
			$this -> layout = 'table';
			$this->loadModel('Questionaire');
			
		$this->Questionaire->id = $id;
		if (!$this->Questionaire->exists()) {
			throw new NotFoundException(__('Invalid Questionaire id'));
		}
		#$this->Questionaire->unBindModel(array(belongsTo => array('Book', 'QuesSixCheck','QuesCheck','UnitHeadEconomy','GeoCodeMauza')));
		$questionaires = $this->Questionaire->read(null, $id);

		//pr($data);exit;
		$this->set(compact('questionaires'));
			
		}

}
