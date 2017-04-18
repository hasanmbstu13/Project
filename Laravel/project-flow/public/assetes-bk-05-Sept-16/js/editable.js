$(function () {
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

	$('.group').editable({

	    success: function(response, newValue) {
	        if(response.status == 'success') 
	            success_msg(response.msg);
	        else if(response.status == 'error')
	            error_msg(response.msg);
	        // return response.msg; //msg will be shown in editable form
	    }
	});

	// Show notification after creating create/edit/delete a project
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


});