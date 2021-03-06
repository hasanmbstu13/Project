<?php
App::uses('AppController', 'Controller');
/**
 * Questionaires Controller
 *
 * @property Questionaire $Questionaire
 */
class QuestionairesController extends AppController {

	/**
	 * index method
	 * 
	 * @return void
	 */
	// public function index2() {
		// $this -> set('title_for_layout', 'Questionaires');
		// $this -> Questionaire -> recursive = 1;
		// $this -> set('questionaires', $this -> paginate());
	// }

    public function index() {
    	$this->loadModel('Book');
        $this -> set('title_for_layout', 'Questionaires');
        
		if ($this -> request -> is('post') && $this -> request ->data['Questionaire']['book_id'] != "") {
			
		$this -> paginate = array(
		'fields' => array('Questionaire.book_id', 'Questionaire.q1_geo_code_mauza_name', 'Questionaire.q1_unit_serial_no', 'Questionaire.q2_unit_name', 'Questionaire.q2_village_maholla', 'Questionaire.id'),
        'limit' => 200, // this was the option which you forgot to mention
        'conditions' => array('Questionaire.entry_by' => $this -> Session -> read('Authake.id'), 'Questionaire.book_id' => $this -> request ->data['Questionaire']['book_id']),
        'order' => array('Questionaire.id' => 'ASC'));
        $this -> set('questionaires', $this -> paginate());
			
		}
		else {
		 $this -> paginate = array(
		 'fields' => array('Questionaire.book_id', 'Questionaire.q1_geo_code_mauza_name', 'Questionaire.q1_unit_serial_no', 'Questionaire.q2_unit_name', 'Questionaire.q2_village_maholla', 'Questionaire.id'),
        'limit' => 50, // this was the option which you forgot to mention
        'conditions' => array('Questionaire.entry_by' => $this -> Session -> read('Authake.id')), 
        'order' => array('Questionaire.id' => 'ASC'));
        $this -> set('questionaires', $this -> paginate());
		}
		
		$Books = array('' => '');
		
		$Books[] = $this -> Book -> find('list', array(
        'conditions' => array(
        'Book.entry_by' => $this -> Session -> read('Authake.id'))));
		$this -> set(compact('Books'));
    }

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	// public function view($id = null) {
		// $this -> Questionaire -> id = $id;
		// if (!$this -> Questionaire -> exists()) {
			// throw new NotFoundException(__('Invalid questionaire'));
		// }
		// $this -> set('questionaire', $this -> Questionaire -> read(null, $id));
	// }

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add($bookID = null) {

		$this -> layout = 'table';
		$_SESSION["MenuActive"] = 2;
		$_SESSION["bookID"] = $bookID;

		// Set Session for Village
		$this -> loadModel('UnitHeadEducation');
		$this -> loadModel('IndCodeDivn');
		$this -> loadModel('IndCodeClass');
		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeMauza');
		$this -> loadModel('GeoCodeRmo');
		
		if(!$this->Session->check('q1_geo_code_mauza_id'))
		{
			$this->Session->write('q1_geo_code_mauza_id', "");
			$this->Session->write('q1_geo_code_mauza_name', "");
			$this->Session->write('village_options', array());
		}
		

		if ($this -> request -> is('post')) {
		    
 //Grabbing input fields for validation            
$q1=$this -> request ->data['Questionaire']['q1_geo_code_mauza_id'];
$q1_1=$this -> request ->data['Questionaire']['q1_unit_serial_no'];
$q2_1=$this -> request ->data['Questionaire']['q2_unit_name'];
$q2_2=$this -> request ->data['Questionaire']['q2_village_maholla'];
$q3_1=$this -> request ->data['Questionaire']['q3_unit_head_gender'];
$q3_2=$this -> request ->data['Questionaire']['q3_unit_head_education_id'];
$q3_3=$this -> request ->data['Questionaire']['q3_unit_head_age'];
$q6_1=$this -> request ->data['Questionaire']['q6_economy_description'];
$q6_2=$this -> request ->data['Questionaire']['q6_economy_id'];
$q12=$this -> request ->data['Questionaire']['q12_year_of_start'];
$q13=$this -> request ->data['Questionaire']['q13_sale_procedure'];
$q14=$this -> request ->data['Questionaire']['q14_is_accountable'];
$q15_1=$this -> request ->data['Questionaire']['q15_salary_instr'];
$q15_2=$this -> request ->data['Questionaire']['q15_salary_period'];
$q16=$this -> request ->data['Questionaire']['q16_fixed_capital'];
$q25=$this -> request ->data['Questionaire']['q25_is_tin_registered'];
$q26=$this -> request ->data['Questionaire']['q26_is_vat_registered'];
// calling the validation function
$this->qus_validation($q1, $q1_1, $q2_1, $q2_2, $q3_1, $q3_2, $q3_3, $q6_1, $q6_2, $q12, $q13, $q14, $q15_1, $q15_2, $q16, $q25, $q26);
// End of function
//***************************************************************
			
			$this->Session->write('q1_geo_code_mauza_id', $this -> request -> data['Questionaire']['q1_geo_code_mauza_id']);
			$this->Session->write('q1_geo_code_mauza_name', $this -> request -> data['Questionaire']['q1_geo_code_mauza_name']);
			
			$village = $this -> Session -> read('village_options');
			
			if(empty($village))
			{
				$options[$this -> request -> data['Questionaire']['q2_village_maholla']] = $this -> request -> data['Questionaire']['q2_village_maholla'];
				$this->Session->write('village_options', $options);
			}
		
//*****************************************************************
// SECTION 2 Lower to uper case
			$this -> request -> data['Questionaire']['q2_unit_name'] = strtoupper($this -> request -> data['Questionaire']['q2_unit_name']);

			$this -> request -> data['Questionaire']['q2_village_maholla'] = strtoupper($this -> request -> data['Questionaire']['q2_village_maholla']);
			$this -> request -> data['Questionaire']['q2_home_market'] = strtoupper($this -> request -> data['Questionaire']['q2_home_market']);
			$this -> request -> data['Questionaire']['q2_road_no_name'] = strtoupper($this -> request -> data['Questionaire']['q2_road_no_name']);
			$this -> request -> data['Questionaire']['q2_holding_no'] = strtoupper($this -> request -> data['Questionaire']['q2_holding_no']);
// End of Lower to upper
//*******************************************************************
$this -> request -> data['Questionaire']['rmo_code'] = $this -> request -> data['Questionaire']['rmo_code2'];
$this -> request -> data['Questionaire']['id'] = $this -> request -> data['Questionaire']['book_id'] . str_pad($this -> request -> data['Questionaire']['q1_unit_serial_no'], 3, "0", STR_PAD_LEFT);

$this -> request -> data['Questionaire']['q3_unit_head_education_id'] = $this -> UnitHeadEducation -> getUnitHeadEducationID($this -> request -> data['Questionaire']['q3_unit_head_education_id']);


$this -> request -> data['Questionaire']['q6_ind_code_class_id'] = $this -> request -> data['Questionaire']['q6_economy_id'];
$Books = $this -> Book -> find('all', array(
        'conditions' => array(
        'Book.id =' => $this -> request -> data['Questionaire']['book_id']), 
        'fields' => array('Book.geo_code_union_id','Book.geo_code_rmo_id', 'Book.growth_centre')));

$union_id = $Books[0]['Book']['geo_code_union_id'];
//$rmo_id = $Books[0]['Book']['geo_code_rmo_id'];
$rmo_id = $this -> GeoCodeRmo -> getRmoID($this -> request -> data['Questionaire']['rmo_code2']);

$growth_centre = $Books[0]['Book']['growth_centre'];
if($growth_centre == 1 && $this -> request -> data['Questionaire']['rmo_code2'] == 7)
{
	$Muzas = $this -> GeoCodeMauza -> find('all', array('conditions' => array(
            'GeoCodeMauza.geo_code_union_id =' => $union_id, 
            'GeoCodeMauza.mauza_code' => $this -> request -> data['Questionaire']['q1_geo_code_mauza_id']), 
            'fields' => array('GeoCodeMauza.id')));
}
else 
{
	$Muzas = $this -> GeoCodeMauza -> find('all', array('conditions' => array(
            'GeoCodeMauza.geo_code_union_id =' => $union_id, 
            /*'GeoCodeMauza.geo_code_rmo_id =' => $rmo_id, */
            'GeoCodeMauza.mauza_code' => $this -> request -> data['Questionaire']['q1_geo_code_mauza_id']), 
            'fields' => array('GeoCodeMauza.id')));
}


$this -> request -> data['Questionaire']['q1_geo_code_mauza_id'] = $Muzas[0]['GeoCodeMauza']['id'];

if($this -> request -> data['Questionaire']['q1_geo_code_mauza_id'] == "")
$msg = " Wrong mauza code. ";

//END OF CONVERT CODE TO ID==================================================

// Adding who and when add this data
$this -> request -> data['Questionaire']['entry_by'] = $this -> Session -> read('Authake.id');
$this -> request -> data['Questionaire']['created'] = date("Y-m-d H:i:s");
$this -> request -> data['Questionaire']['modified'] = date("Y-m-d H:i:s");
			
$this -> Questionaire -> create();

			if ($this -> Questionaire -> save($this -> request -> data)) {

				$this -> clear_cache();

				$this -> Session -> setFlash(__('The questionnaire has been saved'));
				//$this->redirect(array('action' => 'index'));
				$this -> redirect(array('controller' => 'Questionaires', 'action' => 'add', $_SESSION["bookID"]));
			} else {
				$this -> clear_cache();

				$this -> Session -> setFlash(__($msg . ' The questionnaire could not be saved. Please, try again.'));
				$_SESSION['q_error'] = $msg . " The questionnaire could not be saved. Please, try again.";
				$this -> redirect(array('controller' => 'Questionaires', 'action' => 'add', $_SESSION["bookID"]));
			}
		}

		if ($_SESSION["bookID"] == null) {
			//SESSION RESET
			$this -> clear_cache();

			$this -> redirect(array('controller' => 'Books', 'action' => 'add'));
		}

		//$UnitHeadEducations = $this -> UnitHeadEducation -> find('list');
		$this -> Book -> unbindModel(array('belongsTo' => array('GeoCodeDivn', 'GeoCodeZila', 'GeoCodeUpazila', 'GeoCodePsa', 'GeoCodeUnion')));
		
		$books = $this -> Book -> find('all', array('conditions' => array('Book.id' => $bookID)));
		$books = $books[0];
		$this -> set(compact('books'));
		//$books = $this->Questionaire->Book->find('list');
		//$this -> set(compact('books', 'UnitHeadEducations'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	// public function edit($id = null) {
		// $this -> Questionaire -> id = $id;
		// if (!$this -> Questionaire -> exists()) {
			// throw new NotFoundException(__('Invalid questionaire'));
		// }
		// if ($this -> request -> is('post') || $this -> request -> is('put')) {
			// if ($this -> Questionaire -> save($this -> request -> data)) {
				// $this -> Session -> setFlash(__('The questionnaire has been saved'));
				// $this -> redirect(array('action' => 'index'));
			// } else {
				// $this -> Session -> setFlash(__('The questionnaire could not be saved. Please, try again.'));
			// }
		// } else {
			// $this -> request -> data = $this -> Questionaire -> read(null, $id);
		// }
		// $books = $this -> Questionaire -> Book -> find('list');
		// $this -> set(compact('books'));
	// }

	/**
	 * delete method
	 *
	 * @throws MethodNotAllowedException
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	// public function delete($id = null) {
		// if (!$this -> request -> is('post')) {
			// throw new MethodNotAllowedException();
		// }
		// $this -> Questionaire -> id = $id;
		// if (!$this -> Questionaire -> exists()) {
			// throw new NotFoundException(__('Invalid questionnaire'));
		// }
		// if ($this -> Questionaire -> delete()) {
			// $this -> Session -> setFlash(__('Questionnaire deleted'));
			// $this -> redirect(array('action' => 'index'));
		// }
		// $this -> Session -> setFlash(__('Questionnaire was not deleted'));
		// $this -> redirect(array('action' => 'index'));
	// }
/**********AJAX REQUESTS****************************/

	// Get Mauza name in section :1
	public function getMuzaName() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeMauza');
		$this -> loadModel('GeoCodeRmo');
		

		$Books = $this -> Book -> find('all', array('conditions' => array('Book.id =' => $_POST['book_id']), 'fields' => array('Book.geo_code_union_id','Book.geo_code_rmo_id', 'Book.growth_centre')));
		
		
		//$upzila_id = $Books[0]['Book']['geo_code_upazila_id'];
		$union_id = $Books[0]['Book']['geo_code_union_id'];
		//$rmo = $Books[0]['Book']['geo_code_rmo_id'];
		$growth_centre = $Books[0]['Book']['growth_centre'];
		//$rmo = $this -> GeoCodeRmo -> getRmoID($_POST['rmo_code']);
		
		
		if($growth_centre == 1 && $_POST['rmo_code'] == 7)
		{
			$Muzas = $this -> GeoCodeMauza -> find('list', array('conditions' => array('GeoCodeMauza.geo_code_union_id' => $union_id, 'GeoCodeMauza.mauza_code' => $_POST['mauza_code']), 'fields' => array('GeoCodeMauza.mauza_name')));
		}
		else
		{
			$Muzas = $this -> GeoCodeMauza -> find('list', array('conditions' => array('GeoCodeMauza.geo_code_union_id' => $union_id, 'GeoCodeMauza.mauza_code' => $_POST['mauza_code'], /*'GeoCodeMauza.geo_code_rmo_id' => $rmo */), 'fields' => array('GeoCodeMauza.mauza_name')));
		}

		
		echo json_encode($Muzas);

	}
    
// GET RMO NAME
        public function getRmoName() {
        $this -> autoRender = false;
        $this -> layout = false;

        $this -> loadModel('GeoCodeRmo');
        $GeoCodeRmoName = $this -> GeoCodeRmo -> find('list', array('conditions' => array('GeoCodeRmo.rmo_code =' => $_REQUEST['rmo_code']), 'order' => 'GeoCodeRmo.rmo_type_eng'));
        echo json_encode($GeoCodeRmoName);
    }
    
// GET VILLAGE NAME	
	public function getVillageName() {
		
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeMauza');
		$this -> loadModel('GeoCodeVillage');
		

		$Books = $this -> Book -> find('list', array('conditions' => array('Book.id =' => $_REQUEST['book_id']), 'fields' => array('Book.geo_code_union_id')));

		$union_id = $Books[$_REQUEST['book_id']];
		
		$Muzas = $this -> GeoCodeMauza -> find('all', array('conditions' => array('GeoCodeMauza.geo_code_union_id =' => $union_id, 'GeoCodeMauza.mauza_code' => $_REQUEST['mauza_code']), 'fields' => array('GeoCodeMauza.mauza_name','GeoCodeMauza.id' )));
		
		$muzaId = $Muzas[0]['GeoCodeMauza']['id'];
		
		$village = $this->GeoCodeVillage->find('all', array('conditions' => array('muza_id' =>$muzaId),
		'fields' => array('GeoCodeVillage.id','GeoCodeVillage.village_name')));
		
		$options = array();
		foreach ($village as $key => $value) {
			$options[$value['GeoCodeVillage']['village_name']] = $value['GeoCodeVillage']['village_name'];
		}
		$this->Session->write('village_options', $options);
		
		echo json_encode($village);

	}
// GET UNIT NO
	public function getUnitNumber() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeMauza');

