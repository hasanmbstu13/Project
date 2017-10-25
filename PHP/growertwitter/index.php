<?php
error_reporting(0);

for($i = 0;$i < sizeof($currentMenu); $i++)
{
    $currentMenu[$i] = $i == 0 ? 1 : 0;
}

// $jsOnReady = 'display_twt_feeds("home");';
include_once('include/webzone.php');
include_once('include/presentation/header.php');
?>

<div class="container">
	<div class="row">

		<div class="span3 bs-docs-sidebar">

			<?php
			$t1 = new Twt_box();
			$user_data = $t1->getUserData();
			if($t1->is_connected()==true) {
				echo '<div>';
				echo '<img src="'.$user_data['profile_image_url'].'" style="float:left; width:45px; margin-right:10px;">';
				echo '<b>'.$user_data['screen_name'].'</b><br>';
				echo '<i class="icon-remove-circle"></i> <a href="./account/twt_logout.php">Close Twitter session</a>';
				echo '</div>';
				echo '<br>';
			}
			else {

				echo '<div><a href="./account/twt_connect.php">Twitter connect</a></div>';
			}

			if($fb_user_id!='' || $t1->is_connected()==true) {
				echo '<ul class="nav nav-list bs-docs-sidenav">';
					echo '<li><a href="#" class="load_tweets_btn" data-feed="home"><i class="icon-chevron-right"></i> Home</a></li>';
					echo '<li><a href="#" class="load_tweets_btn" data-feed="my_tweets"><i class="icon-chevron-right"></i> My tweets</a></li>';
					echo '<li><a href="#" class="load_tweets_btn" data-feed="mentions"><i class="icon-chevron-right"></i> Mentions</a></li>';
					echo '<li><a href="#" class="load_tweets_btn" data-feed="retweets"><i class="icon-chevron-right"></i> Retweets</a></li>';
                    echo '<li><a href="#" class="load_tweets_btn" data-feed="hashtag_tweets"><i class="icon-chevron-right"></i>Tweets by hashtag</a></li>';
				echo '</ul>';

				echo '<br>';
				echo '<span style="margin-left:5px; color:#8b8b8b;"><b>My connections</b></span><br>';
				echo '<ul class="nav nav-list bs-docs-sidenav">';
					echo '<li><a href="#" id="display_twt_friends_btn"><i class="icon-chevron-right"></i> My friends</a></li>';
					echo '<li><a href="#" id="display_twt_followers_btn"><i class="icon-chevron-right"></i> My followers</a></li>';
				echo '</ul>';

				echo '<br>';
				echo '<span style="margin-left:5px; color:#8b8b8b;"><b>Status update</b></span><br>';
				echo '<ul class="nav nav-list bs-docs-sidenav">';
					echo '<li><a href="#" id="display_status_update_btn"><i class="icon-chevron-right"></i> Status updates</a></li>';
				echo '</ul>';

				echo '<br>';
				echo '<span style="margin-left:5px; color:#8b8b8b;"><b>Topic</b></span><br>';
				echo '<ul class="nav nav-list bs-docs-sidenav">';
					echo '<li><a href="#addnewtopic" id="add_new_topic" data-toggle="modal"><i class="icon-chevron-right"></i> New Topic</a></li>';
				echo '</ul>';
			}

			?>
		</div>
		<?php 
			if($t1->is_connected()==true){
		?>
		<div class="span7">
			<div class="search-hashtags">
				<div class="form-group">
            	    <label for="txtCategory">Category</label>
            	    <select id="txtCategory" name="category">
            	    	<!-- <option value="">Select Category</option> -->
            	    </select>
	            </div>
                <div class="form-group">
                    <label for="searchTopic">Search Topic</label>
                    <input id="searchTopic" name = "search_topic" type="text" value="" class="form-control" placeholder="Search Topic">
                </div>
                <div class="container-hashtags">
                	
                </div>
			</div>
			<?php

			if($t1->is_connected()==true) {
				echo '<span id="loading"></span>';
				echo '<div id="timeline">'
                                        . '<div id="headerTimeLine"> '
                                        . '</div>'
                                        . '<div id="bodyTimeLine"> '
                                        . '</div>'
                                   . '</div>';
			}
			else {
				echo '&nbsp;';
			}

			?>
		</div>
		<?php } ?>

		<div class="span2 other-apps" style="text-align:right;">

			<p>Some of our other apps</p>

			<a href="http://codecanyon.net/item/advanced-php-store-locator/244349?ref=yougapi" target="_blank"><img src="./include/graph/advanced-store-locator-mini.png" style="margin-bottom:10px;"></a>
			<a href="http://codecanyon.net/item/jquery-carousel-evolution-for-wordpress/702228?ref=yougapi" target="_blank"><img src="./include/graph/carousel-wpress-mini.png" style="margin-bottom:10px;"></a>
			&nbsp;<a href="http://codecanyon.net/item/domains-names-checker/3298128?ref=yougapi" target="_blank"><img src="./include/graph/domains-checker-mini.png" style="margin-bottom:10px;"></a>
			<a href="http://codecanyon.net/item/facebook-images-gallery/3281185?ref=yougapi" target="_blank"><img src="./include/graph/fb-gallery-mini.png" style="margin-bottom:10px;"></a>

			<br>

			<p>Featured mobile apps</p>
			<a href="http://codecanyon.net/item/mobile-site-builder/491023?ref=yougapi" target="_blank"><img src="./include/graph/mobile-builder-mini.png" style="margin-bottom:10px;"></a>
			<a href="http://codecanyon.net/item/mobile-store-locator/239351?ref=yougapi" target="_blank"><img src="./include/graph/mobile-store-locator-mini.png" style="margin-bottom:10px;"></a>

			<div class="banner-image" style="margin-top: 15px">
				
			</div>

		</div>

	</div>
