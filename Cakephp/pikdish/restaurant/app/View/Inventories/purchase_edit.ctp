<?php 
echo $this->Html->css('datepicker/dcalendar.picker');
echo $this->Html->script('datepicker/dcalendar.picker');?>
<style>
    .form-control{
        width:100%;
    }
</style>
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>Edit Purchase</h3>
    </div>
    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel"> <?php echo $this->Session->flash(); ?>
        <div class="x_content"> <br />
          <?php echo $this->Form->create('PurchaseH',array('class'=>'form-horizontal form-label-left') ); ?>
           <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 column" >
                    <div class="col-md-4" >
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vendor_id">Vendor <span class="required">*</span> </label>
                            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo 
                            $this->Form->input('id',array('type'=>'hidden')),
                            $this->Form->input('vendor_id', array('options'=>$vendor,
			'type'=>'select',
			'class'=>'form-control selectpicker',
                                'autocomplete'=>'off',
                                "data-live-search-style"=>"begins",
                        "data-live-search"=>"true",
			'label'=>false,'div'=>false, 'empty'=>'-- Select Vendor --'));?> </div>
                        </div>
                    </div>
                <div class="col-md-4" >
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vch_no">Vch No <span class="required">*</span> </label>
                            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('vch_no', array('label'=>false,'div'=>false, 'class'=>'form-control ','placeholder'=>'Vch No'));?> </div>
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vch_date">Vch Date <span class="required">*</span> </label>
                            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('vch_date', array('type'=>'text', 'label'=>false,'div'=>false, 'class'=>'form-control datepicker', 'placeholder'=>'Vch Date'));?> </div>
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bill_no">Bill No <span class="required">*</span> </label>
                            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('bill_no', array('label'=>false,'div'=>false, 'class'=>'form-control','placeholder'=>'Bill No'));?> </div>
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bill_date">Bill Date <span class="required">*</span> </label>
                            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('bill_date', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'form-control datepicker','placeholder'=>'Bill Date'));?> </div>
                        </div>
                    </div>
                <table class="table table-bordered table-hover" id="tab_logic">
                  <thead>
                    <tr  style="background:#FF9" >
                      <th width="1%" class="text-center"> S.No. </th>
					  <th class="text-center">Material*</th>
                      <th width="10%" class="text-center">Qty</th>
                      <th width="10%" class="text-center">Unit</th>
                      <th width="10%" class="text-center">Rate</th>
                      <th width="10%" class="text-center">Tax</th>
                      <th width="7%" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($this->request->data['PurchaseL'] as $k=>$list):
                          ?>
                    <tr class="tdr" id='addr1'>
                       <td class="sr" style="text-align:center; padding-top:12px;background:#FF9"><?php echo ($k+1);?></td>
                       <td>
                           <?php echo $this->Form->input('PurchaseL.'.$k.'.id',array('type'=>'hidden')),
                           $this->Form->input('PurchaseL.'.$k.'.material_id',array('type'=>'select','label'=>false, 'options'=>$material,'default'=>$list['material_id'],  'class'=>'form-control','placeholder'=>'Qty',  'required'=>true));?>
                       </td>
                       <td>
                           <?php echo $this->Form->input('PurchaseL.'.$k.'.qty',array( 'class'=>'form-control float qty','label'=>false,'placeholder'=>'Qty', 'value'=>$list['qty'], 'required'=>true));?>
                       <td><?php echo $this->Form->input('PurchaseL.'.$k.'.unit_id',array('type'=>'select','label'=>false,'options'=>$unit,'default'=>$list['unit_id'],  'class'=>'form-control','placeholder'=>'Qty', 'required'=>true));?>
                       </td>
                       <td>
                           <?php echo $this->Form->input('PurchaseL.'.$k.'.rate',array( 'class'=>'form-control float rate','label'=>false,'placeholder'=>'Rate', 'value'=>$list['rate'], 'required'=>true));?>
                           </td>
                       <td><?php echo $this->Form->input('PurchaseL.'.$k.'.tax_amt',array( 'class'=>'form-control float tax','label'=>false,'placeholder'=>'Tax', 'value'=>$list['tax_amt'], 'required'=>true));?>
                           </td>
                       <td>
                          <div style='font-size:20px; cursor:pointer;'>
                             <a class="add_row"><i class='fa fa-plus btn_add'></i></a>&nbsp;&nbsp;<i class='fa fa-trash deleteCls'></i>
                          </div>
                       </td>
                    </tr>
                    <?php endforeach;?>
                 </tbody>
                </table>
                    <div class="col-md-6" >
                        
                    </div>
                    <div class="col-md-6" >
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_amt">Total Tax Amt</label>
                            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('tax_amt', array('type'=>'text', 'readonly'=>true, 'label'=>false,'div'=>false, 'class'=>'form-control total_tax', 'placeholder'=>''));?> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bill_amt">Bill Amt</label>
                            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('bill_amt', array('type'=>'text', 'readonly'=>true, 'label'=>false,'div'=>false, 'class'=>'form-control total_amt', 'placeholder'=>''));?> </div>
                        </div>
                    </div>
              </div>
            </div>
           </div>
          
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" id="submit" class="btn btn-success">Submit</button>
              <a href="<?php echo $path ?>categories" class="btn btn-primary">Cancel</a> </div>
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
<script>
$(document).ready(function(){
    $(document).bind('keydown', function(event) {
      //19 for Mac Command+S
    if (!( String.fromCharCode(event.which).toLowerCase() == 's' && event.ctrlKey) && !(event.which == 19)) return true;
        event.preventDefault();
        $("#submit").click();
        return false;
    });
});
shortcut.add("Ctrl+C",function() {
    window.location.href= base_url+'inventories/material';
});
$('body').on('keydown', 'input, select, textarea', function(e) {
   var self = $(this),
      form = self.parents('form:eq(0)'),
      focusable, next, prev;
   if (e.shiftKey) {
      if (e.keyCode == 13) {
         focusable = form.find('input,a,select,button,textarea').filter(':visible:not([readonly]):enabled');
         prev = focusable.eq(focusable.index(this) - 1);
         if (prev.length) {
            prev.focus();
         } else {
            form.submit();
         }
      }
   } else
   if (e.keyCode == 13) {
      focusable = form.find('input,a,select,button,textarea').filter(':visible:not([readonly]):enabled');
      next = focusable.eq(focusable.index(this) + 1);
      if (next.length) {
         next.focus();
      } else {
         form.submit();
      }
      return false;
   }
});
$(document).ready(function(){
    $('.datepicker').dcalendarpicker({format: 'yyyy-mm-dd'});
});
$('#submit').click(function(){
     cal_amt();
});
var last_del = $('.sr').toArray().length + 1;

