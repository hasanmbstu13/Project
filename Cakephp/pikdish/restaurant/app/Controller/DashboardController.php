<?PHP
App::uses('AppController','Controller');

class DashboardController extends AppController
{
	public $components = array('RequestHandler');

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
     
	 
	public function index() {

		$this->loadModel('Item');
		$this->loadModel('Categories');
		$this->loadModel('Restaurant');
		$this->loadModel('RestaurantTables');
		$this->loadModel('RestaurantPayment');
		$this->loadModel('RestaurantTransaction');
		$this->loadModel('OrdersL');
		$this->loadModel('OrdersH');
		$this->loadModel('Feedbacks');

		$categories = $this->Categories->find( 'count', array( 
															"conditions"=>  array(
																" Categories.restaurant_id" => $this->Session->read('restro_id')
															)
														));
		$items = $this->Item->find( 'count', array( "conditions" => array(
																		'Item.restuarant_id'=> $this->Session->read('restro_id') 
																		)
																	));

		$final_resto_total = $this->RestaurantPayment->find('all' , array(
								'fields' => "SUM(RestaurantPayment.final_restro_amt) as Total ",
								'conditions' => array(
								    'RestaurantPayment.is_post' => 0,
								    'RestaurantPayment.restaurant_transaction_id' => 0,   
								    'RestaurantPayment.restaurant_id' => $this->Session->read('restro_id')
								 )
						  	  ));
		
		
		$restaurant_trans_dr_total = $this->RestaurantTransaction->find('all', array(
								'fields' => "SUM(RestaurantTransaction.dr_amt) as Total "
						  	  	));
		//TODO: today Amount
		$wallet = $final_resto_total['0']['0']['Total'] + $restaurant_trans_dr_total['0']['0']['Total'];

		//TODO: today collection
		$today_collection = $this->RestaurantPayment->find('all', array(
									'fields' => "SUM(RestaurantPayment.final_restro_amt) as Total ",
									'conditions' => array(
										'RestaurantPayment.is_post' => 0,
								    	'RestaurantPayment.restaurant_transaction_id' => 0,
								    	'RestaurantPayment.entry_date' => date('Y-m-d'),
										'RestaurantPayment.restaurant_id' => $this->Session->read('restro_id')
										)
								));
		$collection = ( $today_collection['0']['0']['Total'] ) ? $today_collection['0']['0']['Total'] : '0.00';
		//TODO: Pre-Order
		$pre = $this->OrdersH->find('all', array(
								'fields' => "COUNT(OrdersH.order_type) as Total ",
								'conditions' => array(
								    'OrdersH.order_type' => 1,
								    'OrdersH.restaurant_id' => $this->Session->read('restro_id')
								 )
						  	  ));
		$pre_order = ( $pre['0']['0']['Total'] ) ? $pre['0']['0']['Total'] : '0' ;
		
		//TODO: PACKING
		$packing = $this->OrdersH->find('all', array(
								'fields' => "COUNT(OrdersH.id) as Total  ",
								'conditions' => array(
								    'OrdersH.order_type' => 0,
								    'OrdersH.restaurant_id' => $this->Session->read('restro_id')
								 )
						  	  ));
		$order_packing = ( $packing['0']['0']['Total'] ) ? $packing['0']['0']['Total'] : '0' ;

		$most_cancel = $this->OrdersL->find('all', array(
								'conditions' => array(
								    'OrdersL.is_cancel' => 1,
								    'OrdersH.restaurant_id' => $this->Session->read('restro_id')
								 ),
								'limit' => 5,
								'fields' => array("OrdersL.id","OrdersL.item_name","COUNT(OrdersL.is_cancel) as 'cancel'"),
								'group' => "OrdersL.id"
						  	  ));
		//TODO: Rating
		$rating = $this->Restaurant->find('all',array(
												'conditions' => array(
													'Restaurant.id' => $this->Session->read('restro_id')
													),
												'fields' => "rating"
												));
		//TODO: Feedback
		$feedbacks = $this->Feedbacks->find('all', array(
									'limit' => 5,
									'order' => array('Feedbacks.id' => 'desc'),
									'conditions' => array('Feedbacks.restaurant_id' => $this->Session->read('restro_id') )
							));
		//TODO: weekly sale graph
		$weekly_sales = $this->RestaurantPayment->find('all',array(
												'conditions' => array(
													'RestaurantPayment.entry_date >' => date('Y-m-d', strtotime("-1 weeks") ), 
													'RestaurantPayment.entry_date <=' => date('Y-m-d'),
													'RestaurantPayment.restaurant_id' =>  $this->Session->read('restro_id')
												),
												'fields' => array("DATE(RestaurantPayment.entry_date) as entry_date", 
															"SUM(RestaurantPayment.total_amt) as 'total'" 
															),
												'group' => array("date_format(RestaurantPayment.entry_date,'%Y-%m-%d')")
											));
		//debug( $weekly_sales );
		//die();
		//TODO: weekly sale graph
		$weekly_number = $this->RestaurantPayment->find('all',array(
												'conditions' => array(
													'RestaurantPayment.entry_date >' => date('Y-m-d', strtotime("-1 weeks") ), 
													'RestaurantPayment.entry_date <=' => date('Y-m-d'),
													'RestaurantPayment.restaurant_id' =>  $this->Session->read('restro_id')
												),
												'fields' => array(
													"DATE(RestaurantPayment.entry_date) as entry_date",
													"COUNT(RestaurantPayment.entry_date) as 'weekly_number'"
												),
												'group' => array("date_format(RestaurantPayment.entry_date,'%Y-%m-%d')")
											));
		//TODO: Popular
		$most_popular = $this->OrdersL->find('all', array(
								'conditions' => array(
								    'OrdersL.restaurant_id' => $this->Session->read('restro_id')
								 ),
								'fields' => array("OrdersL.item_name","SUM(OrdersL.qty) as 'quantity'" ),
								'limit' => 5,
								'group' => array("OrdersL.items_rate_id"),
								'order' => "quantity DESC"
						  	  ));
		//TODO: Table book status
		$table_book_status  = $this->OrdersH->find('all',array(
														'conditions' => array(
															'OrdersH.entry_date <=' => date('Y-m-d'),
															'OrdersH.restaurant_id' => $this->Session->read('restro_id')
															)
													));
		$table_number = $this->RestaurantTables->find('first', array(
													'conditions' => array(
															'RestaurantTables.restaurant_id' => $this->Session->read('restro_id')
														),
													'fields' => "count(RestaurantTables.id) as tables",
													'recursive' => -1,
										));
//		debug( $table_number );

		$this->set( compact('categories','items', 'wallet', 'collection','rating','pre_order','order_packing','most_cancel','most_popular','feedbacks', 'weekly_sales', 'weekly_number','table_book_status', 'table_number' ) );
	}

