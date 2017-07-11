<?php 
 $this->assign('title', 'Business Type');


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
<div class="clearfix">
  <p>- Ctrl + A for Add New Business Type</p>
</div>
  

<script>
var lastsel2 = 0;
jQuery().ready(function (){

var mygrid = jQuery("#list").jqGrid({
    url:'<?php echo $path ?>businesstypes/getJson',
    datatype: "json",
      colNames:['Business Type'],
      colModel:
    [
        {name:'business_type',index:'BusinessType.business_type', width:300,stype:'text'},
    ],
    onSelectRow:function check(id)
    {
     if(id !== lastsel2){lastsel2 = id}
    },
    ondblClickRow: function check(id)
    {
      window.location.href="<?=$path?>businesstypes/edit/id/"+lastsel2;
    },
    rowNum:20,
    width:1096,
    rowList:[10,20,50,100,200,300,400,500,1000],
    pager: '#pager',
    sortname: "BusinessType.business_type",
    viewrecords: true,
    sortorder: "asc",
    height:400,
    rownumbers: true,
    rownumWidth: 50,
    shrinkToFit: true,
    editurl: "<?=$path?>businesstypes/delete",
    caption:"Business Type List"

});

jQuery("#list").jqGrid('navGrid','#pager',{edit:false,add:false,del:false,view:false,search:false,refresh:false});
jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Add",title:"Add New Business Type(s)", buttonicon :'ui-icon-plus',
 onClickButton:function(){
  window.location.href="<?php echo $path ?>businesstypes/add"
} 
});

jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Edit",title:"Edit Business Type", buttonicon :'ui-icon-pencil',
 onClickButton:function(){
   var gr = jQuery("#list").jqGrid('getGridParam','selrow');
   if(gr)
   {
    window.location.href="<?php echo $path ?>businesstypes/edit/id/"+gr;
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
jQuery("#list").jqGrid('navButtonAdd',"#pager",{caption:"Delete",title:"Delete Business Type", buttonicon :'ui-icon-trash',
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
        "Delete BusinessType": function() {
          $( this ).dialog( "close" );
          jQuery.ajax({
                                    type:'DELETE',
                                    async: true,
                                    cache: false,
                                    dataType: 'json',
                                    url: '<?php echo $path;?>/businesstypes/delete/' + gr ,
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
  window.location.href='<?php echo $path ?>businesstypes/add';

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
<div id="dialog-confirm" title="Delete Business Type" style="display:none" >
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This Business Type will be permanently deleted and cannot be recovered. Are you sure?</p>
</div>
<div id="dialog-alert" title="Warning" style="display:none" >Please, select row! </div>
<div id="dialog-response" title="Delete Business Type" style="display:none" ></div>
  <? echo ($this->Js->writeBuffer());?>
  
    
    