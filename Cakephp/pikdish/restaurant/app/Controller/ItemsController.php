<?PHP
App::uses('AppController','Controller');


class ItemsController extends AppController
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

			$this->loadModel('Item');
			$this->loadModel('ItemsRate');
			$this->loadModel('ItemExtras');

			$data=$this->request->data;
			//echo "<pre>";
			//print_r($data);
			//exit;
			$save ;
			foreach($data  as $key => $row)
			{
			  $data[$key]['Item']['preparation_time'] = floor(($data[$key]['Item']['preparation_time'] / 60)).":".($data[$key]['Item']['preparation_time'] % 60).":00";

			  $this->Item->create();
			  $save = $this->Item->save($data[$key]['Item']);
			  $item_id = $this->Item->getInsertID();
			  $food_type = $data[$key]['ItemsRate']['food_type_id'];
			  unset($data[$key]['Item']);
			  //Extra
			  if(isset($data[$key]['ItemExtras']))
			   {
				  $arr = array();
	              foreach($data[$key]['ItemExtras']['extras_id'] as $k=>$v)
				  {
				    $arr[$k]['ItemExtras']['extras_id'] = $v;
					$arr[$k]['ItemExtras']['items_id'] =  $item_id;
      			  }
				   $save = $this->ItemExtras->saveAll($arr);
				   unset($data[$key]['ItemExtras']);
			   }
			  //Rate
			  if($data[$key]['rate_type'] == 0)
			  {
			    unset($data[$key]['ItemsRate']);
			    unset($data[$key]['rate_type']);
			    foreach($data[$key] as $key1 => $row)
			    {
				   $data[$key][$key1]['ItemsRate']['item_id'] = $item_id;
				   $data[$key][$key1]['ItemsRate']['food_type_id'] = $food_type;
			    }
				$save = $this->ItemsRate->saveAll($data[$key]);

			  }
			   else
			   {
				   unset($data[$key]['rate_type']);
			 	   $data[$key]['ItemsRate']['item_id'] = $item_id;
			 	   $data[$key]['ItemsRate']['food_type_id'] = $food_type;
			       $save = $this->ItemsRate->saveAll($data[$key]);

			   }

			  /* */

			}


			if ($save)
			{
			        	$this->Session->setFlash(__('You have successfully added new Item(s).'), 'default', array('class'=>'alert alert-success'));
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
		   $this->loadModel('Portions');
		   $this->loadModel('Extras');
		   $portions = $this->Portions->find('all',array("order" =>"Portions.portion_name asc","fields"=>array("Portions.id,Portions.portion_name,Portions.default_portion"),'conditions'=>array("Portions.restaurant_id"=>$this->Session->read('restro_id'))));
		   $this->set("portions",$portions);

		   foreach($portions as $key=>$row)
		   {
			   if($row['Portions']['default_portion'] == 1 )
			    {
			       $this->set("default_portion",$row['Portions']['id']);
				   break;
			    }
		   }

		   $extras = $this->Extras->find('all',array("order" =>"Extras.name asc","fields"=>array("Extras.id,Extras.name"),'conditions'=>array("Extras.restaurant_id"=>$this->Session->read('restro_id'))));
		   $this->set("extras",$extras);

		}

		$this->loadModel('RestroTax');

		$options = null;
		$options['conditions']['RestroTax.restaurant_id'] = $this->Session->read('restro_id');
		$options['conditions']['TaxMaster.is_delete'] = 0;
		$options['order'] = array('RestroTax.id' => 'DESC');
		$options['contain'] = array('TaxMaster');
		$options['fields'] = array('TaxMaster.id', 'TaxMaster.rate');

		$restroTaxes = $this->RestroTax->find('first', $options);

		//$defaultTax = ( isset($restroTaxes['TaxMaster']['rate']) ) ? $restroTaxes['TaxMaster']['rate'] : '0.00';
		$defaultTax = ( isset($restroTaxes['TaxMaster']['id']) ) ? $restroTaxes['TaxMaster']['id'] : '';

		$this->set('defaultTax', $defaultTax);

		$options = null;
		$options['conditions']['TaxMaster.is_delete'] = 0;
		$options['order'] = array('TaxMaster.rate' => 'ASC');
		$options['fields'] = array('TaxMaster.id', 'TaxMaster.rate');

		$masterTaxes = $this->RestroTax->TaxMaster->find('list', $options);

		$this->set('masterTaxes', $masterTaxes);

	}

	public function edit()
	{
		 if($this->request->is('post') || $this->request->is('put'))
		{

			$this->loadModel('Item');
			$this->loadModel('ItemsRate');
			$this->loadModel('ItemExtras');

			$data=$this->request->data;

			//echo "<pre>";
			//print_r($data);
			//exit;
			$save ;

			  $data['Item']['preparation_time'] = floor(($data['Item']['preparation_time'] / 60)).":".($data['Item']['preparation_time'] % 60).":00";

			  if(!isset($data['Item']['discount_applicability']))
			  {
				$data['Item']['discount'] =0;
				$data['Item']['	discount_type'] =0;

			  }
			  $this->Item->create();
			  $save = $this->Item->save($data['Item']);
			  $item_id = $data['Item']['id'];
			  if($save)
			  {
				  $this->ItemsRate->query("DELETE FROM `om_items_rate` WHERE `item_id` = $item_id");
				  $this->ItemExtras->query("DELETE FROM `om_item_extras` WHERE `items_id` = $item_id");
			  }
			  $food_type = $data['ItemsRate']['food_type_id'];
			  unset($data['Item']);
			  //Extra
			  if(isset($data['ItemExtras']))
			     {
				   $arr = array();
	               foreach($data['ItemExtras']['extras_id'] as $k=>$v)
				   {
				     $arr[$k]['ItemExtras']['extras_id'] = $v;
					 $arr[$k]['ItemExtras']['items_id'] =  $item_id;
      			   }
				   $save = $this->ItemExtras->saveAll($arr);
				   unset($data['ItemExtras']);
			   }
			  //rate
			  if($data['rate_type'] == 0)
			  {
			    unset($data['ItemsRate']);
			    unset($data['rate_type']);
			    foreach($data as $key1 => $row)
			    {
				   $data[$key1]['ItemsRate']['item_id'] = $item_id;
				   $data[$key1]['ItemsRate']['food_type_id'] = $food_type;
			    }
				$save = $this->ItemsRate->saveAll($data);

			  }
			   else
			   {
				   unset($data['rate_type']);
			 	   $data['ItemsRate']['item_id'] = $item_id;
			 	   $data['ItemsRate']['food_type_id'] = $food_type;
			       $save = $this->ItemsRate->saveAll($data);

			   }

			if ($save)
			{
			        	$this->Session->setFlash(__('You have successfully update Item).'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'edit/id/'.$item_id ));

			}
			else
			{
						$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'add/id'.$item_id ));
			}

		}
		else
		{
		   $this->loadModel('Portions');
		   $portions = $this->Portions->find('all',array("order" =>"Portions.portion_name asc","fields"=>array("Portions.id,Portions.portion_name,Portions.default_portion"),'conditions'=>array("Portions.restaurant_id"=>$this->Session->read('restro_id'))));
		   $this->set("portions",$portions);
		   foreach($portions as $key=>$row)
		   {
			   if($row['Portions']['default_portion'] == 1 )
			    {
			       $this->set("default_portion",$row['Portions']['id']);
				   break;
			    }
		   }
		   $this->loadModel('Extras');
		   $extras = $this->Extras->find('all',array("order" =>"Extras.name asc","fields"=>array("Extras.id,Extras.name"),'conditions'=>array("Extras.restaurant_id"=>$this->Session->read('restro_id'))));
		   $this->set("extras",$extras);


		   $this->loadModel('ItemsRate');
		   $this->request->data = $this->ItemsRate->find("all",array("conditions"=>array("ItemsRate.item_id"=>$this->passedArgs[1]))) ;

		   $this->loadModel('ItemExtras');
		   $items_extra = $this->ItemExtras->find('list',array("fields"=>array("ItemExtras.extras_id"),'conditions'=>array("ItemExtras.items_id"=>$this->passedArgs[1])));
		   $this->set("items_extra",$items_extra);
		   //echo "<pre>";
		   //print_r($items_extra);
		   //exit;



		}


		$this->loadModel('RestroTax');

		$options = null;
		$options['conditions']['RestroTax.restaurant_id'] = $this->Session->read('restro_id');
		$options['conditions']['TaxMaster.is_delete'] = 0;
		$options['order'] = array('RestroTax.id' => 'DESC');
		$options['contain'] = array('TaxMaster');
		$options['fields'] = array('TaxMaster.id', 'TaxMaster.rate');

		$restroTaxes = $this->RestroTax->find('first', $options);

		//$defaultTax = ( isset($restroTaxes['TaxMaster']['rate']) ) ? $restroTaxes['TaxMaster']['rate'] : '0.00';
		$defaultTax = ( isset($restroTaxes['TaxMaster']['id']) ) ? $restroTaxes['TaxMaster']['id'] : '';

		$this->set('defaultTax', $defaultTax);

		$options = null;
		$options['conditions']['TaxMaster.is_delete'] = 0;
		$options['order'] = array('TaxMaster.rate' => 'ASC');
		$options['fields'] = array('TaxMaster.id', 'TaxMaster.rate');

		$masterTaxes = $this->RestroTax->TaxMaster->find('list', $options);

		$this->set('masterTaxes', $masterTaxes);


	}


	public function delete($id)
	{
	    $this->loadModel('Item');
		$this->loadModel('ItemsRate');
		$this->loadModel('ItemExtras');

		$this->ItemExtras->query("DELETE FROM `om_item_extras` WHERE `items_id` =  $id");
		$this->ItemsRate->query("DELETE FROM `om_items_rate` WHERE `item_id` = $id");
		$this->Item->id = $id;

				if ($this->Item->delete())
				 {

		         $data = Array(
		            "message" => "Item has been successfully deleted",
		            "status" => "ok"
	                 );
	            }
				else
				{
	             $data = Array(
		            "message" => "Item could not be deleted",
		            "status" => "error"
	                );
	            }


		echo json_encode($data);
		exit;
	}


	public function index()
	{

		if($this->request->is('put') || $this->request->is('post'))
		{
			$this->Session->delete('cat_id');
			$this->Session->write("cat_id",$this->request->data['cat_id']);
		}
		   	$this->loadModel('Categories');
			$cat_name = $this->Categories->find('first',array("conditions"=>array('Categories.id'=>$this->Session->read("cat_id"))));
			$this->set('cat_name',$cat_name['Categories']['category_name']);

	}


	public function getJson()
	{
		 // $this->request->onlyAllow('ajax'); // No direct access via browser URL
 		 // $this->layout = null ;
		  $cat_id= $this->passedArgs[1];
	      $this->loadModel('Item');
		  $r = $_GET;
		  $page=$r['page'];
		  $rp=$r['rows'];
		  $sortorder=$r['sord'];
		  $sortname=$r['sidx'];
		  if (!$page) $page = 1;
		  if (!$rp) $rp = 20;
		  $start = (($page-1) * $rp);

		  $where = array("Item.category_id"=>$cat_id);
      $count=count($this->Item->find('list'));
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
		 if($data['field'] == "Item.preparation_time")
		 {
		     $where[$data['field']]=$data['data'];
		 }
		 else
		 {
			 $where[$data['field'].' like']='%'.$data['data'].'%';

		 }
		}
	   }


	   $result=$this->Item->find('all',array('order'=>$sortname.' '.$sortorder,'limit'=>$rp,'offset'=>$start,"conditions"=>$where));
	   $count=count($result);
	   $json = '{
				"page":'.$page.',
				"total":'.$total_pages.',
				"records":'.$count.',
				"rows":[';
	   foreach($result as $key => $row)
	  {

		 $h   =  explode(":",$row['Item']['preparation_time']) ;//." minutes";
		 $str= "";
		 if($h[0] > 0)
		 {
		   $str = " $h[0] hours, " ;
		 }
		 $str.= $h[1]." minutes";
		 $row['Item']['preparation_time'] = $str;

	    if(($key+1)==$count)
	    {
$json.='{"id":"'.$row['Item']['id'].'","cell":["'.$row['Item']['item_name'].'","'.$row['Item']['ingredients'].'","'.$row['Item']['preparation_time'].'"]}';
	    }
	    else
	    {
$json.='{"id":"'.$row['Item']['id'].'","cell":["'.$row['Item']['item_name'].'","'.$row['Item']['ingredients'].'","'.$row['Item']['preparation_time'].'"]},';
	    }
    }


	$json.=']}';
	echo $json;
	exit;

	}


}

?>
