<?php $this->assign('title', 'Settings');?>
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
		   width:125%
		   
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
      <h3>Settings </h3>
    </div>
    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel"><?php echo $this->Session->flash();?><div class="x_content">
         <?php echo $this->Form->create('Settings',array('name'=>'editForm','class'=>'form-horizontal form-label-left','type'=>'file') );  ?>
         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Google Map Key <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Setting.google_mapkey', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12 ','label' => false, 'div' => false,'type'=>'text','placeholder'=>'Google Map Key'));?>            </div>
         </div>
          
         
		  
         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Default Country<span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Setting.default_country', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','options'=>$countries,'label' => false,  'div' => false,"data-live-search"=>"true", "data-live-search-style"=>"begins", "title"=>"Select Country"));?> </div>
          </div>
          
         
        
          
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" id="submit" class="btn btn-success">Submit</button>
              <a href="<?php echo $path ?>" class="btn btn-primary">Cancel</a> </div>
          </div>
          </form>
          <div>
                        <p>- Ctrl + S for Save Data</p>
                        <p>- Ctrl + C for go to Home page</p>
                     
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
	window.location.href='<?php echo $path ?>';

});

</script>