<?php  
	$content = file_get_contents('Hashtags.json');
	$hashtags = json_decode($content);
	$upload_dir = "uploads";
	$output = '';
	$hashtag = '';
	$banner_image = '';
	$category = $_POST['category'];
	defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

	foreach ($hashtags as $hashtag) {
		if ($hashtag->category == $category) {
			$output .= '<div style="padding:10px; padding-top:20px; padding-bottom:20px;">';
			$image = $hashtag->image;
			$output .= '<div style="float:left;"><img src="'.$upload_dir.DS.$image.'" style="padding-right:10px; vertical-align:middle;width:60px"></div>';	
			$output .= '<div style="margin-left:80px;line-height: 0.8;">';
			$output .= '<p><strong>'.$hashtag->hashtag_title.'</strong></p>';
			$hashtag = (string) $hashtag->hashtag;
			if(substr($hashtag,0,1) != '#')
				$hashtag = '#'.$hashtag;
			$output .= '<p>'.$hashtag.'</p>';
			$output .= '<a href="#" class="load_tweets_btn" data-feed="tweets_hashtags" data-hashtag="'.$hashtag.'" data-username="" data-bannerimage="'.$image.'">View Tweets</a> - ';
			$output .= '<a href="#" class="save_topic" data-message="" data-id="">Save Topic</a>
			<br>';
			$output .= '</div>';				
			$output .= '</div><hr style="margin:0px; margin-bottom:10px;">';
		}
		
	}

	echo $output;
	exit;
?>