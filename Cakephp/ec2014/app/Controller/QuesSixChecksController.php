<?php
App::uses('AppController', 'Controller');
/**
 * QuesSixCkecks Controller
 *
 * @property QuesSixCkeck $QuesSixCkeck
 */
class QuesSixChecksController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	// public function index() {
		// $_SESSION["MenuActive"] = 5;
		// $this -> QuesSixCkeck -> recursive = 0;
		// $this -> set('quesSixCkecks', $this -> paginate());
	// }

	// ৬ নং প্রশ্নের নিরীক্ষণ =============================================
	public function q6upazila() {

		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeDivn');
		$this -> loadModel('GeoCodeZila');
		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel('GeoCodeRmo');

		if (in_array(5, $this -> Session -> read('Authake.group_ids')))//Division Coordinator
		{

			$divn = $this -> GeoCodeDivn -> find('first', array('conditions' => array('GeoCodeDivn.divn_code' => $this -> jd_divn), 'fields' => array('id', 'divn_name')));

			$zilas_name = $divn['GeoCodeDivn']['divn_name'] . " Division";

			$conditions['conditions'][] = array('GeoCodeZila.geo_code_divn_id' => $divn['GeoCodeDivn']['id']);

			$conditions['fields'] = array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name');
			$conditions['order'] = array('GeoCodeUpazila.upzila_name');

			$upazilas = $this -> GeoCodeUpazila -> find('all', $conditions);

		} else if (in_array(4, $this -> Session -> read('Authake.group_ids')))//Supervising Officer
		{
			$zilas = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.zila_code' => $this -> sup_officer_zila), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_name')));

			$zilaId = $zilas[0]['GeoCodeZila']['id'];
			$zilas_name = $zilas[0]['GeoCodeZila']['zila_name'] . " Zila";

			$upazilas = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id' => $zilaId), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name'), 'order' => array('GeoCodeUpazila.upzila_name')));
		} else if (in_array(3, $this -> Session -> read('Authake.group_ids')))//Supervisor
		{
			$zilas = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.zila_code' => $this -> supervisor_zila), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_name')));

			$zilaId = $zilas[0]['GeoCodeZila']['id'];
			$zilas_name = $zilas[0]['GeoCodeZila']['zila_name'] . " Zila";

			$upazilas = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id' => $zilaId, 'GeoCodeUpazila.upzila_code' => $this -> supervisor_upazila), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name'), 'order' => array('GeoCodeUpazila.upzila_name')));
		}

		$this -> set(compact('zilas_name', 'upazilas'));
	}

	
	public function unitname($upazilaID=null) {
		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeZila');
		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel('GeoCodeRmo');
		$this -> loadModel('GeoCodeUnion');
		
        $this -> GeoCodeUpazila -> id = $upazilaID;
        if (!$this -> GeoCodeUpazila -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }
		
		$upazilaID = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.id' => $upazilaID), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name')));

		$upazilaName = $upazilaID[0]['GeoCodeUpazila']['upzila_name'];
		$upazilaID = $upazilaID[0]['GeoCodeUpazila']['id'];

		$unionNames = $this -> GeoCodeUnion -> find('all', array('conditions' => array('GeoCodeUnion.geo_code_upazila_id' => $upazilaID)));

		$this -> set(compact('unionNames', 'upazilaName', 'upazilaID'));

	}

	public function books($id=null, $upazilaID=null) {
		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('Book');
		$this -> loadModel('Questionaire');
        $this -> loadModel('GeoCodeUpazila');
        $this -> loadModel('GeoCodeUnion');
        
        $this -> GeoCodeUnion ->id = $id;
        $this -> GeoCodeUpazila ->id = $upazilaID;
        
         if (!$this -> GeoCodeUnion -> exists()||!$this -> GeoCodeUpazila -> exists() ) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }

	
		$this -> Book -> unbindModel(array('belongsTo' => array('GeoCodeDivn', 'GeoCodeZila', 'GeoCodeUpazila', 'GeoCodeRmo', 'GeoCodePsa', 'GeoCodeUnion')));
        
		$books = $this -> Book -> find('all', array('conditions' => array('Book.geo_code_union_id' => $id), 'fields' => 'Book.id'));

		foreach ($books as $key => $value) {

			$questionaires = $this -> Questionaire -> find('count', array('conditions' => array('Questionaire.is_out_of_scope' => 0, 'Questionaire.book_id' => $value['Book']['id'],
			'OR' => array(
				array('QuesSixCheck.entry_by' => NULL),
				array('QuesSixCheck.is_right' => NULL)
			)
			
			), 
			
			'fields' => array('Questionaire.id', 'Questionaire.q1_geo_code_mauza_name', 'Questionaire.q1_unit_serial_no', 'Questionaire.q6_economy_description', 'Questionaire.q6_ind_code_class_id')));
			if ($questionaires == 0) {
				$books[$key]['Book']['status'] = 'Checked';
			} else {
				$books[$key]['Book']['status'] = 'Pending';
			}

		}

		$this -> set(compact('books', 'id', 'upazilaID'));
	}

	public function questions($id=null) {
		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('QuesSixCheck');
		$this -> loadModel('Book');
		$this -> loadModel('Questionaire');
		$this -> loadModel('IndCodeClass');
        
        
$this -> Book ->id = $id;
         if (!$this -> Book -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }
         
		if ($this -> request -> data) {

			foreach ($this->request->data['qusID'] as $key => $qusID) {

				if ($this -> request -> data['check_status'][$key] != "") {
					if ($this -> request -> data['check_status'][$key] == "Right")
						$this -> request -> data['check_status'][$key] = 1;
					else if ($this -> request -> data['check_status'][$key] == "Wrong")
						$this -> request -> data['check_status'][$key] = 0;

					$insert_data = array('QuesSixCheck' => array('questionaire_id' => $qusID, 'is_right' => $this -> request -> data['check_status'][$key], 'sync_required' => "1", 'created' => date("Y-m-d H:i:s"), 'entry_by' => $this -> Session -> read('Authake.id')));

					$this -> QuesSixCheck -> create();
					if ($this -> QuesSixCheck -> saveAll($insert_data)) {
						$this -> Session -> setFlash(__('Question No. 6 has been checked successfully.'));
					} else {
						$this -> Session -> setFlash(__('Data could not be saved. Please, try again.'));
						$this -> redirect(array('action' => 'questions', $id));
					}
					unset($insert_data);
				}
			}
			$this -> redirect(array('action' => 'questions', $id));
		}

		$questionaires = $this -> Questionaire -> find('all', array('conditions' => array('Questionaire.book_id' => $id, 'Questionaire.is_out_of_scope' => 0,
		'OR' => array(
				array('QuesSixCheck.entry_by' => NULL),
				array('QuesSixCheck.is_right' => NULL)
			)), 'fields' => array('Questionaire.id', 'Questionaire.q1_geo_code_mauza_name', 'Questionaire.q1_unit_serial_no', 'Questionaire.q6_economy_description', 'Questionaire.q6_ind_code_class_id', 'Book.geo_code_union_id'), 'order' => array('Questionaire.id' => 'ASC')));

		//pr($questionaires);

		foreach ($questionaires as $key => $value) {
			$inds = $this -> IndCodeClass -> find('all', array('conditions' => array('class_code' => $value['Questionaire']['q6_ind_code_class_id'])));

			$questionaires[$key]['Questionaire']['q6_economy_description_orginal'] = $inds[0]['IndCodeClass']['class_code_desc_bng'];
		}

		$book = $this -> Book -> find('all', array('conditions' => array('Book.id' => $id), 'fields' => array('Book.geo_code_union_id', 'Book.geo_code_upazila_id')));
		$book = $book[0]['Book'];

		$this -> set(compact('questionaires', 'id', 'book'));
	}

	public function print_q6($bookID) {
		$this -> layout = 'print';
		$this -> loadModel('Questionaire');
		$this -> loadModel('IndCodeClass');
        $this -> loadModel('Book');
        
       $this -> Book ->id = $bookID;
         if (!$this -> Book -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }        
        
        
		$questionaires = $this -> Questionaire -> find('all', array('conditions' => array('Questionaire.book_id' => $bookID, 'Questionaire.is_out_of_scope' => 0), 'fields' => array('Questionaire.id', 'Questionaire.q1_geo_code_mauza_name', 'Questionaire.q1_unit_serial_no', 'Questionaire.q6_economy_description', 'Questionaire.q6_ind_code_class_id', 'QuesSixCheck.is_right')));

		foreach ($questionaires as $key => $value) {
			$inds = $this -> IndCodeClass -> find('all', array('conditions' => array('IndCodeClass.class_code' => $value['Questionaire']['q6_ind_code_class_id'])));
			$questionaires[$key]['Questionaire']['q6_economy_description_orginal'] = $inds[0]['IndCodeClass']['class_code_desc_bng'];
		}
		$this -> set(compact('questionaires', 'id'));
	}

	//৬ নং প্রশ্নের সংশোধনী ===========================================================

	public function soupazila() {

		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeDivn');
		$this -> loadModel('GeoCodeZila');
		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel('GeoCodeRmo');

		if (in_array(5, $this -> Session -> read('Authake.group_ids')))//Division Coordinator
		{

			$divn = $this -> GeoCodeDivn -> find('first', array('conditions' => array('GeoCodeDivn.divn_code' => $this -> jd_divn), 'fields' => array('id', 'divn_name')));

			$zilas_name = $divn['GeoCodeDivn']['divn_name'] . " Division";

			$conditions['conditions'][] = array('GeoCodeZila.geo_code_divn_id' => $divn['GeoCodeDivn']['id']);

			$conditions['fields'] = array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name');
			$conditions['order'] = array('GeoCodeUpazila.upzila_name');

			$upazilas = $this -> GeoCodeUpazila -> find('all', $conditions);

		} else if (in_array(4, $this -> Session -> read('Authake.group_ids')))//Supervising Officer
		{
			$zilas = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.zila_code' => $this -> sup_officer_zila), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_name')));

			$zilaId = $zilas[0]['GeoCodeZila']['id'];
			$zilas_name = $zilas[0]['GeoCodeZila']['zila_name'] . " Zila";

			$upazilas = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id' => $zilaId), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name'), 'order' => array('GeoCodeUpazila.upzila_name')));
		} else if (in_array(3, $this -> Session -> read('Authake.group_ids')))//Supervisor
		{
			$zilas = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.zila_code' => $this -> sup_officer_zila), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_name')));

			$zilaId = $zilas[0]['GeoCodeZila']['id'];
			$zilas_name = $zilas[0]['GeoCodeZila']['zila_name'] . " Zila";

			$upazilas = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id' => $zilaId, 'GeoCodeUpazila.upzila_code' => $this -> supervisor_upazila), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name'), 'order' => array('GeoCodeUpazila.upzila_name')));
		}

		$this -> set(compact('zilas_name', 'upazilas'));
	}

	public function sounions($id=null) {
		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeZila');
		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel('GeoCodeRmo');
		$this -> loadModel('GeoCodeUnion');
        
         $this -> GeoCodeUpazila ->id = $id;
         if (!$this -> GeoCodeUpazila -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        } 

		$upazilaName = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.id' => $id)));

		//pr($upazilaName); exit;

		$unionNames = $this -> GeoCodeUnion -> find('all', array('conditions' => array('GeoCodeUnion.geo_code_upazila_id' => $id), 'fields' => array('GeoCodeUnion.id', 'GeoCodeUnion.union_name')));

		//pr($unionNames); exit;

		$this -> set(compact('unionNames', 'upazilaName'));
	}

	public function sobooks($id=null) {
			
		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeUnion');
		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel('Questionaire');
        
       $this -> GeoCodeUnion ->id = $id;
         if (!$this -> GeoCodeUnion -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }         

		$this -> Book -> unbindModel(array('belongsTo' => array('GeoCodeDivn', 'GeoCodeZila', 'GeoCodeRmo', 'GeoCodePsa')));

		$secBooks = $this -> GeoCodeUnion -> find('first', array('conditions' => array('GeoCodeUnion.id' => $id)));

		//pr($secBooks); exit;

		$books = $this -> Book -> find('all', array('conditions' => array('Book.geo_code_union_id' => $id), 'fields' => array('Book.id', 'GeoCodeUpazila.id')));

		foreach ($books as $key => $value) {
			
			$questionaires = $this -> Questionaire -> find('count', array('conditions' => array('Questionaire.is_out_of_scope' => 0, 'QuesSixCheck.is_right' => 0, 'Questionaire.book_id' => $value['Book']['id'],
			'OR' => array(
				array('QuesSixCheck.right_code' => NULL),
				array('QuesSixCheck.right_code' => '')
			)
			), 'fields' => array('Questionaire.id', 'Questionaire.q1_geo_code_mauza_name', 'Questionaire.q1_unit_serial_no', 'Questionaire.q6_economy_description', 'Questionaire.q6_ind_code_class_id')));

			//pr($questionaires); exit;

			if ($questionaires == 0) {
				$books[$key]['Book']['status'] = 'Checked';
			} else {
				$books[$key]['Book']['status'] = 'Pending';
			}
		}

		$this -> set(compact('books', 'id', 'secBooks'));
	}

	public function soquestions($id=null) {

		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('QuesSixCheck');
		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeUnion');
        
        $this -> Book ->id = $id;
         if (!$this -> Book -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }

		if ($this -> request -> data) {

			foreach ($this->request->data['right_code'] as $key => $right_code) {

				if ($right_code != "") {

					$insert_data = array('QuesSixCheck' => array('questionaire_id' => $key, 'right_code' => $right_code, 'sync_required' => "1", 'modified' => date("Y-m-d H:i:s"), 'update_by' => $this -> Session -> read('Authake.id'), 'approve_status' => "PENDING", 'approve_by' => NULL));

					$this -> QuesSixCheck -> create();

					if ($this -> QuesSixCheck -> saveAll($insert_data)) {
						$this -> Session -> setFlash(__('Right Code has been inserted  Successfully.'));
					} else {
						$this -> Session -> setFlash(__('Could not be Saved. Please, try again.'));
						$this -> redirect(array('action' => 'soquestions', $id));
					}
					unset($insert_data);
				}
			}

			$this -> redirect(array('action' => 'soquestions', $id));
		}

		$this -> loadModel('Questionaire');
		$this -> loadModel('IndCodeClass');

		//Union id for Back to Book==========================

		$secQuestions = $this -> Book -> find('all', array('conditions' => array('Book.id' => $id), 'fields' => array('Book.geo_code_union_id')));

		$questionaires = $this -> Questionaire -> find('all', array('conditions' => array('Questionaire.book_id' => $id, 'Questionaire.is_out_of_scope' => 0, 'QuesSixCheck.is_right' => 0, 'QuesSixCheck.right_code' => NULL,
		'OR' => array(
				array('QuesSixCheck.right_code' => NULL),
				array('QuesSixCheck.right_code' => '')
			)
			), 'fields' => array('Questionaire.id', 'Questionaire.q1_geo_code_mauza_name', 'Questionaire.q1_unit_serial_no', 'Questionaire.q6_economy_description', 'Questionaire.q6_ind_code_class_id', 'Book.geo_code_union_id', 'QuesSixCheck.approve_status'), 'order' => array('Questionaire.id' => 'ASC')));

		//pr($questionaires);

		foreach ($questionaires as $key => $value) {
			$inds = $this -> IndCodeClass -> find('all', array('conditions' => array('IndCodeClass.class_code' => $value['Questionaire']['q6_ind_code_class_id'])));

			$questionaires[$key]['Questionaire']['q6_economy_description_orginal'] = $inds[0]['IndCodeClass']['class_code_desc_bng'];
		}
		$this -> set(compact('questionaires', 'id', 'secQuestions'));

	}

	public function getIndCodeClass() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('IndCodeClass');

		$IndCodeSescriptopn = $this -> IndCodeClass -> find('all', array('conditions' => array('IndCodeClass.class_code =' => $_REQUEST['ind_code']), 'fields' => 'IndCodeClass.class_code_desc_bng'));

		echo json_encode($IndCodeSescriptopn);
	}

	//৬ নং প্রশ্নের সংশোধনী অনুমোদন ============================================

	public function approval_upazila() {

		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeDivn');
		$this -> loadModel('GeoCodeZila');
		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel('GeoCodeRmo');
		
		//Division Coordinator
		
		if (in_array(5, $this -> Session -> read('Authake.group_ids')))
		{

			$divn = $this -> GeoCodeDivn -> find('first', array('conditions' => array('GeoCodeDivn.divn_code' => $this -> jd_divn), 'fields' => array('id', 'divn_name')));

			$zilas_name = $divn['GeoCodeDivn']['divn_name'] . " Division";

			$conditions['conditions'][] = array('GeoCodeZila.geo_code_divn_id' => $divn['GeoCodeDivn']['id']);

			$conditions['fields'] = array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name');
			$conditions['order'] = array('GeoCodeUpazila.upzila_name');

			$upazilas = $this -> GeoCodeUpazila -> find('all', $conditions);

		} else if (in_array(4, $this -> Session -> read('Authake.group_ids')))//Supervising Officer
		{
			$zilas = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.zila_code' => $this -> sup_officer_zila), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_name')));

			$zilaId = $zilas[0]['GeoCodeZila']['id'];
			$zilas_name = $zilas[0]['GeoCodeZila']['zila_name'] . " Zila";

			$upazilas = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id' => $zilaId), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name'), 'order' => array('GeoCodeUpazila.upzila_name')));
		}

		$this -> set(compact('zilas_name', 'upazilas'));

	}

	public function approval_unions($id=null) {

		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeZila');
		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel('GeoCodeRmo');
		$this -> loadModel('GeoCodeUnion');
        
       $this -> GeoCodeUpazila ->id = $id;
         if (!$this -> GeoCodeUpazila -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }

		$upazilaName = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.id' => $id)));

		//pr($upazilaName); exit;

		$unionNames = $this -> GeoCodeUnion -> find('all', array('conditions' => array('GeoCodeUnion.geo_code_upazila_id' => $id), 'fields' => array('GeoCodeUnion.id', 'GeoCodeUnion.union_name')));

		//pr($unionNames); exit;

		$this -> set(compact('unionNames', 'upazilaName'));
	}

	public function approval_books($id=null) {
		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeUnion');
		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel('Questionaire');
        
        $this -> GeoCodeUnion ->id = $id;
         if (!$this -> GeoCodeUnion -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }    

		$this -> Book -> unbindModel(array('belongsTo' => array('GeoCodeDivn', 'GeoCodeZila', 'GeoCodeRmo', 'GeoCodePsa')));

		

		$secBooks = $this -> GeoCodeUnion -> find('first', array('conditions' => array('GeoCodeUnion.id' => $id)));

		

		$books = $this -> Book -> find('all', array('conditions' => array('Book.geo_code_union_id' => $id), 'fields' => array('Book.id', 'GeoCodeUpazila.id')));

		foreach ($books as $key => $value) {

			$questionaires = $this -> Questionaire -> find('count', 
			array('conditions' => array('Questionaire.is_out_of_scope' => 0, 'Questionaire.book_id' => $value['Book']['id'],
			'OR' => array(
            array('QuesSixCheck.is_right' => 0, 'QuesSixCheck.right_code <>' => NULL),
                array('QuesSixCheck.is_right' => 1),
            ),
            'AND' => array(
                            'OR' => array(
                                array('QuesSixCheck.approve_status' => 'PENDING'),
                                array('QuesSixCheck.approve_status' => NULL)
                            )
                          )
            ),
			'fields' => array('Questionaire.id')));

			if ($questionaires == 0) {
				$books[$key]['Book']['status'] = 'Checked';
			} else {
				$books[$key]['Book']['status'] = 'Pending';
			}
		}

		$this -> set(compact('books', 'id', 'secBooks'));
	}

	public function approval_questions($id=null) {

		$_SESSION["MenuActive"] = 5;
		$this -> loadModel('QuesSixCheck');
		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeUnion');
		
		$this -> loadModel('Questionaire');
		$this -> loadModel('IndCodeClass');

        $this -> Book ->id = $id;
         if (!$this -> Book -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }		
		
		

		if ($this -> request -> data) {

			foreach ($this->request->data['check_status'] as $key => $status) {

				if ($status != "") {

					if ($status == "APPROVE") {
						
						$IndCode = $this -> QuesSixCheck -> find('all', array('conditions' => array('QuesSixCheck.questionaire_id =' => $key), 'fields' => array('QuesSixCheck.is_right', 'QuesSixCheck.right_code')));
						
						$IndCodeSescriptopn = $this -> IndCodeClass -> find('all', array('conditions' => array('IndCodeClass.class_code =' => $IndCode[0]['QuesSixCheck']['right_code']), 'fields' => 'IndCodeClass.class_code_desc_bng'));
						
						if($IndCode[0]['QuesSixCheck']['is_right'] == 0)
						{
							$this -> Questionaire -> unbindModel(array('belongsTo' => array('Book', 'QuesSixCheck', 'QuesCheck', 'UnitHeadEconomy', 'GeoCodeMauza')));
							
							$Ques_status = $this->Questionaire->updateAll(
							array(
									'Questionaire.q6_ind_code_class_id' => "'".$IndCode[0]['QuesSixCheck']['right_code']."'",  
						            'Questionaire.update_by' => $this -> Session -> read('Authake.id'),
						            'Questionaire.modified' => "'".date("Y-m-d H:i:s")."'"), 
						    array('Questionaire.id' => $key));
							if(!$Ques_status)
							{
								$this -> Session -> setFlash(__('Could not be Saved. Please, try again.'));
								$this -> redirect(array('action' => 'approval_questions', $id));
							}
						}
						
						
						
						
						$insert_data = array('QuesSixCheck' => array('questionaire_id' => $key, 'approve_status' => $status, 'sync_required' => "1", 'modified' => date("Y-m-d H:i:s"), 'approve_by' => $this -> Session -> read('Authake.id')));
					} else {
						$insert_data = array('QuesSixCheck' => array('questionaire_id' => $key, 'approve_status' => $status, 'sync_required' => "1", 'modified' => date("Y-m-d H:i:s"), 'right_code' => NULL, 'update_by' => NULL, 'entry_by' => $this -> Session -> read('Authake.id'), 'is_right' => '0', 'approve_by' => $this -> Session -> read('Authake.id')));
					}

					$this -> QuesSixCheck -> create();

					if ($this -> QuesSixCheck -> saveAll($insert_data)) {
						$this -> Session -> setFlash(__('Checked Successfully.'));
					} else {
						$this -> Session -> setFlash(__('Could not be Saved. Please, try again.'));
						$this -> redirect(array('action' => 'approval_questions', $id));
					}
					unset($insert_data);
				}
			}

			$this -> redirect(array('action' => 'approval_questions', $id));
		}

		

		//Union id for Back to Book================================

		$secQuestions = $this -> Book -> find('all', array('conditions' => array('Book.id' => $id), 'fields' => array('Book.geo_code_union_id')));

		$questionaires = $this -> Questionaire -> find('all', 
		array('conditions' => array('Questionaire.book_id' => $id, 'Questionaire.is_out_of_scope' => 0,
		'OR' => array(
            array('QuesSixCheck.is_right' => 0, 'QuesSixCheck.right_code <>' => NULL),
            array('QuesSixCheck.is_right' => 1),
        ),
        'AND' => array(
                        'OR' => array(
                            array('QuesSixCheck.approve_status' => 'PENDING'),
                            array('QuesSixCheck.approve_status' => NULL)
                        )
                      )
        ), 
		'fields' => array('Questionaire.id', 'Questionaire.q1_geo_code_mauza_name', 'Questionaire.q1_unit_serial_no', 'Questionaire.q6_economy_description', 'Questionaire.q6_ind_code_class_id', 'Book.geo_code_union_id', 'QuesSixCheck.right_code', 'QuesSixCheck.is_right'), 'order' => array('Questionaire.id' => 'ASC')));

	

		foreach ($questionaires as $key => $value) {
			$inds = $this -> IndCodeClass -> find('all', array('conditions' => array('IndCodeClass.class_code' => $value['Questionaire']['q6_ind_code_class_id'])));

			$questionaires[$key]['Questionaire']['q6_economy_description_orginal'] = $inds[0]['IndCodeClass']['class_code_desc_bng'];

			$inds = $this -> IndCodeClass -> find('all', array('conditions' => array('IndCodeClass.class_code' => $value['QuesSixCheck']['right_code'])));

			$questionaires[$key]['Questionaire']['q6_economy_description_of_right_code'] = $inds[0]['IndCodeClass']['class_code_desc_bng'];
		}
		$this -> set(compact('questionaires', 'id', 'secQuestions'));

	}


