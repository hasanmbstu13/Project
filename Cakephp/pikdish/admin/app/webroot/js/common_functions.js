function change_country(country,state,path){
	id=country.val()
	jQuery.ajax({
                                    
                                    async: true,
                                    cache: false,
                                    dataType: 'text',
                                    url: path+'/' + id,
                                    success: function(response) 
									{
										state.html(response)	
										state.selectpicker('refresh');
										return false; 
									}
				});
}

function change_state(state,city,path){
	id=state.val()
	jQuery.ajax({
                                    
                                    async: true,
                                    cache: false,
                                    dataType: 'text',
                                    url: path+'/' + id,
                                    success: function(response) 
									{
										city.html(response)	
										city.selectpicker('refresh');
										return false; 
									}
				});
}


function check_mail(username,path,label){
	id=$( "#"+username+"" ).val();.val()
	if(id!=="")
	{
	
	pattern=/[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/;
	
	if(pattern.test(id)){
	jQuery.ajax({
                                    
                                    async: true,
                                    cache: false,
                                    dataType: 'json',
                                    url:path+ '/' + id,
                                    success: function(response) 
									{   
									   if(response.status=="error")
									   {
									    $( "#"+label+"" )										
									      .css({'display':'block','color':'red'})
										  . html(response.message)	
									   }
									   else
									   {
										   $( "#"+label+"" )										
									      .css({'display':'block','color':'green'})
										  . html(response.message)	
									   }
										return false; 
									}
				});
         }
		 else
		 {
			                               $( "#"+label+"" )										
									      .css({'display':'none','color':'red'})
										  . html("")	
		 }
     }
	
}


function check_mobile(mobile,path,label){
	val=$( "#"+mobile+"" ).val();
	if(val!=="")
	{
	
	pattern=/\d{2}\d{4}\d{4}/;
	
	if(pattern.test(val)){
	jQuery.ajax({
                                    
                                    async: true,
                                    cache: false,
                                    dataType: 'json',
                                    url: path+'/' + val,
                                    success: function(response) 
									{   
									   if(response.status=="error")
									   {
									    $("#"+label+"")										
									      .css({'display':'block','color':'red'})
										  . html(response.message)	
									   }
									   else
									   {
										   $("#"+label+"")										
									      .css({'display':'block','color':'green'})
										  . html(response.message)	
									   }
										return false; 
									}
				});
         }
		 else
		 {
			                               $("#"+label+"")										
									      .css({'display':'none','color':'red'})
										  . html("")	
		 }
     }
	
}

// JavaScript Document