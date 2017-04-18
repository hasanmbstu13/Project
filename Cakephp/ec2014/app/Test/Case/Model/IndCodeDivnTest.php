<?php
App::uses('IndCodeDivn', 'Model');

/**
 * IndCodeDivn Test Case
 *
 */
class IndCodeDivnTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ind_code_divn',
		'app.ind_code_group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->IndCodeDivn = ClassRegistry::init('IndCodeDivn');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->IndCodeDivn);

		parent::tearDown();
	}

}
