<style>
       .error
	   {
		   padding-left:10px;
		   color:red
	   }
	   input[type=text],input[type=date]
	   {
		  
		   border-radius: 4px !important;
		   display:inline-block !important;
		    width:154px !important;
		   
	   }
	   input[type=month]
	   {
		  
		   border-radius: 4px !important;
		   display:inline-block !important;
		    width:190px !important;
		   
	   }
	   textarea 
	   {
		   width:100% !important;
		   
	   }
	   .radio-inline input[type=radio]
	   {
		   padding:5 5 5 5;    
	       margin-top:-2px !important;
		   width:100% !important;
		   height:25px !important
	   }
	   .btn-group .btn
	   {
		   padding-top:2px;
		   padding-bottom:2px;
	   }
	   .bootstrap-select.form-control:not([class*="col-"])
	   {
		   width:15%
		   
	   }
	    input[type=radio]:focus
		{
			border:0px;
			box-shadow: none;
		}
	   
</style>
<div class="right_col " role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Compelete Orders</h3>
    </div>
    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
       
      <div class="x_panel">
        <div class="title_left">
          <h4> Select options for the statement period</h4 >
        </div>
        <div class="x_content"> 
        
          <?php 
		   echo $this->Form->create('OrdersH',array('url'=>'order_list','method'=>'post','name'=>'editForm','class'=>'class=form-inline') ); 
		   $year=array();
		   
		   $months =array(1=>"January","February","March","April","May","June","July","August","September","October","November","December");
		   
		  ?>
          
           <div class="container">
            <div class="row clearfix">
              <div class="col-md-12 column" >
                <table class="table table-hover" id="tab_logic" style="width:100%; ">
				  <tbody> 
                    <tr>
                      <th width="15%" class="text-center" >
                       <div class="radio-inline	">
                         <label for="today" style="padding-right:5px">Today</label><input checked="checked" value="0" type="radio" name="optradio" id="today" onchange="if(this.checked)
                          {
                           $('#StartDate').attr({'disabled':true,'required':false});
                           $('#EndDate').attr({'disabled':true,'required':false});
                           $('#Month').attr({'disabled':true,'required':false});
                           //$('#OrdersHYearId').attr({'disabled':true,'required':false}).selectpicker('refresh');
                           //$('#OrdersHMonthId').attr({'disabled':true,'required':false}).selectpicker('refresh');
                           $('#OrdersHOnlyYearId').attr({'disabled':true,'required':false}).selectpicker('refresh');
                           
                          }" />
                       </div> 
                      </th>
                      <th  class="text-center" width="25%">
                       <div class="radio-inline	">
                         <label>By Date<input  value="1" type="radio" name="optradio"  onchange="
                         
                          if(this.checked)
                          {
                           $('#StartDate').attr({'disabled':false,'required':true});
                           $('#EndDate').attr({'disabled':false,'required':true});
                           $('#Month').attr({'disabled':true,'required':false});
                           //$('#OrdersHYearId').attr({'disabled':true,'required':false}).selectpicker('refresh');
                           //$('#OrdersHMonthId').attr({'disabled':true,'required':false}).selectpicker('refresh');
                           $('#OrdersHOnlyYearId').attr({'disabled':true,'required':false}).selectpicker('refresh');
                           
                          }
                         " /></label>
                       </div>
                      </th>
					  <th  class="text-center" width="20%">
                       <div class="radio-inline">
                         <label>By Month<input type="radio" name="optradio" value="2" onchange="
                         if(this.checked)
                          {
                           $('#StartDate').attr({'disabled':true,'required':false});
                           $('#EndDate').attr({'disabled':true,'required':false});
                           $('#Month').attr({'disabled':false,'required':true});
                           //$('#OrdersHYearId').attr({'disabled':false,'required':true}).selectpicker('refresh');
                           //$('#OrdersHMonthId').attr({'disabled':false,'required':true}).selectpicker('refresh');
                           $('#OrdersHOnlyYearId').attr({'disabled':true,'required':false}).selectpicker('refresh');
                           
                          }
                         " /></label>
                       </div>
                      </th>
                      <th  class="text-center" width="15%">
                       <div class="radio-inline">
                         <label>Last 6 Months<input type="radio" name="optradio" value="3"   onchange="
                          if(this.checked)
                          {
                           $('#StartDate').attr({'disabled':true,'required':false});
                           $('#EndDate').attr({'disabled':true,'required':false});
                           $('#Month').attr({'disabled':true,'required':false});
                           //$('#OrdersHYearId').attr({'disabled':true,'required':false}).selectpicker('refresh');
                           //$('#OrdersHMonthId').attr({'disabled':true,'required':false}).selectpicker('refresh');
                           $('#OrdersHOnlyYearId').attr({'disabled':true,'required':false}).selectpicker('refresh');
                           
                          }
                         "/></label>
                       </div>
                      </th>
                      <th  class="text-center" width="20%">
                       <div class="radio-inline">
                         <label>By Year<input type="radio" name="optradio"  value="4" onchange="
                          if(this.checked)
                          {
                           $('#StartDate').attr({'disabled':true,'required':false});
                           $('#EndDate').attr({'disabled':true,'required':false});
                           $('#Month').attr({'disabled':true,'required':false});
                           //$('#OrdersHYearId').attr({'disabled':true,'required':false}).selectpicker('refresh');
                           //$('#OrdersHMonthId').attr({'disabled':true,'required':false}).selectpicker('refresh');
                           $('#OrdersHOnlyYearId').attr({'disabled':false,'required':true}).selectpicker('refresh');
                           
                          }
                         "/></label>
                       </div>
                      </th>
                    </tr>
                  
                    <tr>
                    <td></td>
                   	<td style="text-align:right">
                     <div class="form-group">
                            <label for="StartDate">Start Date :</label>
    						<input type="date" id="StartDate" name="start_date" class="form-control" id="StartDate" placeholder="Start Date" disabled="disabled">
                     </div>
                     <div class="form-group">     
  					        <label for="EndDate">End Date : </label> 
                            <input type="date" id="EndDate" name="end_date" class="form-control" id="EndDate" placeholder="End Date" disabled="disabled">
                     </div>
                    </td>
                    <td style="text-align:center" colspan="2">
                      <div class="form-group">
                            <label for="Month" style="margin-right:0px">Month :</label> 
                            <input type="month" id="Month" name="month" class="form-control"  placeholder="Month,Year" disabled="disabled">
                           <!-- <select name="year_id" id="OrdersHYearId" class="form-control col-md-7 col-xs-12 selectpicker show-menu-arrow"  disabled="disabled" title="Year"  >
                             <? for($i = 2016; $i <= 2050; $i++ )
		   						{
			  					 echo "<option value='$i'>$i</option>";
		   						}
							 ?>
                            </select>
                      </div>
                     <div class="form-group">     
  					        <label for="OrdersHMonthId" style="margin-right:0px">Month :</label> 
                            <select name="month_id" id="OrdersHMonthId" class="form-control col-md-7 col-xs-12 selectpicker show-menu-arrow"  disabled="disabled" title="Month"  >
                             <? foreach($months as $k=>$v )
		   						{
			  					 echo "<option value='$k'>$v</option>";
		   						}
							 ?>
                            </select>                -->
                      </div>
                    </td>
                    
                    <td style="text-align:right">
                      <div class="form-group">
                            <label for="OrdersHOnlyYearId" style="margin-right:0px">Year :</label> 
                            <select name="year_id" id="OrdersHOnlyYearId" class="form-control col-md-7 col-xs-12 selectpicker show-menu-arrow"  disabled="disabled" title="Year"  >
                             <? for($i = 2016; $i <= 2050; $i++ )
		   						{
			  					 echo "<option value='$i'>$i</option>";
		   						}
							 ?>
                            </select>
                            
                      </div>
                    </td>
			   </tr>
                    <tr>
                      <td colspan="2">
                      <div class="form-inline">
                       <label for="record_count" style="margin-right:0px">Number of records per page :</label> 
                       <select name="record_count" id="record_count" class="form-control  selectpicker show-menu-arrow"  >
                         <option value="10">10</option>
                         <option value="20">20</option>
                         <option value="50" selected="selected">50</option>
                         <option value="100">100</option>
                        </select>
                       </div>
                      </td>
                      <td colspan="3"></td>
                    </tr>
                    
                  </tbody>
                </table>
                 
              </div>
            </div>
           </div>
          
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" id="submit" class="btn btn-success">Submit</button>
              <a href="<?php echo $path ?>" class="btn btn-primary">Cancel</a> </div>
          </div>
          </form>
          <div>
                        <p>- Ctrl + S for Get Data</p>
                       
                     
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

</script>