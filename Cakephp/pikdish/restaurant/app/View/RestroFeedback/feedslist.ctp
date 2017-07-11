
<?php 
 $this->assign('title', 'Restaurant');
    echo $this->Html->css($path.'js/start_rating/jquery.rateyo.min.css');
	echo $this->Html->script('start_rating/jquery.rateyo.js');
   
?>
<style>
.bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn)
{
	width:211px;
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

.open
{
	border-radius:5px !important;
}
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
 input[type=text]:focus
{
	border-color:#ccc;
}
 .x_panel
 {
	 
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
.x_panel .nav>li>a
{
	padding-top:7px !important;
	padding-bottom:13px !important;
	
}
.progress
{
		
		height:22px;
		width:70%;
		float:right;
		margin-bottom:15px;
		
}
.progress .progress-bar
{
	line-height:22px;
}
.pro_heading
{
	float:left; height:22px; line-height:14px; padding-right:5px;color:#666;margin-bottom:15px;width:30%;
}
.pro_heading span
{
	font-weight:600;
}
.pro_heading small
{
	color:#73879C;
}
</style>
<div class="right_col" role="main">

<div class="page-title">

<div class="title_left" style="width:50%; float:left"><h1>Customer Feedbacks </h1></div>
<div class="title_right table-responsive" style="float:right; text-align:right; margin-right:5px; width:40%">
      <nav aria-label="Page navigation ">
          <ul class="pagination pagination-lg" >
            <li ><a href="<?=$path?>restro_feedback"><span class="glyphicon glyphicon glyphicon-th-list" aria-hidden="true"></span></a></li>
            <li class="active" ><a href="#"><span class="glyphicon glyphicon glyphicon-th-large" aria-hidden="true"></span></a></li>
          </ul>
        </nav>
</div>
</div>
<div class="row">

<div class="x_panel" >                
    <!-- navbar -->
    <nav class="navbar navbar-default"  style="height:54px">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="height:54px">
          <form class="navbar-form navbar-left">
            <div class="form-group">
             <label class="control-label" for="sort_by">Sort By </label>
             <select  class="selectpicker show-menu-arrow show-tick" name="sort_by" id="sort_by"  onchange="load_contents(1)" >
               <option data-icon="glyphicon-time" value="Feedbacks.entry_date desc">Most Recent</option>
               <option data-icon="glyphicon-sort-by-attributes-alt" value="Feedbacks.rating desc" >Rating (High-Low)</option>
               <option data-icon="glyphicon-sort-by-attributes" value="Feedbacks.rating asc">Rating (Low-High)</option>
               <option data-divider="true"></option>
               <option data-content="Excellent<div style='float:right;margin-right:7px'><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span></div>" value="5">Excellent</option>
               <option data-content="Vary Good<div style='float:right;margin-right:7px'><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span></div>" value="4">Vary Good</option>
               <option data-content="Average<div style='float:right;margin-right:7px'><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span></div>" value="3">Average</option>
               <option data-content="Poor<div style='float:right;margin-right:7px'><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span></div>" value="2">Poor</option>
               <option data-content="Terrible<div style='float:right;margin-right:7px'><span class='glyphicon glyphicon-star'></span></div>" value="1">Terrible</option>
    </select>
    <label class="control-label" for="status">Status</label>
             <select  class="selectpicker show-menu-arrow show-tick"  name="status" id="status"  onchange="load_contents(1)" >
               <option data-icon="glyphicon-comment" value="-1">All</option>
               <option data-icon="glyphicon-ok-sign" value="1">Verified</option>
               <option data-icon="glyphicon-question-sign" value="0" >Unverified</option>
               <option data-icon="glyphicon-remove-sign" value="2">Deleted</option>
               
    </select>
    
    <label class="control-label" for="count">Records Per Page </label>
    <select  class=" selectpicker show-menu-arrow show-tick" name="count" id="Count" data-width="auto" onchange="load_contents(1)" >
       <option value="10" selected="selected">10</option>
       <option value="20">20</option>
       <option value="50">50</option>
       <option value="100">100</option>
    </select>
    </div>
    </form>
    <div class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search" id="Search" >
            </div>
            
            <button type="button" onclick="load_contents(1,$('#Search').val())" class="btn btn-default" style="margin-bottom:0px; border-radius:5px">Submit</button>
            
    </div>
          
        </div>
      
    </nav>
    <!-- nav bar -->
    <br />
    <!-- rating bars -->
    <div class="col-md-4">
    <? 
	$headings = array(5=>"Excellent","4"=>"Very Good","3"=>"Average","2"=>"Poor","1"=>"Terrible");
	foreach($rating as $key=>$val){?>
    <div>
        <div class="pro_heading"><span><?=$headings[$key]?></span> <br /><small><?=$val?>/<?=$total?></small></div>
        <div class="progress " >
              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?=$val?>" aria-valuemin="0" aria-valuemax="<?=$total?>" style="text-align:right;width: <?=($val*100)/$total?>%;"><span class=""><?=$key?><span class="glyphicon glyphicon-star" aria-hidden="true"></span></span></div>
         </div>
    </div>
    <? } ?>
    
    </div>
    <!-- rating bar-->
    
    <div class="col-sm-12">
   
        <div id="data_container" style="width:100%">
          
        </div>
        <div class="loading-info" style="display:;  width:100%; height:30px; "><div class="loader"></div></div>
   </div>
</div>
</div>                 

<script>
//paging

var track_page = 1; //track user scroll as page number, right now page number is 1
var loading  = false; //prevents multiple loads
load_contents(); //initial content load

$(window).scroll(function() 
{ //detect page scroll
    if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled to bottom of the page
        
        load_contents(); //load content   
		
		}
		
	if($(window).scrollTop()  >=  $(window).height()) { 
	$("#back_to_top").show("slow");
    }
	else
	{
	  $("#back_to_top").hide("slow");
	}	
	
	
	
});     
//Ajax load function
function load_contents(type=0,src_val=""){

   
     rating = 0;
	 order = "";
	 v_type = $("#status option:selected").val();
	 switch($("#sort_by option:selected").val())
	 {
		 case '1':
		 case '2':
		 case '3':
		 case '4':
		 case '5':  
		         rating   = $("#sort_by option:selected").val();
				 break;
		default  :	
		         order	 = $("#sort_by option:selected").val();
				 break;
				 
	 }
	 var records = $("#Count option:selected").val();
	 
     if(loading == false){
		 if(type)
		 {
			$("#data_container").html(""); //append data into #results element 
			$("#loader").show();
			$("#outer_loader").show();
			track_page = 1
		 }
		
        loading = true;  //set loading flag on
        $('.loading-info').show(); //show loading animation 
        $.post( '<?=$path?>restro_feedback/getPro', {'restro_id':<?=$restor_id?>,'page': track_page,"type":v_type,
		'rating':rating,
		'order':order,
		'records':records,
		"search":src_val
		}, function(data){
            loading = false; //set loading flag off once the content is loaded
            if(data == 0){
                //notify user if nothing to load
				
                if(track_page == 1)
				{
                $('.loading-info').html("<div class='col-sm-12' >No feedbacks found!</div>");
				}
				else
				{
				$('.loading-info').html("<div class='col-sm-12' >No more feedbacks!<div>");
				}
                return;
            }
			else
			{
			  $('.loading-info').html('<div class="loader"></div>');	
		    }
            $('.loading-info').hide(); //hide loading animation once data is received
            $("#data_container").append(data); //append data into #results element
			$("#Search").val("");
			$("#loader").hide();
			$("#outer_loader").hide();
			track_page++; //page number increment
        
        }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
            alert(thrownError); //alert with HTTP error
        })
    }
  
  
  	
}

//Paging

</script>
<a  style="display:none" onclick="$('html, body').animate({ scrollTop: 0 }, 'slow');" id="back_to_top" class="on"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></span></a>    
	<? echo ($this->Js->writeBuffer());?>
	
  