/*  ====================OUT OF SCOPE FUNCTIONS========================= */
/********************************************************************* */
    public function q6upazila_outofscope() {

        $_SESSION["MenuActive"] = 5;
        $this -> loadModel('Book');
        $this -> loadModel('GeoCodeDivn');
        $this -> loadModel('GeoCodeZila');
        $this -> loadModel('GeoCodeUpazila');
        $this -> loadModel('GeoCodeRmo');

        if (in_array(5, $this -> Session -> read('Authake.group_ids')))//Division Coordinator
        {

            $divn = $this -> GeoCodeDivn -> find('first', array('conditions' => array('GeoCodeDivn.divn_code' => $this -> jd_divn), 'fields' => array('id', 'divn_name')));

            $zilas_name = $divn['GeoCodeDivn']['divn_name'] . " Division";

            $conditions['conditions'][] = array('GeoCodeZila.geo_code_divn_id' => $divn['GeoCodeDivn']['id']);

            $conditions['fields'] = array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name');
            $conditions['order'] = array('GeoCodeUpazila.upzila_name');

            $upazilas = $this -> GeoCodeUpazila -> find('all', $conditions);

        } else if (in_array(4, $this -> Session -> read('Authake.group_ids')))//Supervising Officer
        {
            $zilas = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.zila_code' => $this -> sup_officer_zila), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_name')));

            $zilaId = $zilas[0]['GeoCodeZila']['id'];
            $zilas_name = $zilas[0]['GeoCodeZila']['zila_name'] . " Zila";

            $upazilas = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id' => $zilaId), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name'), 'order' => array('GeoCodeUpazila.upzila_name')));
        } else if (in_array(3, $this -> Session -> read('Authake.group_ids')))//Supervisor
        {
            $zilas = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.zila_code' => $this -> supervisor_zila), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_name')));

            $zilaId = $zilas[0]['GeoCodeZila']['id'];
            $zilas_name = $zilas[0]['GeoCodeZila']['zila_name'] . " Zila";

            $upazilas = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id' => $zilaId, 'GeoCodeUpazila.upzila_code' => $this -> supervisor_upazila), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name'), 'order' => array('GeoCodeUpazila.upzila_name')));
        }

        $this -> set(compact('zilas_name', 'upazilas'));
    }

