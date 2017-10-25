/*
Twitter timeline
*/
// $(document).ready(function(){


// function add_dropdown_in_home(){
// 	var html = '';
// 	html += "<div class=\"row\">";
// 	html += "<select>";
// 	html += "<option>1</option>";
// 	html += "<option>2</option>";
// 	html += "</select>";
// 	html += "</div>";
// 	// console.log(html);
// 	return html;
	
// }

$('.load_tweets_btn').live('click', function(event) {
		event.preventDefault();
		// console.log('hi');
		var feed = $(this).attr('data-feed');
		var hashtag = $(this).attr('data-hashtag');
		// if(hashtag)

		var banner_image = $(this).attr('data-bannerimage');
        display_twt_feeds(feed,hashtag,banner_image);
        // loadtopiccats();
        // console.log(loadtopiccats());
        // if(feed == "home"){
        // 	$('#timeline').find('#headerTimeLine').html(add_dropdown_in_home());
        // }
        if(feed !== "hashtag_tweets")
        {
            $('#timeline').find('#headerTimeLine').html("");
        }
        else{
            $('#timeline').find('#headerTimeLine').html("<div class=\"row\">"
			+"<select id='ddlcat'  onchange='ddlCatOnChange(this);'  class='form-control'>"
    +"</select>"
            +"<div class=\"span12\">"
              +"<div class=\"input-group\">"
                +"<span class=\"input-group-btn\">"
                  +"<button id=\"btnSearchHashtag\" class=\"btn btn-secondary\" type=\"button\">Search</button>"
                +"</span>"
                +"<input id=\"txtSearchHashtag\" type=\"text\" class=\"form-control\" placeholder=\"Search for ...\">"
              +"</div>"
			  +"<div id='tagContainer' class='row'>"
			+"</div>"
            +"</div>"
            +"</div>");

            $('#btnSearchHashtag').click(function(){
                display_twt_by_hashtag(feed, $('#txtSearchHashtag').val());
            });
			loadcats();
        }

});

function loadcats()
{
   $.ajax({
       type: "GET",
       url: "http://suite.social/coder/tv/read_json.php",

       success: function (data) {
          // debugger;
           var html = "";
           $.each(data, function (key, value) {
               var option = $('<option>').attr('value', value.name).html(value.name);
               $('#ddlcat').append(option);
           });

       },
       error: function (jqXHR, textStatus, errorThrown) {
          // debugger;
           alert(jqXHR.status);
       },
       dataType: "json"
   })

}

function loading_hastags(category){
	$.ajax({
		type : 'POST',
		url	 : 'read_hashtags_by_cat.php',
		data : {
			category : category
		},
		success : function(html){
			$('.search-hashtags .container-hashtags').html(html);
			console.log(html);
		}
	})
}

function loadtopiccats(element)
{
   $.ajax({
       type: "GET",
       url: "topiccats.php",

       success: function (data) {
          // debugger;
          // console.log(data);
          var old_obj = "";
           // var html = "";
           $.each(data, function (key, value) {
           	// console.log(value);
           		old_obj = value;
           		for(key in value){
           			// console.log(old_obj);
           			console.log(old_obj[key]);
           			// console.log(value.key);
           			// console.log(value);
               		var option = $('<option>').attr('value', key).html(old_obj[key]);
           		}
               // $('#txtCategory').append(option);
               element.append(option);
           });

           if($('.search-hashtags #txtCategory').val()){
           	var category = $('.search-hashtags #txtCategory').val();
           	loading_hastags(category);
           }


       },
       error: function (jqXHR, textStatus, errorThrown) {
          // debugger;
           alert(jqXHR.status);
       },
       dataType: "json"
   })

}

function ddlCatOnChange(el)
{
   loadTags(el.value)
}

function loadTags(catName)
{
   //debugger;
   var tags = [];
   $.ajax({
       type: "GET",
       url: "http://suite.social/coder/tv/read_json.php",

       success: function (data) {
           //debugger;
           var tagHtml = "";
           $.each(data, function (key, value) {
               if (value.name == catName)
               {
                   for (var x in value.tags) {
                       tagHtml += "<div><a onclick='tagClick(this);'>" + value.tags[x] + "</a></div>";
                   }
                   $("#tagContainer").html(tagHtml);
               }
           });

       },
       error: function (jqXHR, textStatus, errorThrown) {
           //debugger;
           alert(jqXHR.status);
       },
       dataType: "json"
   })


}
function tagClick(el)
{
     display_twt_by_hashtag("hashtag_tweets", el.text);
}
function display_twt_by_hashtag(feed, hashtag) {
    var cleanHashtag = hashtag.replace('#', '');
	$('#loading').addClass('loading');
	$.ajax({
	  type: 'POST',
	  url: 'views/display_tweets.php',
	  data: 'feed=' + feed + '&hashtag=' + cleanHashtag,
	  success: function(msg){
	  	$('#timeline').find('#bodyTimeLine').html(msg);
	  	$('#loading').removeClass('loading');
	  	$('.created').prettyDate();
	  }
	});
}

