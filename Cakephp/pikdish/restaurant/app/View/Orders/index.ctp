<!--<META http-equiv="REFRESH" content="300">  -->
<? echo $this->Html->script($path.'/js/print/jQuery.print.js'); ?>
<style>
	.left
	{ float:left}
	.right
	{
		float:right
	}
	@page {
		margin: 5pt 208pt;
	}
	.table>tbody+tbody
	{
		border-top:0px solid #ddd !important;

	}
	.table>thead:first-child>tr:first-child>th {
		border-top: 1px  solid #ddd!important;
	}
	.table>tfoot:first-child>tr:first-child>td {
		border-top: 0px !important;
		border-left: 0px !important;
	}
	.ui-dialog .table>tbody>tr>td {

		border-left: 0px !important;
	}

	.row .table>tbody>tr:last-child>td , .ui-dialog .table>tbody>tr:last-child>td{

		border-bottom: 0px !important;
	}
	.table>tbody>tr:first-child>td {

		border-top: 0px !important;
	}
	.table-bordered>thead>tr>td, .table-bordered>thead>tr>th ,.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th{
		border-bottom-width: 1px !important;
	}

	.ui-icon
	{
		display:inline-block !important;
		cursor:pointer;

	}
	.ui-icon-trash {

		background-position: -180px -94px;
	}
	table .ui-state-default,.ui-dialog-buttonset>button:last-child
	{
		background-color: #d43f3a !important;
		border-color: #d43f3a !important;
		background-image:none !important;
		color:#ffffff !important;
	}
	table .ui-state-active,.ui-dialog-buttonset>button:first-child
	{
		background-color: #5cb85c !important;
		border-color: #4cae4c  !important;
		background-image:none !important;
		color:#ffffff !important;

	}

	.blink {
		animation-duration: 2000ms;
		animation-name: blink;
		animation-iteration-count: infinite;
		animation-direction: alternate;
		font-size:15px;
		text-shadow: 1px 1px 7px;
		float:right;
	}

	@keyframes blink {
		0% {
			opacity: 1;
			color: pink;
		}

		25% {
			color: green;
			opacity: 0;
		}

		50% {
			opacity: 1;
			color: blue;
		}

		75% {
			opacity: 0;
			color: red;
		}

		100% {
			opacity: 1;
			color: #C0C;
		}
	}

	.pagination
	{
		margin:0px;
	}
	.pagination>li>a
	{
		color:#777
	}



	div.order_div .kot {
		display: inline;
	}

	div.order_div .details {
		display: none;
	}

	div.order_div .order-packed {
		display: none;
	}

	div.order_div .food-ready {
		display: none;
	}

	div.order_div .print-bill {
		display: none;
	}

	div.order_div .packing-delivered {
		display: none;
	}



	div.order_div.admin_checked .kot {
		display: inline;
	}

	div.order_div.admin_checked .details {
		display: inline;
	}

	div.order_div.admin_checked .order-packed {
		display: none;
	}

	div.order_div.admin_checked .food-ready {
		display: none;
	}

	div.order_div.admin_checked .print-bill {
		display: none;
	}

	div.order_div.admin_checked .packing-delivered {
		display: none;
	}



	div.order_div.admin_checked.payment_recieved .kot {
		display: none;
	}

	div.order_div.admin_checked.payment_recieved .details {
		display: inline;
	}

	div.order_div.admin_checked.payment_recieved .order-packed {
		display: inline;
	}

	div.order_div.admin_checked.payment_recieved .food-ready {
		display: inline;
	}

	div.order_div.admin_checked.payment_recieved .print-bill {
		display: inline;
	}

	div.order_div.admin_checked.payment_recieved .packing-delivered {
		display: none;
	}



	div.order_div.admin_checked.payment_recieved.packed_or_ready .kot {
		display: none;
	}

	div.order_div.admin_checked.payment_recieved.packed_or_ready .details {
		display: inline;
	}

	div.order_div.admin_checked.payment_recieved.packed_or_ready .order-packed {
		display: none;
	}

	div.order_div.admin_checked.payment_recieved.packed_or_ready .food-ready {
		display: none;
	}

	div.order_div.admin_checked.payment_recieved.packed_or_ready .print-bill {
		display: inline;
	}

	div.order_div.admin_checked.payment_recieved.packed_or_ready .packing-delivered {
		display: inline;
	}



	div.order_div.admin_checked.payment_recieved.packed_or_ready.packing_delivered .kot {
		display: none;
	}

	div.order_div.admin_checked.payment_recieved.packed_or_ready.packing_delivered .details {
		display: inline;
	}

	div.order_div.admin_checked.payment_recieved.packed_or_ready.packing_delivered .order-packed {
		display: none;
	}

	div.order_div.admin_checked.payment_recieved.packed_or_ready.packing_delivered .food-ready {
		display: none;
	}

	div.order_div.admin_checked.payment_recieved.packed_or_ready.packing_delivered .print-bill {
		display: inline;
	}

	div.order_div.admin_checked.payment_recieved.packed_or_ready.packing_delivered .packing-delivered {
		display: none;
	}

	div.order_div.admin_checked.payment_recieved.packed_or_ready.order_type_1 .packing-delivered {
		display: none;
	}


	div.order_div.bill_request .items-headers {
		display: none;
	}

	div.order_div.bill_request tbody.items-table {
		display: none !important;
	}

	div.order_div.bill_request tr.on-table {
		display: none !important;
	}

	div.order_div.bill_request button.kot {
		display: none;
	}

	tr.box_1 {
		display: none;
	}

	tr.box_2 {
		display: none;
	}

	div.order_div.bill_request tr.box_1 {
		display: table-row;
	}

	div.order_div.bill_request2 tr.box_1 {
		display: none;
	}

	div.order_div.bill_request2 tr.box_2 {
		display: table-row;
	}

	div.order_div h4.blink {
		float: none;
	}

