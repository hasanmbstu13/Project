<?PHP
App::uses('AppController','Controller');
class TaxsController extends AppController
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
     
	
	public function add()
	{
		$this->loadModel('TaxMaster');
		if($this->request->is('post') || $this->request->is('put') )
		{
			$data=$this->request->data;
			$this->TaxMaster->create();
			foreach($data as $key => $row)
			{
			    if($data[$key]['TaxMaster']['tax_name'] == "")
				{
				 unset($data[$key]);
				}
			}
			if ($this->TaxMaster->saveAll($data)) 
			{
						$this->Session->setFlash(__('You have successfully added new Tax(s).'), 'default', array('class'=>'alert alert-success'));
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
		 $this->loadModel('TaxMaster');
		 if($this->request->is('put') || $this->request->is('post'))
		 { 
		    $data=$this->request->data;
		    $this->TaxMaster->create();
			if ($this->TaxMaster->save($data)) 
			{
						$this->Session->setFlash(__('You have successfully updated tax information.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'edit/id/'.$data['TaxMaster']['id'] ));
			}
			else
			{
						$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'edit/id/'.$data['TaxMaster']['id'] ));
			}
		 }
		 else
		 {	
		  $id= $this->passedArgs[1];
		  $this->loadModel('TaxMaster');
		  $options = array('conditions' => array('TaxMaster.id' =>  $id));
		  $this->request->data = $this->TaxMaster->find('first', $options);
		 }
}


public function delete($id)
{
	    $this->loadModel('TaxMaster');	
		$this->TaxMaster->id = $id;
		if ($this->TaxMaster->save(array("is_delete"=>1)))
     	{
		
		         $data = Array(
		            "message" => "Tax has been successfully deleted",
		            "status" => "ok"
	                 );
	    }
		else 
		{
	             $data = Array(
		            "message" => "Tax could not be deleted",
		            "status" => "error"
	                );
	     }
	    echo json_encode($data);
		exit;
}
	
	
public function index(){}
	
public function getJson()
{
	  $this->loadModel('TaxMaster');
	  $r = $_GET;  	  
	  $page=$r['page'];
	  $rp=$r['rows'];
	  $sortorder=$r['sord'];
	  $sortname=$r['sidx'];
	  if (!$page) $page = 1;
	  if (!$rp) $rp = 20; 
	  $start = (($page-1) * $rp);
	  $where = array("TaxMaster.is_delete"=>0);	 
      $count=count($this->TaxMaster->find('list'));
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
		 if($data['field'] == "TaxMaster.rate")
		 {
		    $where[$data['field']]=$data['data'];
		 }
		 else
		 {
		    $where[$data['field'].' like']='%'.$data['data'].'%';
		 }
		}	    
	   }	  
	   $result=$this->TaxMaster->find('all',array('order'=>$sortname.' '.$sortorder,'limit'=>$rp,'offset'=>$start,"conditions"=>$where));
	   $count1=count($result);
	   $json = '{
				"page":'.$page.',
				"total":'.$total_pages.',
				"records":'.$count.',
				"rows":[';
	   foreach($result as $key => $row)
	  {
		  
	    if(($key+1)==$count1)
	    {
				$json.='{"id":"'.$row['TaxMaster']['id'].'","cell":["'.$row['TaxMaster']['tax_name'].'","'.$row['TaxMaster']['print_name'].'","'.$row['TaxMaster']['rate'].'"]}';
	  }
	  else
	  {
				$json.='{"id":"'.$row['TaxMaster']['id'].'","cell":["'.$row['TaxMaster']['tax_name'].'","'.$row['TaxMaster']['print_name'].'","'.$row['TaxMaster']['rate'].'"]},';
	  }
    }
	$json.=']}';	
	echo $json;
	exit;
}
	

}

?>
