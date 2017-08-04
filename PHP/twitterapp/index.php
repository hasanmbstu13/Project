<?php 

require "autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', 'oZkiNlIWcp2ZmMxeMfo4BoFLO');
define('CONSUMER_SECRET', '4Y3MV1chHP6NU4szm2FB3CAscwg1XOWKG6FXbLYYDgMdL6Kgrd');
define('OAUTH_CALLBACK', 'http://127.0.0.1/TwitterApp/callback.php');
$access_token = '3225959616-3hhQEsrQNk3rgzWvy2rIZK31xtlnKUfoMP8giEm';
$access_token_secret = '8HOcS4CCsE09fiYP2Wojf6kdmXAiVOjHQZy76HudR5lZB';




$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);

$statuses = $connection->get("search/tweets", ["q" => 'iteachmath', "count" => 100, "exclude_replies" => false, "exclude" => "retweets"]);
print_r($statuses); exit;

$start = 1;
foreach ($statuses->statuses as $tweets) {
	// As there is no simple way to get replies of a tweet so need to run this query for getting the replies of a speific tweet
	$statuses = $connection->get("search/tweets", ["q" => 'from:allison_krasnow', "-filter:" => 'replies',"count" => 15]);
	$start++;
	// print_r($stauses); exit;
}
