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