//৬ নং প্রশ্নের সংশোধনী ===========================================================

    public function soupazila_outofscope() {

        $_SESSION["MenuActive"] = 5;
        $this -> loadModel('Book');
        $this -> loadModel('GeoCodeDivn');
        $this -> loadModel('GeoCodeZila');
        $this -> loadModel('GeoCodeUpazila');
        $this -> loadModel('GeoCodeRmo');

        if (in_array(5, $this -> Session -> read('Authake.group_ids')))//Division Coordinator
        {

            $divn = $this -> GeoCodeDivn -> find('first', array('conditions' => array('GeoCodeDivn.divn_code' => $this -> jd_divn), 'fields' => array('id', 'divn_name')));

            $zilas_name = $divn['GeoCodeDivn']['divn_name'] . " Division";

            $conditions['conditions'][] = array('GeoCodeZila.geo_code_divn_id' => $divn['GeoCodeDivn']['id']);

            $conditions['fields'] = array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name');
            $conditions['order'] = array('GeoCodeUpazila.upzila_name');

            $upazilas = $this -> GeoCodeUpazila -> find('all', $conditions);

        } else if (in_array(4, $this -> Session -> read('Authake.group_ids')))//Supervising Officer
        {
            $zilas = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.zila_code' => $this -> sup_officer_zila), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_name')));

            $zilaId = $zilas[0]['GeoCodeZila']['id'];
            $zilas_name = $zilas[0]['GeoCodeZila']['zila_name'] . " Zila";

            $upazilas = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id' => $zilaId), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name'), 'order' => array('GeoCodeUpazila.upzila_name')));
        } else if (in_array(3, $this -> Session -> read('Authake.group_ids')))//Supervisor
        {
            $zilas = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.zila_code' => $this -> sup_officer_zila), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_name')));

            $zilaId = $zilas[0]['GeoCodeZila']['id'];
            $zilas_name = $zilas[0]['GeoCodeZila']['zila_name'] . " Zila";

            $upazilas = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id' => $zilaId, 'GeoCodeUpazila.upzila_code' => $this -> supervisor_upazila), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name'), 'order' => array('GeoCodeUpazila.upzila_name')));
        }

        $this -> set(compact('zilas_name', 'upazilas'));
    }

