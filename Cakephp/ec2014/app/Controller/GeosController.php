<?php
App::uses('AppController', 'Controller');

class GeosController extends AppController {
	/*
	 public $components = array('Paginator');
	 public $paginate = array(
	 'limit' => 25
	 );
	 */

	public function index() {
		$_SESSION["MenuActive"] = 7;
	}

	public function get_geo() {
		$_SESSION["MenuActive"] = 7;

		$this -> loadModel('GeoCodeDivn');
		$divns = $this -> GeoCodeDivn -> find('list');

		$this -> loadModel('GeoCodeRmo');
		$rmos = $this -> GeoCodeRmo -> find('list');

		$this -> set(compact('divns', 'rmos'));

	}

	public function get_ind() {
		$_SESSION["MenuActive"] = 7;
		$this -> loadModel('IndCodeDivn');
        
		$conditions = array();

		$conditions['joins'] = array( array(
		'table' => 'ind_code_groups', 
		'alias' => 'IndCodeGroup', 
		'type' => 'INNER', 
		'conditions' => array('IndCodeGroup.ind_code_divn_id = IndCodeDivn.id')),array(
		'table' => 'ind_code_classes', 
		'alias' => 'IndCodeClass', 
		'type' => 'INNER', 
		'conditions' => array('IndCodeClass.ind_code_group_id = IndCodeGroup.id')));

		if ($this -> request -> is('post')) {
		    
//SET SESSION===================================================================
			$this -> Session -> write('search_divn_code', $this -> request -> data['Geo']['divn_code']);
			$this -> Session -> write('search_divn_code_desc_bng', $this -> request -> data['Geo']['divn_code_desc_bng']);

			$this -> Session -> write('search_group_code', $this -> request -> data['Geo']['group_code']);
			$this -> Session -> write('search_group_code_desc_bng', $this -> request -> data['Geo']['group_code_desc_bng']);

			$this -> Session -> write('search_class_code', $this -> request -> data['Geo']['class_code']);
			$this -> Session -> write('search_class_code_desc_bng', $this -> request -> data['Geo']['class_code_desc_bng']);
            $this -> Session -> write('search_class_code_desc_eng', $this -> request -> data['Geo']['class_code_desc_eng']);
		}

		//FILTER IF VALUES ARE NOT BLANK

		if ($this -> Session -> check('search_divn_code') && $this -> Session -> read('search_divn_code') != '') {
			$conditions['conditions'][] = array('IndCodeDivn.divn_code' => $this -> Session -> read('search_divn_code'));
		}
		if ($this -> Session -> check('search_divn_code_desc_bng') && $this -> Session -> read('search_divn_code_desc_bng') != '') {
			$conditions['conditions'][] = array('IndCodeDivn.divn_code_desc_bng LIKE' => '%' . $this -> Session -> read('divn_code_desc_bng') . '%');
		}

		if ($this -> Session -> check('search_group_code') && $this -> Session -> read('search_group_code') != '') {
			$conditions['conditions'][] = array('IndCodeGroup.group_code' => $this -> Session -> read('search_group_code'));
		}
		if ($this -> Session -> check('search_group_code_desc_bng') && $this -> Session -> read('search_group_code_desc_bng') != '') {
			$conditions['conditions'][] = array('IndCodeGroup.group_code_desc_bng LIKE' => '%' . $this -> Session -> read('search_group_code_desc_bng') . '%');
		}

		if ($this -> Session -> check('search_class_code') && $this -> Session -> read('search_class_code') != '') {
			$conditions['conditions'][] = array('IndCodeClass.class_code' => $this -> Session -> read('search_class_code'));
		}
		if ($this -> Session -> check('search_class_code_desc_bng') && $this -> Session -> read('search_class_code_desc_bng') != '') {
			$conditions['conditions'][] = array('IndCodeClass.class_code_desc_bng LIKE' => '%' . $this -> Session -> read('search_class_code_desc_bng') . '%');
		}
//*****************************************************
       if ($this -> Session -> check('search_class_code_desc_eng') && $this -> Session -> read('search_class_code_desc_eng') != '') {
            $conditions['conditions'][] = array('IndCodeClass.class_code_desc_eng LIKE' => '%' . $this -> Session -> read('search_class_code_desc_eng') . '%');
        }

		$conditions['fields'] = array('IndCodeDivn.divn_code', 'IndCodeDivn.divn_code_desc_bng', 'IndCodeGroup.group_code', 'IndCodeGroup.group_code_desc_bng', 'IndCodeClass.class_code', 'IndCodeClass.class_code_desc_bng','IndCodeClass.class_code_desc_eng');

		$this -> paginate = $conditions;

		$IndCodeDivns = $this -> paginate('IndCodeDivn');

		$this -> set(compact('IndCodeDivns'));

	}

