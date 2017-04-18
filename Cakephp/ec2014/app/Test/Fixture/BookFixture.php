<?php
/**
 * BookFixture
 *
 */
class BookFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'book_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'geo_code_divn_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'geo_code_zila_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'geo_code_upazila_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'geo_code_rmo_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'geo_code_psa_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'geo_code_union_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'entry_by' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'book_code' => 'Lorem ipsum dolor sit amet',
			'geo_code_divn_id' => 1,
			'geo_code_zila_id' => 1,
			'geo_code_upazila_id' => 1,
			'geo_code_rmo_id' => 1,
			'geo_code_psa_id' => 1,
			'geo_code_union_id' => 1,
			'entry_by' => 'Lorem ipsum dolor sit amet',
			'updated' => '2013-11-02 12:31:18',
			'modified' => '2013-11-02 12:31:18'
		),
	);

}
