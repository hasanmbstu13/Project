<?PHP
App::uses('AppController','Controller');


class AdsuserplansController extends AppController
{
	public function beforeFilter()
	{
	    parent::beforeFilter();

	    // Allow AdsUserPlans to register and logout. This makes this request public (no login needed)
	   	$this->Auth->allow('logout', 'forgot_password', 'request_new_password', 'reset_password', 'perform_reset_password','register','activate');
	}


	public function isAuthorized($user) 
	{

	  return parent::isAuthorized($user);
		 return true;
	}
     

	public function index(){
		// $this->loadModel('AdsUserPlan');

		// $get_all = $this->AdsUserPlan->find('all');

		// // var_dump($get_all); exit;

		// $this->set(compact('get_all'));

	}

	public function upload_img_in_server($images){
		if(count($images) > 0){
			$img_arr = array();

			// var_dump($data['AdsUserPlan']['ad_image_path']); exit;

			foreach ($images as $image) {
				if(!empty($image['name']))
					$img_arr[]=$this->uploadImage('userplanimg',$image['name'],$image['tmp_name'],$image['type'],'ads_user_plan');
			}
		}

		return $img_arr;
	}

	public function add()
	{
		$this->loadModel('AdsUserPlan');
		$this->loadModel('User');
	    $this->loadModel('AdsUser');
		$this->loadModel('AdsPlan');
		
		$title = "User Plan";
		$this->set("title",$title);

		if($this->request->is('post') || $this->request->is('put'))
		{
			
			$data = $this->request->data;

			// var_dump($this->request->data); exit;

			
			$images = $this->upload_img_in_server($data['AdsUserPlan']['ad_image_path']);
			// var_dump($data); exit;
		   if(count($images > 0)){
		   	$image = implode(",", $images);
		   	$data["AdsUserPlan"]["ad_image_path"] = $image;
		   }else{
		   	unset($data["AdsUserPlan"]["ad_image_path"]);
		   }

		 // 	if($photoVal!='Error'){
			// 	$data["AdsUserPlan"]["ad_image_path"] = $photoVal;
			// }else{
			// 	unset($data["AdsUserPlan"]["ad_image_path"]);
			// }

			$data['AdsUserPlan']['plan_start_date'] = date('Y-m-d',strtotime($data['AdsUserPlan']['plan_start_date']));
			$data['AdsUserPlan']['plan_end_date'] = date('Y-m-d',strtotime($data['AdsUserPlan']['plan_end_date']));
			$this->AdsUserPlan->create();

			if ($this->AdsUserPlan->save($data)) 
			{
			
						$this->Session->setFlash(__('You have successfully added ads user plan.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'add' ));
			}
			else
			{
						$this->Session->setFlash(__('Please review the fields and try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'add' ));
			}
			
		}

		$all_users = $this->AdsUser->find('all', array(
			 'fields' => array(
			 					'AdsUser.id',
			 					'AdsUser.person_name'
			 				  )
			)
		);

		if(count($all_users) > 0){
			$users = array();
			foreach ($all_users as $user) {
				$users[$user['AdsUser']['id']] = $user['AdsUser']['person_name'];
			}
		}

		// var_dump($users); exit;

		$all_plans = $this->AdsPlan->find('all', array(
			 'fields' => array(
			 					'AdsPlan.id',
			 					'AdsPlan.plan_name'
			 				  )
			)
		);

		// var_dump($all_plans); exit;

		if(count($all_plans) > 0){
			$plans = array();
			foreach ($all_plans as $plan) {
				$plans[$plan['AdsPlan']['id']] = $plan['AdsPlan']['plan_name'];
			}
		}

		$this -> set(compact('users', 'plans'));

		// var_dump($users); exit;


	}

	public function edit()
	{
			 $this->loadModel('AdsUserPlan');
	   		 // $this->loadModel('AdsUser');

			 if($this->request->is('put') || $this->request->is('post'))
			 { 
			    $data=$this->request->data;

			    // var_dump($this->request->data); exit;
				
				$user_pix=$this->AdsUserPlan->find('first',array('fields'=>array('ad_image_path'),"conditions"=>array("AdsUserPlan.id"=>$data['AdsUserPlan']['id'])));
				

				// $photoVal=$this->uploadImage('userplanimg',$data['AdsUserPlan']['ad_image_path']['name'],$data['AdsUserPlan']['ad_image_path']['tmp_name'],$data['AdsUserPlan']['ad_image_path']['type'],'ads_user_plan');
			   
			 // 	if($photoVal!='Error'){
				// 	unlink('userplanimg/'.$user_pix['AdsUserPlan']['ad_image_path']);
					
				// 	$data["AdsUserPlan"]["ad_image_path"] = $photoVal;
				// }else{
				// 	unset($data["AdsUserPlan"]["ad_image_path"]);
				// }

				
				
				// $images = $this->upload_img_in_server($data['AdsUserPlan']['ad_image_path']);

				// if(count($data['AdsUserPlan']['ad_image_path']) > 0){
				// 	$img_arr = array();
				// 	// var_dump($data['AdsUserPlan']['ad_image_path']); exit;
				// 	foreach ($data['AdsUserPlan']['ad_image_path'] as $image) {
				// 		if(!empty($image['name'])
				// 			$img_arr[]=$this->uploadImage('userplanimg',$image['name'],$image['tmp_name'],$image['type'],'ads_user_plan');
				// 	}
				// }


				$images = $data['AdsUserPlan']['ad_image_path'];
				$saved_images = explode(",", $user_pix['AdsUserPlan']['ad_image_path']);

				if(count($images) > 0){
					// $img_arr = array();

					// var_dump($data['AdsUserPlan']['ad_image_path']); exit;

					foreach ($images as $key => $image) {
						if(!empty($image['name'])){
							if(array_key_exists($key, $saved_images))
								unlink('userplanimg/'.$saved_images[$key]);
							$saved_images[$key]=$this->uploadImage('userplanimg',$image['name'],$image['tmp_name'],$image['type'],'ads_user_plan');
						}
					}
				}

				// var_dump($data); exit;
			   if(count($saved_images) > 0){
			   	$images = implode(",", $saved_images);
			   	if(!empty($images))
			   		$data["AdsUserPlan"]["ad_image_path"] = $images;
			   	else
			   		$data["AdsUserPlan"]["ad_image_path"] =  $user_pix['AdsUserPlan']['ad_image_path'];
			   }else{
			   	unset($data["AdsUserPlan"]["ad_image_path"]);
			   }


				$data['AdsUserPlan']['plan_start_date'] = date('Y-m-d',strtotime($data['AdsUserPlan']['plan_start_date']));
				$data['AdsUserPlan']['plan_end_date'] = date('Y-m-d',strtotime($data['AdsUserPlan']['plan_end_date']));

				$this->AdsUserPlan->create();
				if ($this->AdsUserPlan->save($data)) 
				{
				
							$this->Session->setFlash(__('You have successfully updated ads user plan.'), 'default', array('class'=>'alert alert-success'));
							return $this->redirect(array( 'action' => 'edit/id/'.$data['AdsUserPlan']['id'] ));
				}
				else
				{
							$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
							return $this->redirect(array( 'action' => 'edit/id/'.$data['AdsUserPlan']['id'] ));
				}
				
			
			 }
			 else
			 {	
			  
			  $id= $this->passedArgs[1];
			  
			  $this->loadModel('AdsUser');
			  $users=$this->AdsUser->find('list',array('order'=>'person_name asc','fields'=>array('id','person_name'),'conditions'=>array("1"=>1)));
			  $this->set('users',$users);
			  
			  $this->loadModel('AdsPlan');
			  $plans=$this->AdsPlan->find('list',array('order'=>'plan_name asc','fields'=>array('id','plan_name'),'conditions'=>array("1"=>1)));
			  $this->set('plans',$plans);

			  $options = array('conditions' => array('AdsUserPlan.id' =>  $id));
			  $this->request->data = $this->AdsUserPlan->find('first', $options);

			  $this->request->data['AdsUserPlan']['plan_start_date'] = date('d-m-Y',strtotime( $this->request->data['AdsUserPlan']['plan_start_date']));
			  $this->request->data['AdsUserPlan']['plan_end_date'] = date('d-m-Y',strtotime( $this->request->data['AdsUserPlan']['plan_end_date']));
				
			}
			
	}

	public function delete($id)
	{
	    $this->loadModel('AdsUserPlan');	
		$this->AdsUserPlan->id = $id;
		
		// if($this->request->is('post'))
		// {
			if($this->AdsUserPlan->delete())
	        {
	         $data = Array(
	            "message" => "Ads User Plan has been successfully deleted",
	            "status" => "ok"
	             );
	        }
			else 
			 {
		         $data = Array(
		            "message" => "Ads User Plan could not be deleted",
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
		  
	      $this->loadModel('AdsUserPlan');
	      $this->loadModel('AdsPlan');
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
	      $count=count($this->AdsUserPlan->find('list'));
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
  	   
	   
	   $result=$this->AdsUserPlan->find('all',array('order'=>$sortname.' '.$sortorder,'limit'=>$rp,'offset'=>$start,"conditions"=>$where));
	   $count=count($result);
	   $json = '{
				"page":'.$page.',
				"total":'.$total_pages.',
				"records":'.$count.',
				"rows":[';
	   foreach($result as $key => $row)
	  {
	  	$user_name = $this->AdsUser->find('all', array(
	  							'fields' => "AdsUser.person_name",
	  							'conditions' => array(
	  							    'AdsUser.id' => $row['AdsUserPlan']['ads_user_id'],
	  							    ),
	  					  	  ));

	  	// var_dump($user_name) ; exit;

	  	$plan_name = $this->AdsPlan->find('all', array(
	  							'fields' => "AdsPlan.plan_name",
	  							'conditions' => array(
	  							    'AdsPlan.id' => $row['AdsUserPlan']['ads_plan_id'],
	  							    ),
	  					  	  ));

	  	$start_date = date('Y-m-d',strtotime($row['AdsUserPlan']['plan_start_date']));
	  	$end_date = date('Y-m-d',strtotime($row['AdsUserPlan']['plan_end_date']));

	  	$ads_plan_img = '';
	  	// $images = array();

	  	// var_dump($row['AdsUserPlan']['ad_image_path']); exit;

	  	if(count($plan_name) > 0){
	  		if(!empty($plan_name['0']['AdsUser']['person_name']))
	  			$plan_name = $plan_name['0']['AdsPlan']['plan_name'];
	  		else 
	  			$plan_name = '';
	  	}

	  	if(count($user_name) > 0){
	  		if(!empty($user_name['0']['AdsUser']['person_name']))
	  			$user_name = $user_name['0']['AdsUser']['person_name'];
	  		else 
	  			$user_name = '';
	  	}

	  	 if ($row['AdsUserPlan']['ad_image_path'] !== "") {
	  	 	if(substr_count($row['AdsUserPlan']['ad_image_path'], ',') > 0){
	  	 		$images = explode(",", $row['AdsUserPlan']['ad_image_path']);
	  	 		// var_dump($images); exit;
	  	 	if(count($images) > 0){
	  	 		// var_dump($images);exit;
	  	 		foreach ($images as $image) {
	  	 			// var_dump($image);
	  	 			// var_dump($image);
	  	 			// var_dump($row['AdsUserPlan']['ad_image_path']);
		  			$ads_plan_img .= "<a data-lightbox='example-". $image."' href='".$this->ads_img.$image."'><img  src='".$this->ads_img.$image."'style='width:45px;left:45px;' /></a>";
	  	 	   }
	  	 	}
	  	 }else {
	  	 			// var_dump($row['AdsUserPlan']['ad_image_path']);
	  				// for($i = 1; $i<=2; $i++){
		  				$ads_plan_img .= "<a data-lightbox='example-". $row['AdsUserPlan']['ad_image_path']."' href='".$this->ads_img.$row['AdsUserPlan']['ad_image_path']."'><img  src='".$this->ads_img.$row['AdsUserPlan']['ad_image_path']."'style='width:45px;left:15px;' /></a>";	  	 		
	  				// }
	  	 	}
	  	 }

	  	// var_dump($plan_name); exit;
		  

	    if(($key+1)==$count)
	  {
		$json .= '{"id":"'.$row['AdsUserPlan']['id'].'","cell":["'.$user_name.'","'.$plan_name.'","'.$start_date.'","'.$end_date.'","'.$row['AdsUserPlan']['content_for_ads'].'","'.$row['AdsUserPlan']['url_link'].'","'.$ads_plan_img.'"]}';
	  }
	  else
	  {
		$json .= '{"id":"'.$row['AdsUserPlan']['id'].'","cell":["'.$user_name.'","'.$plan_name.'","'.$start_date.'","'.$end_date.'","'.$row['AdsUserPlan']['content_for_ads'].'","'.$row['AdsUserPlan']['url_link'].'","'.$ads_plan_img.'"]},';
	  }
    }
		
		
	$json.=']}';	
	// var_dump($json); exit;
	echo $json;

	exit;
		
	}


	   function uploadImage($directory,$imageName,$tempName,$fileType,$changeImageName)
	   {
		 $priv = 0777;
		 $imagpath = $directory;
		 if(!@mkdir($imagpath))
		 {
			@mkdir($imagpath, $priv) ? true : false; // creates a new directory with write permission.
		 }

		 $numberArr = array(0,1,2,3,4,5,6,7,8,9);
		 $fileName = explode(".",$imageName);
		 if(!empty($imageName)  && (($fileType == "image/gif")
			|| ($fileType == "image/jpeg")
			|| ($fileType == "image/pjpeg")
			|| ($fileType == "image/png")))
		  {
				$randname = $changeImageName;

				$time = time();
				if($fileName[1]=='gif' || $fileName[1]=='jpeg' || $fileName[1]=='pjpeg' || $fileName[1]=='png'){
					$photoname = strtolower($randname)."_".$time.".".$fileName[1];
				}else{
					$photoname = strtolower($randname)."_".$time.".png";
				}
				$photoname = str_replace("-"," ",$photoname);
				$filepath = $imagpath."/".$photoname;
				$small_filepath = $imagpath."/"."small_".$photoname;
				if(move_uploaded_file($tempName,$filepath))
				{
					//$this->Image->resize_img($filepath,125, $small_filepath);
					return $photoname;
					die;
				}
				else
				{
					return "Error";
					die;
				}
		  }
		  else
		  {
			return "Error";
					die;
		 }
	   }
	

}

