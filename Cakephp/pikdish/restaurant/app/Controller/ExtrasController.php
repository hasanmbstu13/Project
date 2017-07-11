<?PHP
App::uses('AppController','Controller');
class ExtrasController extends AppController
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
		 	
	}

		
	public function add()
	{
		$this->loadModel('Extras');
		
		if($this->request->is('post') || $this->request->is('put') )
		{
			
			$data=$this->request->data;
			$this->Extras->create();
			foreach($data as $key => $row)
			{
			    if($data[$key]['Extras']['name']!=="")
				{
				 $data[$key]['Extras']['restaurant_id'] = $this->Session->read('restro_id');
				}
				else
				{
					unset($data[$key]);
				}
			}
			if ($this->Extras->saveAll($data)) 
			{
			
						$this->Session->setFlash(__('You have successfully added new Food Add Ons.'), 'default', array('class'=>'alert alert-success'));
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
		$this->loadModel('Extras');
		
		if($this->request->is('post')||$this->request->is('put'))
		{
			
			$data=$this->request->data;
			$this->Extras->create();
			
			if ($this->Extras->save($data)) 
			{
			
						$this->Session->setFlash(__('You have successfully updated Food Add Ons.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'edit/id/'.$data['Extras']['id'] ));
			}
			else
			{
						$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'edit/id/'.$data['Extras']['id'] ));
			}
			
		}
		else
		{
			$id= $this->passedArgs[1];
			 $options = array('conditions' => array('Extras.id' => $id));
		     $this->request->data = $this->Extras->find('first', $options);
		}
		
	}
   
	public function getJson()
	{
		 
		  
	      $this->loadModel('Extras');
		  $r = $_GET;  	  
		  $page=$r['page'];
		  $rp=$r['rows'];
		  $sortorder=$r['sord'];
		  $sortname=$r['sidx'];
		  if (!$page) $page = 1;
		  if (!$rp) $rp = 20; 
		  $start = (($page-1) * $rp);
		  
		  $where = array("Extras.restaurant_id"=>$this->Session->read('restro_id'));	 
      $count=count($this->Extras->find('list'));
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
		 if($data['field'] == "Extras.name")
		 {
		  $where[$data['field'].' like']='%'.$data['data'].'%';
		 }
		 else
		 {
			 $where[$data['field']]=$data['data'];
		 }
		}	    
	   }	  
  	   
	   
	   $result=$this->Extras->find('all',array('order'=>$sortname.' '.$sortorder,'limit'=>$rp,'offset'=>$start,"conditions"=>$where));
	   $count=count($result);
	   $json = '{
				"page":'.$page.',
				"total":'.$total_pages.',
				"records":'.$count.',
				"rows":[';
	   foreach($result as $key => $row)
	  {
		  
		        $str= "       <a style='margin-top:2px;margin-bottom:2px' href='".$this->path."extras/edit/id/".$row['Extras']['id']."'   class='ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary' role='button' aria-disabled='false'><span class='ui-button-icon-primary ui-icon ui-icon-pencil'></span><span class='ui-button-text'>Edit</span></a>&nbsp;&nbsp;&nbsp;<a onclick='deleteEqu(".$row['Extras']['id'].")' class='ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary' role='button' aria-disabled='false'><span class='ui-button-icon-primary ui-icon ui-icon-trash'></span><span class='ui-button-text'>Delete</span></a>";
				
				
	  if(($key+1)==$count)
	  {
	    $json.='{"id":"'.$row['Extras']['id'].'","cell":["'.$row['Extras']['name'].'","'.$row['Extras']['amt'].'","'.$str.'"]}';
	  }
	  else
	  {
		$json.='{"id":"'.$row['Extras']['id'].'","cell":["'.$row['Extras']['name'].'","'.$row['Extras']['amt'].'","'.$str.'"]},';
	  }
    }
	$json.=']}';	
	echo $json;
	exit;
		
	}
	
	
	
	public function delete($id)
	{
		
        
   	    $this->loadModel('Extras');	
		$this->loadModel('ItemExtras');	
		
		$this->Extras->id = $id;
		
		
			if ($this->Extras->delete()) 
			{
				$this->ItemExtras->query("DELETE FROM `om_item_extras` WHERE `extras_id` = $id");
			    $data = Array(
		            "message" => "Food Addons has been successfully deleted",
		            "status" => "ok"
	            );
	        
			} else {
	             $data = Array(
		            "message" => "Food Add ons could not be deleted",
		            "status" => "error"
	            );
	        }
		
		echo json_encode($data);
		exit;
	
	}
	

}

?>