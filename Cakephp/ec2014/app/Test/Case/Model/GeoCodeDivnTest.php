<?php
App::uses('GeoCodeDivn', 'Model');

/**
 * GeoCodeDivn Test Case
 *
 */
class GeoCodeDivnTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.geo_code_divn',
		'app.geo_code_zila'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GeoCodeDivn = ClassRegistry::init('GeoCodeDivn');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GeoCodeDivn);

		parent::tearDown();
	}

}
