<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>Edit Vendor</h3>
    </div>
    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel"> <?php echo $this->Session->flash(); ?>
        <div class="x_content"> <br />
          <?php echo $this->Form->create('Vendor',array('class'=>'form-horizontal form-label-left')); ?>
           <div class="container">
            <div class="row clearfix">
              <div class="col-md-12 column" >
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span> </label>
                    <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('id',array('type'=>'hidden')),
                    $this->Form->input('name', array('label'=>false,'div'=>false, 'class'=>'form-control','placeholder'=>'Name'));?> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <span class="required">*</span> </label>
                    <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('address', array('label'=>false,'div'=>false, 'class'=>'form-control','placeholder'=>'Address'));?> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country_id">Country <span class="required">*</span> </label>
                    <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('country_id', array('options'=>$country,
			'type'=>'select',
			'class'=>'form-control selectpicker col-md-7 col-xs-12',
			'autocomplete'=>'off',
                        "data-live-search"=>"true",
                        "data-live-search-style"=>"begins",
			'label'=>false,'div'=>false, 'empty'=>'-- Select Country --'));?> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state_id">State <span class="required">*</span> </label>
                    <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('state_id', array('options'=>$state,
			'type'=>'select',
			'class'=>'form-control selectpicker col-md-7 col-xs-12',
			'autocomplete'=>'off',
                        "data-live-search"=>"true",
                        "data-live-search-style"=>"begins",
			'label'=>false,'div'=>false, 'empty'=>'-- Select State --'));?> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city_id">City <span class="required">*</span> </label>
                    <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('city_id', array('options'=>$city,
			'type'=>'select',
			'class'=>'form-control selectpicker col-md-7 col-xs-12',
			'autocomplete'=>'off',
                        "data-live-search"=>"true",
                        "data-live-search-style"=>"begins",
			'label'=>false,'div'=>false, 'empty'=>'-- Select City --'));?> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile_no">Mobile <span class="required">*</span> </label>
                    <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('mobile_no', array('label'=>false,'div'=>false, 'class'=>'form-control','placeholder'=>'Address'));?> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span> </label>
                    <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('email', array('label'=>false,'div'=>false, 'class'=>'form-control','placeholder'=>'Address'));?> </div>
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
    window.location.href= base_url+'inventories/vendor';
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
function change_country() {
   id = $("#VendorCountryId").val();
   jQuery.ajax({
      async: true,
      cache: false,
      dataType: 'text',
      url: base_url+'Users/getState/' + id,
      success: function(response) {
         $("#VendorStateId").html('<option value="">-- Select State --</option>' + response);
         $("#VendorCityId").html('<option value="">-- Select City --</option>');
         $("#VendorStateId").selectpicker('refresh');
         return false;
      }
   });
}

function change_state() {
   id = $("#VendorStateId").val();
   jQuery.ajax({
      async: true,
      cache: false,
      dataType: 'text',
      url: base_url+'Users/getCity/' + id,
      success: function(response) {
         $("#VendorCityId").html('<option value="">-- Select City --</option>' + response);
         $("#VendorCityId").selectpicker('refresh');
         return false;
      }
   });
}
$("#VendorCountryId").change(change_country);
$("#VendorStateId").change(change_state);
</script>


