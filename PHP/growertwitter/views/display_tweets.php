<?php


include_once('../include/webzone.php');

$feed = $_POST['feed'];
if(isset($_POST['hashtag']))
	$hashtag = $_POST['hashtag'];

if(substr($hashtag,0,1) != '#')
	$hashtag = '#'.$hashtag;

if(isset($_POST['banner_image']))
	$banner_image = $_POST['banner_image'];

$max_id = $_POST['max_id'];
$count = 20;

$t1 = new Twt_box();
// echo '<pre>';
// print_r($t1);
$user_data = $t1->getUserData();

if($t1->is_connected()==true) {

	if($hashtag)
		$params['q'] = $hashtag;

	$params['user_id'] = $user_data['id_str'];
	$params['count'] = $count;

	if($max_id!='') $params['max_id'] = $max_id;

	if($feed=='home') {
		$tweets = $t1->getDataFromAPI(array('connection'=>'statuses/home_timeline', 'params'=>$params));
	}
	else if($feed=='tweets_hashtags') {
		$tweets = $t1->getDataFromAPI(array('connection'=>'search/tweets', 'params'=>$params));
	}
	else if($feed=='retweets') {
		$tweets = $t1->getDataFromAPI(array('connection'=>'statuses/retweets_of_me', 'params'=>$params));
	}
	else if($feed=='my_tweets') {
		// $tweets = $t1->getDataFromAPI(array('connection'=>'search/tweets', 'params'=>$params));

		$tweets = $t1->getDataFromAPI(array('connection'=>'statuses/user_timeline', 'params'=>$params));
	}
	
	else if($feed=='mentions') {
		$tweets = $t1->getDataFromAPI(array('connection'=>'statuses/mentions_timeline', 'params'=>$params));
	}

    else if($feed == 'hashtag_tweets'){
            $tweets = $t1->getDataFromAPI(array('connection'=>'statuses/home_timeline', 'params'=>$params));
    }
}

if($max_id>0) {
	unset($tweets[0]);
	$tweets = array_values($tweets);
}

$max_id = $tweets[count($tweets)-1]['id_str'];

if($feed == 'hashtag_tweets' && isset($_POST['hashtag'])){
    echo displayTweetsByHashTag(array('data'=>$tweets), $hashtag);
}
else{
    echo displayTweets(array('data'=>$tweets));
}



if($max_id>0 && ($count/count($tweets))<2) {
	if(!$hashtag)
		$hashtag = '';
	echo '<a href="#" id="load_more_tweets_btn" data-max-id="'.$max_id.'" data-feed="'.$feed.'"  data-hashtag="'.$hashtag.'" class="btn">Load more</a>';
}

?>
