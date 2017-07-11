<?PHP
App::uses('AppController','Controller');

class ReconciliationsController extends AppController {

	public function beforeFilter() 
	{
	    parent::beforeFilter();
		$this->path = Router::url('/', true) ;
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

			// $this->loadModel('RestaurantPayment');
			$this->loadModel('RestaurantTransaction');
			// $this->loadModel('OrdersH');
			// $this->loadModel('Restaurant');

			// $final_resto_total = $this->RestaurantPayment->find('all', array(
			// 						'fields' => "SUM(RestaurantPayment.final_restro_amt) as Total ",
			// 						'conditions' => array(
			// 						    'RestaurantPayment.is_post' => 0,
			// 						    'RestaurantPayment.restaurant_transaction_id' => 0   
			// 						    ),
			// 				  	  ));

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

			$total_restaurant = $this->RestaurantTransaction->find('all', array(
									'fields' => "COUNT(*) as Total ",
									'conditions' => array(
										'RestaurantTransaction.bank_trans_code' => 0
										),
							  	  ));

			$total_entries = $this->RestaurantTransaction->find('all', array(
									'fields' => "COUNT(*) as Total ",
									'conditions' => array(
										'RestaurantTransaction.bank_trans_code' => 0
										),
							  	  ));

			// $wallet_payment = $final_resto_total['0']['0']['Total'] + $restaurant_trans_total['0']['0']['Total'];

			// if($restaurant_trans_total['0']['0']['Total'])
			// $restau_trans_all = $this->RestaurantTransaction->find('all');

			$restau_trans_selected = $this->RestaurantTransaction->find('all', array(
										  'conditions' => array(
										  	'RestaurantTransaction.bank_trans_code' => 0
										  	)
									  ));

			// $curr_user_restuarant_id = (int) $this->Session->read('restro_id');

			// var_dump($total_rows_trans_cash); exit;

			// var_dump($pending_payment); exit;

			$this -> set(compact('restaurant_trans_total', 'total_restaurant', 'total_entries', 'restau_trans_all','restau_trans_selected'));

		}

	public function export_data(){
		// $components = array('Export.Export');

		$this->loadModel('RestaurantTransaction');
		$this->loadModel('Restaurant');

		$data = $this->RestaurantTransaction->find('all', array(
			 'fields' => array(
			 					'Restaurant.restaurant_name AS Restaurant_Name',
			 					'RestaurantTransaction.restro_vch_no AS Restaurant_Vch_No',
			 					'RestaurantTransaction.pikdish_vch_no AS Pikdish_Vch_No',
			 					'RestaurantTransaction.ref AS Ref',
			 					'RestaurantTransaction.cr_amt AS Amount'

			 				  ),

			 'conditions' => array(
			 	'RestaurantTransaction.bank_trans_code' => 0
			 	)
			)
		);

		// var_dump($data); exit;

		$this->Export->exportCsv($data, 'reconciliations.csv');
	}


}


