<?php
include_once('../include/webzone.php');

$id = $_POST['id'];
$status = $_POST['status'];

$t1 = new Twt_box();
$result = $t1->publishTweet(array('status'=>$status, 'in_reply_to_status_id'=>$id));

print_r($result);

?>