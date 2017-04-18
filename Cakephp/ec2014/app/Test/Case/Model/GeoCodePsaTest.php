<?php
App::uses('GeoCodePsa', 'Model');

/**
 * GeoCodePsa Test Case
 *
 */
class GeoCodePsaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.geo_code_psa',
		'app.geo_code_upazila',
		'app.geo_code_zila',
		'app.geo_code_divn',
		'app.book',
		'app.geo_code_rmo',
		'app.geo_code_mauza',
		'app.geo_code_union'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GeoCodePsa = ClassRegistry::init('GeoCodePsa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GeoCodePsa);

		parent::tearDown();
	}

}
