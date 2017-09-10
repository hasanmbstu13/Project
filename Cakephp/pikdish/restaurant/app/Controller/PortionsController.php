<?PHP
App::uses('AppController','Controller');
class PortionsController extends AppController
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
		$this->loadModel('Portions');
		
		if($this->request->is('post') || $this->request->is('put') )
		{
			
			$data=$this->request->data;
			$this->Portions->create();
			foreach($data as $key => $row)
			{
			    if($data[$key]['Portions']['portion_name']!=="")
				{
				 $data[$key]['Portions']['restaurant_id'] = $this->Session->read('restro_id');
				}
				else
				{
					unset($data[$key]);
				}
			}
			if(isset($data['Portions']['default_portion']))
			{
			 $data[$data['Portions']['default_portion']]['Portions']['default_portion'] = 1;
			 unset($data['Portions']);
			 $this->Portions->query("UPDATE `om_portions` SET `default_portion`=0 WHERE `restaurant_id`=".$this->Session->read('restro_id'));
			}
			//echo "<pre>";
			//print_r($data);
			//exit;
			
			if ($this->Portions->saveAll($data)) 
			{
			
						$this->Session->setFlash(__('You have successfully added new Food Portion.'), 'default', array('class'=>'alert alert-success'));
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
		$this->loadModel('Portions');
		
		if($this->request->is('post')||$this->request->is('put'))
		{
			
			$data=$this->request->data;
			if($data['Portions']['default_portion'] == 1)
			{
			  $this->Portions->query("UPDATE `om_portions` SET `default_portion` = 0 WHERE `restaurant_id`=".$this->Session->read('restro_id'));
			}
			$this->Portions->create();
			
			if ($this->Portions->save($data)) 
			{
			
						$this->Session->setFlash(__('You have successfully updated Food Portion.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'edit/id/'.$data['Portions']['id'] ));
			}
			else
			{
						$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'edit/id/'.$data['Portions']['id'] ));
			}
			
		}
		else
		{
			$id= $this->passedArgs[1];
			 $options = array('conditions' => array('Portions.id' => $id));
		     $this->request->data = $this->Portions->find('first', $options);
		}
		
	}
   
	public function getJson()
	{
		 
		  
	      $this->loadModel('Portions');
		  $r = $_GET;  	  
		  $page=$r['page'];
		  $rp=$r['rows'];
		  $sortorder=$r['sord'];
		  $sortname=$r['sidx'];
		  if (!$page) $page = 1;
		  if (!$rp) $rp = 20; 
		  $start = (($page-1) * $rp);
		  
		  $where = array("Portions.restaurant_id"=>$this->Session->read('restro_id'));	 
      $count=count($this->Portions->find('list'));
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
  	   
	   
	   $result=$this->Portions->find('all',array('order'=>$sortname.' '.$sortorder,'limit'=>$rp,'offset'=>$start,"conditions"=>$where));
	   $count=count($result);
	   $json = '{
				"page":'.$page.',
				"total":'.$total_pages.',
				"records":'.$count.',
				"rows":[';
	   foreach($result as $key => $row)
	  {
		  
		        $str= "               <a style='margin-top:2px;margin-bottom:2px' href='".$this->path."portions/edit/id/".$row['Portions']['id']."'   class='ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary' role='button' aria-disabled='false'><span class='ui-button-icon-primary ui-icon ui-icon-pencil'></span><span class='ui-button-text'>Edit</span></a>&nbsp;&nbsp;&nbsp;<a onclick='deleteEqu(".$row['Portions']['id'].")' class='ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary' role='button' aria-disabled='false'><span class='ui-button-icon-primary ui-icon ui-icon-trash'></span><span class='ui-button-text'>Delete</span></a>";
				if($row['Portions']['default_portion'] == 1)
				{
					$row['Portions']['default_portion'] = "Default";
				}
				else
				{
					$row['Portions']['default_portion'] = "";
				}
				
	  if(($key+1)==$count)
	  {
	    $json.='{"id":"'.$row['Portions']['id'].'","cell":["'.$row['Portions']['portion_name'].'","'.$row['Portions']['default_portion'].'","'.$str.'"]}';
	  }
	  else
	  {
		$json.='{"id":"'.$row['Portions']['id'].'","cell":["'.$row['Portions']['portion_name'].'","'.$row['Portions']['default_portion'].'","'.$str.'"]},';
	  }
    }
	$json.=']}';	
	echo $json;
	exit;
		
	}
	
	
	
	public function delete($id)
	{
		
        
   	    $this->loadModel('Portions');	
		$this->Portions->id = $id;
		$arr = $this->Portions->find("list",array("conditions"=>array("Portions.default_portion"=>1,"Portions.id"=>$id)));
		if(count($arr))
		{
			$data = Array(
		            "message" => "Default food portion could not be deleted",
		            "status" => "error"
	            );
		}
		
		else
		{
		
			if ($this->Portions->delete()) 
			
			{
			   $this->loadModel('ItemsRate');
			   $this->loadModel('Item');
			   $arr = $this->ItemsRate->find("all",array("fields"=>array("ItemsRate.item_id"),"conditions"=>array("ItemsRate.portion_id"=>$id)));
			   $this->ItemsRate->query("DELETE FROM `om_items_rate` WHERE `portion_id` = $id");
			   foreach($arr as $key=>$row)
			   {
				   $tmp = $this->ItemsRate->find("all",array("conditions"=>array("ItemsRate.item_id"=>$row['ItemsRate']['item_id'])));
				   if($tmp == null)
				   {    
				       $this->Item->id = $row['ItemsRate']['item_id'];
					   $this->Item->delete();
				   }
					   
				   
			   }
			   $data = Array(
		            "message" => "Food Portion has been successfully deleted",
		            "status" => "ok"
	            );
	        
			} else {
	             $data = Array(
		            "message" => "Food Portion could not be deleted",
		            "status" => "error"
	            );
	        }
		}
		echo json_encode($data);
		exit;
	
	}
	

}

?>