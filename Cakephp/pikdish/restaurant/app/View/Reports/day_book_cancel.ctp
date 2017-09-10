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
 #StartDate, #EndDate {
 	width: 100% !important;
 }
 .filter-date .control-label{
	margin-top: 8px;
 }

 @media print {
      body{
          font-size: 10px;
      }

      .breadcrumb{display: none;}
      /*.ui-widget-content.ui-corner-all{display: none;}*/
      /*.ui-search-table{display: none;}*/
      .ui-search-toolbar{display: none;}
      .row.filter-date{display: none;}
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
 <div class="table-responsive">
 	<div class="row filter-date">
 		<div class="col-lg-3">
 			<label class="col-sm-4 control-label" for="formGroupInputSmall">Start Date</label>
 			<div class="col-sm-8">
				<input type="date" id="StartDate" name="start_date" class="form-control" placeholder="Start Date">
			</div>
		</div>
		<div class="col-lg-3">
			<label class="col-sm-4 control-label" for="formGroupInputSmall">End Date</label>
			<div class="col-sm-8">
				<input type="date" id="EndDate" name="end_date" class="form-control" placeholder="End Date">
			</div>
		</div>
		<div class="col-lg-2">
			<button class="date-filter btn">Filter</button>
		</div>
		<div class="col-lg-2 export-to-excel">
			<button onclick="window.location.href='<?php echo Router::url(array('controller'=>'Reports', 'action'=>'exportBookCancel'))?>'">Export to Excel</button>
		</div>
		<div class="print">
			<a href="#" target="_blank"  onClick="window.print()"><span class="glyphicon glyphicon-print"></span></a>
		</div>
	</div>
	<div class="clearfix" style="padding-bottom: 10px; "></div>
 <table id="list"></table>	 
 <table id="pager"></table>	 
 </div> 
</div>  

<script>
var lastsel2 = 0;
jQuery(document).ready(function (){

var mygrid = jQuery("#list").jqGrid({
	url:'<?php echo $path ?>reports/jsonBookCancel?>',
	datatype: "json",
   	colNames:['Order No','Order Date','Item Name','Qty',],
   	colModel:
	[
		{name:'order_no',index:'OrdersL.order_no', width:100,stype:'text'},
	    {name:'order_date',index:'OrdersL.entry_date', width:150,stype:'text'},
   		{name:"total_amt",index:"OrdersL.total_amt", width:150,stype:'text'},
   		{name:"tax_amt",index:"OrdersL.vat_cgst", width:150,stype:'text'},

	],
	onSelectRow:function check(id)
	{
	 if(id !== lastsel2){lastsel2 = id}
	},
	rowNum:10,
	rowList:[10,25,50,100,200,300,400,500,1000],
   	width:1096,
   	pager: '#pager',
   	sortname: "OrdersL.id",
    viewrecords: true,
    sortorder: "desc",
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

		$('.filter-date').on('click','.date-filter',function(){

		start_date = $('#StartDate').val();
		end_date = $('#EndDate').val();
		
		if( start_date == '' ||  end_date == '' ){
			$('#dialog p').append('Please enter start date and end date');
			$( "#dialog" ).dialog();
			return false;
		}

		jQuery("#list").jqGrid('setGridParam',{url:"<?php echo $path ?>reports/jsonBookCancel?start_date="+start_date+"&end_date="+end_date,page:1}).trigger("reloadGrid");
		
	});
});
    </script>
<div id="dialog" title="Error" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span></p>
</div>
<div id="dialog-alert" title="Warning" style="display:none" >Please, select row! </div>
<div id="dialog-response" title="Delete Item" style="display:none" ></div>
	<?php echo ($this->Js->writeBuffer());?>
	
    
