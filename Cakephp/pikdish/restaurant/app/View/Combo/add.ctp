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
	   input[type=radio]{width:15% !important;
	   margin:0px !important}

	   input[type=checkbox]{width:15% !important;
	   margin:0px !important}
	   .tmp:focus
	   {
		       border: 1px solid #ccc !important;

	   }
	   
</style>
<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Add New Combo Offer</h3>
    </div>
    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel"> <?php echo $this->Session->flash(); ?>
        <div class="x_content">
          <?php echo $this->Form->create('ComboOffer',array('url'=>'add','method'=>'post','name'=>'editForm','class'=>'form-horizontal form-label-left') ); 
		        echo $this->Form->hidden('ComboOffer.restaurant_id',array("value"=>$this->Session->read('restro_id')));
		  ?>
          
           <div class="container">
            <div class="row clearfix">
              
                <table class="table table-bordered table-hover" id="tab_logic">
				   <thead>
                    <tr style="background:#FF9" >
                      
					  <th width="30%" class="text-center">Combo Offer Name*</th>
                      <th width="25%" class="text-center">Start Date*</th>
                      <th width="25%" class="text-center">End Date*</th>
                      <th width="20%" class="text-center">Amount*</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr id='addr1' class="tdr">
                        
                        <td>
                          <input name="data[ComboOffer][offer_name]" required="required" class="form-control col-md-7 col-xs-12" autofocus="autofocus" placeholder="Offer Name" >
                        </td>
                        <td>
             <input name="data[ComboOffer][start_date]" required="required" class="form-control col-md-7 col-xs-12"  placeholder="Start Date" id="ComboOfferStartDate" onchange="check_date()">
                        </td>
                        <td>
                            <input name="data[ComboOffer][end_date]" required="required" class="form-control col-md-7 col-xs-12" autofocus="autofocus" placeholder="End Date" id="ComboOfferEndDate" onchange="check_date()" >
                        </td>
                        <td>
                         <input name="data[ComboOffer][amt]" required="required" class="form-control col-md-7 col-xs-12"  placeholder="Amount" type="number" min="1">
                         </td>
             
                    </tr>
                    <tr>
                       <td width="100%" class="" colspan="4">
                            <label>Items*</label><br />
                        <select name="data[ComboItems][items_rate_id][]" id="ItemsRatePortionId" class="form-control col-md-7 col-xs-12 selectpicker show-menu-arrow" data-live-search="true" data-live-search-style="begins" title="Select Items" multiple="multiple"  data-done-button="true" data-width="50%" onchange="get_portions()" data-selected-text-format="count > 3" required>
						  <? for($i=0;$i<count($data);$i++) 
							 {  ?>
                              <option style="font-size:14px" value="<?=$data[$i]['ItemsRate']['id']?>" data-subtext="(<?=$data[$i]['Portion']['portion_name']?>)"><?=$data[$i]['Item']['item_name']?></option>
                          <? }?>
                       </select>  
                       <br /><br />
                       <table  class="table table-bordered table-hover "  id="rate_table"></table>
                       </td>
                       <!--<td >
                         <label>GST Applicable? </label>
                           <input type="checkbox" name="data[ComboOffer][gst_applicability]" value="1" style="width:15%" 
                           onchange="if(this.checked){$('#_gst_0').attr('disabled',false).focus();}else{$('#_gst_0').attr('disabled',true).val('');}" tabindex="1" /><br /><br />
                                        <input id="_gst_0" name="data[ComboOffer][gst_precentage]" required="required" class="form-control col-md-7 col-xs-12"  placeholder="GST Precentage" disabled="disabled"   step="0.01" type="number" min=0 >
                       </td> -->
                    </tr>
                    
                  </tbody>
                </table>
              
            </div>
           </div>
          
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" id="submit" class="btn btn-success">Submit</button>
              <a href="<?php echo $path ?>combo" class="btn btn-primary">Cancel</a> </div>
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
	window.location.href='<?php echo $path ?>combo';

});

function get_portions() 
{
	    
		label_arr = new  Array();
		span_arr = new  Array();
		val_arr = new  Array();
		
		k = 0;
	    $("#rate_table td").each(function() 
		{
			
			label_arr.push($(this).find("label").html());
			val_arr[label_arr[k]+'_'+$(this).find("span").html()]=$(this).find("input").val();
			span_arr[k]=label_arr[k]+'_'+$(this).find("span").html()
			
			k++;
		});
		//alert(span_arr);
		
	    var str = "<tr>"; i=0;
        $( "#ItemsRatePortionId option:selected" ).each(function() {
			if(i!=0 && i%3==0) str+= "</tr><tr>" ;
			//alert(span_arr[$(this).text()]+","+$(this).attr('data-subtext'));
			if($.inArray($(this).text()+'_'+$( this ).attr('data-subtext'),span_arr) == -1)
			{	
            str+='<td><label>'+$( this ).text()+'</label> <span>'+$( this ).attr('data-subtext')+'</span><input type="number" name="data['+(i+1)+'][ComboItems][qty]" value=""  required placeholder="quantity" class="form-control col-md-7 col-xs-12 tmp" min="1" /><input type="hidden" name="data['+(i+1)+'][ComboItems][items_rate_id]" value="'+$( this ).val()+'" /></td>';
			}
			else
			{
			str+='<td><label>'+$( this ).text()+'</label> <span>'+$( this ).attr('data-subtext')+'</span><input type="number" name="data['+(i+1)+'][ComboItems][qty]" value="'+val_arr[$( this ).text()+'_'+$( this ).attr('data-subtext')]+'"  required placeholder="quantity" class="form-control col-md-7 col-xs-12 tmp" min="1" /><input type="hidden" name="data['+(i+1)+'][ComboItems][items_rate_id]" value="'+$( this ).val()+'" /></td>';
				
			}
		    i++;
		   });
		str+="</tr>"
		$("#rate_table").html(str);
		
		td_arr= null;
		label_arr =null;	
}

jQuery(function($){
   $("#ComboOfferStartDate").mask("99-99-9999",{placeholder:"dd-mm-yyyy"});
   $("#ComboOfferEndDate").mask("99-99-9999",{placeholder:"dd-mm-yyyy"});
  });
  
  function check_date()
  {
	 var startDate = document.getElementById('ComboOfferStartDate');
     var endDate =document.getElementById('ComboOfferEndDate');
	 d1 = startDate.value.split('-');
	 d2 = endDate.value.split('-');
	 sD = new Date(d1[2],d1[1]-1,d1[0]);
	 eD = new Date(d2[2],d2[1]-1,d2[0]);
	 
     if(startDate.value !=="" && endDate.value !== "" )
	 {
      if(sD > eD)
	  {
         endDate.setCustomValidity("Offer end date must be greater than or equal to start date");       
		 //alert('badi hai');
      }
	  else
	  {
		 endDate.setCustomValidity("");
		 //alert('sahi hai');
	  }
	 }
	 else
	 {
		 endDate.setCustomValidity("");
	 }
	 
  }
</script>