		$unitNo = $this -> Questionaire -> find('list', array('conditions' => array('book_id =' => $_REQUEST['book_id'], 'q1_unit_serial_no' => $_REQUEST['unit_number']), 'fields' => array('q1_unit_serial_no')));

		echo json_encode($unitNo);

	}

    // Education Description Starts here. SECTION :3.2

    public function getEductionDesc() {
        $this -> autoRender = false;
        $this -> layout = false;

        $this -> loadModel('UnitHeadEducation');

        $EducationDesc = $this -> UnitHeadEducation -> find('list', array('conditions' => array('UnitHeadEducation.education_code' => $_REQUEST['education_code']), 'fields' => array('UnitHeadEducation.education_desc_bng')));

        echo json_encode($EducationDesc);

    }


	//Economy Description Starts Here SECTION :5

	public function getEconomyDesc() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('UnitHeadEconomy');

		$Desc = $this -> UnitHeadEconomy -> find('list', 
			array('conditions' => array('UnitHeadEconomy.economy_code' => $_REQUEST['economy_code']),
			 'fields' => array('UnitHeadEconomy.economy_desc_bng')));

		echo json_encode($Desc);
	}

	//Q6EconomyDescription Starts Here SECTION :6

	public function getEconomyDetails() {
		$this -> autoRender = false;
		$this -> layout = false;

		//$this->loadModel('Book');

		$this -> loadModel('IndCodeClass');

		$Desc = $this -> IndCodeClass -> find('list', array('conditions' => array('IndCodeClass.class_code' => $_REQUEST['class_code']), 'fields' => array('IndCodeClass.class_code_desc_bng')));

		echo json_encode($Desc);

	}

	//Q7 EconomyDescription Starts Here SECTION :7
	
	public function getProductDesc() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('ProdCodeSubClass');

		$ProdCodeSubClass = $this -> ProdCodeSubClass -> find('list', array('conditions' => array('ProdCodeSubClass.sub_class_code' => $_REQUEST['sub_class_code']), 'fields' => array('ProdCodeSubClass.sub_class_desc_bng')));

		echo json_encode($ProdCodeSubClass);

	}