</style>
<script>
	function checkTime(i){ return (i < 10) ? "0" + i : i;   }
	function startTime(key,time_stamp)
	{
		var order_time = new Date(time_stamp);
		var today = new Date();
		h = (today.getHours()-order_time.getHours());
		m = (today.getMinutes()-order_time.getMinutes());
		if(m < 0)
		{
			m+=60;
			h = Math.floor(((h*60)-m)/60);
		}
		$('.time_'+key).html("Open from : "+ checkTime(h) + ":" + checkTime(m)) ;
		t = setTimeout(function () {
			startTime(key,time_stamp)
		}, 50000);
	}

</script>
<div class="right_col container-fluid" role="main"   >
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Current Orders</h3>
			</div>
			<div class="title_right">
				<div class="col-md-3 col-sm-3 col-xs-4 form-group pull-right top_search">
					<div class="input-group">
						<nav aria-label="Page navigation ">
							<ul class="pagination pagination-lg">
								<li class="active"><a href="#"><span class="glyphicon glyphicon glyphicon-th-large" aria-hidden="true"></span></a></li>
								<li><a href="<?=$path?>orders/grid_view"><span class="glyphicon glyphicon glyphicon-th-list" aria-hidden="true"></span></a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row" id="order_display_div">
			<!-- order block-->
			<? foreach($orders as $key => $row)
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
							<? if($row['OrdersH']['display'] == 0) {?>
							<div class="clearfix" style="text-align:center; font-size:14px; text-shadow:#990 2px" ><span class="blink blink_<?=$row['OrdersH']['id']?>" style="float:none !important">New Order</span></div>
							<? }?>
							<div class="clearfix">
								<h2 id="table_code_<?=$row['OrdersH']['id']?>"><?=$row['OrdersH']['order_type'] == 2 ? $row['RestaurantTables']['cust_table_internal_code'] : $order_name ; ?></h2>
								<h2 class="time_<?=$row['OrdersH']['id']?>" style="float:right"></h2>
								<script> startTime('<?=$row['OrdersH']['id']?>','<?=$row['OrdersH']['entry_date']?>'); </script>
							</div>
						</div>
						<div>
							<table class="table table-hover table-bordered" style="border:0px; border-radius:7px" >
								<thead style="border:0px">
									<tr>
										<th id="order_type_<?=$key?>" colspan="2" ><?=$order_name?>
											<div style="float:right">Amount : <span id="amt_span_<?=$row['OrdersH']['id']?>" style=" padding-left:12px;color:#121212; background:no-repeat url(<?=$imgpath?>rupess.png)"><?=$row['OrdersH']['net_amt']?></span></div></th>
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

										<tr class="items-headers ">

											<th  style="text-align:left" width="80%">Item Name</th>
											<th style="text-align:justify" width="20%">Quantity</th>

										</tr>
									</thead>
									<tbody class="items-table" style="max-height:134px; overflow:auto; display:block; border:0px; width:136.5%">
										<?
										$row['OrdersL'] = array_reverse ($row['OrdersL']);



										foreach($row['OrdersL'] as $k=>$v)
										{
											if($v['is_cancel'] == 1)continue;
											if($v['is_print']  && !$v['is_processed'] )
											{
												$c++;
											}

							//if($v['is_processed'] == 0)$c++;
											$p = $v['is_print'] == 0 ? 0 : 1;

											?>
											<tr class="item-<?=$v['id']?> tr_<?=$v['id']?>" <?= $v['is_processed'] == 1? 'style="text-decoration:line-through;color:red"': "" ?> >
												<?php	if($v['combo_offer_id'] == 0) {   ?>


												<td style="width:240px">
													<?php if(!$v['is_processed'] && !$v['admin_checked']){?>
														<span onclick="cancel_order(<?=$v['id']?>)" class="ui-icon ui-icon-trash"></span>
													<?php } ?>
													<?php echo isset($v['Item']['item_name']) ? ucwords($v['Item']['item_name']) : 'Item does not exist in database.' ?>
													<?php if( isset($v['Portion']['default_portion']) && $v['Portion']['portion_name'] ): ?>
														<?php echo $v['Portion']['default_portion'] == 1 ? "" : " (".ucwords($v['Portion']['portion_name']).")" ?>
													<?php endif ?>

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


												<? } else {  ?>


												<td style="width:240px">
													<? if(!$v['is_processed'] && !$v['admin_checked']){?>
														<span onclick="cancel_order(<?=$v['id']?>)" class="ui-icon ui-icon-trash"></span>
													<? } ?>
													<?php echo isset($v['ComboOffer']['offer_name']) ? ucwords($v['ComboOffer']['offer_name']) : 'Offer does not exist in database.' ?>
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
													echo '</td>';
													?>

													<td style="text-align:center;"><span class="badge "><?=$v['qty']?></span></td>


													<?
												} ?>
											</tr>
											<? } ?>
										</tbody>
										<tfoot style=" width:100%; border:0px;">

											<tr class="comment_tr_<?=$row['OrdersH']['id']?>" style="display:<?=count($row['OrderComments']) == 0 ? "none" : "" ?>" >
												<td colspan="3"  style="text-align:left;">
													<label>Suggestion for Chef</label><br />
													<div style=" width:100%; border:1px solid #ddd; border-radius:7px; padding:5px; max-height:46px; overflow-y:auto;overflow-x:hidden">
														<ol style="padding-left:20px; list-style-type:circle; " class="comment_list_<?=$row['OrdersH']['id']?>" >
															<?
															$m =0;$tmp="";

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
												<tr class="on-table ontable_<?=$row['OrdersH']['id']?>" style="display:<?=$p == 1 && $c ? "table-row" : "none" ?>">
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

													<button class="btn btn-success packing-delivered" onclick="orderDelivered(<?php echo $row['OrdersH']['id'] ?>)" >Order Delivered</button>

													<button  class="btn btn-success right print-bill" onclick="dialog_bill(<?=$row['OrdersH']['id']?>)" >Print Bill</button>

													<button class="btn btn-success right kot" onclick="dialog_print(<?=$row['OrdersH']['id']?>)" >Confirm & KOT</button>

												</td>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<? } ?>
						<!-- Order Block end-->
					</div>
				</div>



				<div id="dialog" style="display:none"></div>
				<div id="delivered" style="display:none; overflow-x:hidden; width:auto " title="On Table"></div>
				<div id="printable" style="width:270px; display:none "></div>
				<? echo ($this->Js->writeBuffer());?>
				<script>
