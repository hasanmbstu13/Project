<? echo $this->Html->script($path.'/js/print/jQuery.print.js'); ?>
<style>

.right_col
{
	padding-right:10px  !important;
	padding-left:10px  !important;
}

 .x_panel
 {
	 padding:0px 0px !important;
	 border-radius:3px ;


 }
 .sidebar-footer
 {
	 padding-top:25px !important
 }

 @page {
    margin: 5pt 208pt;
  }
  .table>tbody+tbody
{
	border-top:0px solid #ddd !important;

}
.table .ui-state-default,.ui-dialog-buttonset>button:last-child,.jqgrow >td:last-child .ui-state-default
{
	background-color: #d43f3a !important;
    border-color: #d43f3a !important;
	background-image:none !important;
	color:#ffffff !important;
}
.table .ui-state-active,.ui-dialog-buttonset>button:first-child,.jqgrow >td:last-child .ui-state-active
{
	background-color: #5cb85c !important;
    border-color: #4cae4c  !important;
	background-image:none !important;
	color:#ffffff !important;

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
.ui-icon
{
	display:inline-block !important;
	cursor:pointer;

}
.ui-icon-trash {

    background-position: -180px -94px;
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
.blink {
  animation-duration: 2000ms;
  animation-name: blink;
  animation-iteration-count: infinite;
  animation-direction: alternate;
  font-size:15px;
  text-shadow: 1px 1px 7px;
  float:right;
}
.ui-jqgrid .btn
{
	font-size:12px !important;
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
.table-responsive
{
	border:0px
}
.glyphicon
{
	cursor:pointer
}
button.dropdown-toggle
{
	border-radius:5px;
}
.i {
    /*color: #666 !important;
    background-color: #5bc0de !important;*/
	color: #31708f;
    background-color: #d9edf7;
	background-image:none  ;

}
.i:hover{
   /* color: #fff !important;
    background-color: #31b0d5 !important;*/
    background-image:none ;
    color: #31708f;
    background-color: #c4e3f3
}
.w{

    /*color:  #666;
    background-color: #FFA4A4 !important;*/
	background-image:none ;
	    color: #a94442;
    background-color: #f2dede;

}
.w:hover{
   /* color: #fff !important;
    background-color: #FFA9A9!important;*/
    background-image:none ;
	color: #a94442;
    background-color: #ebcccc
}
.p{
    /*color: #666 !important;
    background-color: #BADC98 !important;*/
	background-image:none ;
	color: #3c763d;
    background-color: #dff0d8

}
.p:hover{
  /*  color: #fff !important;
    background-color: #BADdA8 !important;*/
    background-image:none ;
	color: #3c763d;
    background-color: #d0e9c6

}

.ui-state-highlight {
    border: 1px solid #ddd !important;
	background-image:none !important;
	/*background-color:#CCC !important;
    color: #000 !important;*/
	color: #8a6d3b !important;
    background-color: #fcf8e3 !important ;
}
.ui-state-highlight:hover {
    border: 1px solid #ddd !important;
	background-image:none !important;
	/*background-color:#CCC !important;
    color: #000 !important;*/
	color: #8a6d3b !important;
    background-color: #faf2cc !important ;
}

.page-navigation {
	width: 160px;
	float: right;
}
</style>
<div class="right_col" role="main">
<div id="dialog-info" title="Alert" style="display:none" >Nothing to print...</div>
<div id="dialog-alert" title="Warning" style="display:none" >Please, select row! </div>
<div class="x_panel" >
<div class="page-title">
                        <div class="title_left" style="width:40%; margin-left:5px;">
<?php /*  ?>
                           <div class="btn-group " role="group" >
                              <button type="button" style="border-top-left-radius:5px;border-bottom-left-radius:5px" class="btn btn-success btn-lg " onclick="done(0,-1)" >On Table</button>
                              <div class="btn-group" style="width:162px">
                              <button type="button" style="width:125px" class="btn btn-primary btn-lg col-xs-3" onclick="dialog_print(-2,-2)">Print</button>
                              <button type="button" id="dropdownMenu1" class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu btn-lg" aria-labelledby="dropdownMenu1">
                                <li><a href="javascript:void(0)" onclick="dialog_print(-2,-2)">Print All</a></li>
                                <li><a href="javascript:void(0)" onclick="print_selected()">Print Selected</a></li>
                                <li><a href="javascript:void(0)" onclick="dialog_print(-1,1)">Print Order</a></li>
                                <li><a href="javascript:void(0)" onclick="dialog_bill(-1,1)">Print Bill</a></li>

                              </ul>
                            </div>
                            </div>
<?php /* */ ?>
                            <button type="button" style="border-top-left-radius:5px;border-bottom-left-radius:5px" class="btn btn-success btn-lg " onclick="print_selected()" >Confirm & KOT</button>

                            <button type="button" style="border-top-left-radius:5px;border-bottom-left-radius:5px" class="btn btn-danger btn-lg " onclick="done(0,-1)" >On Table</button>



                        </div>
                        <div class="title_right table-responsive" style="float:right; text-align:right; margin-right:5px">

                            <button type="button" style="border-top-left-radius:5px;border-bottom-left-radius:5px" class="btn btn-success btn-lg " onclick="packed_selected()" >Packed</button>

                            <button type="button" style="border-top-left-radius:5px;border-bottom-left-radius:5px" class="btn btn-success btn-lg " onclick="ready_selected()" >Ready</button>

                                      <nav aria-label="Page navigation" class="page-navigation">
                                          <ul class="pagination pagination-lg" >
                                            <li ><a href="<?=$path?>orders"><span class="glyphicon glyphicon glyphicon-th-large" aria-hidden="true"></span></a></li>
                                            <li class="active"><a href="#"><span class="glyphicon glyphicon glyphicon-th-list" aria-hidden="true"></span></a></li>
                                          </ul>
                                        </nav>

                        </div>
</div>
<div class="clearfix"></div>
<div class="table-responsive">
 <table id="list"></table>
 <table id="pager"></table>
 </div>

</div>

<script>
var lastsel2 = 0;
jQuery().ready(function (){
var mygrid = jQuery("#list").jqGrid({
	url:'<?php echo $path ?>orders/getJson',
	datatype: "json",
   	colNames:['','Order No','Item Name','Qty','Order Type','Table','Customer Name','Time','Action'],
   	colModel:
	[
	    {name:'action',index:'Action',stype:'label',width:80, editable:false,stype:'button',search:true },
	    {name:'order_no',index:'OrdersH.order_no', width:90,stype:'text'},
	    {name:'item_name',index:'OrdersL.item_name', width:100,stype:'text'},
		{name:'qty',index:'OrdersL.qty', width:50,stype:'number'},
		{name:'order_type',index:'OrdersH.order_type', width:50,stype:'select', align:'left',searchoptions:{value:":;0:Packing;1:Pre Order;2:Table Order"},width:100},
		{name:'table_number',index:'RestaurantTables.table_number', width:45,stype:'text'},
		{name:'name',index:'User.name', width:120,stype:'text'},
		{name:'entry_date',index:'OrdersL.entry_date_time', width:55,stype:'label',search:false},
   		{name:'action',index:'Action',stype:'label',width:300, editable:false,stype:'label' ,search:false}
	],
	onSelectRow:function check(id)
	{

	 tmp = id.split('_');
	 //j = document.getElementById(id).getElementsByTagName("button")[0]

	 //change(j,tmp[1]);
	 id = tmp[0];
	 if(id !== lastsel2){lastsel2 = id}
	},
	ondblClickRow: function check(id)
	{

	  dialog_display(lastsel2);

	},
	rowNum:50,
    width:1196,
    rowList:[10,20,50,100,200,300,400,500,1000],
   	pager: '#pager',
   	sortname: "OrdersH.entry_date",
    viewrecords: true,
    sortorder: "desc",
	height:400,
	rownumbers: true,
	shrinkToFit: true,
	caption:"Current Orders",
	loadComplete: function() {
         //alert('dsds');
		 $("#list input[type=checkbox]").button();
		 td = $("#gs_action").parent().css("padding-top",'3px');

		 td.html("<button type='button' id='gs_action' onclick='selectAll()' class='btn btn-default' aria-label='Justify' ><span class=' glyphicon glyphicon-unchecked'  aria-hidden='true'></span> Select All </button>");
		 $("#gsh_list_action .ui-search-clear").remove();

		  $('.print').each(function() {
		   $("#"+$(this).val()).addClass("w");
		  });
		 $('.processed').each(function() {
		   $("#"+$(this).val()).addClass("p");
		  });
		  $('.none').each(function() {
		   $("#"+$(this).val()).addClass("i");
		  });

     }



});

jQuery("#list").jqGrid('navGrid','#pager',{edit:false,add:false,del:false,view:false,search:false,refresh:false});

jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Print Bill",title:"Print Bill", buttonicon :'ui-icon-print',
 onClickButton:function(){


	 var gr = jQuery("#list").jqGrid('getGridParam','selrow');

	 if(gr)
	 {
		 tmp = gr.split('_');
	     gr = tmp[0]
		 dialog_bill(gr);
	 }
	 else
	 {
		$( "#dialog-alert" ).dialog({
											height:90,
											model:false,
											resizable:false

											});
		setTimeout(function(){$( "#dialog-alert" ).dialog("close");},2000);
	 }

}
});

jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Print Order",title:"Print Order", buttonicon :'ui-icon-print',
 onClickButton:function()
 {
	 var gr = jQuery("#list").jqGrid('getGridParam','selrow');

	 if(gr)
	 {
		 tmp = gr.split('_');
	     gr = tmp[0]
	    dialog_print(gr,1);
	 }
	 else
	 {
		$( "#dialog-alert" ).dialog({
											height:90,
											model:false,
											resizable:false

											});
   setTimeout(function(){$( "#dialog-alert" ).dialog("close");},2000);
	 }
}
});
jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Get Details",title:"Get Details", buttonicon :'ui-icon-document',
 onClickButton:function()
 {
	    var gr = jQuery("#list").jqGrid('getGridParam','selrow');

	    if(gr)
		{
			tmp = gr.split('_');
	        gr = tmp[0]
			dialog_display(gr);
		}
	    else
	    {
		                     $( "#dialog-alert" ).dialog({
											height:90,
											model:false,
											resizable:false

											});
			setTimeout(function(){$( "#dialog-alert" ).dialog("close");},2000);

	    }
   }
});

jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Toggle",title:"Toggle Search Toolbar", buttonicon :'ui-icon-pin-s',
 onClickButton:function(){
	mygrid[0].toggleToolbar()
}
});
jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Clear",title:"Clear Search",buttonicon :'ui-icon-refresh',
	onClickButton:function(){

	mygrid[0].clearToolbar()
}
});
jQuery("#list").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
jQuery("#list").jqGrid('sortableRows');

});


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

function dialog_print(id,type = 0,extra = 0)
 {
	if(id == -1 )
	{
	 var gr = jQuery("#list").jqGrid('getGridParam','selrow');
	 if(gr)
	 {
		 tmp = gr.split('_');
	     id = tmp[0]
	 }
	 else if(id != -2)
	 {
		$( "#dialog-alert" ).dialog({
		height:90,
		model:false,
		resizable:false

		});
		setTimeout(function(){$( "#dialog-alert" ).dialog("close");},2000);
		return;
	 }

	}

	jQuery.ajax({ // Ajax Start
	type:'PRINT',
	async: true,
	cache: false,
	dataType: 'text',
	url: '<?php echo $path;?>/orders/getPrint/' + id+'/'+type ,
	success: function(response)
	 {
		//alert(response);
	  if(type != -2)
	  {
	   if(type == 0 || type == 1)
	   {
	     $( ".print_td_"+id ).attr( "disabled",false).removeClass("print_td_"+id).button().button("enable");
	     $(".blink_"+id).remove();
	     ontable_show(id);
	    }
	   else if(type == -1 )
	   {
		  allVals = id.split(",")  ;
		 for(i=0;i<allVals.length ; i++)
		 {
			 if(extra == 1)
			 {
		      change(document.getElementById('button_'+allVals[i]),allVals[i]);
			 }
			 if($( "#gridcheck_"+allVals[i] ).is('[class^="print_td"]') /*hasClass("print_td_")*/)
			 {
		         tmp = $( "#gridcheck_"+allVals[i] ).attr( {"disabled":false,"class":""}).addClass("ui-helper-hidden-accessible");
				 tmp.button().button("enable");
				 $(".element_"+allVals[i]).remove();
			 }
		 }
		 jQuery("#list").jqGrid()[0].clearToolbar();
	    }
	  }
	  else
	  {
		if(response == 0)
		{

			$( "#dialog-info" ).dialog({
											height:90,
											model:false,
											resizable:false

											});
			setTimeout(function(){$( "#dialog-info" ).dialog("close");},2000);
			return;

		}
		//$( ".print_td_"+id ).attr( "disabled",false).removeClass("print_td").button().button("enable");
	    //$(".blink_"+id).remove();
		$("#list")[0].triggerToolbar();
	  }
	  $("#printable").html(response).css('display','block').print();
	  $("#printable").html("").css('display','none');

	  return false;
	 }
   }); //Ajax End


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
function dialog_bill(id)
{
	if(id == -1)
	{
	 var gr = jQuery("#list").jqGrid('getGridParam','selrow');
	 if(gr)
	 {
		 tmp = gr.split('_');
	     id = tmp[0]
	 }
	 else
	 {
		$( "#dialog-alert" ).dialog({
		height:90,
		model:false,
		resizable:false

		});
		setTimeout(function(){$( "#dialog-alert" ).dialog("close");},2000);
		return;
	 }
	}


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
						 $("#list")[0].triggerToolbar();
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

}
function print_single(id)
{
	dialog_print(String(id),-1)
}
function print_selected()
{
	var allVals = [];

     $('#list .hidden_checkbox').each(function() {
		 if($(this).val()!=="")
		 {
           allVals.push($(this).val());
		 }

     });
	 if(allVals.length == 0)
	 {

		 $( "#dialog-alert" ).dialog({
											height:90,
											model:false,
											resizable:false

											});
		setTimeout(function(){$( "#dialog-alert" ).dialog("close");},2000);
						return;
	 }
	 else
	 {
		 dialog_print(String(allVals),-1,1)



	 }



}

function done(id=0,type = 0)
{

	var allVals = [];
	if(type == 0 || type == -1)
	{
     $('#list .hidden_checkbox').each(function() {
     	if($(this).val()) {
      	allVals.push($(this).val());
    	}
     });
	} else {
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
	  $( "#dialog-alert" ).dialog({
											height:90,
											model:false,
											resizable:false

											});
		setTimeout(function(){$( "#dialog-alert" ).dialog("close");},2000);
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
			   $( ".tr_"+allVals[i]+" input[type=checkbox]" ).attr( "disabled","disabled" );
			   $( ".tr_"+allVals[i]+" input[type=checkbox]" ).button().button("disable");
			   $( ".tr_"+allVals[i]+" label" ).addClass("ui-state-active");

			   $(".tr_"+allVals[i]+" .ui-icon-trash").remove();

			   $("#gridcheck_"+allVals[i]).attr( "disabled","disabled" ).addClass("ui-state-active");
			   $("#gridcheck_"+allVals[i]).button().button("disable");
			   $(".gridcheck_"+allVals[i]).addClass("ui-state-active");


		   }
		   if(r[0] == 0)
		   {
			 $(".ontable_"+id).css({"display":"none"});
		   }
		   if(type==-1)
		   {
			   $("#list")[0].triggerToolbar();
		   }

		}

	 }
     });
	 if(type == 0)
	 {
	  $( "#delivered").dialog("close");
	 }

}