</div>

<div id="user_data_box" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>User data</h3>
  </div>
  <div class="modal-body" id="user_data_content">
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>

<div id="retweet_box" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Retweet</h3>
  </div>
    <div class="modal-body">
    <p id="retweet_message"></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button id="post_retweet_btn" class="btn btn-primary">Retweet this status</button>
    </div>
</div>

<div id="reply_box" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Reply</h3>
  </div>
    <div class="modal-body">
    <p>
    	<p id="reply_message_source"></p>
	    <textarea id="reply_message" style="width:95%; height:90px;"></textarea>
    </p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button id="post_reply_btn" class="btn btn-primary">Post Reply</button>
    </div>
</div>

<!-- Modal for Add New Topic -->
<!-- Modal Category -->
<div id="addnewtopic" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Topic</h4>
            </div>
            <div class="modal-body">
            	<form id = "savedNewHashtags" method="post" enctype="multipart/form-data">
	            	<div class="form-group">
	            	    <label for="hashtagCategory">Category</label>
	            	    <select id="hashtagCategory" name="category">
	            	    	<!-- <option>1</option>
	            	    	<option>1</option>
	            	    	<option>1</option> -->
	            	    </select>
	            	    <!-- <input id="txtTopicTitle" type="text" class="form-control" required="required"> -->
	            	</div>
	                <div class="form-group">
	                    <label for="txtTopicTitle">Title*</label>
	                    <input id="txtTopicTitle" name = "hashtag_title" type="text" class="form-control" required="required" placeholder="Enter title">
	                </div>
	                <div class="form-group">
	                    <label for="txtHashtag">Hashtag*</label>
	                    <input id="txtHashtag" name = "hashtag" type="text" class="form-control" required="required" placeholder="Enter hashtag">
	                </div>
	                <div class="form-group">
	                    <label for="txtImageUrl">Image*</label>
	                    <input id="txtImageUrl" name="image_url" type="url" class="form-control" required="required" placeholder="Enter Image URL">
	                </div>
	                <div class="form-group">
	                    <label for="txtUploadImage">Upload Image</label>
	                    <input id="txtUploadImage" name = "image" type="file" class="form-control" required="required" placeholder="">
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button id="btnSaveNewHashtag" type="button" class="btn btn-success" data-dismiss="modal">Save category</button>
	            </div>
            </form>
        </div>

    </div>
</div>

<?php
include_once('include/presentation/footer.php');
?>
