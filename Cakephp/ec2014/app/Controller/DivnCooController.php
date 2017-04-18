<?php
App::uses('AppController', 'Controller');

class DivnCooController extends AppController {

	public function index() {
		$this -> loadModel('GeoCodeDivn');
		$this -> loadModel('GeoCodeZila');
		$this -> loadModel('GeoCodeUnion');
		$this -> loadModel('Book');
		$this -> loadModel('Questionaire');
		$this -> loadModel('QuesCheck');
		$this -> loadModel('QuesSixCheck');
		$divnCode = $this -> divn_coo;

		$divnAll = $this -> GeoCodeDivn -> find('all', array('conditions' => array('divn_code' => $divnCode)));

		$divnId = $divnAll[0]['GeoCodeDivn']['id'];

		$zilas = $this -> GeoCodeZila -> find('all', array('conditions' => array('GeoCodeZila.geo_code_divn_id' => $divnId), 'order' => array('GeoCodeZila.zila_name')));

		$totalBooks = $this -> Book -> find('count', array('conditions' => array('Book.geo_code_divn_id =' => $divnId)));

		$totalUnit = 0;

		if ($totalBooks > 0) {
			$conditions = array();
			$bookIds = $this -> Book -> find('all', array('conditions' => array('Book.geo_code_divn_id' => $divnId), 'fields' => 'Book.id'));

			foreach ($bookIds as $key => $bookId) {
				$conditions[]['Questionaire.book_id'] = $bookId['Book']['id'];
			}
			$conditions = array('OR' => $conditions);
			$totalUnit = $this -> Questionaire -> find('count', array('conditions' => $conditions));
		}

		$totalDeoWork = $this -> Questionaire -> find('all', array('conditions' => array('Book.geo_code_divn_id' => $divnId), 'fields' => 'DISTINCT Questionaire.entry_by'));

		$totalDeoWork = count($totalDeoWork);

		$totalSup = array();

		$QuesSixCheck = $this -> Questionaire -> find('all', array('conditions' => array('Book.geo_code_divn_id' => $divnId, 'QuesSixCheck.entry_by <>' => ''), 'fields' => 'DISTINCT QuesSixCheck.entry_by'));

		foreach ($QuesSixCheck as $key => $value) {
			$totalSup[] = $value['QuesSixCheck']['entry_by'];
		}

		$QuesCheck = $this -> Questionaire -> find('all', array('conditions' => array('Book.geo_code_divn_id' => $divnId, 'QuesCheck.entry_by <>' => ''), 'fields' => 'DISTINCT QuesSixCheck.entry_by'));
		foreach ($QuesSixCheck as $key => $value) {
			$totalSup[] = $value['QuesCheck']['entry_by'];
		}

		$totalSup = array_unique($totalSup);

		$totalSup = count($totalSup);

		$this -> set(compact('totalBooks', 'totalUnit', 'zilas', 'totalDeoWork', 'totalSup'));

	}

	public function findupazilas($id) {

		$this -> loadModel('GeoCodeZila');
		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel('GeoCodeUnion');
		$this -> loadModel('Book');
		$this -> loadModel('Questionaire');
		$this -> loadModel('QuesCheck');
		$this -> loadModel('QuesSixCheck');

		$totalBooks = $this -> Book -> find('count', array('conditions' => array('Book.geo_code_zila_id =' => $id)));

		$totalUnit = 0;

		if ($totalBooks > 0) {

			$conditions = array();

			$bookIds = $this -> Book -> find('all', array('conditions' => array('Book.geo_code_zila_id' => $id), 'fields' => 'Book.id'));

			foreach ($bookIds as $key => $bookId) {
				$conditions[]['Questionaire.book_id'] = $bookId['Book']['id'];
			}

			$conditions = array('OR' => $conditions);

			$totalUnit = $this -> Questionaire -> find('count', array('conditions' => $conditions));

		}

		$upzilas = $this -> GeoCodeUpazila -> find('all', array('conditions' => array('GeoCodeUpazila.geo_code_zila_id' => $id), 'fields' => array('GeoCodeZila.zila_name', 'GeoCodeUpazila.id', 'GeoCodeUpazila.upzila_name'), 'order' => array('GeoCodeUpazila.upzila_name')));

		$totalDeoWork = $this -> Questionaire -> find('all', array('conditions' => array('Book.geo_code_zila_id' => $id), 'fields' => 'DISTINCT Questionaire.entry_by'));

		$totalDeoWork = count($totalDeoWork);

		$totalSup = array();

		$QuesSixCheck = $this -> Questionaire -> find('all', array('conditions' => array('Book.geo_code_zila_id' => $id, 'QuesSixCheck.entry_by <>' => ''), 'fields' => 'DISTINCT QuesSixCheck.entry_by'));

		foreach ($QuesSixCheck as $key => $value) {
			$totalSup[] = $value['QuesSixCheck']['entry_by'];
		}

		$QuesCheck = $this -> Questionaire -> find('all', array('conditions' => array('Book.geo_code_zila_id' => $id, 'QuesCheck.entry_by <>' => ''), 'fields' => 'DISTINCT QuesSixCheck.entry_by'));
		foreach ($QuesSixCheck as $key => $value) {
			$totalSup[] = $value['QuesCheck']['entry_by'];
		}

		$totalSup = array_unique($totalSup);

		$totalSup = count($totalSup);

		$this -> set(compact('totalBooks', 'totalUnit', 'upzilas', 'totalDeoWork', 'totalSup'));
	}

