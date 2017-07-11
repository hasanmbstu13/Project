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
      <h3>Edit Table</h3>
    </div>
    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel"> <?php echo $this->Session->flash(); ?>
        <div class="x_content"> <br />
        
          <?php echo $this->Form->create('RestaurantTables',array('url'=>'edit','method'=>'post','name'=>'editForm','class'=>'form-horizontal form-label-left') ); 
		  echo $this->Form->hidden('RestaurantTables.id');
		  ?>
          
           <div class="container">
            <div class="row clearfix">
              <div class="col-md-12 column" >
                <table class="table table-bordered table-hover" id="tab_logic">
				<input type="hidden" id="tdlength" value="1">
                <input type="hidden" id="service_type" value="1">
               
                  <thead>
                    <tr style="background:#FF9" >
                      <th width="1%" class="text-center"> S.No. </th>
					  <th width="25%" class="text-center">Table Internal Code</th>
                      <th width="25%" class="text-center">Table Number</th>
                      <th width="25%" class="text-center">No of Seats</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr id='addr1' class="tdr" >
                   	<td style="text-align:center; padding-top:12px;background:#FF9" class="sr">1</td>
					  <td><input name="data[RestaurantTables][cust_table_internal_code]" required="required" class="form-control col-md-7 col-xs-12" autofocus="autofocus" placeholder="Inter Code" value="<?=$this->request->data['RestaurantTables']['cust_table_internal_code']?>" ></td>
                     <td><input name="data[RestaurantTables][table_number]" min=1 required="required" class="form-control col-md-7 col-xs-12"  placeholder="Table Number"    type="number" value="<?=$this->request->data['RestaurantTables']['table_number']?>"></td>
                     <td><input name="data[RestaurantTables][no_of_seat]" required="required" class="form-control col-md-7 col-xs-12"  placeholder="No of seats"  max="25" min=1 type="number" value="<?=$this->request->data['RestaurantTables']['no_of_seat']?>"></td>
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
</script>