function display_twt_feeds(feed,hashtag='',banner_image='') {
	$('#loading').addClass('loading');
	console.log(banner_image);
	$.ajax({
	  type: 'POST',
	  url: 'views/display_tweets.php',
	  // data: 'feed=' + feed,
	  data: {
	  	feed 	: feed,
	  	hashtag : hashtag,
	  	banner_image : banner_image
	  },
	  success: function(msg){
	  	// console.log(feed);
	  	$('#timeline').find('#bodyTimeLine').html(msg);
	  	console.log(banner_image);
	  	if(banner_image){	
	  		var bannerImageHtml = '<a href=""><img style="height:400px; width:400px" src="./uploads/'+banner_image+'"></a>';
	  		$('.span2.other-apps').find('.banner-image').html(bannerImageHtml);
	  	}
	  	// if(hashtag){
	  		// $('#searchTopic').val(hashtag);
	  		$('.search-hashtags').html('');
	  		if(!hashtag){
	  			$('.banner-image').html('');
	  		}
	  	// }
	  	// if(!hashtag)
	  	$('#loading').removeClass('loading');
	  	$('.created').prettyDate();
	  }
	});
}

$('#load_more_tweets_btn').live('click', function(event) {
	event.preventDefault();
	var feed = $(this).attr('data-feed');
	var max_id = $(this).attr('data-max-id');
	var hashtag = $(this).attr('data-hashtag');
	$('#load_more_tweets_btn').text('Loading...');
	$.ajax({
	  type: 'POST',
	  url: 'views/display_tweets.php',
	  // data: 'feed=' + feed + '&max_id=' + max_id,
	  data: {
	  	feed : feed,
	  	max_id : max_id,
	  	hashtag : hashtag
	  },
	  success: function(msg){
	  	$('#load_more_tweets_btn').remove();
	  	$('#timeline').find('#bodyTimeLine').append(msg);
	  	$('.created').prettyDate();
	  }
	});
});


/*
Retweet
*/
$('.retweet_btn').live('click', function(event) {
	event.preventDefault();
	var message = $(this).attr('data-message');
	var id = $(this).attr('data-id');
	$('#retweet_message').html(message);
	$('#post_retweet_btn').attr('data-id', id);
	$('#retweet_box').modal();
});

$('#post_retweet_btn').live('click', function(event) {
	event.preventDefault();
	var id = $('#post_retweet_btn').attr('data-id');

	$.ajax({
	  type: 'POST',
	  url: 'listeners/post_retweet.php',
	  data: 'id=' + id,
	  success: function(msg){
	  	alert('Your retweet has been posted');
	  	$('#retweet_box').modal('hide');
	  }
	});
});

/*
Reply
*/
$('.reply_btn').live('click', function(event) {
	event.preventDefault();
	var id = $(this).attr('data-id');
	var message = $(this).attr('data-message');
	var username = $(this).attr('data-username');
	var profile_image = $(this).attr('data-profile-image');
        var hashtagsStr = $(this).attr('data-hashtags');
        var hashtags = hashtagsStr.split(',');
        var preloadedMessage = "";
	$('#reply_message_source').html('<div style="margin-bottom:15px;"><img src="'+profile_image+'" style="padding-right:10px; float:left;">'+message+'</div>');
	$('#post_reply_btn').attr('data-id', id);
	$('#reply_message').val('');
	$('#reply_box').modal();
        preloadedMessage += '@'+username+' ';
        $.each(hashtags, function(index, value){
            if(value)
                preloadedMessage += '#'+value+' ';
        });
        $('#reply_message').val(preloadedMessage);
});

/*
$('#reply_box').live('shown', function () {
	('#reply_message').focus();
})
*/

$('#post_reply_btn').live('click', function(event) {
	event.preventDefault();
	var id = $('#post_reply_btn').attr('data-id');
	var message = $('#reply_message').val();

	$.ajax({
	  type: 'POST',
	  url: 'listeners/post_reply.php',
	  data: 'id=' + id + '&status=' + message,
	  success: function(msg){
	  	alert('Your reply has been posted');
	  	//alert(msg);
	  	$('#reply_box').modal('hide');
	  }
	});
});

/*
Display status update
*/
$('#display_status_update_btn').live('click', function(event) {
	event.preventDefault();
	$.ajax({
	  type: 'POST',
	  url: 'views/display_status_update.php',
	  success: function(msg){
	  	$('#timeline').find('#bodyTimeLine').html(msg);
	  	$('#status_message').focus();
	  }
	});
});