function dialog_display(key)
{
	jQuery.ajax({ // Ajax Start
		type:'PRINT',
		async: true,
		cache: false,
		dataType: 'text',
		url: '<?php echo $path;?>/orders/getDialogBox/' + key,
		success: function(response)
		{
		//alert(response);
		$("#dialog").html(response);
	 // $("#dialog").append();

	 $( "#dialog-response_"+key+" input[type=checkbox]" ).button();
	 $( "#dialog-response_"+key).dialog({

	 	height:'auto',
	 	width:'45%',
	 	model:false,
	 	resizable:false,



	 });

	 return false;
	}
});

}

function dialog_print(id,type = 0)
{
	jQuery.ajax({ // Ajax Start
		type:'PRINT',
		async: true,
		cache: false,
		dataType: 'text',
		url: '<?php echo $path;?>/orders/getPrint/' + id+'/'+type ,
		success: function(response)
		{
		//alert(response);

		$("#printable").html(response).css('display','block').print();
		$("#dialog_table_"+id+" .print_td" ).attr( "disabled",false).removeClass("print_td").button().button("enable");
		$("#printable").html("").css('display','none');
		$(".comment_list_"+id+" li").css({'text-decoration':'line-through','color':'red'});
		$(".blink_"+id).remove();
	  // remove trash
	  $(".order_div_"+id+" .ui-icon-trash").remove();
	  $("#dialog_table_"+id+" .ui-icon-trash").remove();

	  ontable_show(id);

	  $('.order_div_' + id).addClass('admin_checked');
	  //$('.order_div_' + id + ' .btn-primary.left').removeClass('hide');
	  //$('.order_div_' + id + ' .btn-success').removeClass('hide');


	  return false;
	}
   }); //Ajax End


}

