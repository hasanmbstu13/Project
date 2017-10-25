<?php
include_once('../include/webzone.php');

$twt_id = $_POST['twt_id'];

//$db_user = getUsers(array('user_id'=>$twt_id));

echo '<div><b>Twitter data</b>: </div>';
echo '<img src="'.$twt_data['profile_image_url'].'" style="width:30px;"><br>';
echo '<b>Name:</b> '.$twt_data['name'].'<br>';
echo '<b>Username:</b> '.$twt_data['screen_name'].'<br>';
echo '<b>Nb followers:</b> '.$twt_data['followers_count'].'<br>';
echo '<b>Nb friends:</b> '.$twt_data['friends_count'].'<br>';
echo '<b>Member since:</b> '.$twt_data['created_at'].'<br>';
echo '<b>Location:</b> '.$twt_data['location'].'<br>';
echo '<b>Description:</b> '.$twt_data['description'].'<br>';

?>