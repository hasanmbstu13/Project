<?php
include_once('../include/webzone.php');

$id = $_POST['id'];

$t1 = new Twt_box();
$result = $t1->postDataToAPI(array('connection'=>'statuses/retweet/'.$id));

?>