function dialog_bill(id)
{
	 //new code
	 $( "#dialog-confirm_bill" ).dialog({
	 	resizable: false,
	 	height:180,
	 	modal: true,
	 	buttons: {
	 		"Get Bill": function() {
	 			$( this ).dialog( "close" );
					jQuery.ajax({ // Ajax Start
						type:'PRINT',
						async: true,
						cache: false,
						dataType: 'text',
						url: '<?php echo $path;?>orders/getBill/' + id,
						success: function(response)
						{
						//alert(response);
						$( "#dialog").dialog().dialog("close");
						//$('.order_div_'+id).remove();
						$("#printable").html(response).css('display','block').print();
						$("#printable").html("").css('display','none');

						return false;
					}
				   }); //Ajax End
				},
				Cancel: function() {
					$( this ).dialog( "close" );
					$('.ui-widget-overlay').css('display','none');
				}
			}
		});


	// old code




}


function bill_request(id)
{

	jQuery.ajax({ // Ajax Start
		type:'PRINT',
		async: true,
		cache: false,
		dataType: 'text',
		url: '<?php echo $path ?>orders/getBillRequest/' + id,
		success: function(response)
		{
			$("#printable").html(response).css('display','block').print();
			$("#printable").html("").css('display','none');
			$('.order_div_' + id).addClass('bill_request2');
			return false;
	  }
  }); //Ajax End

}

function bill_request2(id)
{

	jQuery.ajax({ // Ajax Start
		type:'POST',
		async: true,
		cache: false,
		dataType: 'text',
		url: '<?php echo $path ?>orders/getBillRequest2/' + id,
		success: function(response)
		{

			$('.order_div_' + id).remove();

			return false;
		}
  }); //Ajax End

}


	function delivered(id)
	{
	jQuery.ajax({ // Ajax Start
		type:'PRINT',
		async: true,
		cache: false,
		dataType: 'text',
		url: '<?php echo $path;?>orders/delivered/' + id,
		success: function(response)
		{
			$("#delivered").html(response).css('display','block');
			$( "#delivered input[type=checkbox]" ).button();
			$( "#delivered").dialog({


				height:'auto',
				width:'30%',
				model:false,
				resizable:false


			});

			return false;
		}
	});
}

function ontable_show(id)
{
	jQuery.ajax({ // Ajax Start
		type:'PRINT',
		async: true,
		cache: false,
		dataType: 'text',
		url: '<?php echo $path;?>orders/checkontable/'+id,
		success: function(response)
		{

			if(response == 0)
			{
				$(".ontable_"+id).hide()
			}
			else
			{
				$(".ontable_"+id).show();
			}



		}
	});
}