//৬ নং প্রশ্নের সংশোধনী অনুমোদন ============================================

    public function approval_upazila_outofscope() {

        $_SESSION["MenuActive"] = 5;
        $this -> loadModel('Book');
        $this -> loadModel('GeoCodeDivn');
        $this -> loadModel('GeoCodeZila');
        $this -> loadModel('GeoCodeUpazila');
        $this -> loadModel('GeoCodeRmo');
        
        //Division Coordinator
        
        if (in_array(5, $this -> Session -> read('Authake.group_ids')))
        {

            $divn = $this -> GeoCodeDivn -> find('first', array('conditions' => array('GeoCodeDivn.divn_code' => $this -> jd_divn), 'fields' => array('id', 'divn_name')));

            $zilas_name = $divn['GeoCodeDivn']['divn_name'] . " Division";

            $conditions['conditions'][] = array('GeoCodeZila.geo_code_divn_id' => $divn['GeoCodeDivn']['id']);

            $conditions['fields'] = array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name');
            $conditions['order'] = array('GeoCodeUpazila.upzila_name');

            $upazilas = $this -> GeoCodeUpazila -> find('all', $conditions);

        } else if (in_array(4, $this -> Session -> read('Authake.group_ids')))//Supervising Officer
        {
            $zilas = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.zila_code' => $this -> sup_officer_zila), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_name')));

            $zilaId = $zilas[0]['GeoCodeZila']['id'];
            $zilas_name = $zilas[0]['GeoCodeZila']['zila_name'] . " Zila";

            $upazilas = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id' => $zilaId), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name'), 'order' => array('GeoCodeUpazila.upzila_name')));
        }

        $this -> set(compact('zilas_name', 'upazilas'));

    }
