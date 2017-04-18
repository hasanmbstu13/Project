<?php
App::uses('IndCodeGroup', 'Model');

/**
 * IndCodeGroup Test Case
 *
 */
class IndCodeGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ind_code_group',
		'app.ind_code_divn',
		'app.ind_code_class'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->IndCodeGroup = ClassRegistry::init('IndCodeGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->IndCodeGroup);

		parent::tearDown();
	}

}
