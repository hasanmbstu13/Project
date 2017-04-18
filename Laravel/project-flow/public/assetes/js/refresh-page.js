$(document).ready(function(){
	// This method will refresh dynamiccontent frequently after 5 minutes 
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
	
	setTimeout( function(){ 
	    console.log("This method will execute after 5 minutes");
	    // if( !$('#myChechBoxID').is(':checked'){
	        $.ajax({
	            type: "GET",
	            url: "/workflowDynamic",
	            success: function(data){
	                // $('.popover').popover('hide');
	                $('.popover').remove();
	                $('.modal').modal('hide');
	                $('.modal-backdrop').remove();
	                $('#work-flow-container').html(data);
	            },
	            error: function () {
	                error_msg("Sorry page can't load refresh again!!");
	            }
	        });
	},300000);

});