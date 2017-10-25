<?php
include_once('../include/webzone.php');

$status = $_POST['status'];

$t1 = new Twt_box();
$result = $t1->publishTweet(array('status'=>$status));

//print_r($result);

?>