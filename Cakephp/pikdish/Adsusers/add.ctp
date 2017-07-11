<?php $this->assign('title', 'Ads Users');?>
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
        
          <?php echo $this->Form->create('AdsUser',array('url' => 'add','method'=>'post','name'=>'addForm','class'=>'form-horizontal form-label-left',"enctype"=>"multipart/form-data") ); 
		  ?>
          
         <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Existing User <span class="required">*</span> </label>
           <div class="col-md-6 col-sm-6 col-xs-12"> <?php $options=array(
       "1"=>'Yes',
       "0"=>'No'
      ); echo $this->Form->input('AdsUser.is_exist_user', array('options'=>$options,'required'=>'true','label' => false, 'div' => false,'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','title'=>'Select Existing User'));?> </div>
         </div>

         <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User <span class="required">*</span> </label>
           <div class="col-md-6 col-sm-6 col-xs-12"> <?php if(empty($users)) $users = ''; echo $this->Form->input('AdsUser.user_id', array('options'=>$users,'required'=>'true','label' => false, 'div' => false,'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','title'=>'Select User'));?> </div>
         </div>

         <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Person Name <span class="required">*</span> </label>
           <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsUser.person_name', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','placeholder'=>'Person Name','pattern'=>"^[A-z ]{2,}$",'title'=>'Digit or Special Characters are not allow'));?> </div>
         </div>

         <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Business Name <span class="required">*</span> </label>
           <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsUser.business_name', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','autofocus'=>true,'placeholder'=>'Business Name'));?> 
             <label id="businesstype-error" class="error control-label col-md-3 col-sm-3 col-xs-12" style="width:100%; text-align:left; float:left; display:none"></label>           </div>
           </div>

           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Business Type <span class="required">*</span> </label>
             <div class="col-md-6 col-sm-6 col-xs-12"> <?php if(empty($buis_types)) $buis_types = ''; echo $this->Form->input('AdsUser.ads_business_type_id', array('options'=>$buis_types,'required'=>'true','label' => false, 'div' => false,'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','title'=>'Select Business Type'));?> </div>
           </div>


           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Business Address<span class="required">*</span> </label>
             <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsUser.business_address', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'textarea','autofocus'=>true,'placeholder'=>'Business Address'));?> 
               <label id="plan-name-error" class="error control-label col-md-3 col-sm-3 col-xs-12" style="width:100%; text-align:left; float:left; display:none"></label>           </div>
           </div>
           
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country<span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsUser.country_id', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','label' => false,  'div' => false,"data-live-search"=>"true", "data-live-search-style"=>"begins", "title"=>"Select Country"));?> </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">State<span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsUser.state_id', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','label' => false, 'div' => false,"data-live-search"=>"true", "data-live-search-style"=>"begins", "title"=>"Select State"));?> </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsUser.city_id', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','label' => false, 'div' => false,"data-live-search"=>"true", "data-live-search-style"=>"begins", "title"=>"Select City"));?> </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile No<span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsUser.mobile_no', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','autofocus'=>true,'placeholder'=>'Mobile No.[xxxxxxxxxx]','pattern'=>"[789]\d{9}"));?> 
            <label id="mobile-error" class="error control-label col-md-3 col-sm-3 col-xs-12" style="width:100%; text-align:left; float:left; display:none"></label></div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsUser.email', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'email','placeholder'=>'Email','pattern'=>'[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?'));?>
            <label id="customer-error" class="error control-label col-md-3 col-sm-3 col-xs-12" style="width:100%; text-align:left; float:left; display:none"></label>           </div>
          </div>
          
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" id="submit" class="btn btn-success">Submit</button>
              <a href="<?php echo $path ?>adsusers" class="btn btn-primary">Cancel</a> </div>
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
	window.location.href='<?php echo $path ?>adsusers';

});


