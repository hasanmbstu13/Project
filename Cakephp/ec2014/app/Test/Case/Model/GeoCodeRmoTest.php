<?php
App::uses('GeoCodeRmo', 'Model');

/**
 * GeoCodeRmo Test Case
 *
 */
class GeoCodeRmoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.geo_code_rmo',
		'app.geo_code_mauza',
		'app.geo_code_psa',
		'app.geo_code_union'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GeoCodeRmo = ClassRegistry::init('GeoCodeRmo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GeoCodeRmo);

		parent::tearDown();
	}

}
