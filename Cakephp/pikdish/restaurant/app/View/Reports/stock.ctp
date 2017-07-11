<?php 
 $this->assign('title', 'Restaurant Tables');
 echo $this->Html->script($path.'/js/print/jQuery.print.js');

?>
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
 
 .breadcrumb a {
    color: #337ab7 !important;
    text-decoration: none !important;
 }
 .breadcrumb .active a {
    color: #777 !important;
 }

 
 @media print {
      body{
          font-size: 10px;
      }

      .breadcrumb{display: none;}
      /*.ui-widget-content.ui-corner-all{display: none;}*/
      /*.ui-search-table{display: none;}*/
      .ui-search-toolbar{display: none;}
      .ui-pg-table.ui-common-table.ui-pager-table{display: none;} 
      .export-print-btn{display: none;}
      #pager{display: none;}

  }

 

</style>
<div class="right_col" role="main">

<div class="x_panel" >
<ol class="breadcrumb">
  <li><a href="<?php echo $path ?>">Home</a></li>
  <li  class="active"><a href="#" >Reports</a></li>
</ol>
 <div class="export-print-btn">
	 <div class="export-to-excel">
	 	<button onclick="window.location.href='<?php echo Router::url(array('controller'=>'Reports', 'action'=>'exportStock'))?>'">Export to Excel</button>
	 </div>

	 <div class="print">
	 	<a href="#" target="_blank"  onClick="window.print()"><span class="glyphicon glyphicon-print"></span></a>
	 </div>
 </div>
 <div class="table-responsive">
 <table id="list"></table>	 
 <table id="pager"></table>	 
 </div> 
</div>  

<script>
var lastsel2 = 0;
jQuery(document).ready(function (){

var mygrid = jQuery("#list").jqGrid({
	url:'<?php echo $path ?>reports/jsonStock?>',
	datatype: "json",
   	colNames:['Name','Opening Quantity','Purchase Quantity','Consumed Quantity', 'Closing Stock'],
   	colModel:
	[
	    {name:'name',index:'Material.name', width:300,stype:'text'},
	    {name:'opening_quantity',index:'Material.op_qty', width:300,stype:'text'},
   		{name:"purchase_quantity",index:"Material.purchase_qty", width:300,stype:'text'},
   		{name:"consumed_quantity",index:"Material.consume_qty", width:100,stype:'text'},
   		{name:"closing_quantity",index:"Material.closing_qty", width:200,stype:'text'},
	],
	onSelectRow:function check(id)
	{
	 if(id !== lastsel2){lastsel2 = id}
	},
	rowNum:10,
	rowList:[10,25,50,100,200,300,400,500,1000],
   	width:1096,
   	pager: '#pager',
   	sortname: "Material.id",
    viewrecords: true,
    sortorder: "asc",
	height:400,
	rownumbers: true,
	rownumWidth: 50,
	shrinkToFit: true,
	caption:"Purchase Register"
}).trigger("reloadGrid");;

jQuery("#list").jqGrid('navGrid','#pager',{edit:false,add:false,del:false,view:false,search:false,refresh:false});



jQuery("#list").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
jQuery("#list").jqGrid('sortableRows');

});


$(document).ready(function(){
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
<div id="dialog-confirm" title="Delete Table" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This item will be permanently deleted and cannot be recovered. Are you sure?</p>
</div>
<div id="dialog-alert" title="Warning" style="display:none" >Please, select row! </div>
<div id="dialog-response" title="Delete Item" style="display:none" ></div>
	<? echo ($this->Js->writeBuffer());?>
	
    
