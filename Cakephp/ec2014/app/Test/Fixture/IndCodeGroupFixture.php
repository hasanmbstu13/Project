<?php
/**
 * IndCodeGroupFixture
 *
 */
class IndCodeGroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary', 'comment' => 'Sequencial unique number (ascii)'),
		'ind_code_divn_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index', 'comment' => 'Foreign key from industry code division table (ascii)'),
		'group_code' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'comment' => 'Predefined three digit, 0 filled identification coden (ascii)'),
		'group_code_desc_bng' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 500, 'collate' => 'utf8_unicode_ci', 'comment' => 'Description of the industry group in bangla (unicode)', 'charset' => 'utf8'),
		'entry_by' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'ascii_general_ci', 'charset' => 'ascii'),
		'update_by' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'ascii_general_ci', 'charset' => 'ascii'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'is_synchronize' => array('type' => 'string', 'null' => true, 'default' => 'NO', 'length' => 5, 'collate' => 'ascii_general_ci', 'charset' => 'ascii'),
		'synchronized_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'NewIndex1' => array('column' => array('ind_code_divn_id', 'group_code'), 'unique' => 1)
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
			'ind_code_divn_id' => 1,
			'group_code' => 1,
			'group_code_desc_bng' => 'Lorem ipsum dolor sit amet',
			'entry_by' => 'Lorem ipsum dolor sit amet',
			'update_by' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-11-30 12:24:53',
			'modified' => '2013-11-30 12:24:53',
			'is_synchronize' => 'Lor',
			'synchronized_id' => 1
		),
	);

}
