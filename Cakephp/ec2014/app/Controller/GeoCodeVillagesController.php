<?php
App::uses('AppController', 'Controller');
/**
 * GeoCodeVillages Controller
 *
 * @property GeoCodeVillage $GeoCodeVillage
 */
class GeoCodeVillagesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('title_for_layout', 'Villages');
		$this -> loadModel('GeoCodeDivn');
		//$this->GeoCodeMauza->recursive = 4;
		$conditions = array();

		$conditions['joins'] = array( array('table' => 'geo_code_zilas', 
		'alias' => 'GeoCodeZila', 'type' => 'INNER', 
		'conditions' => array('GeoCodeZila.geo_code_divn_id = GeoCodeDivn.id')),
		 array('table' => 'geo_code_upazilas', 
		 'alias' => 'GeoCodeUpazila', 
		 'type' => 'INNER', 
		 'conditions' => array('GeoCodeUpazila.geo_code_zila_id = GeoCodeZila.id')), 
		 
		 array('table' => 'geo_code_unions', 
		 'alias' => 'GeoCodeUnion', 
		 'type' => 'INNER', 
		 'conditions' => array('GeoCodeUnion.geo_code_upazila_id = GeoCodeUpazila.id')), 
		 
		  array('table' => 'geo_code_mauzas', 
		 'alias' => 'GeoCodeMauza', 
		 'type' => 'INNER', 
		 'conditions' => array('GeoCodeMauza.geo_code_union_id = GeoCodeUnion.id')),
		 
		  array('table' => 'geo_code_rmos', 
		  'alias' => 'GeoCodeRmo', 
		  'type' => 'LEFT', 'conditions' => array('GeoCodeRmo.id = GeoCodeMauza.geo_code_rmo_id')),
		  
           array('table' => 'geo_code_villages', 
		  'alias' => 'GeoCodeVillage', 
		  'type' => 'INNER', 
		  'conditions' => array('GeoCodeVillage.muza_id = GeoCodeMauza.id')));
		
		$conditions['fields'] = array('GeoCodeDivn.divn_code', 'GeoCodeDivn.divn_name', 'GeoCodeZila.zila_code', 'GeoCodeZila.zila_name', 'GeoCodeUpazila.upzila_code', 'GeoCodeUpazila.upzila_name', 'GeoCodeUnion.union_code', 'GeoCodeUnion.union_name', 'GeoCodeMauza.mauza_code', 'GeoCodeMauza.mauza_name', 'GeoCodeMauza.id', 'GeoCodeRmo.rmo_type_eng', 'GeoCodeVillage.village_code', 'GeoCodeVillage.village_name', 'GeoCodeVillage.muza_id','GeoCodeVillage.id');
		
		if ($this -> request -> is('post') && $this -> request ->data['GeoCodeVillage']['village_name'] != "") {
			$conditions['conditions'] = array('GeoCodeVillage.village_name LIKE' => '%'.$this -> request ->data['GeoCodeVillage']['village_name'].'%');
			$conditions['limit'] = 100;
		}
		
		$conditions['order'] = array('GeoCodeDivn.divn_name' => 'asc');
		
		
		
		$this -> paginate = $conditions;
		$geoCodeVillages = $this -> paginate('GeoCodeDivn');
		
		$this -> set(compact('geoCodeVillages'));
		
		
	}

	public function view($id = null) {
		$this->GeoCodeVillage->id = $id;
		if (!$this->GeoCodeVillage->exists()) {
			throw new NotFoundException(__('Invalid geo code village'));
		}
		$this->set('geoCodeVillage', $this->GeoCodeVillage->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
	    $this ->loadModel('GeoCodeDivn');
		if ($this->request->is('post')) {   
			$this->GeoCodeVillage->create();
			if ($this->GeoCodeVillage->save($this->request->data)) {
				$this->Session->setFlash(__('The geo code village has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The geo code village could not be saved. Please, try again.'));
			}
		}
        $divns=$this->GeoCodeDivn->find('list');
		$geoCodeRmos = $this->GeoCodeVillage->GeoCodeRmo->find('list');
		$this->set(compact('geoCodeRmos','divns'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this ->loadModel('GeoCodeDivn');
		$this->GeoCodeVillage->id = $id;
		if (!$this->GeoCodeVillage->exists()) {
			throw new NotFoundException(__('Invalid geo code village'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			//pr($this->request->data); exit;
			if ($this->GeoCodeVillage->save($this->request->data)) {
				$this->Session->setFlash(__('The geo code village has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The geo code village could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->GeoCodeVillage->read(null, $id);
		}
		//$geoCodeMauzas = $this->GeoCodeVillage->GeoCodeMauza->find('list');
		$geoCodeMauzas = null;
		$geoCodeRmos = $this->GeoCodeVillage->GeoCodeRmo->find('list');
		$divns=$this->GeoCodeDivn->find('list');
		$this->set(compact('geoCodeMauzas', 'geoCodeRmos', 'divns'));
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
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->GeoCodeVillage->id = $id;
		if (!$this->GeoCodeVillage->exists()) {
			throw new NotFoundException(__('Invalid geo code village'));
		}
		if ($this->GeoCodeVillage->delete()) {
			$this->Session->setFlash(__('Geo code village deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Geo code village was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

    public function getZilaName()
     {
     $this->autoRender = false;
     $this->layout = false;

     $this->loadModel('GeoCodeZila');
     
     $GeoCodeZila = $this->GeoCodeZila->find('list', array(
     'conditions' => array('GeoCodeZila.geo_code_divn_id =' => $_REQUEST['geo_code_divn_id']), 
     'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_name'),
     'order' => 'GeoCodeZila.zila_name'));
     echo json_encode($GeoCodeZila);
     }

    public function getUpaZila() {
        $this -> autoRender = false;
        $this -> layout = false;

        $this -> loadModel('GeoCodeUpazila');

        $GeoCodeUpazilas = $this -> GeoCodeUpazila -> find('all', array(
        'conditions' => array('GeoCodeUpazila.geo_code_zila_id =' => $_REQUEST['geo_code_zila_id']), 
        'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name'), 
        'order' => 'GeoCodeUpazila.upzila_name'));

        echo json_encode($GeoCodeUpazilas);
    }
    
    public function getUnion() {
        $this -> autoRender = false;
        $this -> layout = false;

        $this -> loadModel('GeoCodeUnion');
        $GeoCodeUnions = $this -> GeoCodeUnion -> find('all', array(
        'conditions' => array('GeoCodeUnion.geo_code_upazila_id =' => $_REQUEST['geo_code_upazila_id']), 
        'fields' => array('GeoCodeUnion.id', 'GeoCodeUnion.union_name'), 
        'order' => 'GeoCodeUnion.union_name'));
        echo json_encode($GeoCodeUnions);
    }


    public function getMuza() {
        $this -> autoRender = false;
        $this -> layout = false;

        $this -> loadModel('GeoCodeUnion');
        $this -> loadModel('GeoCodeRmo');
        $this -> loadModel('GeoCodeMauza');

        $GeoCodeMuzas = $this -> GeoCodeMauza -> find('all', array(
         'conditions' => array('GeoCodeMauza.geo_code_union_id =' => $_REQUEST['geo_code_union_id']),
         'fields' => array('GeoCodeMauza.id','GeoCodeMauza.mauza_name'), 
         'order' => 'GeoCodeMauza.mauza_name'));
         echo json_encode($GeoCodeMuzas);
    }

    public function getPSA() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodePsa');
		$GeoCodePsas = $this -> GeoCodePsa -> find('all', array(
			'conditions' => array(
			'GeoCodePsa.geo_code_upazila_id =' => $_REQUEST['geo_code_upazila_id']), 
			'order' => 'GeoCodePsa.psa_name'));
		echo json_encode($GeoCodePsas);
	}


		public function getUnionWithNonPSA() {
		$this -> autoRender = false;
		$this -> layout = false;
		
		if($_REQUEST['geo_code_psa_nonpsa'] == 1) $_REQUEST['geo_code_psa_nonpsa'] = "UNION";
		
		if($_REQUEST['geo_code_psa_nonpsa'] == 2) $_REQUEST['geo_code_psa_nonpsa'] = "WARD";

		$this -> loadModel('GeoCodeUnion');
		if($_REQUEST['geo_code_psa_nonpsa'] == "UNION")
		{
			$GeoCodeUnions = $this -> GeoCodeUnion -> find('all', array(
			'conditions' => array(
				'GeoCodeUnion.geo_code_upazila_id =' => $_REQUEST['geo_code_upazila_id'], 
				'GeoCodeUnion.union_or_ward ='=>$_REQUEST['geo_code_psa_nonpsa']),  
				'fields' => array('GeoCodeUnion.id', 'GeoCodeUnion.union_code', 'GeoCodeUnion.union_name'), 
				'order' => 'GeoCodeUnion.union_name'));
		}
		else
		{
			$GeoCodeUnions = $this -> GeoCodeUnion -> find('all', array(
			'conditions' => array(
				'GeoCodeUnion.geo_code_upazila_id =' => $_REQUEST['geo_code_upazila_id'], 
				'GeoCodeUnion.union_or_ward ='=>$_REQUEST['geo_code_psa_nonpsa'],
				'GeoCodeUnion.geo_code_psa_id ='=>$_REQUEST['geo_code_psa_id']),  
				'fields' => array('GeoCodeUnion.id', 'GeoCodeUnion.union_code', 'GeoCodeUnion.union_name'), 
				'order' => 'GeoCodeUnion.union_name'));
		}
		
		
		echo json_encode($GeoCodeUnions);
	}

}

