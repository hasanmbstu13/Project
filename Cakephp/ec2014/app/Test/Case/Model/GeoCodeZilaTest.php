<?php
App::uses('GeoCodeZila', 'Model');

/**
 * GeoCodeZila Test Case
 *
 */
class GeoCodeZilaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.geo_code_zila',
		'app.geo_code_divn',
		'app.book',
		'app.geo_code_upazila'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GeoCodeZila = ClassRegistry::init('GeoCodeZila');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GeoCodeZila);

		parent::tearDown();
	}

}
