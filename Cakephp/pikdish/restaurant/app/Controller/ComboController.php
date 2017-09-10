<?PHP
App::uses('AppController','Controller');


class ComboController extends AppController
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
			$this->loadModel('ComboOffer');
                        $this->loadModel('ItemsRate');
			$this->loadModel('ComboItems');
			$data=$this->request->data;
			$data['ComboOffer']['start_date'] = date("Y-m-d",strtotime($data['ComboOffer']['start_date']));
			$data['ComboOffer']['end_date'] = date("Y-m-d",strtotime($data['ComboOffer']['end_date']));
			
		
			
			$this->ComboOffer->create();
			$this->ComboOffer->save($data['ComboOffer']);
			
			$combo_id = $this->ComboOffer->getInsertID();
			unset($data['ComboOffer']);
			unset($data['ComboItems']);
			foreach($data as $key => $row)
			{
				$portion=  $this->ItemsRate->find('all', array('order'=>array('id ASC'),'fields' => array('id','portion_id','item_id'),
		 		'conditions' => array('ItemsRate.id' => $row['ComboItems']['items_rate_id']) ) );
				
				$data[$key]['ComboItems']['items_id'] = $portion[0]['ItemsRate']['item_id'];
		 		$data[$key]['ComboItems']['portion_id'] = $portion[0]['ItemsRate']['portion_id'];
				$data[$key]['ComboItems']['combo_offer_id'] = $combo_id;
				$portion=NULL;
			}
				
			 
			if ($this->ComboItems->saveAll($data)) 
			{
			        	$this->Session->setFlash(__('You have successfully added new Combo Offer.'), 'default', array('class'=>'alert alert-success'));
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
		   $this->loadModel('ItemsRate');
		   
		   $data  = $this->ItemsRate->find("all",array("order"=>array("Item.item_name"),"fields"=>array("ItemsRate.id","Item.item_name","Portion.portion_name"),"conditions"=>array("Item.restuarant_id"=>$this->Session->read('restro_id')))) ; 
		   $this->set("data",$data);
		   
		   
		}
		
	}
	
	
	public function edit()
	{
		 $this->loadModel('ComboOffer');
		 $this->loadModel('ComboItems');
$this->loadModel('ItemsRate');
		 if($this->request->is('put') || $this->request->is('post'))
		 { 
		    
		    $data=$this->request->data;
			
			//echo "<pre>";
			//print_r($data);
			//exit;
			
			$data['ComboOffer']['start_date'] = date("Y-m-d",strtotime($data['ComboOffer']['start_date']));
			$data['ComboOffer']['end_date'] = date("Y-m-d",strtotime($data['ComboOffer']['end_date']));
			
			
			$this->ComboOffer->create();
			$this->ComboOffer->save($data['ComboOffer']);
			
			$combo_id = $data['ComboOffer']['id'];
			unset($data['ComboOffer']);
			unset($data['ComboItems']);
			$this->ComboItems->query("DELETE FROM `om_combo_items` WHERE `combo_offer_id` = $combo_id");
			foreach($data as $key => $row)
			{
				$portion=  $this->ItemsRate->find('all', array('order'=>array('id ASC'),'fields' => array('id','portion_id','item_id'),
		 		'conditions' => array('ItemsRate.id' => $row['ComboItems']['items_rate_id']) ) );
				
				$data[$key]['ComboItems']['items_id'] = $portion[0]['ItemsRate']['item_id'];
		 		$data[$key]['ComboItems']['portion_id'] = $portion[0]['ItemsRate']['portion_id'];
				$data[$key]['ComboItems']['combo_offer_id'] = $combo_id;
				$portion=NULL;
			}
			if ($this->ComboItems->saveAll($data)) 
			{
			        	$this->Session->setFlash(__('You have successfully edit Combo Offer.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'edit/id/'.$combo_id ));
				  
			}
			else
			{
						$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'edit/id/'.$combo_id ));
			}
			
			
		
		 }
		 else
		 {	
		  
		  $id= $this->passedArgs[1];
		  
		  $qry=$this->ComboItems->query("SELECT om_combo_offer.*,om_combo_items.*,(select om_items_rate.id from om_items_rate where om_items_rate.item_id=om_combo_items.items_id and om_items_rate.portion_id=om_combo_items.portion_id) as items_rate_id FROM `om_combo_offer`
INNER JOIN om_combo_items on om_combo_items.combo_offer_id=om_combo_offer.id
where om_combo_offer.id=$id");
$x=0;
 $i=0;
 $main_array=array();
 if(!empty($qry))
 {
	 foreach($qry as $event) {
	 	$ol_array[$x]=array();
	 
		 if($i==0)
		 {
			 $main_array[0]['ComboOffer'] = array(
					'id' => $event['om_combo_offer']['id'],
					'restaurant_id' => $event['om_combo_offer']['restaurant_id'],
					'offer_name' => $event['om_combo_offer']['offer_name'],
					'start_date' => $event['om_combo_offer']['start_date'],
					'end_date' => $event['om_combo_offer']['end_date'],
					'amt' => $event['om_combo_offer']['amt']
					
				);
				
				
				
		 }
		 
		 $ol_array[$x]=array(
					'id' => $event['om_combo_items']['id'],
					'combo_offer_id' => $event['om_combo_items']['combo_offer_id'],
					'items_id' => $event['om_combo_items']['items_id'],
					'portion_id' => $event['om_combo_items']['portion_id'],
					'qty' => $event['om_combo_items']['qty'],
					'items_rate_id' => $event[0]['items_rate_id']
					
				);
		 
		 
		 
		 
		 $i++;
		 $x++;
	 }
	 $main_array[0]['ComboItems']=$ol_array;
 }
		  
		  
		  $this->request->data = $main_array;

//echo "<pre>";
//print_r($this->request->data);
//exit;
		  
		  $this->loadModel('ItemsRate');
		  $data  = $this->ItemsRate->find("all",array("order"=>array("Item.item_name"),"fields"=>array("ItemsRate.id","Item.item_name","Portion.portion_name"),"conditions"=>array("Item.restuarant_id"=>$this->Session->read('restro_id')))) ; 
		  $this->set("data",$data);
		  
		}
		
}


	public function delete($id)
	{
	    $this->loadModel('ComboOffer');	
		$this->ComboOffer->id = $id;
		if ($this->ComboOffer->delete())
		{    
		     $this->loadModel('ComboItems');	
	         $this->ComboItems->query("DELETE FROM `om_combo_items` WHERE `combo_offer_id` = $id");
			 $data = Array(
				"message" => "Combo Offer has been successfully deleted",
				"status" => "ok"
				 );
			}
			else 
			{
			 $data = Array(
				"message" => "Combo could not be deleted",
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
		  
	      $this->loadModel('ComboOffer');
		  $r = $_GET;  	  
		  $page=$r['page'];
		  $rp=$r['rows'];
		  $sortorder=$r['sord'];
		  $sortname=$r['sidx'];
		  if (!$page) $page = 1;
		  if (!$rp) $rp = 20; 
		  $start = (($page-1) * $rp);
		  
		  $where = array("ComboOffer.restaurant_id"=>$this->Session->read('restro_id'),"ComboOffer.end_date >= "=>date("y-m-d"));	 
      $count=count($this->ComboOffer->find('list'));
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
		 if($data['field'] == "ComboOffer.offer_name")
		 {
		     $where[$data['field'].' like']='%'.$data['data'].'%';
		 }
		 else if($data['field'] == "ComboOffer.amt")
		 {
			 $where[$data['field']]=$data['data'];
		 }
		 else
		 {
			 $where[$data['field']] = date("Y-m-d",strtotime($data['data']));
		 }
		}	    
	   }	  
  	   
	   
	   $result=$this->ComboOffer->find('all',array('order'=>$sortname.' '.$sortorder,'limit'=>$rp,'offset'=>$start,"conditions"=>$where));
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
$json.='{"id":"'.$row['ComboOffer']['id'].'","cell":["'.$row['ComboOffer']['offer_name'].'","'.date("d-m-Y",strtotime($row['ComboOffer']['start_date'])).'","'.date("d-m-Y",strtotime($row['ComboOffer']['end_date'])).'","'.$row['ComboOffer']['amt'].'"]}';
	  }
	  else
	  {
$json.='{"id":"'.$row['ComboOffer']['id'].'","cell":["'.$row['ComboOffer']['offer_name'].'","'.date("d-m-Y",strtotime($row['ComboOffer']['start_date'])).'","'.date("d-m-Y",strtotime($row['ComboOffer']['end_date'])).'","'.$row['ComboOffer']['amt'].'"]},';
	  }
    }
		
		
	$json.=']}';	
	echo $json;
	exit;
		
	}
	

}

?>
