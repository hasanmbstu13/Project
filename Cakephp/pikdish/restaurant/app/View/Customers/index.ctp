<?php 
 $this->assign('title', 'Customer');
 echo $this->Html->script($path.'js/lightbox/js/lightbox.min.js');
 echo $this->Html->css($path.'js/lightbox/css/lightbox.min.css');
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
 <table id="list"></table>	 
 <table id="pager"></table>	 
</div>
<div class="clearfix">
  <p>- Ctrl + A for Add New Customer</p>
</div>
  

<script>
var lastsel2 = 0;
jQuery().ready(function (){

var mygrid = jQuery("#list").jqGrid({
	url:'<?php echo $path ?>customers/getJson',
	datatype: "json",
   	colNames:['Name','Email','Mobile No.','Status','Customer Image'],
   	colModel:
	[
   		{name:"User.name",index:"User.name", width:250,stype:'text'},
		{name:'email',index:'User.email', width:350,stype:'text'},
		{name:'mobile',index:'User.mobile_no',stype:'text',width:230},
		{name:'status',index:'User.status', width:100, editable:true,stype:'select', align:'left',searchoptions:{value:":;1:Active;0:Inactive"}},
		{name:'manage',index:'manage', width:120, editable:false,stype:'label' ,search:false}
	],
	onSelectRow:function check(id)
	{
	 if(id !== lastsel2){lastsel2 = id}
	},
	ondblClickRow: function check(id)
	{
	  window.location.href="<?=$path?>customers/edit/id/"+lastsel2;
	},
	rowNum:20,
   	width:($(".x_panel").css("width")).replace('px','')-20,
    rowList:[10,20,50,100,200,300,400,500,1000],
   	pager: '#pager',
   	sortname: "User.name",
    viewrecords: true,
    sortorder: "asc",
	height:400,
	rownumbers: true,
	rownumWidth: 40,
	shrinkToFit: false,
	editurl: "<?=$path?>users/delete",
	caption:"Customers List"

	

});

jQuery("#list").jqGrid('navGrid','#pager',{edit:false,add:false,del:false,view:false,search:false,refresh:false});
jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Add",title:"Add New Member", buttonicon :'ui-icon-plus',
 onClickButton:function(){
	window.location.href="<?php echo $path ?>customers/add"
} 
});

jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Edit",title:"Edit Member", buttonicon :'ui-icon-pencil',
 onClickButton:function(){
	 var gr = jQuery("#list").jqGrid('getGridParam','selrow');
	 if(gr)
	 {
	  window.location.href="<?php echo $path ?>customers/edit/id/"+gr;
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
jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Delete",title:"Delete Member", buttonicon :'ui-icon-trash',
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
				"Delete Customer": function() {
					$( this ).dialog( "close" );
					jQuery.ajax({
                                    type:'DELETE',
                                    async: true,
                                    cache: false,
                                    dataType: 'json',
                                    url: '<?php echo $path;?>/customers/delete/' + gr ,
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
	window.location.href='<?php echo $path ?>customers/add';

});
    </script>
<div id="dialog-confirm" title="Delete Customer" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This customer will be permanently deleted and cannot be recovered. Are you sure?</p>
</div>
<div id="dialog-alert" title="Warning" style="display:none" >Please, select row! </div>
<div id="dialog-response" title="Delete Customer" style="display:none" ></div>
	<? echo ($this->Js->writeBuffer());?>