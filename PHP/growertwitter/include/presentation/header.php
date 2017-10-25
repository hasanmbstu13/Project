<!DOCTYPE html>
<head>

<title>Twitter Client</title> 

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta charset="UTF-8" />

<!-- Include CSS files -->
<link rel="stylesheet" href="<?php echo $GLOBALS['path'].'include/css/bootstrap.min.css' ?>" type="text/css">
<link rel="stylesheet" href="<?php echo $GLOBALS['path'].'include/css/bootstrap-responsive.min.css' ?>" type="text/css">
<link rel="stylesheet" href="<?php echo $GLOBALS['path'].'include/js/fancybox/jquery.fancybox-1.3.4.css' ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $GLOBALS['path'].'include/css/style.css' ?>" type="text/css">
<!-- <link rel="stylesheet" href="include/css/style.css" type="text/css"> -->

<!-- Include JS files -->
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="http://suite.social/coder/tv/include/js/script.js"></script>
<script type="text/javascript" src="http://suite.social/coder/tv/include/js/json2.js"></script>
<script type="text/javascript" src="http://suite.social/coder/tv/include/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://suite.social/coder/tv/include/js/jquery.prettydate.js"></script> -->


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="include/js/script.js"></script>
<!-- <script type="text/javascript" src="http://suite.social/coder/tv/include/js/script.js"></script> -->
<script type="text/javascript" src="http://suite.social/coder/tv/include/js/json2.js"></script>
<script type="text/javascript" src="http://suite.social/coder/tv/include/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://suite.social/coder/tv/include/js/jquery.prettydate.js"></script>

<script> 
jQuery(document).ready(function() {
	<?php
	// echo $jsOnReady;
	?>
})
</script>

</head>

<body>

<?php
//Twitter
$t1 = new Twt_box();
$user_data = $t1->getUserData();
echo '<script>';
echo 'var Twt_box = {token:"'.$user_data['token'].'", token_secret:"'.$user_data['token_secret'].'"}';
echo '</script>';
?>

<div class="container"> 
	
	<h1><img src="<?php echo $GLOBALS['path'].'include/graph/twitter-client-mini.png' ?>" style="margin-right:20px;">Twitter Client</h1>
	
	<div id="topMenu" style="margin-top:15px;">
		<ul>
			<?php
			if($currentMenu[0]==1){
                            echo '<li><a href="'.$GLOBALS['path'].'" class="current">Home</a></li>';
                        }
			else {
                            echo '<li><a href="'.$GLOBALS['path'].'">Home</a></li>'; 
                        }
                        if($currentMenu[1]==1){
                            echo '<li><a href="'.$GLOBALS['path'].'admin" class="current">Admin</a></li>';
                        }
                        else
                        {
                           echo '<li><a href="'.$GLOBALS['path'].'admin">Admin</a></li>'; 
                        }
                        
			?>
		</ul>
	</div>
	
	<div style="clear:both;"></div>
	
	<hr>
</div>