<?php
include_once('../include/webzone.php');

$next_cursor = $_POST['next_cursor'];

$t1 = new Twt_box();
$params = array();
if($next_cursor!='') $params['cursor'] = $next_cursor;
$users = $t1->getDataFromAPI(array('connection'=>'followers/list', 'params'=>$params));
$next_cursor = $users['next_cursor_str'];
$users = $users['users'];

//print_r($users);

for($i=0; $i<count($users); $i++) {
	$id = $users[$i]['id'];
	$name = $users[$i]['screen_name'];
	$image = $users[$i]['profile_image_url'];
	$description = $users[$i]['description'];
	
	$link = 'https://twitter.com/'.$name;
	
	echo '<div style="padding:10px; padding-top:10px; padding-bottom:15px; overflow:hidden;">';
	echo '<div style="float:left;"><a href="'.$link.'" target="_blank"><img src="'.$image.'" style="padding-right:10px; vertical-align:middle;"></a></div>';
	echo '<div style="margin-left:80px;"><a href="'.$link.'" target="_blank">'.$name.'</a><br>'.$description.'</div>';
	echo '</div>';
	echo '<hr style="margin-top:0px; margin-bottom:5px;">';
}
if($next_cursor>0) echo '<div id="displayMoreTwtFollowersBox"><a href="#" class="btn" id="display_more_twt_followers_btn" data-next-cursor="'.$next_cursor.'" class="btn">Load more</a></div>';

?>