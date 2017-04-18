$(function(){
    $(".jsSelect2").select2();

    // var today = moment().format('DD-MMMM-YYYY 18:00');
    var today = moment().format('DD-MMMM-YYYY HH:mm');
    $('#est-deadline').val(today);

    // $('body').on('mouseenter','.leave-input-group-addon',function(e){
    //   e.preventDefault();
    //   var curr_elem = $(this).closest('.leave-info');
    //   // console.log($(this).closest('.date-time'));
    //    curr_elem.find('.leave-start-date').val(today);
    //    curr_elem.find('.leave-end-date').val(today);
    //    curr_elem.find('.date-time').datetimepicker({
    //       format: 'DD-MMMM-YYYY HH:mm'
    //    })
    // });

    $('body').on('click','.removePopover', function(e){
      e.preventDefault(); 
      // console.log($(this).closest('.popover'));   
      $(this).closest('.popover').popover('hide');
      $('body').on('hidden.bs.popover', function (e) {
          $(e.target).data("bs.popover").inState = { click: false, hover: false, focus: false }
      });
    }); 

    // Add an input when select other option
    $('#allocated-time').change(function(){
        if( $(this).val() == 'other'){
            if(!$('#other-option .form-group #other-time').length){
                $('#rebrModal').find('.allocated-time .error-msg p').remove();
                $('#other-option .form-group').append('<input id="other-time" name="other_time" type="text" class="form-control" placeholder = "Time in hrs e.g. 10.25" />');
            }
        }else{
            $('#other-time').remove();
             $('#rebrModal').find('.allocated-time .error-msg p').remove();
        }
    });


    $('#date_picker').datetimepicker({
        format: 'DD-MMMM-YYYY HH:mm'
    });

    $('.br-edit-deadline').datetimepicker({
        format: 'DD-MMMM-YYYY HH:mm'
    });

    $('.est_date_picker').datetimepicker({
        format: 'DD-MMMM-YYYY HH:mm'
    });   

    $('#est_date_picker').datetimepicker({
        format: 'DD-MMMM-YYYY HH:mm'
    });

    // This is for cancel link
    $('.hide_modal').on('click',function(e){
      e.preventDefault();
      // $('#rebrModal').modal('hide');
      $('.modal').modal('hide');
      $('.modal-backdrop').remove();
    });

    $('#leader_id').on('click', function(){
        $('#team_members').val($('#leader_id').val()).change();
    });


    $('.group').editable({

        success: function(response, newValue) {
            if(response.status == 'success') 
                success_msg(response.msg);
            else if(response.status == 'error')
                error_msg(response.msg);
        }
    });

    // This method will load dynamiccontent after successful brief creation 
     function load_dynamiccontent(url){
         $.ajax({
             type: "GET",
             url: '/workflowDynamic',
             success: function(data){
                 $('#work-flow-container').html(data);
             },
             error: function () {
                 error_msg("Sorry page can't load refresh again!!");
             }
         });
     }


    // This will created a new brief in database
    $('#client_brief').submit(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        e.preventDefault();
        if($('#other-option .form-group #other-time').length && !$('#other-time').val()){
               if(!$('#rebrModal').find('.allocated-time .error-msg p').text())
                 $('#rebrModal').find('.allocated-time .error-msg').append("<p style='color:red'>Please fill out this field</p>");
         } else if(!$('#allocated-time').val()){
             if(!$('#rebrModal').find('.allocated-time .error-msg p').text())
                $('#rebrModal').find('.allocated-time .error-msg').append("<p style='color:red'>Please select an allocated time</p>");           
         }else {    
                  $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    cache: false,
                    success: function(data, response ) {
                          // alert(data);
                          if(data.status == 'success'){
                              $('#rebrModal').modal('hide');
                              $('.modal').hide();
                              $('.modal-backdrop').remove();
                              load_dynamiccontent(data.url);
                          }else if (data.status == 'error') {
                             error_msg(data.msg);
                          }
                    }
                  });
          }
        // e.preventDefault();
    });

});


    $(document).on('click', '.show-my-project', function(e) {
        e.preventDefault();
        $('.ignore-elements').hide();
        $(this).removeClass('show-my-project').addClass('show-all-projects').html('Show all projects').button("refresh");
    });
    $(document).on('click', '.show-all-projects', function(e) {
        e.preventDefault();
        $('.ignore-elements').show();
        $(this).removeClass('show-all-projects').addClass('show-my-project').html('Show only my projects').button("refresh");
    });

    $('#next_deadline').val('no deadline');
    $('#team_members').val($('#leader_id').val());