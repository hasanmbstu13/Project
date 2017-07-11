<?php 
 $this->assign('title', 'Restaurant');
  echo $this->Html->css($path.'js/start_rating/jquery.rateyo.min.css');
	echo $this->Html->script('start_rating/jquery.rateyo.js');

?>
<style>
.outline-danger
{
    color: #d9534f;
    background-image: none;
    background-color: transparent;
    
}
.outline-danger:hover
{
    color: #fff;
    background-color: #d9534f;
    background-image: none;
}

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
.pagination
{
 margin:0px;
}
.pagination>li>a
{
	color:#777 
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

</style>
<div class="right_col" role="main">

<div class="page-title">

<div class="title_left" style="margin-left:5px; width:40%">
  
</div>
<div class="title_right table-responsive" style="float:right; text-align:right; margin-right:5px">
      <nav aria-label="Page navigation ">
          <ul class="pagination pagination-lg" >
            <li class="active"><a href="#"><span class="glyphicon glyphicon glyphicon-th-list" aria-hidden="true"></span></a></li>
            <li ><a href="<?=$path?>app_feedback/feedslist"><span class="glyphicon glyphicon glyphicon-th-large" aria-hidden="true"></span></a></li>
          </ul>
        </nav>
</div>
</div>
<div class="x_panel" >
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
	url:'<?php echo $path; ?>app_Feedback/feedjson',
	datatype: "json",
   	colNames:['Customer Name','Feedback Title','Date','Likes','Status','Action'],
   	colModel:
	[
	    
	    {name:"name",index:"User.name", width:170,stype:'text'},
		{name:'feedback_title',index:'Feedbacks.feedback_title', width:220,stype:'text'},
		{name:'entry_date',index:'Feedbacks.entry_date', width:150,stype:'date'},
		{name:'likes',index:'Feedbacks.likes', width:100,stype:'select', align:'left',searchoptions:{value:":;1:like;0:Dislike"}},
		{name:'status',index:'status', width:100,stype:'select', align:'left',searchoptions:{value:":;1:Varified;0:Unvarified;-1:Deleted"}},
		{name:'action',index:'action',stype:'label',width:200,search:false}
	],
	
	onSelectRow:function check(id)
	{
	 if(id !== lastsel2){lastsel2 = id}
	},
	ondblClickRow: function check(id)
	{
	  details(lastsel2);
	},
	rowNum:50,
   	width:1096,
    rowList:[10,20,50,100,200,300,400,500,1000],
   	pager: '#pager',
   	sortname: "Feedbacks.entry_date asc,Feedbacks.rating ",
    viewrecords: true,
    sortorder: "desc",
	height:400,
	rownumbers: true,
	rownumWidth: 40,
	shrinkToFit: true,
	caption:"App Feedbacks List",
	loadComplete: function() 
	{
	      arr = $('#list').jqGrid('getDataIDs')
		  $(arr).each(function(k,i){
		     
			  switch( $('#list').jqGrid('getCell',i,'status'))
			  {
				  case "Deleted":
				                 $("#"+i).addClass("w");    
				                 break;
				  case "Varified":
				                  $("#"+i).addClass("p");    
				                  break;
				  case "Unvarified": $("#"+i).addClass("i");    
				  
				                   break;
				  
			  }
			 
			  });
		  
	}

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

var grid = $("#list");
var getColumnIndexByName = function(gr,columnName) {
    var cm = gr.jqGrid('getGridParam','colModel');
    for (var i=0,l=cm.length; i<l; i++) {
        if (cm[i].name===columnName) {
            return i; // return the index
        }
    }
    return -1;

};
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
	
	     $("#gs_rating").attr({"min":0,"max":5,"step":"0.1"}).change(function(){
		     $("#list")[0].triggerToolbar()		 
		 });
		 $("#gs_entry_date").change(function(){
		     $("#list")[0].triggerToolbar()		 
		 });
		 
		 td = $("#gs_check").parent().css("padding-top",'3px');
		 td.html("<button type='button' id='gs_check' onclick='selectAll()' class='btn btn-default' aria-label='Justify' ><span class=' glyphicon glyphicon-unchecked'  aria-hidden='true'></span> Select All</button>");
		 $( "[aria-describedby = 'list_check']" ).css("text-align","center");
		 
		 $("#gsh_list_check .ui-search-clear").remove();
		 
		 
	
});


