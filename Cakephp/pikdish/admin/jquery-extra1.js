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