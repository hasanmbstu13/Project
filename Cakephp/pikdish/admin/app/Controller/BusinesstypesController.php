<?PHP
App::uses('AppController','Controller');


class BusinesstypesController extends AppController
{
	public function beforeFilter()
	{
	    parent::beforeFilter();

	    // Allow BusinessTypes to register and logout. This makes this request public (no login needed)
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

	public function add()
	{
		$this->loadModel('BusinessType');
		
		$title = "Business Type";
		$this->set("title",$title);

		if($this->request->is('post') || $this->request->is('put'))
		{
			
			$data = $this->request->data;
			$this->BusinessType->create();

			if ($this->BusinessType->save($data)) 
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
	}

	public function edit()
	{
		 $this->loadModel('BusinessType');
		 if($this->request->is('put') || $this->request->is('post'))
		 { 
		 	$data = $this->request->data;
			
			$this->BusinessType->create();
			if ($this->BusinessType->save($data)) 
			{
			
						$this->Session->setFlash(__('You have successfully updated business type.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'edit/id/'.$data['BusinessType']['id'] ));
			}
			else
			{
						$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'edit/id/'.$data['BusinessType']['id'] ));
			}
			
		
		 }
		 else
		 {	
		  
		  $id= $this->passedArgs[1];
		  $this->loadModel('BusinessType');
		  $options = array('conditions' => array('BusinessType.id' =>  $id));
		  $this->request->data = $this->BusinessType->find('first', $options);
			
		}
			
	}

	public function delete($id)
	{
	    $this->loadModel('BusinessType');	
		$this->BusinessType->id = $id;
		
		// if($this->request->is('post'))
		// {
			if($this->BusinessType->delete())
	        {
	         $data = Array(
	            "message" => "Business Type has been successfully deleted",
	            "status" => "ok"
	             );
	        }
			else 
			 {
		         $data = Array(
		            "message" => "Business Type could not be deleted",
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
		  
	      $this->loadModel('BusinessType');
		  $r = $_GET;  	  
		  $page=$r['page'];
		  $rp=$r['rows'];
		  $sortorder=$r['sord'];
		  $sortname=$r['sidx'];
		  if (!$page) $page = 1;
		  if (!$rp) $rp = 20; 
		  $start = (($page-1) * $rp);
		  
		  $where = array("1" => 1);	 
	      $count=count($this->BusinessType->find('list'));
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
  	   
	   
	   $result=$this->BusinessType->find('all',array('order'=>$sortname.' '.$sortorder,'limit'=>$rp,'offset'=>$start,"conditions"=>$where));
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
		$json.='{"id":"'.$row['BusinessType']['id'].'","cell":["'.$row['BusinessType']['business_type'].'"]}';
	  }
	  else
	  {
		$json.='{"id":"'.$row['BusinessType']['id'].'","cell":["'.$row['BusinessType']['business_type'].'"]},';
	  }
    }
		
		
	$json.=']}';	
	echo $json;
	exit;
		
	}
	

}

