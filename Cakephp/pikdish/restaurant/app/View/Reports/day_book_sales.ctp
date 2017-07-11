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

 /*@media print {
      body{
          font-size: 10px;
      }

      .breadcrumb{display: none;}
      /*.ui-widget-content.ui-corner-all{display: none;}*/
      /*.row.filter-date{display: none;}
      .ui-search-table{display: none;}
      .ui-pg-table.ui-common-table.ui-pager-table{display: none;} 
      .export-print-btn{display: none;}
      #pager{display: none;}

  }*/

  @media print {
    #list {
        background-color: white;
        height: 100%;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        padding: 15px;
        font-size: 14px;
        line-height: 18px;
    }
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
			<button onclick="window.location.href='<?php echo Router::url(array('controller'=>'Reports', 'action'=>'exportBookSale'))?>'">Export to Excel</button>
		</div>
		<div class="print">
			<a href="#" target="_blank"  onClick="window.print()"><span class="glyphicon glyphicon-print"></span></a>
		</div>
	</div>
	<div class="clearfix" style="padding-bottom: 10px; "></div>
	
<!-- <button id="print-me">Print me</button> -->
<button class="Button Button--outline" id="print-me">Print</button>
<div id="printableTable">
 <table id="list"></table>
  <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>	
</div> 
 <table id="pager"></table>	 
 </div> 
</div>  

<script>
var lastsel2 = 0;
jQuery(document).ready(function (){

var mygrid = jQuery("#list").jqGrid({
	url:'<?php echo $path ?>reports/jsonBookSale?>',
	datatype: "json",
   	colNames:['Order Date','Order No','Invoice No','Invoice Date', 'Username','Total Amt','Tax Amt','Bill Amt',],
   	colModel:
	[
	    {name:'order_date',index:'OrdersH.entry_date', width:150,stype:'text'},
	    {name:'order_no',index:'OrdersH.order_no', width:100,stype:'text'},
   		{name:"invoice_no",index:"OrdersH.inv_no", width:100,stype:'text'},
   		{name:"invoice_date",index:"OrdersH.inv_date", width:100,stype:'text'},
   		{name:"username",index:"User.name", width:100,stype:'text'},
   		{name:"total_amt",index:"OrdersH.total_amt", width:150,stype:'text'},
   		{name:"tax_amt",index:"OrdersH.vat_cgst", width:150,stype:'text'},
   		{name:"bill_amt",index:"OrdersH.total_amt", width:150,stype:'text'}
	],
	onSelectRow:function check(id)
	{
	 if(id !== lastsel2){lastsel2 = id}
	},
	rowNum:10,
	rowList:[10,25,50,100,200,300,400,500,1000],
   	width:1096,
   	pager: '#pager',
   	sortname: "OrdersH.id",
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

		jQuery("#list").jqGrid('setGridParam',{url:"<?php echo $path ?>reports/jsonBookSale?start_date="+start_date+"&end_date="+end_date,page:1}).trigger("reloadGrid");
		
	});

	

});

$(document).ready(function() {

	function printDiv() {
	        window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
	        window.frames["print_frame"].window.focus();
	        window.frames["print_frame"].window.print();
	      }


	 $('#print-me').on('click',function(){
	 	printDiv();
	 });

});

$(document).ready(function() {
	


} );


</script>
<div id="dialog" title="Error" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span></p>
</div>
<div id="dialog-alert" title="Warning" style="display:none" >Please, select row! </div>
<div id="dialog-response" title="Delete Item" style="display:none" ></div>
	<?php echo ($this->Js->writeBuffer());?>
	
    