function change_country(){
  // if(id == null) id=$( "#AdsUserCountryId" ).val();
	id=$( "#AdsUserCountryId" ).val();
	// if(id != null){
    jQuery.ajax({
                                    
                      async: true,
                      cache: false,
                      dataType: 'text',
                      url: '<?php echo $path;?>/Users/getState/' + id,
                      success: function(response) 
                  {
                    $("#AdsUserStateId").html(response) 
                    $("#AdsUserStateId").selectpicker('refresh');
                    return false; 
                  }
        });
  // }
}

function change_state(){
  // if(id == null) id=$( "#AdsUserStateId" ).val();
	id=$( "#AdsUserStateId" ).val();
	// if(id != null) {
      jQuery.ajax({
                                        
                                        async: true,
                                        cache: false,
                                        dataType: 'text',
                                        url: '<?php echo $path;?>/Users/getCity/' + id,
                                        success: function(response) 
                      {
                        $("#AdsUserCityId").html(response)  
                        $("#AdsUserCityId").selectpicker('refresh');
                        return false; 
                      }
            });
  // }
}

// $( "#AdsUserCountryId" ).change(change_country);
// $( "#AdsUserStateId" ).change(change_state);



function check_mail(){
	id=$( "#AdsUserEmail" ).val()
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
										  document.getElementById("AdsUserEmail").setCustomValidity("Please Specified different email id !");
									   }
									   else
									   {
										   $("#customer-error")										
									      .css({'display':'block','color':'green'})
										  . html(response.message)	
										  document.getElementById("AdsUserEmail").setCustomValidity("");
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
										  document.getElementById("AdsUserEmail").setCustomValidity("");
		 }
     }
	
}

$( "#AdsUserEmail" ).keyup(check_mail);
$( "#AdsUserEmail" ).change(check_mail);

function check_mobile(){
	val=$( "#AdsUserMobileNo" ).val()
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
										  document.getElementById("AdsUserMobileNo").setCustomValidity("Please Specified different mobile no !");
										  $( "#AdsUserUsername" ).val("");
									   }
									   
									   else
									   {
										   $("#mobile-error")										
									      .css({'display':'block','color':'green'})
										  . html(response.message)	
										  document.getElementById("AdsUserMobileNo").setCustomValidity("");
										  $( "#AdsUserUsername" ).val(val);
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
										  document.getElementById("AdsUserMobileNo").setCustomValidity("");
										  $( "#AdsUserUsername" ).val("");
		 }
     }
	
}

$( "#AdsUserMobileNo" ).keyup(check_mobile);
$( "#AdsUserMobileNo" ).change(check_mobile);



$( "#AdsUserCountryId" ).val(<?=$settings['Setting']['default_country']?>)
// change_country();


$( "body #AdsUserAddForm #AdsUserStateId" ).on("mouseenter", function () {
      alert('hi');
      id=$( "body #AdsUserAddForm #AdsUserCountryId" ).val();
      // if(id != null){
        jQuery.ajax({
                                        
                          async: true,
                          cache: false,
                          dataType: 'text',
                          url: '<?php echo $path;?>/Users/getState/' + id,
                          success: function(response) 
                      {
                        $(this).html(response) 
                        $(this).selectpicker('refresh');
                        return false; 
                      }
            });
});

$( "body #AdsUserAddForm #AdsUserCityId" ).on("mouseenter", function (e) {

      alert('hi');
    // (id != null) {
      id=$( "body #AdsUserAddForm #AdsUserStateId" ).val();
          jQuery.ajax({
                                            
                                async: true,
                                cache: false,
                                dataType: 'text',
                                url: '<?php echo $path;?>/Users/getCity/' + id,
                                success: function(response) 
                          {
                            $(this).html(response)  
                            $(this).selectpicker('refresh');
                            return false; 
                          }
                });
});


