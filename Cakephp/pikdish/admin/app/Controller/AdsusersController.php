<?PHP
App::uses('AppController','Controller');


class AdsusersController extends AppController
{
	public function beforeFilter()
	{
	    parent::beforeFilter();

	   	$this->Auth->allow('logout', 'forgot_password', 'request_new_password', 'reset_password', 'perform_reset_password','register','activate');
	}


	public function isAuthorized($user) 
	{

	  return parent::isAuthorized($user);
		 return true;
	}
     

	public function index(){
		// $this->loadModel('BusinessType');

		// $get_all = $this->BusinessType->find('all');

		// // var_dump($get_all); exit;

		// $this->set(compact('get_all'));

	}

	public function getState($id)
	{
		$this->loadModel('State');
		$states=$this->State->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1,"country_id"=>$id)));
		$options="";
		foreach($states as $id=>$name)
		{
			$options.="<option value='$id'>$name</option>";
			
			
		}
		echo $options;
		exit;
	}
	public function getCity($id)
	{
		$this->loadModel('City');
		$states=$this->City->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1,"state_id"=>$id)));
		$options="";
		foreach($states as $id=>$name)
		{
			$options.="<option value='$id'>$name</option>";
			
			
		}
		echo $options;
		exit;
	}

		public function checkUser($email)
		{
			$this->loadModel('User');
			$this->loadModel('Restaurant');
			$user=$this->User->find('list',array("conditions"=>array(
			"or"=>array(
			"username"=>$email,
			"email"=>$email
			)
			)));
			$re_mail = $this->Restaurant->find('list',array('conditions'=>array('email'=>$email)));
			if($user!=null || $re_mail!=null)
			{
				 $data = Array(
		            "message" => "Username already exists. Please specify a different username.",
		            "status" => "error"
	            );
			}
				else
				{
					$data = Array(
		            "message" => "This username is available",
		            "status" => "ok"
	            );
				}
				echo json_encode($data);
				exit;
			}
			
			
			public function checkmobile($mobile)
		   {
			 $this->loadModel('User');
			 $this->loadModel('Restaurant');
			 
		    $user=$this->User->find('list',array("conditions"=>array("mobile_no"=>$mobile)));
			$re_mobile = $this->Restaurant->find('list',array('conditions'=>array('mobile_no'=>$mobile)));
			 
			 if($user!=null || $re_mobile != null)
			 {
				 $data = Array(
		            "message" => "This mobile no is already used. Please specify a different mobile no.",
		            "status" => "error"
	            );
			 }
				else
				{
					$data = Array(
		            "message" => "This mobile no is available",
		            "status" => "ok"
	            );
				}
				echo json_encode($data);
				exit;
			}

	public function add()
	{
		$this->loadModel('AdsUser');
		$this->loadModel('Country');
		$this->loadModel('BusinessType');
	    $this->loadModel('Restaurant');

		$countries=$this->Country->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1)));
		$this->set('countries',$countries);
		$title = "Ads User";
		$this->set("title",$title);

		if($this->request->is('post') || $this->request->is('put'))
		{
			
			$data = $this->request->data;
			$data['AdsUser']['user_id'] = (int) AuthComponent::user('id');
			$this->AdsUser->create();

			if ($this->AdsUser->save($data)) 
			{
			
						$this->Session->setFlash(__('You have successfully added business type.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'add' ));
			}
			else
			{
						$this->Session->setFlash(__('Please review the fields and try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'add' ));
			}
			
		}

		$all_users = $this->User->find('all', array(
			 'fields' => array(
			 					'User.id',
			 					'User.name'
			 				  )
			)
		);

		if(count($all_users) > 0){
			$users = array();
			foreach ($all_users as $user) {
				$users[$user['User']['id']] = $user['User']['name'];
			}
		}

		$all_buisness_type = $this->BusinessType->find('all', array(
				 'fields' => array(
				 					'BusinessType.id',
				 					'BusinessType.business_type'
				 				  )
				)
		);

		if(count($all_buisness_type) > 0){
			$buis_types = array();
			foreach ($all_buisness_type as $buis) {
				$buis_types[$buis['BusinessType']['id']] = $buis['BusinessType']['business_type'];
			}
		}

		$id = (int) AuthComponent::user('id');

		$restaurant = $this->Restaurant->find('all', array(
											'fields' => "Restaurant.id",
											'conditions' => array(
												'Restaurant.user_id' => $id
												),
									  	  ));

		$restaurant = array_shift($restaurant); 
		$restaurant_id = (int) $restaurant['Restaurant']['id'];
		$this -> set(compact('users','buis_types','restaurant_id'));
	}

	public function edit()
	{
		 $this->loadModel('AdsUser');
		 if($this->request->is('put') || $this->request->is('post'))
		 { 
		 	$data = $this->request->data;
			
			$this->AdsUser->create();
			if ($this->AdsUser->save($data)) 
			{
			
						$this->Session->setFlash(__('You have successfully updated ads user.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'edit/id/'.$data['AdsUser']['id'] ));
			}
			else
			{
						$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'edit/id/'.$data['AdsUser']['id'] ));
			}
			
		
		 }
		 else
		 {	
		  
		  $id= $this->passedArgs[1];
		  
		  $this->loadModel('Country');
		  $countries=$this->Country->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1)));
		  $this->set('countries',$countries);
		  
		  // $this->loadModel('User');
		  // $users=$this->User->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1)));
		  // $this->set('users',$users);
			
		  $options = array('conditions' => array('AdsUser.id' =>  $id));
		  $this->request->data = $this->AdsUser->find('first', $options);
		
	      $this->loadModel('State');
		  $states=$this->State->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1,"country_id"=>$this->request->data['AdsUser']['country_id'])));	
		  $this->set('states',$states);
		  $this->loadModel('City');
		  $cities=$this->City->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1,"state_id"=>$this->request->data['AdsUser']['state_id'])));
		  $this->set('cities',$cities);


		  $all_users = $this->User->find('all', array(
		  	 'fields' => array(
		  	 					'User.id',
		  	 					'User.name'
		  	 				  )
		  	)
		  );

		  if(count($all_users) > 0){
		  	$users = array();
		  	foreach ($all_users as $user) {
		  		$users[$user['User']['id']] = $user['User']['name'];
		  	}
		  }

		  $this->loadModel('BusinessType');

		  $all_buisness_type = $this->BusinessType->find('all', array(
		  		 'fields' => array(
		  		 					'BusinessType.id',
		  		 					'BusinessType.business_type'
		  		 				  )
		  		)
		  );

		  if(count($all_buisness_type) > 0){
		  	$buis_types = array();
		  	foreach ($all_buisness_type as $buis) {
		  		$buis_types[$buis['BusinessType']['id']] = $buis['BusinessType']['business_type'];
		  	}
		  }

		  $this->loadModel('Restaurant');

		  $id = (int) AuthComponent::user('id');

		  $restaurant = $this->Restaurant->find('all', array(
		  									'fields' => "Restaurant.id",
		  									'conditions' => array(
		  										'Restaurant.user_id' => $id
		  										),
		  							  	  ));

		  $restaurant = array_shift($restaurant); 
		  $restaurant_id = (int) $restaurant['Restaurant']['id'];

		  $this -> set(compact('users','buis_types','restaurant_id'));

		  
			
		}
			
	}

	public function delete($id)
	{
	    $this->loadModel('AdsUser');	
		$this->AdsUser->id = $id;
		
		// if($this->request->is('post'))
		// {
			if($this->AdsUser->delete())
	        {
	         $data = Array(
	            "message" => "Ads User has been successfully deleted",
	            "status" => "ok"
	             );
	        }
			else 
			 {
		         $data = Array(
		            "message" => "Ads User could not be deleted",
		            "status" => "error"
		            );
		       }
	    // }
	    
		
		echo json_encode($data);
		exit;
	}

	public function getJson()
	{
		 // $this->request->onlyAllow('ajax'); // No direct access via browser URL
 		 // $this->layout = null ;
		  
	      $this->loadModel('AdsUser');
		  $r = $_GET;  	  
		  $page=$r['page'];
		  $rp=$r['rows'];
		  $sortorder=$r['sord'];
		  $sortname=$r['sidx'];
		  if (!$page) $page = 1;
		  if (!$rp) $rp = 20; 
		  $start = (($page-1) * $rp);
		  
		  $where = array("1" => 1);	 
	      $count=count($this->AdsUser->find('list'));
		  if( $count >0 ) 
		  {
		   $total_pages = ceil($count/$rp);
		  }
		  else
		  {
	     	$total_pages = 0;
	      }
	      if ($page > $total_pages) $page=$total_pages;	  
		  if($r['_search'] == 'true')
		  {
			$r['filters'] = str_replace("\\","",$r['filters']);
			$arr = json_decode($r['filters'],true);
			foreach( $arr['rules'] as $index => $data)
			{
			 
			  $where[$data['field'].' like']='%'.$data['data'].'%';
			 
			}	    
		   }	  
  	   
	   
	   $result=$this->AdsUser->find('all',array('order'=>$sortname.' '.$sortorder,'limit'=>$rp,'offset'=>$start,"conditions"=>$where));
	   $count=count($result);
	   $json = '{
				"page":'.$page.',
				"total":'.$total_pages.',
				"records":'.$count.',
				"rows":[';
	   foreach($result as $key => $row)
	  {
		  
		   
	    if(($key+1)==$count)
	  {
		$json.='{"id":"'.$row['AdsUser']['id'].'","cell":["'.$row['AdsUser']['person_name'].'","'.$row['AdsUser']['business_name'].'","'.$row['BusinessType']['business_type'].'","'.$row['AdsUser']['business_address'].'","'.$row['Country']['name'].'","'.$row['State']['name'].'","'.$row['City']['name'].'","'.$row['AdsUser']['mobile_no'].'","'.$row['AdsUser']['email'].'"]}';
	  }
	  else
	  {
		$json.='{"id":"'.$row['AdsUser']['id'].'","cell":["'.$row['AdsUser']['person_name'].'","'.$row['AdsUser']['business_name'].'","'.$row['BusinessType']['business_type'].'","'.$row['AdsUser']['business_address'].'","'.$row['Country']['name'].'","'.$row['State']['name'].'","'.$row['City']['name'].'","'.$row['AdsUser']['mobile_no'].'","'.$row['AdsUser']['email'].'"]},';
	  }
    }
		
		
	$json.=']}';	
	echo $json;
	exit;
		
	}

	public function getUserInfo($id){
		$this->loadModel('User');
		$this->loadModel('Country');
		$this->loadModel('State');
		$this->loadModel('City');

		$user = $this->User->find('all', array(
										  'conditions' => array(
										  	'User.id' => $id
										 )
								   ));


		$get_state = $this->State->find('all', array(
										'fields' => array(
						 					'State.name'
						 				  ),
										  'conditions' => array(
										  	'State.id' => $user['0']['User']['state_id']
										  )
								   ));


		$get_city = $this->City->find('all', array(
										'fields' => array(
						 					'City.name'
						 				  ),
										  'conditions' => array(
										  	'City.id' => $user['0']['User']['city_id']
										  )
								   ));

		// var_dump($get_state['0']['State']['name']); exit;
		$user_info = array();
		$user_info['country'] = (!empty($user['0']['User']['country_id'])) ? $user['0']['User']['country_id'] : null;
		$user_info['state_code'] = (!empty($user['0']['User']['state_id'])) ? $user['0']['User']['state_id'] : null;
		$user_info['state_name'] = (!empty($get_state['0']['State']['name'])) ? $get_state['0']['State']['name'] : null;
		$user_info['city_code'] = (!empty($user['0']['User']['city_id'])) ? $user['0']['User']['city_id'] : null;
		$user_info['city_name'] = (!empty($get_city['0']['City']['name'])) ? $get_city['0']['City']['name'] : null;
		$user_info['mobile_no'] = (!empty($user['0']['User']['mobile_no'])) ? $user['0']['User']['mobile_no'] : null;
		$user_info['email'] =     (!empty($user['0']['User']['email'])) ? $user['0']['User']['email'] : null;

		$data = json_encode($user_info); 
		echo $data;
		exit;
	}
	
	public function getExistingUserInfo($id){

		$this->loadModel('Restaurant');
		$this->loadModel('Country');
		$this->loadModel('State');
		$this->loadModel('City');

		$restaurant = $this->Restaurant->find('all', array(
								  'conditions' => array(
								  	'Restaurant.id' => $id
								 )
						   ));

		$get_state = $this->State->find('all', array(
										'fields' => array(
						 					'State.name'
						 				  ),
										  'conditions' => array(
										  	'State.id' => $restaurant['0']['Restaurant']['state_id']
										  )
								   ));


		$get_city = $this->City->find('all', array(
										'fields' => array(
						 					'City.name'
						 				  ),
										  'conditions' => array(
										  	'City.id' => $restaurant['0']['Restaurant']['city_id']
										  )
								   ));

			$existing_user = array();
			$existing_user['country'] = $restaurant['0']['Restaurant']['country_id'];
			$existing_user['user_id'] = $restaurant['0']['Restaurant']['user_id'];
			$existing_user['user_name'] = $restaurant['0']['Restaurant']['contact_person'];
			$existing_user['state_code'] = $restaurant['0']['Restaurant']['state_id'];
			$existing_user['state_name'] = $get_state['0']['State']['name'];
			$existing_user['city_code'] = $restaurant['0']['Restaurant']['city_id'];
			$existing_user['city_name'] = $get_city['0']['City']['name'];
		    $existing_user['mobile_no'] = $restaurant['0']['Restaurant']['mobile_no'];
			$existing_user['email'] = $restaurant['0']['Restaurant']['email'];

			$data = json_encode($existing_user); 
			echo $data;
			exit;


	}

}

