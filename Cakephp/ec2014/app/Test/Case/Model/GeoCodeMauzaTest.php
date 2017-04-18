<?php
App::uses('GeoCodeMauza', 'Model');

/**
 * GeoCodeMauza Test Case
 *
 */
class GeoCodeMauzaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.geo_code_mauza',
		'app.geo_code_union',
		'app.geo_code_upazila',
		'app.geo_code_zila',
		'app.geo_code_divn',
		'app.book',
		'app.geo_code_rmo',
		'app.geo_code_psa',
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
		$this->GeoCodeMauza = ClassRegistry::init('GeoCodeMauza');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GeoCodeMauza);

		parent::tearDown();
	}

}