function cancel_order(id,d=0)
{
	if(id == 0)
	{
	  $("#dialog").html("This Item is already processed.");
	  $( "#dialog-response_"+key+" input[type=checkbox]" ).button();
      $( "#dialog-response_"+key).dialog({

											height:'auto',
											width:'45%',
											model:false,
											resizable:false,



	   });
	}
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

										$("#list")[0].triggerToolbar();
										$(".tr_"+id).remove();
										$( "#dialog-response" ).html("Item has been successfully cancelled");
                                        $( "#dialog-response" ).dialog({
											height:150,
											model:false,
											resizable:false

											});
										u = setTimeout(function () { $("#dialog-response").dialog( "close" ); }, 5000);
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

function getUpdates()
{
	$("#list")[0].triggerToolbar();
	update = setTimeout(function () { getUpdates() }, 60000);

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

			 js = response.split(",");
			 id = js[0];
			 table_name = $("tr[id*='"+id+"_']  td[aria-describedby='list_table_number']").html();
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
			 $( "#dialog-remove" ).dialog({
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


						 $("#list")[0].triggerToolbar();
						 $("#printable").html(response).css('display','block').print();
						 $("#printable").html("").css('display','none');

					  return false;
					 }
				   }); //Ajax End
				},
				Cancel: function() {
					if(!type)
					{
					 $("#list")[0].triggerToolbar();
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


$(document).ready(function()
{
	     $("#gs_qty").change(function(){
			  $("#list")[0].triggerToolbar();
			 });
		table_width = parseInt($(".x_panel").css("width").replace('px',''));
		if(table_width >= 1000)
		{
		  $("#menu_toggle").click(function(){
			 $("#list").setGridWidth($(".x_panel").css("width").replace('px','')-4);
		  });

		}
		else
		{
			$("#list").setGridWidth(1096);
		}
		update = setTimeout(function () { getUpdates() }, 60000);
		tmp = setTimeout(function () {
		remove_order(0),
		remove_order(1)
		}, 60000);

});

function change(el,id)
{
    f = el.firstChild;

	if($(f).hasClass('glyphicon-unchecked'))
	{
	 $("#check_box_"+id).attr("value",id);
	 $(f).removeClass('glyphicon-unchecked')
	 $(f).addClass('glyphicon-check');
	}
	else
	{
	 $("#check_box_"+id).attr("value","");
     $(f).addClass('glyphicon-unchecked')
	 $(f).removeClass('glyphicon-check');
	 $("#gs_action span").addClass('glyphicon-unchecked').removeClass('glyphicon-check');
	}
}
function selectAll()
{

	//b = $("#gs_action");

	f = document.getElementById("gs_action").firstChild;
	var allRowsInGrid = $(".ui-sortable tr[role='row']");

	if($(f).hasClass('glyphicon-unchecked'))
	{
	 for(i=1;i<allRowsInGrid.length;i++)
	 {
	  id = $(allRowsInGrid[i]).attr('id');
	  id = id.split('_');
	  $("#button_"+id[1]+" span").removeClass('glyphicon-unchecked').addClass('glyphicon-check');
	  $("#check_box_"+id[1]).attr("value",id[1]);
	 }
	 $(f).removeClass('glyphicon-unchecked')
	 $(f).addClass('glyphicon-check');
	}
	else
	{
	 for(i=1;i<allRowsInGrid.length;i++)
	 {
	  id = $(allRowsInGrid[i]).attr('id');
	  id = id.split('_');
	  $("#button_"+id[1]+" span").addClass('glyphicon-unchecked').removeClass('glyphicon-check');
	  $("#check_box_"+id[1]).attr("value","");
	 }
     $(f).addClass('glyphicon-unchecked')
	 $(f).removeClass('glyphicon-check');
	}

}


function bill_request(id, itemId)
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
			//$('.order_div_' + id).addClass('bill_request2');
			$('#print-bill-'+itemId).addClass('hide');
			$('#payment-recieved-'+itemId).removeClass('hide');
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

			//$('.order_div_' + id).remove();
			jQuery("#list").jqGrid()[0].clearToolbar();

			return false;
		}
  }); //Ajax End

}

