<?php $this->assign('title', 'Equipment');?>

<style>
 .error
	   {
		   padding-left:10px;
		   color:red
	   }
	   input
	   {
		   padding:5 5 5 5;
		   border-radius: 4px !important;
		   width:100% !important;
		   height:25px !important
		   
		   
	   }
	   textarea 
	   {
		   width:100% !important;
		   
	   }
	   
</style>
<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Add New Food Portions</h3>
    </div>
    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel"> <?php echo $this->Session->flash(); ?>
        <div class="x_content"> <br />
        
          <?php echo $this->Form->create('Portions',array('url'=>'add','method'=>'post','name'=>'editForm','class'=>'form-horizontal form-label-left') ); 
		  
		  ?>
          
           <div class="container">
            <div class="row clearfix">
              <div class="col-md-12 column" >
                <table class="table table-bordered table-hover" id="tab_logic" style="width:75%">
				
               
                  <thead>
                    <tr  style="background:#FF9">
                      <th width="7%" class="text-center"> S.No. </th>
					  <th width="45%" class="text-center">Food Portions Name*</th>
                      <th width="10%" class="text-center">Is Default?</th>
                      <th width="8%" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id='addr1' class="tdr">
                   	<td style="text-align:center; padding-top:12px;background:#FF9" class="sr">1</td>
					  <td><input name="data[0][Portions][portion_name]" required="required" class="form-control col-md-7 col-xs-12" autofocus="autofocus" placeholder="Food Portion Name" ></td>
                      <td><input name="data[Portions][default_portion]"  type="radio" value="0"  ></td>
                       <td>
						  <div style='font-size:20px; cursor:pointer;'><a class="add_row" ><i class='fa fa-plus'></i></a></div>
					  </td>
                    </tr>
                    <tr id='addr2' class="tdr">
                   	  <td style="text-align:center; padding-top:12px;background:#FF9" class="sr">2</td>
					  <td><input name="data[1][Portions][portion_name]"  class="form-control col-md-7 col-xs-12"  placeholder="Food Portion Name" onchange="check_it(2)" id="input_2_1" ></td>
                     <td><input name="data[Portions][default_portion]"  type="radio" value="1"  ></td>
                     
                                   				  
					  <td>
						  <div style='font-size:20px; cursor:pointer;'><a class="add_row" ><i class='fa fa-plus'></i></a>&nbsp;&nbsp;<i onclick='DeleteRow(2)' class='fa fa-trash deleteCls' ></i></a></div>
					  </td>
                    </tr>
                    
                    <tr id='addr3' class="tdr">
                   	  <td style="text-align:center; padding-top:12px;background:#FF9" class="sr">3</td>
					  <td><input name="data[3][Portions][portion_name]"  class="form-control col-md-7 col-xs-12"  placeholder="Food Portion Name" onchange="check_it(3)" id="input_3_1" ></td>
                     
                     <td><input name="data[Portions][default_portion]"  type="radio" value="3"  ></td>
                                   				  
					  <td>
						  <div style='font-size:20px; cursor:pointer;'><a class="add_row" ><i class='fa fa-plus'></i></a>&nbsp;&nbsp;<i onclick='DeleteRow(3)' class='fa fa-trash deleteCls' ></i></a></div>
					  </td>
                    </tr>
                    
                    
                    <tr id='addr4' class="tdr">
                   	  <td style="text-align:center; padding-top:12px;background:#FF9" class="sr">4</td>
					  <td><input name="data[4][Portions][portion_name]"  class="form-control col-md-7 col-xs-12"  placeholder="Food Portion Name" onchange="check_it(4)" id="input_4_1" ></td>
                     
                     <td><input name="data[Portions][default_portion]"   type="radio" value="4"  ></td>
                                   				  
					  <td>
						  <div style='font-size:20px; cursor:pointer;'><a class="add_row" ><i class='fa fa-plus'></i></a>&nbsp;&nbsp;<i onclick='DeleteRow(4)' class='fa fa-trash deleteCls' ></i></a></div>
					  </td>
                    </tr>
                    
                    
                    <tr id='addr5' class="tdr">
                   	  <td style="text-align:center; padding-top:12px;background:#FF9" class="sr">5</td>
					  <td><input name="data[5][Portions][portion_name]"  class="form-control col-md-7 col-xs-12"  placeholder="Food Portion Name" onchange="check_it(5)" id="input_5_1" ></td>
                     
                     <td><input name="data[Portions][default_portion]"   type="radio" value="5"  ></td>
                                   				  
					  <td>
						  <div style='font-size:20px; cursor:pointer;'><a class="add_row" ><i class='fa fa-plus'></i></a>&nbsp;&nbsp;<i onclick='DeleteRow(5)' class='fa fa-trash deleteCls' ></i></a></div>
					  </td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>
           </div>
          
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" id="submit" class="btn btn-success">Submit</button>
              <a href="<?php echo $path ?>portions" class="btn btn-primary">Cancel</a> </div>
          </div>
          </form>
          <div>
                        <p>- Ctrl + S for Save Data</p>
                        <p>- Ctrl + C for go to list page</p>
                     
                        </div>

        </div>
      </div>
    </div>
  </div>
  
