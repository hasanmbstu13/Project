<?php
App::uses('GeoCodeUnion', 'Model');

/**
 * GeoCodeUnion Test Case
 *
 */
class GeoCodeUnionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.geo_code_union',
		'app.geo_code_upazila',
		'app.geo_code_zila',
		'app.geo_code_divn',
		'app.book',
		'app.geo_code_rmo',
		'app.geo_code_mauza',
		'app.geo_code_psa'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GeoCodeUnion = ClassRegistry::init('GeoCodeUnion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GeoCodeUnion);

		parent::tearDown();
	}

}