// if($('#AdsUserIsExistUser').val()){
  jQuery('#AdsUserUserId').change(function(e){
      // alert('Hi');
        e.preventDefault();
        // return false;
        e.stopPropagation();
        id=$("#AdsUserUserId").val();
        var this_elm = $('#AdsUserUserId');
        jQuery.ajax({
                                          
                        async: true,
                        cache: false,
                        dataType: 'json',
                        url: '<?php echo $path;?>/Adsusers/getUserInfo/' + id,
                        success: function(data) 
                        {
                          console.log('hi');

                          // $( "#AdsUserCountryId" ).val(data.country);
                          // $( "#AdsUserCountryId" ).change(change_country);
                          // $( "#AdsUserStateId" ).change(change_state);
                          // change_country(data.country);
                          // change_state(data.state);
                          // $("#AdsUserCountryId").val(data.country).change(); 
                          console.log(data);
                          console.log(data.country);
                          console.log(data.state);
                          console.log(data.city);
                          // $("#AdsUserCountryId").val(data.country).change(); 
                          // $("#AdsUserCountryId").val(data.country).attr('selected','selected'); 
                          $("#AdsUserCountryId").val(data.country).change(); 
                          // $("#AdsUserCountryId").val(data.country); 
                          // change_country();
                          // change_state();
                          // $("#AdsUserCountryId").html(data.country); 
                          // $('#AdsUserStateId option[value="'+data.state+'"]').attr('disabled', 'true');
                          // $("#AdsUserCountryId").selectpicker('refresh');
                          // $("#AdsUserStateId").val(data.state).attr('selected', 'selected'); 
                          // jQuery("#AdsUserStateId option[value='"+data.state +"']").attr('selected', 'selected'); 
                          // $('#AdsUserStateId').change(function() {
                          //     $(this).val(data.state); //will work here
                          // });
                          // $("#AdsUserStateId").val(data.state).change(); 
                          // $('select').val(0);
                          var option = $("<option />", {
                          "value" : data.state_code, 
                          "text"  : data.state_name,
                          "selected"  : true
                          });
                          $("#AdsUserStateId").append(option);
                          this_elm.closest('#AdsUserAddForm').find("#AdsUserStateId").val(data.state_code).change();
                          // $("#AdsUserStateId").selectpicker('refresh');

                          var option = $("<option />", {
                          "value" : data.city_code, 
                          "text"  : data.city_name,
                          "selected"  : true
                          });
                          $("#AdsUserCityId").append(option);
                          this_elm.closest('#AdsUserAddForm').find("#AdsUserCityId").val(data.city_code).change(); 
                          // $("#AdsUserCityId").selectpicker('refresh');
                          // $(this).closest().find("#AdsUserStateId").val(data.state).change(); 
                          // $("#AdsUserStateId").val(data.state); 
                          // $("#AdsUserStateId").val(data.state).change(); 
                          // $('[name=data[AdsUser][state_id]]').val(data.state); 
                          // $("#AdsUserStateId").selectpicker('refresh');
                          // $("#AdsUserCityId").val(data.city).change(); 
                          // $("#AdsUserCityId").val(data.city).change(); 
                          // $('select').val(0);
                          // change_state();
                          // $("#AdsUserCityId").val(data.city).change(); 
                          // var option = $("<option />", {
                          // "value" : "32", 
                          // "text"  : "Dhaka",
                          // "selected"  : true
                          // });
                          // $("#AdsUserCityId").append(option);
                          // $("#AdsUserCityId").val(32).change();
                          // $("#AdsUserCityId").val(data.city); 
                          // $("#AdsUserStateId").selectpicker('refresh');
                          $("#AdsUserMobileNo").val(data.mobile_no); 
                          $("#AdsUserEmail").val(data.email); 
                          // $("#AdsUserMobileNo").selectpicker('refresh');
                          return false; 
                        }
              });
    
    // return true; 

  });
// }


// $( "body #AdsUserAddForm #AdsUserCityId" ).on("click", function (e) {
//     e.preventDefault();
//     e.stopPropagation();
//       alert('hi'); 
// })


