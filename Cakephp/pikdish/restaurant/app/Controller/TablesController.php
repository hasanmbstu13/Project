<?PHP
App::uses('AppController','Controller');
App::uses('BarcodeHelper','Vendor');

class TablesController extends AppController
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
		 $randname = "table";
		 $time = time();
		 $photoname = strtolower($randname)."_".$time.".png";
         QRcode::png('www.pikdish.com');
		 exit;

		 //exit;
		 //$data_to_encode = '1012012,BLAHBLAH01234,1234567891011';
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


	public function add()
	{
		include("phpqrcode/qrlib.php");
		if($this->request->is('post') || $this->request->is('put'))
		{
			$this->loadModel('RestaurantTables');
			$data=$this->request->data;
			$this->RestaurantTables->create();
			foreach($data as $key => $row)
			{

			    if($data[$key]['RestaurantTables']['cust_table_internal_code']!=="")
				{
				 $data[$key]['RestaurantTables']['restaurant_id'] = $this->Session->read('restro_id');
				 $this->RestaurantTables->create();
			     $this->RestaurantTables->save($data[$key]);
				 $last_id = $this->RestaurantTables->getInsertID();

		         $randname = "table";
		         $photoname = strtolower($randname)."_".md5($last_id).".png";
				 $data_string = 'Restaurant:'.$this->Session->read('restro_id').',Table no:'.$last_id;
				 $data_string = password_hash($data_string,PASSWORD_DEFAULT);

                 QRcode::png($data_string, 'img/barcode/'.$photoname);
				 $data[$key]['RestaurantTables']['hash_value'] = $data_string;
		         $data[$key]['RestaurantTables']['bar_code_data'] = $photoname;
				 $data[$key]['RestaurantTables']['id'] = $last_id;
				}
				else
				{
					unset($data[$key]);
				}



			}
			if ($this->RestaurantTables->saveAll($data))
			{
			        	$this->Session->setFlash(__('You have successfully added new Table(s).'), 'default', array('class'=>'alert alert-success'));
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
		 $this->loadModel('RestaurantTables');
		 if($this->request->is('put') || $this->request->is('post'))
		 {

		    $data=$this->request->data;
		    $this->RestaurantTables->create();
			if ($this->RestaurantTables->save($data))
			{


						$this->Session->setFlash(__('You have successfully updated Table information.'), 'default', array('class'=>'alert alert-success'));
						return $this->redirect(array( 'action' => 'edit/id/'.$data['RestaurantTables']['id'] ));

			}
			else
			{
						$this->Session->setFlash(__('Please review the fields an try again.'), 'default', array('class'=>'alert alert-danger'));
						return $this->redirect(array( 'action' => 'edit/id/'.$data['RestaurantTables']['id'] ));
			}


		 }
		 else
		 {

		  $id= $this->passedArgs[1];
		  $this->loadModel('RestaurantTables');
		  $options = array('conditions' => array('RestaurantTables.id' =>  $id));
		  $this->request->data = $this->RestaurantTables->find('first', $options);

		}

}


	public function delete($id)
	{
	    $this->loadModel('RestaurantTables');



			$this->RestaurantTables->id = $id;
			$qrcode=$this->RestaurantTables->find('first',array('fields'=>array('bar_code_data'),'conditions'=>array('RestaurantTables.id'=>$id)));

				if($qrcode['RestaurantTables']['bar_code_data']!='')
				{
				 unlink('img/barcode/'.$qrcode['RestaurantTables']['bar_code_data']);
				}
				if ($this->RestaurantTables->delete())
				 {

		         $data = Array(
		            "message" => "Table has been successfully deleted",
		            "status" => "ok"
	                 );
	            }
				else
				{
	             $data = Array(
		            "message" => "Table could not be deleted",
		            "status" => "error"
	                );
	            }


		echo json_encode($data);
		exit;
	}


	public function index()
	{


	}


	public function getTables()
	{
		 // $this->request->onlyAllow('ajax'); // No direct access via browser URL
 		 // $this->layout = null ;

	      $this->loadModel('RestaurantTables');
		  $r = $_GET;
		  $page=$r['page'];
		  $rp=$r['rows'];
		  $sortorder=$r['sord'];
		  $sortname=$r['sidx'];
		  if (!$page) $page = 1;
		  if (!$rp) $rp = 20;
		  $start = (($page-1) * $rp);

		  $where = array("RestaurantTables.restaurant_id"=>$this->Session->read('restro_id'));
      $count=count($this->RestaurantTables->find('list'));
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
		 if($data['field'] == "RestaurantTables.cust_table_internal_code")
		 {
		  $where[$data['field'].' like']='%'.$data['data'].'%';
		 }
		 else
		 {
			 $where[$data['field']]=$data['data'];
		 }
		}
	   }


	   $result=$this->RestaurantTables->find('all',array('order'=>$sortname.' '.$sortorder,'limit'=>$rp,'offset'=>$start,"conditions"=>$where));
	   $count=count($result);
	   $json = '{
				"page":'.$page.',
				"total":'.$total_pages.',
				"records":'.$count.',
				"rows":[';
	   foreach($result as $key => $row)
	  {




		  //$barcode="<a download='table_".$row['RestaurantTables']['id']."' style='width:45px'  href='".$this->restro_path."img/barcode/".$row['RestaurantTables']['bar_code_data']."'><img  src='".$this->restro_path."img/barcode/".$row['RestaurantTables']['bar_code_data']."' style='width:45px' /></a>";
		   $barcode="<a onclick='print_div(".$row['RestaurantTables']['id'].")' ><img  src='".$this->restro_path."img/barcode/".$row['RestaurantTables']['bar_code_data']."' style='width:45px' /></a><table class='print_table".$row['RestaurantTables']['id']." visible-print' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='text-align:center'><img  src='".$this->restro_path."img/barcode/".$row['RestaurantTables']['bar_code_data']."' style='width:45px' /><br>".$row['RestaurantTables']['cust_table_internal_code']."</td></tr></table>";
	    if(($key+1)==$count)
	  {
$json.='{"id":"'.$row['RestaurantTables']['id'].'","cell":["'.$row['RestaurantTables']['cust_table_internal_code'].'","'.$row['RestaurantTables']['table_number'].'","'.$row['RestaurantTables']['no_of_seat'].'","'. $barcode.'"]}';
	  }
	  else
	  {
$json.='{"id":"'.$row['RestaurantTables']['id'].'","cell":["'.$row['RestaurantTables']['cust_table_internal_code'].'","'.$row['RestaurantTables']['table_number'].'","'.$row['RestaurantTables']['no_of_seat'].'","'. $barcode.'"]},';
	  }
    }


	$json.=']}';
	echo $json;
	exit;

	}


}

?>
