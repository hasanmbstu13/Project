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
            <li ><a href="<?=$path?>restro_feedback/feedslist"><span class="glyphicon glyphicon glyphicon-th-large" aria-hidden="true"></span></a></li>
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
	url:'<?php echo $path; ?>Restro_Feedback/feedjson',
	datatype: "json",
   	colNames:['Customer Name','Feedback Title','Entry Date','Rating','Status','Action'],
   	colModel:
	[

   		{name:"name",index:"User.name", width:200,stype:'text'},
		{name:'feedback_title',index:'Feedbacks.feedback_title', width:300,stype:'text'},
		{name:'entry_date',index:'Feedbacks.entry_date', width:200,stype:'date'},
		{name:'rating',index:'Feedbacks.rating', width:80,stype:'number'},
		{name:'status',index:'status', width:210,stype:'select', align:'left',searchoptions:{value:":;1:Verified;0:Unverified;-1:Deleted"},width:100},
		{name:'action',index:'action',stype:'label',width:100,search:false}
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
	caption:"Customer Feedbacks List",
	loadComplete: function()
	{
	      arr = $('#list').jqGrid('getDataIDs')
		  $(arr).each(function(k,i){

			  switch( $('#list').jqGrid('getCell',i,'status'))
			  {
				  case "Deleted":
				                 $("#"+i).addClass("w");
				                 break;
				  case "Verified":
				                  $("#"+i).addClass("p");
				                  break;
				  case "Unverified": $("#"+i).addClass("i");

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


	 }

}

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
	url: '<?php echo $path;?>/restro_feedback/getDetails/' + id,
	success: function(response)
	 {
		//alert(response);

	    $("#dialog").append(response);
		ding = 1;
	    $( "#dialog-details").dialog({
	   									height:'auto',
											width:'40%',
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
</script>

<div id="dialog" style="display:none" ></div>

	<? echo ($this->Js->writeBuffer());?>