function done(id,type = 0)
{
	var allVals = [];
	if(type == 0)
	{
		$('#delivered input[type=checkbox]:checked').each(function() {
			allVals.push($(this).val());
		});
	}
	else
	{
		$('#'+type+' input[type=checkbox]:checked').each(function() {
			allVals.push($(this).val());
		});
	}
	 //alert(allVals);
	 //return;
	 if(allVals.length == 0)
	 {
	 	if(type == 0)
	 	{
	 		$( "#delivered").dialog("close");
	 	}
	 	return ;
	 }
    jQuery.ajax({ // Ajax Start
    	type:'PRINT',
    	async: true,
    	cache: false,
    	dataType: 'text',
    	url: '<?php echo $path;?>orders/ontable/' + String(allVals)+'/'+id,
    	success: function(response)
    	{
    		r = response.split(",");
    		if(r[1] == "ok")
    		{
    			for(i=0;i<allVals.length;i++)
    			{
    				$(".tr_"+allVals[i]).css({"text-decoration":"line-through","color":"red"});
    				$( ".tr_"+allVals[i]+" input[type=checkbox]" ).attr( "disable","disabled" );
    				$( ".tr_"+allVals[i]+" input[type=checkbox]" ).button().button("disable");
    				$( ".tr_"+allVals[i]+" label" ).addClass("ui-state-active");

    				$(".tr_"+allVals[i]+" .ui-icon-trash").remove();
	           //$("#dialog_table_"+id+" .ui-icon-trash").remove();


	         }
	         if(r[0] == 0)
	         {

	         	$(".ontable_"+id).css({"display":"none"});

	         }

	       }

	     }
	   });
    if(type == 0)
    {
    	$( "#delivered").dialog("close");
    }

  }

  function getneworder()
  {

	jQuery.ajax({ // Ajax Start
		type:'PRINT',
		async: true,
		cache: false,
		dataType: 'text',
		url: '<?php echo $path;?>orders/neworders/',
		success: function(response)
		{
			if(response !== "")
			{
				var wdt1 = $(".col-md-4" ).css("width");
				var wdt2 = $(".col-md-4 .x_panel" ).css("width");
				$("#order_display_div").prepend(response);
				$(".col-md-4 ").css("width",wdt1);
				$(".col-md-4 .x_panel").css("width",wdt2);

				var allVals = [];
				$('.hidden_id').each(function() {
					allVals.push($(this).val());
				});
				if(allVals.length == 1)
				{
					updateorder();
				}

			}


		}
	});
	order = setTimeout(function () {
		getneworder()
	}, 60000);
}
function update_amount()
{
	var allVals = [];
	$('.hidden_id').each(function() {
		allVals.push($(this).val());
	});
	if(allVals.length == 0)
	{
		return ;
	}
	jQuery.ajax({ // Ajax Start
		type:'PRINT',
		async: true,
		cache: false,
		dataType: 'json',
		url: '<?php echo $path;?>orders/getAmount/'+String(allVals),
		success: function(response)
		{
			$.each(response, function(i, items){

			//{"1":"-580.00","2":"-510.00"}
			$("#amt_span_"+i).html(items);
			//alert(i,item);

		});

		}
	});

}
function cancel_order(id,d=0)
{

	$( "#dialog-confirm" ).dialog({
		resizable: false,
		height:180,
		modal: true,
		buttons: {
			"Cancel Item": function() {
				$( this ).dialog( "close" );
				jQuery.ajax({
					type:'DELETE',
					async: true,
					cache: false,
					dataType: 'json',
					url: '<?php echo $path;?>orders/cancelOrder/' + id ,
					success: function(response) {

						$("#amt_span_"+response[0]).html(response[1]+".00");
						if(d == 1)
						{
							$("#d_amt_span_"+response[0]).html(response[2]+".00");
						}
						$(".tr_"+id).remove();
						if(response[3] == 0)
						{
							$('.order_div_'+response[0]).remove();
						}
						$( "#dialog-response" ).html("Item has been successfully cancelled");
						$( "#dialog-response" ).dialog({
							height:150,
							model:false,
							resizable:false

						});
						u = setTimeout(function () { $("#dialog-response").dialog( "close" ); }, 5000);
						ontable_show(response[0]);
						return false;
					} });
			},
			Cancel: function() {
				$( this ).dialog( "close" );
				$('.ui-widget-overlay').css('display','none');
			}
		}
	});
}