/*Cycle one  out of scope Question 6 Checks */
    public function unitname_outofscope($upazilaID) {
        $_SESSION["MenuActive"] = 5;
        $this -> loadModel('Book');
        $this -> loadModel('GeoCodeZila');
        $this -> loadModel('GeoCodeUpazila');
        $this -> loadModel('GeoCodeRmo');
        $this -> loadModel('GeoCodeUnion');
        
        $upazilaID = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.id' => $upazilaID), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name')));

        $upazilaName = $upazilaID[0]['GeoCodeUpazila']['upzila_name'];
        $upazilaID = $upazilaID[0]['GeoCodeUpazila']['id'];

        $unionNames = $this -> GeoCodeUnion -> find('all', array('conditions' => array('GeoCodeUnion.geo_code_upazila_id' => $upazilaID)));

        $this -> set(compact('unionNames', 'upazilaName', 'upazilaID'));

    }

    public function books_outofscope($id, $upazilaID) {
        $_SESSION["MenuActive"] = 5;
        $this -> loadModel('Book');
        $this -> loadModel('Questionaire');

        $this -> Book -> unbindModel(array('belongsTo' => array('GeoCodeDivn', 'GeoCodeZila', 'GeoCodeUpazila', 'GeoCodeRmo', 'GeoCodePsa', 'GeoCodeUnion')));
        $books = $this -> Book -> find('all', array('conditions' => array('Book.geo_code_union_id' => $id), 'fields' => 'Book.id'));

        foreach ($books as $key => $value) {

            $questionaires = $this -> Questionaire -> find('count', array('conditions' => array('Questionaire.is_out_of_scope' => 1,'Questionaire.q6_ind_code_class_id <>' =>NULL, 'QuesSixCheck.entry_by' => NULL, 'Questionaire.book_id' => $value['Book']['id']), 'fields' => array('Questionaire.id', 'Questionaire.q1_geo_code_mauza_name', 'Questionaire.q1_unit_serial_no', 'Questionaire.q6_economy_description', 'Questionaire.q6_ind_code_class_id')));
            if ($questionaires == 0) {
                $books[$key]['Book']['status'] = 'Checked';
            } else {
                $books[$key]['Book']['status'] = 'Pending';
            }

        }

        $this -> set(compact('books', 'id', 'upazilaID'));
    }
    public function questions_outofscope($id) {
        $_SESSION["MenuActive"] = 5;
        $this -> loadModel('QuesSixCheck');
        $this -> loadModel('Book');
        $this -> loadModel('Questionaire');
        $this -> loadModel('IndCodeClass');

        if ($this -> request -> data) {

            foreach ($this->request->data['qusID'] as $key => $qusID) {

                if ($this -> request -> data['check_status'][$key] != "") {
                    if ($this -> request -> data['check_status'][$key] == "Right")
                        $this -> request -> data['check_status'][$key] = 1;
                    else if ($this -> request -> data['check_status'][$key] == "Wrong")
                        $this -> request -> data['check_status'][$key] = 0;

                    $insert_data = array('QuesSixCheck' => array('questionaire_id' => $qusID, 'is_right' => $this -> request -> data['check_status'][$key], 'sync_required' => "1", 'created' => date("Y-m-d H:i:s"), 'entry_by' => $this -> Session -> read('Authake.id')));

                    $this -> QuesSixCheck -> create();
                    if ($this -> QuesSixCheck -> saveAll($insert_data)) {
                        $this -> Session -> setFlash(__('Question No. 6 has been checked successfully.'));
                    } else {
                        $this -> Session -> setFlash(__('Data could not be saved. Please, try again.'));
                        $this -> redirect(array('action' => 'questions', $id));
                    }
                    unset($insert_data);
                }
            }
            $this -> redirect(array('action' => 'questions', $id));
        }

        $questionaires = $this -> Questionaire -> find('all', array('conditions' => array('Questionaire.book_id' => $id, 'Questionaire.is_out_of_scope' => 1,'Questionaire.q6_ind_code_class_id <>' =>NULL, 'QuesSixCheck.entry_by' => NULL), 'fields' => array('Questionaire.id', 'Questionaire.q1_geo_code_mauza_name', 'Questionaire.q1_unit_serial_no', 'Questionaire.q6_economy_description', 'Questionaire.q6_ind_code_class_id', 'Book.geo_code_union_id')));

        //pr($questionaires);

        foreach ($questionaires as $key => $value) {
            $inds = $this -> IndCodeClass -> find('all', array('conditions' => array('class_code' => $value['Questionaire']['q6_ind_code_class_id'])));

            $questionaires[$key]['Questionaire']['q6_economy_description_orginal'] = $inds[0]['IndCodeClass']['class_code_desc_bng'];
        }

        $book = $this -> Book -> find('all', array('conditions' => array('Book.id' => $id), 'fields' => array('Book.geo_code_union_id', 'Book.geo_code_upazila_id')));
        $book = $book[0]['Book'];

        $this -> set(compact('questionaires', 'id', 'book'));
    }

    public function print_q6_outofscope($bookID) {
        $this -> layout = 'print';
        $this -> loadModel('Questionaire');
        $this -> loadModel('IndCodeClass');
        $questionaires = $this -> Questionaire -> find('all', array(
        'conditions' => array('Questionaire.book_id' => $bookID,
                             'Questionaire.is_out_of_scope' => 1,
                             'Questionaire.q6_ind_code_class_id <>' =>NULL), 
        'fields' => array('Questionaire.id', 'Questionaire.q1_geo_code_mauza_name', 'Questionaire.q1_unit_serial_no', 'Questionaire.q6_economy_description', 'Questionaire.q6_ind_code_class_id', 'QuesSixCheck.is_right')));

        foreach ($questionaires as $key => $value) {
            $inds = $this -> IndCodeClass -> find('all', array('conditions' => array('IndCodeClass.class_code' => $value['Questionaire']['q6_ind_code_class_id'])));
            $questionaires[$key]['Questionaire']['q6_economy_description_orginal'] = $inds[0]['IndCodeClass']['class_code_desc_bng'];
        }
        $this -> set(compact('questionaires', 'id'));
    }

