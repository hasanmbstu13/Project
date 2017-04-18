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

    // This method will perform project closed action
    $('#project_archive').on('click', function(e) {
        e.preventDefault();
        $('.modal').modal('hide');
        $('.modal-backdrop').remove();        
        $.ajax({
          type: "GET",
          url: $(this).attr('href'),
          success: function(data) {
                // alert(data);           
                if(data.status == 'success'){
                    load_dynamiccontent(data.url);
                    success_msg(data.msg);                                      
                }else if (data.status == 'error') {
                    load_dynamiccontent(data.url);
                    error_msg(data.msg);                  
                }
          }
        });
    });

    // This method will perform project closed action
    $('.project_completed').on('click', function(e) {
        e.preventDefault();
        $('.modal').modal('hide');
        $('.modal-backdrop').remove();        
        $.ajax({
          type: "GET",
          url: $(this).attr('href'),
          success: function(data) {
                // alert(data);           
                if(data.status == 'success'){
                    load_dynamiccontent(data.url);
                    success_msg(data.msg);                                      
                }else if (data.status == 'error') {
                    load_dynamiccontent(data.url);
                    error_msg(data.msg);                  
                }
          }
        });
    });


    // This method will perform project to_client action
    $('#to_client').on('click', function(e) {
        e.preventDefault();
        $('.modal').modal('hide');
        $('.modal-backdrop').remove();        
        $.ajax({
          type: "GET",
          url: $(this).attr('href'),
          success: function(data) {
            // alert(data);
                if(data.status == 'success'){
                    load_dynamiccontent(data.url);
                    success_msg(data.msg);                  
                }else if (data.status == 'error') {
                    load_dynamiccontent(data.url);
                    error_msg(data.msg);
                }
          }
        });
    });

 
 // $('#show-my-project').on('click', function(e){
 //    e.preventDefault();
 //    // $('.modal').modal('hide');
 //    // $('.modal-backdrop').remove();  
 //    // $('li:not(.my-project)').hide();
 //    $('.ignore-elements').hide();
 //    $(this).attr('id','show-all-projects').text('Show all projects');
 // });

 // $('#show-all-projects').on('click', function(e){
 //  // alert('hi');
 //    e.stopPropagation();
 //    alert('hi');
 //    // $('.modal').modal('hide');
 //    // $('.modal-backdrop').remove();  
 //    $('.ignore-elements').show();
 //    $(this).attr('id','show-my-project').text('Show only my projects');
 // });

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
  
  // This is for cancel link
  $('.hide_modal').on('click',function(e){
    e.preventDefault();
    $('#rebrModal').modal('hide');
    $('.modal-backdrop').remove();
  });

});


// $(document).on('click', '.show-my-project', function(e) {
//     e.preventDefault();
//     $('.ignore-elements').hide();
//     // $(this).removeClass('show-my-project').addClass('show-all-projects').text('Show all projects');
//     $(this).removeClass('show-my-project').addClass('show-all-projects').html('Show all projects').button("refresh");
// });
// $(document).on('click', '.show-all-projects', function(e) {
//     e.preventDefault();
//     $('.ignore-elements').show();
//     // $(this).removeClass('show-all-projects').addClass('show-my-project').text('Show only my projects');
//     $(this).removeClass('show-all-projects').addClass('show-my-project').html('Show only my projects').button("refresh");
// });