$(function () {

    $body = $("body");

    $(document).on({
        ajaxStart: function() { $body.addClass("loading");    },
        ajaxStop: function() { $body.removeClass("loading"); }    
    });
    
    // Show javascript error messege in the case of add/delete/edit
    function error_msg(msg){
        noty({
                layout: "topRight",
                type: 'error',
                text: msg,
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

    function success_msg(msg){
        noty({
                layout: "topRight",
                type: 'success',
                text: msg,
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


   // This method will load dynamiccontent after successful brief creation 
    function load_dynamiccontent(url){
        $.ajax({
            type: "GET",
            url: url,
            success: function(data){
                $('#work-flow-container').html(data);
            },
            error: function () {
                error_msg("Sorry page can't load refresh again!!");
            }
        });
    }

    

    // This will paused a task 
    
    $('#task-pause').on('click', function(e) {
        e.preventDefault();   
        if(!$('#log-hour').val()){
            if($('#prstatusModal').find('.log-hour .error-msg p').text()){
              $('#prstatusModal').find('.log-hour .error-msg p').remove();
              $('#prstatusModal').find('.log-hour .error-msg').append("<p style='color:red'>Please fill out this field</p>");
            }else
              $('#prstatusModal').find('.log-hour .error-msg').append("<p style='color:red'>Please fill out this field</p>");
             // $('#prstatusModal').find('.log-hour').remove('p');
        } else {    
          $.ajax({
            type: "POST",
            url: $('#designer-form').attr('action'),
            data: $('form#designer-form').serialize(),
            success: function(data, response ) {
              // alert(data);
                  if(data.status == 'success'){
                    $('#prstatusModal').modal('hide');
                    $('.modal-backdrop').remove();
                    load_dynamiccontent(data.url);
                    success_msg(data.msg);                                                                            
                  }else if (data.status == 'error') {
                      load_dynamiccontent(data.url);
                      error_msg(data.msg);                                                         
                      // $('#prstatusModal').find('#myModalLabel').append("<p style='color:red'>"+data.msg+"</p>");              
                  }
            }
          });
        }
    });

    // This method will perform project started action
    $('#task-start').on('click', function(e) {
        e.preventDefault();      
        $.ajax({
          type: "GET",
          url: $(this).data('url'),
          success: function(data) {
            // alert(data);
                if(data.status == 'success'){
                    $('#prstatusModal').modal('hide');
                    $('.modal-backdrop').remove();
                    load_dynamiccontent(data.url);
                    success_msg(data.msg);                                                                            
                }else if (data.status == 'error') {
                    $('#prstatusModal').modal('hide');
                    $('.modal-backdrop').remove();
                    load_dynamiccontent(data.url);
                    error_msg(data.msg);                                      
                    // $('#prstatusModal').find('#myModalLabel').append("<p style='color:red'>"+data.msg+"</p>");              
                }
          }
        });
    });

    // This method will perform project completion action
    $('#task-done').on('click', function(e) {
      // $.ajaxSetup({
      //     headers: {
      //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //     }
      // })
        e.preventDefault();
        if(!$('#log-hour').val()){
            if($('#prstatusModal').find('.log-hour .error-msg p').text()){
              $('#prstatusModal').find('.log-hour .error-msg p').remove();
              $('#prstatusModal').find('.log-hour .error-msg').append("<p style='color:red'>Please fill out this field</p>");
            }else
              $('#prstatusModal').find('.log-hour .error-msg').append("<p style='color:red'>Please fill out this field</p>");
             // $('#prstatusModal').find('.log-hour').remove('p');
        } else {    
            $.ajax({
              type: "POST",
              url: $(this).data('url'),
              data: $('form#designer-form').serialize(),
              success: function(data) {
                // alert(data);
                    if(data.status == 'success'){
                        $('#prstatusModal').modal('hide');
                        $('.modal-backdrop').remove();
                        load_dynamiccontent(data.url);
                        success_msg(data.msg);                                                        
                    }else if (data.status == 'error') {
                        load_dynamiccontent(data.url);
                        error_msg(data.msg);                  
                    }
              }
            });
          }
    });


  // Show notification after creating a brief
  if($('.session-msg').text()){
      noty({
              layout: "topRight",
              type: 'success',
              text: $('.session-msg').text(),
              dismissQueue: true, 
              animation: {
                  open: {height: 'toggle'},
                  close: {height: 'toggle'},
                  easing: 'swing',
                  speed: 500 
                  },
              timeout: 5000
          });
      $('.session-msg').remove();
  }

  // Show notification if error occured during user add, delete or update
  if($('.session-error').text()){
      noty({
              layout: "topRight",
              type: 'error',
              text: $('.session-error').text(),
              dismissQueue: true, 
              animation: {
                  open: {height: 'toggle'},
                  close: {height: 'toggle'},
                  easing: 'swing',
                  speed: 500 
                  },
              timeout: 5000
          });
      $('.session-error').remove();
  }
  
});




   