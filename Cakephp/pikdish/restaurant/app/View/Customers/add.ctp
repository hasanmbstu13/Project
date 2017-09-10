<?php $this->assign('title', 'Customers');?>
<?php  
echo $this->Html->script(array('/js/shortcut/shortcut.js'));
//echo $this->Html->script(array('/js/datepicker/dcalendar.picker.js'));
//echo $this->Html->css(array('/js/datepicker/dcalendar.picker.css'));

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
		   border-radius: 4px !important;
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
      <h3>Add New <?=$title;?></h3>
    </div>
    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel"> <?php echo $this->Session->flash(); ?>
        <div class="x_content"> <br />
        
          <?php echo $this->Form->create('User',array('url' => 'add','method'=>'post','name'=>'addForm','class'=>'form-horizontal form-label-left',"enctype"=>"multipart/form-data") ); 
		  echo $this->Form->hidden('User.user_type',array("value"=>$user_type));
		  ?>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('User.mobile_no', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','autofocus'=>true,'placeholder'=>'Mobile No.[xxxxxxxxxx]','pattern'=>"[789]\d{9}"));?> 
    <label id="mobile-error" class="error control-label col-md-3 col-sm-3 col-xs-12" style="width:100%; text-align:left; float:left; display:none"></label>           </div>
          </div>
         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('User.username', array('required'=>'false', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'placeholder'=>'Username','readonly'=>'readonly'));?>
    </div>
          </div>
		   <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('User.password', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'placeholder'=>'Password','pattern'=>'^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$','title'=>"Password must be between 7 to 15 characters contain at least one numeric digit and a special character"));?></div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Confirm Password <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('confirm_password', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'password','placeholder'=>'Confirm Password','pattern'=>'^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$'));?></div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('User.name', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','placeholder'=>'Customer Name','pattern'=>"^[A-z ]{2,}$",'title'=>'Digit or Special Characters are not allow'));?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('User.email', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'email','placeholder'=>'Email','pattern'=>'[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?'));?>
    <label id="customer-error" class="error control-label col-md-3 col-sm-3 col-xs-12" style="width:100%; text-align:left; float:left; display:none"></label>           </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Gender">Gender <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <input required="required"  type="radio" name="data[User][gender]" value="0" checked="checked" />Male<input type="radio" value="1" name="data[User][gender]" required/>Female </div>
          </div>
           <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date of birth <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('User.dob', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','placeholder'=>'Date of birth'));?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Marriage Anniversary <span class="required"></span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('User.anniversary_date', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','placeholder'=>'Anniversary Date'));?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Food type <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top:8px">
                
                 <input     type="radio" name="data[User][food_type_id]" value="0" checked="checked" /><img src='<?=$imgpath?>/green.jpg' title="Veg" width='24'  /> Veg <input  type="radio" value="1" name="data[User][food_type_id]" required/><img src='<?=$imgpath?>/red.jpg' width='26' title="Non-Veg"  />Non-Veg</div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country<span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('User.country_id', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','label' => false,  'div' => false,"data-live-search"=>"true", "data-live-search-style"=>"begins", "title"=>"Select Country"));?> </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">State<span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('User.state_id', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','label' => false, 'div' => false,"data-live-search"=>"true", "data-live-search-style"=>"begins", "title"=>"Select State"));?> </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('User.city_id', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','label' => false, 'div' => false,"data-live-search"=>"true", "data-live-search-style"=>"begins", "title"=>"Select City"));?> </div>
          </div>
        
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php 
			$options=array(
			 "1"=>'Active',
			 "0"=>'Inactive'
			);
			echo $this->Form->input('User.status', array('options'=>$options,'required'=>'true','label' => false, 'div' => false,'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','title'=>'Select Status'));?> </div>
          </div>
		   <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Upload Pic <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('User.user_pic', array('type'=>'file', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'class' => 'form-control col-md-7 col-xs-12',));?> </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" id="submit" class="btn btn-success">Submit</button>
              <a href="<?php echo $path ?>customers" class="btn btn-primary">Cancel</a> </div>
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
	window.location.href='<?php echo $path ?>customers';

});


