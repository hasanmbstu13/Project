<?php $this->assign('title', 'Ads Plan');

// echo $this->Html->script(array('/js/shortcut/shortcut.js'));
// echo $this->Html->script($path.'js/lightbox/js/lightbox.min.js');
// echo $this->Html->css($path.'js/lightbox/css/lightbox.min.css');

?>


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
		   width:42% !important;
		}
	    input[type=radio]
	    {
		   padding-top:5px;
		   width:5% !important;
		}
	     .bs-searchbox input
	    {
		    width:100% !important;
		}
</style>
<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Edit Ads Plan</h3>
    </div>
    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel"> <?php echo $this->Session->flash(); ?>
        <div class="x_content"> <br />
        
          <?php echo $this->Form->create('AdsPlan',array('url' => 'edit','method'=>'post','name'=>'editForm','class'=>'form-horizontal form-label-left',	  'enctype'=>'multipart/form-data') ); 
		  echo $this->Form->hidden('AdsPlan.id');
		  ?>
         
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Plan Name <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsPlan.plan_name', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','autofocus'=>true,'placeholder'=>'Plan Name'));?> 
              <label id="plan-name-error" class="error control-label col-md-3 col-sm-3 col-xs-12" style="width:100%; text-align:left; float:left; display:none"></label>           </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Per Day show count <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsPlan.no_show_per_day', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'number','autofocus'=>true,'placeholder'=>'Per Day show count'));?> 
                <label id="per-day-show-error" class="error control-label col-md-3 col-sm-3 col-xs-12" style="width:100%; text-align:left; float:left; display:none"></label>           </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Days <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsPlan.total_period_days', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'number','autofocus'=>true,'placeholder'=>'Total Days'));?> 
                  <label id="total-days-error" class="error control-label col-md-3 col-sm-3 col-xs-12" style="width:100%; text-align:left; float:left; display:none"></label>           </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">With Design Amount <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsPlan.with_design_amt', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'number','autofocus'=>true,'placeholder'=>'With Design Amount'));?> 
                    <label id="with-design-amt-error" class="error control-label col-md-3 col-sm-3 col-xs-12" style="width:100%; text-align:left; float:left; display:none"></label>           </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Without Design Amount <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsPlan.without_design_amt', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'number','autofocus'=>true,'placeholder'=>'Without Design Amount'));?> 
                      <label id="without-design-amt-error" class="error control-label col-md-3 col-sm-3 col-xs-12" style="width:100%; text-align:left; float:left; display:none"></label>           </div>
                    </div>
          
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" id="submit" class="btn btn-success">Submit</button>
              <a href="<?php echo $path ?>adsplans" class="btn btn-primary">Cancel</a> </div>
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
	window.location.href='<?php echo $path ?>adsplans';

});

</script>