function updateorder()
{
	var allVals = [];
	$('.hidden_id').each(function() {
		allVals.push($(this).val());
	});


	if(allVals.length == 0)
	{
		update = setTimeout(function () { updateorder() }, 30000);
		return ;
	}

	jQuery.ajax({ // Ajax Start
		type:'PRINT',
		async: true,
		cache: false,
		dataType: 'json',
		url: '<?php echo $path;?>orders/updateorders/'+String(allVals),
		success: function(response)
		{

			$.each(response.payments_received, function(id, val) {
				if(val.OrdersH.payment_recieved == 1) {
					var message = '<td colspan="2" align="center"><span class="blink" style="float:none">You have received payment against the transaction id ' + val.OrdersH.transaction_id + '</span></td>';
					$('.order_div_' + val.OrdersH.id).addClass('payment_recieved').find('tr.tr_payment_recieved').html(message);
				}
			});

			$.each(response.bill_requests, function(id, val) {
				if(val == 1) {
					$('.order_div_' + id).addClass('bill_request');
				}
			});

			$.each(response.orders, function(i, items)
			{

				str = '<tr class="tr_'+items.cell[1]+'"><td style="" ><span onclick="cancel_order('+items.cell[1]+')" class="ui-icon ui-icon-trash"></span>'+items.cell[0]+' <span  class="blink blink_'+items.id+'"> New Order</span></td><td  style="text-align:center;"><span class="badge">'+items.cell[2]+'</span></td></tr>';
				$(" #order_display_div .order_div_"+items.id+" table tbody").prepend(str);
		 //new code
		 $tmp = $(" #order_display_div .order_div_"+items.id);
		 $("#order_display_div").prepend($(" #order_display_div .order_div_"+items.id));
		 //new code

		 str = '<tr class="tr_'+items.cell[1]+'"><td style="" ><span onclick="cancel_order('+items.cell[1]+')" class="ui-icon ui-icon-trash"></span>'+items.cell[0]+'</td><td  style="text-align:center;"><span class="badge">'+items.cell[2]+'</span></td><td style="text-align:center">'+items.cell[4]+'</td></tr>';
		 if(items.cell[3] != "")
		 {
		 	str+='<tr class="tr_'+items.cell[1]+'"><td colspan="3">'+items.cell[3]+'</td></tr>';
		 }
		 $("#dialog_table_"+items.id+" tbody").append(str);
		 $( ".tr_"+items.cell[1]+" input[type=checkbox]" ).button();


		});
			$.each(response.comments, function(i, items)
			{
				$(".comment_tr_"+items.id).show();
				$("#order_display_div .order_div_"+items.id+" .comment_list_"+items.id).prepend(items.cell[0]);
				$("#dialog_table_"+items.id+" .comment_list_"+items.id).append(items.cell[0]);
			});
			if(response.orders.length)
			{
      	 update_amount();	 //alert(response.comments[0].id)  ;
      	}

      }

    });
	update = setTimeout(function () { updateorder() }, 30000);
}

