<?php
/**
 * GeoCodePsaFixture
 *
 */
class GeoCodePsaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary', 'comment' => 'Sequencial unique number (ascii)'),
		'geo_code_upazila_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'comment' => 'Foreign key, from geo code upazila table (ascii)'),
		'psa_code' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'comment' => 'Predefined two digit, 0 filled paurosava identification code (ascii)'),
		'psa_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'ascii_general_ci', 'comment' => 'Name of the geo upazila in english (ascii)', 'charset' => 'ascii'),
		'geo_code_rmo_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => 'Foreign key, from geo code rmo table (ascii)'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'ascii', 'collate' => 'ascii_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'geo_code_upazila_id' => 1,
			'psa_code' => 1,
			'psa_name' => 'Lorem ipsum dolor sit amet',
			'geo_code_rmo_id' => 1
		),
	);

}
