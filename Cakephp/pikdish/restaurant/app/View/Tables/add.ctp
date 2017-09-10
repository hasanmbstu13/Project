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
	   
</style>
<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Add New Tables</h3>
    </div>
    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel"> <?php echo $this->Session->flash(); ?>
        <div class="x_content"> <br />
        
          <?php echo $this->Form->create('RestaurantTables',array('url'=>'add','method'=>'post','name'=>'editForm','class'=>'form-horizontal form-label-left') ); 
		  
		  ?>
          
           <div class="container">
            <div class="row clearfix">
              <div class="col-md-12 column" >
                <table class="table table-bordered table-hover" id="tab_logic">
				<input type="hidden" id="tdlength" value="1">
                <input type="hidden" id="service_type" value="1">
               
                  <thead>
                    <tr style=";background:#FF9" >
                      <th width="1%" class="text-center"> S.No. </th>
					  <th width="25%" class="text-center">Table Internal Code</th>
                      <th width="25%" class="text-center">Table Number</th>
                      <th width="25%" class="text-center">No of Seats</th>
                      <th width="5%" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id='addr1' class="tdr">
                   	<td style="text-align:center; padding-top:12px;background:#FF9" class="sr">1</td>
					  <td><input name="data[0][RestaurantTables][cust_table_internal_code]" required="required" class="form-control col-md-7 col-xs-12" autofocus="autofocus" placeholder="Inter Code" ></td>
                     <td><input name="data[0][RestaurantTables][table_number]" min=1 required="required" class="form-control col-md-7 col-xs-12"  placeholder="Table Number"    type="number"></td>
                     <td><input name="data[0][RestaurantTables][no_of_seat]" required="required" class="form-control col-md-7 col-xs-12"  placeholder="No of seats"  max="25" min=1 type="number" ></td>
                                   				  
					  <td>
						  <div style='font-size:20px; cursor:pointer;'><a class="add_row" ><i class='fa fa-plus'></i></a></div>
					  </td>
                    </tr>
                    <tr id='addr2' class="tdr">
                   	  <td style="text-align:center; padding-top:12px;background:#FF9" class="sr">2</td>
					  <td><input name="data[1][RestaurantTables][cust_table_internal_code]"  class="form-control col-md-7 col-xs-12"  placeholder="Inter Code" onchange="check_it(2)" id="input_2_1" ></td>
                     <td><input name="data[1][RestaurantTables][table_number]"  class="form-control col-md-7 col-xs-12"  placeholder="Table Number"   type="number" onchange="check_it(2)" min=1 id="input_2_2"></td>
                     <td><input name="data[1][RestaurantTables][no_of_seat]"  class="form-control col-md-7 col-xs-12"  placeholder="No of seats"  max="25" min=1 type="number" onchange="check_it(2)" id="input_2_3" ></td>
                                   				  
					  <td>
						  <div style='font-size:20px; cursor:pointer;'><a class="add_row" ><i class='fa fa-plus'></i></a>&nbsp;&nbsp;<i onclick='DeleteRow(2)' class='fa fa-trash deleteCls' ></i></a></div>
					  </td>
                    </tr>
                    
                    <tr id='addr3' class="tdr">
                   	  <td style="text-align:center; padding-top:12px;background:#FF9" class="sr">3</td>
					  <td><input name="data[3][RestaurantTables][cust_table_internal_code]"  class="form-control col-md-7 col-xs-12"  placeholder="Inter Code" onchange="check_it(3)" id="input_3_1" ></td>
                     <td><input name="data[3][RestaurantTables][table_number]"  class="form-control col-md-7 col-xs-12"  placeholder="Table Number"   type="number" onchange="check_it(3)" id="input_3_2" min=1></td>
                     <td><input name="data[3][RestaurantTables][no_of_seat]"  class="form-control col-md-7 col-xs-12"  placeholder="No of seats"  max="25" min=1 type="number" onchange="check_it(3)" id="input_3_3" ></td>
                                   				  
					  <td>
						  <div style='font-size:20px; cursor:pointer;'><a class="add_row" ><i class='fa fa-plus'></i></a>&nbsp;&nbsp;<i onclick='DeleteRow(3)' class='fa fa-trash deleteCls' ></i></a></div>
					  </td>
                    </tr>
                    
                    
                    <tr id='addr4' class="tdr">
                   	  <td style="text-align:center; padding-top:12px;background:#FF9" class="sr">4</td>
					  <td><input name="data[4][RestaurantTables][cust_table_internal_code]"  class="form-control col-md-7 col-xs-12"  placeholder="Inter Code" onchange="check_it(4)" id="input_4_1" ></td>
                     <td><input name="data[4][RestaurantTables][table_number]"  class="form-control col-md-7 col-xs-12"  placeholder="Table Number"   type="number" min=1 onchange="check_it(4)" id="input_4_2"></td>
                     <td><input name="data[4][RestaurantTables][no_of_seat]"  class="form-control col-md-7 col-xs-12"  placeholder="No of seats"  max="25" min=1 type="number" onchange="check_it(4)" id="input_4_3"  ></td>
                                   				  
					  <td>
						  <div style='font-size:20px; cursor:pointer;'><a class="add_row" ><i class='fa fa-plus'></i></a>&nbsp;&nbsp;<i onclick='DeleteRow(4)' class='fa fa-trash deleteCls' ></i></a></div>
					  </td>
                    </tr>
                    
                    
                    <tr id='addr5' class="tdr">
                   	  <td style="text-align:center; padding-top:12px;background:#FF9" class="sr">5</td>
					  <td><input name="data[5][RestaurantTables][cust_table_internal_code]"  class="form-control col-md-7 col-xs-12"  placeholder="Inter Code" onchange="check_it(5)" id="input_5_1" ></td>
                     <td><input name="data[5][RestaurantTables][table_number]"  class="form-control col-md-7 col-xs-12"  placeholder="Table Number"   type="number" onchange="check_it(5)" min=1 id="input_5_2"></td>
                     <td><input name="data[5][RestaurantTables][no_of_seat]"  class="form-control col-md-7 col-xs-12"  placeholder="No of seats"  max="25" min=1 type="number" onchange="check_it(5)" id="input_5_3" ></td>
                                   				  
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
              <a href="<?php echo $path ?>tables" class="btn btn-primary">Cancel</a> </div>
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


