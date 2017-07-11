<?PHP
App::uses('AppController','Controller');
App::uses('BarcodeHelper','Vendor');
class RestaurantsController extends AppController
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
     
	 public function qrcode()
	 {
		 include("/phpqrcode/qrlib.php");
		 
         QRcode::png('12 table no 1', 'img/barcode/filename.png');
		 
         
		 //exit;
		 $data_to_encode = '1012012,BLAHBLAH01234,1234567891011';
   /* 
    $barcode=new BarcodeHelper();
        
    // Generate Barcode data
    $barcode->barcode();
    $barcode->setType('EAN');
    $barcode->setCode($data_to_encode);
    $barcode->setSize(80,200);
    
    // Generate filename            
    $random = rand(0,1000000);
	
    $file = 'img/barcode/code_'.$random.'.png';
	
    
    // Generates image file on server            
    $barcode->writeBarcodeFile($file);
	*/
 
	 }
	 
	public function index() {
	
	}

	public function add()
	{
		
		$this->loadModel('User');
		$this->loadModel('Country');
		$countries=$this->Country->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1)));
		$this->set('countries',$countries);
		$user_type= 2;
		$title = "Restaurants";
		$this->set("user_type",$user_type);
		$this->set("title",$title);
		if($this->request->is('post') || $this->request->is('put'))
		{
			
			$data=$this->request->data;
			$photoVal=$this->uploadImage('ownerpic/../../../../restaurant/app/webroot/ownerpic',$data['User']['user_pic']['name'],$data['User']['user_pic']['tmp_name'],$data['User']['user_pic']['type'],'onwer');
		   
		 	if($photoVal!='Error'){
				$data["User"]["user_pic"] = $photoVal;
			}else{
				unset($data["User"]["user_pic"]);
			}
			
			$data["User"]["dob"]= date('Y-m-d',strtotime($data["User"]["dob"]));
			if($data["User"]["anniversary_date"]!="")
			{
				$data["User"]["anniversary_date"]= date('Y-m-d',strtotime($data["User"]["anniversary_date"]));
			}else
			{
				unset($data["User"]["anniversary_date"]);
			}
			
			$this->User->create();
			
			if ($this->User->save($data)) 
			{
			
			      unset($data['User']);
				  $data["Restaurant"]["user_id"]=$this->User->getLastInsertId();
				  $this->loadModel('Restaurant');
				  $photoVal=$this->uploadImage('restrologo/../../../../restaurant/app/webroot/restrologo',$data['Restaurant']['logo_path']['name'],$data['Restaurant']['logo_path']['tmp_name'],$data['Restaurant']['logo_path']['type'],'restro');
				  if($photoVal!='Error'){
				  $data["Restaurant"]["logo_path"] = $photoVal;
			}else{
				unset($data["Restaurant"]["logo_path"]);
			}
			     $data["Restaurant"]["cancel_available"] =$data["cancel_available"];
				 unset($data["cancel_available"]);
			     $this->Restaurant->create();
			      if ($this->Restaurant->save($data)) 
			      {	 
						$this->Session->setFlash(__('You have successfully added Restaurant.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'add' ));
				  }
				  else
				  {
					    $this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'add' ));
				  }
			}
			else
			{
						$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'add' ));
			}
			
		}
		
	}
	public function restro_info()
	{
		 
		 if($this->request->is('put') || $this->request->is('post'))
		 { 
		    $data=$this->request->data;
				  
		    $this->loadModel('Restaurant');
			
			$data['Restaurant']['opening_days'] = $data['Restaurant']['opening_days'] == null ? "0,1,2,3,4,5,6" : implode(",",$data['Restaurant']['opening_days']) ;
			$data['Restaurant']['open_time'] = $data['Restaurant']['open_time']['meridian'] == 'pm' ? ($data['Restaurant']['open_time']['hour']+12).":".($data['Restaurant']['open_time']['min']).":00"  : ($data['Restaurant']['open_time']['hour']).":".($data['Restaurant']['open_time']['min']).":00"  ;
				  
			$data['Restaurant']['close_time'] = $data['Restaurant']['close_time']['meridian'] == 'pm' ? ($data['Restaurant']['close_time']['hour']+12).":".($data['Restaurant']['close_time']['min']).":00"  : ($data['Restaurant']['close_time']['hour']).":".($data['Restaurant']['close_time']['min']).":00"  ;
				  
				  
			
			$user_pix=$this->Restaurant->find('first',array('fields'=>array('logo_path'),"conditions"=>array("Restaurant.id"=>$data['Restaurant']['id'])));
			$photoVal=$this->uploadImage('restrologo',$data['Restaurant']['logo_path']['name'],$data['Restaurant']['logo_path']['tmp_name'],$data['Restaurant']['logo_path']['type'],'restro');
				  if($photoVal!='Error'){
				@unlink('restrologo'.$user_pix['Restaurant']['logo_path']);	  
				  $data["Restaurant"]["logo_path"] = $photoVal;
			}else{
				unset($data["Restaurant"]["logo_path"]);
			}
			     $data["Restaurant"]["cancel_available"] = $data["cancel_available"];
				 unset($data["cancel_available"]);
			     $this->Restaurant->create();
			      if ($this->Restaurant->save($data)) 
			      {	 
						$this->Session->setFlash(__('You have successfully updated Restaurant.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'restro_info/id/'.$data['Restaurant']['id'] ));
				  }
				  else
				  {
					    $this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'restro_info/id/'.$data['Restaurant']['id'] ));
				  }
			
			
		
		 }
		 else
		 {	
		  
		  $id= $this->Session->read('restro_id');
		  $this->loadModel('Restaurant');
		  $title = "Restaurants";
		  $this->set("title",$title);
		  
		  
		  $this->loadModel('Country');
		  $countries=$this->Country->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1)));
		  $this->set('countries',$countries);
		  
			
		  $options = array('conditions' => array('Restaurant.id' =>  $id));
		  $this->request->data = $this->Restaurant->find('first', $options);
		  
		  
		   
		   $this->loadModel('State');
		   $this->loadModel('City');
		   $states=$this->State->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1,"country_id"=>$this->request->data['Restaurant']['country_id'])));	
		   $this->set('states',$states);
		  
		   $cities=$this->City->find('list',array('order'=>'name asc','fields'=>array('id','name'),'conditions'=>array("1"=>1,"state_id"=>$this->request->data['Restaurant']['state_id'])));
		   $this->set('cities',$cities);
		  
		   
			
		}
		
}


	
	public function getJson()
	{
		 // $this->request->onlyAllow('ajax'); // No direct access via browser URL
 		 // $this->layout = null ;
		  
	      $this->loadModel('Restaurant');
		  $r = $_GET;  	  
		  $page=$r['page'];
		  $rp=$r['rows'];
		  $sortorder=$r['sord'];
		  $sortname=$r['sidx'];
		  if (!$page) $page = 1;
		  if (!$rp) $rp = 20; 
		  $start = (($page-1) * $rp);
		  
		  $where = array("1"=>1);	 
      $count=count($this->Restaurant->find('list'));
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
  	   
	   
	   $result=$this->Restaurant->find('all',array('order'=>$sortname.' '.$sortorder,'limit'=>$rp,'offset'=>$start,"conditions"=>$where));
	   $count=count($result);
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
		
		
		//$str="<a href='".$this->restro_path.$row['Restaurant']['id']."' style='padding:2px; margin-left:34px;' >Panel</a>";
		 if($row['Restaurant']['logo_path']!=="")
		 {
		  $logo="<a data-lightbox='example-1' href='".$this->restrologo.$row['Restaurant']['logo_path']."'><img  src='".$this->restrologo.$row['Restaurant']['logo_path']."' style='width:45px' /></a>";
		 }
		 else
		 {
			 $logo="";
		 }
		   //$str = " <a style='margin-top:2px;margin-bottom:2px' href='".$this->path."restaurants/tables/restro_id/".$row['Restaurant']['id']."' class='ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary' role='button' aria-disabled='false'><span class='ui-button-icon-primary ui-icon ui-icon-pencil'></span><span class='ui-button-text'>Panel</span></a>";
		   
		   
		   $str = "<form method='post' action='".$this->restro_path."users/tmp'><input type='hidden'name='restro_id' value='".$row['Restaurant']['id']."' /> <button style='margin-top:2px;margin-bottom:2px'  class='ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary' role='button' aria-disabled='false'><span class='ui-button-icon-primary ui-icon ui-icon-pencil'></span><span class='ui-button-text'>Panel</span></button></form>";
	    if(($key+1)==$count)
	  {
$json.='{"id":"'.$row['Restaurant']['id'].'","cell":["'.$logo.'","'.$row['Restaurant']['restaurant_name'].'","'.$row['User']['name'].'","'.$row['Restaurant']['email'].'","'.$row['Restaurant']['mobile_no'].'","'.$row['Restaurant']['contact_no'].'","'.$row['User']['status'].'","'.$str.'"]}';
	  }
	  else
	  {
$json.='{"id":"'.$row['Restaurant']['id'].'","cell":["'.$logo.'","'.$row['Restaurant']['restaurant_name'].'","'.$row['User']['name'].'","'.$row['Restaurant']['email'].'","'.$row['Restaurant']['mobile_no'].'","'.$row['Restaurant']['contact_no'].'","'.$row['User']['status'].'","'.$str.'"]},';
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