jQuery('#AdsUserIsExistUser').change(function(e){
    // alert('Hi');
      e.preventDefault();
      // return false;
      e.stopPropagation();
      // id=$("#AdsUserIsExistUser").val();
      var this_elm = $('#AdsUserUserId');
      jQuery.ajax({
                                        
                      async: true,
                      cache: false,
                      dataType: 'json',
                      url: '<?php echo $path;?>/Adsusers/getExistingUserInfo/' + '<?php echo $restaurant_id; ?>',
                      success: function(data) 
                      {
                        console.log('hi');

                        // $( "#AdsUserCountryId" ).val(data.country);
                        // $( "#AdsUserCountryId" ).change(change_country);
                        // $( "#AdsUserStateId" ).change(change_state);
                        // change_country(data.country);
                        // change_state(data.state);
                        // $("#AdsUserCountryId").val(data.country).change(); 
                        console.log(data);
                        console.log(data.country);
                        console.log(data.state);
                        console.log(data.city);
                        // $("#AdsUserCountryId").val(data.country).change(); 
                        // $("#AdsUserCountryId").val(data.country).attr('selected','selected'); 
                        $("#AdsUserCountryId").val(data.country).change(); 
                        // $("#AdsUserCountryId").val(data.country); 
                        // change_country();
                        // change_state();
                        // $("#AdsUserCountryId").html(data.country); 
                        // $('#AdsUserStateId option[value="'+data.state+'"]').attr('disabled', 'true');
                        // $("#AdsUserCountryId").selectpicker('refresh');
                        // $("#AdsUserStateId").val(data.state).attr('selected', 'selected'); 
                        // jQuery("#AdsUserStateId option[value='"+data.state +"']").attr('selected', 'selected'); 
                        // $('#AdsUserStateId').change(function() {
                        //     $(this).val(data.state); //will work here
                        // });
                        // $("#AdsUserStateId").val(data.state).change(); 
                        // $('select').val(0);
                        var option = $("<option />", {
                        "value" : data.state_code, 
                        "text"  : data.state_name,
                        "selected"  : true
                        });
                        $("#AdsUserStateId").append(option);
                        this_elm.closest('#AdsUserAddForm').find("#AdsUserStateId").val(data.state_code).change();
                        // $("#AdsUserStateId").selectpicker('refresh');

                        var option = $("<option />", {
                        "value" : data.city_code, 
                        "text"  : data.city_name,
                        "selected"  : true
                        });
                        $("#AdsUserCityId").append(option);
                        this_elm.closest('#AdsUserAddForm').find("#AdsUserCityId").val(data.city_code).change(); 
                        // $("#AdsUserCityId").selectpicker('refresh');
                        // $(this).closest().find("#AdsUserStateId").val(data.state).change(); 
                        // $("#AdsUserStateId").val(data.state); 
                        // $("#AdsUserStateId").val(data.state).change(); 
                        // $('[name=data[AdsUser][state_id]]').val(data.state); 
                        // $("#AdsUserStateId").selectpicker('refresh');
                        // $("#AdsUserCityId").val(data.city).change(); 
                        // $("#AdsUserCityId").val(data.city).change(); 
                        // $('select').val(0);
                        // change_state();
                        // $("#AdsUserCityId").val(data.city).change(); 
                        // var option = $("<option />", {
                        // "value" : "32", 
                        // "text"  : "Dhaka",
                        // "selected"  : true
                        // });
                        // $("#AdsUserCityId").append(option);
                        // $("#AdsUserCityId").val(32).change();
                        // $("#AdsUserCityId").val(data.city); 
                        // $("#AdsUserStateId").selectpicker('refresh');
                        $("#AdsUserMobileNo").val(data.mobile_no); 
                        $("#AdsUserEmail").val(data.email); 
                        // $("#AdsUserMobileNo").selectpicker('refresh');
                        return false; 
                      }
            });
  
  // return true; 

});

</script>