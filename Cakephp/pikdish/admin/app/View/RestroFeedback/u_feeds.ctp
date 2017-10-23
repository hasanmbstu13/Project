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

</style>
<div class="right_col" role="main">

<div class="page-title">
<ol class="breadcrumb">
       <li><a href="<?php echo $path ?>restro_feedback">Home</a></li>
       <li class="active"><a href="#" ><?=ucwords($restro_name)?></a></li>

   </ol>
<div class="title_left" style="margin-left:5px; width:40%">
                              <div class="btn-group " role="group" >
                              <button type="button" style="border-top-left-radius:5px;border-bottom-left-radius:5px" class="btn btn-success btn-lg " onclick="get_selected(1)" >Verify Selected</button>
                              <button type="button"  class="btn btn-primary btn-lg " style="border-top-right-radius:5px;border-bottom-right-radius:5px" onclick="get_selected(0)">Delete Selected</button>
                            </div>
                       
</div>

<div class="title_right table-responsive" style="float:right; text-align:right; margin-right:5px">
      <nav aria-label="Page navigation ">
          <ul class="pagination pagination-lg" >
            <li class="active"><a href="#"><span class="glyphicon glyphicon glyphicon-th-list" aria-hidden="true"></span></a></li>
            <li ><a href="<?=$path?>restro_feedback/u_feedslist/<?=$restor_id?>"><span class="glyphicon glyphicon glyphicon-th-large" aria-hidden="true"></span></a></li>
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
	url:'<?php echo $path; ?>Restro_Feedback/feedjson/<?=$restor_id?>/0',
	datatype: "json",
   	colNames:['','Customer Name','Feedback Title','Entry Date','Rating','Action'],
   	colModel:
	[
	    {name:'check',index:'check',stype:'label',width:113,search:true},
   		{name:"name",index:"User.name", width:200,stype:'text'},
		{name:'feedback_title',index:'Feedbacks.feedback_title', width:300,stype:'text'},
		{name:'entry_date',index:'Feedbacks.entry_date', width:220,stype:'date'},
		{name:'rating',index:'Feedbacks.rating', width:100,stype:'number'},
		{name:'action',index:'action',stype:'label',width:230,search:false}
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
	caption:"Unverified Customer Feedbacks List",
	loadComplete: function() 
	{
	  
     /* cRows = this.rows.length;
      for (iRow=0; iRow<cRows; iRow++) 
	   {
        row = this.rows[iRow];
        $(row).addClass("outline-danger");
        
       }*/
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
	//rating
	
	//rating
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
function get_selected(type)
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
											model:true,
											resizable:false
											
											}); 
		setTimeout(function(){$( "#dialog-alert" ).dialog("close");},2000);																										
						return;					
	 }
	 else
	 {
		 if(type == 0)
		 {
		     Delete_feedback(String(allVals),-1)
		 }
		 else
		 {
			 varified(String(allVals),-1)
		 }
		 
	 }
	 
}

function Delete_feedback(id,type = 1,d=0)
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
                                    url: '<?php echo $path;?>/restro_feedback/delete/' + id+'/'+type ,
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
function varified(id,type=1,d=0)
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
                                    url: '<?php echo $path;?>/restro_feedback/varify/' + id+'/'+type ,
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
ding=0;
function details(id)
{
	if(ding == 1)
	{
		 $("#dialog-details").dialog('destroy');
		 $("dialog").html("");
		 ding = 0;
	}
	
	
	jQuery.ajax({ // Ajax Start
	type:'PRINT',
	async: true,
	cache: false,
	dataType: 'text',
	url: '<?php echo $path;?>/restro_feedback/getDetails/' + id,
	success: function(response) 
	 {
		//alert(response);
	  $("#dialog").html(response);	
	  ding=1;
	  $( "#dialog-details").dialog({
	    
											height:'auto',
											width:'40%',
											model:true,
											resizable:true,
											close: function (event, ui) {
												
            									$("#dialog-details").dialog('destroy');
												$("dialog").html("");
												ding = 0;
        										}
		 });
	   $("#dialog").html("");	
	  return false;
	 } 
   }); 
}
function dialog_action(id,type)
{
	 
	 if(type == 1)
	 {
		 varified(id,type,1)
	 }
	 else
	 {
		 Delete_feedback(id,type,1)
	 }
	 
}
function change(id)
{   
    f = $("#span_"+id);
	
	if(f.hasClass('glyphicon-unchecked'))
	{
	 $("#check_box_"+id).attr("value",id);	
	 f.removeClass('glyphicon-unchecked')
	 f.addClass('glyphicon-check');
	}
	else
	{
	 $("#check_box_"+id).attr("value","");		
     f.addClass('glyphicon-unchecked')
	 f.removeClass('glyphicon-check');
	 $("#gs_check span").addClass('glyphicon-unchecked').removeClass('glyphicon-check');
	}
}
function selectAll()
{
	
	//b = $("#gs_action");
	
	f = document.getElementById("gs_check").firstChild;
	var allRowsInGrid = $(".ui-sortable tr[role='row']");
	
	if($(f).hasClass('glyphicon-unchecked'))
	{
	 for(i=1;i<allRowsInGrid.length;i++)
	 {
	  id = $(allRowsInGrid[i]).attr('id');
	  
	  $("#span_"+id).removeClass('glyphicon-unchecked').addClass('glyphicon-check');
	  $("#check_box_"+id).attr("value",id);		
	 }
	 $(f).removeClass('glyphicon-unchecked')
	 $(f).addClass('glyphicon-check');
	}
	else
	{
	 for(i=1;i<allRowsInGrid.length;i++)
	 {
	  id = $(allRowsInGrid[i]).attr('id');
	  
	  $("#span_"+id).addClass('glyphicon-unchecked').removeClass('glyphicon-check');
	  $("#check_box_"+id).attr("value","");		
	 }
     $(f).addClass('glyphicon-unchecked')
	 $(f).removeClass('glyphicon-check');
	}
	
}
</script>
<div id="dialog-delete" title="Delete Feedback" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This feedback will be permanently deleted and cannot be recovered. Are you sure?</p>
</div>
<div id="dialog-Verify" title="Verify Feedback" style="display:none" >
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure,you want to Verify this feedback?</p>
</div>
<div id="dialog-response" title="" style="display:none" ></div>
<div id="dialog" style="display:none" ></div>
<div id="dialog-alert" title="Warning" style="display:none" >Please, select a row!</div>
	<?php echo ($this->Js->writeBuffer());?>