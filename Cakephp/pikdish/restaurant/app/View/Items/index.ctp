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
</style>
<div class="right_col" role="main">

<div class="x_panel" >
<ol class="breadcrumb">
  <li><a href="<?php echo $path ?>">Home</a></li>
  <li><a href="<?php echo $path ?>categories" ><?=ucwords($cat_name)?></a></li>
  <li  class="active"><a href="#" >Items</a></li>
</ol>
 <div class="table-responsive">
 <table id="list"></table>	 
 <table id="pager"></table>	 
 </div> 
</div>
<div class="clearfix">
  <p>- Ctrl + B for Back</p>
  <p>- Ctrl + A for Add New Itemss</p>
</div>
  

<script>
var lastsel2 = 0;
jQuery().ready(function (){

var mygrid = jQuery("#list").jqGrid({
	url:'<?php echo $path ?>items/getJson/cat_id/<?=$this->Session->read("cat_id")?>',
	datatype: "json",
   	colNames:['Item Name','Ingredients','Preparation Time'],
   	colModel:
	[
	    {name:'item_name',index:'Item.item_name', width:300,stype:'text'},
   		{name:"ingredients",index:"Item.ingredients", width:475,stype:'text'},
		{name:'preparation_time',index:'Item.preparation_time', width:260,stype:'text',searchoptions:{
	       dataInit:function(el){
			   
                $(el).timepicker({
                        onSelect: function(dateText, inst){ $("#list")[0].triggerToolbar(); }
                }
			  );
        }
	   }}
	],
	onSelectRow:function check(id)
	{
	 if(id !== lastsel2){lastsel2 = id}
	},
	ondblClickRow: function check(id)
	{
	  window.location.href="<?=$path?>items/edit/id/"+lastsel2;
	},
	rowNum:20,
   	width:1096,
    rowList:[10,20,50,100,200,300,400,500,1000],
   	pager: '#pager',
   	sortname: "Item.item_name",
    viewrecords: true,
    sortorder: "asc",
	height:400,
	rownumbers: true,
	rownumWidth: 50,
	shrinkToFit: true,
	editurl: "<?=$path?>items/delete",
	caption:"Category <?=ucwords($cat_name)?>'s Item List"

	

});

jQuery("#list").jqGrid('navGrid','#pager',{edit:false,add:false,del:false,view:false,search:false,refresh:false});
jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Add",title:"Add New Tables", buttonicon :'ui-icon-plus',
 onClickButton:function(){
	window.location.href="<?php echo $path ?>items/add"
} 
});

jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Edit",title:"Edit Table", buttonicon :'ui-icon-pencil',
 onClickButton:function(){
	 var gr = jQuery("#list").jqGrid('getGridParam','selrow');
	 if(gr)
	 {
	  window.location.href="<?php echo $path ?>items/edit/id/"+gr;
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
				"Delete Item": function() {
					$( this ).dialog( "close" );
					jQuery.ajax({
                                    type:'DELETE',
                                    async: true,
                                    cache: false,
                                    dataType: 'json',
                                    url: '<?php echo $path;?>/items/delete/' + gr ,
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
	window.location.href='<?php echo $path ?>items/add';

});
shortcut.add("Ctrl+B",function() {
	window.location.href='<?php echo $path ?>categories';

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
	<?php echo ($this->Js->writeBuffer());?>
	
    
