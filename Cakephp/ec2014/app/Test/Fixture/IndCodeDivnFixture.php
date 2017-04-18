<?php
/**
 * IndCodeDivnFixture
 *
 */
class IndCodeDivnFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary', 'comment' => 'Sequencial unique number (ascii)'),
		'divn_code' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'key' => 'unique', 'comment' => 'Predefined two digit, 0 filled identification coden (ascii)'),
		'divn_code_desc_bng' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 500, 'collate' => 'utf8_unicode_ci', 'comment' => 'Description of the industry division in bangla (unicode)', 'charset' => 'utf8'),
		'entry_by' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'ascii_general_ci', 'charset' => 'ascii'),
		'update_by' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'ascii_general_ci', 'charset' => 'ascii'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'is_synchronize' => array('type' => 'string', 'null' => true, 'default' => 'NO', 'length' => 5, 'collate' => 'ascii_general_ci', 'charset' => 'ascii'),
		'synchronized_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'NewIndex1' => array('column' => 'divn_code', 'unique' => 1)
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
			'divn_code' => 1,
			'divn_code_desc_bng' => 'Lorem ipsum dolor sit amet',
			'entry_by' => 'Lorem ipsum dolor sit amet',
			'update_by' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-11-30 12:22:03',
			'modified' => '2013-11-30 12:22:03',
			'is_synchronize' => 'Lor',
			'synchronized_id' => 1
		),
	);

}
