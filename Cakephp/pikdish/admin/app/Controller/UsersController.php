<?PHP
App::uses('AppController','Controller');
class UsersController extends AppController
{
	public function beforeFilter() 
	{
	    parent::beforeFilter();
		$path = Router::url('/', true) ;
	    // Allow users to register and logout. This makes this request public (no login needed)
	   	$this->Auth->allow('logout', 'forgot_password', 'request_new_password', 'reset_password', 'perform_reset_password','register','activate');
	}
	
	
	public function isAuthorized($user) 
	{

	  return parent::isAuthorized($user);
		 return true;
	}
     
	 public function login() 
	 {

		// we don't want layout on the login page.
		$this->layout='empty'; 

	
	        if ($this->Auth->login()) 
			{

                
				$role = AuthComponent::user('user_type');
				 $redirect_url = $this->Auth->redirect();
	        		if($role=='0'){
	        			return $this->redirect("/");
					}else if($role=='1'){
	        			return $this->redirect("/");	
					}else{
						$this->Session->setFlash(__('Invalid username or password, try again'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect("/users/logout");
					}	
	        } else if ($this->request->is('post')){
        	        $this->Session->setFlash(__('Invalid username or password, try again'), 'default', array('class'=>'alert alert-danger'));
                }
	    //}
	}

	public function logout() {

		// logout
		$this->Auth->logout();
		// redirect to the home
	    return $this->redirect('/');
	}
	 
	 	
	public function index()
	{
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
	
	public function add()
	{
		
		$this->loadModel('User');
		$this->loadModel('Country');
		$countries=$this->Country->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1)));
		$this->set('countries',$countries);
		$user_type= 1;
		$title = "Member";
		$this->set("user_type",$user_type);
		$this->set("title",$title);
		if($this->request->is('post') || $this->request->is('put'))
		{
			
			$data=$this->request->data;
			$photoVal=$this->uploadImage('userpic',$data['User']['user_pic']['name'],$data['User']['user_pic']['tmp_name'],$data['User']['user_pic']['type'],'user');
		   
		 	if($photoVal!='Error'){
				$data["User"]["user_pic"] = $photoVal;
			}else{
				unset($data["User"]["user_pic"]);
			}
			$data["User"]["email"]=$data["User"]["username"];
			$this->User->create();
			
			if ($this->User->save($data)) 
			{
			
						$this->Session->setFlash(__('You have successfully added member.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'add' ));
			}
			else
			{
						$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'add' ));
			}
			
		}
		
	}
	public function edit()
	{
		 $this->loadModel('User');
		 if($this->request->is('put') || $this->request->is('post'))
		 { 
		    $data=$this->request->data;
			
			$user_pix=$this->User->find('first',array('fields'=>array('user_pic'),"conditions"=>array("User.id"=>$data['User']['id'])));
			$photoVal=$this->uploadImage('userpic',$data['User']['user_pic']['name'],$data['User']['user_pic']['tmp_name'],$data['User']['user_pic']['type'],'user');
		   
		 	if($photoVal!='Error'){
				unlink('userpic/'.$user_pix['User']['user_pic']);
				
				$data["User"]["user_pic"] = $photoVal;
			}else{
				unset($data["User"]["user_pic"]);
			}
			
			if($this->request->data["User"]["password"]==''){
				unset($this->request->data["User"]["password"]);
			}
			
			$this->User->create();
			
			if ($this->User->save($data)) 
			{
			
						$this->Session->setFlash(__('You have successfully updated member.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'edit/id/'.$data['User']['id'] ));
			}
			else
			{
						$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'edit/id/'.$data['User']['id'] ));
			}
			
		
		 }
		 else
		 {	
		  
		  $id= $this->passedArgs[1];
		  
		  $this->loadModel('Country');
		  $countries=$this->Country->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1)));
		  $this->set('countries',$countries);
		  
			
		  $options = array('conditions' => array('User.id' =>  $id));
		  $this->request->data = $this->User->find('first', $options);
		
	       $this->loadModel('State');
		   $states=$this->State->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1,"country_id"=>$this->request->data['User']['country_id'])));	
		  $this->set('states',$states);
		  $this->loadModel('City');
		  $cities=$this->City->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1,"state_id"=>$this->request->data['User']['state_id'])));
		  $this->set('cities',$cities);
			
		}
		
}


   public function delete($id)
	{
	    $this->loadModel('User');	
		$user = $this->User->query("select * from om_users where id=$id and user_type=0");
		
    	if(count($user)==1)
		{
			 $data = Array(
	            "message" => "Administrator User could not be deleted.",
	            "status" => "error"
            );
		}
		else
		{
		
			$this->User->id = $id;
			$user_pix=$this->User->find('first',array('fields'=>array('user_pic'),'conditions'=>array('User.id'=>$id)));
				if($user_pix['User']['user_pic']!='')
				{
				 unlink('userpic/'.$user_pix['User']['user_pic']);
				}
				if ($this->User->delete())
				 {
		
		         $data = Array(
		            "message" => "Account has been successfully deleted",
		            "status" => "ok"
	                 );
	            }
				else 
				{
	             $data = Array(
		            "message" => "Account could not be deleted",
		            "status" => "error"
	                );
	            }
	    }
		
		echo json_encode($data);
		exit;
	}
	
	
	
    public function change_password()
	{
		
		 $this->loadModel('User');
		 
		 if($this->request->is('post'))
		 { 
		    $data=$this->request->data;
			$data['User']['id']=AuthComponent::user('id');
			$this->User->create();
			$this->User->save($data);
			if ($this->User->save($data)) 
			{
			
						$this->Session->setFlash(__('Your password have been updated.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'change_password' ));
			}
			else
			{
						$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'change_password' ));
			}
			
		
		 }
		 
		
	
	

	}
	
    public function profile()
	{
		 $this->loadModel('User');
		 if($this->request->is('put') || $this->request->is('post'))
		 { 
		    $data=$this->request->data;
			$user_pix=$this->User->find('first',array('fields'=>array('user_pic'),"conditions"=>array("User.id"=>$data['User']['id'])));
			$photoVal=$this->uploadImage('userpic',$data['User']['user_pic']['name'],$data['User']['user_pic']['tmp_name'],$data['User']['user_pic']['type'],'user');
		 	if($photoVal!='Error')
			{
				unlink('userpic/'.$user_pix['User']['user_pic']);
				$data["User"]["user_pic"] = $photoVal;
			}
			else
			{
				unset($data["User"]["user_pic"]);
			}
								
			$this->User->create();
			$this->User->save($data);
			if ($this->User->save($data)) 
			{
			
						$this->Session->setFlash(__('Your profile have been updated.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'profile'));
			}
			else
			{
						$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'profile' ));
			}
			
		
		 }
		 else
		 {	
		  
		  
		  $id=AuthComponent::user('id');
		  $this->loadModel('Country');
		  $countries=$this->Country->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1)));
		  $this->set('countries',$countries);
		  
			
		  $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		  $this->request->data = $this->User->find('first', $options);
		
	      $this->loadModel('State');
		  $states=$this->State->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1,"country_id"=>$this->request->data['User']['country_id'])));	
		  $this->set('states',$states);
		  $this->loadModel('City');
		  $cities=$this->City->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1,"state_id"=>$this->request->data['User']['state_id'])));
		  $this->set('cities',$cities);
			
		}
		
	
	
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
	
	
	public function getJson()
	{
		 // $this->request->onlyAllow('ajax'); // No direct access via browser URL
 		 // $this->layout = null ;
		  
	      $this->loadModel('User');
		  $r = $_GET;  	  
		  $page=$r['page'];
		  $rp=$r['rows'];
		  $sortorder=$r['sord'];
		  $sortname=$r['sidx'];
		  if (!$page) $page = 1;
		  if (!$rp) $rp = 20; 
		  $start = (($page-1) * $rp);
		  
		  $where = array("User.id != "=>AuthComponent::user('id'),"User.user_type"=>1);	 
      $count=count($this->User->find('list'));
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
  	   
	   
	   $result=$this->User->find('all',array('order'=>$sortname.' '.$sortorder,'limit'=>$rp,'offset'=>$start,"conditions"=>$where));
	   $count1=count($result);
	   $json = '{
				"page":'.$page.',
				"total":'.$total_pages.',
				"records":'.$count.',
				"rows":[';
	   foreach($result as $key => $row)
	  {
		  if($row['User']['status']==1)
		{
			$row['User']['status']="<img src='".$this->path."img/green.jpg' width='25' style='padding:2px; margin-left:35px' />";
		}
		else
		{
			$row['User']['status']="<img src='".$this->path."img/red.jpg' width='26' style='padding:2px; margin-left:34px' />";
		}  
		
		$str="";
		$str="<a data-lightbox='example-".$row['User']['id']."' href='".$this->path."userpic/".$row['User']['user_pic']."'><img  src='".$this->path."img/user.jpg' style='width:25px;margin-left:43px' /></a>";
	    if(($key+1)==$count1)
	  {
$json.='{"id":"'.$row['User']['id'].'","cell":["'.$row['User']['name'].'","'.$row['User']['email'].'","'.$row['User']['mobile_no'].'","'.$row['User']['status'].'","'.$str.'"]}';
	  }
	  else
	  {
$json.='{"id":"'.$row['User']['id'].'","cell":["'.$row['User']['name'].'","'.$row['User']['email'].'","'.$row['User']['mobile_no'].'","'.$row['User']['status'].'","'.$str.'"]},';
	  }
    }
		
		
	$json.=']}';	
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

?>