$(document).on('click','.deleteCls',function(){
    $(this).parents('tr').remove();
    cal_amt();
});
$(document).on('click','.btn_add',function(){
    tds = $('.tdr').toArray();
    l = tds.length + 1;
    str = '<tr class="tdr" id="addr'+last_del+'">'
                        +'<td class="sr" style="text-align:center; padding-top:12px;background:#FF9">'+l+'</td>'
                        +'<td><select autofocus="autofocus" class="form-control" name="data[PurchaseL]['+l+'][material_id]" required="required">'
                                +'<option value="">-- Select Material --</option>'
                                +'<?php foreach($material as $key=>$list){
                                   echo '<option value="'.$key.'">'.$list.'</option>'; 
                                }?>'
                            +'</select></td>'
                        +'<td><input autofocus="autofocus" class="form-control float qty" name="data[PurchaseL]['+l+'][qty]" placeholder="Qty" required="required"></td>'
                        +'<td><select autofocus="autofocus" class="form-control" name="data[PurchaseL][0][unit_id]" required="required">'
                               +'<option value="">-- Select Unit --</option>'
                               +'<?php foreach($unit as $key=>$list){
                                  echo '<option value="'.$key.'">'.$list.'</option>'; 
                               }?>'
                           +'</select></td>'
                        +'<td><input autofocus="autofocus" class="form-control float rate" name="data[PurchaseL]['+l+'][rate]" placeholder="Rate" required="required"></td>'
                        +'<td><input autofocus="autofocus" class="form-control float tax" name="data[PurchaseL]['+l+'][tax_amt]" placeholder="Tax" required="required"></td>'
                        +'<td>'
                           +'<div style="font-size:20px; cursor:pointer;">'
                              +'<a class="add_row"><i class="fa fa-plus btn_add"></i></a>&nbsp;&nbsp;<i class="fa fa-trash deleteCls"></i>'
                           +'</div>'
                        +'</td>'
                     +'</tr>';
    last_del++;
    $('#tab_logic').append(str);
});
function addRow() {
  
}
$(".add_row").click(addRow);
$('table').delegate('keydown','.float' ,function (e) {
	if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
		(e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
		(e.keyCode >= 35 && e.keyCode <= 40)) {
			return;
		}
	if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
		e.preventDefault();
	}
});
var total_tax,total_amt;
$('table').on('keyup','.tax,.qty,.rate',function(){
    cal_amt();
});
function cal_amt(){
    total_tax = 0;
    total_amt = 0;
   $('.tdr').each(function(){
       qty = $(this).find('.qty').val();
       tax = $(this).find('.tax').val();
       rate = $(this).find('.rate').val();
       if(qty&&tax&&rate){
           total_tax +=strip(tax);
           total_amt +=(strip(rate)*strip(qty))
       }
   });
   $('.total_tax').val(strip(total_tax));
   $('.total_amt').val(strip(total_amt));
}
function strip(number) {
    if(!number){return 0;}
    number = parseFloat(number);
    return (parseFloat(number.toPrecision(6)));
}
</script>
