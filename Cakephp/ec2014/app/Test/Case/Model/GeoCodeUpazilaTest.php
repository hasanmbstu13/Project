<?php
App::uses('GeoCodeUpazila', 'Model');

/**
 * GeoCodeUpazila Test Case
 *
 */
class GeoCodeUpazilaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.geo_code_upazila',
		'app.geo_code_zila',
		'app.geo_code_divn',
		'app.book'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GeoCodeUpazila = ClassRegistry::init('GeoCodeUpazila');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GeoCodeUpazila);

		parent::tearDown();
	}

}
