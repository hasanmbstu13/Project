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
      <h3>Add New Tax(s)</h3>
    </div>
    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel"> <?php echo $this->Session->flash(); ?>
        <div class="x_content">
  <?php echo $this->Form->create('TaxMaster',array('url'=>'add','method'=>'post','name'=>'editForm','class'=>'form-horizontal form-label-left') ); ?>
         <div class="container">
            <div class="row clearfix">
              <div class="col-md-12 column" >
                <table class="table table-bordered table-hover" id="tab_logic">
				  <thead>
                    <tr style=";background:#FF9" >
                      <th width="1%" class="text-center"> S.No. </th>
					  <th width="25%" class="text-center">Tax Name*</th>
                      <th width="25%" class="text-center">Tax Print Name*</th>
                      <th width="25%" class="text-center">Rate*</th>
                      <th width="5%" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id='addr1' class="tdr">
                   	<td style="text-align:center; padding-top:12px;background:#FF9" class="sr">1</td>
					  <td><input name="data[0][TaxMaster][tax_name]" required="required" class="form-control col-md-7 col-xs-12" autofocus="autofocus" placeholder="Tax Name" ></td>
                     <td><input name="data[0][TaxMaster][print_name]" required="required" class="form-control col-md-7 col-xs-12"  placeholder="Tax Print Name" ></td>
                     <td><input name="data[0][TaxMaster][rate]" required="required" class="form-control col-md-7 col-xs-12"  placeholder="Rate"   min=0 type="number" step="0.1" ></td>
                                   				  
					  <td>
						  <div style='font-size:20px; cursor:pointer;'><a class="add_row" ><i class='fa fa-plus'></i></a></div>
					  </td>
                    </tr>
                    <tr id='addr2' class="tdr">
                   	  <td style="text-align:center; padding-top:12px;background:#FF9" class="sr">2</td>
					  <td><input name="data[1][TaxMaster][tax_name]"  class="form-control col-md-7 col-xs-12"  placeholder="Tax Name" onchange="check_it(2)" id="input_2_1" ></td>
                     <td><input name="data[1][TaxMaster][print_name]"  class="form-control col-md-7 col-xs-12"  placeholder="Tax Print Name"    onchange="check_it(2)" id="input_2_2"></td>
                     <td><input name="data[1][TaxMaster][rate]"  class="form-control col-md-7 col-xs-12"  placeholder="Rate"  max="25" min=0 type="number" onchange="check_it(2)" id="input_2_3" step="0.1" ></td>
                                   				  
					  <td>
						  <div style='font-size:20px; cursor:pointer;'><a class="add_row" ><i class='fa fa-plus'></i></a>&nbsp;&nbsp;<i onclick='DeleteRow(2)' class='fa fa-trash deleteCls' ></i></a></div>
					  </td>
                    </tr>
                    
                    <tr id='addr3' class="tdr">
                   	  <td style="text-align:center; padding-top:12px;background:#FF9" class="sr">3</td>
					  <td><input name="data[3][TaxMaster][tax_name]"  class="form-control col-md-7 col-xs-12"  placeholder="Tax Name" onchange="check_it(3)" id="input_3_1" ></td>
                     <td><input name="data[3][TaxMaster][print_name]"  class="form-control col-md-7 col-xs-12"  placeholder="Tax Print Name"  onchange="check_it(3)" id="input_3_2" ></td>
                     <td><input name="data[3][TaxMaster][rate]"  class="form-control col-md-7 col-xs-12"  placeholder="Rate"  max="25" min=0 type="number" onchange="check_it(3)" id="input_3_3" step="0.1" ></td>
                                   				  
					  <td>
						  <div style='font-size:20px; cursor:pointer;'><a class="add_row" ><i class='fa fa-plus'></i></a>&nbsp;&nbsp;<i onclick='DeleteRow(3)' class='fa fa-trash deleteCls' ></i></a></div>
					  </td>
                    </tr>
                    
                    
                    <tr id='addr4' class="tdr">
                   	  <td style="text-align:center; padding-top:12px;background:#FF9" class="sr">4</td>
					  <td><input name="data[4][TaxMaster][tax_name]"  class="form-control col-md-7 col-xs-12"  placeholder="Tax Name" onchange="check_it(4)" id="input_4_1" ></td>
                     <td><input name="data[4][TaxMaster][print_name]"  class="form-control col-md-7 col-xs-12"  placeholder="Tax Print Name" onchange="check_it(4)" id="input_4_2"></td>
                     <td><input name="data[4][TaxMaster][rate]"  class="form-control col-md-7 col-xs-12"  placeholder="Rate"  min=0 type="number" onchange="check_it(4)" id="input_4_3" step="0.1"  ></td>
                                   				  
					  <td>
						  <div style='font-size:20px; cursor:pointer;'><a class="add_row" ><i class='fa fa-plus'></i></a>&nbsp;&nbsp;<i onclick='DeleteRow(4)' class='fa fa-trash deleteCls' ></i></a></div>
					  </td>
                    </tr>
                    
                    
                    <tr id='addr5' class="tdr">
                   	  <td style="text-align:center; padding-top:12px;background:#FF9" class="sr">5</td>
					  <td><input name="data[5][TaxMaster][tax_name]"  class="form-control col-md-7 col-xs-12"  placeholder="Tax Name" onchange="check_it(5)" id="input_5_1" ></td>
                     <td><input name="data[5][TaxMaster][print_name]"  class="form-control col-md-7 col-xs-12"  placeholder="Tax Print Name" onchange="check_it(5)"  id="input_5_2"></td>
                     <td><input name="data[5][TaxMaster][rate]"  class="form-control col-md-7 col-xs-12"  placeholder="Rate"  min=0 type="number" onchange="check_it(5)" id="input_5_3" step="0.1" ></td>
                                   				  
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
              <a href="<?php echo $path ?>taxs" class="btn btn-primary">Cancel</a> </div>
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
	window.location.href='<?php echo $path ?>taxs';

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
	
	  str = '<tr id="addr'+last_del+'" class="tdr"><td style="text-align:center; padding-top:12px;background:#FF9" class="sr">'+l+'</td><td><input name="data['+last_del+'][TaxMaster][tax_name]" onchange="check_it('+last_del+')" id="input_'+last_del+'_1" class="form-control col-md-7 col-xs-12"  placeholder="Tax Name" ></td><td><input name="data['+last_del+'][TaxMaster][print_name]" onchange="check_it('+last_del+')" id="input_'+last_del+'_2" class="form-control col-md-7 col-xs-12" placeholder="Tax Print Name" ></td><td><input name="data['+last_del+'][TaxMaster][rate]" onchange="check_it('+last_del+')" id="input_'+last_del+'_3" class="form-control col-md-7 col-xs-12"  placeholder="Rate"   min="0" step="0.1"  type="number" ></td><td><div style="font-size:20px; cursor:pointer;"><a onclick="addRow()" ><i class="fa fa-plus"></i></a>&nbsp;&nbsp;<i onclick="DeleteRow('+last_del+')" class="fa fa-trash deleteCls" ></i></a></div><tr>';	
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