	//Created By Sajal==============================================

	public function get_prod() {
		$_SESSION["MenuActive"] = 7;
		$this -> loadModel('ProdCodeSection');
		$conditions = array();

		$conditions['joins'] = array( array('table' => 'prod_code_divns', 'alias' => 'ProdCodeDivn', 'type' => 'INNER', 'conditions' => array('ProdCodeDivn.prod_code_section_id = ProdCodeSection.id')), array('table' => 'prod_code_groups', 'alias' => 'ProdCodeGroup', 'type' => 'INNER', 'conditions' => array('ProdCodeGroup.prod_code_divn_id = ProdCodeDivn.id')), array('table' => 'prod_code_classes', 'alias' => 'ProdCodeClass', 'type' => 'INNER', 'conditions' => array('ProdCodeClass.prod_code_group_id = ProdCodeGroup.id')), array('table' => 'prod_code_sub_classes', 'alias' => 'ProdCodeSubClass', 'type' => 'INNER', 'conditions' => array('ProdCodeSubClass.prod_code_class_id = ProdCodeClass.id')));

		if ($this -> request -> is('post')) {

			//SET SESSION==========================================
			$this -> Session -> write('search_prod_section_code', $this -> request -> data['Geo']['section_code']);
			$this -> Session -> write('search_prod_divn_code', $this -> request -> data['Geo']['divn_code']);
			$this -> Session -> write('search_prod_group_code', $this -> request -> data['Geo']['group_code']);
			$this -> Session -> write('search_prod_class_code', $this -> request -> data['Geo']['class_code']);
			$this -> Session -> write('search_prod_class_code_desc_bng', $this -> request -> data['Geo']['class_desc_bng']);
			$this -> Session -> write('search_prod_class_code_desc_eng', $this -> request -> data['Geo']['class_desc_eng']);
			$this -> Session -> write('search_prod_sub_class_code', $this -> request -> data['Geo']['sub_class_code']);
			$this -> Session -> write('search_prod_sub_class_code_desc_bng', $this -> request -> data['Geo']['sub_class_desc_bng']);
			$this -> Session -> write('search_prod_sub_class_code_desc_eng', $this -> request -> data['Geo']['sub_class_desc_eng']);

		}

		//FILTER IF VALUES ARE NOT BLANK========================

		if ($this -> Session -> check('search_prod_section_code') && $this -> Session -> read('search_prod_section_code') != '') {
			$conditions['conditions'][] = array('ProdCodeSection.section_code' => $this -> Session -> read('search_prod_section_code'));
		}
		if ($this -> Session -> check('search_prod_divn_code') && $this -> Session -> read('search_prod_divn_code') != '') {
			$conditions['conditions'][] = array('ProdCodeDivn.divn_code' => $this -> Session -> read('search_prod_divn_code'));
		}
		if ($this -> Session -> check('search_prod_group_code') && $this -> Session -> read('search_prod_group_code') != '') {
			$conditions['conditions'][] = array('ProdCodeGroup.group_code' => $this -> Session -> read('search_prod_group_code'));
		}

		if ($this -> Session -> check('search_prod_class_code') && $this -> Session -> read('search_prod_class_code') != '') {
			$conditions['conditions'][] = array('ProdCodeClass.class_code' => $this -> Session -> read('search_prod_class_code'));
		}
		if ($this -> Session -> check('search_prod_class_code_desc_bng') && $this -> Session -> read('search_prod_class_code_desc_bng') != '') {
			$conditions['conditions'][] = array('ProdCodeClass.class_desc_bng LIKE' => '%' . $this -> Session -> read('search_prod_class_code_desc_bng') . '%');
		}
		if ($this -> Session -> check('search_prod_class_code_desc_eng') && $this -> Session -> read('search_prod_class_code_desc_eng') != '') {
			$conditions['conditions'][] = array('ProdCodeClass.class_desc_eng LIKE' => '%' . $this -> Session -> read('search_prod_class_code_desc_eng') . '%');
		}
		if ($this -> Session -> check('search_prod_sub_class_code') && $this -> Session -> read('search_prod_sub_class_code') != '') {
			$conditions['conditions'][] = array('ProdCodeSubClass.sub_class_code' => $this -> Session -> read('search_prod_sub_class_code'));
		}
		if ($this -> Session -> check('search_prod_sub_class_code_desc_bng') && $this -> Session -> read('search_prod_sub_class_code_desc_bng') != '') {
			$conditions['conditions'][] = array('ProdCodeSubClass.sub_class_desc_bng LIKE' => '%' . $this -> Session -> read('search_prod_sub_class_code_desc_bng') . '%');
		}
		if ($this -> Session -> check('search_prod_sub_class_code_desc_eng') && $this -> Session -> read('search_prod_sub_class_code_desc_eng') != '') {
			$conditions['conditions'][] = array('ProdCodeSubClass.sub_class_desc_eng LIKE' => '%' . $this -> Session -> read('search_prod_sub_class_code_desc_eng') . '%');
		}

		$conditions['fields'] = array('ProdCodeSection.section_code', 'ProdCodeDivn.divn_code', 'ProdCodeDivn.divn_desc_bng', 'ProdCodeGroup.group_code', 'ProdCodeGroup.group_desc_bng', 'ProdCodeClass.class_code', 'ProdCodeClass.class_desc_bng', 'ProdCodeClass.class_desc_eng', 'ProdCodeSubClass.sub_class_code', 'ProdCodeSubClass.sub_class_desc_bng', 'ProdCodeSubClass.sub_class_desc_eng');

		$this -> paginate = $conditions;

		$ProdCodeSections = $this -> paginate('ProdCodeSection');

		$this -> set(compact('ProdCodeSections'));
	}

