$(function () {

    // Ajax start and stop method
    // $body = $("body");
    // $(document).on({
    //     ajaxStart: function() { $body.addClass("loading");    },
    //     ajaxStop: function() { $body.removeClass("loading"); }    
    // });

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

    // This method will refresh dynamiccontent frequently after 5 minutes 
    // var workflow_url = $('.workflow_url h2').text();
    setTimeout( function(){ 
        console.log("This method will call after 5 minutes repeatedly");
        $.ajax({
            type: "GET",
            url: "/weeklyWorkflowDynamicContent",
            success: function(data){
                $('#work-flow-container').html(data);
            },
            error: function () {
                error_msg("Sorry page can't load refresh again!!");
            }
        });
    },300000);
});

   