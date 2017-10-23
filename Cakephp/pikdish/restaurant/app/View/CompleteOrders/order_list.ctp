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
.breadcrumb a {
    color: #337ab7 !important;
    text-decoration: none !important;
 }
 .breadcrumb .active a {
    color: #777 !important;
 }
</style>
<div class="right_col" role="main">
<div id="dialog"style="display:none" ></div>
<div id="dialog-alert" title="Warning" style="display:none" >Please, select row! </div>

<div class="x_panel" >
<ol class="breadcrumb">
  <li><a href="<?php echo $path ?>">Home</a></li>
  <li  class="active"><a href="<?php echo $path ?>complete_orders" >Back</a></li>
</ol>
 <div class="table-responsive">
 <table id="list"></table>	 
 <table id="pager"></table>	 
 </div>
 <br /> 

</div>

<script>
var lastsel2 = 0;
jQuery().ready(function (){

var mygrid = jQuery("#list").jqGrid({
	url:'<?php echo $path ?>complete_orders/getJson',
	datatype: "json",
   	colNames:['Customer Name','Order Type','Table','Order Date','Amount','Action'],
   	colModel:
	[
	    {name:'name',index:'OrdersL.name', width:100,stype:'text'},
		{name:'order_type',index:'OrdersH.order_type', width:100,stype:'select', align:'left',searchoptions:{value:":;0:Packing;1:Pre Order;2:Table Order"},width:100},
		{name:'cust_table_internal_code',index:'RestaurantTables.cust_table_internal_code', width:100,stype:'text'},
		{name:'entry_date',index:'OrdersH.entry_date', width:130,stype:'date'},
		{name:'net_amt',index:'OrdersH.net_amt', width:100,stype:'number'},
   		{name:'action',index:'Action',stype:'label',width:180, editable:false,stype:'label' ,search:false}
	],
	onSelectRow:function check(id)
	{
	 if(id !== lastsel2){lastsel2 = id}
	},
	ondblClickRow: function check(id)
	{
	  
	  dialog_display(lastsel2);
	  
	},
	rowNum:<?=$this->Session->read('record_count');	?>,
   	width:1096,
    rowList:[10,20,50,100,200,300,400,500,1000],
   	pager: '#pager',
   	sortname: "OrdersH.entry_date",
    viewrecords: true,
    sortorder: "asc",
	height:400,
	rownumbers: true,
	rownumWidth: 50,
	shrinkToFit: true,
	caption:"Complete Order List <?=$title?>"

	

});

jQuery("#list").jqGrid('navGrid','#pager',{edit:false,add:false,del:false,view:false,search:false,refresh:false});

jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Print Bill",title:"Print Bill", buttonicon :'ui-icon-print',
 onClickButton:function(){
	 
	
	 var gr = jQuery("#list").jqGrid('getGridParam','selrow');
	 if(gr)
	 {
		 dialog_bill(gr);
	 }
	 else
	 {
		$( "#dialog-alert" ).dialog({
											height:90,
											model:false,
											resizable:false
											
											}); 
	 }

} 
});

jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Print Order",title:"Print Order", buttonicon :'ui-icon-print',
 onClickButton:function()
 {
	 var gr = jQuery("#list").jqGrid('getGridParam','selrow');
	 if(gr)
	 {
	    dialog_print(gr);
	 }
	 else
	 {
		$( "#dialog-alert" ).dialog({
											height:90,
											model:false,
											resizable:false
											
											}); 
	 }
} 
});
jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Get Details",title:"Get Details", buttonicon :'ui-icon-document',
 onClickButton:function()
 {
	    var gr = jQuery("#list").jqGrid('getGridParam','selrow');
		
	    if(gr)
		{
			dialog_display(gr);
		}
	    else
	    {
		                     $( "#dialog-alert" ).dialog({
											height:90,
											model:false,
											resizable:false
											
											}); 
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
	url: '<?php echo $path;?>/complete_orders/getDialogBox/' + key,
	success: function(response) 
	 {
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

function dialog_print(id)
{
	jQuery.ajax({ 
	type:'PRINT',
	async: true,
	cache: false,
	dataType: 'text',
	url: '<?php echo $path;?>/orders/getPrint/' + id+'/'+1 ,
	success: function(response) 
	 {
	  $("#dialog").html(response).css('display','block').print();
	  $("#dialog").html("").css('display','none');     
	  return false;
	 } 
   }); 
	 
    
}

function dialog_bill(id)
{
	jQuery.ajax({ 
	type:'PRINT',
	async: true,
	cache: false,
	dataType: 'text',
	url: '<?php echo $path;?>orders/getBill/' + id,
	success: function(response) 
	 {
		 $("#dialog").html(response).css('display','block').print();
	     $("#dialog").html("").css('display','none');     
	     return false;
	 } 
   }); 
}
$(document).ready(function(){
$('#gs_entry_date').change(function() {
	
	$("#list")[0].triggerToolbar();
});	
$('#gs_net_amt').change(function() {
	
	$("#list")[0].triggerToolbar();
});	
$('#gs_net_amt').blur(function() {
	
	$("#list")[0].triggerToolbar();
});	

table_width = parseInt($(".x_panel").css("width").replace('px',''));

if(table_width >= 1000)
{
  $("#menu_toggle").click(function(){
	 $("#list").setGridWidth($(".x_panel").css("width").replace('px','')-4); 
  }); 
  
}else
{
	$("#list").setGridWidth(1096); 
}

	});
	





</script>
<?php echo ($this->Js->writeBuffer());?>