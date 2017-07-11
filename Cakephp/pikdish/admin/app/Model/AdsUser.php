<?PHP
 App::uses('Model','Model');
 
 class AdsUser extends Model
 {
	  public $useTable='ads_users';

	  public $belongsTo = array(
	      'BusinessType' => array(
	          'className' => 'BusinessType',
	          'foreignKey' => 'ads_business_type_id'
	      ),

	      'City' => array(
	          'className' => 'City',
	          'foreignKey' => 'city_id'
	      ),

	      'State' => array(
	          'className' => 'State',
	          'foreignKey' => 'state_id'
	      ),

	      'Country' => array(
	          'className' => 'Country',
	          'foreignKey' => 'country_id'
	      ),
	  );
 }