	public function findunions($id) {

		$this -> loadModel('GeoCodeUpazila');
		$this -> loadModel('GeoCodeUnion');
		$this -> loadModel('Book');
		$this -> loadModel('Questionaire');

		$totalBooks = $this -> Book -> find('count', array('conditions' => array('Book.geo_code_upazila_id =' => $id)));

		$totalUnit = 0;

		if ($totalBooks > 0) {

			$conditions = array();

			$bookIds = $this -> Book -> find('all', array('conditions' => array('Book.geo_code_upazila_id' => $id), 'fields' => 'Book.id'));

			foreach ($bookIds as $key => $bookId) {
				$conditions[]['Questionaire.book_id'] = $bookId['Book']['id'];
			}

			$conditions = array('OR' => $conditions);

			$totalUnit = $this -> Questionaire -> find('count', array('conditions' => $conditions));

		}

		$unions = $this -> GeoCodeUnion -> find('all', array('conditions' => array('GeoCodeUnion.geo_code_upazila_id' => $id), 'fields' => array('GeoCodeUpazila.upzila_name', 'GeoCodeUnion.id', 'GeoCodeUnion.union_name'), 'order' => array('GeoCodeUnion.union_name')));

		$totalDeoWork = $this -> Questionaire -> find('all', array('conditions' => array('Book.geo_code_upazila_id' => $id), 'fields' => 'DISTINCT Questionaire.entry_by'));

		$totalDeoWork = count($totalDeoWork);

		$totalSup = array();

		$QuesSixCheck = $this -> Questionaire -> find('all', array('conditions' => array('Book.geo_code_upazila_id' => $id, 'QuesSixCheck.entry_by <>' => ''), 'fields' => 'DISTINCT QuesSixCheck.entry_by'));

		foreach ($QuesSixCheck as $key => $value) {
			$totalSup[] = $value['QuesSixCheck']['entry_by'];
		}

		$QuesCheck = $this -> Questionaire -> find('all', array('conditions' => array('Book.geo_code_upazila_id' => $id, 'QuesCheck.entry_by <>' => ''), 'fields' => 'DISTINCT QuesSixCheck.entry_by'));
		foreach ($QuesSixCheck as $key => $value) {
			$totalSup[] = $value['QuesCheck']['entry_by'];
		}

		$totalSup = array_unique($totalSup);

		$totalSup = count($totalSup);

		$this -> set(compact('totalBooks', 'totalUnit', 'unions', 'totalDeoWork', 'totalSup'));

	}

	public function findbooks($id) {
		$this -> loadModel('GeoCodeUnion');
		$this -> loadModel('Book');
		$this -> loadModel('Questionaire');

		$unions = $this -> GeoCodeUnion -> find('all', array('conditions' => array('GeoCodeUnion.id' => $id)));

		$totalBooks = $this -> Book -> find('count', array('conditions' => array('Book.geo_code_union_id =' => $id)));

		$totalUnit = 0;

		if ($totalBooks > 0) {

			$conditions = array();

			$bookIds = $this -> Book -> find('all', array('conditions' => array('Book.geo_code_union_id' => $id), 'fields' => 'Book.id'));


			foreach ($bookIds as $key => $bookId) {
				$conditions[]['Questionaire.book_id'] = $bookId['Book']['id'];
			}

			$conditions = array('OR' => $conditions);

			$totalUnit = $this -> Questionaire -> find('count', array('conditions' => $conditions));
		}

		$books = $this -> Book -> find('all', array('conditions' => array('Book.geo_code_union_id' => $id), 'fields' => array('Book.id', 'GeoCodeUnion.id', 'GeoCodeUnion.union_name')));

		$totalDeoWork = $this -> Questionaire -> find('all', array('conditions' => array('Book.geo_code_union_id' => $id), 'fields' => 'DISTINCT Questionaire.entry_by'));

		$totalDeoWork = count($totalDeoWork);

		$totalSup = array();

		$QuesSixCheck = $this -> Questionaire -> find('all', array('conditions' => array('Book.geo_code_union_id' => $id, 'QuesSixCheck.entry_by <>' => ''), 'fields' => 'DISTINCT QuesSixCheck.entry_by'));

		foreach ($QuesSixCheck as $key => $value) {
			$totalSup[] = $value['QuesSixCheck']['entry_by'];
		}

		$QuesCheck = $this -> Questionaire -> find('all', array('conditions' => array('Book.geo_code_union_id' => $id, 'QuesCheck.entry_by <>' => ''), 'fields' => 'DISTINCT QuesSixCheck.entry_by'));
		foreach ($QuesSixCheck as $key => $value) {
			$totalSup[] = $value['QuesCheck']['entry_by'];
		}

		$totalSup = array_unique($totalSup);

		$totalSup = count($totalSup);

		$this -> set(compact('totalBooks', 'totalUnit', 'books', 'unions', 'totalDeoWork', 'totalSup'));

	}

}
	