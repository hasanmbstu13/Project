<?php

if(isset($_GET['data']) && !empty($_GET['data'])){
    $myFile = "../AdminHtml.json";
    $fh = fopen($myFile, 'w') or die("can't open file");
    $stringData = $_GET["data"];
    fwrite($fh, $stringData);
    fclose($fh);
}


?>
