$(function(){

      // var today = moment().format('DD-MMMM-YYYY HH:mm');
      
      // $('body').on('mouseenter','.leave-input-group-addon',function(e){
      //   e.preventDefault();
      //   var curr_elem = $(this).closest('.leave-info');
      //   console.log($(this).closest('.date-time'));
      //   if(!curr_elem.find('.leave-start-date').val() || !curr_elem.find('.leave-end-date').val()){
      //     curr_elem.find('.leave-start-date').val(today);
      //     curr_elem.find('.leave-end-date').val(today);
      //   }        
      //    curr_elem.find('.date-time').datetimepicker({
      //       format: 'DD-MMMM-YYYY HH:mm'
      //    })
      // });

      // This will save leave information
      $('body').on('click','.btn-leave-Info',function(e) {
        e.preventDefault();  
        // alert('hi');

        var current_elem    = $(this);
        var error_msg = "<span class='error-message'>This is required field.</span>";
        var select_error_msg = "<span class='error-message'>Please select a leave type.</span>";

        if((current_elem.closest('.leave-info').find('.error .error-message')).length)
          current_elem.closest('.leave-info').find('.error .error-message').remove();

        if(!current_elem.closest('.leave-info').find('.leave-start-date').val()){
          current_elem.closest('.leave-info').find('.start-date').next('.error').append(error_msg); 
        }

        if(!current_elem.closest('.leave-info').find('.leave-end-date').val()){
          current_elem.closest('.leave-info').find('.end-date').next('.error').append(error_msg); 
        }

        if(!current_elem.closest('.leave-info').find('.number-of-days').val()){
          current_elem.closest('.leave-info').find('.number-of-days').next().append(error_msg); 
        }

        if(!current_elem.closest('.leave-info').find('.leave-type').val()){
          current_elem.closest('.leave-info').find('.leave-type').next().append(select_error_msg); 
        }

        if(
          (current_elem.closest('.leave-info').find('.leave-start-date').val()) &&
          (current_elem.closest('.leave-info').find('.leave-end-date').val()) &&
          (current_elem.closest('.leave-info').find('.number-of-days').val()) &&
          (current_elem.closest('.leave-info').find('.leave-type').val()) 

          ) {
              $.ajax({
                type: "POST",
                url:  $(this).data('url'),
                data: current_elem.closest('.leave-info').find('form.leave-info-form').serialize(),
                success: function(data) {
                  if(data.status == 'success'){
                    current_elem.closest('.leave-info').find('.error_message').remove();
                    current_elem.closest('.leave-info').find('.leave-info-form')[0].reset(); 
                    noty({
                      layout: "topRight",
                      theme: 'relax',                
                      type: 'success',
                      text: data.msg,
                      dismissQueue: true, 
                      animation: {
                        open: {height: 'toggle'},
                        close: {height: 'toggle'},
                        easing: 'swing',
                        speed: 500 
                      },
                      timeout: 5000
                    });                                                                         
                  }else if (data.status == 'validate_error') {
                      // console.log(data.errors);
                      for (var key in data.errors) {
                        if ((data.errors).hasOwnProperty(key)) {
                          if(key == 'number_of_days')
                            current_elem.closest('.leave-info').find('.number-of-days').next().append("<span class='error-message'>"+data.errors.number_of_days+"</span>"); 
                          if(key == 'start_date')
                            current_elem.closest('.leave-info').find('.start-date').next('.error').append("<span class='error-message'>"+data.errors.start_date+"</span>"); 
                          if(key == 'end_date')
                            current_elem.closest('.leave-info').find('.end-date').next('.error').append("<span class='error-message'>"+data.errors.end_date+"</span>"); 
                          if(key == 'leave_type')
                            current_elem.closest('.leave-info').find('.leave-type').next('.error').append("<span class='error-message'>"+data.errors.leave_type+"</span>"); 
                        }
                      }
                      noty({
                        layout: "topRight",
                        theme: 'relax',                
                        type: 'warning',
                        text: data.msg,
                        dismissQueue: true, 
                        animation: {
                          open: {height: 'toggle'},
                          close: {height: 'toggle'},
                          easing: 'swing',
                          speed: 500 
                        },
                        timeout: 5000
                      });                               
                    }
                    else if (data.status == 'error') {
                      noty({
                        layout: "topRight",
                        theme: 'relax',                
                        type: 'error',
                        text: data.msg,
                        dismissQueue: true, 
                        animation: {
                          open: {height: 'toggle'},
                          close: {height: 'toggle'},
                          easing: 'swing',
                          speed: 500 
                        },
                        timeout: 5000
                      });              
                    }
              } // end success 
            }); // end ajax request   
          }                  
      }) // end on-click event 

      // This will load the leave form
      $('body').on('click', '.btn-add-leave-form', function(e){
        e.preventDefault();
        var curr_elem = $(this);
        $.ajax({
          type:"GET",
          url: curr_elem.data('url'),
          success: function(data){
            if(data.success){
              curr_elem.closest('.leave-info').find('.load-leave-form').html(data.html);
              if (curr_elem.closest('.popover').hasClass('popover-show-leave'))
                curr_elem.closest('.popover').removeClass('popover-show-leave');
              if (curr_elem.closest('.leave-info').hasClass('show-leave'))
                curr_elem.closest('.leave-info').removeClass('show-leave');
            }
          },
        }); // end ajax request
      }); // end on click event

      // This will load the saved leave information
      $('body').on('click', '.btn-show-leave-info', function(e){
        e.preventDefault();
        var curr_elem = $(this);
        $.ajax({
          type:"GET",
          url: curr_elem.data('url'),
          success: function(data){
            // console.log(data);
            if(data.success){
              if(data.html){
                curr_elem.closest('.leave-info').find('.show-saved-leave').html(data.html);
                curr_elem.closest('.popover').addClass('popover-show-leave');
                curr_elem.closest('.leave-info').addClass('show-leave');
              } else if(!data.html) 
                  curr_elem.closest('.leave-info').find('.show-saved-leave').html("<p class=\"no-leave\">No leave information found for this user.</p>");              
            }
          },
        }); // end ajax request
      }); // end on click event

      // This will load the saved leave information
      $('body').on('click', '.remove-a-leave', function(e){
        e.preventDefault();
        var curr_elem = $(this);
        $.ajax({
          type:"GET",
          url: curr_elem.data('url'),
          success: function(data){
            if(data.success){
              noty({
                layout: "topRight",
                theme: 'relax',                
                type: 'success',
                text: data.msg,
                dismissQueue: true, 
                animation: {
                  open: {height: 'toggle'},
                  close: {height: 'toggle'},
                  easing: 'swing',
                  speed: 500 
                },
                timeout: 5000
              }); 
            }
            curr_elem.closest('.leave-data').remove();
          },
        }); // end ajax request
      }); // end on click event

}); // end document ready method

// this will initialize the current date and datetimepicker for dynamically loaded leave-form date-time
document.body.addEventListener("DOMNodeInserted", function(event){
    var $elementJustAdded = $(event.target);
    if(typeof today == "undefined")
      var today = moment().format('DD-MMMM-YYYY HH:mm');
      if($elementJustAdded.find('div.date-time').length){
           $elementJustAdded.find('.leave-curr-date').val(today);
           $elementJustAdded.find('div.date-time').datetimepicker({
            format: 'DD-MMMM-YYYY HH:mm'
          })
      }      
}, false);