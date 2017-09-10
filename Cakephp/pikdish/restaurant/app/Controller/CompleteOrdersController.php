<?PHP
App::uses('AppController','Controller');
class CompleteOrdersController extends AppController
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
	public function index(){}
	public function order_list()
	{
		if($this->request->is("post") || $this->request->is("put"))
		{
			$title = "";
			$data = $this->request->data;
			switch($data['optradio'])
			{
				case 0:{
					     //for the period 01/01/2017 to 31/01/2017
					     $title = " for today [ ".date("d-m-Y", time())." ]";
					     $d1 = date("Y-m-d", time())." 00:00:00";
		                 $d2 = date("Y-m-d", time())." 23:59:59";
						 break;
				        }
				case 1:{

					     $d1 = $data['start_date']." 00:00:00";
		                 $d2 = $data['end_date']." 23:59:59";
						 $title = " for the period ".date("d/m/Y",strtotime($d1))." to ".date("d/m/Y",strtotime($d2));
					     break;
				        }
			    case 2:{

						 $d1 = $data['month']."-01 00:00:00";
			             $date_array = explode("-",$data['month']);
						 $days=cal_days_in_month(CAL_GREGORIAN,$date_array['1'],$date_array['0']);
						 $d2 = $data['month']."-$days 23:59:59";
						 $title = " for the period ".date("d/m/Y",strtotime($d1))." to ".date("d/m/Y",strtotime($d2));
				         break;
				        }
				case 3:
				      {
						  $cur_mnt = date("n",time());
						  $year = date("Y",time());
						  $last_6_mnt = $cur_mnt - 6;
						  if($last_6_mnt < 0)
						  { $last_6_mnt+=12; $year-=1;}
						  $d1 = "$year-$last_6_mnt-".date("d",time())." 00:00:00";
						  $d2 = date("Y-m-d", time())." 23:59:59";
						  $title = " for the period ".date("d/m/Y",strtotime($d1))." to ".date("d/m/Y",strtotime($d2));
						 break;
					  }
				case 4:
				      {
						 $d1 = $data["year_id"]."-01-01 00:00:00";
						 if($data['year_id'] == date("Y",time()))
						 {
						   $d2 = date("Y-m-d", time())." 23:59:59";
						 }
						 else
						 {
						   $d2 = $data["year_id"]."-12-31 23:59:59";
						 }
						 $title = " for the period ".date("d/m/Y",strtotime($d1))." to ".date("d/m/Y",strtotime($d2));
						 break;
					  }
				default:
				        $d1 = date("Y-m-d", time())." 00:00:00";
		                $d2 = date("Y-m-d", time())." 23:59:59";
						$title = " for the period ".date("d/m/Y",strtotime($d1))." to ".date("d/m/Y",strtotime($d2));


			}
		}
		else
		{
		          return $this->redirect("/complete_orders");
		}

		 $this->Session->delete('record_count');
		 $this->Session->delete('start_date');
		 $this->Session->delete('end_date');

		 $this->Session->write('record_count',$data['record_count']);
		 $this->Session->write('start_date',$d1);
		 $this->Session->write('end_date',$d2);

		 $this->set("title",$title);

	}
	public function getJson()
	{
         $restro_info = $this->viewVars['restro_info'] ;

		 $d1 = $this->Session->read('start_date');
		 $d2 = $this->Session->read('end_date');

		 $this->loadModel("OrdersH");
		 $sql =" SELECT `OrdersL`.`name`,`OrdersH`.`id`, `OrdersH`.`order_no`, `OrdersH`.`order_type`, `OrdersH`.`entry_date`, `OrdersH`.`net_amt`, `RestaurantTables`.`cust_table_internal_code` FROM `pikdish_onlinemenu`.`om_orders_h` AS `OrdersH` LEFT JOIN `pikdish_onlinemenu`.`om_restaurant_tables` AS `RestaurantTables` ON (`OrdersH`.`restaurant_tables_id` = `RestaurantTables`.`id`) left JOIN ( SELECT `OrdersL`.`orders_h_id`,`User`.`name` FROM `om_orders_l` as `OrdersL` inner join `om_users` as `User` on (`OrdersL`.`user_id` = `User`.`id`) WHERE `OrdersL`.`restaurant_id` = ".$restro_info['Restaurant']['id']."  group by `OrdersL`.`orders_h_id`) AS `OrdersL` ON (`OrdersL`.`orders_h_id` = `OrdersH`.`id`)  ";


		  $orders = $orders = $this->OrdersH->query($sql);
		  $r = $_GET;
		  $page=$r['page'];
		  $rp=$r['rows'];
		  $sortorder=$r['sord'];
		  $sortname=$r['sidx'];
		  $sort = "ORDER BY $sortname $sortorder";
		  if (!$page) $page = 1;
		  if (!$rp) $rp = 20;
		  $start = (($page-1) * $rp);
		  $limit = "LIMIT $start, $rp";
		  $group = "";

		  $where = " WHERE `OrdersH`.`is_cancel`= 0 and `OrdersH`.`is_billed` = 1 AND `OrdersH`.`entry_date` >= '".$d1."' AND `OrdersH`.`entry_date` <= '".$d2."' AND `OrdersH`.`restaurant_id` = '".$restro_info['Restaurant']['id']."' ";


          $count=count($this->OrdersH->query($sql.$where));
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

		    $where.= " and ".$data['field']." like '%".$data['data']."%'" ;
		}
	   }

	   $query = $sql.$where.'  '.$group.' '.$sort.' '.$limit;

	   $result=$this->OrdersH->query($query);
	   //echo "<pre>";
	   //print_r($result);
	   //exit;
	   $count=count($result);
	   $json = '{
				"page":'.$page.',
				"total":'.$total_pages.',
				"records":'.$count.',
				"rows":[';
	   foreach($result as $key => $row)
	  {
		                    $str = "<Button class='btn  btn-primary left' onclick='dialog_display(".$row['OrdersH']['id'].")' >Details</Button><Button  class='btn  btn-success' onclick='dialog_bill(".$row['OrdersH']['id'].")' >Print Bill</Button><Button class='btn  btn-success right' onclick='dialog_print(".$row['OrdersH']['id'].")' >Print Order</Button>";
		        if($row['OrdersH']['order_type'] == 1)
				{
					$row['OrdersH']['order_type'] = "Pre Order";
                    $row['RestaurantTables']['cust_table_internal_code'] = "";
				}
				elseif($row['OrdersH']['order_type'] == 0)
				{
					$row['OrdersH']['order_type'] = "Pre Order";
					$row['RestaurantTables']['cust_table_internal_code'] = "";
				}else
				{
					$row['OrdersH']['order_type'] = "Table Order";

				}

	  if(($key+1)==$count)
	  {
	    $json.='{"id":"'.$row['OrdersH']['id'].'","cell":["'.$row['OrdersL']['name'].'","'.$row['OrdersH']['order_type'].'","'.$row['RestaurantTables']['cust_table_internal_code'].'","'.date("d/m/Y",strtotime($row['OrdersH']['entry_date'])).'","'.$row['OrdersH']['net_amt'].'","'.$str.'"]}';
	  }
	  else
	  {
		$json.='{"id":"'.$row['OrdersH']['id'].'","cell":["'.$row['OrdersL']['name'].'","'.$row['OrdersH']['order_type'].'","'.$row['RestaurantTables']['cust_table_internal_code'].'","'.date("d/m/Y",strtotime($row['OrdersH']['entry_date'])).'","'.$row['OrdersH']['net_amt'].'","'.$str.'"]},';
	  }
    }
	$json.=']}';
	echo $json;
	exit;

	}


	public function getDialogBox()
	{
		$this->loadModel("OrdersH");
		$row = $this->OrdersH->find(
		          "first",
				  array
				   (
				     "order"=>"OrdersH.entry_date asc",
					 "conditions"=>array("OrdersH.id"=>$this->passedArgs[0]),
					 "recursive"=>5,
					)
				 )   ;
				 $c=0;
				 $order_name =  $row['OrdersH']['order_type'] == 0 ? "Packing" : $row['OrdersH']['order_type'] == 1 ? "Pre Order" : "Table Order";
				 ?>
		<div id="dialog-response_<?=$row['OrdersH']['id']?>" title="<?=$row['OrdersH']['order_type'] == 2 ? $row['RestaurantTables']['cust_table_internal_code'] : $order_name ; ?>" style=" overflow:hidden"  class="order_div_<?=$row['OrdersH']['id']?>" >
          <div style="float:right;font-weight:600 ">Order Time : <?=date("d-m-Y H:i A",strtotime($row['OrdersH']['entry_date']))?></div>
        <table id="dialog_table_<?=$row['OrdersH']['id']?>" class=" table table-hover table-bordered " style="margin-bottom:0px; border-spacing: 0" >
             <thead style="border:0px">
              <tr>
               <th id="order_type_1" colspan="3" ><?=$order_name?><div style="float:right;">Amount : <span style=" padding-left:12px;color:#121212; background:no-repeat url(<?=$this->path?>img/rupess.png)"><?=$row['OrdersH']['net_amt']?></span></div>
                        </th>
                       </tr>
                       <tr>
                         <td colspan="2"><div style="float:left; height:100%"><?=$row['OrdersL'][0]['User']['mobile_no']."(".ucwords($row['OrdersL'][0]['User']['name']).")"?></div><div style="float:right; text-align:right; padding:0px; margin:0px"><span style="line-height:0px"><?
						 if($row['OrdersH']['payment_mode'] == 0)
						 {
							 echo "Cash Payment";
						 }
						 else
						 {
							 echo "Online Payment";
							 echo "<br>";
							 echo "<b>Transaction Id</b> : ".$row['OrdersH']['transaction_id'];
						 }

						 ?></span></div></td>
                       </tr>

                       <tr>

                         <th  style="text-align:left;" width="50%" >Item Name</th>
                         <th style="text-align:justify;" width="25%" >Quantity</th>


                       </tr>
                       </thead>
                       <tbody style="display:block; overflow-y:auto;overflow-x:auto; max-height:219px; width:154.5%; border:0px" id="tbody_<?=$row['OrdersH']['id']?>" >
                       <?
					    $row['OrdersL'] = array_reverse ($row['OrdersL']);
						foreach($row['OrdersL'] as $k=>$v)
						 {
							if($v['is_cancel'] == 1)continue;

						?>
                        <tr class="tr_<?=$v['id']?>" >
                        <?	if($v['items_rate_id'] != 0){   ?>
                         <td style="width:379px" ><?=ucwords($v['ItemsRate']['Item']['item_name'])?><?=$v['ItemsRate']['Portion']['default_portion'] == 1 ?
						 "" :
						 " (".ucwords($v['ItemsRate']['Portion']['portion_name']).")"?>
                         <?

						  $extra = "";
						  $extra_count = count($v['OrderExtras']);

						  foreach($v['OrderExtras'] as $a=>$b)
						  {
						      if($a == 0)
							  {
								  $extra="<span style='font-size:11px; color:black;line-height:0px !important'>with ".ucwords($b['Extras']['name']);
							  }
							  else if(($a+1) == $extra_count)
							  {
								  $extra.=" and ".ucwords($b['Extras']['name'])."</span>";
							  }
							  else
							  {
								   $extra.=", ".ucwords($b['Extras']['name']);
							  }
						  }
						  echo $extra;
						 ?>
                         </td>
                         <td  style="text-align:justify;width:190px"><span class="badge "><?=$v['qty']?></span></td>
                         <? }else {
						  echo '<td style="width:379px">'.ucwords($v['ComboOffer']['offer_name'])." ";

						  $extra = "";
						  $extra_count = count($v['OrderExtras']);

						  foreach($v['OrderExtras'] as $a=>$b)
						  {
						      if($a == 0)
							  {
								  $extra="<span style='font-size:11px; color:black;line-height:0px !important'>with ".ucwords($b['Extras']['name']);
							  }
							  else if(($a+1) == $extra_count)
							  {
								  $extra.=" and ".ucwords($b['Extras']['name'])."</span>";
							  }
							  else
							  {
								   $extra.=", ".ucwords($b['Extras']['name']);
							  }

						  }
						  echo $extra.'</td>';

						 ?>

                         <td  style="text-align:justify; width:190px"><span class="badge "><?=$v['qty']?></span></td>
                          </tr>
                          <tr class="tr_<?=$v['id']?>"><td colspan="3"><span style="text-decoration:underline ;" >
						  <? echo ucwords($v['ComboOffer']['offer_name'])." : Item List</span><br>";
						  $extra="";
						  $extra_count = count($v['ComboOffer']['ComboItems']);
						  foreach($v['ComboOffer']['ComboItems'] as $a=>$b)
						  {
							   if($a == 0)
							  {
								  $extra=ucwords($b['ItemsRate']['Item']['item_name']."( qty :<span class='badge'>".$b['qty']."</span>)");
							  }
							  else if(($a+1) == $extra_count)
							  {
								  $extra.=" and ".ucwords($b['ItemsRate']['Item']['item_name']."( qty :<span class='badge'>".$b['qty']."</span>)")."</span>";
							  }
							  else
							  {
								   $extra.=", ".ucwords($b['ItemsRate']['Item']['item_name']."( qty :<span class='badge'>".$b['qty']."</span>)");
							  }
							 }
						  echo $extra."</td>";

						} ?>
                        </tr>


						<? } ?>
                        </tbody>
                        <tfoot style=" width:100%; border:0px">
						   <?
						  if(count($row['OrderComments']))
						  {

						 ?>

                        <tr>
                          <td colspan="2" style="text-align:left">
                            <label>Suggestion for Chef</label><br />
                            <div style=" width:100%; border:1px solid #ddd; border-radius:7px; padding:5px; height:auto; max-height:68px; overflow-y:auto;overflow-x:hidden">
                            <ol style="padding-left:20px; list-style-type:circle; " class="comment_list_<?=$row['OrdersH']['id']?>" >
                             <?
							  foreach($row['OrderComments'] as $n)
							  {
							     echo "<li>".$n['comments']."</li>";
							  }
							 ?>
                            </ol>
                            </div>
                          </td>
                        </tr>

                        <? }?>

                         <tr>
                           <td colspan="2">

                      <Button style="float:left" class="btn  btn-primary left" onclick="dialog_print(<?=$row['OrdersH']['id']?>,1)" >Print Order</Button>
                      <Button  class="btn  btn-success " style="float:right"  onclick="dialog_bill(<?=$row['OrdersH']['id']?>,1)" >Print Bill</Button>
                           </td>
                         </tr>
                         </tfoot>
                     </table></div><?
		exit;
	}
}

?>