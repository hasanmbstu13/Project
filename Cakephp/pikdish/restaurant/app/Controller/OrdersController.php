<?PHP
App::uses('AppController','Controller');


class OrdersController extends AppController
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


		 $restro_info = $this->viewVars['restro_info'] ;
		 $d = date("Y-m-d H:i:s",time());
		 if($restro_info['Restaurant']['cancel_available'] == 1)
		 {
			$d = date("Y-m-d H:i:s",time()-($restro_info['Restaurant']['auto_cancel_time']*60));
		 }

		$this->loadModel("OrdersH");
		$this->loadModel("OrdersL");
		$this->loadModel("OrderComments");

		$orders = $this->OrdersH->find(
		          "all",
				  array
				   (
				     "order"=> array( "OrdersH.entry_date" => 'ASC' ),
					 /*"conditions"=>array("OrdersH.is_cancel"=>0,"OrdersH.is_billed"=>0,"OrdersH.entry_date <= " => $d,"OrdersH.restaurant_id"=>$restro_info['Restaurant']['id']),
					 - Replace is_billed by order_complete */
					 "conditions"=>array("OrdersH.is_cancel"=>0,"OrdersH.order_complete"=>0,"OrdersH.entry_date <= " => $d,"OrdersH.restaurant_id"=>$restro_info['Restaurant']['id']),
					 "recursive"=>5,

				   )
				 )   ;




		$this->OrdersH->query("update `om_orders_h` set `display` = '1' where  `restaurant_id` = ".$restro_info['Restaurant']['id']." and `entry_date` <=  '$d' ");
		$this->OrdersL->query("update `om_orders_l` set `display` = '1' where `restaurant_id` = ".$restro_info['Restaurant']['id']." and `is_print` = 0 and `entry_date_time` <= '$d' ");
		$this->OrderComments->query("update `om_order_comments` set `display` = '1' where `orders_h_id` in (select `id` from `om_orders_h` where `restaurant_id` = ".$restro_info['Restaurant']['id'].")");

        $this->set("orders",$orders);
	}

	public function cancelOrder()
	{


		$this->loadModel("OrdersH");
		$this->loadModel("OrdersL");
		$this->loadModel("OrderTaxs");
		$this->loadModel("OrderExtras");


		$orderl = $this->OrdersL->find("first",array("fields"=>array("OrdersL.orders_h_id","OrdersL.total_amt","OrdersL.qty"),"conditions"=>array("OrdersL.id"=>$this->passedArgs[0]),"recursive"=>2));
		$orderh_amount = $this->OrdersH->find("first",array("contain"=>array("OrderTaxs"),"fields"=>array("total_amt","net_amt","service_charges"),"conditions"=>array("OrdersH.id"=>$orderl['OrdersL']['orders_h_id'])));

		$this->OrdersL->id = $this->passedArgs[0];
		$this->OrdersL->save(array("is_cancel"=>1));

		$total_amount = $orderl['OrdersL']['total_amt'];
		foreach($orderl['OrderExtras'] as $k => $r)
		{
			$total_amount += $r['Extras']['amt']*$orderl['OrdersL']['qty'];
			$this->OrderExtras->id = $r['id'];
		    $this->OrderExtras->delete();
		}
		//new total_amount to be update in table OrdersH
		$subtotal = $orderh_amount['OrdersH']['total_amt']-$total_amount;
		//service_charges
		$tax_amount =$orderh_amount['OrdersH']['service_charges'] != 0 ? ($subtotal*$orderh_amount['OrdersH']['service_charges'])/100 : 0;
		//other taxs

		foreach($orderh_amount['OrderTaxs'] as $k=>$r)
		{
			$tax = ($subtotal*$r['rate'])/100 ;
			$tax_amount+=$tax;
			//updating taxs for orderh
			$this->OrderTaxs->id = $r['id'];
		    $this->OrderTaxs->save(array("amount"=>$tax));

		}
		//net amount to be updated in order_h table;
		$net_amount = $subtotal+$tax_amount;
		// final update in Ordersh

		//check for all items

		$o_count = $this->OrdersL->find("count",array("fields"=>"OrdersL.id","conditions"=>array("OrdersL.orders_h_id"=>$orderl['OrdersL']['orders_h_id'],"OrdersL.is_cancel"=>0)));

		$options = array("total_amt"=>$subtotal,"net_amt"=>$net_amount);
		if($o_count == 0)
		{
		  $options['is_cancel']	 = 1;
		}

		$this->OrdersH->id = $orderl['OrdersL']['orders_h_id'];
		$this->OrdersH->save($options);


		echo '["'.$orderl['OrdersL']['orders_h_id'].'","'.$subtotal.'","'.$net_amount.'","'.$o_count.'"]';
		exit;

	}
	public function getPrint()
	{
		$restro_info = $this->viewVars['restro_info'] ;
		$this->loadModel("OrdersH");
		$this->loadModel("OrdersL");
		$this->loadModel("OrderComments");

		$type = $this->passedArgs[1];
		if($type == -1)
		{
			$tmp_l_id = explode(",", $this->passedArgs[0]);
			$ordersh = $this->OrdersL->find("list",array("fields"=>array("OrdersL.id","OrdersL.orders_h_id"),"conditions"=>array("OrdersL.id"=>$tmp_l_id)));
			$order_id = explode(",", implode(",",$ordersh));
			$itemsIds = array_keys($ordersh);
		}
		elseif($type == 0 || $type == 1)
		{
			$order_id = $this->passedArgs[0];
		}
		else
		{
			$count = $this->OrdersL->find("count",array("fields"=>array("OrdersL.id"),"conditions"=>array("OrdersL.is_print"=>0,"OrdersL.is_cancel"=>0,"OrdersL.restaurant_id"=>$restro_info['Restaurant']['id'])));
			if($count == 0)
			{
				echo $count;
				exit;
			}
			else
			{
				$ordersh = $this->OrdersL->find("list",array("group"=>array("OrdersL.orders_h_id"),"fields"=>array("OrdersL.id","OrdersL.orders_h_id"),"conditions"=>array("OrdersL.is_print"=>0,"OrdersL.restaurant_id"=>$restro_info['Restaurant']['id'])));
				$order_id = explode(",", implode(",",$ordersh));
			}

		}

		  //if($type != -2)
		  //{

		$this->OrdersH->bindModel(array(
			'hasMany' => array(
				'OrdersL' => array(
					'conditions' => array(
						'OrdersL.admin_checked = 0'
					)
				)
			)
		));

		$orders = $this->OrdersH->find(
			"all",
			array
			(
				"order"=>"OrdersH.entry_date asc",
				"conditions"=>array("OrdersH.id"=>$order_id),
				"recursive"=>5,

				));
		  /*}
		  else
		  {
			      $orders = $this->OrdersH->find(
		           "all",
				   array
				    (
				     "order"=>"OrdersH.entry_date asc",
					 "conditions"=>array("OrdersH.is_cancel"=>0,"OrdersH.is_billed"=>0,"OrdersH.order_complete"=>0,"OrdersH.restaurant_id"=>$restro_info['Restaurant']['id']),
					 "recursive"=>5

				     ));
				   }*/
	    //echo("<pre>");
	    //print_r($orders);
	    //exit;
				   $index = 0;
				   $order_l_id =array();
				   $order_comments = array();

				   foreach($orders as $key=>$row)
				   {

				   	$this->OrdersH->id = $row['OrdersH']['id'];
				   	if( $this->OrdersH->saveField('admin_checked', 1) ) {
				   		if($type == -1) {

					   		$this->OrdersH->OrdersL->updateAll(
					   			array('admin_checked' => 1, 'is_print' => 1),
					   			array('OrdersL.id' => $itemsIds)
					   		);

				   		} else {

					   		$this->OrdersH->OrdersL->updateAll(
					   			array('admin_checked' => 1, 'is_print' => 1),
					   			array('OrdersL.orders_h_id' => $row['OrdersH']['id'])
					   		);

				   		}
				   	}

				   	?>
				   	<table class=" x_panel table table-condensed table-bordered" style="border:0px; border-radius:7px; width:200px"  >
				   		<tr>
				   			<th colspan="2"  style="text-align:left" id="order_type_<?=$key?>" >
				   				<? switch($row['OrdersH']['order_type'])
				   				{
				   					case 0: echo "Packing";
				   					break;
				   					case 1: echo "Pre Order";
				   					break;
				   					case 2: echo "Table Order for ".$row['RestaurantTables']['cust_table_internal_code'];
				   					break;
				   				}
				   				?>
				   			</th>

				   		</tr>
				   		<tr>
				   			<th  style="text-align:left" width="90%">Item Name</th>
				   			<th style="text-align:justify" width="10%">Qty.</th>
				   		</tr>
				   		<?
				   		$m = 0;
				   		$row['OrdersL'] = array_reverse ($row['OrdersL']);

				   		foreach($row['OrdersL'] as $k=>$v)
				   		{
				   			if($v['is_cancel'] == 1)continue;

				   			if($type == -1)
				   			{
				   				if(!in_array($v['id'],$tmp_l_id))
				   				{
				   					continue;
				   				}
				   			}
				   			/*
				   			if($type == 0 && $v['is_print'] == 1)
				   			{
				   				continue;
				   			}
				   			*/
				   			if($type == -2 && $v['is_print'] == 1)
				   			{
				   				continue;
				   			}

				   			$order_l_id[$index]['id'] = $v['id'];
				   			$order_l_id[$index]['is_print'] = 1;
				   			$index++;
				   			?>
				   			<tr>


				   				<?	if($v['combo_offer_id'] == 0){   ?>

				   				<td style="text-align:left" >
											<?php echo isset($v['Item']['item_name']) ? ucwords($v['Item']['item_name']) : 'Item does not exist in database.' ?>
											<?php if( isset($v['Portion']['default_portion']) && $v['Portion']['portion_name'] ): ?>
												<?php echo $v['Portion']['default_portion'] == 1 ? "" : " (".ucwords($v['Portion']['portion_name']).")" ?>
											<?php endif ?>
				   				<?
				   					$m++;
				   					$extra = "";
				   					$extra_count = count($v['OrderExtras']);
				   					foreach($v['OrderExtras'] as $a=>$b)
				   					{
				   						if($a == 0)
				   						{
				   							$extra="<span style='font-size:11px; color:black;line-height:0px !important'> with ".ucwords($b['Extras']['name']);
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
				   				<td style="text-align:center;"><span class='badge'><?=$v['qty']?></span></td>
				   				<? }else {
				   					echo '<td style="text-align:left;">';
				   					echo isset($v['ComboOffer']['offer_name']) ? ucwords($v['ComboOffer']['offer_name']) : 'Offer does not exist in database.';
				   					$m++;
				   					$extra = "";
				   					$extra_count = count($v['OrderExtras']);
				   					foreach($v['OrderExtras'] as $a=>$b)
				   					{
				   						if($a == 0)
				   						{
				   							$extra="<span style='font-size:11px; color:black;line-height:0px !important'> with ".ucwords($b['Extras']['name']);
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
				   					<td style="text-align:center;"><span class='badge'><?=$v['qty']?></span></td>


				   					<?php if( isset($v['ComboOffer']['ComboItems']) && !empty($v['ComboOffer']['ComboItems']) ): ?>
				   						<?
				   						echo '</tr><tr><td colspan="2" style="text-align:left"><span style="text-decoration:underline; ">'.ucwords($v['ComboOffer']['offer_name'])." : Item List</span><br>";
				   						$extra="";
				   						$extra_count = count($v['ComboOffer']['ComboItems']);
				   						foreach($v['ComboOffer']['ComboItems'] as $a=>$b)
				   						{
				   							if($a == 0)
				   							{
				   								$extra = ucwords($b['Item']['item_name']." ( qty : ".($b['qty']*$v['qty'])." )<br>");
				   							}
				   							else if(($a+1) == $extra_count)
				   							{
				   								$extra .= ucwords($b['Item']['item_name']." ( qty : ".($b['qty']*$v['qty'])." )")."</span>";
				   							}
				   							else
				   							{
				   								$extra.= ucwords($b['Item']['item_name']." ( qty : ".($b['qty']*$v['qty'])." )<br>");
				   							}
				   						}
				   						echo $extra."</td>";
				   						endif;

				   					} ?>
				   				</tr>
				   				<?
				   			}
				   			if($m == 0)
				   			{
				   				echo "<tr><td colspan='2'>Nothing to print..</td></tr>";
				   			}

				   			if($type != -1 && $m!= 0 && count($row['OrderComments']))
				   			{

				   				?>

				   				<tr>
				   					<td colspan="2" style="text-align:left">
				   						<label>Suggestion for Chef</label><br />
				   						<div style=" width:100%; border:1px solid #ddd; border-radius:7px; padding:5px;">
				   							<?
				   							$tmp="";
				   							foreach($row['OrderComments'] as $m=>$n)
				   							{
				   								if($type == 0)
				   								{
				   									if($n['is_print'] == 0)
				   									{

				   										$order_comments[$m]['id'] = $n['id'];
				   										$order_comments[$m]['is_print'] = 1;
				   										echo $n['comments']."<br>";

				   									}
				   								}
				   								else
				   								{
				   									echo $n['comments']."<br>";
				   								}
				   							}

				   							?>
				   						</div>
				   					</td>
				   				</tr>
				   				<?

				   			}

				   			?>
				   		</table>
				   		<?
				   	}

				   	$save = $this->OrdersL->saveAll($order_l_id);
				   	$save = $this->OrderComments->saveAll($order_comments);

	   //echo "<prE>";
	   //print_r($order_l_id);

				   	exit;
				   }


	public function getSelectedPrint()
	{

	}

	public function getBill()
	{


		  $this->loadModel('Restaurant');
		  $this->Restaurant->recursive = 0;
		  $restro_info = $this->Restaurant->find('first', array('conditions' => array('Restaurant.id' => $this->Session->read('restro_id'))));

		  $order_id = $this->passedArgs[0];
		  $this->loadModel("OrdersH");
		  $orders = $this->OrdersH->find(
		          "all",
				  array
				   (
				     "order"=>"OrdersH.entry_date asc",
					 "conditions"=>array("OrdersH.id"=>$order_id),
					 "recursive"=>5,

				   )
				 )   ;
      //echo"<pre>";
	 // print_r($orders);
	   $order_extra =array();
	   $subtotal = 0;
	   foreach($orders as $key=>$row)
	   { ?>
		   <table style="font-family:Helvetica">
           <tr>
            <th   style="text-align:center; align-items:center" colspan="3" >
               <span style="font-size:10px; font-weight:500">|| VAT INVOICE ||</span><br />
               <h3 style="margin-top:5px; margin-bottom:5px"><?=$restro_info['Restaurant']['restaurant_name']?></h3>
               <div style="font-size:12px; font-weight:500; font-family:Arial; margin-bottom:10px">
                  <span style="width:75%; word-wrap:break-word"><?=$restro_info['Restaurant']['address']?></span><br />
                  <span><?=$restro_info['City']['name']?> (<?=$restro_info['State']['name']?>)</span><br />
                  <span style="width:75%; word-wrap:break-word; ">Tin No : <?=$restro_info['Restaurant']['tin_no']?></span><br />
                  <span style="width:75%; word-wrap:break-word">Service Tax No : <?=$restro_info['Restaurant']['service_tax_no']?></span><br />
                  <span style="width:75%; word-wrap:break-word">Mob : <?=$restro_info['Restaurant']['mobile_no']?>, Phone : <?=$restro_info['Restaurant']['contact_no']?></span><br />
               </div>
            </th>
           </tr>
           <tr style=" font-size:12px; " >
             <th style="text-align:center; border-bottom:1px #000 dashed">Date<br /><p  style="font-weight:400; margin-top:5px"><?=date("d-m-y h:i",strtotime($orders[0]['OrdersH']['entry_date']))?></p></th>
             <th style="text-align:center; border-bottom:1px #000 dashed">Table No<br /><p  style="font-weight:400; margin-top:5px"><?=$orders[0]['RestaurantTables']['cust_table_internal_code']?></p></th>
             <th style="text-align:center; border-bottom:1px #000 dashed">Invoice No.<br /><p  style="font-weight:400; margin-top:5px"><?=$orders[0]['OrdersH']['order_no']?></P></th>
           </tr >
           <tr>
             <td colspan="3" >
               <table style="font-size:11px" width="100%">
                <tr>
                 <th width="50%" style="text-align:left;border-bottom:1px #000 dashed; padding-bottom:5px; padding-top:3px">Item Name</th>
                 <th width="10%" style="text-align:center;border-bottom:1px #000 dashed">Qty</th>
                 <th width="20%" style="text-align:center;border-bottom:1px #000 dashed">Rate</th>
                 <th width="20%" style="text-align:right;border-bottom:1px #000 dashed">Amount</th>
                </tr>
                <?

						foreach($row['OrdersL'] as $k=>$v)
						 {
							if($v['is_cancel'] == 1)continue;
					     	echo "<tr>";
                        	if($v['combo_offer_id'] == 0)
							{

                             echo "<td>";

													echo isset($v['Item']['item_name']) ? ucwords($v['Item']['item_name']) : 'Item does not exist in database.';
													if( isset($v['Portion']['default_portion']) && $v['Portion']['portion_name'] ) {
														echo $v['Portion']['default_portion'] == 1 ? "" : " (".ucwords($v['Portion']['portion_name']).")";
													}


                          foreach($v['OrderExtras'] as $a=>$b)
						     {
								if(isset($order_extra[$b['Extras']['name']]['qty']))
								{
									$order_extra[$b['Extras']['name']]['qty'] +=$v['qty'];

								}
								else
								{
									$order_extra[$b['Extras']['name']]['qty']  = $v['qty'];
									$order_extra[$b['Extras']['name']]['rate']  = $b['Extras']['amt'];
								}

						     }
						     echo "</td>";
							 $subtotal += $v['qty']*$v['per_qty_rate'];
						 ?>

                         <td style="text-align:center;"><?=$v['qty']?></td>
                         <td style="text-align:center;"><?=$v['per_qty_rate']?></td>
                         <td style="text-align:right;"><?=$v['qty']*$v['per_qty_rate']?>.00</td>
                         <? }
						  else
						    {
						      echo isset($v['ComboOffer']['offer_name']) ? ucwords($v['ComboOffer']['offer_name']) : 'Offer does not exist in database.';
							  foreach($v['OrderExtras'] as $a=>$b)
							  {
								if(isset($order_extra[$b['Extras']['name']]['qty']))
								{
									$order_extra[$b['Extras']['name']]['qty'] += $v['qty'];

								}
								else
								{
									$order_extra[$b['Extras']['name']]['qty']  = $v['qty'];
									$order_extra[$b['Extras']['name']]['rate']  = $b['Extras']['amt'];
								}
							  }
							   echo "</td>";
							   $subtotal += $v['qty']*$v['per_qty_rate'];
						  ?>

                          <td style="text-align:center;"><?=$v['qty']?></td>
                          <td style="text-align:center;"><?=$v['per_qty_rate']?></td>
                          <td style="text-align:right;"><?=$v['qty']*$v['per_qty_rate']?>.00</td>

                        <? } ?>   </tr> <? }

						if(count($order_extra)){
						?>

						<tr>
                          <th colspan="4" style="text-align:left; border-top:1px dashed #000;border-bottom:1px dashed #000; padding:5px 0">Extras</th>
                        </tr>
                        <?
						}
						  foreach($order_extra as $a=>$b)
						  { ?>
                            <tr>
                              <td style="text-align:left;"><?=$a?></td>
							  <td style="text-align:center;"><?=$b['qty']?></td>
                              <td style="text-align:center;"><?=$b['rate']?></td>
                              <td style="text-align:right;"><?=$b['qty']*$b['rate']?>.00</td>
                            </tr>
						  <?
						   $subtotal += $b['qty']*$b['rate'];
						  }
						    $st =$row['OrdersH']['service_charges'] != 0 ? ($subtotal*$row['OrdersH']['service_charges'])/100 : 0;
						    $st = round($st,2);
						   ?>
               <tr>
                 <td colspan="4" style="border-bottom:1px dashed #000; "></td>
               </tr>
               <tr>
                  <th colspan="3" style="text-align:right;">Sub Total : </th>
                  <th style="text-align:right"><?=$subtotal?>.00</th>
               </tr>
               <? foreach($row['OrderTaxs'] as $a=>$b)
			   {
				   $subtotal+=$b['amount'];
				    ?>
				<tr>
                  <th colspan="3" style="text-align:right;">
                  	<?php echo (isset($b['TaxMasters']['print_name'])) ? $b['TaxMasters']['print_name'] : 'Tax Name does not exist in database.'; ?>
                   : </th>
                  <th style="text-align:right"><?=$b['amount']?></th>
                </tr>
			   <? }
			    if($st)
			   {
				   $subtotal+=$st;
				    ?>
				<tr>
                  <th colspan="3" style="text-align:right;">Service Charge : </th>
                  <th style="text-align:right"><?=$st?></th>
                </tr>
			   <? }

			     $tmp  = floor($subtotal);
				 $round = $subtotal - $tmp;
				 if($round){
				 if($round < 0.5)
				 {

				   ?>
			    <tr>
                  <th colspan="3" style="text-align:right;">Rount off(-) : </th>
                  <th style="text-align:right"><?=substr($round,0,4)?></th>
                </tr>
				<? } else { ?>
                <tr>
                  <th colspan="3" style="text-align:right;">Rount off(+) : </th>
                  <th style="text-align:right"><?=substr((1-$round),0,4)?></th>
                </tr>
                <? }  }?>


               </table>
             </td>
           </tr>
           <tr style="font-size:14px">
                   <th  colspan="3" style="text-align:right;border-bottom:1px solid #000;border-top:1px solid #000 "">Net Total :<span style="background:no-repeat url(<?=$this->path?>/img/rupess.png);">&nbsp;&nbsp;&nbsp;<?=$tmp?>.00</span></th>
             </tr>
           <tr style="font-size:12px; text-align:center">
             <td colspan="3">*Thank You, Visit Again </td>
           </tr>
           </table>

	   <? }
	    $this->OrdersH->id = $order_id;
		//$this->OrdersH->save(array("order_complete"=>1,"is_billed"=>1,"bill_request"=>0));
	    /* removed "order_complete"=>1" from query */
		$this->OrdersH->save(array("is_billed"=>1,"bill_request"=>0));
		exit;

	}

	public function getBillRequest()
	{


		  $this->loadModel('Restaurant');
		  $this->Restaurant->recursive = 0;
		  $restro_info = $this->Restaurant->find('first', array('conditions' => array('Restaurant.id' => $this->Session->read('restro_id'))));

		  $order_id = $this->passedArgs[0];
		  $this->loadModel("OrdersH");
		  $orders = $this->OrdersH->find(
		          "all",
				  array
				   (
				     "order"=>"OrdersH.entry_date asc",
					 "conditions"=>array("OrdersH.id"=>$order_id),
					 "recursive"=>5,

				   )
				 )   ;
      //echo"<pre>";
	 // print_r($orders);
	   $order_extra =array();
	   $subtotal = 0;

	   foreach($orders as $key=>$row)
	   { ?>
		   <table style="font-family:Helvetica">
           <tr>
            <th   style="text-align:center; align-items:center" colspan="3" >
               <span style="font-size:10px; font-weight:500">|| VAT INVOICE ||</span><br />
               <h3 style="margin-top:5px; margin-bottom:5px"><?=$restro_info['Restaurant']['restaurant_name']?></h3>
               <div style="font-size:12px; font-weight:500; font-family:Arial; margin-bottom:10px">
                  <span style="width:75%; word-wrap:break-word"><?=$restro_info['Restaurant']['address']?></span><br />
                  <span><?=$restro_info['City']['name']?> (<?=$restro_info['State']['name']?>)</span><br />
                  <span style="width:75%; word-wrap:break-word; ">Tin No : <?=$restro_info['Restaurant']['tin_no']?></span><br />
                  <span style="width:75%; word-wrap:break-word">Service Tax No : <?=$restro_info['Restaurant']['service_tax_no']?></span><br />
                  <span style="width:75%; word-wrap:break-word">Mob : <?=$restro_info['Restaurant']['mobile_no']?>, Phone : <?=$restro_info['Restaurant']['contact_no']?></span><br />
               </div>
            </th>
           </tr>
           <tr style=" font-size:12px; " >
             <th style="text-align:center; border-bottom:1px #000 dashed">Date<br /><p  style="font-weight:400; margin-top:5px"><?=date("d-m-y h:i",strtotime($orders[0]['OrdersH']['entry_date']))?></p></th>
             <th style="text-align:center; border-bottom:1px #000 dashed">Table No<br /><p  style="font-weight:400; margin-top:5px"><?=$orders[0]['RestaurantTables']['cust_table_internal_code']?></p></th>
             <th style="text-align:center; border-bottom:1px #000 dashed">Invoice No.<br /><p  style="font-weight:400; margin-top:5px"><?=$orders[0]['OrdersH']['order_no']?></P></th>
           </tr >
           <tr>
             <td colspan="3" >
               <table style="font-size:11px" width="100%">
                <tr>
                 <th width="50%" style="text-align:left;border-bottom:1px #000 dashed; padding-bottom:5px; padding-top:3px">Item Name</th>
                 <th width="10%" style="text-align:center;border-bottom:1px #000 dashed">Qty</th>
                 <th width="20%" style="text-align:center;border-bottom:1px #000 dashed">Rate</th>
                 <th width="20%" style="text-align:right;border-bottom:1px #000 dashed">Amount</th>
                </tr>
                <?

						foreach($row['OrdersL'] as $k=>$v)
						 {
							if($v['is_cancel'] == 1)continue;
					     	echo "<tr>";
                        	if($v['item_id'] != 0)
							{

                             echo "<td>";
				     		 echo ucwords($v['Item']['item_name'])?><?=$v['Portion']['default_portion'] == 1 ?  "" :  " (".ucwords($v['Portion']['portion_name']).")" ;
                             foreach($v['OrderExtras'] as $a=>$b)
						     {
								if(isset($order_extra[$b['Extras']['name']]['qty']))
								{
									$order_extra[$b['Extras']['name']]['qty'] +=$v['qty'];

								}
								else
								{
									$order_extra[$b['Extras']['name']]['qty']  = $v['qty'];
									$order_extra[$b['Extras']['name']]['rate']  = $b['Extras']['amt'];
								}

						     }
						     echo "</td>";
							 $subtotal += $v['qty']*$v['per_qty_rate'];
						 ?>

                         <td style="text-align:center;"><?=$v['qty']?></td>
                         <td style="text-align:center;"><?=$v['per_qty_rate']?></td>
                         <td style="text-align:right;"><?=$v['qty']*$v['per_qty_rate']?>.00</td>
                         <? }
						  else
						    {
						      echo '<td>'.ucwords($v['item_name'])." ";
							  foreach($v['OrderExtras'] as $a=>$b)
							  {
								if(isset($order_extra[$b['Extras']['name']]['qty']))
								{
									$order_extra[$b['Extras']['name']]['qty'] += $v['qty'];

								}
								else
								{
									$order_extra[$b['Extras']['name']]['qty']  = $v['qty'];
									$order_extra[$b['Extras']['name']]['rate']  = $b['Extras']['amt'];
								}
							  }
							   echo "</td>";
							   $subtotal += $v['qty']*$v['per_qty_rate'];
						  ?>

                          <td style="text-align:center;"><?=$v['qty']?></td>
                          <td style="text-align:center;"><?=$v['per_qty_rate']?></td>
                          <td style="text-align:right;"><?=$v['qty']*$v['per_qty_rate']?>.00</td>

                        <? } ?>   </tr> <? }

						if(count($order_extra)){
						?>

						<tr>
                          <th colspan="4" style="text-align:left; border-top:1px dashed #000;border-bottom:1px dashed #000; padding:5px 0">Extras</th>
                        </tr>
                        <?
						}
						  foreach($order_extra as $a=>$b)
						  { ?>
                            <tr>
                              <td style="text-align:left;"><?=$a?></td>
							  <td style="text-align:center;"><?=$b['qty']?></td>
                              <td style="text-align:center;"><?=$b['rate']?></td>
                              <td style="text-align:right;"><?=$b['qty']*$b['rate']?>.00</td>
                            </tr>
						  <?
						   $subtotal += $b['qty']*$b['rate'];
						  }
						    $st =$row['OrdersH']['service_charges'] != 0 ? ($subtotal*$row['OrdersH']['service_charges'])/100 : 0;
						    $st = round($st,2);
						   ?>
               <tr>
                 <td colspan="4" style="border-bottom:1px dashed #000; "></td>
               </tr>
               <tr>
                  <th colspan="3" style="text-align:right;">Sub Total : </th>
                  <th style="text-align:right"><?=$subtotal?>.00</th>
               </tr>
               <? foreach($row['OrderTaxs'] as $a=>$b)
			   {
				   $subtotal+=$b['amount'];
				    ?>
				<tr>
                  <th colspan="3" style="text-align:right;"><?=$b['TaxMasters']['print_name']?> : </th>
                  <th style="text-align:right"><?=$b['amount']?></th>
                </tr>
			   <? }
			    if($st)
			   {
				   $subtotal+=$st;
				    ?>
				<tr>
                  <th colspan="3" style="text-align:right;">Service Charge : </th>
                  <th style="text-align:right"><?=$st?></th>
                </tr>
			   <? }

			     $tmp  = floor($subtotal);
				 $round = $subtotal - $tmp;
				 if($round){
				 if($round < 0.5)
				 {

				   ?>
			    <tr>
                  <th colspan="3" style="text-align:right;">Rount off(-) : </th>
                  <th style="text-align:right"><?=substr($round,0,4)?></th>
                </tr>
				<? } else { ?>
                <tr>
                  <th colspan="3" style="text-align:right;">Rount off(+) : </th>
                  <th style="text-align:right"><?=substr((1-$round),0,4)?></th>
                </tr>
                <? }  }?>


               </table>
             </td>
           </tr>
           <tr style="font-size:14px">
                   <th  colspan="3" style="text-align:right;border-bottom:1px solid #000;border-top:1px solid #000 "">Net Total :<span style="background:no-repeat url(<?=$this->path?>/img/rupess.png);">&nbsp;&nbsp;&nbsp;<?=$tmp?>.00</span></th>
             </tr>
           <tr style="font-size:12px; text-align:center">
             <td colspan="3">*Thank You, Visit Again </td>
           </tr>
           </table>

	   <? }
	    //$this->OrdersH->id = $order_id;
			//$this->OrdersH->save(array("order_complete"=>1,"is_billed"=>1,"bill_request"=>0));
		exit;

	}


	public function getBillRequest2()
	{
		$this->autoRender = false;
		$this->layout = 'ajax';

		$order_id = $this->passedArgs[0];
	  $this->loadModel("OrdersH");
		$this->OrdersH->id = $order_id;

		$this->OrdersH->save(	array(
			"is_billed" => 1,
			"is_cash_recieved" => 1,
			"payment_recieved" => 1,
			"order_complete" => 1
		) );

		$this->response->body('Bill Saved.');

	}

	public function packed()
	{
		$this->autoRender = false;
		$this->layout = 'ajax';

		if( $this->packOrder($this->passedArgs[0]) ) {
			$this->response->body('Order Packed.');
		} else {
			$this->response->body('Order Not Packed.');
		}

	}

	public function grid_list_packed()
	{
		$this->autoRender = false;
		$this->layout = 'ajax';

		$this->response->body('Nothing to do.');

		do {

			$itemIds = explode(',', $this->passedArgs[0]);
			$this->loadModel('OrdersL');
			$options = array(
				'conditions' => array('OrdersL.id' => $itemIds),
				'contain' => array('OrdersH')
			);
			$itemsOrder = $this->OrdersL->find('all', $options);

			if(empty($itemsOrder)) {
				$this->response->body('No items.');
				$this->_stop();
			}

			$alreadyUpdated = [];
			foreach($itemsOrder as &$itemOrder) {

				if($itemOrder['OrdersH']['order_type'] != 0) {
					continue;
				}

				if($itemOrder['OrdersH']['payment_recieved'] != 1) {
					continue;
				}

				if($itemOrder['OrdersH']['packed_or_ready'] != 0) {
					continue;
				}

				if( in_array($itemOrder['OrdersH']['id'], $alreadyUpdated) ) {
					continue;
				}

				if( $this->packOrder($itemOrder['OrdersH']['id']) ) {
					$alreadyUpdated[] = $itemOrder['OrdersH']['id'];
					$this->response->body('Order Packed.');
				}

			}

		} while(0);

	}

	private function packOrder($id)
	{
		  $this->loadModel("OrdersH");
			$this->OrdersH->id = $id;

			return $this->OrdersH->save(	array("packed_or_ready" => 1) );

	}



	public function ready()
	{
		$this->autoRender = false;
		$this->layout = 'ajax';

		$order_id = $this->passedArgs[0];
	  $this->loadModel("OrdersH");
		$this->OrdersH->id = $order_id;

		$this->OrdersH->save(	array(
			"packed_or_ready" => 1,
			"order_complete" => 1
		) );

		$this->response->body('Order Ready.');

	}



	public function grid_list_ready()
	{
		$this->autoRender = false;
		$this->layout = 'ajax';

		$this->response->body('Nothing to do.');

		do {

			$itemIds = explode(',', $this->passedArgs[0]);
			$this->loadModel('OrdersL');
			$options = array(
				'conditions' => array('OrdersL.id' => $itemIds),
				'contain' => array('OrdersH')
			);
			$itemsOrder = $this->OrdersL->find('all', $options);

			if(empty($itemsOrder)) {
				$this->response->body('No items.');
				$this->_stop();
			}

			$alreadyUpdated = [];
			foreach($itemsOrder as &$itemOrder) {

				if($itemOrder['OrdersH']['order_type'] != 1) {
					continue;
				}

				if($itemOrder['OrdersH']['payment_recieved'] != 1) {
					continue;
				}

				if($itemOrder['OrdersH']['packed_or_ready'] != 0) {
					continue;
				}

				if( in_array($itemOrder['OrdersH']['id'], $alreadyUpdated) ) {
					continue;
				}

				if( $this->setReadyOrder($itemOrder['OrdersH']['id']) ) {
					$alreadyUpdated[] = $itemOrder['OrdersH']['id'];
					$this->response->body('Order Ready.');
				}

			}

		} while(0);

	}

	private function setReadyOrder($id)
	{
		  $this->loadModel("OrdersH");
			$this->OrdersH->id = $id;

			return $this->OrdersH->save( array(
				"packed_or_ready" => 1,
				"order_complete" => 1
			) );

	}






	public function order_delivered()
	{
		$this->autoRender = false;
		$this->layout = 'ajax';

		$order_id = $this->passedArgs[0];
	  $this->loadModel("OrdersH");
		$this->OrdersH->id = $order_id;

		$this->OrdersH->save(	array(
			"packing_delivered" => 1,
			"order_complete" => 1
		) );

		$this->response->body('Order Delivered.');

	}



	public function checkontable()
	{

	     $this->loadModel('OrdersL');

		 echo $count = $this->OrdersL->find("count",array("conditions"=>array("OrdersL.is_print"=>1,"OrdersL.is_processed"=>0,"OrdersL.is_cancel"=>0,"OrdersL.orders_h_id"=>$this->passedArgs[0])));

		 exit;



	}
	public function neworders()
	{
		 $ordersl_ids = array();
		 $restro_info = $this->viewVars['restro_info'] ;
		 $d = date("Y-m-d H:i:s",time());
		 if($restro_info['Restaurant']['cancel_available'] == 1)
		 {
			$d = date("Y-m-d H:i:s",time()-($restro_info['Restaurant']['auto_cancel_time']*60));

		 }
		$this->loadModel("OrdersH");

		$orders = $this->OrdersH->find(
		          "all",
				  array
				   (
				     "order"=>"OrdersH.entry_date asc",
					 /*"conditions"=>array("OrdersH.is_cancel"=>0,"OrdersH.is_billed"=>0,"OrdersH.display"=>0,"OrdersH.entry_date <= " => $d,"OrdersH.restaurant_id"=>$restro_info['Restaurant']['id']),
					 - Replaced is_billed by order_complete*/
					 "conditions"=>array("OrdersH.is_cancel"=>0,"OrdersH.order_complete"=>0,"OrdersH.display"=>0,"OrdersH.entry_date <= " => $d,"OrdersH.restaurant_id"=>$restro_info['Restaurant']['id']),
					 "recursive"=>5,

				   )
				 )   ;


		     //<!-- order block-->
                     foreach($orders as $key => $row)
					{  $c= 0;$p=0;
							$order_name = "";
							switch($row['OrdersH']['order_type']) {
								case 0:
									$order_name = "Packing";
									break;
								case 1:
									$order_name = "Pre Order";
									break;
								case 2:
									$order_name = "Table Order";
									break;
							}
						 ?>
							<?php
								$id = $row['OrdersH']['id'];
								$adminChecked = ($row['OrdersH']['admin_checked']) ? 'admin_checked' : '';
								$paymentReceived = ($row['OrdersH']['payment_recieved']) ? 'payment_recieved' : '';
								$orderType = (isset($row['OrdersH']['order_type'])) ? 'order_type_'.$row['OrdersH']['order_type'] : '';
								$packedOrReady = ($row['OrdersH']['packed_or_ready']) ? 'packed_or_ready' : '';
								$orderDelivered = ($row['OrdersH']['packing_delivered']) ? 'packing_delivered' : '';
								$billRequest = ($row['OrdersH']['bill_request']) ? 'bill_request' : "";
							?>
                <div class="col-md-4 order_div order_div_<?php echo $id ?> <?php echo $adminChecked ?> <?php echo $paymentReceived ?> <?php echo $orderType ?> <?php echo $packedOrReady ?> <?php echo $orderDelivered ?> <?php echo $billRequest ?>" style="height:500px; max-height:543px;">
                  <input type="hidden" class="hidden_id" value="<?=$row['OrdersH']['id']?>" />
                <div class="x_panel" style="padding-bottom: 0px !important; height:98%">
                  <div class="x_title" style="border-bottom: 0px;margin-bottom:0px">
                  <div class="clearfix" style="text-align:center; font-size:14px; text-shadow:#990 2px" ><span class="blink title_blink_<?=$row['OrdersH']['id']?> blink_<?=$row['OrdersH']['id']?>" style="float:none !important">New Order</span></div>
                    <div class="clearfix">
                      <h2 id="table_code_<?=$row['OrdersH']['id']?>"><?=$row['OrdersH']['order_type'] == 2 ? $row['RestaurantTables']['cust_table_internal_code'] : $order_name ; ?></h2>
                    <h2 class="time_<?=$row['OrdersH']['id']?>" style="float:right"></h2>
                    <script> startTime('<?=$row['OrdersH']['id']?>','<?=$row['OrdersH']['entry_date']?>');
											tmp = setTimeout(function(){ $(".title_blink_<?=$row['OrdersH']['id']?>").remove(); }, 60000); </script>
                    </div>
                  </div>
                   <div>
                     <table class="table table-hover table-bordered" style="border:0px; border-radius:7px" >
                      <thead style="border:0px">
                       <tr>
                         <th id="order_type_<?=$row['OrdersH']['id']?>" colspan="2" ><?=$order_name?>
                        <div style="float:right">Amount : <span id="amt_span_<?=$row['OrdersH']['id']?>" style=" padding-left:12px;color:#121212; background:no-repeat url(<?=$this->path?>img/rupess.png)"><?=$row['OrdersH']['net_amt']?></span></div></th>
                       </tr>
                       <tr>
                         <td colspan="2"><?=$row['User']['mobile_no']."(".ucwords($row['User']['name']).")"?></td>
                       </tr>

											<tr class="tr_payment_recieved">
												<?php if( in_array($row['OrdersH']['order_type'], array(0,1)) ): ?>
													<?php if( $row['OrdersH']['payment_recieved'] == 0 ): ?>
														<td colspan="2" align="center"><span class="blink" style="float:none">Payment Pending</span></td>
													<?php elseif( $row['OrdersH']['payment_recieved'] == 1 ): ?>
														<td colspan="2" align="center"><span class="blink" style="float:none">You have received payment against the transaction id <?php echo $row['OrdersH']['transaction_id'] ?></span></td>
													<?php endif ?>
												<?php endif ?>
												</tr>

												<tr class=" box_1">
													<td class="text-center" colspan="2">
														<h4 class="blink">Bill Request</h4>
														<p>User Ask for Bill for Cash Payment</p>
														<button class="btn btn-success" onclick="bill_request(<?php echo $row['OrdersH']['id'] ?>)" >Print Bill</button>
													</td>
												</tr>

												<tr class=" box_2">
													<td class="text-center" colspan="2">
														<h4>Payment Received?</h4>
														<button class="btn btn-success" onclick="bill_request2(<?php echo $row['OrdersH']['id'] ?>)" >Yes</button>
													</td>
												</tr>

                       <tr class="items-headers">

                         <th  style="text-align:left" width="80%">Item Name</th>
                         <th style="text-align:justify" width="20%">Quantity</th>

                       </tr>
                       </thead>
                       <tbody class="items-table" style="max-height:174px; overflow:auto; display:block; border:0px; width:136.5%">
                       <?
					    $row['OrdersL'] = array_reverse ($row['OrdersL']);
						foreach($row['OrdersL'] as $k=>$v)
						 {
							$ordersl_ids[] =  $v['id'];
							if($v['is_cancel'] == 1)continue;
							if($v['is_print']  && !$v['is_processed'] )
							{
								$c++;
							}

							//if($v['is_processed'] == 0)$c++;
							$p = $v['is_print'] == 0 ? 0 : 1;

						?>
                        <tr class="tr_<?=$v['id']?>" <?= $v['is_processed'] == 1? 'style="text-decoration:line-through;color:red"': "" ?> >
                        <?	if($v['item_id'] != 0){   ?>


                         <td style="width:240px"><? if(!$v['is_processed']){?><span onclick="cancel_order(<?=$v['id']?>)" class="ui-icon ui-icon-trash"></span><? } ?><?=ucwords($v['Item']['item_name'])?><?=$v['Portion']['default_portion'] == 1 ?
						 "" :
						 " (".ucwords($v['Portion']['portion_name']).")"?>
                         <?
						  $extr_amt = 0;
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

							  $extr_amt+=$b['Extras']['amt'];

						  }
						  echo $extra;
						  if($v['is_print']==0)
						  {
							  echo ' <span  class="blink blink_'.$row['OrdersH']['id'].'"> New Order</span>';
						  }
						 ?>
                         </td>
                         <td  style="text-align:center; width:70px"><span class="badge "><?=$v['qty']?></span></td>


                        <? }else {  ?>


                         <td><? if(!$v['is_processed']){?><span onclick="cancel_order(<?=$v['id']?>)" class="ui-icon ui-icon-trash"></span><? } ?><?=@ucwords($v['ComboOffer']['offer_name'])." "?>
						 <?
						  //echo '<td><span class="ui-icon ui-icon-trash"></span>'.ucwords($v['ComboOffer']['offer_name'])." ";
                          $extr_amt = 0;
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

							  $extr_amt+=$b['Extras']['amt'];

						  }
						  echo $extra;
						  if($v['is_print']==0)
						  {
							  echo ' <span  class="blink blink_'.$row['OrdersH']['id'].'"> New Order</span>';
						  }
						  echo '</td>';

						 ?>

                         <td style="text-align:center;"><span class="badge "><?=$v['qty']?></span></td>


                        <?
						} ?>
                        </tr>
					<? } ?>
					</tbody>
                     <tfoot style="width:100%; border:0px">
                       <tr class="comment_tr_<?=$row['OrdersH']['id']?>" style="display:<?=count($row['OrderComments']) == 0 ? "none" : "" ?>" >
                          <td colspan="3" style="text-align:left">
                            <label>Suggestion for Chef</label><br />
                            <div style=" width:100%; border:1px solid #ddd; border-radius:7px; padding:5px; max-height:46px; overflow-y:auto;overflow-x:hidden"><ol style="padding-left:20px; list-style-type:circle; " class="comment_list_<?=$row['OrdersH']['id']?>" >
							<?
                               $m =0;
							  $tmp="";
							  foreach($row['OrderComments'] as $n)
							  {

							    if($n['is_print'] == 0)
								{
							     echo "<li>".$n['comments']."</li>";
								 $m++;
								}
								else
								{
									$tmp.="<li style='text-decoration:line-through;color:red'>".$n['comments']."</li>";
								}
							  }
							  echo $tmp;
							?>
                            </ol>
                            </div>
                          </td>
                        </tr>
                        <?php if( !in_array($row['OrdersH']['order_type'], array(0, 1)) ): ?>
                        <tr class="ontable_<?=$row['OrdersH']['id']?>" style="display:<?=$p == 1 && $c ? "table-row" : "none" ?>">
                          <td colspan="3" width="100%">
                            <button type="button" class="btn btn-danger btn-block" onclick="delivered(<?=$row['OrdersH']['id']?>)">On Table</button>
                          </td>
                        </tr>
                      	<?php endif ?>

                        <tr>
                          <td colspan="3" style="padding-bottom:0px;text-align:center">
													<button class="btn btn-primary left details" onclick="dialog_display(<?=$row['OrdersH']['id']?>)" >Details</button>

													<?php if($row['OrdersH']['order_type'] == 0): ?>
														<button class="btn btn-success order-packed" onclick="orderPacked(<?php echo $row['OrdersH']['id'] ?>)" >Packed</button>
													<?php elseif($row['OrdersH']['order_type'] == 1): ?>
														<button class="btn btn-success food-ready" onclick="orderReady(<?php echo $row['OrdersH']['id'] ?>)" >Ready</button>
													<?php endif ?>

													<button class="btn btn-success packing-delivered" onclick="orderDelivered(<?php echo $row['OrdersH']['id'] ?>)" >Packing Delivered</button>

													<button  class="btn btn-success right print-bill" onclick="dialog_bill(<?=$row['OrdersH']['id']?>)" >Print Bill</button>

													<button class="btn btn-success right kot" onclick="dialog_print(<?=$row['OrdersH']['id']?>)" >Confirm & KOT</button>
													</td>
                        </tr>
                        </tfoot>
                     </table>
                    </div>
                  </div>
                  </div>
                  <? }
                     //Order Block end-->

		$this->OrdersH->updateAll(array("display"=>1),array("OrdersH.entry_date <= " => $d));

		$this->loadModel("OrdersL");
		if(count($ordersl_ids))
		{
		  $this->OrdersL->query("update `om_orders_l` set `display` = '1' where `id` in  ( ".implode(",",$ordersl_ids)." ) and `is_print` = 0 ");
		}

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
		<div id="dialog-response_<?=$row['OrdersH']['id']?>" title="<?=$row['OrdersH']['order_type'] == 2 ? $row['RestaurantTables']['cust_table_internal_code'] : $order_name ; ?>" style=" overflow:hidden"  class="order_div_<?=$row['OrdersH']['id']?>" ><table id="dialog_table_<?=$row['OrdersH']['id']?>" class=" table table-hover table-bordered " style="margin-bottom:0px; border-spacing: 0" >
             <thead style="border:0px">
              <tr>
               <th id="order_type_1" colspan="3" ><?=$order_name?><div  style="float:right">Amount : <span id="d_amt_span_<?=$row['OrdersH']['id']?>" style=" padding-left:12px;color:#121212; background:no-repeat url(<?=$this->path?>img/rupess.png)"><?=$row['OrdersH']['net_amt']?></span></div>
                        </th>
                       </tr>
                       <tr>
                         <td colspan="3"><?=$row['User']['mobile_no']."(".ucwords($row['User']['name']).")"?></td>
                       </tr>
                       <tr>

                         <th  style="text-align:left;" width="50%" >Item Name</th>
                         <th style="text-align:justify;" width="25%" >Quantity</th>
                         <?php if( !in_array($row['OrdersH']['order_type'], array(0, 1)) ): ?>
                         		<th style="text-align:justify;" width="25%" >On Table</th>
                       	 <?php endif ?>

                       </tr>
                       </thead>
                       <tbody style="display:block; overflow-y:auto;overflow-x:auto; max-height:219px; width:206%; border:0px" id="tbody_<?=$row['OrdersH']['id']?>" >
                       <?
					    $row['OrdersL'] = array_reverse ($row['OrdersL']);
						foreach($row['OrdersL'] as $k=>$v)
						 {
							if($v['is_cancel'] == 1)continue;
							if($v['is_print']  && !$v['is_processed'] )
							{
								$c++;
							}
							$p = $v['is_print'] == 0 ? 0 : 1;
						?>
                        <tr class="tr_<?=$v['id']?>" <?= $v['is_processed'] == 1? 'style="text-decoration:line-through;color:red"': "" ?> >
                        <?	if($v['combo_offer_id'] == 0){   ?>
                         <td style="width:285px" >
                         	<? if(!$v['is_processed'] && !$v['admin_checked'] ){?>
                         		<span onclick="cancel_order(<?=$v['id']?>,1)" class="ui-icon ui-icon-trash"></span>
                         	<? } ?>
													<?php echo isset($v['Item']['item_name']) ? ucwords($v['Item']['item_name']) : 'Item does not exist in database.' ?>
													<?php if( isset($v['Portion']['default_portion']) && $v['Portion']['portion_name'] ): ?>
														<?php echo $v['Portion']['default_portion'] == 1 ? "" : " (".ucwords($v['Portion']['portion_name']).")" ?>
													<?php endif ?>
                         <?
												  $extra = "";
						 	 						$extra_count = count($v['OrderExtras']);

												  foreach($v['OrderExtras'] as $a=>$b)
												  {
												      if($a == 0) {
														  	$extra="<span style='font-size:11px; color:black;line-height:0px !important'>with ".ucwords($b['Extras']['name']);
													  	} else if(($a+1) == $extra_count) {
														  	$extra.=" and ".ucwords($b['Extras']['name'])."</span>";
													  	} else {
														  	$extra.=", ".ucwords($b['Extras']['name']);
													  	}
												  }
												  echo $extra;
												 ?>

                         </td>

                         <td  style="text-align:center;width:142px"><span class="badge "><?=$v['qty']?></span></td>
												<?php if( !in_array($row['OrdersH']['order_type'], array(0, 1)) ): ?>
                         <td  style="text-align:center;width:142px">

                         	<input type="checkbox" <?  if($v['is_print'] == 0)  { echo  'class="print_td" disabled="disabled"' ; } elseif($v['is_processed'] == 1) {  echo "disabled"; }?> id="check_<?=$v['id']?>"   value="<?=$v['id']
						 ?>"/>
						 							<label for="check_<?=$v['id']?>" <? if($v['is_processed'] == 1) {  echo "class='ui-state-active'"; } ?> >On Table</label>
						 							</td>
													<?php endif ?>


                        <? }else {  ?>
						  <td style="width:285px">
						  	<? if(!$v['is_processed'] && !$v['admin_checked'] ){?>
						  		<span onclick="cancel_order(<?=$v['id']?>,1)" class="ui-icon ui-icon-trash"></span>
						  	<? } ?>
						  	<?php echo isset($v['ComboOffer']['offer_name']) ? ucwords($v['ComboOffer']['offer_name']) : 'Offer does not exist in database.' ?>
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
						  echo $extra.'</td>';

						 ?>

                         <td  style="text-align:center; width:142px"><span class="badge "><?=$v['qty']?></span></td>
                         <?php if( !in_array($row['OrdersH']['order_type'], array(0, 1)) ): ?>
                         <td  style="text-align:center; width:142px">
                         	<input  type="checkbox" <?  if($v['is_print'] == 0)  { echo  'class="print_td" disabled="disabled"' ; } elseif($v['is_processed'] == 1) {  echo "disabled"; }?> id="check_<?=$v['id']?>" name="order_l[]"  value="<?=$v['id']?>" />
                         	<label for="check_<?=$v['id']?>" <? if($v['is_processed'] == 1) {  echo "class='ui-state-active'"; } ?> >On Table</label>
                         </td>
                         <?php endif ?>


							<?php if( isset($v['ComboOffer']['ComboItems']) && !empty($v['ComboOffer']['ComboItems']) ): ?>
						  </tr>
						  <tr <?= $v['is_processed'] == 1? 'style="text-decoration:line-through;color:red"': "" ?> class="tr_<?=$v['id']?>">
						  	<td colspan="3"><span style="text-decoration:underline ;" >
						  		<?php
						  			echo ucwords($v['ComboOffer']['offer_name'])." : Item List</span><br>";
						  			$extra="";
						  			$extra_count = count($v['ComboOffer']['ComboItems']);
									  foreach($v['ComboOffer']['ComboItems'] as $a=>$b)
									  {
										   if($a == 0)
										  {
											  $extra=ucwords($b['Item']['item_name']."( qty :<span class='badge'>".$b['qty']."</span>)");
										  }
										  else if(($a+1) == $extra_count)
										  {
											  $extra.=" and ".ucwords($b['Item']['item_name']."( qty :<span class='badge'>".$b['qty']."</span>)")."</span>";
										  }
										  else
										  {
											   $extra.=", ".ucwords($b['Item']['item_name']."( qty :<span class='badge'>".$b['qty']."</span>)");
										  }
										 }
						  			echo $extra."</td>";
						  endif;

							} ?>
            	</tr>


						<? } ?>
                        </tbody>
                        <tfoot style=" width:100%; border:0px">
						   <?
						  if(count($row['OrderComments']))
						  {
						  $m =0;
						 ?>


                        <tr class="">
                          <td colspan="3" style="text-align:left">
                            <label>Suggestion for Chef</label><br />
                            <div style=" width:100%; border:1px solid #ddd; border-radius:7px; padding:5px; height:auto; max-height:68px; overflow-y:auto;overflow-x:hidden">
                            <ol style="padding-left:20px; list-style-type:circle; " class="comment_list_<?=$row['OrdersH']['id']?>" >


							<?
							  $tmp="";
							  foreach($row['OrderComments'] as $n)
							  {
							    if($n['is_print'] == 0)
								{
							     echo "<li>".$n['comments']."</li>";
								 $m++;
								}
								else
								{
									$tmp.="<li style='text-decoration:line-through;color:red'>".$n['comments']."</li>";
								}
							  }
							  echo $tmp;
							?>
                            </ol>
                            </div>
                          </td>
                        </tr>

                        <? }?>
                        <?php if( !in_array($row['OrdersH']['order_type'], array(0, 1)) ): ?>
                         <tr class="ontable_<?=$row['OrdersH']['id']?>" style="display:<?= $c ? "table-row" : "none"?>; width:100%">
                           <td colspan="3" width="100%" >
                            <button type="button" class="btn btn-danger btn-block" onclick="done(<?=$row['OrdersH']['id']?>,'tbody_<?=$row['OrdersH']['id']?>')" >On Table</button>
                           </td>

                         </tr>
                       	<?php endif ?>
                         <tr>
                           <td colspan="3" style="text-align:center">

                  <Button style="float:left" class="btn  btn-primary left" onclick="dialog_print(<?=$row['OrdersH']['id']?>,1)" >Print Order</Button>
                  <Button  class="btn  btn-success hide" style="align:center" onclick="dialog_bill(<?=$row['OrdersH']['id']?>,1)" >Print Bill</Button>
                  <Button style="float:right" class="btn  btn-success right" onclick="dialog_print(<?=$row['OrdersH']['id']?>)" >Confirm & KOT</Button>

                           </td>
                         </tr>
                         </tfoot>
                     </table></div><?
		exit;
	}
	public function getAmount()
	{
		 $this->loadModel('OrdersH');
		 $order_ids = explode(",",$this->passedArgs[0]);
		 $amount = $this->OrdersH->find("list",array("fields"=>array("OrdersH.id","OrdersH.net_amt"),"conditions"=>array("OrdersH.id"=>$order_ids)));
		 print_r(json_encode($amount));
		 exit;

	}

	public function removeorder()
	{

	     $this->loadModel('OrdersH');
		 $order_ids = explode(",",$this->passedArgs[0]);
		 if(!$this->passedArgs[1])
		 {
		 $count = $this->OrdersH->find("first",array("fields"=>array("OrdersH.id","OrdersH.order_no","OrdersH.order_type"),"conditions"=>array("OrdersH.payment_mode"=>1,"OrdersH.is_billed"=>1,"OrdersH.order_complete"=>1,"OrdersH.id"=>$order_ids),"limit"=>1,"recursive"=>-1));
		 }
		 else
		 {
		  $count = $this->OrdersH->find("first",array("fields"=>array("OrdersH.id","OrdersH.order_no","OrdersH.order_type"),"conditions"=>array("OrdersH.payment_mode"=>0,"OrdersH.is_billed"=>0,"OrdersH.order_complete"=>1,"OrdersH.bill_request"=>1,"OrdersH.id"=>$order_ids),"limit"=>1,"recursive"=>-1));
		 }


		 if(count($count))
		 {
			 foreach($count as $key=>$val)
			 {
			   echo $val['id'],",",$val['order_no'],",",$val['order_type'];
			 }


		 }
		 else
		 {
			 echo "0";

		 }
		 exit;
	}



	public function updateorders()
	{
		$this->loadModel('OrdersL');
		$order_ids = explode(",",$this->passedArgs[0]);

		$restro_info = $this->viewVars['restro_info'] ;
		$d = date("Y-m-d H:i:s",time());
		if($restro_info['Restaurant']['cancel_available'] == 1)
		{
			$d = date("Y-m-d H:i:s",time()-($restro_info['Restaurant']['auto_cancel_time']*60));

		}

		$orders = $this->OrdersL->find(
			"all",
			array
			(
				"order"=>"OrdersL.entry_date_time asc",
				"conditions"=>array("OrdersL.orders_h_id"=>$order_ids,"OrdersL.entry_date_time <= " => $d,"OrdersL.display"=>0),
				"recursive"=>4,
				"order by"=>"OrdersL.entry_date_time asc"

				)
			);


		$count = count($orders);
		$orders_l_id = array();
		$json = '{"orders":[';
		foreach($orders as $k => $v)
		{
			$combo_items="";

			if($v['OrdersL']['combo_offer_id'] == 0)
			{
				$item_name = isset($v['Item']['item_name']) ? ucwords($v['Item']['item_name']) : 'Item does not exist in database.';
				if(isset($v['Portion']['default_portion'])) {
					$item_name.= $v['Portion']['default_portion'] == 1 ?  '' : ' ('.ucwords($v['Portion']['portion_name']).')';
				}
			}
			else
			{
				$item_name =  isset($v['ComboOffer']['offer_name']) ? ucwords($v['ComboOffer']['offer_name']) : 'Offer does not exist in database.';
				$combo_items = "<span style='text-decoration:underline ;'>".ucwords($v['ComboOffer']['offer_name'])." : Item List</span><br>";
				$extra_count = count($v['ComboOffer']['ComboItems']);
				foreach($v['ComboOffer']['ComboItems'] as $a=>$b)
				{
					$item_name = isset($b['Item']['item_name']) ? ucwords($b['Item']['item_name']) : 'Item does not exist in database.';
					if($a == 0)
					{
						$combo_items.=ucwords($item_name."( qty :".$b['qty'].")");
					}
					else if(($a+1) == $extra_count)
					{
						$combo_items.=" and ".ucwords($item_name."( qty :".$b['qty'].")")."</span>";
					}
					else
					{
						$combo_items.=", ".ucwords($item_name."( qty :".$b['qty'].")");
					}
				}

			}

			$extra = "";
			$extra_count = count($v['OrderExtras']);
			foreach($v['OrderExtras'] as $a=>$b)
			{
				if($a == 0)
				{
					$extra="<span style='font-size:11px; color:black;line-height:0px !important'> with ".ucwords($b['Extras']['name']);
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
			$item_name .= $extra;
			$str = "<input type='checkbox' class='print_td' disabled='disabled' id='check_".$v['OrdersL']['id']."' value='".$v['OrdersL']['id']."' /><label for='check_".$v['OrdersL']['id']."' >On Table</label>";
			if(($k+1)==$count)
			{
				$json.='{"id":"'.$v['OrdersL']['orders_h_id'].'","cell":["'.$item_name.'","'.$v['OrdersL']['id'].'","'.$v['OrdersL']['qty'].'","'.$combo_items.'","'.$str.'"]}';
			}
			else
			{
				$json.='{"id":"'.$v['OrdersL']['orders_h_id'].'","cell":["'.$item_name.'","'.$v['OrdersL']['id'].'","'.$v['OrdersL']['qty'].'","'.$combo_items.'","'.$str.'"]},';
			}

			$orders_l_id[$k] = $v['OrdersL']['id'];
		}

//  $this->OrdersL->query("update `om_orders_l` set `display` = '1' where `entry_date_time` <= '$d' and `orders_h_id` in  ( ".$this->passedArgs[0]." ) ");

		if(count($orders_l_id))
		{
			$this->OrdersL->query("update `om_orders_l` set `display` = '1' where  `id` in  ( ".implode(",",$orders_l_id)." ) ");
		}
		$json.='],"comments":[';

		$this->loadModel("OrderComments");
		$comments = $this->OrderComments->find("all",array("conditions"=>array("OrderComments.orders_h_id"=>$order_ids,"OrderComments.display"=>0)));
		$this->OrderComments->query("update `om_order_comments` set `display` = '1' where `orders_h_id` in  ( ".$this->passedArgs[0]." ) ");
		$count = count($comments);
		foreach($comments as $k=>$v)
		{

			$list = "<li>".preg_replace('/\s+/', ' ', $v['OrderComments']['comments'])."</li>";
			if(($k+1)==$count)
			{
				$json.='{"id":"'.$v['OrderComments']['orders_h_id'].'","cell":["'.$list.'"]}';
			}
			else
			{
				$json.='{"id":"'.$v['OrderComments']['orders_h_id'].'","cell":["'.$list.'"]},';
			}
		}

		$options = array(
			'conditions' => array(
				'OrdersH.id' => $order_ids
			),
			'fields' => array('id', 'bill_request')
		);
		$ordersBillRequests = $this->OrdersL->OrdersH->find('list', $options);

		$billRequests = '"bill_requests": ' . json_encode($ordersBillRequests) . '';



		$options = array(
			'conditions' => array(
				'OrdersH.id' => $order_ids
			),
			'fields' => array('id', 'payment_recieved', 'transaction_id'),
			'recursive' => -1
		);
		$ordersPaymentsReceived = $this->OrdersL->OrdersH->find('all', $options);

		$paymentsReceived = '"payments_received": ' . json_encode($ordersPaymentsReceived) . '';


		$json.='], ' . $billRequests . ', ' . $paymentsReceived . '}';
		echo $json;
		exit;

	}
	public function ontable()
	{
	     $this->loadModel('OrdersL');
		 $order_ids = explode(",",$this->passedArgs[0]);
		 $save;
		 foreach($order_ids as $key=>$val)
		 {
			 $this->OrdersL->id = $val;
			 $save = $this->OrdersL->save(array("is_processed"=>1));
		 }

		 if($save)
		 {
			 echo $count = $this->OrdersL->find("count",array("conditions"=>array("OrdersL.is_print"=>1,"OrdersL.is_processed"=>0,"OrdersL.is_cancel"=>0,"OrdersL.orders_h_id"=>$this->passedArgs[1])));
			 echo ",ok";
		 }
		 else
		 {
			 echo "error";
		 }
		 exit;


	}
	public function delivered()
	{

		  $order_id = $this->passedArgs[0];
		  $this->loadModel("OrdersH");
		  $orders = $this->OrdersH->find(
		          "all",
				  array
				   (
				     "order"=>"OrdersH.entry_date asc",
					 "conditions"=>array("OrdersH.id"=>$order_id),
					 "recursive"=>5,

				   )
				 )   ;
  	   foreach($orders as $key=>$row)
	   { ?>

		   <table class=" x_panel table table-hover table-bordered"  style=" font-family:'Helvetica'; padding:0px; max-height:350px;" >
             <thead style="display:block;">
                       <tr>
                         <th colspan="3"  style="text-align:left; border-top:0px; border-left:0px; border-right:0px" id="order_type_<?=$key?>" >
						  <? switch($row['OrdersH']['order_type'])
						   {
							 case 0: echo "Packing";
							        break;
							 case 1: echo "Pre Order";
							        break;
							 case 2: echo "Table Order for ".$row['RestaurantTables']['cust_table_internal_code'];
							        break;
						   }
						 ?>
                        </th>
                       </tr>
                       <tr>
                         <th  style="text-align:left; border-left:0px;" width="50%">Item Name</th>
                         <th style="text-align:justify" width="10%">Qty</th>
                         <th style="text-align:justify; border-right:0px" width="40%">On Table</th>
                       </tr>
                       </thead>
                       <tbody style="display:block; overflow:auto; max-height:179px; width:104.5%" >
                       <?
					    $m=0;
					    foreach($row['OrdersL'] as $k=>$v)
						{
							if($v['is_cancel'] == 1)continue;
							if($v['is_print'] == 0)continue;
							if($v['is_processed'] == 1)continue;
							 $m++;
						?>

                        <tr>

                        <?	if($v['item_id'] != 0){   ?>
                          <td style="width:181px"><?
						  echo ucwords($v['Item']['item_name'])?><?=$v['Portion']['default_portion'] == 1 ?  "" :  " (".ucwords($v['Portion']['portion_name']).")" ;
						   ?></td>
                          <td style="text-align:center; width:40px"><?=$v['qty']?></td>
                          <td style="text-align:center; padding:4px 2px 2px 2px; width:145px; border-right:0px"><input  type="checkbox" id="check<?=$k?>" value="<?=$v['id']?>" /><label for="check<?=$k?>">On Table</label></td>
                         <? }else {

						  echo '<td>'.ucwords($v['ComboOffer']['offer_name'])."</td>";

						  ?>
                          <td style="text-align:center;"><?=$v['qty']?></td>
                          <td style="text-align:center; padding:4px 2px 2px 2px; width:145px; border-right:0px"><input type="checkbox" id="check<?=$k?>" value="<?=$v['id']?>"/><label for="check<?=$k?>">On Table</label></td>

                         </tr>

                        <? } ?>


	   <?   }
	      if(!$m)
		  { ?>
            <tr>
              <td colspan="3" style="width:365px">Thank You, All items are on table...</td>
            </tr>
		  <? }

	   ?>
        </tbody>
        </table>
        <button type="button" class="btn btn-success btn-block" onclick="done(<?=$order_id?>)">Done</button>
	    <?   }

		exit;



	   }
	public function grid_view(){}

	public function getJson()
	{

		$restro_info = $this->viewVars['restro_info'] ;


		$d = date("Y-m-d H:i:s",time());
		if($restro_info['Restaurant']['cancel_available'] == 1)
		{
			$d = date("Y-m-d H:i:s",time()-($restro_info['Restaurant']['auto_cancel_time']*60));
		}

		$this->loadModel("OrdersH");
		$this->loadModel("OrdersL");
		$this->loadModel("OrderComments");

		$this->OrdersH->updateAll(array("display"=>1),array("1"=>1));

		$sql =" SELECT `OrdersL`.`display`,`OrdersL`.`is_print`,`OrdersL`.`is_processed`,`OrdersL`.`admin_checked`,`OrdersL`.`id`,`OrdersL`.`offer_name`,`OrdersL`.`extras_name`, `OrdersL`.`id`   as orderl_id,`OrdersL`.`qty`,`OrdersL`.`item_name`,`OrdersL`.`portion_name`,`OrdersL`.`default_portion`,`OrdersL`.`name`,`OrdersH`.`id`, `OrdersH`.`order_no`, `OrdersH`.`order_type`, `OrdersL`.`entry_date_time`, `OrdersH`.`net_amt`, `OrdersH`.`bill_request`, `OrdersH`.`packed_or_ready`, `OrdersH`.`payment_recieved`, `OrdersH`.`transaction_id`, `RestaurantTables`.`table_number`, `User`.`name`, `User`.`mobile_no` FROM `pikdish_onlinemenu`.`om_orders_h` AS `OrdersH` LEFT JOIN `pikdish_onlinemenu`.`om_restaurant_tables` AS `RestaurantTables` ON (`OrdersH`.`restaurant_tables_id` = `RestaurantTables`.`id`)
		LEFT JOIN `pikdish_onlinemenu`.`om_users` AS `User` ON (`OrdersH`.`user_id` = `User`.`id`)
		left JOIN (

		SELECT `OrdersCombo`.`offer_name`,`OrdersExtra`.`extras_name`, `Item`.`item_name`,`Item`.`default_portion`, `Item`.`portion_name`,`OrdersL`.`id`,`OrdersL`.`orders_h_id`,`User`.`name` ,`OrdersL`.`qty`,`OrdersL`.`entry_date_time` ,`OrdersL`.`is_processed`,`OrdersL`.`admin_checked`, `OrdersL`.`is_print` ,`OrdersL`.`display` FROM `om_orders_l` as `OrdersL`
		left join `om_users` as `User` on (`OrdersL`.`user_id` = `User`.`id`)
		left join (select `ItemsRate`.`id`,`Item`.`item_name`,`Portions`.`default_portion`,`Portions`.`portion_name`  from `om_items_rate` AS `ItemsRate`  left JOIN `om_items` AS `Item` ON (`ItemsRate`.`item_id` = `Item`.`id`) left JOIN `om_portions` AS `Portions` ON (`ItemsRate`.`portion_id` = `Portions`.`id`) where `Item`.`restuarant_id` = ".$restro_info['Restaurant']['id']." ) as `Item` on  (`OrdersL`.`items_rate_id` = `Item`.`id`)

		left join ( select `OrderExtra`.`orders_l_id`, GROUP_CONCAT(`Extra`.`name`) as `extras_name`  from `om_order_extras` as `OrderExtra` inner join `om_extras` as `Extra` on (`OrderExtra`.`extras_id` = `Extra`.`id`) where Extra.restaurant_id=".$restro_info['Restaurant']['id']." group by orders_l_id ) as `OrdersExtra` on (`OrdersL`.`id` = `OrdersExtra`.`orders_l_id`)

		left join (select `ComboOffer`.`offer_name`,`ComboOffer`.`id` FROM `om_orders_l` as `OrdersL`  left join `om_combo_offer` as `ComboOffer` on (`OrdersL`.`combo_offer_id` = `ComboOffer`.`id`) where `ComboOffer`.`restaurant_id` = ".$restro_info['Restaurant']['id']."  ) as  `OrdersCombo` ON (`OrdersL`.`combo_offer_id` = `OrdersCombo`.`id`)

		WHERE  `OrdersL`.`is_cancel` = 0 and `OrdersL`.`entry_date_time` <= '$d' order by `OrdersL`.`entry_date_time` desc
		)
		AS `OrdersL` ON (`OrdersL`.`orders_h_id` = `OrdersH`.`id`)

		";

		$orders = $orders = $this->OrdersH->query($sql);

		$r = $_GET;
		$page=$r['page'];
		$rp=$r['rows'];
		$sortorder=$r['sord'];
		$sortname=$r['sidx'];
		$sort = "ORDER BY OrdersL.is_print asc, $sortname $sortorder";
		if (!$page) $page = 1;
		if (!$rp) $rp = 20;
		$start = (($page-1) * $rp);
		$limit = "LIMIT $start, $rp";
		$group = "";

		/*$where = " WHERE `OrdersH`.`is_cancel`= 0 and `OrdersH`.`is_billed` = 0 AND `OrdersH`.`entry_date` <= '".$d."' AND `OrdersH`.`restaurant_id` = '".$restro_info['Restaurant']['id']."' ";
		- Replaced is_billed by order_complete*/

		$where = " WHERE `OrdersH`.`is_cancel`= 0 and `OrdersH`.`order_complete` = 0 AND `OrdersH`.`entry_date` <= '".$d."' AND `OrdersH`.`restaurant_id` = '".$restro_info['Restaurant']['id']."' ";

		$count=count($this->OrdersH->query($sql.$where));

		if( $count >0 ) {
			$total_pages = ceil($count/$rp);
		} else {
			$total_pages = 0;
		}

		if ($page > $total_pages) $page=$total_pages;

		if($r['_search'] == 'true') {
			$r['filters'] = str_replace("\\","",$r['filters']);
			$arr = json_decode($r['filters'],true);

/*
echo '<pre style="display:none"><code>';
echo __FILE__ . ":" . __FUNCTION__ . ":" . __LINE__ . "\n";
print_r( $arr );
echo "</code></pre>";
/* */
			foreach( $arr['rules'] as $index => $data) {

				switch($data['field']) {
					case 'OrdersH.order_no' : $where.= " and ".$data['field']." like '%".$data['data']."%'";
					break;
					case 'OrdersH.order_type' : $where.= " and ".$data['field']." = '".$data['data']."'" ;
					break;
					case 'OrdersL.qty' : $where.= " and ".$data['field']." = '".$data['data']."'" ;
					break;
					case 'RestaurantTables.table_number' : $where.= " and ".$data['field']." = '".$data['data']."'" ;
					break;
					case 'User.name' : $where.= " AND (`User`.`name` like '%".$data['data']."%' OR `User`.`mobile_no` like '%".$data['data']."%')" ;
					break;
					case 'OrdersL.item_name' :
					$where.= " and ( (".$data['field']." like '%".$data['data']."%'  or `OrdersL`.`portion_name` like '%".$data['data']."%') or `OrdersL`.`offer_name` like '%".$data['data']."%') " ;
					break;
				}

			}

		}

		$query = $sql.$where.'  '.$group.' '.$sort.' '.$limit;

		$result=$this->OrdersH->query($query);

		$count=count($result);

		$json = '{
			"page":'.$page.',
			"total":'.$total_pages.',
			"records":'.$count.',
			"rows":[';
			$tmp=array();
			foreach($result as $key => $row)
			{

				$class ="";
				if($row['OrdersL']['is_print'] == 0)
				{
					$class = "class='print_td_".$row['OrdersH']['id']."' disabled='disabled'";

				}
				elseif ($row['OrdersL']['is_processed'] == 1)
				{
					$class = " disabled='disabled'";

				}
					$str = "";

//				$str = "<input  type='checkbox' $class   id='gridcheck_".$row['OrdersL']['orderl_id']."' name='order_l[]' value='".$row['OrdersL']['id']."'/><label for='gridcheck_".$row['OrdersL']['orderl_id']."'";
				if( ($row['OrdersH']['order_type'] == 2 && $row['OrdersL']['is_processed'] == 1) || $row['OrdersL']['admin_checked'])
				{
						if( $row['OrdersL']['admin_checked'] && in_array($row['OrdersH']['order_type'], array(0, 1)) ) {
							if($row['OrdersH']['payment_recieved'] == 0) {
								$str .= "<span class='blink' style='float:none'>Payment Pending</span>";
							} elseif($row['OrdersH']['payment_recieved'] == 1) {
								$str .= "<span class='blink' style='float:none'>You have received payment against the transaction id <br />".$row['OrdersH']['transaction_id']."</span>";
							}

						}
						$str .= " <button class='btn  btn-primary ' onclick='dialog_display(".$row['OrdersH']['id'].")' >Details</button>";
						if( $row['OrdersL']['admin_checked'] && in_array($row['OrdersH']['order_type'], array(0, 1)) ) {
							if($row['OrdersH']['payment_recieved'] == 1) {
								$str .= "<button id='print-bill-".$row['OrdersL']['orderl_id']."' class='btn btn-success' onclick='dialog_bill(".$row['OrdersH']['id'].", ".$row['OrdersL']['orderl_id'].")'>Print Bill</button>";
								if($row['OrdersH']['order_type'] == 0) {
									$hide = ($row['OrdersH']['packed_or_ready'] == 1) ? 'hide' : '';
									$hide2 = ($row['OrdersH']['packed_or_ready'] == 0) ? 'hide' : '';
									//$str .= "<button id='order-packed-".$row['OrdersL']['orderl_id']."' class='".$hide." btn btn-success' onclick='orderPacked(".$row['OrdersH']['id'].", ".$row['OrdersL']['orderl_id'].")'>Packed</button>";
									$str .= "<button id='order-delivered-".$row['OrdersL']['orderl_id']."' class='".$hide2." btn btn-success' onclick='orderDelivered(".$row['OrdersH']['id'].", ".$row['OrdersL']['orderl_id'].")'>Order Delivered</button>";
								} elseif($row['OrdersH']['order_type'] == 1) {
									//$str .= "<button class='btn btn-success' onclick='orderReady(".$row['OrdersH']['id'].", ".$row['OrdersL']['orderl_id'].")'>Ready</button>";
								}
							}
						}
		//			$str.="class='ui-state-active gridcheck_".$row['OrdersL']['orderl_id']."'";
					$action = "<button type='button' id='button_".$row['OrdersL']['orderl_id']."' onclick='change(this,".$row['OrdersL']['orderl_id'].")' class='btn btn-default' aria-label='Justify' ><span class=' glyphicon glyphicon-unchecked'  aria-hidden='true'></span></button><input type='hidden'  class='hidden_checkbox' id='check_box_".$row['OrdersL']['orderl_id']."' value=''></div>";
				}
				else
				{
	//				$str.="class='gridcheck_".$row['OrdersL']['orderl_id']."'";
					$action ="<div class='btn-group'><button type='button' id='button_".$row['OrdersL']['orderl_id']."' onclick='change(this,".$row['OrdersL']['orderl_id'].")' class='btn btn-default' aria-label='Justify' ><span class=' glyphicon glyphicon-unchecked'  aria-hidden='true'></span></button><button title='Cancel Item' onclick='cancel_order(".$row['OrdersL']['orderl_id'].")' type='button' class='btn btn-default' aria-label='Left Align' ><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button><input type='hidden'  class='hidden_checkbox' id='check_box_".$row['OrdersL']['orderl_id']."' value=''></div>";
				}

				if( $row['OrdersL']['admin_checked'] && $row['OrdersH']['order_type'] == 2 && $row['OrdersH']['bill_request'] == 1) {
					$str .= "<button id='print-bill-".$row['OrdersL']['orderl_id']."' class='btn btn-success' onclick='bill_request(".$row['OrdersH']['id'].", ".$row['OrdersL']['orderl_id'].")' >Print Bill</button>";
					$str .= "<button id='payment-recieved-".$row['OrdersL']['orderl_id']."' class='hide btn btn-success' onclick='bill_request2(".$row['OrdersH']['id'].")' >Payment Received? Yes</button>";
				}



//				$str.=">On Table</label> ";
//				$str .= "<Button class='btn  btn-primary ' onclick='dialog_display(".$row['OrdersH']['id'].")' >Details</Button><Button class='btn  btn-success right' onclick='dialog_print(".$row['OrdersH']['id'].")' >Print</Button>";

				$item_name = $row['OrdersL']['offer_name'];
				if($row['OrdersL']['item_name'] !="")
				{
					$item_name = $row['OrdersL']['item_name'];
					if($row['OrdersL']['default_portion'] != 1)
					{
						$item_name.=" ( ".$row['OrdersL']['portion_name']." )";
					}
					if($row['OrdersL']['extras_name'] != "")
					{
						if(strrpos($row['OrdersL']['extras_name'], ','))
						{
							$row['OrdersL']['extras_name'] =  substr_replace($row['OrdersL']['extras_name'],' and ', strrpos($row['OrdersL']['extras_name'], ','), 1);
						}

						$item_name.="<small style='color:gray'> with ".$row['OrdersL']['extras_name']."</small>";
					}

				}
				if( !$row['OrdersL']['is_print'])
				{
					$item_name.="<span class='blink element_".$row['OrdersL']['orderl_id']." blink_".$row['OrdersH']['id']."'>New Order</span>";
				}

				if($row['OrdersL']['is_print'] == 0)
				{
					$hidden="<input type='hidden' value='".$row['OrdersH']['id']."_".$row['OrdersL']['orderl_id']."' class='none' >";
				}
				elseif($row['OrdersL']['is_print'] == 1 && $row['OrdersL']['is_processed'] == 0)
				{
					$hidden="<input type='hidden' value='".$row['OrdersH']['id']."_".$row['OrdersL']['orderl_id']."' class='print' >";
				}
				elseif($row['OrdersL']['is_print'] == 1 && $row['OrdersL']['is_processed'] == 1)
				{
					$hidden="<input type='hidden' value='".$row['OrdersH']['id']."_".$row['OrdersL']['orderl_id']."' class='processed' >";
				}

				if($row['OrdersH']['order_type'] == 1)
				{
					$row['OrdersH']['order_type'] = "Pre Order";
					$row['RestaurantTables']['cust_table_internal_code'] = "";
				}
				elseif($row['OrdersH']['order_type'] == 0)
				{
					$row['OrdersH']['order_type'] = "Packing";
					$row['RestaurantTables']['cust_table_internal_code'] = "";
				}else
				{
					$row['OrdersH']['order_type'] = "Table Order";
				}
				$tmp[$row['OrdersH']['id']] = $row['OrdersH']['id'];
				if(($key+1)==$count)
				{

					$h = "<input type='hidden' class='hidden_id' value='".implode(",",$tmp)."' />";
					$json.='{"id":"'.$row['OrdersH']['id']."_".$row['OrdersL']['orderl_id'].'","cell":["'.$action.'","'.$row['OrdersH']['order_no'].'","'.$item_name.$hidden.'","'.$row['OrdersL']['qty'].'","'.$row['OrdersH']['order_type'].'","'.$row['RestaurantTables']['table_number'].'","'.$row['User']['mobile_no'].'<br />('.$row['User']['name'].')","'.date("h:i A",strtotime($row['OrdersL']['entry_date_time'])).'","'.$str.$h.'"]}';
				}
				else
				{
					$json.='{"id":"'.$row['OrdersH']['id']."_".$row['OrdersL']['orderl_id'].'","cell":["'.$action.'","'.$row['OrdersH']['order_no'].'","'.$item_name.$hidden.'","'.$row['OrdersL']['qty'].'","'.$row['OrdersH']['order_type'].'","'.$row['RestaurantTables']['table_number'].'","'.$row['User']['mobile_no'].'<br />('.$row['User']['name'].')","'.date("h:i A",strtotime($row['OrdersL']['entry_date_time'])).'","'.$str.'"]},';
				}
			}
			$json.=']}';
			echo $json;

			$this->OrdersL->query("update `om_orders_l` set `display` = '1' where `restaurant_id` = ".$restro_info['Restaurant']['id']." and `is_print` = 0 ");
			$this->OrdersH->query("update `om_orders_h` set `display` = '1' where `restaurant_id` = ".$restro_info['Restaurant']['id']);
			$this->OrderComments->query("update `om_order_comments` set `display` = '1' where `orders_h_id` in (select `id` from `om_orders_h` where `restaurant_id` = ".$restro_info['Restaurant']['id'].")");
			exit;


		}


}

?>
