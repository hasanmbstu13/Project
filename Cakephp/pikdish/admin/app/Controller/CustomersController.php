<?PHP
App::uses('AppController','Controller');
class CustomersController extends AppController
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
     
	 
	 
	 	
	public function index()
	{
		 
	}

	
	
	public function add()
	{
		
		$this->loadModel('User');
		$this->loadModel('Country');
		$countries=$this->Country->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1)));
		$this->set('countries',$countries);
		$user_type= 3;
		$title = "Customer";
		$this->set("user_type",$user_type);
		$this->set("title",$title);
		if($this->request->is('post') || $this->request->is('put'))
		{
			
			$data=$this->request->data;
			$photoVal=$this->uploadImage('userpic',$data['User']['user_pic']['name'],$data['User']['user_pic']['tmp_name'],$data['User']['user_pic']['type'],'customer');
		   
		 	if($photoVal!='Error'){
				$data["User"]["user_pic"] = $photoVal;
			}else{
				unset($data["User"]["user_pic"]);
			}
			$this->User->create();
			$data['User']['dob'] = date('Y-m-d',strtotime($data['User']['dob']));
			if($data['User']['anniversary_date']!== "")
			{
				$data['User']['anniversary_date'] = date('Y-m-d',strtotime($data['User']['anniversary_date']));
			}else
			{
				unset($data['User']['anniversary_date']);
			}
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
			$photoVal=$this->uploadImage('userpic',$data['User']['user_pic']['name'],$data['User']['user_pic']['tmp_name'],$data['User']['user_pic']['type'],'customer');
		   
		 	if($photoVal!='Error'){
				unlink('userpic/'.$user_pix['User']['user_pic']);
				
				$data["User"]["user_pic"] = $photoVal;
			}else{
				unset($data["User"]["user_pic"]);
			}
			
			if($this->request->data["User"]["password"]==''){
				unset($this->request->data["User"]["password"]);
			}
			$data['User']['dob'] = date('Y-m-d',strtotime($data['User']['dob']));
			if($data['User']['anniversary_date']!="")
			{
				$data['User']['anniversary_date'] = date('Y-m-d',strtotime($data['User']['anniversary_date']));
			}else
			{
				unset($data['User']['anniversary_date']);
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
		  $this->request->data['User']['dob'] = date('d-m-Y',strtotime( $this->request->data['User']['dob']));
		  if($this->request->data['User']['anniversary_date']!="0000-00-00")
		  {
		   $this->request->data['User']['anniversary_date'] = date('d-m-Y',strtotime( $this->request->data['User']['anniversary_date']));
		  }else
		  {
			unset( $this->request->data['User']['anniversary_date'] )  ;
		  }
          		
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
	
	
	
	
	public function getJson()
	{
		  $this->request->onlyAllow('ajax'); // No direct access via browser URL
 		  $this->layout = null ;
		  
	      $this->loadModel('User');
		  $r = $_GET;  	  
		  $page=$r['page'];
		  $rp=$r['rows'];
		  $sortorder=$r['sord'];
		  $sortname=$r['sidx'];
		  if (!$page) $page = 1;
		  if (!$rp) $rp = 20; 
		  $start = (($page-1) * $rp);
		  
		  $where = array("User.id != "=>AuthComponent::user('id'),"User.user_type"=>3);	 
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