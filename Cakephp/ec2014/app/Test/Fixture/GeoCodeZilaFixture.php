<?php
/**
 * GeoCodeZilaFixture
 *
 */
class GeoCodeZilaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary', 'comment' => 'Sequencial unique number (ascii)'),
		'geo_code_divn_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'comment' => 'Foreign key, from geo code division table (ascii)'),
		'zila_code' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'comment' => 'Predefined two digit, 0 filled zila identification code (ascii)'),
		'zila_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'comment' => 'Name of the geo zila in english (ascii)', 'charset' => 'latin1'),
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
			'geo_code_divn_id' => 1,
			'zila_code' => 1,
			'zila_name' => 'Lorem ipsum dolor sit amet'
		),
	);

}