function remove_order(type = 0)
{

	var allVals = [];
	$('.hidden_id').each(function() {
		allVals.push($(this).val());
	});
	if(allVals.length == 0)
	{
		update = setTimeout(function () { remove_order(type) }, 60000);
		return ;
	}
	jQuery.ajax({ // Ajax Start
		type:'PRINT',
		async: true,
		cache: false,
		dataType: 'text',
		url: '<?php echo $path;?>orders/removeorder/'+String(allVals)+'/'+type,
		success: function(response)
		{

			if(response != 0)
			{
			 //js = jQuery.parseJSON(response);
			 js = response.split(",");
			 id = js[0];
			 table_name = $("#table_code_"+id).html();
			 if(!type)
			 {
			 	if(js[2] == 2)
			 	{
			 		$('#spantext').html("Order against the table no : <b>"+table_name+"</b> is completed. This order will be removed. Would you like to have the receipt?");
			 	}
			 	else
			 	{
			 		table_name = js[2] == 0 ? "Packing"  : "Pre Order" ;
			 		$('#spantext').html("Order no : <b>"+js[1]+"</b> of <b>"+table_name+"</b> is completed. This order will be removed. Would you like to have the receipt?");
			 	}
			 }
			 else
			 {
			 	if(js[2] == 2)
			 	{
			 		$('#spantext').html("Customer wants to pay in Cash. Please genrate the bill against the table no : <b>"+table_name+"</b>");
			 	}
			 	else
			 	{
			 		table_name = js[2] == 0 ? "Packing"  : "Pre Order" ;
			 		$('#spantext').html("Customer wants to pay in Cash. Please genrate the bill against the Order no : <b>"+js[1]+"</b> of <b>"+table_name+"</b>");
			 	}

			 }
			 $( "#dialog-alert" ).dialog({
			 	resizable: false,
			 	height:230,
			 	modal: true,
			 	buttons: {
			 		"Get Bill": function() {
			 			$( this ).dialog( "close" );
					jQuery.ajax({ // Ajax Start
						type:'PRINT',
						async: true,
						cache: false,
						dataType: 'text',
						url: '<?php echo $path;?>orders/getBill/' + id,
						success: function(response)
						{
						//alert(response);
						$( "#dialog").dialog().dialog("close");
						$('.order_div_'+id).remove();
						$("#printable").html(response).css('display','block').print();
						$("#printable").html("").css('display','none');

						return false;
					}
				   }); //Ajax End
				},
				Cancel: function() {
					if(!type)
					{
						$('.order_div_'+id).remove();
					}
					$( this ).dialog( "close" );
					$('.ui-widget-overlay').css('display','none');
				}
			}
		});
			}

		}
	});
	update = setTimeout(function () { remove_order(type) }, 60000);
}

function orderPacked(id)
{

//console.log( 'id', id );


	jQuery.ajax({ // Ajax Start
		type:'PRINT',
		async: true,
		cache: false,
		dataType: 'text',
		url: '<?php echo $path;?>orders/packed/' + id,
		success: function(response)
		{

//console.log( response );

			if( response == 'Order Packed.' ) {
				$('.order_div_' + id).addClass('packed_or_ready');
			}

			return false;
		}
	});

	return false;

}



function orderReady(id)
{

//console.log( 'id', id );

	jQuery.ajax({ // Ajax Start
		type:'PRINT',
		async: true,
		cache: false,
		dataType: 'text',
		url: '<?php echo $path;?>orders/ready/' + id,
		success: function(response)
		{

//console.log( response );

			if( response == 'Order Ready.' ) {
				$('.order_div_' + id).addClass('packed_or_ready');
				$('.order_div_'+id).remove();
			}

			return false;
		}
	});

	return false;

}



function orderDelivered(id)
{

	jQuery.ajax({ // Ajax Start
		type:'PRINT',
		async: true,
		cache: false,
		dataType: 'text',
		url: '<?php echo $path;?>orders/order_delivered/' + id,
		success: function(response)
		{

			if( response == 'Order Delivered.' ) {
				$('.order_div_' + id).addClass('packing_delivered');
				$('.order_div_'+id).remove();
			}

			return false;
		}
	});


	return false;

}


$( document ).ready(function() {

	setTimeout(function () {
		getneworder();
		updateorder();
		remove_order();

	}, 30000);

	setTimeout(function () {

		remove_order(1);
	}, 10000);

	var allVals = [];
	$('.hidden_id').each(function() {
		allVals.push($(this).val());
	});
	if(allVals.length == 0)
	{
		return ;
	}

	var wdt = ($(".col-md-4").css("width"));
	d = parseInt(wdt.replace("px", ""));
	$(".col-md-4 ").css("width",(d-1)+"px");
	$(".col-md-4 .x_panel").css("width",($(".col-md-4 .x_panel").css("width")));


});


</script>
<div id="dialog-alert" title="Complete Order" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span><span id="spantext">Are you sure, you want to cencel this item?</span></p>
</div>
<div id="dialog-confirm" title="Cencel Item" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span> Are you sure, you want to cencel this item?</p>
</div>
<div id="dialog-confirm_bill" title="Get Bill" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span> Are you sure, you want to generate bill for this order?</p>
</div>
<div id="dialog-bill_request" title="Bill Request" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span> User Ask for Bill for Cash Payment</p>
</div>
<div id="dialog-bill_request2" title="Bill Request" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span> Payment Received?</p>
</div>
<div id="dialog-response" title="Cencel Item" style="display:none" ></div>