/*
 * Cycle Two  out of scope Question 6 Checks
 * 
 */
public function sounions_outofscope($id) {
        $_SESSION["MenuActive"] = 5;
        $this -> loadModel('Book');
        $this -> loadModel('GeoCodeZila');
        $this -> loadModel('GeoCodeUpazila');
        $this -> loadModel('GeoCodeRmo');
        $this -> loadModel('GeoCodeUnion');

        $upazilaName = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.id' => $id)));

        //pr($upazilaName); exit;

        $unionNames = $this -> GeoCodeUnion -> find('all', array('conditions' => array('GeoCodeUnion.geo_code_upazila_id' => $id), 'fields' => array('GeoCodeUnion.id', 'GeoCodeUnion.union_name')));

        //pr($unionNames); exit;

        $this -> set(compact('unionNames', 'upazilaName'));
    }

    public function sobooks_outofscope($id) {
        $_SESSION["MenuActive"] = 5;
        $this -> loadModel('Book');
        $this -> loadModel('GeoCodeUnion');
        $this -> loadModel('GeoCodeUpazila');
        $this -> loadModel('Questionaire');

        $this -> Book -> unbindModel(array('belongsTo' => array('GeoCodeDivn', 'GeoCodeZila', 'GeoCodeRmo', 'GeoCodePsa')));

        $secBooks = $this -> GeoCodeUnion -> find('first', array('conditions' => array('GeoCodeUnion.id' => $id)));

        //pr($secBooks); exit;

        $books = $this -> Book -> find('all', array('conditions' => array('Book.geo_code_union_id' => $id), 'fields' => array('Book.id', 'GeoCodeUpazila.id')));

        foreach ($books as $key => $value) {

            $questionaires = $this -> Questionaire -> find('count', array('conditions' => array('Questionaire.is_out_of_scope' => 1,'Questionaire.q6_ind_code_class_id <>' =>NULL, 'QuesSixCheck.right_code' => NULL, 'QuesSixCheck.is_right <>' => 1, 'Questionaire.book_id' => $value['Book']['id']), 'fields' => array('Questionaire.id', 'Questionaire.q1_geo_code_mauza_name', 'Questionaire.q1_unit_serial_no', 'Questionaire.q6_economy_description', 'Questionaire.q6_ind_code_class_id')));

            //pr($questionaires); exit;

            if ($questionaires == 0) {
                $books[$key]['Book']['status'] = 'Checked';
            } else {
                $books[$key]['Book']['status'] = 'Pending';
            }
        }

        $this -> set(compact('books', 'id', 'secBooks'));
    }

    public function soquestions_outofscope($id=null) {

        $_SESSION["MenuActive"] = 5;
        $this -> loadModel('QuesSixCheck');
        $this -> loadModel('Book');
        $this -> loadModel('GeoCodeUnion');


        
        $this -> Book ->id = $id;
         if (!$this -> Book -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }

        if ($this -> request -> data) {

            foreach ($this->request->data['right_code'] as $key => $right_code) {

                if ($right_code != "") {

                    $insert_data = array('QuesSixCheck' => array('questionaire_id' => $key, 'right_code' => $right_code, 'sync_required' => "1", 'modified' => date("Y-m-d H:i:s"), 'update_by' => $this -> Session -> read('Authake.id')));

                    $this -> QuesSixCheck -> create();

                    if ($this -> QuesSixCheck -> saveAll($insert_data)) {
                        $this -> Session -> setFlash(__('Right Code has been inserted  Successfully.'));
                    } else {
                        $this -> Session -> setFlash(__('Could not be Saved. Please, try again.'));
                        $this -> redirect(array('action' => 'soquestions', $id));
                    }
                    unset($insert_data);
                }
            }

            $this -> redirect(array('action' => 'soquestions', $id));
        }

        $this -> loadModel('Questionaire');
        $this -> loadModel('IndCodeClass');

        //Union id for Back to Book==========================

        $secQuestions = $this -> Book -> find('all', array('conditions' => array('Book.id' => $id), 'fields' => array('Book.geo_code_union_id')));

        $questionaires = $this -> Questionaire -> find('all', array('conditions' => array('Questionaire.book_id' => $id, 'Questionaire.is_out_of_scope' => 1,'Questionaire.q6_ind_code_class_id <>' =>NULL, 'QuesSixCheck.is_right' => 0, 'QuesSixCheck.right_code' => NULL, 'QuesSixCheck.is_right <>' => 1), 'fields' => array('Questionaire.id', 'Questionaire.q1_geo_code_mauza_name', 'Questionaire.q1_unit_serial_no', 'Questionaire.q6_economy_description', 'Questionaire.q6_ind_code_class_id', 'Book.geo_code_union_id')));

        //pr($questionaires);

        foreach ($questionaires as $key => $value) {
            $inds = $this -> IndCodeClass -> find('all', array('conditions' => array('IndCodeClass.class_code' => $value['Questionaire']['q6_ind_code_class_id'])));

            $questionaires[$key]['Questionaire']['q6_economy_description_orginal'] = $inds[0]['IndCodeClass']['class_code_desc_bng'];
        }
        $this -> set(compact('questionaires', 'id', 'secQuestions'));

    }