var ding = 0;
function details(id)
{
	
	if(ding == 1)
	{
			$("#dialog-details").dialog('destroy');
			ding=0;
			$("#dialog").html("");	
	}
	jQuery.ajax({ // Ajax Start
	type:'PRINT',
	async: true,
	cache: false,
	dataType: 'text',
	url: '<?php echo $path;?>/app_feedback/getDetails/' + id,
	success: function(response) 
	 {
		//alert(response);
		
	    $("#dialog").append(response);	
		ding = 1;
	    $( "#dialog-details").dialog({
	   									height:'auto',
											width:'44%',
											model:true,
											resizable:false,
											close: function (event, ui)
											 {
												ding = 0;
            									$("#dialog-details").dialog('destroy');
												$("#dialog").html("");
        									}
	   });
	   $("#dialog").html("");	
	   return false;
	 } 
   }); 

}


function Delete_feedback(id,d=0)
{
	
	$( "#dialog-delete" ).dialog({
			resizable: false,
			height:200,
			modal: true,
			buttons: {
				"Delete Feedback": function() {
					$( this ).dialog( "close" );
					jQuery.ajax({
                                    type:'DELETE',
                                    async: true,
                                    cache: false,
                                    dataType: 'json',
                                    url: '<?php echo $path;?>/app_feedback/delete/' + id,
                                    success: function(response) {
										if(d==1 || ding==1)
										{
											 ding=0;
											 $("#dialog-details").dialog("destroy");
		 									 $("#dialog").html("");	
											
										}
										jQuery("#list").trigger("reloadGrid");
										$('.ui-widget-overlay').css('display','none');
										$( "#dialog-response" ).attr("title","Delete Feedback").html(response.message); 
                                        $( "#dialog-response" ).dialog({
											height:150,
											model:true,
											resizable:false
											
											}); 
									  setTimeout(function(){$( "#dialog-response" ).dialog("close");},2000);																												
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
function varified(id,d=0)
{
	$( "#dialog-Verify" ).dialog({
			resizable: false,
			height:200,
			modal: true,
			buttons: {
				"Verify Feedback": function() {
					$( this ).dialog( "close" );
					jQuery.ajax({
                                    type:'DELETE',
                                    async: true,
                                    cache: false,
                                    dataType: 'json',
                                    url: '<?php echo $path;?>/app_feedback/varify/' + id,
                                    success: function(response) {
										if(d==1 || ding == 1)
										{
											 
											 $("#dialog-details").dialog("destroy");
											 ding=0;
		 									 $("#dialog").html("");	
											
										}
										
										jQuery("#list").trigger("reloadGrid");
										$('.ui-widget-overlay').css('display','none');
										$( "#dialog-response" ).attr("title","Varify Feedback").html(response.message); 
                                        $( "#dialog-response" ).dialog({
											height:150,
											model:true,
											resizable:false
											
											}); 
											
									  setTimeout(function(){$( "#dialog-response" ).dialog("close");},2000);																												
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

function unvarified(id,d=0)
{
	
	$( "#dialog-unvarified" ).dialog({
			resizable: false,
			height:200,
			modal: true,
			buttons: {
				"Unvarified": function() {
					$( this).dialog( "close" );
					jQuery.ajax({
                                    type:'DELETE',
                                    async: true,
                                    cache: false,
                                    dataType: 'json',
                                    url: '<?php echo $path;?>/app_feedback/unvarify/' + id,
                                    success: function(response) {
										if(d==1 || ding == 1)
										{
											 
											 $("#dialog-details").dialog("destroy");
											 ding=0;
		 									 $("#dialog").html("");	
											
										}
										jQuery("#list").trigger("reloadGrid");
										$('.ui-widget-overlay').css('display','none');
										$( "#dialog-response" ).attr("title","Delete Feedback").html(response.message); 
                                        $( "#dialog-response" ).dialog({
											height:150,
											model:true,
											resizable:false
											
											}); 
									  setTimeout(function(){$( "#dialog-response" ).dialog("close");},2000);																												
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

function dialog_action(id,type)
{
	 
	 if(type == 1)
	 {
		 varified(id,1)
	 }
	 else if(type == 2)
	 {
		 unvarified(id,1);
	 }
	 else
	 {
		 Delete_feedback(id,1)
	 }
	 
}

</script>
<div id="dialog-delete" title="Delete Feedback" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure,you want to Delete this feedback?</p>
</div>
<div id="dialog-Verify" title="Verify Feedback" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure,you want to Verify this feedback?</p>
</div>
<div id="dialog-unvarified" title="Unvarified Feedback" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This feedback is varified. Are you sure, you want to unvarified this feedback?</p>
</div>
<div id="dialog-response"  style="display:none" ></div>

<div id="dialog" title="Feedback" style="display:none" ></div>

	<? echo ($this->Js->writeBuffer());?>