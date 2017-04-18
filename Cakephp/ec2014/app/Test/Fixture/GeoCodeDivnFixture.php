<?php
/**
 * GeoCodeDivnFixture
 *
 */
class GeoCodeDivnFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary', 'comment' => 'Sequencial unique number (ascii)'),
		'divn_code' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'comment' => 'Predefined two digit, 0 filled identification code (ascii)'),
		'divn_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'comment' => 'Name of the geo division in english (ascii)', 'charset' => 'latin1'),
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
			'divn_code' => 1,
			'divn_name' => 'Lorem ipsum dolor sit amet'
		),
	);

}