$('#DriverJoinDate').datepicker({dateFormat:'yy-mm-dd'});
});

shortcut.add("Ctrl+C",function() {
	window.location.href='<?php echo $path ?>tables';

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
	
	  str = '<tr id="addr'+last_del+'" class="tdr"><td style="text-align:center; padding-top:12px;background:#FF9" class="sr">'+l+'</td><td><input name="data['+last_del+'][RestaurantTables][cust_table_internal_code]" onchange="check_it('+last_del+')" id="input_'+last_del+'_1" class="form-control col-md-7 col-xs-12"  placeholder="Inter Code" ></td><td><input name="data['+last_del+'][RestaurantTables][table_number]" onchange="check_it('+last_del+')" id="input_'+last_del+'_2" min= 1 class="form-control col-md-7 col-xs-12" placeholder="Table Number" type="number"></td><td><input name="data['+last_del+'][RestaurantTables][no_of_seat]" onchange="check_it('+last_del+')" id="input_'+last_del+'_3" class="form-control col-md-7 col-xs-12"  placeholder="No of seats"  max="15" min=1 type="number" ></td><td><div style="font-size:20px; cursor:pointer;"><a onclick="addRow()" ><i class="fa fa-plus"></i></a>&nbsp;&nbsp;<i onclick="DeleteRow('+last_del+')" class="fa fa-trash deleteCls" ></i></a></div><tr>';	
	  last_del++;
    
	
	$('#tab_logic').append(str);
	
}
$(".add_row").click(addRow);

function check_it(id)
{
	a = $('#input_'+id+'_1');b = $('#input_'+id+'_2');c = $('#input_'+id+'_3')
	
	 
	if(a.val() !== "" || b.val() !== "" || c.val() !== "" )
	{
		a.attr('required','required');
		b.attr('required','required');
		c.attr('required','required');
	}
	else
	{
		a.attr('required',false);
		b.attr('required',false);
		c.attr('required',false);
	}
}
</script>