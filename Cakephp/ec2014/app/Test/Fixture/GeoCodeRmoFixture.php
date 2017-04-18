<?php
/**
 * GeoCodeRmoFixture
 *
 */
class GeoCodeRmoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary', 'comment' => 'Sequencial unique number (ascii)'),
		'rmo_code' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'comment' => 'Predefined 1 digit type identification code (ascii)'),
		'rmo_type_eng' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'ascii_general_ci', 'comment' => 'Rmo type/name of the geo rmo in english (ascii)', 'charset' => 'ascii'),
		'rmo_type_bng' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_unicode_ci', 'comment' => 'Rmo type/name of the geo rmo in bangla (unicode)', 'charset' => 'utf8'),
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
			'rmo_code' => 1,
			'rmo_type_eng' => 'Lorem ipsum dolor sit amet',
			'rmo_type_bng' => 'Lorem ipsum dolor sit amet'
		),
	);

}
