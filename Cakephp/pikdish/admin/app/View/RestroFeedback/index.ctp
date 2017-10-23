<?php 
 $this->assign('title', 'Restaurant');

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
</style>
<div class="right_col" role="main">

<div class="x_panel" >
 <div class="table-responsive">
 <table id="list"></table>	 
 <table id="pager"></table>	 
 </div>
</div>
  

<script>
var lastsel2 = 0;
jQuery().ready(function (){

var mygrid = jQuery("#list").jqGrid({
	url:'<?php echo $path ?>Restro_Feedback/getJson',
	datatype: "json",
   	colNames:['Restaurant Name','Average Rating','Action'],
   	colModel:
	[
   		{name:"restaurant_name",index:"Restaurant.restaurant_name", width:225,stype:'text'},
		{name:'rating',index:'Feedbacks.rating', width:100,stype:'number'},
		{name:'action',index:'action',stype:'label',width:250,search:false}
	],
	
	onSelectRow:function check(id)
	{
	 if(id !== lastsel2){lastsel2 = id}
	},
	ondblClickRow: function check(id)
	{
	  window.location.href="<?=$path?>Restro_Feedback/v_feeds/"+lastsel2;
	},
	rowNum:20,
   	width:1096,
    rowList:[10,20,50,100,200,300,400,500,1000],
   	pager: '#pager',
   	sortname: "Restaurant.restaurant_name",
    viewrecords: true,
    sortorder: "asc",
	height:400,
	rownumbers: true,
	rownumWidth: 40,
	shrinkToFit: true,
	caption:"Restaurant Rating",
	loadComplete: function() 
	{}

});

jQuery("#list").jqGrid('navGrid','#pager',{edit:false,add:false,del:false,view:false,search:false,refresh:false});
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
$(document).ready(function()
{
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
	
	      
		 
    	 $("#gs_rating").attr({"min":0,"max":5}).change(function(){
		     $("#list")[0].triggerToolbar()		 
		 });
	
});

</script>
	<?php echo ($this->Js->writeBuffer());?>