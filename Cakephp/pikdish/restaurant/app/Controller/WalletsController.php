<?PHP
App::uses('AppController','Controller');


class WalletsController extends AppController
{
	public function beforeFilter()
	{
	    parent::beforeFilter();

	    // Allow users to register and logout. This makes this request public (no login needed)
	   	$this->Auth->allow('logout', 'forgot_password', 'request_new_password', 'reset_password', 'perform_reset_password','register','activate');
	}


	public function isAuthorized($user)
	{

	  return parent::isAuthorized($user);
		 return true;
	}


	public function index()
	{

		$this->loadModel('RestaurantPayment');
		$this->loadModel('RestaurantTransaction');
		$this->loadModel('OrdersH');
		$this->loadModel('Restaurant');

		$final_resto_total = $this->RestaurantPayment->find('all', array(
								'fields' => "SUM(RestaurantPayment.final_restro_amt) as Total ",
								'conditions' => array(
								    'RestaurantPayment.is_post' => 0,
								    'RestaurantPayment.restaurant_transaction_id' => 0   
								    ),
						  	  ));

		// $final_resto_total = $this->RestaurantPayment->find('all', array(
		// 						'fields' => "SUM(RestaurantPayment.final_restro_amt) as Total ",
		// 						'conditions' => array(
		// 						    'OrdersH.order_complete' => 1,
		// 						  	 'OrdersH.payment_recieved' => 1,
		// 						  	 'OrdersH.payment_mode' => 1,
		// 						  	 'OrdersH.is_restaurant_payment' => 0 
		// 						    ),
		// 				  	  ));

		$restaurant_trans_total = $this->RestaurantTransaction->find('all', array(
								'fields' => "SUM(RestaurantTransaction.cr_amt) as Total ",
								'conditions' => array(
									'RestaurantTransaction.bank_trans_code' => 0,
									'RestaurantTransaction.cr_amt >' => 0
									),
						  	  ));

		$wallet_payment = $final_resto_total['0']['0']['Total'] + $restaurant_trans_total['0']['0']['Total'];

		if($restaurant_trans_total['0']['0']['Total'])
			$payment_release_list = $this->RestaurantTransaction->find('all', array(
									  'conditions' => array(
									  	'RestaurantTransaction.bank_trans_code' => 0,
									  	 'RestaurantTransaction.cr_amt >' => 0
									  	)
									));

		$curr_user_restuarant_id = (int) $this->Session->read('restro_id');

		$sql = "SELECT SUM(  `OrdersH`.`net_amt` ) AS Total
				FROM  `pikdish_onlinemenu`.`om_orders_h` AS  `OrdersH` 
				LEFT JOIN  `pikdish_onlinemenu`.`om_restaurant_tables` AS  `RestaurantTables` ON (  `OrdersH`.`restaurant_tables_id` =  `RestaurantTables`.`id` ) 
				LEFT JOIN  `pikdish_onlinemenu`.`om_users` AS  `User` ON (  `OrdersH`.`user_id` =  `User`.`id` ) 
				WHERE  `OrdersH`.`order_complete` =1
				AND  `OrdersH`.`payment_recieved` =1
				AND DATE( OrdersH.entry_date ) =  "."'".date("Y-m-d")."'".
				" AND  `OrdersH`.`restaurant_id` = $curr_user_restuarant_id";

		$today_collection = $this -> OrdersH -> query($sql);

		$sql = "SELECT COUNT(*) AS Total
				FROM  `pikdish_onlinemenu`.`om_restaurant_transaction` AS  `Transaction`  
				WHERE  `Transaction`.`cr_amt` > 0
				AND DATE( Transaction.entry_date ) =  "."'".date("Y-m-d")."'";

		$total_rows_trans_cash = $this -> RestaurantTransaction -> query($sql);

		// var_dump($total_rows_trans_cash); exit;

		// $pending_payment = $this->RestaurantPayment->find('all', array(
		// 							  'conditions' => array(
		// 							  	'OrdersH.order_complete' => 1,
		// 							  	 'OrdersH.payment_recieved' => 1,
		// 							  	 'OrdersH.payment_mode' => 1,
		// 							  	 'OrdersH.is_restaurant_payment' => 0
		// 							  	)
		// 							 ));

		$pending_payment = $this->RestaurantPayment->find('all', array(
									  'conditions' => array(
									  	 'RestaurantPayment.is_post' => 0,
								    	 'RestaurantPayment.restaurant_transaction_id' => 0  
									  	)
									 ));

		// var_dump($pending_payment); exit;

		$this -> set(compact('pending_payment', 'restaurant_trans_total', 'wallet_payment', 'payment_release_list','today_collection', 'total_rows_trans_cash'));

	}

	public function transfer_cash(){
		$this->loadModel('RestaurantPayment');
		$this->loadModel('RestaurantTransaction');
		$this->loadModel('OrdersH');
		$this->loadModel('Restaurant');
		$this->loadModel('Counter');

		$curr_user_restuarant_id = (int) $this->Session->read('restro_id');

		$restau_trans_amount = $this->RestaurantPayment->find('all', array(
									'fields' => "SUM(RestaurantPayment.final_restro_amt) as Total ",
									'conditions' => array(
									    'RestaurantPayment.is_post' => 0,
									    'RestaurantPayment.restaurant_transaction_id' => 0,   
									    'RestaurantPayment.restaurant_id' => $curr_user_restuarant_id   
									    )
							  	  ));

		$restaurant = $this->Restaurant->find('all', array(
							  'fields' => "Restaurant.vch_no",
							  'conditions' => array(
							  	'Restaurant.id' => $curr_user_restuarant_id
							  	)
							));

		$counter = $this->Counter->find('all', array(
							  'fields' => "Counter.vch_no",
							  // 'conditions' => array(
							  // 	'Restaurant.id' => $curr_user_restuarant_id
							  // 	)
							  'limit' => 1
							));

		// Create new record in db
		$data = array(
				'pikdish_vch_no' => $restaurant['0']['Restaurant']['vch_no'] + 1,
				'restaurant_id' =>  $curr_user_restuarant_id,
				'restro_vch_no' => $counter['0']['Counter']['vch_no'] + 1,
				'entry_date' => date("Y-m-d H:i:s",time()),
				'ref' => $restaurant['0']['Restaurant']['vch_no'] + 1,
				'dr_amt' => 0,
				'cr_amt' => (empty($restau_trans_amount['0']['0']['Total']))? 0 : $restau_trans_amount['0']['0']['Total'],
				// 'bank_trans_code' => '',
			);

		$this->RestaurantTransaction->create();

		if($this->RestaurantTransaction->save($data)){
			$last_inserted_trans_id = $this->RestaurantTransaction->getInsertID();
			$data = array(
				// 'restaurant_id' => $curr_user_restuarant_id, 
				'is_post' => 1,
				'restaurant_transaction_id' => $last_inserted_trans_id
			);
			// This will update RestaurantPayment with restaurant_id
			if(

				$this->RestaurantPayment->updateAll($data, array('RestaurantPayment.restaurant_id' => $curr_user_restuarant_id)) &&
				$this->Restaurant->updateAll(array('vch_no' => $counter['0']['Counter']['vch_no'] + 1), array('Restaurant.id' => $curr_user_restuarant_id))

			){
				$this->Session->setFlash(__('Cash is successfully transferred.'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array( 'action' => 'index' ));
			}
		}

	}

}

?>