/********************************************
 * Cycle three of ques 6 . approval
 ********************************************/

    public function approval_unions_outofscope($id=null) {

        $_SESSION["MenuActive"] = 5;
        $this -> loadModel('Book');
        $this -> loadModel('GeoCodeZila');
        $this -> loadModel('GeoCodeUpazila');
        $this -> loadModel('GeoCodeRmo');
        $this -> loadModel('GeoCodeUnion');
        
       $this -> GeoCodeUpazila ->id = $id;
         if (!$this -> GeoCodeUpazila -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }

        $upazilaName = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.id' => $id)));

        //pr($upazilaName); exit;

        $unionNames = $this -> GeoCodeUnion -> find('all', array('conditions' => array('GeoCodeUnion.geo_code_upazila_id' => $id), 'fields' => array('GeoCodeUnion.id', 'GeoCodeUnion.union_name')));

        //pr($unionNames); exit;

        $this -> set(compact('unionNames', 'upazilaName'));
    }

    public function approval_books_outofscope($id=null) {
        $_SESSION["MenuActive"] = 5;
        $this -> loadModel('Book');
        $this -> loadModel('GeoCodeUnion');
        $this -> loadModel('GeoCodeUpazila');
        $this -> loadModel('Questionaire');

        $this -> GeoCodeUnion ->id = $id;
         if (!$this -> GeoCodeUnion -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }  
         
         
        $this -> Book -> unbindModel(array('belongsTo' => array('GeoCodeDivn', 'GeoCodeZila', 'GeoCodeRmo', 'GeoCodePsa')));

        //$books = $this->Book->find('all', array('conditions'=> array('Book.geo_code_union_id' => $id), 'fields' => 'Book.id'));

        //pr($id);

        $secBooks = $this -> GeoCodeUnion -> find('first', array('conditions' => array('GeoCodeUnion.id' => $id)));

        //pr($secBooks); exit;

        $books = $this -> Book -> find('all', array('conditions' => array('Book.geo_code_union_id' => $id), 'fields' => array('Book.id', 'GeoCodeUpazila.id')));

        foreach ($books as $key => $value) {

            $questionaires = $this -> Questionaire -> find('count', array('conditions' => array('Questionaire.is_out_of_scope' => 1,'Questionaire.q6_ind_code_class_id <>' =>NULL, 'QuesSixCheck.approve_status' => 'PENDING', 'Questionaire.book_id' => $value['Book']['id']), 'fields' => array('Questionaire.id', 'Questionaire.q1_geo_code_mauza_name', 'Questionaire.q1_unit_serial_no', 'Questionaire.q6_economy_description', 'Questionaire.q6_ind_code_class_id')));

            if ($questionaires == 0) {
                $books[$key]['Book']['status'] = 'Checked';
            } else {
                $books[$key]['Book']['status'] = 'Pending';
            }
        }

        $this -> set(compact('books', 'id', 'secBooks'));
    }

    public function approval_questions_outofscope($id=null) {

        $_SESSION["MenuActive"] = 5;
        $this -> loadModel('QuesSixCheck');
        $this -> loadModel('Book');
        $this -> loadModel('GeoCodeUnion');
		$this -> loadModel('Questionaire');
        $this -> loadModel('IndCodeClass');


        $this -> Book ->id = $id;
         if (!$this -> Book -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }       
        
        if ($this -> request -> data) {

            foreach ($this->request->data['check_status'] as $key => $status) {

                if ($status != "") {

                    if ($status == "APPROVE") {
                    	
						
						$IndCode = $this -> QuesSixCheck -> find('all', array('conditions' => array('QuesSixCheck.questionaire_id =' => $key), 'fields' => array('QuesSixCheck.is_right', 'QuesSixCheck.right_code')));
						
						$IndCodeSescriptopn = $this -> IndCodeClass -> find('all', array('conditions' => array('IndCodeClass.class_code =' => $IndCode[0]['QuesSixCheck']['right_code']), 'fields' => 'IndCodeClass.class_code_desc_bng'));
						
						if($IndCode[0]['QuesSixCheck']['is_right'] == 0)
						{
							$this -> Questionaire -> unbindModel(array('belongsTo' => array('Book', 'QuesSixCheck', 'QuesCheck', 'UnitHeadEconomy', 'GeoCodeMauza')));
							
							$Ques_status = $this->Questionaire->updateAll(
							array(
									'Questionaire.q6_ind_code_class_id' => "'".$IndCode[0]['QuesSixCheck']['right_code']."'", 
									'Questionaire.q6_economy_description' => "'".$IndCodeSescriptopn[0]['IndCodeClass']['class_code_desc_bng']."'", 
						            'Questionaire.update_by' => $this -> Session -> read('Authake.id'),
						            'Questionaire.modified' => "'".date("Y-m-d H:i:s")."'"), 
						    array('Questionaire.id' => $key));
							if(!$Ques_status)
							{
								$this -> Session -> setFlash(__('Could not be Saved. Please, try again.'));
								$this -> redirect(array('action' => 'approval_questions', $id));
							}
						}
						
						
						
                        $insert_data = array('QuesSixCheck' => array('questionaire_id' => $key, 'approve_status' => $status, 'sync_required' => "1", 'modified' => date("Y-m-d H:i:s"), 'approve_by' => $this -> Session -> read('Authake.id')));
                    } else {
                        $insert_data = array('QuesSixCheck' => array('questionaire_id' => $key, 'approve_status' => $status, 'sync_required' => "1", 'modified' => date("Y-m-d H:i:s"), 'right_code' => NULL, 'update_by' => NULL, 'entry_by' => NULL, 'is_right' => NULL, 'approve_by' => $this -> Session -> read('Authake.id')));
                    }

                    $this -> QuesSixCheck -> create();

                    if ($this -> QuesSixCheck -> saveAll($insert_data)) {
                        $this -> Session -> setFlash(__('Checked Successfully.'));
                    } else {
                        $this -> Session -> setFlash(__('Could not be Saved. Please, try again.'));
                        $this -> redirect(array('action' => 'approval_questions', $id));
                    }
                    unset($insert_data);
                }
            }

            $this -> redirect(array('action' => 'approval_questions', $id));
        }

        

        //Union id for Back to Book================================

        $secQuestions = $this -> Book -> find('all', array('conditions' => array('Book.id' => $id), 'fields' => array('Book.geo_code_union_id')));

        $questionaires = $this -> Questionaire -> find('all', array('conditions' => array('Questionaire.book_id' => $id, 'Questionaire.is_out_of_scope' => 1,'Questionaire.q6_ind_code_class_id <>' =>NULL, 'QuesSixCheck.approve_status' => 'PENDING'), 'fields' => array('Questionaire.id', 'Questionaire.q1_geo_code_mauza_name', 'Questionaire.q1_unit_serial_no', 'Questionaire.q6_economy_description', 'Questionaire.q6_ind_code_class_id', 'Book.geo_code_union_id', 'QuesSixCheck.right_code', 'QuesSixCheck.is_right')));

        //pr($questionaires);

        foreach ($questionaires as $key => $value) {
            $inds = $this -> IndCodeClass -> find('all', array('conditions' => array('IndCodeClass.class_code' => $value['Questionaire']['q6_ind_code_class_id'])));

            $questionaires[$key]['Questionaire']['q6_economy_description_orginal'] = $inds[0]['IndCodeClass']['class_code_desc_bng'];

            $inds = $this -> IndCodeClass -> find('all', array('conditions' => array('IndCodeClass.class_code' => $value['QuesSixCheck']['right_code'])));

            $questionaires[$key]['Questionaire']['q6_economy_description_of_right_code'] = $inds[0]['IndCodeClass']['class_code_desc_bng'];
        }
        $this -> set(compact('questionaires', 'id', 'secQuestions'));

    }



}
