<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pikdish | Login</title>

    <!-- Bootstrap core CSS -->
<?php

echo $this->Html->css('bootstrap.min.css');
echo $this->Html->css('/fonts/css/font-awesome.min.css');
echo $this->Html->css('animate.min.css');
echo $this->Html->css('custom.css');
echo $this->Html->css('icheck/flat/green.css');
echo $this->Html->script('jquery.min.js');
?>
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">
    
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>
        <div id="wrapper">
            <?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
        </div>
    </div>
<?php //echo $this->element('sql_dump');?>
</body>

</html>