function orderPacked(id, itemId)
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
				$('#order-packed-'+itemId).addClass('hide');
				$('#order-delivered-'+itemId).removeClass('hide');
			}

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
				jQuery("#list").jqGrid()[0].clearToolbar();
			}

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
				jQuery("#list").jqGrid()[0].clearToolbar();
			}

		}
	});


	return false;

}


function packed_selected()
{
	var itemsIds = [];

  $('#list .hidden_checkbox').each(function() {
	 if( $(this).val() !== "" ) {
      itemsIds.push($(this).val());
	 }
  });

	if(itemsIds.length > 0) {

		jQuery.ajax({ // Ajax Start
			type:'GET',
			async: true,
			cache: false,
			dataType: 'text',
			url: '<?php echo $path;?>orders/grid_list_packed/' + String(itemsIds),
			success: function(response)
			{
				if( response == 'Order Packed.' ) {
					jQuery("#list").jqGrid()[0].clearToolbar();
				}
			}
		});

 } else {

	$( "#dialog-alert" ).dialog({
		height:90,
		model:false,
		resizable:false
	});
	setTimeout(function(){$( "#dialog-alert" ).dialog("close");},2000);
	return;

 }

}



function ready_selected()
{
	var itemsIds = [];

  $('#list .hidden_checkbox').each(function() {
	 if( $(this).val() !== "" ) {
      itemsIds.push($(this).val());
	 }
  });

	if(itemsIds.length > 0) {

		jQuery.ajax({ // Ajax Start
			type:'GET',
			async: true,
			cache: false,
			dataType: 'text',
			url: '<?php echo $path;?>orders/grid_list_ready/' + String(itemsIds),
			success: function(response)
			{
				if( response == 'Order Ready.' ) {
					jQuery("#list").jqGrid()[0].clearToolbar();
				}
			}
		});

 } else {

	$( "#dialog-alert" ).dialog({
		height:90,
		model:false,
		resizable:false
	});
	setTimeout(function(){$( "#dialog-alert" ).dialog("close");},2000);
	return;

 }

}


</script>
<div id="dialog-remove" title="Complete Order" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span><span id="spantext">Are you sure, you want to cencel this item?</span></p>
</div>
<div id="dialog-confirm" title="Cencel Item" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span> Are you sure, you want to cencel this item?</p>
</div>
<div id="dialog-confirm_bill" title="Get Bill" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span> Are you sure, you want to generate bill for this order?</p>
</div>
<div id="dialog-response" title="Cencel Item" style="display:none" ></div>
<div id="dialog" style="display:none"></div>
<div id="delivered" style="display:none; overflow-x:hidden; width:auto " title="On Table"></div>
<div id="printable" style="width:270px; display:none "></div>
<?php echo ($this->Js->writeBuffer());?>