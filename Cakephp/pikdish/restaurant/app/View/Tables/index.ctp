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
 @page {
    margin: 5pt 290pt;
  }
</style>
<div class="right_col" role="main">

<div class="x_panel" >
 <div class="table-responsive">
 <table id="list"></table>
 <table id="pager"></table>
 </div>
</div>
<div class="clearfix">
  <p>- Ctrl + A for Add New Tables</p>
</div>


<script>
var lastsel2 = 0;
jQuery().ready(function (){

var mygrid = jQuery("#list").jqGrid({
	url:'<?php echo $path ?>tables/getTables',
	datatype: "json",
   	colNames:['Internal Code','Table number','no_of_seat','Bar code'],
   	colModel:
	[
	    {name:'internal_code',index:'RestaurantTables.cust_table_internal_code', width:300,stype:'text'},
   		{name:"table_number",index:"RestaurantTables.table_number", width:275,stype:'text'},
		{name:'no_of_seat',index:'RestaurantTables.no_of_seat', width:225,stype:'text'},
		{name:'barcode',index:'Restaurants.bar_code_data',stype:'label',width:225, editable:false,stype:'label' ,search:false}
	],
	onSelectRow:function check(id)
	{
	 if(id !== lastsel2){lastsel2 = id}
	},
	ondblClickRow: function check(id)
	{
	  window.location.href="<?=$path?>tables/edit/id/"+lastsel2;
	},
	rowNum:20,
   	width:1096,
    rowList:[10,20,50,100,200,300,400,500,1000],
   	pager: '#pager',
   	sortname: "RestaurantTables.id",
    viewrecords: true,
    sortorder: "asc",
	height:400,
	rownumbers: true,
	rownumWidth: 50,
	shrinkToFit: true,
	editurl: "<?=$path?>tables/delete",
	caption:"<?=ucwords($restro_info['Restaurant']['restaurant_name'])?> Restaurant's Table List"



});

jQuery("#list").jqGrid('navGrid','#pager',{edit:false,add:false,del:false,view:false,search:false,refresh:false});
jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Add",title:"Add New Tables", buttonicon :'ui-icon-plus',
 onClickButton:function(){
	window.location.href="<?php echo $path ?>tables/add"
}
});

jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Edit",title:"Edit Table", buttonicon :'ui-icon-pencil',
 onClickButton:function(){
	 var gr = jQuery("#list").jqGrid('getGridParam','selrow');
	 if(gr)
	 {
	  window.location.href="<?php echo $path ?>tables/edit/id/"+gr;
	 }
	 else
	 {
		$( "#dialog-alert" ).dialog({
											height:90,
											model:false,
											resizable:false

											}
										);
	 }
}
});
jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Delete",title:"Delete Table", buttonicon :'ui-icon-trash',
 onClickButton:function(){
	    var gr = jQuery("#list").jqGrid('getGridParam','selrow');

	    if(gr)
		{
	    $( "#dialog-confirm" ).css("display",'block')
		$( "#dialog-confirm" ).dialog({
			resizable: false,
			height:200,
			modal: true,
			buttons: {
				"Delete Table": function() {
					$( this ).dialog( "close" );
					jQuery.ajax({
                                    type:'DELETE',
                                    async: true,
                                    cache: false,
                                    dataType: 'json',
                                    url: '<?php echo $path;?>/tables/delete/' + gr ,
                                    success: function(response) {
										jQuery("#list").trigger("reloadGrid");
										$('.ui-widget-overlay').css('display','none');
										$( "#dialog-response" ).html(response.message);
                                        $( "#dialog-response" ).dialog({
											height:150,
											model:false,
											resizable:false

											}
										);
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
	 else
	 {
		$( "#dialog-alert" ).dialog({
											height:90,
											model:false,
											resizable:false

											}
										);
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

})

shortcut.add("Ctrl+A",function() {
	window.location.href='<?php echo $path ?>tables/add';

});


    </script>
<div id="dialog-confirm" title="Delete Table" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This table will be permanently deleted and cannot be recovered. Are you sure?</p>
</div>
<div id="dialog-alert" title="Warning" style="display:none" >Please, select row! </div>
<div id="dialog-response" title="Delete Table" style="display:none" ></div>
	<?php echo ($this->Js->writeBuffer());?>


<style type="text/css">
#hi table tr td {
	font-family: Verdana, Geneva, sans-serif;
}
#hi table tr td u {
	font-family: Lucida Sans Unicode, Lucida Grande, sans-serif;
}
</style>
   <div id ="hi" style="display:none; width:333px; padding:15px 15px 15px 15px; border:1px solid #000;">
   <table  style="width:300px; height:400px; text-align:center; vertical-align:middle; ">
     <tr>
      <td style="height:100px; font-size:42px; color:#06F; width:100%" ><strong>PikDish</strong></td>
     </tr>
     <tr >
      <td style="height:50px; font-size:24px; color:#999; width:100%; font-family:Arial, Helvetica, sans-serif; text-shadow:2px 2px 8px #CCC " ><u id="restro_name">AppleAday</u></td>
     </tr>
     <tr>
      <td style="height:200px; font-size:12px;  width:100%" >
        <table style="width:100%; height:100%">
           <tr style="height:7%">
             <td style="border-top: 2px solid #000;border-left:2px #000 solid; width:10%">&nbsp;</td>
             <td style="width:80%; text-align:center" >Scan it...</td>
             <td style="border-top: 2px solid #000;border-right:2px #000 solid; width:10%">&nbsp;</td>
           </tr>
           <tr>
             <td colspan="3" id="qr_code"><img style="width:100%" src=""></td>
           </tr>
           <tr>
             <td style="border-bottom: 2px solid #000;border-left:2px #000 solid; width:10%">&nbsp;</td>
             <td style="width:80%"></td>
             <td style="border-bottom: 2px solid #000;border-right:2px #000 solid; width:10%">&nbsp;</td>
           </tr>
         </table>

      </td>
     </tr>
     <tr>
      <td style="height:20px; font-size:10px; color:#000; width:100%" >Power By Winspirationtech</td>
     </tr>

   </table>
   </div>
  <script>
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
function print_div(id)
{
	$('.print_table'+id).print();
}
 </script>