$('#status_update_btn').live('click', function(event) {
	event.preventDefault();

	var status = $('#status_message').val();
	var category = $('#cate').val();
	var tag = $('#tag').val();
	if(status=='') {
		alert('Please type-in your status message');
	}
	else if(category=='') {
		alert('Please choose any category');
	}
	else if(tag =='') {
		alert('Please enter #tag');
	}
	else {
		$.ajax({
		  type: 'POST',
		  url: 'listeners/post_status.php',
		  data: 'status=' + tag +' '+ status,
		  success: function(msg){
		  	//alert(msg);
		  	alert('Your status has been published');
		  	$('#status_message').val('');
		  }
		});
	}
});

/*
Display friends
*/
$('#display_twt_friends_btn').live('click', function(event) {
	event.preventDefault();
	$('#loading').addClass('loading');
	$.ajax({
	  type: 'POST',
	  url: 'views/display_twt_friends.php',
	  success: function(msg){
	  	$('#timeline').find('#bodyTimeLine').html(msg);
	  	$('#loading').removeClass('loading');
	  }
	});
});

$('#display_more_twt_friends_btn').live('click', function(event) {
	event.preventDefault();
	var next_cursor = $(this).attr('data-next-cursor');
	$(this).text('Loading...');
	$.ajax({
	  type: 'POST',
	  url: 'views/display_twt_friends.php',
	  data: 'next_cursor=' + next_cursor,
	  success: function(msg){
	  	$('#displayMoreTwtFriendsBox').remove();
	  	$('#timeline').find('#bodyTimeLine').append(msg);
	  }
	});
});

/*
Display followers
*/
$('#display_twt_followers_btn').live('click', function(event) {
	event.preventDefault();
	console.log('hi');
	$('#loading').addClass('loading');
	$.ajax({
	  type: 'POST',
	  url: 'views/display_twt_followers.php',
	  success: function(msg){
	  	$('#timeline').find('#bodyTimeLine').html(msg);
	  	$('#loading').removeClass('loading');
	  }
	});
});

$('#display_more_twt_followers_btn').live('click', function(event) {
	event.preventDefault();
	var next_cursor = $(this).attr('data-next-cursor');
	$(this).text('Loading...');
	$.ajax({
	  type: 'POST',
	  url: 'views/display_twt_followers.php',
	  data: 'next_cursor=' + next_cursor,
	  success: function(msg){
	  	$('#displayMoreTwtFollowersBox').remove();
	  	$('#timeline').find('#bodyTimeLine').append(msg);
	  }
	});
});

$('.display_user_data_btn').live('click', function(event) {
	event.preventDefault();
	var twt_id = $(this).attr('data-twt-id');

	$.ajax({
	  type: 'POST',
	  url: 'views/display_user_data.php',
	  data: 'twt_id=' + twt_id,
	  success: function(msg){
	  	$('#user_data_content').html(msg);
	  	$('#user_data_box').modal();
	  }
	});
});


$('#addnewtopic').live('hidden.bs.modal', function(e) {
  e.stopPropagation();
  return false;
  this.modal('show');
});

$(document).ready(function(){
	// Add new category
	$('#btnSaveNewHashtag').live('click',function(){
		// alert('hi');
	    var formData = new FormData($('form')[0]);
		$.ajax({
			type : 'POST',
			url	 : 'save_hashtags.php',
			async: false,
			processData: false,
			contentType: false,
			cache: false,
			data : formData,
			success : function(msg){
				$('form')[0].reset();
			}												
		});

		return false;
	});

	// function loading_hastags(category){
	// 	$.ajax({
	// 		type : 'POST',
	// 		url	 : 'read_hashtags_by_cat.php',
	// 		data : {
	// 			category : category
	// 		},
	// 		success : function(html){
	// 			$('.search-hashtags .container-hashtags').html(html);
	// 			console.log(html);
	// 		}
	// 	})
	// }

	// if($('.search-hashtags #txtCategory').val()){
	// 	var category = $('.search-hashtags #txtCategory').val();
	// 	loading_hastags(category);
	// }

	$('.search-hashtags #txtCategory').on('change', function(){
		var category = $(this).val();
		loading_hastags(category);
		// alert(category);
		// $.ajax({
		// 	type : 'POST',
		// 	url	 : 'read_hashtags_by_cat.php',
		// 	data : {
		// 		category : category
		// 	},
		// 	success : function(html){
		// 		$('.search-hashtags .container-hashtags').html(html);
		// 		console.log(html);
		// 	}
		// })
	});

	if($('#addnewtopic #hashtagCategory').has('option').length == 0){
		loadtopiccats($('#addnewtopic #hashtagCategory'));
	}
	if($('.search-hashtags #txtCategory').has('option').length == 0){
		loadtopiccats($('.search-hashtags #txtCategory'));
	}
});

// });