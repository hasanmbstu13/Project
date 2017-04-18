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



		public function search_ques(){

			$this -> layout = 'table';
			$_SESSION["MenuActive"] = 9;
			$this->loadModel('Questionaire');

        
			if ($this->request->data['Questionaire']['find_ques'] != null){
				
	            $id = trim($this->request->data['Questionaire']['find_ques']); 
	            $questionaires = $this->Questionaire->read(null, $id);
				$this -> set(compact('questionaires'));
				
			} else if($this -> request -> is('post') && $this->request->data['Questionaire']['ques_id']) {

				$input_data = array();
				$input_data['Questionaire']['id'] = $this->request->data['Questionaire']['ques_id'];
	            $input_data['Questionaire']['q2_unit_name'] = $this->request->data['Questionaire']['q2_unit_name'];

	            $input_data['Questionaire']['q6_economy_description'] = $this->request->data['Questionaire']['q6_economy_description'];
	            $input_data['Questionaire']['q6_ind_code_class_id'] = $this->request->data['Questionaire']['q6_economy_id'];

	            $input_data['Questionaire']['q17_hr_male'] = $this->request->data['Questionaire']['q17_hr_male'];
	            $input_data['Questionaire']['q17_hr_female'] = $this->request->data['Questionaire']['q17_hr_female'];

	            $input_data['Questionaire']['q17_hr_male_foc'] = $this->request->data['Questionaire']['q17_hr_male_foc'];
	            $input_data['Questionaire']['q17_hr_female_foc'] = $this->request->data['Questionaire']['q17_hr_female_foc'];

	             $input_data['Questionaire']['q17_hr_male_fulltime'] = $this->request->data['Questionaire']['q17_hr_male_fulltime'];
	            $input_data['Questionaire']['q17_hr_female_fulltime'] = $this->request->data['Questionaire']['q17_hr_female_fulltime'];


 				$input_data['Questionaire']['q17_hr_male_parttime'] = $this->request->data['Questionaire']['q17_hr_male_parttime'];
	            $input_data['Questionaire']['q17_hr_female_parttime'] = $this->request->data['Questionaire']['q17_hr_female_parttime'];


	            $input_data['Questionaire']['q17_hr_male_irregular'] = $this->request->data['Questionaire']['q17_hr_male_irregular'];
	            $input_data['Questionaire']['q17_hr_female_irregular'] = $this->request->data['Questionaire']['q17_hr_female_irregular'];


	            if ($this -> Questionaire -> save($input_data)) {
					$this -> Session -> setFlash(__('The Questionaire has been updated'));
					$this -> redirect(array('action' => 'search_ques'));
				} else {
					$this -> Session -> setFlash(__('The Questionaire could not be updated. Please, try again.'));
				}



			}
		}







}
