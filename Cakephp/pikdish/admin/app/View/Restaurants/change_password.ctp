<?php $this->assign('title', 'Change Password');

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
	   
</style>
<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Change Password</h3>
    </div>
    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12" style="min-height:500px;">
      <div class="x_panel"> <?php echo $this->Session->flash(); ?>
        <div class="x_content" style="min-height:inherit"> <br />
        
          <?php 
		   echo $this->Form->create('User',array('method'=>'post','name'=>'editForm','class'=>'form-horizontal form-label-left','type'=>'file') ); 
		   echo $this->Form->hidden('User.id');
		  ?>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">New Password <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('User.password', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'autofocus'=>true,'placeholder'=>'Password','value'=>"",'pattern'=>'^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$','title'=>"Password must be between 7 to 15 characters contain at least one numeric digit and a special character"));?></div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Xerox Password <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('confirm_password', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'password','value'=>"",'placeholder'=>'Xerox Password','pattern'=>'^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$'));?></div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" id="submit" class="btn btn-success">Submit</button>
              <a href="<?php echo $path ?>restaurants" class="btn btn-primary">Cancel</a> </div>
          </div>
          </form>
          <div style="float:left; margin-top:220px">
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
	window.location.href='<?php echo $path ?>restaurants';

});

var password = document.getElementById("UserPassword");
var confirm_password = document.getElementById("UserConfirmPassword");

function validatePassword(){
  if(password.value != confirm_password.value)
   {
     confirm_password.setCustomValidity("Password don't match");
   }
   else
   {
	   confirm_password.setCustomValidity("");
   }
   return true;
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;





</script>