function change_country(){
	id=$( "#UserCountryId" ).val()
	jQuery.ajax({
                                    
                                    async: true,
                                    cache: false,
                                    dataType: 'text',
                                    url: '<?php echo $path;?>/Users/getState/' + id,
                                    success: function(response) 
									{
										$("#UserStateId").html(response)	
										$("#UserStateId").selectpicker('refresh');
										return false; 
									}
				});
}

function change_state(){
	id=$( "#UserStateId" ).val()
	jQuery.ajax({
                                    
                                    async: true,
                                    cache: false,
                                    dataType: 'text',
                                    url: '<?php echo $path;?>/Users/getCity/' + id,
                                    success: function(response) 
									{
										$("#UserCityId").html(response)	
										$("#UserCityId").selectpicker('refresh');
										return false; 
									}
				});
}
$( "#UserCountryId" ).change(change_country);
$( "#UserStateId" ).change(change_state);

function check_mail(){
	id=$( "#UserEmail" ).val()
	if(id!=="")
	{
	
	pattern=/^[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?$/;
	
	if(pattern.test(id)){
	jQuery.ajax({
                                    
                                    async: true,
                                    cache: false,
                                    dataType: 'json',
                                    url: '<?php echo $path;?>/Users/checkUser/' + id,
                                    success: function(response) 
									{   
									   if(response.status=="error")
									   {
									    $("#customer-error")										
									      .css({'display':'block','color':'red'})
										  . html(response.message)	
										  document.getElementById("UserEmail").setCustomValidity("Please Specified different email id !");
									   }
									   else
									   {
										   $("#customer-error")										
									      .css({'display':'block','color':'green'})
										  . html(response.message)	
										  document.getElementById("UserEmail").setCustomValidity("");
									   }
										return false; 
									}
				});
         }
		 else
		 {
			                               $("#customer-error")										
									      .css({'display':'none','color':'red'})
										  . html("")	
										  document.getElementById("UserEmail").setCustomValidity("");
		 }
     }
	
}

$( "#UserEmail" ).keyup(check_mail);
$( "#UserEmail" ).change(check_mail);

function check_mobile(){
	val=$( "#UserMobileNo" ).val()
	if(val!=="")
	{
	
	pattern=/^[789]\d{9}$/;
	
	if(pattern.test(val)){
	jQuery.ajax({
                                    
                                    async: true,
                                    cache: false,
                                    dataType: 'json',
                                    url: '<?php echo $path;?>/Users/checkmobile/' + val,
                                    success: function(response) 
									{   
									   if(response.status=="error")
									   {
									    $("#mobile-error")										
									      .css({'display':'block','color':'red'})
										  . html(response.message)	
										  document.getElementById("UserMobileNo").setCustomValidity("Please Specified different mobile no !");
										  $( "#UserUsername" ).val("");
									   }
									   
									   else
									   {
										   $("#mobile-error")										
									      .css({'display':'block','color':'green'})
										  . html(response.message)	
										  document.getElementById("UserMobileNo").setCustomValidity("");
										  $( "#UserUsername" ).val(val);
									   }
										return false; 
									}
				});
         }
		 else
		 {
			                               $("#mobile-error")										
									      .css({'display':'none','color':'red'})
										  . html("")	
										  document.getElementById("UserMobileNo").setCustomValidity("");
										  $( "#UserUsername" ).val("");
		 }
     }
	
}

$( "#UserMobileNo" ).keyup(check_mobile);
$( "#UserMobileNo" ).change(check_mobile);

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
$( "#UserCountryId" ).val(<?=$settings['Setting']['default_country']?>)
change_country();
//$('#UserDob').datepicker({dateFormat:'dd-mm-yy',changeMonth: true,changeYear: true});
//$('#UserAnniversaryDate').datepicker({dateFormat:'dd-mm-yy',changeMonth: true,changeYear: true});
jQuery(function($){
   $("#UserAnniversaryDate").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
    $("#UserDob").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
  });
</script>