/*
 *  END OF ALL AJAX REQUEST FUNCTION
 *
 */



public function partialSubmit($bookID = null) {
		
		$this -> layout = 'table';
		$_SESSION["MenuActive"] = 2;
		$_SESSION["bookID"] = $bookID;
		
		$this -> loadModel('UnitHeadEducation');
		$this -> loadModel('IndCodeDivn');
		$this -> loadModel('IndCodeClass');
		$this -> loadModel('Book');
		$this -> loadModel('GeoCodeMauza');
		$this -> loadModel('GeoCodeRmo');
		
		if(!$this->Session->check('q1_geo_code_mauza_id'))
		{
			$this->Session->write('q1_geo_code_mauza_id', "");
			$this->Session->write('q1_geo_code_mauza_name', "");
			$this->Session->write('village_options', array());
		}
		

		if ($this -> request -> is('post')) {

$this->Session->write('q1_geo_code_mauza_id', $this -> request -> data['Questionaire']['q1_geo_code_mauza_id']);
			$this->Session->write('q1_geo_code_mauza_name', $this -> request -> data['Questionaire']['q1_geo_code_mauza_name']);
//*****************************************************************
// SECTION 2 Lower to uper case
			$this -> request -> data['Questionaire']['q2_unit_name'] = strtoupper($this -> request -> data['Questionaire']['q2_unit_name']);

			$this -> request -> data['Questionaire']['q2_village_maholla'] = strtoupper($this -> request -> data['Questionaire']['q2_village_maholla']);
			$this -> request -> data['Questionaire']['q2_home_market'] = strtoupper($this -> request -> data['Questionaire']['q2_home_market']);
			$this -> request -> data['Questionaire']['q2_road_no_name'] = strtoupper($this -> request -> data['Questionaire']['q2_road_no_name']);
			$this -> request -> data['Questionaire']['q2_holding_no'] = strtoupper($this -> request -> data['Questionaire']['q2_holding_no']);
// End of Lower to upper
//*******************************************************************
$this -> request -> data['Questionaire']['rmo_code'] = $this -> request -> data['Questionaire']['rmo_code2'];
$this -> request -> data['Questionaire']['id'] = $this -> request -> data['Questionaire']['book_id'] . str_pad($this -> request -> data['Questionaire']['q1_unit_serial_no'], 3, "0", STR_PAD_LEFT);
$this -> request -> data['Questionaire']['q3_unit_head_education_id'] = $this -> UnitHeadEducation -> getUnitHeadEducationID($this -> request -> data['Questionaire']['q3_unit_head_education_id']);
$this -> request -> data['Questionaire']['q6_ind_code_class_id'] = $this -> request -> data['Questionaire']['q6_economy_id'];
$Books = $this -> Book -> find('all', array(
        'conditions' => array(
        'Book.id =' => $this -> request -> data['Questionaire']['book_id']), 
        'fields' => array('Book.geo_code_union_id','Book.geo_code_rmo_id', 'Book.growth_centre')));

$union_id = $Books[0]['Book']['geo_code_union_id'];
//$rmo_id = $Books[0]['Book']['geo_code_rmo_id'];
$rmo_id = $this -> GeoCodeRmo -> getRmoID($this -> request -> data['Questionaire']['rmo_code2']);

$growth_centre = $Books[0]['Book']['growth_centre'];
if($growth_centre == 1 && $this -> request -> data['Questionaire']['rmo_code2'] == 7)
{
	$Muzas = $this -> GeoCodeMauza -> find('all', array('conditions' => array(
            'GeoCodeMauza.geo_code_union_id =' => $union_id, 
            'GeoCodeMauza.mauza_code' => $this -> request -> data['Questionaire']['q1_geo_code_mauza_id']), 
            'fields' => array('GeoCodeMauza.id')));
}
else 
{
	$Muzas = $this -> GeoCodeMauza -> find('all', array('conditions' => array(
            'GeoCodeMauza.geo_code_union_id =' => $union_id, 
            /*'GeoCodeMauza.geo_code_rmo_id =' => $rmo_id,  */
            'GeoCodeMauza.mauza_code' => $this -> request -> data['Questionaire']['q1_geo_code_mauza_id']), 
            'fields' => array('GeoCodeMauza.id')));
}
$this -> request -> data['Questionaire']['q1_geo_code_mauza_id'] = $Muzas[0]['GeoCodeMauza']['id'];

//END OF CONVERT CODE TO ID==================================================


// Adding who and when add this data
$this -> request -> data['Questionaire']['entry_by'] = $this -> Session -> read('Authake.id');
$this -> request -> data['Questionaire']['created'] = date("Y-m-d H:i:s");
$this -> request -> data['Questionaire']['modified'] = date("Y-m-d H:i:s");
			
$this -> request -> data['Questionaire']['is_out_of_scope'] = 1;

if ($this->request->data['Questionaire']['q4_unit_type'] == 1) {
    $this->request->data['Questionaire']['q4_unit_org_type'] = 0;
}

			

			//END OF CONVERT CODE TO ID==================================================

			

			$this -> Questionaire -> create();

			if ($this -> Questionaire -> save($this -> request -> data)) {

				$this -> clear_cache();
				$this -> Session -> setFlash(__('The questionnaire has been saved'));
			
				$this -> redirect(array('controller' => 'Questionaires', 'action' => 'add', $_SESSION["bookID"]));
			} else {
				$this -> clear_cache();
				$this -> Session -> setFlash(__('The questionnaire could not be saved. Please, try again.'));
				$_SESSION['q_error'] = "The questionnaire could not be saved. Please, try again.";
				$this -> redirect(array('controller' => 'Questionaires', 'action' => 'add', $_SESSION["bookID"]));
			}
		}

		if ($_SESSION["bookID"] == null) {
			$this -> redirect(array('controller' => 'Books', 'action' => 'add'));
		}

		//$books = $this->Questionaire->Book->find('list');
		$this -> set(compact('books', 'UnitHeadEducations'));

	}

	