	public function get_isic_code() {
		$_SESSION["MenuActive"] = 7;

	}

	//For Ajax Request=======================================

	public function getZila() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodeZila');
		$GeoCodeZilas = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.geo_code_divn_id =' => $_REQUEST['geo_code_divn_id']), 'fields' => array('GeoCodeZila.id', 'GeoCodeZila.zila_code', 'GeoCodeZila.zila_name'), 'order' => 'GeoCodeZila.zila_name'));
		echo json_encode($GeoCodeZilas);
	}

	public function getUpaZila() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodeUpazila');

		$GeoCodeUpazilas = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id =' => $_REQUEST['geo_code_zila_id']), 'fields' => array('GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_code', 'GeoCodeUpazila.upzila_name'), 'order' => 'GeoCodeUpazila.upzila_name'));

		echo json_encode($GeoCodeUpazilas);
	}

	public function getUnion() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodeUnion');
		$GeoCodeUnions = $this -> GeoCodeUnion -> find('all', array('conditions' => array('GeoCodeUnion.geo_code_upazila_id =' => $_REQUEST['geo_code_upazila_id']), 'fields' => array('GeoCodeUnion.id', 'GeoCodeUnion.union_code', 'GeoCodeUnion.union_name'), 'order' => 'GeoCodeUnion.union_name'));
		
		echo json_encode($GeoCodeUnions);
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

	public function getPSA() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodePsa');
		$GeoCodePsas = $this -> GeoCodePsa -> find('all', array('conditions' => array('GeoCodePsa.geo_code_upazila_id =' => $_REQUEST['geo_code_upazila_id']), 'order' => 'GeoCodePsa.psa_name'));
		echo json_encode($GeoCodePsas);
	}

	public function getMuza() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodeUnion');
		$this -> loadModel('GeoCodeRmo');
		$this -> loadModel('GeoCodeMauza');

		$GeoCodeMuzas = $this -> GeoCodeMauza -> find('all', array('conditions' => array('GeoCodeMauza.geo_code_union_id =' => $_REQUEST['geo_code_union_id']), 'fields' => array('GeoCodeMauza.id', 'GeoCodeMauza.mauza_code', 'GeoCodeMauza.mauza_name'), 'order' => 'GeoCodeMauza.mauza_name'));
		echo json_encode($GeoCodeMuzas);
	}

	public function getVillages() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('GeoCodeRmo');
		$this -> loadModel('GeoCodeMauza');
		$this -> loadModel('GeoCodeVillage');

		$GeoCodeVillages = $this -> GeoCodeVillage -> find('all', array('conditions' => array('GeoCodeVillage.muza_id =' => $_REQUEST['geo_code_muza_id']), 'fields' => array('GeoCodeVillage.id', 'GeoCodeVillage.village_code', 'GeoCodeVillage.village_name'), 'order' => 'GeoCodeVillage.village_name', 'GeoCodeVillage.village_code'));

		echo json_encode($GeoCodeVillages);
	}

	public function getBooks() {
		$this -> autoRender = false;
		$this -> layout = false;

		$this -> loadModel('Book');

		$Books = $this -> Book -> find('list', array('conditions' => array('Book.geo_code_union_id =' => $_REQUEST['geo_code_union_id']), 'fields' => array('Book.id'), 'order' => 'Book.id'));

		echo json_encode($Books);
	}

	public function isic_pdf() {

		$this -> set('title_for_layout', 'ISIC');

		$this -> viewClass = 'Media';
		$params = array('id' => 'isic.pdf', 'name' => 'pdf', 'download' => false, 'extension' => 'pdf', 'path' => APP . 'outside_webroot_dir' . DS);
		$this -> set($params);
	}

}
		