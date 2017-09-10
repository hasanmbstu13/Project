<?PHP
App::uses('AppController','Controller');
App::uses('BarcodeHelper','Vendor');
class CategoriesController extends AppController
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
     
	
	 

	public function add()
	{
		if($this->request->is('post') || $this->request->is('put'))
		{
			$this->loadModel('Categories');
			$data=$this->request->data;
			$this->Categories->create();
			
			foreach($data as $key => $row)
			{
			    if($data[$key]['Categories']['category_name']!=="")
				{
				 $data[$key]['Categories']['restaurant_id'] = $this->Session->read('restro_id');
				}
				else
				{
					unset($data[$key]);
				}
			}  
			
			if ($this->Categories->saveAll($data)) 
			{
			        	$this->Session->setFlash(__('You have successfully added new Categorie(s).'), 'default', array('class'=>'alert alert-success'));
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
		 $this->loadModel('Categories');
		 if($this->request->is('put') || $this->request->is('post'))
		 { 
		    
		    $data=$this->request->data;
			//print_r($data);
			//exit;
		    $this->Categories->create();
			if ($this->Categories->save($data)) 
			{
			
			     	 
						$this->Session->setFlash(__('You have successfully updated Categorie information.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'edit/id/'.$data['Categories']['id'] ));
				 
			}
			else
			{
						$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'edit/id/'.$data['Categories']['id'] ));
			}
			
		
		 }
		 else
		 {	
		  
		  $id= $this->passedArgs[1];
		  $this->loadModel('Categories');
		  $options = array('conditions' => array('Categories.id' =>  $id));
		  $this->request->data = $this->Categories->find('first', $options);
		  
		}
		
}


	public function delete($id)
	{
	    $this->loadModel('Categories');	
		$this->loadModel('Items');	
		$this->loadModel('ItemsRate');	
		$this->Categories->id = $id;
		$this->ItemsRate->query("DELETE FROM `om_items_rate` WHERE `item_id` in (select `item_id` FROM `om_items` WHERE `category_id` = $id )");
		$this->Items->query("DELETE FROM `om_items` WHERE `category_id` = $id");
		
		if ($this->Categories->delete())
		{
		
		         $data = Array(
		            "message" => "Categorie has been successfully deleted",
		            "status" => "ok"
	                 );
	            }
				else 
				{
	             $data = Array(
		            "message" => "Categorie could not be deleted",
		            "status" => "error"
	                );
	            }
	    
		
		echo json_encode($data);
		exit;
	}
	
	
	public function index()
	{
		
		
	}
	
	
	public function getJson()
	{
		 // $this->request->onlyAllow('ajax'); // No direct access via browser URL
 		 // $this->layout = null ;
		  
	      $this->loadModel('Categories');
		  $r = $_GET;  	  
		  $page=$r['page'];
		  $rp=$r['rows'];
		  $sortorder=$r['sord'];
		  $sortname=$r['sidx'];
		  if (!$page) $page = 1;
		  if (!$rp) $rp = 20; 
		  $start = (($page-1) * $rp);
		  
		  $where = array("Categories.restaurant_id"=>$this->Session->read('restro_id'));	 
      $count=count($this->Categories->find('list'));
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
  	   
	   
	   $result=$this->Categories->find('all',array('order'=>$sortname.' '.$sortorder,'limit'=>$rp,'offset'=>$start,"conditions"=>$where));
	   $count=count($result);
	   $json = '{
				"page":'.$page.',
				"total":'.$total_pages.',
				"records":'.$count.',
				"rows":[';
	   foreach($result as $key => $row)
	  {
		  
		

		  
		  $str = "<form method='post' action='items'><input type='hidden'name='cat_id' value='".$row['Categories']['id']."' /> <button style='margin-top:5px;align:center'  class='ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary' role='button' aria-disabled='false'><span class='ui-button-icon-primary ui-icon ui-icon-pencil'></span><span class='ui-button-text'>Items</span></button></form>";
		   
	    if(($key+1)==$count)
	  {
$json.='{"id":"'.$row['Categories']['id'].'","cell":["'.$row['Categories']['category_name'].'","'.$row['Categories']['description'].'","'. $str.'"]}';
	  }
	  else
	  {
$json.='{"id":"'.$row['Categories']['id'].'","cell":["'.$row['Categories']['category_name'].'","'.$row['Categories']['description'].'","'. $str.'"]},';
	  }
    }
		
		
	$json.=']}';	
	echo $json;
	exit;
		
	}
	

}

?>
