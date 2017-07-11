<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>Add New Material</h3>
    </div>
    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel"> <?php echo $this->Session->flash(); ?>
        <div class="x_content"> <br />
          <?php echo $this->Form->create('Material',array('url'=>'material_add','method'=>'post','name'=>'editForm','class'=>'form-horizontal form-label-left') ); ?>
           <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 column" >
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="material_code">Material Code <span class="required">*</span> </label>
                    <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('material_code', array('label'=>false,'div'=>false, 'class'=>'form-control','placeholder'=>'Material Code'));?> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span> </label>
                    <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('name', array('label'=>false,'div'=>false, 'class'=>'form-control','placeholder'=>'Name'));?> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="is_stockable">Is Stockable? <span class="required">*</span> </label>
                    <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('is_stockable', array('options'=>array('1'=>'Yes','0'=>'No'),
			'type'=>'select',
			'class'=>'form-control',
			'autocomplete'=>'off',
			'label'=>false,'div'=>false, 'empty'=>'-- Is Stockable --'));?> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="unit_id">Unit <span class="required">*</span> </label>
                    <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('unit_id', array('options'=>$unit,
			'type'=>'select',
			'class'=>'form-control',
			'autocomplete'=>'off',
			'label'=>false,'div'=>false, 'empty'=>'-- Select Unit --'));?> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reorder_level">Re-order level <span class="required">*</span> </label>
                    <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('reorder_level', array('label'=>false,'div'=>false, 'class'=>'form-control','placeholder'=>'Re-order level'));?> </div>
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
</script>
