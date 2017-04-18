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

	
	
	var ias = jQuery.ias({
	  container:  '#tbodyLoadedData',
	  item:       '.projects',
	  pagination: '#pagination',
	  next:       '.next'
	   // success: function() {
	   		// $('a.group').editable();
	    // },
	});

	$('body a.group').editable({
		// disabled: false,
		// mode: "inline",
	    success: function(response, newValue) {
	        if(response.status == 'success') 
	            success_msg(response.msg);
	        else if(response.status == 'error')
	            error_msg(response.msg);
	        // return response.msg; //msg will be shown in editable form
	    }
	});

	// Add a loader image which is displayed during loading
	//ias.extension(new IASSpinnerExtension());

	// Add a link after page 2 which has to be clicked to load the next page
	// ias.extension(new IASTriggerExtension({offset: 2}));


  // $('#tbodyLoadedData').ajaxSuccess(function(result) {
  // 	console.log('success');
  //   // $('.elements').fancyPlugin();
  // });

  document.body.addEventListener("DOMNodeInserted", function(event){
      var $elementJustAdded = $(event.target);
      if($elementJustAdded.find('a.group').length){
      	$elementJustAdded.find('a.group').editable({
	    success: function(response, newValue) {
	        if(response.status == 'success') 
	            success_msg(response.msg);
	        else if(response.status == 'error')
	            error_msg(response.msg);
	    }
	   });      	
     }
  }, false);

});