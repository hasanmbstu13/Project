<?php
/**
 * GeoCodeUpazilaFixture
 *
 */
class GeoCodeUpazilaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary', 'comment' => 'Sequencial unique number (ascii)'),
		'geo_code_zila_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary', 'comment' => 'Foreign key, from geo code zila table (ascii)'),
		'upzila_code' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'comment' => 'Predefined two digit, 0 filled upazila identification code (ascii)'),
		'upzila_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'comment' => 'Name of the geo upazila in english (ascii)', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'geo_code_zila_id'), 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
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
			'geo_code_zila_id' => 1,
			'upzila_code' => 1,
			'upzila_name' => 'Lorem ipsum dolor sit amet'
		),
	);

}