// Partial submit for edit form.. called by a function written in func.js submit_form()
public function partialSubmitEdit() {
		$this -> layout = 'table';
		$_SESSION["MenuActive"] = 2;
		$this -> loadModel('Questionaire');
        $this -> loadModel('QuesCheck');
        $this -> loadModel('QuesSixCheck');
       
		if ($this -> request -> is('post')) {
		    
           // pr($this->request->data); exit;

			$questionaire_id = $this -> request -> data['Questionaire']['book_id'] . str_pad($this -> request -> data['Questionaire']['q1_unit_serial_no'], 3, "0", STR_PAD_LEFT);
			
if ($this->request->data['Questionaire']['q4_unit_type'] == 1) {
    $this->request->data['Questionaire']['q4_unit_org_type'] = 0 ;
    
}			

$this->Questionaire->begin();

			$Ques_Scope_Status = $this->Questionaire->updateAll(
					array(
'Questionaire.q4_unit_type' => $this -> request ->data['Questionaire']['q4_unit_type'],
'Questionaire.q4_unit_org_type' => $this -> request ->data['Questionaire']['q4_unit_org_type'],
'Questionaire.q5_unit_head_economy_id' => $this -> request ->data['Questionaire']['q5_unit_head_economy_id'],
'Questionaire.q6_ind_code_class_id' => $this -> request ->data['Questionaire']['q6_economy_id'],
'Questionaire.is_out_of_scope' => '1',
'Questionaire.sync_required' => '1'), 
array('Questionaire.id' => $questionaire_id));



            if ($Ques_Scope_Status) {
                
                        
                $this -> QuesCheck -> unbindModel(array('belongsTo' => array('Questionaire')));
                $this -> QuesSixCheck -> unbindModel(array('belongsTo' => array('Questionaire')));
                
                
                $QuesCheck_status = $this->QuesCheck->updateAll(
                    array(
                            'QuesCheck.operator_chk' => NULL, 
                            'QuesCheck.error_note' => NULL, 
                            'QuesCheck.entry_by' => NULL,
                            'QuesCheck.sync_required' => '1'), 
                    array('QuesCheck.questionaire_id' => $questionaire_id));
    
                $QuesSixCheck_status = $this->QuesSixCheck->updateAll(
                    array(
                            'QuesSixCheck.is_right' => NULL, 
                            'QuesSixCheck.entry_by' => NULL, 
                            'QuesSixCheck.right_code' => NULL,
                            'QuesSixCheck.approve_status' => NULL,
                            'QuesSixCheck.right_code' => NULL,
                            'QuesSixCheck.approve_by' => NULL), 
                    array('QuesSixCheck.questionaire_id' => $questionaire_id));
    
                
                    if ($QuesCheck_status && $QuesSixCheck_status) {
                        
                        $this->Questionaire->commit();
                        $this->Session->setFlash(__('The questionnaire has been updated successfully'));
                        $this->redirect(array('controller' => 'Questionaires', 'action' => 'index'));
                    }
                    else 
                    {
                        $this->Questionaire->rollback();
                        $this->Session->setFlash(__('Failed to update. Please, try again.'));
                        $this->redirect(array('controller' => 'Questionaires', 'action' => 'index'));
                    }
                
            } else {
                $this->Questionaire->rollback();
                $this->Session->setFlash(__('Failed to update. Please, try again.'));
                $this->redirect(array('controller' => 'Questionaires', 'action' => 'index'));
            }
            
          /*  
					
			if ($Ques_Scope_Status) {

				$this -> clear_cache();
				$this -> Session -> setFlash(__('The questionnaire has been saved'));
			
				$this -> redirect(array('plugin' => '', 'controller' => 'Questionaires', 'action' => 'index'));
			} else {
				$this -> clear_cache();
				$this -> Session -> setFlash(__('The questionnaire could not be saved. Please, try again.'));
				$this -> redirect(array('plugin' => '', 'controller' => 'Questionaires', 'action' => 'index'));
			}
           
           */
		}

	}


