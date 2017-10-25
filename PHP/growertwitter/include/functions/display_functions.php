<?php
error_reporting(0);

function displayTweetsByHashTag($criteria=array(), $hashtag){
        $data = $criteria['data'];
	
	for($i=0; $i<count($data); $i++) {
            $tweetHashtags = $data[$i]['entities']['hashtags'];
            $containHashtag = false;
            $strTweetHashtags = "";

            for($j=0; $j<count($tweetHashtags); $j++)
            {
                if($tweetHashtags[$j]['text'] == $hashtag){
                    $containHashtag = true;
                }
                
                $strTweetHashtags .= $tweetHashtags[$j]['text'].',';
                
            }

            if(!$containHashtag){
                continue;
            }

            $id = $data[$i]['id_str'];
            $message = $data[$i]['text'];
            $created = $data[$i]['created_at'];
            $retweet_count = $data[$i]['retweet_count'];
            $username = $data[$i]['user']['screen_name'];
            $picture = $data[$i]['user']['profile_image_url'];

            $created = date('Y-m-d', strtotime($created)).'T'. date('H:i:s', strtotime($created)).'Z';
            $message = make_links_clickable($message);

            $profile_url = 'http://twitter.com/'.$username;
            $status_link = 'https://twitter.com/'.$username.'/status/'.$id;

            $display .= '<div style="padding:10px; padding-top:20px; padding-bottom:20px;">';

                    $display .= '<div style="float:left;"><a href="'.$profile_url.'" title="'.$username.'" target="_blank">
                    <img src="'.$picture.'" style="padding-right:10px; vertical-align:middle;">
                    </a></div>';

                    $display .= '<div style="margin-left:80px;">';
                            $display .= '<div><a href="'.$profile_url.'" title="'.$username.'" target="_blank">'.$username.'</a> ';
                            $display .= ''.$message.'';
                            $display .= '</div>
                            <a href="'.$status_link.'" target="_blank" class="created" title="'.$created.'">'.$created.'</a> - ';
                            //Retweets
                            if($retweet_count>0) {
                                    if($retweet_count==1) $display .= $retweet_count.' retweet - ';
                                    else $display .= $retweet_count.' retweets - ';
                            }
                            $display .= '<a href="#" class="reply_btn" data-message="'.htmlspecialchars($message).'" data-id="'.$id.'" data-username="'.$username.'" data-profile-image="'.$picture.'" data-hashtags="'.$strTweetHashtags.'">Reply</a> - ';
                            $display .= '<a href="#" class="retweet_btn" data-message="'.htmlspecialchars($message).'" data-id="'.$id.'">Retweet</a>
                            <br>';
                    $display .= '</div>';

            $display .= '</div><hr style="margin:0px; margin-bottom:10px;">';
	}
	
	return $display;
}

function displayTweets($criteria=array()) {
    // var_dump($criteria['data']);
    
	$data = $criteria['data'];
	
	for($i=0; $i<count($data); $i++) {
                $strTweetHashtags = "";
                $tweetHashtags = $data[$i]['entities']['hashtags'];

                for($j=0; $j<count($tweetHashtags); $j++)
                {
                    $strTweetHashtags .= $tweetHashtags[$j]['text'].',';
                }
            
		$id = $data[$i]['id_str'];
		$message = $data[$i]['text'];
		$created = $data[$i]['created_at'];
		$retweet_count = $data[$i]['retweet_count'];
		$username = $data[$i]['user']['screen_name'];
		$picture = $data[$i]['user']['profile_image_url'];
		
		$created = date('Y-m-d', strtotime($created)).'T'. date('H:i:s', strtotime($created)).'Z';
		$message = make_links_clickable($message);
		
		$profile_url = 'http://twitter.com/'.$username;
		$status_link = 'https://twitter.com/'.$username.'/status/'.$id;
		
		$display .= '<div style="padding:10px; padding-top:20px; padding-bottom:20px;">';
			
			$display .= '<div style="float:left;"><a href="'.$profile_url.'" title="'.$username.'" target="_blank">
			<img src="'.$picture.'" style="padding-right:10px; vertical-align:middle;">
			</a></div>';
			
			$display .= '<div style="margin-left:80px;">';
				$display .= '<div><a href="'.$profile_url.'" title="'.$username.'" target="_blank">'.$username.'</a> ';
				$display .= ''.$message.'';
				$display .= '</div>
				<a href="'.$status_link.'" target="_blank" class="created" title="'.$created.'">'.$created.'</a> - ';
				//Retweets
				if($retweet_count>0) {
					if($retweet_count==1) $display .= $retweet_count.' retweet - ';
					else $display .= $retweet_count.' retweets - ';
				}
				$display .= '<a href="#" class="reply_btn" data-message="'.htmlspecialchars($message).'" data-id="'.$id.'" data-username="'.$username.'" data-profile-image="'.$picture.'" data-hashtags="'.$strTweetHashtags.'">Reply</a> - ';
				$display .= '<a href="#" class="retweet_btn" data-message="'.htmlspecialchars($message).'" data-id="'.$id.'">Retweet</a>
				<br>';
			$display .= '</div>';
			
		$display .= '</div><hr style="margin:0px; margin-bottom:10px;">';
	}
	
	return $display;
}

?>