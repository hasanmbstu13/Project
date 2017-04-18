<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>
	<?php 
		echo "BBS - "; 
		echo $title_for_layout;
	?>
</title>
<?php
echo $this->Html->meta('icon', $this->Html->url('/img/fevicon_bbs.png'));
echo $this->Html->script('jquery-1.8.3.min');
?>
</head>

<body>
	<?=$this->fetch('content')?>
</body>
</html>