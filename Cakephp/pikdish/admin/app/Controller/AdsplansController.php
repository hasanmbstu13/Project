<?PHP
App::uses('AppController','Controller');


class AdsplansController extends AppController
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

	public function index(){

	}

	public function add()
	{
		$this->loadModel('AdsPlan');
		
		$title = "Plan";
		$this->set("title",$title);

		if($this->request->is('post') || $this->request->is('put'))
		{
			
			$data = $this->request->data;
			$this->AdsPlan->create();

			if ($this->AdsPlan->save($data)) 
			{
			
						$this->Session->setFlash(__('You have successfully added ads plan.'), 'default', array('class'=>'alert alert-success'));
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
			 $this->loadModel('AdsPlan');
			 if($this->request->is('put') || $this->request->is('post'))
			 { 
			 	$data = $this->request->data;
				
				$this->AdsPlan->create();
				if ($this->AdsPlan->save($data)) 
				{
				
							$this->Session->setFlash(__('You have successfully updated ads plan.'), 'default', array('class'=>'alert alert-success'));
							return $this->redirect(array( 'action' => 'edit/id/'.$data['AdsPlan']['id'] ));
				}
				else
				{
							$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
							return $this->redirect(array( 'action' => 'edit/id/'.$data['AdsPlan']['id'] ));
				}
				
			
			 }
			 else
			 {	
			  
			  $id= $this->passedArgs[1];
			  $this->loadModel('AdsPlan');
			  $options = array('conditions' => array('AdsPlan.id' =>  $id));
			  $this->request->data = $this->AdsPlan->find('first', $options);
				
			}
				
		}

		public function delete($id)
		{
		    $this->loadModel('AdsPlan');	
			$this->AdsPlan->id = $id;
			
			// if($this->request->is('post'))
			// {
				if($this->AdsPlan->delete())
		        {
		         $data = Array(
		            "message" => "Ads plan has been successfully deleted",
		            "status" => "ok"
		             );
		        }
				else 
				 {
			         $data = Array(
			            "message" => "Ads plan could not be deleted",
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
		  
	      $this->loadModel('AdsPlan');
		  $r = $_GET;  	  
		  $page=$r['page'];
		  $rp=$r['rows'];
		  $sortorder=$r['sord'];
		  $sortname=$r['sidx'];
		  if (!$page) $page = 1;
		  if (!$rp) $rp = 20; 
		  $start = (($page-1) * $rp);
		  
		  $where = array("1" => 1);	 
	      $count=count($this->AdsPlan->find('list'));
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
  	   
	   
	   $result=$this->AdsPlan->find('all',array('order'=>$sortname.' '.$sortorder,'limit'=>$rp,'offset'=>$start,"conditions"=>$where));
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
		$json.='{"id":"'.$row['AdsPlan']['id'].'","cell":["'.$row['AdsPlan']['plan_name'].'","'.$row['AdsPlan']['no_show_per_day'].'","'.$row['AdsPlan']['total_period_days'].'","'.$row['AdsPlan']['with_design_amt'].'","'.$row['AdsPlan']['without_design_amt'].'"]}';
	  }
	  else
	  {
		$json.='{"id":"'.$row['AdsPlan']['id'].'","cell":["'.$row['AdsPlan']['plan_name'].'","'.$row['AdsPlan']['no_show_per_day'].'","'.$row['AdsPlan']['total_period_days'].'","'.$row['AdsPlan']['with_design_amt'].'","'.$row['AdsPlan']['without_design_amt'].'"]},';
	  }
    }
		
		
	$json.=']}';	
	echo $json;
	exit;
		
	}

}