	public function view() {
		$this->loadModel('OrdersL');
		$this->loadModel('OrdersH');

		$restro_info = $this->viewVars['restro_info'] ; 
		$d = date("Y-m-d H:i:s",time());
		//debug( $d );
		 if($restro_info['Restaurant']['cancel_available'] == 1)
		 {
			$d = date("Y-m-d H:i:s",time()-($restro_info['Restaurant']['auto_cancel_time']*60));
		 }

		$orders = $this->OrdersH->find('all', array(
											'conditions' => array(
												'OrdersH.restaurant_id' => $this->Session->read('restro_id'),
												'OrdersH.is_cancel'=>0,
												'OrdersH.order_complete'=>0,
												'OrdersH.entry_date <= ' => $d,
												),
											'order'=> array( "OrdersH.entry_date" => 'ASC' ),
									));

		$orderTable = $this->OrdersH->find('all', array(
													'conditions' => array(
														'OrdersH.order_type'=> 2,
														'OrdersH.order_complete'=>0,
														'OrdersH.restaurant_id' => $this->Session->read('restro_id'),
														)
											));
		$pending = $this->OrdersH->find('all', array(
													'conditions' => array(
														'OrdersH.order_type'=> array(0,1),
														'OrdersH.order_complete'=>0,
														'OrdersH.restaurant_id' => $this->Session->read('restro_id'),
														)
											));
		//debug( $pending );
		$this->set( compact('orders', 'orderTable') );
	//debug( $orders );
	//die();
	}
	public function getConfirmed( $id ) {

		$this->autoRender = false;
		
		$this->request->allowMethod(array('ajax'));

		$data = array(
				'content' => '',
				'aaa' => '',
			);
		$this->set(compact('data'));
		$this->set('_serialize', 'data' );
	}

}

?>