</div>

<!-- /page content -->
<script>
$('body').on('keydown', 'input, select, textarea', function(e) {
var self = $(this)
  , form = self.parents('form:eq(0)')
  , focusable
  , next
  , prev
  ;

if (e.shiftKey) {
 if (e.keyCode == 13) {
     focusable =   form.find('input,a,select,button,textarea').filter(':visible:not([readonly]):enabled');
     prev = focusable.eq(focusable.index(this)-1); 

     if (prev.length) {
        prev.focus();
     } else {
        form.submit();
    }
  }
}
  else
if (e.keyCode == 13) {
    focusable = form.find('input,a,select,button,textarea').filter(':visible:not([readonly]):enabled');
    next = focusable.eq(focusable.index(this)+1);
    if (next.length) {
        next.focus();
    } else {
        form.submit();
    }
    return false;
}
});
$(document).ready(function(){
	
    $(document).bind('keydown', function(event) {
      //19 for Mac Command+S
     if (!( String.fromCharCode(event.which).toLowerCase() == 's' && event.ctrlKey) && !(event.which == 19)) return true;

      event.preventDefault();
      console.log("Ctrl-s pressed");
$("#submit").click();
      return false;

   });



});

shortcut.add("Ctrl+C",function() {
	window.location.href='<?php echo $path ?>portions';

});
shortcut.add("Ctrl+A",function() {
	addRow();

});
last_del = $('.sr').toArray().length + 1;
function DeleteRow(row)
{
	
	$('#addr'+row).remove();
	last_del++
	tds = $('.sr').toArray();
	for(i=0;i<tds.length;i++)
	{
		tds[i].innerHTML = i+1;
	}
	
}
function addRow()
{

	tds = $('.tdr').toArray();
	l = tds.length+1 ;
	
	  str = '<tr id="addr'+last_del+'" class="tdr"><td style="text-align:center; padding-top:12px;background:#FF9" class="sr">'+l+'</td><td><input name="data['+last_del+'][Portions][portion_name]" onchange="check_it('+last_del+')" id="input_'+last_del+'_1" class="form-control col-md-7 col-xs-12"  placeholder="Food Portion Name" ></td><td><input name="data[Portions][default_portion]"   type="radio" value="'+last_del+'"  ></td><td><div style="font-size:20px; cursor:pointer;"><a onclick="addRow()" ><i class="fa fa-plus"></i></a>&nbsp;&nbsp;<i onclick="DeleteRow('+last_del+')" class="fa fa-trash deleteCls" ></i></a></div><tr>';	
	  last_del++;
    
	
	$('#tab_logic').append(str);
	
}
$(".add_row").click(addRow);

function check_it(id)
{
	a = $('#input_'+id+'_1');
	
	 
	if(a.val() !== "" )
	{
		a.attr('required','required');
	}
	else
	{
		a.attr('required',false);
		
	}
}
</script>