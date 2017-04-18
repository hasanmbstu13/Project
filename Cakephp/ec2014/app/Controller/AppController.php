<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	var $supervisor_upazila;
	var $helpers = array('Form', 'Time', 'Html', 'Session', 'Js', 'Authake.Authake');
	var $components = array('Session', 'RequestHandler', 'Authake.Authake', 'DebugKit.Toolbar', 'Paginator');
	var $counter = 0;

	function beforeFilter() {
		putenv("NLS_LANG=AMERICAN_AMERICA.AL32UTF8");
		$this -> auth();

		$exp = explode("_", $this -> Session -> read('Authake.login'));

		$zila = substr($exp[0], 0, 2);
		$upazila = substr($exp[1], 0, 2);
		$union = substr($exp[2], 0, 2);
		
	

		$this -> supervisor_zila = $zila;
		$this -> supervisor_upazila = $upazila;
		$this -> sup_officer_zila = $zila;

		$this -> operator_zila = $zila;
		$this -> operator_upazila = $upazila;
		$this -> operator_union = $union;

		$this -> divn_coo = $zila;
		$this -> jd_divn = $zila;
	}

	private function auth() {
		putenv("NLS_LANG=AMERICAN_AMERICA.AL32UTF8");
		Configure::write('Authake.useDefaultLayout', true);
		$this -> Authake -> beforeFilter($this);
	}

}
