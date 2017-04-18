<?php
App::uses('Book', 'Model');

/**
 * Book Test Case
 *
 */
class BookTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.book',
		'app.geo_code_divn',
		'app.geo_code_zila',
		'app.geo_code_upazila',
		'app.geo_code_rmo',
		'app.geo_code_mauza',
		'app.geo_code_psa',
		'app.geo_code_union',
		'app.book_organization',
		'app.questionaire'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Book = ClassRegistry::init('Book');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Book);

		parent::tearDown();
	}

}
