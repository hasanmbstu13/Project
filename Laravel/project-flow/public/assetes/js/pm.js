$(function () {
    $body = $("body");

    $(document).on({
        ajaxStart: function() { $body.addClass("loading");    },
        ajaxStop: function() { $body.removeClass("loading"); }    
    });
    
    // var dynamic_link_url = dynamic_link_url;

// working Sortable list
/*    $(".working_sortable_list").sortable({
        group: {
            name: 'working',
            pull: true,
            put: ['queue', 'studio','client']
        },
        filter: ".ignore-elements",
        animation: 150,
        onAdd: function (evt) {
            //console.log('onAdd.working:', evt);
            var params = [];
            params['user_id'] = evt.item.getAttribute('data-uid');
            params['p_id'] = evt.item.getAttribute('data-pid');
            params['w_id'] = evt.item.getAttribute('data-wid');
            var obj = $.extend({}, params);
            // ajax submit
            $.ajax({
                type: "POST",
                url: post_working,
                traditional: true,
                data: $.param(obj),
                success: function(data){
                }
            });
            dynamic_workflow_load(dynamic_link_url);
        },
        onUpdate: function (evt) {
            console.log('onUpdate.working:', evt.item);
        },
        onRemove: function (evt) {
            console.log('onRemove.working:', evt);
        },
        onStart: function (evt) {
            console.log('onStart.working:', evt.item);
        },
        onEnd: function (evt) {
            console.log('onEnd.working:', evt.item);
        },
        onSort: function (evt) {
            console.log('onSort.working:', evt);
        },
        onFilter: function (evt) {
            console.log('onFilter.working:', evt.item);
        },
        onMove: function (evt) {
            console.log('onMove.working:', evt.item);
        }
    });

    $(".queue_sortable_list").sortable({
        group: {
            name: 'queue',
            pull: true,
            put: ['working', 'studio','client']
        },
        animation: 150,
        filter: ".ignore-elements",
        onAdd: function (evt) {
            console.log('onAdd.queue:', evt);
            var params = [];
            params['user_id'] = evt.to.getAttribute('data-uid');
            params['p_id'] = evt.item.getAttribute('data-pid');
            params['sort_order'] = evt.newIndex;
            var obj = $.extend({}, params);
            // ajax submit
            $.ajax({
                type: "POST",
                url: post_queue,
                data: $.param(obj),
                success: function(data){
                }
            });
            dynamic_workflow_load(dynamic_link_url);
        },
        onUpdate: function (evt) {
            console.log('onUpdate.queue:', evt.item);
        },
        onRemove: function (evt) {
            console.log('onRemove.queue:', evt.item);
        },
        onStart: function (evt) {
            console.log('onStart.queue:', evt.item);
        },
        onEnd: function (evt) {
            console.log('onEnd.queue:', evt.item);
        }
    });

    $(".studio_sortable_list").sortable({
        group: {
            name: 'studio',
            pull: 'clone',
            put: ['client']
        },
        filter: ".ignore-elements",
        animation: 150,
        sort: false,
        onAdd: function (evt) {
           // console.log('onAdd.studio:', evt.item);
            var params = [];
            params['p_id'] = evt.item.getAttribute('data-pid');
            var obj = $.extend({}, params);
            // ajax submit
            $.ajax({
                type: "POST",
                url: client_to_studio,
                data: $.param(obj),
                success: function(data){
                }
            });
            dynamic_workflow_load(dynamic_link_url);
        },
        onUpdate: function (evt) {
            console.log('onUpdate.studio:', evt.item);
        },
        onRemove: function (evt) {
            console.log('onRemove.studio:', evt.item);
            console.log(evt.to);
        },
        onStart: function (evt) {
            console.log('onStart.studio:', evt.item);
        },
        onEnd: function (evt) {
            console.log('onEnd.studio:', evt.item);
        }
    });

    $(".client_sortable_list").sortable({
        group: {
            name: 'client',
            pull: true,
            put: ['studio']
        },
        filter: ".ignore-elements",
        animation: 150,
        sort: false,
        onAdd: function (evt) {
            //console.log('onAdd.client:', evt.item);
            var params = [];
            //params['user_id'] = evt.to.getAttribute('data-uid');
            params['p_id'] = evt.item.getAttribute('data-pid');
            //console.log('here',params['p_id']);
            //params['sort_order'] = evt.newIndex;
            var obj = $.extend({}, params);
            // ajax submit
            $.ajax({
                type: "POST",
                url: studio_to_client,
                data: $.param(obj),
                success: function(data){
                }
            });
            dynamic_workflow_load(dynamic_link_url);
        },
        onUpdate: function (evt) {
            console.log('onUpdate.3:', evt.item);
        },
        onRemove: function (evt) {
            console.log('onRemove.3:', evt.item);
            $(".studio_sortable_list").append(evt.item);
        },
        onStart: function (evt) {
            console.log('onStart.3:', evt.item);
        },
        onEnd: function (evt) {
            console.log('onEnd.3:', evt.item);
        }
    });
*/

    // works update form

    $('.work-update-form').on('submit', function(e){
        e.preventDefault();
        //console.log('hello');
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serializeArray(),
            success: function(data){
               if(data.status == "success"){
                   dynamic_workflow_load(dynamic_link_url);
               }else{
                   alert('Error occured to save that data.');
               }
            }
        });
    });

    // date time picker
    $('.w_deadline_picker').datetimepicker({
        // viewMode: 'years',
        format: 'DD-MMM-YYYY'
    });

    // Popover user leading data
    $('.popper').popover({
        placement: 'right',
        container: 'body',
        html: true,
        content: function () {
            return $(this).next('.popper-content').html();
            // return $('.popper-content').html();
        }
    })


    calender_height_fix();


    // collapsible back call
    $('.panel-collapse').on('shown.bs.collapse', function () {
        calender_height_fix();
    });

    //starting collapse
    $('.panel-collapse').on('hide.bs.collapse', function () {
        calender_height_fix('0px');
    });
    // completed collapse hidden
    $('.panel-collapse').on('hidden.bs.collapse', function () {
        calender_height_fix();
    });

    // Clender toogler

    $('.cal-toogller').on('click',function(){
        $('.changeablewidth').toggleClass('col-md-8 col-md-4');
        $('.hiddenablewidth').toggleClass('hidden');
        calender_height_fix();
    });

    // Show javascript error messege in the case of add/delete/edit
    function error_msg(msg){
        noty({
                layout: "topRight",
				theme: 'relax',                
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
                theme: 'relax',
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
            url: '/workflowDynamic',
            success: function(data){
                $('#work-flow-container').html(data);
            },
            error: function () {
                error_msg("Sorry page can't load refresh again!!");
            }
        });
    }

    // // return all projects of a leader
    // $('.popper').mouseenter(function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         type: "GET",
    //         url: $(this).find('div p').text(),
    //         success: function(data){
    //             $('.popper-content ul').remove();
    //             for (var i = 0; i < data.length; i++) {
    //                 $('.popper-content').append('<ul>'+data[i].project_no+' '+data[i].project_text+'</ul>')
    //             }
    //         }
    //     });
    // })


    // // This will created a new brief in database
    // $('#client_brief').submit(function(e) {
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     })
    //     e.preventDefault();
        
    //     $.ajax({
    //       type: "POST",
    //       url: $(this).attr('action'),
    //       data: $(this).serialize(),
    //       cache: false,
    //       success: function(data, response ) {
    //             // alert(data);
    //             if(data.status == 'success'){
    //                 $('#rebrModal').modal('hide');
    //                 $('.modal').hide();
    //                 $('.modal-backdrop').remove();
    //                 load_dynamiccontent(data.url);
    //             }else if (data.status == 'error') {
    //                error_msg(data.msg);
    //             }
    //       }
    //     });
    //     e.preventDefault();
    // });


    // // This will deleted a brief
    // $('#brief-delete').on('click', function(e) {
    //     e.preventDefault();   
    //       $.ajax({
    //         type: "GET",
    //         url:  $(this).attr('href'),
    //         success: function(data) {
    //               if(data.status == 'success'){
    //                 $('.modal').hide();
    //                 $('.modal-backdrop').remove();
    //                 load_dynamiccontent(data.url);
    //                 success_msg(data.msg);                                                                            
    //               }else if (data.status == 'error') {
    //                   load_dynamiccontent(data.url);
    //                   error_msg(data.msg);                                                         
    //               }
    //         }
    //       });
        
    // });
    
 
    // // This will edited a brief
    // $('#per-page-projects').on('click', function(e) {
    //     e.preventDefault();   
    //       $.ajax({
    //         type: "POST",
    //         url:  $(this).data('url'),
    //         data: $('form#page-projects').serialize(),
    //         success: function() {
    //             console.log('hello');
    //               // if(data.status == 'success'){
    //               //   // $('#prstatusModal').modal('hide');
    //               //   $('#briefEditModal').modal('hide');
    //               //   $('.modal').hide();
    //               //   $('.modal-backdrop').remove();
    //               //   load_dynamiccontent(data.url);
    //                 success_msg('Hello');                                                                            
    //               // }else if (data.status == 'error') {
    //               //     load_dynamiccontent(data.url);
    //               //     error_msg(data.msg);                                                         
    //               // }
    //         }
    //       });
        
    // });

    // This method will perform project closed action
    // $('#project_archive').on('click', function(e) {
    //     e.preventDefault();              
    //     $.ajax({
    //       type: "GET",
    //       url: $(this).attr('href'),
    //       success: function(data) {
    //             // alert(data);           
    //             if(data.status == 'success'){
    //                 $('.modal').modal('hide');
    //                 $('.modal-backdrop').remove(); 
    //                 load_dynamiccontent(data.url);
    //                 success_msg(data.msg);                                      
    //             }else if (data.status == 'error') {
    //                 load_dynamiccontent(data.url);
    //                 error_msg(data.msg);                  
    //             }
    //       }
    //     });
    // });

    // // This method will perform project to_client action
    // $('#to_client').on('click', function(e) {
    //     e.preventDefault();
             
    //     $.ajax({
    //       type: "GET",
    //       url: $(this).attr('href'),
    //       success: function(data) {             
    //         // alert(data);
    //             if(data.status == 'success'){
    //                 $('.modal').modal('hide');
    //                 $('.modal-backdrop').remove();
    //                 load_dynamiccontent(data.url);
    //                 success_msg(data.msg);                  
    //             }else if (data.status == 'error') {
    //                 load_dynamiccontent(data.url);
    //                 error_msg(data.msg);
    //             }
    //       }
    //     });
    // });

  
  // Show notification after creating a brief
  if($('.session-msg').text()){
      noty({
              layout: "topRight",
              theme: 'relax',
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
              theme: 'relax',
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
  
  
 // Fill modal with content from link href
 $("#briefModal").on("show.bs.modal", function(e) {
     e.stopPropagation();
     var link = $(e.relatedTarget);
     $(this).find(".modal-content").load(link.attr("href"));
     // e.preventDefault();
 });


 // Fill modal with content from link href
 $("#rebrModal").on("show.bs.modal", function(e) {
     // e.preventDefault();
     e.stopPropagation();
     $("#briefModal").modal('hide');
     // $('.modal-backdrop').remove();
     var link = $(e.relatedTarget);
     $(this).find(".modal-content").load(link.attr("href"));
 });

 // Fill modal with content from link href
 $("#prstatusModal").on("show.bs.modal", function(e) {
     // e.preventDefault();
     // $("#briefModal").modal('hide');
     var link = $(e.relatedTarget);
     $(this).find(".modal-content").load(link.attr("href"));
 });

 // Fill modal with content from link href
 $("#briefEditModal").on("show.bs.modal", function(e) {
     // e.preventDefault();
      e.stopPropagation();
     $("#prstatusModal").modal('hide');
     $('.modal-backdrop').remove();
     var link = $(e.relatedTarget);
     $(this).find(".modal-content").load(link.attr("href"));
 });

function calender_height_fix(height){
    $(".fc-day").each(function(index, value) {
        if (typeof(height)==='undefined') {
            height_here = $(this).closest('.working-data-row').height();
        }else{
            height_here = height;
        }
        $(this).css('height',height_here);
    });
}

});