/*******************************************************************************
 *                     Input field validation function
 *******************************************************************************/
	function qus_validation($q1,$q1_1, $q2_1, $q2_2, $q3_1, $q3_2, $q3_3, $q6_1,$q6_2, $q12, $q13, $q14,  $q15_1, $q15_2, $q16, $q25, $q26, $action = null) {
		$msg = "";
        
        $mauza_code = $q1;
		if ($mauza_code == "" || strlen($mauza_code) <> 3) {
			$msg .= "<br />Wrong Mauza Code!";
		}

		$unit_serial = $q1_1;
		if ($unit_serial == "" || strlen($unit_serial) <> 3) {
			$msg .= "<br />Wrong Unit Serial Number!";
		}
		$name = $q2_1;
		if ($name == "") {
			$msg .= "<br />Please Enter A Name!";
		}
		
		$village_name = $q2_2;
		if ($village_name == "") {
			$msg .= "<br />Please Enter A  Village Name!";
		}
		
		
		$gender = array('1', '2', '3', '9');
		if (!in_array($q3_1, $gender)) {
			$msg .= "<br />Please Select Gender Type!";
		}

		$education = array('00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '12', '15', '16', '18', '99');
		if (!in_array($q3_2, $education)) {
			$msg .= "<br />Please Provide Correct Education Code !";
		}
		$age = $q3_3;
		if ($age == "") {
			$msg .= "<br />Please Provide Valid Age !";
		}

		$economy_desc = $q6_1;
		if ($economy_desc == "") {
			$msg .= "<br />Please Provide Valid Economy Code Description !";
		}
		$economy_code = $q6_2;
		if ($economy_code == "") {
			$msg .= "<br />Please Provide Valid Economy Code !";
		}
		$year = $q12;
		if ($year == "") {
			$msg .= "<br />Ques. No- 12 : Year Field is Blank !";
		}
		$sale_pros = array('1', '2', '3', '9');
		if (!in_array($q13, $sale_pros)) {
			$msg .= "<br />Please Provide Correct Code For Ques. No- 13 !";
		}

		$account_yes_no = array('1', '2', '9');
		if (!in_array($q14, $account_yes_no)) {
			$msg .= "<br />Please Provide Correct Code For Ques. No- 14 !";
		}

		$salary_method = array('1', '2', '3', '9');
		if (!in_array($q15_1, $salary_method)) {
			$msg .= "<br />Please Provide Correct Code For Ques. No- 15.1!";
		}

		$payment_type = array('1', '2', '3', '4', '5', '9');
		if (!in_array($q15_2, $payment_type)) {
			$msg .= "<br />Please Provide Correct Code For Ques. No- 15.2!";
		}

		$present_debit = array('1', '2', '3', '4', '5', '6', '7', '9');
		if (!in_array($q16, $present_debit)) {
			$msg .= "<br />Please Provide Correct Code For Ques. No- 16!";
		}
		$tin_status = array('1', '2', '9');
		if (!in_array($q25, $tin_status)) {
			$msg .= "<br />Please Provide Correct Code For Ques. No- 25!";
		}
		$vat_status = array('1', '2', '3', '4', '5', '6', '7', '9');
		if (!in_array($q26, $vat_status)) {
			$msg .= "<br />Please Provide Correct Code For Ques. No- 26!";
		}
		
		if($msg != "")
		{
				$this -> clear_cache();

				$this -> Session -> setFlash(__($msg));
				if($action == "EDIT")
				{
					$this->Session->setFlash(__($msg));
					$this->redirect(array('controller' => 'Questionaires', 'action' => 'index'));
				}
				else {
					$this->Session->setFlash(__($msg));
					$_SESSION['q_error'] = $msg;
					$this -> redirect(array('controller' => 'Questionaires', 'action' => 'add', $_SESSION["bookID"]));
				}
				
		}
		else {
			return true;
		}
		
	}

	/**
	 * function to clear all cache data
	 * by default accessible only for admin
	 *
	 * @access Public
	 * @return void
	 */
	public function clear_cache() {
		Cache::clear();
		clearCache();

		$files = array();
		$files = array_merge($files, glob(CACHE . '*'));
		// remove cached css
		$files = array_merge($files, glob(CACHE . 'css' . DS . '*'));
		// remove cached css
		$files = array_merge($files, glob(CACHE . 'js' . DS . '*'));
		// remove cached js
		$files = array_merge($files, glob(CACHE . 'models' . DS . '*'));
		// remove cached models
		$files = array_merge($files, glob(CACHE . 'persistent' . DS . '*'));
		// remove cached persistent
		$files = array_merge($files, glob(CACHE . 'Html' . DS . '*'));
		// remove cached persistent
		$files = array_merge($files, glob(CACHE . 'Form' . DS . '*'));
		// remove cached persistent

		foreach ($files as $f) {
			if (is_file($f)) {
				unlink($f);
			}
		}

		if (function_exists('apc_clear_cache')) :
			apc_clear_cache();
			apc_clear_cache('user');
		endif;

		$this -> set(compact('files'));
		$this -> layout = 'ajax';
	}



// details_view Function is used to view Questionnaire
    public function details_view($quesID)
    
    {
    $this->layout = 'table';
    $_SESSION["MenuActive"] = 5;
    
    $this -> loadModel('UnitHeadEducation');
       
    
    $this -> Questionaire -> id = $quesID;
        if (!$this -> Questionaire -> exists()) {
            throw new NotFoundException(__('Invalid questionaire'));
        }
 
    $questionaires = $this->Questionaire->find('all', array(
    'conditions'=> array('Questionaire.id' => $quesID)));
    
     $edu_code = $this->UnitHeadEducation->find('all', array('conditions'=> array('UnitHeadEducation.id' => $questionaires[0]['Questionaire']['q3_unit_head_education_id'])
     ));
     
    $this->set(compact('questionaires','edu_code'));

    }
    
  
  // edit_ques function is used to edit Questionnaire by operator
    public function edit_ques($questionaire_id=null)
    {
    $this->layout = 'table';
    $_SESSION["MenuActive"] = 5;
    $_SESSION["QuesID"] = $questionaire_id;
	
        $this->loadModel('Questionaire');
        $this->loadModel('QuesCheck');
		$this->loadModel('QuesSixCheck');
        $this->loadModel('UnitHeadEducation');
        $this->loadModel('IndCodeDivn');
        $this->loadModel('IndCodeClass');
        $this->loadModel('Book');
        $this->loadModel('GeoCodeMauza');
        $this->loadModel('GeoCodeRmo');
        
$this -> Questionaire ->id = $questionaire_id;
         if (!$this -> Questionaire -> exists()) {
          throw new NotFoundException(__('Requested Page Not Found'));
        }        
if(!$this->Session->check('q1_geo_code_mauza_id'))
        {
            $this->Session->write('q1_geo_code_mauza_id', "");
            $this->Session->write('q1_geo_code_mauza_name', "");
            $this->Session->write('village_options', array());
        }    
    
    

if ($this->request->is('post')) {
    
//pr($this->request->data); exit;

 //Grabbing input fields for validation                        
$q1=$this -> request ->data['Questionaire']['q1_geo_code_mauza_id'];
$q1_1=$this -> request ->data['Questionaire']['q1_unit_serial_no'];
$q2_1=$this -> request ->data['Questionaire']['q2_unit_name'];
$q2_2=$this -> request ->data['Questionaire']['q2_village_maholla'];
$q3_1=$this -> request ->data['Questionaire']['q3_unit_head_gender'];
$q3_2=$this -> request ->data['Questionaire']['q3_unit_head_education_id'];
$q3_3=$this -> request ->data['Questionaire']['q3_unit_head_age'];
$q6_1=$this -> request ->data['Questionaire']['q6_economy_description'];
$q6_2=$this -> request ->data['Questionaire']['q6_economy_id'];
$q12=$this -> request ->data['Questionaire']['q12_year_of_start'];
$q13=$this -> request ->data['Questionaire']['q13_sale_procedure'];
$q14=$this -> request ->data['Questionaire']['q14_is_accountable'];
$q15_1=$this -> request ->data['Questionaire']['q15_salary_instr'];
$q15_2=$this -> request ->data['Questionaire']['q15_salary_period'];
$q16=$this -> request ->data['Questionaire']['q16_fixed_capital'];
$q25=$this -> request ->data['Questionaire']['q25_is_tin_registered'];
$q26=$this -> request ->data['Questionaire']['q26_is_vat_registered'];




// calling the validation function
$this->qus_validation($q1, $q1_1, $q2_1,$q2_2, $q3_1, $q3_2, $q3_3, $q6_1, $q6_2, $q12, $q13, $q14, $q15_1, $q15_2, $q16, $q25, $q26, "EDIT");

// End of function

//*************************** Saving Mauza Id & Name into Session*********//

$this->Session->write('q1_geo_code_mauza_id', $this -> request -> data['Questionaire']['q1_geo_code_mauza_id']);
$this->Session->write('q1_geo_code_mauza_name', $this -> request -> data['Questionaire']['q1_geo_code_mauza_name']);    
     
 //*************SECTION 2 Lower to uper case *************   // 
    $this->request->data['Questionaire']['q2_unit_name'] = strtoupper($this->request->data['Questionaire']['q2_unit_name']);
    
   $this->request->data['Questionaire']['q2_village_maholla'] = strtoupper($this->request->data['Questionaire']['q2_village_maholla']);       
   $this->request->data['Questionaire']['q2_home_market'] = strtoupper($this->request->data['Questionaire']['q2_home_market']);
   $this->request->data['Questionaire']['q2_road_no_name'] = strtoupper($this->request->data['Questionaire']['q2_road_no_name']);
   $this->request->data['Questionaire']['q2_holding_no'] = strtoupper($this->request->data['Questionaire']['q2_holding_no']);
        
// END or lower to upper********************    //
   
$this->request->data['Questionaire']['rmo_code'] = $this->request->data['Questionaire']['rmo_code2'];
            
$questionaire_id = $this->request->data['Questionaire']['book_id'].str_pad($this->request->data['Questionaire']['q1_unit_serial_no'], 3, "0", STR_PAD_LEFT);

$this->request->data['Questionaire']['id'] = $questionaire_id;

$this->request->data['Questionaire']['q3_unit_head_education_id'] = $this->UnitHeadEducation->getUnitHeadEducationID($this->request->data['Questionaire']['q3_unit_head_education_id']);
$this->request->data['Questionaire']['q6_ind_code_class_id'] = $this->request->data['Questionaire']['q6_economy_id'];
$Books = $this->Book->find('all', array(
        'conditions' => array(
        'Book.id =' =>  $this->request->data['Questionaire']['book_id']), 
        'fields' => array('Book.geo_code_union_id', 'Book.geo_code_rmo_id', 'Book.growth_centre')));
        
$union_id = $Books[0]['Book']['geo_code_union_id'];
//$rmo_id = $Books[0]['Book']['geo_code_rmo_id'];
$rmo_id = $this -> GeoCodeRmo -> getRmoID($this -> request -> data['Questionaire']['rmo_code2']);

$growth_centre = $Books[0]['Book']['growth_centre'];
if($growth_centre == 1 && $this -> request -> data['Questionaire']['rmo_code2'] == 7)
{
	$Muzas = $this -> GeoCodeMauza -> find('all', array('conditions' => array(
            'GeoCodeMauza.geo_code_union_id =' => $union_id, 
            'GeoCodeMauza.mauza_code' => $this -> request -> data['Questionaire']['q1_geo_code_mauza_id']), 
            'fields' => array('GeoCodeMauza.id')));
}
else 
{
	$Muzas = $this -> GeoCodeMauza -> find('all', array('conditions' => array(
            'GeoCodeMauza.geo_code_union_id =' => $union_id, 
            /*'GeoCodeMauza.geo_code_rmo_id =' => $rmo_id, */
            'GeoCodeMauza.mauza_code' => $this -> request -> data['Questionaire']['q1_geo_code_mauza_id']), 
            'fields' => array('GeoCodeMauza.id')));
}

$this->request->data['Questionaire']['q1_geo_code_mauza_id'] = $Muzas[0]['GeoCodeMauza']['id'];
      

//******** Assigning data status *********          
$this->request->data['Questionaire']['update_by'] = $this->Session->read('Authake.id');          
$this->request->data['Questionaire']['sync_required'] = 1;     
$this->request->data['Questionaire']['modified'] = date("Y-m-d H:i:s");
$this->request->data['Questionaire']['is_out_of_scope'] = 0;

if ($this->request->data['Questionaire']['q4_unit_type'] == 1) {
    $this->request->data['Questionaire']['q4_unit_org_type'] = 0 ;
	
}
    $this->Questionaire->begin();

            if ($this->Questionaire->saveAll($this->request->data)) {
                
						
				$this -> QuesCheck -> unbindModel(array('belongsTo' => array('Questionaire')));
				$this -> QuesSixCheck -> unbindModel(array('belongsTo' => array('Questionaire')));
				
				
				$QuesCheck_status = $this->QuesCheck->updateAll(
					array(
							'QuesCheck.operator_chk' => NULL, 
							'QuesCheck.error_note' => NULL, 
				            'QuesCheck.entry_by' => NULL,
				            'QuesCheck.sync_required' => '1'), 
				    array('QuesCheck.questionaire_id' => $questionaire_id));
	
				$QuesSixCheck_status = $this->QuesSixCheck->updateAll(
					array(
							'QuesSixCheck.is_right' => NULL, 
							'QuesSixCheck.entry_by' => NULL, 
				            'QuesSixCheck.right_code' => NULL,
				            'QuesSixCheck.approve_status' => NULL,
				            'QuesSixCheck.right_code' => NULL,
				            'QuesSixCheck.approve_by' => NULL), 
				    array('QuesSixCheck.questionaire_id' => $questionaire_id));
	
				
                    if ($QuesCheck_status && $QuesSixCheck_status) {
                    	
                        $this->Questionaire->commit();
                        $this->Session->setFlash(__('The questionnaire has been updated successfully'));
                       	$this->redirect(array('controller' => 'Questionaires', 'action' => 'index'));
                    }
                    else 
                    {
                        $this->Questionaire->rollback();
                        $this->Session->setFlash(__('Failed to update. Please, try again.'));
                        $this->redirect(array('controller' => 'Questionaires', 'action' => 'index'));
                    }
                
            } else {
                $this->Questionaire->rollback();
                $this->Session->setFlash(__('Failed to update. Please, try again.'));
                $this->redirect(array('controller' => 'Questionaires', 'action' => 'index'));
            }

        }

 $questionaires = $this->Questionaire->find('all', array(
                 'conditions'=> array(
                 'Questionaire.id' => $questionaire_id)));
                 
 $edu_code = $this->UnitHeadEducation->find('all', array('conditions'=> array('UnitHeadEducation.id' => $questionaires[0]['Questionaire']['q3_unit_head_education_id'])
     ));

$this->set(compact('questionaires','edu_code'));

    }
 
 	public function getNextQues()
	{
		$this -> autoRender = false;
		$this -> layout = false;
		
		$this->loadModel('Questionaire');
		
		if($_POST['given_unit_no'] != '')
		{
			$getQues = $this->Questionaire->find('first', array(
                 'conditions'=> array(
                 'Questionaire.book_id =' => $_POST['book_id'], 'Questionaire.q1_unit_serial_no =' => $_POST['given_unit_no']),
                 'fields' => array('Questionaire.id')
				 ));
		}
		else if($_POST['next_previous'] == 'next')
		{
			$getQues = $this->Questionaire->find('first', array(
                 'conditions'=> array(
                 'Questionaire.book_id =' => $_POST['book_id'], 'Questionaire.id >' => $_POST['ques_id']),
                 'fields' => array('Questionaire.id'),
                 'order' => array('Questionaire.id')
				 ));
		}
		else if($_POST['next_previous'] == 'previous')
		{
			$getQues = $this->Questionaire->find('first', array(
                 'conditions'=> array(
                 'Questionaire.book_id =' => $_POST['book_id'], 'Questionaire.id <' => $_POST['ques_id']),
                 'fields' => array('Questionaire.id'),
                 'order' => array('Questionaire.id desc')
				 ));
		}
		
		

		echo json_encode($getQues['Questionaire']['id']);
	}  
}

